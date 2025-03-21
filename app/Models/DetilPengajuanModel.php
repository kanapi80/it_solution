<?php

namespace App\Models;

use CodeIgniter\Model;

class DetilPengajuanModel extends Model
{
    protected $DBGroup          = 'sipejuang';
    protected $table            = 'detail_pengajuan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id',
        'pengajuan_id',
        'barang_id',
        'jumlah_diminta',
        'sisa_stok',
        'jumlah_disetujui',
        'keterangan',
        'keterangan_koordinator',
        'keterangan_pptk',
        'keterangan_farmasi',
        'created_at',
        'updated_at',
        'jumlah_disetujui_koordinator'
    ];

    public function getTopAjuan()
    {
        $unit_id = session('Ses_Ruangan');
        $query = $this->select("m_indikator.*, mj.nama as NamaJenis")
            ->join('m_jenis mj', 'm_indikator.jenis_id = mj.id', 'left')
            ->where('m_indikator.unit_id', $unit_id) //Skema Nanti di tabel users sipayu dtambah kolom id_imut
            ->where('m_indikator.st_indikator', 1)
            ->orderBy('mj.order', 'ASC');
        return $query;
    }
}
