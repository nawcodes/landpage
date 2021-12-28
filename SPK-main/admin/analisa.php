<?php include "head.php"; ?>
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

	<!-- Right labels -->
	<form class="form-horizontal" action="analisa_hasil.php" method="post" role="form">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title"><i class="fa fa-pencil"></i> Analisa Pemelihan Prestasi Siswa</h6>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-sm-3 control-label text-right">C1. Nilai Akhir:</label>
					<div class="col-sm-8">
						<select name='bobot_nilai_akhir' class="required select">
							<option value="10">( 10 ) Rendah</option>
							<option value="25">( 25 ) Cukup</option>
							<option value="65">( 65 ) Tinggi</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label text-right">C2. Jumlah Sertifikat:</label>
					<div class="col-sm-8">
						<select name='bobot_sertifikat' class="required select">
							<option value="10">( 10 ) Rendah</option>
							<option value="25">( 25 ) Cukup</option>
							<option value="65">( 65 ) Tinggi</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label text-right">C3. Nilai Sikap:</label>
					<div class="col-sm-8">
						<select name='bobot_nilai_sikap' class="required select">
							<option value="10">( 10 ) Rendah</option>
							<option value="25">( 25 ) Cukup</option>
							<option value="65">( 65 ) Tinggi</option>
						</select>
					</div>
				</div>


				<div class="form-action text-right">
					<input type="submit" name="simpan" value="Proses" class="btn btn-primary">
					<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
				</div>

			</div>
		</div>
	</form>

	<!-- /right labels -->
	<?php include "footer.php"; ?>