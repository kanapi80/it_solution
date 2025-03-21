<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Registerigd extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table = 'registerigd';
    protected $primaryKey = 'id';
    // protected $returnType = 'object';
    protected $allowedFields = ['id', 'IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NomorSEP', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost'];

    function summaryRegisterRajal($idx)
    {
        $this->dt = $this->db->table('registerigd');
        $this->dt->where('IdRegisterKunjungan', $idx);
        $this->dt->where('StatusRealisasi', 1);
        $query = $this->dt->get();
        return $query->getResultArray();
    }
}
