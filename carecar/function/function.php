<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","list_mobil");



// ambil data dari tabel ekonomi / query data ekonomi
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


// tambah data
function tambah($data) {
	global $conn;
	// ambil data dari form
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO ekonomi
				VALUES
				('','$kode','$nama','$harga','$gambar')
				";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


// Upload 
function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if( $error === 4) {
		echo "<script>
				alert('pilih gambar dulu');
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upluad bukan gambar');
			</script>";
		return false;
	}

	// cek ukuran gambarnya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo"<script>
				alert('Ukuran gambar terlalu besar');
			</script>";
		return false;
	}

	// lolos pengecekan
	move_uploaded_file($tmpName, 'img/' . $namaFile);

	return $namaFile;

}


// Hapus data
function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM ekonomi WHERE id = $id");

	return mysqli_affected_rows($conn);
}


// ubah data
function ubah($data) {
	global $id;
	global $conn;

	// ambil data dari form
	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "UPDATE ekonomi SET	
				kode = '$kode',
				nama = '$nama',
				harga = '$harga',
				gambar = '$gambar'
			WHERE id=$id
			";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


// searching
function cari($keyword) {
	$query = "SELECT * FROM ekonomi
		WHERE
	nama LIKE '%$keyword%' OR
	kode LIKE '%$keyword%'

	";

	return query($query);
}


// Registrasi
function registrasi($data) {
	global $conn;

	$ussername = strtolower(stripslashes($data["ussername"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek ussername
	$result = mysqli_query($conn, "SELECT ussername FROM user WHERE ussername = '$ussername' ");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('ussername udah ada buat baru guys')
		</script>";

		return false;
	}

	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
					alert('konfirmasi password tidak sesuai');
				</script>";
		return false;
	}


	// enkripsi
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan
	mysqli_query($conn, "INSERT INTO user VALUES('', '$ussername', '$password') ");  

	return mysqli_affected_rows($conn);

}



?>