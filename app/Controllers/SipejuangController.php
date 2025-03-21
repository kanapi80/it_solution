<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use \Hermawan\DataTables\DataTable;
use App\Models\PengajuanModel;
use App\Models\DetilPengajuanModel;
use App\Models\BarangsModel;
use App\Models\UserPejuangModel;

class SipejuangController extends BaseController
{
    protected $validate;
    protected $pengajuanmodel;
    protected $detilpengajuanmodel;
    protected $barangmodel;
    protected $usermodel;
    protected $session;

    public function  __construct()
    {
        $this->pengajuanmodel = new PengajuanModel();
        $this->detilpengajuanmodel = new DetilPengajuanModel();
        $this->barangmodel = new BarangsModel();
        $this->usermodel = new UserPejuangModel();
        $this->validate = Services::validation();
        $this->session = session();
    }
    public function index()
    {
        return view('sipejuang/listpengajuan');
    }

    public function getListPengajuan()
    {
        if ($this->request->isAJAX()) {
            $order = $this->request->getGet('order');
            $columns = ['pengajuan.id', 'pengajuan.jenis_pengajuan', 'tgl_pengajuan',  'pptk', 'jenis', 'pengajuan.status'];
            // $ruangan = $this->session->get('Ses_pejuang');
            $ruangan_id = $this->session->get('Ses_Pejuang');
            $builder = $this->pengajuanmodel
                ->select('pengajuan.id, pengajuan.jenis_pengajuan, 
                     DATE_FORMAT(pengajuan.created_at, "%d-%m-%Y") AS tgl_pengajuan, 
                     kor.nama AS kordinator, 
                     pptk.nama AS pptk, 
              GROUP_CONCAT(DISTINCT barang.jenis ORDER BY barang.jenis ASC SEPARATOR ", ") AS jenis,
                     pengajuan.koordinator_id, 
                     pengajuan.pptk_id, 
                     pengajuan.status')
                ->join('users kor', 'pengajuan.koordinator_id = kor.id', 'left')
                ->join('users pptk', 'pengajuan.pptk_id = pptk.id', 'left')
                ->join('detail_pengajuan', 'pengajuan.id = detail_pengajuan.pengajuan_id', 'left')
                ->join('barang', 'detail_pengajuan.barang_id = barang.id', 'left')
                // ->where('pengajuan.ruangan_id', $this->session->get('Ses_Pejuang'))
                ->where('pengajuan.ruangan_id', $ruangan_id)
                ->where('pengajuan.status!=', 'Barang Diterima Ruangan')
                ->groupBy('pengajuan.id, kor.nama, pptk.nama, pengajuan.jenis_pengajuan, pengajuan.created_at, pengajuan.koordinator_id, pengajuan.pptk_id, pengajuan.status');
            // ->orderBy('pengajuan.created_at', 'desc');
            if ($order) {
                $columnIndex = $order[0]['column']; // Index kolom yang di-sort
                $columnSortOrder = $order[0]['dir']; // ASC atau DESC
                $builder->orderBy($columns[$columnIndex], $columnSortOrder);
            } else {
                // Default orderBy ketika pertama kali load
                $builder->orderBy('pengajuan.id', 'DESC');
            }
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
    public function RiwayatPengajuan()
    {
        return view('sipejuang/riwayatpengajuan');
    }
    public function getRiwayatPengajuan()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->pengajuanmodel
                ->select('pengajuan.id, pengajuan.jenis_pengajuan, 
                     pengajuan.created_at,  
                     DATE_FORMAT(pengajuan.created_at, "%d-%m-%Y") AS tgl_pengajuan,  
                     kor.nama AS kordinator, 
                     pptk.nama AS pptk,  
                     GROUP_CONCAT(DISTINCT barang.jenis ORDER BY barang.jenis ASC SEPARATOR ", ") AS jenis,  
                     pengajuan.koordinator_id,  
                     pengajuan.pptk_id,  
                     pengajuan.status')
                ->join('users kor', 'pengajuan.koordinator_id = kor.id', 'LEFT')
                ->join('users pptk', 'pengajuan.pptk_id = pptk.id', 'LEFT')
                ->join('detail_pengajuan', 'pengajuan.id = detail_pengajuan.pengajuan_id', 'LEFT')
                ->join('barang', 'detail_pengajuan.barang_id = barang.id', 'LEFT')
                ->where('pengajuan.ruangan_id', $this->session->get('Ses_Pejuang'))
                ->where('pengajuan.status', 'Barang Diterima Ruangan')
                ->groupBy('pengajuan.id, kor.nama, pptk.nama, pengajuan.jenis_pengajuan, pengajuan.created_at, pengajuan.koordinator_id, pengajuan.pptk_id, pengajuan.status');
            // ->orderBy('pengajuan.created_at', 'desc'); // Pastikan kolom ini ada

            return DataTable::of($builder)
                ->add('tgl_pengajuan', function ($row) {
                    return date('d-m-Y', strtotime($row->created_at)); // Formatting di PHP
                })
                ->addNumbering()
                ->toJson(true);
        }
    }


    public function getDetilPengajuan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id');
            $builder = $this->detilpengajuanmodel
                ->select('detail_pengajuan.*, IFNULL(keterangan, "") as keterangan, detail_pengajuan.jumlah_diminta,detail_pengajuan.sisa_stok,
                detail_pengajuan.jumlah_disetujui_koordinator, detail_pengajuan.jumlah_disetujui,detail_pengajuan.keterangan_koordinator, detail_pengajuan.keterangan_pptk,
                detail_pengajuan.keterangan,detail_pengajuan.keterangan_farmasi,
                barang.nama_barang AS barang, barang.jenis, barang.satuan')
                ->join('barang', 'detail_pengajuan.barang_id = barang.id')
                ->where('detail_pengajuan.pengajuan_id', $id);
            return DataTable::of($builder)->addNumbering('DT_RowIndex')->toJson(true);
        }
    }



    public function getdetilHibah()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id');
            $builder = $this->detilpengajuanmodel
                ->select('detail_pengajuan.*')
                ->where('detail_pengajuan.pengajuan_id', $id);

            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
    public function getHibahSelect($id)
    {
        // $id = $this->request->getGet('id');
        $result = $this->pengajuanmodel->getPengajuanId($id);
        if (!$result) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Penyedia tidak ditemukan.'
            ])->setStatusCode(404);
        }
        return $this->response->setJSON($result);
    }
    public function FormPengajuan()
    {
        $data['jenis'] = $this->barangmodel->getKategori();
        $data['kordinator'] = $this->usermodel->getKordinator();
        return view('sipejuang/formpengajuan', $data);
    }

    public function getBarang()
    {
        if ($this->request->isAJAX()) {
            $search = strtolower($this->request->getPost('value')); // Ambil data dengan POST

            $barang = $this->barangmodel
                ->select('id, nama_barang, satuan')
                ->like('nama_barang', $search, 'both') // LIKE tidak case-sensitive di MySQL (jika collation benar)
                ->findAll();

            return $this->response->setJSON($barang);
        }
    }
    public function SavePengajuan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'kordinator' => 'required',
            ]);

            // Debugging: cek data yang dikirim
            log_message('error', json_encode($this->request->getPost()));

            if (!$validation->run($this->request->getPost())) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => $validation->getErrors()
                ])->setStatusCode(404);
            }

            try {
                $oleh = $this->request->getPost('ruangan_id');
                if (empty($oleh)) {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'User tidak memiliki akses valid.'
                    ])->setStatusCode(403);
                }

                $data = [
                    'jenis_pengajuan' => 'Barang',
                    'ruangan_id' => $this->request->getPost('ruangan_id'),
                    'koordinator_id' => $this->request->getPost('kordinator'),
                    'status' => 'Pengajuan ke Koordinator',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                // Debugging: cek apakah data benar sebelum insert
                log_message('error', json_encode($data));

                $items = $this->request->getPost('items');
                if (empty($items)) {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Item barang belum dipilih'
                    ])->setStatusCode(404);
                }

                $this->pengajuanmodel->insert($data);
                $this->simpanPemesananBarangDetil($this->pengajuanmodel->getInsertID(), $items);

                return $this->response->setJSON([
                    'status' => true,
                    'message' => 'Input Pengajuan berhasil disimpan!',
                    'data' => $data,
                ])->setStatusCode(200);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => $e->getMessage()
                ])->setStatusCode(500);
            }
        }
    }

    public function simpanPemesananBarangDetil($idPemesanan, $items)
    {
        try {
            $data = [];
            foreach ($items as $item) {
                $data[] = [
                    'pengajuan_id' => $idPemesanan,
                    'barang_id' => $item['namaBarang'] ?? 0,
                    'jumlah_diminta' => $item['isiBox'] ?? 0,
                    'sisa_stok' => $item['stok'] ?? 0,
                    'keterangan' => $item['keterangan'] ?? 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                // Update stok untuk setiap barang
                // $this->BarangRuanganModel->updateStok($item['namaBarang'], $item['jmlhPsn']);
                // Update status Hibah
                // $this->HibahModel->update($idPemesanan, ['STATUS' => 2, 'OLEH' => $this->session->get('ID')]);
            }
            // Insert data
            $this->detilpengajuanmodel->insertBatch($data);
            $stok = [];
            foreach ($items as $item) {
                //Select ID
                $barangruangan = $this->barangmodel->select('barang.id')
                    ->where('barang.id', $item['namaBarang'])
                    ->first();

                //Select ID
                $hibahid = $this->detilpengajuanmodel->select('detail_pengajuan.id')
                    ->where('detail_pengajuan.id', $idPemesanan)
                    ->where('detail_pengajuan.barang_id', $item['namaBarang'])
                    ->first();

                // $stok[] = [
                //     'ID' => $this->hibahstokModel->generateId($idPemesanan),
                //     'BARANG_RUANGAN' => $barangruangan['ID'] ?? 0,
                //     'JENIS' => 55,
                //     'REF' => $hibahid['ID'] ?? 0,
                //     'TANGGAL' => $this->setDateFormat($this->request->getPost('TANGGAL')) . ' ' . date('H:i:s'),
                //     'JUMLAH' => $item['jmlhPsn'] ?? 0,
                //     // 'STOK' => 0,
                // ];
            }
            // var_dump($stok, $data);
            // $this->hibahstokModel->insertBatch($stok);
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function HapusPengajuan($id = null)
    {
        $request = service('request');

        // Jika metode GET, ambil ID dari parameter URL
        if ($id === null) {
            $id = $request->getPost('id');
        }

        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID tidak ditemukan']);
        }

        $data = $this->pengajuanmodel->find($id);
        if (!$data) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }

        if ($this->pengajuanmodel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data']);
        }
    }
    public function DashboardPengajuan()
    {
        $ruangan_id = $this->session->get('Ses_Pejuang');
        $data['top'] = $this->pengajuanmodel->getTopBarangByRuangan($ruangan_id);
        return view('sipejuang/dashboardpengajuan', $data);
    }
    public function countPengajuanByStatus()
    {
        $ruangan_id = $this->session->get('Ses_Pejuang');
        $tahun_sekarang = date('Y');

        // Hitung jumlah all ajuan
        $all = $this->pengajuanmodel
            ->where('ruangan_id', $ruangan_id)
            ->like('created_at', $tahun_sekarang, 'after')
            // ->where('status', 'Barang Ready')
            ->countAllResults();
        // Hitung jumlah status "Barang Ready"
        $barang_ready = $this->pengajuanmodel
            ->where('ruangan_id', $ruangan_id)
            ->like('created_at', $tahun_sekarang, 'after')
            // ->where('status', 'Barang Ready')
            ->whereIn('status', ['Barang Ready', 'Barang Diterima Ruangan'])
            ->countAllResults();

        // Hitung jumlah status LIKE "Pengajuan%"
        $pengajuan = $this->pengajuanmodel
            ->where('ruangan_id', $ruangan_id)
            ->like('created_at', $tahun_sekarang, 'after')
            ->like('status', 'Pengajuan', 'after')
            ->countAllResults();

        // Hitung jumlah status LIKE "Ditolak%"
        $ditolak = $this->pengajuanmodel
            ->where('ruangan_id', $ruangan_id)
            ->like('created_at', $tahun_sekarang, 'after')
            ->like('status', 'Ditolak', 'after')
            ->countAllResults();

        // Return data dalam bentuk JSON
        return $this->response->setJSON([
            'barang_ready' => $barang_ready,
            'pengajuan' => $pengajuan,
            'ditolak' => $ditolak,
            'all' => $all
        ]);
    }


    public function getGrafikPengajuan($ruangan_id)
    {
        $tahun = date('Y');

        // Menggunakan Query Builder dari Model
        $query = $this->pengajuanmodel->select("MONTH(created_at) AS bulan, COUNT(id) AS jumlah")
            ->where("ruangan_id", $ruangan_id)
            ->where("YEAR(created_at)", $tahun)
            ->groupBy("bulan")
            ->orderBy("bulan", "ASC")
            ->findAll(); // Gunakan findAll() untuk mendapatkan array hasil query

        // Mapping angka bulan ke nama bulan
        $nama_bulan = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];

        foreach ($query as &$row) {
            $row['bulan'] = $nama_bulan[$row['bulan']] ?? 'Tidak Diketahui';
        }

        return $this->response->setJSON([
            'status' => true,
            'data' => $query
        ]);
    }
}
