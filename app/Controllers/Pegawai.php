<?php

namespace App\Controllers;

use App\Models\M_Pegawai;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;

class Pegawai extends Controller
{
    protected $pegawaimodel;

    public function __construct()
    {
        $this->pegawaimodel = new M_Pegawai();
    }
    public function index()
    {
        return view('Page/pegawai');
    }
    public function pegawai()
    {
        // Mengambil semua data pengguna dari Model M_Pengguna
        $selectpengguna = $this->pegawaimodel->getProfesi();
        // Memasukkan data ke dalam array $data
        $data['selectpengguna'] = $selectpengguna;
        // Menghitung umur dan menambahkannya ke array $data['selectpengguna']
        foreach ($data['selectpengguna'] as &$user) {  // menggunakan referensi & untuk memodifikasi array secara langsung
            $user['age'] = calculate_age($user['TANGGAL_LAHIR']);
        }

        return view('Page/pegawai', $data);
        // return view('Page/pegawai');
    }
    public function getPegawai()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->pegawaimodel
                ->select('pegawai.ID,
                CONCAT(pegawai.GELAR_DEPAN, " ", pegawai.NAMA, ", ", pegawai.GELAR_BELAKANG) AS NAMALENGKAP,
                pegawai.NIP,CONCAT(pegawai.TEMPAT_LAHIR, ",  ", DATE_FORMAT(pegawai.TANGGAL_LAHIR, "%d-%m-%Y")) AS TTL,FLOOR(DATEDIFF(CURDATE(), TANGGAL_LAHIR) / 365.25) AS UMUR,pegawai.kontak_pegawai.NOMOR AS HP,
                pegawai.TEMPAT_LAHIR,pegawai.TANGGAL_LAHIR,pegawai.JENIS_KELAMIN,pegawai.ALAMAT,pegawai.STATUS,pegawai.PROFESI,referensi.DESKRIPSI')
                ->join('referensi', 'pegawai.PROFESI = referensi.ID AND referensi.JENIS = 36', 'left')
                ->join('pegawai.kontak_pegawai', 'pegawai.NIP = pegawai.kontak_pegawai.NIP AND pegawai.kontak_pegawai.JENIS = 3', 'left')
                ->orderBy('pegawai.NAMA', 'Asc');

            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
}
