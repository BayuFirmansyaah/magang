<?php 
session_start();

$tipe = $_SESSION["tipe"];


if($tipe == "siswa"){
	header("Location: profil.php");
}else if($tipe=="perusahaan"){
	header("Location: profilIndustri.php");
}else{
	header("Location: admin.php");
}

 ?>