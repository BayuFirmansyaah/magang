<?php 
session_start();;
require("koneksi.php");

$id = $_SESSION["id"];
$perintah2 = "SELECT * FROM karya_siswa WHERE id='$id' ORDER BY no DESC";
$data_karya = tampil1($perintah2);
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
    <link rel="stylesheet" href="css/edit-karya.css">
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
            <h1 class="display-4 text-karya">Karya Saya</h1>
            <div class="tr"></div>
          </div>
        </div>
        <div class="row">
         
        <?php if(mysqli_fetch_assoc($result)>=1){?>
          <?php foreach($data_karya as $karya): ?>
          <!-- kotak1 -->
          <div class="col-lg-3">
            <div class="kotak-karya">
              <img src="img/profil/siswa/<?= $karya['foto']; ?>" alt="" class="thumbnail">
              <h1 class="judul-kotak-karya"><?= $karya["judul"]; ?></h1>
              <p class="deskripsi"><i class="fas fa-clock"></i> <?= $karya["waktu"]; ?></p>
              <a href="update-karya.php?no=<?= $karya['no']; ?>"  class="btn btn-success update">Perbarui</a>
              <a href="hapus-karya.php?no=<?= $karya['no']; ?>" onclick="return confirm('apakah anda yakin ingin mengahpus postingan ini');"  class="btn btn-danger delete">Hapus</a>
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