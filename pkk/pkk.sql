-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2023 pada 16.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `jabatan_anggota` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` enum('Kawin','Belum_Kawin') NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status_anggota` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nik`, `nama_anggota`, `jabatan_anggota`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `status`, `alamat`, `pendidikan`, `pekerjaan`, `keterangan`, `id_wilayah`, `id_pengguna`, `status_anggota`) VALUES
(1, '330057896557', 'Isa Nanda F', 'Sekretaris', 'P', 'Cilacap', '2018-12-01', 'Kawin', 'Bunton', 'SMA', 'Pelajar', 'oke', 1, 1, 'aktif'),
(2, '33022882929', 'Puput', 'wakil ketua', 'P', 'Cilacap', '2018-12-20', 'Kawin', 'Kesugihan', 'SMA', 'Pelajar', 'okee', 1, 1, 'aktif'),
(3, '69', 'Vel nostrud atque mi', 'Numquam aliquip quam', 'L', 'Quidem consectetur t', '2023-08-09', 'Belum_Kawin', 'Architecto et irure', 'Voluptatem magni id', 'A explicabo Saepe i', 'Architecto enim vero', 1, 2, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluarga`
--

CREATE TABLE `detail_keluarga` (
  `id_detail_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `status` enum('Kawin','Belum_Kawin') NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(300) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pendidikan` varchar(500) NOT NULL,
  `pekerjaan` varchar(500) NOT NULL,
  `kedudukan` varchar(50) NOT NULL,
  `status_keluarga` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_keluarga`
--

INSERT INTO `detail_keluarga` (`id_detail_kk`, `no_kk`, `nik`, `nama`, `status`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `kedudukan`, `status_keluarga`) VALUES
(4, '321231231', '3123123', 'sdas', 'Kawin', 'L', 'tes', '2019-06-25', 'Islam', 'sdfsdf', 'sdfsdf', 'KepalaKK', 'aktif'),
(5, '321231231', '3123123xcv', 'sdfsdf', 'Kawin', 'L', '23sd', '2019-06-11', 'Islam', 'sdfsdf', '123', 'AnggotaKK', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(300) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `keterangan` text NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status_event` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal`, `tempat`, `foto`, `keterangan`, `id_pengguna`, `status_event`) VALUES
(1, 'Arisan', '2019-03-14 00:00:00', 'gunung simping', 'dfhsjfhnsej', 'Lorem Ipsum Dolor Sit amaet', 0, 'nonaktif'),
(2, 'jajalan', '2019-03-14 00:00:00', 'lebeng', 'nfdjsknfsjk', 'as', 0, 'nonaktif'),
(3, 'tes', '2019-06-03 14:20:00', 'teszxczxc', '1559547177.jpg', 'tesewqeweqwe', 1, 'nonaktif'),
(4, 'Rem ut labore ad non', '2023-08-10 20:30:00', 'In saepe laborum Qu', '1691674282.png', 'Aliquip consequatur', 3, 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `asal_brg` varchar(191) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `peyimpanan` varchar(191) NOT NULL,
  `kondisi` enum('Bagus','Rusak','','') NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_barang`, `nama_barang`, `asal_brg`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah`, `peyimpanan`, `kondisi`, `keterangan`) VALUES
(4, 'lajhbhvfgu', 'hojihvg', '2023-08-09', '2023-08-24', 13, 'asa', 'Bagus', '2as'),
(5, 'Corporis rem in aute', 'Incididunt laborum v', '0000-00-00', '0000-00-00', 91, 'Neque facilis ut ad ', 'Rusak', 'Ut fugit consectetu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kader`
--

CREATE TABLE `kader` (
  `id_kader` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jabatan_kader` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status_kader` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kader`
--

INSERT INTO `kader` (`id_kader`, `id_anggota`, `jabatan_kader`, `keterangan`, `id_pengguna`, `status_kader`) VALUES
(3, 1, 'Tes', 'tes', 1, 'aktif'),
(4, 1, 'Teszxczxc', 'tesasdasd', 1, 'aktif'),
(5, 1, 'Harum mollitia id q', 'as', 3, 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_keluarga`
--

CREATE TABLE `kegiatan_keluarga` (
  `id_kegiatan_keluarga` int(11) NOT NULL,
  `id_kegiatan_pkk` int(11) NOT NULL,
  `id_detail_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kegiatan_keluarga`
--

INSERT INTO `kegiatan_keluarga` (`id_kegiatan_keluarga`, `id_kegiatan_pkk`, `id_detail_kk`) VALUES
(11, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_pkk`
--

CREATE TABLE `kegiatan_pkk` (
  `id_kegiatan_pkk` int(11) NOT NULL,
  `nama_kegiatan` varchar(500) NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kegiatan_pkk`
--

INSERT INTO `kegiatan_pkk` (`id_kegiatan_pkk`, `nama_kegiatan`, `tempat_kegiatan`, `tanggal_kegiatan`, `keterangan`) VALUES
(2, 'Pelatihan Membuat Anak', 'Balai Desa', '2019-06-14', 'Ba\'da Subuhas'),
(3, 'as', 'as', '2023-08-22', 'asas'),
(4, 'Praesentium porro ex', 'Neque sit laudantium', '2023-08-22', 'Autem sunt perferen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `no_kk` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status_keluarga` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `keterangan`, `id_wilayah`, `id_pengguna`, `tanggal`, `status_keluarga`) VALUES
('14', 'Eveniet ea sunt sed', 1, 2, '2023-08-10', 'aktif'),
('321231231', 'tes', 1, 1, '2019-06-03', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `tanggal1` date NOT NULL,
  `sumber_dana1` varchar(50) NOT NULL,
  `uraian1` varchar(191) NOT NULL,
  `no_bukti_kas1` varchar(191) NOT NULL,
  `jml_penerimaan` float NOT NULL,
  `no_urut_pengeluaran` int(11) NOT NULL,
  `tanggal2` date NOT NULL,
  `sumber_dana2` varchar(191) NOT NULL,
  `uraian2` varchar(191) NOT NULL,
  `no_bukti_kas2` int(11) NOT NULL,
  `jml_pengeluaran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal1`, `sumber_dana1`, `uraian1`, `no_bukti_kas1`, `jml_penerimaan`, `no_urut_pengeluaran`, `tanggal2`, `sumber_dana2`, `uraian2`, `no_bukti_kas2`, `jml_pengeluaran`) VALUES
(2, '2023-09-28', '31', 'Assumenda dicta veni', 'Voluptate architecto', 66, 0, '1998-06-07', '21', 'Omnis do ut aute sed', 0, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  `status_pengguna` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_anggota`, `username`, `password`, `hak_akses`, `status_pengguna`) VALUES
(1, 2, 'ketua', '$2y$10$g2D5nSI5EHa/93kKYvjXnuBRX2q5jdBw9CTj3KeVopRGOCaGLniCi', 'Ketua', 'aktif'),
(2, 1, 'dasawisma', '$2y$10$0GQxVvspJwHocoUPkrq1Teo9O/WeL9q8h4BHWr5JxctptWRixi/5e', 'Dasawisma', 'aktif'),
(3, 1, 'sekretaris', '$2y$10$RUP7FKSMmc4OQTtOaPhSw.4mIhEkalJimgtNMVtqNyFsb.T6SPsYG', 'Sekretaris_PKK', 'aktif'),
(4, 1, 'bendahara', '$2y$10$RUP7FKSMmc4OQTtOaPhSw.4mIhEkalJimgtNMVtqNyFsb.T6SPsYG', 'Bendahara', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(200) NOT NULL,
  `alamat_wilayah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `alamat_wilayah`) VALUES
(1, 'Dusun Karangsari1', 'RT 02 - 05 RW 03 Desa Bunton');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `detail_keluarga`
--
ALTER TABLE `detail_keluarga`
  ADD PRIMARY KEY (`id_detail_kk`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `no_kk_2` (`no_kk`),
  ADD KEY `no_kk_3` (`no_kk`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id_kader`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `kegiatan_keluarga`
--
ALTER TABLE `kegiatan_keluarga`
  ADD PRIMARY KEY (`id_kegiatan_keluarga`),
  ADD KEY `id_kegiatan_pkk` (`id_kegiatan_pkk`),
  ADD KEY `id_detail_kk` (`id_detail_kk`);

--
-- Indeks untuk tabel `kegiatan_pkk`
--
ALTER TABLE `kegiatan_pkk`
  ADD PRIMARY KEY (`id_kegiatan_pkk`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_keluarga`
--
ALTER TABLE `detail_keluarga`
  MODIFY `id_detail_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kader`
--
ALTER TABLE `kader`
  MODIFY `id_kader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_keluarga`
--
ALTER TABLE `kegiatan_keluarga`
  MODIFY `id_kegiatan_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pkk`
--
ALTER TABLE `kegiatan_pkk`
  MODIFY `id_kegiatan_pkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_keluarga`
--
ALTER TABLE `detail_keluarga`
  ADD CONSTRAINT `detail_keluarga_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kader`
--
ALTER TABLE `kader`
  ADD CONSTRAINT `kader_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kader_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_keluarga`
--
ALTER TABLE `kegiatan_keluarga`
  ADD CONSTRAINT `kegiatan_keluarga_ibfk_1` FOREIGN KEY (`id_kegiatan_pkk`) REFERENCES `kegiatan_pkk` (`id_kegiatan_pkk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_keluarga_ibfk_2` FOREIGN KEY (`id_detail_kk`) REFERENCES `detail_keluarga` (`id_detail_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
