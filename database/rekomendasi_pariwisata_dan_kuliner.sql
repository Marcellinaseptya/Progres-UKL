-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 05.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekomendasi_pariwisata_dan_kuliner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliner`
--

CREATE TABLE `kuliner` (
  `nama_kuliner` varchar(225) NOT NULL,
  `IDkuliner` int(11) NOT NULL,
  `deskripsi_kuliner` varchar(225) NOT NULL,
  `website_kuliner` varchar(225) NOT NULL,
  `image` varchar(50) NOT NULL,
  `maps` varchar(50) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `harga` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuliner`
--

INSERT INTO `kuliner` (`nama_kuliner`, `IDkuliner`, `deskripsi_kuliner`, `website_kuliner`, `image`, `maps`, `jadwal`, `harga`) VALUES
('Sate Gebug', 1, 'Sate Gebug adalah sate yang di “gebug” dalam Bahasa Jawa berarti “dipukul” hingga daging sapi menjadi lunak dan lembut saat dimasak. Selama 100 tahun lebih berdiri, tempat ini pun tidak pernah membuka cabang.', 'https://www.instagram.com/explore/locations/176575302357219/sate-gebug-komo/', '66588d5f7bf17.jpg', 'https://maps.app.goo.gl/G4cP2hWL23CGC8ar5', '8.00am – 4.30pm', 20.000),
('Bakso Presiden', 2, 'Kuliner Bakso President menambah lengkap anda bila berkunjung ke kota Malang Khususnya Kelurahan Rampal Celaket dengan ciri khas sensasi getaran akan lewatnya kereta api yang menambah nuansa makan menjadi berkesan.', 'https://www.instagram.com/baksopresidentmalang/', '66589d4a53935.jpg', 'https://maps.app.goo.gl/r8ZJghDo8z6V5B9X6', '8.00 am–9.30 pm', 30.000),
('Pecel Kawi', 3, 'Pecel Kawi layak dijadikan ikon pecel dari Kota Malang, bukan tanpa alasan, seperti yang terpampang di depan warungnya yang memang terletak di Jalan Kawi Kota Malang ini, memang sudah berdiri sejak 1975.', 'https://www.instagram.com/pecelkawi/?hl=en', '66589da92f459.jpg', 'https://maps.app.goo.gl/Zts9v5nNSBocThQ16', '6.30 am–5.00 pm', 10.000),
('Rawon Brintik', 4, 'Rawon Brintik merupakan tempat makan rawon tertua di Malang. Warung nasi ini berdiri sejak 1942. Meski sudah berumur hampir 80 tahun, Rawon Brintik tetap mempertahankan cita rasa rawon yang masih sama enaknya.', 'https://www.facebook.com/profile.php?id=175727375803454&_rdr', '66589de90178e.jpg', 'https://maps.app.goo.gl/tHrcghTxxFo64JUs7', '5.00 am–4.00 pm', 25.000),
('Bakpao Boldy', 5, 'Jika Anda tertarik dengan jajan malangan yang manis dan sedikit mengenyangkan, Anda bisa mencoba Bakpao Boldy. Bakpao satu ini sudah ada sejak tahun 1950. Nama Boldy sendiri berasal dari nama jalan tempat berjualannya.', 'https://www.instagram.com/bakpaoboldy/?hl=en', '6661c2c2c6582.jpg', 'https://maps.app.goo.gl/NK19p3Jbt3oMBCRe8', '7.00 am–5.00 pm', 35.000),
('Kue Balok Susu', 7, 'Kue balok ini selalu menawarkan kelumeran yang tidak ada duanya. Dibuat dari tepung dan dark coklat premium menawarkan sentuhan baru di lidah.', 'https://www.instagram.com/baloksusukotabatu/', '66589e9303e14.jpg', 'https://maps.app.goo.gl/hJ9ygkVF1ZgN17xz5', '7.00 am–4.00 pm', 40.000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_kuliner`
--

CREATE TABLE `rating_kuliner` (
  `idrating_kuliner` int(11) NOT NULL,
  `IDtransaksi_kuliner` int(11) NOT NULL,
  `IDkuliner` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rating_kuliner`
--

INSERT INTO `rating_kuliner` (`idrating_kuliner`, `IDtransaksi_kuliner`, `IDkuliner`, `ID`, `rating`, `feedback`) VALUES
(1, 7, 4, 11, 5, 'enakk'),
(2, 1, 1, 14, 5, 'enakkkkk'),
(3, 11, 2, 18, 5, 'wenakk'),
(4, 12, 3, 18, 5, 'murahh enakk'),
(17, 17, 5, 22, 5, 'enakk'),
(18, 18, 7, 22, 5, 'enaknyaaa lumerr'),
(19, 19, 5, 10, 4, 'enak'),
(20, 20, 5, 11, 4, 'enakk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_wisata`
--

CREATE TABLE `rating_wisata` (
  `idrating_wisata` int(11) NOT NULL,
  `IDtransaksi` int(11) NOT NULL,
  `IDwisata` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rating_wisata`
--

INSERT INTO `rating_wisata` (`idrating_wisata`, `IDtransaksi`, `IDwisata`, `ID`, `rating`, `feedback`) VALUES
(1, 28, 6, 11, 4, 'bagus wisatanya'),
(2, 29, 3, 14, 1, 'bgussssss'),
(3, 32, 4, 19, 4, 'kurang puas'),
(4, 33, 4, 19, 2, 'jlekkk'),
(5, 33, 4, 19, 4, 'bguss'),
(6, 34, 3, 19, 4, 'bagussss'),
(7, 35, 2, 19, 4, 'bagusss buangetttttt'),
(8, 36, 36, 19, 4, 'waw selecta bagus\r\n'),
(9, 37, 19, 19, 5, 'sukaaa'),
(10, 38, 5, 20, 5, 'bgussssss'),
(11, 40, 3, 11, 5, 'wawww'),
(12, 41, 14, 11, 5, 'pantainya indah sekaliii'),
(13, 42, 15, 11, 4, 'bagus ya'),
(14, 44, 3, 11, 5, 'bagussnyaa'),
(15, 46, 3, 18, 5, 'waw impresif'),
(16, 20, 6, 4, 5, 'bagusnyaaaaa'),
(17, 42, 15, 11, 5, 'waww baguss'),
(18, 54, 2, 11, 5, 'good'),
(21, 55, 4, 22, 5, 'bagusss'),
(22, 56, 16, 22, 5, 'bagus murah'),
(23, 57, 17, 22, 5, 'wahananya seruu'),
(24, 58, 19, 10, 4, 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `IDtransaksi` int(11) NOT NULL,
  `IDwisata` int(11) NOT NULL,
  `ID_tiket` int(50) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','successful','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`IDtransaksi`, `IDwisata`, `ID_tiket`, `ID`, `total`, `jumlah`, `tanggal`, `status`) VALUES
(8, 2, NULL, 14, 200.000, 2, '2024-05-30', 'canceled'),
(9, 2, NULL, 11, 0.000, 2, '2024-05-30', 'canceled'),
(13, 14, NULL, 14, 20.000, 1, '2024-05-30', 'canceled'),
(14, 15, NULL, 14, 60.000, 3, '2024-05-30', 'successful'),
(15, 14, NULL, 14, 20.000, 1, '2024-05-30', 'successful'),
(16, 17, NULL, 14, 200.000, 2, '2024-05-30', 'successful'),
(19, 2, NULL, 1, 100.000, 1, '2024-05-30', 'pending'),
(20, 6, NULL, 4, 240.000, 2, '2024-05-30', 'pending'),
(21, 2, NULL, 1, 100.000, 1, '2024-05-30', 'pending'),
(22, 6, NULL, 10, 600.000, 5, '2024-05-30', 'successful'),
(23, 19, NULL, 10, 320.000, 8, '2024-05-24', 'canceled'),
(24, 15, NULL, 10, 280.000, 14, '2024-05-31', 'successful'),
(25, 13, NULL, 7, 850.000, 5, '2024-06-01', 'successful'),
(26, 3, NULL, 7, 1040.000, 8, '2024-06-08', 'successful'),
(27, 4, NULL, 18, 480.000, 4, '2024-05-22', 'canceled'),
(28, 6, NULL, 11, 720.000, 6, '2024-06-08', 'successful'),
(29, 3, NULL, 14, 520.000, 4, '2024-06-08', 'successful'),
(30, 5, NULL, 14, 300.000, 3, '2024-06-07', 'successful'),
(31, 14, NULL, 19, 40.000, 2, '2024-05-31', 'canceled'),
(32, 4, NULL, 19, 240.000, 2, '2024-05-31', 'successful'),
(33, 4, NULL, 19, 600.000, 5, '2024-06-04', 'successful'),
(34, 3, NULL, 19, 1560.000, 12, '2024-06-08', 'successful'),
(35, 2, NULL, 19, 400.000, 4, '2024-06-07', 'successful'),
(36, 36, NULL, 5, 300.000, 6, '2024-06-08', 'successful'),
(37, 19, NULL, 19, 280.000, 7, '2024-06-06', 'successful'),
(38, 5, NULL, 20, 600.000, 6, '2024-06-08', 'successful'),
(39, 3, NULL, 11, 260.000, 2, '2024-06-01', 'canceled'),
(40, 13, NULL, 11, 1530.000, 9, '2024-06-08', 'successful'),
(41, 14, NULL, 11, 260.000, 13, '2024-05-31', 'successful'),
(42, 15, NULL, 11, 180.000, 9, '2024-06-08', 'successful'),
(43, 5, NULL, 11, 100.000, 1, '2024-06-01', 'successful'),
(44, 3, NULL, 11, 1170.000, 9, '2024-06-01', 'successful'),
(45, 3, NULL, 18, 2340.000, 18, '2024-06-01', 'successful'),
(46, 3, NULL, 18, 780.000, 6, '2024-06-01', 'successful'),
(47, 3, NULL, 22, 1170.000, 9, '2024-06-01', 'canceled'),
(48, 17, NULL, 22, 1200.000, 12, '2024-06-01', 'successful'),
(49, 17, NULL, 22, 400.000, 4, '2024-06-29', 'canceled'),
(50, 16, NULL, 22, 70.000, 14, '2024-06-01', 'successful'),
(51, 16, NULL, 22, 30.000, 6, '2024-06-01', 'successful'),
(52, 16, NULL, 11, 30.000, 6, '2024-06-01', 'successful'),
(53, 3, NULL, 11, 650.000, 5, '2024-06-04', 'successful'),
(54, 2, NULL, 11, 400.000, 4, '2024-06-12', 'successful'),
(55, 4, NULL, 22, 600.000, 5, '2024-07-06', 'successful'),
(56, 16, NULL, 22, 30.000, 6, '2024-06-06', 'successful'),
(57, 17, NULL, 22, 600.000, 6, '2024-07-07', 'successful'),
(58, 19, NULL, 10, 200.000, 5, '2024-06-08', 'successful');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_kuliner`
--

CREATE TABLE `transaksi_kuliner` (
  `IDtransaksi_kuliner` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `IDkuliner` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('pending','successful','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_kuliner`
--

INSERT INTO `transaksi_kuliner` (`IDtransaksi_kuliner`, `ID`, `IDkuliner`, `total`, `jumlah`, `tanggal`, `status`) VALUES
(1, 14, 1, 0.000, 1, '2024-05-29', 'successful'),
(2, 10, 1, 100.000, 5, '2024-05-29', 'successful'),
(3, 7, 4, 175.000, 7, '2024-06-07', 'canceled'),
(4, 7, 7, 120.000, 3, '2024-06-08', 'successful'),
(5, 7, 2, 150.000, 5, '2024-06-08', 'canceled'),
(6, 18, 1, 120.000, 6, '2024-06-07', 'successful'),
(7, 11, 4, 25.000, 1, '2024-05-31', 'successful'),
(8, 11, 2, 60.000, 2, '2024-06-05', 'successful'),
(9, 11, 4, 100.000, 4, '2024-06-04', 'canceled'),
(10, 14, 3, 70.000, 7, '2024-06-06', 'successful'),
(11, 18, 2, 60.000, 2, '2024-06-29', 'successful'),
(12, 18, 3, 60.000, 6, '2024-06-01', 'successful'),
(13, 22, 2, 120.000, 4, '2024-06-18', 'successful'),
(14, 22, 5, 210.000, 6, '2024-06-21', 'canceled'),
(15, 11, 5, 210.000, 6, '2024-07-05', 'successful'),
(16, 11, 5, 175.000, 5, '2024-06-04', 'successful'),
(17, 22, 5, 280.000, 8, '2024-06-06', 'successful'),
(18, 22, 7, 240.000, 6, '2024-06-06', 'successful'),
(19, 10, 5, 175.000, 5, '2024-06-08', 'successful'),
(20, 11, 5, 140.000, 4, '2024-06-09', 'successful');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `ID`, `username`, `password`, `level`) VALUES
('ceceee', 1, 'cece', 'cecee', 'user'),
('rapippp', 2, 'rapippp', 'pip', 'Pilih'),
('caca', 3, 'caa', 'caca', 'user'),
('angel', 4, 'nja', 'nja', 'user'),
('cece', 5, 'ce', 'cee', 'user'),
('smp', 6, 'candi1', '1234', 'user'),
('cece', 7, 'ceces', 'ces', 'user'),
('admin', 10, 'admin', 'admin', 'admin'),
('user', 11, 'user', 'user', 'user'),
('', 12, 'admin', 'admin', 'Pilih'),
('marcellina', 13, 'marcellina', 'cece', 'user'),
('celin', 14, 'celin', 'celin', 'user'),
('ceces', 17, 'ceces', 'ceces', 'user'),
('ceyy', 18, 'ceyy', 'ceyy', 'user'),
('firaa', 19, 'firaa', 'firaa', 'user'),
('aku', 20, 'aku', 'aku', 'user'),
('ceyy', 21, 'ceyy', 'ceyy', 'user'),
('ly', 22, 'ly', 'ly', 'user'),
('gab', 23, 'gab', 'gab', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `nama_wisata` varchar(225) NOT NULL,
  `deskripsi_wisata` varchar(225) NOT NULL,
  `IDwisata` int(11) NOT NULL,
  `website_wisata` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `maps` varchar(100) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `harga` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`nama_wisata`, `deskripsi_wisata`, `IDwisata`, `website_wisata`, `image`, `maps`, `jadwal`, `harga`) VALUES
('Flora Wisata San Terra', 'Flora Wisata San Terra merupakan destinasi wisata dengan konsep taman bunga, spot foto berupa bangunan bergaya Korea dan Belanda, wahana permainan, serta kuliner ala garden.', 2, 'https://www.florawisatasanterra.com/', '6656d6e42cec3.jpg', 'https://maps.app.goo.gl/K6GpJ2WBjQUajQRG9', '8.00am - 5.00pm', 100.000),
('Malang Night Paradise', 'Malang Night Paradise merupakan wisata malam terbesar di Jawa Timur yang menawarkan keindahan gemerlap taman lampu LED dan taman lampion, dan merupakan satu-satunya tempat foto dengan standar internasional.', 3, 'https://malangnightparadise.com/', '6656f4f2c8f28.jpeg', 'https://maps.app.goo.gl/irYdbcVGuK3gZcKm8', '5.45pm - 11.00pm', 130.000),
('Museum Angkut', 'Museum Angkut merupakan museum transportasi dan tempat wisata modern yang terletak di Kota Batu, Jawa Timur, sekitar 20 km dari Kota Malang.', 4, 'https://jtp.id/museumangkut/mobile/', '665712214c13f.png', 'https://maps.app.goo.gl/ACg22YbKyqWbppuT6', '12.00pm - 8.00pm', 120.000),
('Jatim Park 1', 'Jatim Park 1 merupakan tempat rekreasi yang dibangun pertama kali oleh Jatim Park. Tempat wisata ini memiliki konsep taman bermain yang dipadukan dengan taman edukasi. Jatim Park 1 menyediakan banyak wahana seru.', 5, 'https://jtp.id/jatimpark1/mobile/', '6657137629be5.jpg', 'https://maps.app.goo.gl/eo26KHF6hPxvNYqf9', '08.30am - 4.30pm', 100.000),
('Jatim Park 2', 'Jatim Park 2 memiliki konsep kebun binatang interaktif. Tempat ini terbagi menjadi tiga area, yaitu Batu Secret Zoo, Museum Satwa, dan Eco Green park. Di Batu Secret Zoo, pengunjung dapat melihat berbagai satwa.', 6, 'https://jtp.id/batusecretzoo/', '6657140eaa4a3.png', 'https://maps.app.goo.gl/8aY3ga1cLu2Adsdw5', '08.30am - 4.30pm', 120.000),
('Jatim Park 3', 'Jawa Timur Park 3 atau yang dikenal dengan Jatim Park 3 adalah sebuah taman rekreasi yang dibangun oleh Jatim Park Group. Taman rekreasi ini menyediakan berbagai macam duplikat satwa prasejarah.', 13, 'https://jtp.id/jatimpark3/mobile/', '66571451c6036.jpg', 'https://maps.app.goo.gl/pd57ALzvYcNB9B478', '08.30am - 4.30pm', 170.000),
('Pantai Balekambang', 'Pantai Balekambang adalah sebuah pantai di pesisir selatan yang terletak di tepi Samudra Indonesia secara administratif masuk wilayah Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Kabupaten Malang, Jawa Timur.', 14, 'https://id.wikipedia.org/wiki/Pantai_Balekambang', '6657154a6f805.jpg', 'https://maps.app.goo.gl/c1EK7rfmrvtwNNMB7', 'everyday', 20.000),
('Lembah Indah Malang', 'Lembah Indah Malang atau disebut juga Lembah Indah Gunung Kawi terletak di Desa Gendogo Baleasri, Kecamatan Ngajum, Kabupaten Malang, Jawa Timur. Lembah Indah Malang yang terletak di lereng Gunung Kawi menyusun konsep unik.', 15, 'https://www.instagram.com/lembahindah/?hl=en', '665715a24c42c.jpg', 'https://maps.app.goo.gl/di7CQiGJ99xbTuZ29', '8.00am - 6.00pm', 20.000),
('Sumber Sira', 'Sumber Sirah terletak di Desa Kekep, Kecamatan Gurah, Kabupaten Kediri, Jawa Timur. Sumber Sirah merupakan wisata sumber air yang dikeliling sejumlah pohon dan sangat instagramable.', 16, 'https://www.instagram.com/wisata_sumbersira/?hl=en', '665716ce30660.jpg', 'https://maps.app.goo.gl/vmutGi7KsdgVigVw6', '7.00am - 5.00pm', 5.000),
('Hawaii Waterpark Malang', 'Hawai Waterpark merupakan taman bermain air yang terletak di kota Malang dan menawarkan wahana basah dan kering, mulai dari perosotan air, kolam ombak, dan area memanjat untuk anak-anak.', 17, 'https://hawaiwaterpark.com/', '6661c751132c2.jpg', 'https://maps.app.goo.gl/QZKBtUFw9qTaWMtG8', '9.00am - 5.00pm', 100.000),
('Batu Night Spectacular', 'Batu Night Spectacular adalah sebuah lokawisata yang berada di Kota Batu, Jawa Timur. BNS hanya beroperasi pada malam hari. BNS menggabungkan konsep pusat perbelanjaan, permainan, olahraga, dan hiburan di dalamnya.', 19, 'https://jtp.id/bns/', '665717114c173.jpeg', 'https://maps.app.goo.gl/i9T5ptNfeC5Jp4j28', '3.00pm - 11.00pm', 40.000),
('Selecta', 'Selecta menggabungkan unsur keindahan alam dan kesejukan hawa pegunungan, terletak di Desa Tulungrejo Kota Wisata Batu, Dikelilingi oleh Gunung Arjuna,Welirang dan Anjasmoro', 36, 'https://selectawisata.id/', '6657188f9ef8b.jpg', 'https://maps.app.goo.gl/65ZqSKpi7dd6QS4w8', '7.00am - 5.00pm', 50.000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`IDkuliner`);

--
-- Indeks untuk tabel `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  ADD PRIMARY KEY (`idrating_kuliner`),
  ADD KEY `IDtransaksi_kuliner` (`IDtransaksi_kuliner`),
  ADD KEY `IDkuliner` (`IDkuliner`) USING BTREE,
  ADD KEY `fk_rating_kuliner_relation_user` (`ID`);

--
-- Indeks untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  ADD PRIMARY KEY (`idrating_wisata`),
  ADD KEY `IDtransaksi` (`IDtransaksi`),
  ADD KEY `fk_rating_wisata_relation_wisata` (`IDwisata`),
  ADD KEY `fk_rating_wisata_relation_user` (`ID`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IDtransaksi`),
  ADD KEY `ID` (`ID`),
  ADD KEY `IDwisata` (`IDwisata`);

--
-- Indeks untuk tabel `transaksi_kuliner`
--
ALTER TABLE `transaksi_kuliner`
  ADD PRIMARY KEY (`IDtransaksi_kuliner`),
  ADD KEY `fk_transaksi_kuliner_relation_user` (`ID`),
  ADD KEY `fk_transaksi_kuliner_relation_kuliner` (`IDkuliner`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`IDwisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `IDkuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  MODIFY `idrating_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  MODIFY `idrating_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `IDtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `transaksi_kuliner`
--
ALTER TABLE `transaksi_kuliner`
  MODIFY `IDtransaksi_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `IDwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  ADD CONSTRAINT `fk_rating_kuliner_relation_kuliner` FOREIGN KEY (`IDkuliner`) REFERENCES `kuliner` (`IDkuliner`),
  ADD CONSTRAINT `fk_rating_kuliner_relation_user` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `rating_kuliner_ibfk_1` FOREIGN KEY (`IDtransaksi_kuliner`) REFERENCES `transaksi_kuliner` (`IDtransaksi_kuliner`);

--
-- Ketidakleluasaan untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  ADD CONSTRAINT `fk_rating_wisata_relation_user` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_rating_wisata_relation_wisata` FOREIGN KEY (`IDwisata`) REFERENCES `wisata` (`IDwisata`),
  ADD CONSTRAINT `rating_wisata_ibfk_1` FOREIGN KEY (`IDtransaksi`) REFERENCES `transaksi` (`IDtransaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`IDwisata`) REFERENCES `wisata` (`IDwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_kuliner`
--
ALTER TABLE `transaksi_kuliner`
  ADD CONSTRAINT `transaksi_kuliner_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_kuliner_ibfk_2` FOREIGN KEY (`IDkuliner`) REFERENCES `kuliner` (`IDkuliner`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
