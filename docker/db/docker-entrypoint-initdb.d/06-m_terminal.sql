--
-- テーブルの構造 `m_terminal`
--

CREATE TABLE `m_terminal` (
  `id` int(10) UNSIGNED NOT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_terminal`
--

INSERT INTO `m_terminal` (`id`, `terminal_id`) VALUES
(66, 1066);

--
-- Indexes for table `m_terminal`
--
ALTER TABLE `m_terminal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`);

--
-- AUTO_INCREMENT for table `m_terminal`
--
ALTER TABLE `m_terminal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
