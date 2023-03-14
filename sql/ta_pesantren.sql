-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.2
-- Generation Time: Mar 14, 2023 at 07:12 AM
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
-- Table structure for table `broadcast_notifikasi`
--

CREATE TABLE `broadcast_notifikasi` (
  `id` bigint(20) NOT NULL,
  `pesantren_id` int(11) NOT NULL,
  `walisantri_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_guru` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `walikelas` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_guru` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesantren_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `alamat_guru`, `foto_guru`, `tanggal_lahir_guru`, `jenis_kelamin`, `nomor_guru`, `pendidikan_guru`, `walikelas`, `kategori_guru`, `nuptk`, `jabatan`, `status_aktif`, `tanggal_masuk`, `created_at`, `updated_at`, `pesantren_id`) VALUES
(1, 'Guru 1', 'Alamat 1', '20230312040056.png', '1995-03-12', 'Laki-Laki', '08213882717', 'Sarjana', 'yes', 'Tetap', '-', 'Guru', 1, '2023-03-12', '2023-03-12 04:00:56', '2023-03-12 04:01:21', 1);

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
(3, 'App\\Models\\User', 4);

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

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) NOT NULL,
  `walisantri_id` int(11) NOT NULL,
  `email_username` varchar(100) NOT NULL,
  `judul_pemberitahuan` varchar(50) NOT NULL,
  `detail_pemberitahuan` text NOT NULL,
  `tanggal_pemberitahuan` datetime NOT NULL,
  `status_terbaca` int(11) NOT NULL COMMENT '0=belum, 1=terbaca',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jenis_kelamin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status_aktif` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesantren_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `alamat_pegawai`, `kontak_pegawai`, `foto_pegawai`, `tanggal_lahir_pegawai`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status_aktif`, `created_at`, `updated_at`, `pesantren_id`) VALUES
(1, 'Pagawa 1', 'Alamat 1', '089233213213', '20230312034311.png', '1996-03-12', 'Laki-Laki', 'Guru', '2023-03-12', 1, '2023-03-12 03:43:11', '2023-03-12 03:48:17', 1);

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
(1, 'Spp', 'Tunai', '500000', '2023-03-13 03:11:56', '2023-03-13 03:11:56', 1),
(2, 'Spp', 'Transfer', '500000', '2023-03-13 03:12:13', '2023-03-13 03:12:13', 1),
(3, 'Infaq', 'Tunai', '500000', '2023-03-13 03:46:45', '2023-03-13 03:46:45', 1),
(4, 'Infaq', 'Transfer', '500000', '2023-03-13 03:47:04', '2023-03-13 03:47:04', 1),
(5, 'Daftar Ulang', 'Tunai', '1200000', '2023-03-13 03:52:29', '2023-03-13 03:52:29', 1),
(6, 'Daftar Ulang', 'Transfer', '1200000', '2023-03-13 03:52:48', '2023-03-13 03:52:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` int(11) NOT NULL,
  `riwayat_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `no_telepon` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesantren`
--

INSERT INTO `pesantren` (`id`, `nama_pesantren`, `alamat_pesantren`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1, 'Pesantren AL-AZHAR', 'Mesir', '0821321321', NULL, NULL),
(2, 'Pesantren AL-Hikmah', 'Surabaya', '0821312322', NULL, NULL);

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
(3, 'walisantri', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(4, 'santri', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53'),
(5, 'guru', 'web', '2022-12-20 13:09:53', '2022-12-20 13:09:53');

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
(3, 3),
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
  `jenis_kelamin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_santri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_santri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_spp_perbulan` double NOT NULL,
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

INSERT INTO `santri` (`id`, `pesantren_id`, `nis`, `nama_santri`, `tanggal_lahir_santri`, `jenis_kelamin`, `alamat_santri`, `foto_santri`, `nominal_spp_perbulan`, `nama_ayah`, `nama_ibu`, `kamar_santri`, `asrama_santri`, `status_aktif`, `created_at`, `updated_at`) VALUES
(1, 1, '1461600084', 'Santri', '1996-12-06', 'Laki-Laki', 'Jl. Surabaya', '20230310130443.jpg', 700000, 'Ayah', 'Ibu', 'Kamar Melati', 'Asrama Putri', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spp_bulanan`
--

CREATE TABLE `spp_bulanan` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `month` enum('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec') COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `spp` double(8,2) NOT NULL,
  `santri_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `walisantri_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pesantren_id`, `pegawai_id`, `walisantri_id`, `guru_id`) VALUES
(1, 'Super Admin', 'superadmin@superadmin.com', '2022-12-20 13:09:53', '$2y$10$4WTRbBFdjP5V9NRRo0idHu3kebdBXERQNBepX2CdqzUsJBzBSsMeO', '973JewW9pBcDN68aLE13qlc0szpkF7ocQBj26nTqUtBJZGEOIl03KmBgbhH4', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, NULL, 0, 0),
(2, 'Admin', 'admin@admin.com', '2022-12-20 13:09:53', '$2y$10$DkqnHswXOzqpYR0mpX4un.rXjnowFwTKQJNuVktMBNpANzyp8E2gS', 'aM6OXxqkw17a2TWkpeTY5IqgVunSbq6VGkTaDjC8ODaZR8cZCRs1QTqTjWPt', '2022-12-20 13:09:53', '2022-12-20 13:09:53', 1, NULL, 0, 0),
(4, 'Walisantri', 'walisantri@walisantri.com', NULL, '$2a$12$SXtWJ5BbObxPo1ohrDQ/KeF7TJc9Um4MVM/PNQCDnMbQ.lOGKCwz.', NULL, '2023-03-10 13:20:22', '2023-03-10 13:20:22', 1, NULL, 1, 0);

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
  `santri_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walisantri`
--

INSERT INTO `walisantri` (`id`, `nama_walisantri`, `kontak_walisantri`, `email_walisantri`, `created_at`, `updated_at`, `santri_id`) VALUES
(1, 'Walisantri', '+6282139661296', 'walisantri@walisantri.com', '2023-03-10 13:20:22', '2023-03-10 13:21:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcast_notifikasi`
--
ALTER TABLE `broadcast_notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
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
-- Indexes for table `walisantri`
--
ALTER TABLE `walisantri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcast_notifikasi`
--
ALTER TABLE `broadcast_notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran_spp`
--
ALTER TABLE `konfirmasi_pembayaran_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi_pegawai`
--
ALTER TABLE `presensi_pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi_santri_pada_kelas`
--
ALTER TABLE `presensi_santri_pada_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `walisantri`
--
ALTER TABLE `walisantri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
