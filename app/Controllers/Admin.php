<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Admin_Model;
use App\Models\Pengumuman_Model;

class Admin extends BaseController
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
		return redirect()->to('datauser');
	}

	public function datauser()
	{
		$data = [
			"title" => "Data User | INVENBAR",
			"CurrentMenu" => "data_user",
			'validation' => \Config\Services::validation(),
			"info" => $this->newsModel->showTask(),
			"user" => $this->adminModel->getUser()
		];
		return view('admin/data_user', $data);
	}

	public function Add_User()
	{
		if (!$this->validate([
			// 'nama' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Nama User harus di isi'
			// 	]
			// ],
			'add_img' => [
				'rules' => 'max_size[add_img,5120]|is_image[add_img]|max_dims[add_img],3500,3500]|mime_in[add_img,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran Gambar melebihi 5MB !',
					'is_image' => 'File bukan gambar !',
					'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
					'mime_in' => 'Format file harus jpg/jpeg/png !'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('datauser')->withInput()->with('validation', $validation);
			return redirect()->to('datauser')->withInput();
		}

		$fileImg = $this->request->getFile('add_img'); // ambil gambar
		if ($fileImg->getError() == 4) { // jika mendapat error 4(file tidak diuplod)
			$namaImg = 'default.jpg';
		} else {
			$namaImg = $fileImg->getRandomName(); // mengambil nama file Random
			$fileImg->move('img/user', $namaImg); // move gambar to img folder
		}

		$data = array(
			'nama' => $this->request->getPost('user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role'),
			'picture' => $namaImg
		);
		$this->adminModel->addUser($data);
		return redirect()->to('datauser');
	}

	public function Edit_User()
	{
		if (!$this->validate([
			// 'nama' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Nama User harus di isi'
			// 	]
			// ],
			'edit_img' => [
				'rules' => 'max_size[edit_img,5120]|is_image[edit_img]|max_dims[edit_img],3500,3500]|mime_in[edit_img,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran Gambar melebihi 5MB !',
					'is_image' => 'File bukan gambar !',
					'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
					'mime_in' => 'Format file harus jpg/jpeg/png !'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('datauser')->withInput()->with('validation', $validation);
			return redirect()->to('datauser')->withInput();
		}

		$id = $this->request->getPost('user_id');
		$data = array(
			'nama' => $this->request->getPost('user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role')
		);
		$this->adminModel->updateUser($data, $id);
		return redirect()->to('datauser');
	}

	public function Delete_User()
	{
		$id = $this->request->getPost('user_id');
		$this->adminModel->deleteUser($id);
		return redirect()->to('datauser');
	}

	public function exceluser()
	{
		$data = [
			"title" => "Excel | INVENBAR",
			"user" => $this->adminModel->getUser()
		];

		return view('admin/excelUser', $data);
	}

	// ======================= Edith Pengumuman ========================

	public function adminpengumuman()
	{
		// $info2 = new Admin_Model();
		$data = [
			"title" => "Edit Pengumuman | INVENBAR",
			"CurrentMenu" => "edit_pengumuman",
			"info" => $this->newsModel->showTask()
			// "info2" => $info2->showInfo()
		];
		return view('admin/pengumuman', $data);
	}

	public function editpengumuman()
	{
		// $info = new Admin_Model();
		$id = $this->request->getPost('id_info');
		$data = array(
			'judul' => $this->request->getPost('judul'),
			'isi' => $this->request->getPost('isi')
		);
		$this->newsModel->editInfo($data, $id);
		return redirect()->to('adminpengumuman');
	}
}
