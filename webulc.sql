-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 05:01 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webulc`
--

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
('2016_10_11_051254_create_products_table', 1),
('2017_01_09_191821_create_post_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `judul`, `slug_judul`, `isi`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Ridwan Kamil Resmikan Toko ''Little Bandung'' di Petaling Jaya', 'Ridwan Kamil Resmikan Toko ''Little Bandung'' di Petaling Jaya', 'Petaling Jaya - Little Bandung Store akhirnya dibuka di Paradigm Mal Petaling Jaya, Malaysia. Pembukaan dihadiri langsung oleh Wali Kota Bandung Ridwan Kamil dan Datok Bandar Petaling Jaya Tuan Muhamad Azizi Bin Muhamad Zain.\r\n\r\nMeski hanya dilakukan di depan toko, peresmian ini cukup meriah. Acara dibuka dengan penampilan seni tari Jaipongan asal Jawa Barat, Selasa (4/10/2016) malam. \r\n\r\nPeresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)Peresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)\r\n\r\n\r\nDalam sambutannya Muhamad Azizi mengatakan, sebagai sister city Bandung, Petaling Jaya menyambut baik kerjasama dengan Kota Bandung khususnya di bidang UMKM.\r\n\r\n"Kami sangat senang, bisa menghadirkan Little Bandung. Ini mempererat hubungan antara Petaling Jaya dengan Kota Bandung. Apalagi kami sama-sama rekan Smart City," ujar Muhamad Azizi dalam sambutanya pada pembukaan.\r\n\r\nSementara itu Wali Kota Bandung Ridwan Kamil mengatakan, dengan hadirnya Little Bandung di Petaling Jaya, diharapkan bisa menggenjot perekonomian dari sisi Usaha Mikro Kecil dan Menengah (UMKM) dari Kota Bandung.\r\n\r\n"Sebagai saudara serumpun, kita harus saling menginspirasi. Dengan saling percaya kita bisa menghadirkan hal-hal positif seperti ini," kata pria yang karib disapa Emil itu.\r\n\r\nPeresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)Peresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)\r\n\r\n\r\nPeresmian Little Bandung tersebut juga dihadiri oleh Duta Besar Republik Indonesia untuk Malaysia Herman Prayitno. Dalam kesempatan tersebut, Herman mengapresiasi kehadiran Little Bandung dalam rangka mempererat hubungan antar dua kota yakni Bandung dan Petaling Jaya.\r\n\r\n"Peresmian ini bukti nyata pemerintah Kota Bandung akan membangun kerjasama lebih erat dan nyata. Bandaraya dan Pemkot Bandung harus mampu meningkatkan pemahaman dan interaksi antara kedua masyarakatnya secara intensif," ucap Herman.\r\n\r\nKBRI mengapresiasi kepemimpinan Wali Kota Bandung yang inisiatif menjual potensi daerahnya untuk diangkat ke luar negeri.\r\n\r\n"KBRI Malaysia sangat mendukung. Kami berharap daerah lain melakukan hal yang sama seperti yang dilakukan Pemkot Bandung. Semoga dapat memberikan manfaat," ucapnya.\r\n\r\nPeresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)Peresmian Little Bandung di Malaysia (Foto: Avitia/detikcom)\r\n\r\n\r\nProduk Bandung yang dijual di Little Bandung Store Paradigm Mal terdiri dari 21 produk, mulai dari produk fashion, kerajinan tangan dan makanan. Konsep Little Bandung Store ini seperti toko pada umumnya namun ditampilkan dengan cantik seolah pengunjung secara langsung hadir di Kota Bandung.\r\n\r\nBeberapa produk yang mejeng di sana yakni Inaddiction Shoes, Kulkith, Cupumanik, Shavasana Handmade, Nukita Food, Ina''s Scarf dan yang lainnya.', 'img_57f3d6a7464f7.jpg', 1, '2016-10-03 19:19:51', '2016-10-03 19:19:51'),
(10, 'Workshop Literasi Sumber Informasi Ilmiah Dalam Rangka Meningkatkan Kualitas Belajar Dan Mengajar Di Sekolah', 'Workshop Literasi Sumber Informasi Ilmiah Dalam Rangka Meningkatkan Kualitas Belajar Dan Mengajar Di Sekolah', 'Banyak yang membayangkan pekerjaan sebagai sekretaris hanyalah sekedar menjadi sekretaris semata. Hal tersebut ditampik oleh Ir. Benny Lianto, M.M.B.A.T., selaku Direktur Politeknik Universitas Surabaya. Menurut beliau ada banyak sekali pekerjaan yang berhubungan dengan sekretaris. Bahkan, salah satunya bisa dihubungkan denganbidang MICE (Meeting Incentive Conference Exhibition) yang menjadi bidang harapan kota Surabaya di masa depan.\r\n\r\nQ : Menurut Bapak, pekerjaan apa saja yang bisa dilakukan oleh seorang sekretaris?\r\n\r\nA : Sekarang ini profesi sekretaris profesional itu pekerjaannya lebih dinamisdan berkembang. Hampr semua pekerjaan administrasi perkantoran dan bisnis pasti melibatkan seorang sekretaris. Sekarang ini seorang sekretaris harus punya banyak kecakapan(skill) untuk mendukung kiprah mereka di dunia kerja (di berbagai sektor: hotel, pariwisata, bank, penerbangan, pertambangan, manufaktur, konsultan, dan pendidikan) dengan berbagai bidang dan peran, misalnya sebagai: Personal Assistant(PA), tenaga Public Relation(PR), Customer Service(CS), Pramugari, dll.\r\n\r\nQ : Apa rencana ke depan Politeknik Ubaya untuk mewadahi kebutuhan akan sekretaris profesional dan cakap tersebut Pak?\r\n\r\nA : Dalam mendukung dan menangkap peluang serta momentum Kota Surabaya sebagai kota MICE, mulai semester ini (semester gasal 2016/2017), prodi sekretari PoliteknikUbaya akan membuka mata kuliah MICE. Rencana ke depan, bidang ini akan dikembangkan menjadi salah satu program kekhususan atau peminatan di prodi sekretari.\r\n\r\nQ : Apakah ada alasan khusus mengapa diputuskan akan dibuka mata kuliah MICE?\r\n\r\nA : Rencana untuk membuka mata kuliah ini sudah sangat lama sebenarnya. Karena dari awal di Prodi Sekretaris dan Marketing sudah ada mata kuliah yang berhubungan dengan MICE, akan tetapi, mata kuliah ini belum terstrukturdan fokus. Jadi tidak benar-benar membahas MICE saja.Semester ini kita ingin memberikannya lebih fokus dan menyeluruh. Selain itu, akhir-akhir ini dikota Surabaya, mulai banyak juga potensi-potensi pekerjaan yang mengarah ke bidang MICE ini.Politeknik Ubaya sebagai Pusat Pendidikan Terapan dan Sertiifikasi (PETSI) harus hadir dalam menyiapkan tenaga terampil untuk mengisi lowongan-lowongan pekrjaan tersebut.\r\n\r\nQ : Bisakah Bapak berikan sedikit bocoran apa yang akan dilakukan pada mata kuliah MICE ini Pak?\r\n\r\nA : Kita akan banyak mengundang dan melibatkan para pelaku usaha di bidang MICE. Mulai dari bidang industri tour and travel, penyedia tempat konferensi,dan bidang lain yang terkait semuanya akan kita undang. Nah, untuk apa kita undang? Mereka nantinya yang akan memberikan kuliah untuk para mahasiswa, jadi nanti para mahasiswa bisa langsung tahu apa saja yang terjadi dan berlangsung dalam bidang MICE yang sebenarnya. Konsep kita 70% praktek dan 30% Konsep/teori..\r\n\r\nQ : Terakhir Pak, kapankah rencana pemintan MICE ini akandi buka dan dijalankan?\r\n\r\nA : Kalau menurut rencana akan dibuka pada tahun ajaran baru 2017(atau paling telat 2018) nanti. Saya sangat optimis peminatan ini akandimintai oleh banyak siswa SMA/SMK. Peminatan MICE ini kita harapkan turut membantu mempersiapkan para tenaga terampil di bidang MICE. Apalagi kemarin MICE disebut-sebut dalam Prepcon UN Habitat III di Surabaya.\r\n\r\nTernyata, menjadi profesi sekretaris dinamis dan terus berkembang di masa yang akan datang hingga ke industri MICE. Semoga mata kuliahdan peminatan MICE ini membawa terobosan baru dan angin segar untuk prodi SekretarisPoliteknik Ubaya. (tea)', 'img_57e0f0f091502.jpg', 1, '2016-09-19 11:18:56', '2016-09-19 11:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `slug_nama`, `keterangan`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Bahasa Inggris', 'Bahasa Inggris', 'BAHASA INGGRIS PEMULA\r\nLEVEL : GRAMMAR Lv.1 | GRAMMAR Lv.2 | GRAMMAR Lv.3 | GRAMMAR Lv.4\r\nTUJUAN : Mampu membuat pola kalimat sehingga siap untuk ke level sebelumnya\r\n\r\nCOMMUNICATIVE ENGLISH | BAHASA INGGRIS LANJUTAN\r\nLEVEL : ALPHA ENGLISH Lv.1, ALPHA ENGLISH Lv.2, FOUNDATION, PRE-INTER I, PRE INTER II, INTERMEDIATE, HIGH INTERMEDIATE, ADVANCED\r\nTUJUAN : Cakap menyimak & berbicara untuk mengemukakan fungsi umum sehari-hari\r\n\r\nENGLISH PAPER WRITING | PELATIHAN PENULISAN MAKALAH\r\nTUJUAN : Mempersiapkan peserta untuk mampu menulis paper atau makalah resmi dalam Bahasa Inggris\r\n\r\nENGLISH TRAINIR PROGRAM\r\nSUMMARIZING CLASS : Bahan ajaran listening, note-taking, reading, summarizing\r\n\r\nPAPER WRITING AND PRESENTATION CLASS\r\nBahan ajaran mengembangkan paragraf, menyusun kerangka paper, menulis paper secara keseluruhan dan mempresentasian paper anda\r\n7 kali pertemuan / 100 menit *) Hanya untuk IBN dan PA', 'img_57fdd91a336eb.jpg', 1, '2016-10-11 09:32:58', '2016-10-11 09:32:58'),
(3, 'Bahasa Jepang', 'Bahasa Jepang', 'LEVEL : DASAR (1A,1B,1C) -DASAR (2A,2B,2C)\r\nINTERMEDIATE - ADVANCED\r\nTUJUAN : Mampu menulis dan berkomunikasi untuk mengungkapkan gagasan umum sehari-hari dalam Bahasa Jepang\r\n\r\nPERSIAPAN NIHONGO NORYOKU SHIKEB (JLPT)\r\nKETENTUAN : Min. lulus kelas 1C Bahasa Jepang di ULC\r\nWAKTU : Hari Minggu pertama di Bulan Juli dan Bulan Desemer (2 kali / tahun)\r\n*) Sertifikasi langsung dari "The Japan Foundation"', 'img_57ff16fd3007d.jpg', 1, '2016-10-12 08:09:17', '2016-10-12 08:09:17'),
(4, 'Bahasa Mandarin', 'Bahasa Mandarin', 'LEVEL : BASIC (LEVEL 1 - LEVEL 5)\r\nTUJUAN : Menguasai penulisan huruf Hanzi, mampu berkomunikasi dengan intonasi yang tepat untuk mengungkapkan gagasan umum sehari-hari\r\n\r\nMANDARIN PERCAKAPAN\r\nLEVEL : BASIC (LEVEL 1 - LEVEL 4)\r\nINTERMEDIATE (LEVEL 1 & LEVEL 2)\r\nTUJUAN : Mampu berkomunikasi dengan intonasi yang tepat untuk mengungkapkan gagasan umum sehari-hari\r\n\r\nMANDARIN FOR BUSINESS\r\nLEVEL : BASIC - ELEMENTARY\r\nTUJUAN : Menguasai bahasa bisnis dalam Bahasa Mandarin', 'img_57ff171ccdb81.jpg', 1, '2016-10-12 08:09:48', '2016-10-12 08:09:48'),
(5, 'Bahasa Korea', 'Bahasa Korea', 'LEVEL : LEVEL 1 - LEVEL 5\r\nTUJUAN : Mampu menulis dan berkomunikasi untuk mengungkapkan gagasan umum sehari-hari dalam Bahasa Korea', 'img_57ff17390c60f.jpg', 1, '2016-10-12 08:10:17', '2016-10-12 08:10:17'),
(6, 'TEST PREPARATION', 'TEST PREPARATION', 'TOEFL\r\nDURASI : 21 kali pertemuan @100 menit\r\niBT, IELTS\r\nDURASI : 32 kali pertemuan @100 menit\r\nPBT, TOEIC\r\nDURASI : 25 kali pertemuan @100 menit', 'img_57ff176930d69.jpg', 1, '2016-10-12 08:11:05', '2016-10-12 08:11:05'),
(7, 'Bahasa Perancis, Jerman, Belanda, Spanyol', 'Bahasa Perancis, Jerman, Belanda, Spanyol', 'BAHASA PRANCIS\r\nLEVEL : Debutant 1 - Debutant 2 - Intermediaire 1 - Intermediaire 2 - Avance - Conversation - Civilisation\r\n\r\nBAHASA JERMAN - BAHASA BELANDA - BAHASA SPANYOL\r\nLEVEL : LEVEL 1 - LEVEL 3\r\nPersiapan Ujian DELF / DALF\r\nKETENTUAN : Min. lulus lv. 3 Bahasa Perancis di ULC\r\n*) Sertifikat langsung dari "Kementrian Pendidikan & Kebudayaan Perancis"', 'img_57ff191b63f1d.jpg', 1, '2016-10-12 08:18:19', '2016-10-12 08:18:19'),
(9, 'BIPA (Bahasa Indonesia untuk Penutur Asing) / ILPSOL (Indonesian Language Program for Speakers of Other Languages).', 'BIPA (Bahasa Indones', 'Surabaya is the commercial and administrative capital of East java, a thriving business and industrial center and the province''s main port. Secon only to Jakarta in size and importance, the city has a population of around 2.5 million residents. From the port area of Tanjung Perak ferries leave regulary for Madura, and air service to and from Surabaya''s Juanda Airport connect the city with Jakarta, Yogyakarta, Bali and other parts of Indonesia.\r\n\r\nSurabaya now enjoys the reputation as being the cleanest city in Indonesia, equipped with modern facilities and offering a standard of accommodation to suit every taste and budget. Places of interest for tourists include Kalimas harbour, Kampung Arab in the old part of the city, the Mpu Tantular Museum, and one of the largest zoos in South East Asia.\r\n\r\nSurabaya is located at the center of the northern coast of East Java Province, bounded to the north and east by the Java sea, the district of Gresik in the west, and by the district of Sidoarjo in the south.\r\n\r\nThe city''s tropical climate has two main identifiable seasons. The dry season from November up to April. The lowest temprature, usually in February, is about 25.5 celcius while the highest temprature is 33.0 celcius in October. The average annual temprature is 27.8 celcius.\r\n\r\nThe commercial trading in Surabaya plays an important role in the development of Eastern Indonesia, especially in East Java. Also popular as a city for education, Surabaya is a place where a host of state and private universitas offer tertiary education. One of the top universities offer tertiary education. One of the top unversities is the University of Surabaya (Ubaya).\r\n\r\nAbout ILPSOL\r\n\r\nOur uniquely designed ILPSOL is offered at three levels : elementary, pre-intermediate and intermediate levels. Types of Classes : Regular class 5-10 students, Small class : 2-4 students, and Private class : 1 student.\r\n\r\nFee: USD 450 per student, the fee includes tuition, learning materials and all of its engaging activities. The course needs a minimum of 5 students in order to start.\r\n\r\nAccommodation, in addition to language learning activities, ILPSOL students will enjoy close contact with the local culture through the city tour and cultural events, and observase how companies operate in Surabaya throught the business visits.\r\n', 'img_58026b942c3ae.png', 1, '2016-10-14 20:47:00', '2016-10-14 20:47:00');

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
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `admin`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mustakim', '6124087', 'mustakimixii@gmail.com', '$2y$10$/b8I6RTm8jgZGsDn2W3bfuGmljGQsNKWRqo57ZrpQdXBMnNtDuIBC', 'admin', 'img_57e0efcdc48b3.png', NULL, NULL, '2016-09-18 14:14:05'),
(2, 'Ahmad Aan', '6124088', 'mustakimi@gmail.com', '$2y$10$/b8I6RTm8jgZGsDn2W3bfuGmljGQsNKWRqo57ZrpQdXBMnNtDuIBC', 'staff', 'img_57e0efcdc48b3.png', NULL, NULL, '2016-09-18 14:14:05'),
(3, 'Mario Christian', 'mario', 'mario@staff.ubaya.ac.id', '$2y$10$/b8I6RTm8jgZGsDn2W3bfuGmljGQsNKWRqo57ZrpQdXBMnNtDuIBC', 'dosen', 'img_57e0efcdc48b3.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
