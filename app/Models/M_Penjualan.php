<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penjualan extends Model
{
    protected $DBGroup = 'penjualan';
    protected $table            = 'penjualan';
    protected $primaryKey       = 'NOMOR';
    protected $allowedFields    = ['STATUS'];
}
