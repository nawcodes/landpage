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

	<div id="leftpanel">
		<div class="table_top">
			<div align="center"><span class="title_panel">About</span> </div>
		</div>
		<div class="table_content">
			<div class="table_text">
				<div align="right"><span class="news_date"><?php echo "[" . date("H:i:s") . "] ~ [" . date("d/M/Y") . "]"; ?></span></div> <br>
				<h6>RESEARCH TRACK SPK SAW</h6>
				<font color="blue">
					<h6>"Pemilihan siswa berprestasi"</h6>
				</font>
				<hr>
				<span class="news_date">Simple Addictive Weighting Method (SAW)</span> <br>
				<span class="news_text">
					Metode SAW sering juga dikenal istilah metode penjumlahan terbobot.
					Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif
					pada semua atribut (Fishburn, 1967) (MacCrimmon,1968).
				</span>
				<hr>
				<hr>
			</div>
		</div>

		<br>

	</div>


	<div id="contenttext">
		<span class="title_blue"><a class="navbar-brand-right">"Pemilihan Siswa Berprestasi"</a></span><br />


		<div class="content" align="left">
			<br />
			<ul>
				<h3><i class="fa fa-home"></i> Dalam Aplikasi Ini Terdapat Fitur-fitur sebagai berikut:</h3>
				<ul>
					<h4><i class="fa fa-users"></i> Siswa</h4>
					<ul>
						<h6><i class='fa fa-plus'></i> Tambah Data Calon Siswa Berprestasi<br></h6>
						<h6><i class='fa fa-edit'></i>Edit Data Siswa<br></h6>
						<h6><i class='fa fa-eraser'></i>Hapus Data</h6>
					</ul>

					<h4><i class="fa fa-bar-chart-o"></i> Kriteria</h4>
					<ul>
						<h6><i class='fa fa-plus'></i> Tambah Data Kriteria <br></h6>
						<h6><i class='fa fa-edit'></i> Edit Data Kriteria<br></h6>
						<h6><i class='fa fa-eraser'></i> Hapus Data</h6>
					</ul>

					<h4><i class="fa fa-bookmark"></i>Nilai Kriteria</h4>
					<ul>
						<h6><i class='fa fa-plus'></i> Tambah Nilai Kriteria<br></h6>
						<h6><i class='fa fa-edit'></i> Edit Data Nilai Kriteria<br></h6>
						<h6><i class='fa fa-eraser'></i> Hapus Nilai Kriteria</h6>
					</ul>
					<h4><i class="fa fa-tag"></i> Klasifikasi</h4>
					<ul>
						<h6><i class='fa fa-plus'></i> Tambah Klasifikasi</h6>
					</ul>
					<h4><i class="fa fa-pencil"></i>Analisa</h4>
					<ul>

					</ul>
				</ul>
			</ul>
		</div>
		<br />
	</div>

	<br />
	<br />
	<!-- Footer -->
	<?php include "footer.php" ?>