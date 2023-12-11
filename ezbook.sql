/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306_MySQL
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : ezbook

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 11/12/2023 15:52:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adminloginlogs
-- ----------------------------
DROP TABLE IF EXISTS `adminloginlogs`;
CREATE TABLE `adminloginlogs`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `loginDateTime` datetime(0) NULL DEFAULT NULL,
  `result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adminloginlogs
-- ----------------------------
INSERT INTO `adminloginlogs` VALUES (1, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-01 17:41:35', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (2, 'unknown', '127.0.0.1', '2023-12-01 17:41:45', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (3, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-01 20:33:05', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (4, 'unknown', '127.0.0.1', '2023-12-01 20:40:02', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (5, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-01 20:40:05', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (6, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-04 12:06:39', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (7, 'unknown', '127.0.0.1', '2023-12-04 15:53:26', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (8, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-04 15:54:16', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (9, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-04 16:01:14', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (10, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-04 16:01:18', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (11, NULL, '127.0.0.1', '2023-12-04 20:59:55', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (12, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 10:21:01', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (13, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 10:21:16', 'LogOut', 'unknown');
INSERT INTO `adminloginlogs` VALUES (14, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 09:15:36', 'Multiple Site Exist.', 'unknown');
INSERT INTO `adminloginlogs` VALUES (15, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:28:11', 'LogIn', 'unknown');
INSERT INTO `adminloginlogs` VALUES (16, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:29:00', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (17, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:29:04', 'LogIn', 'unknown');
INSERT INTO `adminloginlogs` VALUES (18, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:31:15', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (19, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:31:19', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (20, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:31:34', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (21, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-05 21:31:38', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (22, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 02:16:17', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (23, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 15:33:06', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (24, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 15:58:14', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (25, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 16:42:02', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (26, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 17:07:38', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (27, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 21:09:56', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (28, 'Subhash.Chandra@nwaresoft.com', '127.0.0.1', '2023-12-06 21:21:19', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (29, 'subhash.chandra@nwaresoft.com', '127.0.0.1', '2023-12-07 19:48:31', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (30, NULL, '127.0.0.1', '2023-12-09 15:40:37', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (31, NULL, '127.0.0.1', '2023-12-09 15:47:30', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (32, NULL, '127.0.0.1', '2023-12-09 18:29:12', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (33, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 00:19:20', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (34, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 17:37:03', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (35, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 17:37:13', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (36, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 18:58:37', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (37, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 18:58:49', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (38, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 21:10:15', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (39, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 21:15:51', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (40, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 21:53:44', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (41, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-10 21:54:20', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (42, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 01:09:42', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (43, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 01:09:53', 'LogOut', 'India');
INSERT INTO `adminloginlogs` VALUES (44, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 03:28:30', 'LogIn Fail', 'India');
INSERT INTO `adminloginlogs` VALUES (45, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 03:28:50', 'LogIn Fail', 'India');
INSERT INTO `adminloginlogs` VALUES (46, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 03:29:13', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (47, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 13:43:23', 'LogIn', 'India');
INSERT INTO `adminloginlogs` VALUES (48, 'sonukumarpandit58@gmail.com', '127.0.0.1', '2023-12-11 15:32:41', 'LogOut', 'India');

-- ----------------------------
-- Table structure for bookingrecurrence
-- ----------------------------
DROP TABLE IF EXISTS `bookingrecurrence`;
CREATE TABLE `bookingrecurrence`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `userid` int(0) NULL DEFAULT NULL,
  `recurrenceType` tinyint(0) NULL DEFAULT NULL,
  `recurrenceInterval` tinyint(0) NULL DEFAULT NULL,
  `untilDate` datetime(0) NULL DEFAULT NULL,
  `daysOfWeek` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MonthIntervalDay` tinyint(0) NULL DEFAULT NULL,
  `MonthIntervalDateSelection` tinyint(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bookingrecurrence
-- ----------------------------
INSERT INTO `bookingrecurrence` VALUES (1, 1, 1, 2, '2023-09-30 00:00:00', NULL, NULL, NULL);
INSERT INTO `bookingrecurrence` VALUES (2, 1, 2, 2, '2023-12-31 00:00:00', '0,1', NULL, NULL);
INSERT INTO `bookingrecurrence` VALUES (3, 1, 2, 2, '2023-12-31 00:00:00', '0,1', NULL, NULL);
INSERT INTO `bookingrecurrence` VALUES (4, 1, 3, 2, '2024-12-22 00:00:00', NULL, 1, NULL);
INSERT INTO `bookingrecurrence` VALUES (5, 1, 3, 2, '2024-12-22 00:00:00', '0', NULL, 0);
INSERT INTO `bookingrecurrence` VALUES (6, 4, 2, 3, '2023-10-31 00:00:00', '3', NULL, NULL);

-- ----------------------------
-- Table structure for bookings
-- ----------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `BookedBy` int(0) NOT NULL,
  `SubID` int(0) NOT NULL DEFAULT 0,
  `FacID` int(0) NOT NULL,
  `RepeatGroup` int(11) UNSIGNED ZEROFILL NULL DEFAULT 00000000000,
  `BookingType` tinyint(0) NULL DEFAULT NULL,
  `BookedFor` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FromTime` datetime(0) NOT NULL,
  `ToTime` datetime(0) NOT NULL,
  `Cancelled` tinyint(0) NULL DEFAULT NULL,
  `Purpose` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `NoPlaces` int(0) NULL DEFAULT NULL,
  `AllBooking` tinyint(0) NULL DEFAULT 0,
  `ModeratedBy` int(0) NULL DEFAULT 0,
  `ModeratedByName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `CreateDate` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bookings
-- ----------------------------
INSERT INTO `bookings` VALUES (1, 1, 0, 104, 00000000000, NULL, 'for', '2023-08-02 00:00:00', '2023-08-03 00:00:00', NULL, 'info', NULL, 0, 1, 'sonu kumar pandit', '2023-08-29 09:21:59', NULL, '2023-10-31 12:33:29');
INSERT INTO `bookings` VALUES (2, 1, 0, 104, 00000000000, NULL, 'forsdsd', '2023-08-09 00:00:00', '2023-08-10 00:00:00', NULL, 'info', NULL, 0, 1, 'sonu kumar pandit', '2023-08-29 09:24:17', NULL, '2023-11-01 17:25:07');
INSERT INTO `bookings` VALUES (3, 1, 0, 104, 00000000000, NULL, 'for', '2023-08-09 00:00:00', '2023-08-10 00:00:00', NULL, 'info', NULL, 0, 1, 'sonu kumar pandit', '2023-08-29 09:24:18', NULL, '2023-11-01 16:57:31');
INSERT INTO `bookings` VALUES (4, 1, 0, 104, 00000000000, NULL, 'for', '2023-08-15 00:00:00', '2023-08-16 00:00:00', NULL, 'kkkkk', NULL, 0, 0, '', '2023-08-29 09:45:43', NULL, '2023-11-01 17:23:39');
INSERT INTO `bookings` VALUES (5, 1, 0, 104, 00000000000, NULL, 'lllll', '2023-08-09 00:00:00', '2023-08-12 00:00:00', NULL, 'mmmm', NULL, 0, 0, '', '2023-08-29 09:50:16', NULL, '2023-11-01 17:24:54');
INSERT INTO `bookings` VALUES (6, 1, 0, 109, 00000000000, NULL, 'mnmmm', '2023-08-09 00:00:00', '2023-08-10 00:00:00', NULL, 'mnmnm', NULL, 0, 0, '', '2023-08-29 12:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (7, 1, 0, 104, 00000000000, NULL, 'fsfsfs', '2023-08-31 07:30:00', '2023-08-31 08:00:00', NULL, 'sdsdsd', NULL, 0, 0, '', '2023-08-31 04:36:15', NULL, NULL);
INSERT INTO `bookings` VALUES (8, 1, 0, 106, 00000000000, NULL, 'mmsmds', '2023-08-27 08:00:00', '2023-08-27 08:30:00', NULL, 'sjskjkjsds', NULL, 0, 8, 'subhash chandra', '2023-08-31 04:40:41', NULL, '2023-11-04 14:29:04');
INSERT INTO `bookings` VALUES (9, 1, 0, 106, 00000000000, NULL, 'mmsmds', '2023-08-27 08:00:00', '2023-08-27 08:30:00', NULL, 'sjskjkjsds', NULL, 0, 0, '', '2023-08-31 04:40:42', NULL, NULL);
INSERT INTO `bookings` VALUES (10, 1, 0, 106, 00000000000, NULL, 'mnn', '2023-08-29 08:00:00', '2023-08-29 08:30:00', NULL, 'jkjkjj', NULL, 0, 0, '', '2023-08-31 05:11:18', NULL, NULL);
INSERT INTO `bookings` VALUES (11, 1, 18, 109, 00000000000, NULL, 'dsfdsfd', '2023-08-30 00:30:00', '2023-08-30 01:00:00', NULL, 'dfdsfdsfds', NULL, 0, 0, '', '2023-09-01 05:37:30', NULL, NULL);
INSERT INTO `bookings` VALUES (12, 5, 0, 104, 00000000000, NULL, 'fsfsfs', '2023-09-01 07:30:00', '2023-09-01 08:00:00', NULL, 'KKKK', NULL, 0, 0, '', '2023-09-01 10:56:49', NULL, NULL);
INSERT INTO `bookings` VALUES (13, 5, 0, 104, 00000000000, NULL, 'SDFSADSA', '2023-09-02 07:30:00', '2023-09-02 08:00:00', NULL, 'SADSADSAD', NULL, 0, 0, '', '2023-09-01 10:59:30', NULL, NULL);
INSERT INTO `bookings` VALUES (14, 5, 0, 104, 00000000000, NULL, 'SDASD', '2023-09-01 08:30:00', '2023-09-01 09:00:00', NULL, 'SADAS', NULL, 0, 0, '', '2023-09-01 11:00:05', NULL, NULL);
INSERT INTO `bookings` VALUES (15, 5, 0, 104, 00000000000, NULL, 'dfssd', '2023-09-02 09:00:00', '2023-09-02 09:30:00', NULL, 'sds', NULL, 0, 0, '', '2023-09-01 11:04:30', NULL, NULL);
INSERT INTO `bookings` VALUES (16, 5, 0, 109, 00000000000, NULL, 'sdadsazxx', '2023-08-30 08:00:00', '2023-08-30 08:30:00', NULL, 'zxxzz', NULL, 0, 0, '', '2023-09-01 11:05:05', NULL, NULL);
INSERT INTO `bookings` VALUES (17, 5, 0, 109, 00000000000, NULL, 'sdadsazxx', '2023-08-30 08:00:00', '2023-08-30 08:30:00', NULL, 'zxxzz', NULL, 0, 0, '', '2023-09-01 11:05:06', NULL, NULL);
INSERT INTO `bookings` VALUES (18, 5, 0, 109, 00000000000, NULL, 'sdadsazxx', '2023-08-30 08:00:00', '2023-08-30 08:30:00', NULL, 'zxxzz', NULL, 0, 0, '', '2023-09-01 11:05:06', NULL, NULL);
INSERT INTO `bookings` VALUES (19, 5, 0, 109, 00000000000, NULL, 'sdadsazxx', '2023-08-30 08:00:00', '2023-08-30 08:30:00', NULL, 'zxxzz', NULL, 0, 0, '', '2023-09-01 11:05:06', NULL, NULL);
INSERT INTO `bookings` VALUES (21, 1, 0, 106, 00000000000, NULL, 'saaaaa', '2023-09-08 08:00:00', '2023-09-06 08:30:00', NULL, 'zxzxz', NULL, 0, 0, '', '2023-09-05 08:53:55', NULL, NULL);
INSERT INTO `bookings` VALUES (24, 1, 0, 104, 00000000000, NULL, 'Test1', '2023-09-05 07:00:00', '2023-09-05 07:30:00', NULL, 'test1', NULL, 0, 0, '', '2023-09-05 11:02:35', NULL, NULL);
INSERT INTO `bookings` VALUES (25, 1, 18, 109, 00000000000, NULL, 'zxzxz', '2023-09-12 00:30:00', '2023-09-12 01:00:00', NULL, 'xzzz', NULL, 0, 0, '', '2023-09-11 10:43:01', NULL, NULL);
INSERT INTO `bookings` VALUES (26, 1, 19, 109, 00000000000, NULL, 'wqqww', '2023-09-13 00:30:00', '2023-09-13 01:00:00', NULL, 'wqewqq', NULL, 0, 0, '', '2023-09-11 10:43:45', NULL, NULL);
INSERT INTO `bookings` VALUES (28, 1, 19, 109, 00000000001, 1, 'sdadsazxx', '2023-09-20 06:00:00', '2023-09-20 06:30:00', NULL, 'sdsd', NULL, 0, 0, '', '2023-09-22 18:14:27', NULL, NULL);
INSERT INTO `bookings` VALUES (29, 1, 19, 109, 00000000001, 1, 'sdadsazxx', '2023-09-22 06:00:00', '2023-09-22 06:30:00', NULL, 'sdsd', NULL, 0, 0, '', '2023-09-22 18:14:27', NULL, NULL);
INSERT INTO `bookings` VALUES (30, 1, 19, 109, 00000000001, 1, 'sdadsazxx', '2023-09-24 06:00:00', '2023-09-24 06:30:00', NULL, 'sdsd', NULL, 0, 0, '', '2023-09-22 18:14:27', NULL, NULL);
INSERT INTO `bookings` VALUES (31, 1, 19, 109, 00000000001, 1, 'sdad', '2023-09-26 06:00:00', '2023-09-26 06:30:00', NULL, 'sdsd', NULL, 0, 0, '', '2023-09-22 18:14:27', NULL, NULL);
INSERT INTO `bookings` VALUES (32, 1, 19, 109, 00000000001, 1, 'sdadsazxx', '2023-09-28 06:00:00', '2023-09-28 06:30:00', NULL, 'sdsd', NULL, 0, 0, '', '2023-09-22 18:14:27', NULL, NULL);
INSERT INTO `bookings` VALUES (33, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-10-08 06:30:00', '2023-10-08 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (34, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-10-08 06:30:00', '2023-10-08 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (35, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-10-09 06:30:00', '2023-10-09 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (36, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-10-09 06:30:00', '2023-10-09 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (37, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-11-12 06:30:00', '2023-11-12 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (38, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-11-13 06:30:00', '2023-11-13 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (39, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-11-12 06:30:00', '2023-11-12 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (40, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-12-10 06:30:00', '2023-12-10 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (41, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-11-13 06:30:00', '2023-11-13 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (42, 1, 18, 109, 00000000002, 1, 'fsnmmn', '2023-12-11 06:30:00', '2023-12-11 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (43, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-12-10 06:30:00', '2023-12-10 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (44, 1, 18, 109, 00000000003, 1, 'fsnmmn', '2023-12-11 06:30:00', '2023-12-11 07:00:00', NULL, 'as', NULL, 0, 0, '', '2023-09-22 18:17:13', NULL, NULL);
INSERT INTO `bookings` VALUES (45, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2023-09-01 07:00:00', '2023-09-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (46, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2023-11-01 07:00:00', '2023-11-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (47, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-01-01 07:00:00', '2024-01-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (48, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-03-01 07:00:00', '2024-03-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (49, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-05-01 07:00:00', '2024-05-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (50, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-07-01 07:00:00', '2024-07-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (51, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-09-01 07:00:00', '2024-09-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (52, 1, 18, 109, 00000000004, 1, 'fsfsfs', '2024-11-01 07:00:00', '2024-11-01 07:30:00', NULL, 'jhj', NULL, 0, 0, '', '2023-09-22 18:26:16', NULL, NULL);
INSERT INTO `bookings` VALUES (53, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2023-11-05 07:00:00', '2023-11-05 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (54, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-02-04 07:00:00', '2024-02-04 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (55, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-04-07 07:00:00', '2024-04-07 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (56, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-06-02 07:00:00', '2024-06-02 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (57, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-08-04 07:00:00', '2024-08-04 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (58, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-09-01 07:00:00', '2024-09-01 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (59, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-10-06 07:00:00', '2024-10-06 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (60, 1, 18, 109, 00000000005, 1, 'fsfsfs', '2024-11-03 07:00:00', '2024-11-03 07:30:00', NULL, 'ghg', NULL, 0, 0, '', '2023-09-22 18:27:23', NULL, NULL);
INSERT INTO `bookings` VALUES (61, 4, 0, 53, 00000000000, NULL, 'Bhuwan Sharma', '2023-10-03 11:00:00', '2023-10-03 11:30:00', NULL, 'test booking', NULL, 0, 0, '', '2023-10-02 03:44:57', NULL, NULL);
INSERT INTO `bookings` VALUES (63, 4, 0, 10, 00000000006, 1, 'Bhuwan Sharma', '2023-10-18 08:30:00', '2023-10-18 09:00:00', NULL, NULL, NULL, 0, 0, '', '2023-10-02 06:56:26', NULL, '2023-10-31 12:19:20');
INSERT INTO `bookings` VALUES (64, 4, 0, 10, 00000000000, NULL, 'hghgg', '2023-10-02 02:30:00', '2023-10-02 03:00:00', NULL, 'llkllklk', NULL, 0, 1, 'sonu kumar pandit', '2023-10-02 06:56:41', NULL, '2023-10-31 12:24:53');
INSERT INTO `bookings` VALUES (65, 6, 0, 104, 00000000000, NULL, NULL, '2023-10-26 11:35:00', '2023-10-02 07:00:00', NULL, NULL, NULL, 0, 0, '', '2023-10-03 14:43:01', NULL, NULL);
INSERT INTO `bookings` VALUES (66, 6, 0, 104, 00000000000, NULL, NULL, '2023-10-01 01:30:00', '2023-10-01 02:00:00', NULL, NULL, NULL, 0, 0, '', '2023-10-03 14:43:11', NULL, NULL);
INSERT INTO `bookings` VALUES (67, 4, 0, 104, 00000000000, NULL, NULL, '2023-10-12 10:30:00', '2023-10-12 10:00:00', NULL, NULL, NULL, 0, 0, '', '2023-10-03 16:35:51', NULL, NULL);
INSERT INTO `bookings` VALUES (68, 8, 0, 112, 00000000000, NULL, 'bbb', '2023-10-05 06:30:00', '2023-10-05 07:00:00', NULL, 'nnn', NULL, 0, 0, '', '2023-10-04 16:26:25', NULL, NULL);
INSERT INTO `bookings` VALUES (69, 8, 0, 114, 00000000000, NULL, 'sds for', '2023-10-27 07:00:00', '2023-10-27 07:30:00', NULL, 'sds info', NULL, 0, 0, '', '2023-10-26 09:53:06', NULL, NULL);
INSERT INTO `bookings` VALUES (70, 8, 0, 106, 00000000000, NULL, 'nbn', '2023-10-23 06:30:00', '2023-10-23 07:00:00', NULL, 'jjj', NULL, 0, 0, '', '2023-10-27 16:24:58', NULL, NULL);

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `code` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 253 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, 'AF', 'Afghanistan');
INSERT INTO `countries` VALUES (2, 'AX', 'Aland Islands');
INSERT INTO `countries` VALUES (3, 'AL', 'Albania');
INSERT INTO `countries` VALUES (4, 'DZ', 'Algeria');
INSERT INTO `countries` VALUES (5, 'AS', 'American Samoa');
INSERT INTO `countries` VALUES (6, 'AD', 'Andorra');
INSERT INTO `countries` VALUES (7, 'AO', 'Angola');
INSERT INTO `countries` VALUES (8, 'AI', 'Anguilla');
INSERT INTO `countries` VALUES (9, 'AQ', 'Antarctica');
INSERT INTO `countries` VALUES (10, 'AG', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES (11, 'AR', 'Argentina');
INSERT INTO `countries` VALUES (12, 'AM', 'Armenia');
INSERT INTO `countries` VALUES (13, 'AW', 'Aruba');
INSERT INTO `countries` VALUES (14, 'AU', 'Australia');
INSERT INTO `countries` VALUES (15, 'AT', 'Austria');
INSERT INTO `countries` VALUES (16, 'AZ', 'Azerbaijan');
INSERT INTO `countries` VALUES (17, 'BS', 'Bahamas');
INSERT INTO `countries` VALUES (18, 'BH', 'Bahrain');
INSERT INTO `countries` VALUES (19, 'BD', 'Bangladesh');
INSERT INTO `countries` VALUES (20, 'BB', 'Barbados');
INSERT INTO `countries` VALUES (21, 'BY', 'Belarus');
INSERT INTO `countries` VALUES (22, 'BE', 'Belgium');
INSERT INTO `countries` VALUES (23, 'BZ', 'Belize');
INSERT INTO `countries` VALUES (24, 'BJ', 'Benin');
INSERT INTO `countries` VALUES (25, 'BM', 'Bermuda');
INSERT INTO `countries` VALUES (26, 'BT', 'Bhutan');
INSERT INTO `countries` VALUES (27, 'BO', 'Bolivia');
INSERT INTO `countries` VALUES (28, 'BQ', 'Bonaire, Sint Eustatius and Saba');
INSERT INTO `countries` VALUES (29, 'BA', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES (30, 'BW', 'Botswana');
INSERT INTO `countries` VALUES (31, 'BV', 'Bouvet Island');
INSERT INTO `countries` VALUES (32, 'BR', 'Brazil');
INSERT INTO `countries` VALUES (33, 'IO', 'British Indian Ocean Territory');
INSERT INTO `countries` VALUES (34, 'BN', 'Brunei Darussalam');
INSERT INTO `countries` VALUES (35, 'BG', 'Bulgaria');
INSERT INTO `countries` VALUES (36, 'BF', 'Burkina Faso');
INSERT INTO `countries` VALUES (37, 'BI', 'Burundi');
INSERT INTO `countries` VALUES (38, 'KH', 'Cambodia');
INSERT INTO `countries` VALUES (39, 'CM', 'Cameroon');
INSERT INTO `countries` VALUES (40, 'CA', 'Canada');
INSERT INTO `countries` VALUES (41, 'CV', 'Cape Verde');
INSERT INTO `countries` VALUES (42, 'KY', 'Cayman Islands');
INSERT INTO `countries` VALUES (43, 'CF', 'Central African Republic');
INSERT INTO `countries` VALUES (44, 'TD', 'Chad');
INSERT INTO `countries` VALUES (45, 'CL', 'Chile');
INSERT INTO `countries` VALUES (46, 'CN', 'China');
INSERT INTO `countries` VALUES (47, 'CX', 'Christmas Island');
INSERT INTO `countries` VALUES (48, 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES (49, 'CO', 'Colombia');
INSERT INTO `countries` VALUES (50, 'KM', 'Comoros');
INSERT INTO `countries` VALUES (51, 'CG', 'Congo');
INSERT INTO `countries` VALUES (52, 'CD', 'Congo, Democratic Republic of the Congo');
INSERT INTO `countries` VALUES (53, 'CK', 'Cook Islands');
INSERT INTO `countries` VALUES (54, 'CR', 'Costa Rica');
INSERT INTO `countries` VALUES (55, 'CI', 'Cote D\'Ivoire');
INSERT INTO `countries` VALUES (56, 'HR', 'Croatia');
INSERT INTO `countries` VALUES (57, 'CU', 'Cuba');
INSERT INTO `countries` VALUES (58, 'CW', 'Curacao');
INSERT INTO `countries` VALUES (59, 'CY', 'Cyprus');
INSERT INTO `countries` VALUES (60, 'CZ', 'Czech Republic');
INSERT INTO `countries` VALUES (61, 'DK', 'Denmark');
INSERT INTO `countries` VALUES (62, 'DJ', 'Djibouti');
INSERT INTO `countries` VALUES (63, 'DM', 'Dominica');
INSERT INTO `countries` VALUES (64, 'DO', 'Dominican Republic');
INSERT INTO `countries` VALUES (65, 'EC', 'Ecuador');
INSERT INTO `countries` VALUES (66, 'EG', 'Egypt');
INSERT INTO `countries` VALUES (67, 'SV', 'El Salvador');
INSERT INTO `countries` VALUES (68, 'GQ', 'Equatorial Guinea');
INSERT INTO `countries` VALUES (69, 'ER', 'Eritrea');
INSERT INTO `countries` VALUES (70, 'EE', 'Estonia');
INSERT INTO `countries` VALUES (71, 'ET', 'Ethiopia');
INSERT INTO `countries` VALUES (72, 'FK', 'Falkland Islands (Malvinas)');
INSERT INTO `countries` VALUES (73, 'FO', 'Faroe Islands');
INSERT INTO `countries` VALUES (74, 'FJ', 'Fiji');
INSERT INTO `countries` VALUES (75, 'FI', 'Finland');
INSERT INTO `countries` VALUES (76, 'FR', 'France');
INSERT INTO `countries` VALUES (77, 'GF', 'French Guiana');
INSERT INTO `countries` VALUES (78, 'PF', 'French Polynesia');
INSERT INTO `countries` VALUES (79, 'TF', 'French Southern Territories');
INSERT INTO `countries` VALUES (80, 'GA', 'Gabon');
INSERT INTO `countries` VALUES (81, 'GM', 'Gambia');
INSERT INTO `countries` VALUES (82, 'GE', 'Georgia');
INSERT INTO `countries` VALUES (83, 'DE', 'Germany');
INSERT INTO `countries` VALUES (84, 'GH', 'Ghana');
INSERT INTO `countries` VALUES (85, 'GI', 'Gibraltar');
INSERT INTO `countries` VALUES (86, 'GR', 'Greece');
INSERT INTO `countries` VALUES (87, 'GL', 'Greenland');
INSERT INTO `countries` VALUES (88, 'GD', 'Grenada');
INSERT INTO `countries` VALUES (89, 'GP', 'Guadeloupe');
INSERT INTO `countries` VALUES (90, 'GU', 'Guam');
INSERT INTO `countries` VALUES (91, 'GT', 'Guatemala');
INSERT INTO `countries` VALUES (92, 'GG', 'Guernsey');
INSERT INTO `countries` VALUES (93, 'GN', 'Guinea');
INSERT INTO `countries` VALUES (94, 'GW', 'Guinea-Bissau');
INSERT INTO `countries` VALUES (95, 'GY', 'Guyana');
INSERT INTO `countries` VALUES (96, 'HT', 'Haiti');
INSERT INTO `countries` VALUES (97, 'HM', 'Heard Island and Mcdonald Islands');
INSERT INTO `countries` VALUES (98, 'VA', 'Holy See (Vatican City State)');
INSERT INTO `countries` VALUES (99, 'HN', 'Honduras');
INSERT INTO `countries` VALUES (100, 'HK', 'Hong Kong');
INSERT INTO `countries` VALUES (101, 'HU', 'Hungary');
INSERT INTO `countries` VALUES (102, 'IS', 'Iceland');
INSERT INTO `countries` VALUES (103, 'IN', 'India');
INSERT INTO `countries` VALUES (104, 'ID', 'Indonesia');
INSERT INTO `countries` VALUES (105, 'IR', 'Iran, Islamic Republic of');
INSERT INTO `countries` VALUES (106, 'IQ', 'Iraq');
INSERT INTO `countries` VALUES (107, 'IE', 'Ireland');
INSERT INTO `countries` VALUES (108, 'IM', 'Isle of Man');
INSERT INTO `countries` VALUES (109, 'IL', 'Israel');
INSERT INTO `countries` VALUES (110, 'IT', 'Italy');
INSERT INTO `countries` VALUES (111, 'JM', 'Jamaica');
INSERT INTO `countries` VALUES (112, 'JP', 'Japan');
INSERT INTO `countries` VALUES (113, 'JE', 'Jersey');
INSERT INTO `countries` VALUES (114, 'JO', 'Jordan');
INSERT INTO `countries` VALUES (115, 'KZ', 'Kazakhstan');
INSERT INTO `countries` VALUES (116, 'KE', 'Kenya');
INSERT INTO `countries` VALUES (117, 'KI', 'Kiribati');
INSERT INTO `countries` VALUES (118, 'KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `countries` VALUES (119, 'KR', 'Korea, Republic of');
INSERT INTO `countries` VALUES (120, 'XK', 'Kosovo');
INSERT INTO `countries` VALUES (121, 'KW', 'Kuwait');
INSERT INTO `countries` VALUES (122, 'KG', 'Kyrgyzstan');
INSERT INTO `countries` VALUES (123, 'LA', 'Lao People\'s Democratic Republic');
INSERT INTO `countries` VALUES (124, 'LV', 'Latvia');
INSERT INTO `countries` VALUES (125, 'LB', 'Lebanon');
INSERT INTO `countries` VALUES (126, 'LS', 'Lesotho');
INSERT INTO `countries` VALUES (127, 'LR', 'Liberia');
INSERT INTO `countries` VALUES (128, 'LY', 'Libyan Arab Jamahiriya');
INSERT INTO `countries` VALUES (129, 'LI', 'Liechtenstein');
INSERT INTO `countries` VALUES (130, 'LT', 'Lithuania');
INSERT INTO `countries` VALUES (131, 'LU', 'Luxembourg');
INSERT INTO `countries` VALUES (132, 'MO', 'Macao');
INSERT INTO `countries` VALUES (133, 'MK', 'Macedonia, the Former Yugoslav Republic of');
INSERT INTO `countries` VALUES (134, 'MG', 'Madagascar');
INSERT INTO `countries` VALUES (135, 'MW', 'Malawi');
INSERT INTO `countries` VALUES (136, 'MY', 'Malaysia');
INSERT INTO `countries` VALUES (137, 'MV', 'Maldives');
INSERT INTO `countries` VALUES (138, 'ML', 'Mali');
INSERT INTO `countries` VALUES (139, 'MT', 'Malta');
INSERT INTO `countries` VALUES (140, 'MH', 'Marshall Islands');
INSERT INTO `countries` VALUES (141, 'MQ', 'Martinique');
INSERT INTO `countries` VALUES (142, 'MR', 'Mauritania');
INSERT INTO `countries` VALUES (143, 'MU', 'Mauritius');
INSERT INTO `countries` VALUES (144, 'YT', 'Mayotte');
INSERT INTO `countries` VALUES (145, 'MX', 'Mexico');
INSERT INTO `countries` VALUES (146, 'FM', 'Micronesia, Federated States of');
INSERT INTO `countries` VALUES (147, 'MD', 'Moldova, Republic of');
INSERT INTO `countries` VALUES (148, 'MC', 'Monaco');
INSERT INTO `countries` VALUES (149, 'MN', 'Mongolia');
INSERT INTO `countries` VALUES (150, 'ME', 'Montenegro');
INSERT INTO `countries` VALUES (151, 'MS', 'Montserrat');
INSERT INTO `countries` VALUES (152, 'MA', 'Morocco');
INSERT INTO `countries` VALUES (153, 'MZ', 'Mozambique');
INSERT INTO `countries` VALUES (154, 'MM', 'Myanmar');
INSERT INTO `countries` VALUES (155, 'NA', 'Namibia');
INSERT INTO `countries` VALUES (156, 'NR', 'Nauru');
INSERT INTO `countries` VALUES (157, 'NP', 'Nepal');
INSERT INTO `countries` VALUES (158, 'NL', 'Netherlands');
INSERT INTO `countries` VALUES (159, 'AN', 'Netherlands Antilles');
INSERT INTO `countries` VALUES (160, 'NC', 'New Caledonia');
INSERT INTO `countries` VALUES (161, 'NZ', 'New Zealand');
INSERT INTO `countries` VALUES (162, 'NI', 'Nicaragua');
INSERT INTO `countries` VALUES (163, 'NE', 'Niger');
INSERT INTO `countries` VALUES (164, 'NG', 'Nigeria');
INSERT INTO `countries` VALUES (165, 'NU', 'Niue');
INSERT INTO `countries` VALUES (166, 'NF', 'Norfolk Island');
INSERT INTO `countries` VALUES (167, 'MP', 'Northern Mariana Islands');
INSERT INTO `countries` VALUES (168, 'NO', 'Norway');
INSERT INTO `countries` VALUES (169, 'OM', 'Oman');
INSERT INTO `countries` VALUES (170, 'PK', 'Pakistan');
INSERT INTO `countries` VALUES (171, 'PW', 'Palau');
INSERT INTO `countries` VALUES (172, 'PS', 'Palestinian Territory, Occupied');
INSERT INTO `countries` VALUES (173, 'PA', 'Panama');
INSERT INTO `countries` VALUES (174, 'PG', 'Papua New Guinea');
INSERT INTO `countries` VALUES (175, 'PY', 'Paraguay');
INSERT INTO `countries` VALUES (176, 'PE', 'Peru');
INSERT INTO `countries` VALUES (177, 'PH', 'Philippines');
INSERT INTO `countries` VALUES (178, 'PN', 'Pitcairn');
INSERT INTO `countries` VALUES (179, 'PL', 'Poland');
INSERT INTO `countries` VALUES (180, 'PT', 'Portugal');
INSERT INTO `countries` VALUES (181, 'PR', 'Puerto Rico');
INSERT INTO `countries` VALUES (182, 'QA', 'Qatar');
INSERT INTO `countries` VALUES (183, 'RE', 'Reunion');
INSERT INTO `countries` VALUES (184, 'RO', 'Romania');
INSERT INTO `countries` VALUES (185, 'RU', 'Russian Federation');
INSERT INTO `countries` VALUES (186, 'RW', 'Rwanda');
INSERT INTO `countries` VALUES (187, 'BL', 'Saint Barthelemy');
INSERT INTO `countries` VALUES (188, 'SH', 'Saint Helena');
INSERT INTO `countries` VALUES (189, 'KN', 'Saint Kitts and Nevis');
INSERT INTO `countries` VALUES (190, 'LC', 'Saint Lucia');
INSERT INTO `countries` VALUES (191, 'MF', 'Saint Martin');
INSERT INTO `countries` VALUES (192, 'PM', 'Saint Pierre and Miquelon');
INSERT INTO `countries` VALUES (193, 'VC', 'Saint Vincent and the Grenadines');
INSERT INTO `countries` VALUES (194, 'WS', 'Samoa');
INSERT INTO `countries` VALUES (195, 'SM', 'San Marino');
INSERT INTO `countries` VALUES (196, 'ST', 'Sao Tome and Principe');
INSERT INTO `countries` VALUES (197, 'SA', 'Saudi Arabia');
INSERT INTO `countries` VALUES (198, 'SN', 'Senegal');
INSERT INTO `countries` VALUES (199, 'RS', 'Serbia');
INSERT INTO `countries` VALUES (200, 'CS', 'Serbia and Montenegro');
INSERT INTO `countries` VALUES (201, 'SC', 'Seychelles');
INSERT INTO `countries` VALUES (202, 'SL', 'Sierra Leone');
INSERT INTO `countries` VALUES (203, 'SG', 'Singapore');
INSERT INTO `countries` VALUES (204, 'SX', 'Sint Maarten');
INSERT INTO `countries` VALUES (205, 'SK', 'Slovakia');
INSERT INTO `countries` VALUES (206, 'SI', 'Slovenia');
INSERT INTO `countries` VALUES (207, 'SB', 'Solomon Islands');
INSERT INTO `countries` VALUES (208, 'SO', 'Somalia');
INSERT INTO `countries` VALUES (209, 'ZA', 'South Africa');
INSERT INTO `countries` VALUES (210, 'GS', 'South Georgia and the South Sandwich Islands');
INSERT INTO `countries` VALUES (211, 'SS', 'South Sudan');
INSERT INTO `countries` VALUES (212, 'ES', 'Spain');
INSERT INTO `countries` VALUES (213, 'LK', 'Sri Lanka');
INSERT INTO `countries` VALUES (214, 'SD', 'Sudan');
INSERT INTO `countries` VALUES (215, 'SR', 'Suriname');
INSERT INTO `countries` VALUES (216, 'SJ', 'Svalbard and Jan Mayen');
INSERT INTO `countries` VALUES (217, 'SZ', 'Swaziland');
INSERT INTO `countries` VALUES (218, 'SE', 'Sweden');
INSERT INTO `countries` VALUES (219, 'CH', 'Switzerland');
INSERT INTO `countries` VALUES (220, 'SY', 'Syrian Arab Republic');
INSERT INTO `countries` VALUES (221, 'TW', 'Taiwan, Province of China');
INSERT INTO `countries` VALUES (222, 'TJ', 'Tajikistan');
INSERT INTO `countries` VALUES (223, 'TZ', 'Tanzania, United Republic of');
INSERT INTO `countries` VALUES (224, 'TH', 'Thailand');
INSERT INTO `countries` VALUES (225, 'TL', 'Timor-Leste');
INSERT INTO `countries` VALUES (226, 'TG', 'Togo');
INSERT INTO `countries` VALUES (227, 'TK', 'Tokelau');
INSERT INTO `countries` VALUES (228, 'TO', 'Tonga');
INSERT INTO `countries` VALUES (229, 'TT', 'Trinidad and Tobago');
INSERT INTO `countries` VALUES (230, 'TN', 'Tunisia');
INSERT INTO `countries` VALUES (231, 'TR', 'Turkey');
INSERT INTO `countries` VALUES (232, 'TM', 'Turkmenistan');
INSERT INTO `countries` VALUES (233, 'TC', 'Turks and Caicos Islands');
INSERT INTO `countries` VALUES (234, 'TV', 'Tuvalu');
INSERT INTO `countries` VALUES (235, 'UG', 'Uganda');
INSERT INTO `countries` VALUES (236, 'UA', 'Ukraine');
INSERT INTO `countries` VALUES (237, 'AE', 'United Arab Emirates');
INSERT INTO `countries` VALUES (238, 'GB', 'United Kingdom');
INSERT INTO `countries` VALUES (239, 'US', 'United States');
INSERT INTO `countries` VALUES (240, 'UM', 'United States Minor Outlying Islands');
INSERT INTO `countries` VALUES (241, 'UY', 'Uruguay');
INSERT INTO `countries` VALUES (242, 'UZ', 'Uzbekistan');
INSERT INTO `countries` VALUES (243, 'VU', 'Vanuatu');
INSERT INTO `countries` VALUES (244, 'VE', 'Venezuela');
INSERT INTO `countries` VALUES (245, 'VN', 'Viet Nam');
INSERT INTO `countries` VALUES (246, 'VG', 'Virgin Islands, British');
INSERT INTO `countries` VALUES (247, 'VI', 'Virgin Islands, U.s.');
INSERT INTO `countries` VALUES (248, 'WF', 'Wallis and Futuna');
INSERT INTO `countries` VALUES (249, 'EH', 'Western Sahara');
INSERT INTO `countries` VALUES (250, 'YE', 'Yemen');
INSERT INTO `countries` VALUES (251, 'ZM', 'Zambia');
INSERT INTO `countries` VALUES (252, 'ZW', 'Zimbabwe');

-- ----------------------------
-- Table structure for customattributefeildvalues
-- ----------------------------
DROP TABLE IF EXISTS `customattributefeildvalues`;
CREATE TABLE `customattributefeildvalues`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `CustomAttribute` int(0) NOT NULL,
  `resource` int(0) NOT NULL,
  `Value` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customattributefeildvalues
-- ----------------------------

-- ----------------------------
-- Table structure for customattributefields
-- ----------------------------
DROP TABLE IF EXISTS `customattributefields`;
CREATE TABLE `customattributefields`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `resourcetype` int(0) NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `FieldType` tinyint(0) NOT NULL,
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Require` tinyint(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customattributefields
-- ----------------------------
INSERT INTO `customattributefields` VALUES (13, 12, 'A', 2, 'hello', 1);
INSERT INTO `customattributefields` VALUES (14, 12, 'B', 3, 'my yes no', 0);
INSERT INTO `customattributefields` VALUES (15, 19, 'kkk', 1, 'mm', 1);
INSERT INTO `customattributefields` VALUES (16, 21, 'cxzczx', 1, 'xcxzc', 1);
INSERT INTO `customattributefields` VALUES (17, 21, 'xczxzxc', 1, 'sdad', 1);
INSERT INTO `customattributefields` VALUES (18, 23, 'jjjj', 1, NULL, 0);
INSERT INTO `customattributefields` VALUES (19, 23, 'sssssssss', 1, 'ssssss', 1);
INSERT INTO `customattributefields` VALUES (22, 25, 'sdsdsd', 1, 'sds', 0);
INSERT INTO `customattributefields` VALUES (43, 24, 'aaa', 1, 'aaa', 1);
INSERT INTO `customattributefields` VALUES (44, 24, 'ssss', 1, 'ssss', 1);

-- ----------------------------
-- Table structure for customattributesfieldtype
-- ----------------------------
DROP TABLE IF EXISTS `customattributesfieldtype`;
CREATE TABLE `customattributesfieldtype`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Active` tinyint(0) NULL DEFAULT 1,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customattributesfieldtype
-- ----------------------------
INSERT INTO `customattributesfieldtype` VALUES (1, 'Text', NULL, 1);
INSERT INTO `customattributesfieldtype` VALUES (2, 'Numeric', NULL, 1);
INSERT INTO `customattributesfieldtype` VALUES (3, 'Yes/No', NULL, 1);

-- ----------------------------
-- Table structure for custombookinginfos
-- ----------------------------
DROP TABLE IF EXISTS `custombookinginfos`;
CREATE TABLE `custombookinginfos`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `resource` int(0) NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `FieldType` tinyint(0) NOT NULL,
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Require` tinyint(0) NULL DEFAULT 0,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 84 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of custombookinginfos
-- ----------------------------
INSERT INTO `custombookinginfos` VALUES (72, 106, 'asazxzc', 1, 'sddsdssd', 1);
INSERT INTO `custombookinginfos` VALUES (73, 106, 'ssd', 2, 'sdsds', 1);
INSERT INTO `custombookinginfos` VALUES (82, 104, 'test', 2, 'desc', 1);
INSERT INTO `custombookinginfos` VALUES (83, 104, 'test2', 1, 'desc2', 1);

-- ----------------------------
-- Table structure for daysofweek
-- ----------------------------
DROP TABLE IF EXISTS `daysofweek`;
CREATE TABLE `daysofweek`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `dayOfWeek` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Active` tinyint(0) NULL DEFAULT 0,
  `DayId` tinyint(0) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daysofweek
-- ----------------------------
INSERT INTO `daysofweek` VALUES (1, 'Sunday', 1, 0);
INSERT INTO `daysofweek` VALUES (2, 'Monday', 1, 0);
INSERT INTO `daysofweek` VALUES (3, 'Tuesday', 1, 0);
INSERT INTO `daysofweek` VALUES (4, 'Wednesday', 1, 0);
INSERT INTO `daysofweek` VALUES (5, 'Thursday', 1, 0);
INSERT INTO `daysofweek` VALUES (6, 'Friday', 1, 0);
INSERT INTO `daysofweek` VALUES (7, 'Saturday', 1, 0);

-- ----------------------------
-- Table structure for emailrequestforsupport
-- ----------------------------
DROP TABLE IF EXISTS `emailrequestforsupport`;
CREATE TABLE `emailrequestforsupport`  (
  `Id` int(0) NOT NULL AUTO_INCREMENT,
  `providerID` int(0) NOT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `EmailAddress` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RequestType` tinyint(0) NOT NULL,
  `Message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `CreatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of emailrequestforsupport
-- ----------------------------

-- ----------------------------
-- Table structure for facproviders
-- ----------------------------
DROP TABLE IF EXISTS `facproviders`;
CREATE TABLE `facproviders`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `LoginName` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `ContactName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactNumber` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactEmail` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `IsVerified` tinyint(0) NOT NULL DEFAULT 0,
  `AccountStatus` tinyint(1) NULL DEFAULT NULL,
  `IsBusinessProfileUpdated` tinyint(0) NOT NULL DEFAULT 0,
  `ContactAddress1` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactAddress2` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactCity` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactZip` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ContactCountry` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ReferedBy` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HomeURL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ExpiryDate` datetime(0) NOT NULL,
  `OrgUrl` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PayRate` float(11, 2) NULL DEFAULT 399.00,
  `subscriptionPlan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0.00',
  `subcriptionPaid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0.00',
  `ContractPeriod` int(0) NULL DEFAULT 12,
  `FreeTrialPeriod` int(0) NULL DEFAULT 30,
  `ResourceLimit` int(0) NULL DEFAULT NULL,
  `UserLimit` int(0) NULL DEFAULT NULL,
  `Application` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HasLogo` tinyint(1) NULL DEFAULT 0,
  `TimeZone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `CreatedDate` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facproviders
-- ----------------------------
INSERT INTO `facproviders` VALUES (1, 'nware', '', 'sonu kumar pandit', '', 'sonukumarpandit58@gmail.com', 1, 1, 1, '', '', '', '', '', NULL, '', '2023-06-30 07:10:02', NULL, 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 1, '', 1, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (2, 'Acme Ltd.', '', 'Bhuwan Sharma', '', 'bhuwanb@gmail.com', 1, 1, 0, '', '', '', '', '', NULL, '', '2023-09-29 10:11:25', NULL, 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 3, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (3, 'Rucir', '', 'Bhuwan Sharma', '4165095159', 'bsharma@rucir.com', 1, 1, 1, '254 Chapman Rd', 'Ste 208 #10782', 'Newark', '19702', 'Canada', NULL, 'Rucir', '2023-10-02 03:28:03', 'Newark', 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 4, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (4, 'Kibog', '', 'Bhuwan Sharma', '4165095159', 'bsharma@rucir.com', 1, 1, 1, '254 Chapman Rd', 'Ste 208 #10782', 'Newark', '19702', 'USA', NULL, 'Kibog', '2023-10-02 03:53:49', 'Kibog', 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 5, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (5, 'NDWare', '', 'Narayan Das', '08892031367', 'narayandas1990@gmail.com', 1, 1, 1, 'Quarter: 1615, Street: 38, Sector: 9D, Bokaro Steel City, Near Vaishali More, Sector: 9D, Bokaro Steel City, Sector: 9D, Bokaro Steel City, Sector: 9D, Bokaro Steel City', 'Sector: 9D, Bokaro Steel City', 'BOKARO STEEL CITY', '827009', 'India', NULL, 'nware', '2023-10-03 01:13:25', 'Nware', 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 6, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (6, 'S_ware', '', 'Subhash Ware', '', 'narayandas1990@gmail.com', 0, 1, 0, '', '', '', '', '', NULL, '', '2023-10-03 01:40:49', NULL, 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 7, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (7, 'nware2', '', 'subhash chandra', '', 'subhash.chandra@nware.com', 0, 1, 0, '', '', '', '', '', NULL, '', '2023-10-03 06:51:54', NULL, 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 8, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (8, 'nware3', '', 'subhash chandra', '', 'Subhash.Chandra@nwaresoft.com', 1, 1, 1, '', '', '', '', '', NULL, '', '2023-10-03 07:30:08', NULL, 399.99, '399', '0.00', 12, 30, NULL, NULL, NULL, 1, '', 9, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (9, 'org2', '', 'org2Fname org2Lname', '', 'subhash.chandra@nwaresoft.com', 1, 1, 1, '', '', '', '', '', NULL, '223', '2023-10-13 11:10:08', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 10, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (10, 'org3', '', 'org3Fname org3Lname', '', 'subhash.chandra@nwaresoft.com', 1, 1, 1, '', '', '', '', '', NULL, 'dd', '2023-10-13 11:31:19', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 11, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (11, 'org4', '', 'org4F org4L', '', 'subhash.chandra@nwaresoft.com', 1, 1, 1, '', '', '', '', '', NULL, '2', '2023-10-13 05:40:58', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 11, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (12, 'kk', '', 'jj', '', 'subhash.chandra@nwaresoft.com', 1, 1, 1, '', '', '', '', '', NULL, '55', '2023-10-13 11:25:58', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 13, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (13, 'nwaresoft', '', 'subhash ', '', 'subhash@nware.com', 1, 0, 0, '', '', '', '', '', NULL, '', '2023-10-15 08:46:52', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 14, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (14, 'test', '', 'test ', '', 'te@te.com', 0, 0, 0, '', '', '', '', '', NULL, '', '2023-10-16 10:47:08', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 15, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');
INSERT INTO `facproviders` VALUES (15, 'test2', '', 'test2', '', 'test2@test2.com', 1, 1, 1, '', '', '', '', '', NULL, '', '2023-10-16 10:52:21', NULL, 399.00, '399', '0.00', 12, 30, NULL, NULL, NULL, 0, '', 16, NULL, '2023-11-28 20:35:49', '2023-11-28 20:35:49');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_05_03_000001_create_customer_columns', 2);
INSERT INTO `migrations` VALUES (6, '2019_05_03_000002_create_subscriptions_table', 2);
INSERT INTO `migrations` VALUES (7, '2019_05_03_000003_create_subscription_items_table', 2);

-- ----------------------------
-- Table structure for operationhours
-- ----------------------------
DROP TABLE IF EXISTS `operationhours`;
CREATE TABLE `operationhours`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `Resource` int(0) NOT NULL,
  `DayofWeek` tinyint(0) NOT NULL,
  `OpenTime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CloseTime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 152 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of operationhours
-- ----------------------------
INSERT INTO `operationhours` VALUES (111, 106, 1, '03:00', '06:00');
INSERT INTO `operationhours` VALUES (112, 106, 2, '16:00', '18:00');
INSERT INTO `operationhours` VALUES (128, 109, 1, NULL, NULL);
INSERT INTO `operationhours` VALUES (129, 109, 2, NULL, NULL);
INSERT INTO `operationhours` VALUES (130, 109, 3, NULL, NULL);
INSERT INTO `operationhours` VALUES (131, 109, 4, NULL, NULL);
INSERT INTO `operationhours` VALUES (132, 109, 5, NULL, NULL);
INSERT INTO `operationhours` VALUES (133, 109, 6, NULL, NULL);
INSERT INTO `operationhours` VALUES (134, 109, 7, NULL, NULL);
INSERT INTO `operationhours` VALUES (135, 110, 1, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (136, 110, 2, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (137, 110, 3, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (138, 110, 4, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (139, 110, 5, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (140, 110, 6, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (141, 110, 7, '00:00:00', '00:00:00');
INSERT INTO `operationhours` VALUES (147, 104, 1, '00:00:00', '23:59');
INSERT INTO `operationhours` VALUES (148, 104, 2, '00:00:00', '23:59');
INSERT INTO `operationhours` VALUES (149, 104, 3, '00:00:00', '23:59');
INSERT INTO `operationhours` VALUES (150, 104, 4, '00:00:00', '23:59');
INSERT INTO `operationhours` VALUES (151, 104, 5, '00:01', '23:59');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
INSERT INTO `password_reset_tokens` VALUES ('narayandas1990@gmail.com', 'Q6IEhPW01Wm0tRr5GygCojAS4dtIgGTWFX9SDffIF77PRsn3hkn0EXYlNjvj', '2023-10-03 13:40:49');
INSERT INTO `password_reset_tokens` VALUES ('subhash.chandra@nware.com', 'opXjCbnyBxsDGmeFJ1hR40O1vlSCu1KOZ06jemV1hFTpjvEFQr2GxDYaqQWs', '2023-10-03 18:51:54');
INSERT INTO `password_reset_tokens` VALUES ('Subhash.Chandra@nwaresoft.com', 'fUGGwXaGoMsoJjFozwwkOZNfGQJCgj1LKZ0r0AMAX949nnuVVi8U5pZRhQth', '2023-10-13 11:10:08');
INSERT INTO `password_reset_tokens` VALUES ('subhash@nware.com', 'S2e1fJGIRy31cyW8RtH9Xa6eNPvfMZ1Yd1h9z5OGzKaShAEKaP4vdekYsxC4', '2023-10-16 01:54:48');
INSERT INTO `password_reset_tokens` VALUES ('subhash@nware.com', 'b3YfxqyJMFwHF1szFHHENzU90YnatabaAxMGqiGfE7sq21tub4UjcJ32WiCV', '2023-10-16 01:56:00');
INSERT INTO `password_reset_tokens` VALUES ('subhash@nware.com', 'rVPICfmN5S3Kh2d6Y5jx6lLl4GeZmern3zEiaQqqVNIrZFWns0JcAzDyPQzz', '2023-10-16 09:55:36');
INSERT INTO `password_reset_tokens` VALUES ('subhash@nware.com', 'SoWm1treVckx01qT7QpWDHsLhRZ6Bn560heU0oGWseb9ERxkQQHYlSdwAmke', '2023-10-16 10:01:22');
INSERT INTO `password_reset_tokens` VALUES ('te@te.com', 'd189o5WA2T1HnUVaBHwb4hftThQKa5j3E3OZNIHdeflu5l8BXgIF4I29yaWt', '2023-10-16 10:47:08');
INSERT INTO `password_reset_tokens` VALUES ('te@te.com', 'tvsa0z6PajV1g0F8FtLaSFg1xiVXthqAGzXFe9GWt4i0cYecgFffQrwWKt7W', '2023-10-16 10:47:17');
INSERT INTO `password_reset_tokens` VALUES ('test2@test2.com', 'WjNFki2Fi4oGU3HFPkKGT18DDdPyy86QAOn48G7aNAfhnow138NdLEY5c6Ua', '2023-10-16 10:52:21');
INSERT INTO `password_reset_tokens` VALUES ('superadmin@superadmin.com', '$2y$10$4TT6KnrAuj6vabzcFjSHTumGbxiOTkaj0XELeV70PB7DBX2WSjhiO', '2023-12-11 02:56:24');
INSERT INTO `password_reset_tokens` VALUES ('admin@admin.com', '$2y$10$5tow09tyUGcAOZXOUb5HfOUOvG5n.Rk2D2LghlSEbISiHYRw3Ms9C', '2023-12-10 21:55:11');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for resource
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `resourceType` int(0) NOT NULL,
  `resourceLocation` int(0) NULL DEFAULT 0,
  `ProviderID` int(0) NOT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `CreatedBy` int(0) NULL DEFAULT 0,
  `FacURL` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ModFeatureEnabled` tinyint(0) NULL DEFAULT 0,
  `BookingRights` tinyint(0) NULL DEFAULT 0,
  `ViewingRights` tinyint(0) NULL DEFAULT 0,
  `ModRights` tinyint(0) NULL DEFAULT 0,
  `RequestRights` tinyint(0) NULL DEFAULT 0,
  `SlotLength` int(0) NULL DEFAULT 30,
  `EmailRecipients` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ModEmailRecipients` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `PublicView` tinyint(1) NULL DEFAULT 0,
  `CreatedDate` datetime(0) NULL DEFAULT NULL,
  `UpdatedDate` datetime(0) NULL DEFAULT NULL,
  `MultiEntity` int(0) NULL DEFAULT NULL,
  `BookingAdditionalInfo` tinyint(1) NULL DEFAULT 0,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 115 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES (1, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, 0, 30, '', '', 0, NULL, NULL, NULL, 0, NULL);
INSERT INTO `resource` VALUES (6, 15, 0, 1, 'dell', 'dell description', 1, 'url 4', 0, 0, 0, 0, 0, 0, NULL, NULL, 1, '2023-08-02 06:51:17', '2023-08-21 08:26:35', NULL, 0, NULL);
INSERT INTO `resource` VALUES (7, 15, 8, 1, 'Name', 'Description', 1, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '2023-08-03 08:57:05', '2023-08-21 08:26:56', NULL, 0, NULL);
INSERT INTO `resource` VALUES (10, 14, 9, 1, 'EZ Book test', 'kkj', 1, 'EZ URL', 1, 0, 0, 4, 3, 0, 'subhash.chandra@nwaresoft.com', NULL, 1, '2023-08-04 07:09:15', '2023-10-26 16:32:49', NULL, 0, NULL);
INSERT INTO `resource` VALUES (17, 14, 8, 1, 'EZ', 'kkj', 1, 'EZ URL', 1, 1, 2, 4, 3, 1, 'subhash.chandra@nwaresoft.com', 'TEST@test.com', 0, '2023-08-08 11:32:00', '2023-10-30 15:23:39', NULL, 1, '2023-10-30 15:23:39');
INSERT INTO `resource` VALUES (53, 13, 9, 1, 'EZ', 'llll', 1, 'EZ URL', 0, 1, 2, 0, 0, 1, 'subhash.chandra@nwaresoft.com', NULL, 1, '2023-08-08 20:08:02', '2023-10-16 13:16:26', NULL, 1, NULL);
INSERT INTO `resource` VALUES (77, 13, 10, 1, 'dell', 'dell description', 1, 'dell url', 1, 0, 0, 4, 3, 10, 'subhash.chandra@nwaresoft.com', 'TEST@test.com', 1, '2023-08-10 09:06:26', '2023-10-16 13:15:50', NULL, 0, NULL);
INSERT INTO `resource` VALUES (104, 12, 9, 1, 'lenevo', 'desc', 1, 'EZ URL', 1, 1, 2, 4, 3, 9, 'subhash.chandra@nwaresoft.com', 'TEST@test.com', 1, '2023-08-17 05:30:50', '2023-08-19 11:19:00', NULL, 1, NULL);
INSERT INTO `resource` VALUES (105, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, 0, 30, '', '', 0, NULL, NULL, NULL, 0, NULL);
INSERT INTO `resource` VALUES (106, 12, 10, 8, 'fsfsa', 'dfsdf', 1, 'url', 1, 1, 2, 4, 3, 5, 'subhash.chandra@nwaresoft.com', 'TEST@test.com', 1, '2023-08-18 10:24:02', '2023-08-18 11:54:21', NULL, 1, NULL);
INSERT INTO `resource` VALUES (109, 12, 0, 2, 'EZ Book22 sub', 'desc', 1, NULL, 0, 0, 0, 0, 0, 6, NULL, NULL, 0, '2023-08-22 12:18:27', '2023-08-23 14:42:52', NULL, 0, NULL);
INSERT INTO `resource` VALUES (110, 16, 8, 4, 'zxzx', 'zxzz', 5, 'zxz', 0, 0, 0, 0, 0, 12, NULL, NULL, 1, '2023-09-01 12:07:00', '2023-09-01 12:07:00', NULL, 1, NULL);
INSERT INTO `resource` VALUES (111, 18, 13, 8, 'lklk', 'hgg', 8, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '2023-10-04 13:21:06', '2023-10-06 22:33:23', NULL, 0, NULL);
INSERT INTO `resource` VALUES (112, 14, 9, 8, 'njjjj', 'hjj', 8, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '2023-10-04 13:22:05', '2023-10-04 13:22:05', NULL, 0, NULL);
INSERT INTO `resource` VALUES (113, 13, 0, 8, 'llll', 'wwww', 8, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '2023-10-04 17:33:40', '2023-11-04 14:29:27', NULL, 0, NULL);
INSERT INTO `resource` VALUES (114, 13, 13, 12, 'sds', 'hjhjh', 8, 'sda', 1, 0, 0, 4, 3, 0, NULL, NULL, 1, '2023-10-25 17:53:31', '2023-10-25 17:53:31', NULL, 1, NULL);

-- ----------------------------
-- Table structure for resource_configuration_type
-- ----------------------------
DROP TABLE IF EXISTS `resource_configuration_type`;
CREATE TABLE `resource_configuration_type`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `configuration_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resource_configuration_type
-- ----------------------------
INSERT INTO `resource_configuration_type` VALUES (1, 'Stand-Alone', '2023-07-03 15:32:16', '2023-07-03 15:32:16');
INSERT INTO `resource_configuration_type` VALUES (2, 'Collective', '2023-07-03 15:32:16', '2023-07-03 15:32:16');

-- ----------------------------
-- Table structure for resourcelocation
-- ----------------------------
DROP TABLE IF EXISTS `resourcelocation`;
CREATE TABLE `resourcelocation`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `ProviderID` int(0) NOT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `TimeZone` int(0) NULL DEFAULT 1,
  `Address1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `Address2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `City` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `State_Province` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `PostalCode` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `Country` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resourcelocation
-- ----------------------------
INSERT INTO `resourcelocation` VALUES (9, 1, 'EZ', 'Description', NULL, 'Address1', 'Address2', 'City', 'state', '0212121212', '103', 1, '2023-08-09 06:01:02', '2023-08-09 06:01:02');
INSERT INTO `resourcelocation` VALUES (10, 1, 'EZ Book test', 'adasaas', NULL, 'nware', 'sec 18', 'noida', 'up', '221122', '1', 1, '2023-08-09 06:15:24', '2023-08-09 06:15:24');
INSERT INTO `resourcelocation` VALUES (13, 4, 'Newark, DE', 'Newark, DE office', NULL, '254 Chapman Rd', 'Ste 208 #10782', 'Newark', 'Delaware', '19702', '239', 4, '2023-10-02 06:59:53', '2023-10-02 06:59:53');
INSERT INTO `resourcelocation` VALUES (14, 1, 'sdsdwwww', 'sdsdsd', NULL, 'zxzx', 'dcscc', 'dw', 'ss', '23223', '12', 1, '2023-10-19 13:36:02', '2023-10-19 13:36:41');
INSERT INTO `resourcelocation` VALUES (15, 12, 'uu', 'll', NULL, 'llhh', 'kjjk', ',ml', 'llklk', '277767', '1', 13, '2023-11-04 16:46:02', '2023-11-04 16:46:02');

-- ----------------------------
-- Table structure for resourcetype
-- ----------------------------
DROP TABLE IF EXISTS `resourcetype`;
CREATE TABLE `resourcetype`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `ProviderID` int(0) NULL DEFAULT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `configurationType` tinyint(0) NULL DEFAULT 0,
  `AdditionalInfoDefaultText` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `AdditionalEmailText` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resourcetype
-- ----------------------------
INSERT INTO `resourcetype` VALUES (12, 1, 'Umesh', 'my des', 2, 'default', 'email', NULL, '2023-07-17 04:37:34', '2023-07-17 04:37:34');
INSERT INTO `resourcetype` VALUES (13, 1, 'Resource Type1', 'desc', 1, NULL, NULL, NULL, '2023-08-21 08:24:17', '2023-08-21 08:24:17');
INSERT INTO `resourcetype` VALUES (14, 1, 'Resource Type2', NULL, 1, NULL, NULL, NULL, '2023-08-21 08:24:41', '2023-08-21 08:24:41');
INSERT INTO `resourcetype` VALUES (15, 1, 'Resource Type3', 'desc', 1, NULL, NULL, NULL, '2023-08-21 08:25:08', '2023-08-21 08:25:08');
INSERT INTO `resourcetype` VALUES (16, 1, 'Resource Type4', 'desc', 1, NULL, NULL, NULL, '2023-08-21 09:10:32', '2023-08-21 09:10:32');
INSERT INTO `resourcetype` VALUES (17, 1, 'Resource Type5', NULL, 2, NULL, NULL, NULL, '2023-08-22 06:55:10', '2023-08-22 06:55:10');
INSERT INTO `resourcetype` VALUES (18, 4, 'Maintenance Bay', 'Maintenance Bay', 1, NULL, NULL, NULL, '2023-10-02 07:01:05', '2023-10-02 07:01:05');
INSERT INTO `resourcetype` VALUES (19, 1, 'aaa', NULL, 1, NULL, NULL, NULL, '2023-10-17 14:13:30', '2023-10-17 14:13:30');
INSERT INTO `resourcetype` VALUES (20, 1, 'EZ Book test', NULL, 1, NULL, NULL, NULL, '2023-10-19 12:52:28', '2023-10-19 12:52:28');
INSERT INTO `resourcetype` VALUES (21, 1, 'dfdf', 'dfdfd', 1, 'sdsd', 'xcxcx', NULL, '2023-10-19 13:39:58', '2023-10-19 13:39:58');
INSERT INTO `resourcetype` VALUES (22, 1, 'wwww', NULL, 1, NULL, NULL, NULL, '2023-10-19 13:43:21', '2023-10-19 13:43:21');
INSERT INTO `resourcetype` VALUES (23, 1, 'ssssssss', 'ssss', 1, 'qwq', 'qwqwq', NULL, '2023-10-20 23:45:38', '2023-10-20 23:45:38');
INSERT INTO `resourcetype` VALUES (24, 1, 'aaaa', 'aaa', 1, 'sasa', 'aaa', NULL, '2023-10-20 23:46:57', '2023-10-20 23:46:57');
INSERT INTO `resourcetype` VALUES (25, 1, 'sds', 'sds', 1, 'xcxzcx', 'cxzc', NULL, '2023-10-21 13:22:13', '2023-10-21 13:22:13');

-- ----------------------------
-- Table structure for resourcetypelimit
-- ----------------------------
DROP TABLE IF EXISTS `resourcetypelimit`;
CREATE TABLE `resourcetypelimit`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `resourcetype` int(0) NOT NULL,
  `LimitType` tinyint(0) NULL DEFAULT NULL,
  `Limit` int(0) NULL DEFAULT NULL,
  `GroupAppliedTo` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resourcetypelimit
-- ----------------------------
INSERT INTO `resourcetypelimit` VALUES (6, 12, 2, 6, 2);
INSERT INTO `resourcetypelimit` VALUES (7, 12, 1, 554, 1);
INSERT INTO `resourcetypelimit` VALUES (8, 23, 1, 1212, 1);
INSERT INTO `resourcetypelimit` VALUES (11, 25, 1, 121, 1);
INSERT INTO `resourcetypelimit` VALUES (28, 24, 1, 111, 1);
INSERT INTO `resourcetypelimit` VALUES (29, 24, 5, 222, 1);

-- ----------------------------
-- Table structure for resourcetypelimitfield
-- ----------------------------
DROP TABLE IF EXISTS `resourcetypelimitfield`;
CREATE TABLE `resourcetypelimitfield`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Active` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resourcetypelimitfield
-- ----------------------------
INSERT INTO `resourcetypelimitfield` VALUES (1, 'Resource Limit', 'Resource Limit', '1');
INSERT INTO `resourcetypelimitfield` VALUES (2, 'Time Limit', 'Time Limit', '1');
INSERT INTO `resourcetypelimitfield` VALUES (3, 'Advance Limit', 'Advance Limit', '1');
INSERT INTO `resourcetypelimitfield` VALUES (4, 'Booking Limit', 'Booking Limit', '1');
INSERT INTO `resourcetypelimitfield` VALUES (5, 'Booking CutOff Time', 'Booking CutOff Time', '1');
INSERT INTO `resourcetypelimitfield` VALUES (6, 'Update and Cancellation CutOff Time', 'Update and Cancellation CutOff Time', '1');

-- ----------------------------
-- Table structure for rights
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `Right` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `Active` tinyint(0) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO `rights` VALUES (1, 'Booking Rights', 1);
INSERT INTO `rights` VALUES (2, 'Viewing Rights', 1);
INSERT INTO `rights` VALUES (3, 'Request Rights', 1);
INSERT INTO `rights` VALUES (4, 'Moderator Rights', 1);

-- ----------------------------
-- Table structure for subresource
-- ----------------------------
DROP TABLE IF EXISTS `subresource`;
CREATE TABLE `subresource`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `resource` int(0) NOT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subresource
-- ----------------------------
INSERT INTO `subresource` VALUES (5, 107, 'sd');
INSERT INTO `subresource` VALUES (18, 109, 'ssdssds');
INSERT INTO `subresource` VALUES (19, 109, 'aaaasds');

-- ----------------------------
-- Table structure for subscription_items
-- ----------------------------
DROP TABLE IF EXISTS `subscription_items`;
CREATE TABLE `subscription_items`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(0) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `subscription_items_stripe_id_unique`(`stripe_id`) USING BTREE,
  INDEX `subscription_items_subscription_id_stripe_price_index`(`subscription_id`, `stripe_price`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscription_items
-- ----------------------------

-- ----------------------------
-- Table structure for subscriptions
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `quantity` int(0) NULL DEFAULT NULL,
  `trial_ends_at` timestamp(0) NULL DEFAULT NULL,
  `ends_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `subscriptions_stripe_id_unique`(`stripe_id`) USING BTREE,
  INDEX `subscriptions_user_id_stripe_status_index`(`user_id`, `stripe_status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------

-- ----------------------------
-- Table structure for timezones
-- ----------------------------
DROP TABLE IF EXISTS `timezones`;
CREATE TABLE `timezones`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `CountryCode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TimeZoneId` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `GMToffset` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DSToffset` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rawOffset` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 425 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timezones
-- ----------------------------
INSERT INTO `timezones` VALUES (1, 'CI', 'Africa/Abidjan', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (2, 'GH', 'Africa/Accra', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (3, 'ET', 'Africa/Addis_Ababa', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (4, 'DZ', 'Africa/Algiers', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (5, 'ER', 'Africa/Asmara', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (6, 'ML', 'Africa/Bamako', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (7, 'CF', 'Africa/Bangui', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (8, 'GM', 'Africa/Banjul', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (9, 'GW', 'Africa/Bissau', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (10, 'MW', 'Africa/Blantyre', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (11, 'CG', 'Africa/Brazzaville', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (12, 'BI', 'Africa/Bujumbura', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (13, 'EG', 'Africa/Cairo', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (14, 'MA', 'Africa/Casablanca', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (15, 'ES', 'Africa/Ceuta', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (16, 'GN', 'Africa/Conakry', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (17, 'SN', 'Africa/Dakar', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (18, 'TZ', 'Africa/Dar_es_Salaam', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (19, 'DJ', 'Africa/Djibouti', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (20, 'CM', 'Africa/Douala', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (21, 'EH', 'Africa/El_Aaiun', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (22, 'SL', 'Africa/Freetown', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (23, 'BW', 'Africa/Gaborone', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (24, 'ZW', 'Africa/Harare', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (25, 'ZA', 'Africa/Johannesburg', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (26, 'SS', 'Africa/Juba', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (27, 'UG', 'Africa/Kampala', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (28, 'SD', 'Africa/Khartoum', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (29, 'RW', 'Africa/Kigali', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (30, 'CD', 'Africa/Kinshasa', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (31, 'NG', 'Africa/Lagos', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (32, 'GA', 'Africa/Libreville', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (33, 'TG', 'Africa/Lome', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (34, 'AO', 'Africa/Luanda', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (35, 'CD', 'Africa/Lubumbashi', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (36, 'ZM', 'Africa/Lusaka', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (37, 'GQ', 'Africa/Malabo', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (38, 'MZ', 'Africa/Maputo', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (39, 'LS', 'Africa/Maseru', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (40, 'SZ', 'Africa/Mbabane', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (41, 'SO', 'Africa/Mogadishu', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (42, 'LR', 'Africa/Monrovia', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (43, 'KE', 'Africa/Nairobi', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (44, 'TD', 'Africa/Ndjamena', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (45, 'NE', 'Africa/Niamey', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (46, 'MR', 'Africa/Nouakchott', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (47, 'BF', 'Africa/Ouagadougou', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (48, 'BJ', 'Africa/Porto-Novo', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (49, 'ST', 'Africa/Sao_Tome', '0.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (50, 'LY', 'Africa/Tripoli', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (51, 'TN', 'Africa/Tunis', '1.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (52, 'NA', 'Africa/Windhoek', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (53, 'US', 'America/Adak', '-10.0', '-9.0', '-10.0');
INSERT INTO `timezones` VALUES (54, 'US', 'America/Anchorage', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (55, 'AI', 'America/Anguilla', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (56, 'AG', 'America/Antigua', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (57, 'BR', 'America/Araguaina', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (58, 'AR', 'America/Argentina/Buenos_Aires', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (59, 'AR', 'America/Argentina/Catamarca', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (60, 'AR', 'America/Argentina/Cordoba', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (61, 'AR', 'America/Argentina/Jujuy', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (62, 'AR', 'America/Argentina/La_Rioja', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (63, 'AR', 'America/Argentina/Mendoza', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (64, 'AR', 'America/Argentina/Rio_Gallegos', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (65, 'AR', 'America/Argentina/Salta', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (66, 'AR', 'America/Argentina/San_Juan', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (67, 'AR', 'America/Argentina/San_Luis', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (68, 'AR', 'America/Argentina/Tucuman', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (69, 'AR', 'America/Argentina/Ushuaia', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (70, 'AW', 'America/Aruba', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (71, 'PY', 'America/Asuncion', '-3.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (72, 'CA', 'America/Atikokan', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (73, 'BR', 'America/Bahia', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (74, 'MX', 'America/Bahia_Banderas', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (75, 'BB', 'America/Barbados', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (76, 'BR', 'America/Belem', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (77, 'BZ', 'America/Belize', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (78, 'CA', 'America/Blanc-Sablon', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (79, 'BR', 'America/Boa_Vista', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (80, 'CO', 'America/Bogota', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (81, 'US', 'America/Boise', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (82, 'CA', 'America/Cambridge_Bay', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (83, 'BR', 'America/Campo_Grande', '-3.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (84, 'MX', 'America/Cancun', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (85, 'VE', 'America/Caracas', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (86, 'GF', 'America/Cayenne', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (87, 'KY', 'America/Cayman', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (88, 'US', 'America/Chicago', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (89, 'MX', 'America/Chihuahua', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (90, 'CR', 'America/Costa_Rica', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (91, 'CA', 'America/Creston', '-7.0', '-7.0', '-7.0');
INSERT INTO `timezones` VALUES (92, 'BR', 'America/Cuiaba', '-3.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (93, 'CW', 'America/Curacao', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (94, 'GL', 'America/Danmarkshavn', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (95, 'CA', 'America/Dawson', '-8.0', '-7.0', '-8.0');
INSERT INTO `timezones` VALUES (96, 'CA', 'America/Dawson_Creek', '-7.0', '-7.0', '-7.0');
INSERT INTO `timezones` VALUES (97, 'US', 'America/Denver', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (98, 'US', 'America/Detroit', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (99, 'DM', 'America/Dominica', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (100, 'CA', 'America/Edmonton', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (101, 'BR', 'America/Eirunepe', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (102, 'SV', 'America/El_Salvador', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (103, 'CA', 'America/Fort_Nelson', '-7.0', '-7.0', '-7.0');
INSERT INTO `timezones` VALUES (104, 'BR', 'America/Fortaleza', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (105, 'CA', 'America/Glace_Bay', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (106, 'GL', 'America/Godthab', '-3.0', '-2.0', '-3.0');
INSERT INTO `timezones` VALUES (107, 'CA', 'America/Goose_Bay', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (108, 'TC', 'America/Grand_Turk', '-4.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (109, 'GD', 'America/Grenada', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (110, 'GP', 'America/Guadeloupe', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (111, 'GT', 'America/Guatemala', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (112, 'EC', 'America/Guayaquil', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (113, 'GY', 'America/Guyana', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (114, 'CA', 'America/Halifax', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (115, 'CU', 'America/Havana', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (116, 'MX', 'America/Hermosillo', '-7.0', '-7.0', '-7.0');
INSERT INTO `timezones` VALUES (117, 'US', 'America/Indiana/Indianapolis', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (118, 'US', 'America/Indiana/Knox', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (119, 'US', 'America/Indiana/Marengo', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (120, 'US', 'America/Indiana/Petersburg', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (121, 'US', 'America/Indiana/Tell_City', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (122, 'US', 'America/Indiana/Vevay', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (123, 'US', 'America/Indiana/Vincennes', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (124, 'US', 'America/Indiana/Winamac', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (125, 'CA', 'America/Inuvik', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (126, 'CA', 'America/Iqaluit', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (127, 'JM', 'America/Jamaica', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (128, 'US', 'America/Juneau', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (129, 'US', 'America/Kentucky/Louisville', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (130, 'US', 'America/Kentucky/Monticello', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (131, 'BQ', 'America/Kralendijk', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (132, 'BO', 'America/La_Paz', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (133, 'PE', 'America/Lima', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (134, 'US', 'America/Los_Angeles', '-8.0', '-7.0', '-8.0');
INSERT INTO `timezones` VALUES (135, 'SX', 'America/Lower_Princes', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (136, 'BR', 'America/Maceio', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (137, 'NI', 'America/Managua', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (138, 'BR', 'America/Manaus', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (139, 'MF', 'America/Marigot', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (140, 'MQ', 'America/Martinique', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (141, 'MX', 'America/Matamoros', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (142, 'MX', 'America/Mazatlan', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (143, 'US', 'America/Menominee', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (144, 'MX', 'America/Merida', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (145, 'US', 'America/Metlakatla', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (146, 'MX', 'America/Mexico_City', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (147, 'PM', 'America/Miquelon', '-3.0', '-2.0', '-3.0');
INSERT INTO `timezones` VALUES (148, 'CA', 'America/Moncton', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (149, 'MX', 'America/Monterrey', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (150, 'UY', 'America/Montevideo', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (151, 'MS', 'America/Montserrat', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (152, 'BS', 'America/Nassau', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (153, 'US', 'America/New_York', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (154, 'CA', 'America/Nipigon', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (155, 'US', 'America/Nome', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (156, 'BR', 'America/Noronha', '-2.0', '-2.0', '-2.0');
INSERT INTO `timezones` VALUES (157, 'US', 'America/North_Dakota/Beulah', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (158, 'US', 'America/North_Dakota/Center', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (159, 'US', 'America/North_Dakota/New_Salem', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (160, 'MX', 'America/Ojinaga', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (161, 'PA', 'America/Panama', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (162, 'CA', 'America/Pangnirtung', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (163, 'SR', 'America/Paramaribo', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (164, 'US', 'America/Phoenix', '-7.0', '-7.0', '-7.0');
INSERT INTO `timezones` VALUES (165, 'HT', 'America/Port-au-Prince', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (166, 'TT', 'America/Port_of_Spain', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (167, 'BR', 'America/Porto_Velho', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (168, 'PR', 'America/Puerto_Rico', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (169, 'CL', 'America/Punta_Arenas', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (170, 'CA', 'America/Rainy_River', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (171, 'CA', 'America/Rankin_Inlet', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (172, 'BR', 'America/Recife', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (173, 'CA', 'America/Regina', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (174, 'CA', 'America/Resolute', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (175, 'BR', 'America/Rio_Branco', '-5.0', '-5.0', '-5.0');
INSERT INTO `timezones` VALUES (176, 'BR', 'America/Santarem', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (177, 'CL', 'America/Santiago', '-3.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (178, 'DO', 'America/Santo_Domingo', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (179, 'BR', 'America/Sao_Paulo', '-2.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (180, 'GL', 'America/Scoresbysund', '-1.0', '0.0', '-1.0');
INSERT INTO `timezones` VALUES (181, 'US', 'America/Sitka', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (182, 'BL', 'America/St_Barthelemy', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (183, 'CA', 'America/St_Johns', '-3.5', '-2.5', '-3.5');
INSERT INTO `timezones` VALUES (184, 'KN', 'America/St_Kitts', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (185, 'LC', 'America/St_Lucia', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (186, 'VI', 'America/St_Thomas', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (187, 'VC', 'America/St_Vincent', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (188, 'CA', 'America/Swift_Current', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (189, 'HN', 'America/Tegucigalpa', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (190, 'GL', 'America/Thule', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (191, 'CA', 'America/Thunder_Bay', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (192, 'MX', 'America/Tijuana', '-8.0', '-7.0', '-8.0');
INSERT INTO `timezones` VALUES (193, 'CA', 'America/Toronto', '-5.0', '-4.0', '-5.0');
INSERT INTO `timezones` VALUES (194, 'VG', 'America/Tortola', '-4.0', '-4.0', '-4.0');
INSERT INTO `timezones` VALUES (195, 'CA', 'America/Vancouver', '-8.0', '-7.0', '-8.0');
INSERT INTO `timezones` VALUES (196, 'CA', 'America/Whitehorse', '-8.0', '-7.0', '-8.0');
INSERT INTO `timezones` VALUES (197, 'CA', 'America/Winnipeg', '-6.0', '-5.0', '-6.0');
INSERT INTO `timezones` VALUES (198, 'US', 'America/Yakutat', '-9.0', '-8.0', '-9.0');
INSERT INTO `timezones` VALUES (199, 'CA', 'America/Yellowknife', '-7.0', '-6.0', '-7.0');
INSERT INTO `timezones` VALUES (200, 'AQ', 'Antarctica/Casey', '11.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (201, 'AQ', 'Antarctica/Davis', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (202, 'AQ', 'Antarctica/DumontDUrville', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (203, 'AU', 'Antarctica/Macquarie', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (204, 'AQ', 'Antarctica/Mawson', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (205, 'AQ', 'Antarctica/McMurdo', '13.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (206, 'AQ', 'Antarctica/Palmer', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (207, 'AQ', 'Antarctica/Rothera', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (208, 'AQ', 'Antarctica/Syowa', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (209, 'AQ', 'Antarctica/Troll', '0.0', '2.0', '0.0');
INSERT INTO `timezones` VALUES (210, 'AQ', 'Antarctica/Vostok', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (211, 'SJ', 'Arctic/Longyearbyen', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (212, 'YE', 'Asia/Aden', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (213, 'KZ', 'Asia/Almaty', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (214, 'JO', 'Asia/Amman', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (215, 'RU', 'Asia/Anadyr', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (216, 'KZ', 'Asia/Aqtau', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (217, 'KZ', 'Asia/Aqtobe', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (218, 'TM', 'Asia/Ashgabat', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (219, 'KZ', 'Asia/Atyrau', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (220, 'IQ', 'Asia/Baghdad', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (221, 'BH', 'Asia/Bahrain', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (222, 'AZ', 'Asia/Baku', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (223, 'TH', 'Asia/Bangkok', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (224, 'RU', 'Asia/Barnaul', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (225, 'LB', 'Asia/Beirut', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (226, 'KG', 'Asia/Bishkek', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (227, 'BN', 'Asia/Brunei', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (228, 'RU', 'Asia/Chita', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (229, 'MN', 'Asia/Choibalsan', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (230, 'LK', 'Asia/Colombo', '5.5', '5.5', '5.5');
INSERT INTO `timezones` VALUES (231, 'SY', 'Asia/Damascus', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (232, 'BD', 'Asia/Dhaka', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (233, 'TL', 'Asia/Dili', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (234, 'AE', 'Asia/Dubai', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (235, 'TJ', 'Asia/Dushanbe', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (236, 'CY', 'Asia/Famagusta', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (237, 'PS', 'Asia/Gaza', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (238, 'PS', 'Asia/Hebron', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (239, 'VN', 'Asia/Ho_Chi_Minh', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (240, 'HK', 'Asia/Hong_Kong', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (241, 'MN', 'Asia/Hovd', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (242, 'RU', 'Asia/Irkutsk', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (243, 'ID', 'Asia/Jakarta', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (244, 'ID', 'Asia/Jayapura', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (245, 'IL', 'Asia/Jerusalem', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (246, 'AF', 'Asia/Kabul', '4.5', '4.5', '4.5');
INSERT INTO `timezones` VALUES (247, 'RU', 'Asia/Kamchatka', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (248, 'PK', 'Asia/Karachi', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (249, 'NP', 'Asia/Kathmandu', '5.75', '5.75', '5.75');
INSERT INTO `timezones` VALUES (250, 'RU', 'Asia/Khandyga', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (251, 'IN', 'Asia/Kolkata', '5.5', '5.5', '5.5');
INSERT INTO `timezones` VALUES (252, 'RU', 'Asia/Krasnoyarsk', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (253, 'MY', 'Asia/Kuala_Lumpur', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (254, 'MY', 'Asia/Kuching', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (255, 'KW', 'Asia/Kuwait', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (256, 'MO', 'Asia/Macau', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (257, 'RU', 'Asia/Magadan', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (258, 'ID', 'Asia/Makassar', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (259, 'PH', 'Asia/Manila', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (260, 'OM', 'Asia/Muscat', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (261, 'CY', 'Asia/Nicosia', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (262, 'RU', 'Asia/Novokuznetsk', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (263, 'RU', 'Asia/Novosibirsk', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (264, 'RU', 'Asia/Omsk', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (265, 'KZ', 'Asia/Oral', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (266, 'KH', 'Asia/Phnom_Penh', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (267, 'ID', 'Asia/Pontianak', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (268, 'KP', 'Asia/Pyongyang', '8.5', '9.0', '9.0');
INSERT INTO `timezones` VALUES (269, 'QA', 'Asia/Qatar', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (270, 'KZ', 'Asia/Qyzylorda', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (271, 'SA', 'Asia/Riyadh', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (272, 'RU', 'Asia/Sakhalin', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (273, 'UZ', 'Asia/Samarkand', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (274, 'KR', 'Asia/Seoul', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (275, 'CN', 'Asia/Shanghai', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (276, 'SG', 'Asia/Singapore', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (277, 'RU', 'Asia/Srednekolymsk', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (278, 'TW', 'Asia/Taipei', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (279, 'UZ', 'Asia/Tashkent', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (280, 'GE', 'Asia/Tbilisi', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (281, 'IR', 'Asia/Tehran', '3.5', '4.5', '3.5');
INSERT INTO `timezones` VALUES (282, 'BT', 'Asia/Thimphu', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (283, 'JP', 'Asia/Tokyo', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (284, 'RU', 'Asia/Tomsk', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (285, 'MN', 'Asia/Ulaanbaatar', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (286, 'CN', 'Asia/Urumqi', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (287, 'RU', 'Asia/Ust-Nera', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (288, 'LA', 'Asia/Vientiane', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (289, 'RU', 'Asia/Vladivostok', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (290, 'RU', 'Asia/Yakutsk', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (291, 'MM', 'Asia/Yangon', '6.5', '6.5', '6.5');
INSERT INTO `timezones` VALUES (292, 'RU', 'Asia/Yekaterinburg', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (293, 'AM', 'Asia/Yerevan', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (294, 'PT', 'Atlantic/Azores', '-1.0', '0.0', '-1.0');
INSERT INTO `timezones` VALUES (295, 'BM', 'Atlantic/Bermuda', '-4.0', '-3.0', '-4.0');
INSERT INTO `timezones` VALUES (296, 'ES', 'Atlantic/Canary', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (297, 'CV', 'Atlantic/Cape_Verde', '-1.0', '-1.0', '-1.0');
INSERT INTO `timezones` VALUES (298, 'FO', 'Atlantic/Faroe', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (299, 'PT', 'Atlantic/Madeira', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (300, 'IS', 'Atlantic/Reykjavik', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (301, 'GS', 'Atlantic/South_Georgia', '-2.0', '-2.0', '-2.0');
INSERT INTO `timezones` VALUES (302, 'SH', 'Atlantic/St_Helena', '0.0', '0.0', '0.0');
INSERT INTO `timezones` VALUES (303, 'FK', 'Atlantic/Stanley', '-3.0', '-3.0', '-3.0');
INSERT INTO `timezones` VALUES (304, 'AU', 'Australia/Adelaide', '10.5', '9.5', '9.5');
INSERT INTO `timezones` VALUES (305, 'AU', 'Australia/Brisbane', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (306, 'AU', 'Australia/Broken_Hill', '10.5', '9.5', '9.5');
INSERT INTO `timezones` VALUES (307, 'AU', 'Australia/Currie', '11.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (308, 'AU', 'Australia/Darwin', '9.5', '9.5', '9.5');
INSERT INTO `timezones` VALUES (309, 'AU', 'Australia/Eucla', '8.75', '8.75', '8.75');
INSERT INTO `timezones` VALUES (310, 'AU', 'Australia/Hobart', '11.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (311, 'AU', 'Australia/Lindeman', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (312, 'AU', 'Australia/Lord_Howe', '11.0', '10.5', '10.5');
INSERT INTO `timezones` VALUES (313, 'AU', 'Australia/Melbourne', '11.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (314, 'AU', 'Australia/Perth', '8.0', '8.0', '8.0');
INSERT INTO `timezones` VALUES (315, 'AU', 'Australia/Sydney', '11.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (316, 'NL', 'Europe/Amsterdam', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (317, 'AD', 'Europe/Andorra', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (318, 'RU', 'Europe/Astrakhan', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (319, 'GR', 'Europe/Athens', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (320, 'RS', 'Europe/Belgrade', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (321, 'DE', 'Europe/Berlin', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (322, 'SK', 'Europe/Bratislava', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (323, 'BE', 'Europe/Brussels', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (324, 'RO', 'Europe/Bucharest', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (325, 'HU', 'Europe/Budapest', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (326, 'DE', 'Europe/Busingen', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (327, 'MD', 'Europe/Chisinau', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (328, 'DK', 'Europe/Copenhagen', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (329, 'IE', 'Europe/Dublin', '0.0', '1.0', '1.0');
INSERT INTO `timezones` VALUES (330, 'GI', 'Europe/Gibraltar', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (331, 'GG', 'Europe/Guernsey', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (332, 'FI', 'Europe/Helsinki', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (333, 'IM', 'Europe/Isle_of_Man', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (334, 'TR', 'Europe/Istanbul', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (335, 'JE', 'Europe/Jersey', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (336, 'RU', 'Europe/Kaliningrad', '2.0', '2.0', '2.0');
INSERT INTO `timezones` VALUES (337, 'UA', 'Europe/Kiev', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (338, 'RU', 'Europe/Kirov', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (339, 'PT', 'Europe/Lisbon', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (340, 'SI', 'Europe/Ljubljana', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (341, 'GB', 'Europe/London', '0.0', '1.0', '0.0');
INSERT INTO `timezones` VALUES (342, 'LU', 'Europe/Luxembourg', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (343, 'ES', 'Europe/Madrid', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (344, 'MT', 'Europe/Malta', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (345, 'AX', 'Europe/Mariehamn', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (346, 'BY', 'Europe/Minsk', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (347, 'MC', 'Europe/Monaco', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (348, 'RU', 'Europe/Moscow', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (349, 'NO', 'Europe/Oslo', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (350, 'FR', 'Europe/Paris', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (351, 'ME', 'Europe/Podgorica', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (352, 'CZ', 'Europe/Prague', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (353, 'LV', 'Europe/Riga', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (354, 'IT', 'Europe/Rome', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (355, 'RU', 'Europe/Samara', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (356, 'SM', 'Europe/San_Marino', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (357, 'BA', 'Europe/Sarajevo', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (358, 'RU', 'Europe/Saratov', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (359, 'RU', 'Europe/Simferopol', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (360, 'MK', 'Europe/Skopje', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (361, 'BG', 'Europe/Sofia', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (362, 'SE', 'Europe/Stockholm', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (363, 'EE', 'Europe/Tallinn', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (364, 'AL', 'Europe/Tirane', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (365, 'RU', 'Europe/Ulyanovsk', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (366, 'UA', 'Europe/Uzhgorod', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (367, 'LI', 'Europe/Vaduz', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (368, 'VA', 'Europe/Vatican', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (369, 'AT', 'Europe/Vienna', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (370, 'LT', 'Europe/Vilnius', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (371, 'RU', 'Europe/Volgograd', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (372, 'PL', 'Europe/Warsaw', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (373, 'HR', 'Europe/Zagreb', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (374, 'UA', 'Europe/Zaporozhye', '2.0', '3.0', '2.0');
INSERT INTO `timezones` VALUES (375, 'CH', 'Europe/Zurich', '1.0', '2.0', '1.0');
INSERT INTO `timezones` VALUES (376, 'MG', 'Indian/Antananarivo', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (377, 'IO', 'Indian/Chagos', '6.0', '6.0', '6.0');
INSERT INTO `timezones` VALUES (378, 'CX', 'Indian/Christmas', '7.0', '7.0', '7.0');
INSERT INTO `timezones` VALUES (379, 'CC', 'Indian/Cocos', '6.5', '6.5', '6.5');
INSERT INTO `timezones` VALUES (380, 'KM', 'Indian/Comoro', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (381, 'TF', 'Indian/Kerguelen', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (382, 'SC', 'Indian/Mahe', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (383, 'MV', 'Indian/Maldives', '5.0', '5.0', '5.0');
INSERT INTO `timezones` VALUES (384, 'MU', 'Indian/Mauritius', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (385, 'YT', 'Indian/Mayotte', '3.0', '3.0', '3.0');
INSERT INTO `timezones` VALUES (386, 'RE', 'Indian/Reunion', '4.0', '4.0', '4.0');
INSERT INTO `timezones` VALUES (387, 'WS', 'Pacific/Apia', '14.0', '13.0', '13.0');
INSERT INTO `timezones` VALUES (388, 'NZ', 'Pacific/Auckland', '13.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (389, 'PG', 'Pacific/Bougainville', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (390, 'NZ', 'Pacific/Chatham', '13.75', '12.75', '12.75');
INSERT INTO `timezones` VALUES (391, 'FM', 'Pacific/Chuuk', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (392, 'CL', 'Pacific/Easter', '-5.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (393, 'VU', 'Pacific/Efate', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (394, 'KI', 'Pacific/Enderbury', '13.0', '13.0', '13.0');
INSERT INTO `timezones` VALUES (395, 'TK', 'Pacific/Fakaofo', '13.0', '13.0', '13.0');
INSERT INTO `timezones` VALUES (396, 'FJ', 'Pacific/Fiji', '13.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (397, 'TV', 'Pacific/Funafuti', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (398, 'EC', 'Pacific/Galapagos', '-6.0', '-6.0', '-6.0');
INSERT INTO `timezones` VALUES (399, 'PF', 'Pacific/Gambier', '-9.0', '-9.0', '-9.0');
INSERT INTO `timezones` VALUES (400, 'SB', 'Pacific/Guadalcanal', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (401, 'GU', 'Pacific/Guam', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (402, 'US', 'Pacific/Honolulu', '-10.0', '-10.0', '-10.0');
INSERT INTO `timezones` VALUES (403, 'KI', 'Pacific/Kiritimati', '14.0', '14.0', '14.0');
INSERT INTO `timezones` VALUES (404, 'FM', 'Pacific/Kosrae', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (405, 'MH', 'Pacific/Kwajalein', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (406, 'MH', 'Pacific/Majuro', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (407, 'PF', 'Pacific/Marquesas', '-9.5', '-9.5', '-9.5');
INSERT INTO `timezones` VALUES (408, 'UM', 'Pacific/Midway', '-11.0', '-11.0', '-11.0');
INSERT INTO `timezones` VALUES (409, 'NR', 'Pacific/Nauru', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (410, 'NU', 'Pacific/Niue', '-11.0', '-11.0', '-11.0');
INSERT INTO `timezones` VALUES (411, 'NF', 'Pacific/Norfolk', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (412, 'NC', 'Pacific/Noumea', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (413, 'AS', 'Pacific/Pago_Pago', '-11.0', '-11.0', '-11.0');
INSERT INTO `timezones` VALUES (414, 'PW', 'Pacific/Palau', '9.0', '9.0', '9.0');
INSERT INTO `timezones` VALUES (415, 'PN', 'Pacific/Pitcairn', '-8.0', '-8.0', '-8.0');
INSERT INTO `timezones` VALUES (416, 'FM', 'Pacific/Pohnpei', '11.0', '11.0', '11.0');
INSERT INTO `timezones` VALUES (417, 'PG', 'Pacific/Port_Moresby', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (418, 'CK', 'Pacific/Rarotonga', '-10.0', '-10.0', '-10.0');
INSERT INTO `timezones` VALUES (419, 'MP', 'Pacific/Saipan', '10.0', '10.0', '10.0');
INSERT INTO `timezones` VALUES (420, 'PF', 'Pacific/Tahiti', '-10.0', '-10.0', '-10.0');
INSERT INTO `timezones` VALUES (421, 'KI', 'Pacific/Tarawa', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (422, 'TO', 'Pacific/Tongatapu', '13.0', '13.0', '13.0');
INSERT INTO `timezones` VALUES (423, 'UM', 'Pacific/Wake', '12.0', '12.0', '12.0');
INSERT INTO `timezones` VALUES (424, 'WF', 'Pacific/Wallis', '12.0', '12.0', '12.0');

-- ----------------------------
-- Table structure for user_provider_mapping
-- ----------------------------
DROP TABLE IF EXISTS `user_provider_mapping`;
CREATE TABLE `user_provider_mapping`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `UserId` int(0) NOT NULL,
  `ProviderId` int(0) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_provider_mapping
-- ----------------------------
INSERT INTO `user_provider_mapping` VALUES (1, 1, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (2, 2, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (3, 3, 2, 1);
INSERT INTO `user_provider_mapping` VALUES (4, 4, 3, 1);
INSERT INTO `user_provider_mapping` VALUES (5, 5, 4, 1);
INSERT INTO `user_provider_mapping` VALUES (6, 6, 5, 1);
INSERT INTO `user_provider_mapping` VALUES (7, 7, 6, 1);
INSERT INTO `user_provider_mapping` VALUES (8, 8, 8, 1);
INSERT INTO `user_provider_mapping` VALUES (10, 9, 9, 1);
INSERT INTO `user_provider_mapping` VALUES (11, 10, 10, 1);
INSERT INTO `user_provider_mapping` VALUES (12, 11, 11, 1);
INSERT INTO `user_provider_mapping` VALUES (13, 13, 12, 1);
INSERT INTO `user_provider_mapping` VALUES (14, 16, 15, 1);
INSERT INTO `user_provider_mapping` VALUES (15, 19, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (23, 27, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (24, 28, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (25, 29, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (26, 30, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (27, 31, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (28, 32, 1, 1);
INSERT INTO `user_provider_mapping` VALUES (29, 33, 1, 1);

-- ----------------------------
-- Table structure for usergrouprights
-- ----------------------------
DROP TABLE IF EXISTS `usergrouprights`;
CREATE TABLE `usergrouprights`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `GroupID` int(0) NOT NULL,
  `Resource` int(0) NOT NULL,
  `PermissionType` tinyint(0) NOT NULL,
  `CreatedBy` int(0) NOT NULL,
  `CreatedDate` datetime(0) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 160 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usergrouprights
-- ----------------------------
INSERT INTO `usergrouprights` VALUES (100, 2, 106, 1, 1, '2023-08-19 11:21:26');
INSERT INTO `usergrouprights` VALUES (101, 2, 106, 2, 1, '2023-08-19 11:21:26');
INSERT INTO `usergrouprights` VALUES (102, 2, 106, 3, 1, '2023-08-19 11:21:26');
INSERT INTO `usergrouprights` VALUES (103, 2, 106, 4, 1, '2023-08-19 11:21:26');
INSERT INTO `usergrouprights` VALUES (140, 1, 53, 1, 1, '2023-10-16 13:16:26');
INSERT INTO `usergrouprights` VALUES (141, 1, 53, 2, 1, '2023-10-16 13:16:26');
INSERT INTO `usergrouprights` VALUES (146, 6, 114, 3, 8, '2023-10-25 17:53:31');
INSERT INTO `usergrouprights` VALUES (147, 6, 114, 4, 8, '2023-10-25 17:53:31');
INSERT INTO `usergrouprights` VALUES (148, 1, 104, 1, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (149, 2, 104, 1, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (150, 1, 104, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (151, 2, 104, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (152, 1, 104, 3, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (153, 2, 104, 3, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (154, 1, 104, 4, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (155, 2, 104, 4, 1, '2023-10-26 16:31:27');
INSERT INTO `usergrouprights` VALUES (158, 1, 77, 3, 1, '2023-10-26 16:52:17');
INSERT INTO `usergrouprights` VALUES (159, 1, 77, 4, 1, '2023-10-26 16:52:17');

-- ----------------------------
-- Table structure for usergroups
-- ----------------------------
DROP TABLE IF EXISTS `usergroups`;
CREATE TABLE `usergroups`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `ProviderID` int(0) NOT NULL,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usergroups
-- ----------------------------
INSERT INTO `usergroups` VALUES (1, 1, 'Test', 'my info', 1, '2023-07-17 04:45:37', '2023-07-17 04:45:37');
INSERT INTO `usergroups` VALUES (2, 1, 'group2', 'group2 info', 1, '2023-08-18 17:29:56', '2023-08-18 17:29:56');
INSERT INTO `usergroups` VALUES (3, 1, 'zzzzz', 'kjkjk', 1, '2023-10-19 13:47:13', '2023-10-19 13:50:51');
INSERT INTO `usergroups` VALUES (4, 1, 'cxcx', 'xcxc', 1, '2023-10-20 17:06:03', '2023-10-20 17:06:03');
INSERT INTO `usergroups` VALUES (5, 1, 'group5', 'efef', 1, '2023-10-20 17:07:47', '2023-10-25 14:30:21');
INSERT INTO `usergroups` VALUES (6, 12, 'kk group', 'kk group info', 8, '2023-10-25 16:46:34', '2023-10-25 16:46:34');

-- ----------------------------
-- Table structure for userrights
-- ----------------------------
DROP TABLE IF EXISTS `userrights`;
CREATE TABLE `userrights`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `Resource` int(0) NOT NULL,
  `PermissionType` tinyint(0) NOT NULL,
  `UserID` int(0) NOT NULL,
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `CreatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 238 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of userrights
-- ----------------------------
INSERT INTO `userrights` VALUES (181, 106, 1, 2, 1, '2023-08-19 11:21:26');
INSERT INTO `userrights` VALUES (182, 106, 2, 2, 1, '2023-08-19 11:21:26');
INSERT INTO `userrights` VALUES (183, 106, 3, 2, 1, '2023-08-19 11:21:26');
INSERT INTO `userrights` VALUES (184, 106, 4, 2, 1, '2023-08-19 11:21:26');
INSERT INTO `userrights` VALUES (214, 53, 1, 1, 1, '2023-10-16 13:16:26');
INSERT INTO `userrights` VALUES (215, 53, 2, 2, 1, '2023-10-16 13:16:26');
INSERT INTO `userrights` VALUES (220, 104, 1, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (221, 104, 2, 1, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (222, 104, 2, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (223, 104, 3, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (224, 104, 3, 13, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (225, 104, 4, 1, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (226, 104, 4, 2, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (227, 104, 4, 13, 1, '2023-10-26 16:31:27');
INSERT INTO `userrights` VALUES (232, 10, 3, 13, 1, '2023-10-26 16:32:49');
INSERT INTO `userrights` VALUES (233, 10, 4, 13, 1, '2023-10-26 16:32:49');
INSERT INTO `userrights` VALUES (234, 77, 3, 5, 1, '2023-10-26 16:52:17');
INSERT INTO `userrights` VALUES (235, 77, 3, 13, 1, '2023-10-26 16:52:17');
INSERT INTO `userrights` VALUES (236, 77, 4, 5, 1, '2023-10-26 16:52:17');
INSERT INTO `userrights` VALUES (237, 77, 4, 13, 1, '2023-10-26 16:52:17');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `LoginName` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminLevel` tinyint(0) NOT NULL,
  `Description` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `EmailAddress` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `PhoneNumbers` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `ManageUsers` tinyint(1) NULL DEFAULT 0,
  `ManageFacilities` tinyint(1) NULL DEFAULT 0,
  `ManageSysSettings` tinyint(1) NULL DEFAULT 0,
  `CollectiveBookings` tinyint(1) NULL DEFAULT 0,
  `CancelBookings` tinyint(1) NULL DEFAULT 0,
  `CreatedBy` int(0) NULL DEFAULT NULL,
  `CreatedDate` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `email_verified_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `remember_token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `stripe_id` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pm_type` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pm_last_four` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trial_ends_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_stripe_id_index`(`stripe_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'sonu kumar pandit', '', '$2y$10$jLPXNwiyFaU0hghA3ipcSOwTQNdz89ycc1MhyZXycArveWLZfmlN6', 1, '', 'sonukumarpandit58@gmail.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-06-30 07:10:02', '2023-12-09 15:45:41', '2023-12-09 15:45:41', NULL, NULL, 'cus_P0hJS0ogDeHlBk', NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'Bhuwan Sharma', 'BhuwanSharma', '$2y$10$rRVOZR0MJA.boCrhgz8e3OOlxUVDGFS.WbOXF0cG55JTRVGug07OC', 1, NULL, 'bhuwanb@gmail.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-09-29 22:11:25', '2023-10-18 14:40:45', '2023-10-18 14:40:45', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'Bhuwan Sharma', '', '$2y$10$rRVOZR0MJA.boCrhgz8e3OOlxUVDGFS.WbOXF0cG55JTRVGug07OC', 1, '', 'bsharma@rucir.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-02 03:28:03', '2023-10-04 12:05:18', '2023-10-04 12:05:18', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'Bhuwan Sharma', '', '$2y$10$rRVOZR0MJA.boCrhgz8e3OOlxUVDGFS.WbOXF0cG55JTRVGug07OC', 1, '', 'bsharma@rucir.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-02 03:53:49', '2023-10-04 12:05:20', '2023-10-04 12:05:20', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'Nd Ware', '', '$2y$10$oFleJFpTPv2zMqmptzEETuSXwZ4DBB7ByOX7uAOjLBXEYtlkw6XIq', 1, '', 'narayandas1990@gmail.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-03 13:13:25', '2023-10-04 12:05:22', '2023-10-04 12:05:22', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'Subhash Ware', '', '$2y$10$oFleJFpTPv2zMqmptzEETuSXwZ4DBB7ByOX7uAOjLBXEYtlkw6XIq', 1, '', 'narayandas1990@gmail.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-03 13:40:49', '2023-10-04 12:05:23', '2023-10-04 12:05:23', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'subhash chandra', '', '$2y$10$rRVOZR0MJA.boCrhgz8e3OOlxUVDGFS.WbOXF0cG55JTRVGug07OC', 1, '', 'subhash.chandra@nware.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-03 18:51:54', '2023-10-04 12:05:26', '2023-10-04 12:05:26', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'subhash chandra', '', '$2y$10$AWiKdMf2Yyp2Wp4O.wcjDOfxb3ddn3iUx8R1khT8U2IyX0WwsDnRK', 1, '', 'Subhash.Chandra@nwaresoft.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-03 19:30:08', '2023-11-22 15:09:37', '2023-11-22 15:09:37', NULL, NULL, 'cus_P3JXYJIrGOFRiV', NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'org2Fname org2Lname', '', '$2y$10$AWiKdMf2Yyp2Wp4O.wcjDOfxb3ddn3iUx8R1khT8U2IyX0WwsDnRK', 2, '', 'Subhash.Chandra@nwaresoft.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-13 11:10:08', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'org3Fname org3Lname', '', '$2y$10$AWiKdMf2Yyp2Wp4O.wcjDOfxb3ddn3iUx8R1khT8U2IyX0WwsDnRK', 2, '', 'Subhash.Chandra@nwaresoft.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-13 11:31:19', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'org4F org4L', '', '$2y$10$AWiKdMf2Yyp2Wp4O.wcjDOfxb3ddn3iUx8R1khT8U2IyX0WwsDnRK', 2, '', 'Subhash.Chandra@nwaresoft.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-13 17:40:58', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'jj', 'aaaa', '$2y$10$AWiKdMf2Yyp2Wp4O.wcjDOfxb3ddn3iUx8R1khT8U2IyX0WwsDnRK', 2, NULL, 'Subhash.Chandra@nwaresoft.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-13 23:25:58', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, 'cus_P1Md7uCBawTeWe', NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'subhash ', '', '$2y$10$0M4cEwT5WBEaLh3p9dM7MOGpKUa./P.OczJv5Q1L0p//61Fi0Z68i', 2, '', 'subhash@nware.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-15 20:46:52', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'test ', '', '', 2, '', 'te@te.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-16 10:47:08', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'test2 ', '', '$2y$10$VdFmvEWi6i24ImDr8fW1UOv2t8.V6qqK6lqA9JUmijNeuf8K6phFm', 2, '', 'test2@test2.com', '', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-16 10:52:21', '2023-12-01 12:29:11', '2023-12-01 12:29:11', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'test3', 'test3', '1234567890', 2, 'desc', 'test3@test3.com', '1234567890', 1, 1, 1, 1, 1, NULL, NULL, '2023-10-19 11:25:11', '2023-11-15 12:27:50', '2023-11-15 12:27:50', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (27, 'test11', 'test11', '1234567890', 2, 'desc', 'test11@test11.com', '1234567890', 0, 0, 0, 0, 0, NULL, NULL, '2023-10-19 12:02:06', '2023-10-19 12:02:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (28, 'test121', 'test121', '$2y$10$VD5M2WMHHili19EqXKr0..W6TVv1nO/bf2m3JH8ARgy901cjYocw6', 1, NULL, 'test212@test2.com', NULL, 1, 1, 0, 0, 0, NULL, NULL, '2023-10-19 12:07:44', '2023-10-20 15:16:19', '2023-10-20 15:16:19', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (29, 'test121', 'test121', '1234567890', 1, NULL, 'test212@test2.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-19 12:11:28', '2023-10-19 12:11:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 'sadasd', 'ada', 'password', 1, NULL, 'a@a.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-19 12:13:03', '2023-10-19 12:13:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (31, 'sadasd', 'ada', '$2y$10$242hh7bNzIIPTZbTdDx6ROd.dSS5CCuzo38OwsdLzKn2j5EQ9gQha', 1, NULL, 'a@a.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-19 12:22:11', '2023-10-19 12:22:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (32, 'sadasd', 'ada', '$2y$10$4hkM1H.8BINSPIOdGIxNt.7EgZ.i0ipdpiAgCGlYKeOOmVYV3DP4q', 1, NULL, 'a@a.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-19 12:26:55', '2023-10-19 12:26:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 'tt', 'tt', '$2y$10$qUOsFOlUUNb3i5KFCeiLjeatjl2qpRuH1uhcsldELXqMX2uR7Kwpu', 2, NULL, 'tt@tt.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-20 15:46:19', '2023-10-20 15:46:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 'Super Admin', 'tt', '$2y$10$qUOsFOlUUNb3i5KFCeiLjeatjl2qpRuH1uhcsldELXqMX2uR7Kwpu', 0, NULL, 'superadmin@superadmin.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-20 15:46:19', '2023-12-09 19:56:31', '2023-12-09 19:56:31', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (35, 'Admin', 'tt', '$2y$10$SdnsozVFw3wxGWyePMujmOH4qCLnYnRjshJhmexp1Gb0mz.tItKvu', 1, NULL, 'admin@admin.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-20 15:46:19', '2023-12-11 13:43:08', '2023-12-11 13:43:08', 'x50ZSnsTS7jSVm2yDNLfUdZz0ZaAi9ib2ggGYIUquzAm2pfr8jvLVzKivqfJ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (36, 'User', 'tt', '$2y$10$SdnsozVFw3wxGWyePMujmOH4qCLnYnRjshJhmexp1Gb0mz.tItKvu', 2, NULL, 'user@user.com', NULL, 0, 0, 0, 0, 0, NULL, NULL, '2023-10-20 15:46:19', '2023-12-11 01:03:53', '2023-12-11 01:03:53', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for usersingroups
-- ----------------------------
DROP TABLE IF EXISTS `usersingroups`;
CREATE TABLE `usersingroups`  (
  `ID` int(0) NOT NULL AUTO_INCREMENT,
  `UserID` int(0) NOT NULL,
  `GroupID` int(0) NOT NULL,
  `Participation` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usersingroups
-- ----------------------------
INSERT INTO `usersingroups` VALUES (1, 27, 2, '');
INSERT INTO `usersingroups` VALUES (9, 28, 2, '');
INSERT INTO `usersingroups` VALUES (10, 28, 3, '');
INSERT INTO `usersingroups` VALUES (11, 33, 1, '');
INSERT INTO `usersingroups` VALUES (12, 33, 2, '');
INSERT INTO `usersingroups` VALUES (13, 2, 4, '');
INSERT INTO `usersingroups` VALUES (14, 19, 4, '');
INSERT INTO `usersingroups` VALUES (15, 1, 5, '');
INSERT INTO `usersingroups` VALUES (16, 2, 5, '');
INSERT INTO `usersingroups` VALUES (17, 19, 5, '');
INSERT INTO `usersingroups` VALUES (18, 27, 5, '');
INSERT INTO `usersingroups` VALUES (19, 28, 5, '');
INSERT INTO `usersingroups` VALUES (20, 13, 6, '');

-- ----------------------------
-- Table structure for usertype
-- ----------------------------
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE `usertype`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `userType` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Active` tinyint(0) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usertype
-- ----------------------------
INSERT INTO `usertype` VALUES (1, 'Admin', 1);
INSERT INTO `usertype` VALUES (2, 'General', 1);

SET FOREIGN_KEY_CHECKS = 1;
