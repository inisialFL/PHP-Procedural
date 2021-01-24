<?php  

require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//ketika tombol supdate ditekan ambil semua data, masukkan ke dalam variable $_POST, kirim ke Function update
if (isset($_POST["update"])) {

	//cek apakah data berhasil di tambah atau tidak
	if (update($_POST) > 0) {
		echo "
				<script>
					alert('Data Berhasil Diubah!');
					document.location.href = 'index.php';
			  	</script>
			";
	}else {
		echo "
				<script>
					alert('Data Gagal Diubah!');
					document.location.href = 'index.php';
			  	</script>
			";
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>

	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		
		<ul>
			<li>
				<label for="npm">NPM: </label>
				<input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">
			</li>
			<li>
				<label for="nama">Nama: </label>
				<input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="prodi">Prodi: </label>
				<input type="text" name="prodi" id="prodi" value="<?= $mhs["prodi"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar: </label>
				<input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="update">Ubah Data!</button>
			</li>
		</ul>
		
	</form>
</body>
</html>