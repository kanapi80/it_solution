<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $DBGroup = 'master';
    protected $table = 'pasien';
    protected $primaryKey = 'NORM';
    protected $returnType = 'array';
    protected $allowedFields = ['NORM', 'NAMA', 'TANGGAL_LAHIR',  'ALAMAT', 'GELAR_DEPAN', 'GELAR_BELAKANG', 'STATUS'];
}
