-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jun 2016 pada 06.30
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monitoringskripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE IF NOT EXISTS `bimbingan` (
`id_bimbingan` int(11) NOT NULL,
  `id_skripsi` text NOT NULL,
  `NIK` text NOT NULL,
  `Subjek` text NOT NULL,
  `Persetujuan` text NOT NULL,
  `Jenis` text NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_skripsi`, `NIK`, `Subjek`, `Persetujuan`, `Jenis`, `Tanggal`) VALUES
(1, '1', 'D001', 'Konsultasi Bab 1', 'Belum disetujui', 'Proposal', '2016-06-01'),
(2, '1', 'D002', 'BaB 2', 'Belum disetujui', 'Proposal', '2016-06-13'),
(3, '1', 'D001', ' b ab 3', 'Belum disetujui', 'Proposal', '2016-06-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `NIK` varchar(12) NOT NULL,
  `Nama` text NOT NULL,
  `Alamat` text NOT NULL,
  `Telp` text NOT NULL,
  `Email` text NOT NULL,
  `Pass` text NOT NULL,
  `Prodi` int(1) NOT NULL,
  `KBK` text NOT NULL,
  `TahunAjar` int(4) NOT NULL,
  `Kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`NIK`, `Nama`, `Alamat`, `Telp`, `Email`, `Pass`, `Prodi`, `KBK`, `TahunAjar`, `Kuota`) VALUES
('D001', 'Army Justitia', 'Jl Buntu', '081111111111', 'balabala', 'aabbcc', 1, 'Rekayasa Sistem Informasi', 2012, 8),
('D002', 'Badrus Zaman', 'Jl Kenangan', '081222222', 'apaya', 'asdfg', 1, 'Rekayasa Sistem Informasi', 2013, 8),
('D003', 'Eva Harianty', 'Jl xxxx', '', '123456789', '123qwe', 1, 'Rekayasa Sistem Informasi', 2014, 8),
('D004', 'Eto Purwanto', 'Jl.fghjk', '09876543321', 'asdfghjk', '1234rtyui', 1, 'Sistem Pendukung Keputusan', 2015, 8),
('D005', 'Purbandini', 'dctfgvyhbjk', '1234567', 'zesxdrcftvgyb', '12qwas', 1, 'Data Mining', 2016, 8),
('TU', 'TU', 'TU', 'TU', 'Tu', 'TU', 1, 'TU', 2016, 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Pukul` text NOT NULL,
  `Tempat` text NOT NULL,
  `NIK1` text NOT NULL,
  `NIK2` text NOT NULL,
  `JenisSidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` varchar(12) NOT NULL,
  `Nama` text NOT NULL,
  `Alamat` text NOT NULL,
  `Telp` text NOT NULL,
  `Email` text NOT NULL,
  `Pass` text NOT NULL,
  `Prodi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Alamat`, `Telp`, `Email`, `Pass`, `Prodi`) VALUES
('081311633001', 'Rahayu Tri Wahyuni', 'Jl Masih Panjang', '0987654321', 'sgjhvASBCzljk', '12345', 1),
('081311633002', 'Tara Andini', 'XRDFTYGVUBH', '456789', 'DTFCYVG5768', '12QWAS', 1),
('081311633003', 'Iven Mokalu', 'SXDRCFTVGYB', 'DRXCTFYVGBH', 'EXRCTVYBU', 'SEXDRCFTVGYBHU', 1),
('081311633004', 'Aldrie Vinandityo', 'CFGVHJ', 'GJHKJ', 'RTYUBN789', '5768BNM', 1),
('081311633005', 'Rinno Noval', 'AZESXRDCTFUVYGHB', '34567YGBHJ', 'ZWE6RCTVYBUH', '123QWE', 1),
('081311633006', 'Eka Rachmawati', 'WWEXRTCFVG45678', '4568FDS', 'KJHGFDSXDFCGVHB', '12345DFG', 1),
('081311633007', 'Ganang Bagus', 'DRXCFTGU45678', 'WER56TFCVHBJN', 'STDRCFVG5678', '4567TYUI', 1),
('081311633008', 'Noor Iksan', '23456FGHJ', 'RTYUXCVB', '56789VBNMSDF', '1234', 1),
('081311633009', 'Faiz Akmal', 'WERTY45678', '4567GHBNSDFRT78', '678BNM', '23456CVBN', 1),
('081311633010', 'Evy Dwi Cahyati', 'QWERTCVBN', 'ERTYUBNM', 'WEQRTHBJM', '3456QWER', 1),
('081311633071', 'Ayu Roosa', 'Alayar', '08122388123', 'ala@taga.com', '1234', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `Jabatan` text NOT NULL,
  `id_roles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`Jabatan`, `id_roles`) VALUES
('Kaprodi', 'D002'),
('KoorSkripsi', 'D001'),
('TU', 'TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE IF NOT EXISTS `skripsi` (
`id_skripsi` int(11) NOT NULL,
  `Judul` text NOT NULL,
  `KBK` text NOT NULL,
  `Topik` text NOT NULL,
  `NIM` text NOT NULL,
  `NIK1` text NOT NULL,
  `NIK2` text NOT NULL,
  `TahunAjar` int(4) NOT NULL,
  `TanggalTopik` date NOT NULL,
  `TanggalProp` date NOT NULL,
  `TanggalSkripsi` date NOT NULL,
  `id_jadwal` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `Judul`, `KBK`, `Topik`, `NIM`, `NIK1`, `NIK2`, `TahunAjar`, `TanggalTopik`, `TanggalProp`, `TanggalSkripsi`, `id_jadwal`) VALUES
(1, 'Sistem SMA 70', 'Rekayasa Sistem Informasi', 'TATA KELOLA', '081311633001', 'D001', 'D002', 2013, '2016-05-04', '0000-00-00', '0000-00-00', ''),
(3, 'KNN Flu Burung', 'Data Mining', 'WZEXRCTFVGYBH', '081311633003', 'D003', 'D001', 2013, '2016-07-05', '2016-08-05', '2016-09-05', 'J004'),
(4, 'Sistem Penentuan Mobil', 'Sistem Pendukung Keputusan', 'DFGHJ', '081311633004', 'D005', 'D003', 2014, '2016-05-06', '2016-05-27', '2016-05-31', 'J005'),
(5, 'Sistem Penetuan Motor', 'Sistem Pendukung Keputusan', 'DRFGH', '081311633005', 'D003', 'D004', 2014, '2016-05-01', '2016-05-02', '0000-00-00', 'J005'),
(7, 'Sistem Penentuan Laptop', 'Sistem Pendukung Keputusan', 'FCGVHB', '081311633007', 'D003', 'D004', 2015, '2016-05-10', '2016-05-17', '0000-00-00', 'J007'),
(11, 'Audit Data', 'Data Mining', 'Tata Kelola', '081311633008', 'Badrus Zaman', 'Eto Purwanto', 2013, '2016-06-13', '0000-00-00', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunajar`
--

CREATE TABLE IF NOT EXISTS `tahunajar` (
  `TahunAjar` int(11) NOT NULL,
  `Kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunajar`
--

INSERT INTO `tahunajar` (`TahunAjar`, `Kuota`) VALUES
(2016, 5),
(2016, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
 ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
 ADD PRIMARY KEY (`id_skripsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
