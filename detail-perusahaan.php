<?php 
session_start();
require("koneksi.php");

//melakukan pengecekan terhadap user yang belum login
if(!isset($_SESSION["id"])){
  header("Location: singin.php");
}

$id = $_SESSION["id"];
$perintah = "SELECT * FROM profil_perusahaan WHERE id='$id'";
$result = mysqli_query($koneksi,$perintah);

if(!mysqli_fetch_assoc($result)){
  header("Location: biodata-perusahaan.php");
  exit;
}

if($_SESSION["tipe"]!=="perusahaan"){
  header("Location: cek.php");
  exit;
}

$id = $_SESSION["id"];
$perintah = "SELECT * FROM profil_perusahaan WHERE id='$id'";
$data = tampil($perintah);
$_SESSION["nama"] = $data["nama"];
$_SESSION["foto"] = $data["foto"];


 ?>
<!doctype html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome -->
    <script src="js/fa.js"></script>
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- roboto font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- mycss -->
    <link rel="stylesheet" href="css/profil-industri.css">
    <title>Beranda Profil</title>
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
            <a class="nav-item nav-link garis-bawah active" href="#">Pesan</a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                profil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item" href="pengaturan.php">Pengaturan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Keluar</a>
              </div>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- bar foto profil -->
    <div class="background-profil">
      
    </div>
    <?php  $bg = $data["foto"]; ?>
    <div class="foto-profil" style="background-image: url('img/profil/perusahaan/<?= $bg; ?>');">
    </div>
    <!-- beranda nam -->
    <div class="garis3">
      <div class="garis2">
        <div class="name">
          <h6 class="h6 text-user-name"><?= $data["nama"]; ?></h6>
        </div>
        <div class="kota">
          <h6 class="text-loc"><i class="fas fa-map-marker-alt"></i> <?= $data["alamat"]; ?></h6>
        </div>
      </div>
      
      
      <div class="garis">
        <div class="sekolah">
          <h6 class="text-sekolah"><i class="fas fa-phone-alt"></i> <?= $data["telp"]; ?></h6>
        </div>
        <div class="jurusan">
          <h6 class="text-jurusan"><i class="fas fa-envelope"></i> <?= $data["email"]; ?></h6>
        </div>
      </div>
    </div>
    <!-- akhir bar foto profil -->
      <section class="karya">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="display-4 text-karya">Daftar Lowongan</h1>
            <div class="tr"></div>
          </div>
        </div>
        <div class="row">
         
        <?php if(mysqli_fetch_assoc($result)>=1){?>1
          <?php foreach($data_karya as $karya): ?>
          <!-- kotak1 -->
          <div class="col-lg-3">
            <div class="kotak-karya">
              <img src="img/profil/siswa/<?= $karya['foto']; ?>" alt="" class="thumbnail">
              <h1 class="judul-kotak-karya"><?= $karya["judul"]; ?></h1>
              <p class="deskripsi">Webiste Portofolio saya</p>
              <a href="<?= $karya['link']; ?>" target="blank" class="btn btn-warning">Lihat Karya</a>
            </div>
          </div>
          <!-- kotak1 -->
        <?php endforeach; ?>
        <?php }?>
          

        </div>
      </section>
    <!-- beranda Lowongan -->
    <section>
      
    </section>
    <!-- akhir beranda Lowongan -->
    <div></div>

     <!-- tambah -->
      <a href="tambah-lowongan.php">
        <div class="tambah">
          <b>Terbitkan Lowongan</b>
        </div>
      </a>
      <!-- tambah karya -->



    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>