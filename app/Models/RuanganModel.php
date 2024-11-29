<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $DBGroup = 'master';
    protected $table = 'ruangan';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['ID', 'JENIS', 'JENIS_KUNJUNGAN', 'DESKRIPSI', 'STATUS'];
}
