<?php 
session_start();;
require("koneksi.php");

if(!isset($_SESSION["id"])){
   header("Location: index.php");
  exit;
}

if($_SESSION["tipe"]=="siswa"){
   header("Location: index.php");
  exit;
}

$id = $_SESSION["id"];
$perintah2 = "SELECT * FROM lowongan WHERE id='$id' ORDER BY no DESC";
$lowongan = tampil1($perintah2);
$result = mysqli_query($koneksi,$perintah2);


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
    <link rel="stylesheet" href="css/edit-lowongan.css">
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
            <?php 

              

              if(!isset($_SESSION["id"])){
                echo "<a class='nav-item nav-link garis-bawah active' href='singin.php'>Masuk</a>";
              }else{
                $nama = explode(" ",$_SESSION["nama"]);
                echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                if($_SESSION["tipe"]=="siswa"){
                  echo "HI,".$nama[0];
                }else{
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

    <!-- karya -->
        <section class="karya">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="display-4 text-karya">Postingan Lowongan</h1>
            <div class="tr"></div>
          </div>
        </div>
        <div class="row">
         
        <?php if(mysqli_fetch_assoc($result)>=1){?>
          <?php foreach($lowongan as $low): ?>
          <!-- kotak1 -->
          <div class="col-lg-4 my-3 box">
            <div class="card" >
              <div class="card-body">
                <h5 class="card-title job"><i class="fas fa-briefcase"></i> <?= $low["kebutuhan"]; ?></h5>
                <h5 class="card-title job"><i class="fas fa-map-marker-alt"></i> <?= $low["kota"]; ?> - Indonesia</h5>
                <h5 class="card-title job"><i class="fas fa-calendar-day"></i> <?= $low["waktu"]; ?></h5>
                <a href="update-lowongan.php?no=<?= $low['no']; ?>" class="btn btn-success  btn-lihat">Perbarui</a>
                <a href="hapus-lowongan.php?no=<?= $low['no']; ?>" class="btn btn-danger  btn-lihat" onclick="return confirm('apakah anda yakin ingin menghapus');">Hapus</a>
              </div>
            </div>
          </div>
          <!-- kotak1 -->
        <?php endforeach; ?>
        <?php }?>
          

        </div>
      </section>
    <!-- akhir karya -->


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
  </html>