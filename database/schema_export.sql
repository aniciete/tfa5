-- ====================================================================
-- IT0049 (Web System Technologies) - Technical Formative Assessment 5
-- Project: Laravel POS Foundations
-- File: schema_export.sql
-- ====================================================================
--
-- SUBMISSION REQUIREMENT NOTE:
-- The laboratory instructions specify:
-- "A link to a GitHub repository containing your raw project files, including your database export or migration and seeder files."
--
-- DESIGN DECISION & ARCHITECTURAL SCOPE:
-- For Technical Formative Assessment 5 (TFA5), the activity guidelines explicitly
-- stipulate:
-- 1. "Rebuild the POS application from TFA1 in Laravel: a landing page (/),
--    an about page (/about), a Customer Accounts page (/customers), and a User
--    Accounts page (/users), with the account pages using a static PHP array
--    as a temporary data source."
-- 2. "Create a PageController for the landing and about pages, and a CustomerController
--    and UserController for the account pages, each defining a static PHP array
--    of at least 5 sample records."
--
-- As designed by the course specification, all sample records are housed
-- directly within the respective controller action methods:
--   - App\Http\Controllers\CustomerController::index() -> $customers array (5 sample records)
--   - App\Http\Controllers\UserController::index()     -> $users array (5 sample records)
--
-- To simultaneously fulfill submission rubric requirements while respecting the
-- in-memory static array design pattern, this SQL artifact provides both the
-- standard DDL schema definitions and the corresponding DML seed records.
-- ====================================================================

-- --------------------------------------------------------------------
-- Table structure for table `customers`
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------------------
-- Dumping data for table `customers`
-- --------------------------------------------------------------------
LOCK TABLES `customers` WRITE;
INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Elena Rostova', 'elena.rostova@example.com', '+1 (555) 234-5678', NOW(), NOW()),
(2, 'Marcus Vance', 'marcus.vance@example.com', '+1 (555) 345-6789', NOW(), NOW()),
(3, 'Aria Thorne', 'aria.thorne@example.com', '+1 (555) 456-7890', NOW(), NOW()),
(4, 'Julian Mercer', 'julian.mercer@example.com', '+1 (555) 567-8901', NOW(), NOW()),
(5, 'Sophia Lin', 'sophia.lin@example.com', '+1 (555) 678-9012', NOW(), NOW());
UNLOCK TABLES;

-- --------------------------------------------------------------------
-- Table structure for table `staff_users`
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `staff_users`;
CREATE TABLE `staff_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------------------
-- Dumping data for table `staff_users`
-- --------------------------------------------------------------------
LOCK TABLES `staff_users` WRITE;
INSERT INTO `staff_users` (`id`, `username`, `full_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin.reyes', 'Carlos Reyes', 'Store Administrator', NOW(), NOW()),
(2, 'mgr.castro', 'Beatriz Castro', 'Shift Supervisor', NOW(), NOW()),
(3, 'cashier.valdez', 'Daniel Valdez', 'Cashier', NOW(), NOW()),
(4, 'cashier.santos', 'Camille Santos', 'Cashier', NOW(), NOW()),
(5, 'inv.navarro', 'Leo Navarro', 'Inventory Clerk', NOW(), NOW());
UNLOCK TABLES;
