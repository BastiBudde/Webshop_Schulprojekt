-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2020 um 20:53
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop`
--
CREATE DATABASE IF NOT EXISTS `webshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webshop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `ID_Bestellung` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `E_Mail` text NOT NULL,
  `Strasse_Hausnr` text NOT NULL,
  `PLZ` int(11) NOT NULL,
  `Ort` text NOT NULL,
  `Telefon` text DEFAULT NULL,
  `status` enum('In Bearbeitung','Bestaetigt','Versendet','Zugestellt','Storniert') NOT NULL,
  `wert` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bestellung`
--

INSERT INTO `bestellung` (`ID_Bestellung`, `Timestamp`, `Name`, `Vorname`, `E_Mail`, `Strasse_Hausnr`, `PLZ`, `Ort`, `Telefon`, `status`, `wert`) VALUES
(50, '2020-11-18 17:29:09', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'In Bearbeitung', '34.99'),
(51, '2020-11-18 17:29:34', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Bestaetigt', '104.98'),
(52, '2020-11-18 19:12:30', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Storniert', '699.94'),
(53, '2020-11-18 21:55:55', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Zugestellt', '154.97'),
(54, '2020-11-20 23:13:53', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Storniert', '29.99'),
(55, '2020-11-23 07:54:54', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Storniert', '334.89'),
(56, '2020-11-24 09:20:13', 'Meyer', 'Melanie', 'melanie.meyer@web.de', 'Kronshusen 12', 27404, 'Zeven', NULL, 'Storniert', '359.92'),
(57, '2020-12-10 12:55:10', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'Storniert', '664.86'),
(58, '2020-12-10 13:19:55', 'Budde', 'Sebastian', 'basti_budde@web.de', 'Am Schanzenberg 4a', 27404, 'Zeven', NULL, 'In Bearbeitung', '34.99');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung_produkt`
--

CREATE TABLE `bestellung_produkt` (
  `ID_Bestellung` int(11) NOT NULL,
  `ID_Produkt` int(11) NOT NULL,
  `Menge` int(11) NOT NULL,
  `stk_preis` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bestellung_produkt`
--

INSERT INTO `bestellung_produkt` (`ID_Bestellung`, `ID_Produkt`, `Menge`, `stk_preis`) VALUES
(50, 1, 1, '34.99'),
(51, 4, 1, '59.99'),
(51, 5, 1, '44.99'),
(52, 1, 1, '34.99'),
(52, 4, 1, '59.99'),
(52, 5, 1, '44.99'),
(52, 8, 1, '29.99'),
(52, 2, 1, '499.99'),
(52, 3, 1, '29.99'),
(53, 1, 1, '34.99'),
(53, 4, 2, '59.99'),
(54, 8, 1, '29.99'),
(55, 1, 1, '34.99'),
(55, 11, 10, '29.99'),
(56, 23, 3, '69.99'),
(56, 11, 5, '29.99'),
(57, 1, 7, '34.99'),
(57, 4, 10, '59.99'),
(58, 1, 1, '34.99');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `ID_Kunde` int(11) NOT NULL,
  `Vorname` text NOT NULL,
  `Name` text NOT NULL,
  `E_Mail` text NOT NULL,
  `Passwort` text NOT NULL,
  `PLZ` int(11) NOT NULL,
  `Ort` text NOT NULL,
  `Strasse_Hausnr` text NOT NULL,
  `Telefon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`ID_Kunde`, `Vorname`, `Name`, `E_Mail`, `Passwort`, `PLZ`, `Ort`, `Strasse_Hausnr`, `Telefon`) VALUES
(4, 'Sebastian', 'Budde', 'basti_budde@web.de', '1234', 27404, 'Zeven', 'Am Schanzenberg 4a', NULL),
(5, 'Melanie', 'Meyer', 'melanie.meyer@web.de', '1234', 27404, 'Zeven', 'Kronshusen 23', NULL),
(7, 'Liza', 'Meyer', 'lizameyer4@web.de', '1234', 27404, 'Zeven', 'Kronshusen 23', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde_bestellung`
--

CREATE TABLE `kunde_bestellung` (
  `ID_Kunde` int(11) NOT NULL,
  `ID_Bestellung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde_bestellung`
--

INSERT INTO `kunde_bestellung` (`ID_Kunde`, `ID_Bestellung`) VALUES
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(5, 56),
(4, 57),
(4, 58);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `ID_Mitarbeiter` int(11) NOT NULL,
  `Vorname` text NOT NULL,
  `Name` text NOT NULL,
  `Benutzername` text NOT NULL,
  `Passwort` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`ID_Mitarbeiter`, `Vorname`, `Name`, `Benutzername`, `Passwort`) VALUES
(1, 'Sebastian', 'Budde', 'S.Budde', '1234'),
(2, 'admin', 'admin', 'admin', 'admin'),
(3, 'Melanie', 'Meyer', 'M.Meyer', '1234'),
(4, 'Liza', 'Meyer', 'L.Meyer', '1234');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `ID_Produkt` int(11) NOT NULL,
  `Bezeichnung` text NOT NULL,
  `Kurzbeschreibung` text NOT NULL,
  `Picture_Path` text NOT NULL,
  `Beschreibung` text NOT NULL,
  `Preis` decimal(8,2) DEFAULT NULL,
  `Sparte` enum('Games','Hardware','Fanartikel') NOT NULL,
  `Kategorie` enum('Action','Adventure','Science-Fiction','Monitore','Tastaturen','Maeuse','Headsets','Figuren','Kleidung','Bettwaesche','Accessories') NOT NULL,
  `Bilderquelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`ID_Produkt`, `Bezeichnung`, `Kurzbeschreibung`, `Picture_Path`, `Beschreibung`, `Preis`, `Sparte`, `Kategorie`, `Bilderquelle`) VALUES
(1, 'STAR WARS: Squadrons', 'Ein first-person Space Combat Game im Star Wars Universum', 'Bilder/StarWarsSquadronsLogo.PNG', 'Meistere die Kunst des Sternenj&auml;gerkampfes im authentischem Pilotenerlebnis &bdquo;STAR WARS&trade;: Squadrons&ldquo;. Sp&uuml;re das Adrenalin, st&uuml;rze dich mit deiner Staffel in Multiplayer-Weltraumgefechte und schnall dich an, um eine spannende STAR WARS&trade;-Story zu erleben. Piloten, die sich f&uuml;r den Dienst einschreiben, werden sowohl in Sternenj&auml;ger-Cockpits der Flotten der Neuen Republik als auch in denen des Imperiums in die Schlacht ziehen und sich in 5-gegen-5-K&auml;mpfen behaupten m&uuml;ssen. Modifiziere deinen Sternenj&auml;ger und &auml;ndere die Zusammensetzung deiner Staffel, um sie an deinen Spielstil anzupassen und deine Gegner zu zerschmettern. Piloten werden stets als Team triumphieren und m&uuml;ssen taktische Ziele sowohl auf bekannten als auch auf noch nie zuvor gesehenen Schlachtfeldern abschlie&szlig;en &ndash; einschlie&szlig;lich dem Gasgiganten Yavin Prime und dem zerschmetterten Mond von Galitan.\r\n\r\n&Uuml;bernimm die Kontrolle &uuml;ber Sternenj&auml;ger wie den X-Fl&uuml;gler und den TIE-J&auml;ger. Passe deine Konfigurationen und kosmetischen Gegenst&auml;nde an. Verteile Energie frei zwischen Waffen, Schilden und deinem Antrieb, um v&ouml;llig in deiner Rolle als Sternenj&auml;gerpilot aufzugehen. Dar&uuml;ber hinaus haben Spieler die M&ouml;glichkeit, das komplette Spiel in Virtual Reality zu genie&szlig;en!\r\n\r\nErfahre in einer spannenden STAR WARS&trade;-Einzelspielerstory, die nach den Ereignissen von Die R&uuml;ckkehr der Jedi-Ritter angesiedelt ist, was es bedeutet, ein echter Pilot zu sein. Erz&auml;hlt aus den wechselnden Blickwinkeln zweier Fraktionen, triffst du w&auml;hrend der Kampagne auf ikonische und aufsteigende Anf&uuml;hrer beider Seiten, die um die Zukunft der Galaxis k&auml;mpfen. Die Neue Republik k&auml;mpft f&uuml;r Freiheit. Das Imperium verlangt Ordnung. Du wirst gebraucht, um dich den Besten der Galaxis anzuschlie&szlig;en.\r\n\r\nAlle Fl&uuml;gler, bitte kommen &ndash; Plane zusammen mit deiner Staffel im Besprechungsraum Gefechte, bevor du dich auf die sich stetig im Wandel befindlichen Schlachtfelder der Galaxis st&uuml;rzt. Tritt in intensiven 5-gegen-5-Luftk&auml;mpfen im Multiplayer-Modus an oder schlie&szlig;e dich mit deiner Staffel zusammen, um die Schlacht in monumentalen Flottengefechten zu deinen Gunsten zu wenden. Gemeinsam seid ihr die besten Flieger der ganzen Galaxis.\r\n\r\nMeistere legend&auml;re Sternenj&auml;ger &ndash; &Uuml;bernimm die Kontrolle &uuml;ber verschiedene Sternenj&auml;gerklassen der Flotten der Neuen Republik und des Imperiums &ndash; einschlie&szlig;lich des wendigen A-Fl&uuml;glers und des zerst&ouml;rerischen TIE-Bombers. Passe dein Schiff an, verwalte die Energieversorgung deiner Systeme und zerst&ouml;re deine Gegner in strategischen Weltraumgefechten.\r\n\r\nLebe deine Fantasie als STAR WARS-Pilot &ndash; Das Cockpit ist dein Zuhause. Nutze das Armaturenbrett deines Schiffs zu deinem Vorteil und f&uuml;hle die Hitze des Gefechts aus der Egoperspektive, w&auml;hrend dich lediglich ein d&uuml;nner Metallrumpf und etwas Glas von den Gefahren des Weltraums trennen. St&uuml;rze dich mit Vollgas in die spannenden Multiplayer-Modi und eine einzigartige Einzelspielerstory aus dem STAR WARS-Universum, in der sich alles um eine entscheidende Story geen Ende des galaktischen B&uuml;rgerkriegs dreht. Spiele &bdquo;STAR WARS: Squadrons&ldquo; komplett in VR, um v&ouml;llig in dein Cockpit einzutauchen.\r\n\r\nDie Mission ist klar &ndash; STAR WARS: Squadrons ist ab der Ver&ouml;ffentlichung ein vollst&auml;ndig in sich geschlossenes Erlebnis, in dem du allein durch das Spielen Belohnungen freischaltest. Steige R&auml;nge auf und schalte neue Komponenten wie Waffen, R&uuml;mpfe, Antriebe, Schilde und kosmetische Gegenst&auml;nde in einem klaren Fortschrittspfad frei, der das Gameplay stets frisch und interessant h&auml;lt.', '34.99', 'Games', 'Science-Fiction', 'https://store.steampowered.com/app/1222730/STAR_WARS_Squadrons/'),
(2, 'GIGABYTE AORUS FI27Q', '27 Zoll WQHD Monitor mit 10Bit-IPS Panel, 165 Hz, 1 ms Reaktionszeit und HDR10', 'Bilder/GigabyteAorusFI27Q.png', 'Das GIGABYTE AORUS FI27Q ist ein taktischer Gaming-Monitor mit brillanter Aufl&ouml;sung, fl&uuml;ssiger Darstellung und bringt noch mehr mit um ein anspruchsvolles Gaming-Erlebnis zu erzeugen. Das 68,6 cm (27&quot;) gro&szlig;e IPS-Panel liefert besonders gro&szlig;e Betrachtungswinkel (bis 178&deg;) bei einer Aufl&ouml;sung von 2.560 x 1.440 Pixeln (QHD), sodass jedes Detail aus allen Winkeln sichtbar bleibt. Neben einer Bildwiederholrate von 165 Hz, einer Reaktionszeit von 1 ms (MPRT) und der Unterst&uuml;tzung f&uuml;r AMD Free Sync / NVIDIA G-Sync erlebt man flie&szlig;ende Bilder, minimale Latenz und ein ruckelfreies, st&ouml;rfreies Bild. Der AORUS FI27Q erzeugt als HDR Display mit 95% abgedecktem DCI-P3 Farbraum realistische, nat&uuml;rliche und gleichzeitig lebendige Farben, mit denen Fotos, Videos und nat&uuml;rlich auch Spiele noch fesselnder aussehen. F&uuml;r noch mehr Ausdruck ist der AORUS FI27Q mit einer RGB Fusion 2.0 RGB-Beleuchtung ausgestattet, welche sich dank zahlreicher Effekte und Farben ganz pers&ouml;nlich einstellen l&auml;sst. F&uuml;r mehr Komfort beim Spielen besitzt der AORUS FI27Q die Black eQualizer Funktion, bei der dunkle Bildbereiche aufgehellt werden und ist mit ANC (Active Noise Cancelling) ausgestattet, bei der man &uuml;ber angeschlossene Kopfh&ouml;rer ein noch mitrei&szlig;ender Audioerlebnis genie&szlig;en kann. Das Panel des AORUS FI27Q kann ergonomisch auf den Nutzer ausgerichtet werden: H&ouml;he, Neigung und Schwenkwinkel sind individuell konfigurierbar, auch kann der Monitor im bekannten Quer- aber auch Hochformat genutzt werden.', '499.99', 'Hardware', 'Monitore', 'https://www.alternate.de/AORUS/AORUS-FI27Q-Gaming-Monitor/html/product/1581602'),
(3, 'Cyberpunk 2077 - Johnny Silverhand Actionfigur', 'Actionfigur des legendären Jonny Silverhand aus dem Spiel Cyberpunk 2077', 'Bilder/Cyberpunk2077JonnySilverhandActionfigur.jpg', '', '29.99', 'Fanartikel', 'Figuren', 'https://www.emp.de/p/Johnny-Actionfigur/461391St.html/?sc=freeshippingscde&wt_mc=mp.google.pla.emp_de_pla_shopping.233230692.14143219332.461391StDE0.325346876594.pla-325346876594.c.&adc=de&gclid=Cj0KCQjw8rT8BRCbARIsALWiOvQmBXcGcbILXHUPNMC-B81T0GQmMG1ZdYjo40Uv8ipqJPzCX5KdMjQaArM0EALw_wcB'),
(4, 'Cyberpunk 2077', 'Cyberpunk 2077 ist ein Action-Rollenspiel des polnischen Entwicklerstudios CD Projekt RED.', 'Bilder/Cyberpunk2077.jpg', 'Cyberpunk 2077 ist ein Open-World-Action-Adventure, das in Night City spielt &ndash; einer Megalopolis, deren Bewohner von Macht, Glamour und K&ouml;rpermodifikationen besessen sind. Du schl&uuml;pfst in die Rolle von V, einem gesetzlosen S&ouml;ldner auf der Suche nach einem einzigartigen Implantat &ndash; dem Schl&uuml;ssel zur Unsterblichkeit. Cyberware, Skillset und Spielstil deines Charakters k&ouml;nnen dabei nach Belieben angepasst werden. Entdecke eine riesige Stadt, in der deine Entscheidungen alles ver&auml;ndern werden.', '59.99', 'Games', 'Science-Fiction', 'https://www.kreiszeitung.de/leben/games/cyberpunk-2077-entwickler-gibt-informationen-multiplayer-singleplayer-zr-13531792.html'),
(5, 'Shadow of the Tomb Raider: Definitive Edition', 'Lara Croft hat nur wenig Zeit, um die Welt vor einer Maya-Apokalypse zu retten. Dabei erf&uuml;llt sich ihr Schicksal, und sie wird zum Tomb Raider.', 'Bilder/SahdowOfTheTombRaiderDefinitiveEdition.jpeg', 'Erlebe in Shadow of the Tomb Raider Definitive Edition das letzte Kapitel von Laras Origin-Story, in dem sich ihr Schicksal erf&uuml;llt und sie zum Tomb Raider wird. Die Shadow of the Tomb Raider Definitive Edition enth&auml;lt das Basisspiel, alle sieben DLC-Herausforderungsgr&auml;ber sowie alle herunterladbaren Waffen, Outfits und F&auml;higkeiten &ndash; der ultimative Weg, um Laras entscheidenden Moment zu erleben.\r\n\r\n&Uuml;berlebe und meistere den t&ouml;dlichsten Ort auf Erden: &Uuml;berwinde einen gnadenlosen Dschungel, um zu &uuml;berleben. Erkunde Welten unter Wasser, voller H&ouml;hlen und verzweigter Tunnelsysteme.\r\n\r\nWerde eins mit dem Dschungel: Schlecht bewaffnet und in Unterzahl, muss Lara den Dschungel zu ihrem Vorteil nutzen. Schlage pl&amp;ouml;tzlich zu und verschwinde sofort wieder, wie ein Jaguar, tarne dich mit Schlamm, und sorge f&uuml;r Angst und Chaos unter deinen Feinden.\r\n\r\nEntdecke dunkle und brutale Gr&auml;ber: Die Gr&auml;ber sind schrecklicher als je zuvor und k&ouml;nnen nur mit komplexen &Uuml;berwindungstechniken erreicht werden &ndash; und wenn du sie betreten hast, erwarten dich t&ouml;dliche R&auml;tsel.\r\n\r\nEntdecke lebendige Geschichte: Finde eine verborgene Stadt, und erkunde die weitl&auml;ufigste Spielwelt, die es je bei Tomb Raider gab.', '44.99', 'Games', 'Adventure', 'https://www.greenmangaming.com/de/games/shadow-of-the-tomb-raider-definitive-edition-pc/'),
(8, 'The Witcher 3: Wild Hunt', 'In den N&ouml;rdlichen K&ouml;nigreichen tobt der Krieg. Du &uuml;bernimmst den wichtigsten Auftrag deines Lebens: die Suche nach dem Kind der Prophezeiung, einer lebendigen Waffe, die den Weltenlauf &auml;ndern wird.', 'Bilder/TheWitcher3WildHunt.jpg', 'The Witcher: Wild Hunt ist ein Rollenspiel mit packender Story und offener Welt in einem grafisch atemberaubenden Fantasy-Universum voller folgenreicher Entscheidungen und einschneidender Konsequenzen. In The Witcher spielst du den professionellen Monsterj&auml;ger Geralt von Riva, dessen Aufgabe es ist, in einer riesigen offenen Welt voller Handelsst&auml;dte, Pirateninseln, gef&auml;hrlicher Gebirgsp&auml;sse und vergessener H&ouml;hlen das Kind der Prophezeiung zu finden.\r\nHAUPT-FEATURES\r\nSPIELE ALS HOCHSPEZIALISIERTER AUFTRAGS-MONSTERSCHL&Auml;CHTER\r\nHexer werden von Kindesbeinen an ausgebildet und Mutationen unterzogen, damit sie &uuml;bermenschliche F&auml;higkeiten, St&auml;rken und Reflexe erlangen. Sie sind die Antwort auf die Monster, die es in ihrer Welt reichlich gibt.\r\n\r\nVernichte deine Gegner als professioneller Monsterj&auml;ger mit einer Reihe von ausbauf&auml;higen Waffen, Mutagenen und Kampfmagie.\r\nJage vielf&auml;ltige exotische Monster von primitiven Bestien, die die Gebirgsp&auml;sse unsicher machen, bis zu &uuml;bernat&uuml;rlichen Raubtieren, die in den Schatten der dichtbev&ouml;lkerten St&auml;dte lauern.\r\nInvestiere deinen Lohn in die Verbesserung deines Waffenarsenals sowie individuelle R&uuml;stungen &ndash; oder gib ihn bei Pferderennen, Kartenspielen, Faustk&auml;mpfen und sonstigen Vergn&uuml;gungen der Nacht aus.', '29.99', 'Games', 'Action', 'https://www.desktopbackground.org/wallpaper/2560x1080-21-9-tv-the-witcher-3-wild-hunt-wallpapers-hd-desktop-439254'),
(10, 'Assassins Creed Valhalla ', 'Eivor f&uuml;hrt die Wikinger eines nordischen Clans &uuml;ber die eisige Nordsee.\r\nHin zu den fruchtbaren L&auml;ndereien der tief gespaltenen K&ouml;nigreiche des damaligen Englands.\r\nSie wollen sich eine neue Heimat errichten &ndash; koste es, was es wolle\r\nVerdiene dir einen Platz unter den G&ouml;ttern in Valhalla.', 'Bilder/AssassinsCreedValhalla.jpg', 'SCHREIBE DEINE EIGENE WIKINGERSAGA &ndash; Dank der umfangreichen RPG-Elemente kannst du die Entwicklung deines Charakters formen und die Welt um dich herum beeinflussen. Mit jeder Entscheidung &ndash; von politischen Allianzen und Kampfstrategien &uuml;ber Dialoge bis hin zu Ausr&uuml;stungsverbesserungen &ndash; ebnest du dir deinen eigenen Weg zum Ruhm. INTUITIVES KAMPFSYSTEM &ndash; Schwinge zwei Waffen gleichzeitig und meistere mit &Auml;xten, Schwertern und Schilden den erbarmungslosen Kampfstil der Wikinger. K&ouml;pfe deine Feinde, vernichte sie aus der Ferne oder schalte sie heimlich mit deiner versteckten Klinge aus. Beweise dein K&ouml;nnen im Kampf gegen die abwechslungsreichste Auswahl t&ouml;dlicher Gegner, die es je in einem Assassin&rsquo;s-Creed-Spiel gab. EINE OFFENE SPIELWELT IM DUNKLEN ZEITALTER &ndash; Segle von der schroffen und geheimnisvollen norwegischen K&uuml;ste zu den atemberaubenden, aber feindseligen K&ouml;nigreichen Englands und weit dar&uuml;ber hinaus. Lebe das Leben der Wikinger: Gehe Fischen und Jagen, nimm an Trinkspielen teil und vieles mehr. F&Uuml;HRE EPISCHE RAUBZ&Uuml;GE AN &ndash; &Uuml;berfalle in riesigen Schlachten s&auml;chsische Truppen und Festungen in ganz England. F&uuml;hre mit deinem Clan von deinem Langschiff aus &Uuml;berraschungsangriffe und pl&uuml;ndere feindliche L&auml;ndereien, um Reicht&uuml;mer und Rohstoffe f&uuml;r deine Leute zu sammeln. ERWEITERE DEINE SIEDLUNG &ndash; Gestalte deine Siedlung mit dem Bau und der Verbesserung von Geb&auml;uden wie Baracken, einem Schmied, einem T&auml;towierer und vielem mehr. Verst&auml;rke deinen Clan mit neuen Mitgliedern und passe deine Wikinger-Erfahrung nach deinen W&uuml;nschen an. WIKINGERS&Ouml;LDLINGE &ndash; Erschaffe und gestalte einen einzigartigen Wikingerkrieger und teile ihn online mit deinen Freunden, damit sie ihn auf ihre eigenen Raubz&uuml;ge mitnehmen k&ouml;nnen.', '69.23', 'Games', 'Action', 'https://www.otto.de/p/assassins-creed-valhalla-playstation-4-1231796650/#variationId=1231796651'),
(11, 'Tell Me Why ', 'Die Zwillinge Tyler und Alyson sehen sich nach zehn Jahren erstmals wieder, um das Haus zu verkaufen, in dem sie aufwuchsen. Doch schnell wird klar, dass ihre Vergangenheit ganz anders ist, als sie sie in Erinnerung haben.', 'Bilder/TellMeWhy.jpg', 'DONTNOD Entertainment, das Entwicklerstudio hinter der beliebten Spielereihe Life is Strange, stellt sein neuestes Story-lastiges Adventure vor: Tell Me Why. In dieser pers&ouml;nlichen Mystery-Geschichte nutzen die Zwillinge Tyler und Alyson Ronan ihre &uuml;bernat&uuml;rliche Verbindung, um die Geheimnisse ihrer schwierigen Kindheit in einer nur scheinbar idyllischen Kleinstadt in Alaska zu l&uuml;ften.', '29.99', 'Games', 'Adventure', 'https://steamcdn-a.akamaihd.net/steam/apps/1180660/header.jpg?t=1604011819'),
(12, 'R&ouml;ki', 'Entdecke die Magie und wage dich durch diese vergessene Welt voller R&auml;tsel und Monster. Finde deinen Mut, entdecke versteckte Pfade, l&ouml;se uralte R&auml;tsel und reise tiefer durch das eisige Land, um die Wahrheit zu erfahren.', 'Bilder/Roeki.jpg', 'Entdecke die Magie und wage dich durch diese vergessene Welt voller R&auml;tsel und Monster. Finde deinen Mut, entdecke versteckte Pfade, l&ouml;se uralte R&auml;tsel und reise tiefer durch das eisige Land, um die Wahrheit zu erfahren.\r\n\r\nWir begeben uns mit Tove auf eine fantastische Reise, um ihre Familie zu retten. Diese Reise f&uuml;hrt sie tief in eine Welt l&auml;ngst vergessener Folklore voller seltsamer Orte und noch seltsamerer Kreaturen.\r\n\r\nErkunde die uralte Wildnis, l&ouml;se die dir auferlegten R&auml;tsel und rette deine Familie in diesem modernen Abenteuerspiel f&uuml;r Jung und Alt.\r\n&bdquo;ERKUNDE einen lebendigen M&auml;rchenwald&ldquo;\r\nErkunde eine abwechslungsreiche, bet&ouml;rende Welt des hohen Nordens voller R&auml;tsel und Monster, die von R&ouml;kis charakteristischem Grafikstil zum Leben erweckt wurde.', '21.99', 'Games', 'Adventure', 'https://steamcdn-a.akamaihd.net/steam/apps/1067540/header.jpg?t=1605858348'),
(15, 'STAR WARS&trade; Battlefront&trade; II: Celebration Edition', 'Sei der Held in der ultimativen STAR WARS&trade;-Kampffantasie &ndash; der neuen STAR WARS&trade; Battlefront&trade; II: Celebration Edition!', 'Bilder/StarWarsBattlefrontII.jpeg', 'Sei der Held in der ultimativen Star Wars&trade;-Kampffantasie &ndash; mit der neuen Star Wars&trade; Battlefront&trade; II: Celebration Edition! Hol dir Star Wars Battlefront II, s&auml;mtliche Anpassungsinhalte, die seit der Ver&ouml;ffentlichung als K&auml;ufe im Spiel verf&uuml;gbar waren, sowie von Star Wars&trade;: DER AUFSTIEG SKYWALKERS&trade;* inspirierte Objekte.<br />\r\n<br />\r\nDie Celebration Edition enth&auml;lt:<br />\r\n<br />\r\n- Hauptspiel &mdash; Einschlie&szlig;lich aller bereits erschienenen und zuk&uuml;nftigen Gratis-Updates des Spiels<br />\r\n- Mehr als 25 Helden-Outfits &mdash; Einschlie&szlig;lich sechs legend&auml;re Outfits und jeweils ein Outfit f&uuml;r Rey, Finn und Kylo Ren aus Star Wars: DER AUFSTIEG SKYWALKERS.<br />\r\n- Mehr als 125 Truppler- und Verst&auml;rkungsoutfits<br />\r\n- Mehr als 100 Helden- und Truppler-Emotes und Dialogzeilen<br />\r\n- Mehr als 70 Siegerposen f&uuml;r Helden und Truppler.<br />\r\n<br />\r\n*Nach dem 20. Dezember 2019 ver&ouml;ffentlichte Anpassungsinhalte sind in der Celebration Edition nicht enthalten.', '39.99', 'Games', 'Science-Fiction', 'https://store.steampowered.com/app/1237950/STAR_WARS_Battlefront_II/'),
(16, 'Halo: The Master Chief Collection', 'Die Halo-Spielereihe erz&auml;hlt die epische Reise des Master Chiefs in sechs Teilen, die hier zu einer einzigen Gesamterfahrung vereint sind, episodisch ver&ouml;ffentlicht und angepasst auf das Spiel am PC.', 'Bilder/HaloMasterChiefCollection.jpg', 'Zum ersten Mal gibt es die Serie, die das Spielen auf Konsole revolutioniert hat, f&uuml;r den PC. Eine epische Blockbuster-Erfahrung in sechs Teilen, die nach und nach zum Verkauf ver&ouml;ffentlicht werden wird. Mit Halo: Reach, Halo: Combat Evolved Anniversary, Halo 2: Anniversary, Halo 3, der Halo 3: ODST-Kampagne und Halo 4. Optimiert f&uuml;r den PC mit Maus- und Tastaturunterst&uuml;tzung und nativen PC-Features bis zu 4k UHD und HDR ist diese Sammlung das, was Halo-Fans sich schon lange gew&uuml;nscht haben.<br />\r\n<br />\r\nUm dem legend&auml;ren Helden dieses epischen Abenteuers gerecht zu werden, bietet The Master Chief Collection den Spielern ihre eigene aufregende Reise durch die Halo-Saga. Beginnend mit dem wagemutigen Noblen Sechs in Halo: Reach und abgeschlossen mit dem Aufstieg eines neuen Feindes in Halo 4, erscheinen die Spiele in der chronologischen Reihenfolge der Geschichte. Nach dem Abschluss der Ver&ouml;ffentlichung wird die Master Chief-Saga 68 Kampagnenmissionen aus allen sechs Spielen umfassen.<br />\r\n<br />\r\nBeginnen Sie Ihr Halo Abenteuer noch heute mit dem legend&auml;ren Halo 3, dem letzten Teil der originalen Halo-Trilogie. Kehren Sie mit dem Master Chief in Halo 2 zu einer entscheidenden Schlacht auf die Erde zur&uuml;ck und entdecken Sie mit ihm ein geheimes Artefakt im Sande Afrikas, welches das Schicksal der Galaxie f&uuml;r immer entscheiden k&ouml;nnte. Erleben Sie den legend&auml;ren Multiplayer mit 24 Karten und den Schmiede- und Kinomodus, in dem Sie eigene Karten erstellen und Spiele aufzeichnen k&ouml;nnen.', '39.99', 'Games', 'Science-Fiction', 'https://store.steampowered.com/app/976730/Halo_The_Master_Chief_Collection/'),
(17, 'Johnny Silverhand Funko Pop! 592 ', '- Sammelfigur<br />\r\n- H&ouml;he ca. 10 cm<br />\r\n- Vinylfigur 592', 'Bilder/FunkoPopJohnnySilverhand.jpg', 'Obermaterial: Vinyl<br />\r\nFranchise: Cyberpunk 2077<br />\r\nErscheinungsdatum: 28.09.2020<br />\r\nFunko-Pop!-Nummer: 592', '12.99', 'Fanartikel', 'Figuren', 'https://www.emp.de/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dwcb58c728/images/4/5/9/1/459114a.jpg?sw=1000&sh=800&sm=fit&sfrm=png'),
(18, 'V-Male Funko Pop! 588', '- Sammelfigur<br />\r\n- H&ouml;he ca. 10 cm<br />\r\n- Vinylfigur 588', 'Bilder/FunkoPopVMale.jpg', 'Obermaterial: Vinyl<br />\r\nFranchise: Cyberpunk 2077<br />\r\nErscheinungsdatum: 28.09.2020<br />\r\nFunkoPop!-Nummer: 588', '14.99', 'Fanartikel', 'Figuren', 'https://www.emp.de/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dwa53eea7d/images/4/5/9/1/459110a.jpg?sw=1000&sh=800&sm=fit&sfrm=png'),
(19, 'V-Female Funko Pop! 591', '- Sammelfigur<br />\r\n- H&ouml;he ca. 10 cm<br />\r\n- Vinylfigur 591<br />\r\n', 'Bilder/FunkoPopVFemale.jpg', 'Obermaterial: Vinyl<br />\r\nFranchise: Cyberpunk 2077<br />\r\nErscheinungsdatum: 30.09.2020<br />\r\nFunko-Pop!-Nummer: 591', '14.99', 'Fanartikel', 'Figuren', 'https://www.emp.de/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dw0837e83b/images/4/5/9/1/459113a.jpg?sw=1000&sh=800&sm=fit&sfrm=png'),
(20, 'Dark Horse Cyberpunk 2077 Male V', 'Franchise:\r\nCyberpunk 2077<br />\r\nMarke:\r\nDark Horse<br />\r\nCharakter Serien:\r\nCyberpunk 2077<br />\r\nCharakter:\r\nMale V', 'Bilder/DarkHorseVMale.jpg', 'Die Spieler machen sich auf den Weg durch die Stra&szlig;en von Night City. Sie werden dies als Cyberpunk mit dem Namen V tun. Die m&auml;nnliche V-Figur, wie sie auf den aktuellen Cyberpunk 2077-Trailern zu sehen ist, kann bald in Ihren Regalen erscheinen.<br />\r\n<br />\r\nDark Horse und CD PROJEKT RED sind Partner, um den Start unserer Figurenreihe aus dem kommenden, mit Spannung erwarteten Spiel Cyberpunk 2077 zu bringen. Jede Figur ist etwa 9,5 Zoll gro&szlig; und hat eine Basis mit dem Samurai-Emblem der fiktiven Nachtstadt Band.', '44.99', 'Fanartikel', 'Figuren', 'https://s1.thcdn.com//productimg/1600/1600/12541798-9314762635221682.jpg'),
(21, 'Dark Horse Cyberpunk 2077 Jackie ', 'Franchise: Cyberpunk 2077<br />\r\nMarke: Dark Horse<br />\r\nCharakter Serien: Cyberpunk 2077<br />\r\nCharakter: Jackie Welles', 'Bilder/DarkHorseJackieWalles.jpg', 'Dark Horse und CD PROJEKT RED sind erneut Partner f&uuml;r die neuesten Erg&auml;nzungen unserer Figurenreihe f&uuml;r das mit Spannung erwartete Spiel Cyberpunk 2077.<br />\r\n<br />\r\nJackie ist ein ehemaliges Mitglied der Valentino-Bande und wird von Freundschaft, Loyalit&auml;t und famili&auml;ren Bindungen angetrieben. Er wird zu Beginn des Spiels ein Begleiter f&uuml;r den Protagonisten V und wird ein dringend ben&ouml;tigter Muskel sein, wenn er mit all den Gefahren und Intrigen von Night City fertig wird. Diese solide Jackie-Figur steht mit einer K&ouml;rpergr&ouml;&szlig;e von ungef&auml;hr 9,75 Zoll auf der Samurai-Basis etwas &uuml;ber den anderen und verf&uuml;gt &uuml;ber seine charakteristischen Tattoos, die Samurai-Jacke und die goldenen Waffen.', '44.99', 'Fanartikel', 'Figuren', 'https://s1.thcdn.com//productimg/1600/1600/12695130-1244803903107205.jpg'),
(22, 'Razer BlackWidow Elite ', 'Premium Mechanical Full-Size Gaming Keyboard (Tastatur mit Razer Green Switches (Taktil &amp; Klickend),Handballenauflage,RGB Chroma Beleuchtung) DE-Layout', 'Bilder/RazerBlackWidowElite.jpg', '- MECHANISCHE SWITCHES VON RAZER: Die extra f&uuml;r Gaming designten Mechanischen Switches von Razer garantieren optimale Ausl&ouml;se- und R&uuml;cksetzungspunkte, damit Befehle exakt und blitzschnell wie gew&uuml;nscht ausgef&uuml;hrt werden<br />\r\n<br />\r\n- MULTIFUNKTIONALER DIGITALER DREHREGLER: Die Razer BlackWidow Elite erm&ouml;glicht die direkte Anpassung von der Helligkeit bis hin zur Lautst&auml;rke per programmierbarem multifunktionalen digitalen Drehregler mit gleich drei taktilen Medientasten<br />\r\n<br />\r\n- ERGONOMISCHE HANDBALLENAUFLAGE: Die Tastatur ist mit einer ergonomischen Handballenauflage ausger&uuml;stet, die per Magnet an der Vorderseite der Tastatur andockt und mit ihrem weichen Kunstleder f&uuml;r optimalen Komfort sorgt<br />\r\n<br />\r\n- VOLLST&Auml;NDIG ANPASSBARE TASTEN: Jede einzelne Taste der Razer BlackWidow Elite l&auml;sst sich frei belegen, sodass sie andere Funktionen &uuml;bernehmen oder per Makro sogar die Funktion mehrerer Tasten gleichzeitig haben kann<br />\r\n<br />\r\n- KONSTRUIERT F&Uuml;R MAXIMALE LANGLEBIGKEIT: Mechanische Switches von Razer bieten <br />\r\neine Top-Leistung und zuverl&auml;ssige Lebensdauer, um absolute H&ouml;chstleistungen beim Gaming zu erm&ouml;glichen', '128.99', 'Hardware', 'Tastaturen', 'https://www.amazon.de/Razer-BlackWidow-Elite-Voll-programmbierbar-Tastaturlayout/dp/B07FS25HBG/ref=sr_1_1?adgrpid=71478103139&dchild=1&gclid=CjwKCAiA2O39BRBjEiwApB2Ikod46l8oj9NvDaQoJMzzday9wueKzs1yTex4NAPRsRn7fE_S1mEJvBoCq74QAvD_BwE&hvadid=352776427825&hvdev=c&hvlocphy=9043402&hvnetw=g&hvqmt=e&hvrand=14218150333974709522&hvtargid=kwd-302819808859&hydadcr=2678_1745687&keywords=razer%2Bblackwidow%2Belite&qid=1606122841&quartzVehicle=802-1348&replacementKeywords=razer%2Bblackwidow&sr=8-1&tag=googhydr08-21&th=1'),
(23, 'Razor Basilisk - Schwarz ', 'Schnell. Pr&auml;zise. T&ouml;dlich. Mit der Razer Basilisk er&ouml;ffnen sich dir v&ouml;llig neue M&ouml;glichkeiten im Bereich FPS. Dank des modernsten optischen Sensors der Welt und Features wie einem Regler zur Anpassung des Mausrad-Widerstands und einer abnehmbaren DPI-Schaltung ist die Razer Basilisk deine ultimative FPS-Maus.', 'Bilder/RazorBasiliskSchwarz.jpg', '- ANPASSBARER MAUSRAD-WIDERSTAND<br />\r\nDas Razer Basilisk ist mit einem Regler ausgestattet, mit dem du den Widerstand des Mausrads anpassen kannst. Dank individuell anpassbarer Empfindlichkeit kannst du noch pr&auml;ziser Bunny Hops ausf&uuml;hren, Waffen ausw&auml;hlen, Gegner anvisieren und andere Aktionen mit dem Mausrad ausf&uuml;hren.<br />\r\n<br />\r\n- ABNEHMBARE DPI-SCHALTUNG<br />\r\nF&uuml;r absolute Kontrolle im richtigen Moment verf&uuml;gt die Razer Basilisk &uuml;ber eine abnehmbare DPI-Schaltung, die es dir in gedr&uuml;cktem Zustand gestattet, vor&uuml;bergehend die Empfindlichkeit anzupassen, um ultra-schnelle Drehungen und noch mehr Pr&auml;zision beim Zielen zu erm&ouml;glichen.<br />\r\n<br />\r\n', '69.99', 'Hardware', 'Maeuse', 'https://assets3.razerzone.com/ueUHI2fZ-6VLYSoyLzzY7Ey-QpQ=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhd1%2Fh5e%2F9081444270110%2Frazer-basilisk-black-gallery-hero-1500x1000.jpg'),
(24, 'SteelSeries Arctis 7 ', 'Arctis 7 ist f&uuml;r PC Gamer das drahtlose Headset des Jahres mit grundsolidem, verlustlosem und drahtloser Verbindung &uuml;ber 2.4GHz, DTS Headphone:X v2.0 Surround Sound und ClearCast, dem besten Mikrofon f&uuml;r das Gaming. Arctis 7 kann drahtlos auf PS4 verwendet werden. Der drahtlose Sender wird an den USB-Anschluss der PS4 angeschlossen und bietet drahtlose Audio- und Mikrofonfunktionen f&uuml;r den Chat. ChatMix und Surround Sound sind auf der PS4 jedoch nicht verf&uuml;gbar.', 'Bilder/SteelSeriesArctis7.jpg', '- F&uuml;r das Gaming designt liefert die Verbindung &uuml;ber 2.4G grundsolides, verlustfreies und drahtloses Audio mit ultraniedriger Latenz und null Interferenz<br />\r\n<br />\r\n- Weithin als bestes Mikrofon f&uuml;r das Gaming anerkannt bietet das von Discord zertifizierte Mikrofon ClearCast einen Stimmenklang in Studioqualit&auml;t und unterdr&uuml;ckt Hintergrundger&auml;usche.Reichweite: 12 m, 40 ft<br />\r\n<br />\r\n- Der Sound ist Ihr Wettbewerbsvorteil &ndash; mit den Lautsprechertreibern S1, konstruiert f&uuml;r extrem geringe Verzerrung beim Audio, damit Sie jedes Detail h&ouml;ren.<br />\r\n<br />\r\n- 360&deg; Pr&auml;zisionsaudio mit dem Surroundsound der n&auml;chsten Generation vom DTS Headphone:X v2.0<br />\r\n<br />\r\n- 24 Stunden Akkulaufzeit bringen genug dauerhafte Spielzeit selbst f&uuml;r die allerl&auml;ngsten Gamingsessions', '154.89', 'Hardware', 'Headsets', 'https://www.amazon.de/SteelSeries-Arctis-verlustfreies-drahtloses-PlayStation/dp/B07GFRPR2D/ref=sr_1_3?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=steelseries+arctis+7&qid=1606122996&quartzVehicle=93-256&replacementKeywords=steelseries+arctis&sr=8-3'),
(25, 'GSP 370 Wireless Gaming Headset', 'Das Wireless Gaming-Headset GSP 370 von Sennheiser bietet dir eine stabile Verbindung mit verz&ouml;gerungsfreier Klang&uuml;bertragung und eine Akkulaufzeit von bis zu 100 Stunden ohne Kompromisse bei Tragekomfort und Klangqualit&auml;t. Der USB Dongle erzeugt eine kabellose Verbindung mit minimaler Latenzzeit, f&uuml;r eine zuverl&auml;ssige &Uuml;bertragung fast ohne Verz&ouml;gerung, womit es sich als ideales Headset f&uuml;r Reaktionsspiele auf PC, Mac und PlayStation 4 anbietet.', 'Bilder/SennheiserGSP370.jpg', '- Bis zu 100 Stunden Akkulaufzeit<br />\r\nDank des geringen Stromverbrauchs und integrierten Akkus mit hoher Leistung erreicht das GSP 370 eine au&szlig;ergew&ouml;hnliche Betriebsdauer von bis zu 100 Stunden: Wer durchschnittlich sechs Stunden pro Woche spielt, kann dieses kabellose Headset vier Monate lang benutzen, bevor er es wieder aufladen muss.<br />\r\n<br />\r\n- Verbindung mit minimaler Latenzzeit<br />\r\nDer USB Dongle erzeugt eine kabellose Verbindung mit minimaler Latenzzeit, f&uuml;r eine zuverl&auml;ssige &Uuml;bertragung fast ohne Verz&ouml;gerung, womit es sich als ideales Headset f&uuml;r Reaktionsspiele auf PC, Mac und PlayStation 4 anbietet.<br />\r\n<br />\r\n- Geschlossenes akustisches Design<br />\r\nDurch das geschlossene akustische Design des GSP 370, das Umgebungsger&auml;usche gro&szlig;enteils ausblendet, kannst du dich vollkommen in die Klangwelt des Spiels vertiefen.<br />\r\n<br />\r\n- Infinity Volume Wheel<br />\r\nDie Audioeinstellungen von Spielen k&ouml;nnen &uuml;ber das Lautst&auml;rkerad an der H&ouml;rmuschel &uuml;bergangslos geregelt werden.<br />\r\n<br />\r\n- Mikrofon mit Ger&auml;uschunterdr&uuml;ckung in Broadcast-Qualit&auml;t<br />\r\nDas GSP 370 verf&uuml;gt &uuml;ber ein ger&auml;uschunterdr&uuml;ckendes Mikrofon in Broadcast-Qualit&auml;t, das durch Anheben des Mikrofonarms stummgeschaltet werden kann.<br />\r\n<br />\r\n- &Uuml;berlegener Komfort<br />\r\nDer Spreizkopfb&uuml;gel und die Ohrpolster aus Memory Foam sorgen f&uuml;r eine bequeme Passform. Ein cleveres Kugelscharnier bringt die Ohrmuscheln automatisch in den f&uuml;r deine Gesichtsform richtigen Winkel, sodass ein sehr hoher Tragekomfort erreicht wird.', '183.28', 'Hardware', 'Headsets', 'https://www.amazon.de/Sennheiser-Funk-Kopfh%C3%B6rer-GSP-Schwarz-Over-Ear/dp/B07Z8J26P2/ref=sr_1_3?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=DJA37OJZSVIC&dchild=1&keywords=gsp+370+wireless+gaming+headset&qid=1606123032&quartzVehicle=80-748&replacementKeywords=gsp+wireless+gaming+headset&sprefix=gsp+370+%2Caps%2C171&sr=8-3'),
(26, 'Razer BlackShark V2 Pro ', 'Das ultimative E-Sport-Gaming-Headset. Jetzt auch kabellos.<br />\r\nWenn man nach der E-Sport-Krone strebt , dann ist unser Headset ideal, da es eine optimale Sprachqualit&auml;t bietet &mdash; inklusive titanbeschichteter Treiber und Headset-Mikrofon in Profi-Qualit&auml;t. Powered by Razer HyperSpeed Wireless &ndash; immer bereit f&uuml;r das Turnier mit dieser ultimativenKombination aus unglaublichem Sound, Sprachqualit&auml;t und Schallisolierung.', 'Bilder/RazorBlackSharkV2.jpg', 'KABELLOSE RAZER HYPERSPEED TECHNOLOGIE<br />\r\nDank einer hohen &Uuml;bermittlungsgeschwindigkeit und extrem geringen Latenzen sorgt unsere branchenf&uuml;hrende kabellose 2,4-GHz-Verbindung f&uuml;r verlustfreien Sound, der immer synchron zum Spiel bleibt, damit niemals etwas Entscheidendes untergeht.<br />\r\n<br />\r\n<br />\r\nRAZER TRIFORCE TITANIUM 50-MM-TREIBER<br />\r\nUnser neues, hoch modernes und eigens entwickeltes Design setzt auf titanbeschichtete Membranen f&uuml;r noch mehr Klarheit. Der Treiber ist zur individuellen Abstimmung von H&ouml;hen, Mitten und Tiefen in drei Teile gegliedert &ndash; noch brillanterer, klarerer Sound mit volleren H&ouml;hen und satteren Tiefen.<br />\r\n<br />\r\n<br />\r\nRAZER HYPERCLEAR SUPERNIEREN-MIKROFON<br />\r\nDas abnehmbare 9,9-mm-Mikrofon unterdr&uuml;ckt St&ouml;rger&auml;usche von hinten und den Seiten, kann Sprache noch besser isolieren und gibt die Stimme noch authentischer wieder. Weitere Anpassungen lassen sich &uuml;ber Razer Synapse vornehmen.<br />\r\n<br />\r\n<br />\r\nNEUSTE PASSIVE RAUSCHUNTERDR&Uuml;CKUNG<br />\r\nVom jubelnden Publikum bis hin zu PC-Ger&auml;uschen, dank der speziellen geschlossenen Ohrmuscheln, welche die Ohren komplett abdecken, werden st&ouml;rende Ger&auml;usche von au&szlig;en herausgefiltert, und die weichen Ohrpolster schlie&szlig;en optimal ab und bieten eine tolle Schallisolierung.<br />\r\n<br />\r\n<br />\r\nULTRA WEICHE POLSTERUNG AUS ATMUNGSAKTIVEM MEMORY-SCHAUMSTOFF<br />\r\nUnser neues atmungsaktives Gewebe sorgt daf&uuml;r, dass du durch so wenig Hautkontakt wie m&ouml;glich weniger schwitzt und sich die Hitze nicht stauen kann, und der ultra weiche Schaumstoff unter dem weichen Kunstleder ist noch weiter verdichtet, damit das Headset noch weniger auf dem Kopf dr&uuml;cken kann.<br />\r\n<br />\r\n<br />\r\nTHX SPATIAL AUDIO<br />\r\nDu kannst die Bewegungen deiner Gegner im Blick behalten und wertvolle Informationen zur jeweiligen Karte sammeln, denn der Surround Sound der n&auml;chsten Generation erweckt das Sound-Design deines Spiels erst richtig zum Leben.<br />\r\n', '199.90', 'Hardware', 'Headsets', 'https://www.amazon.de/Razer-Blackshark-Soundkarte-Kabelgebundene-Rauschunterdr%C3%BCckung/dp/B08DD7DDLP/ref=sr_1_2?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=razer%2Bblackshark&qid=1606123155&sr=8-2&th=1'),
(27, 'Logitech G Pro X Lightspeed', 'Das kabellose PRO X LIGHTSPEED Gaming Headset.<br />\r\n F&uuml;r die H&ouml;chstleistungen gemacht, die du von PRO X erwartest jetzt mit kabelloser LIGHTSPEED Technologie mit 2.4 GHz mit bis zu 20 Stunden und mehr mit einer einzigen Aufladung und einer konsistent zuverl&auml;ssigen kabellosen Verbindung in &uuml;ber 13 Metern Entfernung. Die Blue VOICE Technologie nutzt Echtzeitfilter, damit deine Stimme jederzeit klar und professionell klingt, durch den pr&auml;zisen Surround Sound wei&szlig;t du genau, wo deine Gegner sich befinden, bevor sie dich entdecken. <br />\r\n', 'Bilder/LogitechGPro.jpg', 'KABELLOSE LIGHTSPEED TECHNOLOGIE<br />\r\nDie kabellose LIGHTSPEED Technologie, nur bei Logitech G erh&auml;ltlich, erm&ouml;glicht kabelloses Spielen ohne Abstriche bei Latenz, Verbindungsm&ouml;glichkeiten oder Akku.<br />\r\n<br />\r\nTECHNOLOGIE MICRO BLUE VO! CE<br />\r\nDie BLUE VO!CE Mikrofontechnologie bietet eine Auswahl an Echtzeit-Sprachfiltern. Sie bieten Rauschreduzierung, Komprimierung und De-Essing und sorgen daf&uuml;r, dass die Stimm&uuml;bertragung satter, sauberer und professioneller klingt.<br />\r\n<br />\r\nPRO-G 50-MM-LAUTSPRECHER<br />\r\nPRO-G mit seiner einzigartigen Hybrid-Mesh-Konstruktion liefert erstaunlich klare und pr&auml;zise Klangbilder. Du kannst Schritte und Umgebungshinweise mit unglaublicher Klarheit h&ouml;ren, die dir im Spiel einen eindeutigen Vorteil verschafft.<br />\r\n<br />\r\nNEXT-GEN SURROUND SOUND<br />\r\nDTS Headphone:X 2.0 bietet mehr als 7.1 Kan&auml;le mit verst&auml;rkten Tiefen, klarem Audio und N&auml;herungssignalen. Eine neue Ebene der r&auml;umlichen Klangwiedergabe unterscheidet zwischen Nahfeld- und Fernfeld-Audio, sodass du die Position des Gegners genauer denn je erkennen kannst.<br />\r\n<br />\r\nEXTREM KOMFORTABEL UND STRAPAZIERF&Auml;HIG<br />\r\nSchlankes, minimalistisches Design f&uuml;r professionelle Anspr&uuml;che, f&uuml;r Dauerhaftigkeit konstruiert mit Premium-Aluminiumgabeln und stahlverst&auml;rktem Kopfb&uuml;gel.', '144.90', 'Hardware', 'Headsets', 'https://www.amazon.de/Logitech-LIGHTSPEED-kabelloses-Gaming-Headset-Lautsprecher/dp/B07W5JKB8Z/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=logitech%2Bg%2Bpro%2Bx%2Bkabellos&qid=1606123257&sr=8-1&th=1'),
(28, 'Dell AW3420DW', '34 Zoll, Alienware Gaming Monitor, curved, WQHD 3440 x 1440, 120 Hz, IPS entspiegelt, 16:9, NVIDIA G-Sync, 2 ms, h&ouml;henverstellbar', 'Bilder/DELL_AW3420DW.jpg', 'Die gesamte Bandbreite:<br />\r\nDank der neuen IPS-Nano-Farbtechnologie erleben Sie die Farben mit einer Farbabdeckung von 98 % DCI-P3 so, wie sie von den Erstellern der Inhalten entworfen wurden. Das ist ein professionelles Farbspektrum mit einer gr&ouml;&szlig;eren Bandbreite als sRGB.<br />\r\n<br />\r\nBlitzschnell: <br />\r\nEine realistische Antwortzeit von 2 ms (grau zu grau) mit Overdrive und die Bildwiederholfrequenz von 120 Hz erm&ouml;glichen rasantes, reaktionsschnelles Spielen ohne k&uuml;nstliche Tricks. Die Bildwiederholfrequenz von 120 Hz h&auml;lt mit der Action Schritt, sodass Sie jeden Moment der Welt, in der Sie spielen, erleben k&ouml;nnen.<br />\r\n<br />\r\nEinsatzbereit:<br />\r\n <br />\r\nNVIDIA G-SYNC Technologie zeigt vollst&auml;ndige Frames erst dann an, wenn der Monitor bereit f&uuml;r die Anzeige ist. Das hei&szlig;t, ihre Bildschirm-Frames bleiben mit ihrer NVIDIA-Grafikkarte synchron, sodass keine Verzerrungen &ndash; wie Risse und Artefakte &ndash; mehr auftreten und Sie eine ruckelfreie, lebendige Bildanzeige erhalten.<br />\r\n<br />\r\nAlles sehen: <br />\r\nErleben Sie auf einem &uuml;berragenden geschwungenen 1900R-Displays atemberaubendes Gaming, das Sie tiefer in das Spiel eintauchen l&auml;sst und ein Seitenverh&auml;ltnis von 21:9 bietet, das aus jedem Blickwinkel &uuml;berzeugt. Der geschwungene Bildschirm sorgt f&uuml;r ein maximales Sichtfeld, sodass Sie Ihre Augen weniger bewegen m&uuml;ssen und sich ohne Anstrengung l&auml;nger auf das Spielen konzentrieren k&ouml;nnen.<br />\r\n<br />\r\nWie im richtigen Leben: <br />\r\nDas WQHD-Display mit einer Aufl&ouml;sung von 3.440 x 1.440 bietet mit 4,9 Millionen Pixel &ndash; also 1,79 Mal mehr Details als ein WFHD-Display &ndash; gestochen scharfe, kristallklare Grafik. So wird jeder Grashalm, jedes Aufblitzen von Stahl, jeder Tropfen Schwei&szlig; lebendiger, eindrucksvoller und wirklichkeitsgetreuer als fr&uuml;her dargestellt.', '1109.00', 'Hardware', 'Monitore', 'https://www.amazon.de/Alienware-Curved-Gaming-Monitor-AW3420DW/dp/B07XLN881X/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=Alienware%2BAW3420DW&qid=1606123532&sr=8-1&th=1'),
(29, 'Predator XB273KSbmiprzx G-SYNC', '27 Zoll, 4K IPS Ultra HD, 120 Hz, 16:9, 4 ms, HDMI 2.0, DP 1.4, USB 3.0, Lum 350 cd/m2, integrierte Lautsprecher, DP-Kabel, USB3.0 I. inkl. 3840 x 2160', 'Bilder/PredatorXB273.jpg', 'Der Predator XB273 Monitor ist f&uuml;r Gamer, die sich komplett in das Gaming-Universum eintauchen m&ouml;chten. Die &auml;u&szlig;ere Abschirmung des Monitors reduziert Ablenkungen, w&auml;hrend der Acer ErgoStand Standfu&szlig; den Benutzern die Freiheit bietet, die Bildschirmh&ouml;he zu drehen, zu drehen und zu verstellen, um den optimalen visuellen Komfort zu erzielen. Das XB273 ist auch f&uuml;r die Augenerm&uuml;dung dank des Acer VisionCare Systems, einer Suite von Technologien, die hilft, Ihre Augen bei l&auml;ngeren Gaming-Sessions zu sch&uuml;tzen.', '1442.70', 'Hardware', 'Monitore', 'https://www.amazon.de/Acer-Predator-XB273KSbmiprzx-Display-3840x2160/dp/B07VHCTJKM/ref=sr_1_2?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=xb273k&qid=1606123726&sr=8-2&th=1'),
(30, 'Asus ROG Strix XG279Q', 'ASUS 90LM0420-B01370. Bildschirmdiagonale: 68, 6 cm (27 Zoll), Bildschirmaufl&ouml;sung: 1920 x 1080 Pixel, HD-Typ: Full HD, Bildschirmtechnologie: IPS, Display-Oberfl&auml;che: Matt, Reaktionszeit: 5 ms, Natives Seitenverh&auml;ltnis: 16: 9, Blickwinkel, horizontal: 178&deg;, Blickwinkel, vertikal: 178&deg;. VESA-Halterung. ', 'Bilder/ASUSROGStrix.jpg', 'Dank der G-Sync-Compatible-Zertifizierung liefert der XG279Q ein nahtloses Gaming-Erlebnis ohne Tearing, indem standardm&auml;&szlig;ig eine variable Bildwiederholrate (VRR) zum Einsatz kommt.<br />\r\n<br />\r\nDie ASUS-FastIPS-Technologie erm&ouml;glicht eine Reaktionszeit von 1ms (GTG) f&uuml;r scharfe Gaming-Grafik mit hohen Frameraten.<br />\r\n<br />\r\nDie ASUS-Extreme-Low-Motion-Blur-Sync-Technologie (ELMB SYNC) erm&ouml;glicht die Nutzung von ELMB gleichzeitig mit G-SYNC Compatible, um Ghosting und Tearing zu verhindern.<br />\r\n<br />\r\nDie High-Dynamic-Range(HDR)-Technologie mit professionellem Farbraum liefert einen Kontrast und eine Farbleistung, die den Anforderungen von DCI-P3 95% entspricht', '637.00', 'Hardware', 'Monitore', 'https://www.amazon.de/XG279Q-%C3%BCbertaktbar-Reaktionszeit-kompatibel-DisplayHDR/dp/B083RV3GSY/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=pg27uq&qid=1606123823&sr=8-1'),
(32, 'SteelSeries Apex 7', 'Die mechanische Tasten der Apex 7-Tastatur garantieren 50 Millionen Tastenbet&auml;tigungen. Ein Rahmen aus unzerbrechlicher Aluminiumlegierung l&auml;sst diese mechanische Tastatur hervorstechen.', 'Bilder/SteelSeriesApex7.jpg', 'Design	Hervorragendes Material: Rahmen aus Aluminium in Luftfahrtqualit&auml;t<br />\r\n+	N-Key-Rollover: 104 Tasten<br />\r\n+	Anti-Ghosting: 100 %<br />\r\n+	Beleuchtung: Tasten verf&uuml;gen &uuml;ber dynamische RGB-Beleuchtung<br />\r\n+	H&ouml;he: 40,3 mm, Breite: 437 mm, Tiefe: 139,2 mm<br />\r\n+	Gewicht: 2,1 lbs (952 g)<br />\r\nSchalter	<br />\r\nArt und Name: SteelSeries QX2 linearer mechanischer RGB-Schalter<br />\r\n+	Schalterausl&ouml;sung: 2 mm<br />\r\n+	Gesamtdistanz: 4 mm<br />\r\n+	Kraft: 45 cN<br />\r\n+	Lebenslang: 50 Millionen Tastenklicks<br />\r\n<br />\r\nKompatibilit&auml;t	PC, Mac, Xbox One, PS4. OS: Windows und Mac OS X. USB-Anschluss n&ouml;tig<br />\r\n<br />\r\n+	Software: SteelSeries Engine 3,15+ (demn&auml;chst verf&uuml;gbar) f&uuml;r Windows (7 oder neuer) und Mac OSX (10,11 oder neuer)<br />\r\nVerpackungsinhalt	Apex 7 Gaming-Tastatur, Magnetische Handballenauflage, Produktinformationshandbuch', '172.00', 'Hardware', 'Tastaturen', 'https://www.amazon.de/SteelSeries-Apex-Mechanische-Gaming-Tastatur-Qwertz-Layout/dp/B07SB2MYLW/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=STEELSERIES%2BAPEX%2B7&qid=1606124037&quartzVehicle=93-256&replacementKeywords=steelseries%2Bapex&sr=8-1&th=1'),
(33, 'Roccat Vulcan 120', 'Kabelgebundenes, mechanisches Gaming Keyboard mit innovativen Roccat Titan Switches f&uuml;r anspruchsvollste Gamer. 3,6 mm Schaltweg. ', 'Bilder/RoccatVulcan120.jpg', 'Die mechanische ROCCAT Vulcan Tastatur vereint Geschwindigkeit, Widerstandsf&auml;higkeit und Licht. Die ma&szlig;gefertigten ROCCAT Titan Switches wurden von Grund auf neu entwickelt und bieten schnelle und pr&auml;zise Tastenschl&auml;ge. Eine veredelte Aluminium Deckplatte verst&auml;rkt die Tastatur und sorgt f&uuml;r lange Haltbarkeit, die Schalter sind staubgesch&uuml;tzt.<br />\r\n<br />\r\nAngetrieben von dem AIMO Lichtsystem, sorgen langlebigen LEDs in Kombination mit einer transparenten Fassung der Schalter f&uuml;r eine lebendige und strahlende Einzeltastenbeleuchtung in 16,8 Millionen Farben.<br />\r\n<br />\r\nAls pr&auml;zises Gaming-Werkzeug erschaffen, vereint die Vulcan die Prinzipien deutscher Ingenieurskunst und Design.', '142.30', 'Hardware', 'Tastaturen', 'https://www.amazon.de/Roccat-Vulcan-Einzeltastenbeleuchtung-Aluminiumoberfl%C3%A4che-Multimedia-Tasten/dp/B07D8THG9Y/ref=sr_1_2?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=ROCCAT+VULCAN+120+AIMO&qid=1606124106&sr=8-2'),
(34, 'Logitech G502 Lightspeed', 'Erleben Sie jetzt Gaming mit schnellerer Reaktionszeit und h&ouml;herer Pr&auml;zision dank der G502 Lightspeed mit superschneller kabelloser Konnektivit&auml;t mit einer Signalrate von 1 Millisekunde. Der Hero Sensor der n&auml;chsten Generation bietet un&uuml;bertroffene 16k-DPI-Performance und Energieeffizienz f&uuml;r bis zu 60 Stunden Gaming ohne Unterbrechung. Elf programmierbare Tasten sorgen f&uuml;r optimiertes Gameplay durch benutzerdefinierte Tastenzuweisungen und Makros. Die prim&auml;ren Tasten verf&uuml;gen &uuml;ber eine Metallfederung f&uuml;r schnelle und reibungslose Tastenausl&ouml;sung. ', 'Bilder/LogitechG502.jpg', 'High-Performance-Design: Das neue Design und die integrierte Au&szlig;enh&uuml;lle erm&ouml;glichen eine weitere Reduzierung des Gewichts zur Unterst&uuml;tzung der neuesten Technologien<br />\r\nKabellose LIGHTSPEED Technologie: E-Sport-Profis vertrauen auf das kabellose LIGHTSPEED Technologie-&Ouml;kosystem f&uuml;r erstklassige, ultraschnelle und zuverl&auml;ssige Gaming-Performance<br />\r\nHERO 16K-Sensor: Der professionelle Sensor bietet bis zu 16.000 DPI und pixelgenaue Leistung ohne jegliche Gl&auml;ttung, Filterung oder Beschleunigung<br />\r\n11 Tasten und ein superschnelles Scrollrad: Die Tasten-Metallfederung erm&ouml;glicht schnelle, reibungslose Tastenausl&ouml;sung und das Scrollrad blitzschnelles Durchfliegen von Websites und Dokumenten<br />\r\nSystem zur Gewichtsanpassung: Sechs anpassbare Gewichte f&uuml;r optimierte Abtastung und pixelgenaues Zielen im Spiel<br />\r\nUpgrade auf 25K DPI: Erh&ouml;he die DPI bis zu 25.600, um die weltweit erste Leistung im Submikronbereich freizuschalten. Verf&uuml;gbar f&uuml;r alle M&auml;use mit dem HERO 16K-Sensor &uuml;ber ein G HUB Software-Update', '103.00', 'Hardware', 'Maeuse', 'https://www.amazon.de/Logitech-G502-programmierbare-PC-Computermaus-Deutsche-Verpackung/dp/B07QNYCLBJ/ref=sr_1_2?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=12YHP066JN1T8&dchild=1&keywords=g502%2Blightspeed&qid=1606124615&sprefix=g502%2Blight%2Caps%2C195&sr=8-2&th=1');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`ID_Bestellung`);

--
-- Indizes für die Tabelle `bestellung_produkt`
--
ALTER TABLE `bestellung_produkt`
  ADD KEY `ID_Bestellung` (`ID_Bestellung`),
  ADD KEY `ID_Produkt` (`ID_Produkt`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`ID_Kunde`);

--
-- Indizes für die Tabelle `kunde_bestellung`
--
ALTER TABLE `kunde_bestellung`
  ADD KEY `ID_Kunde` (`ID_Kunde`),
  ADD KEY `ID_Bestellung` (`ID_Bestellung`);

--
-- Indizes für die Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`ID_Mitarbeiter`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ID_Produkt`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `ID_Bestellung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `ID_Kunde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `ID_Mitarbeiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID_Produkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellung_produkt`
--
ALTER TABLE `bestellung_produkt`
  ADD CONSTRAINT `bestellung_produkt_ibfk_1` FOREIGN KEY (`ID_Produkt`) REFERENCES `produkt` (`ID_Produkt`),
  ADD CONSTRAINT `bestellung_produkt_ibfk_2` FOREIGN KEY (`ID_Bestellung`) REFERENCES `bestellung` (`ID_Bestellung`);

--
-- Constraints der Tabelle `kunde_bestellung`
--
ALTER TABLE `kunde_bestellung`
  ADD CONSTRAINT `kunde_bestellung_ibfk_1` FOREIGN KEY (`ID_Bestellung`) REFERENCES `bestellung` (`ID_Bestellung`),
  ADD CONSTRAINT `kunde_bestellung_ibfk_2` FOREIGN KEY (`ID_Kunde`) REFERENCES `kunde` (`ID_Kunde`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
