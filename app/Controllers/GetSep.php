<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \LZCompressor\LZString;


class GetSep extends BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = service('curlrequest', ['timeout' => env('REQUEST_TIMEOUT')]);
    }
    public function index()
    {
        return view('vclaim/seppersonal');
    }
    public function Signature()
    {
        $data = "31373";
        $secretKey = "9xP3B76CC4";
        // Computes the timestamp
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        // Computes the signature by hashing the salt with the secret key as the key
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);

        // base64 encode�
        $encodedSignature = base64_encode($signature);
        return view('vclaim/signature', compact('data', 'tStamp', 'encodedSignature'));

        // urlencode�
        // $encodedSignature = urlencode($encodedSignature);

        // echo "X-cons-id: " . $data . " ";
        // echo "<br>";
        // echo "X-timestamp:" . $tStamp . " ";
        // echo "<br>";
        // echo "X-signature: " . $encodedSignature;
    }

    public function sendRequest($method, $url, $body = null)
    {
        $signature = $this->generateSignature();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => $method != 'GET' ? 'application/x-www-form-urlencoded' : 'application/json',
                'x-cons-id' => env('CONS_ID'),
                'x-timestamp' => $signature['t'],
                'x-signature' => $signature['s'],
                'user_key' => env('USER_KEY')
            ]
        ];
        if (isset($body)) {
            $data = [
                'body' => $body
            ];
            $options = array_merge($options, $data);
        }

        // return $url;

        try {
            $response = $this->client->request($method, $url, $options);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $body = $response->getBody();
                $result = json_decode($body);
                if (isset($result->metaData)) {
                    if ($result->metaData->code == "200") {
                        $key = env('CONS_ID') . env('SECRET_KEY') . $signature['t'];
                        if ($result->response != null) $data = $this->stringDecrypt($key, $result->response);
                        return [
                            'status' => true,
                            'message' => $result->metaData->message,
                            'data' => $data ?? null,
                        ];
                    } else {
                        return [
                            'status' => false,
                            'message' => $result->metaData->message,
                        ];
                    }
                }
            }

            return [
                'status' => false,
                'message' => 'Request Failed',
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e
            ];
        }
    }

    public function sendAntreanRequest($method, $url, $body = null)
    {
        $signature = $this->generateSignature();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => $method != 'GET' ? 'application/x-www-form-urlencoded' : 'application/json',
                'x-cons-id' => env('CONS_ID'),
                'x-timestamp' => $signature['t'],
                'x-signature' => $signature['s'],
                'user_key' => env('USER_KEY_ANTROL')
            ]
        ];
        if (isset($body)) {
            $data = [
                'body' => $body
            ];
            $options = array_merge($options, $data);
        }

        try {
            $response = $this->client->request($method, $url, $options);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $body = $response->getBody();
                $result = json_decode($body);
                if (isset($result->metadata)) {
                    if ($result->metadata->code == "200") {
                        $key = env('CONS_ID') . env('SECRET_KEY') . $signature['t'];
                        if (isset($result->response) && $result->response != null) $data = $this->stringDecrypt($key, $result->response);
                        return [
                            'status' => true,
                            'message' => $result->metadata->message,
                            'data' => $data ?? null,
                        ];
                    } else {
                        return [
                            'status' => false,
                            'message' => $result->metadata->message,
                        ];
                    }
                }
            }

            return [
                'status' => false,
                'message' => 'Request Failed',
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e
            ];
        }
    }

    private function generateSignature()
    {
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', env('CONS_ID') . "&" . $tStamp, env('SECRET_KEY'), true);
        $encodedSignature = base64_encode($signature);
        return [
            't' => $tStamp,
            's' => $encodedSignature
        ];
    }

    private function stringDecrypt($key, $ciphertext)
    {
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($ciphertext), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        $result = LZString::decompressFromEncodedURIComponent($output);
        return json_decode($result);
    }
}
