-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2019 pada 12.05
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mamij`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_admin`, `username`, `password`, `akses`) VALUES
(1, 'kiki', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Milk'),
(2, 'Roti '),
(3, 'Sayuran ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_beli` int(11) NOT NULL,
  `tanggal_kirim` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nama_terima` varchar(50) NOT NULL,
  `alamat` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi`, `id_kategori`) VALUES
(12, 'Wortel', 4000, 'wortel.jpg', 'Wortel sayur dijual per gram', '3'),
(13, 'Bayam', 2000, 'bayam.jpg', 'Bayam di panen saat sore dan fresh. Dijual Perikat\r\n', '3'),
(14, 'Cabe Merah', 3000, 'cabaibesar.jpg', 'Cabai merah dijual per gram', '3'),
(15, 'Kacang Panjang', 3000, 'kacangpanjang.jpg', 'Jenis Kacang sayur di jual per ikat', '3'),
(16, 'Kangkung', 2000, 'kangkung.jpg', 'Jenis sayuran kangkung dijual per ikat', '3'),
(17, 'Roti Kasur', 12500, 'kasur.jpeg', 'Roti dengan isian coklat dan keju', '2'),
(18, 'Kering BeSar', 15000, 'keringbesar.jpeg', 'Roti Tawar yang di olah kembali tanpa gula tambahan\r\n', '2'),
(19, 'Sobek', 10000, 'sobek.jpeg', 'Roti dengan isian berbagai varian', '2'),
(20, 'Roti Moka/Kopi', 3500, 'kopi.jpeg', 'Roti dengan perasa kopi dan moka\r\n', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Konfirmasi '),
(1, 'Konfirmasi '),
(2, 'Barang di Kemas'),
(2, 'Barang di Kemas'),
(3, 'Barang diantar'),
(3, 'Barang diantar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `akses`, `username`, `email`, `password`, `nomor`) VALUES
(1, 'admin', 'kiki', 'kiki@gmail.com', '123', '085606070505'),
(2, 'user', 'a', 'a123@gmail.com', '123', '085606070503'),
(3, 'user', 'q', 'q@gmail.com', '123', '0891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
