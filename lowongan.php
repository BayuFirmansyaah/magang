<?php
session_start();
require("koneksi.php");

$data = tampil1("SELECT * FROM lowongan  ORDER BY no DESC");

if (isset($_POST["cari"])) {
    $data = cari($_POST["keyword"]);
}



?>
<!doctype html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="css/lowongan.css">
    <!-- font awesome -->
    <script src="js/fa.js"></script>
    <!-- google -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- aos library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Beranda Lowongan</title>
  </head>
  <body>
    
  <!--  navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Magang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link garis-bawah active" href="index.php">beranda <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link garis-bawah active" href="lowongan.php">lowongan</a>
            <?php

            

            if (!isset($_SESSION["id"])) {
                echo "<a class='nav-item nav-link garis-bawah active' href='singin.php'>Masuk</a>";
            } else {
                $nama = explode(" ", $_SESSION["nama"]);
                echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                if ($_SESSION["tipe"]=="siswa") {
                    echo "Hi,".$nama[0];
                } else {
                    echo "Lainnya";
                }
                echo "</a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='cek.php'>Profil</a>
                        <a class='dropdown-item' href='Pengaturan.php'>Pengaturan</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='logout.php'>Keluar</a>
                      </div>
                    </li>";
            }

            ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- beranda -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container bayangan">
          <form action="" method="post">
            <h1 class="text-center judul" data-aos="zoom-in-up" data-aos-duration="200" data-aos-easing="linear" data-aos-easing="linear">Temukan Berbagai Macam Lowongan</h1>
            <div class="box-search">
              <input type="text" class="input-search" placeholder="Cari Berbagai Lowongan..." autofocus="" name="keyword">
              <button name="cari" type="submit" class="cari ">Cari</button>
            </div>
          </form>
        </div>
      </div>
    <!-- beranda-->

    <!-- lowongan -->
    <div class="container lowongan">
      <div class="row">

        <?php $waktu=0;
        if ($waktu= 200) {
            $waktu=0;
        }
        ?>
        <?php foreach ($data as $nilai) : ?>
        <div class="col-lg-4">
          <div class="kotak-lowongan" data-aos="fade-up" data-aos-duration="200" data-aos-placement-anchor="center-bottom" data-aos-delay="<?= $waktu; ?>" data-aos-easing="linear">
             <img src="img/profil/perusahaan/<?= $nilai['foto'];  ?>" alt="">
            <p class="nama"><?= $nilai["nama_perusahaan"];  ?></p>
            <p class="tanggal"><?= $nilai["waktu"];  ?></p>
            <div class="clear"></div>
            <p class="kebutuhan"><i class="fas fa-briefcase"></i> <?= $nilai["kebutuhan"];  ?></p>
            <p class="kebutuhan"><i class="fas fa-user-tie"></i> <?= $nilai["jurusan"];  ?></p>
            <a href="detail-lowongan.php?no=<?= $nilai['no'];  ?>">
              <button class="lihat-detail">Lihat Rincian</button>
            </a>
          </div>
        </div>
            <?php $waktu+=100; ?>
        <?php endforeach; ?>  

      </div>
    </div>
    <!-- akhir lowongan -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- my script -->
<script src="js/main.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    once:true;
    offest:300;
    </script>
</body>
</html>
