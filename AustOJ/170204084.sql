-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 10:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `170204084`
--
CREATE DATABASE IF NOT EXISTS `170204084` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `170204084`;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `description` longtext NOT NULL,
  `feature` longtext NOT NULL,
  `platform` text NOT NULL,
  `language` text NOT NULL,
  `os` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`description`, `feature`, `platform`, `language`, `os`) VALUES
('Our Project AUST OJ is an online judge where a programmer can give challenge or take part of a challenge.Here, a programmer can judge his skill of programming and improve his skill by solving various problems.\r\nOne can create e new problem,set difficulty level and challenge others to solve his problem.', '1.Create and update new problem\r\n2.Compile code\r\n3.Write blogs and get suggestions from other users\r\n4.Submit problem and get submissions details\r\n5.Give suggestions to developer\r\n', 'Html,Php,JavaScript,CSS', 'C++ 11', 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `username` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `heading`, `message`, `username`, `userid`) VALUES
(9000001, 'Faster I/O', 'You may have come across programming challenges where you are asked to use “faster I/O”. For those of you who have been in the sport programming arena for a while, you already know why you need to do this. This instruction in a challenge is the telltale sign that the test cases contains large input/output data.\r\n\r\nHow Do You Use Faster I/O?\r\nThe answer to this depends on which programming language you are using.\r\n\r\nC++\r\nIf you are using C++, you can easily switch to faster I/O by adding the following two lines at the beginning of your main() function:\r\n\r\nios_base::sync_with_stdio(false);\r\ncin.tie(NULL);\r\nYou must call ios_base::sync_with_stdio(false) before performing any input/output operation. And so, it is a good idea to do it at the beginning of your main function. The effect doing it later is implementation-specific and may not work as expected.\r\n\r\nWhen this function is called with false, it disables synchronization of C++ streams with C streams after each input/output operation.\r\n\r\nIn addition to this, you can use \'\\n\' at the end of a cout instead of endl:\r\n\r\ncout << x << \'\\n\';\r\nAlternatively, you can use printf and scanf in C++ by including “stdio.h”.\r\n\r\nprintf(\"%d\\n\", x);', 'alamkhan', 7),
(9000002, 'Just Test', 'Testing Our database', 'alamkhan', 7),
(9000003, 'Co-Prime Numbers', 'If you are given two numbers x and y, then their common divisor is a number z such that x and y are both divisible by z. And GCD is the largest number among all of the common divisors of x and y.\r\n\r\nIf you are given 8 and 12, the common divisors of these two numbers are 1, 2 and 4. Here, 4 is the largest and so 4 is the greatest common divisor of 8 and 12.\r\n\r\nNow if the GCD of x and y is 1, then x and y are co-prime numbers. For example, 9 and 14, and 21 and 52 are some examples of co-prime numbers.\r\n\r\nThen in Gauss’ problem, if N is a prime number, how many of the numbers between 1 and N are co-prime? Suppose N is 7, which is a prime number; then if you think about it, all of the numbers between from 1 to 6 are co-prime with 7. This is true for all prime numbers.\r\n\r\nTherefore, if N is a prime number, then:\r\n\r\nphi(N) = N-1ϕ(N)=N−1', 'alamkhan', 7),
(9000004, 'Prime Power', 'What about prime powers? Let’s say N is 125 which is a prime power of 5 (53). Determining the number of co-primes for 125 is a bit tricky. But may be it would be easier to answer which numbers are not co-prime with 125.\r\n\r\nA few of such numbers would be 5, 10, 15, 20, 25, etc. These numbers are not co-prime with 125 because the GCD of these numbers with 125 are greater than 1. And this can only happen when there exists common prime factors of both numbers. For example, here is the prime factorization of 125 and 50 (and they are co-prime with each other):\r\n\r\n125 = 5 	imes 5 	imes 5125=5×5×5\r\n\r\n50 = 2 	imes 5 	imes 550=2×5×5\r\n\r\nHere you can see both of these numbers have 5 as their prime factor. And so their GCD will be greater than 1. Any prime power, when factorized, will always yield one prime number as its prime factor.\r\n\r\nTherefore, for any number to have GCD with 125 greater than 1 it must have 5 among its prime factors. In other words, if N = P^x and P is a prime number, then P must be a prime factor of all numbers for which the GCD with N is greater than 1.\r\n\r\nNow to determine how many whole numbers from 1 to 125 are not co-prime with 125, we need to determine how many numbers in that range are divisible by 5. And, to do that, we need to divide 125 by 5. There are 25 numbers from 1 to 125 that are divisible by 5, and that means there are 25 numbers in that range that are not co-prime with 125.\r\n\r\nThen how many numbers are co-prime with 125? Easy: 125 - 25 = 100.', 'Ashiqul Islam2', 15);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `blogid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`blogid`, `username`, `userid`, `comment`) VALUES
(9000001, 'Ashiqul Islam', 14, 'nice tutorial'),
(9000001, 'Ashiqul Islam', 14, 'thanks for the blog'),
(9000001, 'alamkhan', 7, 'Thanks ashik'),
(9000001, 'alamkhan', 7, 'When this function is called with false, it disables synchronization of C++ streams with C streams after each input/output operation.'),
(9000002, 'alamkhan', 7, 'Successful'),
(9000003, 'Ashiqul Islam', 14, 'Thanks');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contactNo` varchar(200) NOT NULL,
  `problems` longtext NOT NULL,
  `suggestions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `contactNo`, `problems`, `suggestions`) VALUES
('', '170204070@aust.edu', '01644565645', 'No Problem', 'suggestions'),
('', '170204070@aust.edu', '01564451235', 'I cannot submit in java language', 'Please add java language in your website'),
('', '1@gmail.com', '1', '1', '1'),
('', '170204070@aust.edu', '01655454595', 'No Problems', 'No Suggestions');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `picture` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`picture`, `name`, `email`, `phone`) VALUES
('images\\alam.jpg', 'Alam Khan', '170204084@aust.edu', '01643993279'),
('images\\ashik.jpg', 'Ashiqul Islam', '170204070@aust.edu', '01989023211');

-- --------------------------------------------------------

--
-- Table structure for table `input-output`
--

CREATE TABLE `input-output` (
  `id` varchar(200) NOT NULL,
  `input` longtext NOT NULL,
  `output` longtext NOT NULL,
  `isSample` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `problemset`
--

CREATE TABLE `problemset` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `difficulty` varchar(200) NOT NULL,
  `totalsolved` int(11) NOT NULL,
  `timelimit` int(11) NOT NULL,
  `statement` longtext NOT NULL,
  `inputformat` longtext NOT NULL,
  `constraints` longtext NOT NULL,
  `outputformat` longtext NOT NULL,
  `sampleinput` longtext NOT NULL,
  `sampleoutput` longtext NOT NULL,
  `hiddeninput` longtext NOT NULL,
  `hiddenoutput` longtext NOT NULL,
  `author` varchar(200) NOT NULL,
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problemset`
--

INSERT INTO `problemset` (`id`, `name`, `difficulty`, `totalsolved`, `timelimit`, `statement`, `inputformat`, `constraints`, `outputformat`, `sampleinput`, `sampleoutput`, `hiddeninput`, `hiddenoutput`, `author`, `authorid`) VALUES
(10002, 'Three Occurrences', 'Hard', 0, 6, 'You are given an array a consisting of n integers. We denote the subarray a[l..r] as the array [al,al+1,…,ar] (1≤l≤r≤n).\r\n\r\nA subarray is considered good if every integer that occurs in this subarray occurs there exactly thrice. For example, the array [1,2,2,2,1,1,2,2,2] has three good subarrays:\r\n\r\na[1..6]=[1,2,2,2,1,1];\r\na[2..4]=[2,2,2];\r\na[7..9]=[2,2,2].\r\nCalculate the number of good subarrays of the given array a.', 'The first line contains one integer n.\r\n\r\nThe second line contains n integers a1, a2, ..., an.', ' 1≤n≤5⋅10^5\r\n\r\n 1≤ai≤n', 'Print one integer — the number of good subarrays of the array a.', '12\r\n1 2 3 4 3 4 2 1 3 4 2 1\r\n', '1', '9\r\n1 2 2 2 1 1 2 2 2\r\n', '3', 'alamkhan', 7),
(10004, 'Addition', 'Easy', 2, 5, 'Add two integers a and b.', 'First line of input contains two integers a and b.', '1<=a,b<=100', 'Output the result in a single line', '2 8', '10', '100 100', '200', 'alamkhan', 7),
(10005, 'Multiplication', 'Easy', 1, 1, 'Multiply two numbers a and b', 'Input contains two integer a and b', '1<=a,b<=1000', 'Print the result of the problem', '4 7', '28', '1000 1000', '1000000', 'alamkhan', 7);

-- --------------------------------------------------------

--
-- Table structure for table `project_picture`
--

CREATE TABLE `project_picture` (
  `name` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_picture`
--

INSERT INTO `project_picture` (`name`, `path`) VALUES
('aboutus', 'images/aboutus.png'),
('contact', 'images/contact-pic.jpg'),
('header', 'images/header.png'),
('login', 'images/signin-image.jpg'),
('logo', 'images/logo.png'),
('register', 'images/signup-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(200) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `problemname` varchar(200) NOT NULL,
  `verdict` varchar(200) NOT NULL,
  `code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `time`, `username`, `problem_id`, `problemname`, `verdict`, `code`) VALUES
(5000001, '2020-09-18 16:21:18', 'alamkhan', 10002, 'Three Occurrences', 'Accepted', 't3 klnjregkljrndfsghfdklhbdflbfdsnr ghtfhgdfh'),
(5000002, '2020-09-19 22:44:32', 'alamkhan', 10002, 'Three Occurrences', 'Compile Error', 'foihjghdfnsjgkhfdkfdsgfdg'),
(5000003, '2020-09-19 23:05:25', 'alamkhan', 10002, 'Three Occurrences', 'Wrong Answer', '#include<stdio.h>\r\nint main()\r\n{\r\nint n,i,x;\r\nscanf(\"%d\",&n);\r\nfor(int i=0;i<n;i++)\r\n{\r\nscanf(\"%d\",&x);\r\n}\r\n printf(\"2\");\r\n\r\n}'),
(5000004, '2020-09-19 23:05:44', 'alamkhan', 10002, 'Three Occurrences', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\nint n,i,x;\r\nscanf(\"%d\",&n);\r\nfor(int i=0;i<n;i++)\r\n{\r\nscanf(\"%d\",&x);\r\n}\r\n printf(\"1\");\r\n\r\n}'),
(5000005, '2020-09-19 23:20:04', 'alamkhan', 10002, 'Three Occurrences', 'Wrong Answer', '#include<stdio.h>\r\nint main()\r\n{\r\nint n,i,x;\r\nscanf(\"%d\",&n);\r\nfor(int i=0;i<n;i++)\r\n{\r\nscanf(\"%d\",&x);\r\n}\r\n printf(\"2\");\r\n\r\n}'),
(5000011, '2020-09-20 01:20:55', 'alamkhan', 10004, 'Addition', 'Accepted', '  #include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\n  printf(\"%d\",x+y);\r\n}    '),
(5000013, '2020-09-20 01:25:55', 'alamkhan', 10004, 'Addition', 'Compile Error', 'ORDER BY id desc'),
(5000014, '2020-09-20 01:28:42', 'alamkhan', 10005, 'Multiplication', 'Time Limit Exceeded', '   #include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\n  printf(\"%d\",x*y);\r\n}  '),
(5000015, '2020-09-20 01:30:03', 'alamkhan', 10005, 'Multiplication', 'Accepted', '    #include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\n  printf(\"%d\",x*y);\r\n}     '),
(5000017, '2020-09-20 01:37:29', 'alamkhan', 10005, 'Multiplication', 'Compile Error', '     #include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\n  printf(\"%d\",0/0);\r\n'),
(5000018, '2020-09-20 01:37:54', 'alamkhan', 10005, 'Multiplication', 'Compile Error', '     #include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\nx = y = 0;\r\n  printf(\"%d\",x/y);\r\n'),
(5000020, '2020-09-20 02:04:14', 'Ashiqul Islam', 10004, 'Addition', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n  int x,y;\r\n  scanf(\"%d%d\",&x,&y);\r\n  printf(\"%d\",x+y);\r\n} ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(4) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `contactno` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `gender`, `contactno`, `birthdate`, `picture`) VALUES
(6, 'alamkhaan', '170204084@aust.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '01729652322', '1998-01-03', 'images/male.jpg'),
(7, 'alamkhan', 'alamkhaan1997@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '01643993279', '1998-01-03', 'images/DSC_0224.jpg'),
(14, 'Ashiqul Islam', '170204070@aust.edu', '25f9e794323b453885f5181f1b624d0b', 'Male', '01989023211', '1998-10-14', 'images/ashik1.jpg'),
(15, 'Ashiqul Islam2', 'check@aust.edu', '0f78a8ef180f35345e74d9598ff21664', 'Male', '01562478962', '2020-09-02', 'images\\male.jpg'),
(16, 'test', '12@aust.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '01336654789', '2020-09-01', 'images/116881143_835313440628300_500266416388597154_n.jpg'),
(17, 'test2', '13@aust.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '01900000000', '2020-08-31', 'images/default-avatar_female.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `problemset`
--
ALTER TABLE `problemset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9000005;

--
-- AUTO_INCREMENT for table `problemset`
--
ALTER TABLE `problemset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000021;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
