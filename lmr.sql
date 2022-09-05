/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  patri
 * Created: 31-Aug-2022
 */
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 02:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmr`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addBooking` (IN `p_roomID` VARCHAR(75), IN `p_date` VARCHAR(75), IN `p_start` VARCHAR(75), IN `p_end` VARCHAR(75), IN `p_knumber` VARCHAR(75), IN `p_id` INT)  BEGIN
INSERT INTO bookings (room_id, date_of_booking, start_time_of_booking, end_time_of_booking,knumber)
VALUES (p_roomID, p_date, p_start, p_end, p_knumber);
SET p_id=LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addRoom` (IN `p_id` INT, IN `p_roomName` VARCHAR(75), IN `p_capcity` VARCHAR(75), IN `p_comAccess` VARCHAR(75), IN `p_avail` VARCHAR(75), IN `p_nonAvailReason` VARCHAR(75))  BEGIN
INSERT INTO rooms(room_id, room_name,capacity, computer_access, available, non_availability_reason)
VALUES (p_id, p_roomName, p_capcity, p_comAccess, p_avail, p_nonAvailReason );
SET p_id=LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `p_kNumber` VARCHAR(75), IN `p_fName` VARCHAR(75), IN `p_lName` VARCHAR(75), IN `p_email` VARCHAR(75), IN `p_tele` VARCHAR(75), IN `p_pass` VARCHAR(75))  BEGIN
INSERT INTO members (kNumber,fName,lName,emailAddress,telephoneNo,password)
VALUES(p_kNumber, p_fName,p_lName,p_email,p_tele,p_pass);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminLogin` (IN `p_email` VARCHAR(75), IN `p_password` VARCHAR(75))  BEGIN
SELECT members.kNumber, members.fName, members.lName
FROM members
WHERE members.emailAddress=p_email AND members.password=p_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteBooking` (IN `p_id` INT)  BEGIN
DELETE FROM bookings
WHERE bookings.booking_id=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookingById` (IN `p_id` INT)  BEGIN
SELECT bookings.booking_id, bookings.room_id, bookings.date_of_booking, bookings.start_time_of_booking, bookings.end_time_of_booking, bookings.knumber
FROM bookings
WHERE bookings.booking_id= p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookingDetailsForUpdate` (IN `p_bookingId` VARCHAR(75))  BEGIN
SELECT bookings.booking_id, bookings.room_id, bookings.date_of_booking, bookings.start_time_of_booking, bookings.end_time_of_booking, bookings.knumber
FROM bookings
WHERE bookings.booking_id=p_bookingId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookings` ()  BEGIN
SELECT*
FROM bookings;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookingsByMembers` (IN `p_knum` INT)  BEGIN
SELECT bookings.booking_id, bookings.room_id, bookings.date_of_booking, bookings.start_time_of_booking, bookings.end_time_of_booking, bookings.knumber
FROM bookings
INNER JOIN
members ON bookings.knumber=members.kNumber
WHERE bookings.knumber=p_knum;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMemberbyKNumber` (IN `p_id` INT)  BEGIN
SELECT members.kNumber, members.fName, members.lName, members.emailAddress, members.telephoneNo, members.password
FROM members
WHERE members.kNumber=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMemberByNumber` (IN `p_memNum` VARCHAR(75))  BEGIN
SELECT members.fName
FROM members
WHERE members.kNumber= p_memNum;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMemberDetails` (IN `p_id` INT)  BEGIN
SELECT members.kNumber, members.fName, members.lName, members.emailAddress, members.telephoneNo, members.image_path, members.password
FROM members
WHERE members.kNumber=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMembers` ()  BEGIN
SELECT 
members.fName, members.lName, members.kNumber
FROM members
WHERE members.kNumber !='1';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoomById` (IN `p_id` INT)  BEGIN
SELECT rooms.room_id, rooms.room_name, rooms.capacity, rooms.computer_access, rooms.available, rooms.non_availability_reason
FROM rooms
WHERE rooms.room_id=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRooms` ()  BEGIN
SELECT*
FROM rooms;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Login` (IN `p_email` VARCHAR(75), IN `p_pwd` VARCHAR(75))  BEGIN
SELECT members.kNumber, members.fName, members.lName, members.emailAddress, members.telephoneNo, members.password
FROM members
WHERE members.emailAddress=p_email AND members.password=p_pwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `memberLogin` (IN `p_email` VARCHAR(75), IN `p_pwd` VARCHAR(75))  BEGIN
SELECT members.kNumber, members.fName, members.lName
FROM members
WHERE members.emailAddress=p_email AND members.password=p_pwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateBooking` (IN `p_id` VARCHAR(75), IN `p_date` VARCHAR(75), IN `p_roomId` VARCHAR(75), IN `p_startTime` VARCHAR(75), IN `p_endTime` VARCHAR(75))  BEGIN

UPDATE bookings 

SET room_id=p_roomId,
date_of_booking=p_date,
start_time_of_booking=p_startTime,
end_time_of_booking=p_endTime

WHERE booking_id=p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRoom` (IN `p_id` INT(75), IN `p_capacity` VARCHAR(75), IN `p_ca` VARCHAR(75), IN `p_avail` VARCHAR(75), IN `p_nonAvail` VARCHAR(75))  BEGIN

UPDATE rooms

SET capacity=p_capacity,
computer_access=p_ca, 
available=p_avail,
non_availability_reason=p_nonAvail
WHERE room_id=p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `p_id` INT, IN `p_fName` VARCHAR(75), IN `p_lName` VARCHAR(75), IN `p_email` VARCHAR(75), IN `p_num` VARCHAR(75), IN `p_pass` VARCHAR(75))  BEGIN

UPDATE members
SET fName=p_fName,
lName=p_lName,
emailAddress=p_email,
telephoneNo=p_num,
password=p_pass
WHERE kNumber=p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `date_of_booking` varchar(75) NOT NULL,
  `start_time_of_booking` time NOT NULL,
  `end_time_of_booking` time NOT NULL,
  `knumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `room_id`, `date_of_booking`, `start_time_of_booking`, `end_time_of_booking`, `knumber`) VALUES
(12, 5, '2022-08-29', '13:00:00', '14:00:00', '123'),
(15, 1, '2022-08-28', '12:04:00', '13:04:00', '222'),
(16, 1, '2022-08-30', '17:23:00', '17:23:00', '123'),
(17, 1, '2022-08-26', '01:19:00', '02:19:00', '123');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `kNumber` varchar(15) NOT NULL,
  `fName` varchar(35) NOT NULL,
  `lName` varchar(35) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `telephoneNo` varchar(20) NOT NULL,
  `image_path` varchar(1024) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`kNumber`, `fName`, `lName`, `emailAddress`, `telephoneNo`, `image_path`, `password`) VALUES
('1', 'patrick', 'lyons', 'patricklyonslit@gmail.com', '0864049689', '', 'a'),
('12', 'carol', 'rain', 'carol@mail.com', '2222222', '', 'pass'),
('123', 'quincy', 'quinn', 'q@mail.com', '0864049689', 'd9569bbed4393e2ceb1af7ba64fdf86a.jpg', 'q'),
('222', 'a', 'a', 'a@mail.com', '2', 'd9569bbed4393e2ceb1af7ba64fdf86a.jpg', 'a'),
('4', 'test', 'test', 'test@gmail.com', '0864049689', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 6,
  `computer_access` char(1) NOT NULL DEFAULT 'N',
  `available` char(1) NOT NULL DEFAULT 'Y',
  `non_availability_reason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `capacity`, `computer_access`, `available`, `non_availability_reason`) VALUES
(1, 'Room 1', 7, 'y', 'y', ' '),
(2, 'Room 2', 6, 'N', 'Y', ' '),
(3, 'Room 3', 6, 'N', 'Y', ' '),
(4, 'Room 4', 6, 'N', 'Y', ' '),
(5, 'Room 5', 6, 'N', 'Y', ' '),
(6, 'Room 6', 6, 'N', 'Y', ' '),
(7, 'room7', 5, 'n', 'n', ' redecorating');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`kNumber`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

