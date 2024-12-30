<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Cppt;
use App\Models\M_Kunjungan;
use App\Models\M_Laboratorium;
use App\Models\M_Radiologi;
use App\Models\M_Sep;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_Resume;
use App\Models\M_Tagihan;
use App\Models\M_Listpasien;
use App\Models\PenunjangModel;
use TCPDF;


class Sep extends BaseController
{
    public function cetakSep($no_SEP = '')
    {
        $model = new M_Sep();
        $no_SEP = $this->request->getPost('no_SEP');
        $data['results'] = $model->getCetakSEP($no_SEP);
        session()->setFlashdata('success', 'Data Tidak Ada !');
        return view('jkn/cetaksep', [
            'results' => $data['results'],
            'no_SEP' => $no_SEP
        ]);
    }
    public function cetakResume($id = '', $nokun = '')
    {
        $model = new M_Resume();
        $id = $this->request->getGet('id');
        $nokun = $this->request->getGet('nokun');
        $data['results'] = $model->getCetakResume($id, $nokun);
        session()->setFlashdata('success', 'Data Tidak Ada !');
        return view('jkn/cetakresume', [
            'results' => $data['results'],
            'id' => $id,
            'nokun' => $nokun

        ]);
    }
    public function cetakBilling($notag = '', $st = '')
    {
        $model = new M_Tagihan();
        $notag = $this->request->getGet('notag');
        $st = $this->request->getGet('st');
        $data['results'] = $model->getCetakBilling($notag, $st);
        if (empty($data['results'])) {
            session()->setFlashdata('error', 'Data Tidak Ada !');
        } else {
            session()->setFlashdata('success', 'Data Tidak ditemukan');
        }
        return view('jkn/cetakbilling', [
            'results' => $data['results'],
            'notag' => $notag,
            'st' => $st
        ]);
    }

    public function cetakRadiologi($idr = '')
    {
        $model = new M_Radiologi();
        $idr = $this->request->getGet('idr');
        $data['results'] = $model->getCetakRadiologi($idr);
        session()->setFlashdata('success', 'Data Tidak Ada !');
        return view('jkn/cetakradiologi', [
            'results' => $data['results'],
            'idr' => $idr
        ]);
    }
    public function cetakLaboratorium($lab1 = '', $lab2 = '')
    {
        $model = new M_Laboratorium();
        $lab1 = $this->request->getGet('lab1');
        $lab2 = $this->request->getGet('lab2');

        $data['results'] = $model->getCetakLaboratorium($lab1, $lab2);
        if (empty($data['results'])) {
            session()->setFlashdata('error', 'Data Tidak Ada !');
        } else {
            session()->setFlashdata('success', 'Data Tidak ditemukan');
        }
        return view('jkn/cetaklaboratorium', [
            'results' => $data['results'],
            'lab1' => $lab1,
            'lab2' => $lab2
        ]);
    }
    //CPPT
    public function cetakCPPT($cppt1 = '', $cppt2 = '')
    {
        $model = new M_Cppt();
        $cppt1 = $this->request->getGet('cppt1');
        $cppt2 = $this->request->getGet('cppt2');
        $data['results'] = $model->getCetakCPPT($cppt1, $cppt2);
        if (empty($data['results'])) {
            session()->setFlashdata('error', 'Data Tidak Ada !');
        } else {
            session()->setFlashdata('success', 'Data Tidak ditemukan');
        }
        // var_dump($data);
        return view('jkn/cetakcppt', [
            'results' => $data['results'],
            'cppt1' => $cppt1,
            'cppt2' => $cppt2
        ]);
    }
    public function printPDF($id = '', $notag = '', $st = '', $nokun = '')
    {
        $model = new M_Resume();
        $sep = new M_Sep();
        $billing = new M_Tagihan();
        $lab = new M_Laboratorium();
        $labs = new M_Laboratorium();
        $rad = new M_Radiologi();
        $cppt = new M_Cppt();
        $cpptm = new M_Cppt();
        $kunjunganModel = new M_Kunjungan();
        $penunjangModel = new PenunjangModel();
        $id = $this->request->getGet('id');
        $notag = $this->request->getGet('notag');
        $lab1 = $this->request->getGet('lab1');
        $lab2 = $this->request->getGet('lab2');
        $idr = $this->request->getGet('idr');
        $no_SEP = $this->request->getGet('no_SEP');
        $st = '1';
        $cppt1 = $this->request->getGet('cppt1');
        $cppt2 = $this->request->getGet('cppt2');
        $nokunValue = $this->request->getGet('nokun');
        $data['resume'] = $model->getCetakResume($id);
        $data['sep'] = $sep->getCetakSEP($no_SEP);
        $data['billing'] = $billing->getCetakBilling($notag, $st);
        $data['lab'] = $lab->getCetakLaboratorium($lab1, $lab2);
        $data['labs'] = $labs->getHasilLaboratorium($nokunValue);
        $data['rad'] = $rad->getCetakRadiologi($idr);
        $data['cppt'] = $cppt->getCetakCPPT($cppt1, $cppt2);
        $data['cpptm'] = $cpptm->getCetakCatatanMedik($cppt1, $cppt2);
        $data['nokun'] = $kunjunganModel->getCetakResumeAdd($nokunValue);
        $data['penunjang'] = $penunjangModel->getGambarPenunjang($no_SEP);
        $data['triase'] = $model->getCetakTriase($nokunValue, $st);
        // Check if data is available

        if (empty($data['resume'])) {
            session()->setFlashdata('error', 'Data Tidak Ada!');
            return redirect()->back();
        }
        // Prepare the HTML content
        $html = view('jkn/pdfcetakresume', $data);
        $html2 = view('jkn/pdfcetaksep', $data);
        $html3 = view('jkn/pdfcetakbilling', $data);
        $html4 = view('jkn/pdfcetaklaboratorium', $data);
        $html5 = view('jkn/pdfcetakradiologi', $data);
        $html6 = view('jkn/pdfcetakcppt', $data);
        $html9 = view('jkn/pdfcetaktriase', $data);
        // $html7 = view('jkn/pdfcetakgambar', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('times', '', 11);
        // QR Code Style
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false,
            'module_width' => 1,
            'module_height' => 1
        );

        if (count($data['sep']) > 0) {
            $pdf->SetMargins(5, 5, 5);
            $pdf->SetAutoPageBreak(TRUE, 1); // Atur auto page break
            $pdf->AddPage('L', array(98, 250));
            $sep = $data['sep'][0];
            $pasien = strtoupper($sep['NAMALENGKAP']);
            $x = 183;
            $y = 72;
            $width = 15;
            $height = 15;
            $pdf->write2DBarcode($pasien, 'QRCODE,L', $x, $y, $width, $height, $style);
            $pdf->writeHTML($html2, true, false, false, false, '');
            $pdf->SetAutoPageBreak(FALSE, 0);
        }

        // // Halaman Pertama (RESUME)
        // $pdf->AddPage('P', array(210, 297));
        // $resume = $data['resume'][0];
        // $dokter = strtoupper($resume['DOKTERDPJP']);
        // $pdf->writeHTML($html, true, false, false, false, '');
        // Halaman Kedua (CPPT)
        // $pdf->AddPage('P',);
        // $cppt = $data['cppt'][0];
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage('P', array(210, 297));
        $pdf->writeHTML($html6, true, false, false, false, '');
        //  // Halaman Kedua (BILLING)
        if (count($data['billing']) > 0) {
            $pdf->AddPage('P');
            $pdf->writeHTML($html3, true, false, false, false, '');
        }
        // Halaman Ketiga (LABORATORIUM)
        if (count($data['lab']) > 0) {
            $pdf->AddPage('P');
            $pdf->SetMargins(10, 10, 10);
            $pdf->SetAutoPageBreak(TRUE, 15);
            $pdf->writeHTML($html4, true, false, false, false, '');
        }
        // Halaman Keempat (RADIOLOGI)
        if (count($data['rad']) > 0) {
            $pdf->AddPage('P');
            $pdf->writeHTML($html5, true, false, false, false, '');
        }
        // Halaman Triase
        if (count($data['triase']) > 0) {
            $pdf->AddPage('P');
            $pdf->writeHTML($html9, true, false, false, false, '');
        }
        if (count($data['penunjang']) > 0) {
            // Nonaktifkan auto page break
            $pdf->SetAutoPageBreak(FALSE, 0);
            foreach ($data['penunjang'] as $row) {
                // Tambah halaman baru untuk setiap gambar
                $pdf->AddPage('P', array(210, 297)); // A4 potret
                // Siapkan path gambar
                $imagePath = '../public/uploads/' . $row['image'];
                // Siapkan HTML untuk gambar
                $html7 = '<div style="text-align: center;">';
                $html7 .= '<img src="' . $imagePath . '" style="max-width: 850px; height:790px;"/>';
                $html7 .= '</div>';

                // Tulis HTML ke PDF
                $pdf->writeHTML($html7, true, false, false, false, '');
            }
        }


        // // Halaman Kelima (SEP)

        // // Output PDF
        $filename = $no_SEP . '.pdf';
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output($filename, 'I');
    }
    public function listPasien($id = '')
    {
        $model = new M_Listpasien();
        $modelpenunjang = new PenunjangModel();
        $id = $this->request->getGet('id');
        $data['results'] = $model->getlistPasien($id);
        $penunjang = $modelpenunjang->getPenunjang($id);
        $searchPerformed = !empty($id);
        $data['penunjang'] = $penunjang;
        session()->setFlashdata('success', 'Data Tidak Ada Pastikan Input No.SEP Valid !');
        return view('jkn/listpasien', [
            'results' => $data['results'],
            'id' => $id,
            'searchPerformed' => $searchPerformed,
            'penunjang' => $penunjang
        ]);
    }
}
