<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'IdAdmin';
    protected $returnType = 'array';
    protected $allowedFields = ['IdAdmin', 'NamaAdmin', 'UserName', 'Password', 'Level', 'Status', 'Tupoksi', 'Foto'];
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
