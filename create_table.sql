
-- Step 1: Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS crm_meckano;

-- Step 2: Use the database
USE crm_meckano;

-- Step 3: Create the 'customers' table
CREATE TABLE IF NOT EXISTS `customers` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(191) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Step 4: Create the 'users' table
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(191) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role_as` TINYINT(4) NOT NULL DEFAULT '0',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Step 5: Verify the tables
-- Check if tables exist
SHOW TABLES;

-- Check the structure of the 'customers' table
DESCRIBE `customers`;

-- Check the structure of the 'users' table
DESCRIBE `users`;
