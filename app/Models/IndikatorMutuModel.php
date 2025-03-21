<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorMutuModel extends Model
{
    protected $DBGroup          = 'simutayu';
    protected $table            = 'm_indikator';
    protected $primaryKey       = 'id';
    protected $allowedFields = [
        'id',
        'unit_id',
        'jenis_id',
        'urut',
        'nama',
        'dimensi',
        'tujuan',
        'definisi',
        'inklusi',
        'eksklusi',
        'frekuensi',
        'tipe_id',
        'periode_analisa',
        'num',
        'denum',
        'sumber_data',
        'standar',
        'nama_pj',
        'stat',
        'st_indikator'
    ];

    public function getIndikatorMutu()
    {
        return $this->findAll();
    }
    public function getIndikatorMutuById()
    {
        $unit_id = session('Ses_Ruangan');
        $query = $this->select("m_indikator.*, mj.nama as NamaJenis")
            ->join('m_jenis mj', 'm_indikator.jenis_id = mj.id', 'left')
            ->where('m_indikator.unit_id', $unit_id) //Skema Nanti di tabel users sipayu dtambah kolom id_imut
            ->where('m_indikator.st_indikator', 1)
            ->orderBy('mj.order', 'ASC');
        return $query;
    }
    // public function getIndikatorMutuById()
    // {
    //     $unit_id = session('Ses_Ruangan');

    //     $query = $this->select("m_indikator.*, mj.nama as NamaJenis")
    //         ->join('m_jenis mj', 'm_indikator.jenis_id = mj.id', 'left')
    //         ->where('m_indikator.unit_id', $unit_id)
    //         ->where('m_indikator.st_indikator', 1)
    //         ->orderBy('mj.order', 'ASC')
    //         ->get(); // 🛠 Eksekusi Query

    //     return $query->getResultArray(); // 🔥 Ambil hasilnya sebagai array
    // }

    public function getIndikatorId($id)
    {
        $query = $this->select("m_indikator.*, mjs.nama as NamaJenisx")
            ->join('m_jenis mjs', 'm_indikator.jenis_id = mjs.id', 'left')
            ->where('m_indikator.id', $id);
        return $query;
    }
    public function getIndikatorById($id)
    {
        return $this->select("m_indikator.*, mj.nama as NamaJenis")
            ->join('m_jenis mj', 'm_indikator.jenis_id = mj.id', 'left')
            ->where('m_indikator.id', $id)
            ->first(); // Mengambil satu data
    }
    public function getIndikatorGet($id =  null,  $unit_id = null, $jenis_id = null)
    {
        return $this->select("m_indikator.*, m_jenis.nama as NamaJenis, users.id as id_users")
            ->join('m_jenis', 'm_indikator.jenis_id = m_jenis.id', 'left')
            ->join('users', 'm_indikator.unit_id = users.unit_id', 'left')
            ->where('m_indikator.id', $id)
            ->where('m_indikator.unit_id', $unit_id)
            ->where('m_indikator.jenis_id', $jenis_id)
            ->findAll();
    }
}
