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


function insert($data) {
	global $conn;
	
	$npm = htmlspecialchars($data["npm"]); //3
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "INSERT INTO mahasiswa VALUES ('', '$npm', '$nama', '$email', '$prodi', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); //4
}

function delete($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}