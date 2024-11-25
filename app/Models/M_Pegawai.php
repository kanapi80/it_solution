<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pegawai extends Model
{
    protected $DBGroup = 'master';
    protected $table = 'pegawai';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['ID', 'NAMA', 'NIP', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'JENIS_KELAMIN', 'ALAMAT', 'STATUS', 'PROFESI', 'NOMOR_TELEPON', 'EMAIL,', 'GELAR_DEPAN', 'GELAR_BELAKANG'];

    public function getProfesi()
    {
        return $this->select('pegawai.*, referensi.DESKRIPSI')
            ->join('referensi', 'pegawai.PROFESI = referensi.ID AND referensi.JENIS = 36', 'left')
            ->findAll();
    }
}
