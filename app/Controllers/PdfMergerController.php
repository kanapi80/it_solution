<?php

namespace App\Controllers;

use TCPDF;
use setasign\Fpdi\TcpdfFpdi;

class PdfMergerController extends BaseController
{
    public function index()
    {
        return view('jkn/merge_pdf');
    }

    public function merge()
    {
        $pdf = new TcpdfFpdi();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $files = $this->request->getFiles()['files'];
        $names = $this->request->getPost('nomor');

        // Menghitung halaman yang telah ditambahkan
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();
                $extension = strtolower($file->getClientExtension());

                try {
                    if ($extension === 'pdf') {
                        $pageCount = $pdf->setSourceFile($filePath);
                        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                            $tplId = $pdf->importPage($pageNo);
                            $pdf->AddPage();
                            $pdf->useTemplate($tplId);
                        }
                    } elseif (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                        $pdf->AddPage();
                        $pdf->Image($filePath, 10, 10, 190); // Sesuaikan posisi dan ukuran
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error processing file: ' . $file->getClientName());
                }
            } else {
                return redirect()->back()->with('error', 'File is not valid: ' . $file->getClientName());
            }
        }

        // Output PDF
        $pdf->Output($names . '.pdf', 'D'); // 'D' untuk download
    }
}
