--
-- テーブルの構造 `t_user_recommendation_coupon`
--

CREATE TABLE `t_user_recommendation_coupon` (
  `id` bigint(20) NOT NULL,
  `app_info_id` bigint(20) NOT NULL,
  `coupon_Id` int(8) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `is_valid` bit(1) DEFAULT NULL,
  `couponJans` text,
  `point_type` int(1) DEFAULT NULL,
  `point_number` int(8) DEFAULT NULL,
  `display_category_code` varchar(50) DEFAULT NULL,
  `display_category_name` varchar(255) DEFAULT NULL,
  `coupon_comment` varchar(200) DEFAULT NULL,
  `coupon_image` varchar(255) DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `target_customer_flag` int(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `t_user_recommendation_coupon`
--
ALTER TABLE `t_user_recommendation_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id`),
  ADD KEY `app_info_id_idx` (`app_info_id`);

--
-- AUTO_INCREMENT for table `t_user_recommendation_coupon`
--
ALTER TABLE `t_user_recommendation_coupon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --
-- -- テーブルの制約 `t_user_recommendation_coupon`
-- --
-- ALTER TABLE `t_user_recommendation_coupon`
--   ADD CONSTRAINT `t_user_recommendation_coupon_ibfk_1` FOREIGN KEY (`app_info_id`) REFERENCES `t_app_info` (`id`);
