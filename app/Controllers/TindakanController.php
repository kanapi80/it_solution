<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TindakanModel;
use \Hermawan\DataTables\DataTable;

class TindakanController extends BaseController
{
    protected $tindakanmodel;

    public function __construct()
    {
        $this->tindakanmodel = new TindakanModel();
    }
    public function index()
    {
        return view('Page/alltindakan');
    }
    public function getTindakan()
    {
        $builder = $this->tindakanmodel
            ->select('
            tindakan.STATUS,
            tindakan.ID,
            tindakan.NAMA AS NAMA_TINDAKAN,
            referensi.DESKRIPSI AS KELOMPOK_TINDAKAN,
            tt.TANGGAL_SK,
            tt.NOMOR_SK,
            tt.TARIF
        ')
            ->join('referensi', 'tindakan.JENIS = referensi.ID AND referensi.JENIS = 74', 'left')
            ->join(
                '(SELECT TINDAKAN, MAX(TARIF) AS TARIF, MAX(TANGGAL_SK) AS TANGGAL_SK, MAX(NOMOR_SK) AS NOMOR_SK
             FROM tarif_tindakan 
             GROUP BY TINDAKAN) tt',
                'tindakan.ID = tt.TINDAKAN',
                'LEFT'
            )
            ->where('tindakan.STATUS', 1)
            ->where('tindakan.JENIS !=', 0);
        // Logika pencarian
        if (!empty($search)) {
            $builder->groupStart()
                ->like('tindakan.NAMA', $search)
                ->orLike('referensi.DESKRIPSI', $search)
                ->orLike('tt.TARIF', $search)
                ->groupEnd();
        }
        $builder->orderBy('tindakan.JENIS', 'ASC')
            ->orderBy('tindakan.NAMA', 'ASC');
        return DataTable::of($builder)->addNumbering()->toJson(true);
    }
}
