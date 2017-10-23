-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 11:57 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chaoshan_cuisine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `created_at`) VALUES
(2, 'admin', '123456', '2017-08-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `publish_id` int(10) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `descript` text NOT NULL,
  `difficult` varchar(40) NOT NULL,
  `taste` varchar(40) NOT NULL,
  `gyi` varchar(40) NOT NULL,
  `used_time` varchar(40) NOT NULL,
  `area` varchar(40) NOT NULL,
  `main_ingredient` varchar(255) NOT NULL,
  `other_ingredient` varchar(255) NOT NULL,
  `trick` text NOT NULL,
  `created_at` datetime NOT NULL,
  `view_count` int(255) NOT NULL DEFAULT '0',
  `exam` int(255) NOT NULL DEFAULT '0',
  `check_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `food_publish_id` (`publish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `publish_id`, `food_name`, `descript`, `difficult`, `taste`, `gyi`, `used_time`, `area`, `main_ingredient`, `other_ingredient`, `trick`, `created_at`, `view_count`, `exam`, `check_text`) VALUES
(12, 43, '潮汕虾粥', '潮汕砂锅粥是广东省潮汕地区汉族传统名点，鲜美异常，还有股淡淡的清香。是专用砂锅煮出来的咸香粥。粥是主料，配料一般有河海鲜、禽类、蛇、蛙、龟等。此粥是2000年后新兴起的一个产业，最早出现于深圳地区，目前遍及整个珠江三角洲地区。据不完全统计，目前已有几千家专门煮潮汕砂锅粥的店铺。', '简单', '清淡', '煮', '二十分钟', '汕头', '东北大米、鲜虾', '油、香油、盐、葱、香菜、大蒜、虾米、菜埔', '使用的厨具：电饭煲', '2017-08-03 01:29:12', 0, 1, NULL),
(13, 43, '潮汕酥饺', '这次包的有点多，八斤的饺子皮，请了好几个帮手，包了好几个小时才包好。馅是花生芝麻馅的，不怕上火的话，吃起来超香。', '普通', '甜味', '炒', '数小时', '潮州', '饺子皮、熟米粉、黑芝麻', '花生碎、白糖、水', '使用的厨具：炒锅', '2017-08-03 01:40:24', 0, 1, NULL),
(14, 43, '又到一年清明时——潮汕红粿', '只要是需要拜祭的节日，家里就会做红粿，里面包的料，可以是米饭，也可以是芋头。因为拜完都是自己要吃的，所以料还是会下得很足。', '普通', '原味', '蒸', '半个小时', '汕尾', '花生米、芹菜、面皮', '蒜苗、虾米、香菇、丝苗米', '使用的厨具：高压锅、炒锅', '2017-08-03 01:51:36', 0, 1, NULL),
(15, 44, '潮汕的名小菜---麻叶', '麻叶是潮汕一种特有的红麻的叶子，在以前是不吃的，因为潮汕人要等红麻长老了，拿红麻的皮来编绳子，现在已经没有人编绳子了，这种麻叶就上了人们的餐桌。麻叶是在红麻还很小的时候就把它顶尖上的叶子摘下来吃，所以这种红麻永远也长不大，也做不成绳子了，但是上了餐桌的麻叶却是难得的美味，麻叶要过水一遍后去除涩味，我记得小时候吧，大人们都是用自家腌的咸菜水来先煮一下，现在没有咸菜水，就是用清水加盐。再拿来清炒，有点咸，送粥却是再合适不过的，吃起来有点象番薯叶，咀嚼后有点滑口，非常保健。而且，以前吧，只有红麻，现在呢，就有了白麻啊，青麻的。三种。我最喜欢的是红麻了，又香又甜。只可惜，在广州能买到这种白麻就不错了。还很贵哦。一斤12元。看起来很多，做起来剩下很少的。缩水了。哈。', '简单', '原味', '炒', '二十分钟', '普宁', '麻叶', '盐、油', '自己做的麻叶，就是比去外面吃的不一样，好吃多了。\r\n使用的厨具：平底锅', '2017-08-03 02:05:33', 0, 1, NULL),
(16, 44, '潮汕虾枣', '【潮汕虾枣】，以虾为主料做成的虾枣，颜色金黄，滋味鲜美，入口酥松，时不时还能嚼到一粒粒的虾仁非常弹牙。当年第一次去婆家过年，一吃就爱上了。只是这道菜做起来相对繁琐，平时一般都不做，也只有过年的时候能解解馋，而我们也不是年年都在婆家过年，所以这5年来我也就吃过2、3次。领导说在他的记忆里，这道虾枣也就是过年或者一些重大节日，还有老人过寿家里才做。真是一道传统菜，必须学会。\r\n\r\n虽说现在做潮菜的地方，大到酒楼，小到路边摊，几乎都有道【潮汕虾枣】，做法虽然大同小异。可到目前为止，我都没有在这些店吃到过味道、口感能比上我婆家做的。而且这虾枣，一个个圆圆的，过年吃很合适啊，有着“团团圆圆”的寓意。一家人聚在一起，自己动手做，阖家团圆、其乐融融。', '普通', '咸鲜', '炒', '半个小时', '陆丰', '猪白肉、海虾、马蹄', '葱、盐、味精、面粉、食用油', '1.  1000g虾去头去壳后，虾仁净重500g左右；\r\n\r\n2.  虾切粒要切得粗些，吃起来比较弹牙；\r\n\r\n3.  250g马蹄是去皮后的重量，如买完整马蹄需要考虑外皮重量；\r\n\r\n4.  做的量大的话，虾仁、猪白肉、去皮马蹄的比例控制在1：0.5：0.3就好；\r\n\r\n5.  食材拌匀就好，不需要搅上劲；\r\n\r\n6.  放的面粉为普通面粉，起到黏住食材的作用，不需要放太多，太多会影响虾枣的酥松口感；\r\n\r\n7.  一次性做很多的时候，炸个8成熟就好，每次吃前再用油煎熟再吃；\r\n\r\n8.  炸虾枣的油量要能全部没过虾枣，用小奶锅炸比较方便；\r\n\r\n9.  炸完后余下的油，过沥后存放起来，3天内炒菜用也不浪费。\r\n使用的厨具：炒锅', '2017-08-03 02:15:53', 0, 1, NULL),
(17, 44, '潮汕鱼饭--熟鱼', '具有潮汕特色的一道菜，食材简单', '普通', '咸鲜', '煮', '二十分钟', '汕头', '新鲜“巴浪”鱼', '海盐', '使用的厨具：煮锅', '2017-08-03 02:23:16', 0, -1, '该菜谱已经存在本网站'),
(18, 42, '潮汕鱼饭--熟鱼', '很有潮汕地区的菜，小时候经常早上去市场买新鲜的鱼饭。', '普通', '咸鲜', '煮', '二十分钟', '陆丰', '新鲜“巴浪”鱼', '海盐', '使用的厨具：煮锅', '2017-08-03 09:41:27', 0, 1, NULL),
(20, 45, '潮汕冬至过年美食之---【菜头圆】', '潮汕地区喜欢拜神，也喜欢做各式粿品敬神，不同的节日做的粿也不同。比如：公妈做忌，年底谢神一般是红壳桃，元宵吊灯是油粿，游神赛会一般有发粿，甜粿，油粿，壳桃。五谷母是谷穗粿。七夕拜床婆是石榴粿，双甲楼，酒曲粿。中秋节浮酥饺，冬节过年做菜头圆(萝卜糕)，共同糕（土豆糕）。其中我最喜欢吃的就是菜头圆和共同糕。\r\n菜头就是白萝卜，年底时节，白萝卜大量上市，一斤只要几毛钱，这时做菜头圆的成本就大量降低。菜头圆有米粉和薯粉二种，做法一样。我较喜欢吃薯粉的，吃起来滑嫩嫩的，有点菜头的甜味，口感很好。这个就是过年做的了，只是一直没时间去上传，今天看到图片才想起来。', '普通', '原味', '蒸', '数小时', '潮州', '白萝卜、番薯粉', '花生、盐', '使用的厨具：蒸锅', '2017-08-04 01:46:40', 0, 1, NULL),
(21, 45, '潮汕血蚶', '白灼血蚶，潮汕人的年夜饭必备的菜品，蚶壳叮当作响，代表钱币入袋的声音。<br/>\r\n这道菜，看似简单，却考验功力。灼过了，掰开壳，那就没有血出现，黑乎乎一片，完全没有了鲜美的滋味，如果灼欠火候，那么壳就掰不开。<br/>\r\n此菜品，必定要搭配潮汕三渗醋来蘸，今天仔细研究了下三渗醋的内容，有白芝麻，有南姜末，味道有点甜，有点酸，有点辣，有点香，哈哈，想知道是什么滋味，欢迎来潮汕品尝。<br/>', '简单', '原味', '其他', '十分钟', '汕头', '血蚶', '开水、三渗醋', '对于如何把握白灼血蚶的力度，我试过很多方法，都不太靠谱，唯有这方子，既能让蚶轻松掰开，又能看到“血”的效果，品尝到鲜美的味道。记得哟，第一遍淋刚烧开的水的时候，是放在一个有深度的盆子里哦，也就是说，那蚶是有浸泡到几秒的，只要均匀淋到所有蚶，就好了，中间无需任何停留，水就可以直接倒掉；第二步倒到蔬菜蓝里的时候，水是直接流掉的，这其实是补灼一下。', '2017-08-04 01:58:18', 0, 1, NULL),
(22, 48, '沙茶牛肉炒饭', '“沙茶”原是印度尼西亚的一种风味食品，印尼文为“沙爹”，所用的调料味道辛辣，传入潮汕地区后，只取其辛辣的特点而调成一种调味品，称为沙茶酱。沙茶酱用花生仁、白芝麻、左口鱼、虾米、椰丝、大蒜、生葱、芥末、香菜子、辣椒等原料磨碎加油、盐熬煮而成。沙茶酱色泽金黄，辛辣香浓，是潮州菜常用的调味品之一. 沙茶牛肉是广东潮州小吃，属粤菜潮州菜系；由此又衍生出沙茶牛肉炒河粉，沙茶牛肉面，沙茶牛肉炒饭等等......', '普通', '咸鲜', '炒', '二十分钟', '汕头', ' 肉眼排，沙茶酱，大葱，鸡蛋2枚', '姜，生抽，麻油，冷饭', '谢谢欣赏！希望大家喜欢哦！！', '2017-09-24 23:05:31', 0, 1, ''),
(23, 48, '粉丝蒸扇贝', '     扇贝是我们潮汕地区常见的一种贝类海鲜，味道鲜美且价格实惠。如我今晚拿来做菜的这些扇贝，约4-5公分大小，一斤才9块钱。好几斤扇贝才抵得上一斤牛肉的价格。<br />\r\n     在我们潮汕地区，关于扇贝有许多的做法。但我们这里，最常见的就是用扇贝，加上粉丝和蒜蓉等配料一起蒸，严格控制好火候，以确保扇贝的鲜美。<br />\r\n   ', '简单', '清淡', '蒸', '十分钟', '汕头', '扇贝、粉丝', '芹菜、蒜头、生抽、辣椒、芝麻香油', '蒸的时间一定要控制好，扇贝蒸的时间若过了，口感就变老了。', '2017-09-24 23:23:05', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `food_img`
--

CREATE TABLE IF NOT EXISTS `food_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_img` varchar(255) NOT NULL,
  `food_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `food_img`
--

INSERT INTO `food_img` (`id`, `food_img`, `food_id`) VALUES
(14, '../uploads/cookbook/201708030129126651.jpg', 12),
(15, '../uploads/cookbook/201708030140243440.jpg', 13),
(16, '../uploads/cookbook/201708030151366340.jpg', 14),
(17, '../uploads/cookbook/201708030205333890.jpg', 15),
(18, '../uploads/cookbook/201708030215538150.jpg', 16),
(19, '../uploads/cookbook/201708030223163480.jpg', 17),
(20, '../uploads/cookbook/201708032141279530.jpg', 18),
(22, '../uploads/cookbook/201708040146404140.jpg', 20),
(23, '../uploads/cookbook/201708040158185340.jpg', 21),
(24, '../uploads/cookbook/201709242305315373.jpg', 22),
(25, '../uploads/cookbook/2017092423053197610.jpg', 22),
(26, '../uploads/cookbook/2017092423053161011.jpg', 22),
(27, '../uploads/cookbook/201709242323054173.jpg', 23),
(28, '../uploads/cookbook/201709242323059014.jpg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `food_step`
--

CREATE TABLE IF NOT EXISTS `food_step` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_id` int(10) NOT NULL,
  `step_img` varchar(255) NOT NULL,
  `step_explain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `step_food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `food_step`
--

INSERT INTO `food_step` (`id`, `food_id`, `step_img`, `step_explain`) VALUES
(20, 12, '../uploads/cookbook/2017080301291236611.jpg', '准备材料：东北大米（珍珠米）/鲜虾（小指大小即可）/姜/葱、香菜/大蒜/虾米/菜埔。大米淘洗净后浸半小时；虾米用温水泡发。'),
(21, 12, '../uploads/cookbook/201708030129128962.jpg', '去虾须，虾枪，再对剪成两半，尾不剪断。虾头里面的虾脑也不要了，这样煮出来的粥才不会浊。'),
(22, 12, '../uploads/cookbook/201708030129123603.jpg', '砂锅一次性加够水煮开后才把米加进锅里，煮开沸腾时用勺子搅拌'),
(23, 12, '../uploads/cookbook/201708030129129384.jpg', '保持沸腾状态煮十分钟左右，这时米粒已经有爆开的迹象'),
(24, 12, '../uploads/cookbook/201708030129122485.jpg', '加菜埔略煮，让粥有底味。'),
(25, 12, '../uploads/cookbook/201708030129122156.jpg', '加入虾米'),
(26, 12, '../uploads/cookbook/201708030129126037.jpg', '再加入姜丝，虾，继续煮四五分钟即可，出锅前加盐、胡椒粉调味。'),
(27, 12, '../uploads/cookbook/201708030129123931.jpg', '完成'),
(28, 13, '../uploads/cookbook/201708030140243211.jpg', '取一个大的圆盘，倒入磨好的熟花生碎'),
(29, 13, '../uploads/cookbook/201708030140246742.jpg', '倒入熟米粉。'),
(30, 13, '../uploads/cookbook/201708030140248263.jpg', '再倒入白糖。'),
(31, 13, '../uploads/cookbook/201708030140248864.jpg', '加入黑芝麻。'),
(32, 13, '../uploads/cookbook/201708030140248845.jpg', '用手和匀。'),
(33, 13, '../uploads/cookbook/201708030140248566.jpg', '买现成的饺皮。'),
(34, 13, '../uploads/cookbook/201708030140245257.jpg', '取一张饺皮，用勺子舀上适量的馅。'),
(35, 13, '../uploads/cookbook/201708030140244908.jpg', '用手指或棉签在饺皮外圈沾点水。'),
(36, 13, '../uploads/cookbook/201708030140242659.jpg', '对折包好。'),
(37, 13, '../uploads/cookbook/2017080301402469110.jpg', '在最外面一圈再沾上少许水。'),
(38, 13, '../uploads/cookbook/2017080301402470911.jpg', '从一个角开始，折成波浪形的花边压紧。'),
(39, 13, '../uploads/cookbook/2017080301402483912.jpg', '一个酥饺的坯子就成形了。'),
(40, 13, '../uploads/cookbook/2017080301402494913.jpg', '一个一个包好后平摊，有两个这么多就可以炸了。'),
(41, 13, '../uploads/cookbook/2017080301402423914.jpg', '锅里倒入适量的油烧热。'),
(42, 13, '../uploads/cookbook/2017080301402453015.jpg', '六成热的时候下饺子。'),
(43, 13, '../uploads/cookbook/2017080301402469716.jpg', '饺子一下锅皮就鼓起来了，一面饺子皮鼓起来后马上翻面。'),
(44, 13, '../uploads/cookbook/2017080301402442717.jpg', '炸至两面金黄。'),
(45, 13, '../uploads/cookbook/2017080301402413218.jpg', '出锅滤油即可。'),
(46, 14, '../uploads/cookbook/201708030151369521.jpg', '自己家里晒的虾干，去壳。'),
(47, 14, '../uploads/cookbook/201708030151364332.jpg', '芹菜蒜苗摘去叶子洗净。'),
(48, 14, '../uploads/cookbook/201708030151367893.jpg', '丝苗米，煮出来比较松，一颗一颗的。'),
(49, 14, '../uploads/cookbook/201708030151367974.jpg', '半斤花生米，洗净。'),
(50, 14, '../uploads/cookbook/201708030151363255.jpg', '所有材料加水入高压锅煮熟。'),
(51, 14, '../uploads/cookbook/201708030151367336.jpg', '泄气后趁热撒适量的盐（这一步全靠经验）。'),
(52, 14, '../uploads/cookbook/201708030151361837.jpg', '芹菜蒜苗切碎。'),
(53, 14, '../uploads/cookbook/201708030151366588.jpg', '干香菇泡发。'),
(54, 14, '../uploads/cookbook/201708030151367039.jpg', '好的香菇切成丝。'),
(55, 14, '../uploads/cookbook/2017080301513628110.jpg', '炒锅下多点的油，下香菇丝。'),
(56, 14, '../uploads/cookbook/2017080301513682211.jpg', '炸至微黄。'),
(57, 14, '../uploads/cookbook/2017080301513614312.jpg', '煮好的米饭用一个大的容量倒出来。'),
(58, 14, '../uploads/cookbook/2017080301513648013.jpg', '加入切好的芹菜末，连油带香菇一起倒在米饭上。'),
(59, 14, '../uploads/cookbook/2017080301513674614.jpg', '用手拌匀。'),
(60, 14, '../uploads/cookbook/2017080301513685415.jpg', '买现成的面皮（一般都是河粉做的），取适量一块。'),
(61, 14, '../uploads/cookbook/2017080301513672116.jpg', '捏成碗状。'),
(62, 14, '../uploads/cookbook/2017080301513669717.jpg', '加入适量的米饭。'),
(63, 14, '../uploads/cookbook/2017080301513650318.jpg', '包成三角型。'),
(64, 14, '../uploads/cookbook/2017080301513680119.jpg', '放入洗好的模子压一下。'),
(65, 15, '../uploads/cookbook/201708030205336311.jpg', '准备新鲜的麻叶，把长长的茎去掉，剩下叶子。'),
(66, 15, '../uploads/cookbook/201708030205332692.jpg', '用清水至少洗2遍。'),
(67, 15, '../uploads/cookbook/201708030205332603.jpg', '锅内煮水，半碗够了，加入2汤匙盐。'),
(68, 15, '../uploads/cookbook/201708030205334094.jpg', '锅内煮水，半碗够了，加入2汤匙盐。'),
(69, 15, '../uploads/cookbook/201708030205337545.jpg', '用筷子搅拌，麻叶就会缩成皱皱的样子。'),
(70, 15, '../uploads/cookbook/201708030205334656.jpg', '麻叶起皱就把它摊在锅上面。循环这样，直到把麻叶全部皱好。'),
(71, 15, '../uploads/cookbook/201708030205338357.jpg', '每弄两次都得加一次1匙盐，因为盐份会被吸到麻叶里的。'),
(72, 15, '../uploads/cookbook/201708030205336638.jpg', '把压出来的水都倒掉，用小火再去一下水。'),
(73, 15, '../uploads/cookbook/201708030205339489.jpg', '出锅用大盘装，用风扁扁凉或者放凉都可以。'),
(74, 15, '../uploads/cookbook/2017080302053319110.jpg', '吃的时候，锅内放油，我喜欢用猪油，更香。没有猪油，用食用油也可以。'),
(75, 15, '../uploads/cookbook/2017080302053435611.jpg', '拍点蒜片爆香。'),
(76, 15, '../uploads/cookbook/2017080302053482112.jpg', '加入麻叶翻炒。对了，放油不能像炒菜放很少，要放多点油，很吸油的。'),
(77, 15, '../uploads/cookbook/2017080302053472013.jpg', '翻炒两下即可出锅。'),
(78, 16, '../uploads/cookbook/201708030215538631.jpg', '虾去头、去壳、去虾线；'),
(79, 16, '../uploads/cookbook/201708030215539152.jpg', '虾去头、去壳、去虾线；'),
(80, 16, '../uploads/cookbook/201708030215535373.jpg', '将虾切成粒；'),
(81, 16, '../uploads/cookbook/201708030215535974.jpg', '吸干虾粒的水分；'),
(82, 16, '../uploads/cookbook/201708030215539385.jpg', '吸干虾粒的水分；'),
(83, 16, '../uploads/cookbook/201708030215534226.jpg', '猪白肉切成细丁；'),
(84, 16, '../uploads/cookbook/201708030215532507.jpg', '马蹄切成粒、葱切成葱花；'),
(85, 16, '../uploads/cookbook/201708030215535638.jpg', '将虾粒、猪白肉丁、马蹄粒和葱花全部倒入一个容器里；'),
(86, 16, '../uploads/cookbook/201708030215532899.jpg', '调入适量的盐；'),
(87, 16, '../uploads/cookbook/2017080302155341910.jpg', '调入少许味精；'),
(88, 16, '../uploads/cookbook/2017080302155351911.jpg', '将容器里的食材全部搅拌均匀；'),
(89, 16, '../uploads/cookbook/2017080302155347112.jpg', '在搅拌好的食材里加入一把面粉；'),
(90, 16, '../uploads/cookbook/2017080302155393813.jpg', '再次将容器里的食材搅拌均匀；'),
(91, 16, '../uploads/cookbook/2017080302155351014.jpg', '将食材团成丸子状；'),
(92, 16, '../uploads/cookbook/2017080302155323215.jpg', '加热油锅，倒入大量的油；'),
(93, 16, '../uploads/cookbook/2017080302155373816.jpg', '待油温烧热至放入筷子，筷子周边会出现密集气泡时候，分批放入团好的丸子；'),
(94, 16, '../uploads/cookbook/2017080302155397717.jpg', '炸至表面金黄、里面熟，捞出沥油即可。'),
(95, 17, '../uploads/cookbook/201708030223166101.jpg', '如图尾部要有鳞才叫“巴浪”鱼，此类鱼做“鱼饭”比较甜。'),
(96, 17, '../uploads/cookbook/201708030223168512.jpg', '将鱼外面洗净，不用杀，整齐摆放在竹蓝里。'),
(97, 17, '../uploads/cookbook/201708030223164613.jpg', '并用东西把鱼压紧。另锅将水煮开（水要满过鱼），加入海盐，将鱼整蓝放入。'),
(98, 17, '../uploads/cookbook/201708030223169564.jpg', '等水再次沸腾后，转中小火煮十分钟左右关火，整蓝取出。'),
(99, 17, '../uploads/cookbook/201708030223169185.jpg', '放在阴凉通风处自然风干。'),
(100, 17, '../uploads/cookbook/201708030223169176.jpg', '食时取出沾酱油或普宁黄豆酱，不用重新加热，鱼饭的特色就是冷吃。'),
(101, 18, '../uploads/cookbook/201708032141278721.jpg', '如图尾部要有鳞才叫“巴浪”鱼，此类鱼做“鱼饭”比较甜。'),
(102, 18, '../uploads/cookbook/201708032141275872.jpg', '将鱼外面洗净，不用杀，整齐摆放在竹蓝里。'),
(103, 18, '../uploads/cookbook/201708032141273283.jpg', '并用东西把鱼压紧。另锅将水煮开（水要满过鱼），加入海盐，将鱼整蓝放入。'),
(104, 18, '../uploads/cookbook/201708032141277754.jpg', '等水再次沸腾后，转中小火煮十分钟左右关火，整蓝取出。'),
(105, 18, '../uploads/cookbook/201708032141277285.jpg', '放在阴凉通风处自然风干。'),
(106, 18, '../uploads/cookbook/201708032141275226.jpg', '食时取出沾酱油或普宁黄豆酱，不用重新加热，鱼饭的特色就是冷吃。'),
(109, 20, '../uploads/cookbook/201708040146403051.jpg', ' 1准备好白萝卜。'),
(110, 20, '../uploads/cookbook/201708040146406312.jpg', '白萝卜去皮洗净。'),
(111, 20, '../uploads/cookbook/201708040146402073.jpg', '用菜头抽抽成小条状。白萝卜慢慢变成一箩筐的白萝卜丝了。其实这是个很大的工程，耐心点弄吧。'),
(112, 20, '../uploads/cookbook/201708040146403804.jpg', '由于白萝卜水分含量很多，底下容易滴水，菜篮下要垫个盆哦！'),
(113, 20, '../uploads/cookbook/201708040146407815.jpg', '花生洗干净后锤一下。'),
(114, 20, '../uploads/cookbook/201708040146402336.jpg', '将白萝卜去汁，放入大盆。加入花生。加入适量盐（按口味加）'),
(115, 20, '../uploads/cookbook/201708040146401917.jpg', '分次倒入蕃薯粉【大约三斤菜头配一斤薯粉 】和适量的自己喜欢的佐料。 用手“撮合”白萝卜、花生、盐巴和薯粉，使完全混合在一起。'),
(116, 20, '../uploads/cookbook/201708040146408168.jpg', '拿来一个大蒸笼和铺上炊布。（由于菜头圆形状不固定，铺上炊布是为了防止菜头圆有些从蒸笼孔中流出，出锅后的菜头圆就会变得很丑了呢。）'),
(117, 20, '../uploads/cookbook/201708040146408059.jpg', '用手抓一些揉捏成球状。'),
(118, 20, '../uploads/cookbook/2017080401464073910.jpg', '做好后隔开地放入蒸笼里。可以看到花生点缀其上，是不是很可爱呢？很快地十几个“菜头球”就做好了。为避免菜头球身材“变形”，应马上架到锅上蒸熟。当然，这么多斤菜头可不止这么几个，因为不像马铃薯糕一样可以一次性解决，所以多做几回吧。'),
(119, 20, '../uploads/cookbook/2017080401464050811.jpg', '入蒸锅盖上密封的盖子。'),
(120, 20, '../uploads/cookbook/2017080401464071712.jpg', '大约半小时就可以出锅了，为了避免不熟，可以拿拜神用的香脚枝等小东西，“戳”一下菜头圆，容易“戳”进去且没有白点就熟透了。'),
(121, 20, '../uploads/cookbook/2017080401464068113.jpg', '热腾腾的“菜头圆”出锅了。出锅后的菜头粿颜色加深'),
(122, 20, '../uploads/cookbook/2017080401464067114.jpg', '最后一步：为新出炉的“菜头圆”化妆咯。一点点米红（“米红”是食物染料）加一点点水搅拌均匀，用小棍在每个菜头粿头上点上大点。（也可以是较大一点在中间，其他四小点周围环绕） 我妈说这样做只是为了祭拜时美观而已，事实上米红虽好看，但是有毒的。吃多了对身体不好。'),
(123, 20, '../uploads/cookbook/2017080401464021915.jpg', '有客人来的时候，就可以切成一块块，煎一下。然后粘一些酱料吃。好香呢。'),
(124, 21, '../uploads/cookbook/201708040158186241.jpg', '买来的新鲜的血蚶，带着很多泥土'),
(125, 21, '../uploads/cookbook/201708040158182502.jpg', '用废弃牙刷刷洗干净'),
(126, 21, '../uploads/cookbook/201708040158181953.jpg', '准备一个镂空的蔬菜蓝，将洗好的蚶放在盆子里（要选择略有深度的盆子）'),
(127, 21, '../uploads/cookbook/201708040158186934.jpg', '刚刚烧开的水'),
(128, 21, '../uploads/cookbook/201708040158182845.jpg', '均匀淋到洗好的蚶内，注意移动水壶，让所有的蚶都能被淋到'),
(129, 21, '../uploads/cookbook/201708040158185446.jpg', '水将蚶略微淹住的时候，把盆里的蚶倒在蔬菜篮里沥干'),
(130, 21, '../uploads/cookbook/201708040158187977.jpg', '再将开水淋到蚶上，水会从缝隙里流掉'),
(131, 21, '../uploads/cookbook/201708040158184998.jpg', '鲜美可口的血蚶蘸着三渗醋，美美地享受吧'),
(132, 22, '../uploads/cookbook/201709242305317394.jpg', '先将1个蛋黄与一大勺沙茶酱跟冷饭一起抓均匀。注：注意手法要轻，是抓，而不是挤压，不然饭容易挤烂'),
(133, 22, '../uploads/cookbook/201709242305315055.jpg', '将牛排切片，加入一勺沙茶酱、1小勺料酒、1小勺生抽，搅拌均匀以后再滴几滴麻油，静置待用。磨少许姜蓉，大葱切斜丝。'),
(134, 22, '../uploads/cookbook/201709242305316496.jpg', '油锅烧热，将腌制过的牛肉炒至5分熟，加入姜蓉、葱丝，稍许翻炒几下马上起锅待用。'),
(135, 22, '../uploads/cookbook/201709242305316608.jpg', '将剩余的鸡蛋利用锅中余下的油滑散，加入腌制过的冷饭。'),
(136, 22, '../uploads/cookbook/201709242305314129.jpg', '炒热以后再加入1勺沙茶酱，炒均匀至香味散发出来后再加入事先炒好的牛肉，稍稍翻几下即可起锅。牛肉热烫软嫩，沙茶辛辣甘香，余味无穷......'),
(137, 23, '../uploads/cookbook/201709242323054105.jpg', '粉丝用清水浸泡至软。'),
(138, 23, '../uploads/cookbook/201709242323052336.jpg', '扇贝撬开成两半。'),
(139, 23, '../uploads/cookbook/201709242323054707.jpg', '用小刀将扇贝的肉取下来，清洗干净'),
(140, 23, '../uploads/cookbook/201709242323056268.jpg', '芹菜洗净，切成芹菜珠。'),
(141, 23, '../uploads/cookbook/201709242323058209.jpg', '蒜头剥皮，切成蒜蓉。'),
(142, 23, '../uploads/cookbook/2017092423230547310.jpg', '辣椒洗净，切成辣椒粒。'),
(143, 23, '../uploads/cookbook/2017092423230580911.jpg', '将芹菜、蒜蓉、辣椒粒放进盘子里，加生抽和香油，搅拌均匀。'),
(144, 23, '../uploads/cookbook/2017092423230534012.jpg', '取一扇贝壳，放上1小撮粉丝。'),
(145, 23, '../uploads/cookbook/2017092423230567613.jpg', '在粉丝上加上扇贝肉。'),
(146, 23, '../uploads/cookbook/2017092423230599414.jpg', '在扇贝上加上“7”中的酱料。'),
(147, 23, '../uploads/cookbook/2017092423230556515.jpg', '将所有的扇贝摆放入盘中。'),
(148, 23, '../uploads/cookbook/2017092423230536716.jpg', '将其放进锅中，隔水蒸，用大火蒸6-8分钟即可。');

-- --------------------------------------------------------

--
-- Table structure for table `food_user_like_collect`
--

CREATE TABLE IF NOT EXISTS `food_user_like_collect` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `attitude` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_user_id` (`user_id`),
  KEY `like_food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `food_user_like_collect`
--

INSERT INTO `food_user_like_collect` (`id`, `user_id`, `food_id`, `created_at`, `attitude`) VALUES
(53, 48, 23, '2017-09-25 22:34:42', 1),
(54, 48, 23, '2017-09-25 22:34:43', 2),
(55, 48, 22, '2017-09-25 22:34:53', 1),
(57, 48, 13, '2017-09-25 22:35:14', 1),
(58, 48, 13, '2017-09-25 22:35:17', 2),
(60, 48, 12, '2017-09-25 22:36:11', 1),
(62, 48, 14, '2017-09-25 22:45:57', 2),
(63, 48, 22, '2017-09-25 22:46:32', 2),
(64, 48, 18, '2017-09-25 23:35:45', 1),
(65, 48, 18, '2017-09-25 23:35:46', 2),
(66, 48, 21, '2017-10-03 01:14:19', 1),
(67, 48, 21, '2017-10-03 01:14:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password_digest` char(40) NOT NULL,
  `head_img` varchar(255) NOT NULL DEFAULT '../assets/img/default.jpg',
  `sex` char(4) NOT NULL DEFAULT '男',
  `hometown_city` varchar(40) NOT NULL DEFAULT '汕头',
  `hometown_province` varchar(40) NOT NULL DEFAULT '潮汕',
  `email` varchar(255) NOT NULL,
  `personal_write` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `name`, `password_digest`, `head_img`, `sex`, `hometown_city`, `hometown_province`, `email`, `personal_write`, `created_at`, `updated_at`) VALUES
(42, 'zheng', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/201709131837187011.jpg', '男', '汕头', '潮汕', '960404717@qq.com', '心如止水', '2017-08-03 00:49:03', '2017-09-13 06:38:41'),
(43, 'Mr.Ms', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../assets/img/default.jpg', '男', '汕头', '潮汕', '9604024717@qq.com', NULL, '2017-08-03 01:14:50', '2017-08-03 01:14:50'),
(44, '春暖hua开', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/20170803015807549u=3672077392,2254272027&fm=21&gp=0.jpg', '女', '揭阳', '潮汕', '9604047217@qq.com', '面朝大海，春暖花开', '2017-08-03 01:57:22', '2017-08-03 01:58:07'),
(45, '大厨', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/20170804011512691t01501cdcd2c94725c0.jpg', '女', '潮州', '潮汕', '96040417@qq.com', '', '2017-08-04 01:11:23', '2017-08-04 01:15:12'),
(46, '飞翔的鹰', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/20170804062222254IMG_2529.JPG', '男', '汕尾', '潮汕', '9604047178@qq.com', '为他人带来阳光的人，自己也一定会沐浴在阳光下。', '2017-08-04 06:15:29', '2017-08-04 06:31:19'),
(47, 'chang', '75a6c373effe7da91620bb9379bd7ec204ba3e9b', '../assets/img/default.jpg', '男', '汕头', '潮汕', '1365193057@qq.com', '', '2017-08-05 18:54:50', '2017-08-13 00:31:22'),
(48, 'ryan', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/201708251131404211.jpg', '男', '汕头', '潮汕', '960155151@qq.com', '', '2017-08-25 11:31:11', '2017-08-25 11:31:40'),
(49, 'tommy', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../uploads/head_img/201709141233244405.jpg', '女', '汕头', '潮汕', 'easy@qq.com', '', '2017-09-14 12:32:56', '2017-09-14 12:33:24'),
(50, 'kevin', 'c1f2c421e65a3ece65f9a767d8299827d4ee72af', '../assets/img/default.jpg', '男', '汕头', '潮汕', '96042021@qq.com', NULL, '2017-09-16 14:53:54', '2017-09-16 14:53:54'),
(51, 'mr.007', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '../assets/img/default.jpg', '男', '汕头', '潮汕', '1246321147@qq.com', NULL, '2017-09-17 10:23:25', '2017-09-17 10:23:25'),
(52, 'poter', '7c4a8d09ca3762af61e59520943dc26494f8941b', '../uploads/head_img/201709241358013841.jpg', '女', '汕头', '潮汕', '9604044717@qq.com', '', '2017-09-24 13:55:51', '2017-09-24 01:58:09'),
(53, '火星人', '7c4a8d09ca3762af61e59520943dc26494f8941b', '../uploads/head_img/201709241401266812.jpg', '男', '汕头', '潮汕', '9602302@qq.com', '', '2017-09-24 14:01:05', '2017-09-24 02:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) NOT NULL,
  `followed_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `relationships_follower_id` (`follower_id`),
  KEY `relationships_followed_id` (`followed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `follower_id`, `followed_id`, `created_at`) VALUES
(21, 45, 42, '2017-08-04 01:15:30'),
(26, 45, 44, '2017-08-04 01:16:16'),
(34, 45, 43, '2017-08-04 06:01:48'),
(36, 46, 45, '2017-08-04 06:21:11'),
(48, 51, 45, '2017-09-17 10:26:23'),
(61, 42, 44, '2017-09-17 13:23:25'),
(74, 42, 46, '2017-09-17 13:33:02'),
(78, 42, 45, '2017-09-17 13:34:18'),
(79, 42, 51, '2017-09-17 14:40:26'),
(85, 42, 43, '2017-09-23 11:38:45'),
(86, 52, 42, '2017-09-24 13:58:27'),
(87, 52, 45, '2017-09-24 13:59:11'),
(88, 53, 43, '2017-09-24 14:01:40'),
(89, 53, 42, '2017-09-24 14:02:18'),
(90, 53, 46, '2017-09-24 14:02:29'),
(91, 42, 48, '2017-09-25 17:11:45'),
(94, 48, 42, '2017-10-03 01:14:42'),
(95, 48, 44, '2017-10-03 01:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_img`
--

CREATE TABLE IF NOT EXISTS `restaurant_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_img_id` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `introduction` varchar(1025) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `publisher_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_publisher_id` (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `content`, `publisher_id`, `created_at`, `video`) VALUES
(10, '珠江夜游', 44, '2017-08-03 03:09:18', '../uploads/topic_video/20170803030918903_IMG_1971.mp4'),
(11, '广州', 44, '2017-08-03 03:17:55', '../uploads/topic_video/20170803031755790_IMG_1974.mp4'),
(12, '自己煮的绿豆汤', 42, '2017-08-03 18:29:18', '../uploads/topic_video/20170803182918858_trim.0CD292DF-4564-44BE-9869-946E9A6734D2.MOV'),
(19, '夜宵', 45, '2017-08-04 01:20:46', NULL),
(20, '一种爱好[机智][机智]', 45, '2017-08-04 01:29:28', NULL),
(21, '早晨的火烧云', 45, '2017-08-04 05:59:04', NULL),
(22, '早安，美好一天的开始', 46, '2017-08-04 06:18:18', NULL),
(24, '自制水晶月饼', 48, '2017-10-07 15:09:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_commnet`
--

CREATE TABLE IF NOT EXISTS `topic_commnet` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `topic_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_user_id` (`user_id`),
  KEY `comment_topic_id` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `topic_commnet`
--

INSERT INTO `topic_commnet` (`id`, `comments`, `user_id`, `topic_id`, `created_at`) VALUES
(50, ' 42', 42, 22, '2017-08-13 01:14:48'),
(51, ' 14141', 42, 22, '2017-08-13 01:15:04'),
(52, ' 早安\r\n', 42, 21, '2017-08-13 01:17:39'),
(58, ' 44', 42, 20, '2017-08-13 01:18:45'),
(70, ' 24', 42, 22, '2017-08-13 01:32:03'),
(71, '美', 42, 21, '2017-08-13 01:33:07'),
(72, ' good', 43, 20, '2017-08-23 15:08:35'),
(73, ' 哇', 49, 11, '2017-09-14 12:34:09'),
(74, '可以', 42, 22, '2017-09-16 16:04:59'),
(75, ' 3423', 42, 22, '2017-09-16 17:06:13'),
(76, ' good', 52, 22, '2017-09-24 13:56:35'),
(77, ' good', 52, 22, '2017-09-24 13:58:15'),
(78, ' ', 52, 12, '2017-09-24 13:59:37'),
(79, ' 赞', 52, 12, '2017-09-24 13:59:44'),
(80, ' good\r\n', 53, 11, '2017-09-24 14:02:04'),
(81, '赞', 53, 10, '2017-09-24 14:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `topic_img`
--

CREATE TABLE IF NOT EXISTS `topic_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL,
  `topic_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id_img` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `topic_img`
--

INSERT INTO `topic_img` (`id`, `topic_id`, `topic_img`) VALUES
(13, 10, '../uploads/topic/20170803030918757_IMG_1985.JPG'),
(14, 10, '../uploads/topic/20170803030918437_IMG_1993.JPG'),
(15, 10, '../uploads/topic/20170803030918136_IMG_1994.JPG'),
(16, 11, '../uploads/topic/20170803031755711_IMG_2017.JPG'),
(17, 11, '../uploads/topic/20170803031755427_IMG_2018.JPG'),
(18, 11, '../uploads/topic/20170803031755209_IMG_2019.JPG'),
(19, 11, '../uploads/topic/20170803031755583_IMG_2020.JPG'),
(20, 12, '../uploads/topic/20170803182918649_IMG_2587.JPG'),
(21, 12, '../uploads/topic/20170803182918593_IMG_2588.JPG'),
(28, 19, '../uploads/topic/20170804012046996_IMG_2590.JPG'),
(29, 20, '../uploads/topic/20170804012928514_IMG_2591.JPG'),
(30, 20, '../uploads/topic/20170804012928297_IMG_2592.JPG'),
(31, 20, '../uploads/topic/20170804012928697_IMG_2593.JPG'),
(32, 20, '../uploads/topic/20170804012928841_IMG_2594.JPG'),
(33, 21, '../uploads/topic/20170804055904976_IMG_2599.JPG'),
(34, 22, '../uploads/topic/20170804061818222_IMG_2608.JPG'),
(35, 22, '../uploads/topic/20170804061818369_IMG_2609.JPG'),
(37, 24, '../uploads/topic/20171007150917331_2017-09-28 004008.jpg'),
(38, 24, '../uploads/topic/20171007150917402_2017-09-28 004017.jpg'),
(39, 24, '../uploads/topic/20171007150917303_2017-09-28 004020.jpg'),
(40, 24, '../uploads/topic/20171007150917513_2017-09-28 004029.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topic_user_like_collect`
--

CREATE TABLE IF NOT EXISTS `topic_user_like_collect` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `topic_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `attitude` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `like_topic_id` (`topic_id`),
  KEY `like_topic_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `topic_user_like_collect`
--

INSERT INTO `topic_user_like_collect` (`id`, `user_id`, `topic_id`, `created_at`, `attitude`) VALUES
(64, 48, 22, '2017-09-25 23:35:36', 1),
(65, 48, 22, '2017-09-25 11:35:37', 2),
(66, 48, 10, '2017-09-25 11:36:14', 2),
(67, 48, 10, '2017-09-25 23:36:16', 1),
(68, 48, 12, '2017-09-25 23:41:12', 1),
(69, 48, 12, '2017-09-25 11:41:13', 2),
(70, 48, 24, '2017-10-07 15:09:33', 1),
(71, 48, 24, '2017-10-07 03:09:33', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_publish_id` FOREIGN KEY (`publish_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_img`
--
ALTER TABLE `food_img`
  ADD CONSTRAINT `food_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_step`
--
ALTER TABLE `food_step`
  ADD CONSTRAINT `step_food_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_user_like_collect`
--
ALTER TABLE `food_user_like_collect`
  ADD CONSTRAINT `like_food_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_user_id` FOREIGN KEY (`user_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `relationships_followed_id` FOREIGN KEY (`followed_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relationships_follower_id` FOREIGN KEY (`follower_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_img`
--
ALTER TABLE `restaurant_img`
  ADD CONSTRAINT `restaurant_img_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_publisher_id` FOREIGN KEY (`publisher_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_commnet`
--
ALTER TABLE `topic_commnet`
  ADD CONSTRAINT `comment_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_img`
--
ALTER TABLE `topic_img`
  ADD CONSTRAINT `topic_id_img` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_user_like_collect`
--
ALTER TABLE `topic_user_like_collect`
  ADD CONSTRAINT `like_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_topic_user_id` FOREIGN KEY (`user_id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
