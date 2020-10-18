--
-- テーブルの構造 `t_kitchen_notification`
--

CREATE TABLE `t_kitchen_notification` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `card_id` bigint(13) NOT NULL,
  `device_token` text NOT NULL,
  `store_id` varchar(10) NOT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_kitchen_notification`
--
ALTER TABLE `t_kitchen_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `t_kitchen_notification`
--
ALTER TABLE `t_kitchen_notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
