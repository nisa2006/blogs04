<?php

namespace App\Controllers;

use App\Models\MotivasiModel;
use App\Models\UserModel;

class Login extends BaseController
{

    // login email username and pasword
    protected $daftarmodel;
    public function __construct()
    {
        $this->daftarmodel = new UserModel();
    }
    public function Userlogin()
    {
        session();
        $data = [
            'Valid' => \Config\Services::validation()
        ];
        return view('/login/register2', $data);
    }
    public function getdata()
    {

        if (!$this->validate([
            'Email' => [
                'rules'  => 'is_unique[login.Email]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar silahkan daftarkan email yang lain!!'
                ],
            ],
            'Username' => [
                'rules' => 'is_unique[login.Username]|exact_length[8]',
                'errors' => [
                    'is_unique' => '{field} sudah didaftarkan, coba daftarkan username yang lain!!!',
                    'exact_length' => '{field} minimal 8 karakter'
                ],
            ],
        ])) {
            $data['Valid'] = \Config\Services::validation();
            return view('/login/register2', $data); //mengirim pesan kesalahan dari validation
        }
        $Username =  $this->request->getVar('Username');
        $Password =  $this->request->getVar('Password');
        $Email =  $this->request->getVar('Email');
        $chekPass =  $this->request->getVar('chekPass');
        if ($Password === $chekPass) {
            $register = $this->daftarmodel->insert([
                'Username' => $Username,
                'Password' => $Password,
                'Email' => $Email
            ]);
        } else {
            $data['Valid'] = \Config\Services::validation();
            session()->setFlashdata('salah', 'password yang anda masukkan salah');
            return view('/login/register2', $data);
        }
        if (empty($register)) {
            session()->setFlashdata('gagal', 'silahkan registrasi terlebih dahulu');
            return redirect()->to('/login/register2');
        } else {
            session()->setFlashdata('register', 'silahkan masukkan username dan password yang sudah anda daftarkan!!');
            return redirect()->to('/confirm');
        }
        // return redirect()->to('halaman/login_admin');
    }
    //sigin multi level
    public function sigin()
    {
        return view('/login/login_admin');
    }
    public function get_sigin()
    {
        $session = session();
        $Username = $this->request->getVar('Username');
        $Password = $this->request->getVar('Password');
        $dataUser = $this->daftarmodel->where([
            'Username' => $Username
        ])->first();
        if (!$dataUser) {
            $session->setFlashdata('notreg', 'username dan password yang anda masukkan belum di daftar!!
        silahkan daftar dibawah ');
            return redirect()->to('/login/register2');
        }
        if ($dataUser['Password'] != $Password) {
            $session->setFlashdata('error', 'Password yang anda masukkan salah!!');
            return redirect()->to('/confirm');
        } else {
            if ($dataUser['Password'] === $Password) {
                $session->set('login', true);
                $session->set('user_id', $dataUser['id']);
                $session->set('Username', $dataUser['Username']);
                $session->set('Email', $dataUser['Email']);
                return redirect()->to('/ViewAdmin');
            }
        }
    }

    public function ViewAdmin()
    { //mengambil data dari tabel login
        session();
        //ambil data dari session
        $data['Email'] = session()->get('Email');
        $data['Username'] = session()->get('Username');
        $data['judul'] = 'Data |Webprograming | Zam.Dev';
        return view('blogs/create', $data);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('logout', 'anda sudah logout');
        return redirect()->to('/');
    }
}
