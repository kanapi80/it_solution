<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PdfController extends Controller
{
    public function viewPdf($id)
    {
        // Koneksi ke database 'document-storage'
        $db = \Config\Database::connect('doc');
        $query = $db->table('document')->where('ID', $id)->get()->getRow();

        if (!$query) {
            return 'File tidak ditemukan di database';
        }

        // Buat path file
        $filePath = realpath($query->LOCATION . '/' . $query->NAME . '.' . $query->EXT);

        // Tambahkan debugging
        if (!$filePath || !file_exists($filePath)) {
            return 'File tidak ditemukan di server: ' . $query->LOCATION . '/' . $query->NAME . '.' . $query->EXT;
        }

        // Tampilkan file PDF
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $query->NAME . '.pdf"')
            ->setBody(file_get_contents($filePath));
    }
}
