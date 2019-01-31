/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : levelsys

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-01-31 16:26:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_admin
-- ----------------------------
DROP TABLE IF EXISTS `sys_admin`;
CREATE TABLE `sys_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` char(16) NOT NULL COMMENT '名称',
  `user_password` char(255) NOT NULL COMMENT '密码',
  `user_nick` char(20) NOT NULL COMMENT '别名',
  `user_sex` tinyint(2) DEFAULT '1' COMMENT '性别1男0女',
  `user_email` char(50) NOT NULL COMMENT '邮件',
  `user_img` varchar(250) NOT NULL DEFAULT '' COMMENT '头像',
  `entry_time` char(10) DEFAULT NULL COMMENT '入职时间',
  `user_count` int(6) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `create_time` int(16) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(16) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `create_ip` char(16) NOT NULL DEFAULT '' COMMENT '注册IP',
  `update_ip` char(16) NOT NULL DEFAULT '' COMMENT '登录IP',
  `group_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_nick` (`user_nick`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of sys_admin
-- ----------------------------
INSERT INTO `sys_admin` VALUES ('1', 'admin', 'sha256:1000:8AxRTZDE2EAepgA/l4Ug0CgKLvkgj8yz:iVJuC1LFswiB7Uvc9lpWPdfGITIBS70q', '管理员', '1', 'nice231232@126.com', '', '2018-08-05', '4', '1533480247', '1548923173', '192.168.1.225', '', '16', '1');
INSERT INTO `sys_admin` VALUES ('3', 'nice172', 'sha256:1000:GM0kcPbE+QNRSpmsG58qckJUkekhvpwi:XwmDtVMPAfE8DDYUdVW5DF5AOLljRm8q', '测试号', '1', 'nice32131322@163.com', '', '2018-08-06', '0', '1533526543', '1535612177', '10.10.0.99', '', '14', '1');

-- ----------------------------
-- Table structure for sys_users
-- ----------------------------
DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1后台添加的会员',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `wechat` varchar(200) NOT NULL DEFAULT '' COMMENT '微信号',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '当前级别',
  `recommend_name` varchar(50) NOT NULL DEFAULT '' COMMENT '推荐人',
  `team_count` int(10) NOT NULL DEFAULT '0' COMMENT '团队人数',
  `up_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '一星以上人数',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0禁止登录',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`,`wechat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_users
-- ----------------------------
INSERT INTO `sys_users` VALUES ('1', '0', 'nice172', '14e1b600b1fd579f47433b88e8d85291', '13800138000', 'wechat', '0', 'recomm_user', '0', '0', '1', '1548819839', '1548923053');
INSERT INTO `sys_users` VALUES ('2', '0', '1', '14e1b600b1fd579f47433b88e8d85291', '13800000123', '1', '0', '13800138000', '0', '0', '1', '1548819941', '1548819941');
INSERT INTO `sys_users` VALUES ('3', '0', 'nice', '14e1b600b1fd579f47433b88e8d85291', '13800000125', 'wechat_2', '0', 'recomm_user', '0', '0', '1', '1548827068', '1548827068');
