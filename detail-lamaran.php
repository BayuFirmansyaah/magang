<?php
session_start();
require("koneksi.php");

if (!isset($_GET["no"])) {
    header("Location: lowongan.php");
    exit;
}
$no = $_GET["no"];
$perintah = "SELECT * FROM pengajuan WHERE no='$no'";
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
    <link rel="stylesheet" href="css/detail-lamaran.css">
    <title>Detail Lowongan</title>
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
                    echo "HI,".$nama[0];
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
      <div class="row  row-lamaran">
        <div class="col-lg-4 foto">
          <img src="img/profil/siswa/<?= $data['foto']; ?>" class="img-fluid img" alt="Responsive image">
        </div>
        <div class="col-lg-8 data">

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Nama </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["nama"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Jurusan </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["jurusan"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Sekolah </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["sekolah"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Alamat </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["alamat"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Telepon </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["telp"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Email </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["email"];?> </div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Melamar Bagian </div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["bagian"];?></div>
            </div>
         </div>

         <div class="data-user">
            <div class="row">
              <div class="col-3 kategori"> Status</div>
              <div class="col-1 pemisah">:</div>
              <div class="col value"><?= $data["status"];?></div>
            </div>
         </div>

         <div class="data-user" style="border:none;">
           <a href="lihat-profil-siswa.php?no=<?= $data['id_siswa'];?>">
             <span class="btn button btn-success">Kunjungi Profil</span>
           </a>

           <?php if ($_SESSION["tipe"]=="perusahaan" && isset($_SESSION["id"])) { ?>
           <a href="terima.php?id=<?= $data['id_perusahaan'];?>&no=<?= $data['no'];?>">
             <span class="btn button btn-primary">Terima Lamaran</span>
           </a>
           <a href="tolak.php?id=<?= $data['id_perusahaan'];?>&no=<?= $data['no'];?>">
             <span class="btn button btn-danger bottom">Tolak Lamaran</span>
           </a>
         </div>
           <?php } ?>

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