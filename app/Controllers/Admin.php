<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Models\Admin_Model;
use App\Models\userModel;
use App\Models\Pengumuman_Model;
use App\Models\Komplain_Model;
use App\Models\ArsipKomp_Model;
use App\Models\Log_Model;
use App\Models\Absensi_Model;
use App\Models\userActivity_Model;

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
	protected $userModel;
	protected $barangModel;
	protected $newsModel;
	protected $komplainModel;
	protected $arsipKompModel;
	protected $Log_Model;
	protected $absensiModel;
	protected $userActivityModel;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();

		$this->adminModel = new Admin_Model();
		$this->userModel = new userModel();
		$this->barangModel = new Barang_Model();
		$this->newsModel = new Pengumuman_Model();
		$this->komplainModel = new Komplain_Model();
		$this->arsipKompModel = new ArsipKomp_Model();
		$this->LogModel = new Log_Model();
		$this->absensiModel = new Absensi_Model();
		$this->userActivityModel = new userActivity_Model();
	}

	public function index()
	{
		return redirect()->to('/Menu/Datauser');
	}

	//============================================== Data User Section ==============================================

	public function Datauser()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"title" => "Data Pekerja | IBMAETER",
					"CurrentMenu" => "data_user",
					'validation' => \Config\Services::validation(),
					"info" => $this->newsModel->showTask(),
					"infoV" => $this->newsModel->showExpVisibility(), // isi pengumuman dropdown
					"infoCV" => $this->newsModel->CountExpVisibility(array('uid' => session('uid'))), // counter pengumuman
					"user" => $this->adminModel->getUser(),
					"log_notifs" => $this->LogModel->notifsLog(),
					"komplain_notifs" => $this->komplainModel->notifsKomplain(),
					"us" => $this->adminModel->countUser()
				];
				return view('admin/menu/data_user', $data);
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
							'max_length' => 'nama huruf harus lebih kecil dari 60 karakter'
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
							'max_length' => 'Password harus lebih kecil dari 24 karakter'
						]
					],
					'confirm_password' => [
						'rules' => 'matches[password]',
						'errors' => [
							'matches' => 'input Password tidak sama !'
						]
					],
					'gender' => [
						'rules' => 'max_length[24]',
						'errors' => [
							'max_length' => 'input gender maksimal 24 karakter'
						]
					],
					'department' => [
						'rules' => 'max_length[24]',
						'errors' => [
							'max_length' => 'input department maksimal 24 karakter'
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
					'gender' => str_replace("'", "", htmlspecialchars($this->request->getPost('gender'), ENT_QUOTES)),
					'department' => str_replace("'", "", htmlspecialchars($this->request->getPost('department'), ENT_QUOTES)),
					'role' => str_replace("'", "", htmlspecialchars($this->request->getPost('role'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				// dd($data);
				$this->adminModel->addUser($data);
				session()->setFlashdata('pesan', '<div class="notif-success">
				Data Berhasil Ditambahkan!
			  </div>');

				$aktivitas = session('nama') . " menambahkan Akun baru dengan nama : " . $data['nama'] . ", email : " . $data['email'] . ", dan department : " . $data['department'] . " sebagai " . $data['role'];
				// insert user aktivity saat menambahkan akun baru
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Edit_User() //<< tambahi untuk update session jika user ini sedang login
	{							//<< ya gak guna ke user yg diubah soalnya session main di lokal browser, dan update sendiri klo si user login ulang
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
					'gender' => [
						'rules' => 'max_length[24]',
						'errors' => [
							'max_length' => 'input gender maksimal 24 karakter'
						]
					],
					'department' => [
						'rules' => 'max_length[24]',
						'errors' => [
							'max_length' => 'input department maksimal 24 karakter'
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
					'gender' => str_replace("'", "", htmlspecialchars($this->request->getPost('gender'), ENT_QUOTES)),
					'department' => str_replace("'", "", htmlspecialchars($this->request->getPost('department'), ENT_QUOTES)),
					'role' => str_replace("'", "", htmlspecialchars($this->request->getPost('role'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				$this->adminModel->updateUser($data, $id);
				session()->setFlashdata('pesan', '<div class="notif-success">Data Berhasil Di Update!</div>');

				$aktivitas = session('nama') . " mengubah Akun dengan nama : " . $data['nama'] . ", email : " . $data['email'] . ", dan department : " . $data['department'] . " sebagai " . $data['role'];
				// insert user aktivity saat mengubah akun baru
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

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

				$aktivitas = session('nama') . " menghapus Akun dengan nama : " . $user['nama'] . ", email : " . $user['email'] . ", dan department : " . $user['department'] . " sebagai " . $user['role'];
				// insert user aktivity saat menghapus sebuah akun
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

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

	public function cropImage()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"user" => $this->adminModel->getUser(),
				];
				if (isset($_POST["image"])) {
					$tempdir = "img/temp_upload/";
					if (!file_exists($tempdir)) {
						mkdir($tempdir);
					}
					$data = $_POST["image"];
					$image_array_1 = explode(";", $data);
					$image_array_2 = explode(",", $image_array_1[1]);
					$data = base64_decode($image_array_2[1]);
					$imageName = $tempdir . time() . '.png';
					file_put_contents($imageName, $data);

					// unlink($imageName);
					// echo '<img src="' . base_url() . '/' . $imageName . '" class="img-thumbnail img-preview"' . 'alt="image preview"' . ' style="max-height: 370px; "/>';
				}
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ============================================== Perizinan Barang ===============================================
	public function Perizinan()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"title" => "Perizinan Barang | IBMAETER",
					"CurrentMenu" => "perizinan",
					"info" => $this->newsModel->showTask(),
					"infoV" => $this->newsModel->showExpVisibility(), // isi pengumuman dropdown
					"infoCV" => $this->newsModel->CountExpVisibility(array('uid' => session('uid'))), // counter pengumuman
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					"log_item" => $this->LogModel->ReadLogItem(),
					"log_notifs" => $this->LogModel->notifsLog(),
					"komplain_notifs" => $this->komplainModel->notifsKomplain(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/menu/perizinan', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	//----------------------------------- form Perizinan -----------------------------------

	public function AcceptPerizinan_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"log_item" => $this->LogModel->ReadLogItem(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/perizinan_part/accept_modal', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function DeclinePerizinan_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"log_item" => $this->LogModel->ReadLogItem(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/perizinan_part/decline_modal', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	//----------------------------------- Perizinan Action -----------------------------------

	public function GetPerizinan() // Pick id_Perizinan
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$no_log = $this->request->getPost('no_log');
				$data = $this->LogModel->getIdPerizinan($no_log);
				echo json_encode($data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function AksiPerizinan()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				if (!$this->validate([
					'komen' => [
						'rules' => 'max_length[256]',
						'errors' => ['max_length' => 'Komen tidak boleh lebih dari 256 huruf & karakter.']
					]
				])) {
					session()->setFlashdata('komenPerz', '<div class="notif-failed">Perizinan Barang Gagal !</div>');
					return redirect()->to('/Admin/Perizinan')->withInput();
				}

				// mengambil data
				$no_log = $this->request->getPost('perizinan_no_log');
				// $id_item = $this->request->getPost('perizinan_id_item'); sudah diganti dengan trigger sql
				$status = $this->request->getPost('perizinan_status');
				$ket = $this->request->getPost('perizinan_komen');

				// jika komen kosong
				if ($ket == null) {
					$ket = "Terverifikasi !";
				}

				// Belum Ada fitur Rekam siapa admin yang memproses request
				$data = [
					'status' => str_replace("'", "", htmlspecialchars($status, ENT_QUOTES)),
					'ket' => str_replace("'", "", htmlspecialchars($ket, ENT_QUOTES)),
					'tgl' => date("Y-m-d h:i:sa"),
					'uid_alur_admin' => session('uid')
				];

				// upload tabel 'arsip_komplain'
				$this->LogModel->updateLogItem($data, $no_log);

				$aktivitas = "Perizinan dengan nomor " . $no_log . ", " . $data['status'] . " oleh " . session('nama');
				// insert user aktivity saat melakukan perizinan barang
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				var_dump($data);

				session()->setFlashdata('komenPerz', '<div class="notif-success">Perizinan Barang Berhasil !</div>');
				// return redirect()->to('/Admin/Perizinan');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ============================================== Edit Pengumuman ===============================================

	public function Adminpengumuman() // Base Page
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$data = [
					"title" => "Edit Pengumuman | IBMAETER",
					"CurrentMenu" => "edit_pengumuman",
					"info" => $this->newsModel->showTask(),
					"infoV" => $this->newsModel->showExpVisibility(), // isi pengumuman dropdown
					"infoCV" => $this->newsModel->CountExpVisibility(array('uid' => session('uid'))), // counter pengumuman
					"user" => $this->adminModel->getUser(),
					"log_notifs" => $this->LogModel->notifsLog(),
					"log_item" => $this->LogModel->ReadLogItem(),
					"komplain_notifs" => $this->komplainModel->notifsKomplain(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/menu/pengumuman', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function ShowPengumuman() // Show Master Data Pengumuman
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$data['table_pengumuman'] = $this->newsModel->showTask();
				// echo json_encode($data);
				return view('admin/pengumuman_part/list_pengumuman', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ----------------------------------- Form Pengumuman Section -----------------------------------

	public function TambahPengumuman_Form() // Tambah Form Modal
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				return view('admin/pengumuman_part/tambah_form');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function DeletePengumuman_Form() // Delete Form Modal
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				return view('admin/pengumuman_part/delete_form');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}
	public function BlankPengumuman_Form()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				return view('admin/pengumuman_part/blank_field');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ----------------------------------- Edit Pengumuman Action -----------------------------------
	public function GetIdPengumuman() // Pick id_pengumuman
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$id = $this->request->getPost('id_pengumuman');
				$data = $this->newsModel->getIdPengumuman($id);
				echo json_encode($data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function TambahPengumuman() // Action 
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				if (!$this->validate([
					'judul' => [
						'rules' => 'max_length[256]',
						'errors' => ['max_length' => 'judul tidak boleh lebih dari 256 huruf & karakter.']
					],
					'isi' => [
						'rules' => 'max_length[256]',
						'errors' => ['max_length' => 'isi tidak boleh lebih dari 256 huruf & karakter.']
					],
				])) {
					session()->setFlashdata('Pengumuman', '<div class="notif-failed">Gagal Menambahkan Pengumuman !</div>');
					return redirect()->to('/Admin/Perizinan')->withInput();
				}

				// AJAX
				$data = array(
					'waktu' => date("Y-m-d h:i:sa"),
					'uid' => str_replace("'", "", htmlspecialchars(session('uid'), ENT_QUOTES)),
					'judul' => str_replace("'", "", htmlspecialchars($this->request->getPost('judul'), ENT_QUOTES)),
					'isi' => str_replace("'", "", htmlspecialchars($this->request->getPost('isi'), ENT_QUOTES))
				);
				$this->newsModel->addInfo($data);

				$aktivitas = session('nama') . " menambahkan pengumuman dengan judul <b>" . $data['judul'] . "</b>.";
				// insert user aktivity saat menambahkan pengumuman
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				session()->setFlashdata('Pengumuman', '<div class="notif-failed">Berhasil Menambahkan Pengumuman !</div>');
				// return redirect()->to('Adminpengumuman'); Di GANTI AJAX
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function DeletePengumuman() // Action
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$id = $this->request->getPost('id_pengumuman');
				// $data = array(
				// 	'waktu' => date("Y-m-d h:i:sa"),
				// 	'uid' => str_replace("'", "", htmlspecialchars(session('uid'), ENT_QUOTES)),
				// 	'judul' => str_replace("'", "", htmlspecialchars($this->request->getPost('judul'), ENT_QUOTES)),
				// 	'isi' => str_replace("'", "", htmlspecialchars($this->request->getPost('isi'), ENT_QUOTES))
				// );
				$this->newsModel->deleteInfo($id);

				$aktivitas = session('nama') . " menghapus pengumuman dengan id pengumuman : " . $id . ".";
				// insert user aktivity saat menambahkan pengumuman
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				session()->setFlashdata('Pengumuman', '<div class="notif-failed">Berhasil Mengedit Pengumuman !</div>');
				// return redirect()->to('Adminpengumuman'); DIGANTI AJAX
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}


	// =========================================================== Aktivitas User ================================================================

	public function LogUser()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$data = [
					"title" => "Aktivitas User | IBMAETER",
					"CurrentMenu" => "logUser",
					"info" => $this->newsModel->showTask(),
					"infoV" => $this->newsModel->showExpVisibility(), // isi pengumuman dropdown
					"infoCV" => $this->newsModel->CountExpVisibility(array('uid' => session('uid'))), // counter pengumuman
					"user" => $this->adminModel->getUser(),
					"log_notifs" => $this->LogModel->notifsLog(),
					"komplain_notifs" => $this->komplainModel->notifsKomplain(),
					"validation" => \Config\Services::Validation(),
					"absensi" => $this->absensiModel->getAbsen(),
					"countPresent" => $this->absensiModel->countPresent(),
					"countLate" => $this->absensiModel->countLate(),
					"countPermission" => $this->absensiModel->countPermission(),
					"totalUser" => $this->userModel->countUser(),
					'aktivitas' => $this->userActivityModel->getActivity()
				];
				return view('admin/menu/logUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function responIzin()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// validasi
				if (!$this->validate([
					'komen' => [
						'rules' => 'min_length[0]|max_length[99]',
						'errors' => ['max_length' => 'Komen tidak boleh lebih dari 99 huruf & karakter.', 'min_length' => 'Komen']
					]
				])) {
					return redirect()->to('/Admin/LogUser')->withInput();
				}

				$id = $this->request->getPost('id_absen');
				$status = $this->request->getPost('status_absen');
				$komen = $this->request->getPost('komen');

				if ($komen == null) {
					if ($status == "Diterima") {
						$komen = "Terverifikasi!";
					} elseif ($status == "Ditolak") {
						$komen = "Izin tidak diterima";
					} else {
						session()->setFlashdata('alert', '<h4>Terjadi maslah pada bagian <b>komentar</b>.</h4>');
						return redirect()->to('/Admin/LogUser')->withInput();
					}
				}

				$this->absensiModel->update($id, [
					'respons' => $status,
					'komen_izin' => $komen,
					'waktu_komen' => date("Y-m-d H:i:s", time())
				]);

				session()->setFlashdata('pesan', '<h4>Pesan Terkirim.</h4>');
				return redirect()->to('/Admin/LogUser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// =========================================================== Komplen dari User ================================================================

	public function Complain()
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				$data = [
					"title" => "Komplain Pekerja | IBMAETER",
					"CurrentMenu" => "komplainUser",
					"info" => $this->newsModel->showTask(),
					"infoV" => $this->newsModel->showExpVisibility(), // isi pengumuman dropdown
					"infoCV" => $this->newsModel->CountExpVisibility(array('uid' => session('uid'))), // counter pengumuman
					"user" => $this->adminModel->getUser(),
					"log_notifs" => $this->LogModel->notifsLog(),
					"komplain_notifs" => $this->komplainModel->notifsKomplain(),
					// 'komplain' => $this->komplainModel->getKomplain(),
					// 'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/menu/komplainUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function ShowKomplain() // Show Master Data Komplain
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$data['komplain'] = $this->komplainModel->getKomplain();
				// echo json_encode($data);
				return view('admin/komplain_part/list_komplain', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function ShowKomplainArsip() // Show Master Data Arsip Komplain
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$data['arsipKomp'] = $this->arsipKompModel->getJoinUser();
				// echo json_encode($data);
				return view('admin/komplain_part/list_arsip', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	//----------------------------------- form Komplain -----------------------------------

	public function DetailArsipKomplain_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/komplain_part/detail_modal', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function AcceptKomplain_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					'komplain' => $this->komplainModel->getKomplain(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/komplain_part/accept_modal', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function DeclineKomplain_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					'komplain' => $this->komplainModel->getKomplain(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/komplain_part/decline_modal', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	//----------------------------------- Komplain Action -----------------------------------

	public function GetIDKomplain() // Pick id_Komplain
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$id = $this->request->getPost("id_komplain");
				$data = $this->komplainModel->getKomplain($id);
				echo json_encode($data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function GetUidArsipKomplain() // Pick uid arsip Komplain
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$id = $this->request->getPost("id_arsipKomp");
				$data = $this->arsipKompModel->getIdArsipKomp($id);
				echo json_encode($data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function GetAdminArsipKomplain() // Pick uid arsip Komplain
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$id = $this->request->getPost("id_arsipKomp");
				$data = $this->arsipKompModel->getUidAdminArsipKomp($id);
				echo json_encode($data);
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
				if (!$this->validate([
					'perizinan_komen' => [
						'rules' => 'max_length[256]',
						'errors' => ['max_length' => 'Komen tidak boleh lebih dari 256 huruf & karakter.']
					]
				])) {
					return redirect()->to('/Admin/Complain')->withInput();
				}

				// mengambil data
				$id_komp = $this->request->getPost('id_komplain');
				$no_komp = $this->request->getPost('no_komplain');
				$status = $this->request->getPost('status');
				$komen = $this->request->getPost('adminkomen_komplain');

				// jika komen kosong
				if ($komen == null) {
					$komen = "Terverifikasi!";
				}

				$komplain = $this->komplainModel->getIdKomplain($id_komp);

				// insert tabel 'komplain_arsip' then delet this
				$data = [
					'no_arsipKomp' => $no_komp,
					'uid_arsipKomp' => intval($komplain['uid_komplain']),
					'judul_arsipKomp' => $komplain['judul_komplain'],
					'isi_arsipKomp' => $komplain['isi_komplain'],
					'foto_arsipKomp' => $komplain['foto_komplain'],
					'waktu_arsipKomp' => $komplain['waktu_komplain'],
					'uid_arsipKomp_admin' => intval(session('uid')),
					'status_arsipKomp' => $status,
					'comment_arsipKomp' => str_replace("'", "", htmlspecialchars($komen, ENT_QUOTES)),
					'commented_at' => date("Y-m-d h:i:sa")
				];

				// Update
				$this->arsipKompModel->addArsip($data);
				// Then Delet dis
				$this->komplainModel->where('id_komplain', $id_komp)->delete();

				$statusAct = "menolak";
				// jika statusnya diterima maka
				if ($status == 'accepted') {
					$statusAct = "menerima";
				}
				$aktivitas = session('nama') . $statusAct . " komplain pekerja dengan nomor komplain : " . $data['no_arsipKomp'] . ".";
				// insert user aktivity saat menambahkan pengumuman
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				session()->setFlashdata('komenKomp', 'Pesan terkirim.');
				return redirect()->to('/Admin/Complain');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}
}
