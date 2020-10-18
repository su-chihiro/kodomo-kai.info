--
-- テーブルの構造 `m_pickup_postarea`
--

CREATE TABLE `m_pickup_postarea` (
  `store` varchar(10) NOT NULL,
  `post_code` varchar(7) NOT NULL,
  `area` text DEFAULT NULL,
  `is_valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_pickup_postarea`
--

INSERT INTO `m_pickup_postarea` (`store`, `post_code`, `area`, `is_valid`) VALUES
('400', '8120052', '福岡県福岡市東区貝塚団地', 0),
('400', '8130011', '福岡県福岡市東区香椎', 0),
('400', '8130016', '福岡県福岡市東区香椎浜1丁目～4丁目', 1),
('400', '8130017', '福岡県福岡市東区香椎照葉1丁目～7丁目', 1),
('400', '8130034', '福岡県福岡市東区多の津', 1),
('900', '8120052', '福岡県福岡市東区貝塚団地', 0),
('900', '8130011', '福岡県福岡市東区香椎', 0),
('900', '8130016', '福岡県福岡市東区香椎浜1丁目～4丁目', 1),
('900', '8130017', '福岡県福岡市東区香椎照葉1丁目～7丁目', 1),
('900', '8130034', '福岡県福岡市東区多の津', 1);

--
-- テーブルのインデックス `m_pickup_postarea`
--
ALTER TABLE `m_pickup_postarea`
  ADD PRIMARY KEY (`store`,`post_code`);
