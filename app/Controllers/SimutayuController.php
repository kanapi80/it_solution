<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JenisMutuModel;
use App\Models\IndikatorMutuModel;
use App\Models\TipeModel;
use App\Models\TransMutuModel;

class SimutayuController extends BaseController
{
    protected $modeljenismutu;
    protected $modelindikatormutu;
    protected $modeltransindikatormutu;
    protected $modeltipe;

    public function __construct()
    {
        $this->modeljenismutu = new JenisMutuModel();
        $this->modelindikatormutu = new IndikatorMutuModel();
        $this->modeltransindikatormutu = new TransMutuModel();
        $this->modeltipe = new TipeModel();
    }
    public function index()
    {

        $data['mutus'] = $this->modeljenismutu->getJenisMutu();
        $data['mutu'] = $this->modelindikatormutu->getIndikatorMutuById();
        $data['indikator'] = $this->modelindikatormutu->getIndikatorMutu();
        $data['tipe'] = $this->modeltipe->getTipe();
        // dd($data); // Debug data sebelum dikirim ke view
        return view('simutayu/form_munas', $data);
    }
    public  function inputMunas()
    {
        $id = $this->request->getPost('id');
        $unit_id = $this->request->getPost('unit_id');
        $jenis_id = $this->request->getPost('jenis_id');
        $nama_jenis = $this->request->getPost('nama_jenis');
        $jenis = $this->request->getPost('jenis');
        $data['mutus'] = $this->modeljenismutu->getJenisMutu();
        $data['mutu'] = $this->modelindikatormutu->getIndikatorMutuById();
        $data['indikator'] = $this->modelindikatormutu->getIndikatorMutu();
        $data['detindikator'] = $this->modelindikatormutu->getIndikatorId($id);
        $data['getindikator'] = $this->modelindikatormutu->getIndikatorGet($id, $unit_id, $jenis_id);
        $data['unit_id'] = $unit_id;
        $data['jenis_id'] = $jenis_id;
        $data['nama_jenis'] = $nama_jenis;

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

    //GRAFIK
    public function getGrafikData()
    {
        $request = service('request');

        if (empty($tgl_tran)) {
            $tgl_tran = date('Y-m');
        }

        $tgl_tran = $request->getVar('tgl_tran');
        $unit_id = $request->getVar('unit_id');
        $indikator_id = $request->getVar('indikator_id');

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
    //SIMPAN DATA 
    public function simpanData()
    {
        $indikator_id = $this->request->getPost('id_mutu');
        $tgl_tran = $this->request->getPost('tgl_penilaian');
        $user_id = $this->request->getPost('idu');
        $nama_jenis = $this->request->getPost('jenis');
        $unit_id = $this->request->getPost('id');
        $jenis_id = $this->request->getPost('jenis_id');

        // Validasi input
        if (empty($indikator_id) || empty($tgl_tran)) {
            return redirect()->back()->with('error', 'Data tidak lengkap.');
        }
        // Cek apakah data sudah ada berdasarkan indikator_id dan user_id
        $existingData = $this->modeltransindikatormutu
            ->where('indikator_id', $indikator_id)
            ->where('tgl_tran', $tgl_tran)
            ->where('user_id', $user_id)
            ->first();

        $data = [
            'indikator_id' => $indikator_id,
            'tgl_tran' => $tgl_tran,
            'keterangan' => $this->request->getPost('keterangan'),
            'num' => $this->request->getPost('nemurator'),
            'denum' => $this->request->getPost('denumerator'),
            'user_id' => $user_id
            // 'tgl_edit' => date('Y-m-d H:i:s')
        ];

        if ($existingData) {
            // Jika data sudah ada, lakukan update berdasarkan indikator_id dan user_id
            $data['tgl_edit'] = date('Y-m-d H:i:s');
            $this->modeltransindikatormutu
                ->where('indikator_id', $indikator_id)
                ->where('tgl_tran', $tgl_tran)
                ->where('user_id', $user_id)
                ->set($data)
                ->update();
            $message = 'Data berhasil diperbarui';
        } else {
            // Jika tidak ada, lakukan insert
            $data['tgl_add'] = date('Y-m-d H:i:s');
            $this->modeltransindikatormutu->insert($data);
            $message = 'Data berhasil disimpan';
        }

        $id =  $indikator_id;
        $unit_id = $unit_id;
        $jenis_id = $jenis_id;
        $nama_jenis = $nama_jenis;
        $data['indikator'] = $this->modelindikatormutu->getIndikatorMutu();
        $data['getindikator'] = $this->modelindikatormutu->getIndikatorGet($id, $unit_id, $jenis_id);
        $data['unit_id'] = $unit_id;
        $data['jenis_id'] = $jenis_id;
        $data['nama_jenis'] = $nama_jenis;
        session()->setFlashdata('success', $message);

        return view('simutayu/input_munas', $data);
    }
    public function hapusData()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getPost('user_id');
            $indikator_id = $this->request->getPost('indikator_id');
            $tgl_tran = $this->request->getPost('tgl_tran');
            $delete = $this->modeltransindikatormutu->where([
                'user_id' => $user_id,
                'indikator_id' => $indikator_id,
                'tgl_tran' => $tgl_tran
            ])->delete();

            if ($delete) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error']);
            }
        }
    }
    public function getDataById()
    {
        $user_id      = $this->request->getGet('user_id');
        $indikator_id = $this->request->getGet('indikator_id');
        $tgl_tran     = $this->request->getGet('tgl_tran');
        // Validasi parameter
        if (!$user_id || !$indikator_id || !$tgl_tran) {
            return $this->response->setJSON([
                "status"  => "error",
                "message" => "Parameter tidak lengkap"
            ]);
        }
        $data = $this->modeltransindikatormutu->where([
            'user_id'      => $user_id,
            'indikator_id' => $indikator_id,
            'tgl_tran'     => $tgl_tran
        ])->first();
        if ($data) {
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON([
                "status"  => "error",
                "message" => "Data tidak ditemukan"
            ]);
        }
    }

    public function UpdateIndikator()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id'               => 'required|numeric',
            // 'judul'            => 'required',
            'tujuan'           => 'required',
            'definisi'         => 'required',
            'inklusi'          => 'required',
            'eksklusi'         => 'required',
            'numerator'        => 'required',
            'denumerator'      => 'required',
            'frekuensi'        => 'required',
            'periode'          => 'required',
            'tipe'             => 'required',
            'sumber_data'      => 'required',
            'penanggung_jawab' => 'required',
            'standar'          => 'required',
            'status'           => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        $data = [
            // 'judul'            => $this->request->getPost('judul'),
            'tujuan'           => $this->request->getPost('tujuan'),
            'definisi'         => $this->request->getPost('definisi'),
            'inklusi'          => $this->request->getPost('inklusi'),
            'eksklusi'         => $this->request->getPost('eksklusi'),
            'tipe_id'        => $this->request->getPost('tipe'),
            'frekuensi'        => $this->request->getPost('frekuensi'),
            'periode_analisa'  => $this->request->getPost('periode'),
            'num'        => $this->request->getPost('numerator'),
            'denum'      => $this->request->getPost('denumerator'),
            'sumber_data'      => $this->request->getPost('sumber_data'),
            'nama_pj' => $this->request->getPost('penanggung_jawab'),
            'standar'          => $this->request->getPost('standar'),
            'stat'           => $this->request->getPost('status')
        ];

        $id = $this->request->getPost('id');
        // dd($data);

        $update = $this->modelindikatormutu->update($id, $data);

        if ($update) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data.']);
        }
    }
    public function DeleteIndikator($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid.');
        }
        $indikator = $this->modelindikatormutu->find($id);
        if (!$indikator) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
        $newStatus = ($indikator['st_indikator'] == "1") ? "0" : "1";
        $update = $this->modelindikatormutu->update($id, ['st_indikator' => $newStatus]);
        if ($update) {
            return redirect()->back()->with('success', 'Status indikator berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }
}
