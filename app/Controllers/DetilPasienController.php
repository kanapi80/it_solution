<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_Cppt;
use App\Models\M_Tagihan;
use App\Models\M_Laboratorium;
use App\Models\M_Radiologi;

class DetilPasienController extends BaseController
{
    protected $modelcppt;
    protected $modeltagihan;
    protected $modellaboratorium;
    protected $modelradiologi;

    public function __construct()
    {
        $this->modelcppt = new M_Cppt();
        $this->modeltagihan = new M_Tagihan();
        $this->modellaboratorium = new M_Laboratorium();
        $this->modelradiologi = new M_Radiologi();
    }
    public function index()
    {
        $nopen = $this->request->getGet('nopen');
        $norm = $this->request->getGet('norm');
        $nama = $this->request->getGet('nama');
        $nokun = $this->request->getGet('nokun');
        $nosep = $this->request->getGet('nosep');
        // $pasien = $this->request->getGet('pasien');
        $notag = $this->request->getGet('tagihan');
        $keylab1 = $this->request->getGet('keylab1');
        $keylab2 = $this->request->getGet('keylab2');
        // $tujuan_order = $this->request->getGet('tujuan_order');
        $keyrad = $this->request->getGet('keyrad');
        $data['cppt'] = $this->modelcppt->getCetakCPPT($nopen, $nokun);
        $data['cpptm'] = $this->modelcppt->getCetakCatatanMedik($nopen, $nokun);
        $data['billing'] = $this->modeltagihan->getCetakBilling($notag, 1);
        $data['lab'] = $this->modellaboratorium->getCetakLaboratorium($keylab1, $keylab2);
        $data['labs'] = $this->modellaboratorium->getHasilLaboratorium($nokun);
        // $data['rad'] = $this->modelradiologi->getCetakRadiologi(25020303290);
        $data['rad'] = $this->modelradiologi->getCetakRadiologi($keyrad);
        // Kirim nilai ke View
        return view('pasien/detil_pasien', [
            'norm' => $norm,
            'nama' => $nama,
            'nopen' => $nopen,
            'nokun' => $nokun,
            'norm' => $norm,
            'notag' => $notag,
            'nama' => $nama,
            'nosep' => $nosep,
            'cppt' => $data['cppt'],
            'cpptm' => $data['cpptm'],
            'billing' => $data['billing'],
            'lab' => $data['lab'],
            'labs' => $data['labs'],
            'rad' => $data['rad'],
            'keylab1' => $keylab1,
            'keylab2' => $keylab2,
            'keyrad' => $keyrad
        ]);
    }
}
