<?php
session_start();
require("koneksi.php");

$no = $_GET["no"];
$id = $_SESSION["id"];

$perintah = "DELETE FROM karya_siswa WHERE no='$no' AND id='$id'";
mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);
if ($cek>0) {
    echo "<script> alert('postingan berhasil dihapus');
	document.location.href='profil.php';</script>";
    exit;
} else {
    echo "<script> alert('postingan Gagal!! dihapus');
	document.location.href='cek.php';</script>";
    exit;
}
