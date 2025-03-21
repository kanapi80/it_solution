<?php

namespace App\Models;

use CodeIgniter\Model;

class TTEModel extends Model
{
    protected $DBGroup            = 'tte';
    protected $table            = 'logs';
    protected $primaryKey       = 'ID';
    protected $allowedFields    = ['ID', 'TANGGAL', 'OLEH', 'STATUS_CODE', 'RESPONSE'];

    public function getMonitoringtte()
    {
        $query = $this->db->query("CALL tte.jkn_tte()");
        return $query->getResultArray();
    }
}
