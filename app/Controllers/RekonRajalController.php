<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RekonRajalModel;
use App\Models\M_Asuransi;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;
use App\models\M_Registerrajal;

class RekonRajalController extends BaseController
{
    protected $modelrajal;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;
    protected $modelRegister;

    public function __construct()
    {
        $this->modelrajal = new RekonRajalModel();
        $this->modelAsuransi = new M_Asuransi();
        $this->modelBulan = new M_Bulan();
        $this->modelRuangan = new M_Ruangan();
        $this->modelRegister = new M_Registerrajal();
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
        $datas['ruangan'] = $this->modelRuangan->getRawatJalan();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_rajal', $datas);
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
        $datas['ruangan'] = $this->modelRuangan->getRawatJalan();   // Mengirimkan periode yang sesuai dengan asuransi ke view

        return view('sipayu/rekon_rajal', $datas);
    }
    public function getjasarajal()
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
        $builder = $this->modelrajal
            ->select('jasamedisrajal.IdRegisterKunjungan, jasamedisrajal.NomorRekamMedis, SUBSTRING(jasamedisrajal.NamaPasien, 1, 8) AS NamaPasiens, jasamedisrajal.NamaPasien, jasamedisrajal.NamaTindakan, jasamedisrajal.KelompokTindakan, jasamedisrajal.Dokter, jasamedisrajal.NamaAsuransi,
                     jasamedisrajal.TanggalPelayanan, jasamedisrajal.poliklinik, jasamedisrajal.JasaMedisRvu, jasamedisrajal.Tarif,jasamedisrajal.JasaMedisTindakanRvu, jasamedisrajal.JasaAsistenRvu, jasamedisrajal.jasaAsisten_kebersamaan, jasamedisrajal.MonthOut, jasamedisrajal.fpk, jasamedisrajal.YearOut')
            ->where('jasamedisrajal.KelompokTindakan!=', 'Akomodasi');

        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisrajal.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisrajal.NamaPasien', $nama);
        }

        // Filter berdasarkan periode jika ada
        if (!empty($bulan)) {
            $builder->where('jasamedisrajal.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisrajal.fpk', $fpk);
        }

        // Filter berdasarkan asuransi jika ada
        if (!empty($asuransi)) {
            $builder->where('jasamedisrajal.NamaAsuransi', $asuransi);
        }

        // Filter berdasarkan tahun jika ada
        if (!empty($tahun)) {
            $builder->where('jasamedisrajal.YearOut', $tahun);
        }
        //NORM
        if (!empty($norm)) {
            $builder->where('jasamedisrajal.NomorRekamMedis', $norm);
        }

        // Menjalankan query
        $data = $builder->orderBy('jasamedisrajal.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisrajal.KelompokTindakan', 'Asc')
            ->findAll();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDetailRJ()
    {

        $data = [
            $idx = $this->request->getGet('idx'),
            'summary' => $this->modelRegister->summaryRegisterRajal($idx),
            'summaryTransaction' => $this->modelrajal->sumTransaksi('RJ', $idx),
            'jasamedis' => $this->modelrajal->cariJasaMedisRajal($idx),
            'jasalab' => $this->modelrajal->cariJasaMedisLab($idx),
            'jasarad' => $this->modelrajal->cariJasaMedisRad($idx),
            'jasafarmasi' => $this->modelrajal->cariJasaMedisFarmasi($idx),
            'jasaoperasi' => $this->modelrajal->cariJasaMedisOperasi($idx),
        ];

        return view('sipayu/detail_rj', $data);
    }
}
