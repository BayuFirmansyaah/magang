<?php
   session_start();
   require("koneksi.php");
   
   //melakukan pengecekan terhadap user yang belum login
if (!isset($_SESSION["id"])) {
    header("Location: singin.php");
}
   
if ($_SESSION["tipe"]=="siswa") {
    header("Location: index.php");
    exit;
}
   
   $id = $_SESSION["id"];
   $perintah = "SELECT * FROM profil_perusahaan WHERE id='$id'";
   $perintah2 = "SELECT * FROM lowongan WHERE id='$id' ORDER BY no DESC";
   $data = tampil($perintah);
   $lowongan = tampil1($perintah2);
   $_SESSION["nama"] = $data["nama"];
   $_SESSION["foto"] = $data["foto"];
   
   $perintah3 = "SELECT * FROM pengajuan WHERE id_perusahaan='$id' AND status!='DI TOLAK' ORDER BY no DESC";
   $hasil = tampil1($perintah3);
   
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
      <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
      <!-- aos library -->
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
      <br>
      <div class="box-edit-profil">
         <a href="update-profil-perusahaan.php" class="text-edit-profil">Edit Profil <i class="fas fa-pencil-alt"></i></a>
      </div>
      <!-- akhir bar foto profil -->
      <section class="karya">
         <div class="container">
         <div class="row">
            <div class="col">
               <div class="button-karya">
                  <div class="datas-karya">
                     <a href="profilindustri.php?data=lowongan"><button class="button-show-karya">Lowongan</button></a>
                  </div>
                  <div class="datas-pengajuan">
                     <a href="profilindustri.php?data=pengajuan"><button class="button-show-karya border-left-none">Pengajuan</button></a>
                  </div>
               </div>
               <div class="tr"></div>
            </div>
         </div>
         <div class="row row-lowongan" id="box-lowongan">
            <?php $waktu=0;
            if ($waktu=200) {
                $waktu=0;
            }
            ?>
            <?php if (@$_GET['data']=="lowongan") { ?>
                <?php foreach ($lowongan as $low) : ?>
            <div class="col-lg-4 my-3 box" data-aos="fade-up" data-aos-duration="300" data-aos-placement-anchor="center-bottom" data-aos-delay="<?= $waktu; ?>">
               <div class="card" >
                  <div class="card-body">
                     <a class="nav-link btn-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-h btn-warna"></i>
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="update-lowongan.php?no=<?= $low['no']; ?>">Edit Postingan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="hapus-lowongan.php?no=<?= $low['no'];?>&id=<?= $low['id'];?>" onclick="return confirm('apakah anda yakin ingin mengahpus postingan ini');">Hapus Postingan</a>
                     </div>
                     <h5 class="card-title job kebutuhan"><i class="fas fa-briefcase"></i> <?= $low["kebutuhan"]; ?></h5>
                     <h5 class="card-title job"><i class="fas fa-map-marker-alt"></i> <?= $low["kota"]; ?> - Indonesia</h5>
                     <h5 class="card-title job"><i class="fas fa-calendar-day"></i> <?= $low["waktu"]; ?></h5>
                     <a href="detail-lowongan.php?no=<?= $low['no']; ?>" class="btn btn-primary  btn-lihat">Lihat Detail</a>
                  </div>
               </div>
            </div>
                    <?php $waktu+=100; ?>
                <?php endforeach; ?>
            <?php } elseif (@$_GET['data']=="pengajuan") { ?>
                <?php foreach ($hasil as $nilai) : ?>
            <div class="col-lg-4">
               <div class="kotak-lowongan" data-aos="fade-up" data-aos-duration="300" data-aos-delay="<?= $waktu; ?>" data-aos-placement-anchor="center-bottom">
                  <p class="text-nama-info"><i class="fas fa-user"></i>
                     <span> <?= $nilai["nama"]; ?>
                  </p>
                  </span>
                  <p class="text-nama-info"> <i class="fas fa-laptop-code"></i>
                     <span><?= $nilai["jurusan"]; ?>
                  </p>
                  </span>
                  <div class="text-nama-info"> <i class="fas fa-briefcase"></i>
                     <span><?= $nilai["bagian"]; ?></span>
                  </div>
                  <div class="text-nama-info"> <i class="fas fa-calendar-day"></i>
                     <span><?= $nilai["waktu"]; ?></span>
                  </div>
                  <p class="kebutuhan"></p>
                  <a href="detail-lamaran.php?no=<?= $nilai['no']; ?>">
                  <button class="lihat-detail btn-primary">Lihat Rincian Lamaran</button>
                  </a>
               </div>
            </div>
                    <?php $waktu+=100; ?>
                <?php endforeach; ?>
            <?php } else {?>
                <?php foreach ($lowongan as $low) : ?>
            <div class="col-lg-4 my-3 box" data-aos="fade-up" data-aos-duration="300" data-aos-placement-anchor="center-bottom" data-aos-delay="<?= $waktu; ?>">
               <div class="card" >
                  <div class="card-body">
                     <a class="nav-link btn-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-h btn-warna"></i>
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="update-lowongan.php?no=<?= $low['no']; ?>">Edit Postingan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="hapus-lowongan.php?no=<?= $low['no'];?>&id=<?= $low['id'];?>" onclick="return confirm('apakah anda yakin ingin mengahpus postingan ini');">Hapus Postingan</a>
                     </div>
                     <h5 class="card-title job kebutuhan"><i class="fas fa-briefcase"></i> <?= $low["kebutuhan"]; ?></h5>
                     <h5 class="card-title job"><i class="fas fa-map-marker-alt"></i> <?= $low["kota"]; ?> - Indonesia</h5>
                     <h5 class="card-title job"><i class="fas fa-calendar-day"></i> <?= $low["waktu"]; ?></h5>
                     <a href="detail-lowongan.php?no=<?= $low['no']; ?>" class="btn btn-primary  btn-lihat">Lihat Detail</a>
                  </div>
               </div>
            </div>
                    <?php $waktu+=100; ?>
                <?php endforeach; ?>
            <?php } ?>
         </div>
      </section>
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
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
         AOS.init();
      </script>
   </body>
</html>