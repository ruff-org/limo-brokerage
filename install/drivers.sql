--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_limit` int(11) NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `drivers`
--

ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;