<?php include "head.php"; ?>
<!-- Body -->

<!-- Link Menu -->
<?php include "menu.php"; ?>
</div>
<br />

<div id="content">
	<!-- Page title -->
	<div class="page-title">
		<h5><i class="fa fa-desktop"></i> Hasil Analisa</h5>
	</div>
	<!-- /page title -->

	<!-- Hover rows datatable inside panel -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">
				<tr align="right">
					<th></th>
					<th>Bobot :</th>
					<th><?php echo "(" . $_POST['bobot_nilai_akhir'] . ")"; ?></th>
					<th><?php echo "(" . $_POST['bobot_sertifikat'] . ")"; ?></th>
					<th><?php echo "(" . $_POST['bobot_nilai_sikap'] . ")"; ?></th>
					<!-- <th><?php echo "(" . $_POST['bobot_tanggungan'] . ")"; ?></th> -->
					<!-- <th><?php echo "(" . $_POST['bobot_usia'] . ")"; ?></th> -->
				</tr>
			</h6>
		</div>
		<div class="datatable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>C1. Nilai AKHIR (Benefit)</th>
						<th>C2. Jumlah Sertifikat (Benefit)</th>
						<th>C3. Nilai Sikap (Benefit)</th>
						<!-- <th>C4. Jumlah Tanggungan (cost)</th> -->
						<!-- <th>C5. Usia (Benefit)</th>            					 -->
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor = 0;
					$hasil = mysqli_query($conn, "select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs");
					while ($dataku = mysqli_fetch_array($hasil)) {
					?>
						<tr>
							<td><?php echo $nomor = $nomor + 1; ?></td>
							<td><?php echo $dataku['nama_mhs']; ?></td>
							<td><?php echo $dataku['nilai_akhir']; ?></td>
							<td><?php echo $dataku['sertifikat']; ?></td>
							<td><?php echo $dataku['nilai_sikap']; ?></td>
							<!-- <td><?php echo $dataku['jml_tanggungan']; ?></td> -->
							<!-- <td><?php echo $dataku['usia']; ?></td> -->
						</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- /hover rows datatable inside panel -->
	<!-- Cari nilai maximal dan minimal-->
	<?php
	#Cari nilai maximal
	// $carimax = mysqli_query($conn, "SELECT max(nilai_akhir) as max1,
	// 							max(sertifikat) as max2,
	// 							max(nilai_sikap) as max3,
	// 							FROM klasifikasi");

	$carimax = mysqli_query($conn, "SELECT MAX(nilai_akhir) as max1, MAX(sertifikat) as max2, MAX(nilai_sikap) as max3 FROM `klasifikasi`");
	$max = mysqli_fetch_array($carimax);


	# Cari nilai minimal
	$carimin = mysqli_query($conn, "SELECT MIN(nilai_akhir) as min1, MIN(sertifikat) as min2, MIN(nilai_sikap) as min3 FROM `klasifikasi`");
	$min = mysqli_fetch_array($carimin);

	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-titl~e">Normalisasi</h6>
		</div>
		<div class="datatable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>C1. Nilai AKHIR (Benefit)</th>
						<th>C2. Jumlah Sertifikat (Benefit)</th>
						<th>C3. Nilai Sikap (Benefit)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor = 0;
					$hasil = mysqli_query($conn, "select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs");
					while ($dataku = mysqli_fetch_array($hasil)) {
					?>
						<tr>
							<td><?php echo $nomor = $nomor + 1; ?></td>
							<td><?php echo $dataku['nama_mhs']; ?></td>
							<td><?php echo round($dataku['nilai_akhir'] / $max['max1'], 2); ?></td>
							<td><?php echo round($dataku['sertifikat'] / $max['max2'], 2); ?></td>
							<td><?php echo round($dataku['nilai_sikap'] / $max['max3'], 2); ?></td>
							<!-- <td><?php echo round($min['min4'] / $dataku['jml_tanggungan'], 2); ?></td> -->
							<!-- <td><?php echo round($dataku['usia'] / $max['max5'], 2); ?></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /hover rows datatable inside panel -->
	<?php
	$bobot_nilai_ipk		= $_POST['bobot_nilai_akhir'];
	$bobot_penghasilan_ortu	= $_POST['bobot_sertifikat'];
	$bobot_semester			= $_POST['bobot_nilai_sikap'];
	// $bobot_tanggungan		= $_POST['bobot_tanggungan'];
	// $bobot_usia				= $_POST['bobot_usia'];
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">Perangkingan</h6>
		</div>
		<div class="datatable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Hasil Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor = 0;
					$query = "SELECT *,
							 ((`klasifikasi`.`nilai_akhir` / {$max['max1']}) * ( {$bobot_nilai_ipk} / 100))
							+ ((`klasifikasi`.`sertifikat` / {$max['max2']}) * ({$bobot_penghasilan_ortu} / 100))
							+ ((`klasifikasi`.`nilai_sikap` / {$max['max3']} * ({$bobot_semester} / 100)) )
							as ref  FROM `klasifikasi`, `calonbeasiswa` WHERE `klasifikasi`.`id_mhs`= `calonbeasiswa`.`id_mhs` ORDER BY ref DESC";

					// $hasil = mysqli_query($conn, "select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs ORDER BY nilai_akhir DESC");
					$hasil = mysqli_query($conn, $query);
					while ($dataku = mysqli_fetch_array($hasil)) {
					?>
						<tr>
							<td><?php echo $nomor = $nomor + 1; ?></td>
							<td><?php echo $dataku['nama_mhs']; ?></td>
							<td><?php echo round($dataku['ref'], 2); ?>
							</td>
						</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /hover rows datatable inside panel -->
	<?php include "footer.php"; ?>