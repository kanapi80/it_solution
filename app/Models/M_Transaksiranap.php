<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksiranap extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table = 'transaksiranap';
    protected $primaryKey = 'id';
    // protected $returnType = 'object';
    protected $allowedFields = ['id', 'IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost'];
}
