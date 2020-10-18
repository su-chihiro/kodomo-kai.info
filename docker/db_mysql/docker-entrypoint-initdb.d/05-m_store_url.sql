--
-- テーブルの構造 `m_store_url`
--

CREATE TABLE `m_store_url` (
  `store_id` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `api_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `app_id` int(4) NOT NULL,
  `buyorder_image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `preorder_image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `min_orderno` int(4) NOT NULL,
  `max_orderno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- テーブルのデータのダンプ `m_store_url`
--

INSERT INTO `m_store_url` (`store_id`, `api_url`, `app_id`, `buyorder_image_url`, `preorder_image_url`, `min_orderno`, `max_orderno`) VALUES
('0', 'http://18.182.8.113/app/quickapiv2', 400, 'http://10.100.2.191/app/quickmanagement900', 'https://www.tfservice.jp/app/quickapi/quick', 9001, 9999),
('900', 'http://18.182.8.113/app/quickapiv2', 400, 'http://10.100.2.191/app/quickmanagement900', 'https://www.tfservice.jp/app/quickapi/quick', 9001, 9999);

--
-- Indexes for table `m_store_url`
--
ALTER TABLE `m_store_url`
  ADD PRIMARY KEY (`store_id`);