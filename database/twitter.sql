-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Mar 2017, 11:34
-- Wersja serwera: 5.7.17
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twitter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comment`
--

CREATE TABLE `Comment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `text` varchar(60) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Comment`
--

INSERT INTO `Comment` (`id`, `userId`, `postId`, `creationDate`, `text`) VALUES
(5, 4, 76, '2017-03-06 12:15:03', 'sdaadad'),
(6, 4, 75, '2017-03-06 12:16:38', 'ble ble ble'),
(7, 4, 76, '2017-03-06 12:16:45', 'bla bla bla'),
(8, 5, 76, '2017-03-06 12:17:53', 'beata koment'),
(9, 5, 75, '2017-03-06 12:18:04', 'beata koment'),
(10, 5, 76, '2017-03-06 14:22:44', 'asdasdasd'),
(11, 5, 76, '2017-03-06 14:40:32', 'zacznij pisac mÄ…dre kom'),
(12, 13, 76, '2017-03-06 14:46:10', 'komencik od Anny'),
(13, 19, 77, '2017-03-14 20:41:35', 'lsakdasjlaskjl'),
(14, 19, 77, '2017-03-14 20:41:49', 'koskdoaskdaosdajsoasdajl'),
(15, 19, 76, '2017-03-14 20:42:03', 'dsaldksjdlaskdk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Message`
--

CREATE TABLE `Message` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `messageFrom` int(11) NOT NULL,
  `readed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Message`
--

INSERT INTO `Message` (`id`, `userId`, `creationDate`, `text`, `messageFrom`, `readed`) VALUES
(5, 19, '2017-03-14 13:22:30', 'test message', 20, 0),
(6, 20, '2017-03-14 13:24:03', 'test 2', 19, 1),
(7, 19, '2017-03-14 15:10:38', 'test wiadomoÅ›ci', 20, 0),
(8, 19, '2017-03-14 15:14:31', 'test kolejny', 20, 0),
(9, 20, '2017-03-14 15:15:04', 'tescik kolejny', 20, 1),
(10, 19, '2017-03-14 15:15:17', 'i kolejna', 20, 0),
(11, 2, '2017-03-14 15:16:50', 'tescik kolejny', 20, 1),
(12, 20, '2017-03-14 15:20:02', 'test kolorkÃ³w', 20, 1),
(13, 2, '2017-03-14 15:20:41', 'i kolejny', 20, 1),
(14, 20, '2017-03-14 15:23:16', 'wiadomoÅ›c od j do K', 19, 1),
(15, 20, '2017-03-15 11:17:20', 'test wiad', 19, 1),
(16, 19, '2017-03-15 11:41:43', '', 19, 1),
(17, 19, '2017-03-15 11:42:47', 'wiadomsoc testowa sama do siebie', 19, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `text` varchar(160) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `creationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(48, 2, 'weqweqw', '2017-02-22 16:34:52'),
(49, 2, 'weqweqw', '2017-02-22 16:35:49'),
(50, 2, '42324343', '2017-02-22 16:35:57'),
(51, 2, '42324343', '2017-02-22 16:37:41'),
(52, 2, 'adsdsds', '2017-02-22 16:37:47'),
(53, 3, 'adsadsdfkdfdla', '2017-02-23 09:30:54'),
(54, 3, 'dfsmjdfsdnmfsdfnk', '2017-02-23 09:31:02'),
(55, 3, 'dasdasd', '2017-02-23 11:00:53'),
(56, 3, 'to jest prÃ³ba tweeta', '2017-02-23 11:07:31'),
(57, 3, 'bla bla tweeter', '2017-02-23 11:08:34'),
(58, 3, '33ewqweq', '2017-02-23 11:21:50'),
(59, 3, 'dfdfsser43354454', '2017-02-23 11:22:13'),
(60, 3, 'sdasdas', '2017-02-23 11:22:46'),
(61, 3, 'dasds', '2017-02-23 11:29:40'),
(62, 3, 'sdaasddas', '2017-02-23 13:40:05'),
(63, 3, 'faslkdfjslkfjsdlkfjashdlfkjashdlkfjhdslfkjsahldfkjdhlkasjhdlksjfah', '2017-02-23 13:49:52'),
(64, 3, 'weqweqweqw', '2017-02-24 09:52:42'),
(65, 5, 'adasdasdkasd', '2017-02-24 11:24:04'),
(66, 4, 'sdasdsdkasdajsd', '2017-02-24 11:25:09'),
(67, 4, 'asdasdas', '2017-02-24 14:00:31'),
(68, 5, 'dssgdafsag\r\n\r\n', '2017-02-24 16:06:52'),
(69, 5, 'dakfjsdhfkajsdfhksdjfhksdjhfdkhadjfjkasdakjs\r\n', '2017-02-24 16:07:02'),
(70, 5, 'dsadasdasddasd', '2017-02-24 16:07:42'),
(75, 5, 'tweet od beata\r\n', '2017-03-03 11:51:44'),
(76, 5, 'znow beata', '2017-03-03 12:00:55'),
(77, 19, 'asldkasdalsdkasjlkj', '2017-03-14 20:41:28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `hashed_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `email`, `username`, `hashed_password`) VALUES
(2, 'dominik@mail.pl', 'Dominik', '$2y$10$8JlbE8336PPVn76jybujfuiT8tIcjWYF9BDc73.p2i1xPR18.03n2'),
(3, 'ania@mail.com', 'ania', '$2y$10$kH96LvwiHxFUOZ1jrrTzIey9NccfYjSc6nMAojxB2CMKgrJu4W/5a'),
(4, 'adam@adam.pl', 'adam', 'f7f376a1fcd0d0e11a10ed1b6577c99784d3a6bbe669b1d13fae43eb64634f6e'),
(5, 'beata@beata.pl', 'beata', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(6, 'emil@emil.pl', 'emil', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(19, 'j@j.pl', 'j', '189f40034be7a199f1fa9891668ee3ab6049f82d38c68be70f596eab2e1857b7'),
(20, 'k@k.pl', 'k', '8254c329a92850f6d539dd376f4816ee2764517da5e0235514af433164480d7a');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `messageFrom` (`messageFrom`);

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `Tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`messageFrom`) REFERENCES `Users` (`id`);

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
