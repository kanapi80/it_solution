<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPejuangModel extends Model
{
    protected $DBGroup          = 'sipejuang';
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['id', 'nama'];

    public function getKordinator()
    {
        $query = $this->select("users.id, users.nama")
            ->join('roles rol', 'users.id = rol.user_id')
            ->where('rol.name', 'Koordinator')
            ->get();
        return $query->getResultArray();
    }
}
