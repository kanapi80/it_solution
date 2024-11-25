<?php


namespace App\Models;

use CodeIgniter\Model;

class M_Bulan extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'month'; // Nama tabel di database
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['month'];

    public function getBulan()
    {
        return $this->findAll(); // Mengambil semua data dari tabel asuransi
    }
   
   
}
