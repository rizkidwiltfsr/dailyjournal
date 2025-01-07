<?php
session_start();  // Memulai session atau melanjutkan session yang sudah ada

// Menghubungkan ke database
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['password']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
  <section id="index.html" class="text-center p-5 bg-dark text-white justify-content-center ">
    <div class="d-md-flex flex-md-row-reverse align-items-center p-5">
      <div class="container " style="height: 600px;">
        <div class=" justify-content-center align-items-center" style="min-height: 100vh;">
          <form class="form-horizontal" action="login.php" method="post" >
          <h2 style="text-align: center"><strong>WELCOME TO MY DAILY JOURNAL</strong></h2>
          <h4 style="text-align: center"><strong>Please Log In Here!</strong></h4><br>
            <div class="form-group ">
              <label class="control-label col-sm-3 " for="nama">Nama :   </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="username">Username :</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="password">Password :</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
              </div>
            </div>
            <div class="form-group d-flex justify-content-center">
              <div class="col-sm-offset">
                <button type="submit" class="btn btn-primary ">Submit</button>
              </div>
            </div>

            <!-- Display Error Message if any -->
            <?php if (isset($_GET['error'])): ?>
                      <div class="alert alert-danger mt-3" role="alert">
                        <?php
                          if ($_GET['error'] == 'invalid_password') {
                            echo "Incorrect password!";
                          } elseif ($_GET['error'] == 'username_not_found') {
                            echo "Username not found!";
                          }
                        ?>
                      </div>
                    <?php endif; ?>
                </form>
            </div>
          </form>
        </div>
      </div>
    </div>  
  </section>
  </body>
</html>
<?php
}
?>