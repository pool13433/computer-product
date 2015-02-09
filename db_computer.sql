-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2015 at 04:47 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE IF NOT EXISTS `accessory` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(100) NOT NULL,
  `acc_desc` text NOT NULL,
  `acc_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_createby` int(11) NOT NULL,
  `acc_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_updateby` int(11) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`acc_id`, `acc_name`, `acc_desc`, `acc_createdate`, `acc_createby`, `acc_updatedate`, `acc_updateby`) VALUES
(1, 'สายชาร์ด', 'สายชาร์ด', '2015-01-29 09:31:46', 1, '2015-01-29 09:34:32', 1),
(2, 'เมาร์ส', 'เมาร์ส', '2015-01-29 13:58:50', 1, '2015-01-29 14:02:20', 1),
(3, 'กระเป๋าโน๊ดบุ๊ค', 'กระเป๋าโน๊ดบุ๊ค', '2015-01-29 13:59:07', 1, '2015-01-29 13:59:07', 1),
(4, 'คีย์บอร์ด', 'คีย์บอร์ด', '2015-01-29 13:59:55', 1, '2015-01-29 13:59:55', 1),
(5, 'แบตเตอรี่ สำรอง', 'แบตเตอรี่ สำรอง', '2015-01-29 14:02:08', 1, '2015-01-29 14:02:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `bra_id` int(11) NOT NULL AUTO_INCREMENT,
  `bra_nameth` varchar(100) NOT NULL,
  `bra_nameeng` varchar(100) NOT NULL,
  `bra_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bra_createby` int(11) NOT NULL,
  `bra_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bra_updateby` int(11) NOT NULL,
  PRIMARY KEY (`bra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bra_id`, `bra_nameth`, `bra_nameeng`, `bra_createdate`, `bra_createby`, `bra_updatedate`, `bra_updateby`) VALUES
(4, 'เอเซ่อ', 'acer', '2015-01-26 10:08:15', 1, '2015-01-26 10:08:15', 1),
(5, 'ซัมซุง', 'SungSung', '2015-01-26 10:08:34', 1, '2015-01-26 10:08:34', 1),
(6, 'เฮสทีซี', 'HTC', '2015-01-26 10:09:24', 1, '2015-01-26 10:09:24', 1),
(7, 'Azus', 'Azus', '2015-01-26 10:09:36', 1, '2015-01-26 10:09:36', 1),
(8, 'Apple', 'Apple', '2015-01-26 10:09:51', 1, '2015-01-26 10:09:51', 1),
(9, 'Nokia', 'Nokia', '2015-01-26 10:10:10', 1, '2015-01-26 10:10:10', 1),
(10, 'DEll', 'DEll', '2015-01-26 10:30:07', 1, '2015-01-26 10:30:07', 1),
(11, 'เลโนโว่', 'Lenovo', '2015-01-26 10:39:29', 1, '2015-01-26 10:39:29', 1),
(12, 'คิงตัน', 'Kington', '2015-01-28 14:09:38', 1, '2015-01-28 14:09:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_name` varchar(100) NOT NULL,
  `col_createdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `col_createby` int(11) NOT NULL,
  `col_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `col_updateby` int(11) NOT NULL,
  PRIMARY KEY (`col_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`col_id`, `col_name`, `col_createdate`, `col_createby`, `col_updatedate`, `col_updateby`) VALUES
(3, 'แดง red', '2015-01-27 13:03:19', 1, '2015-01-27 13:03:49', 1),
(4, 'น้ำเงิน', '2015-01-27 13:03:41', 1, '2015-01-27 13:03:41', 1),
(5, 'ดำ black', '2015-01-27 13:04:01', 1, '2015-01-27 13:04:01', 1),
(6, 'ทอง', '2015-01-27 13:04:11', 1, '2015-01-27 13:04:11', 1),
(7, 'เมาส์', '2015-01-28 07:41:49', 1, '2015-01-28 07:41:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `equ_id` int(11) NOT NULL AUTO_INCREMENT,
  `equ_name` varchar(100) NOT NULL,
  `equ_desc` text NOT NULL,
  `bra_id` int(11) NOT NULL COMMENT 'รหัสยี้ห้อ',
  `col_id` int(11) NOT NULL COMMENT 'รหัสสี',
  `mod_id` int(11) NOT NULL,
  `equtyp_id` int(11) NOT NULL,
  `equ_warranty` varchar(30) NOT NULL COMMENT 'ประกัน',
  `equ_price` varchar(30) NOT NULL COMMENT 'ราคา',
  `equ_weight` varchar(30) NOT NULL,
  `equ_capacity` varchar(30) DEFAULT NULL COMMENT 'ความจุ',
  `equ_size` varchar(30) DEFAULT NULL,
  `equ_interface` varchar(30) DEFAULT NULL COMMENT '3.0 ,2.0',
  `equ_spinspeed` varchar(30) DEFAULT NULL COMMENT 'ความเร็วรอบ 5400 RPM',
  `equ_support` varchar(255) DEFAULT NULL COMMENT 'สนับสนุนระบบ ปฏิบัติการ',
  `equ_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equ_createby` int(11) NOT NULL,
  `equ_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equ_updateby` int(11) NOT NULL,
  PRIMARY KEY (`equ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equ_id`, `equ_name`, `equ_desc`, `bra_id`, `col_id`, `mod_id`, `equtyp_id`, `equ_warranty`, `equ_price`, `equ_weight`, `equ_capacity`, `equ_size`, `equ_interface`, `equ_spinspeed`, `equ_support`, `equ_createdate`, `equ_createby`, `equ_updatedate`, `equ_updateby`) VALUES
(3, 'คีบอร์ด', 'คีบอร์ด', 4, 5, 3, 4, '1', '1', '', '', '', '', '', '8', '2015-01-28 08:58:36', 1, '2015-01-29 06:40:30', 1),
(4, 'Harddisk', 'Harddisk', 4, 5, 3, 10, '1', '9000', '1', '500 GB', '2.5', '2.0,3.0', '6400', 'XP,ME,98,2000,7,8,LINUX', '2015-01-28 13:37:04', 1, '2015-01-29 05:25:35', 1),
(7, 'Keyboard', 'Keyboard', 4, 6, 3, 4, '1', '1', '1', '500 GB', '', '9.0', '', 'XP,2000,7,8,LINUX', '2015-01-28 13:41:03', 1, '2015-01-28 14:35:26', 1),
(8, 'แฟรชไดร์', 'แฟรชไดร์', 12, 4, 5, 13, '2', '259', '', '8 GB', '', '2.0', '', 'XP,98,7,8', '2015-01-28 14:11:07', 1, '2015-01-28 14:37:05', 1),
(9, 'เมาส์', 'เมาส์', 4, 5, 4, 5, '1', '259', '1', '', '', '2.0,3.0', '', 'XP,7,8', '2015-01-29 05:24:42', 1, '2015-01-29 05:24:42', 1),
(10, 'คีบอร์ด เกมเมอร์', 'คีบอร์ด เกมเมอร์', 5, 4, 6, 4, '2.5', '550', '', '', '', '2.0', '', '7,8', '2015-01-29 06:49:23', 1, '2015-01-29 06:49:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE IF NOT EXISTS `equipment_type` (
  `equtyp_id` int(11) NOT NULL AUTO_INCREMENT,
  `equtyp_name` varchar(100) NOT NULL,
  `equtyp_desc` text NOT NULL,
  `equtyp_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equtyp_createby` int(11) NOT NULL,
  `equtyp_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equtyp_updateby` int(11) NOT NULL,
  PRIMARY KEY (`equtyp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`equtyp_id`, `equtyp_name`, `equtyp_desc`, `equtyp_createdate`, `equtyp_createby`, `equtyp_updatedate`, `equtyp_updateby`) VALUES
(1, 'จอภาพ (Monitor)', 'เป็นอุปกรณ์แสดงผลที่มีความสำคัญมากที่สุด เพราะจะติดต่อโดยตรงกับผู้ใช้ ชนิดของจอภาพที่ใช้ในเครื่องพีซีโดยทั่วไปจะแบ่งได้เป็น 2 ชนิด\r\n- จอซีอาร์ที (CRT : Cathode Ray Tube)  โดยมากจะพบในคอมพิวเตอร์ตั้งโต๊ะ   ซึ่งลักษณะ จอภาพชนิดนี้จะคล้ายโทรทัศน์ ซึ่งจะใช้หลอดสุญญากาศ ', '2015-01-28 14:24:27', 1, '2015-01-28 14:29:01', 1),
(2, 'เคส (Case)', 'เคส คือ โครงหรือกล่องสำหรับประกอบอุปกรณ์ต่าง ๆ ของคอมพิวเตอร์ไว้ภายใน การเรียกชื่อ และขนาด ของเคสจะแตกต่างกันออกไป ซึ่งในปัจจุบันมีหลายแบบที่นิยมกัน แล้วแต่ผู้ซื้อจะเลือกซื้อตามความเหมาะสม ของงาน และสถานที่นั้น', '2015-01-28 14:25:01', 1, '2015-01-28 14:28:40', 1),
(3, 'พาวเวอร์ซัพพลาย (Power Supply)', 'เป็นอุปกรณ์ที่ทำหน้าที่ในการจ่ายกระแสไฟฟ้าให้กับชิ้นส่วนอุปกรณ์คอมพิวเตอร์ ซึ่งถ้าคอมพิวเตอร์มีอุปกรณ์ต่อพวงเยอะๆ เช่น ฮาร์ดดิสก์ ซีดีรอมไดรฟ์ ดีวีดีไดรฟ์ก็ควรเลือกพาวเวอร์ซัพพลายที่มีจำนวนวัตต์สูง เพื่อให้สามารถ จ่ายกระแสไฟได้เพียงพอ', '2015-01-28 14:25:13', 1, '2015-01-28 14:28:32', 1),
(4, 'คีย์บอร์ด (Keyboard)', '  เป็นอุปกรณ์ในการรับข้อมูลที่สำคัญที่สุด มีลักษณะคล้ายแป้นพิมพ์ ของเครื่องพิมพ์ดีด มีจำนวนแป้น 84 - 105 แป้น ขึ้นอยู่กับแป้นที่เป็น กลุ่มตัวเลข (Numeric keypad) กลุ่มฟังก์ชัน (Function keys) กลุ่มแป้นพิเศษ (Special-purpose keys) กลุ่มแป้นตัวอักษร (Typewriter keys) หรือกลุ่มแป้นควบคุมอื่น ๆ (Control keys) ซึ่งการสั่งงานคอมพิวเตอร์และการทำงานหลายๆ อย่างจำเป็นต้องใช้แป้นพิมพ์เป็นหลัก\r\n', '2015-01-28 14:25:25', 1, '2015-01-28 14:28:23', 1),
(5, 'เมาส์ (Mouse)', '  อุปกรณ์รับข้อมูลที่นิยมรองจากคีย์บอร์ด เมาส์จะช่วยในการบ่งชี้ตำแหน่งว่าขณะนี้กำลังอยู่ ณ จุดใดบนจอภาพ เรียกว่า "ตัวชี้ตำแหน่ง (Pointer)" ซึ่งอาศัยการเลื่อนเมาส์ แทนการกดปุ่มบังคับทิศทางบนคีย์บอร์ด', '2015-01-28 14:25:38', 1, '2015-01-28 14:28:16', 1),
(6, 'เมนบอร์ด (Main board)', '  แผ่นวงจรไฟฟ้าแผ่นใหญ่ที่รวมเอาชิ้นส่วนอิเล็กทรอนิกส์ที่สำคัญๆมาไว้ด้วยกัน ซึ่งเป็นส่วนที่ควบคุม การทำงานของ อุปกรณ์ต่างๆ ภายในพีชีทั้งหมด มีลักษณะเป็นแผ่น รูปร่างสี่เหลี่ยมแผ่นที่ใหญ่ที่สุดในพีชี ที่จะรวบรวมเอาชิปและไอชี (IC = Integrated Circuit) รวมทั้ง การ์ดต่อพ่วงอื่นๆ เอาไว้ด้วยกันบนบอร์ดเพียงอันเดียวเครื่องพีชีทุกเครื่องไม่สามารถทำงาน ได้ถ้าขาดเมนบอร์ด', '2015-01-28 14:25:50', 1, '2015-01-28 14:28:08', 1),
(7, 'ซีพียู (CPU)', 'ซีพียูหรือหน่วยประมวลผลกลาง เรียกอีกชื่อหนึ่งว่า โปรเซสเซอร์ (Processor) หรือ ชิป (chip) นับเป็นอุปกรณ์ที่มีความสำคัญมากที่สุดของฮาร์ดแวร์ เพราะมีหน้าที่ในการประมวลผลจากข้อมูลที่ผู้ใช้ป้อน เข้ามาทางอุปกรณ์นำเข้าข้อมูลตามชุดคำสั่งหรือโปรแกรมที่ผู้ใช้ต้องการใช้งาน หน่วยประมวลผลกลาง ประกอบด้วยส่วนสำคัญ 3 ส่วน คือ\r\n\r\n     1) หน่วยคำนวณและตรรกะ (Arithmetic & Logical Unit: ALU) หน่วยคำนวณตรรกะ ทำหน้าที่เหมือนกับเครื่องคำนวณอยู่ในเครื่องคอมพิวเตอร์ โดยทำงานเกี่ยวกับการคำนวณทางคณิตศาสตร์ เช่น บวก ลบ คูณ หาร อีกทั้งยังมีความสามารถอีกอย่างหนึ่งที่เครื่องคำนวณธรรมดาไม่มี คือ ความสามารถในเชิงตรรกะศาสตร์ หมายถึง ความสามารถในการเปรียบเทียบตามเงื่อนไขและกฎเกณฑ์ทางคณิตศาสตร์ เพื่อให้ได้คำตอบออกมาว่าเงื่อนไข นั้นเป็น จริง หรือ เท็จ ได้ \r\n\r\n     2) หน่วยควบคุม (Control Unit) หน่วยควบคุม ทำหน้าที่ควบคุมลำดับขั้นตอนการประมวลผล รวมไปถึงการประสานงานกับอุปกรณ์นำเข้าข้อมูล อุปกรณ์แสดงผล และหน่วยความจำสำรองด้วย ซีพียูที่มีจำหน่ายในท้องตลาด ได้แก่ Pentium III , Pentium 4 , Pentium M (Centrino) , Celeron , Dulon , Athlon ', '2015-01-28 14:26:01', 1, '2015-01-28 14:27:59', 1),
(8, 'การ์ดแสดงผล (Display Card)', '  การ์ดแสดงผลใช้สำหรับเก็บข้อมูลที่ได้รับมาจากซีพียู โดยที่การ์ดบางรุ่นสามารถประมวลผลได้ในตัวการ์ด ซึ่งจะช่วยแบ่งเบาภาระการประมวลผลให้ซีพียู จึงทำให้การทำงานของคอมพิวเตอร์นั้นเร็วขึ้นด้วย ซึ่งตัวการ์ดแสดงผลนั้นจะมีหน่วยความจำในตัวของมันเอง ถ้าตัวการ์ดมีหน่วยความจำมาก ก็จะรับข้อมูลจากซีพียูได้มากขึ้น ซึ่งจะช่วยให้การแสดงผลบนจอภาพมีความเร็วสูงขึ้นด้วย', '2015-01-28 14:26:11', 1, '2015-01-28 14:27:48', 1),
(9, 'แรม (RAM', ' RAM ย่อมาจากคำว่า Random-Access Memory เป็นหน่วยความจำหลักแต่ไม่ถาวร ซึ่งจะต้องมีไฟมาหล่อเลี้ยงอุปกรณ์ตลอดในการทำงาน โดยถ้าเกิดไฟฟ้ากระพริบหรือดับ ข้อมูลที่ถูกบันทึกไว้ในหน่วยความจำจะหายไปทันที ', '2015-01-28 14:26:22', 1, '2015-01-28 14:27:34', 1),
(10, 'ฮาร์ดดิสก์ (Hard disk)', ' เป็นอุปกรณ์ที่ใช้ในการเก็บข้อมูลหรือโปรแกรมต่างๆ ของคอมพิวเตอร์ โดยฮาร์ดดิสค์จะมีลักษณะเป็นรูปสี่เหลี่ยมที่มีเปลือกนอก เป็นโลหะแข็ง และมีแผงวงจรสำหรับการควบคุมการทำงานประกบอยู่ที่ด้านล่าง พร้อมกับช่องเสียบสายสัญญาณและสายไฟเลี้ยง ส่วนประกอบภายในจะถูกปิดผนึกไว้อย่างมิดชิด โดยฮาร์ดดิสค์ส่วนใหญ่จะประกอบด้วยแผ่นจานแม่เหล็ก(platters) สองแผ่นหรือมากกว่ามาจัด เรียงอยู่บนแกนเดียวกันเรียก Spindle ทำให้แผ่นแม่เหล็กหมุนไปพร้อม ๆ กัน จากการขับเคลื่อนของมอเตอร์ แต่ละหน้าของแผ่นจานจะมีหัวอ่านเขียนประจำเฉพาะ โดยหัวอ่านเขียนทุกหัวจะเชื่อมติดกันคล้ายหวี สามารถเคลื่อนเข้าออกระหว่างแทร็กต่าง ๆ อย่างรวดเร็ว ซึ่งอินเตอร์เฟสของฮาร์ดดิสก์ที่ใช้ในปัจจุบัน มีอยู่ 3 ชนิดด้วยกัน ', '2015-01-28 14:26:29', 1, '2015-01-28 14:27:25', 1),
(11, 'CD-ROM / CD-RW / DVD / DVD-RW', 'ป็นไดรฟ์สำหรับอ่านข้อมูลจากแผ่นซีดีรอม หรือดีวีดีรอม ซึ่งถ้าหากต้องการบันทึกข้อมูลลงบนแผ่นจะต้องใช้ไดรฟ์ที่สามารถเขียนแผ่นได้คือ CD-RW หรือ DVD-RW โดยความเร็วของ ซีดีรอมจะเรียกเป็น X เช่น 16X , 32X หรือ 52X โดยจะมี Interface เดียวกับ Harddisk', '2015-01-28 14:26:39', 1, '2015-01-28 14:27:10', 1),
(12, 'ฟล็อปปี้ดิสก์ (Floppy Disk)', ' เป็นอุปกรณ์ที่กำเนิดมาก่อนยุคของพีซีเสียอีก โดยเริ่มจากที่มีขนาด 8 นิ้ว กลายมาเป็น 5.25 นิ้ว จนมาถึงปัจจุบันซึ่งอยู่ที่ 3.5 นิ้ว ในส่วนของความจุเริ่มต้นตั้งแต่ไม่กี่ร้อยกิโลไบต์มาเป็น 1.44 เมกะไบต์ และ 2.88 เมกะไบต์ ตามลำดับ ', '2015-01-28 14:26:46', 1, '2015-01-28 14:26:58', 1),
(13, 'USB แฟลชไดรฟ์', 'Universal Serial Bus (USB) แฟลชไดรฟ์ คือ อุปกรณ์ ขนาดเล็กที่สามารถพกพา และใช้เสียบเข้ากับ USB พอร์ต ของเครื่องคอมพิวเตอร์ได้ USB แฟลชไดรฟ์ใช้เก็บข้อมูลเช่นเดียวกับฮาร์ดดิสก์ แต่แฟลชไดรฟ์สามารถถ่ายโอนข้อมูลจากคอมพิวเตอร์เครื่องหนึ่งไปยังเครื่องอื่นๆ ได้โดยสะดวก USB แฟลชไดรฟ์จะมีขนาดและรูปร่างที่แตกต่างกันไป และเก็บข้อมูลได้หลายกิกะไบต์ USB แฟลชไดรฟ์ หรือเรียกอีกอย่างว่า เพนไดรฟ์ไดรฟ์พวงกุญแจคีย์ไดรฟ์ และ คีย์หน่วยความจำ', '2015-01-28 14:36:50', 1, '2015-01-28 14:36:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nameth` varchar(100) NOT NULL,
  `mod_nameeng` varchar(100) NOT NULL,
  `bra_id` int(11) NOT NULL,
  `mod_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mod_createby` int(11) NOT NULL,
  `mod_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mod_updateby` int(11) NOT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`mod_id`, `mod_nameth`, `mod_nameeng`, `bra_id`, `mod_createdate`, `mod_createby`, `mod_updatedate`, `mod_updateby`) VALUES
(3, 'Acer 001', 'Acer 001', 4, '2015-01-26 10:38:28', 1, '2015-01-26 10:38:28', 1),
(4, 'LENOVO', 'LENOVO', 4, '2015-01-26 10:39:00', 1, '2015-01-26 10:39:00', 1),
(5, 'Kington FrashDrive', 'Kington FrashDrive', 12, '2015-01-28 14:10:22', 1, '2015-01-28 14:10:22', 1),
(6, 'ซัมซุง 0001', 'SungSung', 5, '2015-01-29 06:48:19', 1, '2015-01-29 06:48:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_fname` varchar(100) NOT NULL,
  `per_lname` varchar(100) NOT NULL,
  `per_username` varchar(100) NOT NULL,
  `per_password` varchar(50) NOT NULL,
  `per_idcard` varchar(13) NOT NULL,
  `per_address` text NOT NULL,
  `per_mobile` varchar(15) NOT NULL,
  `per_email` varchar(100) NOT NULL,
  `per_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `per_createby` int(11) NOT NULL,
  `per_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `per_updateby` int(11) NOT NULL,
  `per_status` int(11) NOT NULL COMMENT '0 = รออนุมัติ 1 = admin 2=officer 3=onwer 4=repairman',
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`per_id`, `per_fname`, `per_lname`, `per_username`, `per_password`, `per_idcard`, `per_address`, `per_mobile`, `per_email`, `per_createdate`, `per_createby`, `per_updatedate`, `per_updateby`, `per_status`) VALUES
(1, 'admin', 'admin', 'admin', '1234', '1234567890123', 'ระยอง', '1234567890', 'user@gmail.com', '2015-01-18 04:28:46', 1, '2015-01-18 15:38:28', 1, 1),
(3, 'user', 'user', 'user', '1234', '1234567890123', 'ระยอง', '1234567890', 'user@gmail.com', '2015-01-18 15:33:48', 1, '2015-01-18 15:33:48', 1, 1),
(4, 'user', 'user', 'user', '1234567', '1234567890123', 'ระยอง', '1234567890', 'user@gmail.com', '2015-01-18 15:37:17', 1, '2015-01-18 15:37:17', 1, 2),
(5, 'test', 'test', 'test', '1234', '2222222222211', 'test', '1234567890', 'poon_mp@hotmail.com', '2015-01-27 12:37:24', 0, '2015-01-27 12:37:24', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `prob_id` int(11) NOT NULL AUTO_INCREMENT,
  `prob_name` varchar(100) NOT NULL,
  `prob_desc` text NOT NULL,
  `prob_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prob_createby` int(11) NOT NULL,
  `prob_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prob_updateby` int(11) NOT NULL,
  PRIMARY KEY (`prob_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`prob_id`, `prob_name`, `prob_desc`, `prob_createdate`, `prob_createby`, `prob_updatedate`, `prob_updateby`) VALUES
(1, 'เครื่องเสีย', 'เครื่องเสีย', '2015-01-18 16:01:23', 1, '2015-01-18 16:02:49', 1),
(2, 'จอฟ้า', 'จอฟ้า', '2015-01-28 14:41:33', 1, '2015-01-28 14:41:33', 1),
(3, 'บูดเครื่องไม่ได้', 'บูดเครื่องไม่ได้', '2015-01-29 06:44:03', 1, '2015-01-29 06:44:03', 1),
(4, 'ไม่มีเสียง', 'ไม่มีเสียง', '2015-01-29 14:03:30', 1, '2015-01-29 14:03:30', 1),
(5, 'จอภาพแตก', 'จอภาพแตก', '2015-01-29 14:03:50', 1, '2015-01-29 14:03:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE IF NOT EXISTS `repair` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_code` varchar(20) NOT NULL,
  `rep_repair_createdate` date NOT NULL COMMENT 'วัน ที่รับซ่อม',
  `rep_repair_getdate` date NOT NULL COMMENT 'วันมารับของ',
  `per_id` int(11) NOT NULL COMMENT 'รหัสลุกค้า',
  `bra_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `rep_problem_other` text NOT NULL,
  `rep_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rep_createby` int(11) NOT NULL,
  `rep_updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rep_updateby` int(11) NOT NULL,
  `rep_status` int(11) NOT NULL COMMENT 'สถานะ การซ่อม (0=รอประเมิน,1=ประเมินเสร็จ รอซ่อม,2=กำลังซ่อม,3=ซ่อมเสร็จ สำเร็จ,4 = ซ่อมไม่ได้ เกิดปัญหา)',
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`rep_id`, `rep_code`, `rep_repair_createdate`, `rep_repair_getdate`, `per_id`, `bra_id`, `mod_id`, `rep_problem_other`, `rep_createdate`, `rep_createby`, `rep_updatedate`, `rep_updateby`, `rep_status`) VALUES
(1, 'RP000000000001', '2015-01-01', '2015-01-29', 3, 1, 1, '', '2015-01-29 14:13:53', 1, '2015-01-29 14:13:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repair_equipment`
--

CREATE TABLE IF NOT EXISTS `repair_equipment` (
  `repequ_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_id` int(11) NOT NULL COMMENT 'รหัสใบซ่อม',
  `equ_id` int(11) NOT NULL COMMENT 'รหัสอุปกรณ์ซ่อม',
  PRIMARY KEY (`repequ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `repair_problem`
--

CREATE TABLE IF NOT EXISTS `repair_problem` (
  `repprob_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_id` int(11) NOT NULL COMMENT 'รหัสใบซ่อม',
  `prob_id` int(11) NOT NULL COMMENT 'รหัสปัญหา',
  PRIMARY KEY (`repprob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
