<?php

namespace App\Models;

use CodeIgniter\Model;

class TransMutuModel extends Model
{
    protected $DBGroup          = 'simutayu';
    protected $table            = 'trn_indikator';
    protected $primaryKey       = 'id';
    protected $allowedFields = [
        'indikator_id',
        'tgl_tran',
        'keterangan',
        'num',
        'denum',
        'user_id',
        'tgl_add',
        'tgl_edit'
    ];

    public function getTransIndikatorMutu()
    {
        return $this->findAll();
    }

    public function getTransIndikator($unit_id = null, $tgl_tran = null)
    {
        return $this->select("m_indikator.*")
            ->where('m_indikator.unit_id', $unit_id)
            ->where('m_indikator.tgl_tran', $tgl_tran)
            ->findAll();
    }
}
