<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['emailAkun'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$nama = $_POST['namaAkun'];
	$alamat = $_POST['alamatAkun'];
	$tlp = $_POST['tlpnAkun'];
	$email = $_POST['emailAkun'];
	$status = $_POST['statusAkun'];
	
	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	$kodeAkun = rand();

	if (!in_array($ext, $ekstensi)) {
		# code...
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else {
		if ($ukuran < 1044000) {
			# code...
			$xx = $rand.'_'.$filenama;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filenama);


	if ($password == $cpassword) {
		$query = "SELECT * FROM akun WHERE emailAkun = '$email'";
		//$result = mysqli_query($conn, $sql);
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			echo "<script>alert('Email already in use :(')</script>";
		} else {
			$insertQuery = "INSERT INTO akun 
			(`kodeAkun`, `pass`, `namaAkun`, 
			`alamatAkun`, `tlpnAkun`, `emailAkun`, `status`, `fotoAkun`) 
			VALUES ($kodeAkun,
			'$cpassword',
			'$nama',
			'$alamat',
			'$tlp',
			'$email',
			'$status',
			'$xx')";

			$insertResult = $conn->query($insertQuery);

			if ($insertResult) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				header("Location: login.php");

			} else {
				echo "<script>alert('Password Not Matched.')</script>";
			}
		}

		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
		}

	}

}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
	</script>
	<title>Register Form</title>



</head>


<body>
	<div class="container">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<p>Nama : </p>
				<input type="text" placeholder="Nama" name="namaAkun" required>
			</div>
			<div class="input-group">
				<p>Email : </p>

				<input type="email" placeholder="Email" name="emailAkun" required>
			</div>
			<div class="input-group">
				<p>Password : </p>

				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<p>Confirm Password : </p>

				<input type="password" placeholder="Confirm Password" name="cpassword" required>
			</div>
			<div class="input-group">
				<p>Alamat : </p>

				<input type="text" placeholder="Alamat" name="alamatAkun" required>
			</div>
			<div class="input-group">
				<p>Telepon : </p>

				<input type="text" placeholder="Telepon" name="tlpnAkun" required>
			</div>
			<div class="input-group">
				<p>Status : </p>

				<input type="text" placeholder="status" id="statusAkun" name="statusAkun" required>
			</div>
			<div class="input-group">
				<p>Foto : </p>

				<input type="file" name="foto">
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>