-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2021 at 05:26 AM
-- Server version: 10.3.31-MariaDB-log
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindunkin_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerid` int(11) NOT NULL,
  `answeroptions` text NOT NULL,
  `questionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product`
--

CREATE TABLE `catalog_product` (
  `product_id` int(11) NOT NULL,
  `item_number` varchar(225) NOT NULL,
  `product_name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `search_name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_product`
--

INSERT INTO `catalog_product` (`product_id`, `item_number`, `product_name`, `search_name`, `status`) VALUES
(2, '20103', 'Choco candy sprinkle', 'شوكو كاندي سبرينكل', 'Active'),
(3, '20104', 'Choco Marble', 'شوكو ماربل', 'Active'),
(4, '20105', 'Coco Choco', 'كوكو شوكو', 'Active'),
(5, '20106', 'Nutty chocolate', 'ناتي شوكلاته', 'Active'),
(6, '20107', 'Vanilla frosted', 'فانيلا فروستد', 'Active'),
(12, '20113', 'Strawberry Marble', 'ستراوبيري ماربل', 'Active'),
(13, '20114', 'Coco Strawberry', 'كوكو ستراوبري', 'Active'),
(14, '20115', 'Nutty Strawberry', 'ناتي ستراوبري', 'Active'),
(15, '20116', 'Strawberry candy sprinkle', 'ستراوبيري كاندي سبري', 'Active'),
(16, '20117', 'Lemon frosted', 'لمون فروستد', 'Active'),
(17, '20118', 'Lemon Candy Sprinkle', 'لمون كاندي سبرينكل', 'Active'),
(18, '20119', 'Nutty Lemon', 'ناتي لمون', 'Active'),
(19, '20120', 'Lemon Marble', 'لمون ماربل', 'Active'),
(20, '20121', 'Maple frosted', 'مابل فروستد', 'Active'),
(21, '20122', 'Maple Marble', 'مابل ماربل', 'Active'),
(22, '20123', 'Maple candy sprinkle', 'مابل كاندي سبرينكل', 'Active'),
(23, '20124', 'Nutty Maple', 'ناتي مابل', 'Active'),
(24, '20125', 'Sugar raised', 'شوكر ريزد', 'Active'),
(25, '20126', 'Choco Bavarian', 'شوكو بفاريان', 'Active'),
(26, '20127', 'Orange Frosted', 'اورانج فروستد', 'Active'),
(27, '20128', 'Orange Marble', 'اورانج ماربل', 'Active'),
(28, '20129', 'Orange Candy Sprinkle', 'اورانج كاندي سبرينكل', 'Active'),
(29, '20130', 'Nutty Orange', 'ناتي اورنج', 'Active'),
(30, '20131', 'Mint Frosted', 'مانت فروستد', 'Active'),
(31, '20132', 'Mint candy sprinkles', 'مانت كاندي سبرينكل', 'Active'),
(32, '20133', 'Mint Marble', 'مانت ماربل', 'Active'),
(33, '20134', 'Longjhon', 'لونج جون', 'Active'),
(34, '20135', 'Longgjhon marble', 'لونج جون ماربل', 'Active'),
(35, '20136', 'Nutty Longjhon', 'ناتي لونج جون', 'Active'),
(36, '20137', 'Square frosted', 'سكوير فروستد', 'Active'),
(37, '20138', 'Marbled Square', 'ماربل سكوير', 'Active'),
(38, '20139', 'Square candy sprinkle', 'سكوير كاندي سبرينكل', 'Active'),
(39, '20140', 'Glazed cake', 'كليزد كيك', 'Active'),
(40, '20141', 'Powdered cake', 'باودر كيك', 'Active'),
(41, '20142', 'Old Fashion', 'اولد فاشن', 'Active'),
(42, '20143', 'Cake Coconut', 'كيك كوكونات', 'Active'),
(43, '20144', 'Cake Butternut', 'كيك باترنات', 'Active'),
(44, '20145', 'Cake Toasted Coconut', 'كيك توستد كوكونات', 'Active'),
(45, '20146', 'Cake Frosted', 'كيك فروستد', 'Active'),
(46, '20147', 'Cake Special Crunch', 'كيك سبيسيال كرانش', 'Active'),
(47, '20148', 'Dunkin Donut', 'دانكن دونت', 'Active'),
(48, '20149', 'Jelly Stick', 'جيلي ستيك', 'Active'),
(49, '20150', 'Chocolate Glazed', 'شوكليت جليزد', 'Active'),
(50, '20151', 'Double Chocolate', 'دبل شوكليت', 'Active'),
(51, '20152', 'Choco Coconut', 'شوكو كوكونات', 'Active'),
(52, '20153', 'Choco Toasted Coconut', 'شوكو توستد كوكونات', 'Active'),
(53, '20154', 'Choco Crunch', 'شوكو كرانش', 'Active'),
(54, '20155', 'Choco Butternut', 'شوكو باترنات', 'Active'),
(55, '20156', 'Bavarian kreme', 'بافاريان كريم', 'Active'),
(56, '20157', 'Choco Bavarian', 'شوكو بافاريان', 'Active'),
(57, '20158', 'Boston kreme', 'بوستن كريم', 'Active'),
(58, '20159', 'Caramel Filled', 'كراميل فيلد', 'Active'),
(59, '20160', 'Blueberry filled', 'بلوبري فيلد', 'Active'),
(60, '20161', 'Black Raspberry', 'بلاك راشبيري', 'Active'),
(61, '20162', 'Apple Filled', 'ابل فيلد', 'Active'),
(62, '20163', 'Pineapple filled', 'بينابل فيلد', 'Active'),
(63, '20164', 'Strawberry Filled', 'جيلي فيلد', 'Active'),
(64, '20165', 'Lemon Filled', 'لمون فيلد', 'Active'),
(65, '20166', 'Smiley Donut', 'سمايلي دونت', 'Active'),
(66, '20167', 'Double strawberry', 'دبل ستراوبري', 'Active'),
(67, '20168', 'Choco Kreme', 'شوكو كريم', 'Active'),
(68, '20169', 'Vanilla Kreme', 'فانيلا كريم', 'Active'),
(69, '20170', 'Strawberry kreme', 'ستراوبري كريم', 'Active'),
(70, '20171', 'Lemon kreme', 'لمون كريم', 'Active'),
(71, '20172', 'Orange Kreme', 'اورانج كريم', 'Active'),
(72, '20173', 'Apple Raspberry Filled', 'ابل راشبيري فيلد', 'Active'),
(73, '20174', 'Apple Crumble', 'ابل كرامبل', 'Active'),
(74, '20175', 'Pineapple Crumble', 'بينابل كرامبل', 'Active'),
(75, '20176', 'Glazed sour cream', 'جليزد ساور كريم', 'Active'),
(76, '20177', 'Frosted sour cream', 'فروستد ساور كريم', 'Active'),
(77, '20178', 'Plain Sour cream', 'بلين ساور كريم', 'Active'),
(78, '20179', 'French Crueller Plain', 'فرانش كرولر بلين', 'Active'),
(79, '20180', 'French Crueller Frosted', 'فرانش كرولرفروستد', 'Active'),
(80, '20181', 'French Crueller Glazed', 'فرانش كرولر جليزد', 'Active'),
(81, '20182', 'Blueberry Cake Plain', 'بلوبري كيك بلين', 'Active'),
(82, '20183', 'Blueberry Cake Glaze', 'بلوبري كيك جليزد', 'Active'),
(83, '20184', 'Blueberry Cake Powdered', 'بلوبري كيك باودرد', 'Active'),
(84, '20185', 'Blueberry Cake Cinnamon', 'بلوبري كيك سينامون', 'Active'),
(85, '20186', 'Apple n\' spice', 'ابل سبسس', 'Active'),
(86, '20187', 'Pineapple n\' spice', 'بينابل سبيس', 'Active'),
(87, '20188', 'Twist Glazed', 'تويست جليزد', 'Active'),
(88, '20189', 'Twist Frosted', 'تويست فروستد', 'Active'),
(89, '20190', 'Praline Donut', 'برالاين دونت', 'Active'),
(90, '20191', 'Brownie Donut', 'براوني دونت', 'Active'),
(91, '20192', 'Sunburst', 'سانبروست', 'Active'),
(92, '20193', 'Boston Cream Tart', 'بوستن كريم تارت', 'Active'),
(93, '20194', 'Eclair', 'كلير', 'Active'),
(94, '20195', 'Custard Supreme', 'كوستارد سوبريم', 'Active'),
(95, '20196', 'Choco Parfait', 'شوكو بارفي', 'Active'),
(96, '20197', 'Choco Cream Bar', 'شوكو كريم بار', 'Active'),
(97, '20198', 'Lady Finger', 'ليدي فينكر', 'Active'),
(98, '20199', 'Caramel Roll', 'كاراميل رول', 'Active'),
(99, '20200', 'Cookies n\' cream donut', 'كوكيز كريم دونت', 'Active'),
(100, '20201', 'Plain Cake Munchkins', 'بلين كيك', 'Active'),
(101, '20202', 'Cinnamon Munchkins', 'سينامون', 'Active'),
(102, '20203', 'Sugar Munchkins', 'باودرد', 'Active'),
(103, '20204', 'Chocolate Glazed Munchkins', 'شوكليت جليزد', 'Active'),
(104, '20205', 'Glazed Yeast Munchkins', 'جليزد ييست', 'Active'),
(105, '20206', 'Bavarian Munchkins', 'جيلي /بافاريان/ستراو', 'Active'),
(106, '20207', 'Strawberry  Munchkins', 'شوكر/لمون/بلاك راشبي', 'Active'),
(107, '20208', 'Lemon', 'لمون', 'Active'),
(108, '20209', 'Coconut munchkin', 'كوكونات مانشكين', 'Active'),
(109, '20210', 'Cake toasted coconut munchkin', 'كيك توستد كوكونات من', 'Active'),
(110, '20211', 'Choco Especial Crunch munchkin', 'شوكو سبيسيال كرانش م', 'Active'),
(111, '20212', 'Choco Coconut munchkin', 'شوكو كوكونات مانشكين', 'Active'),
(112, '20213', 'Blueberry Muffin', 'بلوبري', 'Active'),
(113, '20214', 'Chocolate chips Muffin', 'شوكو شيبس مافين', 'Active'),
(114, '20215', 'Corn', 'كورن', 'Active'),
(115, '20216', 'Honey Raisin bran', 'هاني ريزن بران', 'Active'),
(116, '20217', 'Oat Bran', 'اوت بران', 'Active'),
(117, '20218', 'Blueberry Oat Bran', 'بلوبري اوت بران', 'Active'),
(118, '20220', 'Apple Muffin', 'تفاح', 'Active'),
(119, '20221', 'Strawberry', 'ستروبري', 'Active'),
(120, '20222', 'Basic', 'بازيك', 'Active'),
(121, '20223', 'Cherry', 'شيري', 'Active'),
(122, '20224', 'Banana', 'بنلنل', 'Active'),
(123, '20225', 'Basic Muffins', 'بازيك مافين', 'Active'),
(124, '20226', 'Corn Muffins', 'كورن مافين', 'Active'),
(125, '20227', 'Honey Bran Muffins', 'هاني بران مافين', 'Active'),
(126, '20228', 'Oat Bran Muffins', 'اوت بران مافين', 'Active'),
(127, '20229', 'Plain Croissant', 'بلين كرواسون', 'Active'),
(128, '20230', 'Chocolate', 'شوكليت', 'Active'),
(129, '20231', 'Almond', 'الموند', 'Active'),
(130, '20232', 'Raspberry', 'راشبيري', 'Active'),
(131, '20233', 'Cheese', 'شيز', 'Active'),
(132, '20234', 'Zaater', 'زعتر', 'Active'),
(133, '20235', 'Double fudge', 'دبل فيدج', 'Active'),
(134, '20236', 'Walnut', 'وول نات', 'Active'),
(135, '20237', 'Peanut butter w/ choc.', 'بينات باترشوكو', 'Active'),
(136, '20238', 'Choco chips', 'شوكو شيبس مافين', 'Active'),
(137, '20239', 'Oatmeal Raisin', 'اوتميل ريزان', 'Active'),
(138, '20240', 'Blondies', 'بلوندي', 'Active'),
(139, '20241', 'Bunwich', 'بانويش', 'Active'),
(140, '20242', 'Coffee Roll', 'كوفى رول', 'Active'),
(141, '20243', 'Bowties', 'بووتيس', 'Active'),
(142, '20244', 'Fritters', 'فريترس', 'Active'),
(143, '20245', 'Glazed Donut', 'دونات شيرا', 'Active'),
(144, '20246', 'Chocolate English Cake', 'كعكة الشوكولا', 'Active'),
(145, '20247', 'Marble English Cake', 'ماربل كعكة', 'Active'),
(146, '20248', 'Vanilla English Cake', 'كعكة الفانيليا', 'Active'),
(147, '20249', 'Filled Croissant Stawberry', 'كرواسان الفراولة', 'Active'),
(148, '20250', 'Filled Croissant Blueberry', 'كرواسان بلوبيري', 'Active'),
(149, '20251', 'Filled Croissant Bavarian', 'كرواسان بافارين', 'Active'),
(150, '20252', 'Filled Croissant Chocolate', 'كرواسان شوكولا', 'Active'),
(151, '20253', 'Filled Croissant Apple', 'كرواسان محشيه تفاح', 'Active'),
(152, '20254', 'Buttered Croissant Plain', 'كرواسان زبدة - سادة', 'Active'),
(153, '20255', 'Filled Donut-Guava', 'دونات الجوافة', 'Active'),
(154, '20256', 'Filled Donut-Lemon', 'دونات ليمون', 'Active'),
(155, '20257', 'Filled Donut-Cherry', 'دونات الكرز', 'Active'),
(156, '20258', 'Filled Donut-Mango', 'دونات مانجو', 'Active'),
(157, '20259', 'Filled Donut-Respberry', 'دونات توت', 'Active'),
(158, '20260', 'Apple Nut Stick', 'تفاح مكسرات', 'Active'),
(159, '20261', 'Coupon Donut', 'كوبونات - دونتس', 'Active'),
(160, '20262', 'Lotus Muffins', 'Lotus Muffins', 'Active'),
(161, '20263', 'Dates Muffins', 'مافن التمر', 'Active'),
(162, '20264', 'Vanilla Muffins', 'مافن فانيلا و شوكولا', 'Active'),
(163, '20265', 'Dobla Donut', 'Dobla Donut', 'Active'),
(164, '20266', 'Brownies', 'براونيز', 'Active'),
(165, '20267', 'Cookies Chip Chocolate', 'شوكو تشيب كوكيز', 'Active'),
(166, '20268', 'Cookies Double Chocolate', ' دبل شوكوليت كوكيز', 'Active'),
(167, '20269', 'Apple Candy Sprinkle', 'Apple Candy Sprinkle', 'Active'),
(168, '20270', 'Green Donut', 'Green Donut', 'Active'),
(169, '20271', 'Dates English Cake', 'كيك التمر', 'Active'),
(170, '20272', 'Bavarian Filled', 'دونات بحشو البفاريان', 'Active'),
(171, '20273', 'Choco Hazelnut Filled', 'Choco Hazelnut Fille', 'Active'),
(172, '20274', 'Choco Marble Sprinkle', 'Choco Marble Sprinkl', 'Active'),
(173, '20275', 'Strawberry Marble Sprinkle', 'Strawberry Marble Sp', 'Active'),
(174, '20276', 'Vanilla Marble Sprinkle', 'ﭬانيلا سبرينكل', 'Active'),
(175, '20280', 'Peanut Cookies', 'كوكيز الفول السوداني', 'Active'),
(176, '20281', 'Choco Hazelhut Tart', 'شوكو هازلنت تارت', 'Active'),
(177, '20282', 'Custard Cream', 'كريم كاسترد', 'Active'),
(178, '20283', 'Biscuit Cream', 'دونات بسكيت كراميل', 'Active'),
(179, '20284', 'Pistachio Cream', 'دونات الفستق', 'Active'),
(180, '20285', 'Cheese Cream', 'دونات كيك الجبن', 'Active'),
(181, '20286', 'Monster Donut', 'دونات المانستر', 'Active'),
(182, '20287', 'Chicken Fajitta', 'Chicken Fajitta', 'Active'),
(183, '20288', 'Chicken Tikka', 'Chicken Tikka', 'Active'),
(184, '20289', 'Chicken Mexican(Spicy)', 'Chicken Mexican(Spic', 'Active'),
(185, '20290', 'Smoked Turkey', 'Smoked Turkey', 'Active'),
(186, '20291', 'Triple Cheese', 'Triple Cheese', 'Active'),
(187, '20292', 'Hallume Cheese', 'Hallume Cheese', 'Active'),
(188, '20293', 'Tuna', 'Tuna', 'Active'),
(189, '20294', 'Choco Sprinkle Munchkins', 'شوكو سبرينكل مانشكين', 'Active'),
(190, '20295', 'Sandwich Potato Bread', 'Sandwich Potato Brea', 'Active'),
(191, '20296', 'Sandwich Baguette Brown', 'Sandwich Baguette Br', 'Active'),
(192, '20297', 'Sandwich Baguette White', 'Sandwich Baguette Wh', 'Active'),
(193, '20298', 'Sandwich Ciabatta Bread', 'Sandwich Ciabatta Br', 'Active'),
(194, '20299', 'Choco Hazelnut Marble', 'شوكو هازلنت ماربل', 'Active'),
(195, '20300', 'Nutty Hazelnut Donut', 'دونات بندق ومكسرات', 'Active'),
(196, '20301', 'Heart Beat Donut', 'دونات دقات القلب', 'Active'),
(197, '20302', 'Heart Donut', 'دونات القلب', 'Active'),
(198, '20303', 'Cookie Donut', 'كوكي دونات', 'Active'),
(199, '20304', 'Choco Bavarian Caramel', 'شوكو بافاريان كراميل', 'Active'),
(200, '20305', 'Pistachio Donut', 'بيستاشيو دونات', 'Active'),
(201, '20306', 'Biscoff Donut', 'دونات البسكويت', 'Active'),
(202, '20307', 'Choco Butternet Cake', 'شوكو باترنت رينج', 'Active'),
(203, '20308', 'Choco Butternet Munchkins', 'شوكو باترنت مانشكينز', 'Active'),
(204, '20309', 'Apple N Spice Munchkins', 'مانشكينز تفاح وسبايس', 'Active'),
(205, '20310', 'Pineapple N Spice Munchkins', 'اناناس وسبايس', 'Active'),
(206, '20311', 'Choco Bavarian Munchkins', 'شوكو بافاريان', 'Active'),
(207, '20312', 'Delivery Donut', 'Delivery Donut', 'Active'),
(208, '20313', 'Hazel Butternut Filled', 'شوكو كريم وجوز', 'Active'),
(209, '20314', 'Vanilla Hazelnut Marble', 'ماربل فانيلا وبندق', 'Active'),
(210, '20315', 'Oatmeal Donut', 'دونات الشوفان', 'Active'),
(211, '20316', 'Black Raspberry Munckins', 'مانشكينز التوت ازرق', 'Active'),
(212, '20317', 'Bavarian Caramel', 'بافاريان كراميل', 'Active'),
(213, '20318', 'Choco Coconut', 'شوكو كوكونت', 'Active'),
(214, '20319', 'Vanilla Choco', 'فانيلا شوكو', 'Active'),
(215, '20320', 'Marshmallow Donut', 'مارشمالو دونت', 'Active'),
(216, '20321', 'Toasted Coconut Filled', 'توستيد كوكونت فيلد', 'Active'),
(217, '20322', 'Toasted Coconut Donut', 'توستيد كوكونت دونت', 'Active'),
(218, '20323', 'Kitkat Crunch Munchkins', 'كت كات كرنش منشكن', 'Active'),
(219, '20324', 'Kitkat Crunch Donut', 'كت كات كرنش دونت', 'Active'),
(220, '20325', 'Kitkat Crunch Long John', 'كت كات كرنش لونق جون', 'Active'),
(221, '20326', 'Glazed Cake Munchkins', 'مانشكين كيك جليزد', 'Active'),
(222, '20327', 'COCONUT DONUT', 'دونات جوز الهند', 'Active'),
(223, '20328', 'Nutty Maple Marble', 'نيتي مابل ماربل', 'Active'),
(224, '20329', 'Hazel Coconut Donut', 'دونت بندق وجوزالهند', 'Active'),
(225, '20330', 'Lemon Donut', 'دونات ليمون', 'Active'),
(226, '20331', 'Blueberry Cookie Donut', 'دونات كوكيز توت بري', 'Active'),
(227, '20332', 'Double Caramel Donut', 'دونات كريمة مضاعفة', 'Active'),
(228, '20333', 'Coconut Cake Donut', 'دونات جوز الهند', 'Active'),
(229, '20334', 'Vanilla Tart Kitkat', 'فانيلا تارت كت كات', 'Active'),
(230, '20335', 'Pistachio Nutty', 'بيستاشيو نوتي', 'Active'),
(231, '20336', 'Bavarian Mint Pearl', 'باقاريان منت بيرل', 'Active'),
(232, '20337', 'Mint Drizzle', 'مينت دريزل', 'Active'),
(233, '20338', 'Green Peanut', 'جرين بينات', 'Active'),
(234, '20339', 'Green Sprinkle', 'جرين سبرنكل', 'Active'),
(235, '20340', 'White Dessert', 'وايت ديسيرت', 'Active'),
(236, '20341', 'Green Day Long John', 'جرين داي لون جون', 'Active'),
(237, '20342', 'Choco Kitkat Marble', 'شوكو كتكات ماربل', 'Active'),
(238, '20343', 'Caramel Kitkat Filled Marble', 'كرميل كتكات فيلدمربل', 'Active'),
(239, '20344', 'Longjohn Caramel Kitkat Mix', 'لونق جون كرم كتكات م', 'Active'),
(240, '20345', 'Choco Kitkat Mix Marble', 'شوكو كتكات مكس ماربل', 'Active'),
(241, '20346', 'Chocolate M1 Kitkat', 'شوكلت م1 كتكات', 'Active'),
(242, '20347', 'Custard Supreme Donut', 'كاسترد سوبريمو دونت', 'Active'),
(243, '20348', 'Biscuit Crunch', 'بسكويت كرنش', 'Active'),
(244, '20349', 'Hazel Cream Kat', 'هازل كريم كات', 'Active'),
(245, '20350', 'Glazed Kitkat Powder Ring', 'جليزدكتكات باودر رنغ', 'Active'),
(246, '20351', 'Caramel Web', 'كارميل ويب', 'Active'),
(247, '20352', 'Caramel Spider', 'كاراميل سبايدر', 'Active'),
(248, '20353', 'Vanilla Spider', 'فانيلا سبايدر', 'Active'),
(249, '20354', 'Choco Web', 'شوكو ويب', 'Active'),
(250, '20355', 'Caramel Cookie Donut', 'كاراميل كوكيز دونت', 'Active'),
(251, '20356', 'Vanilla Kitkat Mix marble', 'فانيلاكتكات مكس مربل', 'Active'),
(252, '20357', 'Glazed Kitkat Powder Munchkin', 'جليزدكتكات بودرمنشكن', 'Active'),
(253, '20358', 'Mr Kitkat', 'م ر كتكات', 'Active'),
(254, '20359', 'Chocolatier white pearl', 'شوكوليتر وايت بيريل', 'Active'),
(255, '20360', 'Blueberry glazed munchkins', 'بلوبري جليزد منشكن', 'Active'),
(256, '20361', 'Blueberry mixlicious', 'بلوبري ميكسيليكوس', 'Active'),
(257, '20362', 'Caramel Kitkat lumber', 'كارميل كتكات لمبير', 'Active'),
(258, '20363', 'Caramel Bee', 'كارميل بيي', 'Active'),
(259, '20364', 'Caramel 3 King Kitkat', 'كاراميل 3 كنق كتكات', 'Active'),
(260, '20365', 'Choco Pistachio', 'شوكو بيستاشو', 'Active'),
(261, '20366', 'Blueberry Cake Marble', 'بلوبري كيك ماربل', 'Active'),
(262, '20367', 'Dark Wave Pistachio', 'دارك ويف بيستاشو', 'Active'),
(263, '20368', 'Q1 Crunchy Choco', 'كيو1 كرنشي شوكو', 'Active'),
(264, '20369', 'Green Apple', 'جرين ابل', 'Active'),
(265, '20370', 'ATEA CARAMEL', 'اتيا كارميل', 'Active'),
(266, '20371', 'Double milk chocolate chunk', 'دبل ميلك شوكلت شنك', 'Active'),
(267, '20372', 'Milk Chocolate Chunk Cookies', 'ميلك شوكلت شنك كوكيز', 'Active'),
(268, '20373', 'Triple Chocolate Cookie', 'تربل شكوليت كوكيز', 'Active'),
(269, '20374', 'Dawn Cookie Milk Chocolate Jum', 'داون كوكيز ملك شوكلت', 'Active'),
(270, '20375', 'Father\'s day 1', 'فاثر داي 1', 'Active'),
(271, '20376', 'Father\'s Day 2', 'فاثر داي 2', 'Active'),
(272, '20377', 'Mother\'s Day 1', 'ماثر داي 1', 'Active'),
(273, '20378', 'Mother\'s Day 2', 'ماثر داي 2', 'Active'),
(274, '20379', 'Ramadan Donut', 'دونات رمضان', 'Active'),
(275, '20380', 'National Day', 'اليوم الوطني', 'Active'),
(276, '20381', 'Choco Biscoff', 'شوكو بيسكوف', 'Active'),
(277, '20382', 'Golden Choco Flakes', 'جولدن شوكو فلاكيس', 'Active'),
(278, '20383', 'Choco Mountain', 'شوكو ماونتين', 'Active'),
(279, '20384', 'White Almond', 'وايت الموند', 'Active'),
(280, '20385', 'Mini Black Forest', 'Mini Black Forest', 'Active'),
(281, '20386', 'ALMOND VANILLA', 'ALMOND VANILLA', 'Active'),
(282, '20387', 'White Choco Strawberry', 'White Choco Strawber', 'Active'),
(283, '20388', 'Triple Choco', 'Triple Choco', 'Active'),
(284, '20389', 'Choco Caramel', 'Choco Caramel', 'Active'),
(285, '20390', 'Pistachio White Flakes', 'Pistachio White Flak', 'Active'),
(286, '20391', 'Crispy caramel', 'Crispy caramel', 'Active'),
(287, '20392', 'Kitkat Chunky', 'Kitkat Chunky', 'Active'),
(288, '20393', 'White Kitkat Bar', 'White Kitkat Bar', 'Active'),
(289, '20394', 'Sweet Smarties', 'Sweet Smarties', 'Active'),
(290, '20395', 'Kitkat Mixlicious', 'Kitkat Mixlicious Mu', 'Active'),
(291, '20396', 'Kitkat Blast', 'Kitkat Blast', 'Active'),
(292, '20397', 'Red Velvet Milkberry', 'Red Velvet Milkberry', 'Active'),
(293, '20398', 'Red Velvet White Mini', 'Red Velvet White Min', 'Active'),
(294, '20399', 'Red Velvet Pistachio Cream', 'Red Velvet Pistachio', 'Active'),
(295, '20400', 'Red Velvet Glaze', 'Red Velvet Glaze', 'Active'),
(296, '20401', 'Blueberry Filled Munchkin', 'Blueberry Filled Mun', 'Active'),
(297, '20402', 'BLOCK NUTTY DONUT', 'BLOCK NUTTY DONUT', 'Active'),
(298, '20403', 'Green Macroons', 'Green Macroons', 'Active'),
(299, '20404', 'Pink Merengue Dream', 'Pink Merengue Dream', 'Active'),
(300, '20405', 'Dream Donut', 'Dream Donut', 'Active'),
(301, '20406', 'Golden Mountain', 'Golden Mountain', 'Active'),
(302, '20407', 'Golden Wacko', 'Golden Wacko', 'Active'),
(303, '20408', 'Golden Choco', 'Golden Choco', 'Active'),
(304, '20409', 'Regular Donut ( Free)', 'Regular Donut ( Free', 'Active'),
(305, '20410', 'Delivery Munchkins', 'Delivery Munchkins', 'Active'),
(306, '20411', 'Delivery Fancy', 'Delivery Fancy', 'Active'),
(307, '20412', 'Vanilla Cake Pistachio', 'Vanilla Cake Pistach', 'Active'),
(308, '20413', 'Drizzle Freak', 'Drizzle Freak', 'Active'),
(309, '20414', 'Spidy Donut', 'Spidy Donut', 'Active'),
(310, '20415', 'Mothers\'s Day Donut', 'Mothers\'s Day Donut', 'Active'),
(311, '20416', 'Choco Hazelnut Cheesecake', 'Choco Hazelnut Chees', 'Active'),
(312, '20417', 'White Chocolate Oreo', 'White Chocolate Oreo', 'Active'),
(313, '20418', 'Oreo and Cream', 'Oreo and Cream', 'Active'),
(314, '20419', 'National Day Munchkins', 'National Day Munchki', 'Active'),
(315, '20420', 'Green Heart', 'Green Heart', 'Active'),
(316, '20907', 'Filling Croissant', 'كرواسان محشية', 'Active'),
(317, 'S1001', 'Dunkin Original Coffee Small', 'قهوة دانكن الأصلية', 'Active'),
(318, 'S1002', 'Dunkin Original Coffee Medium', 'قهوة دانكن الأصلية', 'Active'),
(319, 'S1003', 'Dunkin Original Coffee Large', 'قهوة دانكن الأصلية', 'Active'),
(320, 'S1004', 'Dunkin Original Coffee Extra large', 'قهوة دانكن الأصلية', 'Active'),
(321, 'S1005', 'Small Dark Roast Coffee', 'دارك روست كوفي (صغير', 'Active'),
(322, 'S1006', 'Medium Dark Roast coffee', 'دارك روست كوفي (وسط)', 'Active'),
(323, 'S1007', 'Large Dark Roast coffee', 'دارك روست كوفي (كبير', 'Active'),
(324, 'S1008', 'Extra-large Dark Roast coffee', 'دارك روست كوفي (كبير', 'Active'),
(325, 'S1009', 'Small Decaf Coffee', 'قهوة دانكن ديكاف (صغ', 'Active'),
(326, 'S1010', 'Medium Decaf Coffee', 'قهوة دانكن ديكاف (وس', 'Active'),
(327, 'S1011', 'Large Decaf Coffee', 'قهوة دانكن ديكاف (كب', 'Active'),
(328, 'S1012', 'Extra-large Decaf Coffee', 'قهوة دانكن ديكاف (كب', 'Active'),
(329, 'S1013', 'Coffee In Mug OB', 'قهوة دانكن الأصلية ب', 'Active'),
(330, 'S1014', 'Coffee In Mug  Dark roast', 'دارك روست كوفي بالمج', 'Active'),
(331, 'S1015', 'Coffee In Mug Decaf', 'قهوة دانكن ديكاف بال', 'Active'),
(332, 'S1016', 'Dunkin Box with OB Coffee', 'دانكن بوكس ( قهوة دا', 'Active'),
(333, 'S1017', 'Dunkin Box with Dark Roast Coffee', 'دانكن بوكس ( دارك رو', 'Active'),
(334, 'S1018', 'Dunkin Box with Decaf coffee', 'دانكن بوكس (قهوة دان', 'Active'),
(335, 'S1019', 'Free 10oz small coffee origional', 'Free(10oz) small cof', 'Active'),
(336, 'S1020', 'Free 10oz Small Dark Roast', 'Free 10oz Small Dark', 'Active'),
(337, 'S1021', 'Mothers Day Medium Coffee', 'Mothers Day Medium C', 'Active'),
(338, 'S1022', 'Dunkin Box Original Coffee 20oz', 'Dunkin Box Original', 'Active'),
(339, 'S1023', 'Dunkin Box Original Coffee 40oz', 'Dunkin Box Original', 'Active'),
(340, 'S1024', 'Dunkin Box Hot Chocolate 20oz', 'Dunkin Box Hot Choco', 'Active'),
(341, 'S1025', 'Dunkin Box Hot Chocolate 40oz', 'Dunkin Box Hot Choco', 'Active'),
(342, 'S1026', 'Dunkin Box Karak Chai 20oz', 'Dunkin Box Karak Cha', 'Active'),
(343, 'S1027', 'Dunkin Box Karak Chai 40oz', 'Dunkin Box Karak Cha', 'Active'),
(344, 'S1028', 'Dunkin Box Dark Roast 20oz', 'Dunkin Box Dark Roas', 'Active'),
(345, 'S1029', 'Dunkin Box Dark Roast 40oz', 'Dunkin Box Dark Roas', 'Active'),
(346, 'S1030', 'Dunkin Box with OB Coffee  (M-Cup)', 'Dunkin Box with OB C', 'Active'),
(347, 'S1031', 'Dunkin Box with Dark Roast Coffee  (M-Cup)', 'Dunkin Box with Dark', 'Active'),
(348, 'S1032', 'Dunkin Box Original Coffee 20oz  (M-Cup)', 'Dunkin Box Original', 'Active'),
(349, 'S1033', 'Dunkin Box Original Coffee 40oz  (M-Cup)', 'Dunkin Box Original', 'Active'),
(350, 'S1034', 'Dunkin Box Dark Roast 20oz  (M-Cup)', 'Dunkin Box Dark Roas', 'Active'),
(351, 'S1035', 'Dunkin Box Dark Roast 40oz  (M-Cup)', 'Dunkin Box Dark Roas', 'Active'),
(352, 'S1036', 'Dunkin Box with Decaf coffee  (M-Cup)', 'Dunkin Box with Deca', 'Active'),
(353, 'S1037', 'Dunkin Box with Decaf coffee 20oz  (M-Cup)', 'Dunkin Box with Deca', 'Active'),
(354, 'S1038', 'Dunkin Box with Decaf coffee 40oz  (M-Cup)', 'Dunkin Box with Deca', 'Active'),
(355, 'S1039', 'Dunkin Box with Decaf coffee 20oz', 'Dunkin Box with Deca', 'Active'),
(356, 'S1040', 'Dunkin Box with Decaf coffee 40oz', 'Dunkin Box with Deca', 'Active'),
(357, 'S1301', 'Coffee.DD Coffee Grounds Bag 01 Lbs', '  كيس قهوة دانكن الأ', 'Active'),
(358, 'S1302', 'Coffee.DD Dark Roast Grounds Bag 01 Lbs', '  كيس قهوة دارك روست', 'Active'),
(359, 'S1303', 'Coffee.DD Decaf Coffee Grounds Bag 01 Lbs', '  كيس قهوة دانكن ديك', 'Active'),
(360, 'S1304', 'COFFEE GROUND HAZELNUT', '  كيس قهوة دانكن بال', 'Active'),
(361, 'S1305', 'Coffee.DD Coffee French Vanilla Grounds Bag 01 Lbs', '  كيس قهوة الفانيلا', 'Active'),
(362, 'S1306', 'Mug.Glass Mug 12 oz', 'مج زجاج (١٢ أونصة)', 'Active'),
(363, 'S1307', 'Mug.Ceramic Sprinkles Appear Mug 16oz', 'مج سيراميك سبرينكلز', 'Active'),
(364, 'S1308', 'Mug.ND Espresso Mug Set DD', 'مج اسبريسوا الخاص بد', 'Active'),
(365, 'S1309', 'Mug.Modun Mug 12oz', 'مج مودون (١٢ أونصة)', 'Active'),
(366, 'S1310', 'Mug.Modun Mug 16oz', 'مج مودون (١٦ أونصة)', 'Active'),
(367, 'S1311', 'Mug.Modun Mug 20oz', 'مج مودون (٢٠ أونصة)', 'Active'),
(368, 'S1312', 'Thermos.Vacuum flask S/S 16 Oz Thermos', 'ترمس فاكيوم فلاسك (١', 'Active'),
(369, 'S1313', 'Thermos.Thermos flask 32 Oz', 'ترمس فاكيوم فلاسك (٣', 'Active'),
(370, 'S1314', 'Tumbler.Ceramic Tumbler 16 oz', 'تامبلر سيراميك (١٦ أ', 'Active'),
(371, 'S1315', 'Tumbler.Plaid Tumbler 15 Oz', 'تامبلر بلايد (١٥ أون', 'Active'),
(372, 'S1316', 'Tumbler.Glass Bottle DD', 'تامبلر قارورة زجاجية', 'Active'),
(373, 'S1317', 'Tumbler.Tritan Tumbler 16oz', 'تريتان تامبلر (١٦ أو', 'Active'),
(374, 'S1318', 'Tumbler.Plastic Black S/S Tumbler 15 oz', ' تامبلر بلاستك أسود', 'Active'),
(375, 'S1319', 'Tumbler.Soft Touch Tumbler 14 oz', 'تامبلر سوفت توتش ( ١', 'Active'),
(376, 'S1320', 'Tumbler.Single Serve Tumbler DD', 'تامبلر سينجل سيرف', 'Active'),
(377, 'S1321', 'Tumbler.Acrylic SS Tumbler 16oz', 'تامبلر اكريليك (١٦ أ', 'Active'),
(378, 'S1322', 'Tumbler.Sipper Stainless White 16oz', 'تامبلر سيبر ستانلس أ', 'Active'),
(379, 'S1323', 'Tumbler.Latte SS Vacum Insulated Tumbler 12oz', 'تامبلر لاتيه فاكيوم', 'Active'),
(380, 'S1324', 'Tumbler.Fitness Shaker Frosted Bottle 25oz', 'تابلر فيتنس شايكر فر', 'Active'),
(381, 'S1325', 'Tumbler.Brute SS Tumbler 24oz', 'تامبلر بروت (٢٤ أونص', 'Active'),
(382, 'S1326', 'Tumbler.Chocola Tumbler DD', 'تامبلر شوكولا', 'Active'),
(383, 'S1327', 'Tumbler.Milky Blue Tumbler DD', 'تامبلر ميلكي أزرق', 'Active'),
(384, 'S1328', 'Tumbler.ND Ice Grey Bottle DD', 'تامبلر آيس جراي قارو', 'Active'),
(385, 'S1329', 'Tumbler.ND Stan Bottle Grey Small DD', 'تامبلر قارورة ستان ج', 'Active'),
(386, 'S1330', 'Tumber.ND Stan Bottle Pink Regular DD', 'تامبلر قارورة ستان ز', 'Active'),
(387, 'S1331', 'Tumbler.Cold Bottle DD', 'تامبلر زجاجة باردة', 'Active'),
(388, 'S1332', 'Tumbler.Classic Tumbler DD', 'تامبلر كلاسيك', 'Active'),
(389, 'S1333', 'Wooden Tumbler Walnut Color Mini', 'تامبلر خشبي صغيرl', 'Active'),
(390, 'S1334', 'Wooden Tumbler Walnut Color Regular', 'تامبلر خشبي عادي بلو', 'Active'),
(391, 'S1335', 'Wooden Tumbler Walnut Color Large', 'تامبلر خشبي كبير', 'Active'),
(392, 'S1336', 'Tumbler.Mini Tumbler DD', 'تامبلر ميني', 'Active'),
(393, 'S1337', 'Tumbler.Luminous Tumbler DD', 'تامبلر لومينيوس', 'Active'),
(394, 'S1338', 'Tumbler.Tumbler 15.25 oz', 'تامبلر ١٥.٢٥', 'Active'),
(395, 'S1339', 'Tumbler.Vineyard Tumbler 14 oz', 'تامبلر فينيارد (١٤ أ', 'Active'),
(396, 'S1340', 'Tea Box Green Harmony Leaf', 'شاي أخضر', 'Active'),
(397, 'S1341', 'Tea Box Herbal Chamomile Pyramid', 'شاي البابونج', 'Active'),
(398, 'S1342', 'Tea Box Herbal Cool Mint', 'شاي نعناع', 'Active'),
(399, 'S1343', 'Tea Box Herbal Hibiscus Kiss', 'شاي الكركديه', 'Active'),
(400, 'S1344', 'Tea Box Bold Breakfast Black', 'شاي الإفطار الأسود', 'Active'),
(401, 'S1345', 'Wooden Tumbler Oak Color(Mini)', 'Wooden Tumbler Oak C', 'Active'),
(402, 'S1346', 'Wooden Tumbler Oak Color(Regular)', 'Wooden Tumbler Oak C', 'Active'),
(403, 'S1347', 'Wooden Tumbler Oak Color(Large)', 'Wooden Tumbler Oak C', 'Active'),
(404, 'S1348', 'Social Media Tumbler Color Mini', 'Social Media Tumbler', 'Active'),
(405, 'S1349', 'Social Media Tumbler Color Regular', 'Social Media Tumbler', 'Active'),
(406, 'S1350', 'Tumbler.DD Signature Tumbler (Orange)', 'Tumbler.DD Signature', 'Active'),
(407, 'S1351', 'Tumbler.DD Stainless Mug( Black / White)', 'Tumbler.DD Stainless', 'Active'),
(408, 'S1352', 'Tumbler.New Dunkin Mug Regular', 'Tumbler.New Dunkin M', 'Active'),
(409, 'S1353', 'Tumbler.Neco Tumbler (Black /White)', 'Tumbler.Neco Tumbler', 'Active'),
(410, 'S1354', 'Tumbler Hydration Bottles 500 ML', 'Tumbler Hydration Bo', 'Active'),
(411, 'S1401', 'Add on Shot Espresso', 'إضافة معيار اسبريسو', 'Active'),
(412, 'S1402', 'Add on Caramel Flavour Small', 'إضافة كراميل (صغير)', 'Active'),
(413, 'S1403', 'Add on Caramel Flavour M/L', 'Add on Caramel Flavo', 'Active'),
(414, 'S1404', 'Add on Hazelnut Flavour Small', 'إضافة البندق (صغير)', 'Active'),
(415, 'S1405', 'Add on Hazelnut Flavour M/L', 'إضافة البندق (وسط /', 'Active'),
(416, 'S1406', 'Add on vanilla Flavour Small', 'إضافة فانيلا (صغير)', 'Active'),
(417, 'S1407', 'Add on vanilla Flavour M/L', 'إضافة فانيلا (وسط /', 'Active'),
(418, 'S1408', 'Milk Apro-Soya Drink Original', 'Milk Apro-Soya Drink', 'Active'),
(419, 'S1409', 'Milk Apro-Almond Drink Original', 'Milk Apro-Almond Dri', 'Active'),
(420, 'S1410', 'Milk Apro-Coconut Drink Original', 'Milk Apro-Coconut Dr', 'Active'),
(421, 'S2001', 'Small Hot Chocolate', 'شوكلاتة ساخنة  (صغير', 'Active'),
(422, 'S2002', 'Medium Hot Chocolate', 'شوكلاتة ساخنة  (وسط)', 'Active'),
(423, 'S2003', 'Large Hot Chocolate', 'شوكلاتة ساخنة (كبير)', 'Active'),
(424, 'S2004', 'Small Cappuccino', 'كابتشينو (صغير)', 'Active'),
(425, 'S2005', 'Medium Cappuccino', 'كابتشينو (وسط)', 'Active'),
(426, 'S2006', 'Large Cappuccino', 'كابتشينو (كبير)', 'Active'),
(427, 'S2007', 'Single Shot Espresso', 'معيار ١ اسبريسو', 'Active'),
(428, 'S2008', 'Double Shot Espresso', 'معيار ٢ اسبريسو', 'Active'),
(429, 'S2009', 'Small Latte', 'لاتيه (صغير)', 'Active'),
(430, 'S2010', 'Medium Latte', 'لاتيه (وسط)', 'Active'),
(431, 'S2011', 'Large Latte', 'لاتيه (كبير)', 'Active'),
(432, 'S2012', 'Hot Mocha Small', 'موكا (صغير)', 'Active'),
(433, 'S2013', 'Hot Mocha Medium', 'موكا (وسط)', 'Active'),
(434, 'S2014', 'Hot Mocha Large', 'موكا (كبير)', 'Active'),
(435, 'S2015', 'Free 10oz Small cappuccino', 'Free 10oz Small capp', 'Active'),
(436, 'S3001', 'Frozen Dunkaccino Coffee 16oz', 'فروزن دانكاتشينو (١٦', 'Active'),
(437, 'S3002', 'Frozen Dunkaccino Coffee 24oz', 'فروزن دانكاتشينو (٢٤', 'Active'),
(438, 'S3003', 'Iced Latte 16oz', 'آيس لاتيه ( ١٦ أونصة', 'Active'),
(439, 'S3004', 'Iced Latte 24oz', 'آيس لاتيه ( ٢٤ أونصة', 'Active'),
(440, 'S3005', 'Iced Mocha 16oz', 'آيس موكا ( ١٦ أونصة)', 'Active'),
(441, 'S3006', 'Iced Mocha 24oz', 'آيس موكا ( ٢٤ أونصة)', 'Active'),
(442, 'S3007', 'Iced Coffee 16oz', 'آيس كوفي (١٦ أونصة)', 'Active'),
(443, 'S3008', 'Iced Coffee 24oz', 'آيس كوفي (٢٤ أونصة)', 'Active'),
(444, 'S3009', 'Cold Brew Coffee 16oz', 'قهوة كولد برو (١٦ أو', 'Active'),
(445, 'S3010', 'Cold Brew Coffee 24oz', 'قهوة كولد برو (٢٤ أو', 'Active'),
(446, 'S3011', 'Cold Brew Cappuccino 16oz', ' كولد برو كابتشينو (', 'Active'),
(447, 'S3012', 'Cold Brew Cappuccino 24oz', ' كولد برو كابتشينو (', 'Active'),
(448, 'S3013', 'Iced Caramel Macchiato 16 oz', 'آيس كراميل ميكاتو (١', 'Active'),
(449, 'S3014', 'Iced Caramel Macchiato 24 oz', 'آيس كراميل ميكاتو (٢', 'Active'),
(450, 'S3015', 'Nitro Cold Brew 16oz', 'قهوة كولد برو نايترو', 'Active'),
(451, 'S3016', 'Nitro Cold Brew 24oz', 'قهوة كولد برو نايترو', 'Active'),
(452, 'S4001', 'Caramel frappe 16 oz', 'فرابي كراميل ( ١٦ أو', 'Active'),
(453, 'S4002', 'Pistachio Frappe 16 oz', 'فرابي بستاشيو ( ١٦ أ', 'Active'),
(454, 'S4003', 'Caramel Espresso frappe 16 oz', 'فرابي كراميل اسبريسو', 'Active'),
(455, 'S4004', 'Strawberry Frappe 16 oz', 'فرابي فراولة ( ١٦ أو', 'Active'),
(456, 'S4005', 'Choco chips & banana Frappe 16 oz', 'فرابي شوكو شيب و موز', 'Active'),
(457, 'S4006', 'Caramel frappe 24 oz', 'فرابي كراميل ( ٢٤ أو', 'Active'),
(458, 'S4007', 'Pistachio Frappe 24 oz', 'فرابي بستاشيو ( ٢٤ أ', 'Active'),
(459, 'S4008', 'Caramel Espresso frappe 24 oz', 'فرابي  كراميل اسبريس', 'Active'),
(460, 'S4009', 'Strawberry Frappe 24 oz', 'فرابي فراولة (٢٤ أون', 'Active'),
(461, 'S4010', 'Choco chips & banana Frappe 24 oz', 'فرابي شوكو شيب و موز', 'Active'),
(462, 'S4011', 'Caramel frappe 12 oz', 'فرابي كراميل ( ١٢ أو', 'Active'),
(463, 'S4012', 'Pistachio Frappe 12 oz', 'فرابي بستاشيو ( ١٢ أ', 'Active'),
(464, 'S4013', 'Caramel Espresso frappe 12 oz', 'فرابي  كراميل اسبريس', 'Active'),
(465, 'S4014', 'Strawberry Frappe 12 oz', 'فرابي فراولة (١٢ أون', 'Active'),
(466, 'S4015', 'Choco chips & banana Frappe 12 oz', 'فرابي شوكو شيب و موز', 'Active'),
(467, 'S5001', 'Karak Chai', 'شاي كرك', 'Active'),
(468, 'S5002', 'Tea Bold Breakfast 10oz', 'شاي الإفطار الأسود (', 'Active'),
(469, 'S5003', 'Tea Green Harmony Leaf 10oz', 'شاي أخضر (١٠ أونصة)', 'Active'),
(470, 'S5004', 'Tea Herbal Chamomile Pyramid 10oz', 'شاي البابونج (١٠ أون', 'Active'),
(471, 'S5005', 'Tea Herbal Cool Mint Pyramid 10oz', 'شاي نعناع (١٠ أونصة)', 'Active'),
(472, 'S5006', 'Tea Herbal Hibiscus Kiss Pyramid 10oz', 'شاي الكركديه (١٠ أون', 'Active'),
(473, 'S6001', 'Water.Tannourine Water Bottle 500 ml', 'مياه تنورين ٥٠٠ مل', 'Active'),
(474, 'S6002', 'Water.Hana Mineral Water Bottle 330 ml', 'مياه هنا ٣٣٠ مل', 'Active'),
(475, 'S6003', 'Water.Evian Water Bottle 500 ml', 'مياه إفيان ٥٠٠ مل', 'Active'),
(476, 'S6004', 'Juice.Organic orange juice 250ml', 'Juice.Organic orange', 'Active'),
(477, 'S6005', 'Juice.Organic apple juice 250ml', 'Juice.Organic apple', 'Active'),
(478, 'S6006', 'Juice.Organic pomegranate juice 250ml', 'Juice.Organic pomegr', 'Active'),
(479, 'S6007', 'Water.Nova Water Bottle 330 ml', 'Water.Nova Water Bot', 'Active'),
(480, 'S7001', 'Bagel Cream Cheese Plain', 'بيجل سادة ( كريمة ال', 'Active'),
(481, 'S7002', 'Bagel Cream Cheese Multigrain', 'بيجل شوفان (كريمة ال', 'Active'),
(482, 'S7003', 'Bagel Cream Cheese Cinnamon', 'بيجل قرفة (كريمة الج', 'Active'),
(483, 'S7004', 'Bagel Egg&Cheese Plain', 'بيجل سادة ( البيض و', 'Active'),
(484, 'S7005', 'Bagel Egg&Cheese Multigrain', 'بيجل شوفان (البيض و', 'Active'),
(485, 'S7006', 'Bagel Egg&Cheese Cinnamon', 'بيجل قرفة (البيض و ا', 'Active'),
(486, 'S7007', 'Bagel Double Cheese Plain', 'بيجل سادة (دوبل تشيز', 'Active'),
(487, 'S7008', 'Bagel Double Cheese Multigrain', 'بيجل شوفان (دوبل تشي', 'Active'),
(488, 'S7009', 'Bagel Double Cheese Cinnamon', 'بيجل قرفة (دوبل تشيز', 'Active'),
(489, 'S7010', 'Bagel Plain 6Pcs', 'بيجل سادة ( ٦ حبات)', 'Active'),
(490, 'S7011', 'Bagel Plain 12Pcs', 'بيجل سادة ( ۱۲حبات)', 'Active'),
(491, 'S7012', 'Bagel Multigrain 6Pcs', 'بيجل شوفان( ٦ حبات)', 'Active'),
(492, 'S7013', 'Bagel Multigrain 12Pcs', 'بيجل شوفان( ١٢ حبة)', 'Active'),
(493, 'S7014', 'Bagel Cinnamon 6 Pcs', 'بيجل قرفة ( ٦ حبات)', 'Active'),
(494, 'S7015', 'Bagel Cinnamon 12 Pcs', 'بيجل قرفة ( ١٢حبة)', 'Active'),
(495, 'S7016', 'Bagel Plain 1', 'بيجل سادة (١)', 'Active'),
(496, 'S7017', 'Bagel Multigrain 1', 'بيجل شوفان (١)', 'Active'),
(497, 'S7018', 'Bagel Cinnamon 1', 'بيجل قرفة (١)', 'Active'),
(498, 'S7019', 'Big N\' Toasty Cheese & Egg', 'Big N\' Toasty Cheese', 'Active'),
(499, 'S7021', 'Big n Toasty with Chicken', 'بيج اند توستي بالدجا', 'Active'),
(500, 'S7022', 'Labneh Pesto Toast', 'توست لبنة بيستو', 'Active'),
(501, 'S7023', 'Labneh Honey Toast', 'توست لبنة عسل', 'Active'),
(502, 'S7024', 'Choco Hazelnut Toast', 'توست شوكلاتة البندق', 'Active'),
(503, 'S7025', 'Pistachio Toast', 'Pistachio Toast', 'Active'),
(504, 'S7026', 'Toffee Toast', 'توست توفي', 'Active'),
(505, 'S7027', 'Saffron Toast', 'توست الزعفران', 'Active'),
(506, 'S7028', 'Water.Tannourine Water Bottle 330 ml', 'Water.Tannourine Wat', 'Active'),
(509, '94398756', 'test name', 'تجربه', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `status`) VALUES
(1, 'Test Company 1', 'Active'),
(2, 'Test Company 2', 'Active'),
(3, 'Lulu', 'Active'),
(4, 'Nesto', 'Active'),
(5, 'Farm SuperMarket  - Eastern', 'Active'),
(7, 'crayo', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `arabic` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `name`, `age`, `gender`, `city`, `emailid`, `arabic`) VALUES
(1, 'Vidhul', 32, 'Male', 'Thrissur', 'vidhul@crayotech.com', 0),
(2, 'Abdulrahman', 29, 'Male', 'RIyadh', 'Abdulrahman@crayotech.com', 0),
(3, 'Abdullah', 811, 'Male', 'Riyadh', 'abdulrahman@crayotech.com', 0),
(4, 'Abdulrahman@crayo.com', 29349, 'Male', 'الرياض', 'عبدالرحمن', 1),
(5, 'ABdulrahman ', 34, 'Femal', 'dldl', 'Email@cof.com', 0),
(6, 'xvdgdfg', 353, 'Male', 'sdgdfhdfh', 'bbbb@gmail.com', 0),
(7, 'sfsfsdf', 23, 'Male', 'asdasdfsf', 'bb@gmail.com', 0),
(8, 'sssss', 23, 'Male', 'ssssss', 'sss@gmail.com', 0),
(9, 'dfsdgfsdg', 34, 'Male', 'xcvdfgdfg', 'bb@gmail.com', 0),
(10, 'sfsdfsd', 23, 'Male', 'xvxcvxcv', 'vvv@gmail.com', 0),
(11, 'sfsdfsdf', 23, 'Male', 'sdfsdgfdsg', 'vvv@gmail.com', 0),
(12, 'sdfsdfsd', 34, 'Male', 'vxcvxcv', 'bb@gmail.com', 0),
(13, 'wrwerwe', 23, 'Male', 'sdfdsgdg', 'bb@gmail.com', 0),
(14, 'fsdfsdg', 34, 'Male', 'dfgdfgdfg', 'bb@gmail.com', 0),
(15, 'sfsdfsadf', 23, 'Male', 'asdasfs', 'vvv@gmail.com', 0),
(16, 'sdfsdfds', 23, 'Male', 'xcxvxcv', 'vvv@gmail.com', 0),
(17, 'asdasdas', 23, 'Male', 'czxczxc', 'vvv@gmail.com', 0),
(18, 'erterterw', 45, 'Male', 'vdgdfgdfg', 'bb@gmail.com', 0),
(19, 'weqwerwr', 23, 'Male', 'sdfsdfsd', 'vvv@gmail.com', 0),
(20, 'erwetrewt', 23, 'Male', 'sdfsdfgsdg', 'bbbb@gmail.com', 0),
(21, 'dgdsgdfg', 0, 'Femal', 'dfgdfgdf', 'dgdfg', 1),
(22, 'hgfhgfghf', 78, 'Male', 'hghjgjhg', 'bb@gmail.com', 0),
(23, 'erterte', 12, 'Male', '34', 'bb@gmail.com', 0),
(24, 'dgdgdf', 23, 'Male', 'sdfsdgdf', 'nnn@gmail.com', 0),
(25, 'sdfsdf', 0, 'Femal', 'sdfsdf', 'sdfsdf', 1),
(26, 'test', 24, 'Male', 'test', 'aA@s', 0),
(27, 'dfsdfsdg', 23, 'Male', 'dasdasf', 'bb@gmail.com', 0),
(28, 'a', 0, 'Male', 'a', 'aa@a', 0),
(29, 'asdasdfs', 23, 'Male', 'ddddd', 'bbbb@gmail.com', 0),
(30, 'qweqweq', 0, 'Male', 'qweqweqw', 'qweqwe', 1),
(31, 'werwrwer', 0, 'Male', 'werwerwe', 'werwerew', 1),
(32, 'asdasf', 23, 'Male', 'zxczxcxz', 'bb@gmail.com', 0),
(33, 'Rejilal', 12, 'Male', 'Thiruvananthapuram', 'rrejilal@gmail.com', 0),
(41, 'a@a', 0, 'Male', 't', 'test', 1),
(43, 'Vidhul', 32, 'Male', 'Thrissur', 'vidhul@crayotech.com', 0),
(44, 'sdgfdsgsd', 23, 'Male', 'zdfzxdf', 'dgdfgdfg@gmail.com', 0),
(45, 'Test', 24, 'Male', 'Thrissur', 'ajith@crayotech.com', 0),
(46, 'tesrt', 24, 'Male', 'tedt', 'A@a', 0),
(47, 'sarath', 31, 'Male', 'kasaragod', 'saratheriya3@gmail.com', 0),
(48, 'emailid', 23, 'Male', 'city', 'name', 1),
(49, 'ساراث', 0, 'Male', 'كاساراجود', 'saratheriya3@gmail.com', 1),
(50, 'fghfghfgh', 34534, 'Male', '345345435', 'bbb@gmail.com', 1),
(51, 'dgdg', 0, 'Male', 'rtyrtyrt', 'asdsafsdf@gmail.com', 1),
(52, 'RAJU', 12, 'Male', 'kasaragod', 'raju@gmailcom', 0),
(53, 'raja', -24, 'Male', 'kasaragod', 'raju@com', 1),
(54, 'ganga', 25, 'Femal', 'كاساراجود', 'ganga@gmail.com', 0),
(55, 'gayathri', 29, 'Femal', 'كاساراجود', 'saratheriya5@gmailcom', 0),
(56, 'yakoob', 29, 'Femal', 'kasaragod', 'yak.com@m', 0),
(57, 'ساراث', 23, 'Femal', 'كاساراجود', 'raju@gmailcom', 1),
(58, 'ساراث', 23, 'Femal', 'كاساراجود', 'raju@gmailcom', 1),
(59, 'sumayya', 29, 'Femal', 'كاساراجود', 'sumayya2548@yahoo.com', 1),
(60, 'عبدالرحمن', 11192, 'Male', 'الرياض', 'abdulrahman@crayotech.com', 1),
(61, 'Abdullah', 12, 'Male', 'Riyadh', 'ab@ajd.com', 0),
(62, 'عبدالرحمن', 12, 'Femal', 'issss', 'zero.jo20@hotmail.com', 0),
(63, 'عبدالرحمن', 24, 'Male', 'الرياض', 'zero.jo20@hotmail.com', 1),
(64, 'عبدالرحمن', 24, 'Male', 'الرياض', 'zero.jo20@hotmail.com', 1),
(65, 'عب', 21233, 'Male', 'الرياض', 'aa@jj.com', 1),
(66, 'ساراث', 0, 'Male', 'كاساراجود', 'raju@gmailcom', 1),
(67, 'rajiv', 1000, 'Male', 'kerala', 'raju@gmailcom', 0),
(68, 'tedt', 0, 'Male', 'kh', 'a@a', 1),
(69, 'jhk', 0, 'Male', 'X', 'aA@AS', 0),
(70, 'test', 24, 'Male', 'th', 'a@A', 0),
(71, 'hghjghjg', 67, 'Male', 'hjghjghjg', 'mmm@gmail.com', 0),
(72, 'ddddd', 12, 'Male', 'xxxxxx', 'dddd@gmail.com', 0),
(73, 'asdfasf', 0, 'Male', 'sdfsdfsdf', 'asdasd@gmail.com', 1),
(74, 'asdasdas', 0, 'Male', 'asdasdasd', 'asdasd@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerqrcode`
--

CREATE TABLE `customerqrcode` (
  `id` int(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `expiry_from` date NOT NULL,
  `expiry_to` date NOT NULL,
  `status` enum('Active','Inactive','Used') NOT NULL,
  `qty` varchar(225) NOT NULL,
  `storeid` int(11) NOT NULL,
  `questionnaireid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerqrcode`
--

INSERT INTO `customerqrcode` (`id`, `number`, `name`, `expiry_from`, `expiry_to`, `status`, `qty`, `storeid`, `questionnaireid`, `customerid`) VALUES
(1, '000001', 'Test', '2021-10-31', '2021-10-31', 'Used', '', 2, 21, 74),
(2, '000002', 'Abdulrahman Test', '2021-10-31', '2021-11-01', 'Used', '2', 20, 23, 0),
(3, '000003', 'Abdulrahman Test', '2021-10-31', '2021-11-01', 'Active', '', 20, 23, 0),
(4, '000004', 'A. Mohammed test 2', '2021-11-02', '2021-11-03', 'Used', '5', 21, 25, 64),
(5, '000005', 'A. Mohammed test 2', '2021-11-02', '2021-11-03', 'Active', '', 21, 25, 0),
(6, '000006', 'A. Mohammed test 2', '2021-11-02', '2021-11-03', 'Active', '', 21, 25, 0),
(7, '000007', 'A. Mohammed test 2', '2021-11-02', '2021-11-03', 'Used', '', 21, 25, 61),
(8, '000008', 'A. Mohammed test 2', '2021-11-02', '2021-11-03', 'Active', '', 21, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customerquestionsansw`
--

CREATE TABLE `customerquestionsansw` (
  `custquestionid` int(11) NOT NULL,
  `questiontitle` text NOT NULL,
  `answer` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `answeroptions` text DEFAULT NULL,
  `questionnaireid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `questid` int(11) NOT NULL,
  `custinput` text DEFAULT NULL,
  `custansweroptions` varchar(255) DEFAULT NULL,
  `arabic` int(11) NOT NULL DEFAULT 0,
  `storeid` int(11) NOT NULL,
  `noofstars` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerquestionsansw`
--

INSERT INTO `customerquestionsansw` (`custquestionid`, `questiontitle`, `answer`, `category`, `answeroptions`, `questionnaireid`, `customerid`, `questid`, `custinput`, `custansweroptions`, `arabic`, `storeid`, `noofstars`) VALUES
(1, 'Test question textbox Some?', '', 'textbox', '', 21, 1, 75, 'sdsadadad', 'sdsadadad', 0, 19, NULL),
(2, 'Test Question Checkbox?', 'Option22', 'checkbox', '[\"Option1\",\"Option2\"]', 21, 1, 76, NULL, '[\"Option1\"]', 0, 19, NULL),
(3, 'Test Question Radio button?', 'Male', 'radiobutton', '[\"Male\",\"Female\"]', 21, 1, 77, NULL, 'Male', 0, 19, NULL),
(4, 'Favorite Drink', 'test 9', 'checkbox', '[\"Original Coffee \",\"Decaf Coffee \",\"Dark Roast Coffee \",\"test 1\",\"test 2\",\"test 3\",\"test 4\",\"test 5\",\"test 6\",\"test 7\",\"test 8\",\"test 9\",\"test 10\"]', 23, 46, 81, NULL, '[\"test 2\",\"test 6\"]', 0, 20, NULL),
(5, 'comment', '', 'textbox', '', 23, 46, 82, '', '', 0, 20, NULL),
(6, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 23, 46, 83, NULL, 'Male', 0, 20, NULL),
(7, 'Rate our work', 'test', 'rating', '[\"Male\",\"Female \"]', 23, 46, 84, NULL, 'Male', 0, 20, '0'),
(8, 'dhfnj', '', 'textbox', '', 23, 46, 85, 'ok', 'ok', 0, 20, NULL),
(9, 'Favorite Drink', 'test 9', 'checkbox', '[\"Original Coffee \",\"Decaf Coffee \",\"Dark Roast Coffee \",\"test 1\",\"test 2\",\"test 3\",\"test 4\",\"test 5\",\"test 6\",\"test 7\",\"test 8\",\"test 9\",\"test 10\"]', 23, 2, 81, NULL, '[\"test 1\",\"test 3\"]', 0, 20, NULL),
(10, 'comment', '', 'textbox', '', 23, 2, 82, 'fgf', 'fgf', 0, 20, NULL),
(11, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 23, 2, 83, NULL, 'Male', 0, 20, NULL),
(12, 'Rate our work', 'test', 'rating', '[\"Male\",\"Female \"]', 23, 2, 84, NULL, 'Male', 0, 20, '4'),
(13, 'dhfnj', '', 'textbox', '', 23, 2, 85, 'gg', 'gg', 0, 20, NULL),
(14, 'Test question textbox Some?', '', 'textbox', '', 21, 3, 75, 'hsbs', 'hsbs', 0, 19, NULL),
(15, 'Test Question Checkbox?', 'Option22', 'checkbox', '[\"Option1\",\"Option2\"]', 21, 3, 76, NULL, '[\"Option2\"]', 0, 19, NULL),
(16, 'Test Question Radio button?', 'Male', 'radiobutton', '[\"Male\",\"Female\"]', 21, 3, 77, NULL, 'Male', 0, 19, NULL),
(17, 'مشروبك المفضل', 'تجربة 8 ', 'checkbox', '[]', 23, 4, 81, NULL, '[]', 1, 0, NULL),
(18, 'ملاحظات', '', 'textbox', '', 23, 4, 82, 'ffgg', 'ffgg', 1, 0, NULL),
(19, 'الجنس', '', 'radiobutton', '[\"\\u0630\\u0643\\u0631\",\"\\u0623\\u0646\\u062b\\u0649\"]', 23, 4, 83, NULL, 'ذكر', 1, 0, NULL),
(20, 'قييم عملنا', 'تجربه', 'rating', '[\"\\u0630\\u0643\\u0631\",\"\\u0623\\u0646\\u062b\\u0649\"]', 23, 4, 84, NULL, 'ذكر', 1, 0, '2'),
(21, 'ياليل', '', 'textbox', '', 23, 4, 85, 'vgd', 'vgd', 1, 0, NULL),
(22, 'Favorite Drink', 'test 9', 'checkbox', '[\"Original Coffee \",\"Decaf Coffee \",\"Dark Roast Coffee \",\"test 1\",\"test 2\",\"test 3\",\"test 4\",\"test 5\",\"test 6\",\"test 7\",\"test 8\",\"test 9\",\"test 10\"]', 23, 5, 81, NULL, '[\"test 2\"]', 0, 20, NULL),
(23, 'comment', '', 'textbox', '', 23, 5, 82, '', '', 0, 20, NULL),
(24, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 23, 5, 83, NULL, 'Female ', 0, 20, NULL),
(25, 'Rate our work', 'test', 'rating', '[\"Male\",\"Female \"]', 23, 5, 84, NULL, 'Female ', 0, 20, '2'),
(26, 'dhfnj', '', 'textbox', '', 23, 5, 85, 'ftt', 'ftt', 0, 20, NULL),
(27, 'Test question text box', '', 'textbox', '', 19, 6, 66, 'dfhfgh', 'dfhfgh', 0, 1, NULL),
(28, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 6, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(29, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 6, 68, NULL, 'option1', 0, 1, NULL),
(30, 'Test question text box', '', 'textbox', '', 19, 6, 66, 'dfhfgh', 'dfhfgh', 0, 1, NULL),
(31, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 6, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(32, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 6, 68, NULL, 'option1', 0, 1, NULL),
(33, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 7, 46, NULL, 'Thomas Alva Edison', 0, 1, NULL),
(34, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 7, 47, NULL, 'Jupiter', 0, 1, NULL),
(35, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 7, 48, NULL, 'Venus', 0, 1, NULL),
(36, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 7, 49, NULL, '[\"Violet\"]', 0, 1, NULL),
(37, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 7, 50, NULL, '[\"Original Coffee\"]', 0, 1, NULL),
(38, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 7, 51, 'werwer', 'werwer', 0, 1, NULL),
(39, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 7, 52, NULL, '[]', 0, 1, NULL),
(40, 'What is your annual household income?', '', 'textbox', '', 17, 7, 53, 'sdfsdfs', 'sdfsdfs', 0, 1, NULL),
(41, 'What is your employment status?', '', 'textbox', '', 17, 7, 54, '', '', 0, 1, NULL),
(42, 'Performance of store', 'High Quality', 'rating', '', 17, 7, 79, NULL, '', 0, 1, '0'),
(43, 'Quality of service', 'Good', 'rating', '', 17, 7, 80, NULL, '', 0, 1, '0'),
(44, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 8, 46, NULL, 'Thomas Alva Edison', 0, 1, NULL),
(45, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 8, 47, NULL, 'Jupiter', 0, 1, NULL),
(46, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 8, 48, NULL, 'Venus', 0, 1, NULL),
(47, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 8, 49, NULL, '[]', 0, 1, NULL),
(48, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 8, 50, NULL, '[]', 0, 1, NULL),
(49, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 8, 51, 'asdasdas', 'asdasdas', 0, 1, NULL),
(50, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 8, 52, NULL, '[]', 0, 1, NULL),
(51, 'What is your annual household income?', '', 'textbox', '', 17, 8, 53, 'asdasd', 'asdasd', 0, 1, NULL),
(52, 'What is your employment status?', '', 'textbox', '', 17, 8, 54, 'asdasdasd', 'asdasdasd', 0, 1, NULL),
(53, 'Performance of store', 'High Quality', 'rating', '', 17, 8, 79, NULL, 'asdasdasd', 0, 1, '0'),
(54, 'Quality of service', 'Good', 'rating', '', 17, 8, 80, NULL, 'asdasdasd', 0, 1, '0'),
(55, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 8, 46, NULL, 'Thomas Alva Edison', 0, 1, NULL),
(56, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 8, 47, NULL, 'Jupiter', 0, 1, NULL),
(57, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 8, 48, NULL, 'Venus', 0, 1, NULL),
(58, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 8, 49, NULL, '[\"Violet\",\"Black\"]', 0, 1, NULL),
(59, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 8, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\"]', 0, 1, NULL),
(60, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 8, 51, 'qwqweq', 'qwqweq', 0, 1, NULL),
(61, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 8, 52, NULL, '[\"laptop\"]', 0, 1, NULL),
(62, 'What is your annual household income?', '', 'textbox', '', 17, 8, 53, 'adadsasd', 'adadsasd', 0, 1, NULL),
(63, 'What is your employment status?', '', 'textbox', '', 17, 8, 54, 'asdasdas', 'asdasdas', 0, 1, NULL),
(64, 'Performance of store', 'High Quality', 'rating', '', 17, 8, 79, NULL, 'asdasdas', 0, 1, '1'),
(65, 'Quality of service', 'Good', 'rating', '', 17, 8, 80, NULL, 'asdasdas', 0, 1, '1'),
(66, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 8, 46, NULL, 'Thomas Alva Edison', 0, 1, NULL),
(67, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 8, 47, NULL, 'Jupiter', 0, 1, NULL),
(68, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 8, 48, NULL, 'Venus', 0, 1, NULL),
(69, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 8, 49, NULL, '[\"Violet\",\"Black\"]', 0, 1, NULL),
(70, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 8, 50, NULL, '[]', 0, 1, NULL),
(71, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 8, 51, 'wwrw', 'wwrw', 0, 1, NULL),
(72, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 8, 52, NULL, '[\"laptop\"]', 0, 1, NULL),
(73, 'What is your annual household income?', '', 'textbox', '', 17, 8, 53, 'asdasd', 'asdasd', 0, 1, NULL),
(74, 'What is your employment status?', '', 'textbox', '', 17, 8, 54, 'asfsdfsdf', 'asfsdfsdf', 0, 1, NULL),
(75, 'Performance of store', 'High Quality', 'rating', '', 17, 8, 79, NULL, 'asfsdfsdf', 0, 1, '1'),
(76, 'Quality of service', 'Good', 'rating', '', 17, 8, 80, NULL, 'asfsdfsdf', 0, 1, '1'),
(77, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 9, 56, NULL, 'Seven', 0, 1, NULL),
(78, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 9, 57, NULL, '365', 0, 1, NULL),
(79, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 9, 58, NULL, '7', 0, 1, NULL),
(80, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 9, 59, NULL, 'Camel', 0, 1, NULL),
(81, 'Who your target market is?', '', 'textbox', '', 18, 9, 60, 'dfgdfgd', 'dfgdfgd', 0, 1, NULL),
(82, 'How you should price your products?', '', 'textbox', '', 18, 9, 61, 'dfgdf', 'dfgdf', 0, 1, NULL),
(83, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 9, 62, 'gdfgdsfgdfg', 'gdfgdsfgdfg', 0, 1, NULL),
(84, 'Why visitors leave your website?', '', 'textbox', '', 18, 9, 63, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(85, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 9, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(86, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 9, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(87, 'Test question text box', '', 'textbox', '', 19, 10, 66, 'sdfsdf', 'sdfsdf', 0, 1, NULL),
(88, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 10, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(89, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 10, 68, NULL, 'option1', 0, 1, NULL),
(90, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 11, 56, NULL, 'Seven', 0, 1, NULL),
(91, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 11, 57, NULL, '365', 0, 1, NULL),
(92, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 11, 58, NULL, '7', 0, 1, NULL),
(93, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 11, 59, NULL, 'Camel', 0, 1, NULL),
(94, 'Who your target market is?', '', 'textbox', '', 18, 11, 60, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(95, 'How you should price your products?', '', 'textbox', '', 18, 11, 61, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(96, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 11, 62, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(97, 'Why visitors leave your website?', '', 'textbox', '', 18, 11, 63, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(98, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 11, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(99, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 11, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(100, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 12, 56, NULL, 'Seven', 0, 1, NULL),
(101, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 12, 57, NULL, '365', 0, 1, NULL),
(102, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 12, 58, NULL, '7', 0, 1, NULL),
(103, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 12, 59, NULL, 'Camel', 0, 1, NULL),
(104, 'Who your target market is?', '', 'textbox', '', 18, 12, 60, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(105, 'How you should price your products?', '', 'textbox', '', 18, 12, 61, 'dgdfgdfg', 'dgdfgdfg', 0, 1, NULL),
(106, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 12, 62, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(107, 'Why visitors leave your website?', '', 'textbox', '', 18, 12, 63, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(108, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 12, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(109, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 12, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(110, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 13, 56, NULL, 'Seven', 0, 1, NULL),
(111, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 13, 57, NULL, '365', 0, 1, NULL),
(112, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 13, 58, NULL, '7', 0, 1, NULL),
(113, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 13, 59, NULL, 'Camel', 0, 1, NULL),
(114, 'Who your target market is?', '', 'textbox', '', 18, 13, 60, 'gdfgdfg', 'gdfgdfg', 0, 1, NULL),
(115, 'How you should price your products?', '', 'textbox', '', 18, 13, 61, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(116, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 13, 62, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(117, 'Why visitors leave your website?', '', 'textbox', '', 18, 13, 63, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(118, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 13, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(119, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 13, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(120, 'Test question text box', '', 'textbox', '', 19, 14, 66, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(121, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 14, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(122, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 14, 68, NULL, 'option1', 0, 1, NULL),
(123, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 15, 56, NULL, 'Seven', 0, 1, NULL),
(124, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 15, 57, NULL, '365', 0, 1, NULL),
(125, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 15, 58, NULL, '7', 0, 1, NULL),
(126, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 15, 59, NULL, 'Dog', 0, 1, NULL),
(127, 'Who your target market is?', '', 'textbox', '', 18, 15, 60, 'sdfsdf', 'sdfsdf', 0, 1, NULL),
(128, 'How you should price your products?', '', 'textbox', '', 18, 15, 61, 'dsfsdfsdf', 'dsfsdfsdf', 0, 1, NULL),
(129, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 15, 62, 'sdfsdf', 'sdfsdf', 0, 1, NULL),
(130, 'Why visitors leave your website?', '', 'textbox', '', 18, 15, 63, 'sfsdfdsf', 'sfsdfdsf', 0, 1, NULL),
(131, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 15, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(132, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 15, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(133, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 16, 56, NULL, 'Seven', 0, 1, NULL),
(134, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 16, 57, NULL, '365', 0, 1, NULL),
(135, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 16, 58, NULL, '7', 0, 1, NULL),
(136, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 16, 59, NULL, 'Camel', 0, 1, NULL),
(137, 'Who your target market is?', '', 'textbox', '', 18, 16, 60, 'dfgdfgdfg', 'dfgdfgdfg', 0, 1, NULL),
(138, 'How you should price your products?', '', 'textbox', '', 18, 16, 61, 'dfgdfg', 'dfgdfg', 0, 1, NULL),
(139, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 16, 62, 'dfgdgdfg', 'dfgdgdfg', 0, 1, NULL),
(140, 'Why visitors leave your website?', '', 'textbox', '', 18, 16, 63, 'dfgdsfgdfg', 'dfgdsfgdfg', 0, 1, NULL),
(141, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 16, 64, NULL, '[\"Chrome\",\"Safari\"]', 0, 1, NULL),
(142, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 16, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(143, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 17, 56, NULL, 'Seven', 0, 1, NULL),
(144, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 17, 57, NULL, '365', 0, 1, NULL),
(145, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 17, 58, NULL, '7', 0, 1, NULL),
(146, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 17, 59, NULL, 'Camel', 0, 1, NULL),
(147, 'Who your target market is?', '', 'textbox', '', 18, 17, 60, 'sfsdf', 'sfsdf', 0, 1, NULL),
(148, 'How you should price your products?', '', 'textbox', '', 18, 17, 61, 'sdfsdfadsf', 'sdfsdfadsf', 0, 1, NULL),
(149, 'What is stopping people from buying from you?', '', 'textbox', '', 18, 17, 62, 'sdfsdf', 'sdfsdf', 0, 1, NULL),
(150, 'Why visitors leave your website?', '', 'textbox', '', 18, 17, 63, 'sfsdfsdf', 'sfsdfsdf', 0, 1, NULL),
(151, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 17, 64, NULL, '[\"Chrome\"]', 0, 1, NULL),
(152, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 17, 65, NULL, 'Very dissatisfied', 0, 1, NULL),
(153, 'Favorite Drink', 'test 9', 'checkbox', '[\"Original Coffee \",\"Decaf Coffee \",\"Dark Roast Coffee \",\"test 1\",\"test 2\",\"test 3\",\"test 4\",\"test 5\",\"test 6\",\"test 7\",\"test 8\",\"test 9\",\"test 10\"]', 23, 18, 81, NULL, '[\"Original Coffee \",\"Decaf Coffee \"]', 0, 20, NULL),
(154, 'comment', '', 'textbox', '', 23, 18, 82, '', '', 0, 20, NULL),
(155, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 23, 18, 83, NULL, 'Male', 0, 20, NULL),
(156, 'Rate our work', 'test', 'rating', '[\"Male\",\"Female \"]', 23, 18, 84, NULL, 'Male', 0, 20, '1'),
(157, 'dhfnj', '', 'textbox', '', 23, 18, 85, 'dfgdfgdfg', 'dfgdfgdfg', 0, 20, NULL),
(158, 'Test question text box', '', 'textbox', '', 19, 19, 66, 'sdfsdfsdf', 'sdfsdfsdf', 0, 1, NULL),
(159, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 19, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(160, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 19, 68, NULL, 'option1', 0, 1, NULL),
(161, 'Test question text box', '', 'textbox', '', 19, 20, 66, 'werwet', 'werwet', 0, 1, NULL),
(162, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 20, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(163, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 20, 68, NULL, 'option1', 0, 1, NULL),
(164, '', '', 'textbox', '', 19, 21, 66, 'dgdgdfgdfg', 'dgdgdfgdfg', 1, 0, NULL),
(165, '', '', 'checkbox', '[]', 19, 21, 67, NULL, '[]', 1, 0, NULL),
(166, '', '', 'radiobutton', '[]', 19, 21, 68, NULL, NULL, 1, 0, NULL),
(167, 'Test question text box', '', 'textbox', '', 19, 22, 66, 'jhgkjgjgjkh', 'jhgkjgjgjkh', 0, 1, NULL),
(168, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 22, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(169, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 22, 68, NULL, 'option1', 0, 1, NULL),
(170, 'Test question text box', '', 'textbox', '', 19, 24, 66, 'dfhdfhdf', 'dfhdfhdf', 0, 1, NULL),
(171, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 24, 67, NULL, '[\"option1\"]', 0, 1, NULL),
(172, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 24, 68, NULL, 'option1', 0, 1, NULL),
(173, '', '', 'textbox', '', 19, 25, 66, 'dfsdfsdfsdf', 'dfsdfsdfsdf', 1, 0, NULL),
(174, '', '', 'checkbox', '[]', 19, 25, 67, NULL, '[]', 1, 0, NULL),
(175, '', '', 'radiobutton', '[]', 19, 25, 68, NULL, NULL, 1, 0, NULL),
(176, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 29, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(177, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 29, 47, NULL, 'Jupiter', 0, 1, ''),
(178, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 29, 48, NULL, 'Venus', 0, 1, ''),
(179, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 29, 49, NULL, '[\"Violet\",\"Black\"]', 0, 1, ''),
(180, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 29, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\"]', 0, 1, ''),
(181, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 29, 51, 'sqw', 'sqw', 0, 1, ''),
(182, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 29, 52, NULL, '[\"laptop\"]', 0, 1, ''),
(183, 'What is your annual household income?', '', 'textbox', '', 17, 29, 53, 'qw', 'qw', 0, 1, ''),
(184, 'What is your employment status?', '', 'textbox', '', 17, 29, 54, '', '', 0, 1, ''),
(185, 'Performance of store', 'High Quality', 'rating', '[]', 17, 29, 79, NULL, '', 0, 1, '[\"2\"]'),
(186, 'Quality of service', 'Good', 'rating', '[]', 17, 29, 80, NULL, '', 0, 1, '[\"2\"]'),
(187, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 29, 86, NULL, '', 0, 1, '[\"3\",\"4\",\"5\"]'),
(188, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 30, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(189, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 30, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(190, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 30, 48, NULL, 'Venus Arabic', 1, 0, ''),
(191, '', '', 'checkbox', '[]', 17, 30, 49, NULL, '[]', 1, 0, ''),
(192, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 30, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\"]', 1, 0, ''),
(193, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 30, 51, 'qweqwe', 'qweqwe', 1, 0, ''),
(194, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 30, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(195, '', '', 'textbox', '', 17, 30, 53, 'wqeqweqw', 'wqeqweqw', 1, 0, ''),
(196, 'What is your employment status arabic?', '', 'textbox', '', 17, 30, 54, 'wewewqe', 'wewewqe', 1, 0, ''),
(197, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 30, 79, NULL, '', 1, 0, '[\"2\"]'),
(198, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 30, 80, NULL, '', 1, 0, '[\"2\"]'),
(199, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 30, 86, NULL, '', 1, 0, '[\"3\",\"4\",\"4\"]'),
(200, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 31, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(201, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 31, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(202, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 31, 48, NULL, 'Venus Arabic', 1, 0, ''),
(203, '', '', 'checkbox', '[]', 17, 31, 49, NULL, '[]', 1, 0, ''),
(204, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 31, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\"]', 1, 0, ''),
(205, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 31, 51, 'ghfhgfhfh', 'ghfhgfhfh', 1, 0, ''),
(206, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 31, 52, NULL, '[\"laptop arabic\"]', 1, 0, ''),
(207, '', '', 'textbox', '', 17, 31, 53, 'hjghjghjgjh', 'hjghjghjgjh', 1, 0, ''),
(208, 'What is your employment status arabic?', '', 'textbox', '', 17, 31, 54, 'jghgjhghjghj', 'jghgjhghjghj', 1, 0, ''),
(209, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 31, 79, NULL, '', 1, 0, '[\"2\"]'),
(210, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 31, 80, NULL, '', 1, 0, '[\"3\"]'),
(211, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 31, 86, NULL, '', 1, 0, '[\"3\",\"3\",\"4\"]'),
(212, 'What is a cell?', '', 'textbox', '', 24, 32, 87, 'Smallest unit of body', 'Smallest unit of body', 0, 1, ''),
(213, 'Largest Animal?', 'Giraff', 'radiobutton', '[\"Giraff\",\"Dog\"]', 24, 32, 88, NULL, 'Giraff', 0, 1, ''),
(214, 'How is our store?', '', 'rating', '[\"Good\",\"Average\"]', 24, 32, 89, NULL, '', 0, 1, '[\"3\",\"1\"]'),
(227, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 45, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(228, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 45, 47, NULL, 'Mars', 0, 1, ''),
(229, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 45, 48, NULL, 'Venus', 0, 1, ''),
(230, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 45, 49, NULL, '[\"Violet\",\"Blue\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 0, 1, ''),
(231, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 45, 50, NULL, '[\"Original Coffee\"]', 0, 1, ''),
(232, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 45, 51, 'D', 'D', 0, 1, ''),
(233, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 45, 52, NULL, '[\"phone\"]', 0, 1, ''),
(234, 'What is your annual household income?', '', 'textbox', '', 17, 45, 53, '1', '1', 0, 1, ''),
(235, 'What is your employment status?', '', 'textbox', '', 17, 45, 54, 'D', 'D', 0, 1, ''),
(236, 'Performance of store', 'High Quality', 'rating', '[]', 17, 45, 79, NULL, '', 0, 1, '[\"5\"]'),
(237, 'Quality of service', 'Good', 'rating', '[]', 17, 45, 80, NULL, '', 0, 1, '[\"5\"]'),
(238, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 45, 86, NULL, '', 0, 1, '[\"5\",\"0\",\"0\"]'),
(239, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 48, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(240, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 48, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(241, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 48, 48, NULL, 'Venus Arabic', 1, 0, ''),
(242, '', '', 'checkbox', '[]', 17, 48, 49, NULL, '[]', 1, 0, ''),
(243, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 48, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\"]', 1, 0, ''),
(244, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 48, 51, 'dsgsdgd', 'dsgsdgd', 1, 0, ''),
(245, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 48, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(246, '', '', 'textbox', '', 17, 48, 53, 'gdfgdfg', 'gdfgdfg', 1, 0, ''),
(247, 'What is your employment status arabic?', '', 'textbox', '', 17, 48, 54, 'dfgdfgdfg', 'dfgdfgdfg', 1, 0, ''),
(248, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 48, 79, NULL, '', 1, 0, '[\"1\"]'),
(249, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 48, 80, NULL, '', 1, 0, '[\"1\"]'),
(250, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 48, 86, NULL, '', 1, 0, '[\"1\",\"1\",\"1\"]'),
(251, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 47, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(252, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 47, 47, NULL, 'Mars', 0, 1, ''),
(253, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 47, 48, NULL, 'Venus', 0, 1, ''),
(254, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 47, 49, NULL, '[\"Violet\",\"Blue\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 0, 1, ''),
(255, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 47, 50, NULL, '[\"Original Coffee\"]', 0, 1, ''),
(256, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 47, 51, 'crayotech develouper', 'crayotech develouper', 0, 1, ''),
(257, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 47, 52, NULL, '[\"laptop\"]', 0, 1, ''),
(258, 'What is your annual household income?', '', 'textbox', '', 17, 47, 53, '0', '0', 0, 1, ''),
(259, 'What is your employment status?', '', 'textbox', '', 17, 47, 54, 'employed', 'employed', 0, 1, ''),
(260, 'Performance of store', 'High Quality', 'rating', '[]', 17, 47, 79, NULL, '', 0, 1, '[\"3\"]'),
(261, 'Quality of service', 'Good', 'rating', '[]', 17, 47, 80, NULL, '', 0, 1, '[\"4\"]'),
(262, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 47, 86, NULL, '', 0, 1, '[\"4\",\"2\",\"3\"]'),
(263, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 50, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(264, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 50, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(265, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 50, 48, NULL, 'Venus Arabic', 1, 0, ''),
(266, '', '', 'checkbox', '[]', 17, 50, 49, NULL, '[]', 1, 0, ''),
(267, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 50, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\"]', 1, 0, ''),
(268, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 50, 51, 'fgdfgdfg', 'fgdfgdfg', 1, 0, ''),
(269, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 50, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(270, '', '', 'textbox', '', 17, 50, 53, 'fgdfgfdg', 'fgdfgfdg', 1, 0, ''),
(271, 'What is your employment status arabic?', '', 'textbox', '', 17, 50, 54, 'fgfdgfg', 'fgfdgfg', 1, 0, ''),
(272, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 50, 79, NULL, '', 1, 0, '[\"0\"]'),
(273, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 50, 80, NULL, '', 1, 0, '[\"0\"]'),
(274, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 50, 86, NULL, '', 1, 0, '[\"0\",\"0\",\"0\"]'),
(275, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 49, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(276, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 49, 47, NULL, 'Mars Arabic', 1, 0, ''),
(277, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 49, 48, NULL, 'Venus Arabic', 1, 0, ''),
(278, '', '', 'checkbox', '[]', 17, 49, 49, NULL, '[]', 1, 0, ''),
(279, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 49, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\"]', 1, 0, ''),
(280, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 49, 51, 'الإمارات العربية المتحدة', 'الإمارات العربية المتحدة', 1, 0, ''),
(281, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 49, 52, NULL, '[\"laptop arabic\"]', 1, 0, ''),
(282, '', '', 'textbox', '', 17, 49, 53, 'يزور', 'يزور', 1, 0, ''),
(283, 'What is your employment status arabic?', '', 'textbox', '', 17, 49, 54, 'good', 'good', 1, 0, ''),
(284, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 49, 79, NULL, '', 1, 0, '[\"3\"]'),
(285, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 49, 80, NULL, '', 1, 0, '[\"0\"]'),
(286, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 49, 86, NULL, '', 1, 0, '[\"3\",\"4\",\"4\"]'),
(287, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 52, 46, NULL, 'Newton', 0, 1, ''),
(288, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 52, 47, NULL, 'Jupiter', 0, 1, ''),
(289, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 52, 48, NULL, 'Earth', 0, 1, ''),
(290, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 52, 49, NULL, '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 0, 1, ''),
(291, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 52, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 0, 1, ''),
(292, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 52, 51, 'u.a.e operator', 'u.a.e operator', 0, 1, ''),
(293, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 52, 52, NULL, '[\"laptop\",\"phone\"]', 0, 1, ''),
(294, 'What is your annual household income?', '', 'textbox', '', 17, 52, 53, '10000', '10000', 0, 1, ''),
(295, 'What is your employment status?', '', 'textbox', '', 17, 52, 54, '', '', 0, 1, ''),
(296, 'Performance of store', 'High Quality', 'rating', '[]', 17, 52, 79, NULL, '', 0, 1, '[\"5\"]'),
(297, 'Quality of service', 'Good', 'rating', '[]', 17, 52, 80, NULL, '', 0, 1, '[\"5\"]'),
(298, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 52, 86, NULL, '', 0, 1, '[\"5\",\"5\",\"5\"]'),
(299, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 53, 46, NULL, 'Newton Arabic', 1, 0, ''),
(300, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 53, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(301, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 53, 48, NULL, 'Venus Arabic', 1, 0, ''),
(302, '', '', 'checkbox', '[]', 17, 53, 49, NULL, '[]', 1, 0, ''),
(303, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 53, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 1, 0, ''),
(304, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 53, 51, 'kanyakumar,visitor', 'kanyakumar,visitor', 1, 0, ''),
(305, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 53, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(306, '', '', 'textbox', '', 17, 53, 53, 'visit', 'visit', 1, 0, ''),
(307, 'What is your employment status arabic?', '', 'textbox', '', 17, 53, 54, '', '', 1, 0, ''),
(308, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 53, 79, NULL, '', 1, 0, '[\"0\"]'),
(309, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 53, 80, NULL, '', 1, 0, '[\"0\"]'),
(310, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 53, 86, NULL, '', 1, 0, '[\"0\",\"0\",\"0\"]'),
(311, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 54, 46, NULL, NULL, 0, 1, ''),
(312, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 54, 47, NULL, 'Jupiter', 0, 1, ''),
(313, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 54, 48, NULL, 'Earth', 0, 1, ''),
(314, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 54, 49, NULL, '[\"Violet\"]', 0, 1, ''),
(315, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 54, 50, NULL, '[\"Latte\"]', 0, 1, ''),
(316, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 54, 51, 'United Arab Emirates Teacher', 'United Arab Emirates Teacher', 0, 1, ''),
(317, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 54, 52, NULL, '[]', 0, 1, ''),
(318, 'What is your annual household income?', '', 'textbox', '', 17, 54, 53, '12300', '12300', 0, 1, ''),
(319, 'What is your employment status?', '', 'textbox', '', 17, 54, 54, '', '', 0, 1, ''),
(320, 'Performance of store', 'High Quality', 'rating', '[]', 17, 54, 79, NULL, '', 0, 1, '[\"1\"]'),
(321, 'Quality of service', 'Good', 'rating', '[]', 17, 54, 80, NULL, '', 0, 1, '[\"1\"]'),
(322, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 54, 86, NULL, '', 0, 1, '[\"1\",\"1\",\"1\"]'),
(323, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 55, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(324, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 55, 47, NULL, 'Jupiter', 0, 1, ''),
(325, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 55, 48, NULL, 'Venus', 0, 1, ''),
(326, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 55, 49, NULL, '[]', 0, 1, ''),
(327, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 55, 50, NULL, '[]', 0, 1, ''),
(328, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 55, 51, '1234', '1234', 0, 1, ''),
(329, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 55, 52, NULL, '[\"laptop\",\"phone\"]', 0, 1, ''),
(330, 'What is your annual household income?', '', 'textbox', '', 17, 55, 53, 'ten thousand', 'ten thousand', 0, 1, ''),
(331, 'What is your employment status?', '', 'textbox', '', 17, 55, 54, '', '', 0, 1, ''),
(332, 'Performance of store', 'High Quality', 'rating', '[]', 17, 55, 79, NULL, '', 0, 1, '[\"0\"]'),
(333, 'Quality of service', 'Good', 'rating', '[]', 17, 55, 80, NULL, '', 0, 1, '[\"0\"]'),
(334, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 55, 86, NULL, '', 0, 1, '[\"0\",\"0\",\"0\"]'),
(335, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 58, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(336, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 58, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(337, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 58, 48, NULL, 'Venus Arabic', 1, 0, ''),
(338, '', '', 'checkbox', '[]', 17, 58, 49, NULL, '[]', 1, 0, ''),
(339, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 58, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 1, 0, ''),
(340, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 58, 51, 'jjj', 'jjj', 1, 0, ''),
(341, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 58, 52, NULL, '[\"laptop arabic\"]', 1, 0, ''),
(342, '', '', 'textbox', '', 17, 58, 53, 'kkk', 'kkk', 1, 0, ''),
(343, 'What is your employment status arabic?', '', 'textbox', '', 17, 58, 54, '', '', 1, 0, ''),
(344, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 58, 79, NULL, '', 1, 0, '[\"0\"]'),
(345, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 58, 80, NULL, '', 1, 0, '[\"0\"]'),
(346, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 58, 86, NULL, '', 1, 0, '[\"0\",\"0\",\"0\"]'),
(347, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 59, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(348, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 59, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(349, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 59, 48, NULL, 'Earth Arabic', 1, 0, ''),
(350, '', '', 'checkbox', '[]', 17, 59, 49, NULL, '[]', 1, 0, ''),
(351, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 59, 50, NULL, '[\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\"]', 1, 0, ''),
(352, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 59, 51, 'uae fabricpainter', 'uae fabricpainter', 1, 0, ''),
(353, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 59, 52, NULL, '[\"laptop arabic\"]', 1, 0, ''),
(354, '', '', 'textbox', '', 17, 59, 53, 'visit', 'visit', 1, 0, ''),
(355, 'What is your employment status arabic?', '', 'textbox', '', 17, 59, 54, '', '', 1, 0, ''),
(356, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 59, 79, NULL, '', 1, 0, '[\"3\"]'),
(357, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 59, 80, NULL, '', 1, 0, '[\"3\"]'),
(358, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 59, 86, NULL, '', 1, 0, '[\"4\",\"5\",\"5\"]'),
(359, 'كيف تشعر الان ؟', 'عادي', 'checkbox', '[\"\\u062d\\u0632\\u064a\\u0646\",\"\\u0645\\u062a\\u0639\\u0628\",\"\\u0639\\u0627\\u062f\\u064a\",\"\\u0633\\u0639\\u064a\\u062f\"]', 25, 60, 90, NULL, '[]', 1, 0, ''),
(360, 'قييم ابتسامتك', '', 'rating', '[\"\\u0633\\u0639\\u064a\\u062f1\",\"\\u0633\\u0639\\u064a\\u062f2\",\"\\u0633\\u0639\\u064a\\u062f3\",\"\\u0633\\u0639\\u064a\\u062f4\",\"\\u0633\\u0639\\u064a\\u062f5\"]', 25, 60, 91, NULL, '', 1, 0, '[\"4\",\"3\",\"5\",\"4\",\"3\"]'),
(361, 'عمرك', 'فوق 30', 'radiobutton', '[\"\\u062a\\u062d\\u062a (15)\",\"\\u0645\\u0627\\u0628\\u064a\\u0646  (15-30)\",\"\\u0641\\u0648\\u0642 30\"]', 25, 60, 92, NULL, 'مابين  (15-30)', 1, 0, ''),
(362, 'ملاحظتك', '', 'textbox', '', 25, 60, 93, '', '', 1, 0, ''),
(363, 'How you are feeling?', 'normal', 'checkbox', '[\"SAD\",\"Tired \",\"Normal \",\"Happy\"]', 25, 61, 90, NULL, '[\"Tired \"]', 0, 21, ''),
(364, 'Rate your smile ', '', 'rating', '[\"Happy1\",\"happy2\",\"Happy3\",\"Happy4\",\"Happy5\"]', 25, 61, 91, NULL, '', 0, 21, '[\"0\",\"0\",\"3\",\"0\",\"0\"]'),
(365, 'Your Old', 'Above 30', 'radiobutton', '[\"under (15)\",\"between (15-30)\",\"Above 30\"]', 25, 61, 92, NULL, 'between (15-30)', 0, 21, ''),
(366, 'Remarks ', '', 'textbox', '', 25, 61, 93, '', '', 0, 21, ''),
(367, 'How you are feeling?', 'normal', 'checkbox', '[\"SAD\",\"Tired \",\"Normal \",\"Happy\"]', 25, 61, 90, NULL, '[\"Tired \"]', 0, 21, ''),
(368, 'Rate your smile ', '', 'rating', '[\"Happy1\",\"happy2\",\"Happy3\",\"Happy4\",\"Happy5\"]', 25, 61, 91, NULL, '', 0, 21, '[\"0\",\"0\",\"3\",\"0\",\"0\"]'),
(369, 'Your Old', 'Above 30', 'radiobutton', '[\"under (15)\",\"between (15-30)\",\"Above 30\"]', 25, 61, 92, NULL, 'between (15-30)', 0, 21, ''),
(370, 'Remarks ', '', 'textbox', '', 25, 61, 93, '', '', 0, 21, ''),
(371, 'How you are feeling?', 'normal', 'checkbox', '[\"SAD\",\"Tired \",\"Normal \",\"Happy\"]', 25, 61, 90, NULL, '[\"Tired \"]', 0, 21, ''),
(372, 'Rate your smile ', '', 'rating', '[\"Happy1\",\"happy2\",\"Happy3\",\"Happy4\",\"Happy5\"]', 25, 61, 91, NULL, '', 0, 21, '[\"0\",\"0\",\"3\",\"0\",\"0\"]');
INSERT INTO `customerquestionsansw` (`custquestionid`, `questiontitle`, `answer`, `category`, `answeroptions`, `questionnaireid`, `customerid`, `questid`, `custinput`, `custansweroptions`, `arabic`, `storeid`, `noofstars`) VALUES
(373, 'Your Old', 'Above 30', 'radiobutton', '[\"under (15)\",\"between (15-30)\",\"Above 30\"]', 25, 61, 92, NULL, 'between (15-30)', 0, 21, ''),
(374, 'Remarks ', '', 'textbox', '', 25, 61, 93, '', '', 0, 21, ''),
(375, 'How you are feeling?', 'normal', 'checkbox', '[\"SAD\",\"Tired \",\"Normal \",\"Happy\"]', 25, 62, 90, NULL, '[]', 0, 21, ''),
(376, 'Rate your smile ', '', 'rating', '[\"Happy1\",\"happy2\",\"Happy3\",\"Happy4\",\"Happy5\"]', 25, 62, 91, NULL, '', 0, 21, '[\"0\",\"0\",\"0\",\"0\",\"0\"]'),
(377, 'Your Old', 'Above 30', 'radiobutton', '[\"under (15)\",\"between (15-30)\",\"Above 30\"]', 25, 62, 92, NULL, 'under (15)', 0, 21, ''),
(378, 'كيف تشعر الان ؟', 'عادي', 'checkbox', '[\"\\u062d\\u0632\\u064a\\u0646\",\"\\u0645\\u062a\\u0639\\u0628\",\"\\u0639\\u0627\\u062f\\u064a\",\"\\u0633\\u0639\\u064a\\u062f\"]', 25, 63, 90, NULL, '[]', 1, 0, ''),
(379, 'قييم ابتسامتك', '', 'rating', '[\"\\u0633\\u0639\\u064a\\u062f1\",\"\\u0633\\u0639\\u064a\\u062f2\",\"\\u0633\\u0639\\u064a\\u062f3\",\"\\u0633\\u0639\\u064a\\u062f4\",\"\\u0633\\u0639\\u064a\\u062f5\"]', 25, 63, 91, NULL, '', 1, 0, '[\"0\",\"0\",\"0\",\"0\",\"0\"]'),
(380, 'عمرك', 'فوق 30', 'radiobutton', '[\"\\u062a\\u062d\\u062a (15)\",\"\\u0645\\u0627\\u0628\\u064a\\u0646  (15-30)\",\"\\u0641\\u0648\\u0642 30\"]', 25, 63, 92, NULL, 'فوق 30', 1, 0, ''),
(381, 'ماهي السعادة', '', 'textbox', '', 25, 63, 94, 'hm', 'hm', 1, 0, ''),
(382, 'كيف تشعر الان ؟', 'عادي', 'checkbox', '[\"\\u062d\\u0632\\u064a\\u0646\",\"\\u0645\\u062a\\u0639\\u0628\",\"\\u0639\\u0627\\u062f\\u064a\",\"\\u0633\\u0639\\u064a\\u062f\"]', 25, 64, 90, NULL, '[\"\\u062d\\u0632\\u064a\\u0646\",\"\\u0645\\u062a\\u0639\\u0628\",\"\\u0639\\u0627\\u062f\\u064a\",\"\\u0633\\u0639\\u064a\\u062f\"]', 1, 0, ''),
(383, 'قييم ابتسامتك', '', 'rating', '[\"\\u0633\\u0639\\u064a\\u062f1\",\"\\u0633\\u0639\\u064a\\u062f2\",\"\\u0633\\u0639\\u064a\\u062f3\",\"\\u0633\\u0639\\u064a\\u062f4\",\"\\u0633\\u0639\\u064a\\u062f5\"]', 25, 64, 91, NULL, '', 1, 0, '[\"5\",\"5\",\"4\",\"5\",\"5\"]'),
(384, 'عمرك', 'فوق 30', 'radiobutton', '[\"\\u062a\\u062d\\u062a (15)\",\"\\u0645\\u0627\\u0628\\u064a\\u0646  (15-30)\",\"\\u0641\\u0648\\u0642 30\"]', 25, 64, 92, NULL, 'مابين  (15-30)', 1, 0, ''),
(385, 'ماهي السعادة', '', 'textbox', '', 25, 64, 94, 'ياليل مطولك', 'ياليل مطولك', 1, 0, ''),
(386, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 66, 46, NULL, 'Thomas Alva Edison Arabic', 1, 0, ''),
(387, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 66, 47, NULL, 'Jupiter Arabic', 1, 0, ''),
(388, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 66, 48, NULL, 'Earth Arabic', 1, 0, ''),
(389, '', '', 'checkbox', '[]', 17, 66, 49, NULL, '[]', 1, 0, ''),
(390, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 66, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 1, 0, ''),
(391, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 66, 51, 'usa,IT', 'usa,IT', 1, 0, ''),
(392, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 66, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(393, '', '', 'textbox', '', 17, 66, 53, '2000', '2000', 1, 0, ''),
(394, 'What is your employment status arabic?', '', 'textbox', '', 17, 66, 54, '', '', 1, 0, ''),
(395, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 66, 79, NULL, '', 1, 0, '[\"4\"]'),
(396, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 66, 80, NULL, '', 1, 0, '[\"5\"]'),
(397, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 66, 86, NULL, '', 1, 0, '[\"4\",\"5\",\"4\"]'),
(398, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 67, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(399, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 67, 47, NULL, 'Jupiter', 0, 1, ''),
(400, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 67, 48, NULL, 'Earth', 0, 1, ''),
(401, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 67, 49, NULL, '[\"Violet\",\"Blue\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 0, 1, ''),
(402, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 67, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 0, 1, ''),
(403, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 67, 51, 'uae,sales', 'uae,sales', 0, 1, ''),
(404, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 67, 52, NULL, '[\"phone\"]', 0, 1, ''),
(405, 'What is your annual household income?', '', 'textbox', '', 17, 67, 53, '7000', '7000', 0, 1, ''),
(406, 'What is your employment status?', '', 'textbox', '', 17, 67, 54, 'visit visa', 'visit visa', 0, 1, ''),
(407, 'Performance of store', 'High Quality', 'rating', '[]', 17, 67, 79, NULL, '', 0, 1, '[\"3\"]'),
(408, 'Quality of service', 'Good', 'rating', '[]', 17, 67, 80, NULL, '', 0, 1, '[\"4\"]'),
(409, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 67, 86, NULL, '', 0, 1, '[\"5\",\"5\",\"5\"]'),
(410, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 67, 46, NULL, 'Thomas Alva Edison', 0, 1, ''),
(411, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 67, 47, NULL, 'Jupiter', 0, 1, ''),
(412, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 67, 48, NULL, 'Earth', 0, 1, ''),
(413, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 67, 49, NULL, '[\"Violet\",\"Blue\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 0, 1, ''),
(414, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 67, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 0, 1, ''),
(415, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 67, 51, 'uae,sales', 'uae,sales', 0, 1, ''),
(416, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 67, 52, NULL, '[\"phone\"]', 0, 1, ''),
(417, 'What is your annual household income?', '', 'textbox', '', 17, 67, 53, '7000', '7000', 0, 1, ''),
(418, 'What is your employment status?', '', 'textbox', '', 17, 67, 54, 'visit visa', 'visit visa', 0, 1, ''),
(419, 'Performance of store', 'High Quality', 'rating', '[]', 17, 67, 79, NULL, '', 0, 1, '[\"3\"]'),
(420, 'Quality of service', 'Good', 'rating', '[]', 17, 67, 80, NULL, '', 0, 1, '[\"4\"]'),
(421, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 67, 86, NULL, '', 0, 1, '[\"5\",\"5\",\"5\"]'),
(422, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 72, 46, NULL, NULL, 0, 1, ''),
(423, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 72, 47, NULL, 'Jupiter', 0, 1, ''),
(424, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 72, 48, NULL, 'Earth', 0, 1, ''),
(425, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 72, 49, NULL, '[\"Violet\",\"Black\"]', 0, 1, ''),
(426, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 72, 50, NULL, '[\"Original Coffee\",\"Decaf Coffee\"]', 0, 1, ''),
(427, 'Where do you work and what’s your job title?', '', 'textbox', '', 17, 72, 51, 'sdgfsdgdfgdfg', 'sdgfsdgdfgdfg', 0, 1, ''),
(428, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 72, 52, NULL, '[\"laptop\",\"phone\"]', 0, 1, ''),
(429, 'What is your annual household income?', '', 'textbox', '', 17, 72, 53, 'dgdfgdfgdfg', 'dgdfgdfgdfg', 0, 1, ''),
(430, 'What is your employment status?', '', 'textbox', '', 17, 72, 54, '', '', 0, 1, ''),
(431, 'Performance of store', 'High Quality', 'rating', '[]', 17, 72, 79, NULL, '', 0, 1, '[\"0\"]'),
(432, 'Quality of service', 'Good', 'rating', '[]', 17, 72, 80, NULL, '', 0, 1, '[\"0\"]'),
(433, 'What is your opinion?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 72, 86, NULL, '', 0, 1, '[\"0\",\"0\",\"0\"]'),
(434, 'gggggg', '', 'textbox', '', 17, 72, 95, 'dfgfdgdfgdfg', 'dfgfdgdfgdfg', 0, 1, ''),
(435, ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', 'radiobutton', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]', 17, 74, 46, NULL, NULL, 1, 0, ''),
(436, 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', 'radiobutton', '[\"Jupiter Arabic\",\"Mars Arabic\"]', 17, 74, 47, NULL, 'Mars Arabic', 1, 0, ''),
(437, 'Which is the hottest planet in our solar system arabic?', 'Earth', 'radiobutton', '[\"Venus Arabic\",\"Earth Arabic\"]', 17, 74, 48, NULL, 'Earth Arabic', 1, 0, ''),
(438, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 74, 49, NULL, '[\"Violet\",\"Black\"]', 1, 0, ''),
(439, 'Your Favorite Drink Arabic', '', 'checkbox', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]', 17, 74, 50, NULL, '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\"]', 1, 0, ''),
(440, 'Where do you work and what’s your job title Arabic?', '', 'textbox', '', 17, 74, 51, 'sdfsdfsdf', 'sdfsdfsdf', 1, 0, ''),
(441, 'Do you prefer to shop on your phone or your laptop Arabic?', '', 'checkbox', '[\"laptop arabic\",\"phone arabic\"]', 17, 74, 52, NULL, '[\"laptop arabic\",\"phone arabic\"]', 1, 0, ''),
(442, '', '', 'textbox', '', 17, 74, 53, 'sdsfsdfsdf', 'sdsfsdfsdf', 1, 0, ''),
(443, 'What is your employment status arabic?', '', 'textbox', '', 17, 74, 54, '', '', 1, 0, ''),
(444, 'Performance of store arbic', 'High Quality arabic', 'rating', '[]', 17, 74, 79, NULL, '', 1, 0, '[\"0\"]'),
(445, 'Quality of service arabic', 'Good arabic', 'rating', '[]', 17, 74, 80, NULL, '', 1, 0, '[\"0\"]'),
(446, 'What is your opinion arabic?', '', 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 74, 86, NULL, '', 1, 0, '[\"0\",\"0\",\"0\"]'),
(447, 'gggg ar', '', 'textbox', '', 17, 74, 95, 'fdsfsdfsdf', 'fdsfsdfsdf', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(98, '1.39.75.156', 'vidhul001@dunkin.com', 1636080109);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `questionnaireid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `customerid` int(11) NOT NULL,
  `titlearabic` varchar(255) NOT NULL,
  `countans` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaireid`, `storeid`, `number`, `title`, `status`, `customerid`, `titlearabic`, `countans`) VALUES
(17, 1, '000017', 'General Knowledge', 'Active', 0, 'General Knowledge', 31),
(18, 1, '000018', 'Physics', 'Active', 0, 'Physics Arabic', 70),
(19, 1, '000019', 'Test', 'Active', 0, 'Test', 14),
(20, 17, '000020', 'Knowing You Better', 'Active', 0, ' لنتعرف عليك', 0),
(21, 19, '000021', 'Test Questins 001 ', 'Active', 0, 'Test Questins 001', 0),
(22, 1, '000022', 'werwer', 'Active', 0, 'werwer', 0),
(23, 20, '000023', 'Dunkin  test', 'Active', 0, 'دانكن تجربة', 5),
(24, 1, '000024', 'Biology', 'Active', 0, 'مادة الاحياء', 1),
(25, 21, '000025', 'Happiness ', 'Inactive', 0, 'السعادة', 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(11) NOT NULL,
  `questiontitle` text NOT NULL,
  `answer` text DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `answeroptions` text NOT NULL,
  `questionnaireid` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `questiontype` varchar(11) NOT NULL,
  `questiontitlearabic` text NOT NULL,
  `answerarabic` varchar(255) DEFAULT NULL,
  `answeroptionsarabic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `questiontitle`, `answer`, `category`, `answeroptions`, `questionnaireid`, `status`, `questiontype`, `questiontitlearabic`, `answerarabic`, `answeroptionsarabic`) VALUES
(46, ' Who invented the Light Bulb?', 'Thomas Alva Edison', 'radiobutton', '[\"Thomas Alva Edison\",\"Newton\"]', 17, 'Active', 'Optional', ' Who invented the Light Bulb Arabic?', 'Thomas Alva Edison Arabic', '[\"Thomas Alva Edison Arabic\",\"Newton Arabic\"]'),
(47, 'What is the name of the biggest planet in our solar system?', 'Jupiter', 'radiobutton', '[\"Jupiter\",\"Mars\"]', 17, 'Active', 'Mandatory', 'What is the name of the biggest planet in our solar system Arabic? ', 'Jupiter Arabic', '[\"Jupiter Arabic\",\"Mars Arabic\"]'),
(48, 'Which is the hottest planet in our solar system?', 'Earth', 'radiobutton', '[\"Venus\",\"Earth\"]', 17, 'Active', 'Mandatory', 'Which is the hottest planet in our solar system arabic?', 'Earth', '[\"Venus Arabic\",\"Earth Arabic\"]'),
(49, 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', 'checkbox', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]', 17, 'Active', 'Mandatory', 'What are the colors in VIBGYOR?', 'Violet,Indigo,Green,Blue,Yellow,Orange,Red', '[\"Violet\",\"Black\",\"Blue\",\"White\",\"Yellow\",\"Orange\",\"Red\",\"Indigo\",\"Green\"]'),
(50, 'Your Favorite Drink', 'Users choice', 'checkbox', '[\"Original Coffee\",\"Decaf Coffee\",\"Dark Roast Coffee\",\"Cappuccino\",\"Latte\"]', 17, 'Active', 'Mandatory', 'Your Favorite Drink Arabic', '', '[\"Original Coffee Arabic\",\"Decaf Coffee Arabic\",\"Dark Roast Coffee Arabic\",\"Cappuccino Arabic\",\"Latte Arabic\"]'),
(51, 'Where do you work and what’s your job title?', '', 'textbox', '{}', 17, 'Active', 'Mandatory', 'Where do you work and what’s your job title Arabic?', '', NULL),
(52, 'Do you prefer to shop on your phone or your laptop?', 'customer choice', 'checkbox', '[\"laptop\",\"phone\"]', 17, 'Active', 'Mandatory', 'Do you prefer to shop on your phone or your laptop Arabic?', '', '[\"laptop arabic\",\"phone arabic\"]'),
(53, 'What is your annual household income?', '', 'textbox', '{}', 17, 'Active', 'Mandatory', '', NULL, NULL),
(54, 'What is your employment status?', '', 'textbox', '{}', 17, 'Active', 'Optional', 'What is your employment status arabic?', '', NULL),
(56, ' How many days do we have in a week?', 'Seven', 'radiobutton', '[\"Seven\",\"eight\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(57, 'How many days are there in a year?', '365', 'radiobutton', '[\"365\",\"360\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(58, 'How many colors are there in a rainbow?', '7', 'radiobutton', '[\"7\",\"8\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(59, 'Which animal is known as the ‘Ship of the Desert?’', 'Camel', 'radiobutton', '[\"Camel\",\"Dog\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(60, 'Who your target market is?', '', 'textbox', '{}', 18, 'Active', 'Mandatory', '', NULL, NULL),
(61, 'How you should price your products?', '', 'textbox', '{}', 18, 'Active', 'Mandatory', '', NULL, NULL),
(62, 'What is stopping people from buying from you?', '', 'textbox', '{}', 18, 'Active', 'Mandatory', '', NULL, NULL),
(63, 'Why visitors leave your website?', '', 'textbox', '{}', 18, 'Active', 'Mandatory', '', NULL, NULL),
(64, 'Which browser are you using?', 'Chrome,Safari,Firefox,Explorer', 'checkbox', '[\"Chrome\",\"Safari\",\"Firefox\",\"Explorer\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(65, 'How satisfied were you with your customer service experience?', 'Customer choice', 'radiobutton', '[\"Very dissatisfied\",\"Somewhat dissatisfied\",\"Slightly dissatisfied\"]', 18, 'Active', 'Mandatory', '', NULL, NULL),
(66, 'Test question text box', '', 'textbox', '{}', 19, 'Active', 'Mandatory', '', NULL, NULL),
(67, 'Test Question Checkbox', 'option2', 'checkbox', '[\"option1\",\"option2\"]', 19, 'Active', 'Mandatory', '', NULL, NULL),
(68, 'Test Question Radiobutton', 'option2', 'radiobutton', '[\"option1\",\"option2\"]', 19, 'Active', 'Mandatory', '', NULL, NULL),
(69, 'Name', '', 'textbox', '{}', 20, 'Active', 'Mandatory', '', NULL, NULL),
(70, 'Age', '', 'textbox', '{}', 20, 'Active', 'Mandatory', '', NULL, NULL),
(71, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 20, 'Active', 'Mandatory', '', NULL, NULL),
(72, 'City ', '', 'textbox', '{}', 20, 'Active', 'Mandatory', '', NULL, NULL),
(73, 'Favorite Drink', '', 'checkbox', '[\"Original Coffee\",\"Original Coffee\",\"Cappuccino\",\"Latte\",\"Mocha\",\"Hot Chocolate\",\"Espresso\"]', 20, 'Active', 'Mandatory', '', NULL, NULL),
(74, 'Comments', '', 'textbox', '{}', 20, 'Active', 'Mandatory', '', NULL, NULL),
(75, 'Test question textbox Some?', '', 'textbox', '{}', 21, 'Active', 'Mandatory', '', NULL, NULL),
(76, 'Test Question Checkbox?', 'Option22', 'checkbox', '[\"Option1\",\"Option2\"]', 21, 'Active', 'Mandatory', '', NULL, NULL),
(77, 'Test Question Radio button?', 'Male', 'radiobutton', '[\"Male\",\"Female\"]', 21, 'Active', 'Mandatory', '', NULL, NULL),
(79, 'Performance of store', 'High Quality', 'rating', '[\"\"]', 17, 'Active', 'Mandatory', 'Performance of store arbic', 'High Quality arabic', '[\"\"]'),
(80, 'Quality of service', 'Good', 'rating', '[\"\"]', 17, 'Active', 'Mandatory', 'Quality of service arabic', 'Good arabic', '[\"\"]'),
(81, 'Favorite Drink', 'test 9', 'checkbox', '[\"Original Coffee \",\"Decaf Coffee \",\"Dark Roast Coffee \",\"test 1\",\"test 2\",\"test 3\",\"test 4\",\"test 5\",\"test 6\",\"test 7\",\"test 8\",\"test 9\",\"test 10\"]', 23, 'Active', 'Mandatory', 'مشروبك المفضل', 'تجربة 8 ', '[\"\\u0627\\u0644\\u0642\\u0647\\u0648\\u0629 \\u0627\\u0644\\u0623\\u0635\\u0644\\u064a\\u0629\",\"\\u0642\\u0647\\u0648\\u0629 \\u062f\\u064a\\u0643\\u0627\\u0641\",\"\\u0642\\u0647\\u0648\\u0629 \\u062f\\u0627\\u0631\\u0643 \\u0631\\u0648\\u0633\\u062a\",\"\\u062a\\u062c\\u0631\\u0628\\u0629\",\"\\u0'),
(82, 'comment', '', 'textbox', '{}', 23, 'Active', 'Optional', 'ملاحظات', '', NULL),
(83, 'Gender', '', 'radiobutton', '[\"Male\",\"Female \"]', 23, 'Active', 'Mandatory', 'الجنس', '', '[\"\\u0630\\u0643\\u0631\",\"\\u0623\\u0646\\u062b\\u0649\"]'),
(84, 'Rate our work', 'test', 'rating', '[\"\"]', 23, 'Active', 'Mandatory', 'قييم عملنا', 'تجربه', '[\"\"]'),
(85, 'dhfnj', '', 'textbox', '{}', 23, 'Active', 'Mandatory', 'ياليل', '', NULL),
(86, 'What is your opinion?', NULL, 'rating', '[\"Good\",\"Better\",\"Best\"]', 17, 'Active', 'Mandatory', 'What is your opinion arabic?', NULL, '[\"Good\",\"Better\",\"Best\"]'),
(87, 'What is a cell?', '', 'textbox', '{}', 24, 'Active', 'Mandatory', 'ما هي الخلية؟', '', NULL),
(88, 'Largest Animal?', 'Giraff', 'radiobutton', '[\"Giraff\",\"Dog\"]', 24, 'Active', 'Mandatory', 'أكبر حيوان؟', 'زرافة', '[\"\\u0632\\u0631\\u0627\\u0641\\u0629\",\"\\u0643\\u0644\\u0628\"]'),
(89, 'How is our store?', NULL, 'rating', '[\"Good\",\"Average\"]', 24, 'Active', 'Mandatory', '?كيف هو متجرنا؟', NULL, '[\"\\u062d\\u0633\\u0646\",\"\\u0645\\u062a\\u0648\\u0633\\u0637\"]'),
(90, 'How you are feeling?', 'normal', 'checkbox', '[\"SAD\",\"Tired \",\"Normal \",\"Happy\"]', 25, 'Active', 'Mandatory', 'كيف تشعر الان ؟', 'عادي', '[\"\\u062d\\u0632\\u064a\\u0646\",\"\\u0645\\u062a\\u0639\\u0628\",\"\\u0639\\u0627\\u062f\\u064a\",\"\\u0633\\u0639\\u064a\\u062f\"]'),
(91, 'Rate your smile ', '', 'rating', '[\"Happy1\",\"happy2\",\"Happy3\",\"Happy4\",\"Happy5\"]', 25, 'Active', 'Mandatory', 'قييم ابتسامتك', '', '[\"\\u0633\\u0639\\u064a\\u062f1\",\"\\u0633\\u0639\\u064a\\u062f2\",\"\\u0633\\u0639\\u064a\\u062f3\",\"\\u0633\\u0639\\u064a\\u062f4\",\"\\u0633\\u0639\\u064a\\u062f5\"]'),
(92, 'Your Old', 'Above 30', 'radiobutton', '[\"under (15)\",\"between (15-30)\",\"Above 30\"]', 25, 'Active', 'Mandatory', 'عمرك', 'فوق 30', '[\"\\u062a\\u062d\\u062a (15)\",\"\\u0645\\u0627\\u0628\\u064a\\u0646  (15-30)\",\"\\u0641\\u0648\\u0642 30\"]'),
(94, 'what is  Happiness?', '', 'textbox', '{}', 25, 'Active', 'Mandatory', 'ماهي السعادة', '', NULL),
(95, 'gggggg', '', 'textbox', '{}', 17, 'Active', 'Mandatory', 'gggg ar', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeid` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `number` varchar(225) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `redeemed_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeid`, `name`, `number`, `status`, `redeemed_count`) VALUES
(1, 'Oleya / العليا-الرياض', '10011', 'Active', 510),
(2, 'Food Basket / سلة الغذاء-الرياض', '10013', 'Active', 0),
(3, 'Panda / بنده-الرياض', '10016', 'Active', 0),
(4, 'ALAkariyah / العقارية-الرياض', '10017', 'Active', 0),
(5, 'Hs St.Tami / تميمي احساء-الرياض', '10018', 'Inactive', 0),
(7, 'K.F Hospital / مستشفى م.فيصل-الرياض', '10020', 'Active', 0),
(17, 'Malaz Store', '13272', 'Active', 0),
(20, 'Al-Malz - الملز', '0223', 'Active', 21),
(21, 'Riyadh center -وسط الرياض ', '000', 'Inactive', 27);

-- --------------------------------------------------------

--
-- Table structure for table `store_old1`
--

CREATE TABLE `store_old1` (
  `storeid` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `number` varchar(225) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `redeemed_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_old1`
--

INSERT INTO `store_old1` (`storeid`, `name`, `number`, `status`, `redeemed_count`) VALUES
(1, 'Oleya / العليا-الرياض', '10011', 'Active', 0),
(2, 'Food Basket / سلة الغذاء-الرياض', '10013', 'Active', 0),
(3, 'Panda / بنده-الرياض', '10016', 'Active', 0),
(4, 'ALAkariyah / العقارية-الرياض', '10017', 'Active', 0),
(5, 'Hs St.Tami / تميمي احساء-الرياض', '10018', 'Inactive', 0),
(7, 'K.F Hospital / مستشفى م.فيصل-الرياض', '10020', 'Active', 0),
(13, 'hjgjhgjhxxxxxمستشفى م.فيصل-الرياض', '23', 'Active', 0),
(14, 'ertert', '457645', 'Active', 0),
(15, 'nnnn', '88888', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_old2`
--

CREATE TABLE `store_old2` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `number` varchar(225) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `redeemed_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_old2`
--

INSERT INTO `store_old2` (`id`, `name`, `number`, `status`, `redeemed_count`) VALUES
(1, 'Oleya / العليا-الرياض', '10011', 'Active', 0),
(2, 'Food Basket / سلة الغذاء-الرياض', '10013', 'Active', 0),
(3, 'Panda / بنده-الرياض', '10016', 'Active', 0),
(4, 'ALAkariyah / العقارية-الرياض', '10017', 'Active', 0),
(5, 'Hs St.Tami / تميمي احساء-الرياض', '10018', 'Inactive', 0),
(7, 'K.F Hospital / مستشفى م.فيصل-الرياض', '10020', 'Active', 0),
(13, 'hjgjhgjhxxxxxمستشفى م.فيصل-الرياض', '23', 'Active', 0),
(14, 'ertert', '457645', 'Active', 0),
(15, 'nnnn', '88888', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `paas_text` varchar(225) NOT NULL,
  `email` varchar(254) NOT NULL,
  `store_name` varchar(225) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` smallint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` enum('admin','supervisor','employee') NOT NULL,
  `store_id` int(11) NOT NULL,
  `menus` varchar(255) NOT NULL,
  `storeid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `paas_text`, `email`, `store_name`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `type`, `store_id`, `menus`, `storeid`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$T.bTbh6ELJEMhdgEQltjuumIqOCbxWkLzh3iJE0Nk3KPaehQViSgK', 'dunkin@#%843', 'admin@admin.com', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1636092052, 1, 'administrator', 'istrator', 'ADMIN', '0', 'admin', 0, 'Dashboard,Manage Store,Qr Code,Manage Questions,Manage Customers,User Management', 1),
(2, '127.0.0.1', 'CRAYO0022', '$2y$10$ImJg5MQRRTItBad2f7KZxeYJy8NoNiNrGlQTyR3IKjgIbZ/nKdZWi', '1234', 'vidhul001@dunkin.com', '10011-Oleyaa / العليا-الرياض', NULL, NULL, NULL, NULL, NULL, 'c8d074d589822db892d95f15c383494b948032c1', '$2y$10$y6bdfI6cKC7EY0dBE/Y9J.7jQbAJ0r7drTEMur5cU9t5ClvmEoCce', 1630067113, 1631531504, 1, 'CRAYO0022', NULL, NULL, NULL, 'admin', 0, 'Dashboard,Manage Store,Qr Code', 1),
(3, '157.44.139.226', '1001', '$2y$10$OEdMvNI57V2mWzuLKOcdPOvo6B5/toW2AIDLcoEMW6iITvWn/V7KK', '123456', '1001@dunkin.com', '10011-Oleya / العليا-الرياض', NULL, NULL, NULL, NULL, NULL, '6f459aabd38570a7235fd2410ce7f428f5474504', '$2y$10$qAgWoNRLLP17fFWcakyRqujIhLklfrWOA7IqCWjacoH5pdsL0zy7.', 1630145279, 1630328585, 1, 'Rejilal', NULL, NULL, NULL, 'employee', 0, '', 0),
(4, '176.45.137.45', '123', '$2y$10$3P3qPFgjJiPrZ97wzMYREehU0zG0UUa3fmnN9awqjaMA4o4AoHJk2', '123456', '123@dunkin.com', '10017-ALAkariyah / العقارية-الرياض', NULL, NULL, NULL, NULL, NULL, '26eb9a1b24cc0204c5699275a6d40775b578a3db', '$2y$10$OVXg6ab4u3jxo.IR2okBkerM/Z5SKcc9aHK13qH6xi987.eMcRmdi', 1630393014, 1630482703, 1, 'Abdulrahman', NULL, NULL, NULL, 'employee', 0, '', 0),
(5, '116.68.110.162', 'CRAYO001', '$2y$10$TttMwSr2sSCwYBS6t27KVubuPA/qjSn5d0noP66MkpuiZ1q1X8K7y', 'CRAYO001', 'CRAYO001@dunkin.com', '10011-Oleya / العليا-الرياض', NULL, NULL, NULL, NULL, NULL, 'f2fe67f3c25d2eb0135e14400a0ce5b4f34ef0ee', '$2y$10$jKePF9nQX6/zv.S9m.aFxOQk.3OouzWGvovvFHUFglBQPjkRZEzfO', 1631435544, 1634553478, 1, 'crayotech', NULL, NULL, NULL, 'employee', 0, '', 0),
(6, '188.48.215.106', 'd7o0my001', '$2y$10$Fl97EskCBfSuGZRyn86bDOEiRJw./iJId.dvEPbkGqa6hIKksFWo6', 'd7o0my001', 'd7o0my001@dunkin.com', '09589847-d7store- العزيزية', NULL, NULL, NULL, NULL, NULL, 'b28444d0ea98bcacc25a63ec06c11bea55dc27e8', '$2y$10$Wlu8zHTrSr05..6woY51Q.0Kii3DUc0NQdZL4c9lgv5CreQVH6y66', 1631531973, 1635859388, 1, 'Abdulrahman', NULL, NULL, NULL, 'admin', 0, '', 0),
(7, '188.48.215.106', 'd70omy999', '$2y$10$hhZHUXTRfS89loLiT6VJfeRxj.KH0SWksj3QK.H/HERIJ2O..lqly', '123456', 'd70omy999@dunkin.com', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', NULL, NULL, NULL, NULL, NULL, 'a8b11af1f9de5cc53782251bba296e2e3d4d059d', '$2y$10$3pm7UfxOpR1qFMv5JsbKp.sUG3nLYpNkw6Bjhbzn4UXjdUInHhVfO', 1631532072, 1632500985, 1, 'Abdulrahman Moahmmed', NULL, NULL, NULL, 'employee', 0, '', 0),
(26, '188.48.215.106', 'sssss', '$2y$10$hhZHUXTRfS89loLiT6VJfeRxj.KH0SWksj3QK.H/HERIJ2O..lqly', '123456', 'ssss@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'supervisor', 0, '', 0),
(28, '', 'aaaaa bbbb', '', '1234', 'aaaa@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'xxxxx', 'cccc', 'aaa dddd', '457567567568', 'supervisor', 0, '', 0),
(31, '', 'zzzzz', '', '', 'ddd@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'firstname', 'lastname', 'ccccc', '89779789', 'supervisor', 0, '', 0),
(33, '', 'sfsf', '', '', 'ccc@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, 'ccc', 'cccc', 'ccc', '4564647', 'supervisor', 0, '', 0),
(39, '', 'sssss1', '', '', 'sssss1@gmail.com', 'dfgdfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'sdfs', 'dgdfg', 'ertery', '346364567', 'employee', 0, '', 0),
(40, '', 'sssss2', '', '', 'sssss2@gmail.com', 'dsfdsgfdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'sdfsdf', 'dsgdsfg', 'dfgdfg', '235345346', 'employee', 0, '', 0),
(41, '', 'sdfgdsfg', '', '', 'sssss@gmail.com', 'dfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'sdfsdg', 'dfgdfg', 'dfgdfg', '346456456', 'employee', 0, '', 0),
(42, '', 'aaaaabb', '', '', 'aaaabb@gmail.com', '10018-Hs St.Tami / تميمي احساء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'fn', 'ln', 'comp', '97877978778', 'employee', 0, '', 0),
(43, '', 'hhhhh', '', '', 'dddd@gmail.com', '10018-Hs St.Tami / تميمي احساء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'sdf', 'wer', 'cccc', '8768686', 'supervisor', 13, '', 0),
(44, '', 'bbbb', '', '', 'sssssbbb@gmail.com', '10018-Hs St.Tami / تميمي احساء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'bbbb', 'bbbb', 'bbbb', '556346', 'supervisor', 0, '', 0),
(45, '', 'eeee', '', '', 'eeee@gmail.com', '10016-Panda / بنده-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'fb', 'sb', 'cb', '34534634', 'supervisor', 1, '', 0),
(46, '', 'dsfgdfg', '', '', 'vvvv@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'xfsdgd', 'dsfgdfg', 'dfgdfg', '575687568', 'supervisor', 1, '', 0),
(47, '', 'eryrty', '', '', 'hhh@gmail.com', '23-hjgjhgjhxxxxxمستشفى م.فيصل-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, 'cvbcv', 'cvbcvb', 'vcbvcb', '546756867', 'supervisor', 13, '', 0),
(48, '', 'dgdfg', '', '', 'bbb@gmail.com', '10013-Food Basket / سلة الغذاء-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'xcvxcv', 'xcvxcv', 'rtyrty', '46457567', 'admin', 2, '', 0),
(49, '', 'tttt', '', '', 'hhhh@gmail.com', '23-hjgjhgjhxxxxxمستشفى م.فيصل-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'xzvxv', 'xcvzxcv', 'xvxcv', '567568678', 'supervisor', 13, '', 0),
(50, '', 'yyyy', '', '', 'ffff@gmail.com', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'rthrtu', 'rtyrty', 'reyery', '346456457', 'admin', 7, '', 0),
(51, '', 'dddd hhhhh', '', '', 'aaaaa@gmail.com', '10011-Oleya / العليا-الرياض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'firstname', 'lastname', 'cccc', '456547657', 'supervisor', 1, '', 0),
(52, '', 'd7o0my999', '', '', 'abdulrahman@crayotech.com', '028-D7o0my -دحومي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Abdulrahman', 'Gumaan', 'Crayo', '0505914458', 'employee', 20, '', 0),
(53, '', 'd78', '', '', 'abdulrahmand@crayotech.com', '028-D7o0my -دحومي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Abdulrahman ', 'Gumaan', 'd78', '0000', 'admin', 20, '', 0),
(54, '', 'D7o0myyy', '', '', 'Abdulrahmaeeeen@crayotech.com', '000-Riyadh center -وسط الرياض ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Abdu', 'Gumaan', 'Crayo', '0000000000', 'admin', 21, '', 0),
(55, '1.39.75.156', 'test', '$2y$10$gDyqleT0BcZugTh8vQCeAuzY.KHf6REjwoxRfx2Jt..NuF6RJIcGy', '1234', 'test@telldunkinksa.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1636078872, 1636092131, 1, 'test', NULL, NULL, NULL, 'supervisor', 0, 'Dashboard,Manage Store', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 55, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_old1`
--

CREATE TABLE `users_old1` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `paas_text` varchar(225) NOT NULL,
  `type` enum('admin','supervisor','employee') NOT NULL,
  `store_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_old1`
--

INSERT INTO `users_old1` (`id`, `ip_address`, `username`, `password`, `paas_text`, `type`, `store_name`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$T.bTbh6ELJEMhdgEQltjuumIqOCbxWkLzh3iJE0Nk3KPaehQViSgK', 'admin!@#', 'admin', ''),
(2, '127.0.0.1', 'CRAYO0022', '$2y$10$ImJg5MQRRTItBad2f7KZxeYJy8NoNiNrGlQTyR3IKjgIbZ/nKdZWi', 'CRAYO002', 'admin', ''),
(3, '157.44.139.226', '1001', '$2y$10$OEdMvNI57V2mWzuLKOcdPOvo6B5/toW2AIDLcoEMW6iITvWn/V7KK', '123456', 'employee', ''),
(4, '176.45.137.45', '123', '$2y$10$3P3qPFgjJiPrZ97wzMYREehU0zG0UUa3fmnN9awqjaMA4o4AoHJk2', '123456', 'employee', ''),
(5, '116.68.110.162', 'CRAYO001', '$2y$10$TttMwSr2sSCwYBS6t27KVubuPA/qjSn5d0noP66MkpuiZ1q1X8K7y', 'CRAYO001', 'employee', ''),
(6, '188.48.215.106', 'd7o0my001', '$2y$10$Fl97EskCBfSuGZRyn86bDOEiRJw./iJId.dvEPbkGqa6hIKksFWo6', 'd7o0my001', 'admin', ''),
(7, '188.48.215.106', 'd70omy999', '$2y$10$hhZHUXTRfS89loLiT6VJfeRxj.KH0SWksj3QK.H/HERIJ2O..lqly', '123456', 'employee', ''),
(19, '8989', 'tttt', '87979789', '989898', 'admin', ''),
(20, '', 'sdfsadf', '', '', 'supervisor', 'sdfsdf'),
(22, '', 'vvvvv', '', '', 'supervisor', 'ddddddd'),
(23, '', 'sdgsdg', '', '', 'supervisor', 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `expiry_from` date NOT NULL,
  `expiry_to` date NOT NULL,
  `products` text NOT NULL,
  `company` varchar(225) NOT NULL,
  `custom_products` text NOT NULL,
  `status` enum('Active','Inactive','Used') NOT NULL,
  `qr_code` varchar(225) NOT NULL,
  `bar_code` varchar(225) NOT NULL,
  `user_code` varchar(225) NOT NULL,
  `store` varchar(225) CHARACTER SET utf8 NOT NULL,
  `qty` varchar(225) NOT NULL,
  `used_date` datetime DEFAULT NULL,
  `email_id` varchar(225) NOT NULL,
  `send` enum('Yes','No') NOT NULL DEFAULT 'No',
  `percentage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `number`, `name`, `expiry_from`, `expiry_to`, `products`, `company`, `custom_products`, `status`, `qr_code`, `bar_code`, `user_code`, `store`, `qty`, `used_date`, `email_id`, `send`, `percentage`) VALUES
(1, '000001', 'Test Voucher', '2021-08-31', '2021-09-30', 'Choco candy sprinkle,Coco Choco', 'Lulu', '', 'Active', '', '', '', '', '5', NULL, '', 'No', ''),
(2, '000002', 'Test Voucher', '2021-08-31', '2021-09-30', 'Choco candy sprinkle,Coco Choco', 'Lulu', '', 'Used', '', '', 'd70omy999', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', '', '2021-09-22 16:04:47', '', 'No', ''),
(3, '000003', 'Test Voucher', '2021-08-31', '2021-09-30', 'Choco candy sprinkle,Coco Choco', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(4, '000004', 'Test Voucher', '2021-08-31', '2021-09-30', 'Choco candy sprinkle,Coco Choco', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(5, '000005', 'Test Voucher', '2021-08-31', '2021-09-30', 'Choco candy sprinkle,Coco Choco', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(6, '000006', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '10', NULL, '', 'No', ''),
(7, '000007', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(8, '000008', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(9, '000009', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(10, '000010', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(11, '000011', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(12, '000012', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(13, '000013', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(14, '000014', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Used', '', '', 'administrator', '', '', NULL, '', 'No', ''),
(15, '000015', 'V1Name', '2021-09-21', '2021-09-23', 'Choco Marble,Coco Strawberry', 'Lulu', '', 'Used', '', '', '1001', '100', '', NULL, '', 'No', ''),
(17, '000017', 'Vtest', '2021-08-31', '2021-08-02', 'Choco Marble,Nutty chocolate', 'Lulu', '', 'Used', '', '', 'administrator', '', '', NULL, '', 'No', ''),
(18, '000018', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '100', NULL, '', 'No', ''),
(19, '000019', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(20, '000020', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(21, '000021', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(22, '000022', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(23, '000023', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(24, '000024', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(25, '000025', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(26, '000026', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(27, '000027', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(28, '000028', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(29, '000029', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(30, '000030', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(31, '000031', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(32, '000032', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(33, '000033', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(34, '000034', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(35, '000035', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(36, '000036', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(37, '000037', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(38, '000038', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(39, '000039', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(40, '000040', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(41, '000041', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(42, '000042', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(43, '000043', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(44, '000044', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(45, '000045', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(46, '000046', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(47, '000047', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(48, '000048', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(49, '000049', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(50, '000050', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(51, '000051', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(52, '000052', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(53, '000053', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(54, '000054', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(55, '000055', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(56, '000056', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(57, '000057', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(58, '000058', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(59, '000059', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(60, '000060', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(61, '000061', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(62, '000062', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(63, '000063', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(64, '000064', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(65, '000065', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(66, '000066', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(67, '000067', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(68, '000068', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(69, '000069', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(70, '000070', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(71, '000071', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(72, '000072', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(73, '000073', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(74, '000074', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(75, '000075', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(76, '000076', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(77, '000077', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(78, '000078', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(79, '000079', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(80, '000080', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(81, '000081', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(82, '000082', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(83, '000083', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(84, '000084', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(85, '000085', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(86, '000086', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(87, '000087', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(88, '000088', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(89, '000089', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(90, '000090', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(91, '000091', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(92, '000092', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(93, '000093', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(94, '000094', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(95, '000095', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(96, '000096', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(97, '000097', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(98, '000098', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(99, '000099', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(100, '000100', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(101, '000101', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'd70omy999', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', '', NULL, '', 'No', ''),
(102, '000102', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(103, '000103', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(104, '000104', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'CRAYO001', '10011-Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(105, '000105', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(106, '000106', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'd70omy999', '10011-Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(107, '000107', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(108, '000108', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'CRAYO001', 'Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(109, '000109', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'vidhul001', '10011-Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(110, '000110', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'vidhul001', '10011-Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(111, '000111', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'CRAYO001', 'Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(112, '000112', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(113, '000113', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(114, '000114', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(115, '000115', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Active', '', '', '', '', '', NULL, '', 'No', ''),
(116, '000116', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'CRAYO001', 'Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(117, '000117', 'crayo', '2021-09-13', '2021-09-30', 'test name', 'crayo', 'hjghd', 'Used', '', '', 'CRAYO001', 'Oleya / العليا-الرياض', '', NULL, '', 'No', ''),
(118, '000118', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble', 'Lulu', '', 'Active', '', '', '', '', '10', NULL, '', 'No', ''),
(119, '000119', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble|20104,Strawberry Marble|20113', 'Lulu', '', 'Active', '', '', '', '', '', NULL, 'ajith@crayotech.com', 'Yes', ''),
(120, '000120', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble|20104,Strawberry Marble|20113', 'Lulu', '', 'Active', '', '', '', '', '', NULL, 'rejilal.raveendran@crayotech.com', 'Yes', ''),
(121, '000121', 'km ', '2021-09-13', '2021-09-14', 'Choco candy sprinkle|20103,Coco Choco|20105,Strawberry Marble|20113', 'Lulu', '', 'Used', '', '', 'd70omy999', 'Oleya / العليا-الرياض', '', '2021-09-24 16:50:53', 'vidhul@crayotech.com', 'Yes', ''),
(122, '000122', 'km ', '2021-09-13', '2021-09-14', 'Choco candy sprinkle|20103,Coco Choco|20105,Vanilla frosted|20107,Coco Strawberry|20114', 'Lulu', '', 'Used', '', '', 'd70omy999', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', '', '2021-09-24 16:31:01', '', 'No', ''),
(123, '000123', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble', 'Lulu', '', 'Used', '', '', 'd70omy999', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', '', '2021-09-23 12:42:15', '', 'No', ''),
(124, '000124', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble', 'Lulu', '', 'Used', '', '', 'd70omy999', '10020-K.F Hospital / مستشفى م.فيصل-الرياض', '', '2021-09-23 12:40:48', '', 'No', ''),
(125, '000125', 'km ', '2021-09-13', '2021-09-14', 'Choco Marble', 'Lulu', '', 'Used', '', '', 'd70omy999', 'Oleya / العليا-الرياض', '', '2021-09-23 12:25:12', '', 'No', ''),
(126, '000126', 'km ', '2021-09-13', '2021-09-14', '', 'Lulu', 'product1,product2,product3', 'Used', '', '', 'CRAYO001', '10011-Oleya / العليا-الرياض', '', '2021-09-22 16:06:10', 'vidhul.magento@gmail.com', 'Yes', ''),
(127, '000127', 'Test', '2021-09-13', '2021-09-14', 'Choco Marble|20104,Nutty chocolate|20106,Strawberry Marble|20113', 'Lulu', '', 'Used', '', '', 'CRAYO001', '10011-Oleya / العليا-الرياض', '', NULL, 'vidhul@crayotech.com', 'Yes', ''),
(128, '000128', 'Test percentage', '2021-09-24', '2021-09-30', 'Choco candy sprinkle|20103,Nutty chocolate|20106', 'Lulu', '', 'Active', '', '', '', '', '2', NULL, 'rejilal.raveendran@crayotech.com2', 'Yes', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerid`);

--
-- Indexes for table `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `customerqrcode`
--
ALTER TABLE `customerqrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerquestionsansw`
--
ALTER TABLE `customerquestionsansw`
  ADD PRIMARY KEY (`custquestionid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`questionnaireid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `store_old1`
--
ALTER TABLE `store_old1`
  ADD PRIMARY KEY (`storeid`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `store_old2`
--
ALTER TABLE `store_old2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_old1`
--
ALTER TABLE `users_old1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `customerqrcode`
--
ALTER TABLE `customerqrcode`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customerquestionsansw`
--
ALTER TABLE `customerquestionsansw`
  MODIFY `custquestionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionnaireid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `store_old1`
--
ALTER TABLE `store_old1`
  MODIFY `storeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store_old2`
--
ALTER TABLE `store_old2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_old1`
--
ALTER TABLE `users_old1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
