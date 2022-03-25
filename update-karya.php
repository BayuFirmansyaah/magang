<?php
session_start();
require("koneksi.php");

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

$no = $_GET['no'];
$perintah = "SELECT * FROM karya_siswa WHERE no='$no'";

$nilai = tampil($perintah);

if (isset($_POST["submit"])) {
    $cek = updateKarya($_POST, $no);
    if ($cek>0) {
        echo "<script> alert('Data berhasil diperbarui');document.location.href='profil.php'</script>";
        exit;
    }
} else {
    echo mysqli_error($koneksi);
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
    <link rel="stylesheet" href="css/update-karya.css">
    <title>Biodata</title>
  </head>
  <body>
    
      <form action="" method="post" enctype="multipart/form-data">
        <h1 class="display-4 text-biodata">Perbarui Karya</h1>
        <div class="inputBox box1">
          <input type="text"  name="judul"  required="" value="<?= $nilai['judul'];?>">
          <label for="">Judul Karya</label>
        </div>
        <div class="inputBox boxLast">
          <input type="text"  name="link"  required="" value="<?= $nilai['link'];?>">
          <label for="">Link Karya</label>
        </div>
        <input type="hidden" name="gambarLama" value="<?= $nilai['foto']; ?>">
        <label for="" class="text-profil">Foto Label Karya :</label><br>
        <img src="img/profil/siswa/<?= $nilai['foto']; ?>" alt="" class="thumbnail">
        <input type="file" name="gambar" class="foto input-file" ><br>
        <p class="pesan-info">*Max Ukuran 1MB</p>        
        <button class="btn btn-primary" type="submit" name="submit">Menambahkan <Karya></Karya></button>
      </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
