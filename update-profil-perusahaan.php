<?php
session_start();
require("koneksi.php");

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

if ($_SESSION["tipe"]=="siswa") {
    header("Location: index.php");
    exit;
}


$id = $_SESSION["id"];

$perintah = "SELECT * FROM profil_perusahaan WHERE id='$id'";
$data = tampil($perintah);

if (isset($_POST["submit"])) {
    $cek = updateProfilPerusahaan($_POST, $id);
    if ($cek>0) {
        echo "<script> alert('Profil berhasil diperbarui')
          document.location.href='profilIndustri.php';
      </script>";
        exit;
    }
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
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/update-profil.css">
    <title>Biodata</title>
  </head>
  <body>
    
    <form action="" method="post" enctype="multipart/form-data">
      <h1 class="display-4 text-biodata">Perbarui Profil</h1>
      <input type="hidden" name="gambarLama" value="<?= $data['foto']; ?>">
      <div class="inputBox box1">
        <input type="text"  name="nama"  required="" value="<?= $data['nama']; ?>">
        <label for="">Nama Perusahaan</label>
      </div>
      <div class="inputBox">
         <input type="text"  name="alamat"  required="" value="<?= $data['alamat']; ?>">
         <label for="">Alamat Perusahaan</label>
      </div>
      <div class="inputBox">
        <input type="text"  name="telp"  required="" value="<?= $data['telp']; ?>">
        <label for="">Nomor Telepon Perusahaan</label>
      </div>
      <div class="inputBox boxLast">
        <input type="text"  name="email"  required="" value="<?= $data['email']; ?>">
        <label for="">Alamat Email Perusahaan</label>
      </div>
      <label for="" class="text-profil">Pilih Foto Profil :</label><br>
      <img src="img/profil/perusahaan/<?= $data['foto']; ?>" alt="" class="thumb">
      <input type="file" name="gambar" class="foto"><br>
      <p class="pesan-info">*Max Ukuran 1MB</p>
      <button class="btn btn-primary" type="submit" name="submit">Perbarui</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
