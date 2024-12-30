<?php

namespace App\Models;

use CodeIgniter\Model;

class FarmasiModel extends Model
{
    protected $DBGroup          = 'master';
    protected $table            = 'depo_layanan_farmasi';
    protected $primaryKey       = 'ID';
    protected $allowedFields    = ['RUANGAN_FARMASI', 'RUANGAN_LAYANAN', 'MULAI', 'SELESAI', 'STATUS'];
}
