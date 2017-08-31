/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lblog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-31 23:16:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '' COMMENT '//文章标题',
  `art_tag` varchar(100) DEFAULT '' COMMENT '//关键词',
  `art_description` varchar(255) DEFAULT '' COMMENT '//描述',
  `art_thumb` varchar(255) DEFAULT '' COMMENT '//缩略图',
  `art_content` text COMMENT '//内容',
  `art_time` int(11) DEFAULT '0' COMMENT '//发布时间',
  `art_editor` varchar(50) DEFAULT '' COMMENT '//作者',
  `art_view` int(11) DEFAULT '0' COMMENT '//查看次数',
  `cate_id` int(11) DEFAULT '0' COMMENT '//分类id',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='//文章';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('27', 'dgdfgdrg', 'sdfasdaf', 'asdfasdf', 'uploads/20170831084512570.jpg', '<p>sdafasf<br/></p>', '1504140179', 'gdfgds', '0', '7');
INSERT INTO `blog_article` VALUES ('28', 'test', '', '', 'uploads/20170831213556299.jpg', '<p>aa<br/></p>', '1504186195', 'qqq', '0', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='文章分类';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', 'PHP', 'a', '', '', '0', '1', '0');
INSERT INTO `blog_category` VALUES ('2', 'JavaScript', '', '', '', '0', '2', '0');
INSERT INTO `blog_category` VALUES ('3', 'Mysql', '', '', '', '0', '3', '0');
INSERT INTO `blog_category` VALUES ('4', 'Linux', '', '', '', '0', '9', '0');
INSERT INTO `blog_category` VALUES ('5', 'php笔记', 'a', '', '', '0', '2', '1');
INSERT INTO `blog_category` VALUES ('6', 'js笔记', '', '', '', '0', '6', '2');
INSERT INTO `blog_category` VALUES ('7', 'php框架', '', '', '', '0', '3', '1');
INSERT INTO `blog_category` VALUES ('8', 'mysql笔记', '', '', '', '0', '8', '3');
INSERT INTO `blog_category` VALUES ('9', 'linux常用指令', '', '', '', '0', '10', '4');
INSERT INTO `blog_category` VALUES ('10', 'php常用指令', '', '', '', '0', '4', '1');

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `conf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT '',
  `conf_name` varchar(50) DEFAULT '',
  `conf_content` text,
  `conf_order` int(11) DEFAULT '0',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '描述',
  `field_type` varchar(50) DEFAULT '' COMMENT '字段类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '类型值',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_config
-- ----------------------------
INSERT INTO `blog_config` VALUES ('2', '网站标题', 'web_title', 'lbog.net', '0', 'aaa', 'input', '');
INSERT INTO `blog_config` VALUES ('3', '统计代码', 'web_count', 'aa', '2', 'bbba', 'textarea', '');
INSERT INTO `blog_config` VALUES ('8', 'test', 'test', '1', '1', 'a', 'radio', '1|开启,0|关闭');

-- ----------------------------
-- Table structure for blog_links
-- ----------------------------
DROP TABLE IF EXISTS `blog_links`;
CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//链接',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_links
-- ----------------------------
INSERT INTO `blog_links` VALUES ('1', '百度', '国内口碑最好的搜索引擎', 'https://www.baidu.com', '3');
INSERT INTO `blog_links` VALUES ('4', '搜狐', '国内口碑最好的搜索blog', 'https://www.souhu.com', '1');

-- ----------------------------
-- Table structure for blog_migrations
-- ----------------------------
DROP TABLE IF EXISTS `blog_migrations`;
CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_migrations
-- ----------------------------
INSERT INTO `blog_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `blog_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `blog_migrations` VALUES ('2017_08_31_090324_create_links_table', '1');

-- ----------------------------
-- Table structure for blog_navs
-- ----------------------------
DROP TABLE IF EXISTS `blog_navs`;
CREATE TABLE `blog_navs` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) DEFAULT '' COMMENT '导航名',
  `nav_alias` varchar(50) DEFAULT '' COMMENT '英文翻译',
  `nav_url` varchar(255) DEFAULT '' COMMENT '导航链接',
  `nav_order` int(10) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_navs
-- ----------------------------
INSERT INTO `blog_navs` VALUES ('3', 'aa', 'a', 'http://a', '0');

-- ----------------------------
-- Table structure for blog_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `blog_password_resets`;
CREATE TABLE `blog_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_password_resets
-- ----------------------------

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
INSERT INTO `blog_user` VALUES ('1', 'siki', 'eyJpdiI6Im53VGt2M0tKRkRtcUtRY1Btb05neEE9PSIsInZhbHVlIjoiWmV4eWVUdTJTNnh6ajM3TmdUb2Jsdz09IiwibWFjIjoiZGE2NWI0OWY2ZWI5Njc1ZDc4YzMxYWYwNTlkODNiZDQzMjU1YTZhOTcyMGFjOTViMDFhMDc2OGU2NjA2Y2U2NSJ9');
