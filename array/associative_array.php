<?php 

//Array Associative
//definisinya sama seperti array numerik, kecuali..
//key-nya adalah string ("Nama", "NIM", "Email", "Prodi") yang kita buat sendiri
$mahasiswa = [
				[
					"Nama" => "Fitri Lestari",
					"NIM" => "1755201228",
					"Prodi" => "Teknik Informatika",
					"Email" => "549.fitrilestari@gmail.com"
					//"Tugas" => [70, 80, 90] => array multi dimensi
			 	],
			 	[
			 		"Email" => "artiyas@gmail.com",
					"Nama" => "Artiyas Dwi Yuliyanti",
					"NIM" => "1755201227",
					"Prodi" => "Teknik Informatika"
			 	],
			 	[
					"Nama" => "Risya Zurita Rahmadani",
					"Prodi" => "Teknik Informatika",
					"Email" => "risya@gmail.com",
					"NIM" => "1755201226"
			 	]
			];

			//echo $mahasiswa ["Prodi"]; => Cara menampilkan array associative
			//echo $mahasiswa [0]["Tugas"][1];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Latihan Array Associative 2</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<!--<ul>
		<li>Fitri Lestari</li>
		<li>1755201228</li>
		<li>Teknik Informatika</li>
		<li>549.fitrilestari@gmail.com</li>
	</ul>-->

	<?php foreach ($mahasiswa as $mhs) : ?>
		<ul>
			<li>Nama :<?= $mhs["Nama"]; ?></li>
			<li>NIM :<?= $mhs["NIM"]; ?></li>
			<li>Prodi :<?= $mhs["Prodi"]; ?></li>
			<li>Email :<?= $mhs["Email"]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>
