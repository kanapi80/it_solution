<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonRajalModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisrajal';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaMedisTindakanRvu', 'JasaAsistenRvu', 'JasaAdmRvu', 'jasaAsisten_kebersamaan', 'fpk'];
}
