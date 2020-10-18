--
-- テーブルの構造 `t_store_terminal`
--

CREATE TABLE `t_store_terminal` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL,
  `card_id` bigint(13) UNSIGNED DEFAULT '0',
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_store_terminal`
--
ALTER TABLE `t_store_terminal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`),
  ADD KEY `store_id_idx` (`store_id`(3));

--
-- AUTO_INCREMENT for table `t_store_terminal`
--
ALTER TABLE `t_store_terminal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
