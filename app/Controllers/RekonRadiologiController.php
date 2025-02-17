<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonRadiologiModel;
use App\Models\M_Asuransi;
use App\Models\PeriodeModel;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;

class RekonRadiologiController extends BaseController
{
    protected $modelradiologi;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;

    public function __construct()
    {
        $this->modelradiologi = new RekonRadiologiModel();
        $this->modelAsuransi = new M_Asuransi();
        $this->modelBulan = new M_Bulan();
        $this->modelRuangan = new M_Ruangan();
    }
    public function index()
    {
        /// Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        // $periode = $this->modelPeriode->getperiodeselect($asuransi);  // Fungsi untuk mendapatkan periode berdasarkan asuransi
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getpayment();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $this->modelBulan->getBulan();   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getRadiologi();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_radiologi', $datas);
    }
    //JASPEL RAJAL
    public function getRekonRadiologi()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $bulan = session()->get('bulan');
        $norm = session()->get('norm');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $bulan;   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getRadiologi();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_ranap', $datas);
    }
    public function getjasaradiologi()
    {
        $request = service('request');

        // Ambil parameter filter
        $ruangan = $request->getVar('ruangan');
        $bulan = $request->getVar('bulan');
        $asuransi = $request->getVar('asuransi');
        $tahun = $request->getVar('tahun');
        $nama = $request->getVar('nama');
        $fpk = $request->getVar('fpk');
        $norm = $request->getVar('norm');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->modelradiologi
            ->select('jasamedisrad.NomorRekamMedis, SUBSTRING(jasamedisrad.NamaPasien, 1, 8) AS NamaPasiens, jasamedisrad.NamaPasien, jasamedisrad.NamaTindakan, jasamedisrad.KelompokTindakan, jasamedisrad.Dokter, jasamedisrad.NamaAsuransi,
                     jasamedisrad.TanggalPelayanan, jasamedisrad.poliklinik, jasamedisrad.JasaMedisRvu, jasamedisrad.Tarif,jasamedisrad.JasaAsistenRvu, jasamedisrad.MonthOut, jasamedisrad.fpk, jasamedisrad.YearOut')
            ->where('jasamedisrad.KelompokTindakan!=', 'Akomodasi');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisrad.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisrad.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedisrad.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisrad.fpk', $fpk);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedisrad.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedisrad.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedisrad.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedisrad.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisrad.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}
