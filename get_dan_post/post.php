<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>

	<!-- cek apakah tombol submit sudah di tekan atau belum, kalau sudah berarti data sudah dimasukkan -->
	<?php if( isset($_POST["submit"])) : ?>
		<h1>Halo, Selamat Datang <?= $_POST["nama"]; ?></h1>
	<?php endif; ?>

	<form action="" method="POST">
		Maukkan Nama:
		<input type="text" name="nama">
		<br>
		<button type="submit" name="submit">Kirim!</button>
	</form>
</body>
</html>