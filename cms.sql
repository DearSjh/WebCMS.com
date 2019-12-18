/*
 Navicat Premium Data Transfer

 Source Server         : 站点
 Source Server Type    : MySQL
 Source Server Version : 50173
 Source Host           : sql.l19.vhostgo.com:3306
 Source Schema         : jicui2

 Target Server Type    : MySQL
 Target Server Version : 50173
 File Encoding         : 65001

 Date: 12/12/2019 15:31:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_logs
-- ----------------------------
DROP TABLE IF EXISTS `access_logs`;
CREATE TABLE `access_logs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_time` datetime NULL DEFAULT NULL,
  `local` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `source` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '权限名称',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT '自关联，父级id',
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '连接url',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限列表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `state` tinyint(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '管理员状态,1正常',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`user_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (12, '15026452519', '$10$GgCaqDAOqud4HSwS40b/BeHOShMa6UMPlNYaMfSfNgM63cjBU1kw6', 1, '2019-11-05 17:26:07', '2019-11-05 17:26:10');

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '内容管理' ROW_FORMAT = Compact;

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
INSERT INTO `articles` VALUES (14, 637, '首次冠名电视节目 现代中草药护理专家展亲和力14', '', '/images/news01.png', '/upload/status/34c08bdc77f1dd2c.png', '', '', '', '<p>携手《出发吧！爱情》 化妆品展品牌魅力\n继4月7日，现代中草药个人护理专家——化妆品海外旗舰店于法国巴黎的歌剧院大道38号盛大揭幕后，由化妆品冠名的中国档明星夫妻户外生存真人秀节目《出发吧！爱情》，将从5月9日起，在每周六晚22点的《浙江卫视》与观众见面。对于此次合作，冠名商上海家化联合股份有限公司副总经理兼化妆品事业部总经理黄震先生表示：“随着化妆品成为个走出国门的美妆品牌，我们会继续加大对品牌建设的投资。而我们的品牌传播团队也在加强。今天，我们邀请到曾成功上市雀巢水以及联合利华旗下清扬品牌的市场总监，具有丰富大媒体投放经验市场营销专家刘晔女士强势加盟，她将在媒体投放方面给与我们更多战略性的建议。而此次，我们选择《出发吧！爱情》，是希望透过携手《出发吧！爱情》，让更多年轻消费者了解化妆品‘美自根源，道法自然’的东方养美护肤理念，让中草药护肤受到更多消费者的关注及肯定。”\n\n首次冠名电视节目 现代中草药护理专家展亲和力\n本季《出发吧！爱情》将到六个不同的挑战目的地，开展六段截然不同的惊险之旅，超级硬汉吴京与妻子谢楠，初为人母的戚薇以及丈夫李承铉、久未露面的范文芳和李铭顺，以及被华少戏称“神同步”夫妇郭京飞、鲍莉，将带领大家“出发去野”，在原生态的环境中大秀恩爱，并为了爱情勇敢上路。而全程陪伴他们的，是现代中草药个人护理专家——化妆品。\n\n以时尚概念沟通 吸引年轻消费者\n据悉，结合此档年轻的真人秀节目，化妆品将以全新上市的菁萃原液面膜全程提供给明星夫妻，以陪伴他们应对旅途中各种极限环境对肌肤的挑战。全新菁萃原液面膜是配合当下都市人生活节奏，全新打造的一种中草药轻养护方式：化繁为简，以超轻透天丝面膜贴，珍贵浸润植物菁萃和活性酵萃精华，让中草药护肤成为一种“轻活”的时尚享受。</p>', 0, 0, 0, 1, 1, 4, 1, NULL, '2019-12-12 09:52:32');
INSERT INTO `articles` VALUES (15, 637, '首次冠名电视节目 现代中草药护理专家展亲和力15', '', '/images/news01.png', '/upload/status/34c08bdc77f1dd2c.png', '', '', '啊撒旦飞洒发生', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">12月9日，世界反兴奋剂机构(WADA)通过了“对俄罗斯禁赛4年”的提案。WADA执委会宣布，认定俄罗斯反兴奋剂机构违反反兴奋剂规定章程，禁止俄罗斯在未来四年参加大型国际赛事，包括奥运会和世锦赛、足球世界杯。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">这意味着包括2020年东京奥运会、2022北京冬奥会、2022年卡塔尔足球世界杯等重大赛事都将没有俄罗斯代表团参加。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">对于没有使用兴奋剂历史的俄罗斯运动员，将参照2018年平昌冬奥会的做法，他们只能以中立身份参与国际重大赛事，不得穿着有俄罗斯国旗国徽标志的服装。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10947566202/1000\" class=\"content-picture\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">可以肯定，这个处罚的实际效果，是将俄罗斯赶出国际体育大家庭之外。</span>有俄罗斯政界人士表示，这是一次反俄的决定，“只有有罪的人才应承担责任，整个国家和整个俄罗斯体育不应该受到惩罚”。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">世界大赛缺少俄罗斯运动员的参加，恐怕不是热爱体育的人愿意看到的结果。是什么原因导致了现在这个局面？</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">世界反兴奋剂机构（WADA）的权威从哪里来？</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">能将体育大国，更是政治大国的俄罗斯排除出国际体育赛事，世界反兴奋剂机构（WADA）到底是个什么组织，能够拥有这种权威？</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10941625501/1000\" class=\"content-picture\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">事情要从兴奋剂讲起。专门的兴奋剂最早是为二战军事用途研发的。<span style=\"font-weight: bolder;\">战争结束后，这些兴奋剂开始进入体育界，但最初并没有引起人们的注意，当时的体育界也对兴奋剂的危害还知之甚少。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">随着各种禁药的增加和泛滥，不仅危害体育的公平性和纯洁性，更出现了危害运动员健康和生命安全的一系列事件，反兴奋剂工作开始被各国和国际体育组织重视。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">1967年，英国自行车队队长汤姆·辛普森因大量服用苯丙胺导致心脏衰竭</span>，在环法自行车大赛途中死亡。药物使得他在早已中暑并超越身体极限的情况下，仍以为自己有继续前行的余力。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">这一事件直接促使国际奥委会成立了医学委员会(IOC-MC)，处理比赛中的兴奋剂问题，并于1968年开始实施官方药检。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">其他体育组织中，1966年，国际足联开始在世界杯中开展药检；1972年，国际田联进行了药检。<span style=\"font-weight: bolder;\">而环法自行车大赛早在1955年就开始对部分药品实施管制，因为自行车运动更早地受到兴奋剂的困扰。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10947572453/1000\" class=\"content-picture\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">1999年11月10日，世界反兴奋剂机构（WADA）在瑞士洛桑成立，国际奥委会是它的发起机构，但并不是它的上级。WADA从一开始职权就独立于国际奥委会，总部位于加拿大的蒙特利尔，而不是国际奥委会所在的瑞士洛桑。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">WADA的主要工作是负责审定和调整兴奋剂物的名单，确定药检实验室以及从事反兴奋剂的研究，教育和预防工作。<span style=\"font-weight: bolder;\">各国政府和体育界都承认在反兴奋剂的活动中WADA起主要牵头作用。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">国际奥委会将奥运会赛事的兴奋剂检测工作交给了WADA负责，树立了WADA在全球兴奋剂检测中的强势地位。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">迄今已经有238个非奥运会组织签署了WADA的兴奋剂管理条例，包括国际足联也于2006年签署。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">1983年成立的国际体育仲裁法庭（CAS）是一个独立的国际司法组织，是主导国际体育争端解决的机构，该机构很多关于兴奋剂案件的仲裁结果，都以WADA2004年《世界反兴奋剂条例》为本。（《世界反兴奋剂机构权利探源》·刘会平、程传银、杨小帆·《体育文化导刊》）</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10713488273/1000\" class=\"content-picture\"/><em class=\"desc\" style=\"color: rgb(155, 158, 163); line-height: 20px; text-align: center; display: block; font-size: 14px;\">杨扬当选世界反兴奋剂机构副主席</em></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">随着体育事业和科技的发展，新型禁药不断出现，反兴奋剂工作手段也变得日益严苛和凌厉。<span style=\"font-weight: bolder;\">比如运动员需要主动提供行踪报告，以供不定期不事前通知的随机赛外检测，还要当着陌生匿名检测员的面给出尿样。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">运动员丧失隐私、休息和人格尊严、禁药名单是否合理等问题上，各界都颇有微词。但是WADA不为所动，它在体育世界的影响力越来越大，权威越来越高。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">按照前国际奥委会主席罗格的话说，这是“今天的体育不得不为嫌疑人士的存在付出一定代价”。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">俄罗斯到底是出了什么问题？</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">近年来俄罗斯体育已经多次被整体处罚：</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">2015年田径世锦赛，因涉嫌“系统性”使用兴奋剂，俄罗斯被全面禁止参加。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">2016年里约奥运会开赛前，俄罗斯差点因2014索契冬奥会尿检问题不能参赛。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">2018年平昌冬奥会，俄罗斯被禁止以国家名义参赛，符合条件的俄罗斯运动员可以“来自俄罗斯的奥林匹克运动员”名义或个人名义参赛。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">有人认为此次处罚是俄罗斯国家主导的兴奋剂丑闻的再次爆发，如同20世纪七八十年代东德运动员大规模服药丑闻，但也有人认为WADA又一次算账，又一次找茬，是大国背后操纵国际体育。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10947579714/1000\" class=\"content-picture\"/><em class=\"desc\" style=\"color: rgb(155, 158, 163); line-height: 20px; text-align: center; display: block; font-size: 14px;\">俄罗斯女子田径运动员因2012伦敦奥运使用违禁药品被终身禁赛</em></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">实际上这次处罚的做出，目前看是基于新的事件，不是源于个别运动员或者某运动队系统使用禁药，也不是针对俄罗斯过往记录。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">这次处罚针对的是莫斯科反兴奋剂实验室数据的篡改行为，处罚的是俄反兴奋剂机构的不合规行为。可以说问题根源，在于俄罗斯没有从规则层面尊重当前由WADA主导的国际反兴奋剂管理制度。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/2576819577/1000\" class=\"content-picture\"/><em class=\"desc\" style=\"color: rgb(155, 158, 163); line-height: 20px; text-align: center; display: block; font-size: 14px;\">俄罗斯前反兴奋剂实验室主任罗琴科夫</em></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">当前反兴奋剂的具体检查工作，要么是由各签约单项组织实施，如国际田联、国际泳联，要么是签约各国自己的反兴奋剂机构实验室实施。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">WADA并不直接出手检查，它是规范的制定者、协调者和监督者，WADA负责监督签约各组织、各国是否遵照《世界反兴奋剂条列》开展自查工作。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">各国负责检测工作的实验室要通过 WADA的技术资质考试认证，还有将数据真实同步给WADA的义务。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">2018年9月，WADA恢复了俄罗斯反兴奋剂机构自2015年11月起被剥夺的资格。不过WADA要求，必须在当年年底前拿到莫斯科反兴奋剂实验室储存的数据和样本，否则将再次对俄罗斯进行处罚。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">2019年1月，WADA宣布，俄方没有在此前商定的期限前开放莫斯科实验室数据。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10947586323/1000\" class=\"content-picture\"/><em class=\"desc\" style=\"color: rgb(155, 158, 163); line-height: 20px; text-align: center; display: block; font-size: 14px;\">俄罗斯奥委会门前</em></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">此次处罚决议后，WADA主席克雷格·里迪称，“已经有非常有说服力的证据，证明俄罗斯存在对数据的操纵和删除，他们确实承认，对2019年1月前的莫斯科实验室数据进行过改动。”</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">据国际奥委会主席托马斯·巴赫的声明，“现在证据由世界反兴奋剂机构掌握，最终由CAS（国际体育仲裁法庭）宣布结果，决定权不在国际奥委会的手中。”</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">如何看待这次俄罗斯被开除出世界体育大家庭事件</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">这就是俄罗斯现在面对的情况，不是一个WADA或者国际奥委会在挑俄罗斯的毛病，而是整套反兴奋剂制度，上百个缔约国际独立组织，上百个缔约国在共同实施的一套规则。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">随着反兴奋剂制度体系的完善，<span style=\"font-weight: bolder;\">WADA拥有的权威，已经不再是依靠背后某个强力机构背书，而是基于整个制度架构。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">如今尊重世界反兴奋剂机构规则本身已经是参加国际体育活动必须履行的义务，<span style=\"font-weight: bolder;\">这是一套已经获得国际认可的统一标准，想脱离这一规则体系，自成一体的可能性太小太小了。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10940481054/1000\" class=\"content-picture\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">当然，没有永远正确的机构，也没有尽善尽美的制度，只有不断完善的制度。积极学习和认真参与这套规则体系，参与到这套规则的继续改进完善中，应是各国更好的选择。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"font-weight: bolder;\">把问题归结为背后政治操弄，恐怕对事情也没有什么帮助。</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">处罚决定出来后，俄罗斯有21天来决定是接受处罚，还是上诉至国际体育仲裁法庭。但不要忘了，国际体育仲裁法庭，也还是依据WADA相关规则。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">友谊与团结是体育精神基本的组成部分，但体育精神同样不能缺少公正公平。<span style=\"font-weight: bolder;\">目前这套反兴奋剂规则维系着体育事业的公平公正，这是这项事业有意义，值得参与的基础底线。</span></p><p><br/></p>', 0, 1, 0, 1, 1, 10, 1, NULL, '2019-12-12 09:53:23');

-- ----------------------------
-- Table structure for banned_words
-- ----------------------------
DROP TABLE IF EXISTS `banned_words`;
CREATE TABLE `banned_words`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `word` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '违禁词',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 757 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '违禁词信息列表' ROW_FORMAT = Compact;

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 623 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '首页幻灯片设置' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (621, 'sadfa', '/upload/status/8aca65f0186bd9c7.gif', '', 0, 1, 1, '2019-11-22 13:48:17', '2019-12-12 09:42:34');
INSERT INTO `banners` VALUES (622, '淘宝', '/upload/status/a030386fcf57febc.gif', 'http:taobao.com', 0, 1, 1, '2019-11-29 17:09:36', '2019-12-12 09:42:33');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL DEFAULT 1 COMMENT '栏目类型（1单页，2列表，3商品）',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT '所属栏目（一级栏目）',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '栏目名称',
  `eng_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '英文名称',
  `dir_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `picture` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图片',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '跳转链接',
  `seo_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SEO标题',
  `keyword` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键字',
  `sort` tinyint(3) NULL DEFAULT 1 COMMENT '排序',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否开启开启 1是 0 否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 666 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '栏目管理' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (632, 2, 0, '关于我们', NULL, 'aboutUs', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (633, 2, 632, '企业简介', NULL, 'intro', '', '', '', '', 1, 1, 1, NULL, '2019-12-12 11:35:32');
INSERT INTO `categories` VALUES (634, 2, 632, '企业文化', NULL, 'culture', '', '', '', '', 1, 1, 1, NULL, '2019-12-12 11:35:32');
INSERT INTO `categories` VALUES (636, 2, 0, '新闻中心', NULL, 'news', '', '', '', '', 2, 0, 1, NULL, '2019-12-12 11:50:01');
INSERT INTO `categories` VALUES (637, 2, 636, '常见问题', NULL, 'problem', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:41:21');
INSERT INTO `categories` VALUES (638, 2, 636, '更新日志', NULL, 'logs', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:41:44');
INSERT INTO `categories` VALUES (640, 2, 0, '产品中心', NULL, 'product', '', '', '', '', 3, 0, 1, NULL, '2019-12-12 11:50:11');
INSERT INTO `categories` VALUES (641, 2, 640, '手机', NULL, 'mobile', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:42:05');
INSERT INTO `categories` VALUES (642, 2, 640, '电脑', NULL, 'diannaochanpin', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:42:18');
INSERT INTO `categories` VALUES (643, 2, 640, '鼠标键盘', NULL, 'sbjp', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:43:03');
INSERT INTO `categories` VALUES (644, 2, 641, '智能手机', NULL, 'zhinenghsouji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (645, 2, 641, '畅玩手机', NULL, 'changwangshouji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (646, 2, 642, '上网本', NULL, 'swb', '', '', '', '', 1, 0, 1, NULL, '2019-12-12 11:44:00');
INSERT INTO `categories` VALUES (647, 2, 643, '耳机', NULL, 'erji', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (648, 2, 643, '音箱', NULL, 'yinxiang', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (649, 2, 643, '充电宝', NULL, 'chongdianbao', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (655, 1, 0, '联系我们', NULL, 'contactUs', '', '', '', '', 6, 0, 1, NULL, '2019-12-12 11:51:00');
INSERT INTO `categories` VALUES (657, 2, 656, '公司简介', NULL, 'companyIntro', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (658, 2, 656, '公司荣誉', NULL, 'companyGlory', '', '', '', '', 1, 1, 1, NULL, NULL);
INSERT INTO `categories` VALUES (660, 1, 0, '案例展示', NULL, 'case', '', '', '', '', 4, 0, 1, '2019-12-12 11:30:26', '2019-12-12 11:50:32');
INSERT INTO `categories` VALUES (661, 1, 0, '客户服务', NULL, 'service', '', '', '', '', 5, 0, 1, '2019-12-12 11:31:56', '2019-12-12 11:50:44');
INSERT INTO `categories` VALUES (662, 1, 632, '发展历程', NULL, 'history', '', '', '', '', 1, 1, 1, '2019-12-12 11:35:48', '2019-12-12 11:35:48');
INSERT INTO `categories` VALUES (663, 2, 642, '笔记本', NULL, 'bjb', '', '', '', '', 1, 0, 1, '2019-12-12 11:44:26', '2019-12-12 11:44:49');
INSERT INTO `categories` VALUES (664, 1, 642, '超极本', NULL, 'cjb', '', '', '', '', 1, 0, 1, '2019-12-12 11:47:12', '2019-12-12 11:53:19');
INSERT INTO `categories` VALUES (665, 2, 642, '整机', NULL, 'zj', '', '', '', '', 1, 0, 1, '2019-12-12 11:48:04', '2019-12-12 11:53:25');

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
  `keyword` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键字',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 623 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '自定义数据' ROW_FORMAT = Compact;

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 625 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮箱配置' ROW_FORMAT = Compact;

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 620 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '友情链接' ROW_FORMAT = Compact;

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
  `date` date NULL DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`, `ip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '关键词配置' ROW_FORMAT = Compact;

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 672 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '百度关键词查询排名' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for keywords
-- ----------------------------
DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `keyword` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '关键词',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '关键词列表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of keywords
-- ----------------------------
INSERT INTO `keywords` VALUES (1, '上海油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (2, '江苏油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (3, '浙江油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (4, '杭州油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (5, '苏州油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (6, '无锡油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (7, '南京油条机', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (8, '上海油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (9, '上海油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (10, '江苏油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (11, '江苏油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (12, '浙江油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (13, '浙江油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (14, '杭州油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (15, '杭州油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (16, '苏州油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (17, '苏州油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (18, '无锡油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (19, '无锡油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (20, '南京油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (21, '南京油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (22, '上海油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (23, '上海油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (24, '上海油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (25, '江苏油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (26, '江苏油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (27, '江苏油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (28, '浙江油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (29, '浙江油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (30, '浙江油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (31, '杭州油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (32, '杭州油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (33, '杭州油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (34, '苏州油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (35, '苏州油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (36, '苏州油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (37, '无锡油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (38, '无锡油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (39, '无锡油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (40, '南京油条机全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (41, '南京油条机自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (42, '南京油条机仿手工全自动', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (43, '上海全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (44, '上海全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (45, '上海自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (46, '上海自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (47, '上海仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (48, '上海仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (49, '江苏全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (50, '江苏全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (51, '江苏自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (52, '江苏自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (53, '江苏仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (54, '江苏仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (55, '浙江全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (56, '浙江全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (57, '浙江自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (58, '浙江自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (59, '浙江仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (60, '浙江仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (61, '杭州全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (62, '杭州全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (63, '杭州自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (64, '杭州自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (65, '杭州仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (66, '杭州仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (67, '苏州全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (68, '苏州全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (69, '苏州自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (70, '苏州自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (71, '苏州仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (72, '苏州仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (73, '无锡全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (74, '无锡全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (75, '无锡自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (76, '无锡自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (77, '无锡仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (78, '无锡仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (79, '南京全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (80, '南京全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (81, '南京自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (82, '南京自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (83, '南京仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (84, '南京仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (85, '全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (86, '全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (87, '自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (88, '自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (89, '仿手工全自动油条机厂家', '2019-12-04 11:49:30', '2019-12-04 11:49:30');
INSERT INTO `keywords` VALUES (90, '仿手工全自动油条机价格', '2019-12-04 11:49:30', '2019-12-04 11:49:30');

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pic` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `state` tinyint(3) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

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
  `num` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '留言信息管理' ROW_FORMAT = Compact;


-- ----------------------------
-- Table structure for page_views
-- ----------------------------
DROP TABLE IF EXISTS `page_views`;
CREATE TABLE `page_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NULL DEFAULT NULL,
  `num` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



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
  `sort` int(11) NULL DEFAULT NULL COMMENT '排序',
  `state` tinyint(3) NULL DEFAULT 0 COMMENT '是否发布 1是 0否',
  `lang` tinyint(3) NULL DEFAULT 1 COMMENT '语言类型',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 619 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '招聘信息管理' ROW_FORMAT = Compact;

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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色权限关联表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色描述',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色列表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for top_views
-- ----------------------------
DROP TABLE IF EXISTS `top_views`;
CREATE TABLE `top_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户角色关联表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_views
-- ----------------------------
DROP TABLE IF EXISTS `user_views`;
CREATE TABLE `user_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NULL DEFAULT NULL,
  `uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `num` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `date`(`date`, `uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;



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
  `created_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 620 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站信息配置' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of web_infos
-- ----------------------------
INSERT INTO `web_infos` VALUES (619, '/images/logo.jpg', 'www.chuanwan18.com', '快打,游戏', '统计', '收到了法律手段管理局分公司的家伙', '上海化妆品有限公司版权所', '400-888-2837', '的粉红色的肺活量', '多发个都是废话', '', '的双方各所多或过付木绿所多军军军军军过或', '79572518@qq.com', '010-57203888', '北京市崇文区崇外大街正仁大厦1段9单元', '2019-11-06 14:38:56', '2019-12-04 11:57:43');

SET FOREIGN_KEY_CHECKS = 1;
