<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'locationcode', 'locationname', 'level', 'foto', 'id_imut', 'id_pejuang', 'status'];

    public function getAdmin($id = false)
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
