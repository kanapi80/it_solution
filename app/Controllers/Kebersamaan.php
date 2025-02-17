<?php

namespace App\Controllers;

use App\Models\M_Asuransi;
use App\Models\M_Bulan;
use App\Models\M_Kebersamaan;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\M_Doktergp;

class Kebersamaan extends Controller
{
    protected $DBGroup = 'sipayu';
    protected $modelAsuransi;
    protected $modelKebersamaan;
    protected $modelBulan;

    public function __construct()
    {
        $this->modelAsuransi = new M_Asuransi();
        $this->modelKebersamaan = new M_Kebersamaan();
        $this->modelBulan = new M_Bulan();
    }
    public function getKebersamaan()
    {
        // Fetch active payments data
        $data['modelAsuransi'] = $this->modelAsuransi->getActivePayments();
        $asuransi = $this->request->getPost('asuransi');
        $data['asuransi'] = $asuransi;
        $data['modelBulan'] = $this->modelBulan->getBulan();
        $bulan = $this->request->getPost('bulan');
        $data['bulan'] = $bulan;
        $data['years'] = range(date('Y'), date('Y') - 2); // Membuat range tahun dari tahun saat ini hingga 2 tahun ke belakang
        $tahun = $this->request->getPost('tahun');
        $tahun = $this->request->getPost('tahun') ?? date('Y'); // Default ke tahun saat ini
        $fpk = $this->request->getPost('fpk');

        //TAHUN
        $years = $this->getYears();
        $selectedYear = $this->request->getVar('tahun') ?? '';

        // Get kebersamaan data
        $data['jasaKebersamaan'] = $this->modelKebersamaan->getKebersamaan($asuransi, $bulan, $tahun, $fpk);
        // var_dump($data);
        // Return the view with data
        return view('sipayu/kebersamaan', [
            'modelBulan' => $data['modelBulan'],
            'modelAsuransi' => $data['modelAsuransi'],
            'tahun' => $tahun,
            'bulan' => $bulan,
            'asuransi' => $asuransi,
            'data' => $data['jasaKebersamaan'],
            'years' => $years,
            'fpk' => $fpk,
            'selectedYear' => $selectedYear
        ]);
    }
    public function getYears()
    {
        $currentYear = date('Y');
        $years = [];
        // Menambahkan 3 tahun terakhir ke array
        for ($i = 0; $i < 3; $i++) {
            $years[] = $currentYear - $i;
        }
        return $years;
    }
    public function exportKebersamaan()
    {
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $asuransi = $this->request->getGet('asuransi');
        $fpk = $this->request->getGet('fpk');

        $model = new M_Kebersamaan();
        $data = $model->getKebersamaan($asuransi, $bulan, $tahun, $fpk);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menyiapkan header kolom
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'KATEGORI');
        $sheet->setCellValue('C1', 'JASA KEBERSAMAAN');
        $sheet->setCellValue('D1', 'JASA RUMAH SAKIT');

        // Mengisi data ke dalam spreadsheet
        $rowNumber = 2;
        $no = 1;
        $totalKebersamaan = 0;
        $totalJasaRS = 0;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowNumber, $no++);
            $sheet->setCellValue('B' . $rowNumber, $row['Type']);
            $sheet->setCellValue('C' . $rowNumber, number_format($row['Kebersamaan'], 2, ',', '.'));
            $sheet->setCellValue('D' . $rowNumber, number_format($row['JasaRS'], 2, ',', '.'));
            $totalKebersamaan += $row['Kebersamaan'];
            $totalJasaRS += $row['JasaRS'];
            $rowNumber++;
        }
        // Menambahkan total
        $sheet->setCellValue('B' . $rowNumber, 'JUMLAH');
        $sheet->setCellValue('C' . $rowNumber, number_format($totalKebersamaan, 2, ',', '.'));
        $sheet->setCellValue('D' . $rowNumber, number_format($totalJasaRS, 2, ',', '.'));

        $writer = new Xlsx($spreadsheet);

        // Mengatur header untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_kebersamaan.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        $writer->save('php://output');
        exit;
    }
    public function getdokterGP()
    {
        $modelDoktergp = new M_Doktergp();
        $modelAsuransi = new M_Asuransi(); // Instantiate your model
        $modelBulan = new M_Bulan(); // Instantiate your model

        $data['modelAsuransi'] = $modelAsuransi->getActivePayments();
        $asuransi = $this->request->getPost('asuransi');
        $data['asuransi'] = $asuransi;
        $data['modelBulan'] = $modelBulan->getBulan(); // Ensure this returns objects if using object properties
        $bulan = $this->request->getPost('bulan');
        $data['bulan'] = $bulan;
        $data['years'] = range(date('Y'), date('Y') - 2); // Create a range of years from current year to 2 years back
        $tahun = $this->request->getPost('tahun') ?? date('Y'); // Default to the current year if not provided
        // $tahun = $this->request->getPost('tahun');
        $fpk = $this->request->getPost('fpk');
        //TAHUN
        // $years = $this->getYears();
        // $selectedYear = $this->request->getVar('tahun') ?? '';
        // Use custom method to get filtered data
        $data['jasaKebersamaan'] = $modelDoktergp->getDokterruangan($asuransi, $bulan, $tahun, $fpk);

        // Return the view with data
        return view('sipayu/doktergp', [
            'modelBulan' => $data['modelBulan'],
            'modelAsuransi' => $data['modelAsuransi'],
            'tahun' => $tahun,
            'bulan' => $bulan,
            'asuransi' => $asuransi,
            'data' => $data['jasaKebersamaan'],
            'years' => $data['years'],
            'fpk' => $fpk,
            'selectedYear' => $tahun
        ]);
    }
    public function exportDokterGP()
    {
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $asuransi = $this->request->getGet('asuransi');
        $fpk = $this->request->getGet('fpk');

        $model = new M_Doktergp();
        $data = $model->getDokterruangan($asuransi, $bulan, $tahun, $fpk);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menyiapkan header kolom
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'RUANGAN');
        $sheet->setCellValue('C1', 'JASA DOKTER UMUM');
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '8ED0CA',
                ],
            ],
        ];

        $sheet->getStyle('A1:C1')->applyFromArray($styleArray);

        // Mengisi data ke dalam spreadsheet
        $rowNumber = 2;
        $no = 1;
        $totalKebersamaan = 0;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowNumber, $no++);
            $sheet->setCellValue('B' . $rowNumber, $row['Poliklinik']);
            $sheet->setCellValue('C' . $rowNumber, number_format($row['JasaDokterUmum'], 2, ',', '.'));

            // Mengatur kolom C agar rata kanan
            $sheet->getStyle('C' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $totalKebersamaan += $row['JasaDokterUmum'];
            $rowNumber++;
        }

        foreach (range('A', 'C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Menambahkan total
        $sheet->setCellValue('B' . $rowNumber, 'JUMLAH');
        $sheet->setCellValue('C' . $rowNumber, number_format($totalKebersamaan, 2, ',', '.'));

        // Mengatur kolom C agar rata kanan untuk total
        $sheet->getStyle('C' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $writer = new Xlsx($spreadsheet);

        // Mengatur header untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_gp.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        $writer->save('php://output');
        exit;
    }
    public function getAllDokter()
    {
        $model = new M_Kebersamaan();
        $modelAsuransi = new M_Asuransi();
        $modelBulan = new M_Bulan();

        // Get data from models
        $data['modelAsuransi'] = $modelAsuransi->getActivePayments();
        $data['modelBulan'] = $modelBulan->getBulan();
        $data['years'] = range(date('Y'), date('Y') - 2);

        // Get input values
        $asuransi = $this->request->getPost('asuransi');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun') ?? date('Y');

        // Assign values to data array
        $data['asuransi'] = $asuransi;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        // Fetch results
        $data['results'] = $model->getAllDokter($bulan, $tahun, $asuransi);

        // Set flashdata based on results
        if (empty($data['results'])) {
            session()->setFlashdata('error', 'Data Tidak Ada !');
        } else {
            session()->setFlashdata('success', 'Data ditemukan');
        }

        // Return view with data
        return view(
            'sipayu/alldokter',
            [
                'modelBulan' => $data['modelBulan'],
                'modelAsuransi' => $data['modelAsuransi'],
                'tahun' => $tahun,
                'bulan' => $bulan,
                'asuransi' => $asuransi,
                'data' => $data['results'],
                'years' => $data['years'],
                'selectedYear' => $tahun
            ]
        );
    }
    public function exportAllDokter()
    {
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $asuransi = $this->request->getGet('asuransi');

        $model = new M_Kebersamaan();
        $data = $model->getAllDokter($bulan, $tahun, $asuransi);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menyiapkan header kolom
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'DOKTER');
        $sheet->setCellValue('C1', 'RAJAL');
        $sheet->setCellValue('D1', 'RANAP');
        $sheet->setCellValue('E1', 'IGD');
        $sheet->setCellValue('F1', 'LABORATORIUM');
        $sheet->setCellValue('G1', 'RADIOLOGI');
        $sheet->setCellValue('H1', 'OPERASI');
        $sheet->setCellValue('I1', 'ANASTESI');
        $sheet->setCellValue('J1', 'JUMLAH');
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '8ED0CA',
                ],
            ],
        ];

        $sheet->getStyle('A1:J1')->applyFromArray($styleArray);

        // Mengisi data ke dalam spreadsheet
        $rowNumber = 2;
        $no = 1;
        $laboratorium = 0;
        $radiologi = 0;
        $ibs = 0;
        $anastesi = 0;
        $rajalpemeriksaan = 0;
        $rajaltindakan = 0;
        $ranappemeriksaan = 0;
        $ranaptindakan = 0;
        $igdpemeriksaan = 0;
        $igdtindakan = 0;
        // $subjumlah = 0;
        foreach ($data as $row) {
            $rajal = $row['JASAPEMERIKSAANRAJAL'] + $row['JASATINDAKANRAJAL'];
            $ranap = $row['JASAPEMERIKSAANRANAP'] + $row['JASATINDAKANRANAP'];
            $igd = $row['JASAPEMERIKSAANIGD'] + $row['JASATINDAKANIGD'];
            $lab = $row['JASALAB'];
            $rad = $row['JASARAD'];
            $operasi = $row['JASAPIBS'];
            $anestesi = $row['JASAPIBS_ANASTESI'];
            $jumlah = $rad + $lab + $operasi + $anestesi + $rajal + $ranap + $igd;
            $sheet->setCellValue('A' . $rowNumber, $no++);
            $sheet->setCellValue('B' . $rowNumber, $row['NamaOrang']);
            $sheet->setCellValue('C' . $rowNumber, number_format(($row['JASAPEMERIKSAANRAJAL'] + $row['JASATINDAKANRAJAL']), 2, ',', '.'));
            $sheet->setCellValue('D' . $rowNumber, number_format(($row['JASAPEMERIKSAANRANAP'] + $row['JASATINDAKANRANAP']), 2, ',', '.'));
            $sheet->setCellValue('E' . $rowNumber, number_format(($row['JASAPEMERIKSAANIGD'] + $row['JASATINDAKANIGD']), 2, ',', '.'));
            $sheet->setCellValue('F' . $rowNumber, number_format($row['JASALAB'], 2, ',', '.'));
            $sheet->setCellValue('G' . $rowNumber, number_format($row['JASARAD'], 2, ',', '.'));
            $sheet->setCellValue('H' . $rowNumber, number_format($row['JASAPIBS'], 2, ',', '.'));
            $sheet->setCellValue('I' . $rowNumber, number_format($row['JASAPIBS_ANASTESI'], 2, ',', '.'));
            $sheet->setCellValue('J' . $rowNumber, number_format($jumlah, 2, ',', '.'));

            // Mengatur kolom C agar rata kanan
            $sheet->getStyle('J' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $laboratorium += $row['JASALAB'];
            $radiologi += $row['JASARAD'];
            $ibs += $row['JASAPIBS'];
            $anastesi += $row['JASAPIBS_ANASTESI'];
            $rajalpemeriksaan += $row['JASAPEMERIKSAANRAJAL'];
            $rajaltindakan += $row['JASATINDAKANRAJAL'];
            $ranappemeriksaan += $row['JASAPEMERIKSAANRANAP'];
            $ranaptindakan += $row['JASATINDAKANRANAP'];
            $igdpemeriksaan += $row['JASAPEMERIKSAANIGD'];
            $igdtindakan += $row['JASATINDAKANIGD'];
            $jumlah = $laboratorium + $radiologi + $ibs + $anastesi + $rajalpemeriksaan + $rajaltindakan + $ranappemeriksaan + $ranaptindakan + $igdpemeriksaan + $igdtindakan;
            $rowNumber++;
        }

        foreach (range('A', 'J') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Menambahkan total
        $sheet->setCellValue('B' . $rowNumber, 'JUMLAH');
        $sheet->setCellValue('C' . $rowNumber, number_format(($rajalpemeriksaan + $rajaltindakan), 2, ',', '.'));
        $sheet->setCellValue('D' . $rowNumber, number_format(($ranappemeriksaan + $ranaptindakan), 2, ',', '.'));
        $sheet->setCellValue('E' . $rowNumber, number_format(($igdpemeriksaan + $igdtindakan), 2, ',', '.'));
        $sheet->setCellValue('F' . $rowNumber, number_format($laboratorium, 2, ',', '.'));
        $sheet->setCellValue('G' . $rowNumber, number_format($radiologi, 2, ',', '.'));
        $sheet->setCellValue('H' . $rowNumber, number_format($ibs, 2, ',', '.'));
        $sheet->setCellValue('I' . $rowNumber, number_format($anastesi, 2, ',', '.'));
        $sheet->setCellValue('J' . $rowNumber, number_format($jumlah, 2, ',', '.'));

        // Mengatur kolom C agar rata kanan untuk total
        $sheet->getStyle('J' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $writer = new Xlsx($spreadsheet);

        // Mengatur header untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_All_Dokter.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        $writer->save('php://output');
        exit;
    }
}
