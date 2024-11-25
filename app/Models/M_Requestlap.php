<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Requestlap extends Model
{
    protected $DBGroup          = 'laporan';
    protected $table            = 'request_report';
    protected $primaryKey       = 'ID';
    protected $allowedField     = ['STATUS'];
}
