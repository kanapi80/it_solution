<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\RequestController;
use App\Models\IcdModel;
use Config\Services;


class SepController extends ResourceController
{
    protected $validator;
    protected $requestService;
    protected $baseUrl;
    protected $icd;

    public function __construct()
    {
        $this->validator = Services::validation();
        $this->baseUrl = env('VCLAIM_URL') . 'SEP';
        $this->requestService = new RequestController();
        $this->icd = new IcdModel();
    }
    public function getSepPelayanan($nomorsep)
    {
        $endPoint = $this->baseUrl . '/' . $nomorsep;
        $request = $this->requestService->sendRequest('GET', $endPoint);
        if (isset($this->request)) {
            if ($request['status']) {
                //JOIN dg Master
                $diagnosa = $request['data']->diagnosa ?? null;
                $diagnosaresult = $this->icd->getCodeICD($diagnosa); //get icd result
                if ($diagnosaresult) {
                    $request['data']->codes = $diagnosaresult['CODE'];
                }
                return $this->respond($request, 200);
            }
            return $this->respond($request, 404);
        } else {
            if ($request['status']) return ['result' => $request, 'status' => true];
            return ['result' => $request, 'status' => false];
        }
    }
}
