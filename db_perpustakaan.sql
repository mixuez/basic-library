-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 02:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` int(13) NOT NULL,
  `j_buku_baik` int(5) NOT NULL,
  `j_buku_rusak` int(5) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `id_kategori`, `id_penerbit`, `pengarang`, `tahun_terbit`, `isbn`, `j_buku_baik`, `j_buku_rusak`, `foto`) VALUES
(1, 'Guide to Survive in Greenland', 1, 1, 'Prof. Vio Salman Kafiyan', 2035, 3313001, 100, 0, NULL),
(2, 'Quantum Physics', 2, 2, 'Prof. Vio Salman Kafiyan', 2035, 3313002, 100, 0, NULL),
(3, 'The Seven Deadly Sins of Soeharto', 3, 3, 'Prof. Muhammad Syauqi Imaduddin', 2036, 3313003, 100, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` char(20) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama`, `alamat`, `email`, `nomor_hp`, `foto`) VALUES
(1, 'PERPUSTAKAAN ONLINE SMKN 64', 'Jl. Jaani, Nasir Cawang, Kramat Jati, Jakarta Timur', 'smkn64jkt@edu.sch.id', '089653132158', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nama`) VALUES
(1, 'K001', 'Umum'),
(2, 'K002', 'Sains'),
(3, 'K003', 'Sejarah'),
(4, 'K004', 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `level_user` enum('admin','user') DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `isi`, `level_user`, `status`) VALUES
(1, 'Perpustakaan sedang tutup', NULL, 'aktif'),
(2, 'Perpustakaan sedang kebakaran', NULL, 'aktif'),
(3, 'Server sedang maintenence', NULL, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `kondisi_buku_saat_dipinjam` enum('baik','rusak') NOT NULL,
  `kondisi_buku_saat_dikembalikan` enum('baik','rusak') NOT NULL,
  `denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`) VALUES
(1, 2, 1, '2023-01-09 01:28:27', NULL, 'baik', '', '0'),
(2, 3, 2, '2023-01-09 01:28:27', '2023-01-09 01:28:27', 'baik', 'rusak', '100000'),
(3, 2, 3, '2023-01-09 01:28:27', '2023-02-08 07:29:28', 'baik', 'baik', '0'),
(4, 2, 1, '2023-01-31 00:00:00', NULL, 'baik', 'baik', '0'),
(5, 2, 3, '2023-01-24 00:00:00', NULL, 'rusak', 'baik', '0'),
(6, 2, 3, '2023-01-23 00:00:00', NULL, 'baik', 'baik', '0'),
(7, 2, 2, '2023-01-24 00:00:00', NULL, 'rusak', 'baik', '0'),
(8, 2, 3, '2023-01-26 00:00:00', NULL, 'baik', 'baik', '0'),
(15, 2, 2, '2023-01-26 00:00:00', NULL, 'baik', 'baik', '0');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `verif` varchar(50) NOT NULL DEFAULT 'Akun terverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `kode`, `nama`, `verif`) VALUES
(1, 'P001', 'Erlangga', 'Akun terverifikasi'),
(2, 'P002', 'BSE', 'Akun terverifikasi'),
(3, 'P003', 'Intermedia', 'Akun terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `judul_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status` enum('terkirim','dibaca') NOT NULL,
  `tanggal_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `id_penerima`, `id_pengirim`, `judul_pesan`, `isi_pesan`, `status`, `tanggal_kirim`) VALUES
(1, 2, 1, 'Buku dipinjam', 'Buku sedang dipinjam, harap kembalikan sebelum tanggal 30 Februari 2023', 'terkirim', '2023-01-09 01:31:40'),
(2, 3, 1, 'Anda merusakkan buku', 'Anda dikenakan denda sebesar Rp. 100.000', 'terkirim', '2023-02-10 07:31:41'),
(3, 2, 1, 'Buku telah dikembalikan', 'Terimakasih telah meminjam buku di Perpus64', 'dibaca', '2023-02-08 07:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nis` char(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `verif` varchar(50) NOT NULL DEFAULT 'Akun terverifikasi',
  `role` enum('admin','user') NOT NULL,
  `join_date` datetime NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode`, `nis`, `fullname`, `username`, `password`, `kelas`, `alamat`, `verif`, `role`, `join_date`, `terakhir_login`, `foto`) VALUES
(1, 'A01', '123456', 'Admin', 'admin', '123', 'XII', 'Condet', 'Akun terverifikasi	', 'admin', '2023-01-06 08:31:17', '2023-01-06 08:31:17', NULL),
(2, 'U01', '0101', 'Vio Samlan', 'vio', '$2y$10$KC1ZO3u4fgSbSacnACs2qePbArK92kdvbugKkyjCi1njLgvfFz1.O', 'XII - RPL', 'Condet Raya', 'Akun terverifikasi	', 'user', '0000-00-00 00:00:00', '2023-01-06 08:31:17', ''),
(3, 'U02', '0120', 'Andreas al Farizy', 'andreasaf', '$2y$10$vEsDNYd9Bj3anC4z83f4W.WspRB0ayckfSUZCunmBOXHgwf6VuJvy', 'XII - RPL', 'Cipayung', 'Akun terverifikasi', 'user', '2023-01-07 08:38:51', '2023-01-07 08:38:51', ''),
(12, '', '', 'Silver Administrator ', 's_admin', '$2y$10$gZvDeurlFHwd9an4G6EYNu9P1WvDndYzMM4abK8szdjBR3xq8Uh7.', '', '', 'Akun terverifikasi', 'admin', '2023-01-26 00:00:00', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_penerbit` (`id_penerbit`),
  ADD KEY `kategori_buku` (`id_kategori`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judul_buku` (`id_buku`),
  ADD KEY `nama_anggota` (`id_user`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
