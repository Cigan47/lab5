-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 15 2023 г., 20:21
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `text`) VALUES
(1, '2023-01-08', 'Название поста 1', '1 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque asperiores magnam cupiditate veritatis officia, voluptatum quas et alias nihil culpa nulla magni ex ea ratione quia aliquam ab odit accusamus amet quae dolores ipsa. Adipisci maxime quasi laborum provident ex delectus accusantium, amet harum qui fuga, hic labore omnis odit. Hic suscipit esse officia aut est velit fugiat eius, voluptate laudantium voluptates molestiae libero maxime fugit in saepe assumenda facilis ipsam numquam dicta quis quidem doloribus magni ex delectus! Iure odit fugit magni ad soluta saepe vitae maxime? Vitae minima vel ut alias dolorum, ab illum laborum natus iure sint, tenetur unde quos. Aliquam hic dolorem magnam quas, in autem quisquam doloribus doloremque ea, tenetur dolore officia explicabo, quibusdam aliquid possimus. Optio porro deleniti fuga nemo repellat possimus consectetur iste cupiditate, autem saepe, officiis atque, ipsa error distinctio. Unde, dolorem. Sint, harum! Excepturi dicta aut odio quae harum iste necessitatibus sed minus impedit quisquam, vero consequuntur magnam deleniti! Nobis asperiores neque assumenda provident ipsa unde, soluta dolores alias enim officia corrupti facere debitis inventore placeat voluptatum laborum dignissimos, cum odio! Maxime nemo error est, minima eos veniam ipsum illum vitae ipsa quo provident quod modi incidunt perferendis hic magnam blanditiis ad sed voluptates ducimus atque quos saepe. Delectus, voluptas illum? Ad sunt mollitia voluptatem quas, consectetur vel sapiente, illum aliquam modi temporibus voluptates perferendis pariatur totam debitis molestiae unde ipsa nihil sint quidem laudantium ratione recusandae tenetur sed. Eos dolorem incidunt provident consequuntur molestias optio tenetur quos! Id dignissimos sit omnis asperiores non reprehenderit vitae possimus. Quibusdam beatae iure magnam alias dicta ullam. Amet error voluptates voluptate adipisci sint consectetur ut, minus cum odit aliquid et totam quisquam reiciendis obcaecati distinctio nisi reprehenderit culpa odio optio doloribus voluptas! Laborum dolores quae at necessitatibus architecto expedita autem, dolorum voluptatibus aut, explicabo accusamus error soluta aliquid nisi aliquam perspiciatis accusantium neque. Error quis, iure delectus hic illo natus odio ratione quo quia dolorem, illum optio doloremque, doloribus veritatis id expedita aut sint rem. Architecto molestiae numquam, ad ut vel laboriosam eos quas corporis accusantium minima tempora ipsa assumenda commodi ullam aut harum nesciunt voluptatem, similique delectus. Dolorum sunt suscipit aperiam doloremque harum itaque delectus quam provident debitis illo, odit maiores quaerat possimus aut voluptatem totam minus vero aspernatur eius minima? Cupiditate atque blanditiis illum. Consectetur neque eligendi voluptas aspernatur autem consequuntur minima quos. Magni autem pariatur itaque doloremque velit atque repellat in, hic, rerum vel quos accusantium quidem? Quidem odit accusamus cupiditate incidunt placeat animi atque iure voluptatem deleniti! Possimus reprehenderit, dolorum consequatur, perspiciatis voluptate perferendis esse explicabo nihil ea quasi rerum aliquam ipsam ipsum sit porro voluptas, ut consequuntur aut cum!'),
(2, '2023-01-09', 'Название поста 2', '2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam illo, deleniti ipsum officia soluta nam molestias illum eligendi sed, commodi autem expedita optio quaerat veritatis sit itaque! Corrupti vero debitis officia accusantium accusamus quisquam obcaecati sapiente aliquid deleniti, perferendis quasi facere a impedit exercitationem pariatur consectetur modi tenetur ut consequatur ullam, facilis error nemo voluptates. Amet?');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
