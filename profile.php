<?php
//koneksi 
include 'koneksi.php';
//start sesi
session_start();
//cek sesi
if (!isset($_SESSION['emailAkun'])) {
    header("Location: login.php");
}


$sql = "SELECT * FROM akun WHERE kodeAkun = '$_SESSION[kodeAkun]';";
$result = $conn->query($sql);
while ($row=mysqli_fetch_assoc($result)) {
	# code...
	$idAkun = $row['kodeAkun'];
	$nama = $row['namaAkun'];
	$alamat = $row['alamatAkun'];
	$tlp = $row['tlpnAkun'];
	$email = $row['emailAkun'];
	$status = $row['status'];
	$foto = $row['fotoAkun'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		table {
			padding: 5px;
		}
		table tr {
			padding: 5px;
		}
		table tr td {
			padding: 5px;
			width: 100%;
    		height: 100%;
			font-family: Tw cen mt;
			font-size: 20px;
		    padding: 15px 20px;
		}

	</style>
</head>
<body>
	<div class="container">
		<form action="update_profile.php?id=<?php echo $idAkun ?>" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Profile Akun</p>
			<img src="gambar/<?php echo $foto ?>" width="100px" height="120px" >
			<br>
			<table>
				<tr>
					<td>Nama </td>
					<td><input type="text" placeholder="Nama" name="namaAkun" value="<?php echo $nama ?>" required></td>

				</tr>
				<tr>
					<td>Alamat </td>
					<td><input type="text" placeholder="Alamat" name="alamatAkun" value="<?php echo $alamat ?>" required></td>
				</tr>
				<tr>
					<td>Telepon </td>
					<td><input type="text" placeholder="Tlp" name="tlpnAkun" value="<?php echo $tlp ?>" required></td>
				</tr>
				<tr>
					<td>Email </td>
					<td><input type="text" placeholder="Email" name="emailAkun" value="<?php echo $email ?>" required></td>
				</tr>
				<tr>
					<td>Status </td>
					<td><input type="text" placeholder="Status" name="status" value="<?php echo $status ?>" required></td>
				</tr>
				<tr>
					<td>Foto Kontak </td>
					<td><input type="file" name="foto"></td>
				</tr>
				


			

		</table>
		<button name="update_profile" class="btn">Update Akun</button>
			
	</div>
	</form>
	

</body>
</html>