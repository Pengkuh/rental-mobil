<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// koneksi ke database
require '../function/function.php';
$ekonomi = query ("SELECT * FROM ekonomi ORDER BY id DESC");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$ekonomi = cari($_POST["keyword"]) ;
}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Mobil - Care Car</title>
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VXjrPsLTRbtF1lsz5SZGYpHk3-ymy8N9">

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;0,900;1,300&display=swap" rel="stylesheet" />
    <style>
    body {
        background-color: #f8f9fa;;
        font-family: 'verdana', sans-serif;
        box-sizing: border-box;
        margin: 0px;
        font-size:14px;
    }

    .harga{
      color:#dc3545;
      font-size:1.3em;
    }

    </style>
  </head>
  <body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
      <div class="container">
        <a class="navbar-brand" href="#"> <img src="https://drive.google.com/uc?id=1VXjrPsLTRbtF1lsz5SZGYpHk3-ymy8N9" alt="logo care Car" width="40px" /> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tambah/tambah.php">Tambah Mobil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="logout" aria-current="page" href="#home">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Bar -->
    <h3>Ekonomi Class</h3>

    <!-- list -->
    <div class="list_mobil">
      <div class="slider_container">

      <?php $i = 1; ?>
	    <?php foreach ($ekonomi as $row) : ?>

        <div class="item shadow-sm">
          <div class="card rounded-3" style="width: 17rem;" >
          <img src="img/<?= $row["gambar"] ; ?>" width="100%">
            <div class="card-body" style="height:250px">
              <h5 class="card-title"><?= $row["nama"]?></h5>
              <table >
                <tr>
                  <td>Kode Mobil : <?= $row["kode"]?></td>
                </tr>
                <tr>
                  
                  <td class="harga">Rp.<?= $row["harga"]?>.00</td>
                </tr>
              </table>
              <div class="tombol text-center mt-2">
                <a href="../ubah/ubah.php?id=<?= $row["id"] ; ?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
                <a href="../hapus/hapus.php?id=<?= $row["id"] ;?>" class="btn btn-danger" onclick="return confirm('yakin?')";><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a>
                
                <div class="order mt-2">
                <a href="../order/order.php?id=<?= $row["id"] ; ?>" class="btn btn-primary" style="width:80%">Order</a>
              </div></div>
              <br>
            </div>
          </div>
        </div>

      <?php  $i++ ;  ?>
	    <?php endforeach ; ?>

      </div>
    </div>
   

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
