<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>LOG USER ACTIVITIES</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col">
								<table id="table_item" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Activities</th>
											<th>Timestamps</th>
											<th>Status Absensi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:31:10 AM</td>
											<td>Attendance</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:32:11 AM</td>
											<td>Attendance</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:33:12 AM</td>
											<td>Attendance</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:34:13 AM</td>
											<td>Attendance</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:35:14 AM</td>
											<td>Attendance</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/26 11:36:15 AM</td>
											<td>Truancy</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>Truancy</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>Truancy</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>Truancy</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/menu/logUser</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>Truancy</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
