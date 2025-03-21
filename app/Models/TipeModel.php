<?php

namespace App\Models;

use CodeIgniter\Model;

class TipeModel extends Model
{
    protected $DBGroup          = 'simutayu';
    protected $table            = 'm_tipe';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['id', 'nama'];

    public function getTipe()
    {
        return $this->findAll();
    }
}
