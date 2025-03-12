-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2023 pada 08.36
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_ismi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi_ismi`
--

CREATE TABLE `tb_detail_transaksi_ismi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member_ismi`
--

CREATE TABLE `tb_member_ismi` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member_ismi`
--

INSERT INTO `tb_member_ismi` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Nabilaa', 'Bandung', 'P', '0895329746650'),
(2, 'Ranaz', 'Bandung', 'L', '0892353467700'),
(4, 'Queensya', 'Bekasi', 'P', '0832847563586'),
(5, 'reree', 'kepo', 'P', '08000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet_ismi`
--

CREATE TABLE `tb_outlet_ismi` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_outlet_ismi`
--

INSERT INTO `tb_outlet_ismi` (`id_outlet`, `nama_outlet`, `alamat`, `tlp`) VALUES
(1, 'Kamaroong', 'kamarung', '0895329746650'),
(2, 'Nabilalaundy', 'Cimahi ', '082165398234'),
(3, 'MinaLaundry', 'Jl.Raya Barat', '089523147363'),
(4, 'MinaLaundry2', 'Balik', '809463854763');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_ismi`
--

CREATE TABLE `tb_paket_ismi` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket_ismi`
--

INSERT INTO `tb_paket_ismi` (`id_paket`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'kiloan', 'hemat siswa', 6000),
(2, 2, 'selimut', 'kilat', 10000),
(5, 4, 'bed_cover', 'reguler', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_ismi`
--

CREATE TABLE `tb_transaksi_ismi` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `subtotal_ismi` double NOT NULL,
  `total` double NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `tb_transaksi_ismi`
--
DELIMITER $$
CREATE TRIGGER ` hapus` BEFORE DELETE ON `tb_transaksi_ismi` FOR EACH ROW BEGIN
INSERT INTO log (keterangan, datetime, id_user)
VALUES ('hapus data ke tabel transaksi', SYSDate(), old.id_user);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_ismi2`
--

CREATE TABLE `tb_transaksi_ismi2` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi_ismi2`
--

INSERT INTO `tb_transaksi_ismi2` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(6, 2, 'A123', 2, '2023-02-15 00:00:00', '2023-02-17 10:26:00', '2023-02-15 10:26:00', 10000, 5000, 0, 'baru', 'dibayar', 1),
(8, 1, 'A125', 1, '2023-02-15 00:00:00', '2023-02-17 11:25:00', '2023-02-15 11:25:00', 10000, 5000, 5000, 'baru', 'dibayar', 1),
(9, 2, 'A134', 2, '2023-02-16 00:00:00', '2023-02-18 09:21:00', '2023-02-16 09:21:00', 3000, 0, 5000, 'baru', 'dibayar', 8),
(10, 1, 'A131', 2, '2023-02-16 00:00:00', '2023-02-18 09:23:00', '2023-02-16 09:23:00', 5000, 0, 5000, 'baru', 'dibayar', 1),
(11, 2, 'A132', 2, '2023-02-16 00:00:00', '2023-02-18 09:28:00', '2023-02-16 09:28:00', 1000, 0, 6000, 'baru', 'dibayar', 9),
(12, 1, 'A137', 2, '2023-02-16 00:00:00', '2023-02-18 09:29:00', '2023-02-16 09:29:00', 3000, 0, 5000, 'baru', 'dibayar', 8),
(13, 1, 'A136', 2, '2023-02-16 00:00:00', '2023-02-18 09:31:00', '2023-02-22 09:31:00', 5000, 6000, 5000, 'baru', 'dibayar', 8),
(14, 1, 'A136', 2, '2023-02-16 00:00:00', '2023-02-18 09:31:00', '2023-02-22 09:31:00', 5000, 6000, 5000, 'baru', 'dibayar', 8),
(15, 1, 'A136', 2, '2023-02-16 00:00:00', '2023-02-18 09:31:00', '2023-02-22 09:31:00', 5000, 6000, 5000, 'baru', 'dibayar', 8),
(16, 1, 'A131', 2, '2023-02-16 00:00:00', '2023-02-18 09:33:00', '2023-02-16 09:33:00', 4000, 5000, 6000, 'baru', 'dibayar', 10),
(17, 1, 'A131', 2, '2023-02-16 00:00:00', '2023-02-18 09:33:00', '2023-02-16 09:33:00', 4000, 5000, 6000, 'baru', 'dibayar', 10),
(18, 1, 'A131', 2, '2023-02-16 00:00:00', '2023-02-18 09:33:00', '2023-02-16 09:33:00', 4000, 5000, 6000, 'baru', 'dibayar', 10),
(19, 1, '9999', 1, '2023-02-16 00:00:00', '2023-02-18 09:36:00', '2023-02-16 09:36:00', 5000, 0, 5000, 'baru', 'dibayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_ismi`
--

CREATE TABLE `tb_user_ismi` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_ismi`
--

INSERT INTO `tb_user_ismi` (`id_user`, `nama_user`, `username`, `password`, `id_outlet`, `role`) VALUES
(1, 'nabilaaa', 'admin', '123', 3, 'admin'),
(3, 'Nakusha', 'naku', '567', 1, 'owner'),
(8, 'Laysha', 'icaa', 'haiica', 3, 'owner'),
(9, 'reree', 'ree', '126', 2, 'owner'),
(10, 'Lea', 'leeaa', '11223', 3, 'admin'),
(11, 'rr', 'admin', '333', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_transaksi_ismi`
--
ALTER TABLE `tb_detail_transaksi_ismi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_transaksi_2` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_member_ismi`
--
ALTER TABLE `tb_member_ismi`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_outlet_ismi`
--
ALTER TABLE `tb_outlet_ismi`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_paket_ismi`
--
ALTER TABLE `tb_paket_ismi`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_outlet_2` (`id_outlet`);

--
-- Indeks untuk tabel `tb_transaksi_ismi`
--
ALTER TABLE `tb_transaksi_ismi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`,`id_member`,`id_user`),
  ADD KEY `id_outlet_2` (`id_outlet`,`id_member`,`id_user`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_transaksi_ismi2`
--
ALTER TABLE `tb_transaksi_ismi2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`,`id_member`,`id_user`),
  ADD KEY `id_outlet_2` (`id_outlet`,`id_member`,`id_user`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user_ismi`
--
ALTER TABLE `tb_user_ismi`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_outlet_2` (`id_outlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi_ismi`
--
ALTER TABLE `tb_detail_transaksi_ismi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_member_ismi`
--
ALTER TABLE `tb_member_ismi`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet_ismi`
--
ALTER TABLE `tb_outlet_ismi`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_ismi`
--
ALTER TABLE `tb_paket_ismi`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_ismi`
--
ALTER TABLE `tb_transaksi_ismi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_ismi2`
--
ALTER TABLE `tb_transaksi_ismi2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user_ismi`
--
ALTER TABLE `tb_user_ismi`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi_ismi`
--
ALTER TABLE `tb_detail_transaksi_ismi`
  ADD CONSTRAINT `tb_detail_transaksi_ismi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi_ismi` (`id`),
  ADD CONSTRAINT `tb_detail_transaksi_ismi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket_ismi` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `tb_paket_ismi`
--
ALTER TABLE `tb_paket_ismi`
  ADD CONSTRAINT `tb_paket_ismi_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet_ismi` (`id_outlet`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_ismi`
--
ALTER TABLE `tb_transaksi_ismi`
  ADD CONSTRAINT `tb_transaksi_ismi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member_ismi` (`id_member`),
  ADD CONSTRAINT `tb_transaksi_ismi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet_ismi` (`id_outlet`),
  ADD CONSTRAINT `tb_transaksi_ismi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user_ismi` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_user_ismi`
--
ALTER TABLE `tb_user_ismi`
  ADD CONSTRAINT `tb_user_ismi_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet_ismi` (`id_outlet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
