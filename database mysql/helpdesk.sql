-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 09:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_v1-watchara`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_building`
--

CREATE TABLE `tb_building` (
  `build_id` int(11) NOT NULL,
  `build_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_building`
--

INSERT INTO `tb_building` (`build_id`, `build_name`) VALUES
(1, 'ตึก 1'),
(2, 'ตึก 2'),
(3, 'ตึก 3 '),
(4, 'ตึก 4'),
(5, 'ตึก 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `cmp_id` varchar(2) NOT NULL,
  `cmp_name` varchar(200) NOT NULL,
  `cmp_software` varchar(200) NOT NULL,
  `cmp_token_line` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`cmp_id`, `cmp_name`, `cmp_software`, `cmp_token_line`) VALUES
('1', 'Chakkapgong DevUbon', 'HelpDesk V.1', '5Ouj9yisqGVrRvWvpj4JIFzgKY0XLr2V8ei7OSczKW2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`dep_id`, `dep_name`) VALUES
(1, 'IT'),
(2, 'บัญชี'),
(3, 'ฝ่ายบุคคล');

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipment`
--

CREATE TABLE `tb_equipment` (
  `eq_id` int(11) NOT NULL,
  `eq_name` varchar(255) NOT NULL,
  `eq_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_equipment`
--

INSERT INTO `tb_equipment` (`eq_id`, `eq_name`, `eq_status`) VALUES
(1, 'คอมพิวเตอร์', ''),
(2, 'เครื่องปริ้น', ''),
(3, 'โน๊ตบุ๊ค', ''),
(4, 'โปรเจคเตอร์', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login_log`
--

CREATE TABLE `tb_login_log` (
  `log_id` bigint(20) NOT NULL,
  `u_idcard` varchar(13) NOT NULL,
  `log_host` varchar(100) NOT NULL,
  `log_ip` varchar(100) NOT NULL,
  `log_browser` varchar(100) NOT NULL,
  `log_save` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_login_log`
--

INSERT INTO `tb_login_log` (`log_id`, `u_idcard`, `log_host`, `log_ip`, `log_browser`, `log_save`) VALUES
(1, '9999999999999', 'DESKTOP-KD8O937', '::1', 'Chrome', '2022-11-16 15:11:22'),
(2, '9999999999999', 'DESKTOP-KD8O937', '::1', 'Chrome', '2022-11-16 15:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE `tb_position` (
  `p_id` int(11) NOT NULL,
  `p_position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`p_id`, `p_position`) VALUES
(1, 'IT Support');

-- --------------------------------------------------------

--
-- Table structure for table `tb_repair`
--

CREATE TABLE `tb_repair` (
  `r_no` varchar(7) NOT NULL COMMENT 'เลขที่แจ้งซ่อม',
  `u_idcard` varchar(13) NOT NULL COMMENT 'ผู้แจ้งซ่อม',
  `eq_id` int(11) NOT NULL COMMENT 'อุปกรณ์',
  `r_name` varchar(200) NOT NULL COMMENT 'ชื่ออุปกรณ์',
  `r_serialnumber` varchar(150) NOT NULL COMMENT 'หมายเลขเครื่อง',
  `r_detail` text NOT NULL COMMENT 'อาการหรือสาเหตุ',
  `build_id` int(11) NOT NULL COMMENT 'อาคารหรือตึก',
  `floor` varchar(100) NOT NULL COMMENT 'ชั้นอาคาร',
  `room` varchar(100) NOT NULL COMMENT 'ห้อง',
  `no` int(11) NOT NULL,
  `s_id` char(1) NOT NULL COMMENT 'สถานะ',
  `head_id` varchar(13) NOT NULL COMMENT 'หัวหน้างาน',
  `technician_id` varchar(13) NOT NULL COMMENT 'ช่าง',
  `r_save` datetime NOT NULL COMMENT 'วันที่แจ้งซ่อม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_repair_log`
--

CREATE TABLE `tb_repair_log` (
  `rlog_id` bigint(20) NOT NULL,
  `r_no` varchar(7) NOT NULL,
  `s_id` char(1) NOT NULL,
  `technician_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `rlog_host` varchar(100) NOT NULL,
  `rlog_ip` varchar(100) NOT NULL,
  `rlog_browser` varchar(100) NOT NULL,
  `rlog_save` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` char(1) NOT NULL,
  `s_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_status`) VALUES
('1', 'รอมอบหมายงาน'),
('2', 'มอบหมายงานแล้ว'),
('3', 'กำลังดำเนินการซ่อม'),
('4', 'ปิดจอบงานสำเร็จ'),
('5', 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_prefix` varchar(30) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_idcard` varchar(13) NOT NULL,
  `u_mobile` varchar(10) NOT NULL,
  `u_tel` varchar(20) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `level_id` varchar(2) NOT NULL,
  `u_status` char(1) NOT NULL COMMENT '0=เปิดใช้งาน, 1=ยกเลิก',
  `u_save` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_prefix`, `u_fname`, `u_lname`, `u_idcard`, `u_mobile`, `u_tel`, `u_email`, `p_id`, `dep_id`, `u_username`, `u_password`, `level_id`, `u_status`, `u_save`) VALUES
('นาย', 'แอดมิน', 'ดูแลระบบ', '9999999999999', '9999999999', '-', 'admin@gmail.com', 3, 1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '01', '1', '2021-10-13 08:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_level`
--

CREATE TABLE `tb_user_level` (
  `level_id` varchar(2) NOT NULL,
  `level_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_level`
--

INSERT INTO `tb_user_level` (`level_id`, `level_name`) VALUES
('01', 'ผู้ดูแลระบบ'),
('02', 'หัวหน้างาน'),
('03', 'ผู้ใช้งาน'),
('04', 'นายช่าง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_building`
--
ALTER TABLE `tb_building`
  ADD PRIMARY KEY (`build_id`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `tb_login_log`
--
ALTER TABLE `tb_login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_position`
--
ALTER TABLE `tb_position`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tb_repair`
--
ALTER TABLE `tb_repair`
  ADD PRIMARY KEY (`no`,`r_no`);

--
-- Indexes for table `tb_repair_log`
--
ALTER TABLE `tb_repair_log`
  ADD PRIMARY KEY (`rlog_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_idcard`);

--
-- Indexes for table `tb_user_level`
--
ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login_log`
--
ALTER TABLE `tb_login_log`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_repair`
--
ALTER TABLE `tb_repair`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_repair_log`
--
ALTER TABLE `tb_repair_log`
  MODIFY `rlog_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
