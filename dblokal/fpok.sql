/*
 Navicat Premium Data Transfer

 Source Server         : LOCA MYSQL
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : fpok

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 18/12/2020 22:25:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_arsip_cuti
-- ----------------------------
DROP TABLE IF EXISTS `data_arsip_cuti`;
CREATE TABLE `data_arsip_cuti`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mulai` date NULL DEFAULT NULL,
  `selesai` date NULL DEFAULT NULL,
  `id_unit` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_dokumen_ibfk_1`(`idpegawai`) USING BTREE,
  CONSTRAINT `data_arsip_cuti_ibfk_1` FOREIGN KEY (`idpegawai`) REFERENCES `data_pegawai` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_arsip_cuti
-- ----------------------------
INSERT INTO `data_arsip_cuti` VALUES (2, 151, 'Cuti Tahunan', '2020-11-25', '2020-11-28', 1, '2020-11-25 07:08:38', '2020-11-25 07:08:38', '0808_ACT_1606288118.pdf');

-- ----------------------------
-- Table structure for data_arsip_kgb
-- ----------------------------
DROP TABLE IF EXISTS `data_arsip_kgb`;
CREATE TABLE `data_arsip_kgb`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `gaji` bigint(20) NULL DEFAULT NULL,
  `masa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idpangkat` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `tmt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_dokumen_ibfk_1`(`idpegawai`) USING BTREE,
  CONSTRAINT `data_arsip_kgb_ibfk_1` FOREIGN KEY (`idpegawai`) REFERENCES `data_pegawai` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_arsip_kgb
-- ----------------------------
INSERT INTO `data_arsip_kgb` VALUES (1, 151, 'Sample', '2020-11-27', 1000000, 'Sample', '2020-11-27 14:29:10', '2020-11-27 14:29:10', '0808_KGB_1606487350.png', 1, 'dawdaw');

-- ----------------------------
-- Table structure for data_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `data_dokumen`;
CREATE TABLE `data_dokumen`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namadok` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filedok` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_dokumen_ibfk_1`(`idpegawai`) USING BTREE,
  CONSTRAINT `data_dokumen_ibfk_1` FOREIGN KEY (`idpegawai`) REFERENCES `data_pegawai` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_dokumen
-- ----------------------------
INSERT INTO `data_dokumen` VALUES (1, 151, 'Dokumen Satu', 'Dokumen Sample', 'Dokumenter', NULL, '2020-11-19 13:37:19', '2020-11-19 13:37:19');

-- ----------------------------
-- Table structure for data_fungsional
-- ----------------------------
DROP TABLE IF EXISTS `data_fungsional`;
CREATE TABLE `data_fungsional`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) NULL DEFAULT NULL,
  `idfungsional` bigint(10) NULL DEFAULT NULL,
  `sk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_fungsional
-- ----------------------------
INSERT INTO `data_fungsional` VALUES (1, 151, 1, 'SK-123456', '2020-11-19', NULL, '2020-11-19 13:30:25', '2020-11-19 13:30:25', '2020-11-19');
INSERT INTO `data_fungsional` VALUES (2, 151, 5, 'SK-1234567', '2020-12-25', '0808_FS_1606287523.pdf', '2020-11-25 06:58:43', '2020-11-25 06:58:43', '2020-11-25');

-- ----------------------------
-- Table structure for data_jurnal
-- ----------------------------
DROP TABLE IF EXISTS `data_jurnal`;
CREATE TABLE `data_jurnal`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namajurnal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filejurnal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_jurnal
-- ----------------------------
INSERT INTO `data_jurnal` VALUES (1, '151', 'Sepakbola', 'Olahraga', '2018', NULL, 'www.google.com', '2020-11-19 13:56:01', '2020-11-19 13:56:01');
INSERT INTO `data_jurnal` VALUES (2, '151', 'Dinosaurus', 'Penelitian Sejarah', '2018', '0808_JN_1606287276.pdf', NULL, '2020-11-25 06:54:36', '2020-11-25 06:54:36');

-- ----------------------------
-- Table structure for data_kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `data_kehadiran`;
CREATE TABLE `data_kehadiran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namapegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harikerja` int(2) NULL DEFAULT NULL,
  `harimasuk` int(2) NULL DEFAULT NULL,
  `presentase` bigint(6) NULL DEFAULT NULL,
  `bulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` int(6) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for data_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `data_keluarga`;
CREATE TABLE `data_keluarga`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ttl` date NULL DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hub` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `idpegawai` int(10) NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_keluarga
-- ----------------------------
INSERT INTO `data_keluarga` VALUES (1, NULL, 'Budi', '1980-02-19', 'SMA/SMK', 'Wiraswasta', 'Ayah Kandung', '2020-11-19 13:22:04', '2020-11-19 13:22:04', 151, 'Bandung');
INSERT INTO `data_keluarga` VALUES (2, NULL, 'Yuri', '1990-04-19', 'SMA/SMK', 'Wiraswasta', 'Ibu Kandung', '2020-11-19 13:23:19', '2020-11-19 13:23:19', 151, 'Bandung');

-- ----------------------------
-- Table structure for data_keluarga_anak
-- ----------------------------
DROP TABLE IF EXISTS `data_keluarga_anak`;
CREATE TABLE `data_keluarga_anak`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ttl` date NULL DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hub` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `idpegawai` int(10) NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_keluarga_anak
-- ----------------------------
INSERT INTO `data_keluarga_anak` VALUES (1, NULL, 'Noor', '2001-01-01', 'Sarjana', 'Pegawai Swasta', 'Anak Kandung', '2020-11-19 13:20:35', '2020-11-19 13:20:35', 151, 'Bandung');
INSERT INTO `data_keluarga_anak` VALUES (2, NULL, 'Raihan', '2004-08-19', 'Sarjana', 'PNS', 'Anak Kandung', '2020-11-19 13:21:12', '2020-11-19 13:21:12', 151, 'Bandung');

-- ----------------------------
-- Table structure for data_keluarga_pasangan
-- ----------------------------
DROP TABLE IF EXISTS `data_keluarga_pasangan`;
CREATE TABLE `data_keluarga_pasangan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ttl` date NULL DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hub` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `idpegawai` int(10) NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_keluarga_pasangan
-- ----------------------------
INSERT INTO `data_keluarga_pasangan` VALUES (1, NULL, 'Sheila Dara Aisha', '2000-02-01', 'D4', 'PNS', 'Istri', '2020-11-19 13:18:13', '2020-11-19 13:18:13', 151, 'Bandung');

-- ----------------------------
-- Table structure for data_kepakaran
-- ----------------------------
DROP TABLE IF EXISTS `data_kepakaran`;
CREATE TABLE `data_kepakaran`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `matakuliah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_kepakaran
-- ----------------------------
INSERT INTO `data_kepakaran` VALUES (1, 151, 'Sepakbola', 'Olahraga', '2020-11-19 13:56:32', '2020-11-19 13:56:32');

-- ----------------------------
-- Table structure for data_pangkat
-- ----------------------------
DROP TABLE IF EXISTS `data_pangkat`;
CREATE TABLE `data_pangkat`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idpangkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglsk` date NULL DEFAULT NULL,
  `pengesah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmt` date NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pangkat
-- ----------------------------
INSERT INTO `data_pangkat` VALUES (1, '151', '1', 'SK-1234567', '2020-11-19', 'Andi', '2020-11-19', NULL, '2020-11-19 13:36:17', '2020-11-19 13:36:17');

-- ----------------------------
-- Table structure for data_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `data_pegawai`;
CREATE TABLE `data_pegawai`  (
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gelar_depan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gelar_belakang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nidn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ttl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `golongan_darah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_nikah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_kepegawaian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tlp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pensiun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_kerja` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `id_status` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `id_jabatan_fungsional` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggallahir` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_pegawai_ibfk_1`(`id_unit_kerja`) USING BTREE,
  INDEX `data_pegawai_ibfk_2`(`id_status`) USING BTREE,
  INDEX `data_pegawai_ibfk_3`(`id_jabatan_fungsional`) USING BTREE,
  CONSTRAINT `data_pegawai_ibfk_1` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `data_pegawai_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `data_pegawai_ibfk_3` FOREIGN KEY (`id_jabatan_fungsional`) REFERENCES `jabatan_fungsional` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 152 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pegawai
-- ----------------------------
INSERT INTO `data_pegawai` VALUES ('3273200303560002', '195603031983031005', 'Beltasar Tarigan', 'Prof. Dr. ', 'MS.', NULL, '3035604', 'Kabanjahe', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl.Plered 14 No 1 Rt/001 Rw/011 Kel Antapani Tengah Kec Antapani', NULL, NULL, '70 tahun', 2, 1, NULL, NULL, NULL, 16, '1956-03-03');
INSERT INTO `data_pegawai` VALUES ('3277030403590008', '195903041987031002', 'Eka Nugraha', 'Dr.', 'M.Kes.', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Puri Cipageran Indah I Blok D No 141 Rt/005 Rw/023 Kel Cipageran Kec Cimahi Utara ', '81320790633', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 17, '1959-03-04');
INSERT INTO `data_pegawai` VALUES ('3273266806590001', '195906281989012001', 'Lilis Komariyah', 'Dra. ', 'M.Pd', NULL, '28015902', 'Kandangan ', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl Taruna Baru Rt/008 Rw/002 Kel Pasir Endah Kec Ujung Berung', '85220102273', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 18, '1959-06-28');
INSERT INTO `data_pegawai` VALUES ('3273241901600002', '196001191986031002', 'Amung Ma’mun', 'Dr.H. ', 'M.Pd.', NULL, '19016003', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 19, '1960-01-19');
INSERT INTO `data_pegawai` VALUES ('3277015806500001', '196005181987032003', 'Oom Rohmah', 'Dra.Hj. ', 'M.Pd', NULL, NULL, 'Bogor', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl Boeing Utara I No 27 Rt/02 Rw/028 Kel Melong Kec Cimahi Selatan', '85794591337', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 20, '1960-05-18');
INSERT INTO `data_pegawai` VALUES ('3273281206610001', '196106121987031002', 'Sucipto', 'Drs. ', 'M.Kes.', NULL, '12066102', 'Indramayu', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Aria Graha Regency Jl Aria Selatan I No 10 Rt/09 Rw/02 Kel Cimapokalan Kel Rancasari', '81220817444', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 21, '1961-06-12');
INSERT INTO `data_pegawai` VALUES ('3204071807620001', '196207181988031004', 'Yudy Hendrayana', 'Dr.', 'M.Kes.', NULL, '18076209', 'Majalengka', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', '165 Rt/004 Rw/001 Kel jatiendah Kec Cilengkrang', '85220181962', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 22, '2007-01-18');
INSERT INTO `data_pegawai` VALUES ('3273220808620003', '196208081987031002', 'Toto Subroto', 'Drs.H.', 'M.Pd.', NULL, '8086208', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl. Antasari B-72 No 10 Rt/02 Rw/04 Kel Margasari Kec Buah Batu ', '81321006168', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 23, '1962-08-08');
INSERT INTO `data_pegawai` VALUES ('3273141406650001', '196506141990011001', 'Yunyun Yudiana', 'Dr.H.', 'MPd', NULL, '14066502', 'Tasikmalaya', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Sukarapih V No 10 Rt/02 Rw/14 Kel Cikutra Kec Cibeunying Kidul', '81320458333', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 24, '1965-06-17');
INSERT INTO `data_pegawai` VALUES ('3217031708650010', '196508171990011001', 'Mudjihartono', 'Drs. ', 'M.Pd', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl. Kolonel Masturi No 1 Rt/002 Rw/012 Kel Jambudipa Kec Cisarua Kab Bandung Barat', '82121216265', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 25, '1965-08-17');
INSERT INTO `data_pegawai` VALUES ('3277010909650025', '196509091991021001', 'Bambang Abduljabar', 'Dr. ', 'M.Pd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 26, NULL);
INSERT INTO `data_pegawai` VALUES ('3273204707680004', '196807071992032001', 'Tite Juliantine', 'Dr.Hj. ', 'M.Pd', NULL, '7076807', 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl. Pelangi Antapani 1 No 45 Rt/007 Rw/004 Kel Antapani Kulon Kec Antapani', '8122137655', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 27, '1968-07-07');
INSERT INTO `data_pegawai` VALUES ('3217013008680002', '196808301999031001', 'Yusuf Hidayat', 'Dr.', 'S.Pd.,M.Si', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Pasir Layung No 224 Rt/001 Rw/002 Kel Pasrlayung Kec Cibeunying Kidul ', '81321994631', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 28, '1968-08-30');
INSERT INTO `data_pegawai` VALUES ('3217013008680003', '196808301999031001', 'Yusuf Hidayat', 'Dr. ', 'S.Pd.,M.Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 29, NULL);
INSERT INTO `data_pegawai` VALUES ('3217060501710009', '197101052002121001', 'Carsiwan', 'H. ', 'S.Pd.,M.Pd.', NULL, NULL, 'Indramayu', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Graha Bukit Raya 3 BlokF1 No 29 Rt/05 Rw/025 Desa Cilame Kec Ngamprah', '8179260445', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 30, '1971-01-05');
INSERT INTO `data_pegawai` VALUES ('3273161701710004', '197101171998021001', 'Nuryadi', 'Dr. ', 'M.Pd.', NULL, '17017102', 'Ciamis ', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Permata Residence Antapani B2 Rt/009 Rw/003 Kel Cicaheum Kec Kiaracondong Bandung', NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 31, '1971-01-17');
INSERT INTO `data_pegawai` VALUES ('3273182803710001', '197103282000121001', 'Lucky Angkawidjaya R', NULL, 'dr. M.Pd', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Baru Laksana No 1 B Rt/001 Rw/003 Kel Wangunsari Kec Lembang Kab Bandung Barat', '8112228197', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 32, '1971-03-28');
INSERT INTO `data_pegawai` VALUES ('3273202608720002', '197208282005011001', 'Alit Rahma', NULL, 'M.Pd', NULL, NULL, 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Sariwates Raya No 17 Rt/02 Rw/014 Kel Antapani Kidul Kec Antapani', '81314597998', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 33, '1972-08-26');
INSERT INTO `data_pegawai` VALUES ('3273072203750002', '197503222008011005', 'Sufyar Mudjianto', NULL, 'M.Pd', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl. Cibarengkok No 224/182C Rt/01 Rw/010 Kel Skabungah Kec Sukajadi ', '81322600039', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 34, '1975-03-25');
INSERT INTO `data_pegawai` VALUES ('3278040208760005', '197608022005011002', 'Jajat Darajat KN', NULL, 'M.Kes', NULL, NULL, 'Tasikmalaya', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Perum Peuri Kemuning B-10 Rt/005 Rw/006 Kel Panyingkiran Kec Indihiang Kota Tasikmalaya', '811220887', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 35, '1976-08-02');
INSERT INTO `data_pegawai` VALUES ('3273221510760002', '197610152008011000', 'Ikbal Gentar Alam', NULL, 'dr.  Sp.G.K., M.Kes', NULL, NULL, 'Palembang', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Cipaganti Graha I THP 3 No. 77 Rt/013 Rw/011 Kel Margasari Kec Buah Batu ', '87822998622', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 36, '1976-10-15');
INSERT INTO `data_pegawai` VALUES ('3273152812790001', '197912282005011002', 'Helmy Firmansyah', 'Dr. ', 'M.Pd', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 37, '1979-12-28');
INSERT INTO `data_pegawai` VALUES ('3277026203820011', '198203222008012006', 'Kurnia Eka Wijayanti', NULL, 'dr. M.KM', NULL, '22038202', 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'KP. Paniisan No 17 B Rt/002 Rw/001 Kel Cigugur Tengah Kec Cimahi Tengah', NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 38, '1982-03-22');
INSERT INTO `data_pegawai` VALUES ('3273300305860003', '198605032015041001', 'Asep Sumpena', NULL, 'S.Pd., M.Pd', NULL, NULL, 'Bandung ', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Cicabe Gg. H.Durahim Rt/006 Rw/003 Kel Jatihandap Kec Mandalajati Kota Bandung', '8562154899', NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 39, '1986-05-03');
INSERT INTO `data_pegawai` VALUES ('3204082908890000', '198908292019031012', 'Reshandi Nugraha', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 40, NULL);
INSERT INTO `data_pegawai` VALUES ('3204932506820001', '920200119820625101', 'Teten Hidayat', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 41, NULL);
INSERT INTO `data_pegawai` VALUES ('3277034810820044', '920200119821008201', 'Tri Martini', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 42, NULL);
INSERT INTO `data_pegawai` VALUES ('3204371508840001', '920200119840815101', 'Agus Gumilar', NULL, 'S.Si., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 43, NULL);
INSERT INTO `data_pegawai` VALUES ('3204321811880006', '920200119881118101', 'Burhan Hambali', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 44, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020150219880410101', 'Salman', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 2, 1, NULL, NULL, NULL, 45, NULL);
INSERT INTO `data_pegawai` VALUES ('3273202006580004', '195806201986011002', 'Andi Suntoda', 'Drs. ', 'M.Pd', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Probolinggo No 8 Rt/003 Rw/008 Kel Antapani Kidul Kec Antapani', NULL, NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 46, '1958-06-20');
INSERT INTO `data_pegawai` VALUES ('3277032408630002', '196308241989031002', 'Agus Mahendra', 'Dr. ', 'MA.', NULL, NULL, 'Martapura', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Puri Cipageran Indah 2 E-6 No 3 Rt/004 Rw/001 Kel Tanimulya Kec Ngamprah', NULL, NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 47, '1963-08-24');
INSERT INTO `data_pegawai` VALUES ('3211180709740004', '197409072001121001', 'Didin Budiman', NULL, 'M.Pd.', NULL, NULL, 'Majalengka ', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'DSN.kebon Kalapa Rt/001 Rw/002 Kel Margamukti Kec Sumdang Utara', '81322496171', NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 48, '1974-09-07');
INSERT INTO `data_pegawai` VALUES ('3273012203820002', '197508122009121000', 'Gano Sumarno', NULL, 'S.Si., M.Pd', NULL, NULL, 'Sumedang', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Sarijadi Flat E/ 11 No 12 Rt/005 Rw/005 Kel Sarijadi Kec Sukasari', '82130211927', NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 49, '1982-03-22');
INSERT INTO `data_pegawai` VALUES ('3204251208750032', '197508122009121004', 'Lukmannul Haqim Lubay', NULL, 'M.Pd', NULL, NULL, 'Cimahi', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Perum Padasuka Ideal Residence Blok D-2 No 10 Kel Cimenyan Kec Cimenyan Kab Bandung', '81573314413', NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 50, '1975-08-18');
INSERT INTO `data_pegawai` VALUES ('3273140603760002', '197603082005011001', 'Suherman Slamet', NULL, 'M.Pd', NULL, NULL, 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Padasuka No 206 Rt/001 Rw/002 Kel Pasirlayang Kec Cibeunying Kidul', '81321897176', NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 51, '1976-03-06');
INSERT INTO `data_pegawai` VALUES ('3208131807860003', '197608022005011002n', 'Ricky Wibowo', NULL, 'S.Pd., M.Pd', NULL, NULL, 'Palembang', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Sukanegla Rt/001 Rw/001 Kel Antapani Kulon Kec Antapani', '87724288051', NULL, '65 tahun', 3, 1, NULL, NULL, '2020-11-27 14:55:21', 52, '1986-07-18');
INSERT INTO `data_pegawai` VALUES ('3211142906770002', '197706292002121002', 'Dian Budiana', 'Dr.H. ', 'M.Pd.', NULL, NULL, 'Sumedang', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Dusun Manambaya Rt/03 Rw/07 kel Sindangpakulon Kec Cimanggung ', NULL, NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 53, '1977-06-29');
INSERT INTO `data_pegawai` VALUES ('3217086107900004', '199007212018032001', 'Wulandari Putri', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 54, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920171219890917201', 'Mesa Rahmi Stephani', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 3, 1, NULL, NULL, NULL, 55, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020100619850320101', 'Widi Kusumah,', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 56, NULL);
INSERT INTO `data_pegawai` VALUES ('3273262811560002', '195611281986031004', 'Basiran', 'Drs. ', 'M.Pd.', NULL, '28115609', 'Kebumen', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Sukup No 36 Rt/002 Rw/001 Kel Cigending Kec Ujung Berung ', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 57, '1956-11-20');
INSERT INTO `data_pegawai` VALUES ('3204071701580001', '195801171989031001', 'Dadan Mulyana,', 'Drs. ', 'M.Pd.', NULL, '17015801', 'Bandung', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Jl Jati Luhur V Blok D No 201 Rt/005 Rw/011 Kel Jati Endah Kec Cilengkrang', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 58, '1958-01-17');
INSERT INTO `data_pegawai` VALUES ('3204072110580002', '195810211985031002', 'Ucup Yusuf,', 'Dr.', 'M.Kes.', NULL, '21105802', 'Karawang', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'jl. Pasirjati III A. 11 Rt/Rw 02/05 Jati Endah Cilangkrang Kab. Bandung Jawa Barat ', '81221497346', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 59, '1958-10-21');
INSERT INTO `data_pegawai` VALUES ('3277011301620011', '196001131987031002', 'Hadi Sartono', 'Drs.H. ', 'M.Pd.', NULL, '13016010', 'Karawang', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl. Rorojongrang Raya B1 NO 12 Rt/003 Rw/036 Kel/Melong Kec/Cimahi Selatan ', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 60, '1962-01-13');
INSERT INTO `data_pegawai` VALUES ('3217022505610002', '196105251986011002', 'Kardjono', 'Dr. ', 'M.Sc.', NULL, '25056108', 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Dipalaya I NO 4 A Rt/05 Rw/06 Kel Ciwaruga Kec Parongpong ', '8122175987', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 61, '1961-05-25');
INSERT INTO `data_pegawai` VALUES ('3273245305320007', '196205131986022001', 'Berliana, ', 'Dr.', 'M.Pd.', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 62, NULL);
INSERT INTO `data_pegawai` VALUES ('3273202509106355', '196210231989031001', 'R. Boyke Mulyana', 'Dr.H. ', 'M.Pd.', NULL, '23106206', 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Komp. Mitra Dago Parahyangan I-10 Rt/005 Rw/011 Kel Antapani wetan Kec Natapani', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 63, '1962-10-23');
INSERT INTO `data_pegawai` VALUES ('3277020912630007', '196312091988031001', 'Dede Rohmat N', 'Drs.H. ', 'M.Pd.', NULL, '9126305', 'Sumedang', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Kopm Pemda Blok U No 45 Rt/002 Rw/021 Kel Padasuka Kec Cimahi Tengah', '8122125547', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 64, '1963-12-09');
INSERT INTO `data_pegawai` VALUES ('3217015512640006', '196412151989012001', 'Nina Sutresna', 'Dr.', 'M.Pd.', NULL, '15126407', 'Garut', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Bumi Panyileukan G IX No. 4 Rt/004 Rw/006 Kel/Cipadung Kidul Kec/Panyileukan', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 65, '1964-12-15');
INSERT INTO `data_pegawai` VALUES ('3217011710650003', '196510171992031002', 'Yadi Sunaryadi', 'Drs.', 'M.Pd.', NULL, '17106505', 'Jakarta', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'KP. Sukamaju Timur Rt/002 Rw/007 Kel Kayuambon Kec Lembang', '81320080754', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 66, '1965-10-17');
INSERT INTO `data_pegawai` VALUES ('3273161812680004', '196812181994021001', 'Dikdik Jafar Sidik', 'Dr.H. ', 'M.Pd.', NULL, '18126801', 'Cianjur', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Babakan Tangsi no. 22/208 Rt/001 Rw/006 Kel Cicaheum Kec Kiaracondong', '8158744617', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 67, '1968-12-18');
INSERT INTO `data_pegawai` VALUES ('3204072807690002', '196907282001121001', 'Bambang Erawan', NULL, 'M.Pd.', NULL, '28076903', 'Bekasi', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Cibatu Mulya V No 11 Blok H2 Komp, Pasir Jati Rt/01 Rw/18 Kel Jatiendah Kec Cilengkrang', '818632160', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 68, '1969-07-28');
INSERT INTO `data_pegawai` VALUES ('3273071311690001', '196911132001121001', 'Sagitarius', NULL, 'M.Pd.', NULL, '13116902', 'Nganjuk', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Sukagalih GG Mandalika No 14 Rt/004 Rw/007 Kel Cipedes Kec Sukajadi', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 69, '1969-11-13');
INSERT INTO `data_pegawai` VALUES ('3211150408710006', '197108041998021001', 'Mulyana', 'Dr.', 'M.Pd.', NULL, '4087101', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Perum IKOPIN Blok H No A.96 Rt/007 Rw/004 Kel Sayang Kec Jatinangor ', '81320052175', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 70, '1971-06-04');
INSERT INTO `data_pegawai` VALUES ('3204050304720003', '197204031999031003', 'Komarudin', 'Dr. ', 'M.Pd.', NULL, '3047202', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Griya Bukit Mamglayang Jl kantil No 1 Rt/03 Rw/021 Kel Cinunuk Kec Cileunyi', NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 71, '1972-04-03');
INSERT INTO `data_pegawai` VALUES ('3277032812760016', '197612282008121002', 'Alen Rismayadi', NULL, 'M.Pd', NULL, '28127604', 'Tasikmalaya', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Jl. Encep Kartawaria KP Cempaka No 72 Rt/06 Rw/015 Kel Citereup Kec Cimahi Utara ', '81321379363', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 72, '1976-12-18');
INSERT INTO `data_pegawai` VALUES ('3327120510780005', '197810052009121003', 'Muhamad Tafaqur', NULL, 'M.Pd', NULL, '5107810', 'Pemalang ', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Lowa Rt/05 Rw/03 Kel Lowa Kec Comal', '81548833899', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 73, '1979-10-05');
INSERT INTO `data_pegawai` VALUES ('3273066608790001', '197908262010122003', 'Pipit Pitriani', NULL, 'dr. M.Kes., Ph.D', NULL, '0026087907', 'Bandung', NULL, 'Wanita ', NULL, NULL, 'PNS', 'Dosen', 'Jl. Suparmin No.09 Pajajaran Cicendo Bandung', '8121410140', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 74, '1979-08-26');
INSERT INTO `data_pegawai` VALUES ('3273114707810001', '198107072008122002', 'Ira Purnamasari M.N', NULL, 'M.Pd', NULL, NULL, 'Bandung', NULL, ' Wanita ', NULL, NULL, 'PNS', 'Dosen', 'Jl. Pasundan No. 95/18B Rt/03 Rw/04 Kel Balong Gede Kec Regol', '8122126463', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 75, '1981-07-07');
INSERT INTO `data_pegawai` VALUES ('3273262407820008', '198207242014041001', 'Mochamad Yamin Saputra', NULL, 'M.Pd', NULL, '  ', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Komp Pasanggrahan Indah Blok 21 No 22 Rt/05 Rw/014', '81322093015', NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 76, '1982-07-24');
INSERT INTO `data_pegawai` VALUES ('3277020511860001', '920171219861105101', 'Yudi Nurcahya', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 77, NULL);
INSERT INTO `data_pegawai` VALUES ('3204052009790010', '920200119790920101', 'Yopi Kusdinar', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 78, NULL);
INSERT INTO `data_pegawai` VALUES ('3273200908880003', '920200119880809101', 'Ridha Mustaqim', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 79, NULL);
INSERT INTO `data_pegawai` VALUES ('3208091110930009', '920200119931011101', 'Patriana Nurmansyah Awwaludin', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 4, 1, NULL, NULL, NULL, 80, NULL);
INSERT INTO `data_pegawai` VALUES ('3273141101530001', '195301111980031002', 'Nurlan Kusmaedi', 'Prof. Dr. H. ', 'M.Pd.', NULL, '11015303', 'Kuningan', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Pasirlayung Sel. II No, 2/A-63 Rt/004 Rw/002 Kel Pasirlayung Kec Cibeunying Kidul Bandung', '8156063407', NULL, '70 tahun', 5, 1, NULL, NULL, NULL, 81, '1953-01-11');
INSERT INTO `data_pegawai` VALUES ('3217020411590001', '195911041986011001', 'Badruzaman', 'Drs.H. ', 'M.Pd', NULL, '4115907', 'Ciamis ', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Komp Cihanjuang Indah A 15 Rt/006 Rw/001 Kel Cihanjuang Kec Parongpong Bandung Barat', '8122327487', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 82, '1959-11-04');
INSERT INTO `data_pegawai` VALUES ('3273196012590001', '195912201987032001', 'Surdiniaty Ugelta', 'Dr. ', 'Mkes', NULL, '20125913', 'Padang', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl. Kebon Sirih No.1458/58 Rt/004 Rw/008 Kel Babakan Ciamis Kec Sumur Bandung', '8122396534', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 83, '1959-12-20');
INSERT INTO `data_pegawai` VALUES ('3273301809600001', '196009181986031003', 'Herman Subarjah', 'Prof.Dr. ', 'M.Si.', NULL, '18096008', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl. Sukaasih III No 19 Rt/004 Rw/007 Kel Sindang Jaya Kec Mandalajati Kota Bandung', '811215101', NULL, '70 tahun', 5, 1, NULL, NULL, NULL, 84, '1960-09-18');
INSERT INTO `data_pegawai` VALUES ('3277012212620013', '196212221987031002', 'Sumardiyanto', 'Drs.H. ', 'M.Pd', NULL, '22126208', 'Gorontalo', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Margahayu raya Barat K II No 121 Rt.004 Rw/008 Kel Sekejati Kec Buah Batu Kota Bandung', '8156263123', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 85, '1962-12-22');
INSERT INTO `data_pegawai` VALUES ('3217061203630004', '196303121989011002', 'Yudha M.Saputra', 'Prof. Dr. H. ', 'M.Ed', NULL, '12036311', 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', NULL, '8121492782', NULL, '70 tahun', 5, 1, NULL, NULL, NULL, 86, '1963-03-12');
INSERT INTO `data_pegawai` VALUES ('3277031806630009', '196306181988031002', 'Adang Suherman', 'Prof. Dr. H. ', 'MA', NULL, '18066307', 'Cianjur', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Puri Cipageran Indah I Blok E 130 A RT/001 Rw/024 Kel Cipageran Kec Cimahi Utara Kota Cimahi', '8157136138', NULL, '70 tahun', 5, 1, NULL, NULL, NULL, 87, '1963-06-18');
INSERT INTO `data_pegawai` VALUES ('3217014711630009', '196311071988032002', 'Yati Ruhayati', 'Dra.Hj.', 'M.Pd', NULL, '7116312', 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Kp Sukamantri Rt/005 Rw/006 Kel Lembang Kec Lembang Bandung Barat', '82118356700', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 88, '1963-11-07');
INSERT INTO `data_pegawai` VALUES ('3273146012680009', '196812201998022001', 'Mustika Fitri', NULL, 'M.Pd., Ph.D', NULL, '20126804', 'Aceh Barat', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl Sukarajin II No 28 Rt/001 Rw/012 Kel Cikutra Kec Cibeunying Kidul Kota Bandung', '81214699638', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 89, '1968-12-20');
INSERT INTO `data_pegawai` VALUES ('3273010211700006', '197011022000121001', 'Hamidie Ronald Daniel Ray', 'dr. ', 'M.Pd., Ph.D', NULL, '2117007', 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Sersan Bajuri No 3-A Rt/01 Rw/04 Kel Isola Kec Sukasari Kota Bandung', '87722518230', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 90, '1970-11-02');
INSERT INTO `data_pegawai` VALUES ('3273121008750009', '197508102001121001', 'Iman Imanudin', NULL, 'M.Pd.', NULL, '10087505', 'Kuningan', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'Jl Sariwates Indah IVV No.22 Rt/004 Rw/013 Kel Antapani Kidul Kec Antapani Bandung', '81224785900', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 91, '1975-08-10');
INSERT INTO `data_pegawai` VALUES ('3273011208760001', '197608122001121001', 'Agus Rusdiana', NULL, 'MA., Ph.D', NULL, '12087605', 'Tasikmalaya ', NULL, 'Pria ', NULL, NULL, 'PNS', 'Dosen', 'JL Sersan Bajuri No 6 Rt/002 Rw/004 Kel Isola Kec Sukasari Kota Bandung ', '82126270198', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 92, '1976-08-12');
INSERT INTO `data_pegawai` VALUES ('3273062703800003', '198003272005011005', 'Ahmad Hamidi, ', 'Dr. ', 'M.Pd', NULL, '27038004', NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 93, NULL);
INSERT INTO `data_pegawai` VALUES ('3273016107800002', '198007212006042001', 'Imas Damayanti', 'Dr. ', 'dr. M.Kes', NULL, '21078004', 'Palembang', NULL, 'Wanita ', NULL, NULL, 'PNS', 'Dosen', 'Jl. Rukun No.110  A Rt/008 Rw/02 Kel Gegerkalong Kec Sukasari Kota Bandung', '85216134032', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 94, '1980-07-21');
INSERT INTO `data_pegawai` VALUES ('3273215910810001', '198110192003122001', 'Nur Indri Rahayu', 'Dr. ', 'S.Pd., M.Ed', NULL, '19108101', 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl H.Bardan III D No 21 Rt/005 Rw/004 Kel Kujangsaro Kec Bandung Kidul', '8156043491', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 95, '1981-10-19');
INSERT INTO `data_pegawai` VALUES ('3217011804820033', '198204182009121004', 'Sandey Tantra Paramitha', 'Dr. ', 'M.Pd', NULL, '18048205', 'Blora', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Kp. Sukamaju No 100 Rt/02 Rw/07 Ds Kayuambon Kec Lembang Kab Bandung Barat', '81329726699', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 96, '1982-04-18');
INSERT INTO `data_pegawai` VALUES ('3205011405890005', '198805142015041001', 'Kuston Sultoni', NULL, 'S.Si., M.Pd', NULL, NULL, 'Garut', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Kp. Kondang Rege Rt/002 Rw/014 Kel Regol Kec Garut Kota Garut', '85721567927', NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 97, '1988-05-14');
INSERT INTO `data_pegawai` VALUES ('3273082905810002', '920200119810529101', 'Jajat', NULL, 'S.Si., M.Pd.', NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', NULL, NULL, NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 98, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920200119810601101', 'Mohammad Zaky', 'Dr. ', 'M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 99, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920200119811212102', 'Unun Umaran', NULL, 'S.Si., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 100, NULL);
INSERT INTO `data_pegawai` VALUES ('3273192806820001', '920200119820628101', 'Syam Hardwis', NULL, 'S.Si., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 5, 1, NULL, NULL, NULL, 101, NULL);
INSERT INTO `data_pegawai` VALUES ('3273224802880001', '920190219880208201', 'Mona Fiametta Febrianty', NULL, 'S.Pd., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 6, 1, NULL, NULL, NULL, 102, NULL);
INSERT INTO `data_pegawai` VALUES ('3204062205910001 ', '920190219910522101', 'Dery Rimasa', NULL, 'M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 6, 1, NULL, NULL, NULL, 103, NULL);
INSERT INTO `data_pegawai` VALUES ('3217101112910009', '920190219911211101', 'Angga M Syahid', NULL, 'S.Si., M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 6, 1, NULL, NULL, NULL, 104, NULL);
INSERT INTO `data_pegawai` VALUES ('3273202111920002', '920190219921121101', 'Novrizal Achmad Novan', NULL, 'M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 6, 1, NULL, NULL, NULL, 105, NULL);
INSERT INTO `data_pegawai` VALUES ('3217086603930008', '920190219930326201', 'Fitri Rosdiana', NULL, 'M.Pd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 6, 1, NULL, NULL, NULL, 106, NULL);
INSERT INTO `data_pegawai` VALUES ('3217024108840010', '920190219840801201', 'Syifa F. Syihab', 'Dr.', 'M.Si.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 7, 1, NULL, NULL, NULL, 107, NULL);
INSERT INTO `data_pegawai` VALUES ('3319014802860000', '920190219860208101', 'Isti Kumalasari', NULL, 'S.Gz., M.KM.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 7, 1, NULL, NULL, NULL, 108, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920190219891113201', 'Ayu Mutiara Santanu', NULL, 'M.K.M.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 7, 1, NULL, NULL, NULL, 109, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920190219910416201', 'Asti Dewi Rahayu Fitrianingsih', NULL, 'M.K.M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 7, 1, NULL, NULL, NULL, 110, NULL);
INSERT INTO `data_pegawai` VALUES ('3203275603680000', '196803161992032004', 'Linda Amalia', 'Dr. ', 'S.Kp., M.KM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 111, NULL);
INSERT INTO `data_pegawai` VALUES ('3204056501750013', '197501252014042001', 'Upik Rahmi', NULL, 'M.Kep', NULL, NULL, 'Bukit Tinggi', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Komplek Bumi Harapan Cibitu CC 10 No.23 Rt/003 Rw/011 Kel Cibiruhilir Kec Cileunyi ', '81279007754', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 112, '1975-01-25');
INSERT INTO `data_pegawai` VALUES ('3212150811760002', '197611082001121005', 'Slamet Rohaedi', NULL, 'S.Kep., M.PH', NULL, NULL, 'Indramayu', NULL, 'Pria', NULL, NULL, 'PNS', 'Dosen', 'Jl Gunung Semeru Rt/04 Rw/08 Kel Margadadi Kec Indramayu Kota indramayu', NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 113, '1976-11-08');
INSERT INTO `data_pegawai` VALUES ('3211256507800001', '198002252015042001', 'Sri Sumartini', NULL, 'S.Kep., M.Kep', NULL, NULL, 'Bogor', NULL, 'Wanita', NULL, NULL, NULL, 'Dosen', 'Dusun UjungJaya Rt/002 Rw/001 Kel UjungJaya Kec UjungJaya Sumedang', '81220996363', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 114, '1960-02-25');
INSERT INTO `data_pegawai` VALUES ('3273016807800003', '198007282010122002', 'Afianti Sulastri', NULL, 'S.Si., Apt., M.Pd', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl Gegerkalong Tengah No 97 Rt/006 Rw/003 Kel Gegerkalong Kec Suaksari Kota Bandung', '85624187862', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 115, '1980-07-28');
INSERT INTO `data_pegawai` VALUES ('3277015409800021', '198009142015042001', 'Septian Andriyani', NULL, 'S.Kep., M.Kep', NULL, NULL, 'Tasikmalaya ', NULL, 'Wanita ', NULL, NULL, NULL, 'Dosen', 'Graha Kencana Resident C-28 Rt/003 Rw/013 Kel Cibeber Kec Cimahi Selatan Kota Cimahi', '81322908808', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 116, '1980-09-14');
INSERT INTO `data_pegawai` VALUES ('3273256202820002', '198202222012122003', 'Lisna Anisa Fitriana', NULL, 'S.Kep., M.Kes', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Kebonterong Rt/001 Rw/003 Kel Pasirbiru Kec Cibiru Kota Bandung', '81572499187', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 117, '1982-02-22');
INSERT INTO `data_pegawai` VALUES ('3273234406840007', '198406042012122001', 'Suci Tuty Putri', NULL, 'S.Kep., M.Kep', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Dosen', 'Jl. Manjahlega No 44-A Rt/005 Rw/012 Kel Manjahlega Kec Rancasari Kota Bandung', '85324756752', NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 118, '1964-06-04');
INSERT INTO `data_pegawai` VALUES ('', '920160119771001101', 'Budi Somantri', NULL, 'S.Kep., Ners., M.Kep.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 119, NULL);
INSERT INTO `data_pegawai` VALUES ('3202310501880002', '920160119880105101', 'Tirta Adikusuma Suparto', NULL, 'S.Kep., Ners., M.Kep.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 120, NULL);
INSERT INTO `data_pegawai` VALUES ('3205051904880004', '920200119880419101', 'Sehabudin Salasa', NULL, 'S.Kep., Ners., M.Kep.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 121, NULL);
INSERT INTO `data_pegawai` VALUES ('3273266305900003', '920200119900523201', 'Asih Purwandari Wahyoe Puspita', NULL, 'S.Kep., Ners., M.Kep.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dosen', NULL, NULL, NULL, '65 tahun', 8, 1, NULL, NULL, NULL, 122, NULL);
INSERT INTO `data_pegawai` VALUES ('3217024606690005', '196906051994032001', 'Rohayati', 'Dra.', 'M.M.', NULL, NULL, 'Sumedang', NULL, 'Wanita', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Jl. H Mukti II No 45 Cibaligo Rt/008 Rw/001 Kel Cihanjuang Kec Parompong Kab Bandung barat ', NULL, NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 123, NULL);
INSERT INTO `data_pegawai` VALUES ('', '196410021987031016', 'Akub Saputra', NULL, 'S.Pd.', NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Bumi Rancaekek Kencana Jl. Suplir I No.52 Blok V  Ds. Rancaekek Kencana, Kec. Rancaekek Kab. Bandung', '08562135330', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 124, NULL);
INSERT INTO `data_pegawai` VALUES ('3273262712660001', '196612271987011001', 'Suparman', 'Drs. ', NULL, NULL, NULL, 'Sumedang', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Manglayang Sari A 9A No 18 RT/002 RW/013 Kelurahan Palsari Kec Cibitu Kota Bandung ', '081223777664', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 125, NULL);
INSERT INTO `data_pegawai` VALUES ('3204281108660001', '196608111989031001', 'Uman Rusmana', NULL, 'S.Pd.', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Jl. Cempaka IX No.11 Blok 6 Bumu Rancaekek Kencana', '081321111589', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 126, NULL);
INSERT INTO `data_pegawai` VALUES ('3273141203660007', '196603121987031002', 'Darsono', NULL, 'S.Pd.', NULL, NULL, 'Purwerjo', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'JL.Bbk.H.Tamim Rt/004 Rw/013 Kel Padasuka Kec Cibeunying Kidul Kota Bandung', '085220801517', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 127, NULL);
INSERT INTO `data_pegawai` VALUES ('3273186506640002', '196406251987032001', 'N. Ikah Sukaesih', NULL, 'S.Pd.', NULL, NULL, 'Sumedang', NULL, 'Wanita', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Bojong Mekar Rt/006 Rw/015 Kel Cigadung Kec Cibeunying Kaler Kota Bandung ', NULL, NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 128, NULL);
INSERT INTO `data_pegawai` VALUES ('3204092303700003', '197003231993031004', 'Eko Sumartojo', NULL, NULL, NULL, NULL, 'Banyumas ', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Margahayu Kencana B 8 No 9 RT/005 RW/014 Kel Margahayu Selatan Kec Margahayu Kota Bandung', '08156269303', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 129, NULL);
INSERT INTO `data_pegawai` VALUES ('320444100665004', '196506101987031002', 'Telvis Aristo', NULL, NULL, NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Sanggar Indah Banjaran, F2 No.37 Rt/007 Rw/006 Kel Nagreg Kec Cangkuang', '085315069124', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 130, NULL);
INSERT INTO `data_pegawai` VALUES ('3204061711620003', '196211171992031001', 'Supardi Sarmodiredjo', NULL, NULL, NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Bojong Kagor Rt/001 Rw/001 Kel Cibeunying Kec Cimenyan Kabupaten Bandung', NULL, NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 131, NULL);
INSERT INTO `data_pegawai` VALUES ('', '196710261989031002', 'Ade Suryana', NULL, NULL, NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'KP. Cidadap Girang No. 22 RT. 05 RW. 05  Kel. Ledeng Kec. Cidadap Kota Bandung 40143.', '081931396522', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 132, NULL);
INSERT INTO `data_pegawai` VALUES ('3277014102880019', '198802012010122003', 'Riesa Cahya Rivahati', NULL, 'A.Md.', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Ranvabentang Barat No.52 Rt/01 Rw/25 Kel Cibereum Kec Cimahi Selatan Kota Cimahi', '082115095995', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 133, NULL);
INSERT INTO `data_pegawai` VALUES ('3204060509620004', '196209051985031004', 'Sutarno', NULL, NULL, NULL, NULL, 'Purbalingga', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Pasir Gunting Rt/03 Rw/09 Kel Padasuka Kec Cimenyan Bandung', '085294286876', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 134, NULL);
INSERT INTO `data_pegawai` VALUES ('3204052004830001', '198304202015041001', 'Handi Kusdani', NULL, 'A.Md.', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Kp. Babakan Kinim Rt/001 Rw/015 Kel Cileunyi Kulon Kec Cileunyi ', '082117864486', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 135, NULL);
INSERT INTO `data_pegawai` VALUES ('3273022408810002', '198108242014091003', 'Eggi Gunawan Noer`K', NULL, 'A.Md.', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Jl.Gagak GG.Hasan No. 51/150A Rt/001 Rw/019 Kel SadangSerang Kec Coblong Kota Bandung', '085222497272', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 136, NULL);
INSERT INTO `data_pegawai` VALUES ('3273182502790005', '197902252014091004', 'Ryana Dede Putra', NULL, NULL, NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'Cukang Kawung RT/006 RW/013 Kel Cigadung Kec Cibeunying Kaler Kota Bandung', '085230857391', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 137, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920200119820726201', 'Yani Fitriyani', NULL, 'S.T.', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, 'PT', 'Tenaga Kependidikan', 'Jl. Cijerokaso No.56 RT.05 RW.10  Kel.Sarijadi Kec. Sukasari Kota Bandung', '085222368966', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 138, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920200119681026101', 'Muhamad Sobari', NULL, 'S.E.', NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PT', 'Tenaga Kependidikan', 'Jalan Negla Hilir No. 4 RT001 RW 005 Kel Isola Kec Sukasari Bandung 40154', '81223404794', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 139, NULL);
INSERT INTO `data_pegawai` VALUES ('3273024206630010', '920200119830502201', 'Mega Meirina Dewi Utami', NULL, 'A.Md.', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PT', 'Tenaga Kependidikan', 'Jl Gagak Gg Hasan No 51/150-A Rt/001 Rw/019', '0815622406/085294750', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 140, NULL);
INSERT INTO `data_pegawai` VALUES ('3273141903790004', '920190219790319101', 'Jaka Sintara', NULL, 'A.Md.', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PT', 'Tenaga Kependidikan', 'Pasirlayung Rt/002 Rw/001 Kel Pasirlayung Kec Cibeunying Kidul Kota Bandung', NULL, NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 141, NULL);
INSERT INTO `data_pegawai` VALUES ('', '920200119780101101', 'Deni Herdiana', NULL, NULL, NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PT', 'Tenaga Kependidikan', 'Komp. Ciparay Indah Jl. Anggrek I No.115  RT.01 RW.10 Desa Sarimahi Kecamatan Ciparay Kabupaten Bandung', '081220292061', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 142, NULL);
INSERT INTO `data_pegawai` VALUES ('3273164710830009', '020070119831007201', 'Lillah Solihat Nurjanah', NULL, 'S.A.P.', NULL, NULL, 'Bandung', NULL, 'Wanita', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Jl. Arum Sari V Rt/03 Rw/12 Kelurahan Babakan Ciparay Kecamatan Kiaracondong Kota Bandung', '082219229468', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 143, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020190419960709201', 'Melsa Puspita', NULL, 'S.E.', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Jl. Cipaku II RT.001 RW.002 Kelurahan Ledeng Kecamatan Cidadap Kota Bandung 40143', '085316778077', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 144, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020190119950317201', 'Hana Medyawicesar', NULL, 'S.Pd.', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'KP. Palayangan RT.006 RW.005 Desa Cihampelas Kecamattan Cihampelas Kab. Bandung Barat 40767', '087822347122', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 145, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020190119911015101', 'Yogi Adiputra', NULL, NULL, NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Kp. Sayuran No.99 RT.03 RW.08 Desa Cangkuang Kulon, Kecamatan Dayeuhkolot Kabupaten Bandung', '085317877486', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 146, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020180119950817101', 'Tian Kurniawan', NULL, 'S.Si.', NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Kp. Pangkalan No.45 RT.005 RW.009 Desa Sariwangi Kecamatan Parongpong Kab.Bandung Barat 40559', '087822000879', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 147, NULL);
INSERT INTO `data_pegawai` VALUES ('', '020150219930929101', 'Aditya Pratama', NULL, 'A.Md., Kep.', NULL, NULL, NULL, NULL, 'Pria', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Jl. Embah Malim No.35 RT.002 RW.018 Kelurahan Babakan Sari Kecamatan Kiaracondong Kota Bandung Jawa Barat', '082127231199', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 148, NULL);
INSERT INTO `data_pegawai` VALUES ('3273032111960002', '020200319961121101', 'Arizal Pratama', NULL, 'S.E', NULL, NULL, 'Bandung', NULL, 'Pria', NULL, NULL, 'PTT', 'Tenaga Kependidikan', 'Jl. Caringin Gg lumbung II No 53 Rt/05 Rw/03 Kel/Kec Babakan Ciparay Kota Bandung', '085523798267', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 149, NULL);
INSERT INTO `data_pegawai` VALUES ('3204320211660002', '196611021993031002', 'Gusep Nurdin', NULL, NULL, NULL, NULL, 'Bandung ', NULL, 'Pria ', NULL, NULL, 'PNS', 'Tenaga Kependidikan', 'KP. Gugumumgan Rt/02 Rw/05 Kelurahan Jelekong Kecamatan Baleendah Kabupaten Bandung', '081214917710', NULL, '58 tahun', 1, 1, NULL, NULL, NULL, 150, NULL);
INSERT INTO `data_pegawai` VALUES ('sample', '0808', 'Jerry Suparman', NULL, NULL, 'sample', 'sample', NULL, 'Islam', 'Laki-laki', 'O', 'Belum Kawin', 'CPNS', 'Dosen', 'Jl. Buah batu Bandung', '0897XXXXX', 'j_freaks45@yahoo.com', '65', 11, 1, NULL, '2020-11-16 14:08:02', '2020-11-19 14:36:58', 151, '2020-11-16');

-- ----------------------------
-- Table structure for data_pelatihan
-- ----------------------------
DROP TABLE IF EXISTS `data_pelatihan`;
CREATE TABLE `data_pelatihan`  (
  `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `namadiklat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penyelenggara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `nosertifikat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesertifikat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `jam` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pelatihan
-- ----------------------------
INSERT INTO `data_pelatihan` VALUES (1, 151, 'Diklat 123', 'Dr Rossi', '2020-11-19', 'Diklat1234567', NULL, '2020-11-19 14:00:26', '2020-11-19 14:00:26', 3);

-- ----------------------------
-- Table structure for data_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `data_pendidikan`;
CREATE TABLE `data_pendidikan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpendidikan` bigint(255) NULL DEFAULT NULL,
  `sekolah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `noijazah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fileijazah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filetranskrip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idpegawai` bigint(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pendidikan
-- ----------------------------
INSERT INTO `data_pendidikan` VALUES (1, 3, 'SMKN 4 Bandung', 'TI', NULL, '2010', '2020-11-19 13:26:08', '2020-11-19 13:26:08', 'Bandung', NULL, NULL, 151);
INSERT INTO `data_pendidikan` VALUES (2, 7, 'Universitas Pendidikan Indonesia', 'Teknik Industri', NULL, '2014', '2020-11-19 13:26:41', '2020-11-19 13:26:41', 'Bandung', NULL, NULL, 151);

-- ----------------------------
-- Table structure for data_penelitian
-- ----------------------------
DROP TABLE IF EXISTS `data_penelitian`;
CREATE TABLE `data_penelitian`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumberdana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filepenelitian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_penelitian
-- ----------------------------
INSERT INTO `data_penelitian` VALUES (1, 151, 'Penelitian Sejarah', 'PSSI', '2014', NULL, '2020-11-19 13:58:18', '2020-11-19 13:58:18');
INSERT INTO `data_penelitian` VALUES (2, 151, 'Olahraga', 'PSSI', '2020', '0808_PN_1606287630.jpg', '2020-11-25 07:00:30', '2020-11-25 07:00:30');

-- ----------------------------
-- Table structure for data_pengabdian
-- ----------------------------
DROP TABLE IF EXISTS `data_pengabdian`;
CREATE TABLE `data_pengabdian`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumberdana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filepengabdian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pengabdian
-- ----------------------------
INSERT INTO `data_pengabdian` VALUES (1, 151, 'Gurur', 'PSSI', '2019', NULL, '2020-11-19 14:01:17', '2020-11-19 14:01:17');

-- ----------------------------
-- Table structure for data_pengajuan_cuti
-- ----------------------------
DROP TABLE IF EXISTS `data_pengajuan_cuti`;
CREATE TABLE `data_pengajuan_cuti`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `masakerja` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_cuti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alasan_cuti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lama_cuti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hasil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `idunit` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `idjabatan` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `tlp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_cuti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `n2_sisa` int(3) NULL DEFAULT NULL,
  `n2_ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `n1_sisa` int(3) NULL DEFAULT NULL,
  `n1_ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `n_sisa` int(3) NULL DEFAULT NULL,
  `n_ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pertimbangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alasan_pertimbangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keputusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alasan_keputusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idatasan` bigint(20) NULL DEFAULT NULL,
  `idpejabat` bigint(20) NULL DEFAULT NULL,
  `month_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `year_number` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pengajuan_cuti
-- ----------------------------
INSERT INTO `data_pengajuan_cuti` VALUES (2, 151, '2 tahun', 'Cuti Tahunan', 'Liburan', '3 hari', '2020-11-25', '2020-11-28', 'Jl. Buah batu Bandung', NULL, '2020-11-25 07:04:25', '2020-11-27 14:24:10', 1, 1, '0897123456', '-', 1, 'sample', NULL, NULL, NULL, NULL, 'Disetujui', 'perlu liburan', 'Disetujui', 'rebahan mulu', 16, 17, 'November', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (3, 16, '20', 'Cuti Tahunan', 'Sample', '3 hari', '2020-12-12', '2020-12-12', NULL, NULL, '2020-12-12 02:25:26', '2020-12-12 02:25:26', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, 18, 22, 'December', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (4, 18, NULL, '-', NULL, NULL, '2020-12-12', '2020-12-12', NULL, NULL, '2020-12-12 02:25:41', '2020-12-12 02:25:41', 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'December', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (5, 18, NULL, '-', NULL, NULL, '2021-01-08', '2020-12-12', NULL, NULL, '2020-12-12 02:26:01', '2020-12-12 02:26:01', 7, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'January', 2021);
INSERT INTO `data_pengajuan_cuti` VALUES (6, 18, NULL, '-', NULL, NULL, '2020-12-12', '2020-12-12', NULL, NULL, '2020-12-12 03:53:24', '2020-12-12 03:53:24', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'December', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (7, 20, NULL, '-', NULL, NULL, '2020-12-12', '2020-12-12', NULL, NULL, '2020-12-12 04:13:03', '2020-12-12 04:13:03', 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'December', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (8, 19, NULL, 'Cuti Karena Alasan Penting', NULL, NULL, '2020-12-12', '2020-12-12', NULL, NULL, '2020-12-12 04:13:37', '2020-12-12 04:13:37', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'December', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (9, 17, NULL, '-', NULL, NULL, '2020-10-14', '2020-12-15', NULL, NULL, '2020-12-15 10:00:24', '2020-12-15 10:00:24', 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'October', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (10, 18, NULL, '-', NULL, NULL, '2020-10-13', '2020-12-15', NULL, NULL, '2020-12-15 10:00:45', '2020-12-15 10:00:45', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'October', 2020);
INSERT INTO `data_pengajuan_cuti` VALUES (12, 17, NULL, '-', NULL, NULL, '2020-09-02', '2020-12-15', NULL, NULL, '2020-12-15 23:08:50', '2020-12-15 23:08:50', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, '-', NULL, NULL, NULL, 'September', 2020);

-- ----------------------------
-- Table structure for data_pengajuan_kbg
-- ----------------------------
DROP TABLE IF EXISTS `data_pengajuan_kbg`;
CREATE TABLE `data_pengajuan_kbg`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NOT NULL,
  `tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gajilama` bigint(255) NULL DEFAULT NULL,
  `pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `tglberlaku` date NULL DEFAULT NULL,
  `masatgl` date NULL DEFAULT NULL,
  `gajibaru` bigint(255) NULL DEFAULT NULL,
  `masakerja` date NULL DEFAULT NULL,
  `idpangkatbaru` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `mulaitgl` date NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `nomor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idjabatanlama` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `idpangkatlama` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `iddekan` bigint(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_pengajuan_kbg
-- ----------------------------
INSERT INTO `data_pengajuan_kbg` VALUES (2, 151, 'Bandung', 2000000, 'Bpk Budi', '2020-11-25', '2020-11-25', '2020-11-25', 3000000, '2020-11-25', 2, '2020-11-25', 'Sample', '2020-11-25 07:16:02', '2020-11-25 07:16:02', '123365', 1, 1, 16);

-- ----------------------------
-- Table structure for data_penghargaan
-- ----------------------------
DROP TABLE IF EXISTS `data_penghargaan`;
CREATE TABLE `data_penghargaan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `penghargaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_penghargaan
-- ----------------------------
INSERT INTO `data_penghargaan` VALUES (1, 151, 'Best Of', 'Singapura', '2020', NULL, '2020-11-19 14:14:45', '2020-11-19 14:14:45');

-- ----------------------------
-- Table structure for data_penugasan
-- ----------------------------
DROP TABLE IF EXISTS `data_penugasan`;
CREATE TABLE `data_penugasan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) UNSIGNED NULL DEFAULT NULL,
  `tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nosurat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `lama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_penugasan
-- ----------------------------
INSERT INTO `data_penugasan` VALUES (1, 151, 'Dubai', 'Tugas123', '2020-11-19', NULL, '2020-11-19 14:15:41', '2020-11-19 14:15:41', '7 Hari');

-- ----------------------------
-- Table structure for data_peraturan
-- ----------------------------
DROP TABLE IF EXISTS `data_peraturan`;
CREATE TABLE `data_peraturan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tentang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for data_skp
-- ----------------------------
DROP TABLE IF EXISTS `data_skp`;
CREATE TABLE `data_skp`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `tahun` date NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_skp
-- ----------------------------
INSERT INTO `data_skp` VALUES (4, 151, '2020-11-25', '0808_SKP_1606288790.jpg', '2020-11-25 07:19:50', '2020-11-25 07:19:50');

-- ----------------------------
-- Table structure for data_struktural
-- ----------------------------
DROP TABLE IF EXISTS `data_struktural`;
CREATE TABLE `data_struktural`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(10) NULL DEFAULT NULL,
  `idstruktural` bigint(10) NULL DEFAULT NULL,
  `sk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `filesk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `tmt2` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_struktural
-- ----------------------------
INSERT INTO `data_struktural` VALUES (1, 151, 2, 'SK-1234567', '2020-11-19', NULL, '2020-11-19 13:32:01', '2020-11-19 13:32:01', '2020-11-19', '2020-11-19');

-- ----------------------------
-- Table structure for data_study
-- ----------------------------
DROP TABLE IF EXISTS `data_study`;
CREATE TABLE `data_study`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpegawai` bigint(255) UNSIGNED NULL DEFAULT NULL,
  `tingkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perguruan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `negara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_dokumen_ibfk_1`(`idpegawai`) USING BTREE,
  CONSTRAINT `data_study_ibfk_1` FOREIGN KEY (`idpegawai`) REFERENCES `data_pegawai` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_study
-- ----------------------------
INSERT INTO `data_study` VALUES (1, 151, 'Magister', 'UPI', 'Farmasi', '2020', '2020-11-19 14:16:31', '2020-11-19 14:16:31', 'Indonesia');

-- ----------------------------
-- Table structure for jabatan_fungsional
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_fungsional`;
CREATE TABLE `jabatan_fungsional`  (
  `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan_fungsional
-- ----------------------------
INSERT INTO `jabatan_fungsional` VALUES (1, 'Pengajar', NULL, '2020-11-25 06:48:04');
INSERT INTO `jabatan_fungsional` VALUES (2, 'Asisten Ahli', NULL, '2020-09-22 15:07:43');
INSERT INTO `jabatan_fungsional` VALUES (3, 'Lektor', '2020-09-19 04:22:39', '2020-09-22 15:07:58');
INSERT INTO `jabatan_fungsional` VALUES (4, 'Lektor Kepala', '2020-09-20 03:20:41', '2020-09-22 15:08:14');
INSERT INTO `jabatan_fungsional` VALUES (5, 'Guru Besar', '2020-09-20 03:21:58', '2020-09-22 15:08:32');
INSERT INTO `jabatan_fungsional` VALUES (6, 'Fungsional Umum', '2020-09-20 03:23:16', '2020-09-22 15:08:51');
INSERT INTO `jabatan_fungsional` VALUES (7, 'Fungsional Tertentu', '2020-09-20 04:29:52', '2020-09-22 15:09:15');

-- ----------------------------
-- Table structure for jabatan_struktural
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_struktural`;
CREATE TABLE `jabatan_struktural`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan_struktural
-- ----------------------------
INSERT INTO `jabatan_struktural` VALUES (1, 'Dekan', '2020-09-20 10:11:26', '2020-09-20 10:11:26');
INSERT INTO `jabatan_struktural` VALUES (2, 'Wakil Dekan Bidang Akademik', '2020-09-20 10:13:09', '2020-09-20 10:13:33');
INSERT INTO `jabatan_struktural` VALUES (3, 'Wakil Dekan Bidang Keuangan dan Sumber Daya', '2020-09-20 12:08:15', '2020-09-22 15:12:14');
INSERT INTO `jabatan_struktural` VALUES (4, 'Wakil Dekan Bidang Kemahasiswaan', '2020-09-22 15:12:26', '2020-09-22 15:12:26');
INSERT INTO `jabatan_struktural` VALUES (5, 'Kepala Bagian Tata Usaha', '2020-09-22 15:12:38', '2020-09-22 15:12:38');
INSERT INTO `jabatan_struktural` VALUES (6, 'Kasubbag Keuangan dan Kepegawaian', '2020-11-08 07:24:25', '2020-11-08 07:24:25');
INSERT INTO `jabatan_struktural` VALUES (7, 'Kasubbag Umum dan Perlengkapan', '2020-11-08 07:24:38', '2020-11-08 07:24:38');
INSERT INTO `jabatan_struktural` VALUES (8, 'Kasubbag Akademik dan Kemahasiswaan', '2020-11-08 07:24:49', '2020-11-08 07:24:49');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pangkat_golongan
-- ----------------------------
DROP TABLE IF EXISTS `pangkat_golongan`;
CREATE TABLE `pangkat_golongan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pangkat_golongan
-- ----------------------------
INSERT INTO `pangkat_golongan` VALUES (1, 'II A Pengatur Muda', '2020-09-20 12:09:04', '2020-09-20 12:10:19');
INSERT INTO `pangkat_golongan` VALUES (2, 'II B Pengatur Muda Tingkat 1', '2020-09-20 12:09:59', '2020-09-20 12:09:59');
INSERT INTO `pangkat_golongan` VALUES (3, 'II C Pengatur', '2020-09-22 15:13:22', '2020-09-22 15:13:22');
INSERT INTO `pangkat_golongan` VALUES (4, 'II D Pengatur Tingkat 1', '2020-09-22 15:13:33', '2020-09-22 15:13:33');
INSERT INTO `pangkat_golongan` VALUES (5, 'III A Penata Muda', '2020-11-08 07:26:20', '2020-11-08 07:26:20');
INSERT INTO `pangkat_golongan` VALUES (6, 'III B Penata Muda Tingkat 1', '2020-11-08 07:26:56', '2020-11-08 07:26:56');
INSERT INTO `pangkat_golongan` VALUES (7, 'III C Penata', '2020-11-08 07:27:07', '2020-11-08 07:27:07');
INSERT INTO `pangkat_golongan` VALUES (8, 'III D Penata Tingkat 1', '2020-11-08 07:27:17', '2020-11-08 07:27:17');
INSERT INTO `pangkat_golongan` VALUES (9, 'IV A Pembina', '2020-11-08 07:27:29', '2020-11-08 07:27:29');
INSERT INTO `pangkat_golongan` VALUES (10, 'IV B Pembina Tingkat 1', '2020-11-08 07:27:41', '2020-11-08 07:27:41');
INSERT INTO `pangkat_golongan` VALUES (11, 'IV C Pembina Utama Muda', '2020-11-08 07:27:52', '2020-11-08 07:27:52');
INSERT INTO `pangkat_golongan` VALUES (12, 'IV D Pembina Utama Madya', '2020-11-08 07:28:04', '2020-11-08 07:28:04');
INSERT INTO `pangkat_golongan` VALUES (13, 'IV E Pembina Utama', '2020-11-08 07:28:25', '2020-11-08 07:28:25');

-- ----------------------------
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES (1, 'SD', '2020-09-20 13:40:53', '2020-09-22 15:14:01');
INSERT INTO `pendidikan` VALUES (2, 'SMP', '2020-09-20 13:45:10', '2020-09-20 13:45:10');
INSERT INTO `pendidikan` VALUES (3, 'SMA / SMK', '2020-09-22 15:14:12', '2020-09-22 15:14:12');
INSERT INTO `pendidikan` VALUES (4, 'D1', '2020-09-22 15:14:21', '2020-09-22 15:14:21');
INSERT INTO `pendidikan` VALUES (5, 'D2', '2020-11-08 07:30:05', '2020-11-08 07:30:05');
INSERT INTO `pendidikan` VALUES (6, 'D3', '2020-11-08 07:30:12', '2020-11-08 07:30:12');
INSERT INTO `pendidikan` VALUES (7, 'Sarjana', '2020-11-08 07:30:19', '2020-11-08 07:30:55');
INSERT INTO `pendidikan` VALUES (8, 'Magister', '2020-11-08 07:31:05', '2020-11-08 07:31:05');
INSERT INTO `pendidikan` VALUES (9, 'Doktor', '2020-11-08 07:31:16', '2020-11-08 07:31:16');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 'Super Admin', '2020-10-30 07:25:22', '2020-10-30 07:25:22');
INSERT INTO `role_user` VALUES (2, 'Admin', '2020-10-30 07:32:12', '2020-10-30 07:32:12');
INSERT INTO `role_user` VALUES (3, 'User', '2020-10-30 07:32:25', '2020-10-30 07:32:25');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'Aktif', '2020-09-20 14:24:03', '2020-09-20 14:24:03');
INSERT INTO `status` VALUES (2, 'Pensiun', '2020-09-20 14:24:21', '2020-11-24 13:18:58');
INSERT INTO `status` VALUES (3, 'Meninggal', '2020-11-08 07:32:01', '2020-11-08 07:32:01');
INSERT INTO `status` VALUES (4, 'Mengundurkan Diri', '2020-11-08 07:32:19', '2020-11-08 07:32:19');

-- ----------------------------
-- Table structure for unit_kerja
-- ----------------------------
DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE `unit_kerja`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of unit_kerja
-- ----------------------------
INSERT INTO `unit_kerja` VALUES (1, 'Fakultas', '2020-09-20 14:42:26', '2020-09-20 14:43:34');
INSERT INTO `unit_kerja` VALUES (2, 'S1 Program Studi Pendidikan Jasmani , Kesehatan dan rekreasis', '2020-09-20 14:42:43', '2020-09-20 14:42:43');
INSERT INTO `unit_kerja` VALUES (3, 'S1 Program Studi  Pendidikan Guru Sekolah Dasar Pendidikan Jasmani', '2020-09-22 15:15:08', '2020-11-22 03:11:06');
INSERT INTO `unit_kerja` VALUES (4, 'S1 Program Studi  Pendidikan Kepelatihan Olahraga', '2020-11-08 07:34:53', '2020-11-08 07:34:53');
INSERT INTO `unit_kerja` VALUES (5, 'S1 Program Studi Keolahragaan', '2020-11-08 07:35:04', '2020-11-08 07:35:04');
INSERT INTO `unit_kerja` VALUES (6, 'S1 Program Studi Kepelatihan Fisik Olahraga', '2020-11-08 07:35:17', '2020-11-08 07:35:17');
INSERT INTO `unit_kerja` VALUES (7, 'S1 Prodi Ilmu Gizi', '2020-11-08 07:35:23', '2020-11-08 07:35:23');
INSERT INTO `unit_kerja` VALUES (8, 'D3 Prodi Keperawatan', '2020-11-08 07:35:30', '2020-11-08 07:35:30');
INSERT INTO `unit_kerja` VALUES (9, 'Subbag Keuangan dan Kepegawaian', '2020-11-08 07:35:38', '2020-11-08 07:35:38');
INSERT INTO `unit_kerja` VALUES (10, 'Subbag Umum dan Perlengkapan', '2020-11-16 13:39:59', '2020-11-16 13:39:59');
INSERT INTO `unit_kerja` VALUES (11, 'Subbag Akademik dan Kemahasiswaan', '2020-11-16 13:43:08', '2020-11-16 13:43:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `level` bigint(20) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `idpegawai` bigint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 429 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin', 'superadmin', 'admin@gmail.com', '$2y$10$ykjLpUavBG2uh2jmK0y3veqCQ.kOWhfLH19AgIz72bpWw/qLjktqS', NULL, 1, 'pQ2gudTpmJSNPQQPPaFBK01dQ49G60Pp6BGoVesLfVqiSW32S3zNvHnoDjQw', '2020-09-16 09:15:36', '2020-12-02 12:53:51', NULL);
INSERT INTO `users` VALUES (2, 'Jerry Suparman', '0808', NULL, '$2y$10$WIgikX54HxefP9FQZg4Mte.mkTVu1VRLuDpJBNvDyzSRL5cRLcyUG', NULL, 3, 'LETQLnbu7F0X1cLaEMOtNmXq5OT2gLjOqtFMHXqFlX55p7PGXwWQPmbeI1wU', '2020-11-16 14:08:02', '2020-11-25 07:40:44', 151);
INSERT INTO `users` VALUES (108, 'Admin', 'admin', NULL, '$2y$10$fP4R9MSGkUFpb2gnsmZmUO.Air4GZn3h7wjLVSQVexrl6sl18XrOm', NULL, 2, 'dc3NgilYdEivyDrU1EHgjBHMhUUdgoXU5dCsSeaUDrJa084Fj92Mm4ekSnvP', '2020-11-19 15:11:39', '2020-11-19 15:13:38', NULL);
INSERT INTO `users` VALUES (109, 'adminuser', 'adminuser', NULL, '$2y$10$qjkd/wgC6pPMLZkg0t2xVetbC4hNq9V8RS4Xhh6uu0dnyAsbNCer2', NULL, 4, 'EEn51Treg8JKzm9snntiaGjFUMV0w6F1s3mu6T6umiXuTkWhmUSMai63tsqa', '2020-11-19 15:14:15', '2020-11-19 15:14:15', NULL);
INSERT INTO `users` VALUES (295, 'Beltasar Tarigan', '195603031983031005', NULL, '$2y$10$C0yrTYAdHASoZidPvcdnoOjGQ2o7Hg2hxxPf26KSegYopEOKUl0Ay', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 16);
INSERT INTO `users` VALUES (296, 'Eka Nugraha', '195903041987031002', NULL, '$2y$10$fClsU2oHNXgMkQCjpel8a.eQVeEFBFOgB2lgIX5qNCmJkit8ON/hO', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 17);
INSERT INTO `users` VALUES (297, 'Lilis Komariyah', '195906281989012001', NULL, '$2y$10$VHOzYY2XXE.royoFFIG.0uyiZeTtNhnB.I22Kd1uwHj3k58wIWKti', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 18);
INSERT INTO `users` VALUES (298, 'Amung Ma’mun', '196001191986031002', NULL, '$2y$10$5mdz/flGzjJtLTJC4xj45eCovnXEoBLwPxIn9TTaZCoM7I04tEZ8K', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 19);
INSERT INTO `users` VALUES (299, 'Oom Rohmah', '196005181987032003', NULL, '$2y$10$NKu8RY1tH9/DElQiFfNm7uB/G7Jmp1HQGikjBFiHdx9OSDD5DTMQu', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 20);
INSERT INTO `users` VALUES (300, 'Sucipto', '196106121987031002', NULL, '$2y$10$C0PUSmE/kaiUev3prSviF.0CJzAier2A8/ZF8o8xTSGq8.LFP50Eu', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 21);
INSERT INTO `users` VALUES (301, 'Yudy Hendrayana', '196207181988031004', NULL, '$2y$10$zb3VtHXr67snysrjoJ5MWOotr5Uvc4ifhL.h8ctkWkryFVbBHTBSi', NULL, 3, NULL, '2020-11-27 14:54:02', '2020-11-27 14:54:02', 22);
INSERT INTO `users` VALUES (302, 'Toto Subroto', '196208081987031002', NULL, '$2y$10$h2/FifvCcpUkFqqD75wk2OrFTGkxE4q/YgWmYyG0l.RPoB9XTUHcC', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 23);
INSERT INTO `users` VALUES (303, 'Yunyun Yudiana', '196506141990011001', NULL, '$2y$10$1KEJQebJnVGdAcvOyNn3TewVi2d3UevUn9vX3srhc9rqKchyn/Z.q', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 24);
INSERT INTO `users` VALUES (304, 'Mudjihartono', '196508171990011001', NULL, '$2y$10$XYHjNubJEgayOQAf9y7MI.fcwQpKhmFhD/jjCGFhiDB2ZTyqHUEye', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 25);
INSERT INTO `users` VALUES (305, 'Bambang Abduljabar', '196509091991021001', NULL, '$2y$10$LGYdv1hlm1djLwPOc.VxHetKI5Fe.PMcjHWf12diMfoR3zEj.sPM6', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 26);
INSERT INTO `users` VALUES (306, 'Tite Juliantine', '196807071992032001', NULL, '$2y$10$QM7pVzcDLRPN0z6A1thcbOgLc/l40irWakLCavphD/lxBQ7psAmP2', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 27);
INSERT INTO `users` VALUES (307, 'Yusuf Hidayat', '196808301999031001', NULL, '$2y$10$yNHPWOS4/eqjLhLB741louXaaBU.Gwy4ZxJ/1mYQ4SKWLzisEaeLC', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 28);
INSERT INTO `users` VALUES (308, 'Carsiwan', '197101052002121001', NULL, '$2y$10$tVPNobSUMTR6FuYGUnDyc.hYlgYxW8cjW8v2zMDhjh90uAWyO1NCC', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 30);
INSERT INTO `users` VALUES (309, 'Nuryadi', '197101171998021001', NULL, '$2y$10$NwhIpnF8eEwTErn3JRhwuesrvP8fXgkbjOFZvyWZAw7BgUHHVwn.K', NULL, 3, NULL, '2020-11-27 14:54:03', '2020-11-27 14:54:03', 31);
INSERT INTO `users` VALUES (310, 'Lucky Angkawidjaya R', '197103282000121001', NULL, '$2y$10$qNlWH0ZErj0Qo5o0gw4aY.LggLuPh9O/SQRX2g/KTb/ypwrFewiBW', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 32);
INSERT INTO `users` VALUES (311, 'Alit Rahma', '197208282005011001', NULL, '$2y$10$yf67uLpe/kGWQs7s3tCEgep.CCvy7zTngntTwrp4WD2mFJoHzH8GW', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 33);
INSERT INTO `users` VALUES (312, 'Sufyar Mudjianto', '197503222008011005', NULL, '$2y$10$iMH.ZD78yx6pH1Fu0SLPFObmTabFe9DR6PVugWEQ7nbs81XzH26my', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 34);
INSERT INTO `users` VALUES (313, 'Jajat Darajat KN', '197608022005011002', NULL, '$2y$10$di/19p/wdR4RcR31Ue8XYOcBEWxJChF6WE15ce9oDRW25b8Vi4PNe', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 35);
INSERT INTO `users` VALUES (314, 'Ikbal Gentar Alam', '197610152008011000', NULL, '$2y$10$EEZ0W57LCfTNQExNFgGg8O/Qy876skkcK8NLtbfE36yA2AJuKnjvC', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 36);
INSERT INTO `users` VALUES (315, 'Helmy Firmansyah', '197912282005011002', NULL, '$2y$10$a5gEvr8Xvr7F2dWa2eExA.KvO0ZMDeouk1lEPY.p7O5pIpGRGclP2', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 37);
INSERT INTO `users` VALUES (316, 'Kurnia Eka Wijayanti', '198203222008012006', NULL, '$2y$10$n013autn.TL9b2btiOHRlur.XNaNmOvXBSRJt8HVe5ANpImlkIx.u', NULL, 3, NULL, '2020-11-27 14:54:04', '2020-11-27 14:54:04', 38);
INSERT INTO `users` VALUES (317, 'Asep Sumpena', '198605032015041001', NULL, '$2y$10$6QgFhv9nHZcR9WxI5po5V.EOn6qbe.3464402MqdqlbfBfQeCSdIa', NULL, 3, NULL, '2020-11-27 14:54:05', '2020-11-27 14:54:05', 39);
INSERT INTO `users` VALUES (318, 'Reshandi Nugraha', '198908292019031012', NULL, '$2y$10$R1UREHXjXzSV0IkYubExLOd815FSRyEjqO.QzjFe5S9tQRYYJGOke', NULL, 3, NULL, '2020-11-27 14:54:05', '2020-11-27 14:54:05', 40);
INSERT INTO `users` VALUES (319, 'Teten Hidayat', '920200119820625101', NULL, '$2y$10$jsjsETkGmt759BHB5PwL7uLttLH3TNbwGg9pPoRDG9uoL/JCrOv/2', NULL, 3, NULL, '2020-11-27 14:54:05', '2020-11-27 14:54:05', 41);
INSERT INTO `users` VALUES (320, 'Tri Martini', '920200119821008201', NULL, '$2y$10$bmyTRgfyJv4OOozEzhS4M.gEYsAOVHF2dJlJ2U2/6t30rVcgZz4om', NULL, 3, NULL, '2020-11-27 14:54:05', '2020-11-27 14:54:05', 42);
INSERT INTO `users` VALUES (321, 'Agus Gumilar', '920200119840815101', NULL, '$2y$10$2sFarFheM/3eiWmV.LI6WO5YJL6FLkhgKzUOl0SgxC8do/GHyt7gm', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 43);
INSERT INTO `users` VALUES (322, 'Burhan Hambali', '920200119881118101', NULL, '$2y$10$5T7CY7bHAht9GwUj5io82eF8nQubUVYyKYxKpa.z0uCPVCpnkIcuO', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 44);
INSERT INTO `users` VALUES (323, 'Salman', '020150219880410101', NULL, '$2y$10$lpmLXLjqF1aLWjb5V3nmKePOhgaAVMld1QMGW.7P3/t8ExbE5pvUC', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 45);
INSERT INTO `users` VALUES (324, 'Andi Suntoda', '195806201986011002', NULL, '$2y$10$Or7EEB7I91jfeJ3q1FGcd.dxxvsPjW8b01BW1eJX7jT6TU5l3ftua', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 46);
INSERT INTO `users` VALUES (325, 'Agus Mahendra', '196308241989031002', NULL, '$2y$10$FmtSlwPjCOm8Fh91H0c81eoBPs47c3xrQ8tWjkT8IZS1Nh4Agbsqi', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 47);
INSERT INTO `users` VALUES (326, 'Didin Budiman', '197409072001121001', NULL, '$2y$10$oZWJ9yDu/5U9.TIAWx7hUOWV5eltiZW4pEP0msUK8qj9rQpERqW8G', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 48);
INSERT INTO `users` VALUES (327, 'Gano Sumarno', '197508122009121000', NULL, '$2y$10$xTktVmYxYTZAuxNaz3xgNe5D/7EuisHAt0O6embxBPUgJ8SAFNCZS', NULL, 3, NULL, '2020-11-27 14:54:06', '2020-11-27 14:54:06', 49);
INSERT INTO `users` VALUES (328, 'Lukmannul Haqim Lubay', '197508122009121004', NULL, '$2y$10$iZD2uVLdTGoHJrlT7xRL1.SuZi7r6XKSkeUl1JSsBTdTtDvY7QUNq', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 50);
INSERT INTO `users` VALUES (329, 'Suherman Slamet', '197603082005011001', NULL, '$2y$10$7mpqC8XLHdkhYy.g1h7mM.pB45aTzEQR4NReT8dLfJPmFFm3nn2Jy', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 51);
INSERT INTO `users` VALUES (330, 'Ricky Wibowo', '197608022005011002n', NULL, '$2y$10$JNImEOfsLdktL9YjgmsgTuYPf0jwk6h5RVABwWGTEzredWhnYddie', NULL, 3, 'AFcOOCZXW34VoJ50icNZ1GcvhXiQ3PgIK1R72ggE6gKFEQz3QNhe7fzpE3r6', '2020-11-27 14:54:07', '2020-11-27 14:55:21', 52);
INSERT INTO `users` VALUES (331, 'Dian Budiana', '197706292002121002', NULL, '$2y$10$BEJxpfgKuDi0TVQ9Mapc5.BH2mSMIxBTd8ddm.ay/5ii3Tor.aZHW', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 53);
INSERT INTO `users` VALUES (332, 'Wulandari Putri', '199007212018032001', NULL, '$2y$10$ELzw4d0khTw.mbC6WPM5Y.K.feCv1Rmca6n6.ja0k.AoV2HTkIAE2', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 54);
INSERT INTO `users` VALUES (333, 'Mesa Rahmi Stephani', '920171219890917201', NULL, '$2y$10$BnYqZNcgcC.UTyZ6G7YPBOE4rEZ8u6A/cUCcv353HA.aLBwcPX0cK', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 55);
INSERT INTO `users` VALUES (334, 'Widi Kusumah,', '020100619850320101', NULL, '$2y$10$GIrwKehx25pVURXnZNy.de1Le1eTgqbsKQ1Imswi1i2R4V20Hc2u.', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 56);
INSERT INTO `users` VALUES (335, 'Basiran', '195611281986031004', NULL, '$2y$10$3x.3ABBmzd2PHTjpU3ecpO9YjSTjUCzKkNRjH5r7sdyEJDej9nWwi', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 57);
INSERT INTO `users` VALUES (336, 'Dadan Mulyana,', '195801171989031001', NULL, '$2y$10$LMJzRAbIdmQJAZK5pgVNAe6tBHupsoMoS0NwKiGzSnlg7u5A3iiaW', NULL, 3, NULL, '2020-11-27 14:54:07', '2020-11-27 14:54:07', 58);
INSERT INTO `users` VALUES (337, 'Ucup Yusuf,', '195810211985031002', NULL, '$2y$10$uHhrK.NQltB4cK4hCQeKyOW0Z22BviuzOzYoBC0y6wNSqPFRYapZ6', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 59);
INSERT INTO `users` VALUES (338, 'Hadi Sartono', '196001131987031002', NULL, '$2y$10$hAg06YuSIym.p2zWY6i7guY7TsvwwBj7CBUnKI7r7jmOBwoq9k8rS', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 60);
INSERT INTO `users` VALUES (339, 'Kardjono', '196105251986011002', NULL, '$2y$10$PR5hryBFcOqNSDvUw3rOdOUmK2xCcUVcZl1avYugzxEqmvW1Xa7SS', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 61);
INSERT INTO `users` VALUES (340, 'Berliana, ', '196205131986022001', NULL, '$2y$10$9/P5lJ57EbvVzjAez9.BnOEdVTvLZl3YNjtPI/1s0WG0Da2xbRE5m', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 62);
INSERT INTO `users` VALUES (341, 'R. Boyke Mulyana', '196210231989031001', NULL, '$2y$10$dN0L/EzkiNLmLiNv7QAWM.4W7QGe5ryguXpC8YqYujNwqFnPgPt3W', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 63);
INSERT INTO `users` VALUES (342, 'Dede Rohmat N', '196312091988031001', NULL, '$2y$10$Wap/surwG06AWJMAhG/M2uQ2SFY6PQuQix7wfPrb19pQucWxyyeq.', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 64);
INSERT INTO `users` VALUES (343, 'Nina Sutresna', '196412151989012001', NULL, '$2y$10$BM7sjpOhWQShKHyi89f9xeINbpQxxy2rvXoCnSg7WvUpZ7KAFaV9q', NULL, 3, NULL, '2020-11-27 14:54:08', '2020-11-27 14:54:08', 65);
INSERT INTO `users` VALUES (344, 'Yadi Sunaryadi', '196510171992031002', NULL, '$2y$10$BVpMaliHaej/FWm.csb3xeYj8ashbfr0K8BAYysW4AUnT3gycuQQO', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 66);
INSERT INTO `users` VALUES (345, 'Dikdik Jafar Sidik', '196812181994021001', NULL, '$2y$10$YIl25/POLeMMAnSbxrlM1.QL.31Mwp95RLyFNUbammuSAf4XOvoca', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 67);
INSERT INTO `users` VALUES (346, 'Bambang Erawan', '196907282001121001', NULL, '$2y$10$Z/4vIh1h8FYUY1wMw3ycGeNdQLd4saretYhtpI91PIk40rMinu/MC', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 68);
INSERT INTO `users` VALUES (347, 'Sagitarius', '196911132001121001', NULL, '$2y$10$0dgJgAXLbEb/DJpE/rItaOmZrarjvH4W7nyTUhOiXX8.Ngdlaj//e', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 69);
INSERT INTO `users` VALUES (348, 'Mulyana', '197108041998021001', NULL, '$2y$10$m4eMW6NE.IKQt5js.EAFB.1Hk/6Iec1WY25Bcz10JhMings1uFsHy', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 70);
INSERT INTO `users` VALUES (349, 'Komarudin', '197204031999031003', NULL, '$2y$10$C8Al1Q3isQVXj5pjtj3X9.mdgdryBQb.dSeZ2WQcLjkND2HBb.2we', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 71);
INSERT INTO `users` VALUES (350, 'Alen Rismayadi', '197612282008121002', NULL, '$2y$10$LXOpysiYUqgwUeK987ylu.PBvYz4xZ0bykXcmReI09H77kkc5VHQe', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 72);
INSERT INTO `users` VALUES (351, 'Muhamad Tafaqur', '197810052009121003', NULL, '$2y$10$gEhsgr9R.1KHmOYkRr2jcO8eu0mE3xZnLY5LU41uB7fcXVyXLm8j6', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 73);
INSERT INTO `users` VALUES (352, 'Pipit Pitriani', '197908262010122003', NULL, '$2y$10$bqX0KTKWda3b80CN3eIlCeYxqbZqZq3jun5f2Oz7fREgo.oQFAQNW', NULL, 3, NULL, '2020-11-27 14:54:09', '2020-11-27 14:54:09', 74);
INSERT INTO `users` VALUES (353, 'Ira Purnamasari M.N', '198107072008122002', NULL, '$2y$10$ZR/Sp6x1y.wlAtRWiRJ.2.0UL1.19cydMhsdtL48Uc2JbP9kKHUcC', NULL, 3, NULL, '2020-11-27 14:54:10', '2020-11-27 14:54:10', 75);
INSERT INTO `users` VALUES (354, 'Mochamad Yamin Saputra', '198207242014041001', NULL, '$2y$10$.MXjh7fUoaXop8oNBEuL6.yfq7CXnZcfjxVgxPkbtpLwC28Z3gDHa', NULL, 3, NULL, '2020-11-27 14:54:10', '2020-11-27 14:54:10', 76);
INSERT INTO `users` VALUES (355, 'Yudi Nurcahya', '920171219861105101', NULL, '$2y$10$Wq8p8bethv9WyNXr/La7a.CBnuyeAaxHeI6R8AOXEK/b.Yny1Bz3.', NULL, 3, NULL, '2020-11-27 14:54:10', '2020-11-27 14:54:10', 77);
INSERT INTO `users` VALUES (356, 'Yopi Kusdinar', '920200119790920101', NULL, '$2y$10$OyRXEXbGMhYvnHH9/ZotUOIIfzFZuvxzH1jRoWDq0w32JzHxEpQ8O', NULL, 3, NULL, '2020-11-27 14:54:10', '2020-11-27 14:54:10', 78);
INSERT INTO `users` VALUES (357, 'Ridha Mustaqim', '920200119880809101', NULL, '$2y$10$Z8K1QZAEw.TqmD93ZE3ySuZoph/3Auesa55ViPAkpZQrNTkcV/xw.', NULL, 3, NULL, '2020-11-27 14:54:10', '2020-11-27 14:54:10', 79);
INSERT INTO `users` VALUES (358, 'Patriana Nurmansyah Awwaludin', '920200119931011101', NULL, '$2y$10$yNUYO1BfRYLMeNKfW3UJD.TLemtEYypgfLjHs6M6N7K69/A21zD7m', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 80);
INSERT INTO `users` VALUES (359, 'Nurlan Kusmaedi', '195301111980031002', NULL, '$2y$10$2IuBV9GQRJqT3OWxh55qNOzkfh.SmsLcPZi9iuEkr/7ZyFPoNgg82', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 81);
INSERT INTO `users` VALUES (360, 'Badruzaman', '195911041986011001', NULL, '$2y$10$EG7h9v4k.riB/jWgbVRIB.5Ktg/.dhm37JCWC5hiVWqprPxkri2Xu', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 82);
INSERT INTO `users` VALUES (361, 'Surdiniaty Ugelta', '195912201987032001', NULL, '$2y$10$nt1kBROGx2L3cRdGPZTbD.h3IoI6xdeT7cHge1oTU6mgR2hyUs8Xe', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 83);
INSERT INTO `users` VALUES (362, 'Herman Subarjah', '196009181986031003', NULL, '$2y$10$bvs3DzIvB.Qzf9Ke6RzsqOQ92Lf/nQe8bmKRlfV.P.lSl8zBUbn5O', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 84);
INSERT INTO `users` VALUES (363, 'Sumardiyanto', '196212221987031002', NULL, '$2y$10$plwn7VfMqiMc0kMoOoOiqObFU86.7Ufiy6Q7t026LT8HrY/d0enxK', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 85);
INSERT INTO `users` VALUES (364, 'Yudha M.Saputra', '196303121989011002', NULL, '$2y$10$5bpp/ZXo4DD0WMzhHDq3k.ISwZr74lWMRovOy5/oFm8K8hOk46XlK', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 86);
INSERT INTO `users` VALUES (365, 'Adang Suherman', '196306181988031002', NULL, '$2y$10$/goAa2jl6AWa31RJCEoSSeEd6e7R.HtAJOQO1chJMTLnJC/yXn/Na', NULL, 3, NULL, '2020-11-27 14:54:11', '2020-11-27 14:54:11', 87);
INSERT INTO `users` VALUES (366, 'Yati Ruhayati', '196311071988032002', NULL, '$2y$10$afZnQOuD1GYHJx45OKaITuyq0aW7kmFGxJYgU7FaMu0KHLkjLChI2', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 88);
INSERT INTO `users` VALUES (367, 'Mustika Fitri', '196812201998022001', NULL, '$2y$10$/q0SnfDJJv8JlAnABoDVeumX3nB.gwMXcp99T0SHHGgjq7EL8d8nS', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 89);
INSERT INTO `users` VALUES (368, 'Hamidie Ronald Daniel Ray', '197011022000121001', NULL, '$2y$10$ICDZC1KoQXW.hlIZLKC5A.MdCtGDrqYpz.B59NXC45q5cJS7HSXwC', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 90);
INSERT INTO `users` VALUES (369, 'Iman Imanudin', '197508102001121001', NULL, '$2y$10$B8nxKnbTWejL.sVu7T.CFumhgHhMvpahNJQ70LgkqRqqaHhgrdngC', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 91);
INSERT INTO `users` VALUES (370, 'Agus Rusdiana', '197608122001121001', NULL, '$2y$10$u2R9x7FIFQ3OyCfQzMXDU.AoJfq3fiPbl4NRAJBTr7hzJaNgdSmD.', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 92);
INSERT INTO `users` VALUES (371, 'Ahmad Hamidi, ', '198003272005011005', NULL, '$2y$10$pbWxgFz.uWdQiBhWXNnC9.VQDDHt8HtHAAPXerxeG/wZP1faonhG6', NULL, 3, NULL, '2020-11-27 14:54:12', '2020-11-27 14:54:12', 93);
INSERT INTO `users` VALUES (372, 'Imas Damayanti', '198007212006042001', NULL, '$2y$10$YNUnjAPnTBX1YOs3A7C1BOWUJpg/pVZzsGj80MRSStw6uZfeWkQsy', NULL, 3, NULL, '2020-11-27 14:54:13', '2020-11-27 14:54:13', 94);
INSERT INTO `users` VALUES (373, 'Nur Indri Rahayu', '198110192003122001', NULL, '$2y$10$cdyHpT0d7mImdVNMGtplou.f5OFch1.h80Qh4pCDS5NNyO0uyzNT6', NULL, 3, NULL, '2020-11-27 14:54:13', '2020-11-27 14:54:13', 95);
INSERT INTO `users` VALUES (374, 'Sandey Tantra Paramitha', '198204182009121004', NULL, '$2y$10$lE7fn2y9Jy19POPqBAaE8OpMxs2Fp.GrEVEVow9wvyoQJiGjoO3di', NULL, 3, NULL, '2020-11-27 14:54:13', '2020-11-27 14:54:13', 96);
INSERT INTO `users` VALUES (375, 'Kuston Sultoni', '198805142015041001', NULL, '$2y$10$.SswzOSCItPACLj/Di0/7.y4cPhlXejNIPyzDjppmzGF07z7Vaor6', NULL, 3, NULL, '2020-11-27 14:54:13', '2020-11-27 14:54:13', 97);
INSERT INTO `users` VALUES (376, 'Jajat', '920200119810529101', NULL, '$2y$10$yhuZMmL31q/ZhUMN0UU5j.uezK9LM.QF4bsj9Zi/M.APvhUtU//46', NULL, 3, NULL, '2020-11-27 14:54:13', '2020-11-27 14:54:13', 98);
INSERT INTO `users` VALUES (377, 'Mohammad Zaky', '920200119810601101', NULL, '$2y$10$KRHl7nlzj5.VfTc28aAqZunHlbRNrBtCLS6Hg.LmAVwdN5/1U4TzG', NULL, 3, NULL, '2020-11-27 14:54:14', '2020-11-27 14:54:14', 99);
INSERT INTO `users` VALUES (378, 'Unun Umaran', '920200119811212102', NULL, '$2y$10$4T3EmyyMMRUqcHeS8K2Om.zArzW5Iy7SQk4t8MGqoN0SZgjTOF1Wa', NULL, 3, NULL, '2020-11-27 14:54:14', '2020-11-27 14:54:14', 100);
INSERT INTO `users` VALUES (379, 'Syam Hardwis', '920200119820628101', NULL, '$2y$10$.61RkXNrrRe7HH0zqYiYTukI7Xm3JkzVRlUpwosHgNnng60kGVngi', NULL, 3, NULL, '2020-11-27 14:54:14', '2020-11-27 14:54:14', 101);
INSERT INTO `users` VALUES (380, 'Mona Fiametta Febrianty', '920190219880208201', NULL, '$2y$10$PQr9K7rwawaEf/PP14ntt.ZmqeuRUS304LRIjRJ4AylqkQbtuYhAC', NULL, 3, NULL, '2020-11-27 14:54:14', '2020-11-27 14:54:14', 102);
INSERT INTO `users` VALUES (381, 'Dery Rimasa', '920190219910522101', NULL, '$2y$10$DGrNgXKelWpn16tOztiAA.6rJ3/3RxWgiU34Uf.Glf2wOCwWF5Xoi', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 103);
INSERT INTO `users` VALUES (382, 'Angga M Syahid', '920190219911211101', NULL, '$2y$10$CC7mDATX3ZZ8IpleCd6AduJPjfYXCd2Xvq2fzX0xRgW6v6b5.v.ne', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 104);
INSERT INTO `users` VALUES (383, 'Novrizal Achmad Novan', '920190219921121101', NULL, '$2y$10$f9rC1O7MAYorj.G5lOxbz.zJyaMTucqLG3e84FAjb6Qna1h0Mtvra', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 105);
INSERT INTO `users` VALUES (384, 'Fitri Rosdiana', '920190219930326201', NULL, '$2y$10$mbrl7Vx3VxoX7aimUF2zZOtv3vWTK.xYi/C/mmWI0ea5Tqf.cK1ri', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 106);
INSERT INTO `users` VALUES (385, 'Syifa F. Syihab', '920190219840801201', NULL, '$2y$10$MLgDJw3QmMApWhTlJzTGbel41uc1wjVkOSE14YsonEl13AEPnfoa2', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 107);
INSERT INTO `users` VALUES (386, 'Isti Kumalasari', '920190219860208101', NULL, '$2y$10$gBiDbLAV.V//C8JPUxvJX.TXIDwY2tRxNaKvrY/XSP2ZDYhXUoGLu', NULL, 3, NULL, '2020-11-27 14:54:15', '2020-11-27 14:54:15', 108);
INSERT INTO `users` VALUES (387, 'Ayu Mutiara Santanu', '920190219891113201', NULL, '$2y$10$z7gjqc.84qy6PLU2HV28WeEnYxJEpti7jIhxhe0JH9XmxXY4mIpN6', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 109);
INSERT INTO `users` VALUES (388, 'Asti Dewi Rahayu Fitrianingsih', '920190219910416201', NULL, '$2y$10$Ajkt4bBbqtyUw/1EgGSaL.ETizqFSVtredhnIWStm5k0DoN/cBDwC', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 110);
INSERT INTO `users` VALUES (389, 'Linda Amalia', '196803161992032004', NULL, '$2y$10$sHXumlLavApjKxeHMqI5uepJlcjuhJ1pe.4Ph9XztKgoASb45Suba', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 111);
INSERT INTO `users` VALUES (390, 'Upik Rahmi', '197501252014042001', NULL, '$2y$10$sACHrSxOE.ri9PBZAaTSheUbLjyyHO1n7.UIbiCwKgjGdBTEjcUxG', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 112);
INSERT INTO `users` VALUES (391, 'Slamet Rohaedi', '197611082001121005', NULL, '$2y$10$mY9jrGAU.yswkYxWi1InSehCnG12A3g7XzKGpN3KayYjuRlj2OoF.', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 113);
INSERT INTO `users` VALUES (392, 'Sri Sumartini', '198002252015042001', NULL, '$2y$10$T3Be7kcEJR3a8IuRDLhBoumwyfRcp8FNmHROVwOQP26ulP2sMosh6', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 114);
INSERT INTO `users` VALUES (393, 'Afianti Sulastri', '198007282010122002', NULL, '$2y$10$caCF5WOsIjwtouUKckETTOVVastY7hMU.YwizzeEqx71Hpvr5L.tC', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 115);
INSERT INTO `users` VALUES (394, 'Septian Andriyani', '198009142015042001', NULL, '$2y$10$FsJGEso0.dbPImHYyWQrmelO0l0KXaMpWgvQ1.c13XKY27TdHnBby', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 116);
INSERT INTO `users` VALUES (395, 'Lisna Anisa Fitriana', '198202222012122003', NULL, '$2y$10$O946ZRNKw8cla2WTZjEm0.rTUtROTLBaS12EsxrrUdYT8tMe8.VmS', NULL, 3, NULL, '2020-11-27 14:54:16', '2020-11-27 14:54:16', 117);
INSERT INTO `users` VALUES (396, 'Suci Tuty Putri', '198406042012122001', NULL, '$2y$10$0rwsQYeOTNmFYWx0D21h2ODhhH81Sg/V/0v.rOzKe4WG8Cf3mqYg2', NULL, 3, NULL, '2020-11-27 14:54:17', '2020-11-27 14:54:17', 118);
INSERT INTO `users` VALUES (397, 'Budi Somantri', '920160119771001101', NULL, '$2y$10$U0aFDg6iepi2yzCpxtQjhOeiIPnJBL.uhhF.FhzjoQJgVf3aPtn7q', NULL, 3, NULL, '2020-11-27 14:54:17', '2020-11-27 14:54:17', 119);
INSERT INTO `users` VALUES (398, 'Tirta Adikusuma Suparto', '920160119880105101', NULL, '$2y$10$0b1jqNRxQHgg30dMNt36jeIn1YXE8PaE58nk0zF/gP82i3UEOt.zO', NULL, 3, NULL, '2020-11-27 14:54:17', '2020-11-27 14:54:17', 120);
INSERT INTO `users` VALUES (399, 'Sehabudin Salasa', '920200119880419101', NULL, '$2y$10$linYArOg2XOg5cm.hzmG5uGtAKBSgy46gJdPAUBM//leBt77B3euy', NULL, 3, NULL, '2020-11-27 14:54:17', '2020-11-27 14:54:17', 121);
INSERT INTO `users` VALUES (400, 'Asih Purwandari Wahyoe Puspita', '920200119900523201', NULL, '$2y$10$//O/fgdsVoqkosSt7uj82.Qpnk8j84ibM0s4G.WiO5CAhr6fX6dIe', NULL, 3, NULL, '2020-11-27 14:54:17', '2020-11-27 14:54:17', 122);
INSERT INTO `users` VALUES (401, 'Rohayati', '196906051994032001', NULL, '$2y$10$pJf3yQqN9T9mz0aouLbhgOfJJ761ykEMPpo7CyxnlaKSuCSwtxu12', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 123);
INSERT INTO `users` VALUES (402, 'Akub Saputra', '196410021987031016', NULL, '$2y$10$wm6Wl0OqGD1VJodO5cg/E.jWpUIk.pzR3GZHkedlNfXwqkAIG4tq2', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 124);
INSERT INTO `users` VALUES (403, 'Suparman', '196612271987011001', NULL, '$2y$10$7mGRvKOD/ovXVTnPo6uubuk1z4P4jEpVjGxoEpgWz/vAV9WbMXTP2', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 125);
INSERT INTO `users` VALUES (404, 'Uman Rusmana', '196608111989031001', NULL, '$2y$10$tLGFyi8d9TV6ovAzV6cgC.hULjKsYFJGRNFLi4glBfiXw7VUD7Dki', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 126);
INSERT INTO `users` VALUES (405, 'Darsono', '196603121987031002', NULL, '$2y$10$sa6369OZY7BS/afXlKEvZ./DXrRyPTwb65V5dbJdjBXqscST9Edga', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 127);
INSERT INTO `users` VALUES (406, 'N. Ikah Sukaesih', '196406251987032001', NULL, '$2y$10$/n2BN1uddg38pM/f8hZa6.t/FxHHJILyfJxmc77oWEZAag4r1NDaC', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 128);
INSERT INTO `users` VALUES (407, 'Eko Sumartojo', '197003231993031004', NULL, '$2y$10$edLFLHCkbovbfZ5p1gsBXeDAlb.l/Y5zP.sLzvDbc9VAQDIbpRq/6', NULL, 3, NULL, '2020-11-27 14:54:18', '2020-11-27 14:54:18', 129);
INSERT INTO `users` VALUES (408, 'Telvis Aristo', '196506101987031002', NULL, '$2y$10$LSOJ9jSNCXk1Uw41Pv5Cg.Mvzrnugck/NH5JJUV/GFQRsXYmAuNkO', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 130);
INSERT INTO `users` VALUES (409, 'Supardi Sarmodiredjo', '196211171992031001', NULL, '$2y$10$3zpccscY2mgLQxDK8y4kh.EDOPgjbrshr7oLUyakFgyKH2TXHCvg6', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 131);
INSERT INTO `users` VALUES (410, 'Ade Suryana', '196710261989031002', NULL, '$2y$10$qxRIo4dxkaoD6m36kXi6huKye7mX0hgtO75KHXzlltnilbG5i84D2', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 132);
INSERT INTO `users` VALUES (411, 'Riesa Cahya Rivahati', '198802012010122003', NULL, '$2y$10$dDgAUKvG587uJJ0YD9oX4.LlChHliTslVrjUSeoAuCKKTnA6r10Gm', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 133);
INSERT INTO `users` VALUES (412, 'Sutarno', '196209051985031004', NULL, '$2y$10$wTBuP.DOh1xvcgJq5xtPDed1VoZLRvi7K2qZaaY7./6GEkntBbdqW', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 134);
INSERT INTO `users` VALUES (413, 'Handi Kusdani', '198304202015041001', NULL, '$2y$10$mOkA9QM3L8v889Ki8mjRju/ioMs6h/HSsfO2cJPUF27Q4Umwpb2vq', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 135);
INSERT INTO `users` VALUES (414, 'Eggi Gunawan Noer`K', '198108242014091003', NULL, '$2y$10$uW2SQZSLS6Zy69Ju9zPSpOVdlmgg5.AYhgeYplbV5aWMhGSHhtzCS', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 136);
INSERT INTO `users` VALUES (415, 'Ryana Dede Putra', '197902252014091004', NULL, '$2y$10$v5k8Oh942dSscpIAG3Mwt.a328xyxOPnzuKl5ciEgo/nRdya/rr.a', NULL, 3, NULL, '2020-11-27 14:54:19', '2020-11-27 14:54:19', 137);
INSERT INTO `users` VALUES (416, 'Yani Fitriyani', '920200119820726201', NULL, '$2y$10$kByUoqmfB3ksYgPb4JeYDeC89VUW6mNYixzUFgL.AfjjYXuUCQ4zm', NULL, 3, NULL, '2020-11-27 14:54:20', '2020-11-27 14:54:20', 138);
INSERT INTO `users` VALUES (417, 'Muhamad Sobari', '920200119681026101', NULL, '$2y$10$P1VGjOuBYKQXuUHEVNzdKO1dypWsL04MFXdJHq2XUcioH6WkWveD2', NULL, 3, NULL, '2020-11-27 14:54:20', '2020-11-27 14:54:20', 139);
INSERT INTO `users` VALUES (418, 'Mega Meirina Dewi Utami', '920200119830502201', NULL, '$2y$10$gGqExp9tBpHRPB9VY4XYbe.oOyypSjG0cmMLs8umjzWgNVFuEEm/S', NULL, 3, NULL, '2020-11-27 14:54:20', '2020-11-27 14:54:20', 140);
INSERT INTO `users` VALUES (419, 'Jaka Sintara', '920190219790319101', NULL, '$2y$10$rfBs2uCz28eh31Qgnwg3We4AtYld09sHRplUNsAFJWe4VhaaDpkby', NULL, 3, NULL, '2020-11-27 14:54:20', '2020-11-27 14:54:20', 141);
INSERT INTO `users` VALUES (420, 'Deni Herdiana', '920200119780101101', NULL, '$2y$10$f.bocpj9BoY9tHThH3lEKOEBRsPlV0PRy/61iYkoM8hH2chs05dVe', NULL, 3, NULL, '2020-11-27 14:54:21', '2020-11-27 14:54:21', 142);
INSERT INTO `users` VALUES (421, 'Lillah Solihat Nurjanah', '020070119831007201', NULL, '$2y$10$C9Peg5kbnoOeJh9YCSRSmex70PmJJS7JSWiWgLmybwoE4sVkeIyTS', NULL, 3, NULL, '2020-11-27 14:54:21', '2020-11-27 14:54:21', 143);
INSERT INTO `users` VALUES (422, 'Melsa Puspita', '020190419960709201', NULL, '$2y$10$VjBZSS0xgyKz3lJaoEdYPuYM9Dj2CzhxIeeTt4QgrvH/2khldYmiC', NULL, 3, NULL, '2020-11-27 14:54:21', '2020-11-27 14:54:21', 144);
INSERT INTO `users` VALUES (423, 'Hana Medyawicesar', '020190119950317201', NULL, '$2y$10$s.DHaBMa6g/ZqnFQ3CHKUes.x.WMPZ.HuI6k3k767.CUes.VRxDWq', NULL, 3, NULL, '2020-11-27 14:54:21', '2020-11-27 14:54:21', 145);
INSERT INTO `users` VALUES (424, 'Yogi Adiputra', '020190119911015101', NULL, '$2y$10$7lMbaDFM/41tvMXNF9d6a.HxdezwDAh2RDA81zzX5muntXJdfGD3.', NULL, 3, NULL, '2020-11-27 14:54:22', '2020-11-27 14:54:22', 146);
INSERT INTO `users` VALUES (425, 'Tian Kurniawan', '020180119950817101', NULL, '$2y$10$N3LUhxOxv6pvDoo6UZ9HGOAo8Ty76zxpIdDxRb.vtiQspIbSKxQDK', NULL, 3, NULL, '2020-11-27 14:54:22', '2020-11-27 14:54:22', 147);
INSERT INTO `users` VALUES (426, 'Aditya Pratama', '020150219930929101', NULL, '$2y$10$gjm9dSFguiociGzr3zlKsuqEW3TPBLXMqif8I9henJg20byAxIH0e', NULL, 3, NULL, '2020-11-27 14:54:22', '2020-11-27 14:54:22', 148);
INSERT INTO `users` VALUES (427, 'Arizal Pratama', '020200319961121101', NULL, '$2y$10$2WopVPwcDAuSdf0OS16C2.s2N2r4ibjPtvl/F/92/rbSWziKG7vKG', NULL, 3, NULL, '2020-11-27 14:54:22', '2020-11-27 14:54:22', 149);
INSERT INTO `users` VALUES (428, 'Gusep Nurdin', '196611021993031002', NULL, '$2y$10$UugKIBqh7EVsVfuU6Emb3ODuWKW/wFaCC86B8T8sKdOOOb0tw.V.K', NULL, 3, NULL, '2020-11-27 14:54:22', '2020-11-27 14:54:22', 150);

-- ----------------------------
-- View structure for v_data_arsip_cuti
-- ----------------------------
DROP VIEW IF EXISTS `v_data_arsip_cuti`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_arsip_cuti` AS SELECT d.id,d.idpegawai,p.nama,d.jenis,d.mulai,d.selesai,d.id_unit,u.nama_unit,d.filesk
FROM
data_arsip_cuti d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id 
LEFT JOIN unit_kerja u 
ON d.id_unit = u.id ;

-- ----------------------------
-- View structure for v_data_arsip_kgb
-- ----------------------------
DROP VIEW IF EXISTS `v_data_arsip_kgb`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_arsip_kgb` AS SELECT d.id,d.idpegawai,p.nama,d.no,d.tgl,d.gaji,d.masa,u.nama as pangkat,d.filesk,d.tmt
FROM
data_arsip_kgb d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id 
LEFT JOIN pangkat_golongan u 
ON d.idpangkat = u.id ;

-- ----------------------------
-- View structure for v_data_dokumen
-- ----------------------------
DROP VIEW IF EXISTS `v_data_dokumen`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_dokumen` AS SELECT d.id,d.idpegawai,p.nama,d.kategori,d.namadok,d.ket,d.filedok
FROM
data_dokumen d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_fungsional
-- ----------------------------
DROP VIEW IF EXISTS `v_data_fungsional`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_fungsional` AS SELECT d.id,d.idpegawai,p.nama,j.nama_jabatan as fungsional,d.sk,d.tmt,d.filesk,d.tgl
FROM
data_fungsional d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id
LEFT JOIN jabatan_fungsional j 
ON d.idfungsional = j.id ;

-- ----------------------------
-- View structure for v_data_jurnal
-- ----------------------------
DROP VIEW IF EXISTS `v_data_jurnal`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_jurnal` AS SELECT d.id,d.idpegawai,p.nama ,d.namajurnal,d.judul,d.tahun,d.filejurnal,d.link
FROM
data_jurnal d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_keluarga
-- ----------------------------
DROP VIEW IF EXISTS `v_data_keluarga`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_keluarga` AS SELECT d.id,d.idpegawai,p.nama,d.nama as keluarga,d.ttl,d.pendidikan,d.pekerjaan,d.hub,d.tempat
FROM
data_keluarga d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_keluarga_anak
-- ----------------------------
DROP VIEW IF EXISTS `v_data_keluarga_anak`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_keluarga_anak` AS SELECT d.id,d.idpegawai,p.nama,d.nama as keluarga,d.ttl,d.pendidikan,d.pekerjaan,d.hub,d.tempat
FROM
data_keluarga_anak d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_keluarga_pasangan
-- ----------------------------
DROP VIEW IF EXISTS `v_data_keluarga_pasangan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_keluarga_pasangan` AS SELECT d.id,d.idpegawai,p.nama,d.nama as keluarga,d.ttl,d.pendidikan,d.pekerjaan,d.hub,d.tempat
FROM
data_keluarga_pasangan d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_kepakaran
-- ----------------------------
DROP VIEW IF EXISTS `v_data_kepakaran`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_kepakaran` AS SELECT d.id,d.idpegawai,p.nama,d.bidang,d.matakuliah
FROM
data_kepakaran d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_pangkat
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pangkat`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pangkat` AS SELECT d.id,d.idpegawai,p.nama,j.nama as pangkat,d.sk,d.tglsk,d.pengesah,d.tmt,d.filesk
FROM
data_pangkat d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id
LEFT JOIN pangkat_golongan j 
ON d.idpangkat = j.id ;

-- ----------------------------
-- View structure for v_data_pegawai
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pegawai`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pegawai` AS SELECT d.id,d.nip,d.nama,d.gelar_depan,d.gelar_belakang,d.npwp,d.nidn,d.ttl,d.agama,d.jk,d.golongan_darah,d.status_nikah,d.status_kepegawaian,
d.status_pegawai,d.alamat,d.tlp,d.email,d.pensiun,d.id_unit_kerja,u.nama_unit,d.id_status,s.nama_status,d.id_jabatan_fungsional,j.nama_jabatan,
d.tanggallahir,d.nik
FROM
data_pegawai d
LEFT JOIN unit_kerja u 
ON d.id_unit_kerja = u.id
LEFT JOIN jabatan_fungsional j 
ON d.id_jabatan_fungsional = j.id
LEFT JOIN status s 
ON d.id_status = s.id ;

-- ----------------------------
-- View structure for v_data_pelatihan
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pelatihan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pelatihan` AS SELECT d.id,d.idpegawai,p.nama,d.namadiklat,d.penyelenggara,d.tgl,d.nosertifikat,d.jam,d.filesertifikat
FROM
data_pelatihan d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_pendidikan
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pendidikan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pendidikan` AS SELECT d.id,d.idpegawai,p.nama,d.idpendidikan,didik.nama as tingkat,d.sekolah,d.program,d.noijazah,d.tahun,d.lokasi,d.fileijazah
FROM
data_pendidikan d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id 
LEFT JOIN pendidikan didik 
ON d.idpendidikan = didik.id ;

-- ----------------------------
-- View structure for v_data_penelitian
-- ----------------------------
DROP VIEW IF EXISTS `v_data_penelitian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_penelitian` AS SELECT d.id,d.idpegawai,p.nama,d.judul,d.sumberdana,d.tahun,d.filepenelitian
FROM
data_penelitian d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_pengabdian
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pengabdian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pengabdian` AS SELECT d.id,d.idpegawai,p.nama,d.judul,d.sumberdana,d.tahun,d.filepengabdian
FROM
data_pengabdian d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_pengajuan_cuti
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pengajuan_cuti`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pengajuan_cuti` AS SELECT d.id,d.idpegawai,pegawai.nama,d.masakerja,d.jenis_cuti,d.alasan_cuti,d.lama_cuti,d.start_date,d.end_date,d.alamat,d.hasil,
d.idunit,u.nama_unit,d.idjabatan,j.nama_jabatan,d.tlp,d.catatan_cuti,pegawai.nip,
d.n2_sisa,d.n2_ket ,d.n1_sisa ,d.n1_ket ,d.n_sisa ,d.n_ket	,d.pertimbangan, d.alasan_pertimbangan,d.keputusan ,d.alasan_keputusan,d.idatasan,atasan.nama as namaatasan, atasan.nip as nipatasan ,d.idpejabat,pejabat.nama as namapejabat,
pejabat.nip as nippejabat
FROM
data_pengajuan_cuti d
LEFT JOIN unit_kerja u 
ON d.idunit = u.id
LEFT JOIN jabatan_fungsional j 
ON d.idjabatan = j.id
LEFT JOIN data_pegawai pegawai 
ON d.idpegawai = pegawai.id 

LEFT JOIN data_pegawai atasan 
ON d.idatasan = atasan.id
LEFT JOIN data_pegawai pejabat 
ON d.idpejabat = pejabat.id ;

-- ----------------------------
-- View structure for v_data_pengajuan_kgb
-- ----------------------------
DROP VIEW IF EXISTS `v_data_pengajuan_kgb`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_pengajuan_kgb` AS SELECT d.id,d.idpegawai,p.nama,d.nomor,d.tgl,d.gajibaru,d.masakerja,d.idpangkatbaru,pangkatbaru.nama as namapangkatbaru,d.mulaitgl,
d.idjabatanlama,d.idpangkatlama,d.tempat,d.gajilama,d.pejabat,
d.tglberlaku,d.masatgl,d.ket,j.nama_jabatan,pangkatlama.nama as pangkatlama,p.nip,p.ttl,p.tanggallahir,d.created_at,d.iddekan,dp.nama as namadekan,dp.nip as nipdekan
FROM
data_pengajuan_kbg d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id 
LEFT JOIN pangkat_golongan pangkatbaru 
ON d.idpangkatbaru = pangkatbaru.id 
LEFT JOIN jabatan_fungsional j 
ON d.idjabatanlama = j.id 
LEFT JOIN pangkat_golongan pangkatlama
ON d.idpangkatlama = pangkatlama.idLEFT JOIN data_pegawai dp 
ON d.iddekan = dp.id ;

-- ----------------------------
-- View structure for v_data_penghargaan
-- ----------------------------
DROP VIEW IF EXISTS `v_data_penghargaan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_penghargaan` AS SELECT d.id,d.idpegawai,p.nama,d.penghargaan,d.instansi,d.tahun,d.filesk
FROM
data_penghargaan d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_penugasan
-- ----------------------------
DROP VIEW IF EXISTS `v_data_penugasan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_penugasan` AS SELECT d.id,d.idpegawai,p.nama,d.tujuan,d.nosurat,d.tgl,d.filesk,d.lama
FROM
data_penugasan d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_skp
-- ----------------------------
DROP VIEW IF EXISTS `v_data_skp`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_skp` AS SELECT d.id,d.idpegawai,p.nama,d.filesk,d.tahun
FROM
data_skp d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_data_struktural
-- ----------------------------
DROP VIEW IF EXISTS `v_data_struktural`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_struktural` AS SELECT d.id,d.idpegawai,p.nama,j.nama as struktural,d.sk,d.tmt,d.filesk,d.tgl,d.tmt2
FROM
data_struktural d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id
LEFT JOIN jabatan_struktural j 
ON d.idstruktural = j.id ;

-- ----------------------------
-- View structure for v_data_study
-- ----------------------------
DROP VIEW IF EXISTS `v_data_study`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_study` AS SELECT d.id,d.idpegawai,p.nama,d.tingkat,d.perguruan,d.program,d.tahun,d.negara
FROM
data_study d
LEFT JOIN data_pegawai p 
ON d.idpegawai = p.id ;

-- ----------------------------
-- View structure for v_jumlah_pengajuan_cuti
-- ----------------------------
DROP VIEW IF EXISTS `v_jumlah_pengajuan_cuti`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_jumlah_pengajuan_cuti` AS SELECT count(*) as jumlah,d.month_name as bulan,d.year_number as tahun
FROM data_pengajuan_cuti d
GROUP BY d.month_name,d.year_number
ORDER BY d.start_date ;

SET FOREIGN_KEY_CHECKS = 1;
