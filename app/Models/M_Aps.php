<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Aps extends Model
{
    protected $DBGroup = 'penjualan';
    protected $table = 'penjualan';
    protected $primaryKey = 'NOMOR';
    protected $allowedField = ['STATUS'];

    public function getAps($notag)
    {
        // Koneksi ke database penjualan
        $dbPenjualan = \Config\Database::connect('penjualan');
        $builder = $dbPenjualan->table('penjualan')
            ->select('penjualan.*, pembayaran.tagihan.TOTAL, pembayaran.tagihan.TANGGAL, pembayaran.tagihan.STATUS, aplikasi.pengguna.NAMA, master.ruangan.DESKRIPSI as RUANGAN')
            ->join('pembayaran.tagihan', 'pembayaran.tagihan.ID = penjualan.NOMOR', 'left')
            ->join('pembayaran.pembayaran_tagihan', 'pembayaran.pembayaran_tagihan.TAGIHAN = penjualan.NOMOR', 'left')
            ->join('aplikasi.pengguna', 'aplikasi.pengguna.ID = pembayaran.pembayaran_tagihan.OLEH', 'left')
            ->join('master.ruangan', 'master.ruangan.ID = penjualan.penjualan.RUANGAN', 'left')
            // ->where('penjualan.STATUS', 2)
            ->where('penjualan.NOMOR', $notag);
        // Mengambil semua hasil
        return $builder->get()->getResultArray();
    }
}
