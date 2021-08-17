-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2021 pada 17.56
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

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
(4, 'PBO', '12 A B C', 'SMA 009', '2', 'images.png');

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
  `UserRole` enum('guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserAvatar`, `UserContactNo`, `CreatedDateTime`, `UserXP`, `UserRole`) VALUES
(1, 'Lulu Iwana', 'siswa@classmate.com', '$2y$10$4mdBUuHbN1OK75D.agm9/OJNkrEFnlRkPq0QZ5QGAU8dX7cJ5ALEK', 'default.jpg', '08656565756', '2021-08-16 14:48:36', 0, 'siswa'),
(2, 'Novianto Hendrawan S.Pd.', 'guru@classmate.com', '$2y$10$D7FYQtjZsc5EUmtU8wiRn.xLzVMhYNnUuYvtFJpfhM21nXTjojQMq', 'default.jpg', '02791721', '2021-08-16 14:56:19', 0, 'guru'),
(3, 'Lulu Iwana123', 'lulu@classmate.com', '$2y$10$cCbK38C401TgEaxonGinkuu2wOeOzdKDt83KfZ4c4QZiaV1vCdY1u', 'default.jpg', '08656565756', '2021-08-16 21:29:44', 0, 'siswa'),
(4, 'siswa sdas', 'sis@classmate.com', '$2y$10$fkV/KpkXVq402PLA/cNOu.PpkWV6Hvad5kk6I0BoAkozvNNBEhdZe', 'default.jpg', '02791721', '2021-08-16 21:38:08', 0, 'siswa'),
(5, 'Desain Eksterior', 'desain@classmate.com', '$2y$10$6q9DWD2OnYvIycAi.ISTSOViiba4ZF0j2Vo.52o3u9hKjf7WRpiCm', 'default.jpg', '08656565756', '2021-08-16 21:38:32', 0, 'siswa'),
(6, 'Desain Eksterior', 'desain@classmate.com', '$2y$10$7PwV/xhipYQOmKf8j.ChcuBzKG.BGAH70nDf4e4U5jJBqkIpIahyO', 'default.jpg', '08656565756', '2021-08-16 21:38:33', 0, 'siswa'),
(7, 'Desain Eksterior', 'guru2@classmate.com', '$2y$10$uCqwgET5.EbkA0SlH0WjxuiYvfdvdW8oELtUlTuywnjX64vqWwcme', 'default.jpg', '08656565756', '2021-08-17 17:39:30', 0, 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_course`
--

CREATE TABLE `user_course` (
  `UserID` char(5) NOT NULL,
  `CourseID` char(5) NOT NULL,
  `JoinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_course`
--

INSERT INTO `user_course` (`UserID`, `CourseID`, `JoinDate`) VALUES
('1', '3', '2021-08-17 16:51:54'),
('1', '4', '2021-08-17 16:52:12'),
('3', '3', '2021-08-17 17:03:51');

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
  MODIFY `CourseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
