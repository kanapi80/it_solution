<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FarmasiModel;
use \Hermawan\DataTables\DataTable;

class FarmasiController extends BaseController
{
    protected $farmasiModel;

    public function __construct()
    {
        $this->farmasiModel = new FarmasiModel();
    }
    public function index()
    {
        return view('Page/depolayanan');
    }
    public function getDepoLayanan()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->farmasiModel
                ->select('depo_layanan_farmasi.ID,depo_layanan_farmasi.RUANGAN_FARMASI, depo_layanan_farmasi.RUANGAN_LAYANAN, depo_layanan_farmasi.MULAI, 
                depo_layanan_farmasi.SELESAI,depo_layanan_farmasi.STATUS, mra.DESKRIPSI as NAMA_DEPO, mra.ID as ID_DEPO,
                mrb.DESKRIPSI as NAMA_RUANGAN, mrb.ID as ID_RUANGAN')
                ->join('master.ruangan as mra', 'depo_layanan_farmasi.RUANGAN_FARMASI=mra.ID', 'left')
                ->join('master.ruangan as mrb', 'depo_layanan_farmasi.RUANGAN_LAYANAN=mrb.ID', 'left')
                ->orderBy('mra.DESKRIPSI', 'Asc')
                ->orderBy('mrb.DESKRIPSI', 'Asc');
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
    public function updateStatus()
    {
        // $model = new PenyediaModel();
        $userId = $this->request->getPost('id');
        $status = $this->request->getPost('status') ? 1 : 0;
        if ($this->farmasiModel->update($userId, ['STATUS' => $status])) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
}
