--
-- テーブルの構造 `m_app_version`
--

CREATE TABLE `m_app_version` (
  `id` int(10) UNSIGNED NOT NULL,
  `os_type` tinyint(3) UNSIGNED NOT NULL,
  `app_version` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os_version` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `m_app_version`
--

INSERT INTO `m_app_version` (`id`, `os_type`, `app_version`, `os_version`, `create_date`, `update_date`) VALUES
(1, 2, '1.3.1', '10', '2019-03-01 19:31:06', '2019-03-01 19:31:06'),
(2, 1, '1.3.1', '23', '2019-03-01 19:31:10', '2019-03-01 19:31:10');

--
-- Indexes for table `m_app_version`
--
ALTER TABLE `m_app_version`
  ADD PRIMARY KEY (`id`),
  ADD KEY `os_type` (`os_type`);

--
-- AUTO_INCREMENT for table `m_app_version`
--
ALTER TABLE `m_app_version`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
