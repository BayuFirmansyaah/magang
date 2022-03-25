<?php 
require("koneksi.php");

$id = $_GET["id"];
$tipe = $_GET["tipe"];

if($tipe=="siswa"){
    $cek = hapus_untuk_siswa($id);
    if($cek>0){
        echo "<script> alert('Akun Berhasil Dihapus');
                document.location.href='admin.php';
        </script>";
    }else{
        echo "<script> alert('Akun Berhasil Dihapus');
                document.location.href='admin.php';
        </script>";
    }
}else{
    $cek = hapus_untuk_perusahaan($id);
    if($cek>0){
        echo "<script> alert('Akun Berhasil Dihapus');
                document.location.href='admin.php';
        </script>";
    }else{
        echo "<script> alert('Akun Berhasil Dihapus');
                document.location.href='admin.php';
        </script>";
    }
}

?>