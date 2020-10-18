--
-- テーブルの構造 `t_kitchen_sendhistory`
--

CREATE TABLE `t_kitchen_sendhistory` (
  `store_id` varchar(10) NOT NULL,
  `orderdate` datetime NOT NULL,
  `orderno` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのインデックス `t_kitchen_sendhistory`
--
ALTER TABLE `t_kitchen_sendhistory`
  ADD PRIMARY KEY (`store_id`,`orderdate`,`orderno`);