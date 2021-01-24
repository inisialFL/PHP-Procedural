<?php  

$conn = mysqli_connect("localhost", "root", "", "php");

if (isset($_POST["insert"])) {
	//ambil data dari setiap elemen dalam form
	$npm = $_POST["npm"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$prodi = $_POST["prodi"];
	$gambar = $_POST["gambar"];

	$query = "INSERT INTO mahasiswa VALUES ('', '$npm', '$nama', '$email', '$prodi', '$gambar')";
	mysqli_query($conn, $query);


	//cek apakah data berhasil di tambah atau tidak
	//var_dump(mysqli_affected_rows($conn)); //jika berhasil = int(1) dan gagal =int(-1)
	if (mysqli_affected_rows($conn) > 0) {
		echo "Berhasil";
	}else {
		echo "Gagal!";
		echo "<br>";
		echo mysqli_error($conn);
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