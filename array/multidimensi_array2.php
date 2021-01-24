<?php  

	$angka =[[1,2,3], [4,5,6], [7,8,9]];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pengulangan Array</title>
	<style>
		.kotak {
		width: 30px;
		height: 30px;
		background-color: yellow;
		text-align: center;
		line-height: 30px;
		margin: 3px;
		float: left;
		transition: 1s;
		}

		.kotak:hover {
			transform: rotate(360deg);
			border-radius: 50%;

		}

		.clear {clear: both;}
	</style>
</head>
<body>
	<div class="kotak"><?= $angka[1][1]; ?></div>

	<div class="clear"></div>

	<?php foreach($angka as $a) : ?>
		<?php foreach($a as $b) : ?>
			<div class="kotak"><?= $b; ?></div>
		<?php endforeach; ?>
	<?php endforeach; ?>

	<div class="clear"></div>

	<?php foreach($angka as $a) : ?>
		<?php foreach($a as $b) : ?>
			<div class="kotak"><?= $b; ?></div>
		<?php endforeach; ?>
		<div class="clear"></div>
	<?php endforeach; ?>

</body>
</html>