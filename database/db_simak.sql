-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2024 pada 01.44
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
-- Database: `db_simak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `no_telp` varchar(128) DEFAULT NULL,
  `progdi` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `pendidikan_tertinggi` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `jabatan_fungsional` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `date_created`, `date_updated`, `delete_sts`) VALUES
(1, 'Fakultas Matematika dan IPA', '2024-05-31 05:30:55', NULL, 0),
(2, 'Fakultas Teknik', '2024-05-31 05:31:31', NULL, 0),
(3, 'Fakultas Ilmu Pendidikan', '2024-05-31 05:31:40', NULL, 0),
(4, 'Fakultas Bahasa dan Seni', '2024-05-31 05:31:58', NULL, 0),
(5, 'Fakultas Ilmu Sosial', '2024-05-31 05:32:05', NULL, 0),
(6, 'Fakultas Ilmu Olahraga', '2024-05-31 05:32:11', NULL, 0),
(7, 'Fakultas Ekonomi', '2024-05-31 05:32:17', NULL, 0),
(8, 'Fakultas Pendidikan Psikologi', '2024-05-31 05:32:22', NULL, 0),
(9, 'Program Pascasarjana', '2024-05-31 05:32:30', NULL, 0),
(10, 'testss', '2024-05-31 05:43:33', '2024-05-31 05:47:21', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `nama_matakuliah` varchar(100) DEFAULT NULL,
  `kode_matakuliah` varchar(126) DEFAULT NULL,
  `jml_sks` int(11) DEFAULT NULL,
  `jurusan` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_1`
--

CREATE TABLE `menu_level_1` (
  `id_menu_level_1` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `menu_name` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_2`
--

CREATE TABLE `menu_level_2` (
  `id_menu_level_2` int(11) NOT NULL,
  `id_menu_level_1` int(11) DEFAULT NULL,
  `menu_name` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `sub_status` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_3`
--

CREATE TABLE `menu_level_3` (
  `id_menu_level_3` int(11) NOT NULL,
  `id_menu_level_2` int(11) DEFAULT NULL,
  `menu_name` varchar(128) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_mata_kuliah`
--

CREATE TABLE `pendaftaran_mata_kuliah` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_matakuliah` int(11) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program_studi` int(11) NOT NULL,
  `nama_program_studi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(10) DEFAULT NULL,
  `akreditasi` varchar(2) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id_program_studi`, `nama_program_studi`, `jenjang`, `akreditasi`, `id_fakultas`, `date_created`, `date_updated`, `delete_sts`) VALUES
(1, 'Biologi', 'S1', 'A', 1, '2024-06-02 10:47:44', NULL, 0),
(2, 'Pendidikan Matematika', 'S1', 'A', 1, '2024-06-02 10:48:15', NULL, 0),
(3, 'Matematika', 'S1', 'A', 1, '2024-06-02 10:48:42', NULL, 0),
(4, 'Ilmu Komputer', 'S1', 'A', 1, '2024-06-02 10:48:57', NULL, 0),
(5, 'Keguruan &amp; Pendidikan', 'S1', 'A', 1, '2024-06-02 10:49:14', NULL, 0),
(6, 'Kimia', 'S1', 'A', 1, '2024-06-02 10:49:25', NULL, 0),
(7, 'Fisika', 'S1', 'A', 1, '2024-06-02 10:49:35', NULL, 0),
(8, 'Statistika', 'S1', 'A', 1, '2024-06-02 10:49:45', NULL, 0),
(9, 'Keguruan &amp; Pendidikan', 'S1', 'A', 2, '2024-06-02 10:50:02', NULL, 0),
(10, 'Teknik Elektro', 'S1', 'A', 2, '2024-06-02 10:50:16', NULL, 0),
(11, 'Teknik Mesin', 'S1', 'A', 2, '2024-06-02 10:50:27', NULL, 0),
(12, 'Teknik Sipil', 'S1', 'A', 2, '2024-06-02 10:50:42', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `date_of_birth`, `gender`, `phone`, `username`, `email`, `password`, `id_role`, `is_active`, `date_created`, `date_updated`, `delete_sts`) VALUES
(1, 'Super Admin UNJ', '1997-05-01 19:22:08', 'Laki-Laki', '08569856214', 'superadmin', 'superadmin@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 1, 1, '2024-05-21 19:22:08', '2024-05-21 19:22:08', 0),
(2, 'admin UNJ', '1997-05-02 19:22:08', 'Perempuan', '08974532157', 'admin', 'admin@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 2, 1, '2024-05-21 19:22:08', '2024-05-21 19:22:08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(11, 1, 2),
(12, 2, 3),
(13, 1, 3),
(16, 1, 9),
(21, 3, 9),
(22, 3, 7),
(23, 3, 8),
(26, 2, 0),
(29, 2, 12),
(30, 2, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_sub_menu`
--

CREATE TABLE `user_has_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_has_sub_menu`
--

INSERT INTO `user_has_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `status_sub`, `date_created`) VALUES
(1, 1, 'Role', 'admin/role', 'fal fa-fw fa-list', 1, 1, '2022-07-06 00:00:00'),
(3, 1, 'Management User', 'admin/user', 'fal fa-fw fa-user', 1, 1, '2022-07-06 00:00:00'),
(4, 3, 'Menu Management', '-', 'fal fa-fw fa-bars', 1, 0, '2022-08-02 20:30:48'),
(10, 5, 'Pendataan UMKM', 'pendataanumkm/cpendataanumkm', 'fal fa-fw fa-barcode', 1, 1, '2023-04-07 13:45:56'),
(11, 6, 'Pengujian', 'naivebayes/datauji', 'fal fa-fw fa-pen', 1, 1, '2023-04-08 14:13:58'),
(15, 9, 'Hasil Perhitungan', 'laporan/hitung', '-', 1, 1, '2024-05-19 08:10:38'),
(16, 9, 'Rangking', 'laporan/rangking', '-', 1, 1, '2024-05-19 08:15:31'),
(17, 7, 'Penilaian', 'nilai', '-', 1, 1, '2024-05-19 10:01:50'),
(18, 8, 'Perhitungan', 'hitung', '-', 1, 1, '2024-05-19 10:02:36'),
(19, 10, 'Setting', 'user/setting', '-', 1, 1, '2024-05-19 20:59:15'),
(20, 0, 'Fakultas', 'fakultas', '-', 1, 1, '2024-05-21 21:46:20'),
(21, 0, 'Program Studi', 'programstudi', '-', 1, 1, '2024-05-21 21:48:28'),
(22, 12, 'Data Mahasiswa', 'mahasiswa', '-', 1, 1, '2024-05-21 21:52:59'),
(23, 22, 'Data Dosen', 'dosen', '-', 1, 1, '2024-05-21 21:53:20'),
(24, 11, 'Fakultas', 'fakultas', '-', 1, 1, '2024-05-21 21:53:57'),
(25, 11, 'Program Studi', 'programstudi', '-', 1, 1, '2024-05-21 21:54:21'),
(26, 23, 'Mata Kuliah', 'matakuliah', '-', 1, 1, '2024-05-21 21:58:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_nama`, `date_created`) VALUES
(1, 'Admin', 'Super Admin', '2022-06-14 00:00:00'),
(2, 'User', 'User', '2022-06-14 00:00:00'),
(3, 'Master', 'Master', '2022-08-02 20:22:27'),
(5, 'pendataanumkm', 'Data UMKM', '2023-04-07 13:40:22'),
(6, 'naivebayes', 'Kelayakan', '2023-04-08 13:39:38'),
(7, 'nilai', 'Penilaian', '2024-05-19 08:08:30'),
(8, 'hitung', 'Perhitungan', '2024-05-19 08:08:53'),
(9, 'laporan/hitung', 'Laporan', '2024-05-19 08:09:37'),
(10, 'setting', 'Setting', '2024-05-19 20:48:50'),
(11, 'programstudi', 'Program Studi', '2024-05-21 21:44:29'),
(12, 'mahasiswa', 'Mahasiswa', '2024-05-21 21:49:10'),
(22, 'dosen', 'Dosen', '2024-05-21 21:52:28'),
(23, 'matakuliah', 'Mata Kuliah', '2024-05-21 21:58:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Dosen'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `has_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `has_sub_menu_id`, `title`, `url`, `icon`, `is_active`, `date_created`) VALUES
(1, 1, 4, 'Menu Management (Level 1)', 'master/menulevel1', 'fal fa-fw fa-folder', 1, '2022-07-06 00:00:00'),
(2, 1, 4, 'Submenu Management (Level 2)', 'master/menulevel2', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00'),
(3, 1, 4, 'Submenu Management (Level 3)', 'master/menulevel3', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indeks untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  ADD PRIMARY KEY (`id_menu_level_1`);

--
-- Indeks untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  ADD PRIMARY KEY (`id_menu_level_2`);

--
-- Indeks untuk tabel `menu_level_3`
--
ALTER TABLE `menu_level_3`
  ADD PRIMARY KEY (`id_menu_level_3`);

--
-- Indeks untuk tabel `pendaftaran_mata_kuliah`
--
ALTER TABLE `pendaftaran_mata_kuliah`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program_studi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  MODIFY `id_menu_level_1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  MODIFY `id_menu_level_2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_level_3`
--
ALTER TABLE `menu_level_3`
  MODIFY `id_menu_level_3` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_mata_kuliah`
--
ALTER TABLE `pendaftaran_mata_kuliah`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_program_studi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
