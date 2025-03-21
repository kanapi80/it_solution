<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Registerrajal extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table = 'registerrajal';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NomorSEP', 'TanggalMasuk', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost', 'Ruangan'];

    function summaryRegisterRajal($idx)
    {
        $this->dt = $this->db->table('registerrajal');
        $this->dt->where('IdRegisterKunjungan', $idx);
        $this->dt->where('StatusRealisasi', 1);
        $query = $this->dt->get();
        return $query->getResultArray();
    }
}
