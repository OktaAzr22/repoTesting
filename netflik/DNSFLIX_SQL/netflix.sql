-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 11:07 PM
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
-- Database: `netflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `kata_sandi`) VALUES
(10, '', 'budiman@gmail.com', 'budi123');

-- --------------------------------------------------------

--
-- Table structure for table `cartoons`
--

CREATE TABLE `cartoons` (
  `id_cartoons` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `sutradara` varchar(30) DEFAULT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartoons`
--

INSERT INTO `cartoons` (`id_cartoons`, `judul`, `durasi`, `sutradara`, `tahun_rilis`, `rating`, `deskripsi`, `foto`, `url_video`) VALUES
(7, 'Robots', '01:31:00', 'Chris Wedge', 2005, 8, 'Rodney, si penemu jenius, bercita-cita membuat dunia menjadi tempat yang lebih baik dan ingin bertemu Bigweld, penemu idolanya. Tapi sebelum itu, ia harus berhadapan dengan sebuah robot eksentrik.', 'uploads/a2.jpg', 'https://youtu.be/zyLI71Z0RF4?si=a8UyDnu4ka1TBp6t'),
(9, 'Luca', '01:35:00', 'Enrico Casarosa', 2021, 9, ' Sehari-hari, Luca bertugas menggembala ikan-ikan ternak milik keluarganya. Suatu hari, Luca menemukan barang-barang manusia yang jatuh dari kapal. Meski demikian, monster laut tidak boleh terkena cipratan air.', 'uploads/a1.jpg', 'https://youtu.be/mYfJxlgR2jw?si=e5MQhOQ-JDygG4LP'),
(10, 'Frozen', '01:42:00', 'Jennifer Lee', 2013, 9, 'Demi mencari kakaknya, Elsa, Princess Anna bersama Kristoff dan Olaf si manusia salju, memulai perjalanan berbahaya menembus badai salju ganas - agar kerajaannya terhindar dari musim dingin abadi.', 'uploads/a8.jpg', 'https://youtu.be/TbQm5doF_Uc?si=pu9rMij67UdylEek'),
(11, 'Elemental', '01:49:00', 'Peter Sohn', 2023, 8, 'Dua karakter berbeda, Ember (Leah Lewis) elemen api dan Wade (Mamoudou Athie) elemen air. Layaknya api, Ember memiliki sifat membara, sedangkan Wade memiliki sifat tenang layaknya air. Walaupun berbeda, keduanya saling jatuh cinta dan berusaha mencari kesamaan satu sama lainnya.', 'uploads/a6.jpg', 'https://youtu.be/hXzcyx9V0xw?si=6kPiuVDjnLPKWD3d'),
(12, 'The Litle Mermaid', '01:18:00', 'Monty Tiwa', 2020, 8, 'Ariel, putri Raja Triton yang bungsu sekaligus yang paling membangkang, mendambakan untuk kenal lebih jauh kehidupan di atas laut, dan ketika sedang berkunjung ke daratan, ia jatuh cinta pada Pangeran Eric yang menawan. Kaum putri duyung dilarang bergaul dengan manusia, namun Ariel merasa harus mengikuti kata hatinya. Lalu ia membuat kesepakatan dengan penyihir jahat, Ursula, yang menjanjikannya pengalaman hidup di daratan, tetapi kesepakatan itu ternyata menaruh nyawanya—serta tahta ayahnya—dalam bahaya.', 'uploads/a10.jpg', 'https://youtu.be/kpGo2_d3oYE?si=G8bXt0Aqd3gbzEmj'),
(13, 'Mario Bross', '01:32:00', 'Aaron Horvath', 2023, 8, 'Kisah Mario (Chris Pratt) si tukang ledeng yang melakukan perjalanan heroik untuk menyelamatkan saudaranya, Luigi (Charlie Day). Di perjalanan, Mario tidak sendiri, ia dibantu oleh Putri Peach (Anya Taylor-Joy) dan prajurit kerajaan jamur.', 'uploads/m3.jpg', 'https://youtu.be/KydqdKKyGEk?si=TmxGutCkpdYIWaOd'),
(14, 'Encanto', '01:49:00', 'Byron Howard', 2021, 9, 'Encanto menceritakan kisah keluarga Madrigals yang luar biasa, yang hidup tersembunyi di pegunungan Kolombia, di tempat yang menakjubkan dan mempesona yang disebut Encanto.', 'uploads/m1.jpg', 'https://youtu.be/CaimKeDcudo?si=o9smlZwM4cpRsfsn'),
(15, 'Kubo', '01:42:00', 'Travis Knight', 2016, 8, 'Seorang anak laki-laki bernama Kubo harus menemukan baju besi pelindung yang dikenakan oleh almarhum ayahnya untuk mengalahkan roh jahat dari masa lalu.', 'uploads/a3.jpg', 'https://youtu.be/qZefKaANfe0?si=ZocgvibhplBn6iaP');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `sutradara` varchar(30) DEFAULT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `url_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `durasi`, `sutradara`, `tahun_rilis`, `rating`, `deskripsi`, `foto`, `url_video`) VALUES
(8, 'The Call', '01:52:01', 'Lee Chung-hyun', 2020, 9, 'The Call menceritakan Seo-yeon (Park Shin-hye) seorang wanita yang hidup pada masa sekarang dan tanpa sengaja menemukan sebuah telepon tua di rumah masa kecilnya. Saat itu, ia kerap mendapatkan panggilan telepon misterius dari seseorang yang mencari temannya. Seo-yeon kemudian mengetahui orang yang selama ini menghubunginya ialah Young-sook (Jeon Jong-soe) seorang wanita yang hidup pada masa lalu. Mulai dari satu kali hingga akhirnya ia rutin menerima panggilan tersebut. Meski terpisah 20 tahun, keduanya segera menjadi teman baik. Banyak hal yang mereka bagikan lewat panggilan telepon tersebut. Sayangnya, pertemanan tersebut berubah menjadi kacau balau ketika masa depan terungkap dan masa lalu berhasil diubah. Hal itu terjadi ketika Young-sook mengatakan bakal menyelamatkan ayah Seo-yeon saat 1999. Tapi sebagai imbalan, Yeong-seok meminta Seo-yeon untuk mencari tahu keberadaan dirinya pada 2019. Sayangnya, Yeong-sook jadi mengetahui kondisi tak baik pada masa depannya. Hal itu membuatnya ingin balas dendam dan berencana mengubah masa lalu. Panggilan telepon yang sempat mendekatkan mereka kini berubah menjadi ancaman. Panggilan telepon Young-sook kini dianggap sebagai gangguan bagi Seo-yeon. Ia pun harus berpikir cepat cara menyelamatkan dirinya dan keluarganya.', 'uploads/call.jpg', 'https://youtu.be/KT-hTJIKsDE?si=Xqxs86K2jl6PbFdF'),
(9, 'Bloodshot', '01:49:01', 'david sf wilson', 2020, 8, 'Berdasarkan buku komik terlaris, dibintangi Vin Diesel sebagai Ray Garrison, seorang prajurit yang terbunuh dalam tugasnya dan dihidupkan kembali sebagai pahlawan super oleh perusahaan RST. Dengan sepasukan nanoteknologi di nadinya, kekuatan yang lebih kuat dari sebelumnya dan mampu menyembuhkan luka dengan sangat cepat.', 'uploads/bst.jpg', 'https://youtu.be/vOUVVDWdXbo?si=d1oNapi2Nb7WKAfU'),
(10, 'Hunter Killer', '02:02:02', 'Donovan Marsh', 2018, 8, 'Hunter Killer akan berkisah tentang misi tim kapal selam Amerika Serikat untuk menyelamatkan presiden Rusia yang di kudeta oleh kelompok militan di negaranya.', 'uploads/hk.jpg', 'https://youtu.be/7PGdkzfbylI?si=W7LnBOZzTrMn7ku0'),
(11, 'Captain Marvel', '02:05:02', 'Anna Boden, Ryan Fleck', 2019, 9, 'Captain Marvel adalah superhero wanita dari Marvel yang mempunyai banyak kekuatan setara seperti Superman. Superhero yang bernama Carol Danvers ini awalnya merupakan seorang pilot luar angkasa, konon ia mendapatakan kekuatan supernya dari bangsa alien.', 'uploads/captain-marvel.png', 'https://youtu.be/4Rh_SvN_7pw?si=TogbwcoAIsv7GlJp'),
(12, 'Resident Evil', '01:02:01', 'Paul W. S. Anderson', 2002, 8, 'Alice dan Rain, dua anggota tim komando elit, harus bertarung melawan para gerombolan zombie pemakan manusia yang dikendalikan oleh superkomputer jahat di dalam sebuah fasilitas penelitian genetika.', 'uploads/resident-evil.jpg', 'https://youtu.be/79Sd4GtOXuI?si=IZmXycYYjiEDJCmV'),
(13, 'Transformers: The Last Knight', '02:34:02', 'Michael Bay', 2017, 9, 'Setelah meninggalkan Bumi, Optimus Prime menemukan planet rumahnya yang telah mati, Cybertron, dan menemukan bahwa dia sebenarnya bertanggung jawab atas kehancurannya. Optimus mengetahui bahwa dia dapat menghidupkan kembali Cybertron, tetapi untuk melakukannya, dia memerlukan artefak yang tersembunyi di Bumi.', 'uploads/transformer.jpg', 'https://youtu.be/6Vtf0MszgP8?si=OcAzs2LVCVEyqA6p'),
(14, 'Theatre of the dead', '03:00:01', 'Patrick J. Gallagher', 2013, 7, 'Terkunci di teater mereka, para pemain dan kru \"Angels In Hell\" menghabiskan waktu berjam-jam untuk latihan, tidak menyadari perubahan cepat dan mengejutkan yang terjadi di dunia luar. Kini, karena terjebak di dalam teater oleh segerombolan mayat hidup, dengan sumber daya yang terbatas, mereka harus memutuskan antara tetap bertahan dan berharap untuk diselamatkan, atau mengambil tindakan sendiri dan mengambil keputusan yang sangat berisiko. Ketika perdebatan mengenai tindakan yang diambil memecah kelompok tersebut, dan penyebaran virus zombi mulai mengurangi jumlah mereka, mereka tidak menyadari bahwa bahaya terbesar bagi hidup mereka ada di dalam barisan mereka.', 'uploads/totd.jpg', 'https://youtu.be/l7rUbFnEwd8?si=SM1g4gJAL77OhuzV');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Animation'),
(4, 'Anime'),
(5, 'Comedy'),
(6, 'Drama'),
(7, 'Drama China'),
(8, 'Drama Korea'),
(9, 'Drama thai'),
(10, 'Drama Jepang'),
(11, 'Family'),
(12, 'Fantasy'),
(13, 'Histori'),
(14, 'Horor'),
(15, 'Kids'),
(16, 'Music'),
(17, 'Misteri'),
(18, 'Politics'),
(19, 'Reality'),
(20, 'Romance'),
(21, 'Science Fiction'),
(22, 'Sport'),
(23, 'Thiller'),
(24, 'TV Movie');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `sutradara` varchar(30) DEFAULT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `judul`, `durasi`, `sutradara`, `tahun_rilis`, `rating`, `deskripsi`, `url_video`, `foto`) VALUES
(3, 'Wish', '01:35:00', 'Fawn Veerasunthorn', 2023, 10, 'Wish bercerita tentang wilayah Kerajaan Rosas buatan Raja Magnifico dan istrinya Ratu Amaya. Raja mampu mengabulkan permintaan rakyatnya. ', 'https://youtu.be/oyRxxpD3yNw?si=S0EWs3DCe6rMgQCX', 'uploads/m2.jpg'),
(5, 'Keluarga Cemara', '01:50:00', 'Yandy Laurens', 2018, 8, 'ABAH (Ringgo Agus Rahman), sangat ingin bertahan setelah rumah dan pasca hartanya disita oleh debt collector untuk membayar hutang perusahaan yang disebabkan oleh kakak iparnya, dengan cara pindah sementara ke rumah di desa terpencil di Jawa Barat. Rumah itu merupakan rumah masa kecilnya, sebuah warisan dari ayahnya. Namun dia menghadapi kesulitan karena kasusnya kalah di pengadilan dan keluarganya terancam selamanya hidup dalam kemiskinan di desa itu.', 'https://youtu.be/sGaeDzD_3o0?si=x1VetuC8qmAHzxHv', 'uploads/m4.jpg'),
(8, 'Waktu Maghrib', '01:45:00', 'Sidharta Tata', 2023, 6, 'Adi dan Saman sering dihukum oleh Bu Woro, guru mereka yang disiplin dan galak. Suatu hari, kekesalan Adi dan Saman terhadap Bu Woro memuncak. Mereka menyumpahi guru itu bersamaan dengan kumandang adzan Maghrib.', 'https://youtu.be/k9nDMiZpF-4?si=AKP5MfyZw0DvTtyS', 'uploads/m7.jpg'),
(9, 'Kang Mak From Pee Mak', '02:03:00', 'Herwin Novianto', 2024, 10, 'menceritakan tentang Makmur (Vino G. Bastian), seorang tentara RI yang harus pergi berperang demi membela keutuhan NKRI. Ia terpaksa meninggalkan istrinya, Sari (Marsha Timothy), yang kala itu sedang hamil tua.', 'https://youtu.be/T8m-IZhCi7M?si=R29oU7egwo3HXeXr', 'uploads/m8.jpg'),
(10, 'Cek Toko Sebelah', '01:38:00', 'Ernest Prakasa', 2016, 7, 'Setelah Erwin menerima tawaran kerja di Singapura, ayahnya sakit dan butuh dirinya untuk meneruskan usaha toko. Sementara Yohan, kakaknya yang kurang bertanggung jawab, merasa ayahnya pilih kasih.', 'https://youtu.be/r9NJveLN3zI?si=e8jyK-L3bWbvSD59', 'uploads/m9.jpg'),
(13, 'The Mansion', '01:30:00', 'Tony T.Datis', 2017, 8, ' Dalam drama tersebut, Im Ji Yeon akan berperan sebagai Ji Na, seorang karyawan hotel yang melacak keberadaam kakak perempuannya yang hilang.', 'https://youtu.be/AjLKTz81bj8?si=p21-JEC9cvpPLDHU', 'uploads/t2.jpg'),
(16, 'Kuasa Gelap', '01:36:00', 'Bobby Prasetyo', 2024, 10, 'Romo Thomas harus kehilangan ibu dan adiknya yang tewas bersamaan dalam sebuah kecelakaan tragis. Akibat dari peristiwa itu, Romo Thomas ragu akan keimanannya kepada Tuhan dan mempertanyakan perannya dalam pelayanan.', 'https://youtu.be/sMkUS1wqr8Q?si=zorf3xhQtz-Ig4zj', 'uploads/t5.jpg'),
(17, 'Jailangkung', '01:26:00', 'Jose Poernomo', 2017, 7, 'Entitas gelap meneror sebuah desa. Anak menghilang saat matahari terbenam.', 'https://youtu.be/LdLSid_nOh0?si=n8Jjae2v99smScN6', 'uploads/t6.jpg'),
(19, 'Pamali', '01:40:00', 'Bobby Prasetyo', 2022, 8, 'Jaka Sunarya yang baru saja kehilangan pekerjaan, bersama dengan sang istri, Rika ingin menjual rumah peninggalan orang tuanya untuk memulai hidup baru. Di desa tersebut, mereka tanpa sengaja melanggar adat yang telah menjadi tradisi, sehingga menghadapi keberadaan makhluk halus yang mengancam nyawa mereka.', 'https://youtu.be/qCjWY46TLm0?si=U-efkVvdk04VddUA', 'uploads/t8.jpg'),
(20, 'Sumala', '01:53:00', 'Rizal Mantovani', 2024, 9, 'Sumala\" adalah nama yang dikenal dengan kengerian di sebuah desa terpencil di Kabupaten Semarang. Kisah kelam ini bermula, ketika Sulastri (Luna Maya), seorang istri kaya yang tidak kunjung mendapatkan keturunan, memutuskan untuk membuat perjanjian gelap dengan iblis demi mendapatkan seorang anak.', 'https://youtu.be/aMaMeKHH6iM?si=MxkDntl37YZl_Eq2', 'uploads/t9.jpg'),
(22, 'Mariposa', '01:58:00', 'Fajar Bustomi', 2020, 9, 'Mariposa (Kupu-kupu) seperti kamu, aku mengejar tapi kamu menghindar. Begitulah gambaran sosok IQBAL GUANNA bagi NATASHA KAY LOOVY atau ACHA. Acha bertekad ingin mendapatkan hati Iqbal, seorang cowok cakep, pintar dan dikenal berhati dingin. Sahabat Acha, AMANDA, berusaha mencegah niat Acha untuk mendekati Iqbal. Amanda takut Acha akan terluka dan sakit hati.', 'https://youtu.be/N9PUbRIKYOA?si=a7hrGB7vwTP6BKKr', 'uploads/r2.jpg'),
(24, 'Gita Cinta dari SMA', '01:43:00', 'Monty Tiwa', 2023, 8, 'RATNA SUMINAR (Prilly Latuconsina), sang siswi baru bertemu dengan GALIH RAKASIWI (Yesaya Abraham) sebagai sosok yang dingin dan cuek. Hingga kemudian keduanya saling terpikat. Namun, hubungan mereka ditentang oleh Ayah Ratna (Dwi Sasono). Berbagai cara digunakan untuk memisahkan mereka. Akankah Galih dan Ratna menerima kenyataan jika kisah kasih mereka, memang tak kan pernah sampai?', 'https://youtu.be/j92YfcwLacM?si=1N__gu-sZHw3I9wH', 'uploads/r4.jpg'),
(27, '172 Days', '02:43:00', 'Hadrah Daeng Ratu', 2024, 10, 'Akibat suatu kejadian di sekolah, Zira mulai mengikuti pergaulan yang salah dan buruk dalam pandangan agama. Keputusan Zira untuk hijrah akhirnya datang setelah ada masalah di lingkup keluarganya. Zira mulai mengikuti kegiatan religi sebagai bagian dari proses hijrah, seperti pengajian.', 'https://youtu.be/IPRBKGxCCZQ?si=_7nHtyTzCQoJ5hBw', 'uploads/r7.jpg'),
(28, 'Terlalu Tampan', '01:46:00', 'Sabrina Rochelle Kalangie', 2019, 9, 'Witing Tresno Jalaran Soko Kulino alias KULIN (Ari Irham). Selama belasan tahun, Kulin yang terlahir terlalu tampan menghindari masuk ke sekolah reguler', 'https://youtu.be/gyibcholOzg?si=xb-RREH9zGblz1cV', 'uploads/r8.jpg'),
(29, 'Bila Esok Ibu Tiada', '01:50:00', 'Rudy Soedjarwo', 2024, 10, 'hubungan seorang ibu dengan empat anaknya dalam sebuah keluarga yang sederhana. Alur dalam film ini menyajikan tema-tema yang dekat dengan kehidupan sehari-hari, menghadirkan konflik dan kisah yang menguras air mata.', 'https://youtu.be/UQURtWvSt9o?si=qe-4DCpGKQX8Yu-n', 'uploads/re1.jpg'),
(33, 'Home Sweet Loan', '01:52:00', 'Sabrina Rochelle Kalangie', 2024, 10, 'rutinitas para pengungsi bencana gempa dan tsunami di Palu. Mereka mengantri air dan terpaksa tinggal di hunian sementara. Adalah Tauhid (Hamlan), seorang kepala keluarga yang kehilangan istrinya. Ia kini tinggal hanya bersama putrinya, Farah, yang baru berusia tujuh tahun.', 'https://youtu.be/rWsnLS0Q7G0?si=GGoG3U5xzcmwsRmD', 'uploads/re5.jpg'),
(35, 'Bolehkah Sekali Saja Kumenangis', '01:41:00', 'Reka Wijaya Kusuma', 2024, 9, 'Trauma yang dialami Tari sejak kecil meninggalkan luka mendalam dalam dirinya. Setiap hari, dia harus menyaksikan pertengkaran orang tuanya', 'https://youtu.be/j-UOIJezxXo?si=7iDhLxciOxzLMVbQ', 'uploads/re7.jpg'),
(38, 'Kaka Boss', '01:20:00', 'Arie Keriting', 2024, 9, ' Setelah lama berkecimpung dalam bisnis penagihan utang, Kaka Boss memutuskan untuk mengejar mimpinya menjadi penyanyi.', 'https://youtu.be/LXRnwwpXz6s?si=8ThFHn7TCgvUay74', 'uploads/p3.jpg'),
(39, 'Miracle In Cell No.7', '02:25:00', 'Hanung Bramantyo', 2022, 10, 'Kisah kehidupan seorang ayah cacat mental yang memiliki seorang putri cerdas. Mereka berdua dipisahkan akibat tuduhan pembunuhan, yang berakhir dengan hukuman mati terhadap sang ayah.', 'https://youtu.be/0uf6QUacVgs?si=Sgmxra5MngsJG7z3', 'uploads/p4.jpg'),
(42, 'Moana', '01:47:00', 'John Musker', 2016, 9, 'Moana memulai petualangan berlayar dengan perahu untuk meyakinkan Maui, si sosok setengah-dewa, agar mengembalikan hati sang dewi, Te Fitti, setelah panen gagal dan ikan-ikan di pulaunya mulai mati.', 'https://youtu.be/LKFuXETZUsI?si=4fnATnkDMRGAKHox', 'uploads/mu3.jpg'),
(44, 'Just Mom', '01:28:00', 'Jeihan Angga', 2021, 10, 'Tak ada kerinduan yang lebih dalam, dari rindunya seorang ibu kepada anaknya.', 'https://youtu.be/XRr6HkYOdaY?si=61shzR8s1tkAI9E6', 'uploads/f1.jpg'),
(47, 'Mudik', '01:33:00', 'Adriyanto Dewo', 2019, 8, ' kisah Aida (Asmara Abigail) yang mudik bersama suaminya, Firman (Ibnu Jamil), untuk menyelesaikan masalah rumah tangga mereka. Di tengah perjalanan, mereka mengalami kecelakaan yang merenggut nyawa orang lain', 'https://youtu.be/M6SscWtGNCQ?si=h5BnTRpOjmE2kf4o', 'uploads/f6.jpg'),
(48, 'Pulang', '01:24:00', 'Azhar Kinoi Lubis', 2022, 10, 'Pras dan putrinya yang bernama Rindu melakukan perjalanan ke rumah Eyang, untuk menyusul istrinya, yakni Santi dan putra bungsunya, yaitu Biru.', 'https://youtu.be/HtnOelGC91w?si=AT2F9fFp8WX2Nh2o', 'uploads/f7.jpg'),
(51, 'Yowis Ben', '01:39:00', 'Bayu Skak', 2018, 8, 'Bayu menyukai Susan sejak lama, namun merasa minder dengan keadaan dirinya yang pas-pasan. Bayu bertekad mengubah dirinya menjadi lebih populer dari Roy, pacar Susan yang gitaris band. Ia membentuk band bersama teman-temannya, yang dinamai Yowis Ben. Langkah Bayu dan teman-temannya tidak mudah. Terjadi perpecahan antar personil band. Berhasilkah Bayu mempertahankan band-nya dan mendapatkan Susan?', 'https://youtu.be/mkHCkYvgRVo?si=Mp4FCj1GqiiAy2NG', 'uploads/co5.jpg'),
(52, 'Orang Kaya Baru', '01:36:00', 'Ody Harahap', 2019, 9, 'Apa jadinya bila sebuah keluarga yang selama ini hidup pas-pasan, tiba-tiba mendapat harta berlimpah? Pastinya mereka kaget, bingung, senang dan mulai membeli barang-barang yang sebelumnya mungkin hanya ada di mimpi mereka.', 'https://youtu.be/ZY4clGa250c?si=9d9bPi9aXSpx5NN6', 'uploads/co10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `tipe_akun` enum('Basic','Premium','VIP') NOT NULL,
  `tanggal_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `kata_sandi`, `tipe_akun`, `tanggal_bergabung`) VALUES
(1, 'Abi Mayu Fikri', 'mayuabi672@gmail.com', 'abi123', 'Basic', '2017-01-01'),
(2, 'Nyimas Zaidah Rizkilah', 'nyimaszaidahrizkilah@gmail.com', 'nyimas123', 'Premium', '2017-02-02'),
(3, 'Utari', 'utari123', 'utaritary19@gmail.com', 'VIP', '2017-03-03'),
(4, 'Donaldson Alexander Sitorus', 'donalsitorus720@gmail.com', 'donal123', 'Basic', '2018-10-06'),
(5, 'Moh Tio Falendra', 'tiofalendra123@gmail.com', 'tio123', 'Premium', '2018-11-11'),
(6, 'Aprendi Saputra', 'aprendisaputra511@gmail.com', 'aprendi123', 'VIP', '2018-12-25'),
(7, 'Wandra Anugrah Pertama', 'wandraanugrah11@gmail.com', 'wandra123', 'Basic', '2020-05-08'),
(8, 'Sagita Uthami Putri', 'sagitauthmiip@gmail.com', 'sagita123', 'Premium', '2020-06-20'),
(9, 'Namirah Alya Putri Malihah', 'namirahalyaputrim@gmail.com', 'namirah123', 'VIP', '2020-08-17'),
(10, 'Okta Azhar Ramayansa', 'oktaazhar3@gmail.com', 'okta123', 'Basic', '2021-06-01'),
(11, 'Septya Rahmadani Humaira', 'septias820@gmailcom', 'septya123', 'Premium', '2021-05-12'),
(12, 'Anjli Pramudita', 'anjelpramudita2006@gmail.com', 'anjli123', 'VIP', '2021-01-29'),
(13, 'Annisa tulfadillah', 'dillahastrid@gmailcom', 'annisa123', 'Basic', '2021-04-10'),
(14, 'Arya Rizky Ramadhan', 'aryarzkyrmdhnn@gmail.com', 'arya123', 'Premium', '2022-10-20'),
(15, 'Muttia Rahma Agustin', 'muttiarahmaagustin@gmail.com', 'muttia123', 'VIP', '2022-10-03'),
(16, 'Della Ussy', 'deluscantik1610@gmail.com', 'della123', 'Basic', '2024-09-12'),
(17, 'Berlian Wanna', 'berlian.wanna@gmail.com', 'berlian123', 'Premium', '2023-03-25'),
(18, 'Putri Aulia', 'auliapuput456@gmail.com', 'puput123', 'VIP', '2023-08-12'),
(19, 'Nyayu Miftahul Jannah', 'nyayumiftahuljannah@gmail.com', 'anna123', 'Basic', '2024-08-15'),
(20, 'Imelda Rahmadani', 'imeldarahmadani9a@gmail.com', 'imel123', 'Premium', '2024-10-13'),
(32, 'bb', 'bb@gmail.com', '$2y$10$xwhmBtjyqDS.8XNaolO57OIPK94CkdIRt9dwvUQLz7e', 'Basic', '2022-03-12'),
(33, 'Nadya', 'nad123@gmail.com', 'nadya234', 'VIP', '2024-10-20'),
(34, '', 'utari@gmail.com', 'tari123', 'Premium', '0000-00-00'),
(35, '', 'budiman@gmail.com', 'budi123', 'Basic', '0000-00-00'),
(36, '', 'kev265@gmail.com', 'kevin123', 'Premium', '0000-00-00'),
(37, '', 'melisaA23@gmail.com', 'mel123', 'Premium', '0000-00-00'),
(38, '', 'melisa23@gmail.com', 'mel123', 'VIP', '0000-00-00'),
(39, '', 'Daffa23@gmail.com', 'daf123', 'VIP', '0000-00-00'),
(40, '', 'amira256@gmail.com', 'amira123', 'Premium', '0000-00-00'),
(42, '', '', '$2y$10$SlghInMJNADCsTqKK4KrcO.dtwb5B8F6RWreiYk7Y4t', '', '0000-00-00'),
(43, '', 'rani123@gmail.com', 'rani123', 'Basic', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_review`, `username`, `date`, `comment`) VALUES
(1, 'Septi Wulandari', '2024-11-21', 'Filmnya bagus sekali, saya suka'),
(2, 'Nadya Rahma Ayu', '2024-11-21', 'wah bagus sekali'),
(3, 'dafa', '2024-11-28', 'kerennn'),
(4, 'nadin', '2024-11-28', 'wawww');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_tonton`
--

CREATE TABLE `riwayat_tonton` (
  `id_riwayat` int(11) NOT NULL,
  `Nama_pengguna` varchar(255) DEFAULT NULL,
  `film` int(11) DEFAULT NULL,
  `tanggal_tonton` date DEFAULT NULL,
  `durasi_tonton` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id_series` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `sutradara` varchar(30) DEFAULT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id_series`, `judul`, `durasi`, `sutradara`, `tahun_rilis`, `rating`, `deskripsi`, `foto`, `url_video`) VALUES
(1, 'Supergirl', '00:45:00', 'Craig Gillespie', 2015, 8, 'Remaja Kara Zor-el dilempar ke Bumi dari planet Krypton yang sekarat. Dihadapkan dengan seluruh dunia yang sama sekali berbeda dari dunia tempat ia dibesarkan, ia adalah gadis baru terbaik di sekolah—dengan pukulan kanan yang membelah planet.', 'uploads/supergirl.jpg', 'https://youtu.be/49RZx5tUKM4?si=EL9iZjOTDEp-6vOv'),
(2, 'The Falcon And The Winter Soldier', '00:50:00', 'Kari Skogland', 2021, 9, 'Enam bulan setelah dihidupkan kembali di Blip dan diberi perisai Captain America oleh Steve Rogers, Sam Wilson bekerja sama dengan Angkatan Udara AS di luar negeri untuk menyelamatkan sandera dari LAF, kelompok teroris yang dipimpin oleh Georges Batroc .', 'uploads/tfat.jpg', 'https://youtu.be/IWBsDaFWyTE?si=8p9NbXZPDnt7QhoD'),
(3, 'Mandalorian', '00:42:00', 'Jon Favreau', 2019, 9, 'Dimulai lima tahun setelah peristiwa film Return of the Jedi (1983) dan jatuhnya Kekaisaran Galaksi, The Mandalorian mengikuti Din Djarin, seorang pemburu bayaran Mandalorian yang bekerja di wilayah terluar galaksi .', 'uploads/ml.jpg', 'https://youtu.be/aOC8E8z_ifw?si=OpNlxQrJarxMMPge'),
(4, 'Penthouse', '01:20:00', 'Joo Dong-min ', 2020, 10, 'Suatu hari, keluarga di Hera Palace terlibat kasus kematian seorang anak perempuan bernama Min Seol A yang ternyata salah satu putri dari penghuni Hera Palace yang telah lama menghilang.', 'uploads/ph.jpg', 'https://youtu.be/NgD7nVVHAaQ?si=0AfVZCyuQgs4Dop_'),
(5, 'Star Trek', '00:42:00', 'J.J. Abrams', 2009, 8, 'Nero, bangsa Romulan, mencoba menghancurkan semua planet di galaxi satu demi satu. Kini, James Kirk bersama dengan Spock dan anggota tim lainnya harus berjuang untuk menghentikannya sebelum terlambat.', 'uploads/strek.jpg', 'https://youtu.be/iGAHnZ555nI?si=75znuvEEBg9mO4dg'),
(6, 'Stranger Things', '00:42:00', 'Shawn Levy', 2016, 9, 'Hilangnya bocah laki-laki di sebuah kota kecil menyingkap misteri yang melibatkan eksperimen rahasia, kekuatan supernatural menakutkan, dan gadis kecil yang aneh . ', 'uploads/st.jpg', 'https://youtu.be/b9EkMc79ZSU?si=wsz9JNVtlzPNaxd9'),
(7, 'Wanda Vision', '01:21:00', 'Matt Shakman', 2021, 10, 'Pasangan pengantin baru Wanda Maximoff dan Vision pindah ke kota Westview dalam suasana hitam-putih . Mereka berusaha untuk berbaur meskipun Vision adalah android dan Wanda memiliki kemampuan telekinesis dan mengubah realitas. Suatu hari mereka melihat gambar hati di kalender mereka, tetapi tidak dapat mengingat hari apa.', 'uploads/wanda.png', 'https://youtu.be/sj9J2ecsSpo?si=ILjJOgMs8dJyc_sn');

-- --------------------------------------------------------

--
-- Table structure for table `seriess`
--

CREATE TABLE `seriess` (
  `id_seriess` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `sutradara` varchar(30) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `url_video` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tahun_rilis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seriess`
--

INSERT INTO `seriess` (`id_seriess`, `judul`, `durasi`, `sutradara`, `rating`, `deskripsi`, `url_video`, `foto`, `tahun_rilis`) VALUES
(1, 'A +', '00:40:00', 'Fajar Bustomi', 8, 'petualangan lima siswa pintar di sebuah sekolah yang berusaha melawan sistem pendidikan di sekolah tersebut yang rusak dan manipulatif.', 'https://youtu.be/h0gkrFZthqI?si=pmfmV-ztWo90oYR9', 'uploads/se1.jpg', 2023),
(2, 'Mozachiko', '00:30:00', 'anto agam', 8, 'Chiko Gadangga, anak lelaki paling keras kepala dan memiliki banyak masalah di sekolahnya, SMA Rajawali. SMA Rajawali menjadi tempat yang mempertemukan Chiko dengan Moza Adisti, siswi yang culun, paling hiperaktif, dan sangat ceria', 'https://youtu.be/6bac6jOYFpo?si=sHpM1I-gxE0LGfON', 'uploads/se2.jpg', 2023),
(3, 'layangan putus', '00:42:00', 'benni setiawan', 9, 'Setelah bercerai dari Aris gara-gara orang ketiga, Kinan memulai babak hidup baru sebagai ibu tunggal dan aktif lagi sebagai dokter, sambil merawat Raya, putrinya. Namun ia kembali terjebak dalam konflik rumit ketika Aris kembali hadir bersama Lidya.', 'https://youtu.be/2z2tNXkcioo?si=w0VSCm1eScENfXvO', 'uploads/se3.jpg', 2022),
(4, 'Rumah dinas bapak', '00:59:00', 'Bobby Prasetyo', 9, ' keluarga yang jadi korban teror mistis ketika mengikuti ayah mereka pindah tempat dinas.', 'https://youtu.be/4q0XUN7g0WE?si=vgEEyndI9Yy8aGYA', 'uploads/se4.jpg', 2024),
(5, 'Dear jo', '00:30:00', 'Monty Tiwa', 7, 'Joshua (Jourdy Pranata) dan Maura (Shalsabilla Andriani) pasangan suami istri muda, menikah dan bekerja di Baku, Azerbaijan. Meskipun sukses secara finansial, mereka merasa hampa karena Maura tidak bisa hamil. Maura memiliki sahabat bernama Ella (Anggika Bolsterli), seorang single parent dari Indonesia yang juga tinggal di Baku. Ella tahu keinginan Maura memiliki anak, dan mereka sepakat Ella akan menjadi surrogate mother. Namun, saat Ella tengah hamil, Maura meninggal dalam kecelakaan tragis yang membuat Ella dan Joshua sangat terpukul dan kehidupan mereka jadi berantakan.', 'https://youtu.be/4hQu4S6yau8?si=qSOUIOedEw7-9-jr', 'uploads/se5.jpg', 2024),
(6, 'Gadis kretek', '00:59:00', 'kamila andini', 10, ' Soeraja merupakan pemilik pabrik kretek Djagad Raya yang sedang sekarat. Namun, ia justru ingin bertemu perempuan yang bukan istrinya.', 'https://youtu.be/PJybk11EIm8?si=Fcghpw0YOKVbnSJV', 'uploads/se6.jpg', 2023),
(7, 'lovely runner', '01:40:00', 'daffa', 9, ' seorang perempuan bernama Im Sol (diperankan oleh Kim Hye Yoon) yang mengalami kecelakaan serius yang membuat ia tidak bisa berjalan, Dalam keputusasaannya, Im Sol memutuskan untuk mengakhiri hidupnya.', 'https://youtu.be/5kk0dYa8Ccc?si=mj8lwwBtWTIOh-2t', 'uploads/se7.jpg', 2024),
(8, 'Code helix', '00:44:00', 'verdi solaiman', 8, 'Code Helix mengisahkan tentang Rendra, anak SMA yang berbakat di bidang teknologi informasi. Suatu hari, sahabat masa kecil dari Rendra yang bernama Nanda mendapat masalah. Rendra pun memutuskan untuk menjadi peretas dengan kode nama Helix demi membantu Nanda.', 'https://youtu.be/2Ieta_pA9KM?si=x0nR3ok8fC_dm4Rl', 'uploads/se8.jpg', 2022),
(9, 'heart', '00:45:00', 'nadya', 7, 'Rachel, gadis berpenampilan tomboy, enerjik dan cuek, hidup bahagia di puncak pengunungan dan telah berteman dengan Farel sejak kecil. Tapi persahabatan mereka diuji saat Farel jatuh cinta pada Luna, gadis feminim - yang membuat Rachel cemburu.', 'https://youtu.be/72sJphTlG28?si=knAGlt_9kQOqpyI-', 'uploads/se9.jpg', 2021),
(10, 'Go ahead', '00:40:00', 'septi', 9, ' tiga anak muda yang berasal dari keluarga berbeda, namun tumbuh bersama sebagai saudara tanpa ikatan darah.', 'https://youtu.be/UHdijVtMz5I?si=VgtiAiRwTgjpFZdL', 'uploads/se10.jpg', 2020),
(11, 'the auditors', '00:59:00', ' kwon wong il', 10, 'seorang pemimpin dari tim audit yang memiliki bakat, yakni Shin Cha Il, dan bekerjasama dengan seorang karyawan baru, yakni Gu Han Soo, untuk mengungkapkan kasus korupsi di sebuah perusahaan, yaitu JU Construction.', 'https://youtu.be/UAiSM8mxe88?si=d4vHAZvSIKSoJtsQ', 'uploads/se11.jpg', 2024),
(12, 'connection', '00:45:00', 'mank donk sue', 9, 'menghadirkan kisah mendebarkan yang menggabungkan investigasi kejahatan dengan hubungan persahabatan yang rumit.', 'https://youtu.be/VPOLAfFC_jM?si=7is99Gg3T4NA-rxa', 'uploads/se12.jpg', 2024),
(13, 'True beauty', '01:30:00', 'kim sang hyeop', 9, 'Lim Joo Kyung, siswi yang tidak percaya diri dengan wajahnya saat berada di depan umum. Berkat bantuan video tutorial di internet, ia perlahan mulai belajar merias diri dengan makeup. Ia pun berubah menjadi wanita cantik di kelasnya', 'https://youtu.be/BhP1eYQ5Pxk?si=OiXU_To-Ta6pNa_n', 'uploads/se13.jpg', 2021),
(14, 'Mr queen', '01:45:00', 'yoon sung sik', 10, 'Mr. Queen merupakan drama yang mengisahkan tentang seorang koki bernama Jang Bong Hwan yang terperangkap ke tubuh Ratu Cheorin pada masa Dinasti Joseon. Awalnya, Bong Hwan tidak percaya dengan apa yang terjadi padanya dan ia mencoba melarikan diri dari istana.', 'https://youtu.be/H1vplUsGDoI?si=hJ9M1BdaK4OIY4v2', 'uploads/se14.jpg', 2021),
(15, 'cumi cell', '01:20:00', 'kim sang hyeop', 9, 'menceritakan tentang dan kerjasama sel-sel di otak seorang wanita yang baru saja patah hati. Kim Yu Mi (Kim Go Eun) adalah seorang wanita pekerja kantoran biasa yang terbiasa menjalani hari-hari sendiri. Ia bekerja sebagai akuntan di sebuah perusahaan mie.', 'https://youtu.be/y5mhNxn5Ls4?si=-K5Qv72tb5KzKf8B', 'uploads/se15.jpg', 2022),
(16, 'Radiant office', '01:00:00', 'jung ji in', 7, 'tentang Eun Ho Won (Go Ah Sung) adalah seorang pencari kerja yang berkali-kali gagal ketika melakukan wawancara.', 'https://youtu.be/kMl7P-7RwKA?si=NuU41ttexklQbTlN', 'uploads/se16.jpg', 2017),
(17, 'bubble gum', '01:00:00', 'kim byung soo', 9, 'kisah cinta antara Park Ri Hwan dan Kim Haeng Ah. Sosok Park Ri Hwan sendiri berasal dari keluarga kaya dan bekerja sebagai dokter medis oriental di kliniknya sendiri. Dan dirinya tumbuh bersama Kim Haeng Ah bersama, dan keduanya menjadi seorang sahabat sejak kecil.', 'https://youtu.be/xfRfBHNkzZ4?si=k-Jb-9IqLiXmKk8N', 'uploads/se17.jpg', 2015),
(19, 'Dear jo', '00:45:00', 'Monty Tiwa', 8, 'Joshua (Jourdy Pranata) dan Maura (Shalsabilla Andriani) pasangan suami istri muda, menikah dan bekerja di Baku, Azerbaijan. Meskipun sukses secara finansial, mereka merasa hampa karena Maura tidak bisa hamil. Maura memiliki sahabat bernama Ella (Anggika Bolsterli), seorang single parent dari Indonesia yang juga tinggal di Baku. Ella tahu keinginan Maura memiliki anak, dan mereka sepakat Ella akan menjadi surrogate mother. Namun, saat Ella tengah hamil, Maura meninggal dalam kecelakaan tragis yang membuat Ella dan Joshua sangat terpukul dan kehidupan mereka jadi berantakan.', 'https://youtu.be/4hQu4S6yau8?si=ZvAX2F0ROdqpPw-c', 'uploads/se5.jpg', 2023),
(20, 'Habibie & Ainun', '01:20:00', 'Faozan Rizal', 10, ' Kisah tentang cinta pertama dan cinta terakhir. Kisah tentang Presiden ketiga Indonesia dan ibu negara. Kisah tentang Habibie dan Ainun. Rudy Habibie seorang jenius ahli pesawat terbang yang punya mimpi besar: berbakti kepada bangsa Indonesia dengan membuat truk terbang untuk menyatukan Indonesia.', 'https://youtu.be/DlU_FyHXS7M?si=TB0iPXgockaburZ0', 'uploads/r3.jpg', 2012),
(22, 'Magic Hour', '00:50:00', 'Asep Kusdinar', 7, 'Raina berada dalam situasi sulit ketika ia jatuh cinta pada Dimas, dan teman masa kecilnya, Toby, juga menyatakan perasaan padanya. Tapi semuanya berubah tragis setelah ia mengalami kecelakaan fatal.', 'https://youtu.be/mb3PI7wdoUY?si=U9gUEqbm5GPJNlAf', 'uploads/se37.jpg', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `isi_ulasan` text NOT NULL,
  `tanggal_ulasan` date NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cartoons`
--
ALTER TABLE `cartoons`
  ADD PRIMARY KEY (`id_cartoons`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`) USING BTREE;

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `riwayat_tonton`
--
ALTER TABLE `riwayat_tonton`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`),
  ADD UNIQUE KEY `judul` (`judul`);

--
-- Indexes for table `seriess`
--
ALTER TABLE `seriess`
  ADD PRIMARY KEY (`id_seriess`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_film` (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cartoons`
--
ALTER TABLE `cartoons`
  MODIFY `id_cartoons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_tonton`
--
ALTER TABLE `riwayat_tonton`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id_series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seriess`
--
ALTER TABLE `seriess`
  MODIFY `id_seriess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
