-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 09:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_details` text NOT NULL,
  `supervisor_type` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_details`, `supervisor_type`, `supervisor_id`, `activity_id`, `date_created`) VALUES
(13, 'I like wat iam seeing', 1, 7, 69, '2017-07-17'),
(14, 'go on kid', 1, 7, 64, '2017-07-17'),
(15, 'Nice', 1, 7, 67, '2017-07-17'),
(16, 'Nice thing yeah', 2, 4, 69, '2017-07-17'),
(17, 'another one', 2, 4, 69, '2017-07-17'),
(18, 'dfdd', 2, 4, 64, '2017-07-17'),
(19, 'hey', 2, 4, 64, '2017-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `internship_codinator`
--

CREATE TABLE `internship_codinator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship_codinator`
--

INSERT INTO `internship_codinator` (`id`, `name`, `faculty`, `username`, `password`, `status`, `tel`, `email`) VALUES
(3, 'nnyanziian', 'COCIS', 'nnyanziian', '$2y$10$gg4Sz2ZvG2J6d4cRcz8E5uhIoOIGsA/bfyRZfEd5GK/T1VzgNwv0C', 1, '256701964728', 'nnyanziian@gmail.com'),
(4, 'new name', 'BAMS', 'clearCopy', '$2y$10$53oD/Wm11Z/moKoQFI1T3e3WqlhIrkSMF0UkjtSElwiTgxYr55wBW', 1, '256701964728', 'nnyanziian@outlook.com'),
(5, 'Admin', 'Cosis', 'kudz', '$2y$10$F/JZdkgSTdaedKN2n3Xnj.SJBdQRwhS3Cja/bvYZDLbCynLGjfoIu', 1, '070000000564', 'kadz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `activity_details` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `date_created`, `activity_details`, `approved`, `student_id`) VALUES
(64, '2017-07-13', 'dfdf', 1, 1),
(67, '2017-07-14', 'asas', 1, 1),
(69, '2017-07-15', 'Bettere and better', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `student_no` varchar(255) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `program` varchar(100) NOT NULL,
  `field_attachment` text NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `day_completion` int(11) NOT NULL,
  `assign_a` int(11) NOT NULL,
  `assign_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_no`, `reg_no`, `photo`, `program`, `field_attachment`, `tel`, `email`, `password`, `status`, `day_completion`, `assign_a`, `assign_f`) VALUES
(1, 'Nnyanzi Ian', '214004144', '14/u/13388/eve', 'default.jpg', 'BIT', 'OUTBOX HUB', '256701964728', 'nnyanziian@gmail.com', '$2y$10$m1w10VgyGYi3KRJJaAcLkOajcOpBVdDBNgtcmMqFgYxsmwR3VRhIi', 1, 0, 1, 1),
(2, 'Bogomini Gerald', '2', '14/3434/3434/ps', 'default.jpg', 'sdss', 'House', '23232332232', 'nnyasays@ugo.com', '$2y$10$0BlwoQc4X1w7gTHOjdQ1V.TxPoM5C13MSmmj41KE/BujXLT6Ec2/.', 1, 0, 0, 0),
(3, 'Edited new', '12345678g', '14/3434/3434/ps', 'default.jpg', 'sdss', 'House', '23232332232', 'nnyasays@ugo.com', '$2y$10$I.exN3taM3oaMUceC8WKcOQIQqsXsjJPJViYcO0DC4fHkG7h7Jpxi', 1, 0, 0, 0),
(5, 'Bogomini Gerald', '2676767600000', '14/3434/3434/ps', 'default.jpg', 'sdss', 'House', '23232332232', 'nnyasays@ugo.com', '$2y$10$QbqLrZFK8YSq2dj2ORe9Xul15KvmSOBlF.MiWVifU7AjqyfuVRTRG', 1, 0, 0, 0),
(6, 'nnyanziian', '12345678', '14/7/75656/bf', 'default.jpg', 'bis', 'OutBox', '256701964728', 'nnyanziian@gmail.com', '$2y$10$m1w10VgyGYi3KRJJaAcLkOajcOpBVdDBNgtcmMqFgYxsmwR3VRhIi', 1, 0, 1, 0),
(7, 'onen julius', '23456789', '14/7/455/445/eve', 'default.jpg', 'BSC', 'Krobits', '2567018647', 'onenj@gmail.com', '$2y$10$LFVh70Y16.Me2NxBqeAjN.WiRxTxVNCkkdkPD6TtPE9T5JXJUwGjW', 1, 0, 1, 0),
(8, 'John', '456789023', 'jdjshd7887', 'default.jpg', 'BAT', 'BOU', '2382983293', 'dkjdk@rt.com', '$2y$10$PP2RPdRcPBIviZGzu9pvjevqUu87I0QgERA1H1yK78LPitCeuMwSS', 1, 0, 0, 1),
(9, 'Good Morning', '392839834', '89290393hd', 'default.jpg', 'HTOP', 'OUT', '738273233', 'exxdsldk@hadd.com', '$2y$10$iefwjK17kZjrgH0T32J8Puq63JYDfAtKPsZuUp6lrG0XfqwNSCq3y', 1, 0, 0, 0),
(10, 'kakjsaajs', 'akjsakjsaja', 'ajsjkasa877sa87s', 'default.jpg', 'asjasjakjsa', 'asnammsnasa', '77868787877', 'asasa@gmajkasj.com', '$2y$10$E52GEGB/lcHsHnjKVmAXFuPkih2OyYzdiR16m7Cdp6vssD82N6No2', 1, 0, 0, 0),
(11, 'Kaddu Francis', '28329382982', '14/u/272873/eve', 'default.jpg', 'BIS', 'UBOS', '25728323982', 'kaddu@gmail.com', '$2y$10$z3o3bg.l1c826blPhWbtEukU4tZ3lizYHfGTaFOYlT0XdgiNrKUoW', 1, 0, 1, 0),
(12, 'ajskas', '28392832938', 'kjajs9823983', 'default.jpg', 'BSC Information Technology', 'sdmsdjskdjs', '828328238293', 'sjdksj@gmail.com', '$2y$10$xfrRBHfa3EMwqlUV.ZbrQOcTo9njHZ9hV93YZ4NdBgw.F.A3V4in.', 1, 0, 0, 0),
(13, 'Another one', '214004146', '14/u/787/eve', 'default.jpg', 'BSC Computer Science', 'BOU', '454545454545', 'sdsd@gamil.com', '$2y$10$WPbjYrWrZYVQ4f9/ScjQHeZvhHkln8T8fePqbPKKZ6ZaGblpa3cDa', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `department` text NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `username`, `fullname`, `password`, `type`, `status`, `department`, `tel`, `email`) VALUES
(1, 'Newx', 'dharaj', '$2y$10$MkRFH1weUtIGC5zqAIbBL.8Aa9O2l5Md5ui9zvq4bR2D85bQmOWpC', 2, 0, 'x', '4567898787', 'sdshd@gmail.com'),
(2, 'harabe docus', 'dharambe', '$2y$10$90Azpt/jHqRoqcRC6ZoJt.fqL5acu0xYtUSi0XFYJkeVOuxwDHF.2', 2, 0, 'CIS', '4567898787', 'sdshd@gmail.com'),
(3, 'metykica', 'Christine Mccoy', '$2y$10$WJ8dQlVWERiFDOvO6atUquXm47YgvL78KvKS7.lWxk.jCKrXx702i', 1, 0, 'New Dep', '+229-52-7961114', 'liwozykal@gmail.com'),
(4, 'mySup', 'My Sup', '$2y$10$u8NZYWR0UMnJtuHeDeB0ourVRsLHGildBnaUd5GzwtJu.mss6YE7G', 2, 0, 'Changed department', '0774329909', 'fyga@yahoo.com'),
(5, 'tyzujus', 'Steven Burnett', '$2y$10$E6L0yuhuwbiKG2bYTj9vl.3wDCGrkIDP8DEQA.LADK1ILRfRl9h56', 1, 0, 'Networking', '+693-51-2993202', 'dypuvu@hotmail.com'),
(6, 'jixowuvid', 'Bernard Wells', '$2y$10$nzomOqRw.8h5NWQl6PinwONsjK5tX8wgX9NtN.jsP5K9nAUpVVP.m', 1, 0, 'Consectetur dolor optio in beatae ipsum', '+897-20-9024852', 'qajalaw@yahoo.com'),
(7, 'fuzezo', 'Kane Wilson', '$2y$10$m1w10VgyGYi3KRJJaAcLkOajcOpBVdDBNgtcmMqFgYxsmwR3VRhIi', 1, 0, 'Voluptatum qui at qui qui voluptatibus', '+791-61-7736593', 'fagecylosa@yahoo.com'),
(8, 'culez', 'Quon Johns', '$2y$10$82zSszWk4.ilLoVsjOvlqOMTOWkKsnXjgRaphFXp4U7FvZFu/4pCm', 1, 0, 'Sit mollitia non aliquip proident', '+176-25-9422659', 'nyjejekojo@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_student_assignmnet`
--

CREATE TABLE `supervisor_student_assignmnet` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_student_assignmnet`
--

INSERT INTO `supervisor_student_assignmnet` (`id`, `student_id`, `supervisor_id`, `status`, `date_created`) VALUES
(30, 8, 2, 1, '2017-06-28'),
(33, 1, 7, 1, '2017-06-29'),
(34, 11, 7, 1, '2017-06-29'),
(35, 7, 7, 1, '2017-06-29'),
(36, 6, 7, 1, '2017-06-29'),
(37, 1, 4, 1, '2017-06-29'),
(38, 13, 3, 1, '2017-07-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_codinator`
--
ALTER TABLE `internship_codinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_student_assignmnet`
--
ALTER TABLE `supervisor_student_assignmnet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `internship_codinator`
--
ALTER TABLE `internship_codinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supervisor_student_assignmnet`
--
ALTER TABLE `supervisor_student_assignmnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
