<?php 

	require '../function/function.php';

	if( isset($_POST["register"]) ) {
		if( registrasi($_POST) > 0 ) {
		echo "<script>
					alert('user baru berhasil di tambahkan!');
				</script>";
		} else {
			echo mysqli_error($conn);
		}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <style>
            body {
        background-color: #f8f9fa;;
        font-family: 'verdana', sans-serif;
        box-sizing: border-box;
        margin: 0px;
        font-size:14px;
    }
    section{
        padding-top: 100px;
        width: 90%;
        margin: auto;
    }

    </style>
  </head>
  <body>

    <section id="daftar">
        <div class="container">

            <div class="row justify-content-around align-items-center text-center">
                <div class="col-10 mb-5">
                    Daftar untuk bisa mengakses <br>
                    nanti di sini juga bakal di taro logo
                </div>
            </div>

          <div class="row justify-content-around align-items-center">
            <div class="col-md-4 justify-content-center" id="login">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="ussername" class="form-label">Ussername</label>
                  <input type="text" name="ussername" id="ussername" class="form-control shadow-sm" />
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control shadow-sm" />
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password2" name="password2" id="password2" class="form-control shadow-sm" />
                  </div>
                <div class="mb-3">
                  <a href="registrasi/registrasi.php" class="btn btn-success">Daftar</a></td>
                </div>
              </form>
            </div>
          </div>

        </div>
      </section>

  </body>
</html>
