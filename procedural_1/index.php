<?php  

//koneksi ke database
//dibuat variable $conn agar lebih singkat
$conn = mysqli_connect("localhost", "root", "", "php");

//ambil field / query dari table mahasiswa
//dibuat variable $result agar mengetahuin query berhasil atau tidak
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//ambil data mahasiswa dari object result
//1. mysqli_fetch_row() //mengembalikan array numeric
//$mhs = mysqli_fetch_row($result);
	//var_dump($mhs);
	//var_dump($mhs[3]);

//2. mysqli_fetch_assoc() //mengembalikan array associative
//$mhs = mysqli_fetch_assoc($result); //hanya mengambil 1 baris field/data
	//var_dump($mhs);
	//var_dump($mhs["prodi"]);
//while ($mhs = mysqli_fetch_assoc($result)) { //mengmbilsemua field dalam table
	//var_dump($mhs["nama"]);
//}

//3. mysqli_fetch_array() //mengembalikan array numeric dan associative
//$mhs = mysqli_fetch_array($result);
	//var_dump($mhs);

//4. mysqli_fetch_object()
//$mhs = mysqli_fetch_object($result); //nama = field
	//var_dump($mhs->nama);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daetar Mahasiswa</h1>

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
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>

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
		<?php endwhile; ?>	
	</table>

</body>
</html>