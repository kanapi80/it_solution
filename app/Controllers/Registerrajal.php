<?php

namespace App\Controllers;

use App\Models\M_Registerrajal;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;


class Registerrajal extends Controller
{

    protected $registermodel;
    public function __construct()
    {
        $this->registermodel = new M_Registerrajal();
    }
    public function registerrajal()
    {
        // Mengambil semua data pengguna dari Model M_Pengguna
        $selectregister = $this->registermodel->limit(1000)->findAll();
        // Memasukan data ke dalam array $data
        $data['selectregister'] = $selectregister;
        //Memasukan data aray $data ke dalam view
        return view('sipayu/registerrajal', $data);
    }
    public function getRegisterrajal()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->registermodel
                ->select('IdRegisterKunjungan, TanggalMasuk,NomorRekamMedis, NamaPasien, NamaAsuransi, NomorSEP, Ruangan')
                ->orderBy('IdRegisterKunjungan', 'DESC')
                ->orderBy('NamaPasien', 'Asc');
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
}
