<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DokterModel;
use \Hermawan\DataTables\DataTable;

class DokterController extends BaseController
{
    protected $doktermodel;

    public function __construct()
    {
        $this->doktermodel = new DokterModel();
    }
    public function index()
    {
        return view('Page/dokter');
    }
    public function getDokter($search = null)
    {
        $penjaminRsDB = \Config\Database::connect('penjamin_rs');
        //  $masterDB = \Config\Database::connect('master');
        $builder = $penjaminRsDB->table('dpjp as prd')
            ->select('prd.DPJP_PENJAMIN, prd.DPJP_RS, dp.nama as NamaDokter, prd.STATUS, mdok.NIP')
            ->join('bpjs.dpjp as dp', 'prd.DPJP_PENJAMIN = dp.KODE', 'left')
            ->join('master.dokter as mdok', 'prd.ID = mdok.ID', 'left')
            ->join('master.pegawai as mpegawai', 'mdok.NIP = mpegawai.NIP', 'left');

        if (!empty($search)) {
            $builder->groupStart()
                ->like('dp.nama', $search)
                ->groupEnd();
        }
        $builder->orderBy('prd.DPJP_PENJAMIN', 'ASC');
        return DataTable::of($builder)->addNumbering()->toJson(true);
    }
}
