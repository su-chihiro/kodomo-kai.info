--
-- テーブルの構造 `t_user_info`
--

CREATE TABLE `t_user_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_read_id` int(11) NOT NULL DEFAULT '0',
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_user_info`
--
ALTER TABLE `t_user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`);

-- --
-- -- テーブルの制約 `t_user_info`
-- --
-- ALTER TABLE `t_user_info`
--   ADD CONSTRAINT `t_user_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `t_user` (`id`) ON DELETE CASCADE;
