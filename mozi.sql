-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 08. 10:24
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mozi`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `film`
--

CREATE TABLE `film` (
  `filmid` int(11) NOT NULL,
  `nev` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `premier` date NOT NULL,
  `mufaj` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `info` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `film`
--

INSERT INTO `film` (`filmid`, `nev`, `premier`, `mufaj`, `info`) VALUES
(5, 'Batman', '2022-04-04', 'Krimi', 'Miért élek?'),
(6, 'CODA', '2022-03-27', 'Dráma', 'Nem tudom miez csak tetszett.'),
(7, 'Micimackó', '2022-04-21', 'Mese', 'Micimackó adócsalást követ el.');

--
-- Eseményindítók `film`
--
DELIMITER $$
CREATE TRIGGER `add_film_sched` AFTER INSERT ON `film` FOR EACH ROW INSERT INTO vetitites(filmid,datum)
VALUES
	(NEW.filmid, NEW.premier),
    (NEW.filmid, DATE_ADD(NEW.premier, INTERVAL 1 WEEK)),
    (NEW.filmid, DATE_ADD(NEW.premier, INTERVAL 2 WEEK)),
    (NEW.filmid, DATE_ADD(NEW.premier, INTERVAL 3 WEEK))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
--

CREATE TABLE `foglalas` (
  `foglalasid` int(11) NOT NULL,
  `vetitesid` int(11) NOT NULL,
  `foglalonev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `foglaloemail` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `sor` int(11) NOT NULL,
  `oszlop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `foglalas`
--

INSERT INTO `foglalas` (`foglalasid`, `vetitesid`, `foglalonev`, `foglaloemail`, `sor`, `oszlop`) VALUES
(888, 1, 'Kacsa', 'Manual', 9, 9),
(891, 1, 'Kacsa', 'Manual', 10, 7),
(892, 1, 'Kacsa', 'Manual', 10, 8),
(897, 1, 'Kacsa', 'Manual', 3, 4),
(898, 1, 'Kacsa', 'Manual', 7, 4),
(899, 1, 'Kacsa', 'Manual', 7, 3),
(900, 1, 'Kacsa', 'Manual', 6, 4),
(901, 1, 'Kacsa', 'Manual', 5, 4),
(902, 1, 'Kacsa', 'Manual', 1, 1),
(903, 1, 'Kacsa', 'Manual', 2, 1),
(904, 1, 'Kacsa', 'Manual', 1, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vetitites`
--

CREATE TABLE `vetitites` (
  `vetitesid` int(11) NOT NULL,
  `filmid` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `vetitites`
--

INSERT INTO `vetitites` (`vetitesid`, `filmid`, `datum`) VALUES
(1, 5, '2022-03-16'),
(2, 5, '2022-03-23'),
(3, 5, '2022-04-04'),
(4, 5, '2022-04-06'),
(5, 6, '2022-03-27'),
(6, 6, '2022-04-03'),
(7, 6, '2022-04-05'),
(8, 6, '2022-04-05'),
(9, 7, '2022-04-21'),
(10, 7, '2022-04-28'),
(11, 7, '2022-04-05'),
(12, 7, '2022-04-05');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`filmid`),
  ADD KEY `filmid` (`filmid`);

--
-- A tábla indexei `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`foglalasid`),
  ADD KEY `vetitesid` (`vetitesid`);

--
-- A tábla indexei `vetitites`
--
ALTER TABLE `vetitites`
  ADD PRIMARY KEY (`vetitesid`),
  ADD KEY `filmid` (`filmid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `film`
--
ALTER TABLE `film`
  MODIFY `filmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglalasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;

--
-- AUTO_INCREMENT a táblához `vetitites`
--
ALTER TABLE `vetitites`
  MODIFY `vetitesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `foglalas`
--
ALTER TABLE `foglalas`
  ADD CONSTRAINT `foglalas_ibfk_1` FOREIGN KEY (`vetitesid`) REFERENCES `vetitites` (`vetitesid`) ON DELETE CASCADE;

--
-- Megkötések a táblához `vetitites`
--
ALTER TABLE `vetitites`
  ADD CONSTRAINT `vetitites_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `film` (`filmid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
