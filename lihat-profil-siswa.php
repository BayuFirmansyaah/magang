<?php
session_start();
require("koneksi.php");

//melakukan pengecekan terhadap user yang belum login



$id = $_GET["no"];
$perintah = "SELECT * FROM profil_siswa WHERE id='$id'";
$data = tampil($perintah);

$perintah2 = "SELECT * FROM karya_siswa WHERE id='$id' ORDER BY no DESC";
$data_karya = tampil1($perintah2);
$result = mysqli_query($koneksi, $perintah2);


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
    <link rel="stylesheet" href="css/lihat-profil-siswa.css">
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
    <?php $bg = $data["foto"]; ?>
    <div class="foto-profil" style="background-image: url('img/profil/siswa/<?= $bg; ?>');">

    </div>
    <!-- beranda nam -->
    <div class="garis3">

        <div class="garis2">
            <div class="name">
                <h6 class="h6 text-user-name"><?= $data["nama"]; ?></h6>
            </div>
            <div class="kota">
                <h6 class="text-loc"><i class="fas fa-map-marker-alt"></i> <?= $data["kota"]; ?>,Indonesia</h6>
            </div>
        </div>


        <div class="garis">
            <div class="sekolah">
                <h6 class="text-sekolah"><i class="fas fa-school"></i> <?= $data["sekolah"]; ?></h6>
            </div>
            <div class="jurusan">
                <h6 class="text-jurusan"><i class="fas fa-laptop-code"></i> <?= $data["jurusan"];?></h6>
            </div>
        </div>

    </div>
    <br>
    <!-- akhir bar foto profil -->


    <!-- beranda karya -->
    <section class="karya">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="tr"></div>
                </div>
            </div>
            <div class="row row-karya">
                <div class="row row-karya">
             <?php $waktu=0;
                if ($waktu=300) {
                    $waktu=0;
                }
                ?>
                <?php if (mysqli_fetch_assoc($result)>=1) {?>
                    <?php foreach ($data_karya as $karya) : ?>
                <!-- kotak1 -->
                <div class="col-lg-3"  data-aos="fade-up" data-aos-duration="400" data-aos-placement-anchor="center-bottom" data-aos-easing="linear" data-aos-delay="<?= $waktu; ?>">
                    <div class="kotak-karya">
                        <img src="img/profil/siswa/<?= $karya['foto']; ?>" alt="" class="thumbnail">
                        <h1 class="judul-kotak-karya"><?= $karya["judul"]; ?></h1>
                        <p class="deskripsi"><?= $karya["waktu"]; ?></p>
                        <a href="<?= $karya['link']; ?>" target="blank" class="btn btn-primary lihat">Lihat</a>
                    </div>
                </div>
                <!-- kotak1 -->
                        <?php $waktu+=100; ?>
                    <?php endforeach; ?>
                <?php }?>


            </div>
    </section>
    <!-- akhir beranda karya -->

    <div></div>

  
    <!-- tambah karya -->

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
