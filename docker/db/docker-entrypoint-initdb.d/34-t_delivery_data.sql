--
-- テーブルの構造 `t_delivery_data`
--

CREATE TABLE `t_delivery_data` (
  `delivery_cd` int(11) NOT NULL COMMENT '配達担当者CD',
  `store_id` int(11) NOT NULL COMMENT '店舗NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `t_delivery_data`
--

INSERT INTO `t_delivery_data` (`delivery_cd`, `store_id`) VALUES
(10065035, 900),
(10116678, 903);

--
-- テーブルのインデックス `t_delivery_data`
--
ALTER TABLE `t_delivery_data`
  ADD PRIMARY KEY (`delivery_cd`);
