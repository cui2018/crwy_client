/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : makefriend

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2018-04-24 13:23:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mf_admin
-- ----------------------------
DROP TABLE IF EXISTS `mf_admin`;
CREATE TABLE `mf_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `upswd` text NOT NULL COMMENT '密码',
  `power` varchar(100) NOT NULL DEFAULT '' COMMENT '权限',
  `mother` int(10) unsigned NOT NULL COMMENT '创建者',
  `birthday` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `lastip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `roleid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `sa` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '超级管理员-0:非;1:是;',
  PRIMARY KEY (`id`),
  KEY `uname` (`uname`) USING BTREE,
  KEY `mother` (`mother`) USING BTREE,
  KEY `roleid` (`roleid`) USING BTREE,
  KEY `sa` (`sa`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of mf_admin
-- ----------------------------
INSERT INTO `mf_admin` VALUES ('1', 'superadmin', 'elhXSGNtMkRERDlQTk1BTHBFQVpCUT09', '111111111111111111111111111111111111111111111111', '0', '1456329600', '1456329600', '127.0.0.1', '0', 'sa', 'xolox@163.com', '1');
INSERT INTO `mf_admin` VALUES ('2', 'myadmin', 'MlIvV1VvbkZMbmlnYjhuUCt2emw3UT09', '111111111111111111111111111111111111111111111111', '0', '1456329600', '1456329600', '127.0.0.1', '1', '系统管理员', 'xolox@163.com', '0');
INSERT INTO `mf_admin` VALUES ('3', 'sugang', 'amt2VWJRcWRUc25mKzFJRE9IZ09UQT09', '000011100000000000000000000000000000000000000000', '2', '1456329600', '1456329600', '127.0.0.1', '1', '苏刚', 'xolox@163.com', '0');

-- ----------------------------
-- Table structure for mf_game
-- ----------------------------
DROP TABLE IF EXISTS `mf_game`;
CREATE TABLE `mf_game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '游戏名称',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '游戏状态',
  `base` text NOT NULL COMMENT '基本配置',
  `config` text NOT NULL COMMENT '游戏配置',
  `prop` text NOT NULL COMMENT '道具配置',
  `share` text NOT NULL COMMENT '分享配置',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(10) unsigned NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `createtime` (`createtime`),
  KEY `updatetime` (`updatetime`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='游戏表';

-- ----------------------------
-- Records of mf_game
-- ----------------------------
INSERT INTO `mf_game` VALUES ('1', '测试游戏', '0', '{\"title\":\"测试游戏v1.0.0\",\"wxoauth2\":\"2\",\"autosave\":\"2\"}', '', '', '{\"appMessage\":{\"title\":\"测试分享好友标题\",\"desc\":\"测试分享好友描述\",\"pic\":\"/upload/2018/0418/20180418172105603.jpg\",\"link\":\"https://www.baidu.com/\"},\"timeline\":{\"title\":\"测试分享朋友圈标题\",\"pic\":\"/upload/2018/0418/20180418172105597.jpg\",\"link\":\"http://www.163.com/\"}}', '1523872271', '1523872271');

-- ----------------------------
-- Table structure for mf_log_login
-- ----------------------------
DROP TABLE IF EXISTS `mf_log_login`;
CREATE TABLE `mf_log_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '登录IP',
  `sa` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '超级管理员-0:非;1:是;',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`) USING BTREE,
  KEY `time` (`time`) USING BTREE,
  KEY `sa` (`sa`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台登录日志表';

-- ----------------------------
-- Records of mf_log_login
-- ----------------------------

-- ----------------------------
-- Table structure for mf_log_operate
-- ----------------------------
DROP TABLE IF EXISTS `mf_log_operate`;
CREATE TABLE `mf_log_operate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '登录IP',
  `sa` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '超级管理员-0:非;1:是;',
  `remark` text NOT NULL COMMENT '备注',
  `data` text NOT NULL COMMENT '核心数据',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`) USING BTREE,
  KEY `time` (`time`) USING BTREE,
  KEY `sa` (`sa`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台操作日志表';

-- ----------------------------
-- Records of mf_log_operate
-- ----------------------------

-- ----------------------------
-- Table structure for mf_module
-- ----------------------------
DROP TABLE IF EXISTS `mf_module`;
CREATE TABLE `mf_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类ID',
  `sign` char(30) NOT NULL DEFAULT '' COMMENT '模块标识',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '模块名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `ico` char(30) NOT NULL DEFAULT '' COMMENT '图标',
  `orderby` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `sign` (`sign`) USING BTREE,
  KEY `orderby` (`orderby`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='模块表';

-- ----------------------------
-- Records of mf_module
-- ----------------------------
INSERT INTO `mf_module` VALUES ('1', '0', 'administrator', '管理员', '', 'administrator.gif', '0');
INSERT INTO `mf_module` VALUES ('2', '1', 'admin', '管理员管理', '/administrator/admin', '', '0');
INSERT INTO `mf_module` VALUES ('3', '1', 'role', '角色管理', '/administrator/role', '', '0');
INSERT INTO `mf_module` VALUES ('4', '1', 'log', '后台日志', '/administrator/log', '', '0');
INSERT INTO `mf_module` VALUES ('5', '0', 'password', '修改密码', '/password', 'password.gif', '0');
INSERT INTO `mf_module` VALUES ('6', '0', 'game', '游戏管理', '/game', 'develop.gif', '0');

-- ----------------------------
-- Table structure for mf_role
-- ----------------------------
DROP TABLE IF EXISTS `mf_role`;
CREATE TABLE `mf_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(30) NOT NULL DEFAULT '' COMMENT '角色名称',
  `power` varchar(100) NOT NULL DEFAULT '' COMMENT '权限',
  `mother` int(10) unsigned NOT NULL COMMENT '创建者',
  `birthday` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `mother` (`mother`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of mf_role
-- ----------------------------
INSERT INTO `mf_role` VALUES ('1', '系统管理员', '111111111111111111111111111111111111111111111111', '1', '1456329600');
INSERT INTO `mf_role` VALUES ('2', '内容管理员', '000011', '1', '1456329600');
INSERT INTO `mf_role` VALUES ('3', '数据管理员', '000011', '1', '1456329600');
