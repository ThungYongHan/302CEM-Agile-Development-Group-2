--
-- Database: `GameReviewWebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `use` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'jonathanang4978@gmail.com', 'Jayl4978');

-- --------------------------------------------------------
--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;