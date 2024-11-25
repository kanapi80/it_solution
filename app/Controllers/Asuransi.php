<?php

namespace App\Controllers;

use App\Models\M_Asuransi;
use CodeIgniter\Controller;

class Asuransi extends Controller
{
    public function index()
    {
        $model = new M_Asuransi();
        $data['asuransi'] = $model->getAll(); // Mengambil semua data asuransi dari model

       // return view('asuransi/index', $data); // Mengirim data ke view
    }
}