<?php
session_start();
require("koneksi.php");

if (!isset($_SESSION["id"])) {
    header("Location: singin.php");
    exit;
}

if ($_SESSION["tipe"] != "admin") {
    header("Location: cek.php");
    exit;
}

$data = tampil1("SELECT * FROM lowongan ORDER BY no DESC");

if (isset($_POST["submit"])) {
    $data = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <script src="js/fa.js"></script>
    <!-- my css -->
    <link rel="stylesheet" href="css/admin1.css">

    <title>Selamat Datang Admin</title>
</head>

<body>

    <!-- sidenav -->
    <div class="side-nav">
        <ul>
            <li class="icon-menu">
                <a href="admin.php"> <i class="fas fa-home-lg-alt"></i> </a>
            </li>
            <li class="icon-menu">
                <a href="admin1.php"> <i class="fas fa-briefcase"></i> </a>
            </li>
            <li class="icon-menu">
                <a href="admin2.php"> <i class="fas fa-building"></i> </a>
            </li>
        </ul>
    </div>
    <!-- akhir sidenav -->




    <!-- pencarian akun -->
    <div class="wrap-pencarian">
        <form action="" method="post">
            <div class="box-search">
                <input type="text" class="input-search" placeholder="Pencarian Data Lowongan" name="keyword">
                <button class="btn-search box-shadow" type="submit" name="submit">Go</button>
            </div>
        </form>
        <table class="table table-bordered show">
            <thead class="bg-thead">
                <tr>
                    <td scope="col">No</td>
                    <td scope="col">nama perusahaan</td>
                    <td scope="col">kebutuhan</td>
                    <td scope="col">lokasi</td>
                    <td scope="col">waktu</td>
                    <td scope="col">Gaji</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $nilai) :
                    ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="text-left"> <?= $nilai["nama_perusahaan"]; ?> </td>
                        <td><?= $nilai["kebutuhan"]; ?></td>
                        <td><?= $nilai["kota"]; ?></td>
                        <td><?= $nilai["waktu"]; ?></td>
                        <td><?= $nilai["gaji"]; ?></td>
                        <td>
                            <a href="hapus-lowongan1.php?no=<?= $nilai['no']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini');">
                                <button class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- akhir pencarinan akun -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
