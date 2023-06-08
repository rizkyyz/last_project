-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 10.15
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `halaman` varchar(250) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='kui';

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `title`, `gambar`, `halaman`, `tanggal`) VALUES
(69, 'cikarang barat', 'thumb-1920-844967.jpg', 'cikbar', '2023-05-30'),
(72, 'cikpus', 'thumb-1920-844967.jpg', 'cikpus', '2023-05-30'),
(73, 'tablig akbar', 'images.jpg', '<p><strong>TABLIG AKBAR</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>CIKARANG</strong></em></p>\r\n', '2023-05-30'),
(74, '', 'sempol-ayam-illustration-indonesian-food-with-cart', '<p>asdasdasdasd</p>\r\n', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `depan_layanan`
--

CREATE TABLE `depan_layanan` (
  `id` int(150) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `depan_layanan`
--

INSERT INTO `depan_layanan` (`id`, `foto`) VALUES
(2, 'walpaper2.jpg'),
(3, 'spiderman-latest-wallpaper.jpg'),
(4, 'thumbbig-1180546.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokomen`
--

CREATE TABLE `dokomen` (
  `id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(250) NOT NULL,
  `dokumen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokomen`
--

INSERT INTO `dokomen` (`id`, `tanggal`, `judul`, `dokumen`) VALUES
(43, '2023-05-30', 'beli tanah', 'catatan_lokasi(1).csv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id` int(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `foto`) VALUES
(51, 'spiderman-latest-wallpaper.jpg'),
(52, 'wp9737611.jpg'),
(53, 'thumb-1920-844967.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(100) NOT NULL,
  `kondisi` varchar(250) NOT NULL,
  `isi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `isi`) VALUES
(1, 'kondisi Demografi', '<p>demografi ya</p>\r\n'),
(3, 'Kondisi Geografis', '<p>test</p>\r\n'),
(7, 'Kondisi Kesehatan', 'kesehatan'),
(9, 'Kondisi Pendidikan', 'pendidikan'),
(11, 'Kondisi Pertanian', 'pertanian'),
(13, 'Kondisi Perikanan', 'perikanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konter`
--

CREATE TABLE `konter` (
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT 1,
  `online` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(150) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `halaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `title`, `file`, `halaman`) VALUES
(56, ' Surat Keterangan Tidak Mampu ', ' Surat Keterangan Tidak Mampu ', 'spiderman-latest-wallpaper.jpg', ' Surat Keterangan Tidak Mampu '),
(58, 'Surat Keterangan Domisili Haji ', 'Surat Keterangan Domisili Haji ', 'sa22.jpg', 'as'),
(60, 'Surat Keterangan Proposal ', 'Surat Keterangan Proposal ', '1920x1200_spider-man-4k-5k-spider-man-no-way-home.jpg', 'Surat Keterangan Proposal '),
(63, 'Surat Keterangan Domisili Yayasan ', 'Surat Keterangan Domisili Yayasan ', 'wp9737611.jpg', 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(100) NOT NULL,
  `layanan` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `layanan`, `file`, `title`, `isi`) VALUES
(1, '', 'macbook-pro-dark-background-orange-stock-wallpaper-preview.jpg', '0', ''),
(11, '', '', '', ''),
(12, '', 'macbook-pro-dark-background-orange-stock-wallpaper-preview.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pengadu` varchar(255) NOT NULL,
  `email_pengadu` varchar(100) NOT NULL,
  `telpon_pengadu` int(50) NOT NULL,
  `judul_pengadu` varchar(200) NOT NULL,
  `pesan_pengadu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(20) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip`, `date`) VALUES
(1, '192.168.11.2900', '2023-06-05'),
(2, '192.168.11.87', '2023-06-06'),
(3, '192.168.11.14', '2023-06-08'),
(4, '192.168.11.5', '2023-05-10'),
(5, '192.168.11.1', '2023-07-07'),
(7, '192.123.256', '2023-06-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id` int(150) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id`, `gambar`) VALUES
(1, 'wp9737611.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id` int(100) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `halaman` varchar(1000) NOT NULL,
  `desa` varchar(250) NOT NULL,
  `laki_laki` int(255) NOT NULL,
  `perempuan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id`, `kecamatan`, `gambar`, `halaman`, `desa`, `laki_laki`, `perempuan`) VALUES
(1, 'telaga asih', 'spiderman-latest-wallpaper.jpg', '<p><strong>KECAMATAN : CIKARANG BARAT</strong></p>\r\n\r\n<p><strong>KABUPATEN : KAB.BEKASI</strong></p>\r\n\r\n<p><strong>PROVINSI : JAWA BARAT</strong></p>\r\n', 'KARANG HARJA\r\nTELAGA MURNI\r\nSUKADANAU', 120, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Nqq/y251QX2Ccvb1Ax7hUuMqQSkG3yRLCxN2KPdetnSP3oaXVH70a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi`
--

CREATE TABLE `visi` (
  `id` int(100) NOT NULL,
  `visi` varchar(1000) NOT NULL,
  `misi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visi`
--

INSERT INTO `visi` (`id`, `visi`, `misi`) VALUES
(3, '<p>asdas</p>\r\n', '<p>asd</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `depan_layanan`
--
ALTER TABLE `depan_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokomen`
--
ALTER TABLE `dokomen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perempuan` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `depan_layanan`
--
ALTER TABLE `depan_layanan`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokomen`
--
ALTER TABLE `dokomen`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
