-- phpMyAdmin SQL Dump
-- version 4.0.9deb1.precise~ppa.1
-- http://www.phpmyadmin.net
--
-- Računalo: localhost
-- Vrijeme generiranja: Lip 13, 2014 u 11:02 PM
-- Verzija poslužitelja: 5.5.35-0ubuntu0.12.04.2
-- PHP verzija: 5.5.10-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `JednodnevniIzleti`
--

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `Gradovi`
--

CREATE TABLE IF NOT EXISTS `Gradovi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PostBr` varchar(5) DEFAULT NULL,
  `NazivGrada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Izbacivanje podataka za tablicu `Gradovi`
--

INSERT INTO `Gradovi` (`Id`, `PostBr`, `NazivGrada`) VALUES
(1, '10000', 'Zagreb'),
(2, '35000', 'Slavonski Brod'),
(3, '43000', 'Bjelovar'),
(4, '20000', 'Dubrovnik'),
(5, '47000', 'Karlovac'),
(6, '52100', 'Pula'),
(7, '23000', 'Zadar'),
(8, '21000', 'Split'),
(9, '44000', 'Sisak'),
(10, '32100', 'Vinkovci'),
(11, '32238', 'Čakovec'),
(12, '32000', 'Vukovar'),
(13, '31000', 'Osijek'),
(14, '42000', 'Varaždin'),
(15, '22000', 'Šibenik'),
(16, '49225', 'Đurmanec');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `Korisnik`
--

CREATE TABLE IF NOT EXISTS `Korisnik` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(100) DEFAULT NULL,
  `Prezime` varchar(150) DEFAULT NULL,
  `Adresa` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `RolaId` int(11) DEFAULT NULL,
  `GradoviId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  KEY `RolaId_idx` (`RolaId`),
  KEY `fk_Korisnik_Gradovi1_idx` (`GradoviId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Izbacivanje podataka za tablicu `Korisnik`
--

INSERT INTO `Korisnik` (`Id`, `Ime`, `Prezime`, `Adresa`, `Email`, `Username`, `Password`, `RolaId`, `GradoviId`) VALUES
(22, 'Martina', 'Čulina', 'Gumerec 3d', 'mculina92@gmail.com', 'mculina', '1a1dc91c907325c69271ddf0c944bc72', 1, 1),
(24, 'Iva', 'Sambolek', 'Novoselački put 64', 'iva@sam', 'ivasambi', '1a1dc91c907325c69271ddf0c944bc72', 2, 11),
(26, 'Nikolina', 'Šipek', 'Vukomerec 3', 'nsipek@gmail.com', 'nsipek', '1a1dc91c907325c69271ddf0c944bc72', 2, 14),
(51, 'Matea', 'Antolić', 'Nevinac 64', 'mantolic@tvz.hr', 'mantolic', '1a1dc91c907325c69271ddf0c944bc72', 1, 3),
(58, 'Danijel', 'Hrček', 'Đurmanec 165', 'danijel.hrcek@gmail.com', 'dhrcek', '66a2a1f857bbb7169625b2ef9cec6b8c', 2, 16);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `KorisnikRola`
--

CREATE TABLE IF NOT EXISTS `KorisnikRola` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `KorisnikRola`
--

INSERT INTO `KorisnikRola` (`Id`, `Naziv`) VALUES
(1, 'Administrator'),
(2, 'Korisnik');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `KupljenaPonuda`
--

CREATE TABLE IF NOT EXISTS `KupljenaPonuda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PonudaId` int(11) NOT NULL,
  `KorisnikId` int(11) NOT NULL,
  `DatumKupovine` date DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `KorisnikId_idx` (`KorisnikId`),
  KEY `PonudaId_idx` (`PonudaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Izbacivanje podataka za tablicu `KupljenaPonuda`
--

INSERT INTO `KupljenaPonuda` (`Id`, `PonudaId`, `KorisnikId`, `DatumKupovine`) VALUES
(3, 4, 24, '2022-02-20'),
(6, 6, 24, '2015-05-20'),
(7, 4, 24, '2014-05-22'),
(8, 4, 56, '2014-05-20'),
(9, 8, 24, '2014-06-04');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `Ponuda`
--

CREATE TABLE IF NOT EXISTS `Ponuda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(200) DEFAULT NULL,
  `Opis_hr` text,
  `Opis_en` text,
  `Opis_de` text,
  `DatumPolaska` date DEFAULT NULL,
  `Slika` varchar(200) DEFAULT NULL,
  `VrstaId` int(11) DEFAULT NULL,
  `Cijena` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `VrstaId_idx` (`VrstaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Izbacivanje podataka za tablicu `Ponuda`
--

INSERT INTO `Ponuda` (`Id`, `Naziv`, `Opis_hr`, `Opis_en`, `Opis_de`, `DatumPolaska`, `Slika`, `VrstaId`, `Cijena`) VALUES
(4, 'Opatija', 'Opatija bajna, kako je mnogi koji su se u nju zaljubili zovu, mjesto je samih početaka hrvatskog turizma, a i danas je jedno od najljepših i najuređenijih obalnih mjesta. Želite li na opuštajući izlet ili na ugodno ljetovanje, Opatija je odličan izbor.', 'Rest of their lives, as many who are in love with her call, place the very beginnings of Croatian tourism, and today is one of the nicest and most beautiful coastal towns. Do you want to relaxing trip or a pleasant vacation, Opatija is an excellent choice.', 'Opatija Lebens, als viele, die in der Liebe mit ihr telefonieren, legen Sie sie am Anfang des kroatischen Tourismus, und ist heute einer der am besten aussehende und dringendsten? Wth komplexen Küstengebieten. Wenn Sie? und eine Reise oder auf einem angenehmen Urlaub Take wollen, ist Abbey eine ausgezeichnete Wahl.', '2014-06-14', 'img/opatija.jpg', 3, '80'),
(5, 'Otočac', 'Otočac je grad čije se ime spominje još na Baščanskoj ploči i mjesto koje je odolijevao brojnim povijesnim prijetnjama, a u posljednje je vrijeme sve više prepoznat kao ishodište otkud se lako mogu razgledati obližnji nacionalni parkovi te predivna rijeka Gacka', 'Otočac is a city whose name is mentioned in the Tablet of Baška and place resisted numerous historical threats, and in recent times it has become more recognized as a starting point from where you can easily visit the nearby national parks and beautiful rivers Gacka', 'Otočac Ac ist die Stadt Dessen Name auch in Ba erwähnt wird Lia Bord ii Ort hat zahlreiche historische Drohungen widerstanden, und in der letzten Zeit, vie allem als Ergebnis von wo aus man leicht sehen, oblinji nationalen erkannt Parks und schöne Flüsse Gacko', '2014-06-07', 'img/otocac.jpg', 1, '120'),
(6, 'Plitvička jezera', 'Rijetko gdje priroda čovjeku može pružiti toliko užitka kao na Plitvičkim jezerima. Igra vode, zelenila i kamena jednostavno će očarati svakoga! Nacionalnim parkom proglašene su još 1949., a njihovoj ljepoti nije mogao odoljeti niti UNESCO, te ih je uvrstio na svoju listu svjetske baštine, kao jednu od prvih prirodnih atrakcija na tom cijenjenom popisu!', 'Rarely is the nature of man can give so much pleasure as the Plitvice Lakes. Play water, greenery and stone simply will enchant everyone! They were declared a national park in 1949., And their beauty could not resist nor UNESCO, and it is included on its list of world heritage sites, as one of the top natural attractions in this esteemed list!', 'Selten ist die Natur des Menschen so viel moe Verkleidungen gewährleisten uitka wie die Plitvicer Seen grob. Spielen Sie Wasser, Grün und Stein wurde gerade hin? Arati alle! Nationalpark proglaene sind immer noch 1949., Und ihre Schönheit nicht widerstehen konnte, noch der UNESCO, und es ist auf der Liste der weltbesten enthalten ist, als einer der Top-natürlichen Attraktionen in dieser angesehenen Liste!', '2014-06-09', 'img/plitvickaJezera.jpg', 2, '120'),
(7, 'Krka', 'Po posjećenosti, naš drugi nacionalni park u cijelosti se smjestio u Šibenskoj-kninskoj županiji i obuhvatio 109 kvadratnih kilometara uz tok rijeke Krke.', 'Attendance, our second national park in its entirety is located in Sibenik-Knin County and encompass 109 square kilometers along the Krka river.', 'Pro Besuch?-Compliance, wird der zweite Nationalpark in seiner Gesamtheit in Šibenik-Knin und umfasst 109 Quadratkilometer entlang des Krka-Flusses.', '2014-06-10', 'img/krka.jpg', 2, '100'),
(8, 'Osijek', 'U plodnoj slavonskoj ravnici, 20-ak kilometara od mjesta gdje Drava susreće Dunav, smjestio se Osijek, najveći i najznačajniji grad na istoku Hrvatske. Ujedno i najbolje skrivani turistički biser hrvatskog kontinenta.', 'In the fertile plain of Slavonia, 20 kilometers from where the Drava River meets the Danube, located in Osijek, the largest and most important city in the eastern Croatian. Also the best Croatian tourist pearl hidden continent.', 'In der fruchtbaren Ebene des Slawonien, 20 km, von wo die Drau Begegnung Donau, in Osijek, dem größten ii am meisten? Bedeutende Stadt im östlichen Kroatisch. Auch die besten versteckten Bezug auf Tourismus Juwel der kroatischen Kontinent.', '2014-06-02', 'img/osijek.jpg', 1, '90'),
(9, 'Vukovar', 'Vukovar je grad i najveća hrvatska riječna luka na Dunavu, u hrvatskom dijelu Srijema. On je i upravno, prosvjetno, gospodarsko i kulturno središte Vukovarsko-srijemske županije.', 'Vukovar is the largest Croatian town and river port on the Danube, in the Croatian part of Syrmia. He is the administrative, educational, economic and cultural center of the Vukovar-Sirmium County.', 'Vukovar ist eine Stadt und die größte kroatische und Worte zu den Donauhäfen in der kroatischen Syrmien. Er ist der Verwaltungs-, Bildungs-, Wirtschafts-und Kulturzentrum von Vukovar-Sirmium County.', '2014-06-14', 'img/vukovar.jpg', 1, '90'),
(10, 'Bjelolasica', 'Bjelolasica kao najviša planina Gorskog kotara, nalazi se unutar gorja Velika Kapela, s vrhom Kula (1.534 m) i planinom Klek (1.182 m), kao i strogim prirodnim rezervatima: Bijele stijene (1.335 m) i Samarske stijene (1.302 m).', 'Bjelolasica, the highest mountains of Gorski Kotar, is located within the Great Chapel, with the top tower (1,534 m) and Mount Creswick (1,182 m), as well as strict nature reserves: White Rocks (1335 m) and Samarska (1,302 m).', 'Bjelolasica auf die höchsten Berge von Gorski Kotar, ist innerhalb der Großen Kapelle, mit dem oberen Turm (1534 m) und Mount Creswick (1.182 m), sowie strenge Naturschutzgebiete: White Rocks (1335 m) und Samarska (1.302 m) .', '2014-06-20', 'img/bjelolasica.jpg', 4, '150');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `PonudaVrsta`
--

CREATE TABLE IF NOT EXISTS `PonudaVrsta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Izbacivanje podataka za tablicu `PonudaVrsta`
--

INSERT INTO `PonudaVrsta` (`Id`, `Naziv`) VALUES
(1, 'Grad'),
(2, 'Selo'),
(3, 'More'),
(4, 'Planine');

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `Korisnik`
--
ALTER TABLE `Korisnik`
  ADD CONSTRAINT `fk_Korisnik_Gradovi1` FOREIGN KEY (`GradoviId`) REFERENCES `Gradovi` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `RolaId` FOREIGN KEY (`RolaId`) REFERENCES `KorisnikRola` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `Ponuda`
--
ALTER TABLE `Ponuda`
  ADD CONSTRAINT `VrstaId` FOREIGN KEY (`VrstaId`) REFERENCES `PonudaVrsta` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
