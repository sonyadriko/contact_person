<?php

include 'koneksi.php';
//start sesi
session_start();

$sesi = $_SESSION['emailAkun'];
//cek sesi
if (!isset($sesi)) {
    header("Location: login.php");
}
//sql tambah data
if (isset($_POST['submit'])) {
	$idKontak = rand();	
	$kodeAkun = $_SESSION['kodeAkun'];
	$nama = $_POST['namaKontak'];
	$alamat = $_POST['alamatKontak'];
	$tlp = $_POST['tlpKontak'];
	$email = $_POST['emailKontak'];

	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	$query = "SELECT * FROM kontak WHERE emailKontak = '$email'";
	$result = $conn->query($query);

	if (!in_array($ext, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else {
		if ($ukuran < 1044000) {

			$xx = $idKontak.'_'.$filenama;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$idKontak.'_'.$filenama);


			if ($result->num_rows > 0) {
					echo "<script>alert('Email already in use :(')</script>";
				} else {	
					$insertQuery = "INSERT INTO kontak
					(`idKontak`, `kodeAkun`, `namaKontak`, `alamatKontak`, `tlpKontak`, `emailKontak`, `fotoKontak`)
					VALUES ($idKontak,
					'$kodeAkun',
					'$nama',
					'$alamat',
					'$tlp',
					'$email',
					'$xx')";

					$insertResult = $conn->query($insertQuery);
						if ($insertResult) {
							echo "<script>alert('Kontak berhasil ditambahkan.')</script>";
							header("Location: welcome.php");

						} else {
							echo 'Error';
					}
			}
		}
	}

	}
		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Tambah Data</p>
			<div class="input-group">
				<input type="text" placeholder="Nama" name="namaKontak" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat" name="alamatKontak" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telepon" name="tlpKontak" >
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="emailKontak" >
			</div>
			<div class="input-group">
				<input type="file" name="foto">
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Tambah Contact</button>
			</div>
			
		</form>
	</div>
</body>
</html>