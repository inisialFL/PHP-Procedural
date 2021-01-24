<?php

require 'functions.php';   

if ( isset($_POST["login"])) {

	//menangkap data username dan password dari POST
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//cek username sudah ada atau belum di databse 	
	$result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");

	//kalau nilainya 1 berarti sudah ada
	if (mysqli_num_rows($result) === 1) {
		
		//cek password
		//jadi di dalam row sudah ada data (id, username, password, dan password yang sudah di enkripsi)
		$row = mysqli_fetch_assoc($result);

		//untuk mengecek sebuah string sama atau tidak dengan hash, kalau sama berarti benar
		if (password_verify($password, $row["password"])) {
			header("Location: index.php");
			exit;
		}
	}

	$error = true;
} 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

	<h1>Halaman Login</h1>

	<?php if (isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username atau Password Salah!</p>
	<?php endif; ?>
	

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username</label>
				<input type="username" name="username" id="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login">Sign In!</button>
			</li>
		</ul>
		
	</form>

</body>
</html>