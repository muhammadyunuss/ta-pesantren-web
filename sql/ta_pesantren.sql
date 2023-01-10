-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.3
-- Generation Time: Jan 10, 2023 at 12:43 AM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `attachments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `walisantri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ekstrakurikuler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_ekstrakurikuler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekstrakurikuler`, `keterangan_ekstrakurikuler`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'BASKET', 'adssdadsa', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_guru` date NOT NULL,
  `nomor_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `walikelas` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesantren_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `alamat_guru`, `foto_guru`, `tanggal_lahir_guru`, `nomor_guru`, `pendidikan_guru`, `walikelas`, `created_at`, `updated_at`, `pesantren_id`) VALUES
(1, 'Rami', 'JL. Instagram', '20221104093346.jpg', '1992-12-12', '08213972818', 'S1 Mengaji', 'no', NULL, NULL, 1),
(2, 'Roma Irama', 'JL. Cipta Menanggal Blok 67 F', '20221104093155.jpg', '1910-10-10', '082139661296', 'S1', 'yes', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_id` bigint(20) NOT NULL,
  `santri_id` bigint(20) NOT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet_pembayaran` int(11) DEFAULT NULL,
  `kredit_pembayaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id`, `pembayaran_id`, `santri_id`, `tanggal_pembayaran`, `status_pembayaran`, `keterangan_pembayaran`, `debet_pembayaran`, `kredit_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-07 19:46:52', 'Lunas', 'Listrik Bulan Januari 2022', 0, 400000, NULL, NULL),
(2, 2, 1, '2022-12-07 19:46:52', 'Lunas', 'SPP Santri A Bulan Januari 2022', 1000000, 0, NULL, NULL),
(4, 1, 1, '2022-12-19 16:52:52', 'Lunas', 'Keterangan', 100000, NULL, '2022-12-19 09:52:22', '2022-12-19 09:52:22'),
(5, 2, 1, '2022-12-19 00:00:00', 'Lunas', 'Keterangan', NULL, 92400, '2022-12-19 10:14:26', '2022-12-19 10:14:26'),
(6, 4, 1, '2022-12-19 00:00:00', 'Lunas', 'Infaq', 10000, NULL, '2022-12-19 10:58:23', '2022-12-19 10:58:23'),
(7, 3, 1, '2022-12-19 00:00:00', 'Lunas', 'Oke', 12000, NULL, '2022-12-19 11:41:01', '2022-12-19 11:41:01'),
(8, 4, 1, '2022-12-19 00:00:00', 'Lunas', 'Keterangan', 10000, NULL, '2022-12-19 12:19:37', '2022-12-19 12:19:37'),
(9, 1, 1, '2022-12-20 00:00:00', 'Lunas', 'Keterangan', 100000, NULL, '2022-12-20 07:47:13', '2022-12-20 07:47:13'),
(13, 1, 2, '2023-01-07 00:00:00', 'Lunas', '21312', 213213, NULL, '2023-01-07 05:10:05', '2023-01-07 05:10:05'),
(14, 2, 2, '2023-01-07 00:00:00', 'Lunas', '12331233', 213123321, NULL, '2023-01-07 05:10:08', '2023-01-07 05:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`, `guru_id`) VALUES
(1, 'KELAS MIPA 1', '2022-11-04 13:18:28', '2022-11-07 12:58:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `riwayat_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_riwayat_santri` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`id`, `riwayat_kesehatan`, `keterangan_kesehatan`, `tanggal_riwayat_santri`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'Sakit Diare', '3 hari', '2023-01-06', NULL, NULL, 1),
(2, 'GATas', 'sad dwad', '2023-12-11', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran_spp`
--

CREATE TABLE `konfirmasi_pembayaran_spp` (
  `id` int(11) NOT NULL,
  `jenis_pembayaran_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `upload_bukti` text NOT NULL,
  `status_verifikasi` int(11) NOT NULL COMMENT '0=belum, 1=sukses, 2=ditolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi_pembayaran_spp`
--

INSERT INTO `konfirmasi_pembayaran_spp` (`id`, `jenis_pembayaran_id`, `tanggal`, `upload_bukti`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-22 00:00:00', '20221222001851.php', 1, '2023-01-07 10:59:51', '2023-01-07 10:59:51'),
(2, 1, '2022-12-22 00:00:00', '20221222001927.php', 1, '2022-12-22 08:16:27', '2022-12-22 08:16:27'),
(3, 1, '2022-12-22 00:00:00', '20221222001946.php', 2, '2023-01-07 12:11:49', '2023-01-07 12:11:49'),
(4, 1, '2022-12-22 00:00:00', '20221222002004.php', 0, '2022-12-22 00:20:04', '2022-12-22 00:20:04'),
(5, 5, '2023-01-09 00:00:00', '20230109151458.php', 0, '2023-01-09 15:14:58', '2023-01-09 15:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesantren_id` bigint(20) NOT NULL,
  `nama_mata_pelajaran` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `pesantren_id`, `nama_mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika', '2022-11-30 03:46:17', '2022-11-30 03:46:17'),
(2, 1, 'Fisika', '2022-11-30 03:46:49', '2022-11-30 03:47:30'),
(3, 1, 'Kimia', '2022-11-30 10:37:07', '2022-11-30 10:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_03_092818_create_permission_tables', 1),
(6, '2022_03_05_143106_create_pegawai_table', 1),
(7, '2022_03_05_143229_create_pembayaran_table', 1),
(8, '2022_03_05_143311_create_pesantren_table', 1),
(9, '2022_03_05_143338_create_kelas_table', 1),
(10, '2022_03_05_143439_create_nilai_table', 1),
(11, '2022_03_05_143702_create_guru_table', 1),
(12, '2022_03_05_143734_create_chat_table', 1),
(13, '2022_03_05_144038_create_jenis_pembayaran_table', 1),
(14, '2022_03_05_144210_create_santri_table', 1),
(15, '2022_03_05_144236_create_walisantri_table', 1),
(16, '2022_03_08_072656_add_pesantrenid_column', 1),
(17, '2022_03_08_075452_add_guruid_column', 1),
(18, '2022_03_08_075728_add_nis_column', 1),
(19, '2022_03_08_080627_add_kelasid_column', 1),
(20, '2022_03_08_081217_add_pesantrenid_guru_column', 1),
(21, '2022_03_08_081338_add_pegawaiid_column', 1),
(22, '2022_03_08_081520_add_walisantri_id_column', 1),
(23, '2022_03_08_082124_add_pembayaranid_jenis_column', 1),
(24, '2022_03_08_082254_add_nis_jenis_column', 1),
(25, '2022_03_08_082410_add_nis_walisantri_column', 1),
(26, '2022_04_04_062814_create_kesehatan_table', 1),
(27, '2022_04_04_062845_create_prestasi_table', 1),
(28, '2022_04_04_062923_create_pelanggaran_table', 1),
(29, '2022_04_04_062954_create_ekstrakurikuler_table', 1),
(30, '2022_04_04_063012_create_perizinan_table', 1),
(31, '2022_04_04_072544_add_idsantri_kesehatan_table', 1),
(32, '2022_04_04_073129_add_idsantri_prestasi_table', 1),
(33, '2022_04_04_073200_add_idsantri_pelanggaran_table', 1),
(34, '2022_04_04_073225_add_idsantri_ekstrakurikuler_table', 1),
(35, '2022_04_04_073251_add_idsantri_perizinan_table', 1),
(36, '2022_04_18_075316_add_pegawai_id_pembayaran', 1),
(37, '2022_12_20_031809_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_tugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_uts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_uas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `matapelajaran_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `created_at`, `updated_at`, `santri_id`, `kelas_id`, `matapelajaran_id`) VALUES
(1, '15', '15', '15', '2022-11-30 11:23:31', '2022-11-30 11:30:18', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('10ccb87a-bc83-4e23-9b83-a85232fb134d', 'App\\Notifications\\NewSppNotification', 'App\\Models\\User', 1, '{\"walisantri_id\":1,\"email_username\":\"wali@gmail.com\",\"judul_pemberitahuan\":\"Tagihan Pembayaran SPP\",\"detail_pemberitahuan\":\"Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 23-12-2022\",\"tanggal_pemberitahuan\":\"2022-12-23\",\"status_terbaca\":0,\"updated_at\":\"2022-12-23T09:25:11.000000Z\",\"created_at\":\"2022-12-23T09:25:11.000000Z\",\"id\":6}', NULL, '2022-12-23 03:10:54', '2022-12-23 03:10:54'),
('c3aed8ae-ea66-4a16-a1c9-6c5337c27572', 'App\\Notifications\\NewSppNotification', 'App\\Models\\User', 2, '{\"walisantri_id\":1,\"email_username\":\"wali@gmail.com\",\"judul_pemberitahuan\":\"Tagihan Pembayaran SPP\",\"detail_pemberitahuan\":\"Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 23-12-2022\",\"tanggal_pemberitahuan\":\"2022-12-23\",\"status_terbaca\":0,\"updated_at\":\"2022-12-23T09:25:11.000000Z\",\"created_at\":\"2022-12-23T09:25:11.000000Z\",\"id\":6}', NULL, '2022-12-23 09:25:11', '2022-12-23 11:42:14'),
('ccff75ec-bf60-4c00-a824-08894bb1f1e5', 'App\\Notifications\\NewSppNotification', 'App\\Models\\User', 2, '{\"walisantri_id\":1,\"email_username\":\"wali@gmail.com\",\"judul_pemberitahuan\":\"Tagihan Pembayaran SPP\",\"detail_pemberitahuan\":\"Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 01-01-2023\",\"tanggal_pemberitahuan\":\"2023-01-01\",\"status_terbaca\":0,\"updated_at\":\"2023-01-02T12:39:45.000000Z\",\"created_at\":\"2023-01-02T12:39:45.000000Z\",\"id\":7}', NULL, '2023-01-02 12:39:46', '2023-01-07 04:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `walisantri_id` int(11) NOT NULL,
  `email_username` varchar(100) NOT NULL,
  `judul_pemberitahuan` varchar(50) NOT NULL,
  `detail_pemberitahuan` text NOT NULL,
  `tanggal_pemberitahuan` datetime NOT NULL,
  `status_terbaca` int(11) NOT NULL COMMENT '0=belum, 1=terbaca',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `walisantri_id`, `email_username`, `judul_pemberitahuan`, `detail_pemberitahuan`, `tanggal_pemberitahuan`, `status_terbaca`, `created_at`, `updated_at`) VALUES
(1, 1, 'wali@gmail.com', 'Tagihan Pembayaran SPP', 'Tagihan Pembayaran SPP\nAtas nama Santri Sales\nSebesar Rp. 1.000.000 (ambil dari nominal)\nTanggal 1 Januari 2022', '2022-12-19 12:57:45', 0, '2022-12-20 04:39:45', '0000-00-00 00:00:00'),
(2, 1, 'wali@gmail.com', 'Konfirmasi Pembayaran SPP Berhasil', 'Konfirmasi Pembayaran SPP Berhasil\r\nAtas nama Santri Sales\r\nSebesar Rp. 1.000.000 (ambil dari nominal)\r\nTanggal 1 Januari 2022', '2022-12-19 12:57:45', 0, '2022-12-20 04:39:45', '0000-00-00 00:00:00'),
(3, 1, 'wali@gmail.com', 'Konfirmasi Pembayaran SPP Ditolak', 'Konfirmasi Pembayaran SPP Ditolak\r\nAtas nama Santri Sales\r\nSebesar Rp. 1.000.000 (ambil dari nominal)\r\nTanggal 1 Januari 2022', '2022-12-19 12:57:45', 0, '2022-12-20 04:39:45', '0000-00-00 00:00:00'),
(4, 1, 'wali@gmail.com', 'Tagihan Pembayaran SPP', 'Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 20-12-2022', '2022-12-20 00:00:00', 0, '2022-12-20 07:47:13', '2022-12-20 07:47:13'),
(5, 1, 'wali@gmail.com', 'Tagihan Pembayaran SPP', 'Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 23-12-2022', '2022-12-23 00:00:00', 0, '2022-12-23 09:21:32', '2022-12-23 09:21:32'),
(6, 1, 'wali@gmail.com', 'Tagihan Pembayaran SPP', 'Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 23-12-2022', '2022-12-23 00:00:00', 0, '2022-12-23 09:25:11', '2022-12-23 09:25:11'),
(7, 1, 'wali@gmail.com', 'Tagihan Pembayaran SPP', 'Tagihan Pembayaran SPP, Atas nama Santri Wali Santri Saleh Sebesar Rp. 100.000,00 pada Tanggal 01-01-2023', '2023-01-01 00:00:00', 0, '2023-01-02 12:39:45', '2023-01-02 12:39:45'),
(8, 2, 'painem@gmail.com', 'Tagihan Pembayaran Daftar Ulang', 'Tagihan Pembayaran Daftar Ulang, Atas nama Santri Painem Sebesar Rp. 213.213,00 pada Tanggal 07-01-2023', '2023-01-07 00:00:00', 0, '2023-01-07 05:05:02', '2023-01-07 05:05:02'),
(9, 2, 'painem@gmail.com', 'Tagihan Pembayaran Daftar Ulang', 'Tagihan Pembayaran Daftar Ulang, Atas nama Santri Painem Sebesar Rp. 213.213,00 pada Tanggal 07-01-2023', '2023-01-07 00:00:00', 0, '2023-01-07 05:10:05', '2023-01-07 05:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesantren_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `alamat_pegawai`, `kontak_pegawai`, `foto_pegawai`, `tanggal_lahir_pegawai`, `created_at`, `updated_at`, `pesantren_id`) VALUES
(1, 'Pegawai Saleh', 'Jl. Pegawai saleh', '123123123', 'Pegawai Saleh', '2021-12-12', NULL, NULL, 1),
(2, '12312312', '213123213', '1212321', '20230107043318.jpg', '2023-01-07', '2023-01-07 04:09:42', '2023-01-07 04:33:18', 1),
(3, '123123', '123213', '123123', NULL, '2023-01-07', '2023-01-07 04:10:32', '2023-01-07 04:10:32', 1),
(4, '1111', '1111', '11111', '20230107043310.jpg', '2023-01-07', '2023-01-07 04:10:55', '2023-01-07 04:33:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pelanggaran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id`, `keterangan_pelanggaran`, `riwayat_pelanggaran`, `tanggal_pelanggaran`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'cccc', 'Pelanggaran 1', '2023-01-02', NULL, NULL, 1),
(2, 'xxxxx', 'Pacaran', '2023-01-02', NULL, NULL, 1),
(3, '123123', '213123', '2023-01-14', NULL, NULL, 1),
(4, '123123', '213123', '2023-01-07', NULL, NULL, 1),
(5, '123123', '123123', '2023-01-07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_pembayaran`, `jenis_pembayaran`, `nominal_pembayaran`, `created_at`, `updated_at`, `pegawai_id`) VALUES
(1, 'Daftar Ulang', 'Tunai', '400000', '2022-12-01 07:28:03', '2022-12-01 07:40:20', 1),
(2, 'Infaq', 'Tunai', '1000000', '2022-12-01 07:28:03', '2022-12-01 07:40:20', 1),
(3, 'SPP', 'Tunai', '5000000', '2022-12-01 07:28:03', '2022-12-01 07:40:20', 1),
(4, 'Sewa Ruang', 'Tunai', '100000', '2022-12-19 10:51:55', '2022-12-19 10:51:55', 1),
(5, 'Catering', 'Transfer', '500000', '2023-01-02 13:14:47', '2023-01-02 13:14:58', 1),
(6, 'Daftar Ulang', 'Transfer', '400000', '2022-12-01 07:28:03', '2022-12-01 07:40:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `riwayat_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id`, `riwayat_perizinan`, `keterangan_perizinan`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, '123123', '12332', '2023-01-07', '2023-01-07', '2023-01-07 02:37:26', '2023-01-07 02:53:52', 2),
(2, '123123', '12332', '2023-01-07', '2023-01-07', '2023-01-07 02:52:57', '2023-01-07 02:52:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(2, 'admin', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(3, 'walisantri', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(4, 'santri', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesantren`
--

CREATE TABLE `pesantren` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pesantren` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pesantren` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesantren`
--

INSERT INTO `pesantren` (`id`, `nama_pesantren`, `alamat_pesantren`, `created_at`, `updated_at`) VALUES
(1, 'Pesantren AL-AZHAR', 'Mesir', NULL, NULL),
(2, 'Pesantren 2', 'BLABLABLA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_pegawai`
--

CREATE TABLE `presensi_pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `pesantren_id` int(11) NOT NULL,
  `tanggal_presensi` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_pegawai`
--

INSERT INTO `presensi_pegawai` (`id`, `pegawai_id`, `pesantren_id`, `tanggal_presensi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-02 00:00:00', 'Masuk', '2022-12-01 02:18:55', '2022-12-01 02:18:55'),
(2, 1, 1, '2023-01-09 15:45:00', 'Masuk', '2023-01-09 15:45:45', '2023-01-09 15:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_santri_pada_asrama`
--

CREATE TABLE `presensi_santri_pada_asrama` (
  `id` int(11) UNSIGNED NOT NULL,
  `santri_id` bigint(20) NOT NULL,
  `pesantren_id` bigint(20) NOT NULL,
  `tanggal_presensi` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_santri_pada_asrama`
--

INSERT INTO `presensi_santri_pada_asrama` (`id`, `santri_id`, `pesantren_id`, `tanggal_presensi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-30 00:00:00', 'Masuk', '2022-11-29 13:40:50', '2022-11-29 14:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_santri_pada_kelas`
--

CREATE TABLE `presensi_santri_pada_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_presensi` datetime NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_santri_pada_kelas`
--

INSERT INTO `presensi_santri_pada_kelas` (`id`, `santri_id`, `kelas_id`, `tanggal_presensi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-01 00:00:00', 'Masuk', '2022-11-30 00:42:33', '2022-11-30 00:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `riwayat_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_prestasi` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `riwayat_prestasi`, `keterangan_prestasi`, `tanggal_prestasi`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'KA', 'wqeqwesad', '2023-01-06', NULL, '2023-01-06 16:05:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(2, 'admin', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(3, 'walisantri ', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(4, 'santri ', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesantren_id` bigint(20) NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_santri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_santri` date NOT NULL,
  `alamat_santri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_santri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamar_santri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asrama_santri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `pesantren_id`, `nis`, `nama_santri`, `tanggal_lahir_santri`, `alamat_santri`, `foto_santri`, `nama_ayah`, `nama_ibu`, `kamar_santri`, `asrama_santri`, `status_aktif`, `created_at`, `updated_at`) VALUES
(1, 1, '0001', 'Santri Saleh', '2022-11-29', 'Jl CIP', 'Santri Saleh', 'ASYAH', 'ASBU', 'Melati', 'Wali Santri', 'yes', NULL, NULL),
(2, 1, '0002', 'Yunus', '2022-11-29', 'Jl CIP', 'Santri Saleh', 'ASYAH', 'ASBU', 'Melati', 'Wali Santri', 'yes', NULL, NULL),
(5, 1, '123213', '123123', '2022-12-12', '213123', '20230106145516.jpg', '123213', '123213', '123213', '123213', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesantren_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `walisantri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pesantren_id`, `pegawai_id`, `walisantri_id`) VALUES
(1, 'Super Admin', 'superadmin@superadmin.com', '2022-12-20 13:09:53', '$2y$10$4WTRbBFdjP5V9NRRo0idHu3kebdBXERQNBepX2CdqzUsJBzBSsMeO', 'GfFTn6oKSB', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, 1, 0),
(2, 'Admin', 'admin@admin.com', '2022-12-20 13:09:53', '$2y$10$DkqnHswXOzqpYR0mpX4un.rXjnowFwTKQJNuVktMBNpANzyp8E2gS', 'cEg5JpYRu1OqPylET4vY8CMBNmRaqHMNiEUmdvER4nEoNBhpAHddBsbVigtj', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, 1, 0),
(3, 'Wali Murid', 'walimurid@walimurid.com', '2022-12-20 13:09:53', '$2y$10$WcIRAjsqqtPTOOeEe3wIL.FIj4RU8S25QqZGqnlipKjungkO.2che', 'REzjiYqbvn', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, 1, 1),
(4, 'Santri', 'santri@santri.com', '2022-12-20 13:09:53', '$2y$10$aWqLFL5M2V7eEKas6zWFkupOX8QACpDHrmxzjpaKvo/RxMnCQPxvi', 'uhysNYXi9T', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, 1, 0),
(9, 'Employee', 'employee@satu.com', NULL, '$2y$10$3tAECPszE49GdLcgqT.9Z.Fscz/TTm8vR2n.4q4kZNTimnqMhuzRG', NULL, '2022-12-23 03:10:54', '2022-12-23 03:10:54', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `walisantri`
--

CREATE TABLE `walisantri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_walisantri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_walisantri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_walisantri` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walisantri`
--

INSERT INTO `walisantri` (`id`, `nama_walisantri`, `kontak_walisantri`, `email_walisantri`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'Wali Santri Saleh', '098765432456', 'wali@gmail.com', NULL, NULL, 1),
(2, 'Painem', '0821391239', 'painem@gmail.com', '2022-12-20 08:57:15', '2022-12-20 08:57:15', 2);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `konfirmasi_pembayaran_spp`
--
ALTER TABLE `konfirmasi_pembayaran_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesantren`
--
ALTER TABLE `pesantren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_pegawai`
--
ALTER TABLE `presensi_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_santri_pada_asrama`
--
ALTER TABLE `presensi_santri_pada_asrama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_santri_pada_kelas`
--
ALTER TABLE `presensi_santri_pada_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran_spp`
--
ALTER TABLE `konfirmasi_pembayaran_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesantren`
--
ALTER TABLE `pesantren`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presensi_pegawai`
--
ALTER TABLE `presensi_pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presensi_santri_pada_asrama`
--
ALTER TABLE `presensi_santri_pada_asrama`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi_santri_pada_kelas`
--
ALTER TABLE `presensi_santri_pada_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `walisantri`
--
ALTER TABLE `walisantri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
