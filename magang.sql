-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2021 pada 04.42
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `level`, `tipe`) VALUES
(6, 'bukalapak@gmail.com', '3980309a0d6b307de4a5689a998b77cd', 'user', 'perusahaan'),
(9, 'Google@gmail.com', '7dba5dce8fd0029e11d603f4ec65029d', 'user', 'perusahaan'),
(17, 'ubay@gmail.com', 'b1a4102578c4674ecfd6e2caa9766d12', 'user', 'siswa'),
(22, 'WildanGamteng@gmail.com', 'e127797f6c8d239baae447e898743a2f', 'user', 'siswa'),
(24, 'nisanur@gmail.com', '785a3b03b4a9fdf1dbdc59a7b0f77f9a', 'user', 'siswa'),
(28, 'faidatul@gmail.com', '2cd396da6a4b42ab99dcc3c7804e1440', 'user', 'siswa'),
(29, 'faidatul1@gmail.com', '2cd396da6a4b42ab99dcc3c7804e1440', 'user', 'siswa'),
(30, 'elaaa@gmail.com', '2cd396da6a4b42ab99dcc3c7804e1440', 'user', 'siswa'),
(31, 'gojek id', '918c4a1899a727ee12c0a2c30736b4de', 'user', 'perusahaan'),
(32, 'perusahaan@gmail.com', '22ec21d5323207354eb69ec7a059dac6', 'user', 'perusahaan'),
(34, 'bayu@gmail.com', '1f0138450007d51e6317174f3100599f', 'user', 'siswa'),
(36, 'admin@admin.com', 'a6fe0b93f6161d005e48f507dabec662', 'admin', 'admin'),
(38, 'bayufirmansyah2800@gmail.com', 'a0e20930214625f20bdb955d91b6929b', 'user', 'siswa'),
(39, 'Shopee@shp.com', 'ce1782bc453eb6aa7256d2586dd657c3', 'user', 'perusahaan'),
(40, 'wildanfajarerlangga1999@gmail.co', '748e05f798b86731dcdcc4348d998ea9', 'user', 'siswa'),
(41, 'khoirulmuslimin12@gmail.com', '52c0177f5432c6cce8237cebd0aeaf85', 'user', 'siswa'),
(42, 'bayuqr@gmail.com', 'a5312aa3c0d7ef6aeb82deadb023c994', 'user', 'siswa'),
(43, 'cakfidz@gmail.com', '9f6f33e3d90952c4bd688f9d60d4f1c9', 'user', 'siswa'),
(44, 'RafiKost@gmail.com', 'c0dca8941ae2a578d055023977dad1cc', 'user', 'siswa'),
(45, 'putuayu@gmail.com', '2b858a175f3e6af3de0f2ea81b777f01', 'user', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karya_siswa`
--

CREATE TABLE `karya_siswa` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `judul` varchar(22) NOT NULL,
  `link` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karya_siswa`
--

INSERT INTO `karya_siswa` (`no`, `id`, `judul`, `link`, `foto`, `waktu`) VALUES
(5, 17, 'from zero to hero', 'https://bayufirmansyah2800.github.io', '5f714a1f4947f.jpeg', '28-09-2020'),
(12, 22, 'Gu Gamteng', 'https://wildanfajarmaulana.github.io', '5f7deeee955a2.jpg', '7-10-2020'),
(16, 30, 'My Webiste', 'https://bayufirmansyah2800.github.io', '5f8a58abcd930.jpg', '17-10-2020'),
(18, 41, 'Firts my website', 'https:bayufirmansyah2800.github.io', '5f9f64424f87d.jpg', '2-11-2020'),
(23, 34, 'karya 1', 'aaa', '5fc99e3cac0cc.jpg', '4-12-2020'),
(24, 34, 'karya2', 'asdfgh', '5fc99e57a593f.png', '4-12-2020'),
(27, 34, 'test', 'https://bayufirmansyah2800.github.io', '5fd83da08c5cf.jpg', '15-12-2020'),
(28, 34, 'asdfghj', 'ASDFGHJK', '5fe4136c0aede.jpeg', '24-12-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `kebutuhan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`no`, `id`, `nama_perusahaan`, `kebutuhan`, `lokasi`, `kota`, `jurusan`, `gaji`, `waktu`, `foto`) VALUES
(6, 9, 'Google', 'Full-Stack ', 'jl. jendral sudirman no 53 ', 'Jakarta', 'Rekayasa Perangkat Lunak', '2000000', '27-09-2020', '5f709a1c4de36.png'),
(7, 9, 'Google', 'Desainer Logo', 'jl. jendral sudirman no 53 ', 'Jakarta', 'Desain', '1000000', '27-09-2020', '5f709a1c4de36.png'),
(18, 9, 'Google', 'Front-end web', 'Jl.Tanimbar no 22 Malang', 'malang', 'Rekayasa Perangkat Lunak', '2000000', '16-10-2020', '5f709a1c4de36.png'),
(22, 9, 'Google', 'Cyber Scurity', 'jl.MH Thamrin n0 45', 'Jakarta', 'Rekayasa Perangkat Lunak', '500000', '20-10-2020', '5f709a1c4de36.png'),
(24, 31, 'Gojek Indonesia', 'android developer', 'Jl.mh tamrin', 'jakpus', 'Rekayasa Perangkat Lunak', '5000000', '28-10-2020', '5f99b84030424.jpeg'),
(25, 31, 'Gojek Indonesia', 'swift developer', 'jl.MH Thamrin', 'jakpus', 'Rekayasa Perangkat Lunak', '7900000', '28-10-2020', '5f99b84030424.jpeg'),
(27, 39, 'Shopee ID', 'Database Engginer', 'Jl.Ambarawa no 27', 'Jakarta selatan', 'Rekayasa Perangkat Lunak', '5000000', '31-10-2020', '5f9d6d257db32.jpg'),
(28, 39, 'Shopee ID', 'Data Scientys', 'Jl.Ambarawa no 27', 'Jakarta Selatan', 'Rekayasa Perangkat Lunak', '3000000', '31-10-2020', '5f9d6d257db32.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `no` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `no_lowongan` int(11) NOT NULL,
  `status` varchar(290) NOT NULL,
  `foto_perusahaan` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`no`, `waktu`, `id_siswa`, `nama`, `jk`, `ttl`, `alamat`, `jurusan`, `telp`, `email`, `sekolah`, `foto`, `id_perusahaan`, `bagian`, `no_lowongan`, `status`, `foto_perusahaan`, `nama_perusahaan`) VALUES
(20, '24-12-2020', 34, 'bayu firmansyah', 'laki-laki', '2020-12-03', 'mergosono', 'Rekayasa Perangkat Lunak', '0987654321', 'b@gmail.com', 'SMKN4MLG', '5fcffde1d505e.jpg', 39, 'Database Engginer', 27, 'Menunggu', '5f9d6d257db32.jpg', 'Shopee ID'),
(21, '1-01-2020', 34, 'Bayu Firmansyah', 'laki-laki', '2003-06-19', 'jl.kolonel sugionogang 3 b', 'Rekayasa Perangkat Lunak', '0987654321', 'bayufirmansyah2800@gmail.com', 'SMKN 4 MALANG', '5fcffde1d505e.jpg', 31, 'swift developer', 25, 'Menunggu', '5f99b84030424.jpeg', 'Gojek Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `patner` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`id`, `nama`, `alamat`, `telp`, `email`, `foto`, `patner`) VALUES
(6, 'Bukalapak ', 'JL.Mangga Dua no 17 Depok', '0347979208', 'bukalapak@gmail.com', '5fadf45d104c2.png', 1),
(9, 'Google', 'jl. jendral sudirman no 53 Jakarta', '0341 600913', 'Google@gmail.com', '5f709a1c4de36.png', 0),
(31, 'Gojek Indonesia', 'Jl. MH thamrin', '894897529', 'Gojek@gmail.com', '5f99b84030424.jpeg', 1),
(32, 'perusahaan', 'alamat', '0381984', 'alamat emal', '5f99a1c899039.jpg', 0),
(39, 'Shopee ID', 'Jl.Ambarawa 27 jakarta', '083729884834', 'Shopee@shp.com', '5f9d6d257db32.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sekolah` varchar(60) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_siswa`
--

INSERT INTO `profil_siswa` (`id`, `nama`, `kota`, `sekolah`, `jurusan`, `foto`) VALUES
(3, 'Wildan Fajar Maulana', 'Jakarta', 'SMK Telkom Jakarta', 'Rekayasa Perangkat Lunak', '5f675feb97e93.jpg'),
(5, 'ubaay gans', 'jakartans', 'SMK Telkom Jaktim', 'Rekayasa Perangkat Lunak', '5f68369ab00c0.png'),
(17, 'Bayu Firmansyah', 'Bandung', 'SMK Telkom Bandung', 'Rekayasa Perangkat Lunak', '5f70b81f3bb6c.jpeg'),
(22, 'wildan fajar ', 'Jogja', 'SMKN 4 Jojga', 'Rekayasa Perangkat Lunak', '5f7dee531b556.jpg'),
(0, 'Nisa Aja', 'Konoha', 'Paud Merdeka Bunda', 'Rekayasa Perangkat Lunak', '5f831b04572bf.jpg'),
(24, 'Nisa nur ramadanti', 'Malang', 'SMKN 4 MALANG', 'Rekayasa Perangkat Lunak', '5f83343fee7fe.jpg'),
(25, 'Wildan Fajar', 'jogja', 'SMKN 4 jogja', 'Rekayasa Perangkat Lunak', '5f87db4009500.jpg'),
(30, 'faidatul ela', 'Malang', 'SMKN 4 MALANG', 'Rekayasa Perangkat Lunak', '5f8a5869cc835.jpg'),
(34, 'bayu firmansyah', 'Kota Malang', 'SMKN 4 malang', 'Rekayasa Perangkat Lunak', '5fcffde1d505e.jpg'),
(38, 'Bayu Firmansyah', 'Kota Malang', 'SMKN 4 Malang', 'Rekayasa Perangkat Lunak', '5f9d6b2122725.jpg'),
(41, 'khoirul muslimin', 'Kota Jakarta', 'SMKN 56 Jakarta', 'Rekayasa Perangkat Lunak', '5f9f63f0adbbc.png'),
(42, 'bayua', 'malang', 'smkn 4', 'Rekayasa Perangkat Lunak', '5fae05f260f29.jpeg'),
(43, 'Ahmad Hafidz', 'MAKASAR', 'SMKN 4 MAKASAR', 'Multimedia', '5fd7e5956f096.jpg'),
(44, 'Rafida Aziz', 'Dampitans', 'SMKN 4 MALANG', 'Multimedia', '5ffe24173c5c6.jpg'),
(45, 'Putu ayu adelia', 'Malang', 'SMKN 4 MALANG', 'Rekayasa Perangkat Lunak', '5fffb0b444033.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karya_siswa`
--
ALTER TABLE `karya_siswa`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `karya_siswa`
--
ALTER TABLE `karya_siswa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
