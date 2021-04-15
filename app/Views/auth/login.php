<?= $this->extend('layout/logintemplate') ?>

<?= $this->section('logincontent') ?>
<link rel="stylesheet" href="<?= base_url('css/loginstyle.css') ?>">
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
	<div class="card card0 border-0">
		<div class="row d-flex">
			<div class="col-lg-6">
				<div class="card1 pb-5">
					<div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
					<div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card2 card border-0 px-4 py-5">
					<div class="row mb-4 px-3">
						<h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
						<div class="facebook text-center mr-3">
							<div class="fa fa-facebook"></div>
						</div>
						<div class="twitter text-center mr-3">
							<div class="fa fa-twitter"></div>
						</div>
						<div class="linkedin text-center mr-3">
							<div class="fa fa-linkedin"></div>
						</div>
					</div>
					<div class="row px-3 mb-4">
						<div class="line"></div> <small class="or text-center">Or</small>
						<div class="line"></div>
					</div>
					<div class="row px-3"> <label class="mb-1">
							<h6 class="mb-0 text-sm">Email Address</h6>
						</label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
					<div class="row px-3"> <label class="mb-1">
							<h6 class="mb-0 text-sm">Password</h6>
						</label> <input type="password" name="password" placeholder="Enter password"> </div>
					<div class="row px-3 mb-4">
						<div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
					</div>
					<div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
					<div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div>
				</div>
			</div>
		</div>
		<div class="bg-primary py-4">
			<div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
				<div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<script>
		const TWO_PI = Math.PI * 2;
		const HALF_PI = Math.PI / 2;
		const canvas = document.createElement("canvas");
		const c = canvas.getContext("2d");

		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
		document.body.appendChild(canvas);

		class Blob {
			constructor() {
				this.wobbleIncrement = 0;
				// use this to change the size of the blob
				this.radius = 500;
				// think of this as detail level
				// number of conections in the `bezierSkin`
				this.segments = 12;
				this.step = HALF_PI / this.segments;
				this.anchors = [];
				this.radii = [];
				this.thetaOff = [];

				const bumpRadius = 100;
				const halfBumpRadius = bumpRadius / 2;

				for (let i = 0; i < this.segments + 2; i++) {
					this.anchors.push(0, 0);
					this.radii.push(Math.random() * bumpRadius - halfBumpRadius);
					this.thetaOff.push(Math.random() * 2 * Math.PI);
				}

				this.theta = 0;
				this.thetaRamp = 0;
				this.thetaRampDest = 12;
				this.rampDamp = 25;
			}
			update() {
				this.thetaRamp += (this.thetaRampDest - this.thetaRamp) / this.rampDamp;
				this.theta += 0.03;

				this.anchors = [0, this.radius];
				for (let i = 0; i <= this.segments + 2; i++) {
					const sine = Math.sin(this.thetaOff[i] + this.theta + this.thetaRamp);
					const rad = this.radius + this.radii[i] * sine;
					const x = rad * Math.sin(this.step * i);
					const y = rad * Math.cos(this.step * i);
					this.anchors.push(x, y);
				}

				c.save();
				c.translate(-10, -10);
				c.scale(0.5, 0.5);
				c.fillStyle = "gray";
				c.beginPath();
				c.moveTo(0, 0);
				bezierSkin(this.anchors, false);

				c.lineTo(0, 0);
				c.fill();
				c.restore();
			}
		}

		const blob = new Blob();

		function loop() {
			c.clearRect(0, 0, canvas.width, canvas.height);
			blob.update();
			window.requestAnimationFrame(loop);
		}
		loop();

		// array of xy coords, closed boolean
		function bezierSkin(bez, closed = true) {
			const avg = calcAvgs(bez);
			const leng = bez.length;

			if (closed) {
				c.moveTo(avg[0], avg[1]);
				for (let i = 2; i < leng; i += 2) {
					let n = i + 1;
					c.quadraticCurveTo(bez[i], bez[n], avg[i], avg[n]);
				}
				c.quadraticCurveTo(bez[0], bez[1], avg[0], avg[1]);
			} else {
				c.moveTo(bez[0], bez[1]);
				c.lineTo(avg[0], avg[1]);
				for (let i = 2; i < leng - 2; i += 2) {
					let n = i + 1;
					c.quadraticCurveTo(bez[i], bez[n], avg[i], avg[n]);
				}
				c.lineTo(bez[leng - 2], bez[leng - 1]);
			}
		}

		// create anchor points by averaging the control points
		function calcAvgs(p) {
			const avg = [];
			const leng = p.length;
			let prev;

			for (let i = 2; i < leng; i++) {
				prev = i - 2;
				avg.push((p[prev] + p[i]) / 2);
			}
			// close
			avg.push((p[0] + p[leng - 2]) / 2, (p[1] + p[leng - 1]) / 2);
			return avg;
		}
	</script>
	<div class="row">
		<div class="col">
			<div class="login">
				<div class="avatar">
					<i class="ico fa fa-user"></i>
				</div>
				<div class="card-body">
					<form action="<?= base_url('menu/validasi') ?>" method="post">
						<div class="main form-group">
							<span><i class="fas fa-envelope-open-text me-2 custom"></i><strong>Email</strong></span>
							<input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?= old('email'); ?>">
							<div class="invalid-feedback">
								<?= $validation->getError('email'); ?>
							</div>
						</div>

						<div class="secondary form-group">

						</div>

						<div class="main form-group">
							<span><i class="fas fa-unlock-alt me-2 custom"></i><strong>Password</strong></span>
							<input type="password" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
							<div class="invalid-feedback">
								<?= $validation->getError('password'); ?>
							</div>
						</div>

						<div class=" secondary form-group">

						</div><br>

						<button type="submit" class="btn btn-block"><i class="fas fa-sign-in-alt me-3"></i><strong>Login</strong></button>
					</form>
					<hr>
					<td class="kotak" width="25%" valign="top">
						<div class="link-text text-center">
							<a class="reg" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=fikinvenbar@upnjatim.ac.id&subject?&su=AJUAN%20REGISTRASI%20ADMIN%20INVENBAR&body=Isi%20Pesan:%0A%0A[Tuliskan%20pesan%20anda%20disini%2E%2E%2E%2E%2E]%0A%0A%0ADengan%20ini%2C%20saya%20menyatakan%20bahwa%20saya%20mengajukan%20ini%20tanpa%20paksaan%20siapapun%20serta%20dalam%20keadaan%20sadar%2E%20Sekian%20dari%20saya%2C%20terima%20kasih%2E%0A%0AHormat%20Saya%2C%0A%0A%0ANama%20Anda" target="_blank" http-equiv="refresh" content="2">
								<p class="small">Belum Punya Akun? Silahkan Registrasi!</p>
							</a>
						</div>
						<div class="link-text text-center">
							<a class="reg" href="#">
								<p class="small">Lupa Akun? Silahkan Verifikasi!</p>
							</a>
						</div>
					</td>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>