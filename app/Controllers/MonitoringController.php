<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\RequestController;
use Config\Services;

class MonitoringController extends ResourceController
{
    protected $validator;
    protected $requestService;
    protected $baseUrl;

    public function __construct()
    {
        $this->validator = Services::validation();
        $this->baseUrl = env('VCLAIM_URL') . 'Monitoring';
        $this->requestService = new RequestController();
    }

    public function getDataKunjungan($montglsep, $monjeniskunjungan)
    {
        $endPoint = $this->baseUrl . '/Kunjungan/Tanggal/' . $montglsep . '/JnsPelayanan/' . $monjeniskunjungan;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        log_message('debug', 'Respons API: ' . json_encode($request));

        if (isset($request['status'])) {
            if ($request['status']) {
                if (!empty($request['data'])) {
                    return $this->respond($request, 200);
                } else {
                    log_message('error', 'Data tidak ditemukan: ' . json_encode($request));
                    return $this->respond(['message' => 'Data tidak ditemukan'], 404);
                }
            }
            return $this->respond(['message' => $request['message']], 404);
        }
        return $this->respond(['message' => 'Request tidak valid'], 400);
    }

    public function getHistoryKunjungan($nokartu, $tgl1, $tgl2)
    {
        $endPoint = $this->baseUrl . '/HistoriPelayanan/NoKartu/' . $nokartu . '/tglMulai/' . $tgl1 . '/tglAkhir/' . $tgl2;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        log_message('debug', 'Respons API: ' . json_encode($request));

        if (isset($request['status'])) {
            if ($request['status']) {
                if (!empty($request['data'])) {
                    return $this->respond($request, 200);
                } else {
                    log_message('error', 'Data tidak ditemukan: ' . json_encode($request));
                    return $this->respond(['message' => 'Data tidak ditemukan'], 404);
                }
            }
            return $this->respond(['message' => $request['message']], 404);
        }

        return $this->respond(['message' => 'Request tidak valid'], 400);
    }
    public function getKlaimJasaRaharja($nokartu, $tgl1, $tgl2)
    {
        $endPoint = $this->baseUrl . '/JasaRaharja/JnsPelayanan/' . $nokartu . '/tglMulai/' . $tgl1 . '/tglAkhir/' . $tgl2;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        log_message('debug', 'Respons API: ' . json_encode($request));

        if (isset($request['status'])) {
            if ($request['status']) {
                if (!empty($request['data'])) {
                    return $this->respond($request, 200);
                } else {
                    log_message('error', 'Data tidak ditemukan: ' . json_encode($request));
                    return $this->respond(['message' => 'Data tidak ditemukan'], 404);
                }
            }
            return $this->respond(['message' => $request['message']], 404);
        }

        return $this->respond(['message' => 'Request tidak valid'], 400);
    }
}
