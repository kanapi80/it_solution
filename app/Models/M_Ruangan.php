<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Ruangan extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table            = 'js_ruang';
    protected $primaryKey       = 'id';
    protected $allowedFields     = ['DESKRIPSI', 'KETERANGAN'];

    public function getRuangan()
    {
        return $this->where('KETERANGAN', 'RAWAT INAP')
            // ->groupby('KelompokTindakan')
            ->findAll();
    }

    public function getRawatJalan()
    {
        return $this->where('KETERANGAN', 'RAWAT JALAN')
            // ->groupby('KelompokTindakan')
            ->findAll();
    }
}
