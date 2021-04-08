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

	public function index()
	{
		return redirect()->to('datauser');
	}

	public function datauser()
	{
		$users = new Admin_Model();
		$info = new Pengumuman_Model();
		$data = [
			"title" => "Data User | INVENBAR",
			"info" => $info->showTask(),
			"user" => $users->getUser()
		];
		return view('admin/data_user', $data);
	}

	public function Add_User()
	{
		$model = new Admin_Model();
		$data = array(
			'nama' => $this->request->getPost('user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role')
		);
		$model->addUser($data);
		return redirect()->to('datauser');
	}

	public function Edit_User()
	{
		$model = new Admin_Model();
		$id = $this->request->getPost('user_id');
		$data = array(
			'nama' => $this->request->getPost('user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role')
		);
		$model->updateUser($data, $id);
		return redirect()->to('datauser');
	}

	public function Delete_User()
	{
		$model = new Admin_Model();
		$id = $this->request->getPost('user_id');
		$model->deleteUser($id);
		return redirect()->to('datauser');
	}

	public function exceluser()
	{
		$model = new Admin_Model();
		$data = [
			"title" => "Excel | INVENBAR",
			"user" => $model->getUser()
		];

		return view('admin/excelUser', $data);
	}

	// ======================= Edith Pengumuman ========================

	public function adminpengumuman()
	{
		$info = new Pengumuman_Model();
		// $info2 = new Admin_Model();
		$data = [
			"title" => "Edit Pengumuman | INVENBAR",
			"info" => $info->showTask()
			// "info2" => $info2->showInfo()
		];
		return view('admin/pengumuman', $data);
	}

	public function editpengumuman()
	{
		// $info = new Admin_Model();
		$info = new Pengumuman_Model();
		$id = $this->request->getPost('id_info');
		$data = array(
			'judul' => $this->request->getPost('judul'),
			'isi' => $this->request->getPost('isi')
		);
		$info->editInfo($data, $id);
		return redirect()->to('adminpengumuman');
	}
}
