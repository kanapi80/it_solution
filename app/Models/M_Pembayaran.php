<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pembayaran extends Model
{
    protected $DBGroup = 'pembayaran';
    protected $table            = 'tagihan';
    protected $primaryKey       = 'ID';
    protected $allowedFields    = ['STATUS'];
}
