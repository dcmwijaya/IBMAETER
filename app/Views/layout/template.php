<!doctype html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Website Item Warehouse Management Framework C">
	<meta name="author" content="Dev Cakra, Merdin Risal, RifkyA911">
	<title><?= $title; ?></title>
	<link rel="icon" href="<?= base_url('img/icon/favicon.ico') ?>">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

	<!------------------------ CSS ------------------------>
	<!-- Bootsrap 4.0.0 but replace and using ver MDB -->
	<link rel="stylesheet" href="<?= base_url('../vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('../css/mdb.min.css') ?>" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">

	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('../vendor/DataTables/css/jquery.dataTables.css') ?>">

	<!-- malihu scrollbar -->
	<link rel="stylesheet" href="<?= base_url('../vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css') ?>">

	<!-- croppie -->
	<link rel="stylesheet" href="<?= base_url('../vendor/croppie/croppie.css') ?>">

	<!-- stepwizard -->
	<!-- <link rel="stylesheet" href="<?= base_url('../vendor/stepwizard/style.css') ?>"> -->

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url('../css/custom.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('../css/sidebar.css') ?>" />
</head>

<body>
	<?= $this->include('layout/tentang'); ?>
	<?= $this->include('layout/sidebar'); ?>
	<?= $this->include('layout/navbar'); ?>
	<?= $this->renderSection('content'); ?>

	<footer class="py-5 bg-light mt-auto" style="font-family: 'Roboto';">
		<div class="container">
			<p class="m-0 text-center text-dark"><a class="text-dark" type="button" data-toggle="modal" data-target="#TentangModal"><img class="mr-1" src="<?= base_url('img/icon/favicon-32x32.png') ?>" alt=""> Ibmaeter (Inventaris Barang Gudang dan Manajemen Pekerja Terpadu)</a></p>
		</div>
	</footer>
	</div> <!-- END wrapper pembungkus body from sidebar.php-->
</body>

<!------------------------ JavaScript ------------------------>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.slim.min.js"></script>
<!-- Bootsrap MDB -->
<script type="text/javascript" src="<?= base_url('../js/mdb.min.js') ?>"></script>
<!-- Bootsrap 4.0.0 JS -->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/assets/js/vendor/popper.min.js') ?>"></script>
<script src="<?= base_url('../vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script><!-- jQuery Custom Scroller CDN -->
<!-- stepwizard -->
<!-- <script src="<?= base_url('../vendor/stepwizard/script.js') ?>"></script> -->

<!-------------------------------------------------- Config malhiu scrollbar plugin -------------------------------------------------->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!-- malihu depedensi-->
<script src="<?= base_url('../vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script>
	(function($) {
		$(window).on("load", function() {

			$("#sidebar-body").mCustomScrollbar({
				theme: "minimal"
			});

		});
	})(jQuery);
</script>

<!-------------------------------------------------- Config Login ---------------------------------------------------------------->
<script>
	// $(document).ready(function() {
	// 	$('#alert-login').ready(function() {
	// 		setTimeout({
	// 			$('#alert-login').remove();
	// 		}), 45000;
	// 	})
	// });
</script>

<!-------------------------------------------------- Config datatables -------------------------------------------------->
<script type="text/javascript" src="<?= base_url('../vendor/DataTables/js/jquery.dataTables.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#table_user').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_absensi').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_aktivitas').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('.toast').toast('show');
		// load tables
		listKomplain();
		listArsipKomplain();
		// PengaduanForm();
	});
</script>

<!-------------------------------------------------- Config Sidebar -------------------------------------------------->
<script>
	$(document).ready(function() {
		$("#sidebarCollapse").on('click', function(e) {
			e.stopPropagation();
			$("#fading").toggleClass('fading');
			$("#sidebar").toggleClass('active');
			setTimeout(function() {
				listItem()
				listPerizinan();
				listSpesifikasi()
				listPengumuman();
			}, 1000);
		});
		$('#sidebar').click(function(e) {
			e.stopPropagation();
		});
		// media query 
		$('body,html').click(function(e) {
			if ($(window).width() < 760) {
				$('#sidebar').removeClass('active');
				$("#fading").removeClass('fading');
			}
		});
	});
</script>

<!-- Config Modal -->
<script>
	$(document).ready(function() {
		$('.modal-dismiss').click(function() {
			$('#Perizinan_Modal').modal('hide');
		});
	});
</script>

<!-------------------------------------------------- Catch Data for Kelola Barang -------------------------------------------------->
<script>
	let sloading = '<div class="spinner-border spinner-border-sm text-info" role="status"><span class="sr-only">&emsp;&ensp; Loading...</span></div> Loading Data...'
	let ItemSaveType;
	let InOutSaveType;

	//......................................... Kelola Barang Master Data Load .........................................
	function listItem() {
		$.ajax({
			url: '<?= base_url('Menu/ShowItem'); ?>',
			beforeSend: function(f) {
				$('#Item_AJAX').html(sloading);
			},
			success: function(data) {
				$('#Item_AJAX').html(data);
				$('#table_item').DataTable({
					scrollY: '100vh',
					scrollCollapse: true,
					paging: false
				});
			}
		});
	}

	function listSpesifikasi() {
		$.ajax({
			url: '<?= base_url('Menu/ShowSpesifikasi'); ?>',
			beforeSend: function(f) {
				$('#Spesifikasi_AJAX').html(sloading);
			},
			success: function(data) {
				$('#Spesifikasi_AJAX').html(data);
				$('#table_spesifikasi').DataTable({
					scrollY: '100vh',
					scrollCollapse: true,
					paging: false
				});
			}
		});
	}

	<?php if (session('role') == 0) : ?>
		//......................................... kelola barang Modal.........................................
		function ItemTambahmodal() {
			ItemSaveType = "Tambah";
			$('#Item_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Menu/TambahItem_Form'); ?>",
				beforeSend: function(data) {
					$('#Item_Modal .modal-dialog').removeClass("modal-lg");
					$('#Item_Modal .modal-dialog').removeClass("modal-delete");
					$('#Item_Modal .modal-dialog').addClass("modal-xl");
					$('#Item_Modal #Item_Header').removeClass("bg-warning");
					$('#Item_Modal #Item_Header').removeClass("bg-danger");
					$('#Item_Modal #Item_Header').addClass("bg-softblue");
					$('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-plus-square"></i>  Tambah Barang Baru');
				},
				success: function(data) {
					$('#Item_Form').html(data);
					PairingKodeBarang();
					let Supplierku = data.id_supplier;
					$.ajax({
						url: '<?= base_url('Menu/GetSupplier'); ?>',
						data: {
							"id_supplier": Supplierku
						},
						type: "POST",
						success: function(supplier) {
							$('[name="supplier"]').html(supplier);
						},
						error: function(data) {
							alert('AJAX Supplier Part Error :(');
						}
					});
				},
				error: function(data) {
					alert(data);
				}
			});
		}

		function ItemEditmodal(id) {
			ItemSaveType = "Edit";
			$('#Item_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Menu/EditItem_Form'); ?>",
				beforeSend: function(data) {
					$('#Item_Modal .modal-dialog').removeClass("modal-xl");
					$('#Item_Modal .modal-dialog').removeClass("modal-delete");
					$('#Item_Modal .modal-dialog').addClass("modal-lg");
					$('#Item_Modal #Item_Header').removeClass("bg-softblue");
					$('#Item_Modal #Item_Header').removeClass("bg-danger");
					$('#Item_Modal #Item_Header').addClass("bg-warning");
					$('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-edit"></i> Edit Barang');
				},
				success: function(data) {
					$('#Item_Form').html(data);
					$.ajax({
						url: '<?= base_url('Menu/GetIDItem'); ?>',
						data: {
							"id_item": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							$('[name="id_item"]').val(data.id_item);
							$('[name="nama_item"]').val(data.nama_item);
							$('[name="stok"]').val(data.stok);
							$('[name="jenis"]').val(data.jenis).trigger('change');
							$('[name="penyimpanan"]').val(data.penyimpanan).trigger('change');
						}
					});
				},
				error: function(data) {
					alert(data);
				}
			});
		}

		function ItemDeletemodal(id) {
			ItemSaveType = "Delete";
			$('#Item_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Menu/DeleteItem_Form'); ?>",
				beforeSend: function(data) {
					$('#Item_Modal .modal-dialog').removeClass("modal-xl");
					$('#Item_Modal .modal-dialog').removeClass("modal-lg");
					$('#Item_Modal .modal-dialog').addClass("modal-delete");
					$('#Item_Modal #Item_Header').removeClass("bg-softblue");
					$('#Item_Modal #Item_Header').removeClass("bg-warning");
					$('#Item_Modal #Item_Header').addClass("bg-danger");
					$('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-minus-square"></i> Hapus Barang Dengan Nama ');
				},
				success: function(data) {
					$('#Item_Form').html(data);
					$.ajax({
						url: '<?= base_url('Menu/GetIDItem'); ?>',
						data: {
							"id_item": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							$('[name="id_item"]').val(data.id_item);
							$('#delete_nama_item').html(data.nama_item);
						}
					});
				},
				error: function(data) {
					alert(data);
				}
			});
		}

		// ......................................... Aksi Submit Item Barang.............................................
		$("#Item_Form").submit('click', function() {
			// e.preventDefault(); tidak berhasil
			$('#Item_Modal').modal('hide');
			let ItemUrl;
			if (ItemSaveType == "Tambah") {
				ItemUrl = "<?= base_url('/Menu/Add_item'); ?>";
			} else if (ItemSaveType == "Edit") {
				ItemUrl = "<?= base_url('/Menu/Edit_item'); ?>";
			} else if (ItemSaveType == "Delete") {
				ItemUrl = "<?= base_url('/Menu/Delete_item'); ?>";
			}
			$.ajax({
				url: ItemUrl,
				type: "POST",
				data: $('#Item_Form').serialize(),
				success: function(data) {
					$('#Item_Form').html(' ');
					listItem();
					listPerizinan();
					listSpesifikasi();
				}
			});
			return false;
		})
	<?php endif; ?>
</script>
<!-- ================= InOut Barang -->
<script>
	// ......................................... InOut Barang .........................................
	function InModal(id) {
		InOutSaveType = "Masuk";
		$('#InOut_Modal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('Menu/InItem_Form'); ?>",
			beforeSend: function(data) {
				$('#InOut_Modal #InOut_Header').removeClass("bg-kingucrimson");
				$('#InOut_Modal #InOut_Header').addClass("bg-softgreen");
				$('#InOut_Modal #InOut_Label').html('<i class="fas fa-fw fa-dolly-flatbed"></i>  Tambah Data Barang Masuk');
			},
			success: function(data) {
				$('#InOut_Form').html(data);
				$.ajax({
					url: '<?= base_url('Menu/GetIDItem'); ?>',
					data: {
						"id_item": id
					},
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('[name="InOutItem_Name"]').val(data.nama_item);
						$('[name="InOut_Id_Item"]').val(data.id_item);
						$('[name="Live_Stock"]').val(data.stok);
					}
				});
			},
			error: function(data) {
				alert(data);
			}
		});
	}

	function OutModal(id) {
		InOutSaveType = "Keluar";
		$('#InOut_Modal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('Menu/OutItem_Form'); ?>",
			beforeSend: function(data) {
				$('#InOut_Modal #InOut_Header').removeClass("bg-softgreen");
				$('#InOut_Modal #InOut_Header').addClass("bg-kingucrimson");
				$('#InOut_Modal #InOut_Label').html('<i class="fas fa-fw fa-dolly-flatbed" style="transform: rotateY(180deg);"></i>  Tambah Data Barang Keluar');
			},
			success: function(data) {
				$('#InOut_Form').html(data);
				$.ajax({
					url: '<?= base_url('Menu/GetIDItem'); ?>',
					data: {
						"id_item": id
					},
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('[name="InOutItem_Name"]').val(data.nama_item);
						$('[name="InOut_Id_Item"]').val(data.id_item);
						$('[name="Live_Stock"]').val(data.stok);
					}
				});
			},
			error: function(data) {
				alert(data);
			}
		});
	}


	$("#InOut_Form").submit('click', function() {
		// e.preventDefault(); tidak berhasil
		$('#InOut_Modal').modal('hide');
		let InOutUrl;
		if (InOutSaveType == "Masuk") {
			InOutUrl = "<?= base_url('/Menu/In_item'); ?>";
		} else if (InOutSaveType == "Keluar") {
			InOutUrl = "<?= base_url('/Menu/Out_item'); ?>";
		}
		$.ajax({
			url: InOutUrl,
			type: "POST",
			data: $('#InOut_Form').serialize(),
			success: function(data) {
				$('#InOut_Form').html(' ');
				listPerizinan();
			}
		});
		return false;
	})
</script>
<!-- =============== Spesifikasi Barang-->
<script>
	//......................................... Spesifikasi Barang .........................................

	function SpecDetailmodal(id) {
		$('#Spec_Modal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('Menu/DetailSpec_Form'); ?>",
			beforeSend: function(data) {
				$('#Spec_Modal .modal-dialog').removeClass("modal-lg");
				$('#Spec_Modal .modal-dialog').addClass("modal-xl");
				$('#Spec_Modal #Spec_Header').removeClass("bg-dark");
				$('#Spec_Modal #Spec_Header').addClass("bg-softblue");
				$('#Spec_Modal #Spec_Label').html('<i class="fas fa-fw fa-folder-open"></i> Detail Spesifikasi Barang');
			},
			success: function(data) {
				$('#Spec_Form').html(data);
				$.ajax({
					url: '<?= base_url('Menu/GetIDItem'); ?>',
					data: {
						"id_item": id
					},
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('[name="id_item"]').val(data.id_item);
						$('[name="detail_nama"]').val(data.nama_item);
						$('[name="detail_stok"]').val(data.stok);
						$('[name="detail_jenis"]').val(data.jenis);
						$('[name="detail_penyimpanan"]').val(data.penyimpanan);
						$('[name="detail_kode"]').val(data.kode_barang);
						$('[name="detail_harga"]').val(data.harga);
						$('[name="detail_berat"]').val(data.berat);
						$('#Spec_Form #detail_nota').attr("onclick", `PrintNota(${data.id_item})`);
						let Supplierku = data.id_supplier;
						$.ajax({
							url: '<?= base_url('Menu/GetSupplier'); ?>',
							data: {
								"id_supplier": Supplierku
							},
							type: "POST",
							success: function(supplier) {
								$('[name="detail_supplier"]').html(supplier);
							},
							error: function(data) {
								alert('AJAX Supplier Part Error :(');
							}
						});
						$.ajax({
							url: '<?= base_url('exlapor/pdfprintNotaspesifikasi'); ?>',
							data: {
								"id_item": data.id_item
							},
							type: "POST",
							success: function(id) {
								$('[name="print_nota"]').html(id);
							},
							error: function(data) {
								alert('AJAX Supplier Part Error :(');
							}
						});
					}
				});
			},
			error: function(data) {
				alert(data);
			}
		});
	}

	// Role User Checker
	<?php if (session('role') == 0) : ?>

		function SpecEditmodal(id) {
			$('#Spec_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Menu/EditSpec_Form'); ?>",
				beforeSend: function(data) {
					$('#Spec_Modal .modal-dialog').removeClass("modal-xl");
					$('#Spec_Modal .modal-dialog').addClass("modal-lg");
					$('#Spec_Modal #Spec_Header').removeClass("bg-softblue");
					$('#Spec_Modal #Spec_Header').addClass("bg-dark");
					$('#Spec_Modal #Spec_Label').html('<i class="fas fa-fw fa-edit"></i> Edit Spesifikasi Barang');
				},
				success: function(data) {
					$('#Spec_Form').html(data);
					$.ajax({
						url: '<?= base_url('Menu/GetIDItem'); ?>',
						data: {
							"id_item": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							$('[name="sp_nama"]').val(data.nama_item);
							$('[name="sp_id_item"]').val(data.id_item);
							$('[name="sp_kode"]').val(data.kode_barang);
							$('[name="sp_harga"]').val(data.harga);
							$('[name="sp_berat"]').val(data.berat);
							// $('[name="sp_supplier"]').val(data.penyimpanan).trigger('change');
							let Supplierku = data.id_supplier;
							$.ajax({
								url: '<?= base_url('Menu/GetSupplier'); ?>',
								data: {
									"id_supplier": Supplierku
								},
								type: "POST",
								success: function(supplier) {
									$('[name="sp_supplier"]').html(supplier);
								},
								error: function(data) {
									alert('AJAX Supplier Part Error :(');
								}
							});
						}
					});
				},
				error: function(data) {
					alert('AJAX Error :(');
				}

			});
		}

		// ......................................... Aksi spesifikasi barang.........................................
		$("#Spec_Form").submit('click', function() {
			// e.preventDefault(); tidak berhasil
			$('#Spec_Modal').modal('hide');
			let ItemUrl = '<?= base_url('Menu/EditSpecItem'); ?>';
			$.ajax({
				url: ItemUrl,
				type: "POST",
				data: $('#Spec_Form').serialize(),
				success: function(data) {
					$('#Spec_Form').html(' ');
					listSpesifikasi();
					listItem();
					listPerizinan();
				}
			});
			return false;
		})
	<?php endif; ?>
</script>
<!-- ============== custom kelola barang-->
<script>
	//......................................... Custom Kelola Barang Function().........................................
	function PairingKodeBarang() {
		$('#Tambah_Section .jenis-barang').change(function() {
			$('#Tambah_Section .kode2').val($(this).val());
			$('#Tambah_Section .hkode2').val($('#Tambah_Section .kode2').val())
		});

		$('#Tambah_Section .penyimpanan').change(function() {
			$('#Tambah_Section .kode1').val($(this).val());
			$('#Tambah_Section .hkode1').val($('#Tambah_Section .kode1').val())
		});
	}
	$(document).ready(function() {
		// get Edit Spesifikasi
		$('.detl-edit-item').on('click', function() {
			// get data from button edit spec
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const kode = $(this).data('kode');
			const harga = $(this).data('harga');
			const berat = $(this).data('berat');
			const supplier = $(this).data('supplier');

			// Set data to Form edit spec
			$('#Edit_spesifikasi #edit_spesifikasi_nama').text(nama);
			$('#Edit_spesifikasi #edit_sp_kode').val(kode);
			$('#Edit_spesifikasi #edit_sp_harga').val(harga);
			$('#Edit_spesifikasi #edit_sp_berat').val(berat);
			const selectsupplier = $('#selectsupplier');
			if (supplier != null) {
				if (supplier == 1) {
					selectsupplier.val(1).change();
				} else if (supplier == 2) {
					selectsupplier.val(2).change();
				} else if (supplier == 3) {
					selectsupplier.val(3).change();
				} else if (supplier == 4) {
					selectsupplier.val(4).change();
				} else if (supplier == 5) {
					selectsupplier.val(5).change();
				} else if (supplier == 6) {
					selectsupplier.val(6).change();
				}
			}
			$('#Edit_spesifikasi #edit_sp_id_item').val(id);
		});

	});

	function detlBarang(id) {
		//get detail spec
		$('.detl-item').on('click', function() {
			// get data from button keluar
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const jenis = $(this).data('jenis');
			const penyimpanan = $(this).data('penyimpanan');
			const kode = $(this).data('kode');
			const harga = $(this).data('harga');
			const berat = $(this).data('berat');
			const supplier = $(this).data('supplier');

			// get detail spesifikasi
			$('#Detail_spesifikasi #detail_nama').val(nama);
			$('#Detail_spesifikasi #detail_stok').val(stok);
			$('#Detail_spesifikasi #detail_jenis').val(jenis);
			$('#Detail_spesifikasi #detail_penyimpanan').val(penyimpanan);
			$('#Detail_spesifikasi #detail_kode').val(kode);
			$('#Detail_spesifikasi #detail_harga').val(harga);
			$('#Detail_spesifikasi #detail_berat').val(berat);
			$('#Detail_spesifikasi #detail_supplier').val(supplier);
			$('#Detail_spesifikasi #detail_id').val(id);
		})
	}
</script>

<!-------------------------------------------------- Catch Data for Data User -------------------------------------------------->
<script>
	function previewEditImg() {

		const edit_img = document.querySelector('#edit_img');
		const label_edit_img = document.querySelector('.label-img-edit');
		const preview_img = document.querySelector('.edit-img-preview');

		label_edit_img.textContent = edit_img.files[0].name;

		const file_img = new FileReader();
		file_img.readAsDataURL(edit_img.files[0]);

		file_img.onload = function(e) {
			preview_img.src = e.target.result;
		}
	}
	$(document).ready(function() {

		// get Edit User
		$('.btn-edit-user').on('click', function() {
			// get data from button edit
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			const email = $(this).data('email');
			const password = $(this).data('password');
			const urole = $(this).data('urole');
			const picture = $(this).data('picture');
			// Set data to Form Edit
			$('#Edit_user #edit_nama_user').val(nama);
			$('#Edit_user #edit_email_user').val(email);
			$('#Edit_user #edit_jenis_user').val(urole).trigger('change');
			$('#Edit_user .edit-img-preview').attr("src", `<?= base_url('../img/user'); ?>/${picture}`);
			$('#Edit_user #old_image').val(picture);
			$('#Edit_user #old_password').val(password);
			$('#Edit_user #edit_user_id').val(uid);
		});

		// get Delete User
		$('.btn-delete-user').on('click', function() {
			// get data from button delete
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			// Set data to Form delete
			$('#Delete_user #delete_user_id').val(uid);
			$('#Delete_user #delete_nama_user').text(nama);
		});
	});
</script>
<!--.......................... Config croppie js ..........................--->
<script src="<?= base_url('../vendor/croppie/croppie.js') ?>"></script>
<script>
	$(document).ready(function() { // OVERLOAD MODAL

		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 400,
				height: 400,
				type: 'square' //circle
			},
			boundary: {
				width: 500,
				height: 500
			}
		});

		$('#add_img').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimageModal').modal('show');
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?= base_url('Admin/cropImage'); ?>",
					type: "POST",
					data: {
						"image": response
					},
					success: function(data) {
						$('#uploadimageModal').modal('hide');
						html = '<img src="' + response + '" class="img-thumbnail img-preview" alt="image preview" style="max-height: 370px; " />';
						$('#show-add-img').html(html);
						//Membuat FORM by JavaScript
						var formData = new FormData();
						var file = response;
						//Cek Dulu, Apakah Gambarnya sudah dipilih
						if (file != null) {
							formData.append('picture', file);
						}
					}
				});
			})
		});

	});
</script>


<!-------------------------------------------------- Catch For Perizinan-------------------------------------------------->
<script>
	function listPerizinan() {
		$.ajax({
			url: '<?= base_url('Menu/ShowPerizinan'); ?>',
			beforeSend: function(f) {
				$('#Perizinan_AJAX').html(sloading);
			},
			success: function(data) {
				$('#Perizinan_AJAX').html(data);
				$('#table_perizinan').DataTable({
					scrollY: '100vh',
					scrollCollapse: true,
					paging: false,
					"order": [
						[0, "desc"]
					]
				});
			}
		});
	}

	<?php if (session('role') == 0) : ?>

		function AcceptPerizinan(id) {
			$('#Perizinan_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Admin/AcceptPerizinan_Form'); ?>",
				beforeSend: function(data) {
					$('#Perizinan_Modal #Perizinan_Header').removeClass("bg-kingucrimson");
					$('#Perizinan_Modal #Perizinan_Header').addClass("bg-softgreen");
					$('#Perizinan_Modal #Perizinan_Label').html('<i class="fas fa-fw fa-check-square"></i>  Terima Izin Data Barang Masuk');
				},
				success: function(data) {
					$('#Perizinan_Form').html(data);
					$.ajax({
						url: '<?= base_url('Admin/GetPerizinan'); ?>',
						data: {
							"no_log": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							// var parsed = JSON.parse(JSON.stringify(data));
							$('[name="perizinan_no_log"]').val(data[0].no_log);
							$('[name="perizinan_nama"]').val(data[0].nama_item);
							$('[name="perizinan_stok"]').val(data[0].ubah_stok);
							RequestBarangType(data[0].request);
							$('[name="perizinan_room"]').val(data[0].penyimpanan);
							$('[name="perizinan_jenis"]').val(data[0].jenis);
							$('[name="perizinan_pekerja"]').val(data[0].nama);
							$('[name="perizinan_waktu"]').val(data[0].tgl);
							$('[name="perizinan_ket"]').text(data[0].ket);
						}
					});
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}

		function DeclinePerizinan(id) {
			$('#Perizinan_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Admin/DeclinePerizinan_Form'); ?>",
				beforeSend: function(data) {
					$('#Perizinan_Modal #Perizinan_Header').removeClass("bg-softgreen");
					$('#Perizinan_Modal #Perizinan_Header').addClass("bg-kingucrimson");
					$('#Perizinan_Modal #Perizinan_Label').html('<i class="fas fa-fw fa-window-close" style="transform: rotateY(180deg);"></i>  Tolak Izin Data Barang Masuk');
				},
				success: function(data) {
					$('#Perizinan_Form').html(data);
					$.ajax({
						url: '<?= base_url('Admin/GetPerizinan'); ?>',
						data: {
							"no_log": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							// var parsed = JSON.parse(JSON.stringify(data));
							$('[name="perizinan_no_log"]').val(data[0].no_log);
							$('[name="perizinan_nama"]').val(data[0].nama_item);
							$('[name="perizinan_stok"]').val(data[0].ubah_stok);
							RequestBarangType(data[0].request);
							$('[name="perizinan_room"]').val(data[0].penyimpanan);
							$('[name="perizinan_jenis"]').val(data[0].jenis);
							$('[name="perizinan_pekerja"]').val(data[0].nama);
							$('[name="perizinan_waktu"]').val(data[0].tgl);
							$('[name="perizinan_ket"]').text(data[0].ket);
						}
					});
				},
				error: function(data) {
					alert('Operasi Ajax Gagal :(');
				}
			});
		}

		// Aksi perizinan
		$("#Perizinan_Form").submit('click', function() {
			// e.preventDefault(); tidak berhasil
			$('#Perizinan_Modal').modal('hide');
			let PerizinanUrl = "<?= base_url('Admin/AksiPerizinan'); ?>";
			$.ajax({
				url: PerizinanUrl,
				type: "POST",
				data: $('#Perizinan_Form').serialize(),
				success: function(data) {
					$('#Perizinan_Form').html(' ');
					listPerizinan();
					listItem();
				},
				error: function(data) {
					alert('Operasi Ajax Gagal :(');
				}
			});
			return false;
		})


		// ..........................Custom Function Perizinan.........................>
		function RequestBarangType(reqType) {
			if (reqType == "Masuk") {
				$('#RequestType').html(`<span class="py-2 badge badge-success" style="font-size: 15px;"><i class="fas fa-fw fa-long-arrow-alt-up text-light"></i> ${reqType}</span>`);
			} else {
				$('#RequestType').html(`<span class="py-2 badge badge-danger" style="font-size: 15px;"><i class="fas fa-fw fa-long-arrow-alt-down text-light"></i> ${reqType}</span>`);
			}
		}
	<?php endif; ?>
</script>
<!-------------------------------------------------- Catch for edit pengumuman -------------------------------------------------->
<script>
	function listPengumuman() {
		$.ajax({
			url: '<?= base_url('Admin/ShowPengumuman'); ?>',
			beforeSend: function(f) {
				$('#Reload_AJAX').html(sloading);
			},
			success: function(data) {
				$('#Reload_AJAX').html(data);
				$('#table_pengumuman').DataTable({
					scrollY: '100vh',
					scrollCollapse: true,
					paging: false,
					"order": [
						[0, "desc"]
					],
					"columnDefs": [{
						"width": "20%",
						"targets": 1
					}]
				});
			}
		});
	}

	let PengumumanSaveType; // Tumbal Operan :'v

	function showTambahmodal() {
		PengumumanSaveType = "Tambah";
		$('#Pengumuman_Modal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('Admin/TambahPengumuman_Form'); ?>",
			beforeSend: function(data) {
				$('#Pengumuman_Icon').removeClass("fa-folder-open");
				$('#Pengumuman_Icon').addClass("fa-folder-plus");
				$('#Pengumuman_Header').removeClass("bg-dark");
				$('#Pengumuman_Header').addClass("bg-softblue");
				$('#Modal_Title').text(' Tambah Pengumuman');
			},
			success: function(data) {
				$('#Pengumuman_Form').html(data);
			}
		});
	}

	function showDeleteModal(id) {
		PengumumanSaveType = "Delete";
		$('#Pengumuman_Modal').modal('show');
		$.ajax({
			url: "<?= base_url('Admin/DeletePengumuman_Form'); ?>",
			beforeSend: function(data) {
				$('#Pengumuman_Icon').removeClass("fa-folder-plus");
				$('#Pengumuman_Icon').addClass("fa-folder-open");
				$('#Pengumuman_Header').removeClass("bg-softblue");
				$('#Pengumuman_Header').addClass("bg-dark");
				$('#Modal_Title').text(' Hapus Pengumuman');
			},
			success: function(data) {
				$('#Pengumuman_Form').html(data);
				$.ajax({
					url: '<?= base_url('Admin/GetIdPengumuman'); ?>',
					data: {
						"id_pengumuman": id
					},
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('[name="id_pengumuman"]').val(data.id_pengumuman);
						$('[name="judul"]').val(data.judul);
						$('[name="isi"]').text(data.isi);
					}
				});
			}
		});
	}

	$("#Pengumuman_Form").submit('click', function() {
		// e.preventDefault(); tidak berhasil
		$('#Pengumuman_Modal').modal('hide');
		let url;
		if (PengumumanSaveType == "Tambah") {
			url = "<?= base_url('Admin/TambahPengumuman'); ?>";
		} else if (PengumumanSaveType == "Delete") {
			url = "<?= base_url('Admin/DeletePengumuman'); ?>";
		}
		$.ajax({
			url: url,
			type: "POST",
			data: $('#Pengumuman_Form').serialize(),
			success: function(data) {
				$('#Pengumuman_Form').html(' ');
				listPengumuman();
			}
		});
		return false;
	})

	function infoClear() {
		// Set data to Form input
		let url = '<?= base_url('Admin/BlankPengumuman_Form'); ?>';
		let jpholder;
		if (PengumumanSaveType == "Tambah") {
			jpholder = "Tambah Judul Pengumuman...";
		} else if (PengumumanSaveType == "Edit") {
			jpholder = "Edit Judul Pengumuman...";
		}
		$.ajax({
			url: url,
			type: "POST",
			success: function(data) {
				$('#PengumumanF_Input').html(data);
				$('#pengumuman_judul').attr('placeholder', jpholder);
			}
		});
	}


	// Memulai Loading Page dengan AJAX
	$(document).ready(function() {
		// load list data when document load
		listItem()
		listPerizinan();
		listSpesifikasi()
		listPengumuman();
	});
</script>

<!-------------------------------------------------- Catch for Arsip komp & komplain-------------------------------------------------->
<script>
	<?php if (session('role') == 0) : ?>

		function listKomplain() {
			$.ajax({
				url: '<?= base_url('Admin/ShowKomplain'); ?>',
				beforeSend: function(f) {
					$('#Komplain_AJAX').html(sloading);
				},
				success: function(data) {
					$('#Komplain_AJAX').html(data);
					$('#table_komplain').DataTable({
						scrollY: '100vh',
						scrollCollapse: true,
						paging: false,
						"order": [
							[0, "desc"]
						]
					});
					PreviewKomplainImage();
				}
			});
		}

		function listArsipKomplain() {
			$.ajax({
				url: '<?= base_url('Admin/ShowKomplainArsip'); ?>',
				beforeSend: function(f) {
					$('#KomplainArsip_AJAX').html(sloading);
				},
				success: function(data) {
					$('#KomplainArsip_AJAX').html(data);
					$('#table_komplainArsip').DataTable({
						scrollY: '100vh',
						scrollCollapse: true,
						paging: false,
						"order": [
							[0, "desc"]
						]
					});
					PreviewKomplainImage();
				}
			});
		}

		// .......................... Form Komplain ..........................

		function DetailArsipKomplain(uid) {
			$('#Komplain_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Admin/DetailArsipKomplain_Form'); ?>",
				beforeSend: function(data) {
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-kingucrimson");
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-softgreen");
					$('#Komplain_Modal #Komplain_Header').addClass("bg-nanas");
					$('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-archive"></i>  Detail Arsip Keluhan');
				},
				success: function(data) {
					$('#Komplain_Form').html(data);
					$.ajax({
						url: '<?= base_url('Admin/GetUidArsipKomplain'); ?>',
						data: {
							"id_arsipKomp": uid
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							var parsed = JSON.parse(JSON.stringify(data));
							$('[name="id_komplain"]').val(data[0].id_arsipKomp);
							$('[name="no_komplain"]').val(data[0].no_arsipKomp);
							$('[name="nama_komplain"]').val(data[0].nama);
							$('[name="waktuPekerja_komplain"]').val(data[0].waktu_arsipKomp);
							$('[name="isi_komplain"]').val(data[0].isi_arsipKomp);
							$('[name="email_komplain"]').val(data[0].email_arsipKomp);
							$('[name="judul_komplain"]').val(data[0].judul_arsipKomp);
							$("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_arsipKomp + "");
							$("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_arsipKomp + "");
							PreviewKomplainImage();
							$.ajax({
								url: '<?= base_url('Admin/GetAdminArsipKomplain'); ?>',
								data: {
									"id_arsipKomp": uid
								},
								type: "POST",
								dataType: "JSON",
								success: function(data) {
									$('[name="admin_komplain"]').val(data[0].nama); //admin
									$('[name="waktuAdmin_komplain"]').val(data[0].commented_at);
									$('[name="admin_komplain"]').val(data[0].nama);
									if (data[0].status_arsipKomp == "accepted") {
										$('#statusVerifAdmin').html('<span class=" py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>');
									} else if (data[0].status_arsipKomp == "rejected") {
										$('#statusVerifAdmin').html('<span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>');
									} else {
										console.log('error admin status view');
									}
									$('[name="adminkomen_komplain"]').val(data[0].comment_arsipKomp);
								},
								error: function(data) {
									alert(' Operasi JOIN Show Admin AJAX Gagal :(');
								}
							});
						},
						error: function(data) {
							alert(' Operasi Detail Arsip AJAX Gagal :(');
						}
					});
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}

		function AcceptKomplain(id) {
			$('#Komplain_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Admin/AcceptKomplain_Form'); ?>",
				beforeSend: function(data) {
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-kingucrimson");
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-nanas");
					$('#Komplain_Modal #Komplain_Header').addClass("bg-softgreen");
					$('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-check-square"></i>  Terima Keluhan');
				},
				success: function(data) {
					$('#Komplain_Form').html(data);
					$.ajax({
						url: '<?= base_url('Admin/GetIDKomplain'); ?>',
						data: {
							"id_komplain": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							var parsed = JSON.parse(JSON.stringify(data));
							$('[name="id_komplain"]').val(data[0].id_komplain);
							$('[name="no_komplain"]').val(data[0].no_komplain);
							$('[name="nama_komplain"]').val(data[0].nama);
							$('[name="waktuPekerja_komplain"]').val(data[0].waktu_komplain);
							$('[name="isi_komplain"]').val(data[0].isi_komplain);
							$('[name="email_komplain"]').val(data[0].email_komplain);
							$('[name="judul_komplain"]').val(data[0].judul_komplain);
							$("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
							$("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
							PreviewKomplainImage();
						}
					});
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}

		function DeclineKomplain(id) {
			$('#Komplain_Modal').modal('show');
			$.ajax({
				type: "POST",
				url: "<?= base_url('Admin/DeclineKomplain_Form'); ?>",
				beforeSend: function(data) {
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-softgreen");
					$('#Komplain_Modal #Komplain_Header').removeClass("bg-nanas");
					$('#Komplain_Modal #Komplain_Header').addClass("bg-kingucrimson");
					$('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-window-close"></i>  Tolak Keluhan');
				},
				success: function(data) {
					$('#Komplain_Form').html(data);
					$.ajax({
						url: '<?= base_url('Admin/GetIDKomplain'); ?>',
						data: {
							"id_komplain": id
						},
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							var parsed = JSON.parse(JSON.stringify(data));
							$('[name="id_komplain"]').val(data[0].id_komplain);
							$('[name="no_komplain"]').val(data[0].no_komplain);
							$('[name="nama_komplain"]').val(data[0].nama);
							$('[name="waktuPekerja_komplain"]').val(data[0].waktu_komplain);
							$('[name="isi_komplain"]').val(data[0].isi_komplain);
							$('[name="email_komplain"]').val(data[0].email_komplain);
							$('[name="judul_komplain"]').val(data[0].judul_komplain);
							$("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
							$("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
							PreviewKomplainImage();
						}
					});
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}

		// ..........................Aksi Komplain..........................
		$("#Komplain_Form").submit('click', function() {
			// e.preventDefault(); tidak berhasil
			$('#Komplain_Modal').modal('hide');
			let KomplainUrl = "<?= base_url('Admin/arsipKomplain'); ?>";
			$.ajax({
				url: KomplainUrl,
				type: "POST",
				data: $('#Komplain_Form').serialize(),
				success: function(data) {
					$('#Komplain_Form').html(' ');
					listKomplain();
					listArsipKomplain();
				},
				error: function(data) {
					alert('Operasi Ajax Gagal :(');
				}
			});
			return false;
		})

		// .......................... Custom Function Komplain ..........................

		function PreviewKomplainImage() {
			// get Bukti Image
			$('.btn-img-item').on('click', function() {
				// get img from tabel
				const img = $(this).data('img');

				// Set img to modal
				$('#gambarBukti img').attr('src', img);
				$('#Komplain_Modal').modal('hide');
			});
		}
	<?php endif; ?>
</script>

<!-------------------------------------------------- Catch for Pengaduan -------------------------------------------------->
<script>
	$(document).ready(function() {
		const PengaduanScript = "<?= base_url('../js/dragdrop.js'); ?>";

		function PengaduanForm() {
			// $('#Komplain_Modal').modal('show');
			$.ajax({
				url: "<?= base_url('Menu/PengaduanForm'); ?>",
				type: "POST",
				success: function(data) {
					$('#Pengaduan_Form').html(data);
					$.getScript(PengaduanScript);
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}
		PengaduanForm();

		// ..........................Aksi Pengaduan..........................

		$("#Pengaduan_Form").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?= base_url('Menu/adukan'); ?>",
				type: "POST",
				// data: $('#Pengaduan_Form').serialize(),
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(adukan) {
					alert('Data Terkirim !');
					// $('[name="judul"]').val('');
					// $('[name="isi"]').val('');
					// $('[name="foto"]').val(null);
					// $('.drop-zone__thumb').attr('style', null);
					PengaduanForm();
				},
				error: function(data) {
					alert('Operasi Ajax Gagal :(');
				}
			});
			// return false;
		});
	});
</script>

<!-------------------------------------------------- Catch for profile edit -------------------------------------------------->
<script>
	function imgPreview() {
		const sampul = document.querySelector('#foto');
		const imgPreview = document.querySelector('.img-preview');

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>

</html>