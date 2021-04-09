-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Feb 11. 17:27
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `afp2021`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `files` varchar(128) NOT NULL,
  `timedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(254) NOT NULL,
  `registerdate` date NOT NULL,
  `statusid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< Updated upstream:Backend/Database/afp2021_Database.sql
=======
--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `registerdate`, `statusid`) VALUES
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'admin@gmail.com', '2021-02-15', 1),
(2, 'gergof2', '*B743C3473F98ACCE57C512D51C6AC9F20B3BFF4E', 'gergof2@freemail.hu', '2021-02-18', 1),
(3, 'guest', '*F1573429579994EEA4459170FDAC55DF96C4BBE6', 'guest123@gmail.com', '2021-02-25', 1);

>>>>>>> Stashed changes:web/application/database/afp2021_Database.sql
-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `timedate` date NOT NULL,
  `ipaddress` varchar(64) NOT NULL,
  `platform` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE `username` (`username`),
  ADD UNIQUE `email` (`email`);

--
-- A tábla indexei `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
<<<<<<< Updated upstream:Backend/Database/afp2021_Database.sql
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
>>>>>>> Stashed changes:web/application/database/afp2021_Database.sql

--
-- AUTO_INCREMENT a táblához `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `messages`
--
ALTER TABLE `messages`
<<<<<<< Updated upstream:Backend/Database/afp2021_Database.sql
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
=======
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
>>>>>>> Stashed changes:web/application/database/afp2021_Database.sql

--
-- Megkötések a táblához `userlogin`
--
ALTER TABLE `userlogin`
<<<<<<< Updated upstream:Backend/Database/afp2021_Database.sql
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
=======
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
>>>>>>> Stashed changes:web/application/database/afp2021_Database.sql
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
