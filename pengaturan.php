
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["terang"])) {
    $cookie_name = "mode";
    $cookie_value = "null";
    setcookie($cookie_name, $cookie_value, time()+(86400*365), "/");
    echo "<script>
       document.location.href='pengaturan.php';
      </script>";
}

if (isset($_POST["gelap"])) {
    $cookie_name = "mode";
    $cookie_value = "dark";
    setcookie($cookie_name, $cookie_value, time()+(86400*365), "/");
    echo "<script>
       document.location.href='pengaturan.php';
      </script>";
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
    <link rel="stylesheet" href="css/pengaturan.css">
    <!-- google -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Pengaturan</title>
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
    <!-- utama -->
    <div class="container">
      <div class="row">
        <div class="col">
          <table class="table table-borderless">
            <thead>
              <tr>
               <td class="kolom-1">
                 <form action="" method="post">
                   <button class="btn btn-terang" type="submit" name="terang">
                     <img src="img/sun.png" alt="" class="icon"> <span> </span> Mode Terang
                    </button>
                 </form>
               </td>
               <td class="kolom-2">
                 <form action="" method="post">
                   <button class="btn btn-gelap" type="submit" name="gelap">
                     <img src="img/moon.png" alt="" class="icon"> <span> </span> Mode Gelap
                   </button>
                 </form>
               </td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- akhir utama -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>
