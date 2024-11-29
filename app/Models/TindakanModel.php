<?php

namespace App\Models;

use CodeIgniter\Model;

class TindakanModel extends Model
{
    protected $DBGroup = 'master';
    protected $table = 'tindakan';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['ID', 'JENIS', 'NAMA',  'STATUS'];
}
