-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Mar 2022, 16:01
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(1) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `brand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `contact_info`
--

INSERT INTO `contact_info` (`id`, `phone`, `mail`, `address`, `brand`) VALUES
(1, '900900900', 'email@gmail.com', 'ul. Bazodanowa 13, Stare Dane, 00-071', 'Arek1234');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `layout`
--

CREATE TABLE `layout` (
  `mainColor` varchar(7) NOT NULL DEFAULT '#343a40',
  `fontColor` varchar(7) NOT NULL DEFAULT '#000000',
  `bgColor` varchar(7) NOT NULL DEFAULT '#ffffff',
  `footerColor` varchar(7) NOT NULL DEFAULT '#000000',
  `footerBgColor` varchar(7) NOT NULL DEFAULT '#ffffff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `layout`
--

INSERT INTO `layout` (`mainColor`, `fontColor`, `bgColor`, `footerColor`, `footerBgColor`) VALUES
('#383333', '#212121', '#c4c4c4', '#00ff88', '#005205');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `navigation` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `inner_HTML` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `robots` varchar(20) NOT NULL,
  `position` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `name`, `navigation`, `title`, `description`, `inner_HTML`, `url`, `robots`, `position`) VALUES
(1, 'Strona główna', 0, 'Strona główna w moim systemie CMS', 'Tą stronę można edytować w panelu administratora. Jest to główna strona tego serwisu internetowego.', '<h1>Strona gł&oacute;wna</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis nibh purus, aliquam dictum nibh mattis eget. Nullam ut mi semper, volutpat quam sit amet, lobortis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque tempor eu justo id vulputate. Curabitur non imperdiet justo. Vestibulum vel dignissim nisi. Nunc mollis mollis quam a aliquam. Suspendisse tellus nunc, viverra eu enim sed, tristique maximus arcu. Sed faucibus felis lorem, eu mattis mauris molestie eu. Donec erat quam, tristique nec felis in, euismod rhoncus neque. Curabitur molestie dui arcu, id volutpat nulla posuere vitae. Maecenas auctor vel dui et luctus. In tortor eros, rutrum sit amet ante sit amet, molestie bibendum mi.</p>\r\n\r\n<h2>Chapter 2</h2>\r\n\r\n<p>Nunc mollis mollis quam a aliquam. Suspendisse tellus nunc, viverra eu enim sed, tristique maximus arcu. Sed faucibus felis lorem, eu mattis mauris molestie eu. Donec erat quam, tristique nec felis in, euismod rhoncus neque. Curabitur molestie dui arcu, id volutpat nulla posuere vitae. Maecenas auctor vel dui et luctus. In tortor eros, rutrum sit amet ante sit amet, molestie bibendum mi.</p>\r\n', 'strona-glowna', 'index, follow', 0),
(2, 'Kontakt', 1, 'Kontakt', 'Znajdziesz tutaj wszystkie informacje kontaktowe o naszej firmie. Zapraszamy!', '<h1>Kontakt</h1>\r\n\r\n<p>Adres:</p>\r\n\r\n<p>ul. Bazodanowa 13,</p>\r\n\r\n<p>Stare Dane, 00-071</p>\r\n\r\n<p>email@gmail.com</p>\r\n\r\n<p>tel. 900 900 900</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.istockphoto.com/photos/planet-earth-with-some-clouds-americas-view-picture-id186019678?k=20&amp;m=186019678&amp;s=612x612&amp;w=0&amp;h=E9ZFggtDpeOkSlOBg8QgdaOoq5xsOunmBCNMGc2VNFg=\" style=\"height:300px; width:300px\" /></p>\r\n', 'kontakt', 'index, follow', 4),
(8, 'O nas', 1, 'Firma - wieloletnie doświadczenie w branży CMS', 'Nasza firma cechuje się najlepszymi specjalistami na rynku oraz konkurencyjnymi cenami. Tylko u nas znajdziesz tak dobry stosunek ceny do jakości usług!', '<p>Firma powstała z pasji do nowych technologii. Do dzielenia się naszą wiedzą. Do projektowania i tworzenia użytecznych i nowoczesnych rozwiązań dla Was - naszych klient&oacute;w.</p>\r\n\r\n<p>Nunc ultrices dictum tellus, sed accumsan quam. Quisque euismod mattis efficitur. Praesent nisl neque, ornare sed neque eu, dictum elementum purus. Sed et dui feugiat, mollis felis eget, vehicula tortor. Praesent sed tempor nibh. Nam sit amet nibh eget mi tempus tristique non vel felis. Nunc in gravida dui. Integer venenatis eu felis quis tristique. Ut non nunc convallis, iaculis felis a, egestas nibh. Curabitur vitae suscipit nulla. Pellentesque augue lorem, viverra vitae leo quis, consequat lacinia dolor. Cras congue porta semper.</p>\r\n\r\n<p>Phasellus augue arcu, vehicula sit amet eros sit amet, feugiat interdum ligula. Quisque eget eros vel turpis tempus ullamcorper. Vivamus leo enim, porta et lacus et, faucibus elementum mauris. Nunc at tellus faucibus est vehicula molestie non at orci. Nulla sit amet elit vitae odio sollicitudin fringilla a vitae enim. Mauris molestie sem ut metus egestas imperdiet. Proin iaculis mi vitae turpis lacinia congue. Donec sed lacinia libero. Phasellus nec ex nibh. Donec eu tristique dui, id ultrices orci. Nam ex ipsum, euismod viverra tincidunt tincidunt, dignissim et arcu. Nullam vulputate justo euismod, consequat justo eget, commodo augue. Etiam ut porttitor massa.</p>\r\n\r\n<p>Etiam a lorem congue, tempor enim non, iaculis nibh. Phasellus convallis eros in feugiat sodales. Sed fringilla sapien ac sapien mattis porttitor. Nam consequat accumsan tempor. Maecenas condimentum nunc et quam vehicula, id sollicitudin nulla consectetur. Curabitur luctus ipsum augue, nec euismod nisl condimentum ac. Nullam augue mi, dignissim sed viverra vitae, tincidunt vel massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque in tortor lacus. Vivamus et lorem velit. Pellentesque euismod in erat quis convallis. Cras ac mi sed tortor rutrum lacinia.</p>\r\n', 'o-nas', 'index, follow', 0),
(9, 'Testowa', 1, 'Testowa strona w CMS', 'Meta description, czyli opis strony powinien zawierać od 140 do 180 znaków. Ten przykładowy tekst spełnia to kryterium, składa się dokładnie z 154 znaków.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut erat leo. Proin vitae facilisis felis. Ut quis quam facilisis, hendrerit nibh at, ornare ante. Suspendisse vel ipsum non lectus cursus gravida eu varius arcu. Duis vitae erat eu nunc cursus auctor. Morbi egestas dui elit, ac blandit nibh lacinia ac. Integer dapibus enim eros, vitae lacinia odio placerat tincidunt.</p>\r\n\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac finibus urna. Suspendisse dignissim congue pellentesque. Donec id enim nibh. Donec et convallis arcu. Curabitur id enim turpis. Nulla fermentum non dui a consectetur. Praesent sodales tortor vitae malesuada auctor. Pellentesque in pretium dolor. Vestibulum bibendum diam massa, a facilisis orci rhoncus vel. Sed id lobortis ex, id volutpat tellus. Aliquam erat volutpat. Morbi et ligula sagittis, lacinia risus vitae, elementum est. Etiam finibus ut ligula in consectetur. Pellentesque augue ipsum, gravida nec dolor et, semper porta ante.</p>\r\n\r\n<p>Nunc ultrices dictum tellus, sed accumsan quam. Quisque euismod mattis efficitur. Praesent nisl neque, ornare sed neque eu, dictum elementum purus. Sed et dui feugiat, mollis felis eget, vehicula tortor. Praesent sed tempor nibh. Nam sit amet nibh eget mi tempus tristique non vel felis. Nunc in gravida dui. Integer venenatis eu felis quis tristique. Ut non nunc convallis, iaculis felis a, egestas nibh. Curabitur vitae suscipit nulla. Pellentesque augue lorem, viverra vitae leo quis, consequat lacinia dolor. Cras congue porta semper.</p>\r\n', 'testowa', 'noindex, nofollow', 2),
(18, 'strona', 0, 'Przykładowy tytuł', 'Przykładowy opis', '<p>Strona w przygotowaniu</p>\r\n', 'strona', 'index, follow', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
