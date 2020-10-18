--
-- テーブルの構造 `t_app_campaign`
--

CREATE TABLE `t_app_campaign` (
  `id` bigint(20) NOT NULL,
  `campaign_id` int(8) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  `notify_time` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='プッシュ通知情報\r\n\r\n配信日時情報、配信状況など。';

--
-- Indexes for table `t_app_campaign`
--
ALTER TABLE `t_app_campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`);

-- --
-- -- テーブルの制約 `t_app_campaign`
-- --
-- ALTER TABLE `t_app_campaign`
--   ADD CONSTRAINT `t_app_campaign_ibfk_1` FOREIGN KEY (`id`) REFERENCES `t_app_info` (`id`) ON DELETE CASCADE;
