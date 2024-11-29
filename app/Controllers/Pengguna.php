<?php

namespace App\Controllers;

use App\Models\M_Pengguna;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;

use function PHPUnit\Framework\assertNotNull;

class Pengguna extends Controller
{
    protected $penggunanmodel;
    public function __construct()
    {
        $this->penggunanmodel = new M_Pengguna();
    }
    public function pengguna()
    {
        $selectpengguna = $this->penggunanmodel->getPenggunaWithProfile();
        $data['selectpengguna'] = $selectpengguna;
    }
    public function penggunaRuangan()
    {
        $selectpenggunaruangan =  $this->penggunanmodel->getPenggunaRuangan();
        $data['selectpenggunaruangan'] = $selectpenggunaruangan;
        return view('Page/pengguna', $data);
    }
    public function getPengguna($search = null)
    {
        $builder = $this->penggunanmodel
            ->select('pengguna_akses_ruangan.ID as IDS,pengguna_akses_ruangan.PENGGUNA,pengguna_akses_ruangan.RUANGAN,
            pengguna.PASSWORD,
            pengguna.NAMA,pengguna.LOGIN,pengguna.NIP,pengguna.ID AS IDX,pengguna.NIK,pengguna_akses_ruangan.STATUS, master.ruangan.DESKRIPSI')
            ->join('master.ruangan', 'master.ruangan.ID = aplikasi.pengguna_akses_ruangan.RUANGAN', 'left')
            ->join('aplikasi.pengguna', 'pengguna.ID = aplikasi.pengguna_akses_ruangan.PENGGUNA', 'left');
        // Add search conditions if $search is not empty
        if (!empty($search)) {
            $builder->groupStart()
                ->like('pengguna_akses_ruangan.PENGGUNA', $search)
                // ->orLike('master.ruangan.DESKRIPSI', $search)
                // ->orLike('pasien.NORM', $search)
                ->groupEnd();
        }
        $builder->orderBy('pengguna_akses_ruangan.PENGGUNA', 'ASC')
            ->orderBy('pengguna_akses_ruangan.RUANGAN', 'ASC');
        return DataTable::of($builder)->addNumbering()->toJson(true);
    }
}
