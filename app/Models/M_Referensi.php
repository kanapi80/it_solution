<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Referensi extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table            = 'js_persen';
    protected $primaryKey       = 'id';
    protected $allowedFields     = ['KelompokTindakan', 'Ruang', 'Keterangan'];

    public function getReferensi()
    {
        return $this->where('Keterangan', 'RAWAT INAP')
            ->groupby('KelompokTindakan')
            ->findAll();
    }
}
