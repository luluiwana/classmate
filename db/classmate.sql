-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2021 pada 05.57
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
  `UserAddress` varchar(200) DEFAULT NULL,
  `UserXP` int(11) NOT NULL DEFAULT 0,
  `userStatus` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserAvatar`, `UserContactNo`, `CreatedDateTime`, `UserAddress`, `UserXP`, `userStatus`) VALUES
(1, 'harsh123', 'harsh123@gmail.com', '12345678', '2.jpg', '7567934300', '2018-03-04 18:44:40', 'U-6, Vardhman Mahaveer Marg, Agrasen Point, Near Agresen Bhavan, City Light Town, Athwa, Surat, Gujarat 395007, India', 150, 0),
(2, 'Jeni123', 'jeni123@gmail.com', '12345678', 'j.svg', '7418520912', '2018-03-04 18:44:40', 'Nakshatra View, Sant Crystal Avenue, Palanpur Gam, Surat, Gujarat 395009, India', 84, 0),
(3, 'Tarun123', 'tarun123@gmail.com', '12345678', 't.svg', '8520963741', '2018-03-04 21:10:07', '', 74, 0),
(4, 'Ashwin shah', 'a@a.com', '12345678', 'a.svg', '1234567890', '2018-03-13 09:59:08', '', 0, 0),
(5, 'Bharat shah', 'b@b.com', '12345678', 'b.svg', '1234567890', '2018-03-13 10:00:06', '', 0, 0),
(6, 'Chagan shah', 'c@c.com', '12345678', 'c.svg', '1234567890', '2018-03-13 10:00:06', '', 0, 0),
(7, 'Damana shah', 'd@d.com', '12345678', 'd.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(8, 'Elina shah', 'e@e.com', '12345678', 'e.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(9, 'Fukran shah', 'f@f.com', '12345678', 'f.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(10, 'Gaurav shah', 'g@g.com', '12345678', 'g.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(11, 'Harsh shah', 'h@h.com', '12345678', 'h.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(12, 'Ishita Bhoi', 'i@i.com', '12345678', 'i.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(13, 'Jeni Bhoi', 'j@j.com', '12345678', 'j.svg', '1234567890', '2018-03-13 10:02:35', '', 0, 0),
(14, 'kiran Bhoi', 'k@k.com', '12345678', 'k.svg', '1234567890', '2018-03-13 10:14:12', '', 0, 0),
(15, 'Lalo Bhoi', 'l@l.com', '12345678', 'l.svg', '1234567890', '2018-03-13 10:30:18', '', 0, 0),
(16, 'Mohan Patel', 'm@m.com', '12345678', 'm.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(17, 'Navin Patel', 'n@n.com', '12345678', 'n.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(18, 'Olisa Patel', 'o@o.com', '12345678', 'o.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(19, 'Parth Patel', 'p@p.com', '12345678', 'p.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(20, 'Quiza Patel', 'q@q.com', '12345678', 'q.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(21, 'Rohit Patel', 'r@r.com', '12345678', 'r.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(22, 'Sumit Patel', 's@s.com', '12345678', 's.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(23, 'Tillu Patel', 't@t.com', '12345678', 't.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(24, 'Ulla Gundecha', 'u@u.com', '12345678', 'u.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(25, 'Vilesh Gundecha', 'v@v.com', '12345678', 'v.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(26, 'Wilson patel', 'w@w.com', '12345678', 'w.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(27, 'xinio patel', 'x@x.com', '12345678', 'x.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(28, 'Yash patel', 'y@y.com', '12345678', 'y.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(29, 'Zitiya patel', 'z@z.com', '12345678', 'z.svg', '1234567890', '2018-03-13 10:32:44', '', 0, 0),
(30, 'jenibili patel', 'jenii@gmail.com', '12345678', 'j.svg', '', '2018-03-15 19:24:01', '', 0, 0),
(31, 'Baghi Roy', 'baghi@gmail.com', '12345678', 'b.svg', '', '2018-04-09 05:30:56', NULL, 0, 0),
(32, 'Ek Tha Tiger', 'tiger@gmail.com', '12345678', 'e.svg', '', '2018-04-09 05:37:16', NULL, 0, 0),
(33, 'Jalpa Bhoi', 'jalpa@gmail.com', '12345678', 'j.svg', '', '2018-04-09 05:40:03', NULL, 0, 0),
(34, 'Sonali', 'sonu@gmail.com', '12345678', 's.svg', '', '2018-04-09 05:45:18', NULL, 0, 0),
(35, 'jeni', 'jeni123123@gmail.com', '12345678', 'j.svg', '', '2018-04-09 07:43:18', NULL, 0, 0),
(36, 'jeni', 'jeni12312@gmail.com', '12345678', 'j.svg', '', '2018-04-09 07:59:34', NULL, 0, 0),
(37, 'Kiran', 'kiran123@gmail.com', '12345678', 'k.svg', '9898989898', '2018-04-12 12:15:23', NULL, 0, 0),
(39, 'HAFIZH ARROZAQ BAIHAQI', 'hafizh.arrozaq@gmail.com', '$2y$10$1kFIpL69OmRPVGiTXoK5jepPlY7cnp145sNnCcR/gFTR7Ho3bZjEm', 'default.jpg', '02', '2021-08-15 20:44:46', NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
