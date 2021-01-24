<?php  
	
	//Untuk mengecek apakah ada data di $_GET
	if( !isset($_GET["nama"]) ||
		!isset($_GET["nim"]) ||
		!isset($_GET["prodi"]) ||
		!isset($_GET["jurusan"])) {


		//redirect
		header("Location: get_post.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>
	<ul>
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["nim"]; ?></li>
		<li><?= $_GET["prodi"]; ?></li>
		<li><?= $_GET["email"]; ?></li>
	</ul>

	<a href="get.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>