<?php 
	
	//array multidimensi
	//untuk menampilkan lebih dari 1 data mahasiswa menggunakan / array di dalam array
	$mahasiswa =[
				["Fitri Lestari", "1755201228", "Teknik Informatika", "549.fitrilestari@gmail.com"],
				["Artiyas Dwi Yuliyanti", "1755201228", "Teknik Informatika", "549.fitrilestari@gmail.com"],
				["Risya Zurita Rahmadani", "1755201228", "Teknik Informatika", "549.fitrilestari@gmail.com"]
				];
	//kalau menggunakan array numeric, urutannya tidak boleh salah
	//untuk menghindari kesalahan, menggunakan array associative

?>


<!DOCTYPE html>
<html>
<head>
	<title>Array Numeric</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<!-- satu mahasiswa -->
	<!--<ul>
		<li>Fitri Lestari</li>
		<li>1755201228</li>
		<li>Teknik Informatika</li>
		<li>549.fitrilestari@gmail.com</li>
	</ul>-->

	<ul>
		<li><?= $mahasiswa[0]; ?></li>
		<li><?= $mahasiswa[1]; ?></li>
		<li><?= $mahasiswa[2]; ?></li>
		<li><?= $mahasiswa[3]; ?></li>
	</ul>
	<!-- satu mahasiswa -->

	<?php foreach ($mahasiswa as $mhs) : ?>
		<ul>
			<li>Nama :<?= $mhs[0]; ?></li>
			<li>NIM :<?= $mhs[1]; ?></li>
			<li>Prodi :<?= $mhs[2]; ?></li>
			<li>Email :<?= $mhs[3]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>
