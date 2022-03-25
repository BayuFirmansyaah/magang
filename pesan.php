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
    <link rel="stylesheet" href="css/pesan.css">
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


    <!-- button pesan -->
    <div class="wrap-kontak">
            <div class="search">
                
            </div>

        <div class="kontak">
            <img src="img/profil/perusahaan/5f68b64fbe880.png" alt="" class="profil">
            <p class="nama-kontak">Bukalapak</p>
        </div>
    </div>
    <!-- button pesan -->

    <!-- pesan -->
    <div class="wrap-pesan">
        
    </div>
    <!-- pesan -->
   

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
