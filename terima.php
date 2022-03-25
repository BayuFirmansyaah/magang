<?php
session_start();
require("koneksi.php");

if (!isset($_GET["id"]) && !isset($_GET["no"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$no = $_GET['no'];
$id_user = $_SESSION['id'];

if ($id_user !== $id) {
    header("Location: index.php");
    exit;
}


function update($no, $id_user)
{
    global $koneksi;

    $perintah = "UPDATE pengajuan SET status='DI TERIMA' WHERE no='$no' AND id_perusahaan='$id_user'";
    mysqli_query($koneksi, $perintah);

    return mysqli_affected_rows($koneksi);
}


if ($id == $id_user) {
    $cek = update($no, $id_user);
    if ($cek>0) {
        echo "<script> 
    		alert('Kami akan menginformasikan kepada pelamar bahwa mereka di terima');
    		document.location.href='detail-lamaran.php?no=$no';
    	</script>";
    } else {
        echo "<script> 
    		alert('Pelamar Telah Diterima');
    		document.location.href='detail-lamaran.php?no=$no';
    	</script>";
    }
}
