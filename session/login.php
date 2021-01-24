<?php

session_start();

//jika sudah login, ingin ke halaman login langsung dari url, kembalikan ke index
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

require 'functions.php';   

if ( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])) {

			//set session,
			//kalau ada session, user berhasil login
			//kalau tidak ada session, user mencoba masuk ke halaman tertentu tanpa login
			$_SESSION["login"] = true;

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