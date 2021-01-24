<?php 

require 'functions.php'; 

//ketika tombol registrasi! sudah ditekan, maka jalankan jalankan function registrasi
if ( isset($_POST["register"])) {
	 	
	if (registrasi($_POST) > 0) {
		echo "
				<script>
					alert('User Baru Berhasil Ditambahkan!');
					document.location.href = 'index.php';
		  		</script>
			";
	}else {
			echo mysqli_error($conn);
	}	
} 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Haaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

	<h1>Halaman Registrasi</h1>

	<form action="" method="Post">
		<ul>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">Konfirmasi Password</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="register">Registrasi!</button>
			</li>
		</ul>
		
	</form>
</body>
</html>