<?php

	//for / foreach

	$angka =[3,2,15,20,11,77];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pengulangan Array</title>
	<style>
		.kotak {
		width: 50px;
		height: 50px;
		background-color: salmon;
		text-align: center;
		line-height: 50px;
		margin: 3px;
		float: left;
		}

		.clear {clear: both;}
	</style>
</head>
<body>
	<?php for ($i=0; $i<count($angka); $i++) { ?>
		<div class="kotak"><?= $angka[$i]; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<!-- untuk setiap elemen yang ada di dalam array lakukan sesuatu -->
	<?php foreach($angka as $a) { ?>
		<div class="kotak"><?= $a; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<!-- gaya templeting -->
	<?php foreach($angka as $a) : ?>
		<div class="kotak"><?= $a; ?></div>
	<?php endforeach; ?>

</body>
</html>