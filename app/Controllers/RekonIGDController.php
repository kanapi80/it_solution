<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonIGDModel;
use App\Models\M_Asuransi;
use App\Models\PeriodeModel;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;
use App\Models\M_Registerigd;
use App\Models\RekonRajalModel;

class RekonIGDController extends BaseController
{
    protected $modeligd;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;
    protected $modelRegister;
    protected $modelrajal;

    public function __construct()
    {
        $this->modeligd = new RekonIGDModel();
        $this->modelAsuransi = new M_Asuransi();
        $this->modelBulan = new M_Bulan();
        $this->modelRuangan = new M_Ruangan();
        $this->modelRegister = new M_Registerigd();
        $this->modelrajal = new RekonRajalModel();
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
        $datas['ruangan'] = $this->modelRuangan->getAllRuangan();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_igd', $datas);
    }
    //JASPEL RAJAL
    public function getRekonIGD()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');  // Atau ambil dari request
        $bulan = session()->get('bulan');
        $norm = session()->get('norm');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;  // Mengirimkan asuransi yang dipilih ke view
        $datas['bulan'] = $bulan;   // Mengirimkan periode yang sesuai dengan asuransi ke view
        $datas['ruangan'] = $this->modelRuangan->getAllRuangan();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_igd', $datas);
    }
    public function getjasaigd()
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
        $builder = $this->modeligd
            ->select('jasamedisigd.IdRegisterKunjungan, jasamedisigd.NomorRekamMedis, SUBSTRING(jasamedisigd.NamaPasien, 1, 8) AS NamaPasiens, jasamedisigd.NamaPasien, jasamedisigd.NamaTindakan, jasamedisigd.KelompokTindakan, jasamedisigd.Dokter, jasamedisigd.NamaAsuransi,
                     jasamedisigd.TanggalPelayanan, jasamedisigd.poliklinik, jasamedisigd.JasaMedisRvu, jasamedisigd.Tarif,jasamedisigd.JasaMedisTindakanRvu, jasamedisigd.JasaAsistenRvu, jasamedisigd.jasaAsisten_kebersamaan, jasamedisigd.MonthOut, jasamedisigd.fpk, jasamedisigd.YearOut')
            ->where('jasamedisigd.KelompokTindakan!=', 'Akomodasi');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisigd.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisigd.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedisigd.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisigd.fpk', $fpk);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedisigd.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedisigd.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedisigd.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedisigd.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisigd.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDetailIGD()
    {

        $data = [
            $idx = $this->request->getGet('idx'),
            'summary' => $this->modelRegister->summaryRegisterRajal($idx),
            'summaryTransaction' => $this->modelrajal->sumTransaksi('IGD', $idx),
            'jasamedis' => $this->modelrajal->cariJasaMedisIGD($idx),
            'jasalab' => $this->modelrajal->cariJasaMedisLab($idx),
            'jasarad' => $this->modelrajal->cariJasaMedisRad($idx),
            'jasafarmasi' => $this->modelrajal->cariJasaMedisFarmasi($idx),
            'jasaoperasi' => $this->modelrajal->cariJasaMedisOperasi($idx),
        ];

        return view('sipayu/detail_igd', $data);
    }
}
