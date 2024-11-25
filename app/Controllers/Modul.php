<?php 

namespace App\Controllers;

use App\Models\M_Modul;
use CodeIgniter\Controller;

class Modul extends Controller
{
    public function Modul()
    {
        $model = new M_Modul();
        
        // Mengambil semua data pengguna
        $selectmodul = $model->findAll();
        
        // Debugging
        if (empty($selectmodul)) {
            log_message('error', 'Tidak ada data pengguna ditemukan.');
        } else {
            log_message('info', 'Data pengguna ditemukan: ' . print_r($selectmodul, true));
        }
        
        // Mengirim data ke view
        $data['selectmodul'] = $selectmodul;
        
        return view('Page/modul', $data);
        
    }
}
