<?php

include 'koneksi.php';

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


session_start();

if (isset($_SESSION['emailAkun'], $_SESSION['kodeAkun'])) {
    header("Location: welcome.php");
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>


		<?php
		if (isset($_POST['submit'])) {

			$email = $_POST['email'];
			$password = md5($_POST['password']);

			$query =  "SELECT * FROM akun WHERE emailAkun = '$email' AND pass = '$password'";
			$result = $conn->query($query);

			if ($result->num_rows >= 1) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['emailAkun'] = $row['emailAkun'];
				$_SESSION['kodeAkun'] = $row['kodeAkun'];
				header("location:welcome.php");
			} else {
				echo "maaf username dan password anda salah";
			}
		}
		?>


	</div>
</body>

</html>