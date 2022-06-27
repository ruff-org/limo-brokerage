
--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` int(11) NOT NULL DEFAULT 0,
  `total_cost` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `reservations`
--

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservation_number` (`reservation_number`);


--
-- AUTO_INCREMENT for table `reservations`
--

ALTER TABLE `reservations`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;