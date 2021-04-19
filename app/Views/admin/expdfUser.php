<!doctype html>
<html lang="id">

<head></head>

<body>
	<!--Main layout-->
	<main style="margin-top: 58px">
		<div class="container pt-4">
			<section class="mb-4">
				<div class="card">
					<div class="card-header text-center py-3">
						<h5 class="mb-0 text-center">
							<center><strong>DATA USER</strong></center>
						</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama User</th>
											<th>E-mail</th>
											<th>Role</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($user as $u) : ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $u['nama']; ?></td>
												<td><?= $u['email']; ?></td>
												<td><?= $u['role']; ?></td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div><br>
	</main>
</body>

</html>
