-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2026 г., 14:44
-- Версия сервера: 10.5.17-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `credit_applications`
--

CREATE TABLE `credit_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filling_date` date NOT NULL,
  `passport_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_date` date NOT NULL,
  `passport_issuer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `snils` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `other_income` decimal(15,2) DEFAULT 0.00,
  `expenses` decimal(15,2) NOT NULL,
  `net_income` decimal(15,2) NOT NULL,
  `credit_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_amount` decimal(15,2) NOT NULL,
  `credit_currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_term` int(11) NOT NULL,
  `credit_rate` decimal(5,2) NOT NULL,
  `credit_psk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_overpayment` decimal(15,2) NOT NULL,
  `credit_penalty` decimal(5,2) NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_total_cost` decimal(15,2) NOT NULL,
  `first_payment` decimal(15,2) NOT NULL,
  `collateral_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collateral_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collateral_storage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collateral_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantor_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_past_credits` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_history_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bki_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_list` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_bik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_ks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_client_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_employee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_basis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `credit_applications`
--
ALTER TABLE `credit_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `credit_applications`
--
ALTER TABLE `credit_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
