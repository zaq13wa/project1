# Host: localhost  (Version: 5.5.53)
# Date: 2018-06-19 18:37:34
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
  `time` date DEFAULT '0000-00-00' COMMENT '提交时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "zy_file"
#

/*!40000 ALTER TABLE `zy_file` DISABLE KEYS */;
INSERT INTO `zy_file` VALUES (16,'public/uploads/20180612\\348f04cce590ca9fb2e5a6dc7f59024b.doc',41,15,'2018-06-12');
/*!40000 ALTER TABLE `zy_file` ENABLE KEYS */;

#
# Structure for table "zy_group"
#

DROP TABLE IF EXISTS `zy_group`;
CREATE TABLE `zy_group` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0' COMMENT '上级 0为分类',
  `tid` int(11) DEFAULT NULL COMMENT '老师id',
  `leader` varchar(255) DEFAULT NULL COMMENT '班长',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "zy_group"
#

/*!40000 ALTER TABLE `zy_group` DISABLE KEYS */;
INSERT INTO `zy_group` VALUES (1,'高等数学',0,NULL,NULL),(2,'大学英语',0,NULL,NULL),(3,'C语言',0,NULL,NULL),(4,'线性代数',0,NULL,NULL),(5,'数据结构',0,NULL,NULL),(6,'组成原理',0,NULL,NULL),(7,'计算机151',1,1,NULL),(8,'计算机152',2,1,NULL),(11,'计算机153',3,1,NULL),(12,'信息管理152',5,1,NULL),(13,'信息管理153',5,1,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

#
# Data for table "zy_groupwork"
#

/*!40000 ALTER TABLE `zy_groupwork` DISABLE KEYS */;
INSERT INTO `zy_groupwork` VALUES (129,12,41),(130,13,41),(136,8,40),(140,7,1),(141,12,2),(142,13,2);
/*!40000 ALTER TABLE `zy_groupwork` ENABLE KEYS */;

#
# Structure for table "zy_msg"
#

DROP TABLE IF EXISTS `zy_msg`;
CREATE TABLE `zy_msg` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `text` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

#
# Data for table "zy_msg"
#

/*!40000 ALTER TABLE `zy_msg` DISABLE KEYS */;
INSERT INTO `zy_msg` VALUES (63,8,15,'老师好','2018-06-12 17:02:15'),(64,12,15,'老师好','2018-06-12 17:02:22');
/*!40000 ALTER TABLE `zy_msg` ENABLE KEYS */;

#
# Structure for table "zy_project"
#

DROP TABLE IF EXISTS `zy_project`;
CREATE TABLE `zy_project` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `text` text COMMENT '内容',
  `tid` int(11) DEFAULT NULL COMMENT '老师id',
  `time` date DEFAULT '0000-00-00' COMMENT '截止日期',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

#
# Data for table "zy_project"
#

/*!40000 ALTER TABLE `zy_project` DISABLE KEYS */;
INSERT INTO `zy_project` VALUES (1,'习题1','<p>dwawadwadwa</p>',1,'2018-05-25'),(2,'二叉树2','<p>dwadwadwadwadaaaaaaaa</p>',1,'2018-05-19'),(40,'是的发生的','<p>啥都吃撒打算1</p>',1,'2018-06-02'),(41,'aaa','<p>assss</p>',1,'2018-06-29');
/*!40000 ALTER TABLE `zy_project` ENABLE KEYS */;

#
# Structure for table "zy_user"
#

DROP TABLE IF EXISTS `zy_user`;
CREATE TABLE `zy_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT '1' COMMENT '0为老师',
  `stuid` varchar(255) DEFAULT NULL COMMENT '学号',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "zy_user"
#

/*!40000 ALTER TABLE `zy_user` DISABLE KEYS */;
INSERT INTO `zy_user` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',0,'198658542356','男','13754658524'),(2,'111','e10adc3949ba59abbe56e057f20f883e',1,'201505010228','男','15978642223'),(15,'aaa','e10adc3949ba59abbe56e057f20f883e',1,'201505010229','男','15967162822'),(16,'邓飞','e10adc3949ba59abbe56e057f20f883e',0,'2001020310249','男','16784568241');
/*!40000 ALTER TABLE `zy_user` ENABLE KEYS */;

#
# Structure for table "zy_usergroup"
#

DROP TABLE IF EXISTS `zy_usergroup`;
CREATE TABLE `zy_usergroup` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '学生id',
  `gid` int(11) DEFAULT NULL COMMENT '班级id',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "zy_usergroup"
#

/*!40000 ALTER TABLE `zy_usergroup` DISABLE KEYS */;
INSERT INTO `zy_usergroup` VALUES (1,2,7),(2,1,7),(4,2,8),(5,15,12),(6,15,8);
/*!40000 ALTER TABLE `zy_usergroup` ENABLE KEYS */;
