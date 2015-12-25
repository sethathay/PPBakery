/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : system_order

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-12-24 17:51:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cgroups
-- ----------------------------
DROP TABLE IF EXISTS `cgroups`;
CREATE TABLE `cgroups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cgroups
-- ----------------------------

-- ----------------------------
-- Table structure for communes
-- ----------------------------
DROP TABLE IF EXISTS `communes`;
CREATE TABLE `communes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of communes
-- ----------------------------
INSERT INTO `communes` VALUES ('1', '1', 'Orussei 1', '2012-05-31 09:12:05', '11', '2012-05-31 16:04:36', '11', '1');
INSERT INTO `communes` VALUES ('2', '4', 'Phsa Doeumkor', '2012-05-31 09:23:41', '11', '2012-05-31 16:11:16', '11', '1');
INSERT INTO `communes` VALUES ('3', '4', 'Boengkok 2', '2012-05-31 09:24:19', '11', '2012-05-31 15:56:55', '11', '1');
INSERT INTO `communes` VALUES ('4', '4', 'Phsadepo 1', '2012-05-31 09:24:42', '11', '2012-05-31 16:09:54', '11', '1');
INSERT INTO `communes` VALUES ('5', '4', 'Phsadepo 2', '2012-05-31 09:25:57', '11', '2012-05-31 16:10:15', '11', '1');
INSERT INTO `communes` VALUES ('6', '4', 'Boeng Salang', '2012-05-31 09:26:43', '11', '2012-05-31 16:11:34', '11', '1');
INSERT INTO `communes` VALUES ('7', '4', 'Boengkok 1', '2012-05-31 09:27:23', '11', '2012-05-31 15:56:34', '11', '1');
INSERT INTO `communes` VALUES ('8', '8', 'Phsa Thmei 1', '2012-05-31 09:45:48', '11', '2012-05-31 16:24:07', '11', '1');
INSERT INTO `communes` VALUES ('9', '8', 'Phsa Thmei 2', '2012-05-31 09:46:13', '11', '2012-05-31 16:24:43', '11', '1');
INSERT INTO `communes` VALUES ('10', '8', 'Phsa Thmei 3', '2012-05-31 09:46:45', '11', '2012-05-31 16:24:27', '11', '1');
INSERT INTO `communes` VALUES ('11', '5', 'Tonle Basak', '2012-05-31 09:48:00', '11', '2012-05-31 16:01:07', '11', '1');
INSERT INTO `communes` VALUES ('12', '5', 'Toul Svay Prey', '2012-05-31 09:48:30', '11', '2012-05-31 09:48:30', null, '1');
INSERT INTO `communes` VALUES ('13', '8', 'Chey Chumneas', '2012-05-31 09:49:16', '11', '2012-05-31 16:02:54', '11', '1');
INSERT INTO `communes` VALUES ('14', '3', 'Prek Pra', '2012-05-31 09:50:45', '11', '2012-05-31 09:50:45', null, '1');
INSERT INTO `communes` VALUES ('15', '3', 'Chak Angre Loeu', '2012-05-31 09:51:21', '11', '2012-05-31 09:51:21', null, '1');
INSERT INTO `communes` VALUES ('16', '3', 'Chak Angre Kroum', '2012-05-31 09:51:49', '11', '2012-05-31 09:51:49', null, '1');
INSERT INTO `communes` VALUES ('17', '3', 'Niroth', '2012-05-31 09:52:30', '11', '2012-05-31 16:03:49', '11', '1');
INSERT INTO `communes` VALUES ('18', '3', 'Chba Ampeou 1', '2012-05-31 09:53:03', '11', '2012-05-31 16:01:55', '11', '1');
INSERT INTO `communes` VALUES ('19', '3', 'Chba Ampeou 2', '2012-05-31 09:53:19', '11', '2012-05-31 16:02:12', '11', '1');
INSERT INTO `communes` VALUES ('20', '9', 'Phsa Takhmao', '2012-05-31 09:55:39', '11', '2012-05-31 09:55:39', null, '1');
INSERT INTO `communes` VALUES ('21', '2', 'Por Senchey', '2012-05-31 09:56:20', '11', '2012-05-31 09:56:20', null, '1');
INSERT INTO `communes` VALUES ('22', '2', 'Phnom Penh Thmei', '2012-05-31 09:56:37', '11', '2012-05-31 16:13:49', '11', '1');
INSERT INTO `communes` VALUES ('23', '2', 'Tuk Thlar', '2012-05-31 09:57:04', '11', '2012-05-31 16:14:14', '11', '1');
INSERT INTO `communes` VALUES ('24', '10', 'Prek Eng', '2012-05-31 09:59:04', '11', '2012-05-31 09:59:04', null, '1');
INSERT INTO `communes` VALUES ('25', '10', 'Koki', '2012-05-31 09:59:22', '11', '2012-05-31 09:59:22', null, '1');
INSERT INTO `communes` VALUES ('26', '1', 'Orussei 2', '2012-05-31 16:05:05', '11', '2012-05-31 16:05:05', null, '1');
INSERT INTO `communes` VALUES ('27', '1', 'Orussei 3', '2012-05-31 16:05:33', '11', '2012-05-31 16:05:33', null, '1');
INSERT INTO `communes` VALUES ('28', '8', 'Orussei 4', '2012-05-31 16:06:00', '11', '2012-05-31 16:06:00', null, '1');
INSERT INTO `communes` VALUES ('29', '1', 'Monorom', '2012-05-31 16:06:45', '11', '2012-05-31 16:06:45', null, '1');
INSERT INTO `communes` VALUES ('30', '1', 'Mittapheap', '2012-05-31 16:07:10', '11', '2012-05-31 16:07:10', null, '1');
INSERT INTO `communes` VALUES ('31', '8', 'Veal Vong', '2012-05-31 16:07:35', '11', '2012-05-31 16:07:35', null, '1');
INSERT INTO `communes` VALUES ('32', '1', 'Boeng Prolit', '2012-05-31 16:08:14', '11', '2012-05-31 16:08:14', null, '1');
INSERT INTO `communes` VALUES ('33', '4', 'Phsadepo 3', '2012-05-31 16:10:42', '11', '2012-05-31 16:10:42', null, '1');
INSERT INTO `communes` VALUES ('34', '4', 'Tuk Laak 1', '2012-05-31 16:12:06', '11', '2012-05-31 16:12:06', null, '1');
INSERT INTO `communes` VALUES ('35', '4', 'Tuk Laak 2', '2012-05-31 16:12:22', '11', '2012-05-31 16:12:22', null, '1');
INSERT INTO `communes` VALUES ('36', '4', 'Tuk Laak 3', '2012-05-31 16:12:40', '11', '2012-05-31 16:12:40', null, '1');
INSERT INTO `communes` VALUES ('37', '2', 'Chom Chao', '2012-05-31 16:14:40', '11', '2012-05-31 16:14:40', null, '1');
INSERT INTO `communes` VALUES ('38', '3', 'Boeng Tumpun', '2012-05-31 16:16:02', '11', '2012-05-31 16:16:02', null, '1');
INSERT INTO `communes` VALUES ('39', '3', 'Stung Meanchey', '2012-05-31 16:16:28', '11', '2012-05-31 16:16:28', null, '1');
INSERT INTO `communes` VALUES ('40', '5', 'Boengkengkang 1', '2012-05-31 16:17:06', '11', '2012-05-31 16:17:26', '11', '1');
INSERT INTO `communes` VALUES ('41', '5', 'Boengkengkang 2', '2012-05-31 16:17:38', '11', '2012-05-31 16:17:38', null, '1');
INSERT INTO `communes` VALUES ('42', '5', 'Boengkengkang 3', '2012-05-31 16:17:53', '11', '2012-05-31 16:17:53', null, '1');
INSERT INTO `communes` VALUES ('43', '5', 'Boeng Trobek', '2012-05-31 16:18:29', '11', '2012-05-31 16:18:29', null, '1');
INSERT INTO `communes` VALUES ('44', '5', 'Tumnup Tuk', '2012-05-31 16:19:03', '11', '2012-05-31 16:19:03', null, '1');
INSERT INTO `communes` VALUES ('45', '5', 'Phsa Doeum Thkov', '2012-05-31 16:19:39', '11', '2012-05-31 16:20:07', '11', '1');
INSERT INTO `communes` VALUES ('46', '5', 'Toulsvay Prey 1', '2012-05-31 16:21:13', '11', '2012-05-31 16:21:13', null, '1');
INSERT INTO `communes` VALUES ('47', '5', 'Toulsvay Prey 2', '2012-05-31 16:21:31', '11', '2012-05-31 16:21:31', null, '1');
INSERT INTO `communes` VALUES ('48', '5', 'Toul Tum Poung 1', '2012-05-31 16:22:08', '11', '2012-05-31 16:22:08', null, '1');
INSERT INTO `communes` VALUES ('49', '5', 'Toul Tum Poung 2', '2012-05-31 16:22:23', '11', '2012-05-31 16:22:23', null, '1');
INSERT INTO `communes` VALUES ('50', '5', 'Olympic', '2012-05-31 16:22:46', '11', '2012-05-31 16:22:46', null, '1');
INSERT INTO `communes` VALUES ('51', '8', 'Sraas Chak', '2012-05-31 16:26:28', '11', '2012-05-31 16:26:28', null, '1');
INSERT INTO `communes` VALUES ('52', '8', 'Wat Phnom', '2012-05-31 16:26:48', '11', '2012-05-31 16:26:48', null, '1');
INSERT INTO `communes` VALUES ('53', '8', 'Phsa Cha', '2012-05-31 16:27:09', '11', '2012-05-31 16:27:09', null, '1');
INSERT INTO `communes` VALUES ('54', '8', 'Phsa Kanda 1', '2012-05-31 16:27:36', '11', '2012-05-31 16:27:36', null, '1');
INSERT INTO `communes` VALUES ('55', '8', 'Phsa Kanda 2', '2012-05-31 16:27:50', '11', '2012-05-31 16:27:50', null, '1');
INSERT INTO `communes` VALUES ('56', '8', 'Boeng Raing', '2012-05-31 16:28:19', '11', '2012-05-31 16:28:19', null, '1');
INSERT INTO `communes` VALUES ('57', '7', 'Russei Keo', '2012-05-31 16:29:09', '11', '2012-05-31 16:29:09', null, '1');
INSERT INTO `communes` VALUES ('58', '7', 'Toul Sangke', '2012-05-31 16:29:48', '11', '2012-05-31 16:29:48', null, '1');
INSERT INTO `communes` VALUES ('59', '7', 'Kilometre 6', '2012-05-31 16:30:12', '11', '2012-05-31 16:30:12', null, '1');
INSERT INTO `communes` VALUES ('60', '7', 'Chrang Chamres 1', '2012-05-31 16:30:50', '11', '2012-05-31 16:30:50', null, '1');
INSERT INTO `communes` VALUES ('61', '7', 'Chrang Chamres 2', '2012-05-31 16:31:03', '11', '2012-05-31 16:31:03', null, '1');
INSERT INTO `communes` VALUES ('62', '7', 'Svay Pak', '2012-05-31 16:31:36', '11', '2012-05-31 16:31:36', null, '1');
INSERT INTO `communes` VALUES ('63', '7', 'Chroy Changva', '2012-05-31 16:31:59', '11', '2012-05-31 16:31:59', null, '1');
INSERT INTO `communes` VALUES ('64', '7', 'Prek Tasek', '2012-05-31 16:32:22', '11', '2012-05-31 16:32:22', null, '1');
INSERT INTO `communes` VALUES ('65', '7', 'Prek Leap', '2012-05-31 16:32:40', '11', '2012-05-31 16:32:40', null, '1');
INSERT INTO `communes` VALUES ('66', '6', 'Trapeang Krasaing', '2012-05-31 16:33:40', '11', '2012-05-31 16:33:40', null, '1');
INSERT INTO `communes` VALUES ('67', '6', 'Kokroka', '2012-05-31 16:36:24', '11', '2012-05-31 16:36:24', null, '1');
INSERT INTO `communes` VALUES ('68', '6', 'Phleung Chhesrotes', '2012-05-31 16:36:53', '11', '2012-05-31 16:36:53', null, '1');
INSERT INTO `communes` VALUES ('69', '6', 'Kakab', '2012-05-31 16:37:10', '11', '2012-05-31 16:37:10', null, '1');
INSERT INTO `communes` VALUES ('70', '6', 'Porng Tuk', '2012-05-31 16:37:34', '11', '2012-05-31 16:37:34', null, '1');
INSERT INTO `communes` VALUES ('71', '6', 'Prey Veng', '2012-05-31 16:37:53', '11', '2012-05-31 16:37:53', null, '1');
INSERT INTO `communes` VALUES ('72', '6', 'Samrong', '2012-05-31 16:38:14', '11', '2012-05-31 16:38:14', null, '1');
INSERT INTO `communes` VALUES ('73', '6', 'Prey Sar', '2012-05-31 16:38:36', '11', '2012-05-31 16:38:36', null, '1');
INSERT INTO `communes` VALUES ('74', '6', 'Kraing Pongro', '2012-05-31 16:39:01', '11', '2012-05-31 16:39:01', null, '1');
INSERT INTO `communes` VALUES ('75', '6', 'Prataslang', '2012-05-31 16:39:35', '11', '2012-05-31 16:39:35', null, '1');
INSERT INTO `communes` VALUES ('76', '6', 'Sac Sampeou', '2012-05-31 16:40:02', '11', '2012-05-31 16:40:02', null, '1');
INSERT INTO `communes` VALUES ('77', '6', 'Cheung Ek', '2012-05-31 16:40:32', '11', '2012-05-31 16:40:32', null, '1');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Afghanistan');
INSERT INTO `countries` VALUES ('2', 'Albania');
INSERT INTO `countries` VALUES ('3', 'Algeria');
INSERT INTO `countries` VALUES ('4', 'Andorra');
INSERT INTO `countries` VALUES ('5', 'Angola');
INSERT INTO `countries` VALUES ('6', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES ('7', 'Argentina');
INSERT INTO `countries` VALUES ('8', 'Armenia');
INSERT INTO `countries` VALUES ('9', 'Australia');
INSERT INTO `countries` VALUES ('10', 'Austria');
INSERT INTO `countries` VALUES ('11', 'Azerbaijan');
INSERT INTO `countries` VALUES ('12', 'Bahamas');
INSERT INTO `countries` VALUES ('13', 'Bahrain');
INSERT INTO `countries` VALUES ('14', 'Bangladesh');
INSERT INTO `countries` VALUES ('15', 'Barbados');
INSERT INTO `countries` VALUES ('16', 'Belarus');
INSERT INTO `countries` VALUES ('17', 'Belgium');
INSERT INTO `countries` VALUES ('18', 'Belize');
INSERT INTO `countries` VALUES ('19', 'Benin');
INSERT INTO `countries` VALUES ('20', 'Bhutan');
INSERT INTO `countries` VALUES ('21', 'Bolivia');
INSERT INTO `countries` VALUES ('22', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES ('23', 'Botswana');
INSERT INTO `countries` VALUES ('24', 'Brazil');
INSERT INTO `countries` VALUES ('25', 'Brunei Darussalam');
INSERT INTO `countries` VALUES ('26', 'Bulgaria');
INSERT INTO `countries` VALUES ('27', 'Burkina Faso');
INSERT INTO `countries` VALUES ('28', 'Burundi');
INSERT INTO `countries` VALUES ('29', 'Cabo Verde');
INSERT INTO `countries` VALUES ('30', 'Cambodia');
INSERT INTO `countries` VALUES ('31', 'Cameroon');
INSERT INTO `countries` VALUES ('32', 'Canada');
INSERT INTO `countries` VALUES ('33', 'Central African Republic');
INSERT INTO `countries` VALUES ('34', 'Chad');
INSERT INTO `countries` VALUES ('35', 'Chile');
INSERT INTO `countries` VALUES ('36', 'China');
INSERT INTO `countries` VALUES ('37', 'Colombia');
INSERT INTO `countries` VALUES ('38', 'Comoros');
INSERT INTO `countries` VALUES ('39', 'Congo');
INSERT INTO `countries` VALUES ('40', 'Costa Rica');
INSERT INTO `countries` VALUES ('41', 'Côte d\'Ivoire');
INSERT INTO `countries` VALUES ('42', 'Croatia');
INSERT INTO `countries` VALUES ('43', 'Cuba');
INSERT INTO `countries` VALUES ('44', 'Cyprus');
INSERT INTO `countries` VALUES ('45', 'Czech Republic');
INSERT INTO `countries` VALUES ('46', 'Democratic People\'s Republic of Korea (North Korea)');
INSERT INTO `countries` VALUES ('47', 'Democratic Republic of the Cong');
INSERT INTO `countries` VALUES ('48', 'Denmark');
INSERT INTO `countries` VALUES ('49', 'Djibouti');
INSERT INTO `countries` VALUES ('50', 'Dominica');
INSERT INTO `countries` VALUES ('51', 'Dominican Republic');
INSERT INTO `countries` VALUES ('52', 'Ecuador');
INSERT INTO `countries` VALUES ('53', 'Egypt');
INSERT INTO `countries` VALUES ('54', 'El Salvador');
INSERT INTO `countries` VALUES ('55', 'Equatorial Guinea');
INSERT INTO `countries` VALUES ('56', 'Eritrea');
INSERT INTO `countries` VALUES ('57', 'Estonia');
INSERT INTO `countries` VALUES ('58', 'Ethiopia');
INSERT INTO `countries` VALUES ('59', 'Fiji');
INSERT INTO `countries` VALUES ('60', 'Finland');
INSERT INTO `countries` VALUES ('61', 'France');
INSERT INTO `countries` VALUES ('62', 'Gabon');
INSERT INTO `countries` VALUES ('63', 'Gambia');
INSERT INTO `countries` VALUES ('64', 'Georgia');
INSERT INTO `countries` VALUES ('65', 'Germany');
INSERT INTO `countries` VALUES ('66', 'Ghana');
INSERT INTO `countries` VALUES ('67', 'Greece');
INSERT INTO `countries` VALUES ('68', 'Grenada');
INSERT INTO `countries` VALUES ('69', 'Guatemala');
INSERT INTO `countries` VALUES ('70', 'Guinea');
INSERT INTO `countries` VALUES ('71', 'Guinea-Bissau');
INSERT INTO `countries` VALUES ('72', 'Guyana');
INSERT INTO `countries` VALUES ('73', 'Haiti');
INSERT INTO `countries` VALUES ('74', 'Honduras');
INSERT INTO `countries` VALUES ('75', 'Hungary');
INSERT INTO `countries` VALUES ('76', 'Iceland');
INSERT INTO `countries` VALUES ('77', 'India');
INSERT INTO `countries` VALUES ('78', 'Indonesia');
INSERT INTO `countries` VALUES ('79', 'Iran');
INSERT INTO `countries` VALUES ('80', 'Iraq');
INSERT INTO `countries` VALUES ('81', 'Ireland');
INSERT INTO `countries` VALUES ('82', 'Israel');
INSERT INTO `countries` VALUES ('83', 'Italy');
INSERT INTO `countries` VALUES ('84', 'Jamaica');
INSERT INTO `countries` VALUES ('85', 'Japan');
INSERT INTO `countries` VALUES ('86', 'Jordan');
INSERT INTO `countries` VALUES ('87', 'Kazakhstan');
INSERT INTO `countries` VALUES ('88', 'Kenya');
INSERT INTO `countries` VALUES ('89', 'Kiribati');
INSERT INTO `countries` VALUES ('90', 'Kuwait');
INSERT INTO `countries` VALUES ('91', 'Kyrgyzstan');
INSERT INTO `countries` VALUES ('92', 'Lao People\'s Democratic Republic (Laos)');
INSERT INTO `countries` VALUES ('93', 'Latvia');
INSERT INTO `countries` VALUES ('94', 'Lebanon');
INSERT INTO `countries` VALUES ('95', 'Lesotho');
INSERT INTO `countries` VALUES ('96', 'Liberia');
INSERT INTO `countries` VALUES ('97', 'Libya');
INSERT INTO `countries` VALUES ('98', 'Liechtenstein');
INSERT INTO `countries` VALUES ('99', 'Lithuania');
INSERT INTO `countries` VALUES ('100', 'Luxembourg');
INSERT INTO `countries` VALUES ('101', 'Macedonia');
INSERT INTO `countries` VALUES ('102', 'Madagascar');
INSERT INTO `countries` VALUES ('103', 'Malawi');
INSERT INTO `countries` VALUES ('104', 'Malaysia');
INSERT INTO `countries` VALUES ('105', 'Maldives');
INSERT INTO `countries` VALUES ('106', 'Mali');
INSERT INTO `countries` VALUES ('107', 'Malta');
INSERT INTO `countries` VALUES ('108', 'Marshall Islands');
INSERT INTO `countries` VALUES ('109', 'Mauritania');
INSERT INTO `countries` VALUES ('110', 'Mauritius');
INSERT INTO `countries` VALUES ('111', 'Mexico');
INSERT INTO `countries` VALUES ('112', 'Micronesia (Federated States of)');
INSERT INTO `countries` VALUES ('113', 'Monaco');
INSERT INTO `countries` VALUES ('114', 'Mongolia');
INSERT INTO `countries` VALUES ('115', 'Montenegro');
INSERT INTO `countries` VALUES ('116', 'Morocco');
INSERT INTO `countries` VALUES ('117', 'Mozambique');
INSERT INTO `countries` VALUES ('118', 'Myanmar');
INSERT INTO `countries` VALUES ('119', 'Namibia');
INSERT INTO `countries` VALUES ('120', 'Nauru');
INSERT INTO `countries` VALUES ('121', 'Nepal');
INSERT INTO `countries` VALUES ('122', 'Netherlands');
INSERT INTO `countries` VALUES ('123', 'New Zealand');
INSERT INTO `countries` VALUES ('124', 'Nicaragua');
INSERT INTO `countries` VALUES ('125', 'Niger');
INSERT INTO `countries` VALUES ('126', 'Nigeria');
INSERT INTO `countries` VALUES ('127', 'Norway');
INSERT INTO `countries` VALUES ('128', 'Oman');
INSERT INTO `countries` VALUES ('129', 'Pakistan');
INSERT INTO `countries` VALUES ('130', 'Palau');
INSERT INTO `countries` VALUES ('131', 'Panama');
INSERT INTO `countries` VALUES ('132', 'Papua New Guinea');
INSERT INTO `countries` VALUES ('133', 'Paraguay');
INSERT INTO `countries` VALUES ('134', 'Peru');
INSERT INTO `countries` VALUES ('135', 'Philippines');
INSERT INTO `countries` VALUES ('136', 'Poland');
INSERT INTO `countries` VALUES ('137', 'Portugal');
INSERT INTO `countries` VALUES ('138', 'Qatar');
INSERT INTO `countries` VALUES ('139', 'Republic of Korea (South Korea)');
INSERT INTO `countries` VALUES ('140', 'Republic of Moldova');
INSERT INTO `countries` VALUES ('141', 'Romania');
INSERT INTO `countries` VALUES ('142', 'Russian Federation');
INSERT INTO `countries` VALUES ('143', 'Rwanda');
INSERT INTO `countries` VALUES ('144', 'Saint Kitts and Nevis');
INSERT INTO `countries` VALUES ('145', 'Saint Lucia');
INSERT INTO `countries` VALUES ('146', 'Saint Vincent and the Grenadines');
INSERT INTO `countries` VALUES ('147', 'Samoa');
INSERT INTO `countries` VALUES ('148', 'San Marino');
INSERT INTO `countries` VALUES ('149', 'Sao Tome and Principe');
INSERT INTO `countries` VALUES ('150', 'Saudi Arabia');
INSERT INTO `countries` VALUES ('151', 'Senegal');
INSERT INTO `countries` VALUES ('152', 'Serbia');
INSERT INTO `countries` VALUES ('153', 'Seychelles');
INSERT INTO `countries` VALUES ('154', 'Sierra Leone');
INSERT INTO `countries` VALUES ('155', 'Singapore');
INSERT INTO `countries` VALUES ('156', 'Slovakia');
INSERT INTO `countries` VALUES ('157', 'Slovenia');
INSERT INTO `countries` VALUES ('158', 'Solomon Islands');
INSERT INTO `countries` VALUES ('159', 'Somalia');
INSERT INTO `countries` VALUES ('160', 'South Africa');
INSERT INTO `countries` VALUES ('161', 'South Sudan');
INSERT INTO `countries` VALUES ('162', 'Spain');
INSERT INTO `countries` VALUES ('163', 'Sri Lanka');
INSERT INTO `countries` VALUES ('164', 'Sudan');
INSERT INTO `countries` VALUES ('165', 'Suriname');
INSERT INTO `countries` VALUES ('166', 'Swaziland');
INSERT INTO `countries` VALUES ('167', 'Sweden');
INSERT INTO `countries` VALUES ('168', 'Switzerland');
INSERT INTO `countries` VALUES ('169', 'Syrian Arab Republic');
INSERT INTO `countries` VALUES ('170', 'Tajikistan');
INSERT INTO `countries` VALUES ('171', 'Thailand');
INSERT INTO `countries` VALUES ('172', 'Timor-Leste');
INSERT INTO `countries` VALUES ('173', 'Togo');
INSERT INTO `countries` VALUES ('174', 'Tonga');
INSERT INTO `countries` VALUES ('175', 'Trinidad and Tobago');
INSERT INTO `countries` VALUES ('176', 'Tunisia');
INSERT INTO `countries` VALUES ('177', 'Turkey');
INSERT INTO `countries` VALUES ('178', 'Turkmenistan');
INSERT INTO `countries` VALUES ('179', 'Tuvalu');
INSERT INTO `countries` VALUES ('180', 'Uganda');
INSERT INTO `countries` VALUES ('181', 'Ukraine');
INSERT INTO `countries` VALUES ('182', 'United Arab Emirates');
INSERT INTO `countries` VALUES ('183', 'United Kingdom of Great Britain and Northern Ireland');
INSERT INTO `countries` VALUES ('184', 'United Republic of Tanzania');
INSERT INTO `countries` VALUES ('185', 'United States of America');
INSERT INTO `countries` VALUES ('186', 'Uruguay');
INSERT INTO `countries` VALUES ('187', 'Uzbekistan');
INSERT INTO `countries` VALUES ('188', 'Vanuatu');
INSERT INTO `countries` VALUES ('189', 'Venezuela');
INSERT INTO `countries` VALUES ('190', 'Vietnam');
INSERT INTO `countries` VALUES ('191', 'Yemen');
INSERT INTO `countries` VALUES ('192', 'Zambia');
INSERT INTO `countries` VALUES ('193', 'Zimbabwe');

-- ----------------------------
-- Table structure for credit_memos
-- ----------------------------
DROP TABLE IF EXISTS `credit_memos`;
CREATE TABLE `credit_memos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cm_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL,
  `balance` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `total_tax` double DEFAULT NULL,
  `membership_card` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of credit_memos
-- ----------------------------

-- ----------------------------
-- Table structure for credit_memo_details
-- ----------------------------
DROP TABLE IF EXISTS `credit_memo_details`;
CREATE TABLE `credit_memo_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_memo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `qty_uom_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `conversion` double NOT NULL DEFAULT '1',
  `total_unit_price` double NOT NULL,
  `is_free` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of credit_memo_details
-- ----------------------------

-- ----------------------------
-- Table structure for credit_memo_receipts
-- ----------------------------
DROP TABLE IF EXISTS `credit_memo_receipts`;
CREATE TABLE `credit_memo_receipts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `credit_memo_id` bigint(20) NOT NULL,
  `exchange_rate_id` int(11) NOT NULL,
  `receipt_cm_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount_kh` double DEFAULT NULL,
  `amount_en` double NOT NULL,
  `total_amount` double NOT NULL,
  `balance` double DEFAULT NULL,
  `cm_date` date NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of credit_memo_receipts
-- ----------------------------

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `commune_id` int(11) DEFAULT NULL,
  `village_id` int(11) DEFAULT NULL,
  `payment_term_id` int(11) DEFAULT NULL,
  `customer_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_alt` text COLLATE utf8_unicode_ci,
  `main_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `customer_code` (`customer_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', '12', '1', '29', null, null, '13C0000001', 'General', 'Customer', 'Male', '', 'No34,Street138,CommuneMonorom,District7 Makara,Province/CityPhnom Penh', '', '', '', '', '', '', '2013-11-08 17:06:27', '124', '2013-11-12 15:27:01', '114', '1');
INSERT INTO `customers` VALUES ('2', null, null, null, null, null, '13C0000002', 'Super ', 'Market', 'Male', '', '', '', '', '', '', '', '', '2013-11-28 14:27:44', '113', '2013-11-28 14:27:44', null, '1');

-- ----------------------------
-- Table structure for customer_cgroups
-- ----------------------------
DROP TABLE IF EXISTS `customer_cgroups`;
CREATE TABLE `customer_cgroups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) DEFAULT NULL,
  `cgroup_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `cgroup_id` (`cgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_cgroups
-- ----------------------------

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of discounts
-- ----------------------------

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES ('1', '12', '7 Makara', '2012-05-31 08:30:56', '11', '2012-05-31 08:30:56', null, '1');
INSERT INTO `districts` VALUES ('2', '12', 'Sen Sok', '2012-05-31 08:31:25', '11', '2012-05-31 08:31:25', null, '1');
INSERT INTO `districts` VALUES ('3', '12', 'Meanchey', '2012-05-31 08:33:07', '11', '2012-05-31 15:53:17', '11', '1');
INSERT INTO `districts` VALUES ('4', '12', 'Toulkok', '2012-05-31 08:33:39', '11', '2012-05-31 15:54:12', '11', '1');
INSERT INTO `districts` VALUES ('5', '12', 'Chamka Morn', '2012-05-31 08:33:59', '11', '2012-05-31 15:51:46', '11', '1');
INSERT INTO `districts` VALUES ('6', '12', 'Dang Kor', '2012-05-31 08:34:30', '11', '2012-05-31 15:52:17', '11', '1');
INSERT INTO `districts` VALUES ('7', '12', 'Russei Keo', '2012-05-31 08:35:15', '11', '2012-05-31 15:54:50', '11', '1');
INSERT INTO `districts` VALUES ('8', '12', 'Daun Penh', '2012-05-31 09:22:07', '11', '2012-05-31 09:22:07', null, '1');
INSERT INTO `districts` VALUES ('9', '8', 'Ta Khmao', '2012-05-31 09:55:02', '11', '2012-05-31 09:55:02', null, '1');
INSERT INTO `districts` VALUES ('10', '8', 'Kean Svay', '2012-05-31 09:58:27', '11', '2012-05-31 09:58:27', null, '1');

-- ----------------------------
-- Table structure for exchange_rates
-- ----------------------------
DROP TABLE IF EXISTS `exchange_rates`;
CREATE TABLE `exchange_rates` (
  `id` int(11) NOT NULL,
  `ex_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `riel` double NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of exchange_rates
-- ----------------------------

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_ch` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_ch` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counter_number` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_number` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of locations
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` double NOT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `total_tax` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `order_date` date NOT NULL,
  `membership_card` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for order_lines
-- ----------------------------
DROP TABLE IF EXISTS `order_lines`;
CREATE TABLE `order_lines` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tablese_id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `qty_uom_id` int(11) NOT NULL,
  `conversion` double NOT NULL DEFAULT '1',
  `unit_price` double NOT NULL,
  `total_unit_price` double NOT NULL,
  `is_free` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_lines
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `name_kh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_ch` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for product_groups
-- ----------------------------
DROP TABLE IF EXISTS `product_groups`;
CREATE TABLE `product_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_ch` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_groups
-- ----------------------------

-- ----------------------------
-- Table structure for product_pgroups
-- ----------------------------
DROP TABLE IF EXISTS `product_pgroups`;
CREATE TABLE `product_pgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_pgroups
-- ----------------------------

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abbr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('1', 'BMC', 'បន្ទាយមានជ័យ', '2011-10-27 08:03:15', '1', '2012-03-10 19:12:15', '11', '1');
INSERT INTO `provinces` VALUES ('2', 'BTB', 'បាត់ដំបង', '2011-10-27 08:03:49', '1', '2012-03-10 19:12:31', '11', '1');
INSERT INTO `provinces` VALUES ('3', 'Kg. Cham', 'កំពង់ចាម', '2011-10-27 08:04:14', '1', '2012-03-10 19:09:23', '11', '1');
INSERT INTO `provinces` VALUES ('4', 'Kg. Chhnang', 'កំពង់ឆ្នាំង', '2011-10-27 08:05:09', '1', '2012-03-10 19:09:45', '11', '1');
INSERT INTO `provinces` VALUES ('5', 'Kg. Spoeu', 'កំពង់ស្ពឺ', '2011-10-27 08:05:40', '1', '2012-03-10 19:10:19', '11', '1');
INSERT INTO `provinces` VALUES ('6', 'Kg. Thom', 'កំពង់ធំ', '2011-10-27 08:06:05', '1', '2012-03-10 19:10:01', '11', '1');
INSERT INTO `provinces` VALUES ('7', 'Kompot', 'កំពត', '2011-10-27 08:06:53', '1', '2012-03-10 19:10:50', '11', '1');
INSERT INTO `provinces` VALUES ('8', 'Kandal', 'កណ្ដាល', '2011-10-27 08:07:17', '1', '2012-03-10 19:09:08', '11', '1');
INSERT INTO `provinces` VALUES ('9', 'Koh Kong', 'កោះកុង', '2011-10-27 08:07:46', '1', '2012-03-10 19:11:22', '11', '1');
INSERT INTO `provinces` VALUES ('10', 'Kratie', 'ក្រចេះ', '2011-10-27 08:08:24', '1', '2012-03-10 19:11:39', '11', '1');
INSERT INTO `provinces` VALUES ('11', 'Mondulkiri', 'មណ្ឌលគិរី', '2011-10-27 08:09:01', '1', '2012-03-10 19:15:01', '11', '1');
INSERT INTO `provinces` VALUES ('12', 'Phnom Penh', 'ភ្នំពេញ', '2011-10-27 08:09:29', '1', '2012-03-10 19:14:33', '11', '1');
INSERT INTO `provinces` VALUES ('13', 'Preah Vihea', 'ព្រះវិហា', '2011-10-27 08:10:01', '1', '2012-03-10 19:13:26', '11', '1');
INSERT INTO `provinces` VALUES ('14', 'Prey Veng', 'ព្រៃវែង', '2011-10-27 08:10:28', '1', '2012-03-10 19:14:09', '11', '1');
INSERT INTO `provinces` VALUES ('15', 'Pursat', 'ពោធិសាត់', '2011-10-27 08:12:17', '1', '2012-03-10 19:13:04', '11', '1');
INSERT INTO `provinces` VALUES ('16', 'Ratanakiri', 'រតនគិរី', '2011-10-27 08:13:11', '1', '2012-03-10 19:15:21', '11', '1');
INSERT INTO `provinces` VALUES ('17', 'Seaam Reap', 'សៀមរាប', '2011-10-27 08:13:48', '1', '2012-03-10 19:15:39', '11', '1');
INSERT INTO `provinces` VALUES ('18', 'Sihauk Ville', 'ព្រះសីហនុ', '2011-10-27 08:14:30', '1', '2012-03-10 19:13:49', '11', '1');
INSERT INTO `provinces` VALUES ('19', 'Stoeung Treng', 'ស្ទឹង​ត្រែង', '2011-10-27 08:15:02', '1', '2012-03-10 19:16:03', '11', '1');
INSERT INTO `provinces` VALUES ('20', 'Svay Reang', 'ស្វាយរៀង', '2011-10-27 08:16:11', '1', '2012-03-10 19:16:24', '11', '1');
INSERT INTO `provinces` VALUES ('21', 'Takeo', 'តាកែវ', '2011-10-27 08:16:41', '1', '2012-03-10 19:11:53', '11', '1');
INSERT INTO `provinces` VALUES ('22', 'Udor Meanchey', 'ឧត្ដមានជ័យ', '2011-10-27 08:17:28', '1', '2012-03-10 19:16:50', '11', '1');
INSERT INTO `provinces` VALUES ('23', 'Kep', 'កែប', '2011-10-27 08:18:08', '1', '2012-03-10 19:11:06', '11', '1');
INSERT INTO `provinces` VALUES ('24', 'Pailin', 'ប៉ៃលិន', '2011-10-27 08:18:33', '1', '2012-03-10 19:12:48', '11', '1');
INSERT INTO `provinces` VALUES ('25', 'Kg. Som', 'Kg. Som', '2012-03-10 19:17:24', '11', '2012-03-10 19:17:24', null, '1');

-- ----------------------------
-- Table structure for receipt_orders
-- ----------------------------
DROP TABLE IF EXISTS `receipt_orders`;
CREATE TABLE `receipt_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `exchange_rate_id` int(11) NOT NULL,
  `receipt_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount_kh` double DEFAULT NULL,
  `amount_en` double NOT NULL,
  `total_amount` double NOT NULL,
  `balance` double DEFAULT NULL,
  `pay_date` date NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of receipt_orders
-- ----------------------------

-- ----------------------------
-- Table structure for tableses
-- ----------------------------
DROP TABLE IF EXISTS `tableses`;
CREATE TABLE `tableses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tableses
-- ----------------------------
INSERT INTO `tableses` VALUES ('1', 'Input Tax', 'Input Tax', '2013-10-16 13:52:28', '1', null, null, '0');
INSERT INTO `tableses` VALUES ('2', 'Sale Tax', 'Sale Tax', '2013-10-16 13:52:28', '1', null, null, '0');

-- ----------------------------
-- Table structure for taxes
-- ----------------------------
DROP TABLE IF EXISTS `taxes`;
CREATE TABLE `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_type_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_range` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of taxes
-- ----------------------------
INSERT INTO `taxes` VALUES ('1', '1', 'VAT In 10%', '10%', '10', '2013-10-18 00:00:00', '1', '1');
INSERT INTO `taxes` VALUES ('2', '2', 'VAT Out 10%', '10%', '10', '2013-10-18 00:00:00', '1', '1');
INSERT INTO `taxes` VALUES ('3', '2', 'VAT Out 15%', '15%', '15', '2013-10-18 00:00:00', '1', '1');
INSERT INTO `taxes` VALUES ('4', '1', 'Input Tax', '', '10', '2013-10-18 16:22:47', '1', '1');
INSERT INTO `taxes` VALUES ('5', '1', 'VAT Input', '', '10', '2013-10-18 16:24:49', '1', '1');
INSERT INTO `taxes` VALUES ('6', '2', 'VAT Output', 'VAT Output', '10', '2013-10-18 16:25:39', '1', '1');
INSERT INTO `taxes` VALUES ('7', '1', 'Vat In (15%)', '', '15', '2013-10-18 17:28:58', '1', '1');

-- ----------------------------
-- Table structure for tax_types
-- ----------------------------
DROP TABLE IF EXISTS `tax_types`;
CREATE TABLE `tax_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tax_types
-- ----------------------------
INSERT INTO `tax_types` VALUES ('1', 'Input Tax', 'Input Tax', '2013-10-16 13:52:28', '1');
INSERT INTO `tax_types` VALUES ('2', 'Sale Tax', 'Sale Tax', '2013-10-16 13:52:28', '1');

-- ----------------------------
-- Table structure for uoms
-- ----------------------------
DROP TABLE IF EXISTS `uoms`;
CREATE TABLE `uoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_kh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_ch` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of uoms
-- ----------------------------

-- ----------------------------
-- Table structure for uom_conversions
-- ----------------------------
DROP TABLE IF EXISTS `uom_conversions`;
CREATE TABLE `uom_conversions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_uom_id` int(11) NOT NULL,
  `to_uom_id` int(11) NOT NULL,
  `volume` double NOT NULL,
  `is_small_uom` tinyint(4) DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of uom_conversions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `country_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Lin', null, 'Phou', 'phoulin', '123', '0', null, null, '', null, null, '0000-00-00 00:00:00', '0', null, null, '0');

-- ----------------------------
-- Table structure for user_groups
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_groups
-- ----------------------------

-- ----------------------------
-- Table structure for user_locations
-- ----------------------------
DROP TABLE IF EXISTS `user_locations`;
CREATE TABLE `user_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_locations
-- ----------------------------

-- ----------------------------
-- Table structure for villages
-- ----------------------------
DROP TABLE IF EXISTS `villages`;
CREATE TABLE `villages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commune_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of villages
-- ----------------------------
