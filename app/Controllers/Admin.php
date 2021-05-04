<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Admin_Model;
use App\Models\Pengumuman_Model;
use App\Models\Komplain_Model;
use App\Models\ArsipKomp_Model;
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
	protected $komplainModel;
	protected $arsipKompModel;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();

		$this->adminModel = new Admin_Model();
		$this->barangModel = new Barang_Model();
		$this->newsModel = new Pengumuman_Model();
		$this->komplainModel = new Komplain_Model();
		$this->arsipKompModel = new ArsipKomp_Model();
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
					"user" => $this->adminModel->getUser(),
					"us" => $this->adminModel->countUser()
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
					'user' => [
						'rules' => 'max_length[60]',
						'errors' => [
							'max_length' => 'nama huruf haurs lebih kecil dari 60 karakter'
						]
					],
					'email' => [
						'rules' => 'valid_email|is_unique[user.email]',
						'errors' => [
							'valid_email' => 'E-mail User harus sesuai format email',
							'is_unique' => '{field} sudah terdaftar'
						]
					],
					'password' => [
						'rules' => 'min_length[7]|max_length[24]',
						'errors' => [
							'min_length' => 'Password harus lebih besar dari 7 karakter',
							'max_length' => 'Password haurs lebih kecil dari 24 karakter'
						]
					],
					'confirm_password' => [
						'rules' => 'matches[password]',
						'errors' => [
							'matches' => 'input Password tidak sama !'
						]
					],
					'role' => [
						'rules' => 'alpha_numeric',
						'errors' => [
							'alpha_numeric' => 'input harus angka'
						]
					],
					// 'add_img' => [
					// 	'rules' => 'max_size[add_img,5120]|is_image[add_img]|max_dims[add_img],3500,3500]|mime_in[add_img,image/jpg,image/jpeg,image/png]',
					// 	'errors' => [
					// 		'max_size' => 'Ukuran Gambar melebihi 5MB !',
					// 		'is_image' => 'File bukan gambar !',
					// 		'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
					// 		'mime_in' => 'Format file harus jpg/jpeg/png !'
					// 	]
					// ]
				])) {
					session()->setFlashdata('pesan', '<div class="notif-failed">Data Gagal Ditambahkan!</div>');
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
				dd($data);
				$this->adminModel->addUser($data);
				session()->setFlashdata('pesan', '<div class="notif-success">
				Data Berhasil Ditambahkan!
			  </div>');
				return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Edit_User() //<< tambahi untuk update session jika user ini sedang login
	{
		// seleksi login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				if (!$this->validate([
					'nama' => [
						'rules' => 'max_length[60]',
						'errors' => [
							'max_length' => 'nama huruf haurs lebih kecil dari 60 karakter'
						]
					],
					'email' => [
						'rules' => 'valid_email',
						'errors' => [
							'valid_email' => 'E-mail User harus sesuai format email'
						]
					],
					'role' => [
						'rules' => 'alpha_numeric',
						'errors' => [
							'alpha_numeric' => 'input harus angka'
						]
					],
					'new_password' => [
						'rules' => 'permit_empty|min_length[7]|max_length[24]',
						'errors' => [
							'min_length' => 'Password harus lebih besar dari 7 karakter',
							'max_length' => 'Password haurs lebih kecil dari 24 karakter'
						]
					],
					'edit_img' => [
						'rules' => 'max_size[edit_img,5120]|is_image[edit_img]|max_dims[edit_img],3500,3500]|mime_in[edit_img,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'max_size' => 'Ukuran Gambar melebihi 5MB !', //<<<< Masalah
							'is_image' => 'File bukan gambar !',
							'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
							'mime_in' => 'Format file harus jpg/jpeg/png !'
						]
					]
				])) {
					session()->setFlashdata('pesan', '<div class="notif-failed">Data Gagal Di Update!</div>');
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
				$old_password = $this->request->getPost('old_password');
				$new_password = $this->request->getPost('new_password');
				//If the password IS NOT '' or 0 or '0' or NULL
				if (!empty($new_password)) {
					$pass = password_hash($new_password, PASSWORD_DEFAULT);
				} else {
					$pass = $old_password;
				}

				$data = array(
					'nama' => str_replace("'", "", htmlspecialchars($this->request->getPost('user'), ENT_QUOTES)),
					'email' => str_replace("'", "", htmlspecialchars($this->request->getPost('email'), ENT_QUOTES)),
					'password' => $pass,
					'role' => str_replace("'", "", htmlspecialchars($this->request->getPost('role'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				$this->adminModel->updateUser($data, $id);
				session()->setFlashdata('pesan', '<div class="notif-success">Data Berhasil Di Update!</div>');
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
				session()->setFlashdata('pesan', '<div class="notif-success">User Berhasil Di Hapus!</div>');
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

	public function cropImage()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"user" => $this->adminModel->getUser(),
				];
				return view('admin/upload', $data);
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

	// ==================================== Highlights =========================================

	public function LogUser()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$data = [
					"title" => "Aktivitas User | INVENBAR",
					"CurrentMenu" => "logUser",
					"info" => $this->newsModel->showTask(),
					"user" => $this->adminModel->getUser()
				];
				return view('admin/logUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Complain()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$data = [
					"title" => "Komplain Pekerja | INVENBAR",
					"CurrentMenu" => "komplainUser",
					"info" => $this->newsModel->showTask(),
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain()
				];
				return view('admin/komplainUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function arsipKomplain()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// upload tabel 'arsip_komplain'
				// $this->arsipKompModel->insert([
				// 	'no_arsipKomp' => $no_komp,
				// 	'uid_arsipKomp' => $uid,
				// 	'email_arsipKomp' => $inputEmail,
				// 	'judul_arsipKomp' => $judul,
				// 	'isi_arsipKomp' => $isi,
				// 	'foto_arsipKomp' => $namaFoto,
				// 	'waktu_arsipKomp' => $namaFoto
				// ]);

				// return redirect()->to('/Admin/Complain');
				$a = $this->request->getVar('no_komplain');
				$b = $this->request->getVar('status');
				$c = $this->request->getVar('komen');
				echo $c . "-" . $b . "-" . $a;
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}
}
