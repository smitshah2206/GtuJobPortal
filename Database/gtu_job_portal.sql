-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 08:46 PM
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
(1, '1613284526.png', 'Helllo', 'lalallalalla', '2021-02-14 06:33:03.842598'),
(2, '1613284459.png', 'Helllo', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2021-02-14 06:33:18.293530');

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
(1, 'Smit', 'Rupeshkumar', 'Shah', 'smitshah22050602@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '8849364239', 'Yottol', 'https://www.yottol.com/', 'Null', 'India', 'Gujarat', 'Ahmedabad', '9409324362', '', '', '1613234170.png', 2, '2021-02-13 16:34:24.641412');

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
(1, 'Smit Shah', 'smitshah22050602@gmail.com', 'Hello', 'aaaaaaaaaaaaaaaaaaa', 4, 1, '2021-02-14 06:35:50.813404'),
(2, 'aaaaaaaaaaa', 'smitshah@gmail.com', 'ddddfdf', 'ssewewew', 4, 1, '2021-02-14 06:38:02.267753');

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
(1, 'smit', 'Rupeshkumar', 'Shah', '123456789012', 'smitshah22050602@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '8849364239', '2021-02-13', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'Indus University', '9', '2024', 'Navchetan', 'Gujarat Board', '70', '2026', 'Navchetan', 'Gujarat Board', '80', '2026', '', 'Web Devloper', '1613234636.pdf', '', '', '', '', 2, '2021-02-13 21:58:41.190264');

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
(1, 1, 1, 1, '2021-02-13 16:45:59.697099');

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
  `exam_url` varchar(255) NOT NULL,
  `job_eligiblity` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `job_title`, `job_ctc`, `job_deadlinedate`, `job_vacancies`, `job_type`, `job_location`, `exam_url`, `job_eligiblity`, `job_description`, `status`, `created_by`, `created_time`) VALUES
(1, 'Devloper', '2L - 3L', '2021-02-13', 3, 'Full Time', 'Ahmedabad', 'http://www.gmail.com', 'Null', 'Null', 4, '1', '2021-02-13 16:38:54.998815'),
(2, 'Devloper', '2L - 3L', '2021-02-13', 3, 'Part Time', 'Ahmedabad', 'http://www.gmail.com', 'Null', 'Null', 4, '1', '2021-02-13 16:49:04.198804');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `about_info` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `about_info`, `contact_address`, `contact_number`, `contact_email`, `contact_website`) VALUES
(1, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Ahmedabad , Gujarat', '1234567890', 'info@gmail.com', 'https://www.yoursite.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_designation` varchar(255) NOT NULL,
  `person_image` varchar(255) NOT NULL,
  `person_message` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `person_name`, `person_designation`, `person_image`, `person_message`, `created_at`) VALUES
(2, 'ABC DEF', 'MARKETING MANAGER', '1613716495.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2021-02-19 06:33:13.296059'),
(3, 'GHI JKL', 'Web Developer', '1613763036.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2021-02-19 19:30:36.543310'),
(4, 'MNO PQR', 'System Analyst', '1613763564.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2021-02-19 19:34:47.673187'),
(5, 'STU VWX', 'Interface Designer', '1613763287.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2021-02-19 19:37:46.000000');

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
-- Indexes for table `page`
--
ALTER TABLE `page`
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
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
