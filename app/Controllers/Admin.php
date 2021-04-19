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
		return redirect()->to('/menu/datauser');
	}

	public function datauser()
	{
		if (session('role') == 0) {
			$data = [
				"title" => "Data User | INVENBAR",
				"info" => $this->newsModel->showTask(),
				"user" => $this->adminModel->getUser(),
			];
			return view('admin/data_user', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function Add_User()
	{
		if (session('role') == 0) {
			$data = array(
				'nama' => $this->request->getPost('user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'role' => $this->request->getPost('role')
			);
			$this->adminModel->addUser($data);
			return redirect()->to('datauser');
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function Edit_User()
	{
		// seleksi role pengguna
		if (session('role') == 0) {
			$id = $this->request->getPost('user_id');
			$data = array(
				'nama' => $this->request->getPost('user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'role' => $this->request->getPost('role')
			);
			$this->adminModel->updateUser($data, $id);
			return redirect()->to('datauser');
		} else {
			return redirect()->to('/');
		}
	}

	public function Delete_User()
	{
		if (session('role') == 0) {
			$id = $this->request->getPost('user_id');
			$this->adminModel->deleteUser($id);
			return redirect()->to('datauser');
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function exceluser()
	{
		// jika user merupakan Admin
		if (session('role') == 0) {
			$data = [
				"title" => "Excel | INVENBAR",
				"user" => $this->adminModel->getUser(),
			];

			return view('admin/excelUser', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	// ======================= Edith Pengumuman ========================

	public function adminpengumuman()
	{
		// seleksi role pengguna
		if (session('role') == 0) {
			// $info2 = new Admin_Model();
			$data = [
				"title" => "Edit Pengumuman | INVENBAR",
				"info" => $this->newsModel->showTask(),
				"user" => $this->adminModel->getUser(),
			];
			return view('admin/pengumuman', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function editpengumuman()
	{
		// seleksi role pengguna
		if (session('role') == 0) {
			// $info = new Admin_Model();
			$id = $this->request->getPost('id_info');
			$data = array(
				'judul' => $this->request->getPost('judul'),
				'isi' => $this->request->getPost('isi'),
				"user" => $this->adminModel->getUser()
			);
			$this->newsModel->editInfo($data, $id);
			return redirect()->to('adminpengumuman');
		} else {
			return redirect()->to('/dashboard');
		}
	}
}
