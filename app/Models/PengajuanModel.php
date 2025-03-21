<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $DBGroup          = 'sipejuang';
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id',
        'jenis_pengajuan',
        'ruangan_id',
        'koordinator_id',
        'pptk_id',
        'status',
        'created_at'
    ];

    public function getPengajuanId($id)
    {
        $query = $this->select("pengajuan.*, kor.nama AS kordinator, 
                     pptk.nama AS pptk,user.nama as pemohon, user.ruangan as unit")
            ->join('users kor', 'pengajuan.koordinator_id = kor.id')
            ->join('users pptk', 'pengajuan.pptk_id = pptk.id', 'left')
            ->join('users user', 'pengajuan.ruangan_id = user.id')
            ->where('pengajuan.id', $id)
            ->get(); // Tambahkan get() untuk mengeksekusi query

        return $query->getRowArray(); // Gunakan getRowArray() agar hasilnya dalam bentuk array
    }
    public function getGrafikData($ruangan_id, $tahun)
    {
        return $this->select("MONTHNAME(created_at) AS bulan, COUNT(id) AS jumlah")
            ->where("ruangan_id", $ruangan_id)
            ->where("YEAR(created_at)", $tahun)
            ->groupBy("bulan")
            ->orderBy("MONTH(created_at)", "ASC",  [$ruangan_id, $tahun])
            ->findAll();
    }

    public function getTopBarangByRuangan($ruangan_id, $limit = 10)
    {
        return $this->db->table('detail_pengajuan dp')
            ->select('dp.barang_id, b.nama_barang, COUNT(*) AS total')
            ->join('pengajuan p', 'dp.pengajuan_id = p.id')
            ->join('barang b', 'dp.barang_id = b.id', 'left')
            ->where('p.ruangan_id', $ruangan_id)
            ->groupBy('dp.barang_id')
            ->orderBy('total', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}
