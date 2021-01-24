<?php  

require 'functions.php'; //memanggil file function

$mhs = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>

	<a href="insert.php">Tambah Data Mahasiswa</a>
	<br><br>

	

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
				<a href="">Ubah</a> |
				<a href="">Hapus</a>
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