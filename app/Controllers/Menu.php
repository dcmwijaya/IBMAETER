<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Pengumuman_Model;
use App\Models\userModel;

class Menu extends BaseController
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

	// ========================= Login ========================
	public function login()
	{
		$data = [
			"title" => "Login | INVENBAR",
			"validation" => \Config\Services::Validation()
		];
		return view('auth/login', $data);
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
			return redirect()->to('/')->withInput();
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
				return redirect()->to('/')->withInput();
			}
		} else {
			// jika email tidak terdaftar
			return redirect()->to('/')->withInput();
		}
	}

	//========================= Logout ==============================
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}

	//========================= Dashboard Index()=====================

	public function index()
	{
		return redirect()->to('dashboard');
	}

	public function dashboard()
	{

		$users = new Barang_Model();
		$info = new Pengumuman_Model();
		// $items = 
		$data = [
			"title" => "Menu User | INVENBAR",
			"info" => $info->showTask(),
			"item" => $users->getItems()
		];
		return view('global/dashboard', $data);
	}

	public function Add_item()
	{
		$model = new Barang_Model();
		$data = array(
			'nama_item' => $this->request->getPost('nama_item'),
			'stok' => $this->request->getPost('stok'),
			'jenis' => $this->request->getPost('jenis'),
			'penyimpanan' => $this->request->getPost('penyimpanan')
		);
		$model->addItem($data);
		return redirect()->to('dashboard');
	}

	public function Edit_item()
	{
		$model = new Barang_Model();
		$id = $this->request->getPost('id_item');
		$data = array(
			'nama_item' => $this->request->getPost('nama_item'),
			'stok' => $this->request->getPost('stok'),
			'jenis' => $this->request->getPost('jenis'),
			'penyimpanan' => $this->request->getPost('penyimpanan')
		);
		$model->updateItem($data, $id);
		return redirect()->to('dashboard');
	}

	public function Delete_item()
	{
		$model = new Barang_Model();
		$id = $this->request->getPost('id_item');
		$model->deleteItem($id);
		return redirect()->to('dashboard');
	}

	public function Income_item()
	{
		$model = new Barang_Model();
		$id = $this->request->getPost('id_item');
		if ($id != 0) { // if gk guna
			$data = array(
				'jumlah_in' => $this->request->getPost('jumlah_in'),
				'id_item' => $this->request->getPost('id_item')
			);
			$model->IncomeItem($data, $id);
		}
		$data = array(
			'tgl' => $this->request->getPost('tgl'),
			'status' => 'Masuk',
			'uid' => '001',
			'ket' => $this->request->getPost('ket')
		);

		$model->LogItem($data);

		return redirect()->to('dashboard');
	}

	public function Outcome_item()
	{
		$model = new Barang_Model();
		$id = $this->request->getPost('id_item');
		if ($id != 0) { // if gk guna
			$data = array(
				'jumlah_out' => $this->request->getPost('jumlah_out'),
				'id_item' => $this->request->getPost('id_item')
			);
			$model->OutcomeItem($data, $id);
		}
		$data = array(
			'tgl' => $this->request->getPost('tgl'),
			'status' => 'Keluar',
			'uid' => '1', // tambahkan woy dari role user session
			'ket' => $this->request->getPost('ket')
		);

		$model->LogItem($data);

		return redirect()->to('dashboard');
	}
	// =============================== Pengumuman User ======================

	public function pengumuman()
	{
		$info = new Pengumuman_Model();
		$data = [
			"title" => "Pengumuman | INVENBAR",
			"info" => $info->showTask()
		];
		return view('global/user_pengumuman.php', $data);
	}

	// ============================= Profile Akun ================================
	public function profakun($email)
	{
		$info = new Pengumuman_Model();
		$data = [
			"title" => "My Profile | INVENBAR",
			'user' => $this->userModel->getUser($email),
			"info" => $info->showTask()
		];
		return view('global/myprofile', $data);
	}

	// =================================== Profile Edit ====================================

	public function profedit($uid)
	{
		$info = new Pengumuman_Model();
		$data = [
			"title" => "Edit Profile | INVENBAR",
			"info" => $info->showTask(),
			'validation' => \Config\Services::Validation(),
			'user' => $this->userModel->getUserId($uid)
		];
		return view('global/editprofile', $data);
	}

	public function profUpdate($uid)
	{
		// dd($this->request->getFile('foto')->getName());
		$dataUser = $this->userModel->getUserId($uid);

		// jika seleksi inputan email
		if ($dataUser['email'] == $this->request->getVar('email')) {
			// jika inputan email tidak diubah
			$rule_email = 'required|valid_email';
		} else {
			// jika inputan email diubah
			$rule_email = 'required|valid_email|is_unique[user.email]';
		}
		$rule_pw1 = 'min_length[0]';

		if ($this->request->getVar('password1') != null) {
			$rule_pw1 = 'min_length[8]';
		}

		// jika valdiasi tidakk lolos maka redirect ke halaman edit
		if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus diisi.']
			],
			'email' => [
				'rules' => $rule_email,
				'errors' => [
					'required' => '{field} harus diisi.',
					'valid_email' => '{field} tidak valid.',
					'is_unique' => 'Email sudah terdaftar.'
				]
			],
			'password1' => [
				'rules' => $rule_pw1,
				'errors' => ['min_length' => 'Password minimal 8 karakter.']
			],
			'password2' => [
				'rules' => 'matches[password1]',
				'errors' => ['matches' => 'Konfirmasi password tidak valid.']
			],
			'password' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus diisi.']
			],
			'foto' => [
				'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar {field} maksimal 2MB',
					'is_image' => '{field} harus merupakan gambar.',
					'mime_in' => '{field} harus berekstensi .jpg, .jpeg, atau .png'
				]
			]
		])) {
			return redirect()->to('/Menu/profedit/' . $uid)->withInput();
		}

		// mengambil inputan foto/gambar
		$fileFoto = $this->request->getFile('foto');

		// cek gambar lama
		if ($fileFoto->getError() == 4) {
			// jika tidak diubah maka pakai foto lama
			$namaFoto = $this->request->getVar('fotoLama');
		} else {
			// generate nama random
			$namaFoto = $fileFoto->getRandomName();
			// upload gambar
			$fileFoto->move('img/user', $namaFoto);

			// jika nama foto lama bukan default.jpg
			if ($fileFoto->getName() != "default.jpg") {
				//hapus gambar lama
				unlink('img/user/' . $this->request->getVar('fotoLama'));
			}
		}

		$inputPassword = $this->request->getVar('password');
		//cek password
		if (password_verify($inputPassword, $dataUser['password'])) {

			// cek jika ada inputan password baru
			if ($this->request->getvar('password1') != null) {
				$password = $this->request->getvar('password1');
			} else {
				$password = $inputPassword;
			}

			$this->userModel->update($uid, [
				'nama' => $this->request->getVar('nama'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role' => $dataUser['role'],
				'picture' => $namaFoto
			]);

			session()->setFlashdata('pesan', 'Data berhasil diubah');

			return redirect()->to('/menu/profakun/' . $dataUser['email']);
			// echo "2";
		} else {
			session()->setFlashdata('pesanPassword', 'Password Salah. Harap masukkan password valid untuk mengubah data.');
			return redirect()->to('/menu/profedit/' . $uid)->withInput();
			// echo "3";
		}
	}


	// ==================================== View Chart =========================================

	public function chart()
	{
		$info = new Pengumuman_Model();
		$model = new Barang_Model();
		$data = [
			"title" => "View Chart | INVENBAR",
			"info" => $info->showTask(),
			"stok" => $model->stock(),
			"class" => $model->invenclass(),
			"category" => $model->jenis()
		];
		return view('global/viewchart', $data);
	}

	public function excelbarang() // **********
	{
		$model = new Barang_Model();
		$data = [
			"title" => "Excel | INVENBAR",
			"item" => $model->getItems()
		];

		return view('global/excelBarang', $data);
	}
}
