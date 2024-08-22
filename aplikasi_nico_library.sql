/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:3306
 Source Schema         : aplikasi_nico_library

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 28/11/2022 11:41:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `is_exclusive` int(11) NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES (1, 'The Fireraisers', 'Dundee, Scotland, 1862. After the mill of businessman Matthew Beaumont burns to the ground, Detective Sergeant George Watters is sent to investigate.\r\n\r\nSoon, George discovers that this is not the first property that has been targeted. When a man is found dead in the hold of a trade ship, George discovers a shocking connection between Beaumont and foreign powers threatening the very country.\r\n\r\nGeorge tries to get to the bottom of the mystery, but clues are few and far between. What connects the enigmatic Beaumont to the murder and strange events taking place in the Dundee shipyard?', 1, 1, '202207010357The-Fireraisers.pdf', '20220701041451xZtqHub9L.jpeg', '2022-07-01 03:57:05', '2022-07-29 02:12:55', NULL);
INSERT INTO `books` VALUES (3, 'Induction', 'They weren\'t supposed to exist.\r\nSidonie & Sinclair Boudreau were the offspring of a witch and a shifter. Such pairings usually resulted in death. Sid & Sin had not only survived, but thrived, and managed to sidestep the family legacy of supernatural policing.\r\nThe disappearance of their parents changed everything. A cryptic message, an ancient prophecy, and a mystery to uncover in order to bring their parents home puts the twins in the crosshairs of an enemy they didn\'t know existed.\r\nWhat would you do, to save those you loved?\r\nFans of paranormal mysteries will love this fast-paced, five star ride!', 1, NULL, '202207010416Induction.pdf', '202207010416induction.jpg', '2022-07-01 04:16:49', '2022-07-01 04:16:49', NULL);
INSERT INTO `books` VALUES (4, 'The Unveiling', '12th century England: Two men vie for the throne: King Stephen the usurper and young Duke Henry the rightful heir. Amid civil and private wars, alliances are forged, loyalties are betrayed, families are divided, and marriages are made.\r\n\r\nFor four years, Lady Annyn Bretanne has trained at arms with one end in mind—to avenge her brother’s murder as God has not deemed it worthy to do. Disguised as a squire, she sets off to exact revenge on a man known only by his surname, Wulfrith. But when she holds his fate in her hands, her will wavers and her heart whispers that her enemy may not be an enemy after all.\r\n\r\nBaron Wulfrith, renowned trainer of knights, allows no women within his walls for the distraction they breed. What he never expects is that the impetuous young man sent to train under him is a woman who seeks his death—nor that her unveiling will test his faith and distract the warrior from his purpose.', 4, 1, '202207041320The-Unveiling.pdf', '202207041326the-unveiling.jpg', '2022-07-04 13:20:00', '2022-11-11 10:51:37', '2022-11-11 10:51:37');
INSERT INTO `books` VALUES (5, 'Fire & Water', 'Mixing magic and inexperience may result in dragons!\r\n\r\nKhaly accidentally brought her school project to life.\r\n\r\nAnd now she has a dragon.\r\n\r\nKhaly knew something was wrong when the dragon wasn’t where she left it. She had no idea how it happened or that it was her fault. But now Khaly must run because the Guild was coming for her.\r\n\r\nPower and domination is the Guild’s desire...\r\n\r\n...Elementals stand in their way.\r\n\r\nThe Guild is a true force of evil. Sweeping through Vlarlee they wipe out those with magical gifts, known as Elementals. No matter the age.\r\n\r\nWho is the real threat? Can Khaly figure it out before the Guild finds her?\r\nFire & Water is the first book in the Mechanical Dragons Fantasy Series. It\'s full of twists and turns you will never see coming! Join the Adventure!', 5, NULL, '202207041501Fire--Water.pdf', '202207041501mechanical-dragons.jpeg', '2022-07-04 15:01:08', '2022-11-11 10:51:42', '2022-11-11 10:51:42');
INSERT INTO `books` VALUES (6, 'Education', 'Education', 1, NULL, '202207090339Cover.PNG', '202207090339bg.PNG', '2022-07-09 03:39:11', '2022-07-09 03:40:00', '2022-07-09 03:40:00');
INSERT INTO `books` VALUES (7, 'The Unveiling', '12th century England: Two men vie for the throne: King Stephen the usurper and young Duke Henry the rightful heir. Amid civil and private wars, alliances are forged, loyalties are betrayed, families are divided, and marriages are made.\r\n\r\nFor four years, Lady Annyn Bretanne has trained at arms with one end in mind—to avenge her brother’s murder as God has not deemed it worthy to do. Disguised as a squire, she sets off to exact revenge on a man known only by his surname, Wulfrith. But when she holds his fate in her hands, her will wavers and her heart whispers that her enemy may not be an enemy after all.\r\n\r\nBaron Wulfrith, renowned trainer of knights, allows no women within his walls for the distraction they breed. What he never expects is that the impetuous young man sent to train under him is a woman who seeks his death—nor that her unveiling will test his faith and distract the warrior from his purpose.', 4, 0, '202211140352The-Unveiling.pdf', '202211140352the-unveiling.jpg', '2022-11-14 03:52:59', '2022-11-14 03:52:59', NULL);
INSERT INTO `books` VALUES (8, 'Fire & Water', 'Mixing magic and inexperience may result in dragons!\r\n\r\nKhaly accidentally brought her school project to life.\r\n\r\nAnd now she has a dragon.\r\n\r\nKhaly knew something was wrong when the dragon wasn’t where she left it. She had no idea how it happened or that it was her fault. But now Khaly must run because the Guild was coming for her.\r\n\r\nPower and domination is the Guild’s desire...\r\n\r\n...Elementals stand in their way.\r\n\r\nThe Guild is a true force of evil. Sweeping through Vlarlee they wipe out those with magical gifts, known as Elementals. No matter the age.\r\n\r\nWho is the real threat? Can Khaly figure it out before the Guild finds her?\r\nFire & Water is the first book in the Mechanical Dragons Fantasy Series. It\'s full of twists and turns you will never see coming! Join the Adventure!', 5, 0, '202211140354Fire--Water.pdf', '202211140354mechanical-dragons.jpeg', '2022-11-14 03:54:24', '2022-11-14 03:54:24', NULL);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Adventure', '2022-07-01 03:14:38', '2022-07-01 04:07:02', NULL);
INSERT INTO `categories` VALUES (2, 'Horror', '2022-07-01 03:14:46', '2022-07-01 03:23:58', NULL);
INSERT INTO `categories` VALUES (3, 'Kids', '2022-07-01 03:49:11', '2022-07-04 14:57:50', '2022-07-04 14:57:50');
INSERT INTO `categories` VALUES (4, 'Romance', '2022-07-04 11:16:19', '2022-07-04 11:16:19', NULL);
INSERT INTO `categories` VALUES (5, 'Fantasy', '2022-07-04 15:00:33', '2022-07-04 15:00:33', NULL);
INSERT INTO `categories` VALUES (6, 'Education', '2022-07-09 03:47:01', '2022-07-09 03:47:01', NULL);

-- ----------------------------
-- Table structure for challenge_progress_history
-- ----------------------------
DROP TABLE IF EXISTS `challenge_progress_history`;
CREATE TABLE `challenge_progress_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `challenge_id` int(11) NULL DEFAULT NULL,
  `book_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of challenge_progress_history
-- ----------------------------
INSERT INTO `challenge_progress_history` VALUES (1, 2, 1, 2, '2022-07-04 06:33:14', '2022-07-04 06:33:14');
INSERT INTO `challenge_progress_history` VALUES (2, 2, 3, 2, '2022-07-04 06:40:27', '2022-07-04 06:40:27');
INSERT INTO `challenge_progress_history` VALUES (3, 2, 1, 5, '2022-07-04 12:51:17', '2022-07-04 12:51:17');
INSERT INTO `challenge_progress_history` VALUES (4, 2, 4, 5, '2022-07-04 13:27:01', '2022-07-04 13:27:01');
INSERT INTO `challenge_progress_history` VALUES (5, 2, 3, 5, '2022-07-06 02:50:31', '2022-07-06 02:50:31');
INSERT INTO `challenge_progress_history` VALUES (6, 2, 5, 2, '2022-07-27 06:27:46', '2022-07-27 06:27:46');

-- ----------------------------
-- Table structure for challenges
-- ----------------------------
DROP TABLE IF EXISTS `challenges`;
CREATE TABLE `challenges`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `challenge_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'read, review',
  `point_reward` int(255) NULL DEFAULT NULL,
  `total_book` int(10) NULL DEFAULT NULL,
  `long` int(11) NOT NULL DEFAULT 5,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of challenges
-- ----------------------------
INSERT INTO `challenges` VALUES (1, 'Read 5 Book and get 45 Point on JULY', 'read', 120, 2, 5, '2022-07-01', '2022-07-25', '2022-07-01 07:21:06', '2022-07-04 08:06:55', NULL);
INSERT INTO `challenges` VALUES (2, 'Review 2 Books', 'review', 155, 2, 5, '2022-07-01', '2022-07-31', '2022-07-04 04:53:47', '2022-07-04 04:53:47', NULL);
INSERT INTO `challenges` VALUES (3, 'Test Challenge', 'read', 100, 5, 20, '2022-11-08', '2022-11-30', '2022-11-08 02:38:52', '2022-11-08 02:39:38', NULL);

-- ----------------------------
-- Table structure for exclusive_book_users
-- ----------------------------
DROP TABLE IF EXISTS `exclusive_book_users`;
CREATE TABLE `exclusive_book_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of exclusive_book_users
-- ----------------------------
INSERT INTO `exclusive_book_users` VALUES (1, 1, 2, '2022-07-29 04:10:48', '2022-07-29 04:10:48', NULL);

-- ----------------------------
-- Table structure for item_transactions
-- ----------------------------
DROP TABLE IF EXISTS `item_transactions`;
CREATE TABLE `item_transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `total_item` int(11) NULL DEFAULT NULL,
  `total_coin` int(11) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of item_transactions
-- ----------------------------
INSERT INTO `item_transactions` VALUES (1, 1, 2, 2, 2000, '-', '-', 2, '2022-09-29 08:49:45', '2022-09-29 08:49:45', NULL);
INSERT INTO `item_transactions` VALUES (2, 2, 2, 2, 1200, '08787732878', 'This is my address', 1, '2022-09-29 08:49:58', '2022-09-29 09:30:24', NULL);

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `item_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coin_exchange` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (1, 'Key', 'gold-key.png', 1000, NULL, NULL, NULL);
INSERT INTO `items` VALUES (2, 'Item Test', 'rewards_20220929035636712-large_default.jpg', 600, '2022-09-29 03:22:18', '2022-09-29 03:56:41', NULL);

-- ----------------------------
-- Table structure for point_settings
-- ----------------------------
DROP TABLE IF EXISTS `point_settings`;
CREATE TABLE `point_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of point_settings
-- ----------------------------
INSERT INTO `point_settings` VALUES (1, 'read', '10', NULL, NULL, NULL);
INSERT INTO `point_settings` VALUES (2, 'review', '15', NULL, '2022-07-01 06:15:16', NULL);
INSERT INTO `point_settings` VALUES (3, 'exclusive', '100', NULL, '2022-11-11 10:45:51', NULL);
INSERT INTO `point_settings` VALUES (4, 'score_reset', '2022-11-11', NULL, '2022-11-12 03:35:02', NULL);
INSERT INTO `point_settings` VALUES (5, 'reward_start_redeem', '2022-11-11', NULL, '2022-11-11 10:47:11', NULL);
INSERT INTO `point_settings` VALUES (6, 'reward_end_redeem', '2022-11-11', NULL, '2022-11-11 10:47:11', NULL);
INSERT INTO `point_settings` VALUES (7, 'read_coin', '5', NULL, '2022-09-27 07:36:04', NULL);
INSERT INTO `point_settings` VALUES (8, 'read_5_min_point', '25', '2022-11-07 10:19:48', '2022-11-07 10:47:18', NULL);
INSERT INTO `point_settings` VALUES (9, 'read_15_min_point', '50', '2022-11-07 10:19:48', '2022-11-07 10:47:19', NULL);
INSERT INTO `point_settings` VALUES (10, 'read_30_min_point', '75', '2022-11-07 10:19:49', '2022-11-07 10:47:19', NULL);
INSERT INTO `point_settings` VALUES (11, 'read_60_min_point', '100', '2022-11-07 10:19:49', '2022-11-07 10:47:19', NULL);
INSERT INTO `point_settings` VALUES (12, 'review_point', '100', '2022-11-07 10:19:49', '2022-11-07 10:47:19', NULL);
INSERT INTO `point_settings` VALUES (13, 'read_5_min_coin', '5', '2022-11-07 10:19:49', '2022-11-07 10:19:49', NULL);
INSERT INTO `point_settings` VALUES (14, 'read_15_min_coin', '15', '2022-11-07 10:19:50', '2022-11-07 10:19:50', NULL);
INSERT INTO `point_settings` VALUES (15, 'read_30_min_coin', '30', '2022-11-07 10:19:50', '2022-11-07 10:19:50', NULL);
INSERT INTO `point_settings` VALUES (16, 'read_60_min_coin', '60', '2022-11-07 10:19:50', '2022-11-07 10:19:50', NULL);
INSERT INTO `point_settings` VALUES (17, 'review_coin', '100', '2022-11-07 10:19:50', '2022-11-07 10:47:19', NULL);

-- ----------------------------
-- Table structure for read_history
-- ----------------------------
DROP TABLE IF EXISTS `read_history`;
CREATE TABLE `read_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `minutes_milestone` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of read_history
-- ----------------------------
INSERT INTO `read_history` VALUES (1, 1, 2, 1, '2022-07-04 08:06:17', '2022-07-04 08:06:17', 0);
INSERT INTO `read_history` VALUES (5, 3, 2, 1, '2022-07-04 08:36:42', '2022-07-04 08:36:42', 0);
INSERT INTO `read_history` VALUES (6, 4, 5, 1, '2022-07-04 13:28:49', '2022-07-04 13:28:49', 0);
INSERT INTO `read_history` VALUES (7, 1, 5, 1, '2022-07-08 04:43:21', '2022-07-08 04:43:21', 0);
INSERT INTO `read_history` VALUES (8, 3, 2, 1, '2022-07-21 12:55:38', '2022-07-21 12:55:38', 0);
INSERT INTO `read_history` VALUES (9, 3, 2, 1, '2022-07-21 12:57:01', '2022-07-21 12:57:01', 0);
INSERT INTO `read_history` VALUES (10, 1, 2, 1, '2022-07-21 12:59:10', '2022-07-21 12:59:10', 0);
INSERT INTO `read_history` VALUES (11, 1, 2, 0, '2022-07-29 02:44:44', '2022-07-29 02:44:44', 0);
INSERT INTO `read_history` VALUES (12, 3, 5, 0, '2022-07-29 04:23:19', '2022-07-29 04:23:19', 0);
INSERT INTO `read_history` VALUES (13, 3, 2, 0, '2022-09-27 07:13:08', '2022-09-27 07:13:08', 0);
INSERT INTO `read_history` VALUES (14, 1, 2, 0, '2022-09-27 08:59:53', '2022-09-27 08:59:53', 0);
INSERT INTO `read_history` VALUES (15, 1, 2, 3, '2022-11-08 02:46:52', '2022-11-08 02:46:52', 0);
INSERT INTO `read_history` VALUES (23, 3, 12, 3, '2022-11-08 06:35:14', '2022-11-08 06:35:17', 60);
INSERT INTO `read_history` VALUES (24, 3, 15, 3, '2022-11-11 10:59:34', '2022-11-11 11:09:35', 15);
INSERT INTO `read_history` VALUES (25, 3, 11, 3, '2022-11-11 11:13:17', '2022-11-11 11:13:17', 5);
INSERT INTO `read_history` VALUES (30, 1, 2, 3, '2022-11-25 09:59:19', '2022-11-25 10:01:03', 15);

-- ----------------------------
-- Table structure for review
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `book_id` int(11) NULL DEFAULT NULL,
  `review` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `star` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of review
-- ----------------------------
INSERT INTO `review` VALUES (2, 2, 1, 'Write Comment Test', '4', '2022-07-04 06:40:14', '2022-07-04 09:40:46', NULL);
INSERT INTO `review` VALUES (3, 2, 3, 'Test lagi lagi', '3', '2022-07-04 06:40:28', '2022-07-04 06:40:28', NULL);
INSERT INTO `review` VALUES (4, 5, 1, 'wow!', '5', '2022-07-04 12:51:18', '2022-07-04 12:51:18', NULL);
INSERT INTO `review` VALUES (5, 5, 4, 'wow', '5', '2022-07-04 13:27:02', '2022-07-04 13:27:02', NULL);
INSERT INTO `review` VALUES (6, 5, 3, 'Good', '5', '2022-07-06 02:50:31', '2022-07-06 02:50:31', NULL);
INSERT INTO `review` VALUES (7, 2, 5, 'Test Review Lagi', '4', '2022-07-27 06:27:48', '2022-07-27 06:27:48', NULL);
INSERT INTO `review` VALUES (8, 12, 3, 'Test', '5', '2022-11-08 06:46:43', '2022-11-08 06:46:43', NULL);
INSERT INTO `review` VALUES (9, 15, 3, 'wow, so good', '5', '2022-11-11 11:25:20', '2022-11-11 11:25:20', NULL);

-- ----------------------------
-- Table structure for reward_redeems
-- ----------------------------
DROP TABLE IF EXISTS `reward_redeems`;
CREATE TABLE `reward_redeems`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `redeem_coin` int(11) NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reward_redeems
-- ----------------------------
INSERT INTO `reward_redeems` VALUES (1, 2, 2, 0, 2, '2022-07-08 02:54:45', '2022-07-08 03:34:38', NULL);
INSERT INTO `reward_redeems` VALUES (2, 1, 2, 0, 0, '2022-08-02 08:25:17', '2022-08-02 08:25:17', NULL);
INSERT INTO `reward_redeems` VALUES (3, 2, 5, 0, 0, '2022-09-28 03:51:33', '2022-09-28 03:51:33', NULL);
INSERT INTO `reward_redeems` VALUES (5, 1, 2, 1500, 0, '2022-09-28 04:03:15', '2022-09-28 04:03:15', NULL);
INSERT INTO `reward_redeems` VALUES (6, 5, 11, 1000, 0, '2022-11-11 10:52:59', '2022-11-11 10:52:59', NULL);
INSERT INTO `reward_redeems` VALUES (7, 4, 15, 1000, 0, '2022-11-11 11:31:54', '2022-11-11 11:31:54', NULL);

-- ----------------------------
-- Table structure for rewards
-- ----------------------------
DROP TABLE IF EXISTS `rewards`;
CREATE TABLE `rewards`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reward` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coin_reward` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rewards
-- ----------------------------
INSERT INTO `rewards` VALUES (1, 'Reward 1', 'rewards_202207071319Jam Tangan.jpg', 1500, '2022-07-07 13:19:27', '2022-08-02 06:09:59', NULL);
INSERT INTO `rewards` VALUES (2, 'Reward 2', 'rewards_202207072358tas.jpg', 1000, '2022-07-07 23:58:01', '2022-09-28 04:09:18', NULL);
INSERT INTO `rewards` VALUES (3, 'Reward 3', 'rewards_202208020622Jam Tangan.jpg', 500, '2022-08-02 06:22:34', '2022-09-28 03:03:15', NULL);
INSERT INTO `rewards` VALUES (4, 'Reward 4', 'rewards_202208020622user-default.jpg', 1000, '2022-08-02 06:22:48', '2022-08-02 06:22:48', NULL);
INSERT INTO `rewards` VALUES (5, 'Reward 5', 'rewards_202208020622user-default.jpg', 1000, '2022-08-02 06:22:59', '2022-08-02 06:22:59', NULL);
INSERT INTO `rewards` VALUES (6, 'Reward 6', 'rewards_202208020623user-default.jpg', 1000, '2022-08-02 06:23:11', '2022-08-02 06:23:11', NULL);
INSERT INTO `rewards` VALUES (7, 'Reward 7', 'rewards_202208020623user-default.jpg', 1000, '2022-08-02 06:23:12', '2022-08-02 06:23:11', NULL);
INSERT INTO `rewards` VALUES (8, 'Reward 8', 'rewards_202208020623user-default.jpg', 1000, '2022-08-02 06:23:13', '2022-08-02 06:23:11', NULL);
INSERT INTO `rewards` VALUES (9, 'Reward 9', 'rewards_202208020623user-default.jpg', 1000, '2022-08-02 06:23:14', '2022-08-02 06:23:11', NULL);
INSERT INTO `rewards` VALUES (10, 'Reward 10', 'rewards_202208020623user-default.jpg', 1000, '2022-08-02 06:23:15', '2022-08-02 06:23:11', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0,
  `keys` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@gmail.com', 'admin', 'admin', '$2a$12$q63ztyCa6x91GMzlZG4TY.eUW6saOXoTyAQNbj4xsFyvcOyz.H6.S', 0, 0, 0, '2022-06-30 17:05:48', '2022-06-30 17:05:53', NULL);
INSERT INTO `users` VALUES (2, 'Bambang', 'bambangkun@gmail.com', 'user', 'bambangkun', '$2y$10$xCERX706jbyugipTve3nzuLpgLwZxbuQOAtGCdw2D2JQQl8JB.MHK', 779, 36900, 9, '2022-06-30 13:04:13', '2022-11-25 10:01:03', NULL);
INSERT INTO `users` VALUES (5, 'Nona', 'nona@gmail.com', 'user', 'nona', '$2y$10$Ms5QHlLUUYqZieKjJF3BQ.hF8.Out1d566fNUg1kre5qVfyw5HfcW', 234, 290, 1, '2022-07-01 07:45:03', '2022-09-28 03:51:33', NULL);
INSERT INTO `users` VALUES (6, 'NicodemusTheodore', 'ndemus266@gmail.com', 'user', 'testtestOwO', '$2y$10$YY2oYw3QxnB2ngT.A1ra9u/ds2gop8mwpa5lWPygyD2G.3ErqcTL2', 0, 0, 0, '2022-07-04 11:14:01', '2022-07-04 14:47:09', '2022-07-04 14:47:09');
INSERT INTO `users` VALUES (7, 'ani', 'ani@gmail.com', 'user', 'ani', '$2y$10$wbeDVkcNj.rMjqtK7pmeGu.mp6G2VQ/ipl/JpfOYpeQzBWUDa59ua', 0, 0, 0, '2022-07-06 01:51:43', '2022-07-08 03:53:59', '2022-07-08 03:53:59');
INSERT INTO `users` VALUES (10, 'ani2', 'ani2@gmail.com', 'user', 'ani2', '$2y$10$u6qJeQvGfTXf9eTndtzatOBRg755EGqe1NFn0Ky2CRBghK7fJpnQ6', 5, 80, 0, '2022-07-09 04:06:01', '2022-11-07 07:15:50', NULL);
INSERT INTO `users` VALUES (11, 'hafizh', 'hafizh4game@gmail.com', 'user', 'Knightmare360', '$2y$10$oljnsRcGvuS6lnqCbBomy.Z2WQH7ZPZrfuzpbCTKY5PeNiVcyp5ru', 25, 1000, 0, '2022-08-16 10:40:11', '2022-11-11 11:13:17', NULL);
INSERT INTO `users` VALUES (12, 'kamal', 'kamal@gmail.com', 'user', 'kamal', '$2y$10$R6kCxLj1MbbWzS9YtLRBnewHPzXiX4hUDd9FGW1B0fIxwkeiEk/VK', 580, 190, 0, '2022-11-08 02:49:50', '2022-11-08 06:46:43', NULL);
INSERT INTO `users` VALUES (15, 'nicodemus', 'nicodemus@gmail.com', 'user', 'nicodemus', '$2y$10$EvSF6dc4cA7jh3PWm8AZUuYr6pZRthnauv/hwNT8e939AecxSaRQa', 175, 1000, 0, '2022-11-11 10:40:17', '2022-11-11 11:31:54', NULL);

SET FOREIGN_KEY_CHECKS = 1;
