<?php 
require("koneksi.php");

$no = $_GET["no"];

$cek = hapus_lowongan1($no);

if($cek>0){
	echo "<script> alert('postingan berhasil dihapus');
	document.location.href='admin1.php';</script>";
	exit;
}

 ?>