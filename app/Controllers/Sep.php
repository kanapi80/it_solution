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
use App\Models\M_Medicalrecord;
use Endroid\QrCode\Builder\Builder;
use App\Models\InacbgModel;



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
        $rehabmedik = new M_Medicalrecord();
        $lip = new InacbgModel();
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
        $kd_kelas = $this->request->getGet('kd_kelas');
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
        $data['rehab'] = $rehabmedik->getrehabmedik($nokunValue);
        $data['lip'] = $lip->getCetakLIP($id, $kd_kelas);
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
        $triase = view('jkn/pdfcetaktriase', $data);
        $rehab = view('jkn/pdfcetakrehabmedik', $data);
        $lip = view('jkn/pdfcetaklip', $data);
        // $html7 = view('jkn/pdfcetakgambar', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('times', '', 11);
        // QR Code Style
        // $style = array(
        //     'border' => 0,
        //     'vpadding' => 'auto',
        //     'hpadding' => 'auto',
        //     'fgcolor' => array(0, 0, 0),
        //     'bgcolor' => false,
        //     'module_width' => 1,
        //     'module_height' => 1
        // );

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
            $qrSize = 10;
            $pdf->write2DBarcode($pasien, 'QRCODE,L', $x, $y, $width, $qrSize);
            $pdf->writeHTML($html2, true, false, false, false, '');
            $pdf->SetAutoPageBreak(FALSE, 0);
        }

        // Halaman Pertama (RESUME)
        // $pdf->AddPage('P', array(210, 297));
        // $resume = $data['resume'][0];
        // $dokter = strtoupper($resume['DOKTERDPJP']);
        // $pdf->writeHTML($resume, true, false, false, false, '');
        //--------------------------------------------------------------
        // Halaman Pertama (LIP)
        // $pdf->AddPage('P', array(216, 356)); //Legal
        if (count($data['lip']) > 0) {
            $pdf->AddPage('P', array(210, 297)); //A4
            $pdf->SetFont('helvetica', '', 9);
            $pdf->writeHTML($lip, true, false, false, false, '');
        }
        // END LIP
        if (count($data['cppt']) > 0) {
            $pdf->AddPage('P', array(210, 290));
            $pdf->SetLeftMargin(8);
            $pdf->SetRightMargin(8);
            $pdf->writeHTML('<div style="padding-left: 20px;">' . $html6 . '</div>', true, false, false, false, '');
            $pdf->SetFont('times', 'B', 9);
            $pdf->SetLeftMargin(10);

            // **Dapatkan total lebar halaman tanpa margin**
            $pageWidth = $pdf->GetPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;

            // **Set lebar kolom agar totalnya = 100% halaman**
            $colTanggal   = $pageWidth * 0.12;
            $colPelaksana = $pageWidth * 0.12;
            $colHasil     = $pageWidth * 0.42;
            $colInstruksi = $pageWidth * 0.24;
            $colQR        = $pageWidth * 0.15;

            // **Header Tabel**
            $pdf->Cell($colTanggal, 11, 'TANGGAL', 1, 0, 'C');
            $pdf->Cell($colPelaksana, 11, 'PELAKSANA', 1, 0, 'C');

            // **HASIL ASSESSMENT pakai MultiCell**
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell($colHasil, 11, "HASIL ASSESSMENT\nPENATALAKSANAAN PASIEN/SOAP", 1, 'C');
            $pdf->SetXY($x + $colHasil, $y);

            $pdf->Cell($colInstruksi, 11, 'INSTRUKSI', 1, 0, 'C');
            $pdf->Cell($colQR, 11, 'PROFESI & DPJP', 1, 1, 'C');
            $pdf->SetFont('times', '', 9);

            // **Loop Data Tabel**
            foreach ($data['cppt'] as $row) {
                $tanggal   = $row['TANGGAL'];
                $pelaksana = $row['JNSPPA'];
                $hasil     = html_entity_decode(strip_tags($row['CATATAN']));
                $instruksi = html_entity_decode(strip_tags($row['INSTRUKSI']));
                $dokter    = $row['DOKTER']; // Nama dokter untuk QR
                $perawat   = $row['PERAWAT']; // Nama Perawat/DPJP
                $pelaksana == "P" ? "PERAWAT" : "DOKTER";
                $profesi = $row['DOKTER'] . $row['PERAWAT'];

                $lineHeight = 5;
                $height1 = $lineHeight * $pdf->getNumLines($tanggal, $colTanggal);
                $height2 = $lineHeight * $pdf->getNumLines($pelaksana, $colPelaksana);
                $height3 = $lineHeight * $pdf->getNumLines($hasil, $colHasil);
                $height4 = $lineHeight * $pdf->getNumLines($instruksi, $colInstruksi);
                $heightQR = 22; // Lebih besar agar cukup untuk QR & DPJP

                $rowHeight = max($height1, $height2, $height3, $height4, $heightQR, 15);

                if ($pdf->GetY() + $rowHeight > $pdf->GetPageHeight() - 15) {
                    $pdf->AddPage();
                }

                $startX = $pdf->GetX();
                $startY = $pdf->GetY();

                $pdf->MultiCell($colTanggal, $rowHeight, $tanggal, 1, 'C', 0, 0);
                $pdf->SetXY($startX + $colTanggal, $startY);
                $pdf->MultiCell($colPelaksana, $rowHeight, $pelaksana, 1, 'L', 0, 0);
                $pdf->SetXY($startX + $colTanggal + $colPelaksana, $startY);
                $pdf->MultiCell($colHasil, $rowHeight, $hasil, 1, 'L', 0, 0);
                $pdf->SetXY($startX + $colTanggal + $colPelaksana + $colHasil, $startY);
                $pdf->MultiCell($colInstruksi, $rowHeight, $instruksi, 1, 'L', 0, 0);

                // **Kolom QR Code**
                $pdf->SetXY($startX + $colTanggal + $colPelaksana + $colHasil + $colInstruksi, $startY);
                $pdf->Cell($colQR, $rowHeight, '', 1, 0, 'C');

                // **Posisi QR Code**
                $qrSize = 8; // Ukuran QR lebih besar
                $qrX = $startX + $colTanggal + $colPelaksana + $colHasil + $colInstruksi + ($colQR - $qrSize) / 2;
                $qrY = $startY + 2; // QR diletakkan di atas

                $pdf->write2DBarcode($dokter, 'QRCODE,L', $qrX, $qrY, $qrSize, $qrSize);

                // **Tampilkan Nama DPJP di bawah QR**
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($startX + $colTanggal + $colPelaksana + $colHasil + $colInstruksi, $qrY + $qrSize + 2); // Pastikan posisi tepat di bawah QR
                // $pdf->Cell($colQR, 5, $profesi, 0, 0, 'C'); // Gunakan Cell agar tidak terpotong
                $pdf->MultiCell($colQR, 11, $profesi, 0, 'C');

                // **Pindah ke baris berikutnya**
                $pdf->SetY($startY + $rowHeight);
            }
        }



        // // $cppt = $data['cppt'][0];
        // $pdf->SetMargins(10, 10, 10);
        // $pdf->AddPage('P', array(210, 297));
        // $pdf->writeHTML($html6, true, false, false, false, '');
        // Halaman Kedua (BILLING)
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
            $pdf->AddPage('P', array(210, 310)); //A4
            $dt = $data['triase'][0];
            $perawat = strtoupper($dt['NAMA_LENGKAP']);
            $x = 153;
            $y = 270;
            $width = 15;
            $height = 15;
            $pdf->write2DBarcode($perawat, 'QRCODE,L', $x, $y, $width, $height);
            $pdf->writeHTML($triase, true, false, false, false, '');
        }
        // Halaman RehabMedik
        if (count($data['rehab']) > 0) {
            $pdf->AddPage('P');
            $dok = $data['rehab'][0];
            $dokter = strtoupper($dok['DPJP']);
            $x = 164.5;
            $y = 220;
            $width = 15;
            $height = 15;
            $pdf->writeHTML($rehab, true, false, false, false, '');
            $pdf->write2DBarcode($dokter, 'QRCODE,L', $x, $y, $width, $height);
            $pdf->SetFont('times', '', 8);
            $pdf->SetXY($x - 6, $y + $height + 0.5);
            $pdf->Text($x - 6, $y + $height + 0.5, $dokter);
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
    //ID dari db->laporan->tb->request_report
    public static function toUUIDEncode($id)
    {
        $ids = explode('-', $id);
        if (count($ids) != 5 || strlen($id) != 36) return "";
        $ids[0] = strrev($ids[0]);
        $ids[4] = strrev($ids[4]);
        $ids[2] = strrev($ids[2]);

        $id1 = substr($ids[0], 0, 4);
        $id2 = substr($ids[4], 0, 6);
        $ids[4] = str_replace($id2, $id2 . $id1, $ids[4]);
        $ids[0] = str_replace($id1, "", $ids[0]);

        return json_encode($ids[0] . $ids[4] . $ids[3] . $ids[1] . $ids[2]);
    }
}
