-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2024 г., 08:35
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clothingandstyle_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `category` enum('male','female','acc') NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `product_code`, `price`, `description`, `category`, `availability`, `image_path`) VALUES
(1, 'Футболка мужская', '266800', '499.00', 'Мужская футболка с логотипом', 'male', 1, 'img/266800.jpg'),
(2, 'Футболка женская', '266801', '499.00', 'Женская футболка с принтом', 'female', 1, 'img/266801.jpg'),
(3, 'Кепка', '10803', '299.00', 'Кепка с эмблемой', 'acc', 0, 'img/10803.jpg'),
(4, 'Джемпер', '266802', '899.00', 'Джемпер мужской синий', 'male', 1, 'img/266802.jpg'),
(5, 'Свитер', '266803', '1099.00', 'Свитер мужской с оленями', 'male', 0, 'img/266803.jpg'),
(6, 'Пальто', '366805', '1999.00', 'Пальто женское с капюшоном', 'female', 0, 'img/366805.jpg'),
(7, 'Кепка', '466801', '499.00', 'Кепка унисекс с логотипом', 'acc', 1, 'img/466801.jpg'),
(8, 'Жакет', '266804', '799.00', 'Жакет мужской на молнии', 'male', 1, 'img/266804.jpg'),
(9, 'Пальто', '266806', '2499.00', 'Пальто мужское классического стиля', 'male', 0, 'img/266806.jpg'),
(10, 'Платье', '366801', '1299.00', 'Платье женское в полоску', 'female', 1, 'img/366801.jpg'),
(11, 'Юбка', '366802', '899.00', 'Юбка женская плиссированная', 'female', 1, 'img/366802.jpg'),
(12, 'Пиджак', '366804', '1499.00', 'Пиджак женский приталенный', 'female', 1, 'img/366804.jpg'),
(13, 'Платок', '466802', '299.00', 'Платок женский шелковый с цветочным принтом', 'acc', 1, 'img/466802.jpg'),
(14, 'Ремень', '466803', '599.00', 'Ремень мужской кожаный', 'acc', 1, 'img/466803.jpg'),
(15, 'Шарф', '466804', '399.00', 'Шарф унисекс в клетку', 'acc', 0, 'img/466804.jpg'),
(16, 'Куртка', '266805', '1999.00', 'Куртка мужская утепленная', 'male', 0, 'img/266805.jpg'),
(17, 'Блузка', '366803', '799.00', 'Блузка женская с цветочным узором', 'female', 1, 'img/366803.jpg'),
(18, 'Очки солнцезащитные', '466805', '799.00', 'Очки солнцезащитные женские', 'acc', 1, 'img/466805.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
