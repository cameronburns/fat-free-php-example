-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2017 at 12:19 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdcprevi_ff`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `subject`, `content`, `fromid`, `toid`, `viewed`) VALUES
(11, 'Opening of Sales Manager for the Marketing Department', 'Dear Mr. Webber,\r\n\r\nI would like to inform you that North Dakota Investment currently has an opening for the position of Sales Manager for the marketing department. I am providing you with the details of our organization and the job role below. Please also find an interview form attached which you need to fill and mail us.\r\n\r\nNorth Dakota Investment is a company providing investment-banking solution to clients since it was established on 20th June, 1974.\r\n\r\nThe job role of the Sales Manager will be to supervise the activities of the marketing department. He needs to keep a tab of the monthly target and have to ensure that the targets are being met. If required he has to directly contact the client to discuss the company benefits.\r\n\r\nWe are conducting an interview on 20th December, 2010 at the office premise. If you are interested, do come down with an updated copy of your resume.\r\n\r\nWith regards,\r\n\r\nAnna Smith\r\n\r\nRecruitment Manager.', 1, 1, 0),
(12, 'This is an email', 'Mr. Smith,\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper lacus ac aliquam imperdiet. Cras porta accumsan tortor, eu rutrum nisi dapibus quis. Aliquam et tempus erat. Cras cursus nunc in nisl blandit tristique. Cras a ipsum non eros hendrerit maximus non et diam. Integer in dui diam. Suspendisse gravida dolor et sem interdum egestas. Mauris accumsan vehicula ante, ut tincidunt dolor rutrum ac.\r\n\r\nFusce in elit ac est mollis venenatis. Pellentesque quis felis feugiat tellus imperdiet molestie nec vel ex. Phasellus erat turpis, egestas at tincidunt nec, pretium eget urna. Morbi auctor magna non neque auctor, fermentum tincidunt nulla pretium. Nulla eget lacus in lorem laoreet dignissim. Maecenas consequat sodales nunc nec gravida. Donec nec pretium arcu. Maecenas tempus nunc non sollicitudin malesuada. Duis ante leo, imperdiet molestie massa et, facilisis iaculis arcu.\r\n\r\nBest Wishes\r\nMr Manager', 1, 1, 0),
(13, 'Hello Bob', 'Hi Bob,\r\n\r\nNullam vel nulla tempus, iaculis tortor sed, congue lacus. Suspendisse aliquam lobortis orci, at tincidunt dui posuere convallis. Donec ipsum leo, malesuada a blandit sit amet, tempor ut leo. Integer tincidunt sit amet purus vitae facilisis. Nam nec vestibulum eros, ac pretium odio. Proin efficitur quam in aliquet tincidunt. Nulla feugiat congue lectus. Maecenas pharetra massa ac sagittis rhoncus. Aliquam non lorem lacinia, luctus massa in, efficitur ligula. Phasellus volutpat eros non sodales dignissim. Pellentesque ut elementum turpis. Praesent semper mauris in dolor blandit, nec porttitor elit ornare. Sed convallis ipsum et quam tincidunt, a sodales turpis pulvinar.\r\n\r\nMaecenas commodo malesuada odio, non consectetur nunc dapibus a. Nam nisl augue, semper lobortis sollicitudin at, pulvinar vel lectus. Nullam tempus magna sed libero pharetra, sit amet posuere metus laoreet. Sed tellus massa, lacinia in viverra sed, viverra id leo. Suspendisse elit metus, dictum vitae luctus a, iaculis nec magna. Phasellus pellentesque efficitur tortor nec mollis. Pellentesque ultrices lacinia velit, in egestas orci ornare at. Vivamus scelerisque rutrum dolor, sed porttitor arcu tincidunt vitae. Aliquam varius congue nisl eu condimentum. Vestibulum quis augue venenatis, faucibus nisl ut, dignissim libero. Quisque nec vestibulum urna, vel lobortis risus. Suspendisse congue orci erat, sit amet imperdiet elit ultricies vitae.\r\n\r\nCam', 1, 2, 0),
(15, 'Generic Spam Email', 'Mr Burns!!!\r\n\r\nBuy THIS!!\r\n\r\nDuis viverra imperdiet ex nec ultrices. Curabitur feugiat aliquam leo, vel hendrerit arcu gravida vestibulum. Duis fringilla pharetra quam, rhoncus sollicitudin risus lacinia at. Nunc bibendum suscipit nunc, vel venenatis lorem ultrices nec. Nam sem sem, eleifend id purus non, ornare accumsan lacus. In arcu eros, pellentesque nec purus quis, ultrices efficitur nunc. In rutrum blandit blandit.\r\n', 1, 1, 0),
(16, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum malesuada lorem vel odio luctus, et pretium leo ultrices. Cras sodales felis ac fringilla condimentum. Morbi sed ex ipsum. Fusce vitae pretium odio. Morbi molestie, sem vitae semper porta, metus erat interdum justo, quis ultricies lorem nibh quis diam. In varius ultrices magna, vel euismod libero molestie at. Sed facilisis magna diam, in tempor nisi maximus vel. In mollis, est ac porta tempus, ligula est condimentum enim, et sodales sem metus in velit. Aenean sit amet egestas nunc. Nunc hendrerit mauris in diam mollis pharetra. Quisque facilisis a justo sit amet venenatis. Sed venenatis luctus nunc vitae auctor. Duis at erat dignissim, dignissim purus non, ultricies turpis.\r\n\r\nQuisque vestibulum augue sit amet ornare bibendum. Donec viverra fringilla vehicula. Sed mattis lobortis nisl pretium ornare. Pellentesque a nulla maximus, gravida turpis quis, finibus mi. Praesent dapibus, elit vel lobortis iaculis, ex magna rutrum ante, scelerisque venenatis nulla dolor non purus. Mauris tincidunt arcu nec massa consectetur, eget lobortis ipsum elementum. Nam viverra eget massa at congue. Fusce non consectetur justo. Donec a viverra magna. Nullam convallis erat elit, vel congue mi auctor dapibus. Nulla a massa sit amet eros auctor dignissim ut a sapien. Mauris pretium luctus dictum. Nulla facilisi.', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'cam', '$2y$10$bTgIk0U4lELYV72X5DqJe.OsMgh570fbwr2M/ynFwN8WsWIWr3cdi'),
(2, 'bob', '$2y$10$bTgIk0U4lELYV72X5DqJe.OsMgh570fbwr2M/ynFwN8WsWIWr3cdi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
