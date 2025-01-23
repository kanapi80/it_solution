<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Stmt\Return_;
use App\Models\M_Tindakan;
use App\Models\M_Asuransi;
use App\Models\M_Bulan;
use App\Models\M_Referensi;
use App\Models\M_Ruangan;

class Tindakan extends BaseController
{


    public function getTindakan()
    {
        $model = new M_Tindakan();
        $modelAsuransi = new M_Asuransi();
        $modelBulan = new M_Bulan();
        $modelReferensi = new M_Referensi();
        $modelRuangan = new M_Ruangan();
        $data['modelReferensi'] = $modelReferensi->getReferensi();
        $data['modelAsuransi'] = $modelAsuransi->getActivePayments();
        $data['modelRuangan'] = $modelRuangan->getRuangan();
        $namatindakan = $this->request->getPost('namatindakan');

        $kelompoktindakan = $this->request->getPost('kelompoktindakan');
        $asuransi = $this->request->getPost('asuransi');
        // $bulan = $this->request->getGet('bulan');
        $data['modelBulan'] = $modelBulan->getBulan();
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $ruangan = $this->request->getPost('ruangan');
        $fpk = $this->request->getPost('fpk');

        $years = $this->getYears();
        $selectedYear = $this->request->getVar('tahun') ?? '';

        $query = $model->where('KelompokTindakan', $kelompoktindakan);
        // Jika ada pencarian berdasarkan nama, tambahkan sebagai OR kondisi
        if ($namatindakan) {
            $query->Where('NamaTindakan LIKE', "%$namatindakan%");
        }
        if ($asuransi) {
            $query->Where('NamaAsuransi', "$asuransi");
        }
        if ($bulan) {
            $query->Where('Monthout', "$bulan");
        }
        if ($tahun) {
            $query->Where('YearOut', "$tahun");
        }
        if ($ruangan) {
            $query->Where('Poliklinik', "$ruangan");
        }
        if ($fpk) {
            $query->Where('fpk', "$fpk");
        }
        // Ambil hasil query
        $result = $query->findAll();
        session()->setFlashdata('success', 'Data Tidak Ada !');

        return view('sipayu/tindakan', [
            'data' => $result,
            'modelAsuransi' => $data['modelAsuransi'],
            'modelReferensi' => $data['modelReferensi'],
            'modelRuangan' => $data['modelRuangan'],
            'namatindakan' => $namatindakan,
            'kelompoktindakan' => $kelompoktindakan,
            'asuransi' => $asuransi,
            'modelBulan' => $data['modelBulan'],
            'bulan' => $bulan,
            'tahun' => $tahun,
            'years' => $years,
            'ruangan' => $ruangan,
            'fpk' => $fpk,
            'selectedYear' => $selectedYear
        ]);
        return view('sipayu/tindakan', ['data' => $result, 'modelAsuransi' => $data['modelAsuransi'], 'modelBulan' => $data['modelBulan'], 'modelReferensi' => $data['modelReferensi']]);
    }
    public function getYears()
    {
        $currentYear = date('Y');
        $years = [];

        // Menambahkan 10 tahun terakhir ke array
        for ($i = 0; $i < 3; $i++) {
            $years[] = $currentYear - $i;
        }

        return $years;
    }
}
