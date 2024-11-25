<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PenunjangModel;
use \Hermawan\DataTables\DataTable;
// use CodeIgniter\Images\Image;
use Intervention\Image\ImageManagerStatic as Image;




class ImageUpload extends Controller
{
    public function index()
    {
        //return view('jkn/listpasien');
    }

    // public function upload()
    // {
    //     $database = \Config\Database::connect();
    //     $gambar = $database->table('penunjang');
    //     $pesan = 'Silahkan Pilih File';

    //     foreach ($this->request->getFileMultiple('gambar') as $file) {
    //         if ($file->isValid()) {
    //             $file->move(WRITEPATH . '../public/uploads');
    //             $data = [
    //                 'nosep' => $this->request->getPost('nosep'),
    //                 'image' => $file->getClientName(),
    //                 'jenis' => $file->getClientMimeType(),
    //                 'date' => date('Y-m-d H:i:s')
    //             ];
    //             $gambar->insert($data);
    //             $pesan = 'File berhasil disimpan';
    //         }
    //     }
    //     session()->setFlashdata('success', $pesan);
    //     $id = $this->request->getPost('nosep');
    //     return redirect()->to('jkn/listpasien?id=' . $id);
    // }
    public function upload()
    {
        $database = \Config\Database::connect();
        $gambar = $database->table('penunjang');
        $pesan = 'Silahkan Pilih File';

        foreach ($this->request->getFileMultiple('gambar') as $file) {
            if ($file->isValid()) {
                // Menghasilkan nama file baru dengan timestamp
                $newName = time() . '_' . $file->getRandomName(); // Atau gunakan $file->getClientName()
                $file->move(WRITEPATH . '../public/uploads', $newName);

                $data = [
                    'nosep' => $this->request->getPost('nosep'),
                    'image' => $newName, // Simpan nama file yang baru
                    'jenis' => $file->getClientMimeType(),
                    'date' => date('Y-m-d H:i:s')
                ];
                $gambar->insert($data);
                $pesan = 'File berhasil disimpan';
            }
        }

        session()->setFlashdata('success', $pesan);
        $id = $this->request->getPost('nosep');
        $st = $this->request->getPost('ranap');
        if ($st == 1) {
            return redirect()->to('jkn/listpasienranap?id=' . $id);
        }
        return redirect()->to('jkn/listpasien?id=' . $id);
    }


    public function getGambar()
    {
        $customerModel = new PenunjangModel();
        $customerModel->select('id, nosep, image, jenis');

        return DataTable::of($customerModel)->toJson();
    }
    public function delGambar($id)
    {
        $userModel = new PenunjangModel();
        $user = $userModel->find($id);

        if ($user !== null) { // Periksa apakah $user ditemukan
            if (isset($user['image'])) { // Periksa apakah kunci 'image' ada
                $foto = $user['image'];
                if ($foto && file_exists(WRITEPATH . '../public/uploads/' . $foto)) {
                    unlink(WRITEPATH . '../public/uploads/' . $foto);
                }
                $userModel->delete($id);
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data Berhasil dihapus']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Kunci "image" tidak ditemukan']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }
}
