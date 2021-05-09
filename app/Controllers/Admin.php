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

	// ======================= Export & Print Data ========================

	public function exceluser()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "EXCEL USER | INVENBAR",
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
					"title" => "DOC USER | INVENBAR",
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
					"title" => "PDF USER | INVENBAR",
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

	public function excelkomplain()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "EXCEL KOMPLAIN | INVENBAR"
				];

				return view('admin/exxlsKomplain', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function dockomplain()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "DOC KOMPLAIN | INVENBAR"
				];

				return view('admin/exdocKomplain', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfkomplain()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF KOMPLAIN | INVENBAR"
				];

				$html = view('admin/expdfKomplain', $data);

				$dompdf = new Dompdf();
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'potrait');
				$dompdf->render();
				$dompdf->stream('Data-Komplain.pdf');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function excelabsensi()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "EXCEL ABSENSI | INVENBAR"
				];

				return view('admin/exxlsAbsensi', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function docabsensi()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "DOC ABSENSI | INVENBAR"
				];

				return view('admin/exdocAbsensi', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfabsensi()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF ABSENSI | INVENBAR"
				];

				$html = view('admin/expdfAbsensi', $data);

				$dompdf = new Dompdf();
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'potrait');
				$dompdf->render();
				$dompdf->stream('Data-Absensi.pdf');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function excelaktivitas()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "EXCEL AKTIVITAS | INVENBAR"
				];

				return view('admin/exxlsAktivitas', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function docaktivitas()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "DOC AKTIVITAS | INVENBAR"
				];

				return view('admin/exdocAktivitas', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfaktivitas()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF AKTIVITAS | INVENBAR"
				];

				$html = view('admin/expdfAktivitas', $data);

				$dompdf = new Dompdf();
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'potrait');
				$dompdf->render();
				$dompdf->stream('Data-Aktivitas.pdf');
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintUser()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF USER | INVENBAR",
					"user" => $this->adminModel->getUser(),
				];
				return view('admin/printUser', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintKomplain()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF KOMPLAIN | INVENBAR",
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
				];

				return view('admin/printKomplain', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintAktivitas()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF AKTIVITAS | INVENBAR"
				];

				return view('admin/printAktivitas', $data);
			} else {
				return redirect()->to('/dashboard');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintAbsensi()
	{
		// seleksi login
		if (session('uid') != null) {
			// jika user merupakan Admin
			if (session('role') == 0) {
				$data = [
					"title" => "PDF Absensi | INVENBAR"
				];

				return view('admin/printAbsensi', $data);
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
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
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
				if (!$this->validate([
					'komen' => [
						'rules' => 'max_length[256]',
						'errors' => ['max_length' => 'Komen tidak boleh lebih dari 256 huruf & karakter.']
					]
				])) {
					return redirect()->to('/Admin/Complain')->withInput();
				}

				// mengambil data
				$no_komp = $this->request->getPost('no_komplain');
				$status = $this->request->getPost('status');
				$komen = $this->request->getPost('komen');

				// jika komen kosong
				if ($komen == null) {
					$komen = "-";
				}

				$komplain = $this->komplainModel->getKomplain($no_komp);

				// upload tabel 'arsip_komplain'
				$this->arsipKompModel->insert([
					'no_arsipKomp' => $no_komp,
					'uid_arsipKomp' => $komplain['uid_komplain'],
					'email_arsipKomp' => $komplain['email_komplain'],
					'judul_arsipKomp' => $komplain['judul_komplain'],
					'isi_arsipKomp' => $komplain['isi_komplain'],
					'foto_arsipKomp' => $komplain['foto_komplain'],
					'waktu_arsipKomp' => $komplain['waktu_komplain'],
					'status_arsipKomp' => $status,
					'comment_arsipKomp' => str_replace("'", "", htmlspecialchars($komen, ENT_QUOTES)),
					'commented_at' => date("Y-m-d h:i:sa")
				]);

				$this->komplainModel->where('no_komplain', $no_komp)->delete();;

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
