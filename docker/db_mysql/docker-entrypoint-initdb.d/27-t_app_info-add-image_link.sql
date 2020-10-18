ALTER TABLE Ipoca.t_app_info
ADD image_link VARCHAR(255) NULL;

INSERT INTO `t_app_info` (`id`, `user_id`, `store_id`, `type`, `title`, `start_date`, `end_date`, `notify`, `thumbnail_url`, `original_image_url`, `create_date`, `image_link`) VALUES
(32060, NULL, '0', 1, 'Developからのテスト配信', '2020-10-13 00:00:00', '2020-10-17 23:59:59', NULL, '', '', '2020-10-14 14:14:24', 'https://github.com');

INSERT INTO `t_app_notification` (`id`, `description`, `status`, `notify_time`, `create_date`) VALUES
(32060, 'テストテストテストテスト\r\nテストテストテストテスト\r\nテストテストテストテスト', NULL, NULL, '2020-10-14 14:14:24');


-- -- image_linkを使いしない場合はこっちのコメントアウトを解除する
-- INSERT INTO `t_app_info` (`id`, `user_id`, `store_id`, `type`, `title`, `start_date`, `end_date`, `notify`, `thumbnail_url`, `original_image_url`, `create_date`) VALUES
-- (32060, NULL, '0', 1, 'Developからのテスト配信', '2020-10-13 00:00:00', '2020-10-17 23:59:59', NULL, '', '', '2020-10-14 14:14:24');
-- INSERT INTO `t_app_notification` (`id`, `description`, `status`, `notify_time`, `create_date`) VALUES
-- (32060, 'テストテストテストテスト\r\nテストテストテストテスト\r\nテストテストテストテスト', NULL, NULL, '2020-10-14 14:14:24');