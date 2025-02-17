<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonLaboratoriumModel;
use App\Models\M_Asuransi;
use App\Models\PeriodeModel;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;

class RekonLaboratoriumController extends BaseController
{
    protected $modellaboratorium;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;

    public function __construct()
    {
        $this->modellaboratorium = new RekonLaboratoriumModel();
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
        $datas['ruangan'] = $this->modelRuangan->getLaboratorium();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_laboratorium', $datas);
    }
    //JASPEL RAJAL
    public function getRekonLaboratorium()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $bulan = session()->get('bulan');
        $norm = session()->get('norm');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $bulan;   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getLaboratorium();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_laboratorium', $datas);
    }
    public function getjasalaboratorium()
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
        $builder = $this->modellaboratorium
            ->select('jasamedislab.NomorRekamMedis, SUBSTRING(jasamedislab.NamaPasien, 1, 8) AS NamaPasiens, jasamedislab.NamaPasien, jasamedislab.NamaTindakan, jasamedislab.KelompokTindakan, jasamedislab.Dokter, jasamedislab.NamaAsuransi,
                     jasamedislab.TanggalPelayanan, jasamedislab.poliklinik, jasamedislab.JasaMedisRvu, jasamedislab.Tarif,jasamedislab.JasaAsistenRvu, jasamedislab.MonthOut, jasamedislab.fpk, jasamedislab.YearOut')
            ->where('jasamedislab.KelompokTindakan!=', 'Akomodasi');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedislab.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedislab.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedislab.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedislab.fpk', $fpk);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedislab.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedislab.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedislab.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedislab.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedislab.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}
