-- SwiftPOS database export for IT0049 Laboratory Activity
-- Import this file in phpMyAdmin or with the MySQL command line.

CREATE DATABASE IF NOT EXISTS `pos_database`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `pos_database`;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20),
  `created_at` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`full_name`, `email`, `phone`, `created_at`) VALUES
('Maria Santos', 'maria.santos@example.com', '0917 123 4567', '2026-09-01 09:00:00'),
('John Reyes', 'john.reyes@example.com', '0918 234 5678', '2026-09-02 10:15:00'),
('Angela Cruz', 'angela.cruz@example.com', '0919 345 6789', '2026-09-03 11:30:00'),
('Carlo Mendoza', 'carlo.mendoza@example.com', '0920 456 7890', '2026-09-04 13:45:00'),
('Sofia Garcia', 'sofia.garcia@example.com', '0921 567 8901', '2026-09-05 15:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255),
  `created_at` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `full_name`, `password`, `created_at`) VALUES
('admin01', 'Rainier Ian Sayson', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', '2026-09-01 08:00:00'),
('cashier01', 'Ella Dela Cruz', NULL, '2026-09-02 08:30:00'),
('cashier02', 'Miguel Ramos', NULL, '2026-09-03 09:00:00'),
('manager01', 'Patricia Lim', NULL, '2026-09-04 09:30:00'),
('staff01', 'Daniel Flores', NULL, '2026-09-05 10:00:00');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `description` TEXT NULL,
  `task_date` DATE NOT NULL,
  `is_archived` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  INDEX `tasks_active_date_index` (`is_archived`, `task_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`) VALUES
('Review daily sales report', 'Check the previous day totals and note unusual transactions.', '2026-10-06', 0, NOW(), NOW()),
('Update customer records', 'Verify incomplete phone and email fields.', '2026-10-07', 0, NOW(), NOW()),
('Prepare weekly inventory count', 'Create the count sheet for the next stock check.', '2026-10-08', 0, NOW(), NOW()),
('Archived sample task', 'This record demonstrates soft deletion and should not appear publicly.', '2026-10-05', 1, NOW(), NOW());
