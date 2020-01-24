-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2020 pada 15.26
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(50) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `namadosen` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(30) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `pendidikanterakhir` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(2) NOT NULL,
  `namajurusan` varchar(100) NOT NULL,
  `namakajur` varchar(100) NOT NULL,
  `notelp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `namajurusan`, `namakajur`, `notelp`) VALUES
('15', 'TeknikElektro', 'Raka23', '098033');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketuajurusan`
--

CREATE TABLE `ketuajurusan` (
  `kodejurusan` varchar(2) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketuaprodi`
--

CREATE TABLE `ketuaprodi` (
  `kodeprodi` varchar(2) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `namamahasiswa` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(30) NOT NULL,
  `kodeprodi` varchar(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `kodejurusan` varchar(3) NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `datacreate` date NOT NULL,
  `dataupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `namamahasiswa`, `alamat`, `notelp`, `kodeprodi`, `username`, `password`, `image`, `kodejurusan`, `isactive`, `datacreate`, `dataupdate`) VALUES
(1, '2352535', 'jaelaniu', '', '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00'),
(2, '778899', '', '', '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00'),
(5, '122141', 'emii7', 'japan', '1323131', '15', 'eqwqe', 'wdd', '1231', '323', 1, '2019-02-02', '2019-02-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kodeprodi` varchar(2) NOT NULL,
  `kodejurusan` varchar(2) NOT NULL,
  `namaprodi` varchar(50) NOT NULL,
  `notelp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposalta`
--

CREATE TABLE `proposalta` (
  `noproposal` int(11) NOT NULL,
  `judulproposal` varchar(250) NOT NULL,
  `tahunproposal` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nippembimbing1` varchar(50) NOT NULL,
  `nippembimbing2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `roleid` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `roleid`, `nama`, `profile`) VALUES
(1, 'admin', 'admin', 1, 'emii', 'Koala.jpg'),
(2, 'emii', 'emii', 1, 'emii', 'Koala.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugasakhir`
--

CREATE TABLE `tugasakhir` (
  `nota` int(11) NOT NULL,
  `noproposal` bigint(20) NOT NULL,
  `judulta` varchar(200) NOT NULL,
  `tahunta` varchar(5) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `tgldisetujui` date NOT NULL,
  `nippembimbing1` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposalta`
--
ALTER TABLE `proposalta`
  ADD PRIMARY KEY (`noproposal`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugasakhir`
--
ALTER TABLE `tugasakhir`
  ADD PRIMARY KEY (`nota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `proposalta`
--
ALTER TABLE `proposalta`
  MODIFY `noproposal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugasakhir`
--
ALTER TABLE `tugasakhir`
  MODIFY `nota` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
