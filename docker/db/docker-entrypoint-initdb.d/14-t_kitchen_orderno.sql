--
-- テーブルの構造 `t_kitchen_orderno`
--

CREATE TABLE `t_kitchen_orderno` (
  `order_type` tinyint(1) NOT NULL,
  `store_id` varchar(10) NOT NULL,
  `order_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_kitchen_orderno`
--

INSERT INTO `t_kitchen_orderno` (`order_type`, `store_id`, `order_no`) VALUES
(1, '900', 9000);

--
-- Indexes for table `t_kitchen_orderno`
--
ALTER TABLE `t_kitchen_orderno`
  ADD PRIMARY KEY (`order_type`,`store_id`,`order_no`);
