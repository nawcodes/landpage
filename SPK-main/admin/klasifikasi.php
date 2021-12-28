<?php
include "head.php";
?>

<!-- Body -->

<!-- Link Menu -->
<?php include "menu.php"; ?>

</div>
<br />

<div id="content">
	<!-- Page title -->
	<div class="page-title">
		<h5><i class="fa fa-desktop"></i> Halaman Admin</h5>
	</div>

	<!-- /page title -->

	<!-- Hover rows datatable inside panel -->
	<div class="panel panel-default">
		<div class="panel-heading" align="right">
			<h6 class="panel-title"><i class="fa fa-tag"></i> Data Klasifikasi</h6>
			<a href="klasifikasi_tambah.php"><input type="submit" value="Tambah Klasifikasi" class="btn btn-info"></a>
		</div>
		<div class="datatable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>Nilai Akhir</th>
						<th>Jumlah Sertifikat</th>
						<th>Nilai Sikap</th>
						<th>Option</th>
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
							<td>
								<a href="klasifikasi_edit.php?id_klasifikasi=<?= $dataku['id_klasifikasi'] ?>">
									<i class='fa fa-edit'></i>
								</a>
								<a href="klasifikasi_hapus.php?id_klasifikasi=<?= $dataku['id_klasifikasi'] ?>" onclick="return confirm('Are you sure you want to Delete it')">
									<i class='fa fa-eraser'></i>
								</a>
							</td>
						</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /hover rows datatable inside panel -->
	<?php include "footer.php"; ?>
</div>
</div>
</body>