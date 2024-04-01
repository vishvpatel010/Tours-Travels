-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_hotel`
--

CREATE TABLE `admin_hotel` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_hotel`
--

INSERT INTO `admin_hotel` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `Id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`Id`, `username`, `email`, `password`) VALUES
(32, 'dhruvil', 'dhruvildudhat6282@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(33, 'savan', 'saraliyasavan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(34, 'arpit', 'arpitrabadiya48@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` varchar(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `days` int(10) NOT NULL,
  `sub_price` int(50) NOT NULL,
  `hotel_price` int(10) NOT NULL,
  `person` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `room_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `user_id`, `cat_id`, `sub_cat_id`, `image`, `package_name`, `days`, `sub_price`, `hotel_price`, `person`, `total`, `date`, `room_id`) VALUES
(94, 4, 1, '27', 'kedarkanta.jpg', 'Kedarkantha', 4, 4999, 5000, 3, 29997, '31/03/2022', 0),
(96, 4, 1, '27', 'kedarkanta.jpg', 'Kedarkantha', 5, 4999, 15000, 3, 59997, '27/03/2022', 28),
(115, 1, 1, '27', 'kedarkanta.jpg', 'Kedarkantha', 4, 4999, 5000, 2, 19998, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(50) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `date`) VALUES
(1, 'Adventure Tourism', '2021-07-26 13:29:57.756639'),
(2, 'Wildlife Tourism', '2021-07-26 13:30:01.739867'),
(3, 'pilgrimage Tourism', '2021-07-26 13:30:06.275128'),
(4, 'Eco  Tourism', '2021-07-26 13:27:21.232686'),
(5, 'Culturer  Tourism', '2021-07-26 13:27:29.648168'),
(6, 'Cruise  Tourism', '2021-07-26 13:27:36.817578'),
(7, 'Family  Tourism', '2021-07-26 13:27:43.771976'),
(8, 'Honey Moon  Tours', '2021-07-26 13:28:02.683057'),
(9, 'Tracking & camping', '2021-07-26 13:28:17.240890'),
(10, 'Summer Holidays', '2021-07-26 13:28:27.324467'),
(11, 'New Year & Christmas', '2021-07-30 11:44:28.073522');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `User_Id` int(30) NOT NULL,
  `comments` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `sub_id`, `User_Id`, `comments`, `date`) VALUES
(1, 0, 1, 'Snow Trekking in Manali the most memorable trekking experience with us. Not only everything was perfect, but we felt, in every instance, that our guides and the organization truly cared about us.', '2022-03-15 05:14:02'),
(2, 0, 2, 'This was the first time I had traveled with tourist at Saputara. The organization specializes in adventure camps. The adventure style tented accommodation and the food was excellent. The instructor who accompanied us was outstanding, passionate, informative, engaging, and entertaining.', '2022-03-15 05:14:54'),
(3, 78, 3, 'The services are exceptional when compared to other trekking organizations as I have been with others also. Best quality home-made food, separate accommodation for girls and boys felt safe, if being a girl you wished to go on a solo trip, I bet Invincible is the safest.', '2022-03-15 05:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Id` int(11) NOT NULL,
  `User_Id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Id`, `User_Id`, `Name`, `Email`, `Subject`, `Message`) VALUES
(25, 4, 'dhruvil', 'dhruvildudhat6282@gmail.com', 'about good guidance.', 'vacation was very good and prospores for life experience');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `Faq_Id` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` blob NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`Faq_Id`, `Question`, `Answer`, `Date`) VALUES
(1, 'ARE VISA REQUIRED FOR TRAVEL TO INDIA?', 0x5965732e204d6f7374206e6174696f6e616c69746965732063616e206170706c7920666f722061206d756c7469706c6520656e7472792065566973612077686963682068617320612076616c6964697479206f66206f6e6520796561722e0d0a466f72207468652065566973612c20796f75206e65656420746f206170706c792077697468696e203132302064617973206f662074726176656c2e20546865207669736120697320697373756564206f6e6c696e6520616e642074616b657320757020746f203320646179732e0d0a436c69636b206865726520746f20676f20746f20746865206f6666696369616c20476f7665726e6d656e74206f6620496e646961206556697361206170706c69636174696f6e20776562736974652e0d0a526567756c617220746f757269737420766973617320286973737565642062792074686520496e6469616e20456d6261737379206f7220436f6e73756c6174652920666f722074686f7365206e6174696f6e616c69746965732077686f20646f206e6f7420796574206861766520617661696c6162696c697479206f662074686520652d5669736120666163696c6974792c2061726520757375616c6c792069737375656420666f7220362d3132206d6f6e74687320616e6420617265206569746865722053696e676c652c20446f75626c65206f72204d756c7469706c6520456e7472792e204173207468652076616c696469747920626567696e732066726f6d2064617465206f662069737375652c206265207375726520796f7520646f206e6f74206170706c7920666f7220796f7572207669736120746f6f206561726c792e, '2021-09-02 11:31:02'),
(3, 'I AM A SINGLE TRAVELLER. DO I NEED TO PAY THE SINGLE SUPPLEMENT?', 0x496e7465726e65742061636365737320697320617661696c61626c6520696e20696e7465726e657420636166657320616e6420686f74656c7320696e206d6f7374207061727473206f6620496e6469612e204d6f737420686f74656c73206e6f772070726f766964652057696669206163636573732e0d0a536d616c6c657220746f776e7320616e642076696c6c61676573206d61792068617665206c696d69746564206163636573732e0d0a496620796f7520617265206361727279696e6720796f7572206f776e206c6170746f702c206f7220612073696d20656e61626c65642069506164206f722073696d696c61722c20796f752063616e207075726368617365206120646174612073696d20636172642e0d0a5265636f6d6d656e6465642070726f7669646572732061726520566f6461666f6e652c2041697274656c20616e64204a696f2e20496620796f75207769736820746f206765742061206c6f63616c20646174612073696d20636172642c20796f752077696c6c206e65656420746f206861766520612070686f746f636f7079206f6620796f75722070617373706f72742070686f746f207061676520616e64207669736120706167652e20596f752077696c6c20616c736f206e65656420612070617373706f72742073697a65642070686f746f2e, '2021-09-02 11:44:12'),
(4, 'WHAT IS THE PHONE/MOBILE COVERAGE LIKE IN INDIA', 0x4d6f62696c652070686f6e6520636f766572616765206973207769646573707265616420616e642067656e6572616c6c79207665727920676f6f6420696e206d6f7374207061727473206f6620496e6469612e20456e7375726520676c6f62616c20726f616d696e6720697320616374697661746564206f6e20796f75722070686f6e65206265666f726520796f75206172726976652e0d0a496620796f75207769736820746f206765742061206c6f63616c2073696d20636172642c20796f752077696c6c206e65656420746f206861766520612070686f746f636f7079206f6620796f75722070617373706f72742070686f746f207061676520616e64207669736120706167652e0d0a596f752077696c6c20616c736f206e65656420612070617373706f72742073697a65642070686f746f2e204d6f62696c652070686f6e652073696d20636f6e6e656374696f6e732063616e2062652061206c6974746c6520636f6d706c69636174656420616e642074616b6520757020746f2032206461797320746f2061637469766174652e2049742069732062657474657220696620796f752061726520696e20746865206f6e6520706c61636520666f72207365766572616c20646179732c20726174686572207468616e2074726176656c6c696e672061726f756e642e205265636f6d6d656e6465642070726f7669646572732061726520566f6461666f6e652c2041697274656c20616e64204a696f2e, '2021-09-02 11:44:36'),
(5, 'I AM A SINGLE TRAVELLER. DO I NEED TO PAY THE SINGLE SUPPLEMENT?', 0x417420496e6372656469626c6520496e6469616e20546f7572732c20776520646f206e6f7420636861726765206120636f6d70756c736f72792073696e676c6520737570706c656d656e742063686172676520666f722073696e676c652074726176656c6c6572732e204f6e206f75722067726f757020746f757273207765206f6674656e206861766520332c34206f72206576656e20352074726176656c6c657273206f66207468652073616d65207365782074726176656c6c696e6720696e646570656e64656e746c792e20496620796f752063686f6f7365207468652073686172696e67206f7074696f6e2c20796f757220746f7572206c65616465722077696c6c20726f74617465207468652073696e676c6520736861726572732061742065616368206e657720686f74656c2c20736f20796f75206765742061206e657720726f6f6d2d6d61746520656163682073746f702e20496620746865726520697320616e206f6464206e756d626572206f662073696e676c6520736861726572732c207468656e20736f6d656f6e652067657473207468656972206f776e20726f6f6d206f63636173696f6e616c6c792e0d0a5468652053696e676c6520537570706c656d656e7420636f7374206f6e6c79206e6565647320746f206265207061696420696620796f75207769736820746f2067756172616e74656520796f7572206f776e20726f6f6d207468726f7567686f75742074686520746f75722e, '2021-09-02 11:56:25'),
(6, 'WHAT IS THE INTERNET ACCESS LIKE IN INDIA', 0x496e7465726e65742061636365737320697320617661696c61626c6520696e20696e7465726e657420636166657320616e6420686f74656c7320696e206d6f7374207061727473206f6620496e6469612e204d6f737420686f74656c73206e6f772070726f766964652057696669206163636573732e0d0a536d616c6c657220746f776e7320616e642076696c6c61676573206d61792068617665206c696d69746564206163636573732e0d0a496620796f7520617265206361727279696e6720796f7572206f776e206c6170746f702c206f7220612073696d20656e61626c65642069506164206f722073696d696c61722c20796f752063616e207075726368617365206120646174612073696d20636172642e0d0a5265636f6d6d656e6465642070726f7669646572732061726520566f6461666f6e652c2041697274656c20616e64204a696f2e20496620796f75207769736820746f206765742061206c6f63616c20646174612073696d20636172642c20796f752077696c6c206e65656420746f206861766520612070686f746f636f7079206f6620796f75722070617373706f72742070686f746f207061676520616e64207669736120706167652e20596f752077696c6c20616c736f206e65656420612070617373706f72742073697a65642070686f746f2e, '2021-09-02 11:56:47'),
(7, 'WHAT IS THE PHONE/MOBILE COVERAGE LIKE IN INDIA', 0x4d6f62696c652070686f6e6520636f766572616765206973207769646573707265616420616e642067656e6572616c6c79207665727920676f6f6420696e206d6f7374207061727473206f6620496e6469612e20456e7375726520676c6f62616c20726f616d696e6720697320616374697661746564206f6e20796f75722070686f6e65206265666f726520796f75206172726976652e0d0a496620796f75207769736820746f206765742061206c6f63616c2073696d20636172642c20796f752077696c6c206e65656420746f206861766520612070686f746f636f7079206f6620796f75722070617373706f72742070686f746f207061676520616e64207669736120706167652e0d0a596f752077696c6c20616c736f206e65656420612070617373706f72742073697a65642070686f746f2e204d6f62696c652070686f6e652073696d20636f6e6e656374696f6e732063616e2062652061206c6974746c6520636f6d706c69636174656420616e642074616b6520757020746f2032206461797320746f2061637469766174652e2049742069732062657474657220696620796f752061726520696e20746865206f6e6520706c61636520666f72207365766572616c20646179732c20726174686572207468616e2074726176656c6c696e672061726f756e642e205265636f6d6d656e6465642070726f7669646572732061726520566f6461666f6e652c2041697274656c20616e64204a696f2e, '2021-09-02 11:57:00'),
(8, 'DO I NEED TO PACK A BATHING SUIT?', 0x496620796f75206172652074726176656c6c696e6720696e20746865207761726d6572206d6f6e7468732c20796f75206d696768742077656c6c207374617920696e206120686f74656c2077697468206120706f6f6c2c20736f20646566696e6974656c792074616b6520612062617468696e6720737569742e20496620796f75206172652074726176656c6c696e6720746f2074686520636f617374616c206172656173207375636820617320476f61206f72204b6572616c612c207468657265206d6179206265206f70706f7274756e697469657320666f72207370656e64696e672074696d65206f6e207468652062656163682e, '2021-09-02 11:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_payment`
--

CREATE TABLE `hotel_payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` text NOT NULL,
  `expireDate` varchar(20) NOT NULL,
  `cvv_no` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_days` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_payment`
--

INSERT INTO `hotel_payment` (`payment_id`, `user_id`, `card_number`, `expireDate`, `cvv_no`, `status`, `invoice`, `date`, `total_days`, `room_id`, `booking_date`, `total_amount`, `person`) VALUES
(10, 4, '4242424242424242', '02/23', 0, 'success', '99814405', '2022-03-19 03:19:16', 5, 28, '27/03/2022', 45000, 3),
(11, 4, '4242424242424242', '02/23', 123, 'success', '66776239', '2022-03-19 03:19:52', 5, 28, '27/03/2022', 45000, 3),
(12, 4, '4242424242424242', '02/23', 123, 'success', '84709093', '2022-03-19 03:22:57', 5, 28, '27/03/2022', 45000, 3),
(13, 4, '4242424242424242', '02/23', 123, 'success', '23531568', '2022-03-19 03:23:16', 5, 28, '27/03/2022', 45000, 3),
(14, 4, '4242424242424242', '02/23', 123, 'success', '76545298', '2022-03-19 03:24:10', 5, 28, '27/03/2022', 45000, 3),
(15, 4, '4242424242424242', '02/23', 123, 'success', '15946252', '2022-03-19 05:00:37', 5, 28, '27/03/2022', 45000, 3),
(16, 4, '4242424242424242', '02/23', 123, 'success', '65793179', '2022-03-19 05:11:00', 5, 28, '27/03/2022', 45000, 3),
(17, 2, '4242424242424242', '02/23', 123, 'success', '93853070', '2022-03-31 05:44:30', 5, 28, '1/05/2022', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `listout`
--

CREATE TABLE `listout` (
  `lo_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `list_image` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listout`
--

INSERT INTO `listout` (`lo_id`, `sub_id`, `days`, `description`, `list_image`) VALUES
(20, 27, 1, 'Reporting at Kotgaon Campsite                     ', 'k1.jpg'),
(21, 27, 2, 'Trek to Juda ka Taal\r\nNight stay at Janoul Campsit', 'k2.jpg'),
(22, 27, 3, 'Trek to Kedarkantha BaseCamp\r\nVisit Juda ka Taal &', 'k3.jpg'),
(23, 27, 4, 'Trek to Kedarkantha Peak\r\nSummit Kedarkantha Peak ', 'k4.jpg'),
(24, 27, 5, 'Trek Back to Sankri & Disperse\r\nDisperse after Lun', 'k5.jpg'),
(67, 33, 1, 'Arrival at Guwahati', ''),
(68, 33, 2, ' Guwahati-Kaziranga National Park                 ', 'ka1.jpg'),
(69, 33, 3, ' Kaziranga National Park                          ', 'rhino-img.jpg'),
(70, 33, 4, 'Kaziranga-Shillong                                ', 'umiam-lake.jpg'),
(71, 33, 5, 'Shillong- Cherrapunjee, Waterfalls, Cave, Lake    ', 'cherapunjee-waterfalls.jpg'),
(72, 33, 6, 'Shillong-Guwahati                                 ', 'shillong.jpg'),
(73, 54, 1, 'Arrival at Pathankot & Depart to Manali \r\n        ', ''),
(74, 54, 2, 'Morning Arrival at Manali Campsite                ', 'm1.jpg'),
(75, 54, 3, 'Trek to Advanced Basecamp                         ', 'm2.jpg'),
(76, 54, 4, 'Trek to Snow Point & River Rafting                ', 'm3.jpg'),
(77, 54, 5, 'Day for Manali Sightseeing & Paragliding          ', 'm4.jpg'),
(78, 54, 6, 'Return Train Journey to Ahmedabad                 ', ''),
(79, 57, 1, 'Reporting at Kasol Campsite                       ', 'ka1.jpg'),
(80, 57, 2, 'Trek from Grahan to Min Thach                     ', 'kasol3.jpg'),
(81, 57, 3, 'Trek from Grahan to Min Thach                     ', 'kasol3.jpg'),
(82, 57, 4, 'Trek from Min Thach to Nagaru                     ', 'kasol4.jpg'),
(83, 57, 5, 'Trek from Nagaru to Biskeri Thach                 ', 'kasol5.jpg'),
(84, 57, 6, 'Trek from Biskeri Thach to Bursheni               ', 'kasol6.jpg'),
(85, 29, 1, 'Arrival in Srinagar                               ', ''),
(86, 29, 2, 'Srinagar - Sonamarg - Srinagar                    ', 'sri1.jpg'),
(87, 29, 3, 'Srinagar - Pahalgam                               ', 'sri2.jpg'),
(88, 29, 4, 'Pahalgam - Srinagar Local Sightseeing             ', 'sri4.jpg'),
(89, 29, 5, 'Srinagar - Gulmarg - Srinagar                     ', 'sri5.jpg'),
(90, 29, 6, 'Srinagar - Airport                                ', ''),
(91, 31, 1, ' Jabalpur – Bandhavgarh (180KM / 4 Hrs)           ', 'ba1.jpg'),
(92, 31, 2, 'Bandhavgarh National Park                         ', 'ba2.jpg'),
(93, 31, 3, 'Bandhavgarh – Jabalpur                            ', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `menu_content` varchar(500) NOT NULL,
  `menu_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `sub_cat_id`, `menu_name`, `menu_content`, `menu_price`) VALUES
(1, 44, 'Rani ki vav', 'Rani Ki Vav  is a stepwell situated in the town of Patan in Gujarat state of India. It is located on the banks of Saraswati river. Its construction is attributed to Udayamati, daughter of Khengara of Saurashtra, queen and spouse of the 11th-century Chaulukya king Bhima I. Silted over, it was rediscovered in 1940s and restored in 1980s by the Archaeological Survey of India. It has been listed as one of the UNESCO World Heritage Sites since 2014.                                   ', 5600),
(2, 78, 'Goa ', 'Goa is undoubtedly India’s favorite travel destination. A backpacker’s paradise and a weekend travel hub, Goa is famous for its tropical vibe, young identity, and cultural adaptations. This Konkan state in the country’s southwestern coast is an interesting mix of sun, sand, and spice. Whether you’re traveling with your family and friends or traveling solo, Goa’s versatility never fails to charm.                                    ', 32000),
(3, 39, 'Somnath temple', 'The Somnath temple, also called Deo Patan, is located in Prabhas Patan, Veraval in Gujarat, India. One of the most sacred pilgrimage sites for the Hindus, they believe it to be the first among the twelve Jyotirlinga shrines of Shiva. It is about 400 kilometres southwest of Ahmedabad, 82 kilometres south of Junagadh – another major archaeological and pilgrimage site in Gujarat.Somnath temple has been a jyotirlinga site for the Hindus, and a holy place of tirtha.                       ', 7500),
(4, 53, 'Shimla', 'Shimla is the capital and the largest city of the Northern Indian state of Himachal Pradesh. In 1864, Shimla was declared as the summer capital of British India. After independence, the city became the capital of Punjab and was later made the capital city of Himachal Pradesh. It is the principal commercial, cultural and educational centre of the state. It was the capital city in exile of British Burma (present-day Myanmar) from 1942 to 1945.                          ', 18999),
(5, 49, 'Himachal Pradesh', 'Himachal Pradesh is a state in the northern part of India. Situated in the Western Himalayas, it is one of the thirteen mountain states and is characterized by an extreme landscape featuring several peaks and extensive river systems. The state also shares an international border to the east with the Tibet Autonomous Region in China. Himachal Pradesh is also known as Dev Bhoomi, meaning Land of God and Veer Bhoomi which means Land of Braves.                              ', 17270),
(6, 61, 'Munnar', 'God’s Own Country, Kerala is not very far behind in being host to popular summer holiday destinations in India. Munnar settled in the lush lap of Western Ghats is a pleasant escape when the heat goes rising. Famous for its beautiful sights, tea plantations, unique flora and fauna, aroma of spices, and pleasant weather. Munnar is a town in the Western Ghats mountain range in India’s Kerala state.                         ', 16500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sub_cat_id` varchar(200) NOT NULL,
  `order_name` varchar(20) NOT NULL,
  `order_email` varchar(30) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_address` varchar(50) NOT NULL,
  `order_postcode` int(10) NOT NULL,
  `order_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `order_city` varchar(20) NOT NULL,
  `order_amount` int(70) NOT NULL,
  `order_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `sub_cat_id`, `order_name`, `order_email`, `order_phone`, `order_address`, `order_postcode`, `order_date`, `order_city`, `order_amount`, `order_notes`) VALUES
(34, 1, '27,27', 'Arpit', 'arpitrabadiya48@gmail.com', '9979233928', 'Surat', 3360701, '2022-03-17 12:22:03.058375', 'Surat', 103994, 'testing..........'),
(35, 4, '27,27', 'dhruvil', 'dhruvildudhat6282@gmail.com', '9876543210', 'Surat', 3360701, '2022-03-18 12:46:57.148189', 'Surat', 89994, 'testing.........'),
(36, 4, '27,27', 'dhruvil', 'dhruvildudhat6282@gmail.com', '9876543210', 'qwwq', 394210, '2022-03-18 15:10:30.449671', 'Surat', 89994, ''),
(37, 4, '27,27', 'dhruvil', 'dhruvildudhat6282@gmail.com', '9876543210', 'qwwq', 394210, '2022-03-19 01:24:16.337731', 'Surat', 89994, ''),
(38, 4, '27,27', 'dhruvil', 'dhruvildudhat6282@gmail.com', '9876543210', 'qwwq', 394210, '2022-03-19 05:00:23.674885', 'Surat', 89994, ''),
(39, 2, '27', 'savan', 'arparitrabadiya48@gmail.com', '9978625793', 'varacha', 395006, '2022-03-21 17:18:45.220615', 'surat', 9999, ''),
(40, 2, '27,29', 'savan', 'saraliyasavan@gmail.com', '9978625793', 'varacha', 395006, '2022-03-25 06:38:31.821502', 'surat', 36996, ''),
(41, 1, '27', 'Arpit', 'arparitrabadiya48@gmail.com', '9979233928', 'Hirabhag SURAT', 3360701, '2022-03-25 06:45:44.164492', 'Surat', 19998, ''),
(42, 2, '27', 'savan', 'saraliyasavan@gmail.com', '9978625793', 'varacha', 395006, '2022-03-31 05:44:06.819480', 'surat', 19999, '');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Id` int(50) NOT NULL,
  `Package_Name` varchar(50) NOT NULL,
  `Prize` text NOT NULL,
  `Package_Description` text NOT NULL,
  `image` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Id`, `Package_Name`, `Prize`, `Package_Description`, `image`, `Date`) VALUES
(21, 'DIU', '25000', 'drrggeryy', 'div.jpg', '2021-07-23 12:44:22'),
(28, 'gujarat', '1200', 'ewefdf', 'gujarat.jpg', '2021-07-27 13:04:35'),
(31, 'rdqw', '2323', 'wdqwwds', 'module_table_bottom.png', '2022-02-23 12:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `porder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pamount` text NOT NULL,
  `card_number` text NOT NULL,
  `expireDate` varchar(20) NOT NULL,
  `cvv_no` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `porder_id`, `user_id`, `pamount`, `card_number`, `expireDate`, `cvv_no`, `status`, `invoice`, `date`) VALUES
(53, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '49281918', '2022-03-19 01:51:13'),
(54, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '55532844', '2022-03-19 02:04:56'),
(55, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '16404106', '2022-03-19 02:05:15'),
(56, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '41509155', '2022-03-19 02:08:34'),
(57, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '88440024', '2022-03-19 02:14:30'),
(58, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '28311002', '2022-03-19 03:11:26'),
(59, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '99814405', '2022-03-19 03:19:16'),
(60, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '66776239', '2022-03-19 03:19:52'),
(61, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '84709093', '2022-03-19 03:22:57'),
(62, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '23531568', '2022-03-19 03:23:16'),
(63, 37, 4, '44994', '4242424242424242', '02/23', 123, 'success', '76545298', '2022-03-19 03:24:10'),
(64, 38, 4, '44994', '4242424242424242', '02/23', 123, 'success', '15946252', '2022-03-19 05:00:37'),
(65, 38, 4, '44994', '4242424242424242', '02/23', 123, 'success', '65793179', '2022-03-19 05:11:00'),
(66, 40, 2, '36996', '4242424242424242', '02/23', 123, 'success', '38920560', '2022-03-25 06:40:30'),
(67, 41, 1, '19998', '4242424242424242', '02/23', 123, 'success', '86806006', '2022-03-25 06:45:58'),
(68, 42, 2, '4999', '4242424242424242', '02/23', 123, 'success', '93853070', '2022-03-31 05:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `type`, `price`, `details`, `image`) VALUES
(28, 512, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'delux_img1.jpg'),
(30, 504, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'Luxury_img10.jpg'),
(31, 302, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'Standard _img16.jpg'),
(32, 312, 'Suit Room', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'Suit_img22.jpg'),
(33, 205, 'Twin Deluxe Room', 120000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'Twin_img24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `room_id` int(10) NOT NULL,
  `check_in_date` varchar(50) NOT NULL,
  `person` int(30) NOT NULL,
  `Occupancy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `name`, `email`, `phone`, `room_id`, `check_in_date`, `person`, `Occupancy`) VALUES
(26, 'dhruvil', 'dhruvildudhat6282@gmail.com', 9876543210, 28, '27/03/2022', 3, '2'),
(27, 'dhruvil', 'dhruvildudhat6282@gmail.com', 9876543210, 28, '27/03/2022', 3, '2'),
(28, 'savan', 'saraliyasavan@gmail.com', 9978625793, 28, '1/05/2022', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` int(20) NOT NULL,
  `Slider_Title` varchar(50) NOT NULL,
  `Slider_Description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `Slider_Title`, `Slider_Description`, `price`, `image`, `Date`) VALUES
(27, 'cochin', 'Cochin Cruise ships are large passenger ships used mainly for vacationing. ', 5000, 'cochin cruise.jpg', '2022-03-14 05:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `slider_hotel`
--

CREATE TABLE `slider_hotel` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_hotel`
--

INSERT INTO `slider_hotel` (`id`, `image`, `caption`) VALUES
(3, 'pexels-thorsten-technoman-338504.jpg', ''),
(6, 'pexels-iván-rivero-1001965.jpg', ''),
(8, 'pexels-konstantinos-eleftheriadis-2034335.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(50) NOT NULL,
  `cat_id` int(50) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `sub_cat_content` varchar(500) NOT NULL,
  `total_days` int(10) NOT NULL,
  `image` text NOT NULL,
  `sub_price` int(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hotel_price` int(11) NOT NULL,
  `sub_cat_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `sub_cat_content`, `total_days`, `image`, `sub_price`, `room_id`, `hotel_price`, `sub_cat_date`) VALUES
(27, 1, 'Kedarkantha', 'Kedarkantha is one of the most popular winter treks of India. It is an easy to moderate level trek which attracts visitors for its amazing snow-clad landscapes and a tall summit 12,500 ft, which offers majestic panoramic views from its top. Those who love snow & mountains, this trek is undoubtedly the best choice for them. Kedarkantha is a mountain peak of the Himalayas in Uttarakhand. Kedarkantha is located  Wildlife Sanctuary in Uttarkashi district.', 5, 'kedarkanta.jpg', 4999, 28, 15000, '2022-03-31 06:45:29.894813'),
(28, 1, 'Darjeeling', 'Darjeeling is a city and a municipality in the Indian state of West Bengal. It lies in the Lesser Himalayas at an elevation of 2,000 metres. its scenic views of the worlds third-highest mountain Kangchenjunga, and the Darjeeling Himalayan Railway, a narrow-gauge mountain railway which is on the UNESCO World Heritage List. It is also a popular tourist destination in India. Darjeeling has several British-style private schools that attract pupils from India.                                         ', 1, 'darjiling.jpg', 9999, 0, 0, '2022-03-19 05:06:52.779323'),
(29, 1, 'Srinagar', 'Srinagar is the largest city and the summer capital of Jammu and Kashmir, India. It lies in the Kashmir Valley on the banks of the Jhelum River, a tributary of the Indus, and Dal and Anchar lakes. The city is known for its natural environment, gardens, waterfronts and houseboats. It is also known for traditional Kashmiri handicrafts like Kashmir shawls and also dried fruits. the second largest city located in the Himalayas, after Kathmandu.                                            ', 6, 'srinagar.jpg', 8999, 0, 0, '2022-03-14 10:08:02.520000'),
(30, 1, 'Pangong lake', 'Pangong lake is a visual treat and a photographer’s delight as it displays multiple shades of blue. Pangong Tso is also a heaven for wildlife enthusiasts, especially birdwatchers. Numerous species of animals such as foxes and marmots live in the vicinity of the lake. Pangong Tso also serves as a major breeding site for migratory birds like brahmini ducks, bar-headed geese and seagulls. Pangong  is a long narrow strip of water shoot and 3idiots in pangong lake.                                    ', 1, 'pangong.jpg', 11999, 0, 0, '2022-03-19 05:06:52.779323'),
(31, 1, 'Bandhavgarh National Park', 'the Bandhavgarh National Park is truly the most glittering parts of the Aravali regions. The Park is simply known for the various species of wild creatures and is best known for the preservation of the most astonishing tiger species. The presence of the abundance of tiger species in Bandhavgarh has drove many animal lovers in this explicit arena. Appreciate the Bandhavgarh with the amazing wildlife tour in Bandhavgarh Reserve.                                            ', 1, 'bandhvgdh.jpg', 9999, 0, 0, '2022-03-19 05:06:52.779323'),
(32, 2, 'Gir National Park', 'Gir National Park and Wildlife Sanctuary, also known as Sasan Gir, is a forest, national park, and wildlife sanctuary near Talala Gir in Gujarat, India. It is located 43 km north east of Somnath, 65 km south east of Junagadh and 60 km south west of Amreli. It was established 1965 in the erstwhile Nawab of Junagarh private hunting area, with a total area of 1,412 km , of which 258 km is fully protected as national park and 1,153 km as wildlife sanctuary.           ', 1, 'gir.jpg', 2999, 0, 0, '2022-03-19 05:06:52.779323'),
(33, 2, 'Kaziranga National Park', 'Kaziranga National Park is a national park in the Golaghat, Karbi Anglong and Nagaon districts of the state of Assam, India. The sanctuary, which hosts two-thirds of the world is great one-horned rhinoceroses, is a World Heritage Site.According to the census held in March 2018 which was jointly conducted by the Forest Department of the Government of Assam and some recognized wildlife NGO, the rhino population in Kaziranga National Park is 2,413. ', 6, 'kaziranga.jpg', 8999, 0, 0, '2022-03-14 08:27:35.185613'),
(34, 2, 'Ranthambore National Park', 'Ranthambore National Park is a national park in Rajasthan, India, with an area of 1,334 km. It is bounded to the north by the Banas River and to the south by the Chambal River. It is named after the historic Ranthambore Fort, which lies within the park .Ranthambore National Park was established as Sawai Madhopur Game Sanctuary in 1955 .It was declared one of the Project Tiger reserves in 1973 and became a national park on 1 November 1980.           ', 1, 'Ranthambore.jpg', 6999, 0, 0, '2022-03-19 05:06:52.779323'),
(37, 3, 'Amritsar', 'The Golden temple is famous for its full golden dome, it is one of the most sacred pilgrim spots for Sikhs. The Mandir is built on a 67-ft square of marble and is a two storied structure. The Golden Temple is the most famous Sikh temple in the world. It was built in late 16th century by Sri Guru Arjan Dev ji , and a copy of the Sikh scripture was placed inside the Gurudwara in 1604. It is in the city of Amritsar, Punjab, India.', 1, 'golden temple.jpg', 13999, 0, 0, '2022-03-19 05:06:52.779323'),
(39, 3, 'Somnath temple', 'The Somnath temple, also called Deo Patan, is located in Prabhas Patan, Veraval in Gujarat, India. One of the most sacred pilgrimage sites for the Hindus, they believe it to be the first among the twelve Jyotirlinga shrines of Shiva. It is about 400 kilometres southwest of Ahmedabad, 82 kilometres south of Junagadh – another major archaeological and pilgrimage site in Gujarat.Somnath temple has been a jyotirlinga site for the Hindus, and a holy place of tirtha.                       ', 1, 'somnath temple.jpg', 7500, 0, 0, '2022-03-19 05:06:52.779323'),
(40, 5, 'Red Fort', 'The Red Fort or Lal Qila is a historic fort in Old Delhi, Delhi in India that served as the main residence of the Mughal Emperors. Emperor Shah Jahan commissioned construction of the Red Fort on 12 May 1638. Originally red and white, its design is credited to architect Ustad Ahmad Lahori, who also constructed the Taj Mahal. The fort represents the peak in Mughal architecture under Shah Jahan, and combines Persianate palace architecture with Indian traditions.                                   ', 1, 'red fort.jpg', 8100, 0, 0, '2022-03-19 05:06:52.779323'),
(41, 5, 'Agra Fort', 'Agra Fort is a historical fort in the city of Agra in India. It was the main residence of the emperors of the Mughal Dynasty until 1638, when the capital was shifted from Agra to Delhi. Before capture by the British, the last Indian rulers to have occupied it were the Marathas. In 1983, the Agra fort was life inscribed as a UNESCO World Heritage Site. It is about 2.5 km northwest of its more famous sister monument, the Taj Mahal. ', 1, 'agra fort.jpg', 9500, 0, 0, '2022-03-19 05:06:52.779323'),
(44, 5, 'Rani ki vav', 'Rani Ki Vav  is a stepwell situated in the town of Patan in Gujarat state of India. It is located on the banks of Saraswati river. Its construction is attributed to Udayamati, daughter of Khengara of Saurashtra, queen and spouse of the 11th-century Chaulukya king Bhima I. Silted over, it was rediscovered in 1940s and restored in 1980s by the Archaeological Survey of India. It has been listed as one of the UNESCO World Heritage Sites since 2014.                                   ', 1, 'rani ki vav.jpg', 5600, 0, 0, '2022-03-19 05:06:52.779323'),
(45, 7, 'Kerala', 'Kerala is a state on the Malabar Coast of India. It was formed on 1 November 1956, following the passage of the States Reorganisation Act, by combining Malayalam-speaking regions of the erstwhile regions of Cochin, Malabar, South Canara, and Travancore. Spread over 38,863 km, Kerala is the twenty-first largest Indian state by area. It is bordered by Karnataka to the north and northeast, Tamil Nadu to the east and south, and the Lakshadweep Sea to the west. ', 1, 'kerala.jpg', 18999, 0, 0, '2022-03-19 05:06:52.779323'),
(46, 7, 'Kashmir', 'Picturesque and enchanting, Kashmir is cradled high in the lofty green Himalayas and hailed all over the world for its incredible natural beauty. Surrounded by mountain peaks, lush green valleys, glistening lakes, temples and spectacular Mughal-era gardens, it has inspired poets through centuries.its beauty is to be see and to be believed. The rivers, hill, mountains and gardens are the tourist attract.Popularly known as the \"Paradise on Earth\".                 ', 1, 'kashmir.jpg', 19999, 0, 0, '2022-03-19 05:06:52.779323'),
(49, 7, 'Himachal Pradesh', 'Himachal Pradesh is a state in the northern part of India. Situated in the Western Himalayas, it is one of the thirteen mountain states and is characterized by an extreme landscape featuring several peaks and extensive river systems. The state also shares an international border to the east with the Tibet Autonomous Region in China. Himachal Pradesh is also known as Dev Bhoomi, meaning Land of God and Veer Bhoomi which means Land of Braves.                              ', 1, 'himachal pradesh.jpg', 17270, 0, 0, '2022-03-19 05:06:52.779323'),
(50, 8, 'Goa', 'Goa is a state on the southwestern coast of India within the Konkan region, geographically separated from the Deccan highlands by the Western Ghats. It is located between the Indian states of Maharashtra to the north and Karnataka to the east and south, with the Arabian Sea forming its western coast. It is India is smallest state by area and its fourth-smallest by population. Goa has the highest GDP per capita among all Indian states.', 1, 'goa.jpg', 25000, 0, 0, '2022-03-19 05:06:52.779323'),
(51, 8, 'Mumbai', 'Mumbai is the capital city of the Indian state of Maharashtra. According to the United Nations, as of 2018, Mumbai is the second-most populous city in India after Delhi and the eighth-most populous city in the world with a population of roughly 2 crore . As per the Indian government population census of 2011, Mumbai was the most populous city in India with an estimated city proper population of 1.25 crore living under the Municipal Corporation of Greater Mumbai.                              ', 1, 'mumbai.jpg', 12999, 0, 0, '2022-03-19 05:06:52.779323'),
(53, 8, 'Shimla', 'Shimla is the capital and the largest city of the Northern Indian state of Himachal Pradesh. In 1864, Shimla was declared as the summer capital of British India. After independence, the city became the capital of Punjab and was later made the capital city of Himachal Pradesh. It is the principal commercial, cultural and educational centre of the state. It was the capital city in exile of British Burma (present-day Myanmar) from 1942 to 1945.                          ', 1, 'shimla.jpg', 18999, 0, 0, '2022-03-19 05:06:52.779323'),
(54, 8, 'Manali', 'Manali is a town in the Indian state of Himachal Pradesh. It is situated in the northern end of the Kullu Valley, formed by the Beas River. The town is located in the Kullu district, approximately 270 kilometres north of the state capital of Shimla and 544 kilometres northeast of the national capital of Delhi. With a population of 8,096 people recorded in the 2011 Indian census Manali is the beginning of an ancient trade route through Lahaul and Ladakh.           ', 6, 'manali (2).jpg', 19250, 0, 0, '2022-03-14 09:48:53.785855'),
(55, 9, 'Mount Abu', 'Mount Abu  is a hill station in the Aravalli Range in Pindwara - Abu Assembly Constituency Of Sirohi district of Rajasthan state in western India, near the border with Gujarat. The mountain forms a rocky plateau 22 km long by 9 km wide. The highest peak on the mountain is Guru Shikhar at 1,722 m above sea level. It is referred toas an oasis in the desert as its heights are home to rivers, lakes, waterfalls and evergreen forests. ', 1, 'mount abu.jpg', 16800, 0, 0, '2022-03-19 05:06:52.779323'),
(57, 9, 'Kasol', 'Kasol is a hamlet in the Kullu district of the Indian state of Himachal Pradesh.It is situated in Parvati Valley, on the banks of the Parvati River, on the way between Bhuntar and Manikaran. It is located 30 km from Bhuntarand 36 km from Kullu town, the district headquarter, 3.5 km from Manikaran.↵Kasol is the Himalayan hotspot for backpackersand acts as a base for nearby treks to Malana and Kheerganga. It is called Mini Israel of India due to a high percentage of Israeli tourists here.', 6, 'kasol.jpg', 17500, 0, 0, '2022-03-14 10:00:12.075533'),
(58, 9, 'Chopta', 'Chopta is a picturesque hamlet which is still unexplored by travelers, is also famous as Mini Switzerland of Uttarakhand. Wake up with cool salubrious breeze and chirping of birds in Chopta which is a far cry from the blaring horns of the cities and other hill stations, morning view from Chopta is invigorating when the crimson rays of sun kisses the snow-laden Himalayas.Chopta is famous for its monuments of historical and religious importance .                                       ', 1, 'chopta.jpg', 19999, 0, 0, '2022-03-19 05:06:52.779323'),
(59, 9, 'Manali', 'Manali is a town in the Indian state of Himachal Pradesh. It is situated in the northern end of the Kullu Valley, formed by the Beas River. The town is located in the Kullu district, approximately 270 kilometres north of the state capital of Shimla and 544 kilometres northeast of the national capital of Delhi. With a population of 8,096 people recorded in the 2011 Indian census Manali is the beginning of an ancient trade route through Lahaul and Ladakh.                               ', 1, 'manali camping.jpg', 23999, 0, 0, '2022-03-19 05:06:52.779323'),
(60, 10, 'Andaman and Nicobar', 'Beaches in the summer may not seem appealing but this thought certainly changes when you are in Andaman and Nicobar Islands in the Bay of Bengal. Enjoy the perfect summer holiday in India by relaxing on the sandy shores, exploring the cerulean waters, tropical rainforests, and historical sites with amazing adventure sports. Relish the delicious tastes of tropical fruits and coconut water on your holiday in this haven.                                        ', 1, 'andaman and nicobar.jpg', 23800, 0, 0, '2022-03-19 05:06:52.779323'),
(61, 10, 'Munnar', 'God’s Own Country, Kerala is not very far behind in being host to popular summer holiday destinations in India. Munnar settled in the lush lap of Western Ghats is a pleasant escape when the heat goes rising. Famous for its beautiful sights, tea plantations, unique flora and fauna, aroma of spices, and pleasant weather. Munnar is a town in the Western Ghats mountain range in India’s Kerala state.                         ', 1, 'munnar.jpg', 16500, 0, 0, '2022-03-19 05:06:52.779323'),
(62, 10, 'Nainital', 'Nainital is without doubt one of the top places in India that are perfect for summer holiday. The hill town of Uttarakhand is known for its magical lakes, breathtaking views of snow-clad mountains and a small-town charm. Enjoy the romantic boat rides on the Naini Lake or other lakes nearby. Set far away from pollution, noisy traffic and hustle-bustle of the metropolitan cities, enjoy a refreshing vacation.', 1, 'nainital.jpg', 14600, 0, 0, '2022-03-19 05:06:52.779323'),
(63, 10, 'Dharamshala', 'Dharamshala is all about everlasting elegance. Every time that you plan a vacation to this summer destination in India, you will be surprised. The hill station has an unbelievable spiritual significance as it serves home to the Dalai Lama and the Tibetan government-in-exile. Along with that, Dharamshala is also famed for the adventure activities offered here.                           ', 1, 'dharamshala.jpg', 12900, 0, 0, '2022-03-19 05:06:52.779323'),
(64, 3, 'Shirdi', 'Shirdi is a city in the Indian state of Maharashtra. It is located in the Rahata taluka of Ahmednagar District. It is accessible via the Ahmednagar–Malegaon State Highway No.10. It is located 185 kmeast of the Western Seashore line a very busy route. Shirdi is famously known as the home of the late 19th century saint Shirdi Sai Baba. The Shri Saibaba Sansthan Trust located in Shirdi is one of the richest temple organisations.', 1, 'shirdi2.jpg', 12999, 0, 0, '2022-03-19 05:06:52.779323'),
(65, 3, 'Haridwar', 'Haridwar is a city and municipal corporation in the Haridwar district of Uttarakhand, India. With a population of 228,832 in 2011, it is the second-largest city in the state and the largest in the district. The city is situated on the right bank of the Ganges river, at the foothills of the Shivalik ranges. Haridwar is regarded as a holy place for Hindus, hosting important religious events and serving as a gateway to several prominent places of worship.                ', 1, 'haridwar (2).jpg', 14999, 0, 0, '2022-03-19 05:06:52.779323'),
(66, 9, 'Leh Ladakh', 'Set amidst the epic Himalayas, Ladakh is a rustic and heavenly beautiful travel destination. The rugged valleys and mountains, winding roads coupled with the vibrant cultural life maintain the exuberance and charm of this region. The iconic Magnetic Hill, the turquoise coloured Pangong Lake, the confluence of two mystical rivers, ancient and awe inspiring monasteries and the highest passes are a few of the marvelous attractions of Leh and Ladakh in general. T                               ', 1, 'leh ladakh (2).jpg', 23500, 0, 0, '2022-03-19 05:06:52.779323'),
(67, 7, 'Rajasthan', 'Rajasthan is a state in northern India.It covers 342,239 square kilometres or 10.4 percent of India is total geographical area. It is the largest Indian state by area and the seventh largest by population. It is on India is northwestern side, where it comprises most of the wide and inhospitable Thar Desert and shares a border with the Pakistani provinces of Punjab to the northwest and Sindh to the west, along the Sutlej-Indus River valley.                                   ', 1, 'rajasthan (2).jpg', 21000, 0, 0, '2022-03-19 05:06:52.779323'),
(68, 7, 'Ooty', 'Ooty is a city and a municipality in the Nilgiris district of the Indian state of Tamil Nadu. It is located 86 km north west of Coimbatore and 128 km south of Mysore and is the headquarters of the Nilgiris district. It is a popular hill station located in the Nilgiri Hills. It is called Queen of Western Ghats. It was the summer capital of Madras Presidency.The town is connected by the Nilgiri ghat roads and Nilgiri Mountain Railway.                              ', 1, 'ooty (2).jpg', 16800, 0, 0, '2022-03-19 05:06:52.779323'),
(69, 5, 'Kutch', 'Kutch district also spelled as Kachchh is a district of Gujarat state in western India, with its headquarters capital at Bhuj. Covering an area of 45,674 km, it is the largest district of India. The area of Kutch District is larger than the entire area of states like Haryana 44,212 km. The population of Kutch is about 2,092,371. It has 10 talukas, 939 villages and 6 municipalities.Kutch District is surrounded by the Gulf of Kutch and the Arabian Sea to the south.                         ', 1, 'kutch (2).jpg', 13200, 0, 0, '2022-03-19 05:06:52.779323'),
(70, 5, 'Qutub Minar', 'The Qutub Minar, also spelled as Qutb Minar and Qutab Minar, is a minaret and victory tower that forms part of the Qutb complex, which lies at the site of Delhi’s oldest fortified city, Lal Kot, founded by the Tomar Rajputs. It is a UNESCO World Heritage Site in the Mehrauli area of South Delhi, India It is one of most visited tourist spots in the city due to it being one of the earliest that survives in the Indian subcontinent.                                 ', 1, 'qutub minar (2).jpg', 8800, 0, 0, '2022-03-19 05:06:52.779323'),
(71, 11, 'Gulmarg', 'Gulmarg  in Kashmiri, is a town, hill station, popular skiing destination, and notified area committee in the Baramulla district of Jammu and Kashmir, India.It is located at a distance of 31 km (19 mi) from Baramulla and 49 km from Srinagar. The town is situated in the Pir Panjal Range in the Western Himalayas and lies within the boundaries of Gulmarg Wildlife Sanctuary.', 1, 'gulmarg.jpg', 12900, 0, 0, '2022-03-19 05:06:52.779323'),
(72, 11, 'Pondicherry', ' A trip to Pondicherry on Christmas is something you should not miss. The pleasant weather, serene beaches, and beautifully decorated churches make it a perfect holiday place for a Christmas celebration in India. The exciting performances on the streets coupled with the fireworks display are something to look out for during New Year in Pondicherry. Mark our words, with your loved ones in this little French colony, you are sure to enjoy every bit of it.                    ', 1, 'pondicherry.jpg', 18500, 0, 0, '2022-03-19 05:06:52.779323'),
(73, 11, 'Gangtok', 'Gangtok is a city, municipality, the capital and the largest populated place of the Indian state of Sikkim. It is also the headquarters of the Gangtok District. Gangtok is in the eastern Himalayan range, at an elevation of 1,650 m The city population of 100,000 are from different ethnicities such as Bhutia, Lepchas, Kiratis and Gorkhas. Within the higher peaks of the Himalaya and with a year-round mild temperate climate, Gangtok is at the centre of Sikkim tourism industry.                       ', 1, 'gangtok.jpg', 17900, 0, 0, '2022-03-19 05:06:52.779323'),
(74, 4, 'Arunachal Pradesh', ' Arunachal Pradesh is a jewel of the North East. It charms tourists with its unrestrained beauty beyond imagination. The wildest state of India often appears as a patch of greenery on the Indian map. Arunachal Pradesh is blessed with 26 remote mountain valleys and culture rich indigenous tribes that tempt intrepid travellers to visit this place.The growing popularity of this least explored state often has a negative impact on its environment.              ', 1, 'arunachal pradesh.jpg', 21000, 0, 0, '2022-03-19 05:06:52.779323'),
(75, 4, 'Uttarakhand', 'Uttarakhand is popular as a biodiversity hotspot hugged by towering mountains and dramatic terrains, loaded with dense forests and azure water bodies. It is also a treasure trove of religious sites where tourists visit in search of divinity. This powerhouse of nature inspires people to live a fulfilling and happy life. These three institutions are jointly supporting local homeowners to promote sustainable tourism and providing adequate funds for smooth operation.                        ', 1, 'uttarakhand.jpg', 16700, 0, 0, '2022-03-19 05:06:52.779323'),
(76, 4, 'West Bengal', 'West Bengal is the ‘Land of Contrast’ with misty mountains, pristine beaches, cultural heritage and religious sites. This state never fails to delights travellers with lush greenery and meandering rivers. The region of rosogollas is rich in history too that captivates the soul. Undoubtedly, West Bengal is always on the bucket list of travellers who are in search of a surreal experience with finger-licking food.    ', 1, 'west bengal.jpg', 18600, 0, 0, '2022-03-19 05:06:52.779323'),
(77, 6, 'Cochin', 'Cochin Cruise ships are large passenger ships used mainly for vacationing. Unlike ocean liners, which are used for transport, they typically embark on round-trip voyages to various ports-of-call, where passengers may go on tours known as \"shore excursions\".                            ', 1, 'cochin cruise.jpg', 28000, 0, 0, '2022-03-19 05:06:52.779323'),
(78, 6, 'Goa ', 'Goa is undoubtedly India’s favorite travel destination. A backpacker’s paradise and a weekend travel hub, Goa is famous for its tropical vibe, young identity, and cultural adaptations. This Konkan state in the country’s southwestern coast is an interesting mix of sun, sand, and spice. Whether you’re traveling with your family and friends or traveling solo, Goa’s versatility never fails to charm.                                    ', 1, 'goa cruise.jpg', 32000, 0, 0, '2022-03-19 05:06:52.779323');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `User_Id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `image` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`User_Id`, `fname`, `lname`, `UserName`, `Email`, `Number`, `Password`, `Gender`, `image`, `Date`) VALUES
(1, 'Arpit', 'Rabadiya', 'arpit', 'arpitrabadiya48@gmail.com', '9979233928', '123', 'Male', 'boy.png', '2022-03-14 11:29:05'),
(2, 'savan', 'sarliya', 'savan', 'saraliyasavan@gmail.com', '9978625793', '123456', 'Male', 'profile-3.jpg', '2022-03-15 05:13:38'),
(3, 'yug', 'golkiya', 'yug', 'yuggolkiya802@gmail.com', '9978625793', '1234', 'Male', 'boy-2.png', '2022-03-15 05:13:17'),
(4, 'dhruvil', 'dudhat', 'dhruvil', 'dhruvildudhat6282@gmail.com', '9876543210', '1234', 'Male', '3.jpg', '2022-03-16 05:30:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_hotel`
--
ALTER TABLE `admin_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User_Id` (`User_Id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`Faq_Id`);

--
-- Indexes for table `hotel_payment`
--
ALTER TABLE `hotel_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `listout`
--
ALTER TABLE `listout`
  ADD PRIMARY KEY (`lo_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `slider_hotel`
--
ALTER TABLE `slider_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_hotel`
--
ALTER TABLE `admin_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `Faq_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_payment`
--
ALTER TABLE `hotel_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `listout`
--
ALTER TABLE `listout`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `slider_hotel`
--
ALTER TABLE `slider_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`User_Id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user_register` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `listout`
--
ALTER TABLE `listout`
  ADD CONSTRAINT `listout_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`);

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `sub_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
