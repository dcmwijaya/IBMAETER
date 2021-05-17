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
use Dompdf\Dompdf;


class Exlapor extends BaseController
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
	}

  
  
  // =========================================================================================================
	// ======================================== Export & Print Data Admin ======================================
  // =========================================================================================================

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
					"title" => "EXCEL KOMPLAIN | INVENBAR",
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
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
					"title" => "DOC KOMPLAIN | INVENBAR",
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
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
					"title" => "PDF KOMPLAIN | INVENBAR",
					"user" => $this->adminModel->getUser(),
					'komplain' => $this->komplainModel->getKomplain(),
					'arsipKomp' => $this->arsipKompModel->getAll(),
					'validation' => \Config\Services::Validation()
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

  
  
  // =========================================================================================================
	// ==================================== Export & Print Data Global =========================================
  // =========================================================================================================
	public function excelbarang()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "Excel BARANG | INVENBAR",
				"item" => $this->barangModel->getItems()
			];

			return view('global/exxlsBarang', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function docbarang()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "DOC BARANG | INVENBAR",
				"item" => $this->barangModel->getItems()
			];

			return view('global/exdocBarang', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfbarang()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF BARANG | INVENBAR",
				"item" => $this->barangModel->getItems()
			];

			$html = view('global/expdfBarang', $data);

			$dompdf = new Dompdf();
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'potrait');
			$dompdf->render();
			$dompdf->stream('Tabel-Barang-Gudang-2021.pdf');
		} else {
			return redirect()->to('/login');
		}
	}

	public function excelspesifikasi()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "EXCEL SPESIFIKASI | INVENBAR"
			];

			return view('global/exxlsSpesifikasi', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function docspesifikasi()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "DOC SPESIFIKASI | INVENBAR"
			];

			return view('global/exdocSpesifikasi', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfspesifikasi()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF SPESIFIKASI | INVENBAR"
			];

			$html = view('global/expdfSpesifikasi', $data);

			$dompdf = new Dompdf();
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'potrait');
			$dompdf->render();
			$dompdf->stream('Tabel-Spesifikasi-Barang-2021.pdf');
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfchart1()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF CHART-1 | INVENBAR",
				"class" => $this->barangModel->invenclass(),
				"sc1" => $this->barangModel->stockclass1(),
				"sc2" => $this->barangModel->stockclass2(),
				"sc3" => $this->barangModel->stockclass3(),
				"sc4" => $this->barangModel->stockclass4(),
				"sc5" => $this->barangModel->stockclass5(),
				"sc6" => $this->barangModel->stockclass6(),
				"sc7" => $this->barangModel->stockclass7()
			];

			return view('global/printChart1', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfchart2()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF CHART-2 | INVENBAR",
				"class" => $this->barangModel->invenclass(),
				"sc1" => $this->barangModel->stockclass1(),
				"sc2" => $this->barangModel->stockclass2(),
				"sc3" => $this->barangModel->stockclass3(),
				"sc4" => $this->barangModel->stockclass4(),
				"sc5" => $this->barangModel->stockclass5(),
				"sc6" => $this->barangModel->stockclass6(),
				"sc7" => $this->barangModel->stockclass7()
			];

			return view('global/printChart2', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfchart3()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF CHART-3 | INVENBAR",
				"category" => $this->barangModel->jenis(),
				"sj1" => $this->barangModel->stockjenis1(),
				"sj2" => $this->barangModel->stockjenis2(),
				"sj3" => $this->barangModel->stockjenis3(),
				"sj4" => $this->barangModel->stockjenis4(),
				"sj5" => $this->barangModel->stockjenis5()
			];

			return view('global/printChart3', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfchart4()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF CHART-4 | INVENBAR",
				"category" => $this->barangModel->jenis(),
				"sj1" => $this->barangModel->stockjenis1(),
				"sj2" => $this->barangModel->stockjenis2(),
				"sj3" => $this->barangModel->stockjenis3(),
				"sj4" => $this->barangModel->stockjenis4(),
				"sj5" => $this->barangModel->stockjenis5()
			];

			return view('global/printChart4', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintBarang()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF BARANG | INVENBAR",
				"item" => $this->barangModel->getItems()
			];

			return view('global/printBarang', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function pdfprintSpesifikasi()
	{
		if (session('uid') != null) {
			$data = [
				"title" => "PDF SPESIFIKASI | INVENBAR"
			];

			return view('global/printSpesifikasi', $data);
		} else {
			return redirect()->to('/login');
		}
	}
}
