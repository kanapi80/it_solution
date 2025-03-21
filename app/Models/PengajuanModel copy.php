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
        $query = $this->from('pengajuan')
            ->select("pengajuan.*, kor.nama AS kordinator, 
                  COALESCE(pptk.nama, '-') AS pptk, pemohon.nama as pemohon, pemohon.ruangan as unit")
            ->join('users kor', 'pengajuan.koordinator_id = kor.id') // INNER JOIN
            ->join('users pptk', 'pengajuan.pptk_id = pptk.id', 'left') // LEFT JOIN
            ->join('users pemohon', 'pengajuan.ruangan_id = pemohon.id') // INNER JOIN
            ->where('pengajuan.id', $id)
            ->get();
        return $query->getRowArray();
    }
}
