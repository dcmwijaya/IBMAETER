	<!-- Tentang Popup -->
	<div class="modal fade" id="TentangModal" tabindex="-1" aria-labelledby="TentangModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h6 class="modal-title" id="TentangModalLabel"><i class="icoh fas fa-code fa-fw"></i>&nbsp; Tentang Website <b style="color: rgb(31 159 188);">IBMAETER</b>&nbsp; <i class="icoh fas fa-code fa-fw"></i></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: white;">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6 class="pemanis"><i class="text-dark fab fa-github fa-fw"></i> <i class="icotit fas fa-code-branch fa-fw"></i> <i class="text-dark fab fa-bootstrap fa-fw"></i> <i class="fab fa-mdb fa-fw"></i> <i class="icotit fab fa-free-code-camp fa-fw"></i> <b>Codeigniter 4</b>&nbsp; <i class="icotit fas fa-laptop-code fa-fw"></i></h6>
					<p class="mb-3 py-2" style="border-bottom: 1px dashed #2b9e59;">IBMAETER merupakan website inventaris barang gudang dan manajemen pekerja terpadu.</p>
					<!-- The text field -->
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Admin&nbsp;&nbsp;&nbsp; :</label>
								<div class="col-sm-9">
									<div class="clearfix col-9">
										<input type="text" class="float-left form-control-sm" value="tesla@gmail.com" id="myInput1" readonly>
										<button onclick="copy1()" class="btn btn-sm btn-success ml-3 py-2 shadow-sm px-3 float-right"><i class="fas fa-fw fa-clipboard"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Password&nbsp; :</label>
								<div class="col-sm-9">
									<div class="clearfix col-9">
										<input type="text" class="float-left col-sm-5 form-control-sm" value="Admin123" id="myInput2" readonly>
										<button onclick="copy2()" class="btn btn-sm btn-danger ml-3 py-2 shadow-sm px-3 float-right"><i class="fas fa-fw fa-clipboard"></i></button>
									</div>
								</div>
							</div><br>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Pekerja&nbsp;&nbsp;&nbsp; :</label>
								<div class="col-sm-9">
									<div class="clearfix col-9">
										<input type="text" class="float-left form-control-sm" value="kukun@gmail.com" id="myInput3" readonly>
										<button onclick="copy3()" class="btn btn-sm btn-secondary ml-3 py-2 shadow-sm px-3 float-right"><i class="fas fa-fw fa-clipboard"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Password&nbsp; :</label>
								<div class="col-sm-9">
									<div class="clearfix col-9">
										<input type="text" class="float-left col-sm-5 form-control-sm" value="User123" id="myInput4" readonly>
										<button onclick="copy4()" class="btn btn-sm btn-danger ml-3 py-2 shadow-sm px-3 float-right"><i class="fas fa-fw fa-clipboard"></i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 border-left" style="line-height: 5x;">
							<pre><strong>Tim Pencipta Website :</strong>
							<br>1. Rizky Parlika, S.Kom, M.Kom&nbsp; <i class="fas fa-book-reader" style="color: #0000FF;"></i>
							<br>2. Rifky Akhmad Fernanda&nbsp; <i class="fas fa-cat fa-fw" style="color: #c72876;"></i>
							<br>3. Devan Cakra Mudra Wijaya&nbsp; <i class="fas fa-code" style="color: #000336;"></i>
							<br>4. Merdin Risalul Abrori&nbsp; <i class="fas fa-database" style="color: #60c940;"></i>							
							<br>5. Arista Pratama, S.Kom, M.Kom&nbsp; <i class="fas fa-eye" style="color: #0000FF;"></i>
							<br>6. Lugito Michael Imanuel Prasetya, S.Kom&nbsp; <i class="fas fa-user-check fa-fw" style="color: #c72876;"></i>
							</pre>
						</div>
					</div>
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

		function copy4() {
			var copyText = document.getElementById("myInput4");
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */
			document.execCommand("copy");
		}
	</script>