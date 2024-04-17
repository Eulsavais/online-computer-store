-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 16 2024 г., 18:35
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comptech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `каталог`
--

CREATE TABLE `каталог` (
  `id_каталог` int(11) NOT NULL,
  `название` varchar(50) NOT NULL,
  `обложка` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `каталог`
--

INSERT INTO `каталог` (`id_каталог`, `название`, `обложка`) VALUES
(1, 'Комплектующие ПК', 'complect.webp'),
(2, 'Периферия', 'perif.webp'),
(3, 'Оргтехника', 'orgtech.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `корзина`
--

CREATE TABLE `корзина` (
  `id_cookies` char(15) NOT NULL,
  `FK_товар` int(11) NOT NULL,
  `количество` int(2) NOT NULL,
  `дата_корзины` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `подкаталог`
--

CREATE TABLE `подкаталог` (
  `id_подкаталог` int(11) NOT NULL,
  `название` varchar(50) NOT NULL,
  `FK_каталог` int(11) NOT NULL,
  `обложка` varchar(40) NOT NULL,
  `путь` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `подкаталог`
--

INSERT INTO `подкаталог` (`id_подкаталог`, `название`, `FK_каталог`, `обложка`, `путь`) VALUES
(1, 'Накопители SSD', 1, 'ssd.webp', 'complect'),
(2, 'Системы охлаждения', 1, 'coolers.webp', 'complect'),
(3, 'Оперативная память', 1, 'operate.webp', 'complect'),
(4, 'Мониторы', 2, 'monitor.webp', 'perif'),
(5, 'Клавиатуры', 2, 'keyboards.webp', 'perif'),
(6, 'Мыши', 2, 'mouse.webp', 'perif'),
(7, 'Защита питания', 3, 'defblock.webp', 'orgtech'),
(8, 'Принтеры и МФУ', 3, 'printer.webp', 'orgtech'),
(9, 'Сканеры', 3, 'scaner.webp', 'orgtech');

-- --------------------------------------------------------

--
-- Структура таблицы `пользователи`
--

CREATE TABLE `пользователи` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `пользователи`
--

INSERT INTO `пользователи` (`user_id`, `username`, `email`, `password`) VALUES
(4, '123', 'dayana@mail.ru', '$2y$10$.Y7HszjFCZmReUIzHzFKqu.EJhHsguGp2LPyrRwQ5VbnT./QUBFSq');

-- --------------------------------------------------------

--
-- Структура таблицы `заказ`
--

CREATE TABLE `заказ` (
  `id_заказ` char(15) NOT NULL,
  `date_заказ` date NOT NULL,
  `FK_покупатель` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `заказ`
--

INSERT INTO `заказ` (`id_заказ`, `date_заказ`, `FK_покупатель`) VALUES
('OR65f7e2e541668', '2024-03-18', 4),
('OR660be3d99b1c7', '2024-04-02', 4),
('OR660be428dfced', '2024-04-02', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `состав_заказа`
--

CREATE TABLE `состав_заказа` (
  `FK_заказ` char(15) NOT NULL,
  `FK_товар` int(11) NOT NULL,
  `количество` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `состав_заказа`
--

INSERT INTO `состав_заказа` (`FK_заказ`, `FK_товар`, `количество`) VALUES
('OR65f7e2e541668', 1, 2),
('OR65f7e2e541668', 13, 1),
('OR660be3d99b1c7', 13, 1),
('OR660be428dfced', 13, 3),
('OR660be428dfced', 16, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `товары`
--

CREATE TABLE `товары` (
  `id_товар` int(11) NOT NULL,
  `FK_каталог` int(11) NOT NULL,
  `FK_подкаталог` int(11) NOT NULL,
  `название` varchar(100) NOT NULL,
  `описание` text NOT NULL,
  `цена` int(4) NOT NULL,
  `обложка` varchar(20) NOT NULL,
  `путь` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `товары`
--

INSERT INTO `товары` (`id_товар`, `FK_каталог`, `FK_подкаталог`, `название`, `описание`, `цена`, `обложка`, `путь`) VALUES
(1, 1, 1, 'Накопитель SSD 500Gb Samsung 870 EVO (MZ-77E500BW)', 'внутренний SSD, 2.5&quot;, 500 Гб, SATA-III, чтение: 560 МБ/сек, запись: 530 МБ/сек, TLC', 6490, 'ssd1.webp', 'complect'),
(2, 1, 1, 'Накопитель SSD 1Tb Samsung 970 EVO Plus (MZ-V7S1T0BW)', 'внутренний SSD, M.2, 1000 Гб, PCI-E x4, NVMe, чтение: 3500 МБ/сек, запись: 3300 МБ/сек, TLC, кэш - 1024 Мб', 11440, 'ssd2.webp', 'complect'),
(3, 1, 1, 'Накопитель SSD 1Tb Samsung 980 Pro (MZ-V8P1T0BW)', 'внутренний SSD, M.2, 1000 Гб, PCI-E 4.0 x4, чтение: 7000 МБ/сек, запись: 5000 МБ/сек, TLC, кэш - 1024 Мб', 13370, 'ssd3.webp', 'complect'),
(4, 1, 2, 'Кулер DeepCool AK400 ZERO DARK PLUS', 'для процессора, Socket 115x/1200, 1700, AM4, AM5, 2x120 мм, 500-1650 об/мин, TDP 220 Вт', 4190, 'coolers.webp', 'complect'),
(5, 1, 2, 'Кулер ID-COOLING SE-224-XTS', 'для процессора, Socket 115x/1200, 1700, AM4, AM5, 1x120 мм, 600-1500 об/мин, TDP 220 Вт', 2250, 'coolers.webp', 'complect'),
(6, 1, 2, 'Кулер DeepCool AG300', 'для процессора, Socket 115x/1200, 1700, AM4, AM5, 1x92 мм, 500-3050 об/мин, TDP 150 Вт', 1560, 'coolers.webp', 'complect'),
(7, 1, 3, 'Оперативная память 16Gb DDR4 3200MHz Kingston Fury Beast Black', '16 Гб, 2 модуля DDR4, 25600 Мб/с, CL16, 1.35 В, XMP профиль, радиатор', 5390, 'operate.webp', 'complect'),
(8, 1, 3, 'Оперативная память 32Gb DDR4 3200MHz Kingston Fury Beast Black', '32 Гб, 2 модуля DDR4, 25600 Мб/с, CL16, 1.35 В, XMP профиль, радиатор', 8290, 'operate.webp', 'complect'),
(9, 1, 3, 'Оперативная память 32Gb DDR5 5600MHz ADATA XPG Lancer Blade Black', '32 Гб, 2 модуля DDR5, 44800 Мб/с, CL46, 1.1 В, EXPO, XMP профиль, радиатор', 12010, 'operate.webp', 'complect'),
(10, 2, 4, 'Монитор Xiaomi 27; A27i', '27&quot;, IPS, 1920x1080 (Full HD), 6 мс, 100 Гц, 250 кд/м2, 178°/178°, HDMI, DisplayPort, чёрный', 11030, 'monitor.webp', 'perif'),
(11, 2, 4, 'Монитор Xiaomi 24; Mi Desktop Monitor 1C', '23, IPS, 1920x1080 (Full HD), 6 мс, 60 Гц, 250 кд/м2, 178°/178°, VGA, HDMI, чёрный', 10440, 'monitor.webp', 'perif'),
(12, 2, 4, 'Монитор Philips 24', '24 IPS, 1920x1080 (Full HD), 5 мс, 250 кд/м2, 178°/178°, VGA, DVI, HDMI, динамики, чёрный', 10300, 'monitor.webp', 'perif'),
(13, 2, 5, 'Мышь Logitech B100 Black', 'оптическая, проводная, 800 dpi, USB, цвет: чёрный', 750, 'keyboards.webp', 'perif'),
(14, 2, 5, 'Мышь Logitech M185 Dark Grey', 'оптическая, беспроводная (радиоканал), 1000 dpi, USB, цвет: серый', 1320, 'keyboards.webp', 'perif'),
(15, 2, 5, 'Мышь Logitech M170 Grey', 'оптическая, беспроводная (радиоканал), 1000 dpi, USB, цвет: серый', 1080, 'keyboards.webp', 'perif'),
(16, 2, 6, 'Клавиатура + мышь Logitech Wireless Combo MK270 Black', 'беспроводная клавиатура + мышь (радиоканал), цифровой блок, USB, цвет: чёрный', 3900, 'mouse.webp', 'perif'),
(17, 2, 6, 'Клавиатура + мышь Logitech Desktop MK120 Black', 'клавиатура + мышь, 1000 dpi, цифровой блок, USB, цвет: чёрный', 2900, 'mouse.webp', 'perif'),
(18, 2, 6, 'Клавиатура + мышь A4Tech KK-3330S Black', 'клавиатура + мышь, 1000 dpi, цифровой блок, USB, цвет: чёрный', 1700, 'mouse.webp', 'perif'),
(19, 3, 7, 'Сетевой фильтр Pilot S-MAX 3м Graphite', 'сетевой фильтр, 6 розеток, макс. нагрузка 3500 Вт, макс. ток 16 А, заземление, выключатель на корпусе, длина кабеля: 3 м, чёрный18', 1980, 'defblock.webp', 'orgtech'),
(20, 3, 7, 'ИБП Ippon Back Basic 850S Euro', '850 ВА, 480 Вт, ступенчатая аппроксимация синусоиды, кол-во выходных разъемов с питанием от батарей: 3, тип выходных разъемов: евророзетка, время работы при половинной нагрузке: 13.1 мин', 6600, 'defblock.webp', 'orgtech'),
(21, 3, 7, 'Стабилизатор RUCELF SDV-3-30000', 'электромеханический стабилизатор, мощность 21000 Вт, входное напряжение 210-475 В, выходное напряжение 380 В, дисплей', 70000, 'defblock.webp', 'orgtech'),
(22, 3, 8, 'МФУ Kyocera Ecosys M2040dn', 'МФУ (принтер/сканер/копир), лазерная черно-белая печать, A4, двусторонняя печать, кардридер, планшетный/протяжный сканер, ЖК панель, сетевой (Ethernet)', 85000, 'printer.webp', 'orgtech'),
(23, 3, 8, 'МФУ Kyocera Ecosys M2135dn', 'МФУ (принтер/сканер/копир), лазерная черно-белая печать, A4, двусторонняя печать, кардридер, планшетный/протяжный сканер, ЖК панель, сетевой (Ethernet), AirPrint', 64000, 'printer.webp', 'orgtech'),
(24, 3, 8, 'МФУ HP LaserJet Pro M428fdn (W1A29A/W1A32A)', 'МФУ (принтер/сканер/копир), факс, лазерная черно-белая печать, A4, двусторонняя печать, планшетный/протяжный сканер, ЖК панель, сетевой (Ethernet), AirPrint', 93000, 'printer.webp', 'orgtech'),
(25, 3, 9, 'Сканер Canon CanoScan LiDE 300', 'планшетный, датчик CIS, разрешение 2400x2400 dpi, макс. формат A4, интерфейсы: USB 2.0', 8200, 'scaner.webp', 'orgtech'),
(26, 3, 9, 'Сканер Epson WorkForce DS-1630', 'планшетный, датчик CIS, разрешение 600x600 dpi, макс. формат A4, макс. размер 210x3048 мм, интерфейсы: USB 3.0', 26900, 'scaner.webp', 'orgtech'),
(27, 3, 9, 'Сканер Avision AD120', 'планшетный, датчик CIS, разрешение 600 dpi, макс. формат A4, интерфейсы: USB 2.0', 32000, 'scaner.webp', 'orgtech'),
(28, 1, 1, 'Накопитель SSD 500Gb Samsung 870 EVO (MZ-77E500BW)', 'внутренний SSD, 2.5\", 500 Гб, SATA-III, чтение: 560 МБ/сек, запись: 530 МБ/сек, TLC', 6000, 'ssd2.webp', 'complect');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `каталог`
--
ALTER TABLE `каталог`
  ADD PRIMARY KEY (`id_каталог`);

--
-- Индексы таблицы `подкаталог`
--
ALTER TABLE `подкаталог`
  ADD PRIMARY KEY (`id_подкаталог`);

--
-- Индексы таблицы `пользователи`
--
ALTER TABLE `пользователи`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `товары`
--
ALTER TABLE `товары`
  ADD PRIMARY KEY (`id_товар`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `каталог`
--
ALTER TABLE `каталог`
  MODIFY `id_каталог` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `подкаталог`
--
ALTER TABLE `подкаталог`
  MODIFY `id_подкаталог` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `пользователи`
--
ALTER TABLE `пользователи`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `товары`
--
ALTER TABLE `товары`
  MODIFY `id_товар` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
