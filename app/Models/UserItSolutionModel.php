<?php

namespace App\Models;

use CodeIgniter\Model;

class UserItSolutionModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'firstname', 'lastname', 'email', 'locationname'];

    public function getAllAdmin($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($id);
            return $query = $builder->get();
        }
    }
}
