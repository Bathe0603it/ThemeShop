-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 07 Octobre 2018 à 17:41
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `themeshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `fullname` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sim` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `giaban` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'publis',
  `sort` int(11) NOT NULL DEFAULT '0',
  `image` varchar(320) NOT NULL,
  `layout` varchar(20) NOT NULL,
  `taxonomy` varchar(320) DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `meta_title` varchar(320) NOT NULL,
  `meta_description` varchar(320) NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorys_relationship`
--

CREATE TABLE `categorys_relationship` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_taxonomy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorys_taxonomy`
--

CREATE TABLE `categorys_taxonomy` (
  `id` int(11) NOT NULL,
  `taxonomy` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorys_taxonomy`
--

INSERT INTO `categorys_taxonomy` (`id`, `taxonomy`, `description`) VALUES
(1, 'category-product', 'Loại danh mục sản phẩm'),
(2, 'category-post', 'Loại danh mục bài viết'),
(3, 'page', 'Loại trang đơn');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(320) NOT NULL,
  `slug` varchar(320) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `menu_taxonomy`
--

CREATE TABLE `menu_taxonomy` (
  `id` int(11) NOT NULL,
  `aritcle_id` int(11) DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `menu_tree`
--

CREATE TABLE `menu_tree` (
  `id` int(11) NOT NULL,
  `menu_taxonomy_id` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `type` varchar(120) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pay_cart`
--

CREATE TABLE `pay_cart` (
  `id` int(11) NOT NULL,
  `pay_user_id` int(11) NOT NULL,
  `pay_user_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pay_cart`
--

INSERT INTO `pay_cart` (`id`, `pay_user_id`, `pay_user_product`, `qty`) VALUES
(19, 20, 20, 1),
(20, 20, 21, 9),
(21, 21, 20, 1),
(22, 22, 18, 1),
(23, 23, 19, 1),
(24, 24, 20, 2),
(25, 24, 21, 1),
(26, 24, 19, 1),
(27, 25, 14, 7),
(28, 25, 17, 1),
(29, 26, 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pay_users`
--

CREATE TABLE `pay_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pay_users`
--

INSERT INTO `pay_users` (`id`, `name`, `email`, `phone`, `address`, `city`, `note`, `state`, `created_at`, `updated_at`) VALUES
(20, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 0, '2017-07-25 10:12:26', '2017-07-25 10:12:26'),
(21, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 0, '2017-07-25 10:17:37', '2017-07-25 10:17:37'),
(22, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 1, '2017-07-25 15:04:11', '2017-07-25 10:18:45'),
(23, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 0, '2017-07-25 15:11:43', '2017-07-25 15:11:43'),
(24, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 0, '2017-07-25 16:35:46', '2017-07-25 16:35:46'),
(25, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '', 0, '2017-07-27 11:34:02', '2017-07-27 11:34:02'),
(26, 'Bathepro', 'adminpro@gmail.com', '1694254799', '275 Nguyen Trai strees, Ha Noi', 'Hà Nội', '1', 0, '2017-07-27 12:04:39', '2017-07-27 12:04:39');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:nháp 1:kích hoạt 2:không kích hoạt',
  `feature` tinyint(1) NOT NULL DEFAULT '0',
  `follow` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `content`, `summary`, `avatar`, `orders`, `title`, `keywords`, `description`, `parent`, `state`, `feature`, `follow`, `created_date`, `created_by`, `update_date`) VALUES
(1, 'Như thế nào là Sim phong thủy hợp mệnh Thổ?', 'nhu-the-nao-la-sim-phong-thuy-hop-menh-tho', '<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Tại sao người mệnh thổ n&ecirc;n chọn <a href="https://xemvanmenh.net/nhu-the-nao-la-sim-phong-thuy-hop-menh-tho-A1.html"><strong>Sim phong thủy hợp mệnh thổ</strong></a>, bạn đ&atilde; biết chưa? Những người mệnh Thổ n&oacute;i ri&ecirc;ng v&agrave; c&aacute;c mệnh kh&aacute;c n&oacute;i chung thường rất quan t&acirc;m đến c&aacute;c yếu tố hợp với tuổi của m&igrave;nh. Trong đ&oacute; phải kể đến sim số, ai cũng muốn sở hữu một dẫy sim phong thủy hợp mệnh gi&uacute;p chủ sở hữu k&iacute;ch t&agrave;i vận. Sim số hợp mệnh kh&ocirc;ng chỉ gi&uacute;p họ an t&acirc;m m&agrave; c&ograve;n l&agrave; hi vọng để c&oacute; th&ecirc;m được nhiều may mắn v&agrave; t&agrave;i lộc cả trong cuộc sống v&agrave; trong c&ocirc;ng danh sự nghiệp. Vậy như thế n&agrave;o l&agrave;<strong> </strong>Sim phong thủy hợp mệnh Thổ? H&atilde;y c&ugrave;ng <a href="https://xemvanmenh.net"><strong>Xem Vận Mệnh</strong></a> t&igrave;m hiểu c&aacute;ch chọn sim hợp mệnh thổ chi tiết nhất nh&eacute;!</span></p>\r\n\r\n<p dir="ltr" style="text-align:center"><img alt="" src="https://xemvanmenh.net/media/images/article/1/sim%20phong%20th%E1%BB%A7y%20h%E1%BB%A3p%20m%E1%BB%87nh%20th%E1%BB%95%20xem%20v%E1%BA%ADn%20m%E1%BB%87nh(2).jpg" style="height:150px; width:696px" /></p>\r\n\r\n<h2 dir="ltr" style="text-align:justify"><span style="font-size:18px"><span style="color:#FF0000"><strong>C&aacute;ch ti&ecirc;u ch&iacute; gi&uacute;p bạn đ&aacute;nh gi&aacute; sim phong thủy hợp mệnh thổ&nbsp;</strong></span></span></h2>\r\n\r\n<h3 style="text-align:justify"><span style="font-size:16px"><em><strong>Sim phong thủy hợp mệnh Thổ l&agrave; sim tương hợp hoặc tương sinh</strong></em></span></h3>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Mỗi mệnh sẽ c&oacute; c&aacute;c yếu tố tương sinh, tương hợp kh&aacute;c nhau. Ch&iacute;nh c&aacute;c yếu tố n&agrave;y gi&uacute;p cho mệnh đ&oacute; c&oacute; th&ecirc;m nhiều điều tốt đẹp</span></p>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">&nbsp; &nbsp; &nbsp; &nbsp; - <em>Sim tương hợp</em>: nghĩa l&agrave; sim mang ch&iacute;nh mệnh của người đ&oacute;. Với người mệnh Thổ, Sim phong thủy hợp mệnh Thổ l&agrave; sim mang mệnh Thổ</span></p>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">&nbsp; &nbsp; &nbsp; &nbsp; - <em>Sim tương sinh</em>: nghĩa l&agrave; sim mang mệnh sinh ra mệnh của chủ nh&acirc;n. Theo quy tắc tương sinh, Hỏa sinh Thổ. Do đ&oacute;, nếu chọn 1 sim số mang mệnh Hỏa sẽ rất tốt cho người mệnh Thổ. N&oacute; c&ograve;n được cho l&agrave; tốt hơn sim tương hợp v&igrave; n&oacute; mang yếu tố ph&aacute;t triển, tiến l&ecirc;n chứ kh&ocirc;ng dừng lại hay l&ugrave;i xuống.</span></p>\r\n\r\n<h3 dir="ltr" style="text-align:justify"><span style="font-size:16px"><em><strong>Sim hợp mệnh thổ kh&ocirc;ng được tương khắc với mệnh</strong></em></span></h3>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Sim phong thủy hợp mệnh Thổ c&ograve;n c&oacute; nghĩa l&agrave; sim kh&ocirc;ng tương khắc với mệnh Thổ. Theo quy tắc tương khắc, Mộc khắc Thổ. Do đ&oacute;, người mệnh Thổ kh&ocirc;ng n&ecirc;n chọn sim mang mệnh Mộc. N&oacute; mang lại nhiều rủi ro, k&eacute;m may mắn.</span></p>\r\n\r\n<h3 dir="ltr" style="text-align:justify"><span style="font-size:16px"><em><strong>Sim phong thủy hợp mệnh Thổ phải đảm bảo c&acirc;n bằng &acirc;m dương</strong></em></span></h3>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Sim phong thủy hợp mệnh Thổ n&oacute;i ri&ecirc;ng v&agrave; sim hợp c&aacute;c mệnh n&oacute;i chung khi c&oacute; sự c&acirc;n bằng &acirc;m dương lớn nhất. Sự c&acirc;n bằng &acirc;m dương l&agrave; c&acirc;n bằng giữa số chẵn v&agrave; số lẻ. Số chẵn mang h&agrave;nh &acirc;m v&agrave; số lẻ mang h&agrave;nh dương. Một số điện thoại c&agrave;ng c&acirc;n bằng chẵn lẽ nghĩa l&agrave; c&agrave;ng c&acirc;n bằng &acirc;m dương th&igrave; c&agrave;ng tốt v&agrave; ngược lại. Sự c&acirc;n bằng &acirc;m dương n&agrave;y c&ograve;n thể hiện cho sự c&acirc;n bằng trong cuộc sống, gi&uacute;p chủ nh&acirc;n của sim số mệnh Thổ c&oacute; th&ecirc;m được nhiều điều may mắn.</span></p>\r\n\r\n<p dir="ltr" style="text-align:center"><span style="font-size:14px"><img alt="" src="https://xemvanmenh.net/media/images/article/1/sim%20h%E1%BB%A3p%20m%E1%BB%87nh%20th%E1%BB%95.jpg" style="height:200px; width:689px" /></span></p>\r\n\r\n<h3 dir="ltr" style="text-align:justify"><span style="font-size:14px"><em><strong>&nbsp;</strong></em></span><span style="font-size:16px"><em><strong>Sim hợp mệnh Thổ phải c&oacute; Số n&uacute;t cao</strong></em></span></h3>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Số n&uacute;t của một Sim phong thủy hợp mệnh Thổ cao khi n&oacute; tiến gần đến con số 9 (theo quan niệm của người miền Bắc) v&agrave; số 10 (theo quan niệm của người miền Nam). Số n&uacute;t c&agrave;ng cao th&igrave; phong thủy c&agrave;ng đẹp c&agrave;ng hợp với mệnh. Để t&iacute;nh số n&uacute;t n&agrave;y, bạn chỉ cần cộng c&aacute;c con số trong d&atilde;y sim số lại với nhau rồi lấy số lẻ cuối c&ugrave;ng trong d&atilde;y số kết quả ấy. So với con số 9 -10 để x&aacute;c định được độ cao - thấp của số n&uacute;t ấy.</span></p>\r\n\r\n<h3 dir="ltr" style="text-align:justify"><span style="font-size:16px"><em><strong>D&atilde;y sim hợp mạng thổ phải chứa c&aacute;c con số hợp mệnh</strong></em></span></h3>\r\n\r\n<p dir="ltr" style="text-align:justify"><span style="font-size:14px">Sim phong thủy hợp mệnh Thổ c&ograve;n l&agrave; sim số chứa nhiều con số hợp với người mệnh Thổ. Mệnh Thổ hợp nhất với c&aacute;c con số 2, 5, 8, 9. Do đ&oacute;, d&atilde;y sim số chứa c&agrave;ng nhiều c&aacute;c con số n&agrave;y th&igrave; phong thủy c&agrave;ng đẹp v&agrave; mang lại nhiều may mắn cho chủ nh&acirc;n.</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:14px">T&igrave;m được sim số với những đặc trưng tr&ecirc;n l&agrave; bạn đ&atilde; t&igrave;m được Sim phong thủy hợp mệnh Thổ nhất rồi đấy. Sim hợp mệnh được cho l&agrave; yếu tố may mắn, mang lại hi vọng v&agrave;o những điều tốt đẹp cả về cuộc sống lẫn c&ocirc;ng danh sự nghiệp. Ch&uacute;c bạn sở hữu được sim hợp mệnh Thổ nhất nh&eacute;!</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:14px"><strong><span style="color:#00FF00">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;</span> </strong></span><span style="font-size:16px"><strong><a href="https://xemvanmenh.net/xem-sim-phong-thuy.html"><span style="color:#FF0000">XEM SIM PHONG THỦY</span></a><span style="color:#FF0000"> HỢP MỆNH CHO NHỮNG NGƯỜI TH&Acirc;N Y&Ecirc;U</span></strong></span><span style="font-size:14px"><strong><span style="color:#FF0000">&nbsp;</span><span style="color:#00FF00">&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span></strong></span></p>\r\n', '<p><span style="font-size:14px">Tại sao người mệnh thổ n&ecirc;n chọn <a href="https://xemvanmenh.net/nhu-the-nao-la-sim-phong-thuy-hop-menh-tho-A1.html"><strong>Sim phong thủy hợp mệnh thổ</strong></a>, bạn đ&atilde; biết chưa? Những người mệnh Thổ n&oacute;i ri&ecirc;ng v&agrave; c&aacute;c mệnh kh&aacute;c n&oacute;i chung thường rất quan t&acirc;m đến c&aacute;c yếu tố hợp với tuổi của m&igrave;nh. Trong đ&oacute; phải kể đến sim số, ai cũng muốn sở hữu một dẫy sim phong thủy hợp mệnh gi&uacute;p chủ sở hữu k&iacute;ch t&agrave;i vận....</span></p>\r\n', 'xem%20sim%20phong%20th%E1%BB%A7y%20h%E1%BB%A3p%20m%E1%BB%87nh%20th%E1%BB%95.jpg', 0, 'Như thế nào là Sim phong thủy hợp mệnh Thổ - Sim kích tài vận?', 'sim hợp mệnh thổ, sim phong thủy hợp mệnh thổ, sim kích tài vận', 'Tư vấn chọn sim phong thủy hợp mệnh mệnh thổ chi tiết và đơn giản hơn bao giờ hết. Người mệnh thổ mua ngay sim phong thủy hợp mệnh thổ để chiêu vận may - kích tài lộc', 73, 1, 0, 1, 1491789412, 1, 0),
(136, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1499354698, 1, 0),
(137, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1499523008, 1, 0),
(138, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1499573979, 1, 0),
(139, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1499795248, 1, 0),
(140, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1500196630, 1, 0),
(141, 'Cerator', 'cerator', '<p>1</p>\r\n', '', '', 0, 'Cerator', '', '', 0, 1, 1, 1, 1500196831, 1, 0),
(142, '', '', '', '', '', 0, '', '', '', 0, 0, 0, 1, 1501078280, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giaban` double NOT NULL DEFAULT '0',
  `giakhuyenmai` double NOT NULL DEFAULT '0',
  `summary` text CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `parameter` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `feature` tinyint(1) NOT NULL DEFAULT '0',
  `hidden_price` tinyint(1) NOT NULL DEFAULT '0',
  `follow` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `giaban`, `giakhuyenmai`, `summary`, `content`, `parameter`, `avatar`, `orders`, `title`, `keywords`, `description`, `status`, `feature`, `hidden_price`, `follow`, `created_date`, `created_by`, `update_date`) VALUES
(12, 'Dung Dịch Tẩy Tế Bào Chết', 'dung-dich-tay-te-bao-chet', 200000, 185000, '', '<p><strong>Paula’s Choice là hãng mỹ phẩm danh giá đến từ nước Mỹ xinh đẹp.</strong>&nbsp;Dựa trên kinh nghiệm thực tế,&nbsp;<strong>nguyên liệu cam kết từ 100% thiên nhiên, không hoá chất tẩy rửa, công thức bào chế vượt trội trên nền công nghệ tiên tiến,</strong>&nbsp;Paula’s Choice liên tục tung ra những dòng sản phẩm chăm sóc da, trang điểm chuyên nghiệp vừa an toàn, vừa hiệu quả. Sau thành công của 20 cuốn sách vang danh thế giới, bà đã đúc kết hàng chục năm nghiên cứu về thành phần có trong mỹ phẩm để đưa ra một dòng sản phẩm của riêng mình – thương hiệu mỹ phẩm Paula’s Choice được thành lập vào năm 1995.</p>\r\n\r\n<p>Paula’s Choice không đánh trọng tâm vào các loại kem dưỡng hay sản phẩm trang điểm mà còn tung ra thị trường dòng sản phẩm trị liệu, bao gồm trị mụn, se khít lỗ chân lông, trị nám, tàn nhang, trị sẹo… nhằm&nbsp;<strong>mang đến cho quý khách hàng một làn da đẹp hoàn hảo.</strong></p>\r\n', '', 'kem-lot-chong-nang-spf50-pa_-30ml_1_img_300x300_b798dd_fit_center.jpg', 0, 'Dung Dịch Tẩy Tế Bào Chết', '', '', '1', 1, 0, 1, 1500560704, 1, 0),
(13, 'Son Dưỡng Môi SPF10 - 3.5g', 'son-duong-moi-spf10-3-5g', 50000, 50000, '', '<p>Người ta thường để ý và chăm sóc cho những vết nhăn quanh mắt ngay từ năm 25 tuổi, vậy còn những nếp nhăn ở môi? Đôi môi cũng là khu vực dễ phải chịu nhiều sự tác động tiêu cực từ phía môi trường, mỹ phẩm, các thực phẩm hàng ngày. Nếp nhăn sẽ không thể xuất hiện nếu bề mặt của đôi môi luôn mềm mại, căng mịn và có đủ lượng nước cần thiết. Đối với những bạn gái có thói quen liếm môi, bạn nên từ bỏ thói quen này càng sớm càng tốt. Liếm môi sẽ giúp bạn chống khô môi tạm thời, nhưng khi lớp nước bọt khô đi, một lớp tinh bột có trong nước bọt sẽ bám lại trên môi và khiến môi trở nên khô và nứt nẻ nhiều hơn, điều này sẽ tạo điều kiện cho nếp nhăn xuất hiện. Do đó, ngoài cải thiện những thói quen không tốt dễ gây ra nếp nhăn ở môi như: không tẩy tế bào chết cho môi, hút thuốc, dùng ống hút, không bảo vệ môi khi ra ngoài trời, thì hãy bỏ túi một thỏi son dưỡng môi có độ ẩm cao để giúp đôi môi luôn được ẩm mượt suốt cả ngày.&nbsp;<strong>Son Dưỡng Môi SPF10 Wrinkle Care Stick Lip Balm Missha&nbsp;</strong>sẽ giúp bạn dưỡng ẩm và cải thiện nếp nhăn ở môi một cách tốt nhất.</p>', '', '', 0, 'Son Dưỡng Môi SPF10 - 3.5g', '', '', '1', 1, 0, 1, 1500561725, 1, 0),
(14, 'Sản phẩm kẻ chân mày 1', 'san-pham-ke-chan-may-1', 11111000, 3333000, '', '<p>Đôi môi khô của bạn sẽ mềm mịn hẳn nếu sử dụng Vaseline thường xuyên. Cung cấp chất dinh dưỡng, mang lại cho bạn làn da mềm mại. Nó có chức năng vừa là son dưỡng môi + trị nứt nẻ. Vaseline cho bạn một đôi môi và làn da mềm, mượt mà.</p>\r\n\r\n<p><strong>Vaseline</strong>&nbsp;là thương hiệu ra đời từ năm 1870. Thương hiệu này được biết đến lần đầu với sản phẩm sáp Vaseline do&nbsp;Robert Chesebrough tìm ra sau khi ông ghé thăm một mỏ dầu. Từ đó thương hiệu này đã làm một cuộc cách mạng và được sử dụng khắp mọi nơi trên toàn thế giới. Hiện nay, thương hiệu này đang được quản lý bởi tập đoàn Unilever. Các sản phẩm chăm sóc da của thương hiệu&nbsp;<strong>Vaseline</strong>&nbsp;đã có mặt ở 60 nước trên toàn thế giới và được bày bán ở hệ thống các siêu thị trên cả nước và được các chị em phụ nữ tin tưởng và sử dụng hàng ngày.</p>\r\n\r\n<p>Hiện&nbsp;<strong>Hasaki</strong>&nbsp;có các dòng sau:</p>\r\n\r\n<p>- Hương Hoa Hồng (Rosy)</p>', '', 'son-moi-sieu-mem-muot-mau-do-7712-3_5g_img_300x300_b798dd_fit_center.jpg', 0, 'Sản phẩm kẻ chân mày 1', '', '', '1', 1, 0, 1, 1500562125, 1, 0),
(15, 'Sản phẩm kẻ chân mày 2', 'san-pham-ke-chan-may-2', 90000, 9000, '', '<p>Đôi môi khô của bạn sẽ mềm mịn hẳn nếu sử dụng Vaseline thường xuyên. Cung cấp chất dinh dưỡng, mang lại cho bạn làn da mềm mại. Nó có chức năng vừa là son dưỡng môi + trị nứt nẻ. Vaseline cho bạn một đôi môi và làn da mềm, mượt mà.</p>\r\n\r\n<p><strong>Vaseline</strong>&nbsp;là thương hiệu ra đời từ năm 1870. Thương hiệu này được biết đến lần đầu với sản phẩm sáp Vaseline do&nbsp;Robert Chesebrough tìm ra sau khi ông ghé thăm một mỏ dầu. Từ đó thương hiệu này đã làm một cuộc cách mạng và được sử dụng khắp mọi nơi trên toàn thế giới. Hiện nay, thương hiệu này đang được quản lý bởi tập đoàn Unilever. Các sản phẩm chăm sóc da của thương hiệu&nbsp;<strong>Vaseline</strong>&nbsp;đã có mặt ở 60 nước trên toàn thế giới và được bày bán ở hệ thống các siêu thị trên cả nước và được các chị em phụ nữ tin tưởng và sử dụng hàng ngày.</p>\r\n\r\n<p>Hiện&nbsp;<strong>Hasaki</strong>&nbsp;có các dòng sau:</p>\r\n\r\n<p>- Hương Hoa Hồng (Rosy)</p>\r\n', '', 'tay-te-bao-chet-da-mat-fresh-skin-apricot-scrub-170gr-100220037_img_300x300_b798dd_fit_center.jpg', 0, 'Sản phẩm kẻ chân mày 2', '', '', '1', 0, 0, 1, 1500562201, 1, 0),
(16, 'Sản phẩm son môi', 'san-pham-son-moi', 8000, 8000, '', '<p>Đôi môi khô của bạn sẽ mềm mịn hẳn nếu sử dụng Vaseline thường xuyên. Cung cấp chất dinh dưỡng, mang lại cho bạn làn da mềm mại. Nó có chức năng vừa là son dưỡng môi + trị nứt nẻ. Vaseline cho bạn một đôi môi và làn da mềm, mượt mà.</p>\r\n\r\n<p><strong>Vaseline</strong>&nbsp;là thương hiệu ra đời từ năm 1870. Thương hiệu này được biết đến lần đầu với sản phẩm sáp Vaseline do&nbsp;Robert Chesebrough tìm ra sau khi ông ghé thăm một mỏ dầu. Từ đó thương hiệu này đã làm một cuộc cách mạng và được sử dụng khắp mọi nơi trên toàn thế giới. Hiện nay, thương hiệu này đang được quản lý bởi tập đoàn Unilever. Các sản phẩm chăm sóc da của thương hiệu&nbsp;<strong>Vaseline</strong>&nbsp;đã có mặt ở 60 nước trên toàn thế giới và được bày bán ở hệ thống các siêu thị trên cả nước và được các chị em phụ nữ tin tưởng và sử dụng hàng ngày.</p>\r\n\r\n<p>Hiện&nbsp;<strong>Hasaki</strong>&nbsp;có các dòng sau:</p>\r\n\r\n<p>- Hương Hoa Hồng (Rosy)</p>', '', 'son-moi-sieu-mem-muot-mau-do-7712-3_5g_img_300x300_b798dd_fit_center.jpg', 0, 'Sản phẩm son môi', '', '', '1', 1, 0, 1, 1500562374, 1, 0),
(17, 'sản phẩm phấn mặt', 'san-pham-phan-mat', 200000, 100000, 'aaa', '<p>Đôi môi khô của bạn sẽ mềm mịn hẳn nếu sử dụng Vaseline thường xuyên. Cung cấp chất dinh dưỡng, mang lại cho bạn làn da mềm mại. Nó có chức năng vừa là son dưỡng môi + trị nứt nẻ. Vaseline cho bạn một đôi môi và làn da mềm, mượt mà.</p>\r\n\r\n<p><strong>Vaseline</strong>&nbsp;là thương hiệu ra đời từ năm 1870. Thương hiệu này được biết đến lần đầu với sản phẩm sáp Vaseline do&nbsp;Robert Chesebrough tìm ra sau khi ông ghé thăm một mỏ dầu. Từ đó thương hiệu này đã làm một cuộc cách mạng và được sử dụng khắp mọi nơi trên toàn thế giới. Hiện nay, thương hiệu này đang được quản lý bởi tập đoàn Unilever. Các sản phẩm chăm sóc da của thương hiệu&nbsp;<strong>Vaseline</strong>&nbsp;đã có mặt ở 60 nước trên toàn thế giới và được bày bán ở hệ thống các siêu thị trên cả nước và được các chị em phụ nữ tin tưởng và sử dụng hàng ngày.</p>\r\n\r\n<p>Hiện&nbsp;<strong>Hasaki</strong>&nbsp;có các dòng sau:</p>\r\n\r\n<p>- Hương Hoa Hồng (Rosy)</p>\r\n', '', 'iphone-7-plus-128gb-de-400x460.png', 0, 'sản phẩm phấn mặt', '', '', '1', 1, 0, 1, 1500562433, 1, 0),
(18, '', '', 0, 0, '', NULL, '', NULL, 0, NULL, NULL, NULL, '0', 0, 0, 1, 1502070732, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci COMMENT 'Mô tả về quyền',
  `permission` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'link permission',
  `category` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `groupsystem` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permission`, `category`, `parent`, `level`, `groupsystem`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trang chủ', 'Điều hướng vào trang chủ', 'admincp/dashboardcontroller/index', 1, 0, 0, '0', NULL, NULL, NULL),
(2, 'Sản phẩm', 'Cho phếp quản lý sản phẩm', 'admincp/productcontroller/index', 1, 0, 0, '0', NULL, NULL, NULL),
(3, 'Danh mục', 'Quản lý danh mục', '#admincp/categorycontroller/index', 1, 0, 0, '0', NULL, NULL, NULL),
(4, 'Khuyến mãi', 'Quản lý khuyến mãi bao gồm tạo các mã giảm giá', 'admincp/discountnextcontroller/index', 1, 0, 0, '1', NULL, NULL, NULL),
(5, 'Báo cáo', 'Quản lý báo cáo website', 'admincp/verbcontroller/index', 1, 0, 0, '0', NULL, NULL, NULL),
(6, 'Thêm sản phẩm', 'Thêm nhanh sản phẩm', 'admincp/productcontroller/create', 1, 2, 1, '0', NULL, NULL, NULL),
(7, 'Sửa sản phẩm', 'Cho phép sửa sản phẩm với id được chọn', 'admincp/productcontroller/edit', 1, 2, 1, '0', NULL, NULL, NULL),
(8, 'Danh sách sản phẩm 1', 'Hiển thị danh sách sản phẩm', 'admincp/productcontroller/index', 0, 2, 1, '0', NULL, NULL, NULL),
(9, 'Quản lý quyền hệ thống', 'Quản lý quyền hệ thống', 'admincp/rolecontroller', 0, 0, 0, '2', NULL, NULL, NULL),
(10, 'Danh sách quyền hệ thống', 'Danh sách quyền hệ thống', 'admincp/rolecontroller/index', 0, 9, 5, '2', NULL, NULL, NULL),
(11, 'Thêm quyền hệ thống', 'Thêm mới quyền hệ thống', 'admincp/rolecontroller/create', 0, 9, 5, '2', NULL, NULL, NULL),
(12, 'Quản lý menu', 'Quản lý danh sách menu', 'admincp/menucontroller/index', 0, 0, 0, '2', NULL, NULL, NULL),
(13, 'Thêm danh mục', 'Thêm danh mục  sản phẩm, bài viết...', 'admincp/categorycontroller/create', 0, 3, 2, '1', NULL, NULL, NULL),
(14, 'Danh sách', 'Danh sách danh mục', 'admincp/categorycontroller/index', 0, 3, 2, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permission` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `receive` varchar(50) NOT NULL COMMENT 'Gửi cho tôi thông báo quan trọng',
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `permission`, `fullname`, `gender`, `birthday`, `address`, `tel`, `description`, `status`, `receive`, `remember_token`, `login_timer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bathe0603nd', 'bathe0603nd@gmail.com', '2cb5674e3f7d9c18807ec58c064f556c', '["1","2"]', 'Mr.Bathepro', '1', '2017-08-16', '32/107 Linh Nam street - Ha Noi', '01694254791', '', 'active', '', NULL, '2017-12-11 16:06:42', '2017-09-03 17:00:00', '2017-09-03 17:00:00', '2017-09-03 17:00:00'),
(2, 'admincp', 'admincp@gmail.com', '2cb5674e3f7d9c18807ec58c064f556c', '["1","2"]', 'Mr.Admin', '1', '2017-09-06', 'Ha Noi', '0123', '', 'active', '', NULL, '2017-12-11 16:06:46', '2017-09-12 17:00:00', '2017-09-12 17:00:00', '2017-09-12 17:00:00'),
(3, 'Batheit', 'adminpro@gmail.com', '2cb5674e3f7d9c18807ec58c064f556c', '["1","2"]', '', '', NULL, 'bathe0603nd@gmail.com', '01694254799', '', 'active', '', NULL, '2017-12-10 15:13:02', NULL, NULL, NULL),
(4, 'Bathepro', 'bathepc@gmail.com', '2cb5674e3f7d9c18807ec58c064f556c', '["1","2","6","7","8","3","5","4"]', '', '', NULL, 'Ha Noi', '123456789', '', 'active', '', NULL, '2018-01-05 16:32:01', NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorys_relationship`
--
ALTER TABLE `categorys_relationship`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorys_taxonomy`
--
ALTER TABLE `categorys_taxonomy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_taxonomy`
--
ALTER TABLE `menu_taxonomy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_tree`
--
ALTER TABLE `menu_tree`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pay_cart`
--
ALTER TABLE `pay_cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pay_users`
--
ALTER TABLE `pay_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pys_user_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorys_relationship`
--
ALTER TABLE `categorys_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorys_taxonomy`
--
ALTER TABLE `categorys_taxonomy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu_taxonomy`
--
ALTER TABLE `menu_taxonomy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu_tree`
--
ALTER TABLE `menu_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pay_cart`
--
ALTER TABLE `pay_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `pay_users`
--
ALTER TABLE `pay_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
