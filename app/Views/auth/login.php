<?= $this->extend('layout/logintemplate') ?>

<?= $this->section('logincontent') ?>
<link rel="stylesheet" href="<?= base_url('css/loginstyle.css') ?>">

<div class="container">
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