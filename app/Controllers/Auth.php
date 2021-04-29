<?php

namespace App\Controllers;

use App\Models\userModel;
use PhpParser\Node\Expr\Isset_;

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

            // logika limit waktu percobaan login
            if ($this->session->has('time_locked')) {
                $cooldown = time() - $this->session->get('time_locked');
                if ($cooldown > 120) {
                    // session('time_locked')->destroy();
                    // session('login_attemp')->destroy();
                    unset($_SESSION["time_locked"]);
                    unset($_SESSION["login_attemp"]);
                }
            }

            // jika sudah 3 kali percobaan kirim pesan
            if (session('login_attemp') > 2) {
                session()->setFlashdata('locked', '<p><b>Percobaan login mencapai batas. Mohon tunggu 2 (dua) menit untuk mencoba kembali.</b></p>');
            }

            return view('auth/login', $data);
        }
    }

    public function validasi()
    {
        // preparation for login attemps
        if (isset($_SESSION['login_attemp'])) {
            // jika session 'login_attemp' sudah dibuat sebelumnya
            $attemps = [
                'login_attemp' => session('login_attemp')
            ];
        } else {
            // jika session 'login_attemp' belum pernah dibuat
            $attemps = ['login_attemp' => 0];
        }

        // anti cracker console :v
        if (isset($_SESSION['login_attemp'])) {
            // jika session 'login_attemp' sudah dibuat sebelumnya
            if ($_SESSION['login_attemp'] > 2) {
                return redirect()->to('/login')->withInput();
            }
        }

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
                // mark percobaan login tambah 1
                $increment = session('login_attemp') + 1;
                $attemps = [
                    'login_attemp' => $increment
                ];
                $this->session->set($attemps);

                // jika sudah 3 kali percobaan kirim pesan
                if (session('login_attemp') > 2) {
                    session()->setFlashdata('locked', '<p><b>Percobaan login mencapai batas. Mohon tunggu 2 (dua) menit untuk mencoba kembali.</b></p>');
                }

                // jika password salah kemabali ke login
                return redirect()->to('/login')->withInput();
            }
        } else {
            // mark percobaan login tambah 1
            $increment = session('login_attemp') + 1;
            $attemps = [
                'login_attemp' => $increment
            ];
            $this->session->set($attemps);

            // jika sudah 3 kali percobaan kirim pesan
            if (session('login_attemp') > 2) {
                session()->setFlashdata('locked', '<p><b>Percobaan login mencapai batas. Mohon tunggu 2 (dua) menit untuk mencoba kembali.</b></p>');
            }
            // jika email tidak terdaftar
            return redirect()->to('/login')->withInput();
        }
    }
}
