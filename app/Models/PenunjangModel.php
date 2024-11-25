<?php

namespace App\Models;

use CodeIgniter\Model;

class PenunjangModel extends Model
{
    protected $table = 'penunjang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nosep', 'jenis', 'image'];

    public function getPenunjang($id)
    {
        // $id = $this->request->getPost('id');
        if ($id) {
            return $this->where('nosep', $id)->findAll();
        }
        return $this->findAll();
    }

    public function getGambarPenunjang($no_SEP)
    {
        // $id = $this->request->getPost('id');
        if ($no_SEP) {
            return $this->where('nosep', $no_SEP)->findAll();
        }
        return $this->findAll();
    }
}
