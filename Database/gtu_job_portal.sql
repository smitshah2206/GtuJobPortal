-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 06:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtu_job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `heading`, `description`, `created_time`) VALUES
(1, '1612029445.jpg', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto enim non iste maxime optio, ut com', '2020-12-31 18:49:52.000000'),
(2, '1612029445.jpg', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nobis natus incidunt officia assumenda.', '2021-01-16 18:51:22.000000'),
(3, '1612029445.jpg', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi obcaecati praesentium,', '2021-01-16 18:51:52.000000'),
(4, '1612029445.jpg', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor minima, dolores quis, dolorum accusamu', '2021-01-16 18:52:24.000000'),
(7, '1612029346.png', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nobis natus incidunt officia assumenda.', '2021-01-30 17:55:46.982652'),
(8, '1612029445.jpg', 'Even the all-powerful Pointing has no control about the blind texts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nobis natus incidunt officia assumenda.', '2021-01-30 17:57:25.658545');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_about` varchar(255) NOT NULL,
  `company_contry` varchar(255) NOT NULL,
  `company_state` varchar(255) NOT NULL,
  `company_district` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `contactnumber`, `company_name`, `company_website`, `company_about`, `company_contry`, `company_state`, `company_district`, `whatsapp`, `facebook`, `linkedin`, `company_logo`, `status`, `created_time`) VALUES
(1, 'Smit', 'Rupeshkumar', 'shah', 'smitshah22050602@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '9409324362', 'Yottol', 'https://www.yottol.com/', 'Null', 'India', 'Gujarat', 'Ahmedabad', '', '', 'https://safal.com', '1611857382.png', 2, '2020-12-30 04:16:22.161509'),
(2, 'ABC', 'GHI', 'DEF', 'smit@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '8849364239', 'CyberCom', 'https://github.com/smitshah2206/CybercomCreation/', 'Vastrapur', 'India', 'Gujarat', 'Surat', '', '', '', '1611857382.png', 2, '0000-00-00 00:00:00.000000'),
(3, 'smit', 'Rupeshkumar', 'shah', 'smitshah@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '1234567890', 'Safal', 'https://safal.com', 'Null', 'India', 'Gujarat', 'Ahmedabad', '', '', 'https://safal.com', '1612069800.jpg', 2, '2021-01-31 05:00:31.182938'),
(4, 'Saptarshi', 'R', 'Das', 'sdas@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '0884936423', 'Yottol', 'https://www.yottol.com/', 'dsdsdsds', 'India', 'Gujarat', 'Ahmedabad', '', '', '', '1612801064.png', 2, '2021-02-02 17:34:52.245271');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `read_unread_status` int(1) NOT NULL DEFAULT 1,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `read_unread_status`, `created_time`) VALUES
(1, 'Smit', 'smitshah22050602@gmail.com', 'Hello Testing', 'This is testing', 4, 0, '2021-01-11 18:28:09.824823'),
(2, 'Smit', 'smitshah22050602@gmail.com', 'Hello Testing', 'This is testing', 4, 0, '2021-01-11 18:29:26.160940'),
(3, 'Shah', 's@gmail.com', 'Hello Testing2', 'Testing2', 4, 1, '2021-01-11 18:32:15.492030'),
(4, 'sds', 'smit@gmail.com', 'Hello Testing3', 'Testing3', 4, 0, '2021-01-11 18:35:17.363870');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `enrollmentno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contry` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `colleagename` varchar(255) NOT NULL,
  `sgpa` varchar(255) NOT NULL,
  `graduationyear` varchar(255) NOT NULL,
  `hscschoolname` varchar(255) NOT NULL,
  `hscboardname` varchar(255) NOT NULL,
  `hsccgpa` varchar(255) NOT NULL,
  `hscyear` varchar(255) NOT NULL,
  `sscschoolname` varchar(255) NOT NULL,
  `sscboardname` varchar(255) NOT NULL,
  `ssccgpa` varchar(255) NOT NULL,
  `sscyear` varchar(255) NOT NULL,
  `coverletter` varchar(255) NOT NULL,
  `intrestarea` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `middlename`, `lastname`, `enrollmentno`, `email`, `password`, `contactnumber`, `dateofbirth`, `gender`, `contry`, `state`, `district`, `colleagename`, `sgpa`, `graduationyear`, `hscschoolname`, `hscboardname`, `hsccgpa`, `hscyear`, `sscschoolname`, `sscboardname`, `ssccgpa`, `sscyear`, `coverletter`, `intrestarea`, `resume`, `whatsapp`, `github`, `linkedin`, `skype`, `status`, `created_time`) VALUES
(9, 'Smit', '', 'shah', '22332', 'xxyyzz2206@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2020-12-29 12:35:36.912056'),
(11, 'Smit', 'Rupeshkumar', 'Shah', '54', 'smitshah22050602@gmail.com', 'e7e48185d817150e8869be5ad23fc90f', '8849364239', '2000-02-06', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'IndusUniversity', '822', '2026', 'Navchetan', 'Gujarat Board', '70', '2026', 'Navchetan', 'Gujarat Board', '80', '2026', 'Hello I am Smit', 'saadsad', '1612462196.pdf', '9409324362', 'https://www.github.com', 'https://www.github.com', 'https://www.github.com', 2, '2021-01-01 09:45:25.702250'),
(12, 'Bhavya', '', 'Shah', '05', 'bhavyashah2206@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2021-02-02 15:22:17.181915'),
(13, 'Sumit', '', 'Sapoliya', '44', 'sumit@gmail.com', '070c46ae1c20ded0f348e3e282e9c35a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2021-02-02 23:03:32.615728');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `id` int(11) NOT NULL,
  `job_post_id` int(255) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `round_status` int(1) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`id`, `job_post_id`, `employee_id`, `round_status`, `created_time`) VALUES
(1, 1, 11, 3, '2021-01-13 17:18:50.896963'),
(10, 1, 9, 3, '2021-01-25 15:46:46.714336'),
(11, 2, 11, 1, '2021-02-02 09:53:32.272566');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_ctc` varchar(255) NOT NULL,
  `job_deadlinedate` varchar(255) NOT NULL,
  `job_vacancies` int(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_eligiblity` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `job_title`, `job_ctc`, `job_deadlinedate`, `job_vacancies`, `job_type`, `job_location`, `job_eligiblity`, `job_description`, `status`, `created_by`, `created_time`) VALUES
(1, 'Devloper', '2L - 3L', '2021-01-09', 4, 'Full Time', 'Ahmedabad', 'Null', 'Null', 4, '1', '2021-01-09 07:32:48.015899'),
(2, 'Devloper', '2L - 3L', '2021-01-18', 4, 'Part Time', 'Ahmedabad', 'null', 'null', 4, '2', '2021-01-18 16:52:25.318029'),
(4, 'Designer', '2L - 3L', '2021-02-03', 4, 'Part Time', 'Ahmedabad', 'Hello \r\nNothing\r\njsjdjdjjsds', 'sdsdsdsds', 4, '1', '2021-02-03 18:29:43.580443'),
(5, 'Software Engineer', '2L - 3L', '2021-01-01', 2, 'Full Time', 'Vadodra', 'Null', 'Urgent Required', 4, '1', '2021-02-09 06:35:21.035713');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`id`, `email`, `created_at`) VALUES
(1, 'smitshah22050602@gmail.com', '2021-02-09 16:46:55.380088'),
(2, 'admin@gmail.com', '2021-02-09 16:48:41.596453'),
(3, 'xxyyzz2206@gmail.com', '2021-02-09 16:50:03.349029'),
(4, 'sdas@gmail.com', '2021-02-09 16:51:04.742597'),
(5, 'smit@gmail.com', '2021-02-09 16:52:52.430739');

-- --------------------------------------------------------

--
-- Table structure for table `round_status`
--

CREATE TABLE `round_status` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `round_status`
--

INSERT INTO `round_status` (`id`, `message`) VALUES
(1, 'Applied'),
(2, 'Apptitude'),
(3, 'Interview'),
(4, 'Selected'),
(5, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`) VALUES
(1, 'Profile Update Pending'),
(2, 'Profile Updated'),
(3, 'Deleted'),
(4, 'Created'),
(5, 'Verification Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round_status`
--
ALTER TABLE `round_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `round_status`
--
ALTER TABLE `round_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
