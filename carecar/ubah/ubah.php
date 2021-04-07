<?php 

require '../function/function.php';

// ambil data dari url
$id = $_GET["id"];

// query data 
$ekn = query("SELECT * FROM ekonomi WHERE id=$id")[0];

// Pengecekan
if( isset($_POST["submit"]) ){

	//  sukses or not
	if( ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil di ubah');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal di ubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Data</title>

</head>
<body>
	<h1>Ubah data mobil</h1>
	<form action="" method="post">
		<ul>
			<input type="hidden" name="id" value="<?= $ekn["id"] ?>">
			<li>
				<input type="text" name="kode" placeholder="kode" required id="kode" value="<?= $ekn["kode"] ; ?>">
			</li>
			<li>
				<input type="text" name="nama" placeholder="nama" required id="nama" value="<?= $ekn["nama"] ; ?>">
			</li>
			<li>
				<input type="text" name="harga" placeholder="harga" required id="harga" value="<?= $ekn["harga"] ; ?>">
			</li>
			<li>
				<input type="text" name="gambar" placeholder="gambar" id="gambar" value="<?= $ekn["gambar"] ; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>