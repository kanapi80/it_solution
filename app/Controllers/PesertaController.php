<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\RequestController;
use Config\Services;

class PesertaController extends ResourceController
{
    protected $validator;
    protected $requestService;
    protected $baseUrl;

    public function __construct()
    {
        $this->validator = Services::validation();
        $this->baseUrl = env('VCLAIM_URL') . 'Peserta';
        $this->requestService = new RequestController();
    }

    public function getPesertaByNoKartu($noKartu)
    {
        $today = date('Y-m-d');
        $endPoint = $this->baseUrl . '/nokartu/' . $noKartu . '/tglSEP/' . $today;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        if (isset($this->request)) {
            if ($request['status']) return $this->respond($request, 200);
            return $this->respond($request, 404);
        } else {
            if ($request['status']) return ['result' => $request, 'status' => true];
            return ['result' => $request, 'status' => false];
        }
    }

    public function getPesertaByNIK($nik)
    {
        $today = date('Y-m-d');
        $endPoint = $this->baseUrl . '/nik/' . $nik . '/tglSEP/' . $today;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        if (isset($this->request)) {
            if ($request['status']) return $this->respond($request, 200);
            return $this->respond($request, 404);
        } else {
            if ($request['status']) return ['result' => $request, 'status' => true];
            return ['result' => $request, 'status' => false];
        }
    }
}
