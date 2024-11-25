<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksiigd extends Model
{
    protected $DBGroup = 'sipayu';
    
    protected $table = 'transaksiigd';
    protected $primaryKey = 'id';
    // protected $returnType = 'object';
    protected $allowedFields = ['id','IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien','NamaAsuransi','StatusRealisasi','NilaiRealisasi','NilaiRealCost'];

  

}
