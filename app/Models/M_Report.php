<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Report extends Model
{
    protected $DBGroup          = 'laporan';
    protected $table            = 'request_report';
    protected $primaryKey       = 'ID';
    protected $allowedFields     = ['ID', 'STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getRep($id)
    {
        // Memeriksa apakah $id tidak kosong atau null
        if (!empty($id)) {
            return $this->select('request_report.ID, request_report.DIBUAT_TANGGAL, request_report.DIBUAT_OLEH, request_report.STATUS, aplikasi.pengguna.NAMA')
                ->join('aplikasi.pengguna', 'pengguna.ID = request_report.DIBUAT_OLEH', 'left')
                ->like('request_report.ID', $id)
                ->findAll();
        } else {
            // Mengembalikan hasil kosong atau melakukan tindakan lain jika $id kosong atau null
            return [];
        }
    }
}
