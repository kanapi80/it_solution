<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Modul extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['NAMA', 'LEVEL', 'DESKRIPSI'];
}
