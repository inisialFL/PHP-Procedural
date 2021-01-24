<?php  

	//$_GET
	//Metode Request GET adalah metode pengiriminan data melalui URL dan data tersebut bisa diambil atau ditangkap oleh Variable Superglobal $_GET
	//data dikirim mengunakan Metode Request GET akan ditangkap oleh Variable Superglobal $_GET
	$mahasiswa = [
				[
					"nama" => "Fitri Lestari",
					"nim" => "1755201228",
					"prodi" => "Teknik Informatika",
					"email" => "549.fitrilestari@gmail.com"
					//"Tugas" => [70, 80, 90] => array multi dimensi
			 	],
			 	[
			 		"email" => "artiyas@gmail.com",
					"nama" => "Artiyas Dwi Yuliyanti",
					"nim" => "1755201227",
					"prodi" => "Teknik Informatika"
			 	],
			 	[
					"nama" => "Risya Zurita Rahmadani",
					"prodi" => "Teknik Informatika",
					"email" => "risya@gmail.com",
					"nim" => "1755201226"
			 	]
			];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
	<?php foreach ($mahasiswa as $mhs) : ?>
		<li>
			<a href="tampil_get.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&prodi=<?= $mhs["prodi"]; ?>&email=<?= $mhs["email"]; ?>"><?= $mhs["nama"]; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</body>
</html>