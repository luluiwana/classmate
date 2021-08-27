-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2021 pada 10.04
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
(4, 'PBO', '12 A B C', 'SMA 009', '2', 'images.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_lesson`
--

CREATE TABLE `course_lesson` (
  `LessonID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `LessonContent` text NOT NULL,
  `File` varchar(256) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_answer`
--

CREATE TABLE `forum_answer` (
  `ForumAID` int(11) NOT NULL,
  `ForumAContent` text NOT NULL,
  `ForumQID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ForumAStatus` tinyint(4) NOT NULL DEFAULT 0,
  `CreatedDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedDateTime` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum_answer`
--

INSERT INTO `forum_answer` (`ForumAID`, `ForumAContent`, `ForumQID`, `UserID`, `ForumAStatus`, `CreatedDateTime`, `UpdatedDateTime`) VALUES
(1, '<u>== should be used to check values</u><br><i>== should be used to check both value as well as datatype</i>', 1, 2, 0, '2018-03-04 18:36:38', '2018-04-13 15:25:16'),
(2, 'use what you want I dont care', 1, 3, 1, '2018-03-04 21:07:45', '2018-04-13 09:37:10'),
(3, 'abc', 1, 1, 1, '2018-03-05 17:09:28', '2018-04-13 09:37:15'),
(26, 'Hello &lt;?php echo &quot;Bello&quot;; ?&gt; Tello', 11, 2, 0, '2018-04-17 15:30:38', NULL),
(27, '<p>eowkq</p>', 14, 11, 0, '2021-08-23 14:08:08', NULL),
(28, '<p>weq</p>', 14, 11, 0, '2021-08-23 14:08:23', NULL),
(29, '<p>ewqok</p>', 14, 11, 0, '2021-08-23 14:08:37', NULL),
(30, '<p>wqeq</p>', 14, 11, 0, '2021-08-23 14:09:48', NULL),
(31, '<p>ewqeq</p>', 14, 11, 0, '2021-08-23 14:12:36', NULL),
(32, '<p><span style=\"text-align: justify;\">Lorem Ipsum</span><span style=\"text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 14, 11, 0, '2021-08-27 14:29:11', NULL),
(33, '<p>Mantab gan</p>', 1, 11, 0, '2021-08-27 14:32:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_question`
--

CREATE TABLE `forum_question` (
  `ForumQID` int(11) NOT NULL,
  `ForumQTitle` text NOT NULL,
  `ForumQContent` text NOT NULL,
  `UserID` int(11) NOT NULL,
  `ForumQStatus` tinyint(4) NOT NULL DEFAULT 0,
  `CreatedDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedDateTime` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum_question`
--

INSERT INTO `forum_question` (`ForumQID`, `ForumQTitle`, `ForumQContent`, `UserID`, `ForumQStatus`, `CreatedDateTime`, `UpdatedDateTime`, `category`) VALUES
(1, '== vs ===', '<p>I am Getting confused in using ==\r\n and ===</br><b>When should i use == and ===\r\n in php</b><p>', 2, 0, '2018-03-04 18:31:12', '2018-04-23 03:57:45', ''),
(14, '100% Bergaransi', '<p><span style=\"text-align: justify;\">Lorem Ipsum</span><span style=\"text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 11, 0, '2021-08-22 13:27:45', NULL, 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`QuizID`, `CourseID`, `date_create`) VALUES
(1, 14, '2021-08-25 04:47:46'),
(2, 14, '2021-08-25 04:47:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_question`
--

CREATE TABLE `quiz_question` (
  `QuestionID` int(11) NOT NULL,
  `QuizID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `question_img` varchar(128) DEFAULT NULL,
  `OptionA` text NOT NULL,
  `OptionB` text NOT NULL,
  `OptionC` text NOT NULL,
  `OptionD` text NOT NULL,
  `TrueOption` text NOT NULL,
  `Score` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_question`
--

INSERT INTO `quiz_question` (`QuestionID`, `QuizID`, `Question`, `question_img`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `TrueOption`, `Score`) VALUES
(2, 14, '1. Kumpulan dari method-method yang belum terdapat operasi di dalam tubuh method tersebut disebut ...', NULL, 'A. Interface', 'B. Inheritance', 'C. Method abstract', 'D. Interface', 'C', 50),
(3, 14, '2. Stream yang berguna untuk mengirim keluaran ke layar adalah...', NULL, 'A. System.in', 'B. System.out', 'C. System.err', 'D. System.exit', 'B', 50);

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
(11, 'Hafizh Arrozaq B.', 'hafizh.arrozaq@gmail.com', '$2y$10$zb8ZhL9ui0Xc3yPmVL2RuuIrZt.vIA/w2wmvG4GtTePKurTCLHFKq', 'ava2.png', '08113030442', '2021-08-21 17:13:41', 0, 'siswa');

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
('3', '3', '2021-08-17 17:03:51'),
('9', '3', '2021-08-17 21:42:23'),
('10', '4', '2021-08-19 12:27:11'),
('11', '3', '2021-08-22 00:45:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_quiz`
--

CREATE TABLE `user_quiz` (
  `UserID` int(11) NOT NULL,
  `QuizID` int(11) NOT NULL,
  `time_taken` timestamp NOT NULL DEFAULT current_timestamp(),
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indeks untuk tabel `course_lesson`
--
ALTER TABLE `course_lesson`
  ADD PRIMARY KEY (`LessonID`);

--
-- Indeks untuk tabel `forum_answer`
--
ALTER TABLE `forum_answer`
  ADD PRIMARY KEY (`ForumAID`);

--
-- Indeks untuk tabel `forum_question`
--
ALTER TABLE `forum_question`
  ADD PRIMARY KEY (`ForumQID`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QuizID`);

--
-- Indeks untuk tabel `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`QuestionID`);

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
-- AUTO_INCREMENT untuk tabel `course_lesson`
--
ALTER TABLE `course_lesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum_answer`
--
ALTER TABLE `forum_answer`
  MODIFY `ForumAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `forum_question`
--
ALTER TABLE `forum_question`
  MODIFY `ForumQID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
