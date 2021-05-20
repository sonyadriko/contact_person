<?php
include 'koneksi.php';
error_reporting(0);


$idKontak = $_GET['GetID'];

$query = "SELECT * FROM kontak WHERE idKontak = '".$idKontak."'" ;
$result = $conn->query($query);
while ($row=mysqli_fetch_assoc($result)) {
	$nama = $row['namaKontak'];
	$alamat = $row['alamatKontak'];
	$tlp = $row['tlpKontak'];	 
	$email = $row['emailKontak'];
	$filenama = $_FILES['foto']['name'];
	$foto = $row['fotoKontak'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Kontak</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
		<form action="update_proses.php?id=<?php echo $idKontak ?>" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Kontak</p>
			<div class="input-group">
				<input type="text" placeholder="Nama" name="namaKontak" value="<?php echo $nama ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat" name="alamatKontak" value="<?php echo $alamat ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telepon" name="tlpKontak" value="<?php echo $tlp ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="emailKontak" value="<?php echo $email ?>" required>
			</div>
			<div class="input-group">
				<input type="file" name="foto" value="gambar/<?php echo $foto ?>">
			</div>
			<div class="input-group">
				<button name="update" class="btn">Update Contact</button>
			</div>
			<div class="input-group">
				<a href="welcome.php" style="text-decoration: none; list-style: none; color: whitesmoke"><button name="update" class="btn">back Contact</button></a>
			</div>
		</form>
	</div>
</body>
</html>