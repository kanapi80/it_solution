<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PasienModel;
use \Hermawan\DataTables\DataTable;

class PasienController extends BaseController
{
    protected $pasienmodel;

    public function __construct()
    {
        $this->pasienmodel = new PasienModel();
    }
    public function index()
    {
        return view('Page/pasien');
    }
    public function getPasien($search = null)
    {
        $builder = $this->pasienmodel
            ->select('pasien.GELAR_DEPAN,pasien.NAMA,pasien.GELAR_BELAKANG,
            CONCAT(COALESCE(wilayah.DESKRIPSI, ""), " ",DATE_FORMAT(pasien.TANGGAL_LAHIR, "%d-%m-%Y")) AS TTL,
            FLOOR(DATEDIFF(CURDATE(), pasien.TANGGAL_LAHIR) / 365.25) AS UMUR,kartu_identitas_pasien.NOMOR as KTP,kartu_asuransi_pasien.NOMOR as NOKARTU,
            kontak_pasien.NOMOR as TELPON,
            pasien.NORM, pasien.ALAMAT, pasien.TANGGAL_LAHIR')
            ->join('wilayah', 'pasien.TEMPAT_LAHIR = wilayah.ID AND wilayah.JENIS = 2', 'left')
            ->join('kartu_identitas_pasien', 'pasien.NORM = kartu_identitas_pasien.NORM AND kartu_identitas_pasien.JENIS = 1', 'left')
            ->join('kontak_pasien', 'pasien.NORM = kontak_pasien.NORM AND kontak_pasien.JENIS = 3', 'left')
            ->join('kartu_asuransi_pasien', 'pasien.NORM = kartu_asuransi_pasien.NORM AND kartu_asuransi_pasien.JENIS = 2', 'left');
        // Add search conditions if $search is not empty
        // if (!empty($search)) {
        //     $builder->groupStart()
        //         ->like('pasien.NAMA', $search)
        //         ->orLike('pasien.ALAMAT', $search)
        //         ->orLike('pasien.NORM', $search)
        //         ->groupEnd();
        // }

        // $builder->orderBy('pasien.NORM', 'ASC')
        //     ->orderBy('pasien.NAMA', 'ASC');

        return DataTable::of($builder)->addNumbering()->toJson(true);
    }
}
