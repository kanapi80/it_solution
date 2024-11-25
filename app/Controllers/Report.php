<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_Report;

class Report extends BaseController
{
    public function getReport()
    {
        $model = new M_Report();
        $id = $this->request->getGet('id');
        $data = $model->getRep($id);

        if (empty($data)) {
            session()->setFlashdata('error', 'Data Tidak Ada!');
        }

        return view('problem/report', [
            'data' => $data,
            'id' => $id
        ]);
        // echo view('problem/report');
    }
    public function unReport()
    {
        $model = new M_Report();
        $id = $this->request->getGet('id');
        $data = [
            'STATUS' => 0
        ];
        // Memperbarui field STATUS di record dengan ID yang diberikan
        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data sudah diupdate!');
            return redirect()->to('problem/getReport?id=' . $id . ''); // Ganti dengan URL form yang sesuai
        } else {
            session()->setFlashdata('error', 'Data tidak ada!');
            return redirect()->to('problem/getReport'); // Ganti dengan URL form yang sesuai
        }
    }
}
