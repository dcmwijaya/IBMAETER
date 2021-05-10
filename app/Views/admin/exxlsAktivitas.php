<?php

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data-Aktivitas.xls"');

?>

<!--Main layout-->
<main>
	<div class="container pt-4">
		<section class="mb-4">
			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
					<td width="100%" colspan="2" style="text-align: center;">
						<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
						<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
						<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
					</td>
				</tr>
			</table>

			<div class="card" style="margin-top: 58px">
				<div class="card-header text-center py-3">
					<h3 class="mb-0 text-center">
						<center><strong>Tabel Data Aktivitas User</strong></center>
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<table style="font-size: 14px; width:100%;" border="1">
								<thead>
									<tr>
										<th>Email</th>
										<th>Aktivitas</th>
										<th>Waktu</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>saber.datealive@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/26 11:31:10 AM</td>
									</tr>
									<tr>
										<td>saber.datealive@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/26 11:32:11 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/26 11:33:12 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/menu/Absensi</td>
										<td>2021/4/26 11:36:15 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/admin/Adminpengumuman</td>
										<td>2021/4/26 11:34:13 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/admin/logUser</td>
										<td>2021/4/26 11:35:14 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/admin/Datauser</td>
										<td>2021/4/27 11:37:16 AM</td>
									</tr>
									<tr>
										<td>kuro911@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/27 11:37:16 AM</td>
									</tr>
									<tr>
										<td>genshin_keqing@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/27 11:37:16 AM</td>
									</tr>
									<tr>
										<td>genshin_keqing@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/27 11:37:16 AM</td>
									</tr>
									<tr>
										<td>kuro.sensei99@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/28 07:37:16 AM</td>
									</tr>
									<tr>
										<td>kuro.sensei99@gmail.com</td>
										<td>http://localhost:8080/menu/Absensi</td>
										<td>2021/4/28 07:37:16 AM</td>
									</tr>
									<tr>
										<td>kuro.sensei99@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/28 07:37:16 AM</td>
									</tr>
									<tr>
										<td>rungkutgakure@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/28 09:37:16 AM</td>
									</tr>
									<tr>
										<td>rungkutgakure@gmail.com</td>
										<td>http://localhost:8080/menu/Absensi</td>
										<td>2021/4/28 09:37:16 AM</td>
									</tr>
									<tr>
										<td>rungkutgakure@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/28 09:37:16 AM</td>
									</tr>
									<tr>
										<td>bagindahokage@gmail.com</td>
										<td>http://localhost:8080/admin/login</td>
										<td>2021/4/28 11:37:16 AM</td>
									</tr>
									<tr>
										<td>bagindahokage@gmail.com</td>
										<td>http://localhost:8080/menu/Absensi</td>
										<td>2021/4/28 11:37:16 AM</td>
									</tr>
									<tr>
										<td>bagindahokage@gmail.com</td>
										<td>http://localhost:8080/admin/Logout</td>
										<td>2021/4/28 11:37:16 AM</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div><br>

			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;">
						<h4 style="margin-bottom: 30px;">
							Founder Invenbar,
						</h4>
					</td>
				</tr>
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;" height="30">
						<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
					</td>
				</tr>
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;">
						<u>
							<h5>Alfha Fierly Firdaus</h5>
						</u>
					</td>
				</tr>
			</table>
		</section>
	</div><br>
</main>