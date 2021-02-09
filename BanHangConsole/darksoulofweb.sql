-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2019 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `darksoulofweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`ID`, `id_product`, `user_id`, `amount`, `created_at`, `Price`) VALUES
(1, 20, 5, 1, '2019-04-27 07:36:14', 200),
(2, 2, 5, 1, '2019-04-27 07:38:05', 28.99),
(3, 9, 5, 1, '2019-04-27 12:58:38', 100),
(4, 20, 5, 2, '2019-04-28 11:16:23', 400),
(5, 20, 5, 1, '2019-04-30 11:24:40', 200),
(6, 40, 5, 2, '2019-04-30 11:33:04', 139.98);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Card` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Moneh` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Password` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Card`, `Moneh`, `Phone`, `Password`, `Type`) VALUES
(1, 'zoomer3Guy', '311136233', 1000, 123456789, 'Assofsteel1324', 'C'),
(2, 'dasaBigNut', '311136212', 1233, 123142545, 'gayAFboah222', 'C'),
(3, 'xxxDongxxx', '113555253', 4790000, 574625800, 'expanddong1432', 'M'),
(4, 'kimkhoi1999', '111111111', 100000, 1111111111, '111111111', 'A'),
(5, 'maihuy', '123456789', 9999060, 708961204, '123', 'M');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Developers` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `Type`, `Name`, `Quantity`, `Price`, `Pic`, `Status`, `Developers`, `Description`) VALUES
(1, 'Game', 'Attack On Titan 2', 40, 20, 'AOT2.png', '', 'Omega Force', 'Experience the immense story of the anime alongside Eren and his companions, as they fight to save humanity from the threat of the deadly human devouring Titans. Try your hand in operating the omni-directional mobility gear, maneuvering and flying through the sky to counter the Titans, and feel the thrill and satisfaction of battling giant opponents.'),
(2, 'Game', 'Crash Bandicoot N. Sane Trilogy', 32, 28.99, 'CrooshBandercat.png', '', 'Vicarious Visions, Toys for Bob', 'Spin, jump, wump and repeat as you take on the epic challenges and adventures through the three games that started it all, Crash Bandicoot™, Crash Bandicoot™ 2: Cortex Strikes Back and Crash Bandicoot™ 3: Warped. Relive all your favorite Crash moments in their fully-remastered graphical glory and get ready to put some UMPH in your WUMP!'),
(3, 'Game', 'Monopoly for Nintendo Switch', 13, 10, 'monopoly.png', 'New', 'Asobo Studio, Engine Software', 'A full 3D city at the center of the board lives and evolves as you play. You own a miniature world where each neighborhood has its own unique identity and characteristics. Its friendly inhabitants will interact with your progression throughout the game and celebrate your achievements, bringing a new dimension to your experience. Feel that you own something special and admire your empire grow right in front of your eyes!'),
(4, 'Game', 'Pokemon Lets Go, Pikachu!', 60, 50, 'pokemon.png', '', 'Game Freak', 'Pokémon: Lets Go, Pikachu! is a role-playing video game developed by Game Freak and published by The Pokémon Company and Nintendo for the Nintendo Switch. The games are the first main series Pokémon entries for the system, and the first main titles to be released on a home console'),
(5, 'Game', 'Sonic Forces', 42, 5.99, 'sanic.png', 'Sale', 'Sonic Team', 'In SONIC FORCES, the evil Dr. Eggman has conquered much of the world with help from a powerful and mysterious new villain named Infinite. Now, you must assist Sonic and build an army to reclaim the world as they fight against chaos and destruction. \r\nDefeat enemies with blazing speed as Modern Sonic, catapult past perilous platforms as Classic Sonic, and create your very own Custom Hero Character equipped with a variety of powerful gadgets.'),
(6, 'Game', 'World Of Final Fantasy Maxima', 52, 30, 'ff.png', 'New', 'Square Enix', 'Originally released in November 2017, WORLD OF FINAL FANTASY has just been powered up and reborn as WORLD OF FINAL FANTASY Maxima! New characters from FF lore (Champions) and monsters (Mirages) add even more fun and excitement to this unique adventure. This new and enhanced version of WORLD OF FINAL FANTASY also features the Avatar Change system, which allows the protagonists, Reynn and Lann, to fight as Champions.'),
(7, 'Game', 'Battlefield V', 4, 15.25, 'battlefield.png', '', 'EA DICE', 'Charge into unparalleled combat during pivotal moments in the early days of World War 2. Use modernized movement and weapon mechanics for an experience unlike any other. Clash with enemies in a mix of new and iconic multiplayer modes in a combat sandbox for up to 64 players. Fight for control points or battle it out until one team remains.'),
(8, 'Game', 'Black Clover Quartet Knights', 9, 36, 'blackclover.png', '', 'Bandai Namco Games', 'In this magic battle action game, take part in 4-on-4 team battles and cast an array of magic spells to defeat the opposing team. You can assume one of four roles: Fighter, Healer, Support, Ranged. Use your role and spells to the best possible effect, and cooperate with your teammates to win the battle!'),
(9, 'Game', 'Detroit Become Human', 50, 100, 'detroitbecomestabwound.png', '', 'Quantic Dream', 'Detroit: Become Human is an adventure game developed by Quantic Dream and published by Sony Interactive Entertainment for PlayStation 4 on 25 May 2018. The plot revolves around three androids: Kara, who escapes the owner she was serving to explore her newfound sentience and protect a young girl; Connor, whose job is to hunt down sentient androids; and Markus, who devotes himself to releasing other androids from servitude.'),
(10, 'Game', 'God Of War', 37, 38, 'GOW.png', '', 'SCE Santa Monica', 'From Santa Monica Studio and creative director Cory Barlog comes a new beginning for God of War. Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply personal quest.'),
(11, 'Game', 'Jump Force', 14, 13.5, 'jumpforce.png', 'Sale', 'Spike Chunsoft Co. Ltd., Spike Chunsoft', 'The most famous Manga heroes are thrown into a whole new battleground: our world. Uniting to fight the most dangerous threat, the Jump Force will bear the fate of the entire humankind.\r\n\r\nCreate your own avatar and jump into an original Story Mode to fight alongside the most powerful Manga heroes from DRAGON BALL Z, ONE PIECE, NARUTO, BLEACH, HUNTER X HUNTER, YU-GI-OH!, YU YU HAKUSHO, SAINT SEIYA and many others.\r\n\r\nAlso this game is trash'),
(12, 'Game', 'Pro Evolution Soccer 2019', 36, 40, 'soccer.png', '', 'Konami', 'The drama of the beautiful game, more visible and clearly portrayed through the many different playing styles.\r\n\r\n4K HDR support across all capable platforms. Experience PES 2019 realistic visuals with more clarity and realistic range of colours.\r\n\r\n'),
(13, 'Game', 'Red Dead Redemption 2', 305, 60.75, 'RDR2.png', 'New', 'Rockstar Games', 'After a robbery goes badly wrong in the western town of Blackwater, Arthur Morgan and the Van der Linde gang are forced to flee. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty'),
(14, 'Game', 'Resident Evil 2:REMAKE', 68, 40, 'RE2.png', 'New', 'Capcom R&D Division 1', 'The genre-defining masterpiece Resident Evil 2 returns, completely rebuilt from the ground up for a deeper narrative experience. Resident Evil 2 offers a fresh take on the classic survival horror saga with breathtakingly realistic visuals, heart-pounding immersive audio, a new over-the-shoulder camera, and modernized controls on top of gameplay modes from the original game. '),
(15, 'Game', 'The Sims 4 Cats - Dogs Bundle', 69, 26, 'sim4.png', '', 'Maxis', 'The Sims 4: Cats & Dogs is the fourth expansion pack for The Sims 4.[1] It was announced on August 21, 2017 at Gamescom and was released worldwide on November 10, 2017. The console version was released on July 31, 2018. It is a spiritual successor to The Sims: Unleashed, The Sims 2: Pets, and The Sims 3: Pets.'),
(16, 'Nintendo', 'Nintendo Switch Super Mario Odyssey Edition', 74, 399.99, 'switchodyssey.png', '', 'Nintendo', 'Introducing Nintendo Switch, the new home video game system from Nintendo.\r\n\r\nAt home the system rests in the Nintendo Switch dock, which lets you play with family and friends on a TV in the comfort of your living room.\r\n\r\nThis special bundle includes the Nintendo Switch console, Super Mario Odyssey Full Game Download Code, Nintendo Switch dock in black, and red left and right Joy-Con controllers.'),
(17, 'Nintendo', 'Nintendo Switch Super Smash Bros Edition', 100, 400, 'switchsmash.png', 'New', 'Nintendo', 'A hardware bundle for Super Smash Bros. Ultimate is here! The bundle contains a specially designed dock featuring fighters from the original Super Smash Bros. game, a download code for Super Smash Bros. Ultimate, and Super Smash Bros. themed Joy-Con controllers\r\n\r\nNew stages and fighters are joined by the combined rosters of every past Super Smash Bros. game\r\n\r\nChallenge others anytime, anywhere, whether you’re on the couch or on the go'),
(18, 'Nintendo', 'Nintendo Switch with Blue and Red Joy-Con', 22, 367.75, 'switchredblue.png', '', 'Nintendo', 'Nintendo Switch console, Nintendo Switch dock, Joy-Con (L) and Joy-Con (R), and Two Joy-Con strap accessories\r\n\r\nOne Joy-Con grip, HDMI cable, and Nintendo Switch AC adapter'),
(19, 'PS4', 'PS4 Pro', 4, 10, 'ps4pro.png', 'Sale', 'Sony, Playstation', '4K TV Gaming – PS4 Pro outputs gameplay to your 4K TV\r\nMore HD Power – Turn on Boost Mode to give PS4 games access to the increased power of PS4 Pro\r\nHDR Technology– With an HDR TV, compatible PS4 games display an unbelievably vibrant and lifelike range of colors'),
(20, 'PS4', 'PS4 Pro 500 Million Limited Edition', 500000000, 200, '500milps4.png', '', 'Sony, Playstation', 'Guess what, there are 500 million of these babies'),
(21, 'PS4', 'PS4 Pro Spider-Man Limited Edition', 75, 350, 'ps4spoodermin.png', '', 'Sony, Playstation', 'Spider-man, Spider-man, do whatever a spider can, holy crap, this is cheap, just buy, it is not fake at all'),
(22, 'PS4', 'PS4 (White) 2 Controllers', 69, 150, 'ps4slim.png', 'New', 'Sony, Playstation', 'A PS4 controllers but it is white now haha lol'),
(23, 'PS4', 'PS4 Slim Days Of Play 500GB', 81, 400, 'ps4daysofplay.png', '', 'Sony, Playstation', 'Slim & 500GB memory since days of play'),
(24, 'Accessories', 'Adhesive Glass Protector', 15, 7.25, 'switchglassprotector.png', '', 'Nintendo', 'N/A'),
(25, 'Accessories', 'Nintendo Switch Play Stand', 17, 4.99, 'switchplaystand.png', 'New', 'Nintendo', 'Playstand holds Nintendo Switch upright; offers adjustable angle for comfortable viewing\r\n\r\nAllows for charging Switch while placed in the stand (charging cable not included)\r\n\r\nPromotes adequate ventilation to help prevent Switch from over-heating\r\n\r\nCollapsible, lightweight design for portability; non-skid rubber feet keep it in place'),
(26, 'Accessories', 'Snakebyte Switch Games Tower', 20, 10, 'snakebyte.png', '', 'Snakebyte', 'N/A'),
(27, 'Accessories', 'Red and Blue Joy-Con Controllers', 27, 38, 'joyconredblue.png', 'New', 'Nintendo', 'Roses are red, Violets are blue, This is fake'),
(28, 'Accessories', ' 8Bitdo SN30 Pro', 72, 30, '8bit.png', '', '8Bitdo', 'Wireless Bluetooth, Rumble vibration, Motion controls, USB-C\r\nRumble vibration, Motion controls, USB-C\r\n\r\nWireless Bluetooth and direct USB connectable with built in lithium ion battery\r\n\r\nD-Input and X-Input functionality'),
(29, 'Accessories', 'Switch Controller SSB Edition', 51, 20, 'switchcontrollersmash.png', 'New', 'Nintendo', 'You can now smash the controller twice as hard'),
(30, 'Accessories', 'Nintendo Switch Travel Case', 10, 27.5, 'travelcase.png', '', 'Nintendo', 'For your travelling need'),
(31, 'Accessories', 'Premium Console Case Mario', 78, 15, 'consolecase.png', '', 'Nintendo', 'Costs more money than the normal one'),
(32, 'Accessories', 'PS4 Pro Charging - Cooling Stand', 12, 30, 'coolingstand.png', '', 'Dobe', 'N/A'),
(33, 'Accessories', 'Hori Tactical Assault Commander', 25, 47.5, 'hori.png', '', 'Hori, Playstation', 'N/A'),
(34, 'Accessories', 'PlayStation VR', 169, 300, 'psVR.png', 'New', 'Playstation', 'New & improved VR headset for your need anytime, anywhere'),
(35, 'Accessories', 'PS4 Gold Wireless Headphone', 50, 45, 'psheadphone.png', '', 'Playstation', 'NOT actually gold'),
(36, 'Accessories', 'PS4 Controller - Blue Camouflage', 10, 50, 'ps4blue.png', '', 'Playstation', 'Invinsible to normal eyes!!'),
(37, 'Accessories', 'PlayStation Move', 3, 15.35, 'psmove.png', '', 'Playstation', 'Worst design ever'),
(38, 'Accessories', 'PlayStation VR Aim Controller', 13, 20, 'aimcontroller.png', '', 'Playstation', 'Aim assist to git gud'),
(39, 'Accessories', 'USB Wireless Adaptor', 29, 399.99, 'ps4usb.png', '', 'Sony, Playstation', 'A normal USB, nothing special about it but this is a joke so we are selling it with sky-high price'),
(40, 'Game', 'Outlast Trinity', 1, 69.99, 'outlast.png', '', 'Red Barrels', '3spooky5me'),
(41, 'Game', 'Player Unknown Battleground', 1, 3.99, 'pubg.png', '', 'PUBG Corporation', 'As a pioneer, PLAYERUNKNOWN BATTLEGROUNDS is a battle royale shooter that pits 100 players against each other in a struggle for survival. Gather supplies and outwit your opponents to become the last person standing. ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
