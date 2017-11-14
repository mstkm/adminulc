-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 03:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminulc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `nota_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `status_customer` int(11) DEFAULT NULL,
  `status_user` int(11) DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `nota_id`, `user_id`, `schedule_id`, `reference_id`, `status_customer`, `status_user`, `kelas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1093, 6, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1094, 8, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1095, 9, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1096, 10, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1097, 13, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1098, 18, NULL, 766, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1099, NULL, 2, 766, NULL, NULL, 1, 'A', '-', '2017-08-01 17:00:57', '2017-08-01 17:13:08'),
(1100, 6, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1101, 8, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1102, 9, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1103, 10, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1104, 13, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1105, 18, NULL, 767, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1106, NULL, 2, 767, NULL, NULL, 0, 'A', '-', '2017-08-01 17:00:57', '2017-08-01 18:17:21'),
(1107, 6, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1108, 8, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1109, 9, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1110, 10, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1111, 13, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1112, 18, NULL, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1113, NULL, 2, 768, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1114, 6, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1115, 8, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1116, 9, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1117, 10, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1118, 13, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1119, 18, NULL, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1120, NULL, 2, 769, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1121, 6, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1122, 8, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1123, 9, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1124, 10, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1125, 13, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1126, 18, NULL, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1127, NULL, 2, 770, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1128, 6, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1129, 8, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1130, 9, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1131, 10, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1132, 13, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1133, 18, NULL, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1134, NULL, 2, 771, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1135, 6, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1136, 8, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1137, 9, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1138, 10, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1139, 13, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1140, 18, NULL, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1141, NULL, 2, 772, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1142, 6, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1143, 8, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1144, 9, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1145, 10, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1146, 13, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1147, 18, NULL, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1148, NULL, 2, 773, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1149, 6, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1150, 8, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1151, 9, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1152, 10, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1153, 13, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1154, 18, NULL, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1155, NULL, 2, 774, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1156, 6, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1157, 8, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1158, 9, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1159, 10, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1160, 13, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1161, 18, NULL, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1162, NULL, 2, 775, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1163, 6, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1164, 8, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1165, 9, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1166, 10, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1167, 13, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1168, 18, NULL, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1169, NULL, 2, 776, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1170, 6, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1171, 8, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1172, 9, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1173, 10, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1174, 13, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1175, 18, NULL, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1176, NULL, 2, 777, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1177, 6, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1178, 8, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1179, 9, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1180, 10, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1181, 13, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1182, 18, NULL, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1183, NULL, 2, 778, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1184, 6, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1185, 8, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1186, 9, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1187, 10, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1188, 13, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1189, 18, NULL, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1190, NULL, 2, 779, NULL, NULL, NULL, 'A', NULL, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(1191, 20, NULL, 780, NULL, 1, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-04 02:20:25'),
(1192, 22, NULL, 780, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1193, 32, NULL, 780, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1194, 41, NULL, 780, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1195, 44, NULL, 780, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1196, 46, NULL, 780, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1197, NULL, 3, 780, NULL, NULL, 0, 'A', '-', '2017-08-01 18:19:11', '2017-08-01 18:19:33'),
(1198, 20, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1199, 22, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1200, 32, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1201, 41, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1202, 44, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1203, 46, NULL, 781, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1204, NULL, 2, 781, NULL, NULL, 0, 'A', '-', '2017-08-01 18:19:11', '2017-08-04 02:22:24'),
(1205, 20, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1206, 22, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1207, 32, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1208, 41, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1209, 44, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1210, 46, NULL, 782, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1211, NULL, 3, 782, NULL, NULL, 1, 'A', '-', '2017-08-01 18:19:11', '2017-08-01 21:15:34'),
(1212, 20, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1213, 22, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1214, 32, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1215, 41, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1216, 44, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1217, 46, NULL, 783, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1218, NULL, 2, 783, NULL, NULL, 1, 'A', '--', '2017-08-01 18:19:11', '2017-08-01 19:06:10'),
(1219, 20, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1220, 22, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1221, 32, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1222, 41, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1223, 44, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1224, 46, NULL, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1225, NULL, 3, 784, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1226, 20, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1227, 22, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1228, 32, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1229, 41, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1230, 44, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1231, 46, NULL, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1232, NULL, 2, 785, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1233, 20, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1234, 22, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1235, 32, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1236, 41, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1237, 44, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1238, 46, NULL, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1239, NULL, 3, 786, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1240, 20, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1241, 22, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1242, 32, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1243, 41, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1244, 44, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1245, 46, NULL, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1246, NULL, 2, 787, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1247, 20, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1248, 22, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1249, 32, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1250, 41, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1251, 44, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1252, 46, NULL, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1253, NULL, 3, 788, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1254, 20, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1255, 22, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1256, 32, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1257, 41, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1258, 44, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1259, 46, NULL, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1260, NULL, 2, 789, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1261, 20, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1262, 22, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1263, 32, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1264, 41, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1265, 44, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1266, 46, NULL, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1267, NULL, 3, 790, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1268, 20, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1269, 22, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1270, 32, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1271, 41, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1272, 44, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1273, 46, NULL, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1274, NULL, 2, 791, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1275, 20, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1276, 22, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1277, 32, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1278, 41, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1279, 44, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1280, 46, NULL, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1281, NULL, 3, 792, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1282, 20, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1283, 22, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1284, 32, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1285, 41, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1286, 44, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1287, 46, NULL, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(1288, NULL, 2, 793, NULL, NULL, NULL, 'A', NULL, '2017-08-01 18:19:11', '2017-08-01 18:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `username`, `email`, `birthdate`, `phone1`, `phone2`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'andre wirawan', '6124086', NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:15:04', '2017-03-24 10:15:04'),
(3, 'ericko primayudha', '6124110', NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:31:36', '2017-03-24 10:31:36'),
(4, 'ahmad aan torytonang', '6124083', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:48:05', '2017-03-24 14:48:05'),
(5, 'mustakim', '6124087', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:48:35', '2017-03-24 14:48:35'),
(6, 'hanif masykuri', '6124063', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:49:16', '2017-03-24 14:49:16'),
(7, 'isnaria absyah ahmad', '6114063', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:57:45', '2017-03-24 14:57:45'),
(8, 'tissha givanda', '6117028', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:58:45', '2017-03-24 14:58:45'),
(9, 'zulvia rahman', '6117036', NULL, NULL, NULL, NULL, NULL, '2017-03-24 14:59:31', '2017-03-24 14:59:31'),
(10, 'dharma', '6124001', NULL, NULL, NULL, NULL, NULL, '2017-03-24 22:10:11', '2017-03-24 22:10:11'),
(11, 'raditya dika', '6124044', NULL, NULL, NULL, NULL, NULL, '2017-04-05 19:07:30', '2017-04-05 19:07:30'),
(12, 'azka izzuddin', '8121088', NULL, NULL, NULL, NULL, NULL, '2017-04-08 05:38:01', '2017-04-08 05:38:01'),
(13, 'abc', '6124003', NULL, NULL, NULL, NULL, NULL, '2017-04-10 18:29:15', '2017-04-10 18:29:15'),
(14, 'ahmad arif', '6104039', NULL, NULL, NULL, NULL, NULL, '2017-04-21 15:06:01', '2017-04-21 15:06:01'),
(15, 'adam ari', '91238194', NULL, NULL, NULL, NULL, NULL, '2017-04-22 02:16:08', '2017-04-22 02:16:08'),
(16, 'abraham samad', '3245432356', NULL, NULL, NULL, NULL, NULL, '2017-04-30 02:21:56', '2017-04-30 02:21:56'),
(17, 'wfn snmf', '12324235', NULL, NULL, NULL, NULL, NULL, '2017-04-30 11:04:38', '2017-04-30 11:04:38'),
(19, 'ANDRI DARMAWAN', '6114072', NULL, NULL, NULL, NULL, NULL, '2017-04-30 12:22:04', '2017-04-30 12:22:04'),
(20, 'makan tahu', '7892348729', NULL, NULL, NULL, NULL, NULL, '2017-04-30 22:51:39', '2017-04-30 22:51:39'),
(21, 'budi gunawan', '787234872', NULL, NULL, NULL, NULL, NULL, '2017-04-30 22:52:10', '2017-04-30 22:52:10'),
(22, 'abraham samad', '9345427854', NULL, NULL, NULL, NULL, NULL, '2017-04-30 22:53:11', '2017-04-30 22:53:11'),
(23, 'bambang sutejo', '6107001', NULL, NULL, NULL, NULL, NULL, '2017-05-01 04:13:05', '2017-05-01 04:13:05'),
(24, 'bima ananta putra', '88128479', NULL, NULL, NULL, NULL, NULL, '2017-05-14 06:20:53', '2017-05-14 06:20:53'),
(25, 'tri indah purnamasari', '6124100', NULL, NULL, NULL, NULL, NULL, '2017-05-14 07:02:42', '2017-05-14 07:02:42'),
(26, 'muhammad nur ', '130315193', NULL, NULL, NULL, NULL, NULL, '2017-05-17 07:52:27', '2017-05-17 07:52:27'),
(27, 'moch tan\'im', '9138825629', NULL, NULL, NULL, NULL, NULL, '2017-05-17 07:57:02', '2017-05-17 07:57:02'),
(28, 'kharisma wardhana', '6107703', NULL, NULL, NULL, NULL, NULL, '2017-05-19 14:57:02', '2017-05-19 14:57:02'),
(29, 'mustofa bisri', '893754983', NULL, NULL, NULL, NULL, NULL, '2017-05-30 07:50:52', '2017-05-30 07:50:52'),
(30, 'moh syafii', '235879238579', NULL, NULL, NULL, NULL, NULL, '2017-06-04 14:50:36', '2017-06-04 14:50:36'),
(31, 'lam vico salim', '6104019', NULL, NULL, NULL, NULL, NULL, '2017-06-19 05:38:02', '2017-06-19 05:38:02'),
(32, 'rinaldi halim', '6124088', NULL, NULL, NULL, NULL, NULL, '2017-07-02 18:20:50', '2017-07-02 18:20:50'),
(33, 'eddy gunawan', '6107004', NULL, NULL, NULL, NULL, NULL, '2017-07-19 19:53:40', '2017-07-19 19:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `customer_schedules`
--

CREATE TABLE `customer_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_schedules`
--

INSERT INTO `customer_schedules` (`id`, `cust_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(1, 3, 608, '2017-07-26 15:57:31', '2017-07-26 15:57:31'),
(2, 32, 608, '2017-07-28 08:27:14', '2017-07-28 08:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga_ubaya` int(11) NOT NULL,
  `harga_umum` int(11) NOT NULL,
  `harga_daftar` int(11) NOT NULL,
  `minimal_customer` int(11) NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `harga_ubaya`, `harga_umum`, `harga_daftar`, `minimal_customer`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'level 1', 540000, 640000, 25000, 5, 1, '2017-03-23 20:42:24', '2017-05-14 08:38:55'),
(2, 'pbt', 75000, 150000, 25000, 0, 2, '2017-03-23 20:43:14', '2017-03-23 20:43:14'),
(3, 'grammar 1', 400000, 500000, 25000, 6, 3, '2017-03-24 10:30:56', '2017-03-24 10:30:56'),
(4, 'pbt', 650000, 850000, 25000, 0, 4, '2017-04-08 05:37:27', '2017-04-08 05:37:27'),
(5, 'foundation', 400000, 500000, 25000, 5, 3, '2017-05-14 08:28:57', '2017-05-14 08:28:57'),
(6, 'speaking 1', 500000, 600000, 25000, 6, 5, '2017-07-20 01:54:02', '2017-07-20 01:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `level_schedules`
--

CREATE TABLE `level_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level_schedules`
--

INSERT INTO `level_schedules` (`id`, `schedule_id`, `level_id`, `created_at`, `updated_at`) VALUES
(7, 33, 2, '2017-04-29 04:52:58', '2017-04-29 04:52:58'),
(8, 34, 2, '2017-05-01 04:19:24', '2017-05-01 04:19:24'),
(28, 69, 2, '2017-05-14 06:38:06', '2017-05-14 06:38:06'),
(192, 237, 2, '2017-05-30 06:53:32', '2017-05-30 06:53:32'),
(201, 243, 2, '2017-05-30 07:20:05', '2017-05-30 07:20:05'),
(230, 272, 2, '2017-06-04 14:53:50', '2017-06-04 14:53:50'),
(231, 380, 2, '2017-07-17 23:45:01', '2017-07-17 23:45:01'),
(388, 766, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(389, 767, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(390, 768, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(391, 769, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(392, 770, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(393, 771, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(394, 772, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(395, 773, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(396, 774, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(397, 775, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(398, 776, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(399, 777, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(400, 778, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(401, 779, 3, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(402, 780, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(403, 781, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(404, 782, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(405, 783, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(406, 784, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(407, 785, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(408, 786, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(409, 787, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(410, 788, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(411, 789, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(412, 790, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(413, 791, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(414, 792, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(415, 793, 3, '2017-08-01 18:19:11', '2017-08-01 18:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_08_19_090953_create_users_table', 1),
('2016_08_19_091022_create_password_reset_table', 1),
('2016_12_04_081333_create_periodes_table', 1),
('2016_12_04_081335_create_services_table', 1),
('2016_12_04_081350_create_customers_table', 1),
('2016_12_04_081351_create_levels_table', 1),
('2016_12_04_115437_create_rooms_table', 1),
('2016_12_28_184901_create_schedules_table', 1),
('2016_12_29_184903_create_notas_table', 1),
('2016_12_29_184908_create_attendances_table', 1),
('2017_01_20_152123_create_room_schedules_table', 1),
('2017_01_20_152147_create_user_schedules_table', 1),
('2017_01_20_152306_create_level_schedules_table', 1),
('2017_06_30_145629_create_customer_schedules_table', 1),
('2017_06_30_184904_create_reports_table', 1),
('2017_07_24_152337_create_questions_table', 1),
('2017_07_25_125705_create_question_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` int(10) UNSIGNED NOT NULL,
  `bayar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `course_status` int(11) NOT NULL,
  `book_status` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED DEFAULT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reference` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `bayar`, `asal`, `harga`, `course_status`, `book_status`, `nilai`, `level_id`, `schedule_id`, `cust_id`, `user_id`, `reference`, `created_at`, `updated_at`) VALUES
(3, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 3, 1, NULL, '2017-03-24 10:31:36', '2017-08-01 16:53:26'),
(4, 'lunas', 'ubaya', 550000, 0, 0, 0, 1, NULL, 4, 1, NULL, '2017-03-24 14:48:05', '2017-07-02 17:51:37'),
(5, 'lunas', 'ubaya', 550000, 0, 0, 0, 1, NULL, 5, 1, NULL, '2017-03-24 14:48:35', '2017-05-13 15:44:06'),
(6, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 6, 1, NULL, '2017-03-24 14:49:16', '2017-08-01 17:00:57'),
(8, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 7, 1, NULL, '2017-03-24 14:57:45', '2017-08-01 17:00:57'),
(9, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 8, 1, NULL, '2017-03-24 14:58:45', '2017-08-01 17:00:57'),
(10, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 9, 1, NULL, '2017-03-24 14:59:31', '2017-08-01 17:00:57'),
(11, 'lunas', 'ubaya', 550000, 0, 0, 0, 1, NULL, 10, 1, NULL, '2017-03-24 22:10:12', '2017-07-02 17:51:37'),
(13, 'lunas', 'ubaya', 400000, 1, 1, 0, 3, NULL, 11, 1, NULL, '2017-03-05 19:08:41', '2017-08-01 17:00:58'),
(14, 'lunas', 'ubaya', 650000, 0, 0, 0, 4, NULL, 12, 1, NULL, '2017-03-24 05:38:01', '2017-07-19 21:02:14'),
(15, 'daftar', 'ubaya', 25000, 0, 0, 0, 3, NULL, 13, 1, NULL, '2017-03-10 18:29:15', '2017-04-10 18:29:15'),
(16, 'daftar', 'ubaya', 25000, 0, 0, 0, 3, NULL, 14, 1, 16, '2017-03-21 15:06:01', '2017-04-22 03:34:55'),
(18, 'kursus', 'ubaya', 375000, 1, 0, 0, 3, NULL, 14, 1, NULL, '2017-03-22 03:34:55', '2017-08-01 17:00:58'),
(20, 'lunas', 'umum', 500000, 1, 0, 0, 3, NULL, 17, 1, NULL, '2017-04-30 11:04:38', '2017-08-01 18:19:12'),
(22, 'lunas', 'ubaya', 400000, 1, 0, 0, 3, NULL, 19, 1, NULL, '2017-04-30 12:22:04', '2017-08-01 18:19:12'),
(23, 'daftar', 'umum', 25000, 0, 0, 0, 1, NULL, 20, 1, 29, '2017-04-30 22:51:39', '2017-05-01 14:05:52'),
(24, 'lunas', 'umum', 150000, 0, 0, 0, 2, 33, 21, 1, NULL, '2017-04-30 22:52:10', '2017-05-14 15:12:38'),
(25, 'lunas', 'umum', 150000, 0, 0, 0, 2, 33, 22, 1, NULL, '2017-04-30 22:53:11', '2017-04-30 22:53:11'),
(26, 'lunas', 'ubaya', 400000, 0, 0, 0, 3, NULL, 23, 5, 26, '2017-05-01 04:13:05', '2017-05-14 09:44:21'),
(27, 'daftar', 'ubaya', 25000, 0, 0, 0, 4, NULL, 23, 5, 27, '2017-05-01 04:14:31', '2017-05-01 04:15:40'),
(28, 'kursus', 'ubaya', 625000, 0, 0, 0, 4, NULL, 23, 5, NULL, '2017-05-01 04:15:40', '2017-07-19 21:02:14'),
(29, 'kursus', 'umum', 615000, 0, 0, 0, 1, NULL, 20, 6, NULL, '2017-05-01 14:05:52', '2017-07-02 17:51:37'),
(30, 'daftar', 'umum', 25000, 0, 0, 0, 3, NULL, 20, 1, NULL, '2017-05-07 09:46:22', '2017-05-07 09:46:22'),
(31, 'daftar', 'umum', 25000, 0, 0, 0, 1, NULL, 24, 1, 40, '2017-05-14 06:20:54', '2017-05-24 18:35:26'),
(32, 'lunas', 'umum', 500000, 1, 0, 0, 3, NULL, 25, 1, NULL, '2017-05-14 07:02:42', '2017-08-01 18:19:12'),
(33, 'retur', 'ubaya', -375000, 0, 0, 0, 3, NULL, 23, 1, NULL, '2017-05-14 09:44:21', '2017-05-14 09:44:21'),
(34, 'lunas', 'ubaya', 540000, 0, 0, 0, 1, NULL, 26, 1, NULL, '2017-05-17 07:52:28', '2017-05-29 20:42:41'),
(35, 'lunas', 'umum', 640000, 0, 0, 0, 1, NULL, 27, 5, NULL, '2017-05-17 07:57:02', '2017-07-02 17:51:37'),
(36, 'lunas', 'umum', 850000, 0, 0, 0, 4, NULL, 7, 5, NULL, '2017-05-17 07:58:31', '2017-07-19 21:02:14'),
(37, 'lunas', 'ubaya', 75000, 0, 0, 0, 2, 34, 8, 5, NULL, '2017-05-17 08:00:07', '2017-05-17 08:00:07'),
(40, 'kursus', 'umum', 615000, 0, 0, 0, 1, NULL, 24, 1, NULL, '2017-05-24 18:35:26', '2017-07-02 17:51:37'),
(41, 'lunas', 'umum', 500000, 1, 0, 0, 3, NULL, 29, 1, NULL, '2017-05-30 07:50:52', '2017-08-01 18:19:12'),
(42, 'lunas', 'ubaya', 75000, 0, 0, 0, 2, 237, 30, 1, NULL, '2017-06-04 14:50:36', '2017-06-19 09:02:12'),
(43, 'daftar', 'ubaya', 25000, 0, 0, 0, 3, NULL, 31, 1, 44, '2017-06-19 05:38:02', '2017-06-19 06:06:33'),
(44, 'kursus', 'ubaya', 375000, 1, 0, 0, 3, NULL, 31, 1, NULL, '2017-06-19 06:06:33', '2017-08-01 18:19:12'),
(45, 'lunas', 'ubaya', 75000, 0, 0, 0, 2, 272, 32, 1, NULL, '2017-07-02 18:21:27', '2017-07-02 18:21:27'),
(46, 'kursus', 'ubaya', 375000, 1, 0, 0, 3, NULL, 32, 1, NULL, '2017-07-06 19:54:50', '2017-08-01 18:19:12'),
(47, 'lunas', 'ubaya', 400000, 0, 0, 0, 5, NULL, 32, 1, NULL, '2017-07-10 00:25:37', '2017-07-10 00:25:37'),
(48, 'lunas', 'ubaya', 75000, 0, 0, 0, 2, 33, 5, 1, NULL, '2017-07-10 23:02:50', '2017-07-10 23:02:50'),
(49, 'lunas', 'umum', 850000, 0, 0, 0, 4, NULL, 33, 1, 50, '2017-07-19 19:53:40', '2017-07-19 21:29:55'),
(50, 'retur', 'umum', -825000, 0, 0, 0, 4, NULL, 33, 1, NULL, '2017-07-19 21:29:55', '2017-07-19 21:29:55'),
(51, 'kursus', 'ubaya', 375000, 0, 0, 0, 3, NULL, 4, 1, NULL, '2017-07-26 14:23:56', '2017-07-26 14:23:56'),
(52, 'lunas', 'ubaya', 650000, 0, 0, 0, 4, NULL, 4, 1, NULL, '2017-07-26 14:24:40', '2017-07-26 14:24:40'),
(53, 'daftar', 'ubaya', 25000, 0, 0, 0, 6, NULL, 32, 1, NULL, '2017-07-27 03:19:36', '2017-07-27 03:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `quarter` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `quarter`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2016/2017', 0, NULL, '2017-07-19 20:16:34'),
(2, 2, '2016/2017', 0, '2017-03-25 10:46:07', '2017-08-01 19:05:17'),
(3, 3, '2016/2017', 1, '2017-03-25 11:43:08', '2017-08-01 19:05:17'),
(4, 4, '2016/2017', 0, '2017-08-01 22:50:17', '2017-08-01 22:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `service_type`, `question_type`, `question_for`, `created_at`, `updated_at`) VALUES
(1, 'Materi sesuai dengan kemampuan saya', 'kursus', 'materi', 'peserta', NULL, NULL),
(2, 'Menarik, membuat saya bergairah belajar', 'kursus', 'materi', 'peserta', NULL, NULL),
(3, 'Materi memberi banyak informasi', 'kursus', 'materi', 'peserta', NULL, NULL),
(4, 'Waktu sesuai dengan kebutuhan/kondisi saya', 'kursus', 'waktu', 'peserta', NULL, NULL),
(5, 'Lama belajar (100 menit) sesuai dengan bobot materi', 'kursus', 'waktu', 'peserta', NULL, NULL),
(6, 'Materi memberi banyak informasi', 'kursus', 'waktu', 'peserta', NULL, NULL),
(7, 'Pengajar menguasai materi dengan baik', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(8, 'Pengajar mengajar dengan suara yang jelas', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(9, 'Pengajar membagi perhatian secara merata kepada semua peserta kursus', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(10, 'Pengajar yang menjelaskan dengan baik, sistematis, mudah dipahami', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(11, 'Pengajar memotivasi peserta untuk belajar', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(12, 'Pengajar menjawab semua pertanyaan dengan jelas', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(13, 'Pengajar memusatkan perhatian pada topik', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(14, 'Pengajar menciptakan suasana tertib, serius, namun rileks untuk belajar', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(15, 'Pengajar menciptakan keseimbangan antara belajar 1 arah dan interaktif', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(16, 'Pengajar mendayagunakan fasilitas kelas dengan baik', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(17, 'Pengajar bersikap ramah dan berpenampilan profesional', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(18, 'Pengajar mengawali dan mengakhiri pelajaran tepat waktu', 'kursus', 'pembelajaran', 'pengajar', NULL, NULL),
(19, 'Apakah anda puas dengan kursus ini', 'kursus', 'kepuasan', 'peserta', NULL, NULL),
(20, 'Apakah anda berminat mengikut kursus serupa dimasa mendatang', 'kursus', 'kepuasan', 'peserta', NULL, NULL),
(21, 'Apakah anda berminat mengikut kursus serupa dimasa mendatang', 'kursus', 'kepuasan', 'peserta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_reports`
--

CREATE TABLE `question_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_reports`
--

INSERT INTO `question_reports` (`id`, `report_id`, `question_id`, `question_value`, `created_at`, `updated_at`) VALUES
(607, 118, 7, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(608, 118, 8, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(609, 118, 9, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(610, 118, 10, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(611, 118, 11, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(612, 118, 12, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(613, 118, 13, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(614, 118, 14, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(615, 118, 15, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(616, 118, 16, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(617, 118, 17, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(618, 118, 18, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(619, 119, 7, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(620, 119, 8, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(621, 119, 9, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(622, 119, 10, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(623, 119, 11, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(624, 119, 12, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(625, 119, 13, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(626, 119, 14, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(627, 119, 15, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(628, 119, 16, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(629, 119, 17, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(630, 119, 18, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(631, 120, 7, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(632, 120, 8, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(633, 120, 9, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(634, 120, 10, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(635, 120, 11, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(636, 120, 12, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(637, 120, 13, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(638, 120, 14, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(639, 120, 15, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(640, 120, 16, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(641, 120, 17, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(642, 120, 18, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(643, 121, 7, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(644, 121, 8, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(645, 121, 9, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(646, 121, 10, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(647, 121, 11, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(648, 121, 12, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(649, 121, 13, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(650, 121, 14, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(651, 121, 15, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(652, 121, 16, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(653, 121, 17, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(654, 121, 18, 0, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(655, 122, 7, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(656, 122, 8, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(657, 122, 9, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(658, 122, 10, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(659, 122, 11, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(660, 122, 12, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(661, 122, 13, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(662, 122, 14, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(663, 122, 15, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(664, 122, 16, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(665, 122, 17, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(666, 122, 18, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(667, 123, 7, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(668, 123, 8, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(669, 123, 9, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(670, 123, 10, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(671, 123, 11, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(672, 123, 12, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(673, 123, 13, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(674, 123, 14, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(675, 123, 15, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(676, 123, 16, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(677, 123, 17, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(678, 123, 18, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(679, 124, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(680, 124, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(681, 124, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(682, 124, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(683, 124, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(684, 124, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(685, 124, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(686, 124, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(687, 124, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(688, 125, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(689, 125, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(690, 125, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(691, 125, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(692, 125, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(693, 125, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(694, 125, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(695, 125, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(696, 125, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(697, 126, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(698, 126, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(699, 126, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(700, 126, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(701, 126, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(702, 126, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(703, 126, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(704, 126, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(705, 126, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(706, 127, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(707, 127, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(708, 127, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(709, 127, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(710, 127, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(711, 127, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(712, 127, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(713, 127, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(714, 127, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(715, 128, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(716, 128, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(717, 128, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(718, 128, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(719, 128, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(720, 128, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(721, 128, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(722, 128, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(723, 128, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(724, 129, 1, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(725, 129, 2, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(726, 129, 3, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(727, 129, 4, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(728, 129, 5, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(729, 129, 6, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(730, 129, 19, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(731, 129, 20, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(732, 129, 21, 0, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(733, 130, 7, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(734, 130, 8, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(735, 130, 9, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(736, 130, 10, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(737, 130, 11, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(738, 130, 12, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(739, 130, 13, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(740, 130, 14, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(741, 130, 15, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(742, 130, 16, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(743, 130, 17, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(744, 130, 18, 7, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(745, 131, 7, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(746, 131, 8, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(747, 131, 9, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(748, 131, 10, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(749, 131, 11, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(750, 131, 12, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(751, 131, 13, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(752, 131, 14, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(753, 131, 15, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(754, 131, 16, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(755, 131, 17, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(756, 131, 18, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(757, 132, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(758, 132, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(759, 132, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(760, 132, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(761, 132, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(762, 132, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(763, 132, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(764, 132, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(765, 132, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(766, 132, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(767, 132, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(768, 132, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(769, 133, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(770, 133, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(771, 133, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(772, 133, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(773, 133, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(774, 133, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(775, 133, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(776, 133, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(777, 133, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(778, 133, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(779, 133, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(780, 133, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(781, 134, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(782, 134, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(783, 134, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(784, 134, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(785, 134, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(786, 134, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(787, 134, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(788, 134, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(789, 134, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(790, 134, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(791, 134, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(792, 134, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(793, 135, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(794, 135, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(795, 135, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(796, 135, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(797, 135, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(798, 135, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(799, 135, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(800, 135, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(801, 135, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(802, 135, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(803, 135, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(804, 135, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(805, 136, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(806, 136, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(807, 136, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(808, 136, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(809, 136, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(810, 136, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(811, 136, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(812, 136, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(813, 136, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(814, 136, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(815, 136, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(816, 136, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(817, 137, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(818, 137, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(819, 137, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(820, 137, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(821, 137, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(822, 137, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(823, 137, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(824, 137, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(825, 137, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(826, 137, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(827, 137, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(828, 137, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(829, 138, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(830, 138, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(831, 138, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(832, 138, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(833, 138, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(834, 138, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(835, 138, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(836, 138, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(837, 138, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(838, 138, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(839, 138, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(840, 138, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(841, 139, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(842, 139, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(843, 139, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(844, 139, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(845, 139, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(846, 139, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(847, 139, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(848, 139, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(849, 139, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(850, 139, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(851, 139, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(852, 139, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(853, 140, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(854, 140, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(855, 140, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(856, 140, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(857, 140, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(858, 140, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(859, 140, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(860, 140, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(861, 140, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(862, 140, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(863, 140, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(864, 140, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(865, 141, 7, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(866, 141, 8, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(867, 141, 9, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(868, 141, 10, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(869, 141, 11, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(870, 141, 12, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(871, 141, 13, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(872, 141, 14, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(873, 141, 15, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(874, 141, 16, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(875, 141, 17, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(876, 141, 18, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(877, 142, 1, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(878, 142, 2, 5, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(879, 142, 3, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(880, 142, 4, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:16'),
(881, 142, 5, 6, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(882, 142, 6, 4, '2017-08-01 18:19:12', '2017-08-04 01:16:43'),
(883, 142, 19, 1, '2017-08-01 18:19:12', '2017-08-04 01:21:08'),
(884, 142, 20, 1, '2017-08-01 18:19:12', '2017-08-04 01:21:08'),
(885, 142, 21, 1, '2017-08-01 18:19:12', '2017-08-04 01:21:08'),
(886, 143, 1, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(887, 143, 2, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(888, 143, 3, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(889, 143, 4, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(890, 143, 5, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(891, 143, 6, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(892, 143, 19, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(893, 143, 20, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(894, 143, 21, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(895, 144, 1, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(896, 144, 2, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(897, 144, 3, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(898, 144, 4, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(899, 144, 5, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(900, 144, 6, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(901, 144, 19, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(902, 144, 20, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(903, 144, 21, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(904, 145, 1, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(905, 145, 2, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(906, 145, 3, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(907, 145, 4, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(908, 145, 5, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(909, 145, 6, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(910, 145, 19, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(911, 145, 20, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(912, 145, 21, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(913, 146, 1, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(914, 146, 2, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(915, 146, 3, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(916, 146, 4, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(917, 146, 5, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(918, 146, 6, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(919, 146, 19, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(920, 146, 20, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(921, 146, 21, 0, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(922, 147, 1, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(923, 147, 2, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(924, 147, 3, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(925, 147, 4, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(926, 147, 5, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(927, 147, 6, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(928, 147, 19, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(929, 147, 20, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13'),
(930, 147, 21, 0, '2017-08-01 18:19:13', '2017-08-01 18:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `advice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `nota_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `periode_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `advice`, `grade`, `nota_id`, `user_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(118, NULL, NULL, 6, 2, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(119, NULL, NULL, 8, 2, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(120, NULL, NULL, 9, 2, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(121, NULL, NULL, 10, 2, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(122, NULL, NULL, 13, 2, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(123, NULL, NULL, 18, 2, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(124, NULL, NULL, 6, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(125, NULL, NULL, 8, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(126, NULL, NULL, 9, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(127, NULL, NULL, 10, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(128, NULL, NULL, 13, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(129, NULL, NULL, 18, NULL, 2, '2017-08-01 17:00:58', '2017-08-01 17:00:58'),
(130, 'wljfhglqiwfhgjwke', NULL, 20, 3, 3, '2017-08-01 18:19:11', '2017-08-04 01:21:08'),
(131, NULL, NULL, 20, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(132, NULL, NULL, 22, 3, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(133, NULL, NULL, 22, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(134, NULL, NULL, 32, 3, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(135, NULL, NULL, 32, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(136, NULL, NULL, 41, 3, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(137, NULL, NULL, 41, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(138, NULL, NULL, 44, 3, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(139, NULL, NULL, 44, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(140, NULL, NULL, 46, 3, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(141, NULL, NULL, 46, 2, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(142, NULL, NULL, 20, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(143, NULL, NULL, 22, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(144, NULL, NULL, 32, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(145, NULL, NULL, 41, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(146, NULL, NULL, 44, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12'),
(147, NULL, NULL, 46, NULL, 3, '2017-08-01 18:19:12', '2017-08-01 18:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'PF4.1', 30, '2017-03-23 20:43:56', '2017-03-23 20:43:56'),
(2, 'PF4.2', 30, '2017-03-23 20:43:56', '2017-03-23 20:43:56'),
(3, 'PF4.3', 30, '2017-03-23 20:43:56', '2017-03-23 20:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `room_schedules`
--

CREATE TABLE `room_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_schedules`
--

INSERT INTO `room_schedules` (`id`, `schedule_id`, `room_id`, `created_at`, `updated_at`) VALUES
(164, 69, 2, NULL, NULL),
(165, 33, 1, NULL, NULL),
(166, 34, 1, NULL, NULL),
(167, 237, 4, NULL, NULL),
(169, 243, 1, '2017-05-30 07:20:05', '2017-05-30 07:20:05'),
(198, 272, 3, '2017-06-04 14:53:50', '2017-06-04 14:53:50'),
(199, 380, 1, '2017-07-17 23:45:02', '2017-07-17 23:45:02'),
(356, 766, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(357, 767, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(358, 768, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(359, 769, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(360, 770, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(361, 771, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(362, 772, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(363, 773, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(364, 774, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(365, 775, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(366, 776, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(367, 777, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(368, 778, 1, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(369, 779, 2, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(370, 780, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(371, 781, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(372, 782, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(373, 783, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(374, 784, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(375, 785, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(376, 786, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(377, 787, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(378, 788, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(379, 789, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(380, 790, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(381, 791, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(382, 792, 1, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(383, 793, 2, '2017-08-01 18:19:11', '2017-08-01 18:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `name`, `day`, `start`, `end`, `capacity`, `durasi`, `created_at`, `updated_at`) VALUES
(33, 'Test TOEFL - PBT di PF4.1', NULL, '2017-08-23 10:00:00', '2017-08-23 12:00:00', 27, 120, '2017-04-29 04:52:58', '2017-07-10 23:02:50'),
(34, 'Test TOEFL - PBT di PF4.1', NULL, '2017-08-30 10:00:00', '2017-08-30 12:00:00', 29, 0, '2017-05-01 04:19:24', '2017-05-17 08:00:07'),
(69, 'Test TOEFL - PBT di PF4.1', NULL, '2017-07-04 10:00:00', '2017-07-04 12:00:00', 30, 0, '2017-05-14 06:38:06', '2017-06-19 09:02:12'),
(237, 'test toefl - pbt di PF4.1', NULL, '2017-09-05 10:00:00', '2017-09-05 12:00:00', 29, 0, '2017-05-30 06:53:32', '2017-06-19 09:02:12'),
(243, 'test toefl - pbt di PF4.1', NULL, '2017-08-31 10:00:00', '2017-08-31 12:00:00', 30, 0, '2017-05-30 07:20:05', '2017-05-30 07:20:05'),
(272, 'test toefl - pbt di PF4.3', NULL, '2017-07-11 10:00:00', '2017-07-11 12:00:00', 29, 0, '2017-06-04 14:53:50', '2017-07-02 18:21:27'),
(378, NULL, NULL, '2017-07-17 23:20:15', '2017-07-17 23:20:15', NULL, NULL, '2017-07-17 09:20:15', '2017-07-17 09:20:15'),
(379, 'test toefl - pbt di PF4.1', NULL, '2017-07-19 10:00:00', NULL, 30, NULL, '2017-07-17 23:06:48', '2017-07-17 23:06:48'),
(380, 'test toefl - pbt di PF4.1', NULL, '2017-07-19 10:00:00', '2017-07-19 12:00:00', 30, NULL, '2017-07-17 23:45:01', '2017-07-17 23:45:01'),
(608, NULL, 'jumat', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2017-07-20 02:05:52', '2017-07-20 02:05:52'),
(653, NULL, 'rabu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2017-07-28 08:28:48', '2017-07-28 08:28:48'),
(766, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-08-25 17:00:00', '2017-08-25 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(767, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-08-27 18:00:00', '2017-08-27 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(768, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-01 17:00:00', '2017-09-01 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(769, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-03 18:00:00', '2017-09-03 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(770, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-08 17:00:00', '2017-09-08 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(771, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-10 18:00:00', '2017-09-10 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(772, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-15 17:00:00', '2017-09-15 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(773, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-17 18:00:00', '2017-09-17 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(774, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-22 17:00:00', '2017-09-22 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(775, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-24 18:00:00', '2017-09-24 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(776, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-29 17:00:00', '2017-09-29 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(777, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-10-01 18:00:00', '2017-10-01 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(778, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-10-06 17:00:00', '2017-10-06 18:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(779, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-10-08 18:00:00', '2017-10-08 19:40:00', NULL, 100, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(780, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-08-08 17:00:00', '2017-08-08 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(781, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-08-10 18:00:00', '2017-08-10 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(782, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-08-15 17:00:00', '2017-08-15 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(783, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-08-17 18:00:00', '2017-08-17 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(784, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-08-22 17:00:00', '2017-08-22 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(785, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-08-24 18:00:00', '2017-08-24 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(786, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-08-29 17:00:00', '2017-08-29 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(787, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-08-31 18:00:00', '2017-08-31 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(788, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-05 17:00:00', '2017-09-05 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(789, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-07 18:00:00', '2017-09-07 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(790, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-12 17:00:00', '2017-09-12 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(791, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-14 18:00:00', '2017-09-14 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(792, 'kursus inggris - grammar 1 di PF4.1', NULL, '2017-09-19 17:00:00', '2017-09-19 18:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(793, 'kursus inggris - grammar 1 di PF4.2', NULL, '2017-09-21 18:00:00', '2017-09-21 19:40:00', NULL, 100, '2017-08-01 18:19:11', '2017-08-01 18:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Belanda', 'language', '2017-03-23 20:42:02', '2017-03-23 20:42:02'),
(2, 'toefl', 'test', '2017-03-23 20:42:44', '2017-03-23 20:42:44'),
(3, 'inggris', 'language', '2017-03-24 10:30:22', '2017-03-24 10:30:22'),
(4, 'Toefl', 'preparation', '2017-03-25 12:55:55', '2017-03-25 12:55:55'),
(5, 'Madura', 'language', '2017-07-20 01:53:07', '2017-07-20 01:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'blocked',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `birthdate`, `admin`, `status`, `photo`, `phone1`, `phone2`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mustakim', 'admin', 'mustakimixii@gmail.com', '$2y$10$rT1cyZ3E5f2zY5lnnzyknugzQOyNDrJy7CjqutocaGcWhH.fY7j7i', '0000-00-00', 'admin', 'active', 'img_58d68e6558c8d.JPEG', '-', NULL, 'LmcV5bdA5vqL7ivN6fHHYamQPlWsMyfYzTGLUz0K7Ue7qHbVFP4gSIchSWpw', '2017-03-23 20:36:05', '2017-08-08 01:47:14'),
(2, 'Mario Christian', 'mario', 'dosen@ubaya.ac.id', '$2y$10$rT1cyZ3E5f2zY5lnnzyknugzQOyNDrJy7CjqutocaGcWhH.fY7j7i', '0000-00-00', 'dosen', 'active', 'img_58d6c4f8bc25e.jpg', '-', NULL, '5vPDOYq3171AcjHY6CFxiXVR2rWyc5j9jpLdbkDqTaJq4WrlxqGQmgCJBeja', '2017-03-24 00:28:56', '2017-08-08 01:51:16'),
(3, 'Ferry Christian', 'ferry', 'dosesn@ubaya.ac.id', '$2y$10$OptYmsIDUBsrNFJheGLOIeXpzwZaDVOTTB5giwv4BPIg2PYxDl1nu', '0000-00-00', 'dosen', 'active', 'img_58d6c4f8bc25e.jpg', '-', NULL, '7oF7gX0LzWA9UdffMww1qPdvmJi0mat1ndSiUJN6KGo7ecbVJQzLcHyKjCiN', '2017-03-24 00:28:56', '2017-06-18 09:29:34'),
(4, 'Yenny Hartanto', 'yenny', 'yenny@ubaya.ac.id', '$2y$10$OptYmsIDUBsrNFJheGLOIeXpzwZaDVOTTB5giwv4BPIg2PYxDl1nu', '0000-00-00', 'dosen', 'blocked', 'img_58d6c4f8bc25e.jpg', '-', NULL, NULL, '2017-03-24 00:28:56', '2017-04-30 13:58:40'),
(5, 'aghni', 'aghni', 'aghni@gmail.com', '$2y$10$vQwkaRCBO4lguNxFCR9ia.cPDGZ/kpWsEV4MB5/QA2AsQkPix6tlG', '0000-00-00', 'staff', 'active', NULL, '-', NULL, 'DQxKLRGWEMnBo8Btq4dQOsuOrEYLEdFR5YIkKj4b4otvmsuHoPqzUQL9Jsb4', '2017-04-09 16:20:23', '2017-08-01 13:43:15'),
(6, 'sumeilia', 'makmbe', 'mei@staff.ubaya.ac.id', '$2y$10$tgOAfsRr/XsT9nxhmKQHvelRjftC.GJRn3eqNaYqLbYbCLuwy.qmy', '0000-00-00', 'kepala', 'active', NULL, '-', NULL, 'NomUDPCjEzfItFwpH0y743Tx8KmLMcetYl2bRqNNlTeSoj6DUxwo5f0F5Ome', '2017-04-30 14:00:16', '2017-05-07 09:40:23'),
(7, 'besin gaspar', 'pakboss', 'gasparbesin@staff.ubaya.ac.id', '$2y$10$fMSuHpLNGnx.YfvUJI0oIOsWSAOBRc7i9ijkY6NRUmrDx.LkZSLZS', '0000-00-00', 'direktur', 'active', NULL, '-', NULL, 'y4zgJKFbff3wwHs8kIGNLw7PpZtx40zkKDlO9ReUC8ifRXcBF5nDiCMTPByN', '2017-04-30 14:04:40', '2017-07-06 14:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_schedules`
--

CREATE TABLE `user_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_schedules`
--

INSERT INTO `user_schedules` (`id`, `user_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(155, 2, 766, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(156, 2, 767, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(157, 2, 768, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(158, 2, 769, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(159, 2, 770, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(160, 2, 771, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(161, 2, 772, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(162, 2, 773, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(163, 2, 774, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(164, 2, 775, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(165, 2, 776, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(166, 2, 777, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(167, 2, 778, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(168, 2, 779, '2017-08-01 17:00:57', '2017-08-01 17:00:57'),
(169, 3, 780, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(170, 2, 781, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(171, 3, 782, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(172, 2, 783, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(173, 3, 784, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(174, 2, 785, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(175, 3, 786, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(176, 2, 787, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(177, 3, 788, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(178, 2, 789, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(179, 3, 790, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(180, 2, 791, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(181, 3, 792, '2017-08-01 18:19:11', '2017-08-01 18:19:11'),
(182, 2, 793, '2017-08-01 18:19:11', '2017-08-01 18:19:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_nota_id_foreign` (`nota_id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`),
  ADD KEY `attendances_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_schedules`
--
ALTER TABLE `customer_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_schedules_cust_id_foreign` (`cust_id`),
  ADD KEY `customer_schedules_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_service_id_foreign` (`service_id`);

--
-- Indexes for table `level_schedules`
--
ALTER TABLE `level_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_schedules_schedule_id_foreign` (`schedule_id`),
  ADD KEY `level_schedules_level_id_foreign` (`level_id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_level_id_foreign` (`level_id`),
  ADD KEY `notas_schedule_id_foreign` (`schedule_id`),
  ADD KEY `notas_cust_id_foreign` (`cust_id`),
  ADD KEY `notas_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_reports`
--
ALTER TABLE `question_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_reports_report_id_foreign` (`report_id`),
  ADD KEY `question_reports_question_id_foreign` (`question_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_nota_id_foreign` (`nota_id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_schedules`
--
ALTER TABLE `room_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_schedules_schedule_id_foreign` (`schedule_id`),
  ADD KEY `room_schedules_room_id_foreign` (`room_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_schedules`
--
ALTER TABLE `user_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_schedules_user_id_foreign` (`user_id`),
  ADD KEY `user_schedules_schedule_id_foreign` (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1289;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `customer_schedules`
--
ALTER TABLE `customer_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `level_schedules`
--
ALTER TABLE `level_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;
--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `question_reports`
--
ALTER TABLE `question_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=931;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_schedules`
--
ALTER TABLE `room_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_schedules`
--
ALTER TABLE `user_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_schedules`
--
ALTER TABLE `customer_schedules`
  ADD CONSTRAINT `customer_schedules_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `level_schedules`
--
ALTER TABLE `level_schedules`
  ADD CONSTRAINT `level_schedules_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `level_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_reports`
--
ALTER TABLE `question_reports`
  ADD CONSTRAINT `question_reports_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_reports_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_schedules`
--
ALTER TABLE `room_schedules`
  ADD CONSTRAINT `room_schedules_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_schedules`
--
ALTER TABLE `user_schedules`
  ADD CONSTRAINT `user_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
