	<!-- Tentang Popup -->
	<div class="modal fade" id="TentangModal" tabindex="-1" aria-labelledby="TentangModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h6 class="modal-title" id="TentangModalLabel"><i class="icoh fas fa-code fa-fw"></i>&nbsp; Tentang Aplikasi <b style="color: rgb(31 159 188);">INVENBAR</b>&nbsp; <i class="icoh fas fa-code fa-fw"></i></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: white;">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6 class="pemanis"><i class="text-dark fab fa-github fa-fw"></i> <i class="icotit fas fa-code-branch fa-fw"></i> <i class="text-dark fab fa-bootstrap fa-fw"></i> <i class="fab fa-mdb fa-fw"></i> <i class="icotit fab fa-free-code-camp fa-fw"></i> <b>Codeigniter 4</b>&nbsp; <i class="icotit fas fa-laptop-code fa-fw"></i></h6>
					<p class="mb-3 py-2" style="border-bottom: 1px dashed #2b9e59;">INVENBAR(Inventori Barang Warehouse) aplikasi untuk memanajemen barang didalam gudang.</p>
					<!-- The text field -->
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Admin&nbsp;&nbsp;&nbsp; :</label>
						<div class="col-sm-10">
							<input type="text" class="col-sm-5 form-control-sm" value="saber.genshin@gmail.com" id="myInput1" readonly>
							<button onclick="copy1()" class="btn btn-sm btn-success ml-3 py-2 shadow-sm px-3"><i class="fas fa-fw fa-clipboard"></i></button>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Pekerja&nbsp;&nbsp;&nbsp; :</label>
						<div class="col-sm-10">
							<input type="text" class="col-sm-5 form-control-sm" value="billy@gantx.com" id="myInput2" readonly>
							<button onclick="copy2()" class="btn btn-sm btn-secondary ml-3 py-2 shadow-sm px-3"><i class="fas fa-fw fa-clipboard"></i></button>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Password&nbsp; :</label>
						<div class="col-sm-10">
							<input type="text" class="col-sm-5 form-control-sm" value="Admin123" id="myInput3" readonly>
							<button onclick="copy3()" class="btn btn-sm btn-danger ml-3 py-2 shadow-sm px-3"><i class="fas fa-fw fa-clipboard"></i></button>
						</div>
					</div>
					<pre>
					<br>------------------------------------------------------------
					<br>Anggota Kelompok 5 Framework C :
					<br>1. 18081010013 - Devan Cakra
					<br>2. 18081010??? - Merdin
					<br>3. 18081010126 - Rifky Akhmad Fernanda&nbsp; <i class="fas fa-cat fa-fw" style="color: #c72876;"></i>
					</pre>
				</div>
			</div>
		</div>
	</div>
	<script>
		function copy1() {
			var copyText = document.getElementById("myInput1");
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */
			document.execCommand("copy");
		}

		function copy2() {
			var copyText = document.getElementById("myInput2");
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */
			document.execCommand("copy");
		}

		function copy3() {
			var copyText = document.getElementById("myInput3");
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */
			document.execCommand("copy");
		}
	</script>