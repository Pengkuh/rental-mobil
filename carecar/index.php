<?php
	 session_start();
	require 'function/function.php';

	if( isset($_POST["login"]) ) {

		$ussername = $_POST["ussername"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE 
			ussername = '$ussername' ");

		// cek ussername
		if( mysqli_num_rows($result) === 1 ) {

			// cek password
			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {
				// set session
				$_SESSION["login"] = true;
				
				
				header("Location: dashboard/index.php");
				exit;
			}
		}


	$error = true;

	}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
}
    
    </style>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;0,900;1,300&display=swap" rel="stylesheet" />
  </head>
  <body>



    <!-- Login -->
    <section id="masuk">
      <div class="container">
        <div class="row justify-content-around align-items-center">
          <div class="col-md-6 text-center">
            <div class="heroimg"></div>
          </div>

          <div class="col-md-4 justify-content-center" id="login bg-light">
            <p><i>program asik2 yang bakal berkembang terus</i></p>
            <form action="" method="post">
              <div class="mb-4 justify-content-center" > 
                <input type="text" name="ussername" id="ussername" class="form-control shadow-sm p-3" placeholder="Ussername" style="height: 50px ;" />
              </div>
              <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control shadow-sm p-3" placeholder="Password" style="height: 50px ;" />
              </div>
              <?php if( isset($error) ) : ?>
		            <p style="color: red; font-style: italic;">ussername / password salah</p>
            	<?php endif; ?>
              <div class="mb-3 text-center pt-3">
                <button type="submit" class="btn btn-primary" name="login" style="width:100%; height:50px;">Login</button>
              </div>
              <div class="action d-flex justify-content-between" style="font-size:.8em;">
                <a href="">Login Dengan Cara Lain?</a>
                <a href="">Lupa Password?</a>
              </div>
              <div class="sosmed mt-3">
                <a href="../ubah/ubah.php?id=<?= $row["id"] ; ?>" class="btn btn-info text-white"> Twitter</a></td>
                <a href="../hapus/hapus.php?id=<?= $row["id"] ;?>" class="btn btn-danger" onclick="return confirm('yakin?')";>Gmail</a>
                <a href="#" class="btn btn-primary">Facebook</a>
              </div>
              <div class="baru d-flex justify-content-center pt-3"><p>Baru Datang ? </p>
                <a href="registrasi/registrasi.php" class="link"> daftar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
