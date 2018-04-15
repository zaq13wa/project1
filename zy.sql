# Host: localhost  (Version: 5.5.53)
# Date: 2018-04-15 19:19:23
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "zy_file"
#

DROP TABLE IF EXISTS `zy_file`;
CREATE TABLE `zy_file` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) DEFAULT NULL COMMENT '文件路径',
  `pid` int(11) DEFAULT NULL COMMENT '项目id',
  `uid` int(11) DEFAULT NULL COMMENT '学生id',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "zy_file"
#

/*!40000 ALTER TABLE `zy_file` DISABLE KEYS */;
INSERT INTO `zy_file` VALUES (1,NULL,1,2),(2,NULL,1,2);
/*!40000 ALTER TABLE `zy_file` ENABLE KEYS */;

#
# Structure for table "zy_group"
#

DROP TABLE IF EXISTS `zy_group`;
CREATE TABLE `zy_group` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0' COMMENT '上级 0为专业',
  `tid` int(11) DEFAULT NULL COMMENT '老师id',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "zy_group"
#

/*!40000 ALTER TABLE `zy_group` DISABLE KEYS */;
INSERT INTO `zy_group` VALUES (1,'计算机',0,NULL),(2,'计算机152',1,1),(3,'计算机151',1,1);
/*!40000 ALTER TABLE `zy_group` ENABLE KEYS */;

#
# Structure for table "zy_groupwork"
#

DROP TABLE IF EXISTS `zy_groupwork`;
CREATE TABLE `zy_groupwork` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT '班级id',
  `pid` int(11) DEFAULT NULL COMMENT '作业id',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "zy_groupwork"
#

/*!40000 ALTER TABLE `zy_groupwork` DISABLE KEYS */;
INSERT INTO `zy_groupwork` VALUES (1,2,1);
/*!40000 ALTER TABLE `zy_groupwork` ENABLE KEYS */;

#
# Structure for table "zy_project"
#

DROP TABLE IF EXISTS `zy_project`;
CREATE TABLE `zy_project` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `text` varchar(255) DEFAULT NULL COMMENT '内容',
  `tid` int(11) DEFAULT NULL COMMENT '老师id',
  `time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '截止日期',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "zy_project"
#

/*!40000 ALTER TABLE `zy_project` DISABLE KEYS */;
INSERT INTO `zy_project` VALUES (1,'111',NULL,1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `zy_project` ENABLE KEYS */;

#
# Structure for table "zy_user"
#

DROP TABLE IF EXISTS `zy_user`;
CREATE TABLE `zy_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT '0' COMMENT '班级id 0为老师',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "zy_user"
#

/*!40000 ALTER TABLE `zy_user` DISABLE KEYS */;
INSERT INTO `zy_user` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',0),(2,'111',NULL,2),(3,'213',NULL,2);
/*!40000 ALTER TABLE `zy_user` ENABLE KEYS */;
