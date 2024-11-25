<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;

class CreatePDF extends Controller
{
    public function generatePdf()
    {
        $results = [/* array of your data */];

        $html = view('jkn/cetakresume', ['results' => $results]);

        // Load Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("identitas_pasien.pdf", ["Attachment" => 0]);
    }
}
