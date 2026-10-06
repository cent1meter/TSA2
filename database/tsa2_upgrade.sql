-- Non-destructive TSA2 upgrade for the existing SwiftPOS database.
-- Select the assigned InfinityFree database in phpMyAdmin before importing.

ALTER TABLE `users`
  ADD COLUMN IF NOT EXISTS `password` VARCHAR(255) NULL AFTER `full_name`;

UPDATE `users`
SET `password` = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'
WHERE `username` = 'admin01';

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `description` TEXT NULL,
  `task_date` DATE NOT NULL,
  `is_archived` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  INDEX `tasks_active_date_index` (`is_archived`, `task_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`)
SELECT 'Review daily sales report', 'Check the previous day totals and note unusual transactions.', '2026-10-06', 0, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM `tasks` LIMIT 1);

INSERT INTO `tasks` (`title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`)
SELECT 'Update customer records', 'Verify incomplete phone and email fields.', '2026-10-07', 0, NOW(), NOW()
WHERE (SELECT COUNT(*) FROM `tasks`) = 1;

INSERT INTO `tasks` (`title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`)
SELECT 'Prepare weekly inventory count', 'Create the count sheet for the next stock check.', '2026-10-08', 0, NOW(), NOW()
WHERE (SELECT COUNT(*) FROM `tasks`) = 2;

INSERT INTO `tasks` (`title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`)
SELECT 'Archived sample task', 'This record demonstrates soft deletion and should not appear publicly.', '2026-10-05', 1, NOW(), NOW()
WHERE (SELECT COUNT(*) FROM `tasks`) = 3;
