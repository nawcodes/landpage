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
			<form class="form-horizontal" action="siswa_tambah.php" method="post" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Calon Siswa</h6></div>
                    <div class="panel-body">
                        

                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right">Id Calon Prestasi:</label>
                            <div class="col-sm-10">
                                <input type="text" name="id_mhs" class="form-control" value="<?php echo kdauto('calonbeasiswa','CPB-'); ?>" readonly="true" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right">Nama Calon Prestasi:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_mhs" required class="form-control">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-2 control-label text-right">Kejuruan:</label>
                            <div class="col-sm-10">
                                <input type="text" name="jurusan" required class="form-control">
                            </div>
                        </div>

                        <div class="form-actions text-right">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
                        </div>

                    </div>
                </div>
            </form>
<?php
if(isset($_POST['simpan'])){
	$id_mhs	= $_POST['id_mhs'];
	$nama_mhs	= $_POST['nama_mhs'];
	$jurusan		= $_POST['jurusan'];
	
	$sql="insert into calonbeasiswa values
	('$id_mhs','$nama_mhs','$jurusan')";
	$query= mysqli_query($conn,$sql) or die(mysqli_connect_error());
	if($query) {
	echo "<script>window.alert('Calon Prestasi berhasil ditambah');
            window.location=(href='siswa.php')</script>";
	}}
?>			
            <!-- /right labels -->
<?php include "footer.php";?>