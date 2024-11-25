<?php

namespace App\Controllers;

use App\Models\M_Pengguna;
use CodeIgniter\Controller;

class Pengguna extends Controller
{
    public function pengguna()
    {
        $model = new M_Pengguna();
        // Mengambil semua data pengguna dari Model M_Pengguna
        $selectpengguna = $model->getPenggunaWithProfile();
        // Memasukan data ke dalam array $data
        $data['selectpengguna'] = $selectpengguna;
        //Memasukan data aray $data ke dalam view
        // return view('Page/pengguna', $data);
    }
    public function penggunaRuangan()
    {
        $model = new M_Pengguna();
        // Mengambil semua data pengguna dari Model M_Pengguna
        $selectpenggunaruangan = $model->getPenggunaRuangan();
        // Memasukan data ke dalam array $data
        $data['selectpenggunaruangan'] = $selectpenggunaruangan;
        //Memasukan data aray $data ke dalam view
        return view('Page/pengguna', $data);
    }
}
