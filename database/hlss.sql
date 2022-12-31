/*
Navicat MySQL Data Transfer

Source Server         : RDS-MINIT
Source Server Version : 50738
Source Host           : rm-bp1923307guk6ks3fxo.mysql.rds.aliyuncs.com:3306
Source Database       : hlss

Target Server Type    : MYSQL
Target Server Version : 50738
File Encoding         : 65001

Date: 2022-12-31 14:56:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `badsleep`
-- ----------------------------
DROP TABLE IF EXISTS `badsleep`;
CREATE TABLE `badsleep` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `SleepNumber` int(5) NOT NULL COMMENT '寝室编号',
  `Class` int(5) NOT NULL COMMENT '寝室所在班级',
  `Time` int(255) DEFAULT NULL COMMENT '记录时间',
  `Teacher` varchar(10) DEFAULT NULL COMMENT '记录教师',
  `SleepType` varchar(10) DEFAULT NULL COMMENT '寝室类型',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优寝';

-- ----------------------------
-- Records of badsleep
-- ----------------------------

-- ----------------------------
-- Table structure for `cache`
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(10) DEFAULT NULL,
  `TextReason` varchar(50) DEFAULT NULL,
  `ImgReason` varchar(255) DEFAULT NULL,
  `TeacherName` varchar(10) DEFAULT NULL,
  `Class` varchar(3) NOT NULL,
  `DeductPoints` varchar(10) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `State` varchar(10) NOT NULL,
  `ticketNumber` varchar(20) NOT NULL,
  `tickettype` varchar(20) NOT NULL DEFAULT 'common' COMMENT '罚单类型',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Class` int(5) NOT NULL COMMENT '班级编号',
  `Score` int(10) DEFAULT '100' COMMENT '班级总分',
  `class_master` varchar(30) NOT NULL COMMENT '班主任账号',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001', '126', '103', '1001');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002', '127', '100', '1002');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000003', '120', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000004', '121', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000016', '134', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000017', '116', '100', '2011');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000018', '117', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000019', '118', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000020', '119', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021', '122', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000022', '123', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000023', '124', '100', '1004');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000024', '125', '100', '1003');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000025', '128', '100', '1015');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000026', '129', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000027', '130', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000028', '131', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000029', '132', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000030', '133', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000031', '135', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000032', '136', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000033', '137', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000034', '138', '100', '');
INSERT INTO `class` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000035', '139', '100', '1012');

-- ----------------------------
-- Table structure for `goodsleep`
-- ----------------------------
DROP TABLE IF EXISTS `goodsleep`;
CREATE TABLE `goodsleep` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `SleepNumber` int(5) NOT NULL COMMENT '寝室编号',
  `Class` int(5) NOT NULL COMMENT '寝室所在班级',
  `Time` int(255) DEFAULT NULL COMMENT '记录时间',
  `Teacher` varchar(10) DEFAULT NULL COMMENT '记录教师',
  `SleepType` varchar(10) NOT NULL COMMENT '寝室类型',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优寝';

-- ----------------------------
-- Records of goodsleep
-- ----------------------------

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000039', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000057', '0011', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000058', '1001', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000059', '1002', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000060', '1003', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000061', '1004', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000062', '2001', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000063', '2002', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000064', '3001', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `login` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000065', '5001', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- Table structure for `register`
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `week_number` int(255) NOT NULL COMMENT '结算周次',
  `week_time` int(255) DEFAULT NULL COMMENT '上次结算时间',
  `update_password_state` varchar(10) NOT NULL COMMENT '修改密码服务',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001', '2', '1671942702', 'true');

-- ----------------------------
-- Table structure for `tickets`
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(10) DEFAULT NULL,
  `TextReason` varchar(50) DEFAULT NULL,
  `ImgReason` varchar(255) DEFAULT NULL,
  `TeacherName` varchar(10) DEFAULT NULL,
  `Class` varchar(3) NOT NULL,
  `DeductPoints` varchar(10) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `State` varchar(10) NOT NULL DEFAULT 'Flase' COMMENT '罚单状态',
  `ticketNumber` varchar(20) NOT NULL,
  `tickettype` varchar(10) NOT NULL DEFAULT 'common' COMMENT '罚单类型',
  `class_master_state` varchar(10) NOT NULL DEFAULT 'false' COMMENT '班主任已读',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000025', '王灿锦', '重大违纪', 'flase', '超级管理员', '126', '5', '1669337039', 'True', '4018', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000026', '张砚茹', '非正常接触', 'flase', '梁文捷', '127', '30', '1669526029', 'True', '2313', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000027', '周中举', '测试', 'flase', '梁文捷', '127', '5', '1669948135', 'True', '3722', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000028', '张玉龙', '非处', 'flase', '梁文捷', '128', '5', '1669949984', 'True', '1613', 'major', 'false');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000029', '张玉龙', '非处', 'flase', '梁文捷', '129', '5', '1669950212', 'True', '4025', 'common', 'false');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000030', '张玉龙', '测试', 'flase', '梁文捷', '124', '5', '1669950218', 'True', '7460', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000031', '刘杰', '吃的太多', 'flase', '梁文捷', '126', '30', '1669950297', 'True', '3000', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000032', '张三', '把数据库连接信息上传到了GitHub', 'flase', '超级管理员', '116', '100', '1670123884', 'True', '5395', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000033', '王灿锦', '好人一生平安', 'flase', '超级管理员', '126', '5', '1670159740', 'True', '4146', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000034', '王灿锦', '非正常接触', 'flase', '超级管理员', '126', '30', '1670312870', 'True', '8955', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000035', '王灿锦', '已读测试', 'flase', '超级管理员', '126', '5', '1670577264', 'True', '2852', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000037', '王灿锦', '已读测试', 'flase', '超级管理员', '127', '5', '1670577296', 'True', '5462', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000038', '张砚茹', '测试', 'flase', '超级管理员', '127', '5', '1670597238', 'True', '3302', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000039', '王灿锦', '结算测试', 'flase', '超级管理员', '126', '5', '1670639985', 'True', '7726', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000040', '王灿锦', '上线测试', 'flase', '梁文捷', '126', '2', '1670899878', 'True', '1646', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000041', '王灿锦', '太帅了', 'flase', '穆森', '126', '999', '1670904687', 'True', '3111', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000042', '王灿锦', '太帅', 'flase', '穆森', '126', '999', '1670904747', 'True', '2415', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000043', '王灿锦', '太帅', 'flase', '穆森', '126', '999', '1670904813', 'True', '3113', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000044', '王灿锦', '测试', 'flase', '超级管理员', '127', '5', '1670907515', 'True', '1825', 'major', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000045', '王灿锦', '测试', 'flase', '超级管理员', '121', '5', '1670907540', 'True', '8049', 'common', 'false');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000046', '王灿锦', '测试', 'flase', '梁文捷', '126', '5', '1671066951', 'True', '4696', 'common', 'True');
INSERT INTO `tickets` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000047', '王灿锦', '测试', 'flase', '梁文捷', '126', '5', '1671179601', 'True', '5845', 'major', 'True');

-- ----------------------------
-- Table structure for `unionhygene`
-- ----------------------------
DROP TABLE IF EXISTS `unionhygene`;
CREATE TABLE `unionhygene` (
  `Class` int(5) NOT NULL COMMENT '班级编号',
  `Area` int(3) NOT NULL DEFAULT '20' COMMENT '清洁区',
  `Classroom` int(3) NOT NULL DEFAULT '15' COMMENT '教室',
  `Score` int(5) NOT NULL DEFAULT '35' COMMENT '学生会卫生部总分',
  PRIMARY KEY (`Class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of unionhygene
-- ----------------------------
INSERT INTO `unionhygene` VALUES ('116', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('117', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('118', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('119', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('120', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('121', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('122', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('123', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('124', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('125', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('126', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('127', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('128', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('129', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('130', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('131', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('132', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('133', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('134', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('135', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('136', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('137', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('138', '20', '15', '35');
INSERT INTO `unionhygene` VALUES ('139', '20', '15', '35');

-- ----------------------------
-- Table structure for `unionhygene_reason`
-- ----------------------------
DROP TABLE IF EXISTS `unionhygene_reason`;
CREATE TABLE `unionhygene_reason` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Class` int(5) NOT NULL COMMENT '班级编码',
  `TextReason` varchar(20) DEFAULT NULL,
  `Time` int(255) DEFAULT NULL COMMENT '时间',
  `Point` int(5) DEFAULT '0' COMMENT '扣除分数',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of unionhygene_reason
-- ----------------------------
INSERT INTO `unionhygene_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002', '126', '黑板没擦', '1668873533', '5');
INSERT INTO `unionhygene_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000003', '126', '测试', '1669522013', '5');
INSERT INTO `unionhygene_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000004', '116', '测试', '1670907627', '5');

-- ----------------------------
-- Table structure for `unionsport`
-- ----------------------------
DROP TABLE IF EXISTS `unionsport`;
CREATE TABLE `unionsport` (
  `Class` int(5) NOT NULL COMMENT '班级编号',
  `StandardBearer` int(3) NOT NULL DEFAULT '10' COMMENT '旗手',
  `Queue` int(3) NOT NULL DEFAULT '15' COMMENT '队列',
  `Slogan` int(3) NOT NULL DEFAULT '15' COMMENT '口号分贝',
  `Score` int(5) NOT NULL DEFAULT '40' COMMENT '学生会体育部总分',
  PRIMARY KEY (`Class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of unionsport
-- ----------------------------
INSERT INTO `unionsport` VALUES ('116', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('117', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('118', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('119', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('120', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('121', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('122', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('123', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('124', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('125', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('126', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('127', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('128', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('129', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('130', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('131', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('132', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('133', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('134', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('135', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('136', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('137', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('138', '10', '15', '15', '40');
INSERT INTO `unionsport` VALUES ('139', '10', '15', '15', '40');

-- ----------------------------
-- Table structure for `unionsport_reason`
-- ----------------------------
DROP TABLE IF EXISTS `unionsport_reason`;
CREATE TABLE `unionsport_reason` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Class` int(5) NOT NULL COMMENT '班级编码',
  `TextReason` varchar(20) DEFAULT NULL,
  `Time` int(255) DEFAULT NULL COMMENT '扣分事件',
  `Point` int(5) NOT NULL COMMENT '扣除分数',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of unionsport_reason
-- ----------------------------
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000015', '126', '步伐不齐', '1668873512', '5');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000016', '116', '测试', '1669345994', '3');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000017', '126', '测试', '1669521734', '3');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000018', '126', '测试', '1669521894', '1');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000019', '126', '王灿锦太帅了', '1670248009', '5');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000020', '122', '跑操讲话', '1670302416', '3');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021', '116', '测试', '1670907600', '5');
INSERT INTO `unionsport_reason` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000022', '117', '最后一排不整齐', '1671027034', '5');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `teachername` varchar(20) DEFAULT NULL,
  `limits` text,
  `Index` varchar(50) DEFAULT NULL COMMENT '用户主页',
  `class_number` int(10) NOT NULL DEFAULT '0' COMMENT '班主任账号_班级编号',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000023', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '超级管理员', 'account  admin', 'admin/index.html?nav=service&page=system', '0');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000041', '0011', '81dc9bdb52d04dc20036dbd8313ed055', 'politics', '梁文东', 'account  politics', 'politics/index.php?page=consolemodule', '0');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000042', '1001', '81dc9bdb52d04dc20036dbd8313ed055', 'classmaster', '梁文婕', 'account  class', 'classmaster/index.html', '126');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000043', '1002', '81dc9bdb52d04dc20036dbd8313ed055', 'classmaster', '戚世庭', 'account  class', 'classmaster/index.html', '127');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000044', '1003', '81dc9bdb52d04dc20036dbd8313ed055', 'classmaster', '王来强', 'account  class', 'classmaster/index.html', '125');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000045', '1004', '81dc9bdb52d04dc20036dbd8313ed055', 'classmaster', '夏金强', 'account  class', 'classmaster/index.html', '124');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000046', '2001', '81dc9bdb52d04dc20036dbd8313ed055', 'unionsport', '刘兴驰', 'account  union', 'unionstudent/index.php', '0');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000047', '2002', '81dc9bdb52d04dc20036dbd8313ed055', 'unionhygene', '周子惠', 'account  union', 'unionstudent/index.php', '0');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000048', '3001', '81dc9bdb52d04dc20036dbd8313ed055', 'sleep', '寝管', 'account  sleep', 'sleep/index.php', '0');
INSERT INTO `user` VALUES ('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000049', '5001', '81dc9bdb52d04dc20036dbd8313ed055', 'teacher', '王明亮', 'account  recordTicket', 'ticket/recordTicket.php', '0');

-- ----------------------------
-- Table structure for `week`
-- ----------------------------
DROP TABLE IF EXISTS `week`;
CREATE TABLE `week` (
  `ID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(10) DEFAULT NULL,
  `TextReason` varchar(50) DEFAULT NULL,
  `ImgReason` varchar(255) DEFAULT NULL,
  `TeacherName` varchar(10) DEFAULT NULL,
  `Class` varchar(3) NOT NULL,
  `DeductPoints` varchar(10) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `State` varchar(10) NOT NULL DEFAULT 'Flase' COMMENT '罚单状态',
  `ticketNumber` varchar(20) NOT NULL,
  `tickettype` varchar(10) NOT NULL DEFAULT 'common' COMMENT '罚单类型',
  `class_master_state` varchar(10) NOT NULL DEFAULT 'false' COMMENT '班主任已读',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of week
-- ----------------------------