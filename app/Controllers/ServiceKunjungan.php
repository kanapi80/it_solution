<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Client;

class ServiceKunjungan extends Controller
{
    public function getDataKunjungan()
    {
        $client = \Config\Services::curlrequest();
        $url = "http://192.168.121.9/webservice/pendaftaran/kunjungan";

        $params = [
            'params'      => [
                'STATUS'    => 1,
                'REFERENSI' => json_encode([
                    "Ruangan" => [
                        "COLUMNS" => ["DESKRIPSI", "JENIS_KUNJUNGAN"],
                        "REFERENSI" => ["Referensi" => true]
                    ],
                    "Pendaftaran"    => true,
                    "Referensi"      => true,
                    "RuangKamarTidur" => true,
                    "DPJP"           => true,
                    "Mutasi"         => true
                ]),
                'page'  => 1,
                'start' => 0,
                'limit' => 25
            ]
        ];
        try {
            $response = $client->request('GET', $url, ['query' => $params]);
            $data = json_decode($response->getBody(), true);
            // dd($response);
            // return json_encode($data);
            // Debugging: Lihat isi response dari API
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            exit();
        } catch (\Exception $e) {
            $data = ['error' => 'Gagal mengambil data dari API: ' . $e->getMessage()];
        }

        // return view('api/view_kunjungan', ['data' => $data]);
    }


    // public function getDataKunjungan()
    // {
    //     $url = "http://192.168.71.2/webservice/pendaftaran/kunjungan?_dc=" . time() . "&STATUS=1&REFERENSI=...&page=1&start=0&limit=25";

    //     $response = file_get_contents($url);
    //     $data = json_decode($response, true);

    //     return $this->response->setJSON($data);
    // }
}
