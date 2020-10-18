--
-- テーブルの構造 `t_app_store_catalog`
--

CREATE TABLE `t_app_store_catalog` (
  `store_id` varchar(10) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_app_store_catalog`
--
ALTER TABLE `t_app_store_catalog`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `store_id_idx` (`store_id`(3));
