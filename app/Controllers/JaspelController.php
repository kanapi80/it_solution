<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JasaRanapModel;
use App\Models\JasaRajalModel;
use App\Models\JasaIGDModel;
use \Hermawan\DataTables\DataTable;
use App\Models\M_Asuransi;
use App\Models\PeriodeModel;

class JaspelController extends BaseController
{

    protected $jaspelranapmodel;
    protected $jaspelrajalmodel;
    protected $jaspeligdmodel;
    protected $modelAsuransi;
    protected $modelPeriode;

    public function __construct()
    {
        $this->jaspelranapmodel = new JasaRanapModel();
        $this->jaspelrajalmodel = new JasaRajalModel();
        $this->jaspeligdmodel = new JasaIGDModel();
        $this->modelAsuransi = new M_Asuransi();
        $this->modelPeriode = new PeriodeModel();
    }
    public function index()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $periode = $this->modelPeriode->getperiodeselect($asuransi);  // Fungsi untuk mendapatkan periode berdasarkan asuransi

        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['periode'] = $periode;   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('jaspel/jasaranap', $datas);
    }

    public function getjasaranap()
    {
        $request = service('request');

        // Ambil parameter filter
        $ruangan = $request->getVar('ruangan');
        $periode = $request->getVar('periode');
        $asuransi = $request->getVar('asuransi');
        $tahun = $request->getVar('tahun');
        $nama = $request->getVar('nama');
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }
        $builder = $this->jaspelranapmodel
            ->select('js_ranap.NomorRekamMedis, SUBSTRING(js_ranap.NamaPasien, 1, 8) AS NamaPasiens, js_ranap.NamaPasien, js_ranap.NamaTindakan, js_ranap.KelompokTindakan, js_ranap.NamaPelaksanaMedis, js_ranap.NamaAsuransi,
                     js_ranap.TotalTarif, js_ranap.JasaMedis, js_ranap.JasaMedisUmum, js_ranap.JasaParamedis, js_ranap.JasaKebersamaan, js_ranap.NamaRuangan, js_ranap.Periode, js_ranap.Tahun')
            ->whereIn('js_ranap.KelompokTindakan', ['Keperawatan', 'Konsultasi', 'Prosedur Non Bedah', 'Laboratorium', 'Radiologi', 'Prosedur Bedah']);
        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('js_ranap.NamaRuangan', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('js_ranap.NamaPasien', $nama);
        }
        // Filter berdasarkan periode jika ada
        if (!empty($periode)) {
            $builder->where('js_ranap.Periode', $periode);
        }
        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('js_ranap.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('js_ranap.Tahun', $tahun);
        }

        // Menjalankan query
        $data = $builder->orderBy('js_ranap.IdRegisterKunjungan', 'Asc')
            ->orderBy('js_ranap.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }

    public function getAsuransi()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->modelAsuransi
                ->select('id, paymentname')
                ->where('status', 2);
            $results = $builder->get()->getResultArray();

            $formattedResults = array_map(function ($item) {
                return [
                    'id' => $item['paymentname'],
                    'text' => $item['paymentname']
                ];
            }, $results);

            return $this->response->setJSON(['results' => $formattedResults]);
        }
    }
    public function getPeriodByAsuransi($asuransi)
    {
        $periods = $this->modelPeriode->getperiodeselect($asuransi);
        $options = [];
        foreach ($periods as $period) {
            $options[] = ['periode' => $period['periode']];
        }
        return $this->response->setJSON($options);
    }
    public function getYearsByAsuransi($asuransi)
    {
        $years = $this->modelPeriode->getYearsSelect($asuransi); // Pastikan model memiliki metode ini
        $options = [];
        foreach ($years as $year) {
            $options[] = ['tahun' => $year['Tahun']];
        }
        return $this->response->setJSON($options);
    }

    //JASPEL RAJAL
    public function getRajal()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $periode = $this->modelPeriode->getperiodeselect($asuransi);  // Fungsi untuk mendapatkan periode berdasarkan asuransi
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['periode'] = $periode;   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('jaspel/jasarajal', $datas);
    }
    public function getjasarajal()
    {
        $request = service('request');

        // Ambil parameter filter
        $ruangan = $request->getVar('ruangan');
        $periode = $request->getVar('periode');
        $asuransi = $request->getVar('asuransi');
        $tahun = $request->getVar('tahun');
        $nama = $request->getVar('nama');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->jaspelrajalmodel
            ->select('js_rajal.NomorRekamMedis, SUBSTRING(js_rajal.NamaPasien, 1, 8) AS NamaPasiens, js_rajal.NamaPasien, js_rajal.NamaTindakan, js_rajal.KelompokTindakan, js_rajal.NamaPelaksanaMedis, js_rajal.NamaAsuransi,
                     js_rajal.TotalTarif, js_rajal.JasaMedis, js_rajal.JasaMedisUmum, js_rajal.JasaParamedis, js_rajal.JasaKebersamaan, js_rajal.NamaRuangan, js_rajal.Periode, js_rajal.Tahun')
            ->whereIn('js_rajal.KelompokTindakan', ['Keperawatan', 'Konsultasi', 'Prosedur Non Bedah', 'Laboratorium', 'Radiologi', 'Prosedur Bedah']);

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('js_rajal.NamaRuangan', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('js_rajal.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($periode)) {
            $builder->where('js_rajal.Periode', $periode);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('js_rajal.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('js_rajal.Tahun', $tahun);
        }

        // Menjalankan query
        $data = $builder->orderBy('js_rajal.IdRegisterKunjungan', 'Asc')
            ->orderBy('js_rajal.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
    //JASA IGD
    public function getIGD()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $periode = $this->modelPeriode->getperiodeselect($asuransi);  // Fungsi untuk mendapatkan periode berdasarkan asuransi

        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['periode'] = $periode;   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('jaspel/jasaigd', $datas);
    }
    public function getjasaIGD()
    {
        $request = service('request');

        // Ambil parameter filter
        $ruangan = $request->getVar('ruangan');
        $periode = $request->getVar('periode');
        $asuransi = $request->getVar('asuransi');
        $tahun = $request->getVar('tahun');
        $nama = $request->getVar('nama');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->jaspeligdmodel
            ->select('js_igd.NomorRekamMedis, SUBSTRING(js_igd.NamaPasien, 1, 8) AS NamaPasiens, js_igd.NamaPasien, js_igd.NamaTindakan, js_igd.KelompokTindakan, js_igd.NamaPelaksanaMedis, js_igd.NamaAsuransi,
                      js_igd.TotalTarif, js_igd.JasaMedis, js_igd.JasaMedisUmum, js_igd.JasaParamedis, js_igd.JasaKebersamaan, js_igd.NamaRuangan, js_igd.Periode, js_igd.Tahun')
            ->whereIn('js_igd.KelompokTindakan', ['Keperawatan', 'Konsultasi', 'Prosedur Non Bedah', 'Laboratorium', 'Radiologi', 'Prosedur Bedah']);

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('js_igd.NamaRuangan', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('js_igd.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($periode)) {
            $builder->where('js_igd.Periode', $periode);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('js_igd.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('js_igd.Tahun', $tahun);
        }

        // Menjalankan query
        $data = $builder->orderBy('js_igd.IdRegisterKunjungan', 'Asc')
            ->orderBy('js_igd.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
    //JASA OPERASI
    public function getOperasi()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $periode = $this->modelPeriode->getperiodeselect($asuransi);  // Fungsi untuk mendapatkan periode berdasarkan asuransi

        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['periode'] = $periode;   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('jaspel/jasaoperasi', $datas);
    }
    public function getJasaOperasi()
    {
        $request = service('request');

        // Ambil parameter filter
        $ruangan = $request->getVar('ruangan');
        $periode = $request->getVar('periode');
        $asuransi = $request->getVar('asuransi');
        $tahun = $request->getVar('tahun');
        $nama = $request->getVar('nama');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->jaspeligdmodel
            ->select('js_igd.NomorRekamMedis, SUBSTRING(js_igd.NamaPasien, 1, 8) AS NamaPasiens, js_igd.NamaPasien, js_igd.NamaTindakan, js_igd.KelompokTindakan, js_igd.NamaPelaksanaMedis, js_igd.NamaAsuransi,
                      js_igd.TotalTarif, js_igd.JasaMedis, js_igd.JasaMedisUmum, js_igd.JasaParamedis, js_igd.JasaKebersamaan, js_igd.NamaRuangan, js_igd.Periode, js_igd.Tahun')
            ->whereIn('js_igd.KelompokTindakan', ['Keperawatan', 'Konsultasi', 'Prosedur Non Bedah', 'Laboratorium', 'Radiologi']);

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('js_igd.NamaRuangan', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('js_igd.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($periode)) {
            $builder->where('js_igd.Periode', $periode);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('js_igd.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('js_igd.Tahun', $tahun);
        }

        // Menjalankan query
        $data = $builder->orderBy('js_igd.IdRegisterKunjungan', 'Asc')
            ->orderBy('js_igd.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}
