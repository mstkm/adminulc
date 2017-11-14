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
-- Database: `ubaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` int(7) DEFAULT NULL,
  `foto` varchar(3) DEFAULT NULL,
  `name` varchar(36) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `foto`, `name`, `status`) VALUES
(1, 6104004, 'mhs', 'INDRA KUSUMA', 'active'),
(2, 6104019, 'mhs', 'LAM VICO SALIM', 'active'),
(3, 6104039, 'mhs', 'ACHMAD ARIF', 'active'),
(4, 6104049, 'mhs', 'DARMAWAN SENJAYA', 'active'),
(5, 6104830, 'mhs', 'AUDI SATRIA HARYANTO', 'active'),
(6, 6104832, 'mhs', 'CENARDY EDBERT SALIM', 'active'),
(7, 6104845, 'mhs', 'TJIANG WIRA ADINATA', 'active'),
(8, 6107001, 'mhs', 'BAMBANG SUTEJO', 'active'),
(9, 6107004, 'mhs', 'EDDY GUNAWAN', 'lulus'),
(10, 6107701, 'mhs', 'RIFKA SEPTIANI', 'active'),
(11, 6107703, '\"\"', 'KHARISMA WARDHANA', 'active'),
(12, 6107810, 'mhs', 'YANSEN WIJAYANTO', 'active'),
(13, 6107811, 'mhs', 'STIFVEN LIONARD', 'active'),
(14, 6107813, 'mhs', 'MAIKEL BUDIMAN', 'active'),
(15, 6107818, 'mhs', 'DERY PRASETYO BRAMASTO', 'active'),
(16, 6114003, 'mhs', 'DONNY PRASETYO HALIM', 'active'),
(17, 6114009, 'mhs', 'CHARLES ANTONI HALIM', 'lulus'),
(18, 6114027, 'mhs', 'LUISA ELVRINSKA', 'active'),
(19, 6114037, 'mhs', 'CORNELIUS FRANS STEFANO', 'active'),
(20, 6114045, 'mhs', 'RICHARD CORA', 'active'),
(21, 6114050, 'mhs', 'FRANSISKUS SURYA HERMAWAN', 'active'),
(22, 6114063, 'mhs', 'ISNARIA ABSYAH AHMAD', 'active'),
(23, 6114069, 'mhs', 'BRYAN KINSKI', 'active'),
(24, 6114072, 'mhs', 'ANDRI DARMAWAN', 'active'),
(25, 6114089, 'mhs', 'VINCENTIUS SAPUTRO LILIMANAK', 'active'),
(26, 6117011, 'mhs', 'STEVANUS DAVID HARTONO', 'active'),
(27, 6117028, 'mhs', 'TISSHA GIVANDA', 'active'),
(28, 6117036, 'mhs', 'ZULVIA RAHMAN', 'active'),
(29, 6117038, 'mhs', 'FLORENCIA IRENA KURNIAWAN', 'active'),
(30, 6117041, 'mhs', 'YOSIA SUMARNO', 'active'),
(31, 6117702, 'mhs', 'GREGORIUS ARDIN PRAYOGO', 'active'),
(32, 6117703, 'mhs', 'CHRISTIAN HARIANTO', 'active'),
(33, 6124001, 'mhs', 'SURYA DARMA PUTRA WIRAWAN', 'active'),
(34, 6124005, 'mhs', 'ERWIN DANU SAPUTRO', 'active'),
(35, 6124015, 'mhs', 'DRAGGAN HARPEND RENTHAMAN', 'active'),
(36, 6124016, 'mhs', 'ALBERT SURYA WIJAYA', 'active'),
(37, 6124025, 'mhs', 'DARMA KRISTIYANTORO', 'active'),
(38, 6124034, 'mhs', 'VICTOR HALIM', 'active'),
(39, 6124036, 'mhs', 'ARNOLD JUNIOR CHANDRA', 'active'),
(40, 6124037, 'mhs', 'CHARLIE WIRYA', 'active'),
(41, 6124044, 'mhs', 'KEVIN AGUSTINUS RANSUN', 'active'),
(42, 6124050, 'mhs', 'ERENDS LUKAS', 'active'),
(43, 6124051, 'mhs', 'JEFFRY WIJAYA', 'active'),
(44, 6124053, 'mhs', 'KAREN LEINITA QUE', 'active'),
(45, 6124056, 'mhs', 'VERONICA GUNAWAN', 'active'),
(46, 6124058, 'mhs', 'DENNY ARIANTO ANGGRIAWAN', 'active'),
(47, 6124063, 'mhs', 'Budiyanto Yaori', 'active'),
(48, 6124072, 'mhs', 'HANIF MASYKURI', 'active'),
(49, 6124081, 'mhs', 'YUDHA PRAWIRA', 'active'),
(50, 6124082, 'mhs', 'NATASYA VANESSA INDRI GURINDA', 'active'),
(51, 6124083, 'mhs', 'AHMAD AAN TORYTONANG', 'active'),
(52, 6124087, 'mhs', 'MUSTAKIM', 'active'),
(53, 6124088, 'mhs', 'RINALDI HALIM', 'active'),
(54, 6124093, 'mhs', 'RIZKY PRIAMBODO WIDAGDO', 'active'),
(55, 6124095, 'mhs', 'KELVIN KO', 'active'),
(56, 6124100, 'mhs', 'TRI INDAH PURNAMASARI', 'active'),
(57, 6124104, 'mhs', 'MUHAMMAD HUSNI THAMRIN', 'active'),
(58, 6124109, 'mhs', 'AHMAD SURYA EKO PRASTYO', 'active'),
(59, 6124112, 'mhs', 'GALIH FATCUR ROJI', 'active'),
(60, 6127014, 'mhs', 'ADDISON ROMANO SOLAIMAN', 'active'),
(61, 6127016, 'mhs', 'Lucia Gotama', 'active'),
(62, 6127020, 'mhs', 'HARIYANTO DWI GUNAWAN', 'active'),
(63, 6127022, 'mhs', 'RIDWAN FIRMANSYAH', 'active'),
(64, 6127023, 'mhs', 'RENOLD ANDIKA HIDAYAT', 'active'),
(65, 6127029, 'mhs', 'WILDAN PRADITYA MULYA', 'active'),
(66, 6127704, '\"\"', 'MUNDI BORNEO UTAMA', 'active'),
(67, 6128010, 'mhs', 'YOHANES BILLY SUSANTO', 'active'),
(68, 6128020, 'mhs', 'AGUNG WIJOYO', 'active'),
(69, 6128056, 'mhs', 'Nikolas Arif Putra', 'active'),
(70, 6134002, 'mhs', 'MURDIYONO PRAYOGI', 'active'),
(71, 6134003, 'mhs', 'JEREMY ALVIN', 'active'),
(72, 6134009, 'mhs', 'FERNANDO KUSUMA', 'active'),
(73, 6134010, 'mhs', 'KEVIN', 'active'),
(74, 6134011, 'mhs', 'BENEDICTA NOVIE BENALY', 'active'),
(75, 6134012, 'mhs', 'GERRY SURYAPUTERA', 'active'),
(76, 6134014, 'mhs', 'JIMMY WIJAYA', 'active'),
(77, 6134015, 'mhs', 'ANTHONY WIJAYA', 'active'),
(78, 6134020, 'mhs', 'HADI KUSUMA POERNOMO', 'active'),
(79, 6134025, 'mhs', 'NICKSEN CHRISMASON MANGKEY', 'active'),
(80, 6134038, 'mhs', 'ADITYA NOVIAN FIRDAUS', 'active'),
(81, 6134042, 'mhs', 'FEBRIANTO RAMADHAN', 'active'),
(82, 6134047, 'mhs', 'DAVID ADIEL', 'active'),
(83, 6134048, 'mhs', 'RHEZA VALLIAN SAYOGA', 'active'),
(84, 6134051, 'mhs', 'SATRIO WIJOYO', 'active'),
(85, 6134052, 'mhs', 'ALIEFIANTO AGOENG RAGIL TRI HARDJO S', 'active'),
(86, 6134053, 'mhs', 'MATIUS BUDI', 'active'),
(87, 6134061, 'mhs', 'LISANIA AYU AGUSTIN', 'active'),
(88, 6134062, 'mhs', 'EDWIN JOHAN RUSLI', 'active'),
(89, 6134072, 'mhs', 'WELI SUSANTO WIDJAYA', 'active'),
(90, 6134080, 'mhs', 'MUHAMMAD ROYHAN', 'active'),
(91, 6134084, 'mhs', 'PUNGKY KURNIAWAN KRISTIANTO', 'active'),
(92, 6134088, 'mhs', 'ERICK KRESNAMURTI', 'active'),
(93, 6134089, 'mhs', 'MUHAMMAD SYAHRUL BASTOMY', 'active'),
(94, 6134091, 'mhs', 'PUTRI AYU SHALIHINNA', 'active'),
(95, 6134093, 'mhs', 'REVALDY AJI HIMAWAN', 'active'),
(96, 6134096, 'mhs', 'ERWIN ANGJAYA', 'active'),
(97, 6134097, 'mhs', 'RENO ADI JULIANSYAH', 'active'),
(98, 6134098, 'mhs', 'I\\AN ARDI HISBULLOH', 'active'),
(99, 6134099, 'mhs', 'M. GALIH ILHAM GIFARI', 'active'),
(100, 6134107, 'mhs', 'NANDYA CAHYA PUSPITA', 'active'),
(101, 6134109, 'mhs', 'WELLY', 'active'),
(102, 6134110, 'mhs', 'DAVID SETIAWAN WIJAYA', 'active'),
(103, 6134111, 'mhs', 'STEVEN BRIAN SUSANTIO', 'active'),
(104, 6134112, 'mhs', 'SINTYA RIDHO PAMUNGKAS', 'active'),
(105, 6134114, 'mhs', 'REYNALDO LIANDER', 'active'),
(106, 6134116, 'mhs', 'IRMAN FAQRIZAL', 'active'),
(107, 6134117, 'mhs', 'BASKORO NUGROHO', 'active'),
(108, 6134126, 'mhs', 'HARUM HAPSARI', 'active'),
(109, 6134127, 'mhs', 'IVANA MEIANDIKA HIZRIYAH PANE', 'active'),
(110, 6134130, 'mhs', 'DYAH PARAMA ISWARI', 'active'),
(111, 6134134, 'mhs', 'DEA DEWINTA', 'active'),
(112, 6134136, 'mhs', 'SAEPTYAN DONI SETYAWAN', 'active'),
(113, 6134137, 'mhs', 'ROSABELLA EMAS SALISNANDA', 'active'),
(114, 6134701, '\"\"', 'Hanugrha Abidianto', 'active'),
(115, 6137001, 'mhs', 'YOHANES STEVEN WIJAYA', 'active'),
(116, 6137002, 'mhs', 'CHARLIE', 'active'),
(117, 6137003, 'mhs', 'DANIEL SETIAWAN', 'active'),
(118, 6137005, 'mhs', 'IVAN SUSANTO TJIANG', 'active'),
(119, 6137007, 'mhs', 'FERRY SUSILO', 'active'),
(120, 6137008, 'mhs', 'YOGI SETIA BAHRI', 'active'),
(121, 6137011, 'mhs', 'EDWARD FANGGIH', 'active'),
(122, 6137012, 'mhs', 'LORENZO ANDRE PRASETIJO', 'active'),
(123, 6137013, 'mhs', 'DANIEL CHRISTIAN TRISULO', 'active'),
(124, 6137018, 'mhs', 'CHRISTOPER WIJAYA RIMBA', 'active'),
(125, 6137021, 'mhs', 'KEVIN WAHYU MAHENDRA', 'active'),
(126, 6137023, 'mhs', 'YOVAN SANTOSO', 'active'),
(127, 6137024, 'mhs', 'ROY PRASETYO HARTONO', 'active'),
(128, 6137028, 'mhs', 'LEON HARTONO', 'active'),
(129, 6137029, 'mhs', 'YOHANES SUSANTO', 'active'),
(130, 6137030, 'mhs', 'ANDRE RENALDO', 'active'),
(131, 6137037, 'mhs', 'SILVANO BILL SUKAMTO', 'active'),
(132, 6137039, 'mhs', 'YOVITA ROSALIN', 'active'),
(133, 6137041, 'mhs', 'DAVID SUROSEGORO', 'active'),
(134, 6137042, 'mhs', 'PHILIPUS REINHARD TANDILOBO', 'active'),
(135, 6137053, 'mhs', 'EHSAR DESA MAHARDHIKA', 'active'),
(136, 6137055, 'mhs', 'MUHAMMAD INDRA PRASETYA HENING', 'active'),
(137, 6138002, 'mhs', 'HARI DARMAWAN LIMANTO', 'active'),
(138, 6138006, 'mhs', 'JEREMIAH LUGITO', 'active'),
(139, 6138018, 'mhs', 'YUKIKO EKAWATI HANANTA', 'active'),
(140, 6138020, 'mhs', 'ANGELINA SIGIT', 'active'),
(141, 6138030, 'mhs', 'GABRIELA ISABELA', 'active'),
(142, 6138031, 'mhs', 'ERVITA', 'active'),
(143, 6138032, 'mhs', 'F R I S K A', 'active'),
(144, 6138033, 'mhs', 'GABRIELLA ANGELIN', 'active'),
(145, 6138034, 'mhs', 'ONGKY VIRIYA LIMANTO', 'active'),
(146, 6138038, 'mhs', 'MARCELLINUS DICKY PRADHANA', 'active'),
(147, 6138040, 'mhs', 'THEN MICHAEL', 'active'),
(148, 6138052, 'mhs', 'ALEX WIJAYA', 'active'),
(149, 6138072, 'mhs', 'GLEDIS EMANUELA', 'active'),
(150, 6138081, 'mhs', 'YOSHUA EVANTIUS', 'active'),
(151, 6138083, 'mhs', 'SELA DIAN PRATISNA', 'active'),
(152, 6138092, 'mhs', 'ELIZAH MAHARANI KERTOAJI', 'active'),
(153, 6138093, 'mhs', 'YULIA FAJRIN', 'active'),
(154, 6139003, 'mhs', 'MICHAEL ONGKOWIJOYO YUWONO', 'active'),
(155, 6139005, 'mhs', 'AHMAD MEGAN TABAWANI', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
