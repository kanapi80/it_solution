<?php

namespace App\Models;

use CodeIgniter\Model;

class IcdModel extends Model
{
    protected $DBGroup          = 'master';
    protected $table            = 'mrconso';
    protected $primaryKey       = 'CUI';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    public function getCodeICD($diagnosa)
    {
        $data = $this->where('STR', $diagnosa)->first();
        return $data;
    }
}
