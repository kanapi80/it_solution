<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonOperasiModel;
use App\Models\M_Asuransi;
use App\Models\PeriodeModel;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;

class RekonOperasiController extends BaseController
{
    protected $modeloperasi;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;

    public function __construct()
    {
        $this->modeloperasi = new RekonOperasiModel();
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
        $datas['ruangan'] = $this->modelRuangan->getKamarOperasi();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_operasi', $datas);
    }
    //JASPEL RAJAL
    public function getRekonOperasi()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $bulan = session()->get('bulan');
        $norm = session()->get('norm');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $bulan;   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getKamarOperasi();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_operasi', $datas);
    }
    public function getjasaoperasi()
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
        $anastesi = $request->getVar('anastesi');

        // Jika nama asuransi tidak dipilih, kirimkan data kosong
        if (empty($asuransi)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Nama Asuransi tidak dipilih. Data tidak ditampilkan.'
            ]);
        }

        // Mulai builder query
        $builder = $this->modeloperasi
            ->select('jasamedisoperasi.NomorRekamMedis, SUBSTRING(jasamedisoperasi.NamaPasien, 1, 8) AS NamaPasiens, jasamedisoperasi.NamaPasien, jasamedisoperasi.NamaTindakan, jasamedisoperasi.KelompokTindakan, jasamedisoperasi.Dokter, jasamedisoperasi.NamaAsuransi,
                     jasamedisoperasi.TanggalPelayanan, jasamedisoperasi.poliklinik, jasamedisoperasi.JasaMedisDokterRvu,jasamedisoperasi.JasaMedisDokterAnestesiRvu, jasamedisoperasi.Tarif,jasamedisoperasi.JasaMedisPerawatBedahRvu,jasamedisoperasi.JasaMedisPenataAnestesiRvu,  jasamedisoperasi.jasaAsisten_kebersamaan, jasamedisoperasi.MonthOut, jasamedisoperasi.fpk, jasamedisoperasi.YearOut');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisoperasi.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisoperasi.NamaPasien', $nama);
        }
        if (!empty($anastesi)) {
            $builder->where("LOWER(jasamedisoperasi.NamaTindakan) LIKE", "%" . strtolower($anastesi) . "%");
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedisoperasi.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisoperasi.fpk', $fpk);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedisoperasi.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedisoperasi.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedisoperasi.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedisoperasi.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisoperasi.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}
