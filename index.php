<?php
session_start();

require("koneksi.php");
$data = tampil1("select * from profil_perusahaan where patner=1");
?>
<!doctype html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- link google font -->
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <!-- aos library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Magang</title>
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
                        if ($_SESSION["tipe"] == "siswa") {
                            echo "Hi," . $nama[0];
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
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" data-aos="zoom-in-up" data-aos-duration="800">Temukan industri <span>impian</span> <br> untuk <span>karir</span> dimasa depan</h1>
            <a href="create.php" class="btn tombol text-white" data-aos="zoom-in-up" data-aos-duration="1000">Bergabunglah dengan kami</a>
        </div>
    </div>
    <!-- akhir jumbotron -->
    <!-- Container -->
    <div class="container">
        <!-- info panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel" data-aos="fade-up" data-aos-duration="800" data-aos-delay="10">
                <div class="row">
                    <!-- info panel 1 -->
                    <div class="col-lg">
                        <img src="img/information (2).png" alt="employee" class="float-left image-info-panel">
                        <h4>Mulai Bergabung</h4>
                       
                    </div>
                    <!-- info panel 2 -->
                    <div class="col-lg">
                        <img src="img/information (1).png" alt="hires" class="float-left image-info-panel">
                        <h4>Lengkapi Profil</h4>
                        
                    </div>
                    <!-- info panel 3 -->
                    <div class="col-lg">
                        <img src="img/information (3).png" alt="security" class="float-left image-info-panel">
                        <h4>Perbanyak karya</h4>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir info panel -->

        <!-- rekomendasi -->
        <div class="row rekomendasi-user justify-content-center">
            <div class="col-lg-5 box-siswa" data-aos="fade-right" data-aos-duration="1000" data-aos-offset="150" data-aos-delay="100">
                <div class="img-icon" style="background-image:url('img/siswa.png');"></div>
                <p class="slogan">Temukan Tawaran Pekerjaan Terbaik dari berbagai macam perusahaan</p>
                <a href="lowongan.php">
                    <button class="btn-slogan box-shadow">Kunjungi</button>
                </a>
            </div>
            <div class="col-lg-5 box-perusahaan" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="150" data-aos-delay="100">
                <div class="img-icon" style="background-image:url('img/perusahaan.png');"></div>
                <p class="slogan">Temukan berbagai macam pelamar dengan menerbitkan lowongan</p>
                <a href="tambah-lowongan.php">
                    <button class="btn-slogan box-shadow">Kunjungi</button>
                </a>
            </div>
        </div>
        <!-- akhir rekomendasi -->
    </div>
    <!-- akhir container -->
    <!-- patner terbaik -->
    <div class="container cont-patner">
        <div class="row patner-terbaik">
            <div class="col">
                <h1 class="judul-patner" data-aos="fade-up" data-aos-duration="800">Patner Terbaik Kami</h1>
            </div>
        </div>

        <div class="row patner-terbaik1 justify-content-center">

            <!-- box patner -->
            <?php foreach ($data as $nilai) : ?>
                <div class="col-lg-3 box-patner" data-aos="fade-up" data-aos-duration="1000"data-aos-anchor-placement="top-bottom" data-aos-offset="100">
                    <div class="img-patner" style="background-image: url('img/profil/perusahaan/<?= $nilai['foto']; ?>')"></div>
                    <p class="nama-patner"><?= $nilai["nama"]; ?></p>
                    <a href="lihat-profil-perusahaan.php?id=<?= $nilai['id']; ?>">
                        <button class="btn btn-patner btn-primary">Kunjungi Profil</button>
                    </a>
                </div>
            <?php endforeach; ?>
            <!-- akhir box patner -->

        </div>
    </div>
    </div>
    </div>
    <!-- akhir patner terbaik -->
    
    <!-- footer -->
    <footer class="footer" >
                <p>Copyright All reserved Magang 2020</p>
    </footer>
    <!-- akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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
