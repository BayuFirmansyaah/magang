<?php $koneksi=mysqli_connect("localhost", "root", "", "magang");
function regristasi($data)
{
    global $koneksi;
    $email=htmlspecialchars($data["email"]);
    $password=htmlspecialchars($data["password"]);
    $password1=htmlspecialchars($data["password1"]);
    $tipe=htmlspecialchars($data["tipe"]);
    $result=mysqli_query($koneksi, "SELECT email FROM akun WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('email sudah terdaftar');</script>";
        return false;
    }if ($password===$password1) {
        $pass=md5("qw3rt77".md5($password));
        $perintah="INSERT INTO akun VALUES('','$email','$pass','user','$tipe')";
        mysqli_query($koneksi, $perintah);
        $perintah2="SELECT * FROM akun WHERE email='$email'";
        $query=mysqli_query($koneksi, $perintah2);
        $data=mysqli_fetch_assoc($query);
        $_SESSION["id"]=htmlspecialchars($data["id"]);
        $_SESSION["level"]=htmlspecialchars($data["level"]);
        $_SESSION["tipe"]=htmlspecialchars($data["tipe"]);
        $_SESSION["email"]=htmlspecialchars($data["email"]);
        return mysqli_affected_rows($koneksi);
    } else {
        echo "<script> alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }
}function login($data)
{
    global $koneksi;
    $email=htmlspecialchars($data["email"]);
    $password=htmlspecialchars($data["password"]);
    $result=mysqli_query($koneksi, "SELECT * FROM akun WHERE email='$email'");
    if (mysqli_num_rows($result)===1) {
        $pass=md5("qw3rt77".md5($password));
        $row=mysqli_fetch_assoc($result);
        if ($pass===$row["password"]) {
            $_SESSION["level"]=$row["level"];
            $_SESSION["tipe"]=$row["tipe"];
            $_SESSION["id"]=$row["id"];
            $_SESSION["email"]=$row["email"];
            if ($row["tipe"]=="siswa") {
                $id=$row["id"];
                $query=mysqli_query($koneksi, "SELECT * FROM profil_siswa WHERE id='$id'");
                $hasil=mysqli_fetch_assoc($query);
                $_SESSION["nama"]=$hasil["nama"];
                $_SESSION["foto"]=$hasil["foto"];
                header("Location: cek.php");
                exit;
            } else {
                header("Location: cek.php");
                exit;
            }
        } else {
            echo "<script> alert('Password yang anda masukan salah');</script>";
            return false;
        }
    } else {
        echo "<script> alert('Email Belum Terdaftar');</script>";
        return false;
    }
}function tampil($perintah)
{
    global $koneksi;
    $query=mysqli_query($koneksi, $perintah);
    $hasil=mysqli_fetch_assoc($query);
    return $hasil;
}function tampil1($perintah)
{
    global $koneksi;
    $query=mysqli_query($koneksi, $perintah);
    $data=[];
    while ($hasil=mysqli_fetch_assoc($query)) {
        $data[]=$hasil;
    }return $data;
}function cari($keyword)
{
    global $koneksi;$perintah="SELECT * FROM lowongan WHERE
                    nama_perusahaan LIKE '%$keyword%' OR
                    kebutuhan LIKE '%$keyword%' OR
                    kota LIKE '%$keyword%' OR
                    waktu LIKE '%$keyword%'
                ";
    return tampil1($perintah);
}function cari1($keyword)
{
    global $koneksi;$perintah="SELECT * FROM akun WHERE
                    email LIKE '%$keyword%' OR
                    tipe LIKE '%$keyword%'";
    return tampil1($perintah);
}function cari2($keyword)
{
    global $koneksi;$perintah="SELECT * FROM profil_perusahaan WHERE
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'";
    return tampil1($perintah);
}function tambahBiodataSiswa($data, $id)
{
    global $koneksi;
    $id=$id;
    $nama=htmlspecialchars($data["nama"]);
    $kota=htmlspecialchars($data["kota"]);
    $sekolah=htmlspecialchars($data["sekolah"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambar=upload();$perintah="INSERT INTO profil_siswa VALUES(
                '$id','$nama','$kota','$sekolah','$jurusan','$gambar')";
    mysqli_query($koneksi, $perintah);
    $_SESSION["tipe"]="siswa";
    $_SESSION["nama"]=$nama;
    $_SESSION["id"]=$id;
    $_SESSION["foto"]=$gambar;
    return mysqli_affected_rows($koneksi);
}function tambahBiodataPerusahaan($data, $id)
{
    global $koneksi;
    $id=$id;
    $nama=htmlspecialchars($data["nama"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $telp=htmlspecialchars($data["telp"]);
    $email=htmlspecialchars($data["email"]);
    $gambar=upload1();$perintah="INSERT INTO profil_perusahaan VALUES(
                '$id','$nama','$alamat','$telp','$email','$gambar','0')";
    mysqli_query($koneksi, $perintah);
    $_SESSION["tipe"]="perusahaan";
    return mysqli_affected_rows($koneksi);
}function tambahKarya($data, $id, $waktu)
{
    global $koneksi;
    $id=$id;
    $judul=$data["judul"];
    $link=$data["link"];
    $gambar=upload();
    $perintah="INSERT INTO karya_siswa VALUES('','$id','$judul','$link','$gambar','$waktu')";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function tambahLowongan($data, $id, $waktu, $nama, $foto)
{
    global $koneksi;
    $kebutuhan=htmlspecialchars($data["kebutuhan"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gaji=htmlspecialchars($data["gaji"]);
    $kota=htmlspecialchars($data["kota"]);$perintah="INSERT INTO lowongan VALUES
    ('','$id','$nama','$kebutuhan','$alamat','$kota','$jurusan','$gaji','$waktu','$foto')";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function updateKarya($data, $no)
{
    global $koneksi;
    $judul=htmlspecialchars($data["judul"]);
    $link=htmlspecialchars($data["link"]);
    $gambarLama=htmlspecialchars($data['gambarLama']);
    if ($_FILES['gambar']['error']===4) {
        $gambar=$gambarLama;
    } else {
        $gambar=upload();
    }$perintah="UPDATE karya_siswa SET 
                            judul='$judul',
                            link='$link',
                            foto='$gambar' 
                            WHERE no='$no'";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function updateProfilSiswa($data, $id)
{
    global $koneksi;
    $id=$id;
    $nama=htmlspecialchars($data["nama"]);
    $kota=htmlspecialchars($data["kota"]);
    $sekolah=htmlspecialchars($data["sekolah"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    if ($_FILES["gambar"]["error"]===4) {
        $gambar=$gambarLama;
    } else {
        $gambar=upload();
    }$perintah="UPDATE profil_siswa SET 
                            nama='$nama',
                            kota='$kota',
                            sekolah='$sekolah', 
                            jurusan='$jurusan',
                            foto ='$gambar' 
                WHERE id='$id'";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function updateProfilPerusahaan($data, $id)
{
    global $koneksi;
    $id=$id;
    $nama=htmlspecialchars($data["nama"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $telp=htmlspecialchars($data["telp"]);
    $email=htmlspecialchars($data["email"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    if ($_FILES["gambar"]["error"]===4) {
        $gambar=$gambarLama;
    } else {
        $gambar=upload1();
    }$perintah="UPDATE profil_perusahaan SET 
                            nama='$nama',
                            alamat='$alamat',
                            telp='$telp', 
                            email='$email',
                            foto ='$gambar' 
                WHERE id='$id'";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function updateLowongan($data, $no)
{
    global $koneksi;
    $kebutuhan=htmlspecialchars($data["kebutuhan"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gaji=htmlspecialchars($data["gaji"]);
    $kota=htmlspecialchars($data["kota"]);$perintah="UPDATE lowongan SET
                            kebutuhan ='$kebutuhan',
                            lokasi    ='$alamat',
                            jurusan   ='$jurusan',
                            gaji      ='$gaji',
                            kota      ='$kota'
                            WHERE no='$no'";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function ajukanLamaran($data, $id_siswa, $foto, $id_perusahan, $kebutuhan, $waktu, $no_lowongan, $foto_perusahaan, $nama_perusahaan)
{
    global $koneksi;
    $nama=htmlspecialchars($data["nama"]);
    $kelamin=htmlspecialchars($data["kelamin"]);
    $ttl=htmlspecialchars($data["ttl"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $telp=htmlspecialchars($data["telp"]);
    $email=htmlspecialchars($data["email"]);
    $sekolah=htmlspecialchars($data["sekolah"]);$perintah="INSERT INTO pengajuan VALUES(
                '','$waktu','$id_siswa','$nama','$kelamin',
                '$ttl','$alamat','$jurusan','$telp',
                '$email','$sekolah','$foto','$id_perusahan',
                '$kebutuhan','$no_lowongan','Menunggu','$foto_perusahaan','$nama_perusahaan')";
    mysqli_query($koneksi, $perintah);
    return mysqli_affected_rows($koneksi);
}function total($perintah)
{
    global $koneksi;
    $query=mysqli_query($koneksi, $perintah);
    $data=[];
    $jumlah=0;
    while ($hasil=mysqli_fetch_assoc($query)) {
        $data[]=$hasil;
        $jumlah++;
    }return $jumlah;
}
function upload()
{
    $namaFiles=$_FILES["gambar"]["name"];
    $ukuran=$_FILES["gambar"]["size"];
    $error=$_FILES["gambar"]["error"];
    $tmp_name=$_FILES["gambar"]["tmp_name"];
    $ekstensi=["jpg","jpeg","png"];
    $ekstensiGambar=explode(".", $namaFiles);
    $ekstensiGambar=strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensi)) {
        echo "<script>alert('yang anda upload bukan gambar');</script>";
        return false;
    }if ($ukuran>1000000) {
        echo "<script>alert('ukuran gambar lebih dari 1MB');</script>";
        return false;
    }$nama_baru=uniqid();
    $nama_baru.=".";
    $nama_baru.=$ekstensiGambar;
    move_uploaded_file($tmp_name, 'img/profil/siswa/'.$nama_baru);
    return $nama_baru;
}



function upload1()
{
    $namaFiles=$_FILES["gambar"]["name"];
    $ukuran=$_FILES["gambar"]["size"];
    $error=$_FILES["gambar"]["error"];
    $tmp_name=$_FILES["gambar"]["tmp_name"];
    $ekstensi=["jpg","jpeg","png"];
    $ekstensiGambar=explode(".", $namaFiles);
    $ekstensiGambar=strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensi)) {
        echo "<script>alert('yang anda upload bukan gambar');</script>";
        return false;
    }if ($ukuran>1000000) {
        echo "<script>alert('ukuran gambar lebih dari 1MB');</script>";
        return false;
    }$nama_baru=uniqid();
    $nama_baru.=".";
    $nama_baru.=$ekstensiGambar;
    move_uploaded_file($tmp_name, 'img/profil/perusahaan/'.$nama_baru);
    return $nama_baru;
}function hapus_akun($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from akun where id='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_profil_siswa($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from profil_siswa where id='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_profil_perusahaan($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from profil_perusahaan where id='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_lowongan($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from lowongan where id='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_lowongan1($no)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from lowongan where no='$no'");
    return mysqli_affected_rows($koneksi);
}function hapus_pengajuan($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from pengajuan where id_siswa='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_pengajuan1($id)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from pengajuan where id_perusahaan='$id'");
    return mysqli_affected_rows($koneksi);
}function hapus_pengajuan2($no)
{
    global $koneksi;
    $query=mysqli_query($koneksi, "delete from pengajuan where no_lowongan='$no'");
    return mysqli_affected_rows($koneksi);
}function hapus_untuk_siswa($id)
{
    $cek=hapus_akun($id);
    $cek1=hapus_profil_siswa($id);
    $cek2=hapus_pengajuan($id);
    if ($cek&&$cek1&&$cek2>0) {
        return 1;
    } else {
        return 0;
    }
}function hapus_untuk_perusahaan($id)
{
    $cek=hapus_akun($id);
    $cek1=hapus_lowongan($id);
    $cek2=hapus_pengajuan1($id);
    $cek3=hapus_profil_perusahaan($id);
    if ($cek&&$cek1&&$cek2&&$cek3>0) {
        return 1;
    } else {
        return 0;
    }
}
