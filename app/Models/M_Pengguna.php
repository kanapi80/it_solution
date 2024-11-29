<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pengguna extends Model
{

    protected $DBGroup = 'aplikasi';
    protected $table = 'pengguna_akses_ruangan';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['NAMA', 'NIP', 'NIK', 'JENIS', 'STATUS'];

    public function getPenggunaWithProfile()
    {
        return $this->select('pengguna.*, pengguna_akses_ruangan.PENGGUNA, pengguna_akses_ruangan.RUANGAN')
            ->join('pengguna_akses_ruangan', 'pengguna_akses_ruangan.ID = pengguna.ID', 'left')
            ->findAll();
    }
    public function getPenggunaRuangan()
    {
        // $dbMaster = \Config\Database::connect('master');

        return $this->select('aplikasi.pengguna_akses_ruangan.*,aplikasi.pengguna.ID,aplikasi.pengguna.LOGIN, aplikasi.pengguna.NAMA,aplikasi.pengguna.NIP, master.ruangan.DESKRIPSI')
            ->join('master.ruangan', 'master.ruangan.ID = aplikasi.pengguna_akses_ruangan.RUANGAN', 'left')
            ->join('aplikasi.pengguna', 'pengguna.ID = aplikasi.pengguna_akses_ruangan.PENGGUNA', 'left')
            ->where('aplikasi.pengguna_akses_ruangan.STATUS', 1)
            ->findAll();
    }
}
