/*
Navicat MySQL Data Transfer

Source Server         : ActivitOrder
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : activitorder

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-10 16:57:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activitylist
-- ----------------------------
DROP TABLE IF EXISTS `activitylist`;
CREATE TABLE `activitylist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Cost` varchar(255) DEFAULT NULL,
  `Status` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `Tag` text,
  `Logo` varchar(255) NOT NULL,
  `Desc` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activitylist
-- ----------------------------
INSERT INTO `activitylist` VALUES ('1', '2017拓景崇明定向123', '1', '1', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('2', '2017拓景崇明定向123', '1', '2', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('3', '2017拓景崇明定向aaas', '1', '3', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('4', '2017拓景崇明定向asdf', '1', '4', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('5', '2017拓景崇明定向asfa', '1', '4', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('6', '2017拓景崇明定向adsf', '1', '234', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('7', '2017拓景崇明定向asdf', '1', '234', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('8', '2017拓景崇明定向adf', '1', '234', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('9', '2017拓景崇明定向', '1', '123', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('10', '2017拓景崇明定向', '1', '23', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('11', '2017拓景崇明定向', '1', '342', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('12', '2017拓景崇明定向', '1', '2', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('13', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('14', '2017拓景崇明定向', '1', '2', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('15', '2017拓景崇明定向', '1', '3', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('16', '2017拓景崇明定向', '1', '2', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('17', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('18', '2017拓景崇明定向', '1', '2', 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('19', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('20', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('21', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('22', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('23', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('24', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('25', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('26', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('27', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('28', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('29', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('30', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('31', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('32', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('33', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('34', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('35', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('36', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('37', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('38', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('39', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('40', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('41', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('42', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
INSERT INTO `activitylist` VALUES ('43', '2017拓景崇明定向', '1', null, 'NO', '2017-03-01 15:50:36', '2017-03-01 23:59:59', null, '', '');
