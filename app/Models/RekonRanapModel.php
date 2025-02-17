<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonRanapModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisranap';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaMedisTindakanRvu', 'JasaAsistenRvu', 'JasaAdmRvu', 'jasaAsisten_kebersamaan', 'fpk'];
}
