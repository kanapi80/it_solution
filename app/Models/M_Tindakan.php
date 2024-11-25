<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Tindakan extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisranap';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NomorSEP', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost', 'NamaTindakan', 'KelompokTindakan', 'JasaAsistenRvu'];
}
