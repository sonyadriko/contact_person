<?php

	include 'koneksi.php';

	if (isset($_POST['update_profile'])) {

		$idAkun = $_GET['id'];
		$nama = $_POST['namaAkun'];
		$alamat = $_POST['alamatAkun'];
		$tlp = $_POST['tlpnAkun'];
		$email = $_POST['emailAkun'];
		$status = $_POST['status'];

		$rand = rand();
		$ekstensi = array('png','jpg','jpeg');
		$filenama = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filenama, PATHINFO_EXTENSION);

		$foto = $rand.'_'.$filenama;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filenama);

		$query = "update akun set namaAkun = '".$nama."', alamatAkun = '".$alamat."', tlpnAkun = '".$tlp."', emailAkun = '".$email."', status = '".$status."', fotoAkun = '".$foto."' where kodeAkun = '".$idAkun."'"; 
		$result = mysqli_query($conn, $query);

		if ($result) {
		
			header("location:welcome.php");
		}else{
			header('please check again');
		}
	}

?>