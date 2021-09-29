-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2021 pada 23.36
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
(1, 1, 'KD 5 - Struktur Hierarki Basis Data', '2021-09-28 12:22:19');

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
(1, 'Basis Data', 'XI RPL A', 'SMK 099 Medan', '2', 'unnamed1.jpg');

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
(1, 1, 'basis Data', '<p>sadasdasdasdasdsa\'</p><p>asdasdmasmd</p><p>asdmjlasdas</p><p>asdbbj</p><p>asdghasgdb</p><p>asgdasd</p><p>asdd</p>', '2_1632831760.', '2021-09-28 12:22:39');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_score`
--

CREATE TABLE `forum_score` (
  `CourseID` char(10) NOT NULL,
  `UserID` char(10) NOT NULL,
  `Score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'Kuis 1 coba', '2021-09-28 12:28:18');

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
  `OptionE` text NOT NULL,
  `TrueOption` text NOT NULL,
  `Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_question`
--

INSERT INTO `quiz_question` (`QuestionID`, `QuizID`, `Question`, `question_img`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `OptionE`, `TrueOption`, `Score`) VALUES
(1, 1, 'asdsads soal 1', NULL, 'sdsa', 'dawf afdasdf', ' adfad das sdavsd', 'sd sdvfsdf', 'asdasdjajsd', 'A', 0),
(2, 1, 'dfbdsfbdf dfbdsf ndf b dfb dfn bndf bns dfb bdf bdfb df bdf bdnfb', NULL, 'dfbdfb', 'fdbdfb', 'dffbdfbs', 'dfsbfdb', 'bdfbf', 'A', 0);

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
  `Level` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserAvatar`, `UserContactNo`, `CreatedDateTime`, `UserXP`, `UserRole`, `Level`) VALUES
(1, 'Lulu Iwana', 'siswa@classmate.com', '$2y$10$RLUbPYXg188lxuxNyM1e.ebXp6e/fMqETdtXp/NoGcnFQrA1c8eIK', 'ava1.png', '08656565756', '2021-09-28 19:19:18', 0, 'siswa', '0'),
(2, 'Novianto Hendrawan S.Pd.', 'guru@classmate.com', '$2y$10$5iejJURH77yTEU7Fu/0r4uSiZTJfJxkDo3oPU6ojzF3gK6fiIHUV.', 'default.jpg', '08656565756', '2021-09-28 19:21:29', 0, 'guru', '0');

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
('1', '1', '2021-09-28 19:26:49', 200);

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
('1', '1', '1', 200);

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
  MODIFY `CompetenciesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `course_lesson`
--
ALTER TABLE `course_lesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `forum_answer`
--
ALTER TABLE `forum_answer`
  MODIFY `ForumAID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum_question`
--
ALTER TABLE `forum_question`
  MODIFY `ForumQID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
