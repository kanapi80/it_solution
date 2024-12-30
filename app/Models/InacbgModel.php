<?php

namespace App\Models;

use CodeIgniter\Model;

class InacbgModel extends Model
{

    protected $DBGroup          = 'inacbg';
    protected $table            = 'grouping';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['NOPEN', 'DATA'];
}
