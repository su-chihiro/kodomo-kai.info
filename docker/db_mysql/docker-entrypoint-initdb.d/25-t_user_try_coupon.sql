--
-- テーブルの構造 `t_user_try_coupon`
--

CREATE TABLE `t_user_try_coupon` (
  `id` bigint(20) NOT NULL,
  `app_info_id` bigint(20) NOT NULL,
  `coupon_Id` int(8) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `is_valid` bit(1) DEFAULT NULL,
  `couponJans` text,
  `point_number` int(8) DEFAULT NULL,
  `display_category_code` varchar(50) DEFAULT NULL,
  `display_category_name` varchar(255) DEFAULT NULL,
  `coupon_comment` varchar(200) DEFAULT NULL,
  `coupon_image` varchar(255) DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `stock_number` int(8) DEFAULT NULL,
  `target_customer_flag` int(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='お試しクーポン情報\r\n\r\n外部 API により登録されるユーザーごとのお試しクーポン情報。';

--
-- Indexes for table `t_user_try_coupon`
--
ALTER TABLE `t_user_try_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`),
  ADD KEY `app_info_id_idx` (`app_info_id`);

--
-- AUTO_INCREMENT for table `t_user_try_coupon`
--
ALTER TABLE `t_user_try_coupon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --
-- -- テーブルの制約 `t_user_try_coupon`
-- --
-- ALTER TABLE `t_user_try_coupon`
--   ADD CONSTRAINT `t_user_try_coupon_ibfk_1` FOREIGN KEY (`app_info_id`) REFERENCES `t_app_info` (`id`);
-- COMMIT;
