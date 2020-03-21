/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : educms

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 21/03/2020 21:09:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for edu_album
-- ----------------------------
DROP TABLE IF EXISTS `edu_album`;
CREATE TABLE `edu_album`  (
  `album_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `album_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `album_cover` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `album_publish_date` date NULL DEFAULT NULL,
  `album_status` enum('Published','Depublished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Published',
  `album_photo` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`album_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_album
-- ----------------------------
INSERT INTO `edu_album` VALUES (13, 'Galeri Edu CMS Satu', 'galeri-edu-cms-satu', 'cover-album-1584793403.png', '2020-03-21', 'Published', ',photo-album-15847950390.png,photo-album-15847950391.png,photo-album-15847950392.png');
INSERT INTO `edu_album` VALUES (14, 'Galeri Edu CMS Dua', 'galeri-edu-cms-dua', 'cover-album-1584795060.png', '2020-03-21', 'Published', ',photo-album-15847950520.png,photo-album-15847950521.png,photo-album-15847950522.png');
INSERT INTO `edu_album` VALUES (15, 'Galeri Edu CMS Tiga', 'galeri-edu-cms-tiga', 'cover-album-1584795072.png', '2020-03-21', 'Published', '');

-- ----------------------------
-- Table structure for edu_alumni
-- ----------------------------
DROP TABLE IF EXISTS `edu_alumni`;
CREATE TABLE `edu_alumni`  (
  `alumni_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alumni_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alumni_nis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alumni_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alumni_tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alumni_tgl_lahir` date NULL DEFAULT NULL,
  `alumni_jk` enum('Laki-Laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alumni_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alumni_masuk` bigint(20) NULL DEFAULT NULL,
  `alumni_keluar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alumni_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`alumni_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_alumni
-- ----------------------------
INSERT INTO `edu_alumni` VALUES ('alumni5e75ff1c04bd6', 'alumni-satu', '098', 'Alumni Satu', 'Tuban', '2020-03-21', 'Laki-Laki', 'Tuban', 2019, '2020', 'pesertadidik-1584795751.png');
INSERT INTO `edu_alumni` VALUES ('alumni5e75ff37e499d', 'alumni-dua', '099', 'Alumni Dua', 'Tuban', '2020-03-21', 'Perempuan', 'Tuban', 2018, '2019', 'pesertadidik-1584795757.png');

-- ----------------------------
-- Table structure for edu_categories
-- ----------------------------
DROP TABLE IF EXISTS `edu_categories`;
CREATE TABLE `edu_categories`  (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `categories_slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`categories_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_categories
-- ----------------------------
INSERT INTO `edu_categories` VALUES (1, 'Berita Sekolah', 'berita-sekolah');
INSERT INTO `edu_categories` VALUES (2, 'Berita Lain', 'berita-lain');
INSERT INTO `edu_categories` VALUES (3, 'Serba Serbi Sekolah', 'serba-serbi-sekolah');

-- ----------------------------
-- Table structure for edu_config
-- ----------------------------
DROP TABLE IF EXISTS `edu_config`;
CREATE TABLE `edu_config`  (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_themes` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_sambutan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `config_label_kepala` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_kepala_sekolah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_foto_kepala` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_favicon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_title_web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`config_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_config
-- ----------------------------
INSERT INTO `edu_config` VALUES (1, 'orapakat', '<p>Selamat Datang di <b>EDU CMS</b>,</p><p>Kami memberikan fasilitas untuk mengenalkan sekolah dan memanajemen data sekolah.</p>', 'KEPALA SEKOLAH', 'AH. HANDOYO', 'pimpinan-1584795173.png', 'favicon-1584795426.png', 'logo-1584364180.png', 'Website Edu CMS', '081334430992', 'ah.handoyo@orapakat.com');

-- ----------------------------
-- Table structure for edu_kelas
-- ----------------------------
DROP TABLE IF EXISTS `edu_kelas`;
CREATE TABLE `edu_kelas`  (
  `kelas_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kelas_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kelas_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_kelas
-- ----------------------------
INSERT INTO `edu_kelas` VALUES (1, 'kelas-satu', 'Kelas Satu');
INSERT INTO `edu_kelas` VALUES (2, 'kelas-dua', 'Kelas Dua');

-- ----------------------------
-- Table structure for edu_link
-- ----------------------------
DROP TABLE IF EXISTS `edu_link`;
CREATE TABLE `edu_link`  (
  `link_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `link_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`link_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_link
-- ----------------------------
INSERT INTO `edu_link` VALUES (1, 'Orapakat Dev', 'https://orapakat.com');
INSERT INTO `edu_link` VALUES (3, 'Facebook Fanspage', 'https://facebook.com');

-- ----------------------------
-- Table structure for edu_menu
-- ----------------------------
DROP TABLE IF EXISTS `edu_menu`;
CREATE TABLE `edu_menu`  (
  `menu_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_type` enum('Link','Page') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Link',
  `menu_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `menu_page` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_sub` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_menu
-- ----------------------------
INSERT INTO `edu_menu` VALUES (1, 'PROFIL', 'Link', '##', NULL, NULL);
INSERT INTO `edu_menu` VALUES (3, 'SEJARAH SINGKAT', 'Page', NULL, 'page5e6b856f44678', 1);
INSERT INTO `edu_menu` VALUES (4, 'VISI DAN MISI', 'Page', NULL, 'page5e6b8639e7057', 1);
INSERT INTO `edu_menu` VALUES (6, 'DIREKTORI', 'Link', '##', NULL, NULL);
INSERT INTO `edu_menu` VALUES (7, 'STAF DAN TENAGA PENDIDIK', 'Link', '/educms01/staf-pendidik', NULL, 6);
INSERT INTO `edu_menu` VALUES (8, 'PESERTA DIDIK', 'Link', '/educms01/peserta-didik', NULL, 6);
INSERT INTO `edu_menu` VALUES (9, 'ALUMNI', 'Link', '/educms01/alumni', NULL, 6);
INSERT INTO `edu_menu` VALUES (10, 'PUBLIKASI', 'Link', '##', NULL, NULL);
INSERT INTO `edu_menu` VALUES (11, 'GALERI FOTO', 'Link', '/educms01/photo-gallery', NULL, 10);
INSERT INTO `edu_menu` VALUES (12, 'GALERI VIDEO', 'Link', '/educms01/video-gallery', NULL, 10);
INSERT INTO `edu_menu` VALUES (13, 'HUBUNGI KAMI', 'Page', NULL, 'page5e6b8676b12e5', NULL);

-- ----------------------------
-- Table structure for edu_page
-- ----------------------------
DROP TABLE IF EXISTS `edu_page`;
CREATE TABLE `edu_page`  (
  `page_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `page_slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `page_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `page_body` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `page_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `page_owner` int(11) NULL DEFAULT NULL,
  `page_publish_date` date NULL DEFAULT NULL,
  `page_status` enum('Published','Depublished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Published',
  `page_template` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'templates (blade)',
  PRIMARY KEY (`page_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_page
-- ----------------------------
INSERT INTO `edu_page` VALUES ('page5e6b856f44678', 'sejarah-singkat', 'SEJARAH SINGKAT', '<p>Tentang sejarah singkat pendidikan</p>', NULL, 1, '2020-03-13', 'Published', 'none');
INSERT INTO `edu_page` VALUES ('page5e6b8639e7057', 'visi-dan-misi', 'VISI DAN MISI', '<p>Isi visi dan misi</p>', NULL, 1, '2020-03-13', 'Published', 'none');
INSERT INTO `edu_page` VALUES ('page5e6b8676b12e5', 'hubungi-kami', 'HUBUNGI KAMI', '<p>Isi hubungi kami</p>', NULL, 1, '2020-03-13', 'Published', 'none');

-- ----------------------------
-- Table structure for edu_pendidik
-- ----------------------------
DROP TABLE IF EXISTS `edu_pendidik`;
CREATE TABLE `edu_pendidik`  (
  `pendidik_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidik_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidik_nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidik_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidik_tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidik_tgl_lahir` date NULL DEFAULT NULL,
  `pendidik_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pendidik_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidik_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pendidik_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pendidik_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_pendidik
-- ----------------------------
INSERT INTO `edu_pendidik` VALUES ('pendidik5e75fe016ba01', 'staf-tenaga-pendidik-satu', '1234567', 'Staf Tenaga Pendidik Satu', 'Lamongan', '2020-03-21', 'Lamongan', 'Kepala Sekolah', NULL, 'pendidik-1584795703.png');
INSERT INTO `edu_pendidik` VALUES ('pendidik5e75fe30b0897', 'staf-tenaga-pendidik-dua', '1234568', 'Staf Tenaga Pendidik Dua', 'Lamongan', '2020-03-21', 'Tuban', 'Wakil Kepala Sekolah', NULL, 'pendidik-1584795710.png');
INSERT INTO `edu_pendidik` VALUES ('pendidik5e75fe508b708', 'staf-tenaga-pendidik-tiga', '1234569', 'Staf Tenaga Pendidik Tiga', 'Tuban', '2020-03-21', 'Lamongan', 'Guru', NULL, 'pendidik-1584795718.png');
INSERT INTO `edu_pendidik` VALUES ('pendidik5e75fe748a851', 'staf-tenaga-pendidik-empat', '1234560', 'Staf Tenaga Pendidik Empat', 'Tuban', '2020-03-21', 'Tuban', 'Staf Teknis', NULL, 'pendidik-1584795725.png');

-- ----------------------------
-- Table structure for edu_post
-- ----------------------------
DROP TABLE IF EXISTS `edu_post`;
CREATE TABLE `edu_post`  (
  `post_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post_slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `post_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_body` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `post_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_categories` int(11) NULL DEFAULT NULL,
  `post_owner` int(11) NULL DEFAULT NULL,
  `post_publish_date` date NULL DEFAULT NULL,
  `post_status` enum('Published','Depublished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Published',
  `post_tags` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL COMMENT 'dilimiter:,',
  PRIMARY KEY (`post_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_post
-- ----------------------------
INSERT INTO `edu_post` VALUES ('post5e742cf814ded', 'mendikbud-luncurkan-empat-kebijakan-merdeka-belajar-kampus-merdeka', 'Mendikbud Luncurkan Empat Kebijakan Merdeka Belajar: Kampus Merdeka', '<p style=\"text-align: justify; \"><b>Jakarta, Kemendikbud</b> - Menteri Pendidikan dan Kebudayaan (Mendikbud) Nadiem Anwar Makarim kembali meluncurkan kebijakan Merdeka Belajar. Diberi tajuk Kampus Merdeka, kali ini, terdapat empat penyesuaian kebijakan di lingkup pendidikan tinggi.</p><p style=\"text-align: justify; \">\"Kebijakan Kampus Merdeka ini merupakan kelanjutan dari konsep Merdeka Belajar. Pelaksanaannya paling memungkinkan untuk segera dilangsungkan, hanya mengubah peraturan menteri, tidak sampai mengubah Peraturan Pemerintah ataupun Undang-Undang,\" disampaikan Mendikbud dalam rapat koordinasi kebijakan pendidikan tinggi di Gedung D kantor Kemendikbud, Senayan, Jakarta, Jumat (24/1/2020).</p><p style=\"text-align: justify; \">Kebijakan pertama adalah otonomi bagi Perguruan Tinggi Negeri (PTN) dan Swasta (PTS) untuk melakukan pembukaan atau pendirian program studi (prodi) baru. Otonomi ini diberikan jika PTN dan PTS tersebut memiliki akreditasi A dan B, dan telah melakukan kerja sama dengan organisasi dan/atau universitas yang masuk dalam QS Top 100 World Universities. Pengecualian berlaku untuk prodi kesehatan dan pendidikan. Ditambahkan oleh Mendikbud, “Seluruh prodi baru akan otomatis mendapatkan akreditasi C”.</p><p style=\"text-align: justify; \">Lebih lanjut, Mendikbud menjelaskan bahwa kerja sama dengan organisasi akan mencakup penyusunan kurikulum, praktik kerja atau magang, dan penempatan kerja bagi para mahasiswa. Kemudian Kemendikbud akan bekerja sama dengan perguruan tinggi dan mitra prodi untuk melakukan pengawasan. \"Tracer study wajib dilakukan setiap tahun. Perguruan tinggi wajib memastikan hal ini diterapkan,\" ujar Menteri Nadiem.</p><p style=\"text-align: justify; \">Kebijakan Kampus Merdeka yang kedua adalah program re-akreditasi yang bersifat otomatis untuk seluruh peringkat dan bersifat sukarela bagi perguruan tinggi dan prodi yang sudah siap naik peringkat. Mendatang, akreditasi yang sudah ditetapkan Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) tetap berlaku selama 5 tahun namun akan diperbaharui secara otomatis.</p><p style=\"text-align: justify; \">\"Pengajuan re-akreditasi PT dan prodi dibatasi paling cepat 2 tahun setelah mendapatkan akreditasi yang terakhir kali. Untuk perguruan tinggi yang berakreditasi B dan C bisa mengajukan peningkatan akreditasi kapanpun,\" tutur Mendikbud.</p><p style=\"text-align: justify; \">\"Nanti, Akreditasi A pun akan diberikan kepada perguruan tinggi yang berhasil mendapatkan akreditasi internasional. Daftar akreditasi internasional yang diakui akan ditetapkan dengan Keputusan Menteri,\" tambahnya.</p><p style=\"text-align: justify; \">Evaluasi akreditasi akan dilakukan BAN-PT jika ditemukan penurunan kualitas yang meliputi pengaduan masyarakat dengan disertai bukti yang konkret, serta penurunan tajam jumlah mahasiswa baru yang mendaftar dan lulus dari prodi ataupun perguruan tinggi.</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">Kebijakan Kampus Merdeka yang ketiga terkait kebebasan bagi PTN Badan Layanan Umum (BLU) dan Satuan Kerja (Satker) untuk menjadi PTN Badan Hukum (PTN BH). Kemendikbud akan mempermudah persyaratan PTN BLU dan Satker untuk menjadi PTN BH tanpa terikat status akreditasi.</span><br></p><p style=\"text-align: justify; \">Sementara itu, kebijakan Kampus Merdeka yang keempat akan memberikan hak kepada mahasiswa untuk mengambil mata kuliah di luar prodi dan melakukan perubahan definisi Satuan Kredit Semester (sks). \"Perguruan tinggi wajib memberikan hak bagi mahasiswa untuk secara sukarela, jadi mahasiswa boleh mengambil ataupun tidak sks di luar kampusnya sebanyak dua semester atau setara dengan 40 sks. Ditambah, mahasiswa juga dapat mengambil sks di prodi lain di dalam kampusnya sebanyak satu semester dari total semester yang harus ditempuh. Ini tidak berlaku untuk prodi kesehatan,\"</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">Disisi lain, saat ini bobot sks untuk kegiatan pembelajaran di luar kelas sangat kecil dan tidak mendorong mahasiswa untuk mencari pengalaman baru, terlebih di banyak kampus, pertukaran pelajar atau praktik kerja justru menunda kelulusan mahasiswa.</span><br></p><p style=\"text-align: justify; \">Lebih lanjut, Mendikbud menjelaskan terdapat perubahan pengertian mengenai sks. Setiap sks diartikan sebagai \'jam kegiatan\', bukan lagi \'jam belajar\'. Kegiatan di sini berarti belajar di kelas, magang atau praktik kerja di industri atau organisasi, pertukaran pelajar, pengabdian masyarakat, wirausaha, riset, studi independen, maupun kegiatan mengajar di daerah terpencil.</p><p style=\"text-align: justify; \">\"Setiap kegiatan yang dipilih mahasiswa harus dibimbing oleh seorang dosen yang ditentukan kampusnya. Daftar kegiatan yang dapat diambil oleh mahasiswa dapat dipilih dari program yang ditentukan pemerintah dan/atau program yang disetujui oleh rektornya,\" kata Mendikbud.</p><p style=\"text-align: justify; \">Mendikbud menerangkan bahwa paket kebijakan Kampus Merdeka ini menjadi langkah awal dari rangkaian kebijakan untuk perguruan tinggi. \"Ini tahap awal untuk melepaskan belenggu agar lebih mudah bergerak. Kita masih belum menyentuh aspek kualitas. Akan ada beberapa matriks yang akan digunakan untuk membantu perguruan tinggi mencapai targetnya,\" pungkasnya. (*)</p>', 'post-1584793253.png', 2, 1, '2020-03-21', 'Published', 'tag5e69fd2281aa0');
INSERT INTO `edu_post` VALUES ('post5e742dce8b676', 'merdeka-belajar-perubahan-mekanisme-dana-bos-menjadi-langkah-pertama-peningkatan-kesejahteraan-guru', 'Merdeka Belajar: Perubahan Mekanisme Dana BOS Menjadi Langkah Pertama Peningkatan Kesejahteraan Guru', '<p style=\"text-align: justify; \"><b>Jakarta, Kemendikbud</b> - Pemerintah mengubah kebijakan penyaluran dan penggunaan dana Bantuan Operasional Sekolah (BOS). Menteri Pendidikan dan Kebudayaan (Mendikbud) Nadiem Anwar Makarim menyatakan melalui kebijakan Merdeka Belajar episode ketiga, penggunaan dana BOS dibuat fleksibel, salah satunya sebagai langkah awal untuk meningkatan kesejahteraan guru-guru honorer.</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">\"Penggunaan BOS sekarang lebih fleksibel untuk kebutuhan sekolah. Melalui kolaborasi dengan Kemenkeu dan Kemendagri, kebijakan ini ditujukan sebagai langkah pertama untuk meningkatan kesejahteraan guru-guru honorer dan juga untuk tenaga kependidikan. Porsinya hingga 50 persen,\" dikatakan Mendikbud di Kantor Kementerian Keuangan, Jakarta, Senin (10/02/2020).</span><br></p><p style=\"text-align: justify; \">Dijelaskan Mendikbud, setiap sekolah memiliki kondisi yang berbeda. Maka, kebutuhan di tiap sekolah juga berbeda-beda. “Dengan perubahan kebijakan ini, pemerintah memberikan otonomi dan fleksibilitas penggunaan dana BOS,” tambah Mendikbud.</p><p style=\"text-align: justify; \">Pembayaran honor guru honorer dengan menggunakan dana BOS dapat dilakukan dengan persyaratan yaitu guru yang bersangkutan sudah memiliki Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK), belum memiliki sertifikasi pendidik, serta sudah tercatat di Data Pokok Pendidikan (Dapodik) sebelum 31 Desember 2019.</p><p style=\"text-align: justify; \">“Ini merupakan langkah pertama untuk memperbaiki kesejahteraan guru-guru honorer yang telah berdedikasi selama ini,” ujar Nadiem.</p><p style=\"text-align: justify; \">Kebijakan ini merupakan bagian dari kebijakan Merdeka Belajar yang berfokus pada meningkatkan fleksibilitas dan otonomi bagi para kepala sekolah untuk menggunakan dana BOS sesuai dengan kebutuhan sekolah yang berbeda-beda. Namun, hal ini diikuti dengan pengetatan pelaporan penggunaan dana BOS agar menjadi lebih transparan dan akuntabel.</p><p style=\"text-align: justify; \">Penyaluran Makin Cepat dan Tepat Sasaran</p><p style=\"text-align: justify; \">Dana BOS merupakan pendanaan biaya operasional bagi sekolah yang bersumber dari dana alokasi khusus (DAK) nonfisik. Percepatan proses penyaluran dana BOS ditempuh melalui transfer dana dari Kementerian Keuangan (Kemenkeu) langsung ke rekening sekolah. Sebelumnya penyaluran harus melalui Rekening Kas Umum Daerah (RKUD) Provinsi. Tahapan penyaluran dilaksanakan sebanyak tiga kali setiap tahunnya dari sebelumnya empat kali per tahun.</p><p style=\"text-align: justify; \">“Kita membantu mengurangi beban administrasi Pemerintah Daerah dengan menyalurkan dana BOS dari Kemenkeu langsung ke rekening sekolah sehingga prosesnya lebih efisien,” kata Mendikbud.</p><p style=\"text-align: justify; \">Penetapan surat keputusan (SK) sekolah penerima dana BOS dilakukan oleh Kementerian Pendidikan dan Kebudayaan (Kemendikbud), kemudian disusul dengan verifikasi oleh pemerintah provinsi/kabupaten/kota. Sekolah diwajibkan untuk melakukan validasi data melalui aplikasi Dapodik sebelum tenggat waktu yang ditentukan. Batas akhir pengambilan data oleh Kemendikbud dilakukan satu kali per tahun, yakni per 31 Agustus. Sebelumnya dilakukan dua kali per tahun, yaitu per Januari dan Oktober.</p><p style=\"text-align: justify; \">Selain kebijakan penyaluran dan penggunaan, pemerintah juga meningkatkan harga satuan BOS per satu peserta didik untuk jenjang sekolah dasar (SD), sekolah menengah pertama (SMP), dan sekolah menengah atas (SMA) sebesar Rp100.000 per peserta didik.</p><p style=\"text-align: justify; \">Untuk SD yang sebelumnya Rp800.000 per siswa per tahun, sekarang menjadi Rp900 ribu per siswa per tahun. Begitu juga untuk SMP dan SMA masing-masing naik menjadi Rp1.100.000 dan Rp1.500.000 per siswa per tahun.</p><p style=\"text-align: justify; \">Makin Transparan dan Akuntabel&nbsp;&nbsp;</p><p style=\"text-align: justify; \">Merujuk pada Petunjuk Teknis (juknis) BOS Reguler Tahun 2020, peningkatan transparansi penggunaan dana BOS oleh sekolah akan semakin optimal. Kemendikbud mengharapkan laporan pemakaian dana BOS mampu menggambarkan keadaan penggunaan BOS yang riil dan seutuhnya.&nbsp;&nbsp;</p><p style=\"text-align: justify; \">“Karena kita sudah memberikan otonomi dan fleksibilitas kepada Sekolah dan Kepala Sekolah, maka kita juga memerlukan transparansi dan akuntabilitas penggunaan dana BOS,” tutur Mendikbud.</p><p style=\"text-align: justify; \">“Dengan begitu, Kemendikbud bisa melakukan audit secara maksimal dalam upaya perbaikan kebijakan pendanaan sekolah,” tambahnya.</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">Mendatang, penyaluran dana BOS tahap ketiga hanya dapat dilakukan jika sekolah sudah melaporkan penggunaan dana BOS untuk tahap satu dan tahap dua. Sekolah juga wajib mempublikasikan penerimaan dan penggunaan dana BOS di papan informasi sekolah atau tempat lain yang mudah diakses masyarakat. (*)</span></p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\"><br></span><br></p>', 'post-1584793244.png', 1, 1, '2020-03-21', 'Published', 'tag5e69fd2281aa0,tag5e69fd2e115e3');
INSERT INTO `edu_post` VALUES ('post5e742f02b4c90', '50-ribu-guru-jadi-target-program-organisasi-penggerak-di-2020-2022', '50 Ribu Guru Jadi Target Program Organisasi Penggerak di 2020-2022', '<p style=\"text-align: justify; \"><b>Jakarta, Kemendikbud</b> - Kementerian Pendidikan dan Kebudayaan (Kemendikbud) merencanakan Program Organisasi Penggerak (POP) akan meningkatkan kompetensi 50.000 guru, kepala sekolah dan tenaga kependidikan di 5.000 PAUD, SD, dan SMP, pada tahun 2020-2022. Menteri Pendidikan dan Kebudayaan (Mendikbud) Nadiem Anwar Makarim, menyebutkan bahwa ketiga jenjang tersebut memiliki target sasaran paling banyak, sehingga Ia yakin penerapan POP di PAUD, SD, dan SMP akan lebih berdampak luas.&nbsp;&nbsp;</p><p style=\"text-align: justify; \">“Mereka (organisasi penggerak) akan kita bantu dengan pendanaan, melalui seleksi yang transparan dan fair untuk mentransformasi siswa atau sekolah menjadi sekolah penggerak,” ucap Mendikbud, di Kantor Kemendikbud, minggu lalu.</p><p style=\"text-align: justify; \">Mendikbud menuturkan, organisasi penggerak yang memiliki ide bagus dan sudah dijalankan bahkan sudah memiliki output yang baik, dapat mengikuti POP merujuk tiga kategori yang sudah ditetapkan yaitu Kategori Gajah, Kategori Macan, dan Kategori Kijang. “Bagi yang sangat baik akan dilanjutkan, bahkan dikembangkan lagi,” katanya.</p><p style=\"text-align: justify; \">Namun Mendikbud mengingatkan bahwa proses seleksi tidak hanya berlangsung ketika pendaftaran. Kemendikbud akan melakukan monitoring dan evaluasi secara periodik untuk melihat sejauh mana hasil yang dicapai oleh organisasi dalam meningkatkan pembelajaran siswa. “Secara berkala akan diseleksi, dan bagi yang tidak memenuhi target tidak akan lagi diikutkan dalam program. Jika dalam kurun waktu tertentu tidak menunjukkan hasil (yang baik) maka pendanaannya akan distop. Ini proses yang organik dan dinamis,” tegasnya.</p><p style=\"text-align: justify; \">Berkaitan dengan mekanisme seleksi pertama, Direktur Guru dan Tenaga Kependidikan Pendidikan Menengah dan Pendidikan Khusus, Praptono,&nbsp; menyebutkan organisasi perlu mempertimbangkan kriteria yang dipilih dan bukti pendukungnya. Dalam juknis dijelaskan, POP yang diberikan selengkap-lengkapnya menginformasikan apa yang sudah dikerjakan tahun sebelumnya. Jadi isinya terdiri dari video, foto, dan hasil kajian yang sudah dilakukan yang menunjukkan dampak programnya terhadap peningkatan hasil belajar siswa.</p><p style=\"text-align: justify; \">&nbsp;“Supaya Tim Evaluasi bisa mengukur kredibilitas lembaga tersebut, termasuk untuk melihat kredibilitas para guru,” kata Praptono.</p><p style=\"text-align: justify; \">Ditambahkan Praptono, mekanisme pengawasan yang akan dilakukan Tim Evaluator akan mengkaji sisi administrasi dan substansi, untuk memastikan program ini akuntabel yang mengutamakan efektivitas dan efisiensi. “Selanjutnya, Tim Evaluator memberi rekomendasi sebagai acuan untuk verifikasi lapangan pada periode 16 Mei -30 Juni mendatang,” jelasnya.</p><p style=\"text-align: justify; \">Lebih lanjut Praptono menjelaskan, “Ada tiga termin monev yang dilakukan oleh Tim Evaluator independen yaitu base, middle dan akhir.&nbsp; Tim Evaluator akan meninjau organisasi pada tahun 2021 berdasarkan hasil laporan mereka di akhir Desember 2020. Begitu seterusnya selama tiga tahun berturut-turut,” urainya.</p><p style=\"text-align: justify; \">Di hadapan awak media, Praptono mengimbau dinas setempat turut menjaga agar POP bisa tepat sasaran. “Tahun ini (ditargetkan) 100 kabupaten. Mappingnya mempertimbangkan jumlah alokasi anggaran dan waktu yang tersedia. Sekolah yang terpilih tidak boleh menjadi sasaran_double_, Disdik harus memfilter ini,” katanya.</p><p style=\"text-align: justify; \">Dewasa ini guru dituntut untuk kreatif menciptakan program pembelajaran yang dapat menstimulasi peserta didik supaya rasa keingintahuan dan semangat belajarnya meningkat. Oleh karena itu, kata Praptono, pendekatan melalui POP diharapkan mampu mengembangkan kemampuan guru yang juga menjadi salah satu elemen pendukung terciptanya Sekolah Penggerak. “Yang perlu digagas adalah meningkatkan kemampuan guru dalam memotivasi siswa belajar lebih aktif,” tuturnya.</p><p style=\"text-align: justify;\">Sejalan dengan itu, pengamat pendidikan Itje Chodijah, menyambut baik jika Kemendikbud dapat mengontrol keberlangsungan program ini agar tidak hanya berkualitas namun juga tepat sasaran sesuai kebutuhannya. “Kementerian (harus) punya alat untuk memonitor sekolah-sekolah mana saja yang sudah dapat supaya bantuannya diberikan kepada yang kurang,” kata dia.</p><p style=\"text-align: justify;\">Lebih lanjut Itje berharap, Kemendikbud bisa bertindak sebagai wasit yang adil dalam memberdayakan tenaga-tenaga yang ada di masyarakat agar potensi ini berkembang secara merata di seluruh daerah. “Organisasi penggerak ini justru menjadi perangsang buat para guru untuk belajar lagi. Sasarannya langsung ke gurunya. Misalnya, LPMP mengundang guru yang mau belajar substansi tertentu,” katanya.</p><p style=\"text-align: justify;\">Berangkat dari pengalamannya selama 15 tahun bergerak di lapangan, Itje mengatakan, sebaiknya proposal yang terpilih adalah yang programnya paling relevan dengan kebutuhan sekolah dan siswa. “Kriterianya adalah&nbsp; kegiatan atau program yang berhubungan dengan sekolah dan peningkatan kualitas siswa yang bisa difasilitasi oleh guru. Jangan sampai programnya tidak sesuai dengan kebutuhan sekolah. Oleh karena itu, pahami karakteristik daerahnya,” Itje menuturkan.</p><p style=\"text-align: justify;\">Hasil identifikasi karakteristik daerah itulah yang menjadi acuan dalam menentukan program apa yang sesuai dan paling dibutuhkan di daerah tersebut, karena pendidikan berpengaruh pada berbagai aspek. Organisasi penggerak yang akan praktik ke lapangan harus melakukan survei atau uji lapangan dulu. “Jangan sampai nanti sudah mendapatkan sumbangan tetapi ketika diterapkan apa yang dia ajukan (programnya) tidak cocok dengan kondisi setempat,” tuturnya.</p><p style=\"text-align: justify;\">Organisasi penggerak bisa membuat semacam pelatihan bekerja sama dengan institusi yang menaungi guru misalnya LPMP yang audiensnya melibatkan guru-guru di suatu wilayah. Ada tiga bidang yang bisa menjadi fokus pendalaman yaitu literasi, numerasi, pengembangan karakter. “Bisa juga organisasi penggerak ini kemudian menempel ke kegiatannya MGMP yang muatannya bisa berbasis mata pelajaran ataupun tidak, namun mengarah pada tercapainya profil siswa Indonesia yang berjiwa Pancasila,” pungkasnya. (Denty/Aline)</p>', 'post-1584793330.png', 3, 1, '2020-03-21', 'Published', 'tag5e69fd2281aa0,tag5e742e7c48897,tag5e742e87383b6,tag5e742e936b3fb,tag5e742e99cfe2a');
INSERT INTO `edu_post` VALUES ('post5e742f9d2f0cc', 'kemendikbud-rangkul-organisasi-masyarakat-wujudkan-sekolah-penggerak', 'Kemendikbud Rangkul Organisasi Masyarakat Wujudkan Sekolah Penggerak', '<p style=\"text-align: justify; \"><b>Jakarta, Kemendikbud</b> - Menteri Pendidikan dan Kebudayaan (Mendikbud) Nadiem Anwar Makarim meluncurkan Merdeka Belajar Episode 4: Program Organisasi Penggerak (POP) di Gedung A, Kantor Kementerian Pendidikan dan Kebudayaan (Kemendikbud), Jakarta, Selasa (10/3/2020). Paket kebijakan ini bertujuan untuk semakin memberdayakan organisasi masyarakat dalam membangun Sekolah Penggerak.</p><p style=\"text-align: justify; \">Mendikbud mengakui bahwa selama ini begitu banyak organisasi masyarakat yang peduli terhadap mutu pendidikan namun tumbuh dan bergerak sendiri-sendiri. Banyak dari mereka yang sukarela membiayai berbagai inisiasi di bidang pendidikan tanpa mengandalkan bantuan dari pemerintah. “Sekarang kita akan dukung mereka,” ucapnya.</p><p style=\"text-align: justify; \">Organisasi Penggerak diharapkan menjadi salah satu elemen penting terciptanya Sekolah Penggerak, tempat menuangkan seluruh konsep Merdeka Belajar. Kemendikbud berkomitmen akan menciptakan Sekolah Penggerak dengan berbagai macam metode yang sesuai dengan kondisi masyarakat namun tetap menjunjung toleransi atas keberagaman.</p><p style=\"text-align: justify; \">Dalam pidatonya, Mendikbud membuka kesempatan kepada berbagai pihak baik&nbsp; kementerian, swasta dan lembaga lainnya untuk mendukung program organisasi-organisasi supaya dapat bergerak lebih cepat, lebih kontinu, dan lebih berdampak positif. “Ke depannya mereka akan mendapatkan dana juga dari bermacam-macam instansi bukan hanya dari pemerintah sehingga dari sisi suistanibility, pendanaan, ini akan jauh lebih efektif. Programnya akan terus berjalan meskipun menteri berganti. Inilah jawaban kami, (mengapa) penting punya organisasi penggerak,” jelas Mendikbud Nadiem.</p><p style=\"text-align: justify; \">Praktisi Pendidikan Itje Chodijah mendukung terbitnya kebijakan ini. Menurutnya, potensi masyarakat yang besar akan menjadi sumber pengembangan bagi kepala sekolah dan guru di lapangan. POP menjadi peluang bagi semua pihak bergerak bersama termasuk pemda dan kementerian terkait seperti Kementerian Transmigrasi dan Desa Tertinggal yang memiliki dana dan bisa menjadi kekuatan untuk menyegerakan peningkatan akses dan kualitas pendidikan.</p><p style=\"text-align: justify; \">“Seharusnya organisasi menyambut baik (POP) karena tujuannya membantu guru menyukseskan belajar mengajarnya merujuk pada kurikulum pendidikan. Dengan langkah ini, pemerintah telah memberi kemudahan organisasi untuk bekerja sama dengan sekolah,” tuturnya.</p><p style=\"text-align: justify; \">Itje berpendapat, keberlangsungan program sangat bergantung pada kemampuan organisasi penggerak untuk menyediakan pelatihan atau kegiatan yang membuat para guru lebih berdaya guna. Bagaimana agar selama rentang waktu tertentu, organisasi tersebut dapat berkontribusi mencetak guru sebagai agent of change.</p><p style=\"text-align: justify; \">Dengan begitu, ada tidaknya program ini nantinya, Indonesia tetap memiliki guru yang mandiri dan bisa menularkan energi positifnya bagi sekolah dalam mencetak generasi unggul masa depan. “Hasil dari program ini yang paling penting ada tiga hal yaitu memberdayakan guru, memandirikan guru, dan memampukan mereka untuk berbagi,” kata Itje.</p><p style=\"text-align: justify; \">Itje menambahkan, tujuan dari POP adalah perbaikan kualitas siswa dan pendidikan yang sejatinya dapat menciptakan&nbsp; profil siswa Indonesia yang berakhlak mulia, kreatif, gotong royong, bernalar kritis, mandiri, dan berkebhinekaan global. “Semua program pendidikan itu endingnya adalah siswa,” pungkas Itje.</p><p style=\"text-align: justify; \">Dirjen Guru dan Tenaga Kependidikan, Supriano mengingatkan kembali agar organisasi masyarakat memperhatikan lini masa dan segera mengajukan proposal sebelum batas waktu yang ditentukan. Ia mengatakan, hanya organisasi yang terdaftar dan lolos seleksi yang dapat mengikuti proram ini. “Poinnya adalah organisasi, siapapun boleh masuk seandainya ia bisa bergerak melalui kolaborasi. Kita bisa mengontrol organisasi yang teregistrasi. Jika di daerah punya penggiat, dia mesti terdaftar di Kemendikbud.&nbsp; Seandainya dia punya organisasi yang kecil, dia bisa bergabung dan berkolaborasi tapi satuannya organisasi,” jelasnya.</p><p style=\"text-align: justify; \">Tercatat sudah 3.300 organisasi dan 12.159 relawan yang mendaftar pada laman sekolah.penggerak.kemdikbud.go.id. Mendikbud merasa terharu karena begitu banyak pihak yang ingin membantu dan berpartispasi. Ia melihat ini adalah indikasi bahwa Merdeka Belajar mampu memberi semangat baru. Ini juga menunjukkan bahwa masyarakat bahwa membangun pendidikan di Indonesia bukan hanya tugas pemerintah saja tapi tugas kita semua. “Untuk itu saya ucapkan terima kasih kepada semuanya yang sudah mendaftar,” katanya. (Denty/Aline)</p>', 'post-1584793344.png', 3, 1, '2020-03-21', 'Published', 'tag5e69fd2281aa0,tag5e742e7c48897');
INSERT INTO `edu_post` VALUES ('post5e74324428d87', 'fresh-graduate-ingin-wawancara-kerja-perhatikan-5-tips-ini1584789472', 'Fresh Graduate, Ingin Wawancara Kerja? Perhatikan 5 Tips Ini', '<p style=\"text-align: justify; \"><b>KOMPAS.com</b> - Beberapa kendala sering dialami para pencari kerja. Apa saja itu? Selain psikotes, ada satu \"momok\" yang menakutkan khususnya bagi para fresh graduate.&nbsp;</p><p style=\"text-align: justify; \">Tes wawancara kerja. Tes yang satu ini banyak dirasakan para pelamar kerja jadi kendala serius. Sebab, para fresh graduate belum banyak pengalaman untuk yang satu ini. Atau malah belum pernah ikut wawancara kerja.&nbsp;</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">Biasanya, wawancara kerja terdiri dari dua tahap, yaitu wawancara kerja HRD dan wawancara kerja User. Penyebab tidak lulusnya wawancara kerja tentu karena kurangnya persiapan.&nbsp;</span><br></p><p style=\"text-align: justify; \">Sehingga, saat wawancara orang menjadi gugup dalam menjawab setiap pertanyaan yang dilontarkan orang yang mewawancarai.&nbsp;</p><p style=\"text-align: justify; \">Tapi, sebenarnya ada beberapa tips agar para pencari kerja bisa sukses saat menghadapi wawancara kerja. Berikut 5 tips jitu mengahadapi wawancara kerja yang dirangkum dari laman resmi Fakultas Teknik Universitas Indonesia (UI).&nbsp;</p><p style=\"text-align: justify; \"><b>1. Survei dulu lokasinya&nbsp;</b></p><p style=\"text-align: justify; \">Jika kamu belum tahu lokasi untuk wawancara, sebaiknya survei dulu tempatnya. Hal ini dilakukan agar pada saat hari H kamu tidak sibuk atau kebingungan mencari lokasi wawancara kerja.&nbsp;</p><p style=\"text-align: justify; \">Ini juga untuk mengantisipasi hal-hal yang tidak diinginkan, misalnya saja terjadi ban bocor di jalan. Tentu akan membuat psikis kamu terganggu.&nbsp;</p><p style=\"text-align: justify; \"><b>2. Datang lebih awal&nbsp;</b></p><p style=\"text-align: justify; \">Agar bisa menyiapkan diri dengan baik, jika sudah tahu lokasinya maka sebaiknya kamu datang lebih awal ke lokasi wawancara kerja. Maksimal ialah 10 menit sebelum jadwal kamu wawancara.&nbsp;</p><p style=\"text-align: justify; \">Ini bermanfaat bagi kamu agar bisa mendinginkan pikiran atau membuat santai diri, sehingga kamu tidak \"tergopoh-gopoh\" yang menyebabkan berkeringat dan gugup saat melakukan wawancara.&nbsp;</p><p style=\"text-align: justify; \"><b>3. Coba siapkan jawaban atas pertanyaan&nbsp;</b></p><p style=\"text-align: justify; \">Agar sukses saat wawancara kerja, kamu harus menyiapkan jawaban atas pertanyaan wawancara kerja. Ini penting dilakukan agar dapat meningkatkan kepercayaan dirimu.</p><p style=\"text-align: justify; \">Sehingga tidak membuat kamu khawatir lagi untuk tidak dapat menjawab pertanyaan dari si pewawancara. Misalnya, ada pertanyaan A, maka kamu harus bisa jawab pertanyaan A. Jika ada pertanyaan B, maka jawabannya sesuai pertanyaan B.&nbsp;</p><p style=\"text-align: justify; \"><b>4. Berpakaian formal dan rapi&nbsp;</b></p><p style=\"text-align: justify; \">Untuk pakaian, kamu bisa berpakaian sesuai dengan kemampuan finansial tetapi kalau bisa yang formal. Untuk pria pakailah pakaian kameja lengan panjang dengan warna cerah namun tidak norak atau mencolok.&nbsp;</p><p style=\"text-align: justify; \">Hal ini memiliki penilaian psikologis oleh si pewawancara. Normalnya pakaian yang dipakai untuk wawancara kerja adalah kemeja putih dan celana panjang warna hitam dengan bahan kain.&nbsp;</p><p style=\"text-align: justify; \">Untuk wanita, pakailah pakaian yang menunjukan kamu sebagai seorang pekerja. Jangan pakai make up terlalu tebal, tapi&nbsp; pakai make up yang sewajarnya saja.&nbsp;</p><p style=\"text-align: justify; \"><b>5. Awali dan akhiri dengan jabat tangan&nbsp;</b></p><p style=\"text-align: justify; \">Terlepas dari merebaknya virus corona, jabat tangan sangat bagus bagi seseorang yang sedang wawancara kerja. Ketika giliran kamu untuk wawancara, maka ketuklah pintu terlebih dahulu.&nbsp;</p><p style=\"text-align: justify; \"><span style=\"font-size: 0.875rem;\">Kemudian, ulurkan tangan kamu lebih awal untuk berjabat tangan sambil mengucapkan sapaan hangat. Hal ini dilakukan agar pewawancara memberi kesan positif bahwa kamu adalah orang yang smart dan ramah serta percaya diri.&nbsp;</span><br></p><p style=\"text-align: justify; \">Hal yang terakhir yang harus kamu lakukan ialah setelah selesai di wawancarai maka ucapkan terima kasih dan jabat tangan dengan interviewer sembari memberikan senyuman ramah.&nbsp;</p><p style=\"text-align: justify; \">Itulah tips yang efektif dalam menghadapi wawancara kerja. Namun yang paling utama ialah berdoa agar semua dimudahkan, lancar dan bisa diterima di tempat kerja yang dituju.</p>', 'post-1584793321.png', 2, 1, '2020-03-21', 'Published', 'tag5e69fd2281aa0');

-- ----------------------------
-- Table structure for edu_siswa
-- ----------------------------
DROP TABLE IF EXISTS `edu_siswa`;
CREATE TABLE `edu_siswa`  (
  `siswa_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `siswa_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_nis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_tgl_lahir` date NULL DEFAULT NULL,
  `siswa_jk` enum('Laki-Laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `siswa_kelas` bigint(20) NULL DEFAULT NULL,
  `siswa_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `siswa_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`siswa_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_siswa
-- ----------------------------
INSERT INTO `edu_siswa` VALUES ('pesertadidik5e75feb2e4e29', 'peserta-didik-satu', '1234', 'Peserta Didik Satu', 'Tuban', '2020-03-21', 'Laki-Laki', 'Tuban', 1, NULL, 'pesertadidik-1584795736.png');
INSERT INTO `edu_siswa` VALUES ('pesertadidik5e75fed22f831', 'peserta-didik-dua', '1235', 'Peserta Didik Dua', 'Lamongan', '2020-03-21', 'Perempuan', 'Tuban', 2, NULL, 'pesertadidik-1584795742.png');

-- ----------------------------
-- Table structure for edu_slider
-- ----------------------------
DROP TABLE IF EXISTS `edu_slider`;
CREATE TABLE `edu_slider`  (
  `slider_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slider_description` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `slider_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slider_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slider_status` enum('Published','Depublished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Published',
  `slider_owner` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`slider_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_slider
-- ----------------------------
INSERT INTO `edu_slider` VALUES (1, 'Slider Pertama Kali', 'Deskripsi untuk gambar slider pertama', 'slider-1584277618.jpg', '##', 'Published', 1);
INSERT INTO `edu_slider` VALUES (2, 'Slider Kedua', 'Deskripsi untuk gambar slider kedua', 'slider-1584277645.jpg', '##', 'Published', 1);

-- ----------------------------
-- Table structure for edu_sosmed
-- ----------------------------
DROP TABLE IF EXISTS `edu_sosmed`;
CREATE TABLE `edu_sosmed`  (
  `sosmed_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sosmed_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sosmed_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sosmed_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'font-awesome',
  PRIMARY KEY (`sosmed_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_sosmed
-- ----------------------------
INSERT INTO `edu_sosmed` VALUES (4, 'Facebook', 'https://www.facebook.com/orapakatcom', 'fab fa-facebook');
INSERT INTO `edu_sosmed` VALUES (5, 'Twitter', 'https://twitter.com', 'fab fa-twitter');
INSERT INTO `edu_sosmed` VALUES (6, 'Youtube', 'https://youtube.com', 'fab fa-youtube');

-- ----------------------------
-- Table structure for edu_tag
-- ----------------------------
DROP TABLE IF EXISTS `edu_tag`;
CREATE TABLE `edu_tag`  (
  `tag_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tag_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tag_slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`tag_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_tag
-- ----------------------------
INSERT INTO `edu_tag` VALUES ('tag5e69fd2281aa0', 'berita', 'berita');
INSERT INTO `edu_tag` VALUES ('tag5e69fd2e115e3', 'sekolahan', 'sekolahan');
INSERT INTO `edu_tag` VALUES ('tag5e742e7c48897', 'Kementrian', 'kementrian');
INSERT INTO `edu_tag` VALUES ('tag5e742e87383b6', 'Pendidikan', 'pendidikan');
INSERT INTO `edu_tag` VALUES ('tag5e742e936b3fb', 'Guru', 'guru');
INSERT INTO `edu_tag` VALUES ('tag5e742e99cfe2a', 'Pendidik', 'pendidik');

-- ----------------------------
-- Table structure for edu_tahun_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `edu_tahun_pelajaran`;
CREATE TABLE `edu_tahun_pelajaran`  (
  `tahun_pelajaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_pelajaran_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun_pelajaran_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tahun_pelajaran_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_tahun_pelajaran
-- ----------------------------
INSERT INTO `edu_tahun_pelajaran` VALUES (1, '2019-2020', '2019-2020');

-- ----------------------------
-- Table structure for edu_user
-- ----------------------------
DROP TABLE IF EXISTS `edu_user`;
CREATE TABLE `edu_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_displayname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_enabled` tinyint(1) NULL DEFAULT 1,
  `user_role` enum('Root','Editor') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Editor',
  `user_lastseen` datetime(0) NULL DEFAULT NULL,
  `user_lastip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_user
-- ----------------------------
INSERT INTO `edu_user` VALUES (1, 'EDUCMS', 'educms', '$2y$10$.1C1UvADifNb4pnYc6j5GuJJ7xYhvG73.jT2BmB95VLnbJf0hmvOu', 1, 'Editor', NULL, NULL);

-- ----------------------------
-- Table structure for edu_video
-- ----------------------------
DROP TABLE IF EXISTS `edu_video`;
CREATE TABLE `edu_video`  (
  `video_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `video_embed` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `video_thumbnail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `video_publish_date` date NULL DEFAULT NULL,
  `video_status` enum('Published','Depublished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Published',
  PRIMARY KEY (`video_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edu_video
-- ----------------------------
INSERT INTO `edu_video` VALUES (1, 'Nadiem Makarim: Rencana 100 Hari Saya Mendengar Para Pakar Pendidikan', 'nadiem-makarim-rencana-100-hari-saya-mendengar-para-pakar-pendidikan', 'https://www.youtube.com/watch?v=vxz57DxUfuA', 'http://www.youtube.com/embed/vxz57DxUfuA', 'https://img.youtube.com/vi/vxz57DxUfuA/mqdefault.jpg', '2020-03-17', 'Published');
INSERT INTO `edu_video` VALUES (2, 'Ini Dia Kebijakan Kampus Merdeka ala Nadiem Makarim', 'ini-dia-kebijakan-kampus-merdeka-ala-nadiem-makarim', 'https://www.youtube.com/watch?v=pQsw6NvNt4c', 'http://www.youtube.com/embed/pQsw6NvNt4c', 'https://img.youtube.com/vi/pQsw6NvNt4c/mqdefault.jpg', '2020-03-17', 'Published');
INSERT INTO `edu_video` VALUES (3, 'Pesan Nadiem Makarim untuk Milenial: Jangan Tunggu Dunia Berubah!', 'pesan-nadiem-makarim-untuk-milenial-jangan-tunggu-dunia-berubah', 'https://www.youtube.com/watch?v=oaGmIH4krKs', 'http://www.youtube.com/embed/oaGmIH4krKs', 'https://img.youtube.com/vi/oaGmIH4krKs/mqdefault.jpg', '2020-03-17', 'Published');

SET FOREIGN_KEY_CHECKS = 1;
