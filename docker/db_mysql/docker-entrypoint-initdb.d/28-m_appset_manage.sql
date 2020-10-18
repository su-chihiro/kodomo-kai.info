--
-- テーブルの構造 `m_appset_manage`
--

CREATE TABLE `m_appset_manage` (
  `system_id` smallint(6) NOT NULL COMMENT 'システム区分',
  `sort_id` smallint(6) NOT NULL COMMENT 'ソート区分',
  `control_key` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '設定キー',
  `control_value` text CHARACTER SET utf8 NOT NULL COMMENT '設定内容',
  `system_des` text CHARACTER SET utf8 NOT NULL COMMENT 'システム説明',
  `creat_date` datetime DEFAULT current_timestamp() COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `m_appset_manage`
--

INSERT INTO `m_appset_manage` (`system_id`, `sort_id`, `control_key`, `control_value`, `system_des`, `creat_date`) VALUES
(1, 1, 'imgurl', 'https://tfservice.jp/app/pickuptrial/prodimage/bander-common.jpg', 'ピックアップガイド画像', '2020-01-10 00:00:00'),
(2, 1, 'buy_visble', 'true', '買物ボタン利用可能区分', '2020-01-10 00:00:00'),
(2, 2, 'preorder_visble', 'true', 'プレオーダー利用可能区分', '2020-01-10 00:00:00'),
(2, 3, 'prodsearch_visble', 'false', '商品検索利用可能区分', '2020-01-10 00:00:00'),
(2, 4, 'pickup_visble', 'true', 'ピックアップ利用可能区分', '2020-01-10 00:00:00'),
(2, 5, 'memoadd_visble', 'true', 'ピックアップ商品詳細画面メモ追加の利用可能区分', '2020-01-10 00:00:00');

--
-- テーブルのインデックス `m_appset_manage`
--
ALTER TABLE `m_appset_manage`
  ADD PRIMARY KEY (`system_id`,`sort_id`);
