<?php

namespace App\Controllers;

use App\Models\M_Admin;

class Admin extends BaseController
{
    protected $modelAdmin;

    public function __construct()
    {
        $this->modelAdmin = new M_Admin();
    }

    public function index()
    {
        return view('Backend/Login/login');
    }

    public function cek_login_admin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $datauser = $this->modelAdmin->getAdmin(['username' => $username])->getRowArray();

        if (!$datauser) {
            return redirect()->back()->with('error', 'Username Tidak Ditemukan');
        }

        if ($datauser['Status'] != 1) {
            return redirect()->back()->with('error', 'Akun Anda tidak aktif.');
        }

        $verifyPassword = password_verify($password, $datauser['Password']);
        if (!$verifyPassword) {
            return redirect()->back()->with('error', 'Kombinasi Username dan Password Salah!');
        }

        $dataSession = [
            'Ses_IdAdmin' => $datauser['IdAdmin'],
            'Ses_NamaAdmin' => $datauser['NamaAdmin'],
            'Ses_UserName' => $datauser['UserName'],
            'Ses_Level' => $datauser['Level'],
            'Ses_Tupoksi' => $datauser['Tupoksi']
        ];
        session()->set($dataSession);

        return redirect()->to(base_url('admin/dashboard-admin'));
    }

    public function dashboard()
    {
        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar');
        echo view('Backend/Login/dashboard');
        echo view('Backend/Template/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin'));
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
        echo view('Page/pengguna');
        echo view('Backend/Template/footer');
    }

    public function add()
    {
        $selectadmin = $this->modelAdmin->limit(100)->findAll();
        $data['selectadmin'] = $selectadmin;
        return view('users/users', $data);
    }

    public function addusers()
    {
        return view('users/addusers');
    }

    public function simpanusers()
    {
        $data = [
            'NamaAdmin' => $this->request->getPost('name'),
            'UserName' => $this->request->getPost('username'),
            'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'Level' => $this->request->getPost('level'),
            'Status' => $this->request->getPost('status'),
            'Tupoksi' => $this->request->getPost('tupoksi')
        ];

        if ($this->modelAdmin->save($data)) {
            session()->setFlashdata('success', 'Data Berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Data Gagal ditambahkan');
        }

        return redirect()->to(base_url('admin/add'));
    }

    public function delusers()
    {
        $id = $this->request->getGet('id');
        $this->modelAdmin->delete($id);

        $selectadmin = $this->modelAdmin->limit(100)->findAll();
        $datanew['selectadmin'] = $selectadmin;
        return view('users/users', $datanew);
    }
}
