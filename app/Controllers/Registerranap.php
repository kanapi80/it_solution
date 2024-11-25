<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Asuransi;
use App\Models\M_Kebersamaan;
use App\Models\M_Registerranap;
use App\Models\M_Transaksiranap;
use Config\Database;

class Registerranap extends Controller
{

    protected $DBGroup = 'sipayu';

    public function __construct()
    {
        // Menginisialisasi database
        $this->db = Database::connect();

        // // Cek koneksi database
        // if ($this->db) {
        //     echo "Database connected successfully!";
        // } else {
        //     echo "Failed to connect to the database.";
        // }
    }
    public function registerranap()
    {
        $model = new M_Registerranap();
        // Mengambil semua data pengguna dari Model M_Pengguna
        $selectregister = $model->limit(1000)->findAll();
        // Memasukkan data ke dalam array $data
        $data['selectregister'] = $selectregister;
        // Memasukkan data array $data ke dalam view
        return view('sipayu/registerranap', $data);
    }
    public function cariranap()
    {
        $model = new M_Registerranap();
        $modelAsuransi = new M_Asuransi();
        $data['modelAsuransi'] = $modelAsuransi->getActivePayments();
        $id = $this->request->getGet('id');
        $nama = $this->request->getGet('nama');
        $asuransi = $this->request->getGet('asuransi');
        $idreg = $this->request->getGet('idreg');
        $query = $model->where('IdRegisterKunjungan', $id);
        // Jika ada pencarian berdasarkan nama, tambahkan sebagai OR kondisi
        if ($nama) {
            $query->orWhere('NamaPasien LIKE', "%$nama%");
        }
        if ($asuransi) {
            $query->Where('NamaAsuransi', "$asuransi");
        }
        // Ambil hasil query
        $result = $query->findAll();
        session()->setFlashdata('success', 'Data Tidak Ada !');

        return view('sipayu/registerranap', [
            'data' => $result,
            'modelAsuransi' => $data['modelAsuransi'],
            'id' => $id,
            'nama' => $nama,
            'asuransi' => $asuransi,
            'idreg' => $idreg
        ]);
        return view('sipayu/registerranap', ['data' => $result, 'modelAsuransi' => $data['modelAsuransi']]);
    }
    public function update()
    {
        $id = $this->request->getGet('id');
        if ($id) {
            $model = new M_Registerranap();
            $model->update($id, [
                'StatusRealisasi' => 4,
                'NilaiRealCost' => 0
            ]);
            echo "<script>
            alert('Data updated successfully');
            function goBack() {
                history.go(-2);
            }
            goBack();
          </script>";
        } else {
            return redirect()->to('sipayu/cari?' . $query)
                ->with('success', 'Data updated successfully');
            redirect()->back()->with('error', 'Invalid parameters');
        }
    }
    public function delete()
    {
        // Mendapatkan ID dari request
        $id = $this->request->getGet('id');
        // Pastikan $id tidak null atau kosong
        if ($id) {
            $model = new M_Registerranap();
            $modeltransaksi = new M_Transaksiranap();
            $model->where('IdRegisterKunjungan', $id)->delete();
            // $modeltransaksi->delete($id);
            $modeltransaksi->where('IdRegisterKunjungan', $id)->delete();
            echo "<script>
            alert('Data Deleted successfully');
            function goBack() {
                history.go(-2);
            }
            goBack();
          </script>";
        } else {
            // Tangani kasus ketika $id tidak valid
            return redirect()->back()->with('error', 'Invalid ID');
        }
    }
}
