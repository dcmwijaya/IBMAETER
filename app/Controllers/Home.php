<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Admin_Model;
use App\Models\Pengumuman_Model;
use Dompdf\Dompdf;

class Home extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request; // Menghilangkan alert getPost()
    protected $session;
    protected $adminModel;
    protected $barangModel;
    protected $newsModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();

        $this->adminModel = new Admin_Model();
        $this->barangModel = new Barang_Model();
        $this->newsModel = new Pengumuman_Model();
    }

    public function index()
    {
        if (session('uid') != null) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/Home');
        }
    }

    public function Landing()
    {
        // seleksi login
        if (session('role') == 0) {
            $data = [
                "title" => "Home | INVENBAR",
                'validation' => \Config\Services::validation(),
                "info" => $this->newsModel->showTask(),
                "user" => $this->adminModel->getUser()
            ];
            return view('home/landingMain', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }
    
    public function InfoHome()
    {
        // seleksi login
        if (session('role') == 0) {
            $data = [
                "title" => "Invenbar Info | INVENBAR"
            ];
            return view('home/infoHome', $data);
        } else {
            return redirect()->to('/Home');
        }
    }

    public function Partnership()
    {
        // seleksi login
        if (session('role') == 0) {
            $data = [
                "title" => "Partnership | INVENBAR"
            ];
            return view('home/partnership', $data);
        } else {
            return redirect()->to('/Home');
        }
    }

    public function KebijakanPrivasi()
    {
        // seleksi login
        if (session('role') == 0) {
            $data = [
                "title" => "Kebijakan Privasi | INVENBAR"
            ];
            return view('home/kebijakanPrivasi', $data);
        } else {
            return redirect()->to('/Home');
        }
    }

    public function WaspadaPenipuan()
    {
        // seleksi login
        if (session('role') == 0) {
            $data = [
                "title" => "Waspada Penipuan | INVENBAR"
            ];
            return view('home/waspadaPenipuan', $data);
        } else {
            return redirect()->to('/Home');
        }
    }
}
