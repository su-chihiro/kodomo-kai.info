--
-- テーブルの構造 `m_pickup_invalid_user`
--

CREATE TABLE `m_pickup_invalid_user` (
  `card_no` bigint(13) NOT NULL COMMENT 'お客様カード(制限)',
  `pickup_invalid_flag` smallint(1) NOT NULL DEFAULT 1 COMMENT 'ピックアップ利用制限フラグ',
  `search_invalid_flag` smallint(1) NOT NULL DEFAULT 1 COMMENT '商品検索利用制限フラグ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのインデックス `m_pickup_invalid_user`
--
ALTER TABLE `m_pickup_invalid_user`
  ADD PRIMARY KEY (`card_no`);
