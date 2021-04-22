<?php

namespace App\Controllers;

use App\Models\userModel;

class Auth extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request; // Menghilangkan alert getPost()
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();

        $this->userModel = new userModel();
    }


    //========================= Dashboard Index()=====================

    public function Index()
    {
        if (session('uid') != null) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }

    // ========================= Login ========================
    public function login()
    {
        // jika sudah dilakukan login dan belum logout
        if (session('uid') != null) {
            return redirect()->to('/dashboard');
        } else {
            $data = [
                "title" => "Login | INVENBAR",
                "validation" => \Config\Services::Validation()
            ];
            return view('auth/login', $data);
        }
    }

    public function validasi()
    {
        // validasi input
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => ['required' => 'Password harus diisi.']
            ]
        ])) {
            return redirect()->to('/login')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getUser($email);

        // jika email terdaftar
        if ($user != null) {
            // jika password benar lanjut ke dasboard
            if (password_verify($password, $user['password'])) {
                $this->session->set($user);
                return redirect()->to('/dashboard');
            } else {
                // jika password salah kemabali ke login
                return redirect()->to('/login')->withInput();
            }
        } else {
            // jika email tidak terdaftar
            return redirect()->to('/login')->withInput();
        }
    }
}
