-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 09:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
(1, '1615201942.jpg', 'What are the best career blogs?', 'Top 100 Career Blogs, Websites & Influencers in 2020. 1 1. Work It Daily. Hampton, New Hampshire, United States About Blog Work It Daily is an online learning platform that provides trusted, easy-to-use ', '2021-02-14 06:33:03.842598'),
(2, '1615201861.jpg', 'Helllo', 'blog1', '2021-02-14 06:33:18.293530'),
(3, '1615206602.jpg', 'Starting a New Blog', 'What started out as a simple solution for content creation, has now evolved into one of the most revolutionary platforms and companies on the internet today. And when you consider the thousands of plugins and themes available for WordPress', '2021-02-20 11:06:35.292305');

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
(1, 'Smit', 'Rupeshkumar', 'Shah', 'smitshah22050602@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '8849364239', 'Yottol', 'https://www.yottol.com/', 'Null', 'India', 'Gujarat', 'Ahmedabad', '9409324362', '', '', '1613234170.png', 2, '2021-02-13 16:34:24.641412'),
(2, 'Company', 'Company', 'Company', 'company@gmail.com', 'ee914d2e8acab80b3fb129cd73e70b0e', '7227885483', 'Company', 'https://www.company.com', 'About', 'India', 'Gujarat', 'Ahmedabad', '7227885483', '', '', '1613818307.jpg', 2, '2021-02-20 10:28:53.084814'),
(3, 'new', '', 'company', 'company2@gmail.com', '102a23a0e4661368943dacb516a18cc8', '', '', '', '', '', '', '', '', '', '', '', 1, '2021-03-02 07:55:18.460110'),
(4, 'Alex', 'A', 'White', 'alex@radixweb.com', '25f9e794323b453885f5181f1b624d0b', '5555555555', 'Radixweb', 'https://radixweb.com', 'Software Development', 'India', 'Gujarat', 'Ahmedabad', '', '', '', '1615203423.jpg', 2, '2021-03-08 11:32:41.013843');

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
(1, 'Smit Shah', 'smitshah22050602@gmail.com', 'Hello', 'aaaaaaaaaaaaaaaaaaa', 4, 0, '2021-02-14 06:35:50.813404'),
(2, 'aaaaaaaaaaa', 'smitshah@gmail.com', 'ddddfdf', 'ssewewew', 4, 0, '2021-02-14 06:38:02.267753'),
(3, 'R', 'rvj12899@gmail.com', 'INQUIRY', 'testing function', 4, 0, '2021-02-20 10:23:49.005233'),
(4, 'Rvj', 'rvj12899@gmail.com', 'Inquiry for job', 'ok', 4, 1, '2021-03-09 05:59:41.156235');

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
(1, 'smit', 'Rupeshkumar', 'Shah', '123456789012', 'smitshah22050602@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', '8849364239', '2021-02-13', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'Indus University', '9', '2024', 'Navchetan', 'Gujarat Board', '70', '2026', 'Navchetan', 'Gujarat Board', '80', '2026', '', 'Web Devloper', '1613234636.pdf', '', '', '', '', 2, '2021-02-13 21:58:41.190264'),
(2, 'Rutvik', 'V', 'Jaimalani', '171250107012', 'rvj12899@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7227885483', '1999-08-12', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'SSIT ', '8', '2021', 'Skum ', 'Gujarat Board', '85', '2017', 'Skum ', 'Gujarat Board', '80', '2015', '', '', '1615197138.pdf', '7227885483', '', '', '', 2, '2021-02-20 15:42:04.714503'),
(8, 'Candidate', '', 'Ahmedabad', '171250107001', 'candidate1@gmail.com', '102a23a0e4661368943dacb516a18cc8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2021-03-02 21:28:55.934587'),
(9, 'R', '', 'V', '171250107002', 'r@gmail.com', '102a23a0e4661368943dacb516a18cc8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2021-03-06 15:17:35.966741'),
(10, 'Hemal', 'Amitbhai', 'Patel', '151250107001', 'hemal@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8888888888', '1997-01-02', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'ADIT BE IT', '8.5', '2019', 'HBK', 'CBSE', '80', '2015', 'HBK', 'CBSE', '85', '2013', 'BE IT \r\n2 YEAR EXPERIENCE', '', '1615199274.pdf', '', '', '', '', 2, '2021-03-08 15:51:29.253981'),
(11, 'KUNJ', 'Pravinbhai', 'PATEL', '161250107001', 'kunj@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7777777777', '1999-01-08', 'Male', 'India', 'Gujarat', 'Ahmedabad', 'silveroak BE CE', '8.6', '2020', 'HBK', 'CBSE', '85', '2016', 'HBK', 'CBSE', '85', '2014', '', '', '1615199758.pdf', '', '', '', '', 2, '2021-03-08 16:01:42.803794');

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
(1, 1, 1, 1, '2021-02-13 16:45:59.697099'),
(2, 3, 2, 2, '2021-02-20 11:20:04.402507'),
(3, 5, 11, 2, '2021-03-08 11:53:15.412810'),
(4, 4, 10, 1, '2021-03-08 11:53:59.596978');

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
(2, 'Devloper', '2L - 3L', '2021-02-13', 3, 'Part Time', 'Ahmedabad', 'http://www.gmail.com', 'Null', 'Null', 4, '1', '2021-02-13 16:49:04.198804'),
(3, 'Admin', '2L-3L', '2021-02-28', 2, 'Full Time', 'Ahmedabad', 'https://www.aptitude-test.com/', 'Any Graduate', 'Admin required for Gtu Alumni Job Portal', 4, '2', '2021-02-20 11:14:56.636332'),
(4, 'System Engineer ', '2.5L - 3L', '2021-05-15', 3, 'Full Time', 'Ahmedabad', 'https://www.aptitude-test.com', 'Any fresher BE, BCA, B.Sc (IT)', 'Freshers required\r\nPost - System Engineer\r\nManaging and monitoring all installed systems and infrastructure, Installing, Configuring, testing and maintaining. \r\n', 4, '4', '2021-03-08 11:42:04.534896'),
(5, 'Software Developers required', '2.5L-3L', '2021-05-08', 4, 'Full Time', 'Ahmedabad', 'https://www.aptitude-test.com', 'BE, B.Tech CE, IT, CSE, ICT', 'Research, Design, Implement, Managing software programs.\r\nTesting and evaluation of new programs.', 4, '4', '2021-03-08 11:51:49.938247');

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
(1, 'rvj12899@gmail.com', '2021-03-08 10:53:42.806048');

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
(1, ' GTU ALUMNI Job portal includes GTU students, Companies and Admin. \r\nThe employer can find best suitable candidates for their company. The main aims of this portal are to connect to the industries and acts as an online recruitment to support the students ', 'Ahmedabad , Gujarat', '9999999999', 'info@gtualumnijobportal.com', 'https://www.gtualumnijobportal.com');

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
(6, 'Kunj Patel', 'Jr. System Engineer', '1615200346.jpg', 'A very good job portal for GTU students. ', '2021-03-08 10:45:46.827226'),
(7, 'Hemal', 'Software Developer', '1615200534.jpg', 'A very good job portal......', '2021-03-08 10:48:54.410856');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
