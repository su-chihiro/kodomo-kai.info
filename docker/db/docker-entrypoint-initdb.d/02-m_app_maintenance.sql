DROP SCHEMA IF EXISTS Ipoca;
CREATE SCHEMA Ipoca;
USE Ipoca;

--
-- テーブルの構造 `m_app_maintenance`
--

CREATE TABLE `m_app_maintenance` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_begin` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `update_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='利用者のアプリバージョン情報';

--
-- テーブルのデータのダンプ `m_app_maintenance`
--

INSERT INTO `m_app_maintenance` (`id`, `time_begin`, `time_end`, `image_url`, `image_link`, `message`, `update_date`, `create_date`) VALUES
(1, '2019-04-29 00:00:00', '2019-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for table `m_app_maintenance`
--
ALTER TABLE `m_app_maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`);

--
-- AUTO_INCREMENT for table `m_app_maintenance`
--
ALTER TABLE `m_app_maintenance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
