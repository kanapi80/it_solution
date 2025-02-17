<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonFarmasiModel;
use App\Models\M_Asuransi;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;

class RekonFarmasiController extends BaseController
{
    protected $modelfarmasi;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;

    public function __construct()
    {
        $this->modelfarmasi = new RekonFarmasiModel();
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
        $datas['ruangan'] = $this->modelRuangan->getAllruangans();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_farmasi', $datas);
    }
    //JASPEL RAJAL
    public function getRekonRajal()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $bulan = session()->get('bulan');
        $norm = session()->get('norm');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $bulan;   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getAllruangans();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_farmasi', $datas);
    }
    public function getjasafarmasi()
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
        $asal = $request->getVar('asal');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->modelfarmasi
            ->select('jasamedisfarmasi.NomorRekamMedis, SUBSTRING(jasamedisfarmasi.NamaPasien, 1, 8) AS NamaPasiens, jasamedisfarmasi.NamaPasien, jasamedisfarmasi.NamaTindakan, jasamedisfarmasi.KelompokTindakan, jasamedisfarmasi.Dokter, jasamedisfarmasi.NamaAsuransi,
                     jasamedisfarmasi.TanggalPelayanan, jasamedisfarmasi.poliklinik, jasamedisfarmasi.JasaMedisRvu, SUM(jasamedisfarmasi.Tarif) as Tarifs, jasamedisfarmasi.JasaAsistenRvu, SUM(jasamedisfarmasi.PundiRemunRvu) as JasaRS,
                     SUM(jasamedisfarmasi.JasaAdmRvu) AS JasaAdmRvus, SUM(jasamedisfarmasi.JasaPelayanan) as Jaspel,SUM(jasamedisfarmasi.JasaPelayananRvu) as JaspelRvu,jasamedisfarmasi.MonthOut, jasamedisfarmasi.fpk, jasamedisfarmasi.YearOut, jasamedisfarmasi.AsalPelayanan')
            ->groupBy('jasamedisfarmasi.IdRegisterKunjungan')
            ->groupBy('jasamedisfarmasi.AsalPelayanan')
            ->groupBy('jasamedisfarmasi.poliklinik')
            ->groupBy('jasamedisfarmasi.TanggalPelayanan')
            ->orderBy('jasamedisfarmasi.created_at', 'Asc')
            ->orderBy('jasamedisfarmasi.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisfarmasi.TanggalPelayanan', 'Asc');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisfarmasi.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisfarmasi.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedisfarmasi.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisfarmasi.fpk', $fpk);
        }
        if (!empty($asal)) {
            $builder->where('jasamedisfarmasi.AsalPelayanan', $asal);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedisfarmasi.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedisfarmasi.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedisfarmasi.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedisfarmasi.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisfarmasi.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}
