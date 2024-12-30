<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $DBGroup = 'penjamin_rs';
    protected $table = 'dpjp';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['PENJAMIN', 'DPJP_PENJAMIN', 'DPJP_RS', 'TANGGAL', 'STATUS'];
}
