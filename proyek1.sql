-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Feb 2016 pada 15.22
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id` int(2) NOT NULL,
  `status_approval` smallint(6) NOT NULL,
  `waktu_approval` datetime NOT NULL,
  `id_semesterpendek` int(2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `baak`
--

CREATE TABLE `baak` (
  `id` int(2) NOT NULL,
  `nama_baak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhs`
--

CREATE TABLE `dhs` (
  `id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dhs`
--

INSERT INTO `dhs` (`id`, `user_id`, `semester`) VALUES
(69, 30, 4),
(70, 45, 5),
(71, 25, 4),
(72, 32, 4),
(73, 33, 4),
(74, 32, 2),
(75, 34, 5),
(76, 28, 32),
(77, 1, 4),
(78, 1, 1),
(79, 1, 1),
(80, 1, 4),
(81, 1, 1),
(82, 28, 5),
(83, 28, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(2) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `kelas`, `tanggal_lahir`, `tahun_angkatan`, `user_id`) VALUES
(23, 'Tomas Alva Edisbon', 'D4 TI 1A', '1995-02-15', 2012, '28'),
(24, 'Doni Saputra', 'D4 TI 1D', '1997-01-20', 2015, '30'),
(25, 'Duta Menkominfo', 'D4 TI 1B', '2010-01-07', 2013, '31'),
(26, 'Saputra Doni', 'D4 TI 2A', '1995-06-13', 2013, '32'),
(27, 'Rini akfjadlk', 'D4 TI 1B', '2016-01-23', 2012, '123445K'),
(28, 'sdfgsdfgjkl', 'D4 TI 1A', '2016-01-27', 2012, '3456'),
(29, 'dsfasdf', 'D4 TI 1A', '2016-01-13', 2012, '3455'),
(30, 'asdf', 'D4 TI 1A', '2016-02-05', 2012, '3466'),
(31, 'rini', 'D4 TI 1A', '2016-02-05', 2012, '34'),
(32, 'asfdasdf', 'D4 TI 1A', '2016-01-20', 2012, '12345'),
(33, 'ahh', 'D4 TI 1A', '2016-02-05', 2012, '123456'),
(34, 'adsfasdf', 'D4 TI 1A', '2016-01-13', 2012, '123457'),
(35, 'fasdlfkjasldk', 'D4 TI 1A', '2016-02-05', 2012, '12345678'),
(36, 'mk', 'D4 TI 1A', '2016-02-05', 2012, '1'),
(37, 'jalskdfj', 'D4 TI 1A', '2016-02-05', 2012, '1234567'),
(38, 'aldkjfl', 'D4 TI 1A', '2016-02-05', 2012, '09'),
(39, 'jooewr', 'D4 TI 1A', '2016-02-05', 2012, '7890'),
(40, 'dfasdf', 'D4 TI 1A', '2016-02-05', 2012, '123456789'),
(41, 'fadf', 'D4 TI 1A', '2016-02-05', 2012, '12345678099'),
(42, 'fasdklj', 'D4 TI 1A', '2016-02-05', 2012, '123412'),
(43, 'jh', 'D4 TI 1A', '2016-02-05', 2012, '124123'),
(44, 'iuyiuyi', 'D4 TI 1A', '2016-01-29', 2012, '7899'),
(45, 'lkjlj', 'D4 TI 1A', '2016-02-05', 2012, '76767'),
(46, 'jlsjdfl', 'D4 TI 1A', '2016-01-29', 2012, '36'),
(47, 'fgsdfg', 'D4 TI 1A', '2016-02-05', 2012, '12345711'),
(48, 'asd', 'D4 TI 1A', '2016-02-05', 2012, 'asldkj'),
(49, 'asjdflasjdfl', 'D4 TI 1A', '2016-02-05', 2012, '93939'),
(50, 'fahsdfhk', 'D4 TI 1A', '2016-02-05', 2012, '1234123'),
(51, 'hhkj', 'D4 TI 1A', '2016-01-29', 2012, '688'),
(52, 'asdf', 'D4 TI 1B', '2016-02-08', 2012, '23'),
(53, 'fghfhgfhq', 'D4 TI 1A', '2016-02-08', 2012, '455'),
(54, 'dd', 'D4 TI 1A', '2016-02-22', 2012, '38'),
(55, '4ww', 'D4 TI 1A', '2016-02-23', 2012, '433'),
(56, 'adads', 'D4 TI 1A', '2016-02-08', 2013, '3333'),
(57, 'ddd', 'D4 TI 1A', '2016-02-08', 2013, '2343'),
(58, 'ewrwert', 'D4 TI 1A', '2016-02-08', 2012, '4333'),
(59, 'Ali babami', 'D4 TI 1A', '2016-02-09', 2012, '21'),
(60, 'jdhasdfk', 'D4 TI 1B', '2016-02-08', 2012, '666'),
(61, 'asdfhasdh', 'D4 TI 1A', '2016-02-08', 2012, '39'),
(62, 'asdflkjasldj', 'D4 TI 1A', '2016-02-18', 2012, '40'),
(63, 'asdjflasjdflasjdl', 'D4 TI 1A', '2016-02-08', 2013, '41111'),
(64, 'ajafljasldfasld', 'D4 TI 1A', '2016-02-01', 2012, '412'),
(65, 'lplplp', 'D4 TI 1A', '2016-02-08', 2012, '411'),
(66, 'feeff', 'D4 TI 1A', '2016-02-25', 2012, '123'),
(67, 'fjasldfjl', 'D4 TI 1A', '2016-02-08', 2012, '1234'),
(68, 'adfasdsdf', 'D4 TI 1A', '2016-02-08', 2012, '47'),
(69, 'sdsdfdff', 'D4 TI 1C', '2016-02-23', 2012, '42'),
(70, 'jashdkfahskd', 'D4 TI 1A', '2016-02-01', 2012, '44'),
(71, 'laskdjflaskj', 'D4 TI 1A', '2016-02-08', 2012, '455777'),
(72, 'asdfasdf', 'D4 TI 1A', '2016-02-08', 2012, '0'),
(73, 'asdasdfs', 'D4 TI 1A', '2016-02-08', 2012, '321'),
(74, 'sdfas', 'D4 TI 1B', '2016-02-08', 2012, '098'),
(75, 'ijijijijijiji', 'D4 TI 1A', '2016-02-08', 2012, '43'),
(76, 'asfjlasdlasjdfljsdlfjasdjf;', 'D4 TI 1A', '2016-01-25', 2012, '45'),
(77, 'dsadfff', 'D4 TI 1A', '2016-03-09', 2012, '414444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(2) NOT NULL,
  `nama_matakuliah` varchar(30) NOT NULL,
  `nilai_matakuliah` char(1) NOT NULL,
  `id_dhs` int(2) NOT NULL,
  `sks_matakuliah` int(2) NOT NULL,
  `id_semesterpendek` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama_matakuliah`, `nilai_matakuliah`, `id_dhs`, `sks_matakuliah`, `id_semesterpendek`) VALUES
(6, 'asdf', '3', 81, 2, 0),
(7, 'test', 'R', 69, 4, 0),
(12, 'test', 'u', 83, 7, 0),
(18, 'asdfjh', '3', 81, 2, 37),
(19, 'test', 't', 81, 3, 38),
(20, 'agoyamang', 'r', 81, 2, 39),
(21, 'asdfkdsj', '3', 71, 5, 40),
(23, 'ipppp', 'e', 69, 2, 42),
(37, 'dfjals', 'd', 69, 3, 56),
(38, 'asdfhk', '3', 69, 3, 57),
(39, 'testing', 'A', 69, 4, 59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1450648093),
('m130524_201442_init', 1450648096),
('m151027_142811_create_route_table', 1451823063);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` smallint(6) NOT NULL,
  `role_value` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_value`, `role_name`) VALUES
(1, 10, 'mahasiswa'),
(2, 20, 'baak'),
(3, 30, 'prodi'),
(4, 40, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `route`
--

CREATE TABLE `route` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semesterpendek`
--

CREATE TABLE `semesterpendek` (
  `id` int(2) NOT NULL,
  `user_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semesterpendek`
--

INSERT INTO `semesterpendek` (`id`, `user_id`) VALUES
(35, 28),
(36, 28),
(37, 28),
(38, 28),
(39, 28),
(43, 30),
(41, 31),
(42, 31),
(44, 31),
(45, 31),
(46, 31),
(47, 31),
(48, 31),
(49, 31),
(50, 31),
(51, 31),
(52, 31),
(53, 31),
(54, 31),
(55, 31),
(56, 31),
(57, 31),
(58, 40),
(59, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` smallint(6) NOT NULL,
  `status_value` smallint(6) NOT NULL,
  `status_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status_value`, `status_name`) VALUES
(1, 10, 'Pending'),
(2, 20, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status_id`, `created_at`, `updated_at`, `role_id`) VALUES
(28, 'tomas', '3sVDwqAtTOTki4rVfzouS8ikoVnkKye5', '$2y$13$HiPve9I1/JSvluPSyxlOu.Eap88QeC8BdeEvGSorXUI2X7EGHd93.', NULL, 'asdf@gmail.com', 10, 2147483647, 2147483647, 10),
(30, 'septianus', '-r-crxNeKduglJ2WMTRk1ievMbhfRp4W', '$2y$13$vViNyJn2IzTeY7hx0/b5mO03GI0ahIlzmsjNAZPhOsqlXewz.JhUi', NULL, 'septianusnainggolan@ymail.com', 10, 2147483647, 2147483647, 40),
(31, 'duta', 'fsPrAlocKc9vHiOXB5qPp7Z7YvKhr20S', '$2y$13$YagyYPwhGb4smFsRvXgra.dJk/MZAmzivA3LwzYDVFhI/9foMQ082', NULL, 'duta@gmail.com', 20, 2147483647, 2147483647, 30),
(32, 'saputra', 'esI5a3laOMWVbyFavEgJlkXjuRafQN6J', '$2y$13$qMjm4eUbXSRAR.b/dxhr0eKas.RmyLZATEJfIIVZ8MjKomfP1RRja', NULL, 'saputra@gmail.com', 10, 2147483647, 2147483647, 10),
(33, 'aku', 'MG0qCJ7FXS-7TnLvXl-Fv5xRvjkxpr1c', '$2y$13$FsUvOKBUFPbuvOP5n8/DDevGtOXriRQyfp2bWQ8ApJE2tHzVfuxEO', NULL, 'asdf@gmai.cim', 10, 2147483647, 2147483647, 10),
(34, 'rini', 'qKhGDzgKgFE13ZFB9K-MiQhPoA5JecMm', '$2y$13$lBwXjP9kokeGnf7zJW7u/uPjs0VPUdoMXalDqgbNiidn/kbfNXYnG', NULL, 'rini@gmail.com', 10, 2147483647, 2147483647, 10),
(35, 'cok', 'kD1jf7EczcU3kDBQniCU0atELrTty_AB', '$2y$13$HxbdWYiK1bp7iZLXBxUpvuuY43pM0tI9lqv1c3vvacKSDSNDuC0eS', NULL, 'asdf@gmail.comadsfa', 10, 2147483647, 2147483647, 10),
(36, 'uma', '6CTD9XVT7JFXDU6KedClFKM0H8Xy8oAq', '$2y$13$.2KKm64gAnypk2fi2zaw0elJ/BES3yp6igdPOaUCTvfQo9NbSeoGe', NULL, 'sdfasf@gmIL.COM', 10, 2147483647, 2147483647, 10),
(37, 'ko', '5WXrdA5a2hOFDRTROZt2UM29vf-5glOU', '$2y$13$121hSEmgU3MyRl9s7dkPluF/5YwGGoXNSvmQlwkdCTuLudpsS3vOK', NULL, 'a@gmail.com', 10, 2147483647, 2147483647, 10),
(38, 'ian', '2K_CeOw67afVk60Bo0Fdb55GGCoQ7u5-', '$2y$13$Zlsx3r5w/kvxnR62SrAF.uigWyghkYmkyybVxL.O3Sd4Q4Kn3rZnG', NULL, 'daf@gmail.com', 10, 2147483647, 2147483647, 10),
(39, 'testt', 's_xEIKQGQzRO9lqSs2neKS6SHnjwUX4m', '$2y$13$WxUsLY.S1.o5IJelngT6p.B85ySk2ADWU67sV9sMAnzUa2uivIS3u', NULL, 'asdfas@gmail.com', 10, 2147483647, 2147483647, 10),
(40, 'lappy', 'DHSOSaetZmccyHfIvi0P-statzJb_vWK', '$2y$13$k1K819ZqmuhZo1Us0JZFJOkX6yh/ZEdK6gfvIBcIFQXYIHVqk.E.y', NULL, 'asdf22@gmail.com', 10, 2147483647, 2147483647, 10),
(41, 'hp', 'TJ0soaX_iwgRipT76SM8OOIODS8xmrU3', '$2y$13$vttfKANP4CV/N0B6NwjncOL62IcVViavWohHIPTTwXQXecIKCNANO', NULL, 'asdaaaf@gmail.com', 10, 2147483647, 2147483647, 10),
(42, 'no', 'YZlWD4R3UcB3I_hLrBy0AaqOR79Wv50r', '$2y$13$maGPBs5hNoybYms9VEqbPO3FjdaazdtPprrBCcuPBx5SrzYesktT2', NULL, 'asdfask@mail.com', 10, 2147483647, 2147483647, 10),
(43, 'kok', 'hl5q1kNBeFcWPXb8rJPlR5a3Azju6NKC', '$2y$13$JJ3bW8RCxeClCCDh/2U8Xe28vw9Koai79erxpWVE2F1scvGIVYmrq', NULL, 'afdsfas@gmail.com', 10, 2147483647, 2147483647, 10),
(44, 'kku', 'kfaxIUihyUmgv5j8PYU2oEeEy74TSWs3', '$2y$13$Q32W7EgRvZBQvyObgq4mt.kZ1k48wdgaeCdslIpD538Z0xLEYYQWm', NULL, 'asdfasdf@gmail.com', 10, 2147483647, 2147483647, 10),
(45, 'ahhhhhhh', 'rCELpGqHNlxrD9y7gwKBcR1RBpB6_7ON', '$2y$13$NAWPab8tVRuMhacUJF57We2I192xOBAiyZgYF6ojVA1khbcjfjIuu', NULL, 'asdfasdf@gmai.com', 10, 2147483647, 2147483647, 10),
(46, 'sjlkjdflajsdflj', 'Rwboj-YSXt5r3-bYI0c0cfK9FiZ6S3Hf', '$2y$13$P5dYQ2SIfXU1Y0iBqqAIAeTAfIJsPRBvbxhnk0o/omKgwHY4wkYgy', NULL, 'saldfjlasj@gmail.com', 10, 2147483647, 2147483647, 10),
(47, 'cobain', 'toGwfX1xUbKHItJVWcPj-9uiLyMVHJ78', '$2y$13$gBD09EhFM6HkufOXfX6X7.qitGyGW4LyT5Rln5OI.Se21OcQEzZce', NULL, 'cobain@gmail.com', 10, 2147483647, 2147483647, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_semesterpendek` (`id_semesterpendek`),
  ADD KEY `status_approval` (`status_approval`);

--
-- Indexes for table `baak`
--
ALTER TABLE `baak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhs`
--
ALTER TABLE `dhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dhs` (`id_dhs`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `semesterpendek`
--
ALTER TABLE `semesterpendek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `baak`
--
ALTER TABLE `baak`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dhs`
--
ALTER TABLE `dhs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `semesterpendek`
--
ALTER TABLE `semesterpendek`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`id_semesterpendek`) REFERENCES `semesterpendek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `approval_ibfk_2` FOREIGN KEY (`status_approval`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`id_dhs`) REFERENCES `dhs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
