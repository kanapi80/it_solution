<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_Report;
use App\Models\InacbgModel;


class Report extends BaseController
{
    protected $inacbgmodel;

    public function __construct()
    {
        $this->inacbgmodel = new InacbgModel();
    }
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
    public function getDataNull()
    {
        return view('problem/dataisnull');
    }
    public function updateGrouping()
    {
        // Load database
        $db = \Config\Database::connect('inacbg');

        // Ambil parameter dari query string
        $nopen = $this->request->getGet('nopen');

        // Validasi input
        if (!$nopen) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'NOPEN is required.'
            ]);
        }

        try {
            // Query to execute
            $query = "UPDATE inacbg.grouping
                       SET DATA = JSON_SET(
                           JSON_SET(JSON_SET(DATA, '$.status', 0), '$.verifikasiRM', 0), 
                           '$.aktifitas_berkas', JSON_ARRAY()
                       )
                       WHERE NOPEN = ?";

            // Execute query with binding
            $db->query($query, [$nopen]);

            // Check affected rows
            if ($db->affectedRows() > 0) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Data updated successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No rows updated. Please check the NOPEN value.'
                ]);
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
