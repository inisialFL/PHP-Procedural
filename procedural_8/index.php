<?php  

require 'functions.php'; //memanggil file function

$mhs = query("SELECT * FROM mahasiswa");

//tombol cari di click maka $mhs akan ditimpa dengan data mahasiswa sesuai pencariannya
if (isset($_POST["search"])) {
	$mhs = search($_POST["keyword"]); 
}

//ambil apapun yang di ketikan oleh user, masukkan ke function cari
//functions => misalnya keyword-nya nama, lalu kembalikan hasilnya berupa array associative dan masukkan ke dalam $mhs

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

	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus autocomplete="off">
		<button type="submit" name="search">Cari!</button>
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