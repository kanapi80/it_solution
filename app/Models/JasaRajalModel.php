<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaRajalModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'js_rajal';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NamaRuangan', 'NamaTindakan', 'KelompokTindakan', 'JasaRS', 'JasaPelaksana', 'JasaMedis', 'JasaMedisUmum', 'JasaParamedis', 'JasaKebersamaan'];
}
