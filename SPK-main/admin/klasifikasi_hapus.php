<?php
include '../inc/koneksi.php';

$id_klasifikasi = $_GET['id_klasifikasi'];
$query = mysqli_query($conn,"delete from klasifikasi where id_klasifikasi='$id_klasifikasi'") or die(mysqli_connect_error());
if ($query) {
?>
<script language="JavaScript">
	alert('Klasifikasi berhasil dihapus');
	document.location='klasifikasi.php';
</script>
<?php
}
?>