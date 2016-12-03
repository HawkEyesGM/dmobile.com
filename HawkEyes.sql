-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2016 г., 12:31
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `HawkEyes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `name`, `target`) VALUES
(22, 'Black', 'd08c2ab4f60bb0da3ab21995ad8d3425.png'),
(23, 'Gold', 'd3d59f8435e2b054305af7f8b600789e.png'),
(24, 'Grey', '9ed147cc17e8fdde626d52ea3515a5ff.png'),
(25, 'Red', '07657bb411e27c1ea5ef54a0dce9cf35.png'),
(26, 'White', 'ed36b8e906a3b8bd76737cff84457d09.png');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comm` int(10) unsigned NOT NULL,
  `g_id` int(10) unsigned NOT NULL,
  `comm_description` varchar(255) NOT NULL,
  `plus` varchar(255) NOT NULL,
  `minus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comm`, `g_id`, `comm_description`, `plus`, `minus`) VALUES
(1, 31, 'text text text', 'text text text', 'text text text'),
(2, 31, 'text text text', 'text text text', 'text text text');

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(10) unsigned NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `feature_name`, `feature_img`) VALUES
(4, '3G', '5588d93edc181f009ea86e61cf1364ab.png'),
(6, 'Кредит3мес', 'af24d10a9d4774d206198e24c6e737ad.jpg'),
(7, 'Кредит5мес', '540a16f2d88f420db7206cf0f90d20b8.jpg'),
(8, 'Samsung', '2f0dfe9303f76867d0ec9c569d266814.jpg'),
(9, 'SuperAmoled', '3caeb08ebe6a67229808e91c35204139.jpg'),
(10, 'IPS', '79ad7da79b362ce156bc54a8efc1f35c.png'),
(11, '4core', '25560f2eb0e8b15092f93e9f5e03a368.jpg'),
(12, '6core', 'dbdc1a2bfdcfe88ea2709dee178bf150.jpg'),
(13, '8core', 'a63ce8154fdba92cfc790b2ac5c18e4e.jpg'),
(14, 'Touch ID', '590bd9e09eae2668e37076c24aca74dc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `demo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `old_price` int(10) unsigned DEFAULT NULL,
  `description` text NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `sticker` varchar(255) NOT NULL,
  `in_stock` smallint(11) unsigned NOT NULL,
  `raiting` smallint(11) unsigned NOT NULL,
  `group_goods` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `demo`, `video`, `price`, `old_price`, `description`, `public`, `sticker`, `in_stock`, `raiting`, `group_goods`, `brand`) VALUES
(38, 'Мобильный телефон Huawei P9', 'www.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 12555, 15999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Суперцена', 1, 10, 'smartphone', 'huawei'),
(39, 'Мобильный телефон HUAWEI Y6 II Black', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 2699, 2999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 4, 'smartphone', 'huawei'),
(40, 'Мобильный телефон Iphone 6 gold', '', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 14599, 16999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Топ продаж', 0, 11, 'smartphone', 'apple'),
(41, 'Мобильный телефон Iphone 6 silver', '', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 15799, 15999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 11, 'smartphone', 'apple'),
(42, 'Мобильный телефон Iphone 7 black', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 25599, 25999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Акция', 1, 11, 'smartphone', 'apple'),
(43, 'Мобильный телефон Lenovo Vibe K5 Note', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', '', 6999, 7999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 8, 'smartphone', 'lenovo'),
(44, 'Мобильный телефон Meizu M2 16GB', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 999, 1599, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Топ продаж', 1, 3, 'smartphone', 'meizu'),
(45, 'Мобильный телефон Microsoft Lumia 950', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 2599, 2999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 6, 'smartphone', 'microsoft'),
(46, 'Мобильный телефон Samsung Galaxy J5 2016 Duos', '', '', 6399, 6700, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 7, 'smartphone', 'samsung'),
(47, 'Мобильный телефон Samsung Galaxy s7', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 15499, 15999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Суперцена', 1, 11, 'smartphone', 'samsung'),
(48, 'Мобильный телефон Sony Xperia XA F3112 Dual Black', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', '', 7599, 7999, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, '', 0, 9, 'smartphone', 'sony'),
(49, 'Мобильный телефон Xiaomi Redmi 3S Pro 32GB', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 'httpswww.youtube.comwatchv=IpAq7jpcR6U', 6999, 7399, 'Экран 5.2, IPS, (1920x1080)/ HiSilicon Kirin 955 (4 ядра 2.5 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 12 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 6.0 (Marshmallow)/ 3000 мА*ч', 0, 'Акция', 0, 9, 'smartphone', 'xiaomi');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_colors`
--

CREATE TABLE IF NOT EXISTS `goods_colors` (
  `g_id` int(10) unsigned NOT NULL,
  `c_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_colors`
--

INSERT INTO `goods_colors` (`g_id`, `c_id`) VALUES
(38, 22),
(38, 23),
(38, 24),
(39, 22),
(39, 26),
(40, 23),
(0, 24),
(0, 24),
(41, 24),
(42, 22),
(43, 22),
(43, 23),
(43, 26),
(44, 22),
(44, 23),
(44, 24),
(44, 26),
(45, 22),
(46, 23),
(47, 22),
(47, 23),
(47, 24),
(48, 22),
(48, 25),
(48, 26),
(49, 22),
(49, 23),
(49, 24),
(49, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_features`
--

CREATE TABLE IF NOT EXISTS `goods_features` (
  `g_id` int(10) unsigned NOT NULL,
  `f_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_features`
--

INSERT INTO `goods_features` (`g_id`, `f_id`) VALUES
(38, 4),
(38, 7),
(38, 10),
(38, 12),
(38, 14),
(39, 10),
(39, 11),
(40, 7),
(40, 10),
(40, 13),
(40, 14),
(0, 7),
(0, 10),
(0, 13),
(0, 14),
(0, 7),
(0, 10),
(0, 13),
(0, 14),
(41, 7),
(41, 10),
(41, 13),
(41, 14),
(42, 4),
(42, 7),
(42, 10),
(42, 13),
(42, 14),
(43, 4),
(43, 6),
(43, 10),
(43, 12),
(44, 4),
(44, 10),
(44, 11),
(45, 10),
(45, 11),
(46, 6),
(46, 8),
(46, 9),
(46, 12),
(47, 7),
(47, 8),
(47, 9),
(47, 13),
(47, 14),
(48, 4),
(48, 6),
(48, 10),
(48, 12),
(48, 14),
(49, 7),
(49, 9),
(49, 13),
(49, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_images`
--

CREATE TABLE IF NOT EXISTS `goods_images` (
  `g_id` int(10) unsigned NOT NULL,
  `i_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_images`
--

INSERT INTO `goods_images` (`g_id`, `i_id`) VALUES
(38, 25),
(39, 26),
(40, 27),
(0, 28),
(0, 29),
(41, 30),
(42, 31),
(43, 32),
(44, 33),
(45, 34),
(46, 35),
(47, 36),
(48, 37),
(49, 38);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `alt_img` varchar(255) NOT NULL,
  `title_img` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `img_5` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `main_img`, `alt_img`, `title_img`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`) VALUES
(25, '1631378d2034dcc76d347fceda1a5a0e.png', 'p9', 'p9', 'bbcbbfc0a6a40012201bbbc83318feb1.jpg', '4a4d8ea98040e53906ff56ae5a357d00.jpg', '9afbbbfd9877a0e428ea855e4f2a652c.jpg', '6d24a7b3adc6a9259e93a3dc77c9ea4c.jpg', '0a8e98f052a8866cd44a4dbd8e1c476b.jpg'),
(26, 'b5b88141a7568df3c70ee73531a7f773.png', 'y6', 'y6', '6c0735e61245a83341d9725c61208950.jpg', '', '', '', ''),
(27, 'b9a17c6d320aeeeade31d58c3a286f3a.png', 's6', 's6', 'acd2bc08867d27a62a9c1c939dcdcede.jpg', '4835e15ee96653c522206a7b71492c7c.jpg', '02971883aef9baae02dddc792a179106.jpg', '', ''),
(28, 'cbef10728b02be3d2b15c63aa81c9c0e.png', 's6', 's6', 'bb1d9ea1187e84b018b5ea4d56c9cccb.jpg', '8cfcc071823dee1f36ecf84447801c2b.jpg', 'acd858d50f6935ba2e5d5f553d4f6724.jpg', '', ''),
(29, 'beb57be0790dae3ec0dfbe0417983863.png', 's6', 's6', '75cda0f17fb832e173019ef9bcabd994.jpg', '9d72c037a669811a7f57fa3469e6c936.jpg', '058fbd4529c347fd348d6ed015bc3cea.jpg', '', ''),
(30, '63adc308ddf3c2c2bfb91ebeda32fe9d.png', 's6', 's6', 'ead82e6758477d1993ca772b4a0d126d.jpg', '1f7d503a54801a6c007970a0815d53ff.jpg', 'c55bcd4bda21f7b7a3df2a7232d72768.jpg', '', ''),
(31, '325779304c80724daecf60eaebb8d13b.png', 's7', 's7', '827626c5b0fa6126eaef2b5b5a8fea7c.jpg', '49f17dfe4c11fca96f0b59405eb21b83.jpg', '5d1e01f731f2fc1f3a932897e48c817d.jpg', '8fda8100bee0d974bccfff0fdbb5789f.jpg', 'aff51b944b6853b9176fa0ca1b9fce78.jpg'),
(32, 'e1a1ed98a75e9212b9a539df2cdb9b8f.png', 'k5', 'k5', 'cfe1db45dcf98af32347f85727430411.jpg', '41649ea3a6269e18bc7c6dbf687f1707.jpg', '66d56d8bc122d3e8f817e8adc6405a00.jpg', '15166bfbf6fdfc787e082c67ca2a98e9.jpg', 'a408154ec31897165abc11c3514422e3.jpg'),
(33, '034c235d059b0c26ba5d6da5f522205f.png', 'm2', 'm2', 'f813e86f78b867d2844020bcf52fffb8.jpg', '7e9559dc3fa8856b8d2f8dacc29f5da6.jpg', 'a4511df07dc7c5388df3cb1fc4b8dd5f.jpg', '', ''),
(34, '2c4b466518e163e9e5389ba7423e0df1.png', '950', '950', 'f32db052df4c23befb7fe2fd632179ba.jpg', '17c7eef29b6f730762876e32088ea9b9.jpg', '', '', ''),
(35, '9f4e11854acc96f288c0440871e05085.png', 'j5', 'j5', '88480f0addcf035cda5ca35295568f77.jpg', '080ed072c36452ead0138a7a2e0f3ec3.jpg', 'f7184b527386471688fa5d50f08f4a3d.jpg', 'e0ec0d2d55c34c0cce5201530fd833dd.jpg', 'b822d9e04e57997b237a281d21d5b69b.jpg'),
(36, 'e24b23163b308237d15b200337ea294b.png', 's7', 's7', '3d5f8e149cec93de58adaf0a3047fb96.jpg', '13f706a100a9d2e41f6214a6b2d51b23.jpg', '1970efb02369912712f0fea74582fe7c.jpg', 'f502842294bc32254730ecffc4ca28de.jpg', '0c9024b85f827fb91974ec986aea5d5d.jpg'),
(37, '84608711fb0498b95824777293a2355a.png', 'xa', 'xa', '6da7f6ba8059f65ee750f67f2855d179.jpg', '0adc2c1182d2d987c02404a9fdf790a3.jpg', '30734f2a6481951b3c37f91d1046c443.jpg', '1b776ec7ac9abb2c15a67345f2f16c11.jpg', '03b6caa4df4bc1c7d9e7cf9501b558b5.jpg'),
(38, '45b017d5154dca19391a391de5771d89.png', '3s', '3s', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sec_name` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `sec_name`, `phone`, `email`, `password`, `avatar`) VALUES
(34, 'Денис', 'Масло', 380663363988, 'denis@mail.ru', '$2y$10$DymrnbmfqdNNOzlQ8MgNuOofdTGPzQztVcBp3mZlsbdgszKVM1W6q', '51c270f439918a379765ed4e9e3afbc5.jpg'),
(35, 'Виталий', 'Мотылевский', 380938745623, 'kertar@mail.ru', '$2y$10$D4YZSNmxqOxDeLhNQkg6s.7Qd3/CkuYNw4F.R2ft3SknrTT6wXTyu', '09a470f1d753a8aec645e643736a761c.jpeg'),
(36, 'Наталья', 'Слободян', 380936696977, 'chernika@bk.ru', '$2y$10$ogGe91HyzmbrOTuae4N3ie0ZR34jxnfv5AhInC4W/ib7680tnDENq', 'cda444481317c7e48ffd725cb8cce5b5.jpg'),
(37, 'Антон', 'Зартдинов', 380957777777, 'uc@seotech.com.ua', '$2y$10$taB6BNuV3pOvKv99PiIO0eUR4rDCjJFu4chkhC4XSr.Vxasmw4512', 'eeab68f5ae4be23bde6d8f95a248fe44.jpg'),
(38, 'Ekaterina', 'Omelchenko', 380503331433, 'ekbOmel@gmail.com', '$2y$10$fAAlvAMHIBQWf773EmVp1.eAeqb9.89BCrc4Uv4hmZYxhTUssCTiW', '5176a3235e12244c47c70e0f86512ef5.jpg'),
(39, 'Денис', 'Маслов', 380637773377, 'hawkeyes@mail.ru', '$2y$10$/NTcPkYX8E4Ef.Hv2SU.tuhlom9C2heXFfRVnBVi0Mq9YFmT6z3ZC', 'e5d363d72d7849cc93c1a4404caceb4e.png'),
(40, 'Александр', 'Иванов', 380957894512, 'kertaaar@mail.ru', '$2y$10$nmOhpte/wpNKrljU2u6UOuYbsBQQ9va5v3592cVLHuFdUgreQwm/y', '3f3652aa8255cf248151fdef3f75f288.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comm`);

--
-- Индексы таблицы `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comm` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
