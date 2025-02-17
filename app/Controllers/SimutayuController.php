<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JenisMutuModel;
use App\Models\IndikatorMutuModel;
use App\Models\TransMutuModel;

class SimutayuController extends BaseController
{
    protected $modeljenismutu;
    protected $modelindikatormutu;
    protected $modeltransindikatormutu;

    public function __construct()
    {
        $this->modeljenismutu = new JenisMutuModel();
        $this->modelindikatormutu = new IndikatorMutuModel();
        $this->modeltransindikatormutu = new TransMutuModel();
    }
    public function index()
    {
        // $id = $this->request->getPost('id');
        // $nama_jenis = $this->request->getPost('nama_jenis');
        // $data['detindikator'] = $this->modelindikatormutu->getIndikatorId($id);
        $data['mutus'] = $this->modeljenismutu->getJenisMutu();
        $data['mutu'] = $this->modelindikatormutu->getIndikatorMutuById();
        $data['indikator'] = $this->modelindikatormutu->getIndikatorMutu();
        // $data['jenisNama'] = $nama_jenis;
        return view('simutayu/form_munas', $data);
    }
    public  function inputMunas()
    {
        $id = $this->request->getPost('id');
        $unit_id = $this->request->getPost('unit_id');
        $jenis_id = $this->request->getPost('jenis_id');
        $nama_jenis = $this->request->getPost('nama_jenis');
        $data['mutus'] = $this->modeljenismutu->getJenisMutu();
        $data['mutu'] = $this->modelindikatormutu->getIndikatorMutuById();
        $data['indikator'] = $this->modelindikatormutu->getIndikatorMutu();
        $data['detindikator'] = $this->modelindikatormutu->getIndikatorId($id);
        // $data['getindikator'] = $this->modelindikatormutu->getIndikatorGet($id = null, $unit_id = null, $jenis_id = null);

        $data['getindikator'] = $this->modelindikatormutu->getIndikatorGet($id, $unit_id, $jenis_id);

        // Debug sebelum mengirim ke view
        // echo "<pre>";
        // print_r($data['getindikator']);
        // echo "</pre>";
        // exit;

        $data['unit_id'] = $unit_id;
        $data['jenis_id'] = $jenis_id;
        $data['nama_jenis'] = $nama_jenis;
        // $tanggal = [
        //     "2024-01-01",
        //     "2024-02-01",
        //     "2024-03-01",
        //     "2024-04-01",
        //     "2024-05-01",
        //     "2024-06-01",
        //     "2024-07-01",
        //     "2024-08-01",
        //     "2024-09-01",
        //     "2024-10-01",
        //     "2024-11-01",
        //     "2024-12-01"
        // ];

        // $data['tanggal'] = $tanggal;
        // print_r($data['getindikator']);
        // exit;
        return view('simutayu/input_munas', $data);
    }
    public function getIndikatorById($id)
    {
        $indikator = $this->modelindikatormutu->getIndikatorById($id);

        if ($indikator) {
            return $this->response->setJSON($indikator);
        } else {
            return $this->response->setJSON(['status' => false, 'message' => 'Data tidak ditemukan']);
        }
    }
    public function getTransIndikator()
    {
        $request = service('request');
        $tgl_tran = $request->getVar('tgl_tran');
        $unit_id = $request->getVar('unit_id');
        $indikator_id = $request->getVar('indikator_id');
        $start = (int) $request->getVar('start');
        $length = (int) $request->getVar('length');
        $draw = $request->getVar('draw');

        if (empty($tgl_tran)) {
            return $this->response->setJSON([
                'data' => [],
                'message' => 'Tanggal Penilaian tidak dipilih. Data tidak ditampilkan.'
            ]);
        }
        // Load Model
        $builder = $this->modeltransindikatormutu
            ->select('trn_indikator.indikator_id, trn_indikator.tgl_tran, trn_indikator.keterangan, trn_indikator.num, trn_indikator.denum, trn_indikator.user_id, 
           ROUND((trn_indikator.num / trn_indikator.denum) * 100, 2) AS hasil')
            ->orderBy('trn_indikator.tgl_tran', 'DESC');
        if (!empty($unit_id)) {
            $builder->where('trn_indikator.user_id', $unit_id);
        }
        if (!empty($tgl_tran)) {
            $builder->where('DATE_FORMAT(trn_indikator.tgl_tran, "%Y-%m")', $tgl_tran);
        }
        if (!empty($indikator_id)) {
            $builder->where('trn_indikator.indikator_id', $indikator_id);
        }
        $totalRecords = $this->modeltransindikatormutu->countAllResults(false); // false agar tidak dihitung hasil query
        $data = $builder->orderBy('trn_indikator.indikator_id', 'DESC')
            ->limit($length, $start)
            ->get()
            ->getResultArray();
        $filteredRecords = $this->modeltransindikatormutu->countAllResults(false);
        return $this->response->setJSON([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }
    // public function getTransIndikator()
    // {
    //     $request = service('request');
    //     $tgl_tran = $request->getVar('tgl_tran');
    //     $unit_id = $request->getVar('unit_id');
    //     $indikator_id = $request->getVar('indikator_id');

    //     $start = (int) $request->getVar('start', FILTER_SANITIZE_NUMBER_INT); // Mulai dari data ke berapa
    //     $length = (int) $request->getVar('length', FILTER_SANITIZE_NUMBER_INT); // Jumlah data per halaman
    //     $draw = (int) $request->getVar('draw', FILTER_SANITIZE_NUMBER_INT); // Untuk tracking request DataTables

    //     if (empty($tgl_tran)) {
    //         return $this->response->setJSON([
    //             'draw' => $draw,
    //             'recordsTotal' => 0,
    //             'recordsFiltered' => 0,
    //             'data' => []
    //         ]);
    //     }

    //     // Query utama tanpa limit (untuk menghitung total data)
    //     $builder = $this->modeltransindikatormutu
    //         ->select('trn_indikator.indikator_id, trn_indikator.tgl_tran, trn_indikator.keterangan, trn_indikator.num, trn_indikator.denum, trn_indikator.user_id');
    //     // ->orderBy('trn_indikator.tgl_tran', 'DESC'); // Hanya ambil ID untuk count
    //     if (!empty($unit_id)) {
    //         $builder->where('trn_indikator.user_id', $unit_id);
    //     }
    //     if (!empty($tgl_tran)) {
    //         $builder->where('DATE_FORMAT(trn_indikator.tgl_tran, "%Y-%m")', $tgl_tran);
    //     }
    //     $totalData = $builder->countAllResults(); // Hitung total data setelah filter

    //     // Query utama dengan filter & pagination
    //     $builder = $this->modeltransindikatormutu
    //         ->select('trn_indikator.indikator_id, trn_indikator.tgl_tran, trn_indikator.keterangan, trn_indikator.num, trn_indikator.denum, trn_indikator.user_id');

    //     if (!empty($unit_id)) {
    //         $builder->where('trn_indikator.user_id', $unit_id);
    //     }
    //     if (!empty($tgl_tran)) {
    //         $builder->where('DATE_FORMAT(trn_indikator.tgl_tran, "%Y-%m")', $tgl_tran);
    //     }

    //     // Pagination: Batasi jumlah data yang dikembalikan sesuai permintaan DataTables
    //     if ($length != -1) { // -1 berarti tampilkan semua
    //         $builder->limit($length, $start);
    //     }

    //     $data = $builder->orderBy('trn_indikator.tgl_tran', 'DESC')->get()->getResultArray();
    //     // orderBy('trn_indikator.tgl_tran', 'DESC');

    //     return $this->response->setJSON([
    //         'draw' => $draw,
    //         'recordsTotal' => $totalData, // Total semua data tanpa filter
    //         'recordsFiltered' => $totalData, // Bisa diubah jika ada pencarian
    //         'data' => $data
    //     ]);
    // }

    //GRAFIK
    public function getGrafikData()
    {
        $request = service('request');
        $tgl_tran = $request->getVar('tgl_tran');
        $unit_id = $request->getVar('unit_id');
        $indikator_id = $request->getVar('indikator_id');

        if (empty($tgl_tran)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tanggal Penilaian tidak dipilih.'
            ]);
        }

        $builder = $this->modeltransindikatormutu
            ->select('DAY(trn_indikator.tgl_tran) AS tanggal, ROUND((trn_indikator.num / trn_indikator.denum) * 100, 2) AS hasil')
            ->where('DATE_FORMAT(trn_indikator.tgl_tran, "%Y-%m")', $tgl_tran)
            ->orderBy('trn_indikator.tgl_tran', 'ASC');

        if (!empty($unit_id)) {
            $builder->where('trn_indikator.user_id', $unit_id);
        }
        if (!empty($indikator_id)) {
            $builder->where('trn_indikator.indikator_id', $indikator_id);
        }

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
