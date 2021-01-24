<?php

session_start();
require 'functions.php';   

// //cek cookie
// //ada gak cookie login? kalau ada...
// if (isset($_COOKIE['login'])) {
// 	//cek isinya true atau bukan, kalau benar... (cookie tidak diubah oleh user)
// 	if ($_COOKIE['login'] === 'true') { //true string
// 		//set session jadi true, seolah-olah user masih login, kalau sudah true...
// 		$_SESSION['login'] = true; //true boolean
// 	}
// }

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result); //sekarang $row isinya hanya username 

	//cek cookie dan username
	//$key itu username yang sudah enkripsi
	//$row['username'] = sekarang enkripsi username baru yang diambil berdasarkan id
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

//dicek, jika session masih ada...
if (isset($_SESSION["login"])) {
	//pindah ke index
	header("Location: index.php");
	exit;
}

if ( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result); //$row menyimpan data user login

		if (password_verify($password, $row["password"])) {

			$_SESSION["login"] = true;

			//cek remember me
			if ( isset($_POST["remember"])) {

				//buat cookie
					//cookie tidak aman karena bisa dibuat melalui extension chrome
					//sehingga bisa masuk ke index tanpa login 
					//setcookie('login', 'true', time() + 60);

				//buat cookie (cukup aman)
				setcookie('id', $row['id'], time() + 60);
				//username di-enkripsi supaya tidak kebaca oleh user
				setcookie('key', hash('sha256', $row['username']), time() + 60);


			}

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
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember Me</label>
			</li>
			<li>
				<button type="submit" name="login">Sign In!</button>
			</li>
		</ul>
		
	</form>

</body>
</html>