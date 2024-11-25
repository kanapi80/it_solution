<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Registerigd extends Model
{
    protected $DBGroup = 'sipayu';
    
    protected $table = 'registerigd';
    protected $primaryKey = 'id';
    // protected $returnType = 'object';
    protected $allowedFields = ['id','IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien','NamaAsuransi','NomorSEP','StatusRealisasi','NilaiRealisasi','NilaiRealCost'];

  

}
