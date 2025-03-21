<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RekonRanapModel;
use App\Models\RekonRajalModel;
use App\Models\M_Asuransi;
use App\Models\M_Ruangan;
use App\Models\M_Bulan;
use App\models\M_Registerranap;

class RekonRanapController extends BaseController
{
    protected $modelranap;
    protected $modelAsuransi;
    protected $modelBulan;
    protected $modelRuangan;
    protected $modelRegister;
    protected $modelrajal;

    public function __construct()
    {
        $this->modelranap = new RekonRanapModel();
        $this->modelAsuransi = new M_Asuransi();
        $this->modelBulan = new M_Bulan();
        $this->modelRuangan = new M_Ruangan();
        $this->modelRegister = new M_Registerranap();
        $this->modelrajal = new RekonRajalModel();
    }
    public function index()
    {
        /// Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getpayment();
        $datas['asuransi'] = $asuransi;
        $datas['bulan'] = $this->modelBulan->getBulan();
        $datas['ruangan'] = $this->modelRuangan->getAllruangans();
        return view('sipayu/rekon_ranap', $datas);
    }
    //JASPEL RAJAL
    public function getRekonRanap()
    {
        // Mengambil data periode berdasarkan asuransi yang dipilih
        $asuransi = session()->get('asuransi');
        $bulan = session()->get('bulan');
        // Menyediakan data periode untuk view
        $datas['modelAsuransi'] = $this->modelAsuransi->getjaspel();
        $datas['asuransi'] = $asuransi;
        $datas['bulan'] = $bulan;
        $datas['ruangan'] = $this->modelRuangan->getAllruangans();

        return view('sipayu/rekon_ranap', $datas);
    }
    public function getjasaranap()
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
        $builder = $this->modelranap
            ->select('jasamedisranap.IdRegisterKunjungan, jasamedisranap.NomorRekamMedis, SUBSTRING(jasamedisranap.NamaPasien, 1, 8) AS NamaPasiens, jasamedisranap.NamaPasien, jasamedisranap.NamaTindakan, jasamedisranap.KelompokTindakan, jasamedisranap.Dokter, jasamedisranap.NamaAsuransi,
                     jasamedisranap.TanggalPelayanan, jasamedisranap.poliklinik, jasamedisranap.JasaMedisRvu, jasamedisranap.Tarif,jasamedisranap.JasaMedisTindakanRvu, jasamedisranap.JasaAsistenRvu, jasamedisranap.jasaAsisten_kebersamaan, jasamedisranap.MonthOut, jasamedisranap.fpk, jasamedisranap.YearOut')
            ->where('jasamedisranap.KelompokTindakan!=', 'Akomodasi');
        // Filter berdasarkan ruangan jika ada
        if (!empty($ruangan)) {
            $builder->where('jasamedisranap.poliklinik', $ruangan);
        }
        if (!empty($nama)) {
            $builder->like('jasamedisranap.NamaPasien', $nama);
        }
        if (!empty($bulan)) {
            $builder->where('jasamedisranap.MonthOut', $bulan);
        }
        if (!empty($fpk)) {
            $builder->where('jasamedisranap.fpk', $fpk);
        }
        if (!empty($asuransi)) {
            $builder->where('jasamedisranap.NamaAsuransi', $asuransi);
        }
        if (!empty($tahun)) {
            $builder->where('jasamedisranap.YearOut', $tahun);
        }
        if (!empty($norm)) {
            $builder->where('jasamedisranap.NomorRekamMedis', $norm);
        }
        // Menjalankan query
        $data = $builder->orderBy('jasamedisranap.IdRegisterKunjungan', 'Asc')
            ->orderBy('jasamedisranap.KelompokTindakan', 'Asc')
            ->findAll();
        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDetailRI()
    {

        $data = [
            $idx = $this->request->getGet('idx'),
            'summary' => $this->modelRegister->summaryRegisterRanap($idx),
            'summaryTransaction' => $this->modelrajal->sumTransaksi('RI', $idx),
            'jasamedis' => $this->modelrajal->cariJasaMedisRanap($idx),
            'jasalab' => $this->modelrajal->cariJasaMedisLab($idx),
            'jasarad' => $this->modelrajal->cariJasaMedisRad($idx),
            'jasafarmasi' => $this->modelrajal->cariJasaMedisFarmasi($idx),
            'jasaoperasi' => $this->modelrajal->cariJasaMedisOperasi($idx),
        ];

        return view('sipayu/detail_ri', $data);
    }
}
