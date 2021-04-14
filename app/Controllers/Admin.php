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
			"info" => $this->newsModel->showTask(),
			"user" => $this->adminModel->getUser()
		];
		return view('admin/data_user', $data);
	}

	public function Add_User()
	{
		$data = array(
			'nama' => $this->request->getPost('user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role')
		);
		$this->adminModel->addUser($data);
		return redirect()->to('datauser');
	}

	public function Edit_User()
	{
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
