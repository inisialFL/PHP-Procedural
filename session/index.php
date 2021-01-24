<?php  

session_start();

//jika tidak ada session login maka kembali ke halaman login
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$mhs = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"])) {
	$mhs = search($_POST["keyword"]); 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<a href="logout.php">Logout</a>

	<h1>Daftar Mahasiswa</h1>

	<a href="insert.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="POST">
		<input type="text" name="keyword" size="30" autofocus autocomplete="off">
		<button type="submit" name="cari">Cari</button>
	</form>
	<br>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Foto</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Prodi</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach ($mhs as $row) : ?>

		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="update.php?id=<?= $row["id"]; ?>">Ubah</a> |
				<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>"></td>
			<td><?= $row["npm"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["prodi"]; ?></td>
		</tr>

		<?php $i++; ?>
		<?php endforeach; ?>	
	</table>

</body>
</html>