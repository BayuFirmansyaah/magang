<?php
session_start();
require("koneksi.php");

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
    if (tambahBiodataSiswa($_POST, $id)>0) {
        echo "<script> alert('Data Profil Berhasil Ditambahkan')
                  document.location.href='singin.php';
        </script>";
        exit;
    } else {
        echo mysqli_error($koneksi);
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/biodata.css">
    <title>Biodata</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="display-4 text-biodata">Profil Siswa</h1>
        <div class="inputBox box1">
            <input type="text"  name="nama"  required="">
            <label for="">Nama Lengkap</label>
        </div>
        <div class="inputBox">
            <input type="text"  name="kota"  required="">
            <label for="">Asal Kota</label>
        </div>
        <div class="inputBox box3">
            <input type="text"  name="sekolah"  required="">
            <label for="">Asal Sekolah</label>
        </div>
        <select name="jurusan" id="" class="input" required="">
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Multimedia">Multimedia</option>
            <option value="Desain">Desain</option>
        </select>
        <label for="" class="text-profil">Pilih Foto Profil :</label><br>
        <input type="file" name="gambar" class="foto" required=""><br>
        <p class="pesan-info">*Max Ukuran 1MB</p>
        <button class="btn" type="submit" name="submit">Lanjutkan</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
