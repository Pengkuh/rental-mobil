<?php 

// koneksi ke database
require '../function/function.php';

// ambil data dari url
$id = $_GET["id"];

// query data 
$ekn = query("SELECT * FROM ekonomi WHERE id=$id")[0];

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order List Car</title>
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VXjrPsLTRbtF1lsz5SZGYpHk3-ymy8N9" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;0,900;1,300&display=swap" rel="stylesheet" />

    <script type="text/javascript">
        function order() {
            const orderClick = document.getElementById("order");
            orderClick.style.display="block";

        }
        function cancel() {
            const cancelClick = document.getElementById("cancel");
            cancelClick.style.display="none";
        }
    </script>
    <style>
      body {
        background-color: #f8f9fa;
        font-family: 'verdana', sans-serif;
        box-sizing: border-box;
        margin: 0px;
        font-size: 14px;
      }

      #order{
            display:none;
        }

      html {
      scroll-behavior: smooth;
      }

      .list_mobil {
        margin: auto;
        
        box-sizing: border-box;
        padding-bottom: 5px;
      }

      .card {
        border-radius: 10px;
        max-width: 800px;
        margin: auto;
      }

      .harga {
        color: #dc3545;
        font-size: 1.3em;
      }

      h3 {
        width: 90%;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 20px;
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

        <div class="item shadow-sm">
          <div class="card rounded-3">
            <img src="img/<?= $ekn["gambar"] ; ?>" width="100%" />
            <div class="card-body">
            
              <table border="0px" width="80%" cellpadding="5" cellspacing="5" align="center">
  
              <tr>
                  <td width="55%"> <h5 class="card-title"><?= $ekn["nama"] ; ?></h5>  </td>
              </tr>
              <tr>
                  <td width="10%">Nama</td>
                  <td width="55%"><?= $ekn["nama"] ; ?></td>
                </tr>
                <tr>
                  <td width="10%">Kode</td>
                  <td>
                  <?= $ekn["kode"] ; ?>
                  </td>
                </tr>
                <tr>
                  <td width="10%">Spesifikasi</td>
                  <td width="55%">
                    <p>Ram 2gb Intel core 5</p>
                  </td>
                </tr>
          
                <tr>
                  <td>Harga</td>
                  <td class="harga">Rp.<?= $ekn["harga"] ; ?>.00</td>
              </table>
              <tr>
                  <div class="tombol text-center mt-2">
                    <div class="order mt-2">
                    <a href="" onclick="order()"  class="btn btn-primary" style="width:80%">More</a>
                  </div></div>
            </div>
          </div>
        </div>

        <!-- order -->
        <div id="order">
        <form action="finish.php" method="post">
          <ul>
            <input type="hidden" name="id" value="<?= $ekn["id"] ?>">
            <li>
              <input type="text" name="kode" placeholder="kode" required id="kode" value="<?= $ekn["kode"] ; ?>">
            </li>
            <li>
              <input type="text" name="nama" placeholder="nama" required id="nama" value="<?= $ekn["nama"] ; ?>">
            </li>
            <li>
              <input type="hidden" name="harga" placeholder="harga" required id="harga" value="<?= $ekn["harga"] ; ?>">
            </li>
            <li>
              <input type="text" name="hari" placeholder="Jumlah hari" required id="hari" value="">
            </li>
                  <li>
              <input type="text" name="alamat" placeholder="alamat mu" required id="hari" value="">
            </li>
            <li>
              <button type="submit" name="submit">order</button>
            </li>
                  <li>
              <button name="cancel" onclick="cancel">cancel</button>
            </li>
          </ul>
        </form>
        </div>


      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
