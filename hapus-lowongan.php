<?php
session_start();
require("koneksi.php");

$no = $_GET["no"];
if (!isset($_SESSION["id"])) {
    header("Location: cek.php");
    exit;
}

$id = $_SESSION["id"];
if ($_GET["id"] != $id) {
    echo "<script> alert('Anda Tidak Dapat Menhapus Lowongan ini');
	document.location.href='cek.php';</script>";
    exit;
}



$cek = hapus_pengajuan2($no);
$cek1 = hapus_lowongan1($no);

if ($cek && $cek >0) {
    echo "<script> alert('postingan berhasil dihapus');
	document.location.href='profilIndustri.php';</script>";
    exit;
} else {
    echo "<script> alert('postingan berhasil DIHAPUS');
	document.location.href='profilIndustri.php';</script>";
    exit;
}
