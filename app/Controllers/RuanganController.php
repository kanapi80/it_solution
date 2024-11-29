<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RuanganModel;
use \Hermawan\DataTables\DataTable;

class RuanganController extends BaseController
{
    protected $ruanganmodel;

    public function __construct()
    {
        $this->ruanganmodel = new RuanganModel();
    }
    public function index()
    {
        return view('Page/ruangan');
    }
    public function getRuangan()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->ruanganmodel
                ->select('ruangan.ID,ruangan.TANGGAL,ruangan.DESKRIPSI as RUANGAN,ruangan.STATUS,referensi.DESKRIPSI as JENIS_RUANGAN')
                ->join('referensi', 'ruangan.JENIS_KUNJUNGAN = referensi.ID AND referensi.JENIS = 15', 'left')
                ->where('ruangan.JENIS', 5)
                ->where('ruangan.JENIS_KUNJUNGAN!=', 0)
                ->orderBy('ruangan.JENIS_KUNJUNGAN', 'Asc')
                ->orderBy('ruangan.DESKRIPSI', 'Asc')
                ->orderBy('ruangan.ID', 'Asc');
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
}
