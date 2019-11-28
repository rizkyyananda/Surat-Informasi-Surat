-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 05:51 PM
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
  `status` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id`, `nomor_surat`, `sifat_surat`, `lampiran`, `hal`, `tujuan_surat`, `tempat_tujuan`, `alamat_tujuan`, `isi_surat`, `tebusan`, `review`, `disposisi`, `status`, `created_at`, `updated_at`) VALUES
(5, 'No : 01.001/SMK-AI/VIII/2017', 'Penting', '-', 'Sangat Penting', 'No : 01.001/SMK-AI/VIII/2017', 'Universitas Islam Negeri Sultan Syarif Kasim Riau', 'Pekanbaru', 'Sehubungan dengan akan berakhirnya kalender akademik semester ganjil SMK Memajukan Masa Depan Tahun Pelajaran 2017/2018, maka akan dilaksanakan kegiatan Penilaian akhir (PAS) semester ganjil pada tanggal 31 oktober 2018 sampai dengan 8 November 2018. Sehubungan dengan hal tersebut diatas, maka dengan ini siswa diwajibkan membayar biaya administrasi kegiatan sebesar Rp. 50.000 (Lima Puluh Ribu Rupiah). Pembayaran dapat dilakukan melalui transfer Rekening Bank MNB dengan nomor rekening xxxx paling lambat 30 Oktober 2018.', '-', '-aa', 'Kepala Bbksda', 'Terima', '2019-11-28 15:32:42', '2019-11-28 08:32:42');

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
  `disposisi` varchar(255) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `nama_instansi`, `no_surat`, `tgl_terima`, `gambar`, `nama_pengirim`, `disposisi`, `isi_disposisi`, `created_at`, `updated_at`) VALUES
(8, 'PT. Sprint Asia Teknologi', '1113131', '2019-11-16', '89531-2019-11-23-05-46-12.jpeg', 'Rizkya', 'Kepala Bbksda', 'Disposisi', '2019-11-28 03:59:43', '2019-11-27 20:59:43'),
(9, 'PT. Sprint Asia Teknologi', 'sasas', '2019-11-22', '34504-2019-11-26-18-35-11.JPG', 'sasa', 'PjP2', 'ddasa', '2019-11-26 18:39:28', '2019-11-26 11:36:54'),
(10, 'KAJhdjaha', 'jdsjsdhf', '2019-11-28', '81247-2019-11-28-14-29-02.JPG', 'Rizky', 'PjP3', 'ini adalah surat masuk', '2019-11-28 15:26:01', '2019-11-28 08:26:01'),
(11, 'PT. Sprint Asia Teknologi', 'dasda', '2019-11-29', '96576-2019-11-28-15-41-47.jpg', 'Rizky', 'PjP2 Rizky Yananda', 'ini adalah surat masuk', '2019-11-28 15:56:48', '2019-11-28 08:46:07');

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
  `sub_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gambar`, `level`, `sub_jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris', 'Sekretaris', 'sekretaris@gmail.com', '$2y$10$7.s1Byv0VTJiDjgd/41sY.ulBsKQuQ44wf3xUSQ5GaaFZRpTnFjyW', '46927-2019-10-30-15-38-08.png', 'Sekretaris', '', 't56NT57Vq300ccyWBrazZtqrp9pdpVKq0I4vakEuEwpmjRteWhs9xdMeW23C', '2019-04-25 01:02:24', '2019-11-17 07:45:33'),
(7, 'Kabag Tu', 'kabagtu', 'kabagtu@gmail.com', '$2y$10$9kDs8ETz9Lgnz/RsERN9LOWj.Kj5qfLgW8pl7tXDiDU29two4BL7S', '74977-2019-11-24-10-26-08.jpg', 'Kabag TU', '', 'cTxkUfELMiSQhjxzoF30OLlRwxCwEA7Qjwrp1NctTEGezxm2D1aSh9GG5tK4', '2019-11-24 03:26:08', '2019-11-24 03:26:08'),
(8, 'Kabid Teknis', 'kabidteknis', 'kabidteknis@gmail.com', '$2y$10$WIKEoljPwrkhIXHPJDjH2eJnkg5F8JXzQVoIX4FJzcI5crOA5Kx5.', '20299-2019-11-24-10-26-47.jpg', 'Kabid Teknis', '', 'e0izl23Zbtdkqcv425uyj2CGjO2J3zX0tDKtRNZ70kLLrxP7PSbcjql8DRN5', '2019-11-24 03:26:47', '2019-11-24 03:26:47'),
(9, 'Subag Umum', 'subagumum', 'subagumum@gmail.com', '$2y$10$7njJKMhVGKMm4HxadSv8hOVMAxrEkQwp1jtTNBXRdbpsSTQ.q3qU.', '46696-2019-11-24-10-27-46.JPG', 'Subag Umum', '', 'VdWGsu6xJa7RTxobFCJFcDpvAI2YNVgFo717NSvU1GGFnKxpQqEyvOGlrcTj', '2019-11-24 03:27:46', '2019-11-24 03:27:46'),
(10, 'Subag Evaluasi & Kehumasan', 'subagevaluasi', 'subagevaluasi@gmail.com', '$2y$10$8zt4g7TGwj3LenujcLigqe9wPz9bEsV5FQOCVl8P8WqkOuztOB2Fy', '59903-2019-11-24-10-28-28.JPG', 'Subag Evaluasi & Kehumasan', '', 'KwDuBWmp0ZPGeQaFvq1V9WkGOUkc8tOtKI9uY4hXSXL2xZGV0RVkMWM2evJM', '2019-11-24 03:28:28', '2019-11-24 03:28:28'),
(11, 'Subag Program & Kerja Sama', 'subagprogram', 'subagprogram@gmail.com', '$2y$10$NLFmvTZXJ1rGA89lCe3y2uTHMV5bL60rTv3mb4vdnsYxlno15YU0i', '92780-2019-11-24-10-29-34.JPG', 'Subag Program & Kerja Sama', '', 'iiQro3xJ7mKNLrWpr9s6X0eCrvZ85dAEpXrMKbUI3Nku7JV7XMthAbqTLp7q', '2019-11-24 03:29:34', '2019-11-24 03:29:34'),
(12, 'Subag P2', 'subagp2', 'subagp2@gmail.com', '$2y$10$Lzg8MLXW9cuWNZCnlQpXvuzDI5pkx3UgtuQlHe6XoP1887HUWNgqy', '72774-2019-11-24-10-30-08.jpg', 'Subag P2', '', 'RXhFmrjwIwgbbOfjWMIU0Bq9Sq7OYACARDyNjewg7Gnyk73sbVuUux9Gssbu', '2019-11-24 03:30:08', '2019-11-24 03:30:08'),
(13, 'Subag P3', 'subagp3', 'subagp3@gmail.com', '$2y$10$OZN8SWF67YWJoce9W2H4nOPmjn2gxTc8w0q6ztHQvani868DVBAZy', '45477-2019-11-24-10-30-43.JPG', 'Subag P3', '', 'rR891tPvFMyxyXIG3ZXObIMJZJmVB9UevNRmodfqmZTPC4oZ9rzrs4bMzluN', '2019-11-24 03:30:43', '2019-11-24 03:30:43'),
(14, 'Pj Umum', 'pjumum', 'pjumum@gmail.com', '$2y$10$8iqPfvwmvGsaJsgWXn3x6u6OuYr2CpbmEynMG0pZ4pwDB7kiNZ00W', '28539-2019-11-24-10-31-20.JPG', 'Pj Umum', '', '4JhNGOehhK9RaOfg1WwP1SqgCQdNxvQaObI5872QhAciOmvuJH6IQFqRCp3F', '2019-11-24 03:31:20', '2019-11-24 03:31:20'),
(15, 'Pj Evaluasi & Kehumasan', 'pjevaluasi', 'pjevaluasi@gmail.com', '$2y$10$gSzXdXxpLbp2WWdhXd70Jujn7QKzpRdOtE0B7FsORQYCDjp0rLs.i', '29950-2019-11-24-10-32-14.JPG', 'Pj Evaluasi & Kehumasan', '', 'GhDWPkLWG2CIriDhLQ9lPt6JVnYDRfilrbrX1QgME4gjuaeEDlAIOzZUXTTW', '2019-11-24 03:32:14', '2019-11-26 05:40:56'),
(16, 'Pj Program & Kerja Sama', 'pjprogram', 'pjprogram@gmail.com', '$2y$10$9MWXPHoyIDZP1gZAXq.rXOupSE50k1.NtPmh1I5x4tG7X/DYoYXlG', '41222-2019-11-24-10-32-59.JPG', 'Pj Program & Kerja Sama', '', 'moNtmQg7TYCFANA2318NwLGjUZm2lGGAXbsBre6ibboQxdGFfdLHUjRlug62', '2019-11-24 03:32:59', '2019-11-24 03:32:59'),
(17, 'Pj P2', 'pjp2', 'pjp2@gmail.com', '$2y$10$YR0dYO1PMuYPcNJ11ajeZ.KH2fjjySybHe3MGev/moRnmgvz1cOPa', '55557-2019-11-24-10-33-38.JPG', 'PjP2', '', 'uk2Uo0o1fWAVVRcYzdVPW5Nd63gt3JSW7exJ7vVVLrNS9NLtsYReYjadxk6R', '2019-11-24 03:33:38', '2019-11-24 03:33:38'),
(18, 'Pj P3', 'pjp3', 'pjp3@gmail.com', '$2y$10$C7idM4xh0BQmI4g/caC9ee.juRJ9Ab7PuFhglm2l7OYrLfoYFWPe.', '91042-2019-11-24-10-34-14.JPG', 'PjP3', '', 'DgDPDUROWOCRe8V8OV7O4LIilKB0VNtCnqHFt14J6qUXFLHt4vCbWn25GQ8l', '2019-11-24 03:34:14', '2019-11-24 03:34:14'),
(21, 'Kepala Plh Bbksda', 'kepalabalai', 'kepalabalai@gmail.com', '$2y$10$N.83s5bzrDm70z6wSdFLnezM8PQRZe.pkFlIRXgNn5ACuI/TBb2qe', '45097-2019-11-24-13-40-14.JPG', 'Kepala Bbksda', '', 'x7YYMXeRUjUgImTwNXCIENENBxsO2jaJ4aiaIkQSn6bG9aTw0L1wjutCezs1', '2019-11-24 06:40:15', '2019-11-24 06:40:15'),
(43, 'Oke Punya', 'oke', 'oke@gmail.com', '$2y$10$N5Z4v/lKWtZSkk1tp7ouXeKsvaBrvzzXzb8Bg.BCMbmE.thTobKxW', '70816-2019-11-28-16-45-35.jpg', 'Pj Umum', 'Subag Umum', NULL, '2019-11-28 09:45:35', '2019-11-28 09:45:35'),
(44, 'sasa', 'sasasa', 'sasasas@gmail.com', '$2y$10$5WOWwZzoLOqXLSFl7xHituzIqjKhELZYQKUXCFc8CWcYrPhUnD9g.', '96942-2019-11-28-16-47-36.jpg', 'PjP2', 'Subag P2', NULL, '2019-11-28 09:47:36', '2019-11-28 09:50:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
