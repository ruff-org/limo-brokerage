--
-- Table structure for table `magic_links`
--

CREATE TABLE `magic_links` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for table `magic_links`
--
ALTER TABLE `magic_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for table `magic_links`
--
ALTER TABLE `magic_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

