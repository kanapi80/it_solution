<?php


namespace App\Models;

use CodeIgniter\Model;

class M_Asuransi extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'payment'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['paymentname', 'status'];
    public function getAll()
    {
        return $this->findAll(); // Mengambil semua data dari tabel asuransi
    }
    public function getActivePayments()
    {
        return $this->whereIn('status', [1, 2])->findAll();
    }
    public function getjaspel()
    {
        return $this->where('status', 2)->findAll();
    }
}
