<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webdailyjournal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="login.php">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" navbar bg-dark border-bottom border-body data-bs-theme="light">
      <div class="container-fluid">
        <a class="navbar-brand">My Daily Journal</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#article">Article</a>
              <a class="nav-link" href="#gallery">Gallery</a>
              <a class="nav-link" href="#schedule">Schedule</a>
              <a class="nav-link" href="#profile">Profile</a>
              <a class="nav-link" href="logout.php">Login</a>
            </div>
          </div>
        </div>
      </nav>
      <section id="hero" class="text-center bg-dark text-sm-start">
        <div class="container">
          <div class="d-md-flex flex-md-row-reverse align-items-center">
            <div style="flex-grow: 1; margin-right: 1px">
              <img class="img-fluid" src="img/music.png" alt="music" style="width: 100%; height: 600px; object-fit: cover;">
            </div>
            <div style="color: white;">
              <h1 class="fw-bold display-4">Hey there, friend! Welcome!</h1>
              <h4 class="lead display-6">Let see my fav playlist disini anda akan menemukan sebuah playlist yang akan membuat kamu bersemangat</h4>
            </div>
          </div>
        </div>
      </section>

      <!-- article begin -->
    <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql); 

          $no = 1;
          while($row = $hasil->fetch_assoc()){
          ?>
            <div class="col">
              <div class="card h-100">
                <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?= $row["judul"]?></h5>
                  <p class="card-text">
                    <?= $row["isi"]?>
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">
                    <?= $row["tanggal"]?>
                  </small>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- article end -->
     
    <!-- Gallery begin -->
    <section id="gallery" class="text-center p-5 bg-black">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <?php
          include "koneksi.php";

          $sql = "SELECT * FROM gallery";
          $hasil = $conn->query($sql);

          $active = true; 
          while($row = $hasil->fetch_assoc()){
            if ($row["gallery"] != '' && file_exists('img/' . $row["gallery"])) {
          ?>
            <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <img src="img/<?= $row["gallery"]?>" class="d-block w-100" alt="<?= $row["judul"]?>">
            </div>
          <?php
              $active = false;
            }
          }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- Gallery end -->

    <section id="schedule" class="text-center p-5 bg-light"> 
      <h3 class="text-dark">Jadwal Kuliah & Kegiatan Mahasiswa</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-start">  
          <div class="col p-5">
              <div class="card h-100" style="border: 2px color : dark;">
                <div class="card-header bg-dark">
                    <h5 class="card-title" style="color: white;">Senin</h5>
                  </div>
                <div class="card-body p-4" style="color: dark;">
                    <p class="card-text">
                        <strong>09.00 - 10.30</strong><br>
                        Basis Data
                        Ruang H.3.4<br> 
                        <br>
                        <strong>13.00-15.00</strong><br>
                        Dasar Pemrograman<br> 
                        Ruang H.3.1
                    </p>
                </div>
              </div>
            </div>
            <div class="col p-5">
                <div class="card h-100" style="border: 2px solid #191970;">
                  <div class="card-header" style="background-color: #191970;">
                      <h5 class="card-title" style="color: white;">Selasa</h5>
                    </div>
                  <div class="card-body p-4">
                      <p class="card-text" style="color: dark;">
                        <strong>08.00 - 09.30</strong><br>
                        Pemrograman Berbasis Web
                        Ruang D.2.J<br> 
                        <br>
                        <strong>14.00-16.00</strong><br>
                        Basis Data<br> 
                        Ruang D.3.M
                      </p>
                  </div>
                </div>
            </div>
              <div class="col p-5" >
                <div class="card h-100" style="border: 2px solid #2F4F4F;">
                  <div class="card-header" style="background-color: #2F4F4F">
                      <h5 class="card-title" style="color: white;">Rabu</h5>
                    </div>
                  <div class="card-body p-5">
                      <p class="card-text">
                        <strong>10.00 - 12.00</strong><br>
                        Pemrograman Berbasis Objek
                        Ruang D.2.A<br> 
                        <br>
                        <strong>13.30 - 15.00</strong><br>
                        Pemrograman Sisi Server
                        Ruang D.2.A
                      </p>
                  </div>
                </div>
              </div>
              <div class="col p-5">
                <div class="card h-100" style="border: 2px solid #2F4F4F;">
                  <div class="card-header bg-warning">
                      <h5 class="card-title">Kamis</h5>
                    </div>
                  <div class="card-body p-4">
                      <p class="card-text">
                        <strong>08.00 - 10.00</strong><br>
                        Pengantar Teknologi informasi
                        Ruang D.3.N<br> 
                        <br>
                        <strong>11.00-13.00</strong><br>
                        Rapat Koordinasi DOSCOM<br> 
                        Ruang Rapat G.1 
                      </p>
                  </div>
                </div>
              </div>
              <div class="col p-5">
                <div class="card h-100" style="border: 2px solid #2F4F4F;">
                  <div class="card-header bg-info">
                      <h5 class="card-title">Jumat</h5>
                    </div>
                  <div class="card-body p-4">
                      <p class="card-text">
                        <strong>09.00 - 11.00</strong><br>
                        Data Mining<br>
                        Ruang G.2.3<br> 
                        <br>
                        <strong>13.00-15.00</strong><br>
                        Information Retrieval<br> 
                        Ruang G.2.4
                      </p>
                  </div>
                </div>
              </div>
              <div class="col p-5">
                <div class="card h-100" style="border: 2px solid #8B0000;">
                  <div class="card-header" style="background-color: #8B0000">
                      <h5 class="card-title" style="color: white;">Sabtu</h5>
                    </div>
                  <div class="card-body p-5">
                      <p class="card-text ">
                        <strong>08.10 - 23.00</strong><br>
                        Bimbingan Karier Online<br>
                        <strong>10.30-12.00</strong><br>
                        Bimbingan Karier Online<br> 
                      </p>
                  </div>
                </div>
              </div>
              <div class="col p-5">
                <div class="card h-100" style="border: 2px color : grey;">
                  <div class="card-header bg-secondary">
                      <h5 class="card-title" style="color: white;">Minggu</h5>
                    </div>
                  <div class="card-body p-5">
                      <p class="card-text">
                        <strong>Tidak Ada Jadwal</strong><br>
                      </p>
                  </div>
                </div>
              </div>
        </div>
    </section>
    <section id="profile" class="text-center p-5 bg-black text-sm-start">
      <div class="container p-3">
        <div class="d-md-flex flex-md-row-reverse align-items-center">
        <div style="flex-grow: 1; margin-right: 1px">
        <img class="img-fluid" src="img/sy.png" alt="foto" style="width: 100%; height: 600px; object-fit: cover;">
        </div>
          <div style="margin-left: 20px;">
            <h1 class="fw-bold display-4" style="color: white;">My Name is Rizki Dwi Latifasari</h1>
            <h5 class="lead display-7" style="color: grey;">NIM : A11.2023.15081</h5>
            <h5 class="lead display-7" style="color: grey;">Program Studi : Teknik Informatika</h5>
            <h5 class="lead display-7" style="color: grey;">Email: 111202315081@mhs.dinus.ac.id</h5>
            <h5 class="lead display-7" style="color: grey;">Telepon: +6288-200-759-8677</h5>          
          </div>
          </div>
        </div>
      </div>
    </section>


    <footer class="justify-content-center bg-dark align-item-center text-center p-2">
      <div>
        <a href="https://www.instagram.com/rzkdwi._?igsh=MXpmMzAzeWk1N2gx">
          <i class="bi bi-instagram h4 p-2 text-light"></i>
        </a>
        <a href="https://x.com/rizkidwilaa?t=u0EAwNwT1K1NEXeQkBLGzw&s=09">
          <i class="bi bi-twitter-x h4 p-2 text-light"></i>
        </a>
        <a href="https://wa.me/qr/BQBKZTMPXLXZF1 ">
          <i class="bi bi-whatsapp h4 p-2 text-light"></i>
        </a>
      </div>
      <div class="text-center-p-5 text-light"> 
        Rizki Latifasari &copy; 2024
      </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
  </body>
</html>