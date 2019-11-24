-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 03:00 PM
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
(8, '110928', 'Penting', '-', 'sangat Penting', '110928', 'Pekanbaru', 'Sudirman', 'surat Keluar', '-', 'Perbaiki Ini dan itu', 'Subag P2', '2019-11-24 13:43:33', '2019-11-24 06:43:33');

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
(1, 'Sekretaris', 'Sekretaris', 'sekretaris@gmail.com', '$2y$10$7.s1Byv0VTJiDjgd/41sY.ulBsKQuQ44wf3xUSQ5GaaFZRpTnFjyW', '46927-2019-10-30-15-38-08.png', 'Sekretaris', 'LD9zg7qR7UcfVZS8U9FOKV6Rgo4Y7UMe9pOl248LTSiTtJbB6tlHZl8sXpyU', '2019-04-25 01:02:24', '2019-11-17 07:45:33'),
(7, 'Kabag Tu', 'kabagtu', 'kabagtu@gmail.com', '$2y$10$9kDs8ETz9Lgnz/RsERN9LOWj.Kj5qfLgW8pl7tXDiDU29two4BL7S', '74977-2019-11-24-10-26-08.jpg', 'Kabag TU', 'Af2DK97IFReXhTYGdNfHajCkJ50Zde1oDCMzpPYyOad4zmndxOe6RXbzuRCm', '2019-11-24 03:26:08', '2019-11-24 03:26:08'),
(8, 'Kabid Teknis', 'kabidteknis', 'kabidteknis@gmail.com', '$2y$10$WIKEoljPwrkhIXHPJDjH2eJnkg5F8JXzQVoIX4FJzcI5crOA5Kx5.', '20299-2019-11-24-10-26-47.jpg', 'Kabid Teknis', 'WGPCu0cXDEo40Xnlo5FIFRveSywlkEAE7zhPfIOKLZftvBvjrVwSPVZlfGct', '2019-11-24 03:26:47', '2019-11-24 03:26:47'),
(9, 'Subag Umum', 'subagumum', 'subagumum@gmail.com', '$2y$10$7njJKMhVGKMm4HxadSv8hOVMAxrEkQwp1jtTNBXRdbpsSTQ.q3qU.', '46696-2019-11-24-10-27-46.JPG', 'Subag Umum', 'e250uZyW90YWlvRiAoNLQVeqzCfP1yqDeVhvwvbbKFJpbabLveTQB1iD495S', '2019-11-24 03:27:46', '2019-11-24 03:27:46'),
(10, 'Subag Evaluasi & Kehumasan', 'subagevaluasi', 'subagevaluasi@gmail.com', '$2y$10$8zt4g7TGwj3LenujcLigqe9wPz9bEsV5FQOCVl8P8WqkOuztOB2Fy', '59903-2019-11-24-10-28-28.JPG', 'Subag Evaluasi & Kehumasan', 'kIoVSYdxKWciAlSoe7IswDBMNorhNetmamRTO4NueCkmtEYzG70auU3ydooW', '2019-11-24 03:28:28', '2019-11-24 03:28:28'),
(11, 'Subag Program & Kerja Sama', 'subagprogram', 'subagprogram@gmail.com', '$2y$10$NLFmvTZXJ1rGA89lCe3y2uTHMV5bL60rTv3mb4vdnsYxlno15YU0i', '92780-2019-11-24-10-29-34.JPG', 'Subag Program & Kerja Sama', 'EVaOjRjN2RvDpihXdBSkHgPveq5lQGSrHP0rj9gc0LZ8T4RJhaHSaaZ3XjEc', '2019-11-24 03:29:34', '2019-11-24 03:29:34'),
(12, 'Subag P2', 'subagp2', 'subagp2@gmail.com', '$2y$10$Lzg8MLXW9cuWNZCnlQpXvuzDI5pkx3UgtuQlHe6XoP1887HUWNgqy', '72774-2019-11-24-10-30-08.jpg', 'Subag P2', 'jzWaljYxNUNXSfuzmQx1lm7YTR6VnVqmCxK3j3W0djP15Qb3e7t64YCc8OcB', '2019-11-24 03:30:08', '2019-11-24 03:30:08'),
(13, 'Subag P3', 'subagp3', 'subagp3@gmail.com', '$2y$10$OZN8SWF67YWJoce9W2H4nOPmjn2gxTc8w0q6ztHQvani868DVBAZy', '45477-2019-11-24-10-30-43.JPG', 'Subag P3', 'HZISUkOt7axdSOKMzyzLsTJdw77wq2R8qRdmhJOYeLV5jNK4GseOpA9GgLhh', '2019-11-24 03:30:43', '2019-11-24 03:30:43'),
(14, 'Pj Umum', 'pjumum', 'pjumum@gmail.com', '$2y$10$8iqPfvwmvGsaJsgWXn3x6u6OuYr2CpbmEynMG0pZ4pwDB7kiNZ00W', '28539-2019-11-24-10-31-20.JPG', 'Pj Umum', 'B3e2wfGnRSjEHp7ThZcgxuDwWVpsIp5MoRGSDcPkPrPlY5K70JPtkrlv33cr', '2019-11-24 03:31:20', '2019-11-24 03:31:20'),
(15, 'Pj Evaluasi & Kehumasan', 'pjevaluasi', 'pjevaluasi@gmail.com', '$2y$10$5Ldday2B3MzLt6L4B0tlfugl9KjQ79NwYTZKLrztA9hI2rdGJMECC', '29950-2019-11-24-10-32-14.JPG', 'Pj Evaluasi & Kehumasan', '6WWjXKGCJWv99FGpuXehM1PEiSCZlft6q36pGWm8wqJyTe0QOiawgZNMZgRm', '2019-11-24 03:32:14', '2019-11-24 03:32:14'),
(16, 'Pj Program & Kerja Sama', 'pjprogram', 'pjprogram@gmail.com', '$2y$10$9MWXPHoyIDZP1gZAXq.rXOupSE50k1.NtPmh1I5x4tG7X/DYoYXlG', '41222-2019-11-24-10-32-59.JPG', 'Pj Program & Kerja Sama', 'd8J9IXy7mJ5Hyp1riPKwqRhc3lpINMsHMWKhbdiTMzcTooSbSvae5CNyyEti', '2019-11-24 03:32:59', '2019-11-24 03:32:59'),
(17, 'Pj P2', 'pjp2', 'pjp2@gmail.com', '$2y$10$YR0dYO1PMuYPcNJ11ajeZ.KH2fjjySybHe3MGev/moRnmgvz1cOPa', '55557-2019-11-24-10-33-38.JPG', 'PjP2', 'oA43tXBBzOx0c2PDVjIUr8q1SZCLuIAZDHLH0Ln9Mrq69Q41FOSpdayWpG89', '2019-11-24 03:33:38', '2019-11-24 03:33:38'),
(18, 'Pj P3', 'pjp3', 'pjp3@gmail.com', '$2y$10$C7idM4xh0BQmI4g/caC9ee.juRJ9Ab7PuFhglm2l7OYrLfoYFWPe.', '91042-2019-11-24-10-34-14.JPG', 'PjP3', 'JOBujLVBSQEN1YFY0YkUvnnNnXuB64HdqLM0m6Od96ujdyr8GSX0MjIVGDEP', '2019-11-24 03:34:14', '2019-11-24 03:34:14'),
(21, 'Kepala Plh Bbksda', 'kepalabalai', 'kepalabalai@gmail.com', '$2y$10$N.83s5bzrDm70z6wSdFLnezM8PQRZe.pkFlIRXgNn5ACuI/TBb2qe', '45097-2019-11-24-13-40-14.JPG', 'Kepala Bbksda', 'IoRfnxBgh759QbTeqC2clBELy7qiEU8NudEQaQ0jbCREsbYeKlCb254lkibq', '2019-11-24 06:40:15', '2019-11-24 06:40:15');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
