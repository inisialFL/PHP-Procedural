<?php

$conn = mysqli_connect("localhost", "root", "", "php"); //1

function query($query) { //2
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	return $rows;
}