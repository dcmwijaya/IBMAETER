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

	public function ShowUsers()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"user" => $this->userModel->getJoinDivisionUser(),
					'validation' => \Config\Services::validation(),
				];
				return view('admin/data_user_part/list_user', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	// ----------------------------------- form Data User -----------------------------------
	public function TambahUser_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"user" => $this->userModel->getJoinDivisionUser(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/data_user_part/tambah_form', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function EditUser_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"user" => $this->userModel->getJoinDivisionUser(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/data_user_part/edit_form', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function HapusUser_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"user" => $this->userModel->getJoinDivisionUser(),
					'validation' => \Config\Services::Validation()
				];
				return view('admin/data_user_part/delete_form', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function DetailUser_Form()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$data = [
					"user" => $this->userModel->getJoinDivisionUser(),
				];
				return view('admin/data_user_part/detail_form', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}
	// ----------------------------------- Aksi Data User -----------------------------------
	public function GetUidUser() // Pick uid
	{
		// seleksi no login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				// AJAX
				$uid = $this->request->getPost('uid');
				$data = $this->userModel->getJoinDivisionUser($uid);
				echo json_encode($data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function GetDivision()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$id = $this->request->getPost('id_divisi');
				$division = $this->userModel->viewDivisionUser();
				$data = '';
				// $data .= '<option value="">(Tidak Ada)</option>';

				foreach ($division as $s) {
					if ($s->id_divisi == $id) {
						$selected = "selected";
					} else {
						$selected = "";
					}
					$data .= "<option class='checksupplier' value='$s->id_divisi' $selected>$s->nama_divisi</option>";
				}
				return $data;
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function GetRoleDivision()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$id = $this->request->getPost('id_divisi');
				$roleDivision = $this->request->getPost('role_divisi');
				$data = '';
				// $data .= '<option value="">(Tidak Ada)</option>';
				if ($roleDivision == 0) {
					$division = $this->userModel->RoleDivisionUser($roleDivision);
					foreach ($division as $s) {
						if ($s->id_divisi == $id) {
							$selected = "selected";
						} else {
							$selected = "";
						}
						$data .= "<option class='checksupplier' value='$s->id_divisi' $selected>$s->nama_divisi</option>";
					}
				} else if ($roleDivision == 1) {
					$division = $this->userModel->RoleDivisionUser($roleDivision);
					foreach ($division as $s) {
						if ($s->id_divisi == $id) {
							$selected = "selected";
						} else {
							$selected = "";
						}
						$data .= "<option class='checksupplier' value='$s->id_divisi' $selected>$s->nama_divisi</option>";
					}
				}
				return $data;
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function validate_form()
	{
	}

	public function Add_User()
	{
		// seleksi login
		if (session('uid') != null) {
			if (session('role') == 0) {
				$validation = \Config\Services::Validation();
				$rules = [ //passing validate
					'user' => [
						'rules' => 'required|max_length[60]',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'max_length' => 'nama huruf harus lebih kecil dari 60 karakter'
						]
					],
					'email' => [
						'rules' => 'required|valid_email|is_unique[user.email]',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'valid_email' => 'E-mail User harus sesuai format email',
							'is_unique' => '{field} sudah terdaftar'
						]
					],
					'ttl' => [
						'rules' => 'required|valid_date',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'valid_date' => 'Masukan TTL Salah !'
						]
					],
					'password' => [
						'rules' => 'required|min_length[7]|max_length[24]',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'min_length' => 'Password harus lebih besar dari 7 karakter',
							'max_length' => 'Password harus lebih kecil dari 24 karakter'
						]
					],
					'confirm_password' => [
						'rules' => 'required|matches[password]',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'matches' => 'input Password tidak sama !'
						]
					],
					'gender' => [
						'rules' => 'required|max_length[24]',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'max_length' => 'input gender maksimal 24 karakter'
						]
					],
					'division' => [
						'rules' => 'required|alpha_numeric',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'alpha_numeric' => 'input division invalid !'
						]
					],
					'role' => [
						'rules' => 'required|alpha_numeric',
						'errors' => [
							'required' => 'Input Harus di isi!',
							'alpha_numeric' => 'input harus angka'
						]
					],
					'add_img' => [
						'rules' => 'max_size[add_img,4096]|is_image[add_img]|max_dims[add_img,3500,3500]|ext_in[add_img,png,jpg,jpeg]',
						'errors' => [
							'max_size' => 'File gambar tidak boleh lebih dari 4MB !',
							'is_image' => 'File bukan gambar !',
							'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
							'ext_in' => 'Format file harus jpg/jpeg/png !'
						]
					]
				];
				if (!$this->validate($rules)) {
					$response = [
						'success' => false,
						'msg' => '<div class="notif-failed">Data Gagal Ditambahkan!</div>',
						// get error
						'user' => $validation->getError('user'),
						'email' => $validation->getError('email'),
						'password' => $validation->getError('password'),
						'confirm_password' => $validation->getError('confirm_password'),
						'ttl' => $validation->getError('ttl'),
						'gender' => $validation->getError('gender'),
						'role' => $validation->getError('role'),
						'division' => $validation->getError('division'),
						'add_img' => $validation->getError('add_img'),
					];
					return $this->response->setJSON($response);
				}
				// -----------------------
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
					'role' => intval($this->request->getPost('role')),
					'divisi_user' => intval($this->request->getPost('division')),
					'tanggal_lahir' => str_replace("'", "", htmlspecialchars($this->request->getPost('ttl'), ENT_QUOTES)),
					'picture' => $namaImg
				);

				$aktivitas = session('nama') . " menambahkan Akun baru dengan nama : " . $data['nama'] . ", email : " . $data['email'] . ", dan divisi : " . $data['divisi_user'] . " sebagai " . $data['role'];
				// insert user aktivity saat menambahkan akun baru
				$this->userActivityModel->insert([
					'uid_aktivitas' => session('uid'),
					'aktivitas' => $aktivitas,
					'waktu_aktivitas' => date("Y-m-d H:i:s")
				]);

				if ($this->adminModel->addUser($data)) {
					$response = [
						'success' => true,
						'msg' => '<div class="notif-success">Data Berhasil Ditambahkan!</div>',
					];
				} else {
					$response = [
						'success' => true,
						'msg' => '<div class="notif-failed">Data Gagal Ditambahkan!</div>',
					];
				}
				return $this->response->setJSON($response);
				// return redirect()->to('Datauser');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function Edit_User() //<< tambahi untuk update session jika user ini sedang login
	{							//<< ya gak guna ke user yg diubah soalnya session main di lokal browser, dan update sendiri klo si user login ulang
		//<< kata siapa session harus di update lewat login?
		// seleksi login
		if (session('uid') != null) {
			// seleksi role pengguna
			if (session('role') == 0) {
				if (!$this->validate([
					'new_nama' => [
						'rules' => 'max_length[60]',
						'errors' => [
							'max_length' => 'nama huruf harus lebih kecil dari 60 karakter'
						]
					],
					'new_email' => [
						'rules' => 'valid_email',
						'errors' => [
							'valid_email' => 'E-mail User harus sesuai format email'
						]
					],
					'new_ttl' => [
						'rules' => 'valid_date',
						'errors' => [
							'valid_date' => 'Masukan TTL Salah !'
						]
					],
					'new_password' => [
						'rules' => 'permit_empty|min_length[7]|max_length[24]',
						'errors' => [
							'min_length' => 'Password harus lebih besar dari 7 karakter',
							'max_length' => 'Password haurs lebih kecil dari 24 karakter'
						]
					],
					'new_gender' => [
						'rules' => 'alpha_numeric_punct',
						'errors' => [
							'alpha_numeric_punct' => 'Harus memilih salah satu !'
						]
					],
					'new_role' => [
						'rules' => 'numeric',
						'errors' => [
							'numeric' => 'input harus angka'
						]
					],
					'new_division' => [
						'rules' => 'numeric',
						'errors' => [
							'numeric' => 'input division Invalid !'
						]
					],
					'new_img' => [
						'rules' => 'max_size[new_img,4096]|is_image[new_img]|max_dims[new_img,3500,3500]|ext_in[new_img,png,jpg,jpeg]',
						'errors' => [
							'max_size' => 'File gambar tidak boleh lebih dari 4MB !',
							'is_image' => 'File bukan gambar !',
							'max_dims' => 'Dimensi File tidak boleh melebihi 3500 x 3500 !',
							'ext_in' => 'Format file harus jpg/jpeg/png !'
						]
					]
				])) {
					echo "VALIDATE SALAH";
					// session()->setFlashdata('pesan', '<div class="notif-failed">Data Gagal Di Update!</div>');
					// return redirect()->to('Datauser')->withInput();
				}
				$id = $this->request->getPost('user_id');
				$getUid = $this->userModel->getUserId($id);

				$fileImg = $this->request->getFile('new_img');
				// cek gambar apakah tetap gambar lama
				if ($fileImg->getError() == 4) { // jika mendapat error 4(file tidak diuplod)
					$namaImg = $getUid['picture'];
				} else {
					$namaImg = $fileImg->getRandomName(); // mengambil nama file Random
					$fileImg->move('img/user/', $namaImg); // move gambar to img folder
					// jika nama foto lama bukan default.jpg
					if ($fileImg->getName() != "default.jpg") {
						//hapus gambar lama
						if ($getUid['picture'] !== "default.jpg") {
							unlink('img/user/' . $getUid['picture']);
						}
					}
				}

				$old_password = $getUid['password'];
				$new_password = $this->request->getPost('new_password');
				$pass = '';
				//If the password IS NOT '' or 0 or '0' or NULL
				if (!empty($new_password)) {
					$pass = password_hash($new_password, PASSWORD_DEFAULT);
				} else {
					$pass = $old_password;
				}
				//If the divisi_user IS NOT '' or 0 or '0' or NULL
				$old_division = $getUid['divisi_user'];
				$new_division = $this->request->getPost('new_division');
				$division = '';
				if (!empty($new_division)) {
					$division = $new_division;
				} else {
					$division = $old_division;
				}

				$data = array(
					'nama' => str_replace("'", "", htmlspecialchars($this->request->getPost('new_nama'), ENT_QUOTES)),
					'email' => str_replace("'", "", htmlspecialchars($this->request->getPost('new_email'), ENT_QUOTES)),
					'password' => $pass,
					'gender' => str_replace("'", "", htmlspecialchars($this->request->getPost('new_gender'), ENT_QUOTES)),
					'role' => intval($this->request->getPost('new_role')),
					'divisi_user' => intval($division),
					'tanggal_lahir' => str_replace("'", "", htmlspecialchars($this->request->getPost('new_ttl'), ENT_QUOTES)),
					'picture' => $namaImg
				);
				// Execution
				$this->adminModel->updateUser($data, $id);
				session()->setFlashdata('pesan', '<div class="notif-success">Data Berhasil Di Update!</div>');

				$aktivitas = session('nama') . " mengubah Akun dengan nama : " . $data['nama'] . ", email : " . $data['email'] . ", dan divisi : " . $data['divisi_user'] . " sebagai " . $data['role'];
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

				$aktivitas = session('nama') . " menghapus Akun dengan nama : " . $user['nama'] . ", email : " . $user['email'] . ", dan divisi : " . $user['divisi_user'] . " sebagai " . $user['role'];
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
