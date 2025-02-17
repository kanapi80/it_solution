<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_Kunjungan;
use \Hermawan\DataTables\DataTable;
use App\Models\RuanganModel;
use App\Models\M_Cppt;


class KunjunganController extends BaseController
{
    protected $modelkunjungan;
    protected $modelruangan;
    protected $modelcppt;

    public function __construct()
    {
        $this->modelkunjungan = new M_Kunjungan();
        $this->modelruangan = new RuanganModel();
        $this->modelcppt = new M_Cppt();
    }
    public function index()
    {

        return view('page/kunjungan');
    }

    public function getKunjungan()
    {
        if ($this->request->isAJAX()) {
            $status = $this->request->getPost('status');
            $nama = $this->request->getPost('nama');
            $norm = $this->request->getPost('norm');
            $nosep = $this->request->getPost('nosep');
            $tanggal = $this->request->getPost('tanggal');
            $ruangan = $this->request->getPost('ruangan');
            $keylab1 = $this->request->getPost('keylab1');
            $keylab2 = $this->request->getPost('keylab2');
            $keyrad = $this->request->getPost('keyrad');

            // Pastikan nilai status benar
            if ($status === "Dilayani") {
                $status = 1;
            } elseif ($status === "Selesai") {
                $status = 2;
            } elseif ($status === "Batal") {
                $status = 0;
            } else {
                $status = null; // Biarkan semua status tampil jika tidak ada filter
            }

            $builder = $this->modelkunjungan->getKunjunganPasien($status, $nama, $norm, $tanggal, $ruangan, $keylab1, $keylab2, $keyrad, $nosep);
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
    public function getRuanganAll()
    {
        if ($this->request->isAJAX()) {
            $search = $this->request->getGet('value'); // Perbaiki dari 'ruangan' ke 'value'
            if (!empty($search)) {
                $ruangan = $this->modelruangan
                    ->like('DESKRIPSI', $search)
                    ->getRuanganAlls();
                return $this->response->setJSON($ruangan);
            }
            return $this->response->setJSON([]);
        }
    }
    public function getCetakCPPT($cppt1, $cppt2)
    {
        $data['cppt'] = $this->modelcppt->getCetakCPPT($cppt1, $cppt2);

        return view('pasien/detilpasien', $data);
    }
}
