/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-11-07 10:27:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '管理员状态,1正常',
  `created_at` datetime(6) DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime(6) DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`user_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('12', '15026452519', '$10$GgCaqDAOqud4HSwS40b/BeHOShMa6UMPlNYaMfSfNgM63cjBU1kw6', '1', '2019-11-05 17:26:07.000000', '2019-11-05 17:26:10.000000');

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT '所属栏目',
  `title` varchar(50) DEFAULT '' COMMENT '文章标题',
  `source` varchar(50) DEFAULT '' COMMENT '文章来源',
  `main_pic` varchar(50) DEFAULT '' COMMENT '主图',
  `group_picture` varchar(50) DEFAULT '' COMMENT '组图',
  `link` varchar(50) DEFAULT '' COMMENT '跳转链接',
  `keyword` varchar(100) DEFAULT '' COMMENT '关键字',
  `abstract` varchar(300) DEFAULT '' COMMENT '摘要',
  `content` varchar(100) DEFAULT '' COMMENT '详细内容',
  `placed_top` tinyint(3) DEFAULT '0' COMMENT '是否置顶 1是 0否',
  `recommended` tinyint(3) DEFAULT '0' COMMENT '是否推荐 1是 0否',
  `rolling` tinyint(3) DEFAULT '0' COMMENT '是否滚动，1是 0否',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否发布 1是 0否',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `visits` int(11) DEFAULT '0' COMMENT '点击次数',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=619 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='内容管理';

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('618', '629', '文章标题', '', '主图', '组图', '跳转链接', '关键字', '摘要', '/public/upload/articles/contentf4e2683c268eb03e.text', '0', '0', '0', '1', '1', '433', '2019-11-06 17:50:50', '2019-11-06 18:01:16');

-- ----------------------------
-- Table structure for `banners`
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT '' COMMENT '标题',
  `picture` varchar(150) DEFAULT '' COMMENT '图片地址',
  `link` varchar(150) DEFAULT '' COMMENT '跳转链接',
  `state` tinyint(3) DEFAULT '0' COMMENT '开启关闭 1开启，0关闭',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='首页幻灯片设置';

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('620', 'fgdf', 'www.kuaidayouxi.com', '跳转链接', '0', '2019-11-06 11:36:08', '2019-11-06 17:37:05');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '栏目类型（1单页，2列表，3商品）',
  `parent_id` int(11) DEFAULT '0' COMMENT '所属栏目（一级栏目）',
  `name` varchar(20) DEFAULT '' COMMENT '栏目名称',
  `dir_name` varchar(20) DEFAULT NULL COMMENT '目录名称 只能是英文字母',
  `picture` varchar(50) DEFAULT '' COMMENT '图片',
  `link` varchar(50) DEFAULT '' COMMENT '跳转链接',
  `seo_title` varchar(150) DEFAULT '' COMMENT 'SEO标题',
  `keyword` varchar(150) DEFAULT '' COMMENT '关键字',
  `sort` tinyint(3) DEFAULT '1' COMMENT '排序',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否开启开启 1是 0 否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=635 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='栏目管理';

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('627', '2', '0', '栏目名称', null, '', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 15:19:39', '2019-11-06 15:19:39');
INSERT INTO `categories` VALUES ('628', '2', '0', '栏目名称', null, '', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 15:19:47', '2019-11-06 15:19:47');
INSERT INTO `categories` VALUES ('630', '2', '0', '栏目名称', null, '', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 15:19:48', '2019-11-06 15:19:48');
INSERT INTO `categories` VALUES ('631', '2', '0', '栏目名称', null, '', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 16:25:58', '2019-11-06 16:25:58');
INSERT INTO `categories` VALUES ('632', '2', '0', '栏目名称', null, '图片', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 17:38:32', '2019-11-06 17:38:32');
INSERT INTO `categories` VALUES ('633', '2', '631', '栏目名称', null, '图片', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 17:38:59', '2019-11-06 17:38:59');
INSERT INTO `categories` VALUES ('634', '2', '631', '栏目名s称', 'dfsw', '图片', '跳转链接', 'SEO标题', '关键字', '0', '1', '2019-11-06 18:12:12', '2019-11-06 18:12:12');

-- ----------------------------
-- Table structure for `customs`
-- ----------------------------
DROP TABLE IF EXISTS `customs`;
CREATE TABLE `customs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '标识名称',
  `picture` varchar(50) DEFAULT '' COMMENT '图片',
  `link` varchar(50) DEFAULT '' COMMENT '跳转链接',
  `content` varchar(200) DEFAULT '' COMMENT '详细内容',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否发布 1是 0否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=618 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='自定义数据';

-- ----------------------------
-- Records of customs
-- ----------------------------
INSERT INTO `customs` VALUES ('617', '标识名称', '图片', '跳转链接', '详细内容', '0', '2019-11-06 18:47:38', '2019-11-06 18:47:38');

-- ----------------------------
-- Table structure for `friend_links`
-- ----------------------------
DROP TABLE IF EXISTS `friend_links`;
CREATE TABLE `friend_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '网站名称',
  `note` varchar(50) DEFAULT '' COMMENT '网站备注',
  `picture` varchar(50) DEFAULT '' COMMENT '图片',
  `link` varchar(50) DEFAULT '' COMMENT '链接',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否发布 1是 0否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=620 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='友情链接';

-- ----------------------------
-- Records of friend_links
-- ----------------------------
INSERT INTO `friend_links` VALUES ('619', '网站名称2', '网站备注', '图片', '链接', '1', '0', '2019-11-06 18:02:05', '2019-11-06 18:02:20');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL COMMENT '所属栏目',
  `goodclass_id` int(11) DEFAULT NULL COMMENT '商品分类',
  `name` varchar(50) DEFAULT '' COMMENT '商品名称',
  `attribute` varchar(50) DEFAULT '' COMMENT '属性值',
  `first_picture` varchar(50) DEFAULT '' COMMENT '主图',
  `group_picture` varchar(50) DEFAULT '' COMMENT '商品组图',
  `freight_for` tinyint(3) DEFAULT '0' COMMENT '运费承担 1买家 0卖家',
  `market_price` decimal(11,2) DEFAULT '0.00' COMMENT '市场价',
  `sale_price` decimal(11,2) DEFAULT '0.00' COMMENT '销售价',
  `special` decimal(11,2) DEFAULT '0.00' COMMENT '特价',
  `serial_number` varchar(20) DEFAULT '' COMMENT '商品编号',
  `weight` decimal(11,2) DEFAULT '0.00' COMMENT '商品重量',
  `inventory` int(11) DEFAULT '0' COMMENT '库存',
  `keyword` varchar(50) DEFAULT '' COMMENT '关键词',
  `abstract` varchar(300) DEFAULT '' COMMENT '摘要',
  `content` varchar(50) DEFAULT '' COMMENT '商品详情',
  `placed_top` tinyint(3) DEFAULT '0' COMMENT '是否置顶 1是 0否',
  `recommended` tinyint(3) DEFAULT '0' COMMENT '是否推荐 1是 0否',
  `selling` tinyint(3) DEFAULT '0' COMMENT '是否热卖，1是 0否',
  `rolling` tinyint(3) DEFAULT '0' COMMENT '是否滚动，1是 0否',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否发布 1是 0否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品信息管理';

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for `good_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `good_attributes`;
CREATE TABLE `good_attributes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '属性名称',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品属性';

-- ----------------------------
-- Records of good_attributes
-- ----------------------------

-- ----------------------------
-- Table structure for `good_categorys`
-- ----------------------------
DROP TABLE IF EXISTS `good_categorys`;
CREATE TABLE `good_categorys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) DEFAULT '0' COMMENT '所属分类（一级栏目）',
  `picture` varchar(50) DEFAULT '' COMMENT '图片',
  `link` varchar(50) DEFAULT '' COMMENT '跳转链接',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否显示 1是 0否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品分类';

-- ----------------------------
-- Records of good_categorys
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT '' COMMENT '标题',
  `name` varchar(20) DEFAULT '' COMMENT '姓名',
  `phone` varchar(20) DEFAULT '' COMMENT '联系电话',
  `email` varchar(50) DEFAULT '' COMMENT '电子邮箱',
  `address` varchar(50) DEFAULT '' COMMENT '联系地址',
  `content` varchar(50) DEFAULT '' COMMENT '留言内容',
  `state` tinyint(3) DEFAULT '0' COMMENT '阅读状态：1已查看 0未查看',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=618 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='留言信息管理';

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `recruitments`
-- ----------------------------
DROP TABLE IF EXISTS `recruitments`;
CREATE TABLE `recruitments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '岗位名称',
  `place` varchar(50) DEFAULT '' COMMENT '工作地点',
  `nature` varchar(50) DEFAULT '' COMMENT '工作性质',
  `number` tinyint(5) DEFAULT '0' COMMENT '招聘人数',
  `gender` tinyint(3) DEFAULT '2' COMMENT '性别要求 1男 0女 2不限',
  `wages` varchar(50) DEFAULT '' COMMENT '工资待遇',
  `effective` varchar(50) DEFAULT '' COMMENT '有效期限',
  `experience` varchar(50) DEFAULT '' COMMENT '工作经验',
  `degree` varchar(50) DEFAULT '' COMMENT '学历要求',
  `language` varchar(50) DEFAULT '' COMMENT '语言能力',
  `description` varchar(150) DEFAULT '' COMMENT '职位描述',
  `requirements` varchar(150) DEFAULT '' COMMENT '职位要求',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `state` tinyint(3) DEFAULT '0' COMMENT '是否发布 1是 0否',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=622 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='招聘信息管理';

-- ----------------------------
-- Records of recruitments
-- ----------------------------
INSERT INTO `recruitments` VALUES ('619', '岗位名称', '工作地点', '工作性质', '33', '2', '工资待遇', '有效期限', '工作经验', '学历要求', '语言能力', '职位描述', '职位要求', '2', '0', '2019-11-06 17:28:00', '2019-11-06 18:18:23');
INSERT INTO `recruitments` VALUES ('620', '岗位名称', '工作地点', '工作性质', '33', '2', '工资待遇', '有效期限', '工作经验', '学历要求', '语言能力', '职位描述', '职位要求', '2', '1', '2019-11-06 18:10:12', '2019-11-06 18:10:12');
INSERT INTO `recruitments` VALUES ('621', '岗位名称', '工作地点', '工作性质', '33', '2', '工资待遇', '有效期限', '工作经验', '学历要求', '语言能力', '职位描述', '职位要求', '2', '1', '2019-11-06 18:11:16', '2019-11-06 18:11:16');

-- ----------------------------
-- Table structure for `web_infos`
-- ----------------------------
DROP TABLE IF EXISTS `web_infos`;
CREATE TABLE `web_infos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) DEFAULT '' COMMENT 'logo',
  `url` varchar(150) DEFAULT '' COMMENT '网站url地址',
  `seo_title` varchar(150) DEFAULT '' COMMENT 'SEO 标题',
  `keyword` varchar(150) DEFAULT '' COMMENT '关键字',
  `describe` varchar(150) DEFAULT '' COMMENT '网站描述',
  `copyright` varchar(150) DEFAULT '' COMMENT '版权信息',
  `hotline` varchar(150) DEFAULT '' COMMENT '客服热线',
  `record` varchar(150) DEFAULT '' COMMENT '备案编号',
  `traffic_statistics` varchar(150) DEFAULT '' COMMENT '流量统计',
  `online_qq` varchar(150) DEFAULT '' COMMENT '在线QQ， , 分割',
  `contact` varchar(20) DEFAULT '' COMMENT '联系人',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `phone` varchar(20) DEFAULT '' COMMENT '联系人电话',
  `address` varchar(100) DEFAULT '' COMMENT '公司地址',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=620 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网站信息配置';

-- ----------------------------
-- Records of web_infos
-- ----------------------------
INSERT INTO `web_infos` VALUES ('619', 'logoa3', 'www.kuaidayouxi.com', '快打,游戏', '统计', '收到了法律手段管理局分公司的家伙', '模糊是否会对广告', '0312-556456489', '的粉红色的肺活量', '多发个都是废话', '', '的双方各所多或过付木绿所多军军军军军过或', '79572518@qq.com', '157584288458', '上海', '2019-11-06 14:38:56', '2019-11-06 17:31:15');
