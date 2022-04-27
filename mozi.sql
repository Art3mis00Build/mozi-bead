-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 27. 18:14
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
  `info` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `poster` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `film`
--

INSERT INTO `film` (`filmid`, `nev`, `premier`, `mufaj`, `info`, `poster`) VALUES
(5, 'Batman', '2022-04-27', 'Krimi', 'Miért élek?', 'https://static.posters.cz/image/1300/plakatok/the-batman-2022-i122127.jpg'),
(7, 'The Avengers', '2022-04-28', 'Mese', 'Micimackó adócsalást követ el.', 'https://m.media-amazon.com/images/I/815oKqKUo4L._AC_SL1500_.jpg'),
(11, 'Micimackó és a NAV', '2022-04-24', 'Dráma, Mese', 'Micimackó ismét adócsalást követ el. Barátjaival lebukott a helyi presszóban mikor épp kaparóst akartak venni.', 'https://static.posters.cz/image/1300/plakatok/winnie-the-pooh-i10378.jpg'),
(12, 'Thor: Szerelem és mennydörgés', '2022-04-27', 'Akció, szuperhős', 'Thor enlists the help of Valkyrie, Korg and ex-girlfriend Jane Foster to fight Gorr the God Butcher, who intends to make the gods extinct.', 'https://www.cinemascomics.com/wp-content/uploads/2022/04/poster-thor-love-and-thunder-diosa-del-trueno.jpg'),
(13, 'A Jó, a Rossz és a Csúf', '2022-04-28', 'Vadnyugat, Akció', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'https://i.pinimg.com/750x/0f/45/2b/0f452b26d6d368082bde1b4520d78f07.jpg');

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
(892, 1, 'Kacsa', 'Manual', 10, 8),
(924, 2, 'Manual', 'Manual', 4, 3),
(925, 2, 'Manual', 'Manual', 2, 3),
(941, 1, 'Manual', 'Manual', 10, 9),
(944, 1, 'Manual', 'Manual', 10, 7),
(945, 1, 'Manual', 'Manual', 10, 6),
(954, 1, 'Manual', 'Manual', 3, 2),
(955, 1, 'Manual', 'Manual', 3, 3),
(956, 1, 'Manual', 'Manual', 4, 3),
(957, 1, 'Manual', 'Manual', 5, 3),
(960, 1, 'Manual', 'Manual', 1, 8),
(961, 1, 'Manual', 'Manual', 2, 7),
(963, 1, 'Manual', 'Manual', 1, 9),
(964, 1, 'Manual', 'Manual', 2, 9),
(969, 1, 'Manual', 'Manual', 3, 4),
(970, 1, 'Manual', 'Manual', 4, 4),
(971, 1, 'Manual', 'Manual', 5, 4),
(972, 1, 'Manual', 'Manual', 2, 8),
(973, 1, 'Manual', 'Manual', 3, 8),
(985, 1, 'Manual', 'Manual', 3, 5),
(986, 1, 'Manual', 'Manual', 2, 6),
(987, 1, 'Manual', 'Manual', 3, 6),
(988, 1, 'Manual', 'Manual', 4, 5),
(989, 1, 'Manual', 'Manual', 4, 6),
(990, 1, 'Manual', 'Manual', 3, 7),
(993, 1, 'Manual', 'Manual', 4, 8),
(994, 1, 'Manual', 'Manual', 1, 6),
(995, 1, 'Manual', 'Manual', 1, 7),
(996, 1, 'proba', 'proba', 10, 1),
(999, 1, 'Manual', 'Manual', 10, 3),
(1000, 1, 'Manual', 'Manual', 9, 4),
(1001, 1, 'Manual', 'Manual', 9, 3),
(1002, 1, 'Manual', 'Manual', 8, 3),
(1003, 1, 'Manual', 'Manual', 8, 4),
(1004, 1, 'Manual', 'Manual', 7, 4),
(1005, 1, 'Manual', 'Manual', 7, 3),
(1006, 1, 'Manual', 'Manual', 6, 3),
(1007, 1, 'Manual', 'Manual', 6, 4),
(1008, 1, 'Manual', 'Manual', 5, 5),
(1009, 1, 'Manual', 'Manual', 6, 5),
(1010, 1, 'Manual', 'Manual', 7, 5),
(1011, 1, 'Manual', 'Manual', 8, 5),
(1012, 1, 'Manual', 'Manual', 3, 1),
(1013, 1, 'Manual', 'Manual', 4, 1),
(1014, 1, 'Manual', 'Manual', 5, 1),
(1015, 1, 'Manual', 'Manual', 6, 1),
(1016, 34, 'Manual', 'Manual', 1, 1),
(1017, 34, 'Manual', 'Manual', 1, 2),
(1018, 34, 'Manual', 'Manual', 2, 1),
(1019, 34, 'Manual', 'Manual', 2, 2),
(1020, 34, 'Manual', 'Manual', 7, 6),
(1021, 34, 'Manual', 'Manual', 7, 7),
(1022, 34, 'Manual', 'Manual', 7, 8),
(1023, 34, 'Manual', 'Manual', 7, 5),
(1024, 34, 'Manual', 'Manual', 9, 1),
(1025, 34, 'Manual', 'Manual', 9, 2),
(1026, 34, 'Manual', 'Manual', 10, 2),
(1027, 34, 'Manual', 'Manual', 10, 1),
(1028, 34, 'Manual', 'Manual', 5, 3),
(1029, 34, 'Manual', 'Manual', 5, 4),
(1030, 34, 'Manual', 'Manual', 3, 7),
(1031, 34, 'Manual', 'Manual', 3, 8),
(1032, 34, 'Manual', 'Manual', 4, 7),
(1033, 34, 'Manual', 'Manual', 4, 6),
(1034, 33, 'Manual', 'Manual', 1, 2),
(1035, 33, 'Manual', 'Manual', 1, 3),
(1036, 33, 'Manual', 'Manual', 1, 4),
(1037, 33, 'Manual', 'Manual', 1, 5),
(1038, 33, 'Manual', 'Manual', 1, 1),
(1039, 33, 'Manual', 'Manual', 9, 7),
(1040, 33, 'Manual', 'Manual', 9, 6),
(1041, 33, 'Manual', 'Manual', 8, 6),
(1042, 33, 'Manual', 'Manual', 8, 7),
(1043, 33, 'Manual', 'Manual', 8, 7),
(1044, 33, 'Manual', 'Manual', 5, 3),
(1045, 33, 'Manual', 'Manual', 6, 3),
(1046, 33, 'Manual', 'Manual', 5, 4),
(1047, 33, 'Manual', 'Manual', 4, 3),
(1048, 33, 'Manual', 'Manual', 5, 2),
(1049, 33, 'Manual', 'Manual', 6, 2),
(1050, 33, 'Manual', 'Manual', 4, 2),
(1051, 33, 'Manual', 'Manual', 4, 1),
(1052, 33, 'Manual', 'Manual', 4, 4),
(1053, 33, 'Manual', 'Manual', 4, 5),
(1054, 33, 'Manual', 'Manual', 4, 6),
(1055, 33, 'Manual', 'Manual', 4, 6),
(1056, 37, 'Manual', 'Manual', 8, 2),
(1057, 37, 'Manual', 'Manual', 7, 2),
(1058, 37, 'Manual', 'Manual', 6, 2),
(1059, 37, 'Manual', 'Manual', 6, 1),
(1060, 37, 'Manual', 'Manual', 7, 1),
(1061, 37, 'Manual', 'Manual', 8, 1),
(1062, 37, 'Manual', 'Manual', 9, 1),
(1063, 37, 'Manual', 'Manual', 10, 1),
(1064, 37, 'Manual', 'Manual', 9, 2),
(1065, 37, 'Manual', 'Manual', 10, 2),
(1066, 37, 'Manual', 'Manual', 5, 2),
(1067, 37, 'Manual', 'Manual', 5, 1),
(1068, 37, 'Manual', 'Manual', 4, 1),
(1069, 37, 'Manual', 'Manual', 4, 2),
(1070, 37, 'Manual', 'Manual', 3, 2),
(1071, 37, 'Manual', 'Manual', 3, 1),
(1072, 37, 'Manual', 'Manual', 2, 1),
(1073, 37, 'Manual', 'Manual', 6, 6),
(1074, 37, 'Manual', 'Manual', 6, 5),
(1075, 37, 'Manual', 'Manual', 5, 5),
(1076, 37, 'Manual', 'Manual', 5, 6),
(1077, 37, 'Manual', 'Manual', 7, 6),
(1078, 37, 'Manual', 'Manual', 7, 5),
(1079, 37, 'Manual', 'Manual', 8, 5),
(1080, 37, 'Manual', 'Manual', 9, 5),
(1081, 37, 'Manual', 'Manual', 10, 5),
(1082, 37, 'Manual', 'Manual', 10, 6),
(1083, 37, 'Manual', 'Manual', 9, 6),
(1084, 37, 'Manual', 'Manual', 8, 6),
(1085, 37, 'Manual', 'Manual', 10, 4),
(1086, 37, 'Manual', 'Manual', 10, 3),
(1087, 37, 'Manual', 'Manual', 9, 3),
(1088, 37, 'Manual', 'Manual', 9, 4),
(1089, 37, 'Manual', 'Manual', 1, 7),
(1090, 37, 'Manual', 'Manual', 1, 8),
(1091, 37, 'Manual', 'Manual', 1, 9),
(1092, 37, 'Manual', 'Manual', 3, 7),
(1093, 37, 'Manual', 'Manual', 3, 8),
(1094, 37, 'Manual', 'Manual', 6, 8),
(1095, 37, 'Manual', 'Manual', 6, 9),
(1096, 37, 'Manual', 'Manual', 10, 9),
(1097, 9, 'Manual', 'Manual', 1, 2),
(1098, 9, 'Manual', 'Manual', 2, 2),
(1099, 9, 'Manual', 'Manual', 2, 1),
(1100, 9, 'Manual', 'Manual', 1, 1),
(1101, 9, 'Manual', 'Manual', 1, 3),
(1102, 9, 'Manual', 'Manual', 2, 3),
(1103, 9, 'Manual', 'Manual', 1, 4),
(1104, 9, 'Manual', 'Manual', 2, 4),
(1105, 9, 'Manual', 'Manual', 1, 5),
(1106, 9, 'Manual', 'Manual', 2, 5),
(1107, 9, 'Manual', 'Manual', 1, 6),
(1108, 9, 'Manual', 'Manual', 2, 6),
(1109, 9, 'Manual', 'Manual', 1, 7),
(1110, 9, 'Manual', 'Manual', 2, 7),
(1111, 9, 'Manual', 'Manual', 1, 8),
(1112, 9, 'Manual', 'Manual', 2, 8),
(1113, 9, 'Manual', 'Manual', 1, 9),
(1114, 9, 'Manual', 'Manual', 2, 9),
(1115, 9, 'Manual', 'Manual', 3, 1),
(1116, 9, 'Manual', 'Manual', 4, 1),
(1117, 9, 'Manual', 'Manual', 3, 2),
(1118, 9, 'Manual', 'Manual', 4, 2),
(1119, 9, 'Manual', 'Manual', 3, 3),
(1120, 9, 'Manual', 'Manual', 4, 3),
(1121, 9, 'Manual', 'Manual', 3, 4),
(1122, 9, 'Manual', 'Manual', 4, 4),
(1123, 9, 'Manual', 'Manual', 3, 5),
(1124, 9, 'Manual', 'Manual', 4, 5),
(1125, 9, 'Manual', 'Manual', 5, 1),
(1126, 9, 'Manual', 'Manual', 5, 2),
(1127, 9, 'Manual', 'Manual', 6, 2),
(1128, 9, 'Manual', 'Manual', 6, 1),
(1129, 9, 'Manual', 'Manual', 7, 2),
(1130, 9, 'Manual', 'Manual', 7, 1),
(1131, 9, 'Manual', 'Manual', 5, 3),
(1132, 9, 'Manual', 'Manual', 6, 3),
(1133, 9, 'Manual', 'Manual', 7, 3),
(1134, 9, 'Manual', 'Manual', 7, 4),
(1135, 9, 'Manual', 'Manual', 6, 4),
(1136, 9, 'Manual', 'Manual', 5, 4),
(1137, 9, 'Manual', 'Manual', 5, 5),
(1138, 9, 'Manual', 'Manual', 5, 6),
(1139, 9, 'Manual', 'Manual', 5, 7),
(1140, 9, 'Manual', 'Manual', 5, 8),
(1141, 9, 'Manual', 'Manual', 10, 7),
(1142, 9, 'Manual', 'Manual', 10, 6),
(1143, 9, 'Manual', 'Manual', 9, 6),
(1144, 9, 'Manual', 'Manual', 9, 7),
(1145, 9, 'Manual', 'Manual', 9, 8),
(1146, 9, 'Manual', 'Manual', 10, 8),
(1147, 9, 'Manual', 'Manual', 9, 9),
(1148, 9, 'Manual', 'Manual', 10, 9);

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
(1, 5, '2022-04-27'),
(2, 5, '2022-03-23'),
(3, 5, '2022-04-04'),
(4, 5, '2022-04-06'),
(9, 7, '2022-04-27'),
(10, 7, '2022-04-28'),
(11, 7, '2022-04-05'),
(12, 7, '2022-04-05'),
(29, 11, '2022-04-24'),
(30, 11, '2022-05-01'),
(31, 11, '2022-05-08'),
(32, 11, '2022-05-15'),
(33, 12, '2022-04-27'),
(34, 12, '2022-05-04'),
(35, 12, '2022-05-11'),
(36, 12, '2022-05-18'),
(37, 13, '2022-04-28'),
(38, 13, '2022-05-05'),
(39, 13, '2022-05-12'),
(40, 13, '2022-05-19');

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
  MODIFY `filmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglalasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1149;

--
-- AUTO_INCREMENT a táblához `vetitites`
--
ALTER TABLE `vetitites`
  MODIFY `vetitesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
