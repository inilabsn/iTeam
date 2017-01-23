-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 04:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
`alertID` int(11) unsigned NOT NULL,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL
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
`grouptasksID` int(11) unsigned NOT NULL,
  `group_name` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `description` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `grouptasks`
--

INSERT INTO `grouptasks` (`grouptasksID`, `group_name`, `date`, `description`) VALUES
(2, 'aaaaaaaa', '2015-01-02', 'fafa<br>'),
(3, 'aaaaaaaa', '2015-01-02', 'fafa<br>'),
(4, 'aaaaaaaa', '2015-01-02', 'fafa<br>'),
(5, 'ccccccc', '2015-01-02', 'hello<br>');

-- --------------------------------------------------------

--
-- Table structure for table `grptaskslist`
--

CREATE TABLE IF NOT EXISTS `grptaskslist` (
`grptaskslistID` int(11) unsigned NOT NULL,
  `groupID` int(11) NOT NULL,
  `tasksID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `grptaskslist`
--

INSERT INTO `grptaskslist` (`grptaskslistID`, `groupID`, `tasksID`, `name`) VALUES
(4, 5, 16, 'ha ha'),
(6, 5, 14, 'bbb'),
(7, 5, 13, 'lorem ipsome'),
(8, 2, 13, 'lorem ipsome'),
(9, 2, 8, 'koi mill gaya'),
(10, 5, 8, 'koi mill gaya'),
(11, 4, 7, 'oka layla kosam'),
(12, 4, 6, 'Footer design'),
(13, 3, 13, 'lorem ipsome'),
(14, 3, 9, 'lorem ipsome');

-- --------------------------------------------------------

--
-- Table structure for table `ini_sessions`
--

CREATE TABLE IF NOT EXISTS `ini_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ini_sessions`
--

INSERT INTO `ini_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('c672b56bf644e13da914c3cb0a17d910', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1428849203, 'a:9:{s:9:"user_data";s:0:"";s:4:"name";s:8:"John Doe";s:5:"email";s:13:"john@demo.com";s:8:"usertype";s:5:"Admin";s:8:"username";s:4:"john";s:5:"photo";s:13:"924317455.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;s:6:"userID";s:1:"1";}');

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
`noticeID` int(11) unsigned NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `notice` text,
  `date` varchar(10) DEFAULT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeID`, `title`, `notice`, `date`, `create`) VALUES
(1, 'LOrem Ipsome memo', 'lorem ipsome<br>', '02-01-2015', '2015-02-26 23:42:44'),
(2, 'Lorem some ipsome', 'lorem ipsome copa lai lam<br>', '2015-03-12', '2015-03-27 11:33:05'),
(3, 'Holiday', '<span><em>Lorem ipsum</em> dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat volutpat. Ut wisi enim <br></span><br>', '2015-03-15', '2015-04-09 16:36:23'),
(4, 'asdf', 'asdf<br>', '2015-04-15', '2015-04-12 14:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`project_id` int(11) NOT NULL,
  `project_create_date` date NOT NULL,
  `project_deadline` date DEFAULT NULL,
  `project_client_id` int(11) DEFAULT NULL,
  `project_title` varchar(128) DEFAULT NULL,
  `project_description` longtext,
  `project_status` varchar(128) NOT NULL,
  `project_percentage` tinyint(3) DEFAULT NULL,
  `project_client_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_create_date`, `project_deadline`, `project_client_id`, `project_title`, `project_description`, `project_status`, `project_percentage`, `project_client_name`) VALUES
(2, '2015-02-04', '2015-03-10', 3, 'Logo Design', 'lorem ipsome<br>', 'in progress', 40, NULL),
(3, '2015-03-06', '2015-03-12', 3, 'Website Development', 'lorem ipsome<br>', 'in progress', 25, 'Jane Doe'),
(4, '2015-04-01', '2015-03-20', 5, 'Interior Design', 'Description a<br>', 'in progress', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`settingID` int(11) unsigned NOT NULL,
  `sitename` varchar(128) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `phone` tinytext NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(128) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `currency` text NOT NULL,
  `usertype` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_title` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `task_title`, `description`, `status`) VALUES
(1, 3, 'Create logo design', 'Hello world', 1),
(2, 3, 'lorem ipsome', 'lorem', 1),
(3, 3, 'Footer design', 'lorrem ipsome lora bekhan', 1),
(4, 2, 'lore lore kharay', 'day dhukiy', 1),
(5, 2, 'Create logo design', 'hello', 1),
(6, 2, 'Footer design', 'coca cola', 0),
(7, 2, 'oka layla kosam', 'oa oka', 0),
(8, 2, 'koi mill gaya', 'karan johar', 0),
(9, 2, 'lorem ipsome', 'lorem ipsome', 0),
(10, 2, 'hello', 'hello', 1),
(13, 4, 'lorem ipsome', 'asf', 0),
(14, 4, 'bbb', 'bbb', 1),
(16, 3, 'ha ha', 'hello hello', 1),
(17, 4, 'asdf', 'asdfasdf', 1),
(18, 4, 'adsafaf', 'fafafaf', 1),
(19, 3, 'hoho', 'hello', 0),
(20, 5, 'prothome room e khojo', 'asdfasdf', 1),
(21, 5, 'asdfasd', 'fasdfasdf', 0),
(22, 4, 'asdf', 'asdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE IF NOT EXISTS `task_user` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(11, 22, 3, '2015-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `timetracker`
--

CREATE TABLE IF NOT EXISTS `timetracker` (
`timetrackerID` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `timehour` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
(8, '2015-04-13', 12, 2, 8, 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) unsigned NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `gender` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` tinytext NOT NULL,
  `photo` varchar(128) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(128) DEFAULT NULL,
  `date_time` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `gender`, `email`, `phone`, `photo`, `username`, `password`, `usertype`, `date_time`) VALUES
(1, 'John Doe', 'Male', 'john@demo.com', '+8801777777777777', '924317455.png', 'john', '57adba227c499567d3766e5662fb04b3b2955d3cd475c5e83ef2db5dfe9ec1d1f5e6cf2308b83d0a01b177d3309aefe1370f2f6dd462415f47fec1c3d295749d', 'Admin', '2014-11-08'),
(3, 'Jane Doe', 'Female', 'jane@demo.com', '+99999999999', '608024504.png', 'jane', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'User', '2015-02-28'),
(4, 'Smith', 'Male', 'smith@demo.com', '+99999999999', '224985392.png', 'smith', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'User', '2015-02-28'),
(5, 'Dipok Halder', 'Male', 'dipokh@inilabe.net', '+8801728660964', '663825630.png', 'dipok', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Client', '2015-03-11'),
(6, 'Heron Halder', 'Male', 'heronh@yahoo.com', '+8801736983130', '217565029.png', 'heron', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Client', '2015-03-11'),
(7, 'rid islam', 'Male', 'me@ridislam.com', '01676667726', '1145370054.png', 'ridislam', 'bd363f8c950879eff522990e404f8ab397e152f1eba1e89db917122b1b858162faa8946525ca5f6843970a2351d2afd40bd56f0017baf367cf1b43174829e878', 'Project manager', '2015-03-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
 ADD PRIMARY KEY (`alertID`);

--
-- Indexes for table `grouptasks`
--
ALTER TABLE `grouptasks`
 ADD PRIMARY KEY (`grouptasksID`);

--
-- Indexes for table `grptaskslist`
--
ALTER TABLE `grptaskslist`
 ADD PRIMARY KEY (`grptaskslistID`);

--
-- Indexes for table `ini_sessions`
--
ALTER TABLE `ini_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`noticeID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetracker`
--
ALTER TABLE `timetracker`
 ADD PRIMARY KEY (`timetrackerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
MODIFY `alertID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grouptasks`
--
ALTER TABLE `grouptasks`
MODIFY `grouptasksID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grptaskslist`
--
ALTER TABLE `grptaskslist`
MODIFY `grptaskslistID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `noticeID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `settingID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `timetracker`
--
ALTER TABLE `timetracker`
MODIFY `timetrackerID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
