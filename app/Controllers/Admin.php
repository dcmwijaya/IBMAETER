<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Admin_Model;
use App\Models\Pengumuman_Model;
use Dompdf\Dompdf;

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
		return redirect()->to('/Menu/Datauser');
	}

	public function Datauser()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"title" => "Data User | INVENBAR",
					"CurrentMenu" => "data_user",
					'validation' => \Config\Services::validation(),
					"info" => $this->newsModel->showTask(),
					"user" => $this->adminModel->getUser()
				];
				return view('admin/data_user', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Add_User()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				if (!$this->validate([ //passing validate
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
					return redirect()->to('Datauser')->withInput();
				}

				$fileImg = $this->request->getFile('add_img'); // ambil gambar
				if ($fileImg->getError() == 4) { // jika mendapat error 4(file tidak diuplod)
					$namaImg = 'default.jpg';
				} else {
					$namaImg = $fileImg->getRandomName(); // mengambil nama file Random
					$fileImg->move('img/user', $namaImg); // move gambar to img folder
				}

				$password = $this->request->getPost('password');
				$data = array(

					'nama' => str_replace("'", "", htmlspecialchars($this->request->getPost('user'), ENT_QUOTES)),
					'email' => str_replace("'", "", htmlspecialchars($this->request->getPost('email'), ENT_QUOTES)),
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'role' => str_replace("'", "", htmlspecialchars($this->request->getPost('role'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				$this->adminModel->addUser($data);
				return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Edit_User()
	{
		// seleksi login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
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
					return redirect()->to('Datauser')->withInput();
				}

				$fileImg = $this->request->getFile('edit_img');
				// cek gambar apakah tetap gambar lama
				if ($fileImg->getError() == 4) { // jika mendapat error 4(file tidak diuplod)
					$namaImg = $this->request->getPost('old_image');
				} else {
					$namaImg = $fileImg->getRandomName(); // mengambil nama file Random
					$fileImg->move('img/user', $namaImg); // move gambar to img folder
					// jika nama foto lama bukan default.jpg
					if ($fileImg->getName() != "default.jpg") {
						//hapus gambar lama
						unlink('img/user/' . $this->request->getVar('old_image'));
					}
				}


				$id = $this->request->getPost('user_id');
				$password = $this->request->getPost('password');
				$data = array(
					'nama' => str_replace("'", "", htmlspecialchars($this->request->getPost('user'), ENT_QUOTES)),
					'email' => str_replace("'", "", htmlspecialchars($this->request->getPost('email'), ENT_QUOTES)),
					// 'password' => password_hash($password, PASSWORD_DEFAULT), ganti jadi popup sendiri
					'role' => str_replace("'", "", htmlspecialchars($this->request->getPost('role'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				$this->adminModel->updateUser($data, $id);
				return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Delete_User()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$id = $this->request->getPost('user_id');

				$user = $this->adminModel->find($id); //cari gambar berdasarkan id
				if ($user['picture'] != 'default.jpg') {
					unlink('img/user/' . $user['picture']); //hapus gambar jika nama file bukan default.jpg
				}
				$this->adminModel->deleteUser($id);
				return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function exceluser()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "Excel | INVENBAR",
					"user" => $this->adminModel->getUser(),
				];

				return view('admin/exxlsUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function docuser()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "DOC | INVENBAR",
					"user" => $this->adminModel->getUser(),
				];

				return view('admin/exdocUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfuser()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF | INVENBAR",
					"user" => $this->adminModel->getUser(),
				];

				$html = view('admin/expdfUser', $data);

				$dompdf = new Dompdf();
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'potrait');
				$dompdf->render();
				$dompdf->stream('Data-User.pdf');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ======================= Edith Pengumuman ========================

	public function Adminpengumuman()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// $info2 = new Admin_Model();
				$data = [
					"title" => "Edit Pengumuman | INVENBAR",
					"CurrentMenu" => "edit_pengumuman",
					"info" => $this->newsModel->showTask(),
					"user" => $this->adminModel->getUser(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/pengumuman', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function editpengumuman()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				if (!$this->validate([
					'foto' => [
						'rules' => 'max_size[foto,10240]|is_image[foto]|max_dims[foto],3500,3500]|mime_in[foto,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'max_size' => 'Ukuran Gambar maksimal 10MB.',
							'is_image' => 'Berkas bukan gambar !',
							'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
							'mime_in' => 'Format file harus jpg/jpeg/png !'
						]
					]
				])) {
					return redirect()->to('editpengumuman')->withInput();
				}

				// mengambil inputan foto/gambar
				$fileFoto = $this->request->getFile('foto');

				// cek gambar lama
				if ($fileFoto->getError() == 4) {
					// jika tidak diubah maka pakai foto lama
					$namaFoto = $this->request->getVar('fotoLama');
				} else {
					// generate nama random
					$namaFoto = str_replace("'", "", htmlspecialchars($fileFoto->getName(), ENT_QUOTES));
					// upload gambar
					$fileFoto->move('img/', $namaFoto);
				}

				$id = $this->request->getPost('id_info');
				$data = array(
					'judul' => str_replace("'", "", htmlspecialchars($this->request->getPost('judul'), ENT_QUOTES)),
					'isi' => str_replace("'", "", htmlspecialchars($this->request->getPost('isi'), ENT_QUOTES)),
					'foto' => $namaFoto
				);

				$this->newsModel->editInfo($data, $id);
				return redirect()->to('Adminpengumuman');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}
}
