/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : 127.0.0.1:3306
 Source Schema         : cms

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 11/12/2019 18:21:49
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_logs
-- ----------------------------
DROP TABLE IF EXISTS `access_logs`;
CREATE TABLE `access_logs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_time` datetime,
  `local` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `source` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of access_logs
-- ----------------------------
INSERT INTO `access_logs` VALUES (1, NULL, '苏州', 'http://cms.com/', '127.0.0.1', '', '157473928134310');
INSERT INTO `access_logs` VALUES (2, '2019-11-26 11:58:07', '苏州', 'http://cms.com/', '127.0.0.1', '', '157473928134310');
INSERT INTO `access_logs` VALUES (3, '2019-11-26 12:00:38', '苏州', 'http://cms.com/', '127.0.0.1', '', '157474083813296');
INSERT INTO `access_logs` VALUES (4, '2019-11-29 18:53:12', '内网IP', 'http://cms.com/news/companyNews/16.html', '127.0.0.1', '', '157492369683255');

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '权限名称',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT '自关联，父级id',
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '连接url',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `state` tinyint(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '管理员状态,1正常',
  `created_at` datetime  COMMENT '创建时间',
  `updated_at` datetime  COMMENT '最后修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`user_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (12, '15026452519', '$10$GgCaqDAOqud4HSwS40b/BeHOShMa6UMPlNYaMfSfNgM63cjBU1kw6', 1, '2019-11-05 17:26:07.000000', '2019-11-05 17:26:10.000000');

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) UNSIGNED NOT NULL COMMENT '所属栏目',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '文章标题',
  `source` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '文章来源',
  `main_pic` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '主图',
  `group_pic` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '组图',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '跳转链接',
  `keyword` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键字',
  `abstract` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '摘要',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '详细内容',
  `top` tinyint(3) UNSIGNED NULL DEFAULT 0 COMMENT '是否置顶 1是 0否',
  `recommended` tinyint(3) UNSIGNED NULL DEFAULT 0 COMMENT '是否推荐 1是 0否',
  `rolling` tinyint(3) UNSIGNED NULL DEFAULT 0 COMMENT '是否滚动，1是 0否',
  `state` tinyint(3) UNSIGNED NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `sort` int(11) UNSIGNED NULL DEFAULT 1 COMMENT '排序',
  `visits` int(11) UNSIGNED NULL DEFAULT 0 COMMENT '点击次数',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '内容管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, 644, 'sadfdsasf', 'asd', '/images/index05.png', 'asdfa', 'adsfa', 'qsg', 'dfgs', 'sdfg', 0, 0, 0, 1, 1, 0, 1, '2019-11-07 15:56:53', NULL);
INSERT INTO `articles` VALUES (2, 644, 'aaaa', 'aaa', '/images/product06.jpg', 'sdf', 'asdfa', 'dsf', 'asdf', 'asdf15as1fas51651a56s165f65', 0, 0, 0, 1, 2, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (3, 645, 'bbb', 'bb', '/images/index07.png', 'b', '', 'b', 'b', '', 0, 0, 0, 1, 1, 2, 1, NULL, '2019-11-27 16:31:45');
INSERT INTO `articles` VALUES (4, 637, '首次冠名电视节目 现代中草药护理专家展亲和力4', '', '', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (5, 637, '首次冠名电视节目 现代中草药护理专家展亲和力5', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (6, 637, '首次冠名电视节目 现代中草药护理专家展亲和力6', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (7, 637, '首次冠名电视节目 现代中草药护理专家展亲和力7', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (8, 637, '首次冠名电视节目 现代中草药护理专家展亲和力8', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (9, 637, '首次冠名电视节目 现代中草药护理专家展亲和力9', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (10, 637, '首次冠名电视节目 现代中草药护理专家展亲和力10', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (11, 637, '首次冠名电视节目 现代中草药护理专家展亲和力11', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (12, 637, '首次冠名电视节目 现代中草药护理专家展亲和力12', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (13, 637, '首次冠名电视节目 现代中草药护理专家展亲和力13', '', '/images/news01.png', '', '', '', '', '携手《出发吧！爱情》 化妆品展品牌魅力\r\n继4月17日，现代中草药个人护理专家——化妆品首家海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品独家冠名的中国第一档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为第一个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验的资深市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\r\n\r\n首次冠名电视节目 现代中草药护理专家展亲和力\r\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\r\n\r\n以时尚概念沟通 吸引年轻消费者\r\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。', 0, 0, 0, 1, 1, 0, 1, NULL, NULL);
INSERT INTO `articles` VALUES (14, 637, '首次冠名电视节目 现代中草药护理专家展亲和力14', '', '/images/news01.png', '/upload/status/c18b28383bd3669b.gif', '', '', '', '<p>携手《出发吧！爱情》 化妆品展品牌魅力\n继4月7日，现代中草药个人护理专家——化妆品海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品冠名的中国档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\n\n首次冠名电视节目 现代中草药护理专家展亲和力\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\n\n以时尚概念沟通 吸引年轻消费者\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。</p>', 0, 0, 0, 1, 1, 0, 1, NULL, '2019-12-02 15:08:35');
INSERT INTO `articles` VALUES (15, 637, '首次冠名电视节目 现代中草药护理专家展亲和力15', '', '/images/news01.png', '/upload/status/5861b1b1a21d3e5c.gif,/upload/status/ac2a795194b0c573.png,/upload/status/723680f8d4a05b7d.gif', '', '', '啊撒旦飞洒发生', '<p><strong>ssdafsa胜多负少大啥打法上</strong></p>', 0, 1, 0, 1, 1, 0, 1, NULL, '2019-12-02 17:39:27');

-- ----------------------------
-- Table structure for banned_words
-- ----------------------------
DROP TABLE IF EXISTS `banned_words`;
CREATE TABLE `banned_words`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `word` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '违禁词',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 757 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '违禁词信息列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banned_words
-- ----------------------------
INSERT INTO `banned_words` VALUES (622, '最优', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (623, '最低级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (624, '最便宜', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (625, '最低', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (626, '最大程度', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (627, '最便宜', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (628, '最低', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (629, '最大程度', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (630, '最嫌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (631, '最好', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (632, '最大', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (633, '最具', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (634, '最好', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (635, '最佳', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (636, '最大程度', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (637, '最好', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (638, '最佳', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (639, '最高级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (640, '最新技术', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (641, '最符合', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (642, '最舒适', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (643, '最时尚', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (644, '最聚拢', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (645, '最受欢迎', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (646, '独一无二', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (647, '绝无仅有', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (648, '大品牌之一', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (649, '史无前例', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (650, '最先进科学', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (651, '最新科学', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (652, '最新技术', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (653, '最先进加工工艺', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (654, '第一', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (655, '最流行', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (656, '最符合', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (657, '最先进', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (658, '最后', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (659, '最先', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (660, '最符合', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (661, '最聚拢', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (662, 'TOP.1', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (663, 'NO.1', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (664, '最先进', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (665, '最先进科学', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (666, '仅此一次', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (667, '国家领导人', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (668, '独家配方', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (669, '全网首发', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (670, '首家全网首发', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (671, '国际品质', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (672, '真皮', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (673, '遥遥领先', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (674, '万能', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (675, '掌门人', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (676, '首发', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (677, '大牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (678, '永久', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (679, '至尊', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (680, '极佳', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (681, '之王', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (682, '正品', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (683, '领袖', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (684, '100%', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (685, '王牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (686, '中国驰名', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (687, '驰名商标', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (688, '创领品牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (689, '巨星', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (690, '世界领先', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (691, '高级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (692, '首选', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (693, '资深', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (694, '冠军', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (695, '全球级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (696, '国家级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (697, '巅峰', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (698, '世界级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (699, '极致', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (700, '名牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (701, '特效', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (702, '全国首发', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (703, '老字号', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (704, '点击转身', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (705, '免抽检', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (706, '点击领奖', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (707, '质量免检', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (708, '专供', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (709, '领取奖品', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (710, '免单', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (711, '专家推荐', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (712, '点击获取', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (713, '点击有惊喜', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (714, '优秀', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (715, '顶级', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (716, '独家', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (717, '全网销量第一', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (718, '第一品牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (719, '金牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (720, '首家', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (721, '全球首发', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (722, '全国首家', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (723, '顶级工艺', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (724, '销量冠军', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (725, '领袖品牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (726, '绝对值', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (727, '绝对', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (728, '精确', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (729, '超赚', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (730, '领导品牌', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (731, '领先上市', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (732, '著名', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (733, '奢侈', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (734, '高档', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (735, '随时结束', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (736, '仅此一次', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (737, '随时涨价', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (738, '马上降价', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (739, '最后一波', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (740, '特供', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (741, '专供', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (742, '机关推荐', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (743, '领导人推荐', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (744, '无需国家质量检测', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (745, '无需检测', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (746, '恭喜获奖', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (747, '全民免单', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (748, '点击试穿', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (749, '非转基因更安全', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (750, '秒杀', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (751, '抢爆', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (752, '再不抢就没了', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (753, '不会再便宜了', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (754, '错过就没机会了', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (755, '万人疯抢', '2019-11-25 16:54:43', '2019-11-25 16:54:43');
INSERT INTO `banned_words` VALUES (756, '抢疯了', '2019-11-25 16:54:43', '2019-11-25 16:54:43');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '标题',
  `picture` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图片地址',
  `link` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '跳转链接',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '开启关闭 1开启，0关闭',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `sort` int(11) NULL DEFAULT 1 COMMENT '排序',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 623 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '首页幻灯片设置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (621, 'sadfa', '/upload/status/8aca65f0186bd9c7.gif', '', 1, 1, 1, '2019-11-22 13:48:17', '2019-11-29 17:09:41');
INSERT INTO `banners` VALUES (622, '淘宝', '/upload/status/a030386fcf57febc.gif', 'http:taobao.com', 1, 1, 1, '2019-11-29 17:09:36', '2019-11-29 17:09:36');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL DEFAULT 1 COMMENT '栏目类型（1单页，2列表，3商品）',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT '所属栏目（一级栏目）',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '栏目名称',
  `eng_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci  COMMENT '英文名称',
  `dir_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci ,
  `picture` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图片',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '跳转链接',
  `seo_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SEO标题',
  `keyword` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键字',
  `sort` tinyint(3) NULL DEFAULT 1 COMMENT '排序',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否开启开启 1是 0 否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 660 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '栏目管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (632, 2, 0, '关于我们', NULL, 'aboutUs', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (633, 2, 632, '公司简介', NULL, 'intro', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (634, 2, 632, '公司荣誉 ', NULL, 'glory', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (636, 2, 0, '新闻动态', NULL, 'news', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (637, 2, 636, '公司动态 ', NULL, 'companyNews', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (638, 2, 636, '行业资讯 ', NULL, 'industryNews', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (639, 2, 636, '媒体报道', NULL, 'medieNews', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (640, 2, 0, '产品展示', NULL, 'product', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (641, 2, 640, '手机数码', NULL, 'mobile', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (642, 2, 640, '电脑产品 ', NULL, 'diannaochanpin', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (643, 2, 640, '周边配件', NULL, 'zhoubianpeijian', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (644, 2, 641, '智能手机', NULL, 'zhinenghsouji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (645, 2, 641, '畅玩手机', NULL, 'changwangshouji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (646, 2, 642, '笔记本电脑', NULL, 'bijibendiannao', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (647, 2, 643, '耳机', NULL, 'erji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (648, 2, 643, '音箱', NULL, 'yinxiang', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (649, 2, 643, '充电宝', NULL, 'chongdianbao', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (650, 2, 0, '解决方案', NULL, NULL, '', '', '', '', 1, 0, 1, NULL, '2019-11-29 17:19:21');
INSERT INTO `categories` VALUES (651, 2, 650, '系统方案 ', NULL, NULL, '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (652, 2, 650, '应用方案', NULL, NULL, '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (653, 2, 0, '资料下载', NULL, NULL, '', '', '', '', 1, 0, 1, NULL, NULL);
INSERT INTO `categories` VALUES (654, 2, 0, '人才招聘 ', NULL, NULL, '', '', '', '', 1, 0, 1, NULL, NULL);
INSERT INTO `categories` VALUES (655, 1, 0, '联系我们', NULL, 'contactUs', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (657, 2, 656, '公司简介', NULL, 'companyIntro', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (658, 2, 656, '公司荣誉', NULL, 'companyGlory', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (659, 2, 0, '在线留言 ', NULL, 'message', '', '', '', '', 1, 1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for customs
-- ----------------------------
DROP TABLE IF EXISTS `customs`;
CREATE TABLE `customs`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '标识名称',
  `picture` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图片',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '跳转链接',
  `content` varchar(900) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '详细内容',
  `keyword` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci  COMMENT '关键字',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 623 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '自定义数据' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customs
-- ----------------------------
INSERT INTO `customs` VALUES (622, '测试1', '/upload/status/adcc710ea47a69cf.webp', '', '说明说明说明说明说明', NULL, 1, 1, '2019-11-28 15:15:39', '2019-11-28 15:16:09');

-- ----------------------------
-- Table structure for emails
-- ----------------------------
DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '邮件标题',
  `smtp_server` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '发送邮箱的SMTP地址',
  `smtp_port` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SMTP的端口',
  `account` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '邮箱账号',
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '邮箱授权码',
  `to_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '接收邮箱地址',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 625 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮箱配置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of emails
-- ----------------------------
INSERT INTO `emails` VALUES (624, '您有新的留言消息，请查收！', '', '', '', '', '95723515@qq.com', '2019-12-04 11:22:04', '2019-12-04 11:22:04');

-- ----------------------------
-- Table structure for friend_links
-- ----------------------------
DROP TABLE IF EXISTS `friend_links`;
CREATE TABLE `friend_links`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '网站名称',
  `note` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '网站备注',
  `picture` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图片',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '链接',
  `sort` int(11) NULL DEFAULT 1 COMMENT '排序',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 620 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '友情链接' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of friend_links
-- ----------------------------
INSERT INTO `friend_links` VALUES (618, '网站名称', '网站备注', '', '链接', 1, 0, 1, '2019-11-06 16:44:30', '2019-11-29 16:34:53');
INSERT INTO `friend_links` VALUES (619, '百度', '', '/upload/status/5908d118ad5a3320.gif', 'http:baidu.com', 1, 1, 1, '2019-11-22 13:52:34', '2019-11-28 15:11:20');

-- ----------------------------
-- Table structure for ip_views
-- ----------------------------
DROP TABLE IF EXISTS `ip_views`;
CREATE TABLE `ip_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date ,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED ,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`, `ip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ip_views
-- ----------------------------
INSERT INTO `ip_views` VALUES (2, '2019-11-26', '127.0.0.1', 1);
INSERT INTO `ip_views` VALUES (3, '2019-11-27', '127.0.0.1', 1);
INSERT INTO `ip_views` VALUES (4, '2019-11-29', '127.0.0.1', 1);
INSERT INTO `ip_views` VALUES (5, '2019-12-02', '127.0.0.1', 1);
INSERT INTO `ip_views` VALUES (6, '2019-12-04', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for keyword_configs
-- ----------------------------
DROP TABLE IF EXISTS `keyword_configs`;
CREATE TABLE `keyword_configs`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `main` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '主关键词',
  `region` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '地区关键词',
  `prefix` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '前缀关键词',
  `suffix` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '后缀关键词',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '关键词配置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keyword_configs
-- ----------------------------
INSERT INTO `keyword_configs` VALUES (1, '油条机', '上海,江苏,浙江,杭州,苏州,无锡,南京', '全自动,自动,仿手工全自动', '厂家,价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');

-- ----------------------------
-- Table structure for keyword_rankings
-- ----------------------------
DROP TABLE IF EXISTS `keyword_rankings`;
CREATE TABLE `keyword_rankings`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键词',
  `latest_ranking` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '最新排名',
  `deduction` decimal(3, 2) NULL DEFAULT 0.00 COMMENT '扣费',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 672 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '百度关键词查询排名' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for keywords
-- ----------------------------
DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `keyword` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键词',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '关键词列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keywords
-- ----------------------------

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci ,
  `pic` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci ,
  `state` tinyint(3) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES (1, '中文（简体）', '/assets/img/lang/china.gif', 1);
INSERT INTO `languages` VALUES (2, '英文', '/assets/img/lang/ying.gif', 0);
INSERT INTO `languages` VALUES (3, '日文', '/assets/img/lang/riben.gif', 0);
INSERT INTO `languages` VALUES (4, '韩文', '/assets/img/lang/hanguo.gif', 0);
INSERT INTO `languages` VALUES (5, '俄文', '/assets/img/lang/eluosi.gif', 0);
INSERT INTO `languages` VALUES (6, '中文（繁体）', '/assets/img/lang/china.gif', 0);

-- ----------------------------
-- Table structure for local_views
-- ----------------------------
DROP TABLE IF EXISTS `local_views`;
CREATE TABLE `local_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `local` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED ,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of local_views
-- ----------------------------
INSERT INTO `local_views` VALUES (5, 'XX', 16);
INSERT INTO `local_views` VALUES (6, '江苏', 73);

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '标题',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '电子邮箱',
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '联系地址',
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '留言内容',
  `state` tinyblob NULL,
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '留言信息管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for page_views
-- ----------------------------
DROP TABLE IF EXISTS `page_views`;
CREATE TABLE `page_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date ,
  `num` int(10) UNSIGNED ,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_views
-- ----------------------------
INSERT INTO `page_views` VALUES (2, '2019-11-26', 26);
INSERT INTO `page_views` VALUES (3, '2019-11-27', 66);
INSERT INTO `page_views` VALUES (4, '2019-11-29', 1);
INSERT INTO `page_views` VALUES (5, '2019-12-02', 11);
INSERT INTO `page_views` VALUES (6, '2019-12-04', 1);

-- ----------------------------
-- Table structure for recruitments
-- ----------------------------
DROP TABLE IF EXISTS `recruitments`;
CREATE TABLE `recruitments`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '岗位名称',
  `place` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '工作地点',
  `nature` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '工作性质',
  `number` tinyint(5) NULL DEFAULT 0 COMMENT '招聘人数',
  `gender` tinyint(3) NULL DEFAULT 2 COMMENT '性别要求 1男 0女 2不限',
  `wages` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '工资待遇',
  `effective` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '有效期限',
  `experience` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '工作经验',
  `degree` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '学历要求',
  `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '语言能力',
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '职位描述',
  `requirements` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '职位要求',
  `sort` int(11)  COMMENT '排序',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 619 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '招聘信息管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recruitments
-- ----------------------------
INSERT INTO `recruitments` VALUES (618, '高级PHP程序员', '昆山', '', 10, 1, '10000~20000', '', '', '', '', '', '', NULL, 1, 1, '2019-11-22 17:53:21', '2019-11-22 17:53:21');

-- ----------------------------
-- Table structure for role_actions
-- ----------------------------
DROP TABLE IF EXISTS `role_actions`;
CREATE TABLE `role_actions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `action_id` int(11) NOT NULL COMMENT '权限id',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色权限关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色描述',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for top_views
-- ----------------------------
DROP TABLE IF EXISTS `top_views`;
CREATE TABLE `top_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED ,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of top_views
-- ----------------------------
INSERT INTO `top_views` VALUES (2, 'http://cms.com/', 24);
INSERT INTO `top_views` VALUES (3, 'http://cms.com/aboutUs', 13);
INSERT INTO `top_views` VALUES (4, 'http://cms.com/news', 22);
INSERT INTO `top_views` VALUES (5, 'http://cms.com/product', 12);
INSERT INTO `top_views` VALUES (6, 'http://cms.com/contactUs', 9);
INSERT INTO `top_views` VALUES (7, 'http://cms.com/message', 5);
INSERT INTO `top_views` VALUES (8, 'http://cms.com/product/mobile/changwangshouji/3.html', 2);
INSERT INTO `top_views` VALUES (9, 'http://cms.com/news/companyNews/16.html', 6);

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户角色关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_views
-- ----------------------------
DROP TABLE IF EXISTS `user_views`;
CREATE TABLE `user_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date ,
  `uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED ,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`, `uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_views
-- ----------------------------
INSERT INTO `user_views` VALUES (5, '2019-11-26', '157473928134310', 1);
INSERT INTO `user_views` VALUES (6, '2019-11-26', '157474083813296', 1);
INSERT INTO `user_views` VALUES (7, '2019-11-27', '157474083813296', 1);
INSERT INTO `user_views` VALUES (8, '2019-11-29', '157492369683255', 1);
INSERT INTO `user_views` VALUES (9, '2019-12-02', '157492369683255', 1);
INSERT INTO `user_views` VALUES (10, '2019-12-04', '157492369683255', 1);

-- ----------------------------
-- Table structure for web_infos
-- ----------------------------
DROP TABLE IF EXISTS `web_infos`;
CREATE TABLE `web_infos`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'logo',
  `url` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '网站url地址',
  `seo_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SEO 标题',
  `keyword` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键字',
  `describe` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '网站描述',
  `copyright` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '版权信息',
  `hotline` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客服热线',
  `record` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '备案编号',
  `traffic_statistics` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '流量统计',
  `online_qq` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '在线QQ， , 分割',
  `contact` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '联系人',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '联系人电话',
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '公司地址',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 620 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站信息配置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of web_infos
-- ----------------------------
INSERT INTO `web_infos` VALUES (619, '/images/logo.jpg', 'www.chuanwan18.com', '快打,游戏', '统计', '收到了法律手段管理局分公司的家伙', '上海化妆品有限公司版权所', '400-888-2837', '的粉红色的肺活量', '多发个都是废话', '', '的双方各所多或过付木绿所多军军军军军过或', '79572518@qq.com', '010-57203888', '北京市崇文区崇外大街正仁大厦1段9单元', '2019-11-06 14:38:56', '2019-12-04 11:57:43');

SET FOREIGN_KEY_CHECKS = 1;
