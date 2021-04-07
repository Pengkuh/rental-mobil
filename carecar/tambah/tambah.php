<?php 
require '../function/function.php';
// Pengecekan
if( isset($_POST["submit"]) ){

	if( tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil di tambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal di tambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<style type="text/css">
	ul{
	list-type:none;
}</style> 
</head>
<body>
	<h1>Tambah data mobil</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="text" name="kode" placeholder="kode" required id="kode">
			</li>
			<li>
				<input type="text" name="nama" placeholder="nama" required id="nama">
			</li>
			<li>
				<input type="text" name="harga" placeholder="harga" required id="harga">
			</li>
			<li>
				<input type="file" name="gambar" placeholder="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>