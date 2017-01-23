-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2017 at 03:28 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alex`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `alertID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL,
  PRIMARY KEY (`alertID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`alertID`, `noticeID`, `username`, `usertype`) VALUES
(1, 1, 'john', 'Admin'),
(2, 2, 'john', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `grouptasks`
--

CREATE TABLE IF NOT EXISTS `grouptasks` (
  `grouptasksID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `group_name` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `description` text,
  PRIMARY KEY (`grouptasksID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `grouptasks`
--

INSERT INTO `grouptasks` (`grouptasksID`, `project_id`, `group_name`, `date`, `description`) VALUES
(8, 2, 'Final Group', '2015-04-14', 'HELLO World2<br>'),
(9, 4, 'aaaaaaaa', '2015-04-05', 'aaaa<br>'),
(14, 9, 'Group task 1', '2015-04-15', 'testaa<br>');

-- --------------------------------------------------------

--
-- Table structure for table `grptaskslist`
--

CREATE TABLE IF NOT EXISTS `grptaskslist` (
  `grptaskslistID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` int(11) NOT NULL,
  `tasksID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`grptaskslistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `grptaskslist`
--

INSERT INTO `grptaskslist` (`grptaskslistID`, `groupID`, `tasksID`, `name`) VALUES
(20, 9, 22, 'asdf'),
(21, 9, 13, 'lorem ipsome'),
(25, 8, 7, 'oka layla kosam'),
(29, 8, 6, 'Footer design'),
(30, 14, 24, 'Task 2');

-- --------------------------------------------------------

--
-- Table structure for table `ini_sessions`
--

CREATE TABLE IF NOT EXISTS `ini_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ini_sessions`
--

INSERT INTO `ini_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7041dfa318befc19f746fa1aee1dc1fe', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1435093066, 'a:9:{s:9:"user_data";s:0:"";s:4:"name";s:9:"rid islam";s:5:"email";s:15:"me@ridislam.com";s:8:"usertype";s:15:"Project manager";s:8:"username";s:8:"ridislam";s:5:"photo";s:12:"92736007.jpg";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;s:6:"userID";s:1:"7";}'),
('764923879a5842cb4a0d03a9d3e92124', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:39.0) Gecko/20100101 Firefox/39.0', 1442346742, 'a:9:{s:9:"user_data";s:0:"";s:4:"name";s:8:"John Doe";s:5:"email";s:13:"john@demo.com";s:8:"usertype";s:5:"Admin";s:8:"username";s:4:"john";s:5:"photo";s:13:"924317455.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;s:6:"userID";s:1:"1";}'),
('92d8f360d2e41808a1c9e8af771781bf', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1433353693, 'a:9:{s:9:"user_data";s:0:"";s:4:"name";s:8:"John Doe";s:5:"email";s:13:"john@demo.com";s:8:"usertype";s:5:"Admin";s:8:"username";s:4:"john";s:5:"photo";s:13:"924317455.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;s:6:"userID";s:1:"1";}'),
('d1ef395ae02e7190f9ddc0836180e60e', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0', 1485206824, 'a:9:{s:9:"user_data";s:0:"";s:4:"name";s:9:"rid islam";s:5:"email";s:15:"me@ridislam.com";s:8:"usertype";s:15:"Project manager";s:8:"username";s:8:"ridislam";s:5:"photo";s:12:"92736007.jpg";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;s:6:"userID";s:1:"7";}'),
('d8b2688b2ea7412f438f5c827386deff', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', 1456598810, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(14);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `noticeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `notice` text,
  `date` varchar(10) DEFAULT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`noticeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeID`, `title`, `notice`, `date`, `create`) VALUES
(2, 'Lorem some ipsome', 'lorem ipsome copa lai lam<br>', '2015-03-12', '2015-03-27 11:33:05'),
(3, 'Holiday', '<span><em>Lorem ipsum</em> dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat volutpat. Ut wisi enim <br></span><br>', '2015-03-15', '2015-04-09 16:36:23'),
(4, 'asdf', 'asdf<br>', '2015-04-15', '2015-04-12 14:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_create_date` date NOT NULL,
  `project_deadline` date DEFAULT NULL,
  `project_client_id` int(11) DEFAULT NULL,
  `project_title` varchar(128) DEFAULT NULL,
  `project_description` longtext,
  `project_status` varchar(128) NOT NULL,
  `project_percentage` tinyint(3) DEFAULT NULL,
  `project_client_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_create_date`, `project_deadline`, `project_client_id`, `project_title`, `project_description`, `project_status`, `project_percentage`, `project_client_name`) VALUES
(2, '2015-02-04', '2015-03-10', 3, 'Logo Design', 'lorem ipsome<br>', 'in progress', 40, NULL),
(3, '2015-03-06', '2015-03-12', 3, 'Website Development', 'lorem ipsome<br>', 'in progress', 25, 'Jane Doe'),
(4, '2015-04-01', '2015-03-20', 5, 'Testi', 'Description aaa<br>', 'in progress', 0, NULL),
(9, '2015-04-14', '2015-04-25', NULL, 'Testing', 'ete<br>', 'in progress', 0, NULL),
(10, '2015-04-20', '2015-04-25', NULL, 'Greetings', 'How are you..?<br>', 'in progress', 0, NULL),
(11, '2015-05-11', '2015-05-14', NULL, 'rrrrr', 'asdf<br>', 'in progress', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settingID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(128) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `phone` tinytext NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(128) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `currency` text NOT NULL,
  `usertype` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`settingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `task_title` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `task_title`, `description`, `status`) VALUES
(1, 3, 'Create logo design', 'Hello world', 1),
(2, 3, 'lorem ipsome', 'lorem', 1),
(3, 3, 'Footer design', 'lorrem ipsome lora bekhan', 1),
(5, 2, 'Create logo design', 'hello', 1),
(6, 2, 'Footer design', 'coca cola', 0),
(7, 2, 'oka layla kosam', 'oa oka', 0),
(8, 2, 'koi mill gaya', 'karan johar', 1),
(9, 2, 'lorem ipsome', 'lorem ipsome', 0),
(10, 2, 'hello', 'hello', 1),
(13, 4, 'lorem ipsome', 'asf', 1),
(14, 4, 'bbb', 'bbb', 1),
(16, 3, 'ha ha', 'hello hello', 1),
(17, 4, 'asdf', 'asdfasdf', 1),
(18, 4, 'adsafaf', 'fafafaf', 1),
(19, 3, 'hoho', 'hello', 0),
(20, 5, 'prothome room e khojo', 'asdfasdf', 1),
(21, 5, 'asdfasd', 'fasdfasdf', 0),
(22, 4, 'asdf', 'asdf', 0),
(23, 9, 'Task 1', 'gdsgdsgsdgsd', 0),
(24, 9, 'Task 2', 'rere', 1),
(25, 2, 'very good', 'edited!', 0),
(26, 10, 'asdf', 'asdf', 1),
(27, 10, 'cool', 'hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE IF NOT EXISTS `task_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`, `date`) VALUES
(1, 16, 3, '2015-03-08'),
(2, 16, 4, '2015-03-08'),
(3, 17, 3, '2015-03-10'),
(4, 18, 3, '2015-03-12'),
(5, 18, 4, '2015-03-12'),
(6, 19, 3, '2015-04-11'),
(7, 19, 4, '2015-04-11'),
(8, 20, 3, '2015-04-12'),
(9, 20, 4, '2015-04-12'),
(10, 21, 4, '2015-04-12'),
(11, 22, 3, '2015-04-12'),
(12, 23, 4, '2015-04-13'),
(13, 24, 4, '2015-04-17'),
(14, 25, 3, '2015-04-17'),
(16, 25, 4, '2015-04-17'),
(18, 25, 8, '2015-04-17'),
(19, 24, 8, '2015-04-17'),
(20, 26, 3, '2015-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `timetracker`
--

CREATE TABLE IF NOT EXISTS `timetracker` (
  `timetrackerID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `timehour` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(128) NOT NULL,
  PRIMARY KEY (`timetrackerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `timetracker`
--

INSERT INTO `timetracker` (`timetrackerID`, `date`, `timehour`, `projectID`, `taskID`, `userID`, `usertype`) VALUES
(1, '2015-03-24', 2, 4, 17, 3, 'User'),
(2, '2015-03-24', 5, 3, 16, 3, 'User'),
(3, '2015-03-24', 5, 4, 17, 3, 'User'),
(4, '2015-03-25', 5, 2, 6, 1, 'Admin'),
(5, '2015-04-10', 4, 4, 18, 1, 'Admin'),
(6, '2015-04-14', 4, 3, 19, 4, 'User'),
(7, '2015-04-15', 2, 5, 20, 1, 'Admin'),
(8, '2015-04-13', 12, 2, 8, 1, 'Admin'),
(9, '2015-04-15', 5, 4, 13, 1, 'Admin'),
(10, '2015-04-16', 4, 9, 23, 1, 'Admin'),
(11, '2015-04-16', 5, 9, 24, 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `gender` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` tinytext NOT NULL,
  `photo` varchar(128) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(128) DEFAULT NULL,
  `date_time` date DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `gender`, `email`, `phone`, `photo`, `username`, `password`, `usertype`, `date_time`) VALUES
(1, 'John Doe', 'Male', 'john@demo.com', '+8801777777777777', '924317455.png', 'john', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Admin', '2014-11-08'),
(3, 'Jane Doe', 'Female', 'jane@demo.com', '+99999999999', '608024504.png', 'jane', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'User', '2015-02-28'),
(4, 'Smith', 'Male', 'smith@demo.com', '+99999999999', '224985392.png', 'smith', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'User', '2015-02-28'),
(5, 'Dipok Halder', 'Male', 'dipokh@inilabe.net', '+8801728660964', '663825630.png', 'dipok', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Client', '2015-03-11'),
(6, 'Heron Halder', 'Male', 'heronh@yahoo.com', '+8801736983130', '217565029.png', 'heron', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Client', '2015-03-11'),
(7, 'rid islam', 'Male', 'me@ridislam.com', '01676667726', '92736007.jpg', 'ridislam', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Project manager', '2015-03-18'),
(9, 'aa', 'Male', 'emonhossain333@yahoo.com', 'aaa', 'default.png', 'aaa', 'e3d8ed7c6f353d544b0458f5564c3814dc44c50b6694efbb20c967b6311886fc1efdfcb0b17f2302c69645592cb3fcec8abfcc9cbc93f8e03ee5ce694fff8e13', 'User', '2015-04-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
