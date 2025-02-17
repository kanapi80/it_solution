<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonRadiologiModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisrad';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaAsistenRvu', 'fpk'];
}
