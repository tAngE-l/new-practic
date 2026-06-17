-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2026 г., 02:08
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
-- Дамп данных таблицы `credit_applications`
--

INSERT INTO `credit_applications` (`id`, `fio`, `birth_date`, `birth_place`, `citizenship`, `marital_status`, `filling_date`, `passport_type`, `passport_series`, `passport_number`, `passport_date`, `passport_issuer`, `passport_code`, `reg_address`, `fact_address`, `phone`, `email`, `inn`, `snils`, `client_password`, `job_place`, `job_position`, `job_field`, `job_qualification`, `salary`, `other_income`, `expenses`, `net_income`, `credit_purpose`, `credit_amount`, `credit_currency`, `credit_term`, `credit_rate`, `credit_psk`, `credit_overpayment`, `credit_penalty`, `product_category`, `product_total_cost`, `first_payment`, `collateral_item`, `collateral_location`, `collateral_storage`, `collateral_owner`, `guarantor_data`, `has_past_credits`, `credit_history_details`, `bki_name`, `property_list`, `bank_name`, `bank_location`, `bank_inn`, `bank_bik`, `bank_ks`, `bank_client_account`, `bank_employee`, `bank_basis`, `created_at`, `updated_at`) VALUES
(1, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '450-110', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 36, '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Нет', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Управляющий Петров Петр Петрович', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2026-06-10 09:00:30', '2026-06-10 09:00:30'),
(2, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '450-110', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 36, '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Нет', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Управляющий Петров Петр Петрович', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2026-06-10 09:04:26', '2026-06-10 09:04:26'),
(3, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2005-05-15', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '450-110', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 36, '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '12.50', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '550000.00', '550000.00', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Нет', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', 'Управляющий Петров Петр Петрович', 'ТЕСТОВОЕ ЗНАЧЕНИЕ ПО ТЗ', '2026-06-10 09:05:27', '2026-06-10 09:05:27'),
(4, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-10 09:15:41', '2026-06-10 09:15:41'),
(5, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 05:57:46', '2026-06-11 05:57:46'),
(6, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 06:08:20', '2026-06-11 06:08:20'),
(7, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 06:11:17', '2026-06-11 06:11:17'),
(8, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 06:11:23', '2026-06-11 06:11:23'),
(9, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 06:11:35', '2026-06-11 06:11:35'),
(10, 'Иванов Иван Иванович', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '2005-05-15', 'ТЕСТ', '450-110', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'borrower@example.ru', '123456789012', '123-456-789 01', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', '550000.00', '550000.00', '550000.00', '550000.00', 'ТЕСТ', '550000.00', 'ТЕСТ', 36, '12.50', 'ТЕСТ', '550000.00', '12.50', 'ТЕСТ', '550000.00', '550000.00', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Нет', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'Управляющий Петров Петр Петрович', 'ТЕСТ', '2026-06-11 06:26:43', '2026-06-11 06:26:43');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
