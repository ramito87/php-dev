/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : u4_p1_db

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2019-08-05 07:50:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'John Doe', null, 'john@gmail.com', '2019-07-19 07:51:41', '2019-07-19 07:51:42');
INSERT INTO `users` VALUES ('2', 'Panchito', null, 'panchito@doe.com', '2019-07-19 08:31:41', '2019-07-19 08:31:42');
INSERT INTO `users` VALUES ('3', 'Ricardo Algo', null, 'nuevo@gmail.com', '2019-07-19 08:37:58', '2019-07-19 08:41:38');
INSERT INTO `users` VALUES ('5', 'Juanito Ortega Actualizado', 'test', 'test@gmail.com', '2019-07-23 06:41:53', '2019-07-23 06:47:32');
