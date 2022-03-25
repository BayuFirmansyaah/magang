<?php
session_start();
require("koneksi.php");

if (!isset($_GET["no"])) {
    header("Location: lowongan.php");
    exit;
}
$no = $_GET["no"];
$perintah = "SELECT * FROM lowongan WHERE no='$no'";
$data = tampil($perintah);

?>
<!doctype html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- fa -->
    <script src="js/fa.js"></script>
    <!-- aos library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- mycss -->
    <link rel="stylesheet" href="css/detail-lowongan.css">
    <title>Detail Lowongan</title>
  </head>
  <body >
    
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
    <!-- detail data -->
    <div class="container wrap" data-aos="fade-down" data-aos-duration="300" data-aos-easing="linear">
      <div class="row">
        <div class="col">
          <h1 class="display-4 text-detail-data">Detail Data</h1>
          <div class="tr"></div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 foto">
          <img src="img/profil/perusahaan/<?= $data['foto']; ?>" class="img-fluid img" alt="Responsive image">
        </div>
        <div class="col-lg-7 data">
          <table class="table table-borderless">
            <tbody>
              <tr class="table-row">
                <td class="nama-perusahaan"><?= $data["nama_perusahaan"]; ?></td>
              </tr>
              <tr class="table-row">
                <td class="nama-job">
                  <i class="fas fa-briefcase"></i>
                  <span><?= $data["kebutuhan"]; ?></span>
                </td>
              </tr>
              <tr class="table-row">
                <td class="nama-job">
                  <i class="fas fa-map-marked-alt"></i>
                  <span><?= $data["lokasi"]; ?> - <?=  $data["kota"];  ?></span>
                </td>
              </tr>
              <tr class="table-row">
                <td class="nama-job">
                  <i class="fas fa-laptop-code"></i>
                  <span><?= $data["jurusan"]; ?></span>
                </td>
              </tr>
              <tr class="table-row">
                <td class="nama-job">
                  <i class="fas fa-tags"></i>
                  <span>Rp <?= $data["gaji"];  ?> ,-</span>
                </td>
            
              <tr>
                <td>
                  <a href="ajukan-lowongan.php?id=<?= $data['id']; ?>&kebutuhan=<?= $data['kebutuhan'];?>&no_lowongan=<?= $data['no'];?>&foto_perusahaan=<?=$data['foto'];?>&nama_perusahaan=<?= $data['nama_perusahaan']; ?>">
                    <button class="ajukan btn-success"><span>Ajukan Lamaran</span>
                  <i class="fad fa-arrow-to-top"></i></button>
                  </a>
                  <a href="lihat-profil-perusahaan.php?id=<?= $data['id']; ?>">
                     <button class="hubungi btn-primary"><span>Kunjungi </span>
                   <i class="fad fa-sign-in "></i></button>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- akhir detail data -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    once:true;
    offest:300;
    </script>
  </body>
</html>
