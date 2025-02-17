<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonFarmasiModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisfarmasi';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu',  'JasaAsistenRvu', 'JasaAdmRvu', 'JasaPelayanan', 'PundiRemunRvu', 'MonthOut', 'YearOut', 'fpk', 'AsalPelayanan'];
}
