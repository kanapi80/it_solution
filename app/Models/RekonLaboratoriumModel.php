<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonLaboratoriumModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedislab';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaAsistenRvu', 'fpk'];
}
