

CREATE TABLE IF NOT EXISTS `attendance` (
  `attid` int(11) NOT NULL auto_increment,
  `attdate` date NOT NULL,
  `classid` int(3) NOT NULL,
  `attendance` text NOT NULL,
  PRIMARY KEY  (`attid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attid`, `attdate`, `classid`, `attendance`) VALUES
(10, '2016-03-21', 14, '28,29,31,32,33,34,35,37,38,39'),
(9, '2016-03-12', 9, '1,4,5,6,7,8,9,10,11,12,13,16,21'),
(8, '2016-03-27', 9, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18'),
(11, '2016-03-01', 14, '32,33,34,35,36,37,38,39,40'),
(12, '2016-03-15', 14, '1,2,3,4,9,10,11,12,13'),
(13, '2016-03-03', 14, '1,2,3,5,6,7,8,10,11,12'),
(20, '2016-03-28', 9, '1,2,3,4,5,6,7,8,9,10,11,12,13'),
(19, '2016-03-29', 9, '4,7,12'),
(18, '2016-03-07', 9, '1,2,3,4,5,6,7,8,10,11'),
(21, '2016-03-01', 9, '1,2,3,4,5,6,7,8,11,12,13'),
(22, '2016-03-20', 9, '1,2,3,4,5,6,7,8,9'),
(23, '2016-02-29', 9, '1,2,3,4,5,6,7,8,9,10,11,12,13'),
(24, '2016-02-28', 9, '1,2,3,4,5,6,7,8,9,10,11,12'),
(25, '2016-02-16', 9, '1,2,3,4,5,6,7,8,9,10,11'),
(26, '2016-01-05', 9, '1,2,3,4,5,6,7,8,9,10,11,12'),
(27, '2016-01-12', 14, '1,2,3,4,5,6,7,8,9,10,12'),
(28, '2016-02-06', 9, '1,2,3,4,5,6,7,9,10,11,12,13'),
(29, '2016-04-12', 9, '3,4,5,6,7,8,9,10,11,12,13'),
(30, '2016-03-27', 15, '1,2,5'),
(31, '2016-03-31', 16, '3,4,7,8,9,11,12,13,14,15'),
(32, '2016-03-27', 16, '1,2,3,11,12,13,14,15,90'),
(33, '2016-03-28', 16, '1,2,3,7,8,15,90'),
(34, '2016-03-29', 16, '1,2,3,4,7,8,9,11,12'),
(35, '2012-03-20', 16, '1,3,4,7,8,11,13,14,15,21,25,78'),
(36, '2016-03-12', 15, '1,2,4'),
(37, '2012-03-02', 16, '4,7,9,11,12,13,14,15,21'),
(38, '2016-04-12', 16, '1,2,3,4,7,8,9,11,12,13,14,15,21,25,38,78');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE IF NOT EXISTS `class_list` (
  `classid` int(11) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL,
  `classyear` year(4) NOT NULL,
  `classteacher` varchar(30) NOT NULL,
  PRIMARY KEY  (`classid`,`classname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`classid`, `classname`, `classyear`, `classteacher`) VALUES
(20, '6a', 0000, 'ad'),
(19, '3a', 0000, 'we'),
(18, '2a', 0000, 'aa'),
(17, '1a', 0000, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE IF NOT EXISTS `event_list` (
  `eid` int(11) NOT NULL auto_increment,
  `eventname` mediumtext NOT NULL,
  `eventdate` date NOT NULL,
  `eventdesc` longtext NOT NULL,
  `eventemage` varchar(30) NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`eid`, `eventname`, `eventdate`, `eventdesc`, `eventemage`) VALUES
(11, 'garba', '0000-00-00', 'This page describes the different date formats that the strtotime(), DateTime and .... The "Day, month and two digit year, with dots or tabs" format (dd [.\\t] mm ".\r\nThis page describes the different ', '');

-- --------------------------------------------------------

--
-- Table structure for table `facultydetail`
--

CREATE TABLE IF NOT EXISTS `facultydetail` (
  `fid` int(11) NOT NULL auto_increment,
  `fname` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `address` mediumtext NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `facultydetail`
--

INSERT INTO `facultydetail` (`fid`, `fname`, `mobile`, `gender`, `qualification`, `address`) VALUES
(1, 'rohan', 8989899988, 'M', 'BED', '	"aa",asd\r\n.asd,asd,..		'),
(17, 'qqq', 1234567890, 'M', 'Msc', '			1234567890	'),
(18, 'aas', 1234567890, 'F', 'Bsc', '			1234567890	');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) default NULL,
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`,`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `email`, `verify`) VALUES
(18, 'sd', 'dff', 'sd', 0),
(17, 'j', 'j', '', 0),
(16, 'madhuri', 'd', '', 0),
(15, 'madhuri', 'd', '', 0),
(14, 'll', 'hj', '', 1),
(13, 'madhuri', 'b3cd915d758008bd19d0', 'aa@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE IF NOT EXISTS `student_list` (
  `studentid` int(11) NOT NULL auto_increment,
  `studentname` varchar(50) NOT NULL,
  `classid` int(3) NOT NULL,
  `rollno` int(3) NOT NULL,
  PRIMARY KEY  (`studentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`studentid`, `studentname`, `classid`, `rollno`) VALUES
(1, 'madhuri', 9, 1),
(41, 'u', 14, 8),
(3, 'amadhuri', 9, 2),
(4, 'qmadhuri', 9, 3),
(5, 'adhuri', 9, 4),
(6, 'ahuri', 9, 5),
(7, 'mhuri', 9, 6),
(8, 'mahuri', 9, 7),
(9, 'maduri', 9, 8),
(10, 'madri', 9, 9),
(11, 'adhuri', 9, 10),
(12, 'dhuri', 9, 11),
(13, 'uri', 9, 12),
(14, 'muri', 9, 13),
(15, 'madhuri', 8, 1),
(16, 'amadhuri', 8, 2),
(17, 'qmadhuri', 8, 3),
(18, 'adhuri', 8, 4),
(19, 'ahuri', 8, 5),
(20, 'mhuri', 8, 6),
(21, 'mahuri', 8, 7),
(22, 'maduri', 8, 8),
(23, 'madri', 8, 9),
(24, 'adhuri', 8, 10),
(25, 'dhuri', 8, 11),
(26, 'uri', 8, 12),
(27, 'muri', 8, 13),
(28, 'madhuri', 14, 1),
(29, 'amadhuri', 14, 2),
(30, 'qmadhuri', 14, 3),
(31, 'adhuri', 14, 4),
(32, 'ahuri', 14, 5),
(33, 'mhuri', 14, 6),
(34, 'mahuri', 14, 7),
(35, 'maduri', 14, 8),
(36, 'madri', 14, 9),
(37, 'adhuri', 14, 10),
(38, 'dhuri', 14, 11),
(39, 'uri', 14, 12),
(40, 'muri', 14, 13),
(42, 'u', 14, 8),
(43, 'r', 14, 7),
(44, 'u', 14, 8),
(45, 'r', 14, 7),
(46, 'o', 14, 8),
(47, 'y', 14, 3),
(48, 'h', 14, 23),
(49, 'o', 14, 8),
(50, 'y', 14, 3),
(51, 'h', 14, 23),
(52, 'madhuri', 15, 1),
(53, 'mahima', 15, 2),
(54, 'sturi', 15, 3),
(55, 'radha', 15, 4),
(56, 'sneha', 15, 5),
(57, 'm', 14, 1),
(58, 'h', 14, 2),
(59, 'j', 14, 3),
(60, 'l', 14, 4),
(61, 'i', 14, 5),
(62, 'u', 16, 1),
(63, 'w', 16, 2),
(64, 'e', 16, 3),
(65, 't', 16, 4),
(66, 'l', 16, 9),
(67, 'e', 16, 8),
(68, 's', 16, 7),
(69, 'q', 16, 90),
(70, 'i', 16, 11),
(71, 'ui', 16, 12),
(72, 'oo', 16, 13),
(73, 'op', 16, 14),
(74, 'mm', 16, 15),
(75, 'op', 16, 21),
(76, 'po', 16, 38),
(77, 'ol', 16, 25),
(78, 'iu', 16, 78);
