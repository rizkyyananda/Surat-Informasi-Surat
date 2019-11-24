-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 08:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `disposisi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `disposisi`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Balai', '2019-11-08 18:20:08', '2019-11-08 18:20:08'),
(2, 'Kasubag Umum', '2019-11-08 20:20:57', '2019-11-08 20:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_06_17_070037_create_anggotas_table', 1),
(3, '2018_06_17_130244_create_bukus_table', 1),
(4, '2018_06_18_014155_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `tempat_tujuan` text NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `isi_surat` text NOT NULL,
  `tebusan` text NOT NULL,
  `review` text,
  `disposisi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id`, `nomor_surat`, `sifat_surat`, `lampiran`, `hal`, `tujuan_surat`, `tempat_tujuan`, `alamat_tujuan`, `isi_surat`, `tebusan`, `review`, `disposisi`, `created_at`, `updated_at`) VALUES
(5, 'No : 01.001/SMK-AI/VIII/2017', 'Penting', '-', 'Sangat Penting', 'Dekan Fakultas Sains  dan Teknologi', 'Universitas Islam Negeri Sultan Syarif Kasim Riau', 'Pekanbaru', 'Sehubungan dengan akan berakhirnya kalender akademik semester ganjil SMK Memajukan Masa Depan Tahun Pelajaran 2017/2018, maka akan dilaksanakan kegiatan Penilaian akhir (PAS) semester ganjil pada tanggal 31 oktober 2018 sampai dengan 8 November 2018. Sehubungan dengan hal tersebut diatas, maka dengan ini siswa diwajibkan membayar biaya administrasi kegiatan sebesar Rp. 50.000 (Lima Puluh Ribu Rupiah). Pembayaran dapat dilakukan melalui transfer Rekening Bank MNB dengan nomor rekening xxxx paling lambat 30 Oktober 2018.', '-', NULL, '', '2019-11-21 17:22:44', '2019-11-17 08:19:38'),
(8, '110928', 'Penting', '-', 'sangat Penting', '110928', 'Pekanbaru', 'Sudirman', 'surat Keluar', '-', 'perbaiki typo', 'Kepala Bbksda', '2019-11-24 07:02:40', '2019-11-24 00:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_terima` date NOT NULL,
  `gambar` text,
  `nama_pengirim` varchar(50) NOT NULL,
  `disposisi` varchar(20) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `nama_instansi`, `no_surat`, `tgl_terima`, `gambar`, `nama_pengirim`, `disposisi`, `isi_disposisi`, `created_at`, `updated_at`) VALUES
(8, 'PT. Sprint Asia Teknologi', '1113131', '2019-11-16', '89531-2019-11-23-05-46-12.jpeg', 'Rizky', 'Kabag TU', 'Disposisi', '2019-11-24 04:19:36', '2019-11-23 21:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gambar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris', 'sekretaris', 'sekretaris@gmail.com', '$2y$10$7.s1Byv0VTJiDjgd/41sY.ulBsKQuQ44wf3xUSQ5GaaFZRpTnFjyW', '46927-2019-10-30-15-38-08.png', 'sekretaris', 'Dp7TQDU9NlRHj1Uc1ot7BoTmjHpgJD2UlGlWDPvp9cEmK5Y9VQmys3k7eM7j', '2019-04-25 01:02:24', '2019-11-17 07:45:33'),
(2, 'Kepala Balai', 'kepalabalai', 'kepalabalai@gmail.com', '$2y$10$meV1uQQNGhqie/OROgNkqO3.SAqz4LfTSDHdKmtY02wa33u7DC45W', '46549-2019-11-23-06-02-16.png', 'Kepala Bbksda', '1xlL2z4IBDvJxchARpD2PSg0HMyQtD02QDPytraxmANEY2MatH0hXBXCmdOk', '2019-11-22 23:02:16', '2019-11-22 23:02:16'),
(3, 'Tu', 'tu', 'tu@gmail.com', '$2y$10$yIKzkqgFyDG/QliqvjOxn.Ap3AR5NN5hn0lhijoBQayyqQ3IVVSg.', '90891-2019-11-24-03-21-44.png', 'Kabag TU', 'SHsQsKr1kcuI4dnF6cLqZfoFVbPJ9FQssFwZzD2CB8NMGNk0B23nF5KlO6oA', '2019-11-23 20:21:44', '2019-11-23 20:21:44'),
(4, 'Oke Punya', 'staff1', 'staff1@gmail.com', '$2y$10$PuRnvW9X35f25DJeFHvKM.z1fVlla/NDBJKuRJeOiZazZ9k41wwhW', '21600-2019-11-24-07-13-46.jpg', 'Staff', 'g2lg5r4NCxIc61IjhZXcuegHsnRdeu5goMBJ4ejyZ5fG8WOp73t9uo9yDLMY', '2019-11-24 00:13:47', '2019-11-24 00:17:01'),
(5, 'saya punya', 'pelayanan', 'pelyanan@gmail.com', '$2y$10$O.r/h4CuGX2sFiECD0rAUejlSZCpdIElAMZO.tl2lqZ1PcF4MmKMm', '54879-2019-11-24-07-26-13.jpg', 'Pelayanan dan Permasyarakatan', NULL, '2019-11-24 00:26:13', '2019-11-24 00:26:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
