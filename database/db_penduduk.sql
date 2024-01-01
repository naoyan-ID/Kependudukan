-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 01.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(1, 1, 2, 'Kepala Keluarga'),
(2, 1, 1, 'Anak'),
(3, 1, 3, 'Anak'),
(4, 2, 4, 'Kepala Keluarga'),
(5, 2, 5, 'Istri'),
(6, 2, 6, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`) VALUES
(1, '3172293293923925', 'Nurohman', 'Laki-Laki', '2023-07-20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `pos` varchar(10) NOT NULL,
  `kel` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `alamat`, `rt`, `rw`, `pos`, `kel`, `kec`, `kota`, `prov`) VALUES
(1, '3174042601180000', 'Titin Suprihatin', 'Gang haji Pondoh', '004', '04', '12620', 'Jagakarsa', 'Jagakarsa', '', 'DKI Jakarta'),
(2, '3174042601181111', 'Ahmad Abdurahman', 'Gang haji Pondoh', '004', '04', '12620', 'Jagakarsa', 'Jagakarsa', '', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `id_kk`) VALUES
(1, 'Ayase Naomi', 'Kyoto', '2023-06-30', 'Perempuan', 1),
(2, 'Rahmayu Ningsih', 'Jakarta', '2023-07-08', 'Perempuan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`) VALUES
(1, 3, '2023-07-21', 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('Laki-Laki','Perempuan') NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `pendidikan`, `handphone`, `alamat`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`) VALUES
(1, '3174042901010000', 'Hadiyan Nur Fikri', 'Jakarta', '2001-01-29', 'Laki-Laki', 'SMA', '087785621392', 'Gang haji Pondoh', '004', '04', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(2, '3174042901012222', 'Titin Suprihatin', 'Magetan', '1964-03-03', 'Perempuan', 'SMP', '085751107817', 'Gang haji Pondoh', '004', '04', 'Islam', 'Cerai Mati', 'Ibu Rumah Tangga', 'Ada'),
(3, '3174042901013333', 'Ayaka Freya', 'Tokyo', '2005-02-09', 'Perempuan', 'SMA', '087841507668', 'Gang haji Pondoh', '004', '04', 'Islam', 'Sudah', 'Mahasiswa', 'Meninggal'),
(4, '4728294782640001', 'Ahmad Abdurrahman', 'Solo', '1955-11-12', 'Laki-Laki', 'SMP', '081234567890', 'gang haji Pondoh', '004', '04', 'Islam', 'Sudah', 'Buruh', 'Ada'),
(5, '4728294782640002', 'Siti Rahmawati', 'Bengkulu', '1961-06-06', 'Perempuan', 'SMP', '081234567891', 'gang haji Pondoh', '004', '04', 'Islam', 'Sudah', 'Ibu Rumah Tangga', 'Ada'),
(6, '4728294782640003', 'Indah Lestari', 'Bogor', '2002-10-16', 'Perempuan', 'SMA', '081234567892', 'Gang haji Pondoh', '004', '04', 'Islam', 'Belum', 'Mahasiswa', 'Pindah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Jayadi', 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`) VALUES
(1, 6, '2023-07-13', 'Pekerjaan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indeks untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indeks untuk tabel `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
