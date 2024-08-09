-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2024 pada 15.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_hidangan` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail`, `id_pesanan`, `id_hidangan`, `jumlah_pesanan`, `total`) VALUES
(97, 156, 22, 1, 12000),
(98, 157, 22, 1, 12000),
(99, 157, 24, 1, 3000),
(100, 158, 25, 1, 10000),
(101, 158, 23, 1, 17000),
(102, 158, 24, 1, 3000),
(103, 159, 22, 3, 36000),
(104, 159, 23, 1, 17000),
(105, 159, 24, 5, 15000),
(106, 159, 25, 1, 10000),
(107, 160, 22, 5, 60000),
(108, 160, 23, 1, 17000),
(109, 160, 24, 8, 24000),
(110, 160, 25, 3, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `jumlah_kursi` int(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `jumlah_kursi`, `status`) VALUES
(1, 5, 'Isi'),
(2, 5, 'Isi'),
(3, 6, 'Isi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_hidangan` int(11) NOT NULL,
  `nama_hidangan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_hidangan`, `nama_hidangan`, `deskripsi`, `harga`, `gambar`, `stok`) VALUES
(22, 'Nasi Goreng ', 'Nasi, Kecap, Bawang', 12000, 'Nasi-Goreng-4.jpg', 'Tersedia'),
(23, 'Pecel Lele', 'Nasi, Lele Goreng, Salada', 17000, 'pecel lele.jpeg', 'Tersedia'),
(24, 'Es Teh', 'Teh', 3000, 'teh es.jpg', 'Tersedia'),
(25, 'Roti Bakar', 'Roti, Selai Coklat, Keju', 10000, 'roti bakar.jpeg', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `posisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `no_telp`, `alamat`, `posisi`) VALUES
(6, 'Naufal', 'Naufal', '202cb962ac59075b964b07152d234b70', '082172411344', 'Jl Seroja 2', 'admin'),
(7, 'Iyang', 'Koki', '202cb962ac59075b964b07152d234b70', '081255618790', 'JL Manglayang', 'koki'),
(8, 'Toni', 'Pelayan', '202cb962ac59075b964b07152d234b70', '081255618788', 'JL Ciparay', 'kasir'),
(9, 'Laurence', 'Pelayan', '202cb962ac59075b964b07152d234b70', '081255618723', 'Jl Bandung', 'pelayan'),
(10, 'Toni', 'Kasir', '202cb962ac59075b964b07152d234b70', '081255618790', '', 'kasir'),
(11, 'Laurence', 'Pelayan1', '202cb962ac59075b964b07152d234b70', '081255618788', '', 'pelayan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pembeli`, `id_meja`, `id_pegawai`, `tanggal`, `total_harga`, `status`, `status_pembayaran`) VALUES
(156, 'Rafi', 2, 6, '2024-08-03', 12000, 'Selesai', 'Lunas'),
(157, 'Raja', 1, 11, '2024-08-04', 15000, 'Selesai', 'Lunas'),
(158, 'Jujur', 3, 11, '2024-08-04', 30000, 'Selesai', 'belum bayar'),
(159, 'Sultan', 1, 11, '2024-08-04', 78000, 'Perlu diantar', 'belum bayar'),
(160, 'Steven', 2, 11, '2024-08-04', 131000, 'Perlu dibuat', 'belum bayar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_hidangan`),
  ADD KEY `id_hidangan` (`id_hidangan`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_hidangan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_meja` (`id_meja`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_hidangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_hidangan`) REFERENCES `menu` (`id_hidangan`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
