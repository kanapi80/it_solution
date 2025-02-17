<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonIGDModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisigd';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaMedisTindakanRvu', 'JasaAsistenRvu', 'JasaAdmRvu', 'jasaAsisten_kebersamaan', 'fpk'];
}
