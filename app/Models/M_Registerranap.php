<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Registerranap extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table = 'registerranap';
    protected $primaryKey = 'id';
    // protected $returnType = 'object';
    protected $allowedFields = ['id', 'IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NomorSEP', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost'];
    function summaryRegisterRanap($idx)
    {
        $this->dt = $this->db->table('registerranap');
        $this->dt->where('IdRegisterKunjungan', $idx);
        $this->dt->where('StatusRealisasi', 1);
        $query = $this->dt->get();
        return $query->getResultArray();
    }
}
