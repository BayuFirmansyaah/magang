<?php
session_start();
require("koneksi.php");

//user belum melakuakn login
if (!isset($_SESSION["id"])) {
    header("Location: singin.php");
    exit;
}

$tipe = $_SESSION["tipe"];

if ($tipe != "siswa") {
    echo "<script> alert('anda bukan seorang siswa')
        document.location.href='lowongan.php';
  </script>";
}

if (!isset($_GET["id"])&&!isset($_GET["kebutuhan"])) {
    header("Location: lowongan.php");
    exit;
}


$id_siswa=$_SESSION["id"];
$foto = $_SESSION["foto"];
$id_perusahan = $_GET["id"];
$kebutuhan = $_GET["kebutuhan"];
$waktu = date("j-m-o");
$no_lowongan = $_GET["no_lowongan"];
$foto_perusahaan = $_GET["foto_perusahaan"];
$nama_perusahaan = $_GET["nama_perusahaan"];

if (isset($_POST["submit"])) {
    if (ajukanLamaran($_POST, $id_siswa, $foto, $id_perusahan, $kebutuhan, $waktu, $no_lowongan, $foto_perusahaan, $nama_perusahaan)>0) {
        echo "<script>
        alert('Lamaran berhasil diajukan');
        document.location.href='lowongan.php';
     </script>";
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
        <link rel="stylesheet" href="css/ajukan-lowongan.css">
        <title>Biodata</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
           <h1 class="display-4 text-lowongan">Formulir Pengajuan</h1>

           <div class="inputBox box1">
             <input required type="text" name="nama"  >
             <label for="">Nama Lengkap</label>
           </div>
           <div class="inputBox">
             <select name="kelamin" id="" class="jenkel" >
               <option value="laki-laki">Laki-Laki</option>
               <option value="perempuan">Perempuan</option>
           </select>
           </div>
           <div class="inputBox">
             <input  type="date" name="ttl"  placeholder="none">
             <label for="">Tanggal Lahir</label>
           </div>
           <div class="inputBox">
             <input required type="text" name="alamat" >
             <label for="">Alamat Rumah</label>
           </div>
            <select name="jurusan" id="" class="input ">
               <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
               <option value="Multimedia">Multimedia</option>
               <option value="Desain">Desain</option>
           </select>
           </div>
           <div class="inputBox">
             <input required type="telp" name="telp" >
             <label for="">Nomor Telepon</label>
           </div>
           <div class="inputBox">
              <input required type="email" name="email"  >
              <label for="">Alamat Email</label>
           </div>
           <div class="inputBox">
             <input required type="text" name="sekolah"  >
             <label for="">Nama Sekolah</label>
           </div>
          
           <button class="btn btn-primary" name="submit" type="submit">Kirim</button>
          
        </form>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
