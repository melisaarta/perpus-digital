-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 06:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun`, `sinopsis`, `cover`) VALUES
(1, '7 in 1 Pemrograman Web untuk Pemula', 'Rohi Abdulloh', 'Elex Media Komputindo', '2018', 'Teknologi pemrograman web berkembang begitu cepat . Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejarnya. Buku ini membahas 7 materi utama dalam mempelajari pemrograman web. Ketujuh bahasan ini akan sangat membantu pemula yang ingin menjadi web programmer dalam waktu yang singkat.\r\n\r\nPembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web satu per satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi.', '1753535555_a2473146188df466607b.jpg'),
(2, 'Pemrograman Web Edisi 3', 'Priyanto Hidayatullah', 'Bi-obses', '2021', 'Buku ini berisi materi untuk mempelajari HTML sebagai bahasa utama pemrograman web serta pengenalan HTML 5, mempelajari CSS untuk melayout web agar rapi dan indah dengan mudah, mempelajari JavaScript agar website Anda lebih interaktif, mempelajari instalasi, fitur, dan konfigurasi XAMPP dengan mudah dan cepat, mempelajari konsep dan cara perancangan basis data menggunakan Entity Relationship Diagram (ERD), mempelajari MySQL serta script-script SQL (SELECT, INSERT, UPDATE. DELETE, TRIGGER, STORED PROCEDURE, dll), mempelajari PHP dari nol sebagai bahasa yang mudah dipelajari untuk membuat sebuah web dinamis, mempelajari Codeigniter sebagai framework yang paling mudah dipelajari untuk membangun web dinamis berbasis PHP-MySQL, mempelajari Node.Js, platform pengembangan web yang populer di kalangan professional programmer, mempelajari tahap-tahap web hosting secara mudah dan mendetail menggunakan layanan web hosting gratis.', '1753534688_99d3e042010899424151.jpg'),
(3, 'Belajar Pemrograman Web untuk Pemula', 'Kristianto Haryodi', 'Anak Hebat Indonesia', '2024', 'Buku ini memberikan panduan esensial yang membimbing pemula melalui perjalanan mendalam pengembangan web, Dimulai dengan memahami HTML sebagai tulang punggung halaman web, pembaca akan diajak merinci struktur dokumen, menyematkan gambar, tautan, dan formulir, serta memahami semantik HTML untuk meningkatkan SEO. Setelah itu, panduan menyeluruh tentang CSS akan mempercantik tampilan halaman web, membahas dari penggunaan selektor hingga animasi. Kemudian, JavaScript menghidupkan halaman web dengan pembahasan variabel, perulangan, dan manipulasi DOM, memungkinkan pembaca membangun interaktivitas yang kuat.', '1753535663_d4bf1682867171abe2e4.jpg'),
(4, 'Buku Mahir Web Programming', 'Ir. Yuniar Supardi dan Defri Faizal Maulana S.', ' Elex Media Komputindo', '2019', '“Buku Mahir Web Programming” ini berisi tentang cara-cara pembuatan program web dengan PHP secara mudah dan lengkap melalui contoh dari beberapa studi kasus.\r\n\r\nBuku ini akan memandu Anda dalam membuat program web dengan mudah dalam waktu singkat, serta dapat dipakai mahasiswa atau programmer yang ingin belajar pemrograman PHP tingkat lanjut. Buku ini juga mempunyai nilai lebih, yaitu pembahasan pembuatan aplikasi web yang lebih dinamik dan sangat bermanfaat bagi pengguna.\r\n\r\nDengan membeli buku ini, Anda akan mendapatkan bonus program web yang memudahkan Anda dalam membangun website-website menarik. Oleh karena itu, yuk segera baca bukunya!', '1753535757_67e85d808610885cecd3.jpg'),
(7, 'Buku Sakti Pemrogaman Web: HTML, CSS, PHP, MYSQL & Javascript', 'Didik Setiawan', 'Start Up', '2019', '“Buku Sakti Pemrogaman Web: HTML, CSS, PHP, MYSQL & Javascript” membahas mengenai serba-serbi pemrograman web, mulai dari HTML, CSS, PHP, Javascript dan Jquery, hingga bagaimana membuat web sederhana.\r\n\r\nPenjelasan materi dalam “Buku Sakti Pemrogaman Web: HTML, CSS, PHP, MYSQL & Javascript” lengkap dan dimulai dengan dasar-dasarnya, sehingga buku ini dapat dijadikan bahan bacaan bagi para pemula yang baru menyelami dunia pemrograman web.', '1753590368_42a2af08dce38ce61a6b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$vCZ0YgEdLa0nnGztnM5cHOkt0Q/FpBkb7F/X2gq7zgdPCsoZN4Y6K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
