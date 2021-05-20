<?php

include 'koneksi.php';

	if (isset($_POST['update'])) {
		
		$idKontak = $_GET['id'];
		$nama = $_POST['namaKontak'];
		$alamat = $_POST['alamatKontak'];
		$tlp = $_POST['tlpKontak'];
		$email = $_POST['emailKontak'];
		//$foto = $_POST['foto'];

		$rand = rand();
		$ekstensi = array('png','jpg','jpeg');
		$filenama = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filenama, PATHINFO_EXTENSION);

		 
		$foto = $rand.'_'.$filenama;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filenama);

		$query = "update kontak set namaKontak = '".$nama."', alamatKontak = '".$alamat."', tlpKontak = '".$tlp."', emailKontak = '".$email."', fotoKontak = '".$foto."' where idKontak = '".$idKontak."'"; 
		$result = mysqli_query($conn, $query);

		if ($result) {
			
			header("location:welcome.php");
		}else{
			header('please check again');
		}
	}

?>