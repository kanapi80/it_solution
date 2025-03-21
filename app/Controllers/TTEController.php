<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use App\Models\InacbgModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TTEModel;


class TTEController extends BaseController
{
    protected $modelmonitoring;
    protected $modelconfig;
    protected $modelinacbg;

    public function __construct()
    {
        $this->modelmonitoring = new TTEModel();
        $this->modelconfig = new ConfigModel();
        $this->modelinacbg = new InacbgModel();
    }
    public function index()
    {
        $data['tte'] = $this->modelmonitoring->getMonitoringtte();
        $data['configtte'] = $this->modelconfig->getpropertitte(87);
        if (!empty($data['configtte'])) {
            $data['configtte'] = (array) $data['configtte'][0]; // Ambil hanya baris pertama
        } else {
            $data['configtte'] = []; // Jika kosong, set array kosong
        }
        return view('problem/monitoring_tte', $data);
    }
    public function UpdateBridging()
    {
        $db = \Config\Database::connect('aplikasi');
        $id = 87; // Gantilah sesuai kebutuhan

        try {
            // Cek apakah ID ada dan apakah VALUE dalam format JSON
            $queryCheck = $db->query("SELECT VALUE FROM aplikasi.properti_config WHERE ID = ?", [$id]);
            $result = $queryCheck->getRow();

            if (!$result) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'ID not found.'
                ]);
            }

            // Periksa apakah VALUE adalah JSON valid
            $jsonData = json_decode($result->VALUE, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'VALUE is not valid JSON.'
                ]);
            }
            // Toggle nilai "enabled" (jika true jadi false, jika false jadi true)
            $newStatus = isset($jsonData['enabled']) && $jsonData['enabled'] === true ? "false" : "true";
            $query = "UPDATE aplikasi.properti_config 
            SET VALUE = JSON_SET(CAST(VALUE AS JSON), '$.enabled', CAST(? AS JSON)) 
            WHERE ID = ?";
            $db->query($query, [$newStatus, $id]);

            if ($db->affectedRows() > 0) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Status updated successfully.',
                    'new_status' => $newStatus // Kirim status baru ke frontend
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No rows updated. Please check the ID value.'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function monitoringJKN()
    {
        $data['jkn'] = $this->modelinacbg->getHarian();
        return view('problem/monitoring_jkn', $data);
    }
}
