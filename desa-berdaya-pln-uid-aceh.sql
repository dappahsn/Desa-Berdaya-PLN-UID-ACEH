-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 07, 2025 at 05:56 PM
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
-- Database: `desa-berdaya-pln-uid-aceh`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(5, 'Tas Aceh'),
(6, 'Baju'),
(7, 'Makanan'),
(8, 'Topi'),
(9, 'Kerajinan Tangan'),
(10, 'Alat Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia',
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`, `nomor_telepon`) VALUES
(19, 5, 'Tas Aceh', 10000, 'z0slB1QG03HsiGuzYoUF.jpg', 'Tas khas Aceh ini dirancang dengan sentuhan etnik yang memadukan motif tradisional dan gaya modern. Terbuat dari bahan berkualitas tinggi dengan jahitan rapi, tas ini cocok digunakan untuk kegiatan sehari-hari maupun acara khusus. Motif yang diusung menggambarkan keindahan budaya Aceh yang penuh makna. Tas ini bukan hanya sebagai pelengkap fashion, tetapi juga sebagai bentuk kecintaan terhadap produk lokal.', 'tersedia', '085260741000'),
(20, 8, 'Peci Khas Aceh', 25000, 'eFtEQhXBIPzRu6vydxRf.jpg', 'Peci Aceh merupakan simbol identitas dan keagamaan yang sarat nilai budaya. Ditenun secara manual oleh pengrajin lokal, setiap helai benang pada kopiah ini merepresentasikan warisan leluhur. Bahannya nyaman dan ringan, cocok digunakan saat ibadah atau acara resmi. Warna dan motifnya mencerminkan ciri khas Aceh yang elegan dan berkelas.', 'tersedia', '082183422583'),
(21, 9, 'Kain Ukir', 55000, 'UNcDa5wHvjuNkFOsrn3A.jpg', 'Kain ukir Aceh merupakan karya seni tekstil yang menggambarkan kehalusan dan keanggunan budaya lokal. Dengan motif ukiran khas dan pewarnaan alami, kain ini cocok digunakan sebagai bahan busana, selendang, maupun dekorasi ruangan. Setiap helai kain dibuat secara manual oleh pengrajin berpengalaman, menciptakan nilai estetika dan eksklusivitas tersendiri.', 'tersedia', '082183422583'),
(22, 9, 'Tikar', 100000, 'yRmJ7xUVMGtqOgZGhLny.jpg', 'Tikar anyaman khas Aceh ini dibuat dari bahan alami seperti pandan atau rotan, dianyam secara tradisional oleh pengrajin lokal. Motif dan warna yang dihasilkan mencerminkan keindahan dan kearifan lokal. Tikar ini cocok digunakan untuk bersantai, acara keluarga, hingga dekorasi ruangan. Selain fungsional, produk ini juga mendukung pelestarian budaya anyaman tradisional.', 'tersedia', '082183422583'),
(23, 7, 'Kue Boy', 20000, 'NpF3nkhhqzhjRqp45y1S.png', 'Kue Boy adalah salah satu kue tradisional khas Aceh yang memiliki rasa manis legit dengan tekstur lembut dan sedikit lengket. Terbuat dari bahan alami seperti tepung ketan, gula merah, dan santan, kue ini dimasak secara tradisional menggunakan api kecil agar menghasilkan aroma khas yang menggugah selera. Cocok disajikan sebagai camilan saat bersantai atau untuk hidangan pada acara adat dan hari besar. Kue Boy tidak hanya menawarkan rasa, tapi juga membawa kenangan dan kekayaan budaya Aceh dalam setiap gigitan.', 'tersedia', '082183422583'),
(24, 6, 'Kaos Oblong', 120000, 'RgugZXEvIaIDRBDMSz9D.jpg', 'Baju kaos dengan desain khas Aceh ini menghadirkan nuansa lokal yang unik dalam balutan busana kasual. Terbuat dari bahan katun lembut, nyaman dipakai sehari-hari, dan tidak mudah luntur. Didesain dengan ilustrasi budaya, tulisan khas, atau landmark Aceh, menjadikannya pilihan tepat sebagai buah tangan maupun identitas kebanggaan daerah.', 'tersedia', '082183422583'),
(25, 7, 'Ikan Keumamah', 40000, 'VAz7f15rZ80eNjVjPK5S.jpg', 'Ikan Keumamah, atau sering disebut ikan kayu, adalah olahan ikan khas Aceh yang diawetkan secara tradisional melalui proses perebusan, pengeringan, dan pengasapan. Menggunakan ikan tuna atau tongkol berkualitas, Keumamah dikenal tahan lama dan kaya akan cita rasa. Cocok dimasak dengan bumbu khas Aceh seperti santan, cabai, dan rempah-rempah. Produk ini praktis, bergizi tinggi, dan ideal sebagai lauk atau oleh-oleh khas Aceh yang otentik.', 'tersedia', '082183422583'),
(26, 7, 'Kue AG', 30000, 'gyGPghN1GqmQJiGSID4F.jpg', 'Kue AG (Asli Gampong) Sabang adalah cemilan khas dengan rasa otentik yang mewakili kelezatan kuliner pulau Weh. Dibuat dari bahan alami pilihan tanpa bahan pengawet, kue ini memiliki cita rasa manis dan gurih yang pas di lidah. Cocok untuk oleh-oleh atau camilan keluarga di rumah. Rasakan sensasi lembut dan renyah dalam setiap gigitannya!\r\n', 'tersedia', '082183422583'),
(27, 7, 'Dendeng', 80000, '90nMFGx7aWHJ0r0ElsOc.jpg', 'Dendeng Aceh merupakan olahan daging sapi pilihan yang dipotong tipis, dibumbui dengan rempah-rempah khas, lalu dikeringkan hingga tahan lama. Teksturnya renyah di luar namun tetap empuk di dalam, dengan cita rasa gurih pedas yang menggoda. Cocok dinikmati sebagai lauk atau camilan, dendeng ini menjadi favorit banyak kalangan dan pilihan oleh-oleh yang praktis serta nikmat.', 'tersedia', '082183422583'),
(28, 10, 'Kuali', 35000, '1OqgGOWq6eNUstbvIJNw.jpg', 'Kuali tanah liat buatan tangan ini adalah alat masak tradisional yang masih digunakan oleh banyak rumah tangga Aceh. Memasak dengan kuali tanah liat memberikan rasa makanan yang lebih alami dan khas. Produk ini tahan panas, ramah lingkungan, dan bebas bahan kimia. Cocok untuk memasak gulai, kuah, atau masakan tradisional Aceh lainnya.', 'tersedia', '082183422583');

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
(1, 'plnaceh', '$2a$12$WQURITETb3ksSwgi.55gBuurBIhguzj2bhsJ4lRELiJl7v56..jdG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
