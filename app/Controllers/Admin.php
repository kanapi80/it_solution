<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\M_Admin;
use App\Models\LoginModel;
use App\Models\TTEModel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use \Hermawan\DataTables\DataTable;
use App\Models\ConfigModel;
use App\Models\InacbgModel;





class Admin extends BaseController
{
    protected $userModel;
    protected $loginModel;
    protected $monitoring;
    protected $modelconfig;
    protected $modelinacbg;
    public function __construct()
    {
        $this->userModel = new M_Admin();
        $this->loginModel = new LoginModel();
        $this->monitoring = new TTEModel();
        $this->modelconfig = new ConfigModel();
        $this->modelinacbg = new InacbgModel();
    }
    public function index()
    {
        return view('Backend/Login/login');
    }
    public function cek_login_admin()
    {
        $modelAdmin = new M_Admin();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $datauser = $modelAdmin->getAdmin(['UserName' => $username])->getRowArray();

        if (!$datauser) {
            log_message('error', 'Username tidak ditemukan.');
            return redirect()->back()->with('error', 'Username Tidak Ditemukan');
        }

        if ($datauser['Status'] != 1) {
            log_message('error', 'Akun tidak aktif.');
            return redirect()->back()->with('error', 'Akun Anda tidak aktif.');
        }

        $verifyPassword = password_verify($password, $datauser['Password']);
        if (!$verifyPassword) {
            log_message('error', 'Kombinasi username dan password salah.');
            return redirect()->back()->with('error', 'Kombinasi Username dan Password Salah!');
        }


        $dataSession = [
            'Ses_IdAdmin' => $datauser['IdAdmin'],
            'Ses_NamaAdmin' => $datauser['NamaAdmin'],
            'Ses_UserName' => $datauser['UserName'],
            'Ses_Level' => $datauser['Level'],
            'Ses_Tupoksi' => $datauser['Tupoksi'],
            'Ses_Foto' => $datauser['Foto']
        ];
        session()->set($dataSession);
        return redirect()->to(base_url('admin/dashboard-admin'));
    }
    //CEK LOGIN
    public function getLogin()
    {
        $session = \Config\Services::session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil data user berdasarkan email/username
        $datauser = $this->loginModel->getAdmin(['email' => $username])->getRowArray();

        if (!$datauser) {
            log_message('error', 'Username tidak ditemukan.');
            return redirect()->back()->with('error', 'Username Tidak Ditemukan')->withInput();
        }

        if ($datauser['status'] != 1) {
            log_message('error', 'Akun tidak aktif.');
            return redirect()->back()->with('error', 'Akun Anda tidak aktif.')->withInput();
        }

        // Verifikasi password
        if (!password_verify($password, $datauser['password'])) {
            log_message('error', 'Kombinasi username dan password salah.');
            return redirect()->back()->with('error', 'Kombinasi Username dan Password Salah!')->withInput();
        }

        // Data session
        $dataSession = [
            'Ses_IdAdmin'   => $datauser['id'],
            'Ses_NamaAdmin' => $datauser['firstname'],
            'Ses_UserName'  => $datauser['lastname'],
            'Ses_Level'     => $datauser['level'],
            'Ses_Tupoksi'   => $datauser['locationname'],
            'Ses_Foto'      => $datauser['foto'],
            'Ses_Ruangan'   => $datauser['id_imut'],
            'Ses_Pejuang'   => $datauser['id_pejuang'],
            'isLoggedIn'    => true // Tambahkan untuk cek login
        ];

        // Set session
        $session->set($dataSession);

        // Redirect ke dashboard
        return redirect()->to(base_url('admin/dashboard-admin'));
    }

    public function dashboard()
    {
        // $model = new M_Admin();
        // $selectadmin = $this->loginModel->limit(100)->findAll();
        // $data['selectadmin'] = $selectadmin;
        $data['jkn'] = $this->modelinacbg->getHarian();
        $data['selectadmin'] = $this->loginModel->paginate(10);
        $data['tte'] = $this->monitoring->getMonitoringtte();
        $data['pager'] = $this->loginModel->pager; // Ambil objek pager
        $data['configtte'] = $this->modelconfig->getpropertitte(87);
        if (!empty($data['configtte'])) {
            $data['configtte'] = (array) $data['configtte'][0]; // Ambil hanya baris pertama
        } else {
            $data['configtte'] = []; // Jika kosong, set array kosong
        }

        return view('Backend/Login/dashboard', $data);
    }

    public function logout()
    {
        session()->remove('Ses_IdAdmin');
        session()->remove('Ses_NamaAdmin');
        session()->remove('Ses_Level');
        session()->remove('Ses_Tupoksi');
        session()->remove('Ses_Ruangan');
        session()->remove('Ses_Pejuang');
        session()->setFlashdata('logout_success', 'Kamu telah logout.'); // Set flash data message
        return redirect()->to(base_url('admin/login-admin'));
    }
    public function forms(): string
    {
        return view('Backend/Login/forms');
    }
    public function widget(): string
    {
        return view('Backend/Login/widget');
    }

    public function page()
    {
        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar');
        // echo view('Backend/Login/dashboard');
        echo view('Page/pengguna');
        echo view('Backend/Template/footer');
    }

    public function add()
    {
        $model = new M_Admin();
        $selectadmin = $model->limit(100)->findAll();
        $data['selectadmin'] = $selectadmin;



        return view('users/users', $data);
    }

    public function addusers()
    {
        return view('users/addusers');
    }

    public function simpanusers()
    {
        $userModel = new M_Admin();
        $name = $this->request->getPost('name');
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $ext = $file->getClientExtension();
            $newName = $name . '.' . $ext;
            $file->move(WRITEPATH . '../public/uploads', $newName);

            // Simpan nama file di database
            $data = [
                'NamaAdmin' => $name,
                'UserName' => $this->request->getPost('username'),
                'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'Level' => $this->request->getPost('level'),
                'Status' => $this->request->getPost('status'),
                'Tupoksi' => $this->request->getPost('tupoksi'),
                'Foto' => $newName // Simpan nama file
            ];
        } else {
            // Simpan data tanpa file foto jika tidak ada file yang diunggah
            $data = [
                'NamaAdmin' => $name,
                'UserName' => $this->request->getPost('username'),
                'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'Level' => $this->request->getPost('level'),
                'Status' => $this->request->getPost('status'),
                'Tupoksi' => $this->request->getPost('tupoksi')
            ];
        }
        $userModel->save($data);
        if ($userModel) {
            session()->setFlashdata('success', 'Data Berhasil tambahkan');
            return redirect()->to('users/users');
        }
        return redirect()->to('users/users');
    }
    public function delusers($id)
    {
        $userModel = new M_Admin();
        $user = $userModel->find($id);
        if ($user) {
            $foto = $user['Foto'];
            if ($foto && file_exists(WRITEPATH . '../public/uploads/' . $foto)) {
                unlink(WRITEPATH . '../public/uploads/' . $foto);
            }
            $userModel->delete($id);
            session()->setFlashdata('success', 'Data Berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        return redirect()->to('users/users');
    }

    public function exportExcel()
    {
        $userModel = new M_Admin();
        $users = $userModel->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'IdAdmin');
        $sheet->setCellValue('C1', 'NamaAdmin');
        $sheet->setCellValue('D1', 'UserName');
        $sheet->setCellValue('E1', 'Level');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Tupoksi');
        // Membuat font header menjadi bold dan menambahkan border
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
                    'rgb' => 'FFFF00',
                ],
            ],
        ];
        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);
        // Mengisi data ke dalam sheet
        $row = 2;
        foreach ($users as $index => $user) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $user['IdAdmin']);
            $sheet->setCellValue('C' . $row, $user['NamaAdmin']);
            $sheet->setCellValue('D' . $row, $user['UserName']);
            $sheet->setCellValue('E' . $row, $user['Level']);
            $sheet->setCellValue('F' . $row, $user['Status']);
            $sheet->setCellValue('G' . $row, $user['Tupoksi']);
            $row++;
        }

        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        // Mengatur alignment teks di kolom Status
        $sheet->getStyle('F2:F' . ($row - 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('F2:F' . ($row - 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Menulis file ke format Excel (.xlsx)
        $writer = new Xlsx($spreadsheet);

        // Membuat nama file dan header untuk download
        $filename = 'data_export_' . date('Y-m-d_H-i-s') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Mengirim output ke browser untuk didownload
        $writer->save('php://output');
        exit();
    }



    public function cetakPdf()
    {
        set_time_limit(36000);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('isPhpEnabled', false);
        $options->set('chroot', realpath(''));

        $dompdf = new Dompdf($options);
        $selectadmin = $this->userModel->limit(100)->findAll();

        $qrFolder = WRITEPATH . 'qr/'; // Folder untuk menyimpan QR Code
        if (!is_dir($qrFolder)) {
            mkdir($qrFolder, 0777, true); // Buat folder jika belum ada
        }

        foreach ($selectadmin as &$admin) {
            $qrOptions = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel'   => QRCode::ECC_L,
                'scale'      => 5,
            ]);

            // Buat nama file unik berdasarkan ID Admin
            $qrFileName = 'qr_' . $admin['IdAdmin'] . '.png';
            $qrFilePath = $qrFolder . $qrFileName;

            // Generate QR Code dan simpan sebagai file
            (new QRCode($qrOptions))->render($admin['NamaAdmin'], $qrFilePath);

            // Simpan path QR Code untuk digunakan di View
            $admin['qrPath'] = base_url('writable/qr/' . $qrFileName);
        }

        $html = view('users/cetakusers', ['selectadmin' => $selectadmin]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("admin_list.pdf", ["Attachment" => false]);
    }




    public function viewUsers()
    {
        return view('users/server_users');
    }

    public function getUsers()
    {
        $request = \Config\Services::request();
        $model = new M_Admin();

        $column_order = ['IdAdmin', 'NamaAdmin', 'UserName', 'Status', 'Level', 'Tupoksi'];
        $column_search = ['NamaAdmin', 'Status', 'Tupoksi'];
        $order = ['IdAdmin' => 'asc'];

        $dt = $model->select('*');
        // Mengatur pencarian
        $searchValue = $request->getPost('search')['value'] ?? '';
        if ($searchValue) {
            foreach ($column_search as $item) {
                $dt->orLike($item, $searchValue);
            }
        }
        // Mengatur urutan
        $orderColumnIndex = $request->getPost('order')[0]['column'] ?? null;
        $orderDir = $request->getPost('order')[0]['dir'] ?? null;
        if ($orderColumnIndex !== null && $orderDir !== null) {
            $dt->orderBy($column_order[$orderColumnIndex], $orderDir);
        } else {
            $dt->orderBy(key($order), $order[key($order)]);
        }
        // Ambil semua data tanpa pagination
        $data = $dt->findAll();
        $draw = $request->getPost('draw') ?? 1;

        $total = count($data);

        $output = [
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data,
        ];
        return $this->response->setJSON($output);
    }
    public function dokumentasi()
    {
        return view('users/dokumentasi');
    }
    public function getAllUser()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->loginModel
                ->select('users.firstname, users.lastname, users.locationcode,users.locationname, users.email, users.status, users.password');
            return DataTable::of($builder)->addNumbering()->toJson(true);
        }
    }
}
