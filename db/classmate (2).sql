-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2021 pada 23.44
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
-- Struktur dari tabel `competencies`
--

CREATE TABLE `competencies` (
  `CompetenciesID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CompetenciesName` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `competencies`
--

INSERT INTO `competencies` (`CompetenciesID`, `CourseID`, `CompetenciesName`, `date_created`) VALUES
(1, 1, 'Struktur Hierarki Basis Data', '2021-08-28 06:37:32'),
(2, 1, 'Normalisasi basis Data', '2021-08-28 07:08:01'),
(3, 2, 'KD 5', '2021-09-14 10:52:31'),
(4, 2, 'KD 6 Halu', '2021-09-25 23:38:31');

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
(1, 'Basis Data', 'XI M', 'SMk 2 ', '2', 'images_(1)2.jpg'),
(2, 'Basis Data 2', 'XI RPL B', 'SMK 25 jayapura', '2', 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_lesson`
--

CREATE TABLE `course_lesson` (
  `LessonID` int(11) NOT NULL,
  `CompetenciesID` int(11) NOT NULL,
  `LessonTitle` varchar(255) NOT NULL,
  `LessonContent` text NOT NULL,
  `File` varchar(256) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `course_lesson`
--

INSERT INTO `course_lesson` (`LessonID`, `CompetenciesID`, `LessonTitle`, `LessonContent`, `File`, `date_upload`) VALUES
(1, 1, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '', '2021-08-28 06:38:20'),
(2, 1, 'sasasasasa', '<p>sasasasa</p>', '2_1630331823.', '2021-08-30 13:57:03'),
(3, 1, 'dsasdsa', '<p>ddasdsa</p>', '2_1630331878.', '2021-08-30 13:57:57'),
(4, 3, 'cara membangunkan katak', 'absdasd asd asd asd as', '', '2021-09-14 10:53:42'),
(5, 1, 'sasdasd11', 'asdas', '', '2021-09-26 12:27:27');

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
(8, '<p>uyuyu</p>', 4, 1, 0, '2021-09-26 14:30:52', NULL),
(10, '<p>asdsa dasdn a ssanf sdag</p>', 5, 1, 0, '2021-09-26 15:19:43', NULL),
(11, '<p>sfjsd fsdf sfjas fasf asfsd</p>', 5, 1, 0, '2021-09-26 15:19:48', NULL),
(13, '<p>apasih</p>', 5, 3, 0, '2021-09-26 17:29:05', NULL),
(14, '<p>hahahaha aneh deh<br><br>&nbsp;<img src=\"https://avatars.githubusercontent.com/u/16160143?s=88&amp;v=4\" style=\"width: 88px;\"></p>', 5, 3, 0, '2021-09-26 22:55:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_question`
--

CREATE TABLE `forum_question` (
  `ForumQID` int(11) NOT NULL,
  `CourseID` char(5) NOT NULL,
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

INSERT INTO `forum_question` (`ForumQID`, `CourseID`, `ForumQTitle`, `ForumQContent`, `UserID`, `ForumQStatus`, `CreatedDateTime`, `UpdatedDateTime`, `category`) VALUES
(4, '2', '', '<p>Dahla</p>', 1, 0, '2021-09-26 14:20:57', NULL, 'Tugas'),
(5, '2', '', '                                                                                                         <p>editan 234</p>                                                                                ', 1, 0, '2021-09-26 14:42:20', '2021-09-26 15:02:37', 'Tugas'),
(6, '1', '', '<p>gaada bung</p>', 3, 0, '2021-09-26 17:28:48', NULL, 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `LevelID` char(1) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`LevelID`, `desc`) VALUES
('0', ''),
('1', 'Pemula'),
('2', 'Petualang'),
('3', 'Pejuang'),
('4', 'Petarung'),
('5', 'Master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` int(11) NOT NULL,
  `CompetenciesID` int(11) NOT NULL,
  `QuizTitle` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`QuizID`, `CompetenciesID`, `QuizTitle`, `date_create`) VALUES
(1, 1, 'quiz pertama', '2021-09-25 20:27:27');

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
  `Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_question`
--

INSERT INTO `quiz_question` (`QuestionID`, `QuizID`, `Question`, `question_img`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `TrueOption`, `Score`) VALUES
(2, 1, 'pertanyaan', NULL, '1', '2', '3', '4', 'A', 11),
(3, 1, 'pertanyaan', NULL, 'a', 'b', 'c', 'd', 'A', 11),
(4, 1, 'pertanyaan dengan gambar', NULL, '1', '2', '3', '4', 'A', 11),
(5, 1, 'SIMPAN', NULL, '1', '2', '34', '5', 'A', 11),
(6, 1, 'SIMPAN', NULL, '1', '2', '34', '5', 'A', 11),
(7, 1, 'SIMPAN', NULL, '1', '2', '34', '5', 'A', 11),
(8, 1, 'SIMPAN', NULL, '1', '2', '34', '5', 'A', 11),
(9, 1, 'SIMPAN', NULL, '1', '2', '34', '5', 'A', 11),
(10, 0, 'okee berubah', NULL, '1', '2', '3', '4', 'A', 0);

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
  `Level` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserAvatar`, `UserContactNo`, `CreatedDateTime`, `UserXP`, `UserRole`, `Level`) VALUES
(1, 'Lulu Iwana', 'siswa@classmate.com', '$2y$10$c/FnAfDqYMLHJqFDEnfxJON7bePcYbgbxh7SFTYJeXuJQwarVSZny', 'ava1.png', '08656565756', '2021-08-28 13:33:55', 0, 'siswa', '0'),
(2, 'Novianto Hendrawan S.Pd.', 'guru@classmate.com', '$2y$10$z9JArRp.T3Ae4/NNTtuPRuQR.UVe2T5uT/qS6ikeK8gjp9FL4XPbC', 'default.jpg', '08656565756', '2021-08-28 13:34:07', 0, 'guru', '1'),
(3, 'Nama Saya Lengkap', 'siswa2@classmate.com', '$2y$10$DoUNYl2M0ADK6eWZRIsSsOVdVgCjwyMJMMtKTlGN8D2h.7NiiVH8m', 'ava8.png', '08656565756', '2021-08-30 10:57:07', 0, 'siswa', '2'),
(4, 'hafizh', 'hafizh.arrozaq@gmail.com', '$2y$10$NHw5wQXXEpNAAuOKo4ogr.hGJlOISnO7F.cpnnN2pjMZGhwbm1NCS', 'default.jpg', '08112322232', '2021-09-14 20:37:24', 0, 'guru', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_course`
--

CREATE TABLE `user_course` (
  `UserID` char(5) NOT NULL,
  `CourseID` char(5) NOT NULL,
  `JoinDate` datetime NOT NULL DEFAULT current_timestamp(),
  `courseXP` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_course`
--

INSERT INTO `user_course` (`UserID`, `CourseID`, `JoinDate`, `courseXP`) VALUES
('1', '1', '2021-09-14 17:34:37', 400),
('1', '2', '2021-09-14 17:54:02', 200),
('3', '1', '2021-09-26 17:27:39', 800),
('3', '2', '2021-09-26 17:28:53', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_lesson`
--

CREATE TABLE `user_lesson` (
  `UserID` char(10) NOT NULL,
  `LessonID` char(10) NOT NULL,
  `CourseID` char(10) NOT NULL,
  `Score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_lesson`
--

INSERT INTO `user_lesson` (`UserID`, `LessonID`, `CourseID`, `Score`) VALUES
('3', '1', '1', 200),
('3', '4', '2', 200),
('3', '2', '1', 200),
('3', '3', '1', 200),
('3', '5', '1', 200);

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
-- Indeks untuk tabel `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`CompetenciesID`);

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
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`LevelID`);

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
-- AUTO_INCREMENT untuk tabel `competencies`
--
ALTER TABLE `competencies`
  MODIFY `CompetenciesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `course_lesson`
--
ALTER TABLE `course_lesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `forum_answer`
--
ALTER TABLE `forum_answer`
  MODIFY `ForumAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `forum_question`
--
ALTER TABLE `forum_question`
  MODIFY `ForumQID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
