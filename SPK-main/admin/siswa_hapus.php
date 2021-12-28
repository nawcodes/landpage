<?php
include '../inc/koneksi.php';

$id_mhs = $_GET['id_mhs'];
$query = mysqli_query($conn,"delete from calonbeasiswa where id_mhs='$id_mhs'") or die(mysqli_connect_error());
$q = mysqli_query($conn,"DELETE FROM klasifikasi WHERE id_mhs='$id_mhs'") or die(mysqli_connect_error());
if ($query) {
?>
<script language="JavaScript">
	alert('Data Calon Prestasi berhasil di hapus');
	document.location='siswa.php';
</script>
<?php
}
?>