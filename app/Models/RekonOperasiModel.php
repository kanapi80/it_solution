<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonOperasiModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisoperasi';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisDokterRvu', 'JasaMedisDokterAnestesiRvu', 'JasaMedisPerawatBedahRvu', 'JasaMedisPenataAnestesiRvu', 'JasaAdmRvu', 'jasaAsisten_kebersamaan', 'fpk'];
}
