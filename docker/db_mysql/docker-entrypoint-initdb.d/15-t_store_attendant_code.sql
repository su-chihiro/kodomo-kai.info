--
-- テーブルの構造 `t_store_attendant_code`
--

CREATE TABLE `t_store_attendant_code` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `attendant_code` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_store_attendant_code`
--
ALTER TABLE `t_store_attendant_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`),
  ADD KEY `store_id_idx` (`store_id`(3)),
  ADD KEY `attendant_code_idx` (`attendant_code`(7));

--
-- AUTO_INCREMENT for table `t_store_attendant_code`
--
ALTER TABLE `t_store_attendant_code`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
