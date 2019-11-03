

--
-- Table structure for table `dis`
--

CREATE TABLE `dis` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `d_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `sinhala_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dis`
--

INSERT INTO `dis` (`id`, `d_id`, `d_name`, `sinhala_name`) VALUES
(01, 01, 'Colombo District ', 'කොළඹ'),
(02, 02, 'Gampaha District ', 'ගම්පහ'),
(03, 03, ' Kaluthara District ', 'කළුතර'),
(04, 04, 'Kandy District ', 'මහනුවර'),
(05, 05, 'Matale District ', 'මාතලේ'),
(06, 06, ' Nuwara Eliya District ', 'නුවරඑළිය'),
(07, 07, ' Galle District ', 'ගාල්ල'),
(08, 08, 'Matara District ', 'මාතර'),
(09, 09, 'Hambantota District', 'හම්බන්තොට'),
(10, 10, 'Jaffna District', 'යාපනය'),
(11, 11, ' Kilinochchi District', 'කිලිනොච්චිය'),
(12, 12, 'Mannar District', 'මන්නාරම'),
(13, 13, 'Vavuniya District', 'වවුනියාව'),
(14, 14, 'Mullaitivu District', 'මුලතිවු'),
(15, 15, 'Batticaloa District', 'මඩකලපුව'),
(16, 16, 'Ampara District', 'අම්පාර'),
(17, 17, 'Trincomalee District  ', 'ත්‍රිකුණාමලය'),
(18, 18, 'Kurunegala District', 'කුරුණෑගල'),
(19, 19, 'Puttalam District', 'පුත්තලම'),
(20, 20, 'Anuradhapura District', 'අනුරාධපුරය'),
(21, 21, 'Polonnaruwa District', 'පොළොන්නරුව'),
(22, 22, 'Badulla District', 'බදුල්ල'),
(23, 23, 'Moneragala District', 'මොණරාගල'),
(24, 24, 'Ratnapura District', 'රත්නපුර'),
(25, 25, 'Kegalle District', 'කෑගල්ල'),
(26, 26, 'UoKTestDS1', 'UoKTestDS1'),
(27, 27, 'UoKTestDS2', 'UoKTestDS1'),
(28, 28, 'UoKTestDS3', 'UoKTestDS3'),
(29, 29, 'UoKTestDS4', 'UoKTestDS4');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `d_id` varchar(10) NOT NULL,
  `l_id` varchar(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `d_id`, `l_id`, `file_name`, `date`) VALUES
(1, '26', '01', '2601L.xml', '2018-02-08 05:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `la`
--

CREATE TABLE `la` (
  `id` int(11) NOT NULL,
  `d_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `l_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la`
--

INSERT INTO `la` (`id`, `d_id`, `l_id`, `d_name`, `l_name`) VALUES
(1, 01, 01, 'Colombo', 'Colombo Municipal Council'),
(2, 01, 02, 'Colombo', 'Dehiwala - Mt.Lavinia Municipal Council'),
(3, 01, 03, 'Colombo', 'Sri Jayawardenepura Kotte Municipal Council'),
(4, 01, 04, 'Colombo', 'Kaduwela Municipal Council'),
(5, 01, 05, 'Colombo', 'Moratuwa Municipal Council'),
(6, 01, 06, 'Colombo', 'Kolonnawa Urban Council'),
(7, 01, 07, 'Colombo', 'Seethawakapura Urban Council'),
(8, 01, 08, 'Colombo', 'Maharagama Urban Council'),
(9, 01, 09, 'Colombo', 'Kesbewa Urban Council'),
(10, 01, 10, 'Colombo', 'Boralesgamuwa Urban Council'),
(11, 01, 11, 'Colombo', 'Kotikawatta Mulleriyawa Pradeshiya Sabha'),
(12, 01, 12, 'Colombo', 'Seethawaka Pradeshiya Sabha'),
(13, 01, 13, 'Colombo', 'Homagama Pradeshiya Sabha'),
(14, 02, 01, 'Gampaha', 'Negombo Municipal Council'),
(15, 02, 02, 'Gampaha', 'Gampaha Municipal Council'),
(16, 02, 03, 'Gampaha', 'Wattala - Mabola Urban Council'),
(17, 02, 04, 'Gampaha', 'Katunayaka - Seeduwa Urban Council'),
(18, 02, 05, 'Gampaha', 'Minuwangoda Urban Council'),
(19, 02, 06, 'Gampaha', 'Ja-Ela Urban Council'),
(20, 02, 07, 'Gampaha', 'Peliyagoda Urban Council'),
(21, 02, 08, 'Gampaha', 'Wattala Pradeshiya Sabha'),
(22, 02, 09, 'Gampaha', 'Katana Pradeshiya Sabha'),
(23, 02, 10, 'Gampaha', 'Divulapitiya Pradeshiya Sabha'),
(24, 02, 11, 'Gampaha', 'Mirigama Pradeshiya Sabha'),
(25, 02, 12, 'Gampaha', 'Minuwangoda Pradeshiya Sabha'),
(26, 02, 13, 'Gampaha', 'Attanagalla Pradeshiya Sabha'),
(27, 02, 14, 'Gampaha', 'Gampaha Pradeshiya Sabha '),
(28, 02, 15, 'Gampaha', 'Ja-Ela Pradeshiya Sabha'),
(29, 02, 16, 'Gampaha', 'Mahara Pradeshiya Sabha'),
(30, 02, 17, 'Gampaha', 'Dompe Pradeshiya Sabha'),
(31, 02, 18, 'Gampaha', 'Biyagama Pradeshiya Sabha'),
(32, 02, 19, 'Gampaha', 'Kelaniya Pradeshiya Sabha'),
(33, 03, 01, ' Kalutara', 'Panadura Urban Council'),
(34, 03, 02, ' Kalutara', 'Horana Urban Council'),
(35, 03, 03, ' Kalutara', 'Kalutara Urban Council'),
(36, 03, 04, ' Kalutara', 'Beruwala Urban Council'),
(37, 03, 05, ' Kalutara', 'Panadura Pradeshiya Sabha'),
(38, 03, 06, ' Kalutara', 'Bandaragama Pradeshiya Sabha'),
(39, 03, 07, ' Kalutara', 'Horana Pradeshiya Sabha'),
(40, 03, 08, ' Kalutara', 'Madurawala Pradeshiya Sabha'),
(41, 03, 09, ' Kalutara', 'Bulathsinhala Pradeshiya Sabha'),
(42, 03, 10, ' Kalutara', 'Mathugama Pradeshiya Sabha'),
(43, 03, 11, ' Kalutara', 'Dodangoda Pradeshiya Sabha'),
(44, 03, 12, ' Kalutara', 'Kalutara Pradeshiya Sabha'),
(45, 03, 13, ' Kalutara', 'Beruwala Pradeshiya Sabha '),
(46, 03, 14, ' Kalutara', 'Palindanuwara Pradeshiya Sabha'),
(47, 03, 15, ' Kalutara', 'Agalawaththa Pradeshiya Sabha '),
(48, 03, 16, ' Kalutara', 'Walallawita Pradeshiya Sabha'),
(49, 03, 17, ' Kalutara', 'Millaniya Pradeshiya Sabha'),
(50, 04, 01, 'Kandy', 'Kandy Municipal Council  '),
(51, 04, 02, 'Kandy', 'Wattegama Urban Council'),
(52, 04, 03, 'Kandy', 'Kadugannawa Urban Council'),
(53, 04, 04, 'Kandy', 'Gampola Urban Council'),
(54, 04, 05, 'Kandy', 'Nawalapitiya Urban Council'),
(55, 04, 06, 'Kandy', 'Thumpane Pradeshiya Sabha'),
(56, 04, 07, 'Kandy', 'Harispattuwa Pradeshiya Sabha'),
(57, 04, 08, 'Kandy', ' Akurana Pradeshiya Sabha'),
(58, 04, 09, 'Kandy', 'Poojapitiya Pradeshiya Sabha'),
(59, 04, 10, 'Kandy', 'Pathadumbara Pradeshiya Sabha'),
(60, 04, 11, 'Kandy', 'Panwila Pradeshiya Sabha'),
(61, 04, 12, 'Kandy', ' Udadumbara Pradeshiya Sabha'),
(62, 04, 13, 'Kandy', 'Minipe Pradeshiya Sabha'),
(63, 04, 14, 'Kandy', 'Medadumbara Pradeshiya Sabha'),
(64, 04, 15, 'Kandy', 'Kundasale Pradeshiya Sabha'),
(65, 04, 16, 'Kandy', 'Pathahewaheta Pradeshiya Sabha '),
(66, 04, 17, 'Kandy', 'Kandy Four Gravets and Gangawata Korale Pradeshiya Sabha'),
(67, 04, 18, 'Kandy', 'Yatinuwara Pradeshiya Sabha'),
(68, 04, 19, 'Kandy', 'Udunuwara Pradeshiya Sabha'),
(69, 04, 20, 'Kandy', 'Udapalatha Pradeshiya Sabha'),
(70, 04, 21, 'Kandy', 'Ganga Ihala Korale Pradeshiya Sabha'),
(71, 04, 22, 'Kandy', 'Pasbage Korale Pradeshiya Sabha '),
(72, 05, 01, 'Matale', 'Dambulla Municipal Council'),
(73, 05, 02, 'Matale', 'Matale Municipal Council'),
(74, 05, 03, 'Matale', 'Pallepola Pradeshiya Sabha'),
(75, 05, 04, 'Matale', 'Galewela Pradeshiya Sabha'),
(76, 05, 05, 'Matale', 'Dambulla Pradeshiya Sabha'),
(77, 05, 06, 'Matale', 'Ambanganga Korale Pradeshiya Sabha'),
(78, 05, 07, 'Matale', 'Naula Pradeshiya Sabha'),
(79, 05, 08, 'Matale', 'Laggala Pallegama Pradeshiya Sabha'),
(80, 05, 09, 'Matale', 'Wilgamuwa Pradeshiya Sabha'),
(81, 05, 10, 'Matale', 'Matale Pradeshiya Sabha'),
(82, 05, 11, 'Matale', 'Yatawatta Pradeshiya Sabha'),
(83, 05, 12, 'Matale', 'Ukuwela Pradeshiya Sabha'),
(84, 05, 13, 'Matale', 'Rathtota Pradeshiya Sabha'),
(85, 06, 01, ' Nuwara Eliya', 'Nuwara Eliya Municipal Council'),
(86, 06, 02, ' Nuwara Eliya', 'Hatton - Dickoya Urban Council'),
(87, 06, 03, ' Nuwara Eliya', 'Thalawakele Lindula Urban Council'),
(88, 06, 04, ' Nuwara Eliya', 'Ambagamuwa Pradeshiya Sabha'),
(89, 06, 05, ' Nuwara Eliya', 'Nuwara Eliya Pradeshiya Sabha'),
(90, 06, 06, ' Nuwara Eliya', 'Kothmale Pradeshiya Sabha'),
(91, 06, 07, ' Nuwara Eliya', 'Hanguranketha Pradeshiya Sabha'),
(92, 06, 08, ' Nuwara Eliya', 'Walapane Pradeshiya Sabha'),
(93, 06, 09, ' Nuwara Eliya', 'Maskeliya Pradeshiya Sabha'),
(94, 06, 10, ' Nuwara Eliya', 'Norwood Pradeshiya Sabha'),
(95, 06, 11, ' Nuwara Eliya', ' Agarapathana  Pradeshiya Sabha'),
(96, 06, 12, ' Nuwara Eliya', 'Kotagala Pradeshiya Sabha'),
(97, 07, 01, ' Galle', 'Galle Municipal Council'),
(98, 07, 02, ' Galle', 'Ambalangoda Urban Council '),
(99, 07, 03, ' Galle', 'Hikkaduwa Urban Council'),
(100, 07, 04, ' Galle', 'Balapitiya Pradeshiya Sabha'),
(101, 07, 05, ' Galle', 'Ambalangoda Pradeshiya Sabha'),
(102, 07, 06, ' Galle', 'Valivitiya Diwitura Pradeshiya Sabha'),
(103, 07, 07, ' Galle', 'Karandeniya Pradeshiya Sabha'),
(104, 07, 08, ' Galle', 'Bentota Pradeshiya Sabha'),
(105, 07, 10, ' Galle', 'Neluwa Pradeshiya Sabha'),
(106, 07, 11, ' Galle', 'Thawalama Pradeshiya Sabha'),
(107, 07, 12, ' Galle', 'Nagoda Pradeshiya Sabha'),
(108, 07, 13, ' Galle', 'Niyagama Pradeshiya Sabha'),
(109, 07, 14, ' Galle', 'Baddegama Pradeshiya Sabha'),
(110, 07, 15, ' Galle', 'Yakkalamulla Pradeshiya Sabha'),
(111, 07, 16, ' Galle', 'Rajgama Pradeshiya Sabha'),
(112, 07, 17, ' Galle', 'Akmeemana Pradeshiya Sabha'),
(113, 07, 18, ' Galle', 'Bope Poddala Pradeshiya Sabha'),
(114, 07, 19, ' Galle', 'Imaduwa Pradeshiya Sabha'),
(115, 07, 20, ' Galle', ' Habaraduwa Pradeshiya Sabha'),
(116, 08, 01, 'Matara', 'Matara Municipal Council'),
(117, 08, 02, 'Matara', 'Weligama Urban Council'),
(118, 08, 03, 'Matara', 'Pitabaddara Pradeshiya Sabha'),
(119, 08, 04, 'Matara', 'Kotapola Pradeshiya Sabha'),
(120, 08, 05, 'Matara', 'Kirinda Puhulwella Pradeshiya Sabha'),
(121, 08, 06, 'Matara', 'Mulatiyana Pradeshiya Sabha'),
(122, 08, 07, 'Matara', 'Pasgoda Pradeshiya Sabha'),
(123, 08, 08, 'Matara', 'Athuraliya Pradeshiya Sabha'),
(124, 08, 09, 'Matara', 'Akuressa Pradeshiya Sabha'),
(125, 08, 10, 'Matara', 'Malimbada Pradeshiya Sabha'),
(126, 08, 11, 'Matara', 'Hakmana Pradeshiya Sabha'),
(127, 08, 12, 'Matara', 'Kamburupitiya Pradeshiya Sabha'),
(128, 08, 13, 'Matara', 'Thihagoda Pradeshiya Sabha'),
(129, 08, 14, 'Matara', 'Dewinuwara Pradeshiya Sabha'),
(130, 08, 15, 'Matara', 'Dickwella Pradeshiya Sabha'),
(131, 08, 16, 'Matara', 'Matara Pradeshiya Sabha'),
(132, 08, 17, 'Matara', 'Weligama Pradeshiya Sabha'),
(133, 09, 01, 'Hambantota', 'Hambantota Municipal Council'),
(134, 09, 02, 'Hambantota', 'Tangalle Urban Council'),
(135, 09, 03, 'Hambantota', 'Weeraketiya Pradeshiya Sabha'),
(136, 09, 04, 'Hambantota', 'Katuwana Pradeshiya Sabha'),
(137, 09, 05, 'Hambantota', 'Beliatta Pradeshiya Sabha'),
(138, 09, 06, 'Hambantota', 'Tangalle Pradeshiya Sabha'),
(139, 09, 07, 'Hambantota', 'Angunakolapelessa Pradeshiya Sabha'),
(140, 09, 08, 'Hambantota', 'Ambalantota Pradeshiya Sabha'),
(141, 09, 09, 'Hambantota', 'Thissamaharama Pradeshiya Sabha'),
(142, 09, 10, 'Hambantota', 'Sooriyawewa Pradeshiya Sabha'),
(143, 09, 11, 'Hambantota', 'Hambantota Pradeshiya Sabha'),
(144, 09, 12, 'Hambantota', 'Lunugamwehera Pradeshiya Sabha'),
(145, 10, 01, 'Jaffna', 'Jaffna Municipal Council'),
(146, 10, 02, 'Jaffna', 'Valvettithurai Urban Council'),
(147, 10, 03, 'Jaffna', 'Point Pedro Urban Council'),
(148, 10, 04, 'Jaffna', 'Chavakachcheri Urban Council'),
(149, 10, 05, 'Jaffna', ' Karainagar Pradeshiya Sabha'),
(150, 10, 06, 'Jaffna', ' Kayts Pradeshiya Sabha'),
(151, 10, 07, 'Jaffna', 'Delft Pradeshiya Sabha'),
(152, 10, 08, 'Jaffna', 'Velanai Pradeshiya Sabha'),
(153, 10, 09, 'Jaffna', 'Walikamam West Pradeshiya Sabha'),
(154, 10, 10, 'Jaffna', 'Walikamam North Pradeshiya Sabha'),
(155, 10, 11, 'Jaffna', 'Walikamam South West Pradeshiya Sabha'),
(156, 10, 12, 'Jaffna', 'Walikamam South Pradeshiya Sabha'),
(157, 10, 13, 'Jaffna', ' Walikamam East Pradeshiya Sabha'),
(158, 10, 14, 'Jaffna', 'Vadamarachchi South West Pradeshiya Sabha'),
(159, 10, 15, 'Jaffna', 'Point Pedro Pradeshiya Sabha'),
(160, 10, 16, 'Jaffna', 'Chavakachcheri Pradeshiya Sabha'),
(161, 10, 17, 'Jaffna', 'Nallur Pradeshiya Sabha'),
(162, 11, 01, ' Kilinochchi', 'Pachchilaippalli Pradeshiya Sabha'),
(163, 11, 02, ' Kilinochchi', 'Karachchi Pradeshiya Sabha'),
(164, 11, 03, ' Kilinochchi', 'Poonakary Pradeshiya Sabha'),
(165, 12, 01, 'Mannar', 'Mannar Urban Council'),
(166, 12, 02, 'Mannar', 'Mannar Pradeshiya Sabha'),
(167, 12, 03, 'Mannar', 'Nanattan Pradeshiya Sabha'),
(168, 12, 04, 'Mannar', 'Musali Pradeshiya Sabha'),
(169, 12, 05, 'Mannar', 'Manthai West Pradeshiya Sabha'),
(170, 13, 01, 'Vavuniya', 'Vavuniya Urban Council'),
(171, 13, 02, 'Vavuniya', 'Vavuniya North Pradeshiya Sabha '),
(172, 13, 03, 'Vavuniya', 'Vengalasettikulam Pradeshiya Sabha'),
(173, 13, 04, 'Vavuniya', 'Vavuniya South (Tamil) Pradeshiya Sabha'),
(174, 13, 05, 'Vavuniya', 'Vavuniya South (Sinhala) Pradeshiya Sabha'),
(175, 14, 01, 'Mullaitivu', 'Manthai East Pradeshiya Sabha'),
(176, 14, 02, 'Mullaitivu', 'Thunukkai Pradeshiya Sabha'),
(177, 14, 03, 'Mullaitivu', 'Puthukudiyiruppu Pradeshiya Sabha'),
(178, 14, 04, 'Mullaitivu', 'Muhudubadapattu Pradeshiya Sabha '),
(179, 15, 01, 'Batticaloa', 'Batticaloa Municipal Council'),
(180, 15, 02, 'Batticaloa', 'Eravur Urban Council'),
(181, 15, 03, 'Batticaloa', 'Kattankudy Urban Council'),
(182, 15, 04, 'Batticaloa', 'Koralaipathu West Pradeshiya Sabha'),
(183, 15, 05, 'Batticaloa', 'Eravur Pattu Pradeshiya Sabha'),
(184, 15, 06, 'Batticaloa', 'Koralaipathu Pradeshiya Sabha'),
(185, 15, 07, 'Batticaloa', 'Koralaipattu North Pradeshiya Sabha'),
(186, 15, 08, 'Batticaloa', 'Manmunai South and Eruvil Pattu Pradeshiya Sabha'),
(187, 15, 09, 'Batticaloa', 'Mammunaipattu Pradeshiya Sabha'),
(188, 15, 10, 'Batticaloa', 'Manmunai West Pradeshiya Sabha'),
(189, 15, 11, 'Batticaloa', 'Manmunai South West Pradeshiya Sabha'),
(190, 15, 12, 'Batticaloa', 'Porativpattu Pradeshiya Sabha '),
(191, 16, 01, 'Ampara', 'Kalmunai Municipal Council'),
(192, 16, 02, 'Ampara', 'Akkraraipattu Municipal Council '),
(193, 16, 03, 'Ampara', 'Ampara Urban Council '),
(194, 16, 04, 'Ampara', 'Dehiaththakandiya Pradeshiya Sabha '),
(195, 16, 05, 'Ampara', 'Damana Pradeshiya Sabha '),
(196, 16, 06, 'Ampara', 'Uhana Pradeshiya Sabha '),
(197, 16, 07, 'Ampara', 'Mahaoya Pradeshiya Sabha '),
(198, 16, 08, 'Ampara', 'Namaloya Pradeshiya Sabha '),
(199, 16, 09, 'Ampara', 'Padiyathalawa Pradeshiya Sabha '),
(200, 16, 10, 'Ampara', 'Navithanveli Pradeshiya Sabha '),
(201, 16, 11, 'Ampara', 'Sammanthurai Pradeshiya Sabha '),
(202, 16, 12, 'Ampara', 'Irakkamam Pradeshiya Sabha'),
(203, 16, 13, 'Ampara', 'Akkaraipattu Pradeshiya Sabha'),
(204, 16, 14, 'Ampara', 'Potuvil Pradeshiya Sabha'),
(205, 16, 15, 'Ampara', 'Addalachchenai Pradeshiya Sabha'),
(206, 16, 16, 'Ampara', 'Alayadiwembu Pradeshiya Sabha'),
(207, 16, 17, 'Ampara', 'Lahugala Pradeshiya Sabha '),
(208, 16, 18, 'Ampara', 'Karaitheevu Pradeshiya Sabha'),
(209, 16, 19, 'Ampara', 'Nindavur Pradeshiya Sabha'),
(210, 16, 20, 'Ampara', 'Thirukkovil Pradeshiya Sabha'),
(211, 17, 01, 'Trincomalee', 'Trincomalee Urban Council'),
(212, 17, 02, 'Trincomalee', 'Kinniya Urban Council '),
(213, 17, 03, 'Trincomalee', 'Verugal Pradeshiya Sabha '),
(214, 17, 04, 'Trincomalee', 'Seruwila Pradeshiya Sabha '),
(215, 17, 05, 'Trincomalee', 'Kantale Pradeshiya Sabha '),
(216, 17, 06, 'Trincomalee', 'Morawewa Pradeshiya Sabha '),
(217, 17, 07, 'Trincomalee', 'Gomarankadawala Pradeshiya Sabha '),
(218, 17, 08, 'Trincomalee', 'Padavi Sri Pura Pradeshiya Sabha '),
(219, 17, 09, 'Trincomalee', 'Trincomalee Town and Gravets Pradeshiya Sabha '),
(220, 17, 10, 'Trincomalee', 'Kuchchaveli Pradeshiya Sabha '),
(221, 17, 11, 'Trincomalee', 'Thambalagamuwa Pradeshiya Sabha '),
(222, 17, 12, 'Trincomalee', 'Muththur Pradeshiya Sabha '),
(223, 17, 13, 'Trincomalee', 'Kinniya Pradeshiya Sabha '),
(224, 18, 01, 'Kurunegala', 'Kurunegala Municipal Council '),
(225, 18, 02, 'Kurunegala', 'Kuliyapitiya Urban Council '),
(226, 18, 03, 'Kurunegala', 'Giribawa Pradeshiya Sabha '),
(227, 18, 04, 'Kurunegala', 'Galgamuwa Pradeshiya Sabha '),
(228, 18, 05, 'Kurunegala', 'Polpithigama Pradeshiya Sabha '),
(229, 18, 06, 'Kurunegala', 'Nikaweratiya Pradeshiya Sabha '),
(230, 18, 07, 'Kurunegala', 'Kobeigane Pradeshiya Sabha '),
(231, 18, 08, 'Kurunegala', 'Mahawa Pradeshiya Sabha '),
(232, 18, 09, 'Kurunegala', 'Ibbagamuwa Pradeshiya Sabha '),
(233, 18, 10, 'Kurunegala', 'Wariyapola Pradeshiya Sabha '),
(234, 18, 11, 'Kurunegala', 'Panduwasnuwara Pradeshiya Sabha '),
(235, 18, 12, 'Kurunegala', 'Bingiriya Pradeshiya Sabha '),
(236, 18, 13, 'Kurunegala', 'Udubaddawa Pradeshiya Sabha '),
(237, 18, 14, 'Kurunegala', 'Pannala Pradeshiya Sabha '),
(238, 18, 15, 'Kurunegala', 'Kuliyapitiya Pradeshiya Sabha '),
(239, 18, 16, 'Kurunegala', 'Alawwa Pradeshiya Sabha '),
(240, 18, 17, 'Kurunegala', 'Narammala Pradeshiya Sabha '),
(241, 18, 18, 'Kurunegala', 'Polgahawela Pradeshiya Sabha '),
(242, 18, 19, 'Kurunegala', 'Kurunegala Pradeshiya Sabha '),
(243, 18, 20, 'Kurunegala', 'Mawathagama Pradeshiya Sabha '),
(244, 18, 21, 'Kurunegala', 'Rideegama Pradeshiya Sabha '),
(245, 19, 01, 'Puttalam', 'Puttalam Urban Council '),
(246, 19, 02, 'Puttalam', 'Chilaw Urban Council '),
(247, 19, 03, 'Puttalam', 'Kalpitiya Pradeshiya Sabha '),
(248, 19, 04, 'Puttalam', 'Puttalam Pradeshiya Sabha'),
(249, 19, 05, 'Puttalam', 'Wanathawilluwa Pradeshiya Sabha '),
(250, 19, 06, 'Puttalam', 'Karuwalagaswewa Pradeshiya Sabha '),
(251, 19, 07, 'Puttalam', 'Nawagattegama Pradeshiya Sabha '),
(252, 19, 08, 'Puttalam', 'Anamaduwa Pradeshiya Sabha '),
(253, 19, 09, 'Puttalam', 'Arachchikattuwa Pradeshiya Sabha '),
(254, 19, 10, 'Puttalam', 'Chilaw Pradeshiya Sabha '),
(255, 19, 11, 'Puttalam', 'Naththandiya Pradeshiya Sabha '),
(256, 19, 12, 'Puttalam', 'Wennappuwa Pradeshiya Sabha '),
(257, 20, 01, 'Anuradhapura', 'Anuradhapura Municipal Council '),
(258, 20, 02, 'Anuradhapura', 'Medawachchiya Pradeshiya Sabha'),
(259, 20, 03, 'Anuradhapura', 'Rambewa Pradeshiya Sabha '),
(260, 20, 04, 'Anuradhapura', 'Kebithigollewa Pradeshiya Sabha '),
(261, 20, 05, 'Anuradhapura', 'Padaviya Pradeshiya Sabha '),
(262, 20, 06, 'Anuradhapura', 'Kahatagasdigiliya Pradeshiya Sabha '),
(263, 20, 07, 'Anuradhapura', 'Horowpothana Pradeshiya Sabha '),
(264, 20, 08, 'Anuradhapura', 'Galenbindunuweva Pradeshiya Sabha '),
(265, 20, 09, 'Anuradhapura', 'Thalawa Pradeshiya Sabha '),
(266, 20, 10, 'Anuradhapura', 'Nuwaragampalatha East Pradeshiya Sabha '),
(267, 20, 11, 'Anuradhapura', 'Nuwaragampalatha Central Pradeshiya Sabha '),
(268, 20, 12, 'Anuradhapura', 'Nochchiyagama Pradeshiya Sabha '),
(269, 20, 13, 'Anuradhapura', 'Rajanganaya Pradeshiya Sabha '),
(270, 20, 14, 'Anuradhapura', 'Galnewa Pradeshiya Sabha '),
(271, 20, 15, 'Anuradhapura', 'Ipalogama Pradeshiya Sabha '),
(272, 20, 16, 'Anuradhapura', 'Mihintale Pradeshiya Sabha '),
(273, 20, 17, 'Anuradhapura', 'Thirappane Pradeshiya Sabha '),
(274, 20, 18, 'Anuradhapura', 'Kekirawa Pradeshiya Sabha '),
(275, 20, 19, 'Anuradhapura', 'Palagala Pradeshiya Sabha '),
(276, 21, 01, 'Polonnaruwa', 'Polonnaruwa Municipal Council'),
(277, 21, 02, 'Polonnaruwa', 'Elahera Pradeshiya Sabha '),
(278, 21, 03, 'Polonnaruwa', 'Hingurakgoda Pradeshiya Sabha '),
(279, 21, 04, 'Polonnaruwa', 'Medirigiriya Pradeshiya Sabha '),
(280, 21, 05, 'Polonnaruwa', 'Lankapura Pradeshiya Sabha'),
(281, 21, 06, 'Polonnaruwa', 'Welikanda Pradeshiya Sabha'),
(282, 21, 07, 'Polonnaruwa', 'Dimbulagala Pradeshiya Sabha'),
(283, 21, 08, 'Polonnaruwa', 'Polonnaruwa Pradeshiya Sabha'),
(284, 22, 01, 'Badulla', 'Badulla Municipal Council'),
(285, 22, 02, 'Badulla', 'Bandarawela Municipal Council'),
(286, 22, 03, 'Badulla', 'Haputhale Urban Council'),
(287, 22, 04, 'Badulla', 'Mahiyangana Pradeshiya Sabha'),
(288, 22, 05, 'Badulla', 'Rideemaliyadda Pradeshiya Sabha'),
(289, 22, 06, 'Badulla', 'Soranathota Pradeshiya Sabha'),
(290, 22, 07, 'Badulla', 'Meegahakivula Pradeshiya Sabha'),
(291, 22, 08, 'Badulla', 'Kandaketiya Pradeshiya Sabha'),
(292, 22, 09, 'Badulla', 'Passara Pradeshiya Sabha'),
(293, 22, 10, 'Badulla', 'Lunugala Pradeshiya Sabha'),
(294, 22, 11, 'Badulla', 'Badulla Pradeshiya Sabha'),
(295, 22, 12, 'Badulla', 'Hali-Ela Pradeshiya Sabha'),
(296, 22, 13, 'Badulla', 'Uva Paranagama Pradeshiya Sabha'),
(297, 22, 14, 'Badulla', 'Welimada Pradeshiya Sabha'),
(298, 22, 15, 'Badulla', 'Bandarawela Pradeshiya Sabha'),
(299, 22, 16, 'Badulla', 'Ella Pradeshiya Sabha'),
(300, 22, 17, 'Badulla', 'Haputale Pradeshiya Sabha'),
(301, 22, 18, 'Badulla', 'Haldummulla Pradeshiya Sabha'),
(302, 23, 01, 'Moneragala', 'Bibila Pradeshiya Sabha '),
(303, 23, 02, 'Moneragala', 'Medagama Pradeshiya Sabha '),
(304, 23, 03, 'Moneragala', 'Madulla Pradeshiya Sabha '),
(305, 23, 04, 'Moneragala', 'Siyambalanduwa Pradeshiya Sabha '),
(306, 23, 05, 'Moneragala', 'Moneragala Pradeshiya Sabha '),
(307, 23, 06, 'Moneragala', 'Badalkumbura Pradeshiya Sabha '),
(308, 23, 07, 'Moneragala', 'Buttala Pradeshiya Sabha '),
(309, 23, 08, 'Moneragala', 'Katharagama Pradeshiya Sabha '),
(310, 23, 09, 'Moneragala', 'Wellawaya Pradeshiya Sabha '),
(311, 23, 10, 'Moneragala', 'Thanamalwila Pradeshiya Sabha '),
(312, 24, 01, 'Ratnapura', 'Ratnapura Municipal Council '),
(313, 24, 02, 'Ratnapura', 'Balangoda Urban Council '),
(314, 24, 03, 'Ratnapura', 'Embilipitiya Urban Council '),
(315, 24, 04, 'Ratnapura', 'Eheliyagoda Pradeshiya Sabha '),
(316, 24, 05, 'Ratnapura', 'Ratnapura Pradeshiya Sabha '),
(317, 24, 06, 'Ratnapura', 'Kuruwita Pradeshiya Sabha '),
(318, 24, 07, 'Ratnapura', 'Pelmadulla Pradeshiya Sabha '),
(319, 24, 08, 'Ratnapura', 'Balangoda Pradeshiya Sabha '),
(320, 24, 09, 'Ratnapura', 'Imbulpe Pradeshiya Sabha '),
(321, 24, 10, 'Ratnapura', 'Godakawela Pradeshiya Sabha '),
(322, 24, 11, 'Ratnapura', 'Kahawatta Pradeshiya Sabha '),
(323, 24, 12, 'Ratnapura', 'Weligepola Pradeshiya Sabha '),
(324, 24, 13, 'Ratnapura', 'Nivithigala Pradeshiya Sabha '),
(325, 24, 14, 'Ratnapura', 'Ayagama Pradeshiya Sabha '),
(326, 24, 15, 'Ratnapura', 'Kalawana Pradeshiya Sabha '),
(327, 24, 16, 'Ratnapura', 'Embilipitiya Pradeshiya Sabha'),
(328, 24, 17, 'Ratnapura', 'Kolonna Pradeshiya Sabha'),
(329, 25, 01, 'Kegalle', 'Kegalle Urban Council'),
(330, 25, 02, 'Kegalle', 'Warakapola Pradeshiya Sabha'),
(331, 25, 03, 'Kegalle', 'Galigamuwa Pradeshiya Sabha'),
(332, 25, 04, 'Kegalle', 'Kegalle Pradeshiya Sabha'),
(333, 25, 05, 'Kegalle', 'Rambukkana Pradeshiya Sabha'),
(334, 25, 06, 'Kegalle', 'Mawanella Pradeshiya Sabha'),
(335, 25, 07, 'Kegalle', 'Aranayaka Pradeshiya Sabha'),
(336, 25, 08, 'Kegalle', 'Yatiyantota Pradeshiya Sabha'),
(337, 25, 09, 'Kegalle', 'Bulatkohupitiya Pradeshiya Sabha'),
(338, 25, 10, 'Kegalle', 'Ruwanwella Pradeshiya Sabha'),
(339, 25, 11, 'Kegalle', 'Deraniyagala Pradeshiya Sabha'),
(340, 25, 12, 'Kegalle', 'Dehiowita Pradeshiya Sabha'),
(341, 26, 01, 'UoKTestDS1', 'LA1'),
(342, 27, 01, 'UoKTestDS2', 'LA1'),
(343, 28, 01, 'UoKTestDS3', 'LA1'),
(344, 28, 02, 'UoKTestDS3', 'LA2'),
(345, 29, 01, 'TestUoK4', 'Test Local Auth 01');

-- --------------------------------------------------------

--
-- Table structure for table `la_party`
--

CREATE TABLE `la_party` (
  `id` int(11) NOT NULL,
  `d_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `l_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_symbl` varchar(1000) NOT NULL,
  `p_votes` double NOT NULL,
  `precentage` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_party`
--

INSERT INTO `la_party` (`id`, `d_id`, `l_id`, `p_id`, `p_name`, `p_symbl`, `p_votes`, `precentage`, `date`) VALUES
(1, 26, 01, 2, 'Party 2', '02', 2500, 48.08, '2018-02-08 05:39:55'),
(2, 26, 01, 1, 'Party 01', '01', 1500, 28.85, '2018-02-08 05:39:55'),
(3, 26, 01, 3, 'Party 03', '03', 1200, 23.08, '2018-02-08 05:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `la_party_members`
--

CREATE TABLE `la_party_members` (
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `elected_mem` int(11) NOT NULL,
  `caculated_mem` int(11) NOT NULL,
  `tot_mem` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_party_members`
--

INSERT INTO `la_party_members` (`id`, `d_id`, `l_id`, `p_id`, `elected_mem`, `caculated_mem`, `tot_mem`, `date`) VALUES
(1, 26, 1, 2, 1, 0, 1, '2018-02-08 05:39:55'),
(2, 26, 1, 1, 0, 1, 1, '2018-02-08 05:39:55'),
(3, 26, 1, 3, 0, 0, 0, '2018-02-08 05:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `p_word` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `u_name`, `p_word`) VALUES
(1, 'user2018', 'nethweb@2018');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_name_short` varchar(255) NOT NULL,
  `p_image_name` varchar(255) NOT NULL,
  `p_color` varchar(255) NOT NULL DEFAULT 'rgb(197, 17, 98)'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `p_id`, `p_name`, `p_name_short`, `p_image_name`, `p_color`) VALUES
(1, 1, 'Ahila Ilankai Thamil Congress', 'AITC', 'default.png', 'rgb(197, 17, 98)'),
(2, 2, 'Akhila Ilankai Tamil Mahasabha', 'AITM', 'default.png', 'rgb(197, 17, 98)'),
(3, 3, 'Our National Front', 'ONF', 'default.png', 'rgb(197, 17, 98)'),
(4, 4, 'All Ceylon Makkal Congress', 'ACMC', 'default.png', 'rgb(197, 17, 98)'),
(5, 5, 'Ilankai Tamil Arasu Kadchi', 'ITAK', 'itak.jpg', 'rgb(253,200,65)'),
(6, 6, 'Eelam People\'s Democratic Party', 'EPDP', 'epdp.jpg', 'rgb(191,30,46)'),
(7, 7, 'United People\'s Freedom Alliance', 'UPFA', 'upfa.png', '#276ba5'),
(8, 8, 'United National Freedom Front', 'UNFF', 'default.png', 'rgb(197, 17, 98)'),
(9, 9, 'United National Party', 'UNP', 'unp.jpg', 'rgb(11, 148, 68)'),
(10, 10, 'Democratic Unity Alliance', 'DUA', 'default.png', 'rgb(197, 17, 98)'),
(11, 11, 'United People\'s Party', 'UPP', 'default.png', 'rgb(197, 17, 98)'),
(12, 12, 'Eksath Lanka Maha Saba Party', 'ELMSP', 'default.png', 'rgb(197, 17, 98)'),
(13, 13, 'United Left Front', 'ULF', 'default.png', 'rgb(197, 17, 98)'),
(14, 14, 'United Socialist Party', 'USP', 'default.png', 'rgb(197, 17, 98)'),
(15, 15, 'United Peace Alliance', 'UPA', 'default.png', 'rgb(197, 17, 98)'),
(16, 16, 'United Progressive Alliance', 'UProA', 'default.png', 'rgb(197, 17, 98)'),
(17, 17, 'Okkoma Wasiyo Okkoma Rajawaru Sanvidanaya', 'OWORS', 'default.png', 'rgb(197, 17, 98)'),
(18, 18, 'People\'s Liberation Front', 'JVP', 'jvp.jpg', 'rgb(239, 28, 35)'),
(19, 19, 'Jana Setha Peramuna', 'JSP', 'default.png', 'rgb(197, 17, 98)'),
(20, 20, 'National Congress', 'NC', 'default.png', 'rgb(197, 17, 98)'),
(21, 21, 'National Peoples Party', 'NPP', 'default.png', 'rgb(197, 17, 98)'),
(22, 22, 'Thamil Makkal Viduthalai Pulikal', 'TMVP', 'default.png', 'rgb(197, 17, 98)'),
(23, 23, 'Social Democratic Party of Tamils', 'SDPT', 'default.png', 'rgb(197, 17, 98)'),
(24, 24, 'Tamil United Liberation Front', 'TULF', 'default.png', 'rgb(197, 17, 98)'),
(25, 25, 'Nawa Sama Samaja Party', 'NSSP', 'default.png', 'rgb(197, 17, 98)'),
(26, 26, 'Nawa Sihala Urumaya', 'NSU', 'default.png', 'rgb(197, 17, 98)'),
(27, 27, 'Democratic United National Front', 'DUNF', 'default.png', 'rgb(197, 17, 98)'),
(28, 28, 'Democratic National Movement', 'DNM', 'default.png', 'rgb(197, 17, 98)'),
(29, 29, 'Democratic National Alliance', 'DNA', 'default.png', 'rgb(197, 17, 98)'),
(30, 30, 'Democratic Left Front', 'DLF', 'default.png', 'rgb(197, 17, 98)'),
(31, 31, 'Maubima Janatha Pakshaya', 'MJP', 'default.png', 'rgb(197, 17, 98)'),
(32, 32, 'Muslim National Alliance ', 'MNA', 'default.png', 'rgb(197, 17, 98)'),
(33, 33, 'National Front for Good Governance ', 'NFGG', 'default.png', 'rgb(197, 17, 98)'),
(34, 34, 'Ceylon Worker\'s Congress (P.Wing)', 'CWC', 'default.png', 'rgb(197, 17, 98)'),
(35, 35, 'Lanka Sama Samaja Party', 'LSSP', 'default.png', 'rgb(197, 17, 98)'),
(36, 36, 'The Liberal Party', 'TLP', 'default.png', 'rgb(197, 17, 98)'),
(37, 37, 'Sri Lanka National Force', 'SLNP', 'default.png', 'rgb(197, 17, 98)'),
(38, 38, 'Sri Lanka Freedom Party', 'SLFP', 'atha.png', '#276ba5'),
(39, 39, 'Sri Lanka Podujana Peramuna', 'SLPP', 'phottuwa.png', 'rgb(157,27,37)'),
(40, 40, 'Sri Lanka Mahajana Pakshaya', 'SLMP', 'default.png', 'rgb(197, 17, 98)'),
(41, 41, 'Sri Lanka Muslim Congress', 'SLMC', 'slmc.jpg', 'rgb(139,198,62)'),
(42, 42, 'Communist Party of Sri Lanka ', 'CPSL', 'default.png', 'rgb(197, 17, 98)'),
(43, 43, 'Socialist Party of Sri Lanka', 'SPSL', 'default.png', 'rgb(197, 17, 98)'),
(44, 44, 'Socialist Equality Party', 'SEP', 'default.png', 'rgb(197, 17, 98)'),
(45, 50, 'Independent Group', 'INDEPENDENT', 'default.png', 'rgb(197, 17, 98)'),
(46, 51, 'Independent Group 1', 'INDEPENDENT01', 'default.png', 'rgb(197, 17, 98)'),
(47, 52, 'Independent Group 2', 'INDEPENDENT02', 'default.png', 'rgb(197, 17, 98)'),
(48, 53, 'Independent Group 3', 'INDEPENDENT03', 'default.png', 'rgb(197, 17, 98)'),
(49, 54, 'Independent Group 4', 'INDEPENDENT04', 'default.png', 'rgb(197, 17, 98)'),
(50, 55, 'Independent Group 5', 'INDEPENDENT05', 'default.png', 'rgb(197, 17, 98)'),
(51, 56, 'Independent Group 6', 'INDEPENDENT06', 'default.png', 'rgb(197, 17, 98)'),
(52, 57, 'Independent Group 7', 'INDEPENDENT07', 'default.png', 'rgb(197, 17, 98)'),
(53, 58, 'Independent Group 8', 'INDEPENDENT08', 'default.png', 'rgb(197, 17, 98)'),
(54, 59, 'Independent Group 9', 'INDEPENDENT09', 'default.png', 'rgb(197, 17, 98)'),
(55, 60, 'Independent Group 10', 'INDEPENDENT10', 'default.png', 'rgb(197, 17, 98)'),
(56, 91, 'Party 01', 'P01', 'default.png', 'rgb(197, 17, 98)'),
(57, 92, 'Party 02', 'P02', 'default.png', 'rgb(197, 17, 98)'),
(58, 93, 'Party 03', 'P0#', 'default.png', 'rgb(197, 17, 98)'),
(59, 96, 'Independant G1', 'INDG1', 'default.png', 'rgb(197, 17, 98)');

-- --------------------------------------------------------

--
-- Table structure for table `sammary`
--

CREATE TABLE `sammary` (
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `tot_mem` double NOT NULL,
  `tot_valid_votes` double NOT NULL,
  `rejected_votes` double NOT NULL,
  `polled_votes` double NOT NULL,
  `tot_reg_votes` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sammary`
--

INSERT INTO `sammary` (`id`, `d_id`, `l_id`, `tot_mem`, `tot_valid_votes`, `rejected_votes`, `polled_votes`, `tot_reg_votes`, `date`) VALUES
(1, 26, 1, 2, 5200, 250, 5450, 6750, '2018-02-08 05:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `tot_votes`
--

CREATE TABLE `tot_votes` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_short_name` varchar(255) NOT NULL,
  `p_image_name` varchar(255) NOT NULL,
  `p_tot_votes` double NOT NULL,
  `p_color` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tot_votes`
--

INSERT INTO `tot_votes` (`id`, `p_id`, `p_name`, `p_short_name`, `p_image_name`, `p_tot_votes`, `p_color`) VALUES
(1, 39, 'Sri Lanka Podujana Peramuna', 'SLPP', 'phottuwa.png', 0, 'rgb(157,27,37)'),
(2, 9, 'United National Party', 'UNP', 'unp.jpg', 0, 'rgb(11, 148, 68)'),
(3, 738, 'UPFA + SLFP', 'UPFA + SLFP', 'ua.png', 0, '#276ba5'),
(4, 18, 'People\'s Liberation Front', 'JVP', 'jvp.jpg', 0, 'rgb(239, 28, 35)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dis`
--
ALTER TABLE `dis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la`
--
ALTER TABLE `la`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_party`
--
ALTER TABLE `la_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_party_members`
--
ALTER TABLE `la_party_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sammary`
--
ALTER TABLE `sammary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dis`
--
ALTER TABLE `dis`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `la`
--
ALTER TABLE `la`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
--
-- AUTO_INCREMENT for table `la_party`
--
ALTER TABLE `la_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `la_party_members`
--
ALTER TABLE `la_party_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `sammary`
--
ALTER TABLE `sammary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
