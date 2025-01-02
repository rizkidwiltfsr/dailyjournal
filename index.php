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
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" navbar bg-dark border-bottom border-body data-bs-theme="dark">
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
              <a class="nav-link" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
      <section id="hero" class="text-center p-5 bg-light text-sm-start">
        <div class="container p-5">
          <div class="d-md-flex flex-md-row-reverse align-items-center p-5">
              <img class="img-fluid" src="img/music.png" alt="music" width="300"> 
              <div>
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
     
    <section id="gallery" class="text-center p-5 bg-light">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://cdn.rri.co.id/berita/1/images/1693211258996-IMG-20230828-WA0002/1693211258996-IMG-20230828-WA0002.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://froyonion.sgp1.digitaloceanspaces.com/images/blogthumbnail/03d8121cfad021a2c3df62e20bf8e863aa4fd823.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://imgx.parapuan.co/crop/0x0:0x0/x/photo/2021/07/22/5e94f4760d708jpg-20210722013927.jpg" class="d-block w-100" alt="...">
          </div>
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

    <section id="schedule" class="text-center p-5 bg-dark"> 
      <h3 class="text-white">Jadwal Kuliah & Kegiatan Mahasiswa</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-start">  
          <div class="col p-5">
              <div class="card h-100">
                <div class="card-header bg-primary">
                    <h5 class="card-title">Senin</h5>
                  </div>
                <div class="card-body p-4">
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
                <div class="card h-100">
                  <div class="card-header bg-success">
                      <h5 class="card-title">Selasa</h5>
                    </div>
                  <div class="card-body p-4">
                      <p class="card-text">
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
                <div class="card h-100">
                  <div class="card-header bg-danger">
                      <h5 class="card-title">Rabu</h5>
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
                <div class="card h-100">
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
                <div class="card h-100">
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
                <div class="card h-100">
                  <div class="card-header bg-dark-subtle">
                      <h5 class="card-title">Sabtu</h5>
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
                <div class="card h-100">
                  <div class="card-header bg-secondary">
                      <h5 class="card-title">Minggu</h5>
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
    <section id="profile" class="text-center p-5 bg-light">
      <div class="container p-5">
        <h3><strong>Profil Mahasiswa</strong></h3>
      <div class="d-md-flex flex-md-row align-items-center p-5 justify-content">
        <img class="img-fluid" src="img/sy.jpg" alt="foto" width="300" style="border-radius: 50%;">
        <table class="table table-borderless">
          <thead>
            <tr>
              <th colspan="2" align="center">Rizki Dwi Latifasari</th>
            </tr>
            <tr>
              <td colspan="2" align="center">Mahasiswa Teknik Informatika</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-end">NIM :</td>
              <td class="text-start">A11.2023.15081</td>
            </tr>
            <tr>
              <td class="text-end">Program Studi :</td>
              <td class="text-start">Teknik Informatika</td>
            </tr>
            <tr>
              <td class="text-end">Email :</td>
              <td class="text-start">111202315081@mhs.ac.id</td>
            </tr>
            <tr>
              <td class="text-end">Telepon :</td>
              <td class="text-start">Teknik Informatika</td>
            </tr>
            <tr>
              <td class="text-end">Alamat :</td>
              <td class="text-start">Jl.Bima 1, No.65, pendrikan kidul</td>
            </tr>
          </tbody>
        </table>
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