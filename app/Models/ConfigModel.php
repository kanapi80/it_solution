<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $DBGroup          = 'aplikasi';
    protected $table            = 'properti_config';
    protected $primaryKey       = 'ID';
    protected $allowedFields    = ['ID', 'NAMA', 'VALUE', 'DESKRIPSI', 'JENIS'];

    public function getpropertitte($id)
    {
        $query = $this->db->query("CALL aplikasi.jkn_monitoringTTE(?)", [$id]);
        return $query->getResultArray();
    }
}
