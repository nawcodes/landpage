<?php

require '../inc/koneksi.php';



function kdauto($tabel, $inisial){
	$conn = $GLOBALS['conn'];
	$struktur = mysqli_query($conn,"SELECT * FROM $tabel");
	$field = mysqli_fetch_field_direct($struktur, 0);
	$panjang = $field->length;



	$qry = mysqli_query($conn,"SELECT max(".$field->name.")
		FROM ".$tabel);

		
	$row = mysqli_fetch_array($qry);

	

	if ($row[0]=="") {
		$angka=0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}


	
	

	$angka++;
	$angka = strval($angka);
	$tmp = "";


	for ($i=1; $i<=(strlen($inisial) +
		 strlen($angka)) ; $i++) { 
		$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}

function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}
?>