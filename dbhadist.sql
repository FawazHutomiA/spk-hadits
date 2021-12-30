/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : dbhadist

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 03/05/2020 20:13:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aturan
-- ----------------------------
DROP TABLE IF EXISTS `aturan`;
CREATE TABLE `aturan`  (
  `idaturan` int(3) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idaturan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aturan
-- ----------------------------
INSERT INTO `aturan` VALUES (1, 'Hadist 1');
INSERT INTO `aturan` VALUES (2, 'Hadist 2');
INSERT INTO `aturan` VALUES (3, 'Hadist 3');

-- ----------------------------
-- Table structure for detail_aturan
-- ----------------------------
DROP TABLE IF EXISTS `detail_aturan`;
CREATE TABLE `detail_aturan`  (
  `idaturan` int(3) NULL DEFAULT NULL,
  `idrawi` int(3) NULL DEFAULT NULL,
  `adil` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tsiqah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_aturan
-- ----------------------------
INSERT INTO `detail_aturan` VALUES (1, 9, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (1, 2, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (1, 3, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (1, 1, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (1, 4, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (1, 21, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 9, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 5, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 7, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 8, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 6, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (2, 4, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (3, 10, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (3, 23, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (3, 11, 'Ya', 'Ya');
INSERT INTO `detail_aturan` VALUES (3, 12, 'Ya', 'Ya');

-- ----------------------------
-- Table structure for detail_konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `detail_konsultasi`;
CREATE TABLE `detail_konsultasi`  (
  `idkonsultasi` int(5) NOT NULL,
  `idrawi` int(3) NULL DEFAULT NULL,
  `adil` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tsiqah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_konsultasi
-- ----------------------------
INSERT INTO `detail_konsultasi` VALUES (8, 10, 'Ya', 'Ya');

-- ----------------------------
-- Table structure for konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi`  (
  `idkonsultasi` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kalimat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `hasil` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idkonsultasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------
INSERT INTO `konsultasi` VALUES (8, '2020-05-03', 'sasa', 'asa', 'Tidak Diterima');

-- ----------------------------
-- Table structure for rawi
-- ----------------------------
DROP TABLE IF EXISTS `rawi`;
CREATE TABLE `rawi`  (
  `idrawi` int(3) NOT NULL AUTO_INCREMENT,
  `nmrawi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `thn_lahir` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `thn_wafat` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idrawi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rawi
-- ----------------------------
INSERT INTO `rawi` VALUES (1, 'Samrah bin Jundab bin Hilal', '32 SH', '58 H');
INSERT INTO `rawi` VALUES (2, 'Abdur Rahman bin Abi Lailaa Yasar', '7 SH', '83 H');
INSERT INTO `rawi` VALUES (3, 'Al Hakam bin Utaibah', '23 H', '113 H');
INSERT INTO `rawi` VALUES (4, 'Syubah bin Al Hajjaj bin Al Warad', '70 H', '160 H');
INSERT INTO `rawi` VALUES (5, 'Ali bin Abi Thalib', '50 SH', '40 H');
INSERT INTO `rawi` VALUES (6, 'Ribiy bin Hirasy bin Jahsy', '14 H', '104 H');
INSERT INTO `rawi` VALUES (7, 'Manshur bin Al Mutamir', '42 H', '132 H');
INSERT INTO `rawi` VALUES (8, 'Muhammad bin Jafar', '103 H', '193 H');
INSERT INTO `rawi` VALUES (9, 'Abdullah bin Muhammad bin Abi Syaibah Ibrahim bin Utsman', '145 H', '235 H');
INSERT INTO `rawi` VALUES (10, 'Abdul Aziz bin Shuhaib', '40 H', '130 H');
INSERT INTO `rawi` VALUES (11, 'Ismail bin Ibrahim bin Muqsim', '103 H', '193 H');
INSERT INTO `rawi` VALUES (12, 'Zuhair bin Harb bin Syaddad', '144 H', '234 h');
INSERT INTO `rawi` VALUES (13, 'Dzakwan', '11 H', '101 H');
INSERT INTO `rawi` VALUES (14, 'Utsman bin Ashim bin Hushain', '38 H', '128 H');
INSERT INTO `rawi` VALUES (15, 'Wadldloh bin Abdullah', '86 H', '176 H');
INSERT INTO `rawi` VALUES (16, 'Muhammad bin Ubaid bin Hisab', '148 H', '238 H');
INSERT INTO `rawi` VALUES (17, 'Abdullah bin Umar bin Al Khattab bin Nufail', '17 SH', '73 H');
INSERT INTO `rawi` VALUES (18, 'Yahya bin Yamar', '1 SH', '89 H');
INSERT INTO `rawi` VALUES (19, 'Abdullah bin Al Buraidah bin Al Hushaib', '25 H', '115 H');
INSERT INTO `rawi` VALUES (20, 'Kahmas bin Al Hasan', '59 H', '149 H');
INSERT INTO `rawi` VALUES (21, 'Waki bin Al Jarrah bin Malih', '106 H', '196 H');
INSERT INTO `rawi` VALUES (23, 'Anas bin Malik ', '1 H', '91 H');
INSERT INTO `rawi` VALUES (24, 'Tsabit bin Aslam', '37 H', '127 H');
INSERT INTO `rawi` VALUES (25, 'Sulaiman bin Al Mughirah', '75 H', '165 H');
INSERT INTO `rawi` VALUES (26, 'Hasyim bin Al Qasim bin Muslim bin Miqsam', '117 H', '207 H');
INSERT INTO `rawi` VALUES (27, 'Amru bin Muhammad bin Bukair bin Muhammad', '142 H', '232 H');
INSERT INTO `rawi` VALUES (28, 'Khalid bin Zaid bin Kulaib', '40 SH', '50 H');
INSERT INTO `rawi` VALUES (29, 'Musa bin Thalhah bin Ubaidillah', '13 H', '103 H');
INSERT INTO `rawi` VALUES (30, 'Amru bin Abdullah bin Ubaid', '38 H', '128 H');
INSERT INTO `rawi` VALUES (31, 'Salam bin Sulaim', '89 H', '179 H');
INSERT INTO `rawi` VALUES (32, 'Yahya bin Yahya bin Bukair bin Abdur Rahman', '136 H', '226 H');
INSERT INTO `rawi` VALUES (33, 'Jabir bin Abdullah bin Amru bin Haram', '12 SH', '78 H');
INSERT INTO `rawi` VALUES (34, 'Muhammad bin Muslim bin Tadrus', '36 H', '126 H');
INSERT INTO `rawi` VALUES (35, 'Maqil bin Ubaidillah', '76 H', '166 H');
INSERT INTO `rawi` VALUES (36, 'Al Hasan bin Muhammad bin Ayan', '120 H', '210 H');
INSERT INTO `rawi` VALUES (37, 'Salamah bin Syabib', '157 H', '247 H');
INSERT INTO `rawi` VALUES (38, 'Abdullah bin Abbas bin Abdul Muthalib bin Hasyim', '22 SH', '68 H');
INSERT INTO `rawi` VALUES (39, 'Nashr bin Imran', '38 H', '128 H');
INSERT INTO `rawi` VALUES (40, 'Hammad bin Zaid bin Dirham', '89 H', '179 H');
INSERT INTO `rawi` VALUES (41, 'Khalaf bin Hisyam bin Tsalab', '139 H', '229 H');
INSERT INTO `rawi` VALUES (42, 'Saad bin Malik bin Sinan bin Ubaid', '16 SH', '74 H');
INSERT INTO `rawi` VALUES (43, 'Al Mundzir bin Malik bin Qathah', '18 H', '108 H');
INSERT INTO `rawi` VALUES (44, 'Qatadah bin Daamah bin Qatadah', '27 H', '117 H');
INSERT INTO `rawi` VALUES (45, 'Said bin Abi Urubah Mihran', '66 H', '156 H');
INSERT INTO `rawi` VALUES (46, 'Yahya bin Ayyub', '144 H', '234 H');
INSERT INTO `rawi` VALUES (47, 'Umar bin Al Khattab', '67 SH', '23 H');
INSERT INTO `rawi` VALUES (48, 'Abdur Rahman bin Shakhr', '33 SH', '57 H');
INSERT INTO `rawi` VALUES (49, 'Ubaidullah bin Abdullah bin Utbah bin Masud', '8 H', '98 H');
INSERT INTO `rawi` VALUES (50, 'Muhammad bin Muslim bin Ubaidillah bin Abdullah bin Syihab', '34 H', '124 H');
INSERT INTO `rawi` VALUES (51, 'Uqail bin Khalid bin Uqail', '54 H', '144 H');
INSERT INTO `rawi` VALUES (52, 'Laits bin Saad bin Abdur Rahman', '85 H', '175 H');
INSERT INTO `rawi` VALUES (53, 'Qutaibah bin Said bin Jamil bin Tharif bin Abdullah', '150 H', '240 H');
INSERT INTO `rawi` VALUES (54, 'Said bin Al Musayyab bin Hazan bin Abi Wahab bin Amru', '3 H', '93 H');
INSERT INTO `rawi` VALUES (55, 'Yunus bin yazid bin Abi An Najjad', '69 H', '159 H');
INSERT INTO `rawi` VALUES (56, 'Abdullah bin Wahab bin Muslim', '107 H', '197 H');
INSERT INTO `rawi` VALUES (57, 'Ahmad bin Amru bin Abdullah bin Amru As Sarh', '160 H', '250 H');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `username` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin');
INSERT INTO `users` VALUES ('pim', '8c4db68ff02f4fa64ef6cddb12e69072', 'pim', 'Pimpinan');

-- ----------------------------
-- View structure for vdetail_konsultasi
-- ----------------------------
DROP VIEW IF EXISTS `vdetail_konsultasi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vdetail_konsultasi` AS SELECT
	detail_konsultasi.idkonsultasi, 
	detail_konsultasi.idrawi, 
	rawi.nmrawi, 
	rawi.thn_lahir, 
	rawi.thn_wafat, 
	detail_konsultasi.adil, 
	detail_konsultasi.tsiqah
FROM
	detail_konsultasi
	INNER JOIN
	rawi
	ON 
		detail_konsultasi.idrawi = rawi.idrawi ;

SET FOREIGN_KEY_CHECKS = 1;
