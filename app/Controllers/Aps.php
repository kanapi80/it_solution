<?php

namespace App\Controllers;

use App\Models\M_Aps;
use CodeIgniter\Controller;
use App\Models\M_Pembayaran;
use App\Models\M_Penjualan;

class Aps extends Controller
{
    protected $DbGroup = 'penjualan';
    public function getstatusAps()
    {
        $model = new M_Aps();
        $notag = $this->request->getGet('notag');
        $data = $model->getAps($notag);

        if (empty($data)) {
            session()->setFlashdata('error', 'Data Tidak Ada!');
        }

        return view('problem/Aps', [
            'data' => $data,
            'notag' => $notag
        ]);
    }

    public function unLunas()
    {
        $notag = $this->request->getGet('notag');
        if ($notag) {
            $model = new M_Pembayaran();
            $modelaps = new M_Penjualan();
            try {
                $update = $model->update($notag, ['STATUS' => 1]);
                $update = $modelaps->update($notag, ['STATUS' => 1]);
                if ($update) {

                    session()->setFlashdata('success', 'Transaksi Berhasil dibatalkan');
                    return redirect()->to('problem/getstatusAps? notag=' . $notag);
                } else {
                    echo "Update failed";
                    print_r($model->errors());
                }
            } catch (\Exception $e) {
                echo "Exception caught: " . $e->getMessage();
            }
        } else {
            echo "Invalid request";
        }
    }
}
