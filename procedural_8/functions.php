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
	
	//upload gambar
	$gambar = upload();
		//kalau gagal berhenti di return false, insert tidak akan di jalankan
		if (!$gambar) {
			return false;
		}

	$query = "INSERT INTO mahasiswa VALUES ('', '$npm', '$nama', '$email', '$prodi', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); //4
}


function upload() {
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error']; //untuk mengetahui ada gambar yang di upload atau gak
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "
				<script>
					alert('Pilih Gambar Terlebih Dahulu!');
				</script>
			";
		return false;
	}

	//cek yang di upload gambar atau bukan (tidak boleh meng-upload file lain)
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

	//explode = sebuah fungsi untuk memecah string menjadi array
	//contoh nama file fitri.jpg akan diubah menjadi array ['fitri', 'jpg']
	$ekstensiGambar = explode('.', $namaFile);

	//yang dibutuhkan hanya type file saja bukan keduanya
		//jika nama file nya fitri.png
		//$ekstensiGambar = $ekstensiGambar[1];

		//jika nama file nya fitri.lestari.jpg
		//$ekstensiGambar = end($ekstensiGambar);
	//jika nama file nya fitri.JPG, untuk memaksa huruf besarnya menjadi kecil
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	//mencari needle(jarum) di tumpukan haystack(jerami)
		//if (in_array(needle, haystack))
	//kalau tidak ada di ekstensiGambarValid
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
				<script>
					alert('Yang Anda Upload Bukan Gambar!');
				</script>
			";
		return false;
	}

	//cek ukuran gambar tidak boleh terlalu besar
	if ($ukuranFile > 1000000) {
		echo "
				<script>
					alert('Gambar Terlalu Besar!');
				</script>
			";
		return false;
	}

	//lolos pengecekan, gambar siap di upload
	//file yang sudah tersimpan ditempat sementara($tmp_name), dipindah ke tempat tujuan penyimpanan
	//tempat penyimpanannya folder img
	//jika ada user memiliki nama file yang sama, file user akan ditimpa/ hilang, untuk menghindari itu..
	 //move_uploaded_file($tmpName, 'img/' . $namaFile);

	//buat variable baru misal $namaFileBaru
	//uniqid = kode unik yang akan menjadi nama fie di database
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru = $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	//jika gambar bisa di upload($gambar = upload();) isi dari gambar di database adalah nama file nya
	return $namaFileBaru;
}


function delete($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function update($data) {
	global $conn;
	
	$id = $data["id"];
	$npm = htmlspecialchars($data["npm"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else {
		$gambar = upload();
	}

	$query = "UPDATE mahasiswa SET 
				npm = '$npm', 
				nama = '$nama', 
				email ='$email', 
				prodi = '$prodi', 
				gambar = '$gambar'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function search($keyword) {
	//$query = "SELECT * FROM mahasiswa WHERE nama = '$keyword'"; //5
	$query = "SELECT * FROM mahasiswa WHERE
				nama LIKE '%$keyword%' OR
				npm LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				prodi LIKE '%$keyword%'
			"; //6

	return query($query);
}

function registrasi($data) {
	global $conn;

	//strtolower => supaya hurufnya menjadi kecil semua
	//stripslashes => supaya karkter seperti (/) tidak bisa dimasukkan
	$username = strtolower(stripslashes($data["username"]));
	//mysqli_real_escape_string => untuk memungkinkan user masukkin password ada tanda ("")
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");

	//jika username sudah ada di database, maka...
	if (mysqli_fetch_assoc($result)) {
		echo "
				<script>
					alert('Username Sudah Terdaftar!');
			  	</script>
			";

		return false;
	}


	//cek konformasi password
	if ($password !== $password2) {
		echo "
				<script>
					alert('Konfirmasi Password Tidak Sesuai!');
			  	</script>
			";

		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	$query = "INSERT INTO user VALUES ('', '$username', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}