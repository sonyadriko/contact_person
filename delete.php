<?php
//koneksi sql
include 'koneksi.php';
//proses delete
if (isset($_GET['Del'])) {
	
	$idKontak = $_GET['Del'];
	$query = "DELETE FROM kontak WHERE idKontak = '".$idKontak."'";
	$result = mysqli_query($conn, $query);

	if ($result) {
	
		header("location:welcome.php");
	}else{
		echo 'please check again';
	}
}

?>