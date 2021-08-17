-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2021 pada 08.05
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classmate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `CourseID` int(5) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `ClassName` varchar(255) NOT NULL,
  `SchoolName` varchar(255) NOT NULL,
  `TeacherID` char(5) NOT NULL,
  `CourseLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `ClassName`, `SchoolName`, `TeacherID`, `CourseLogo`) VALUES
(3, 'Basis Data', 'XI M', 'SMk 2 ', '2', 'Drawing_(1).png'),
(4, 'PBO', '12 A B C', 'SMA 009', '2', 'images.png'),
(5, 'basdad', 'rpl d', 'smk', '8', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserEmail` varchar(200) NOT NULL,
  `UserPassword` varchar(200) NOT NULL,
  `UserAvatar` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `UserContactNo` varchar(20) NOT NULL,
  `CreatedDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `UserXP` int(11) NOT NULL DEFAULT 0,
  `UserRole` enum('guru','siswa') NOT NULL,
  `UserAddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserAvatar`, `UserContactNo`, `CreatedDateTime`, `UserXP`, `UserRole`, `UserAddress`) VALUES
(1, 'Lulu Iwana', 'siswa@classmate.com', '$2y$10$4mdBUuHbN1OK75D.agm9/OJNkrEFnlRkPq0QZ5QGAU8dX7cJ5ALEK', 'default.jpg', '08656565756', '2021-08-16 14:48:36', 0, 'siswa', NULL),
(2, 'Novianto Hendrawan S.Pd.', 'guru@classmate.com', '$2y$10$D7FYQtjZsc5EUmtU8wiRn.xLzVMhYNnUuYvtFJpfhM21nXTjojQMq', 'default.jpg', '02791721', '2021-08-16 14:56:19', 0, 'guru', NULL),
(3, 'Lulu Iwana123', 'lulu@classmate.com', '$2y$10$cCbK38C401TgEaxonGinkuu2wOeOzdKDt83KfZ4c4QZiaV1vCdY1u', 'default.jpg', '08656565756', '2021-08-16 21:29:44', 0, 'siswa', NULL),
(4, 'siswa sdas', 'sis@classmate.com', '$2y$10$fkV/KpkXVq402PLA/cNOu.PpkWV6Hvad5kk6I0BoAkozvNNBEhdZe', 'default.jpg', '02791721', '2021-08-16 21:38:08', 0, 'siswa', NULL),
(5, 'Desain Eksterior', 'desain@classmate.com', '$2y$10$6q9DWD2OnYvIycAi.ISTSOViiba4ZF0j2Vo.52o3u9hKjf7WRpiCm', 'default.jpg', '08656565756', '2021-08-16 21:38:32', 0, 'siswa', NULL),
(6, 'Desain Eksterior', 'desain@classmate.com', '$2y$10$7PwV/xhipYQOmKf8j.ChcuBzKG.BGAH70nDf4e4U5jJBqkIpIahyO', 'default.jpg', '08656565756', '2021-08-16 21:38:33', 0, 'siswa', NULL),
(7, 'HAFIZH ARROZAQ BAIHAQI', 'hafizh.arrozaq2@gmail.com', '$2y$10$GLx4YHxtVbdU99o996tLxumYAUiXQdmSzOKI.G.gvA5YW6sOTYjYW', 'default.jpg', '-1', '2021-08-16 22:53:49', 0, 'guru', NULL),
(8, 'HAFIZH ARROZAQ BAIHAQI', 'hafizh.arrozaq3@gmail.com', '$2y$10$WaCYz0kRwPGwnoyjbq9wou.mGsWUvqBwcZ58pSZGM/u4nX7bmgmD6', 'default.jpg', '-1', '2021-08-16 22:54:19', 0, 'guru', NULL),
(9, 'HAFIZH ARROZAQ BAIHAQI', 'hafizh.arrozaq99@gmail.com', '$2y$10$4d/JRCndnLWBTwoXy8RXXumSg8B/FYcf.oPm4mFmo2qe0/NISagai', 'default.jpg', '1', '2021-08-16 22:56:07', 0, 'siswa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_course`
--

CREATE TABLE `user_course` (
  `UserID` char(5) NOT NULL,
  `CourseID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_course`
--

INSERT INTO `user_course` (`UserID`, `CourseID`) VALUES
('9', '5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
