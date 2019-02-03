/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : levelsys

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-02-03 11:15:23
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
INSERT INTO `sys_admin` VALUES ('1', 'admin', 'sha256:1000:8AxRTZDE2EAepgA/l4Ug0CgKLvkgj8yz:iVJuC1LFswiB7Uvc9lpWPdfGITIBS70q', '管理员', '1', 'nice231232@126.com', '', '2018-08-05', '8', '1533480247', '1549160967', '192.168.1.225', '', '16', '1');
INSERT INTO `sys_admin` VALUES ('3', 'nice172', 'sha256:1000:GM0kcPbE+QNRSpmsG58qckJUkekhvpwi:XwmDtVMPAfE8DDYUdVW5DF5AOLljRm8q', '测试号', '1', 'nice32131322@163.com', '', '2018-08-06', '0', '1533526543', '1535612177', '10.10.0.99', '', '14', '1');

-- ----------------------------
-- Table structure for sys_apply
-- ----------------------------
DROP TABLE IF EXISTS `sys_apply`;
CREATE TABLE `sys_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提交者uid',
  `mobile` char(11) NOT NULL DEFAULT '',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '申请多少级',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1审核，2拒绝',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_apply
-- ----------------------------
INSERT INTO `sys_apply` VALUES ('5', '16', '13800000123', '1', '1', '1549162735');

-- ----------------------------
-- Table structure for sys_check_log
-- ----------------------------
DROP TABLE IF EXISTS `sys_check_log`;
CREATE TABLE `sys_check_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '申请id',
  `check_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '审核者uid',
  `check_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1同意，2拒绝',
  `mobile` char(11) NOT NULL DEFAULT '',
  `check_name` varchar(50) NOT NULL DEFAULT '',
  `check_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `log_id` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_check_log
-- ----------------------------
INSERT INTO `sys_check_log` VALUES ('3', '5', '6', '1', '13800138000', 'level_1', '1549162836', '1549162735');
INSERT INTO `sys_check_log` VALUES ('4', '5', '11', '1', '13800138004', 'level_5', '1549162903', '1549162735');

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
  `recommend_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐uid',
  `team_count` int(10) NOT NULL DEFAULT '0' COMMENT '团队人数',
  `up_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '一星以上人数',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0禁止登录',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`,`wechat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_users
-- ----------------------------
INSERT INTO `sys_users` VALUES ('6', '1', 'level_1', '14e1b600b1fd579f47433b88e8d85291', '13800138000', 'level_1', '1', 'level_2', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('7', '1', 'level_2', '14e1b600b1fd579f47433b88e8d85291', '13800138001', 'level_2', '2', 'level_3', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('8', '1', 'level_3', '14e1b600b1fd579f47433b88e8d85291', '13800138002', 'level_3', '3', 'level_4', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('10', '1', 'level_4', '14e1b600b1fd579f47433b88e8d85291', '13800138003', 'level_4', '4', 'level_5', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('11', '1', 'level_5', '14e1b600b1fd579f47433b88e8d85291', '13800138004', 'level_5', '5', 'level_6', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('12', '1', 'level_6', '14e1b600b1fd579f47433b88e8d85291', '13800138005', 'level_6', '6', 'level_7', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('13', '1', 'level_7', '14e1b600b1fd579f47433b88e8d85291', '13800138006', 'level_7', '7', 'level_8', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('14', '1', 'level_8', '14e1b600b1fd579f47433b88e8d85291', '13800138007', 'level_8', '8', 'level_9', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('15', '1', 'level_9', '14e1b600b1fd579f47433b88e8d85291', '13800138008', 'level_9', '9', 'system', '0', '0', '0', '1', '1549076132', '1549076132');
INSERT INTO `sys_users` VALUES ('16', '0', 'nice', '14e1b600b1fd579f47433b88e8d85291', '13800000123', 'nice172', '1', 'level_1', '0', '0', '0', '1', '1549077122', '1549077122');
