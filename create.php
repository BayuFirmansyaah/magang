<?php
session_start();
require("koneksi.php");

if (isset($_POST["submit"])) {
  //cek apakah penambahan email berhasil dilakukan
    if (regristasi($_POST)>0) {
        if ($_POST["tipe"]=="siswa") {
            echo "<script>
              alert('Akun Berhasil Dibuat');
              document.location.href='biodata-siswa.php';
              </script>";
            exit;
        } else {
            echo "<script>
              alert('Akun Berhasil Dibuat');
              document.location.href='biodata-perusahaan.php';
              </script>";
            exit;
        }
    } else {
        echo mysqli_error($koneksi);
    }
}

if (isset($_SESSION["id"])) {
    header("Location: profil.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- fa -->
    <script src="js/fa.js"></script>
    <!-- my css -->
    <link rel="stylesheet" href="css/create.css">
    <title>mendaftar</title>
  </head>
  <body>
    
    <div class="body">
      
      <!-- login -->
      <div class="kotak">
        <div class="kotak-foto">
           <p class="logo-magang">Magang</p>
        </div>
        <form action="" method="post">
          <h2 class="h2 text-center text-masuk">Buat Akun</h2>
          <div class="icon">
            <i class="fad fa-user-plus"></i>
          </div>
          <div class="inputBox box1">
            <input type="text" class="input" name="email" required="">
            <label>Email</label>
          </div>
          <div class="inputBox">
             <input type="password" class="input" id="password" name="password" required="">
            <label>Password</label>
          </div>
           <div class="inputBox">
             <input type="password" class="input" id="password" name="password1" required="">
            <label>Confirm Password</label>
          </div>
          <div class="inputBox1">
            <input type="radio" name="tipe" value="siswa" class="tipe">
            <label>siswa</label>
          </div>  
          <div class="inputBox1">
            <input type="radio" name="tipe" value="perusahan" class="tipe2">
            <label for="">perusahan</label>
          </div>  
          <button class="button btn-primary" name="submit" type="submit">Mendaftar</button>
          <a href="singin.php" class="link">Sudah Punya Akun?Masuk</a>
        </form>
      </div>
      <!--  akhir login -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
