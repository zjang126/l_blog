/*
Navicat MySQL Data Transfer

Source Server         : aaa
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lblog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-25 23:26:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT '' COMMENT '分类名',
  `cate_title` varchar(100) DEFAULT '' COMMENT '分类描述',
  `cate_keywords` varchar(255) DEFAULT '' COMMENT '关键字',
  `cate_description` varchar(255) DEFAULT '' COMMENT '搜索引擎描述',
  `cate_view` int(10) DEFAULT '0' COMMENT '阅读数',
  `cate_order` tinyint(10) DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) DEFAULT '0' COMMENT '上级分类',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='文章分类';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', 'PHP', '', '', '', '0', '1', '0');
INSERT INTO `blog_category` VALUES ('2', 'JavaScript', '', '', '', '0', '2', '0');
INSERT INTO `blog_category` VALUES ('3', 'Mysql', '', '', '', '0', '3', '0');
INSERT INTO `blog_category` VALUES ('4', 'Linux', '', '', '', '0', '9', '0');
INSERT INTO `blog_category` VALUES ('5', 'php笔记', '', '', '', '0', '2', '1');
INSERT INTO `blog_category` VALUES ('6', 'js笔记', '', '', '', '0', '6', '2');
INSERT INTO `blog_category` VALUES ('7', 'php框架', '', '', '', '0', '3', '1');
INSERT INTO `blog_category` VALUES ('8', 'mysql笔记', '', '', '', '0', '8', '3');
INSERT INTO `blog_category` VALUES ('9', 'linux常用指令', '', '', '', '0', '10', '4');
INSERT INTO `blog_category` VALUES ('10', 'php常用指令', '', '', '', '0', '4', '1');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `user_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(255) DEFAULT '' COMMENT 'password',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'siki', 'eyJpdiI6ImJ6Z1RGWE1GbGV4Nm1WVGN6aVYrMFE9PSIsInZhbHVlIjoiUVRpM1F5S2drXC9pYm5cL1wvaXJXWXNVZz09IiwibWFjIjoiZmNmNGI5YjQ5ZTdjZjcxZjM1OWIxN2RlNzRhMzg5YzhhMzIyMGM0ZGM2NTkwY2E2M2Q4MzczMWJiOTIxZGFlYyJ9');
