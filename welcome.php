<?php

include 'koneksi.php';

session_start();

if (!isset($_SESSION['emailAkun'])) {
    header("Location: login.php");
}

$sesi = $_SESSION['emailAkun'];
$sesiakun = $_SESSION['kodeAkun'];

$get_data = mysqli_query($conn, "select * from kontak WHERE kodeAkun = '$sesiakun' order by namaKontak ");
//order by namaKontak 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="stylewelcome.css">
</head>
<body>
	<header id="header" class="navbar">
		<ul>
			<li style = "float:left"><a href="profile.php">Profil</a></li>
			<li style = "float:right"><a href="logout.php">Logout</a></li>
			<li style="float: right; margin-top: -25px;"><?php echo "<p>Welcome " . $_SESSION["emailAkun"] . "</p>"; ?></li>
		</ul> 
</header>
<h1><a href="welcome.php" style="text-decoration: none; list-style: none; color: whitesmoke">List Kontak</a></h1>
	<div class="container">
		<a href="tambah_data.php"><button name="tambah_data" class="btn">Tambah Data</button></a>
		<form action="" method="post" class="formsearch">
		<input type="text" name="search" placeholder="cari ...">
		<input type="submit" name="cari" value="cari">
		</form>
		<br>
		<br>
		
		<br>
		<table border="1"  cellpadding="20" cellspacing="0">
			<tr>
				<td>Nomor</td>
				<td width="20%">Nama</td>
				<td width="30%">Alamat</td>
				<td width="10%">Telepon</td>
				<td width="10%">Email</td>
				<td width="20%">Foto</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		<?php
		

		$nomor = 1;
	
		while ($display=mysqli_fetch_array($get_data)){
			$idKontak = $display['idKontak'];
			$nama = $display['namaKontak'];
			$alamat = $display['alamatKontak'];
			$tlp = $display['tlpKontak'];
			$email = $display['emailKontak'];
			$foto = $display['fotoKontak'];
		
			?>
			<tr>
				<td><?php echo $nomor ?></td>
				<td><?php echo $nama ?></td>
				<td><?php echo $alamat ?></td>
				<td><?php echo $tlp ?></td>
				<td><?php echo $email ?></td>
				<td><img src="gambar/<?php echo $foto ?>" width="100px" height="125px"></td>
				<td><a href='update_kontak.php?GetID=<?php echo $idKontak ?>'><input type='submit' value='edit' id='editbtn'></a></td>
				<td><a href='delete.php?Del=<?php echo $idKontak ?>'><input type='submit' value='delete' id='deletebtn'></a></td>
			</tr>
			<?php
			$nomor++;
		}
	?>
		<?php 
			if (ISSET($_POST['cari'])) {
				# code...
				$cari = $_POST['search'];
				$query2 = "SELECT * FROM kontak WHERE namaKontak LIKE '%$cari%'";
				$sql2 = mysqli_query($conn, $query2);
				$nomor2 = 1;
				while ($dsearch = mysqli_fetch_array($sql2)) {

					$idKontak2 = $dsearch['idKontak'];
					$nama2 = $dsearch['namaKontak'];
					$alamat2 = $dsearch['alamatKontak'];
					$tlp2 = $dsearch['tlpKontak'];
					$email2 = $dsearch['emailKontak'];
					$foto2 = $dsearch['fotoKontak'];
					# code...
					?>
				<tr>
					<td><?php echo $nomor2 ?></td>
					<td><?php echo $nama2 ?></td>
					<td><?php echo $alamat2 ?></td>
					<td><?php echo $tlp2 ?></td>
					<td><?php echo $email2 ?></td>
					<td><img src="gambar/<?php echo $foto2 ?>" width="100px" height="125px"></td>
					<td><a href='update_kontak.php?GetID=<?php echo $idKontak2 ?>'><input type='submit' value='edit' id='editbtn'></a></td>
					<td><a href='delete.php?Del=<?php echo $idKontak2 ?>'><input type='submit' value='delete' id='deletebtn'></a></td>
			</tr>
			<?php
			$nomor2++;
				}
			}
		?>
	</table> 
	</div>
	
</body>
</html>