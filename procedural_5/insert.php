<?php  

require 'functions.php';

if (isset($_POST["insert"])) {

	//cek apakah data berhasil di tambah atau tidak
	if (insert($_POST) > 0) {
		echo "
				<script>
					alert('Data Berhasil Ditambah!');
					document.location.href = 'index.php';
			  	</script>
			";
	}else {
		echo "
				<script>
					alert('Data Gagal Ditambah!');
					document.location.href = 'index.php';
			  	</script>
			";
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>

	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="npm">NPM: </label>
				<input type="text" name="npm" id="npm" required>
			</li>
			<li>
				<label for="nama">Nama: </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="prodi">Prodi: </label>
				<input type="text" name="prodi" id="prodi">
			</li>
			<li>
				<label for="gambar">Gambar: </label>
				<input type="text" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="insert">Tambah Data!</button>
			</li>
		</ul>
	</form>

</body>
</html>