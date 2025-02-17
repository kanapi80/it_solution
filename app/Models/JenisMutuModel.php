<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisMutuModel extends Model
{
    protected $DBGroup          = 'simutayu';
    protected $table            = 'm_jenis';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'nama'];

    public function getJenisMutu()
    {
        return $this->findAll();
    }
}
