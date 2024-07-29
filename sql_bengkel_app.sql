-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2024 pada 04.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_bengkel_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `bengkel_id` int(11) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0,1',
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `bengkel_id`, `nm_barang`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mesin Pres', 1, NULL, '2024-07-22 15:30:59', '2024-07-22 15:33:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bengkel`
--

CREATE TABLE `bengkel` (
  `id` int(11) NOT NULL,
  `nm_bengkel` varchar(255) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kel_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gambar` text DEFAULT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0,1',
  `ket` text DEFAULT NULL,
  `service` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bengkel`
--

INSERT INTO `bengkel` (`id`, `nm_bengkel`, `pemilik`, `hp`, `email`, `password`, `kec_id`, `kel_id`, `alamat`, `gambar`, `lat`, `lon`, `status`, `ket`, `service`, `created_at`, `updated_at`) VALUES
(3, 'Jaya Motor', 'Atan', '081234567898', 'jm@gmail.com', '$2y$10$M8fK0ijxHj6rj/lUyDwve..myGuroQWRAlEtOkUMgXM7h4bDcEnj6', 1, 2, 'Jl. abcd', '1717819471.png', '1.4730844087108095', '102.11494306000306', 1, NULL, '1. Bongkar Mesin, 2. Ganti Oli, 3. Ganti Ban', '2024-06-08 04:04:31', '2024-07-22 15:13:15'),
(5, 'abcd', 'Rahmat', '081234454321', 'aa@mail.com', '$2y$10$lEQOR0wkz0u.ZFlHXQuXoetesJk2U1XvA6oZ13YEXUw3T1Hl.Dx7W', 1, 2, 'Jl. abcd', 'messenger.png', '1.4777333569635904', '102.12660725087616', 1, NULL, '1. Ganti oli, 2. Ganti ban, 3. Service Mesin', '2024-06-18 13:26:16', '2024-07-22 15:13:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-01-16 15:06:25', '2023-01-16 08:06:25'),
(2, 'Montir', '2023-01-16 15:06:25', '2024-06-04 09:19:41'),
(3, 'Pengguna', '2023-01-16 15:06:31', '2024-06-04 09:19:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `bengkel_id` int(11) NOT NULL,
  `nm_jasa` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec`
--

CREATE TABLE `kec` (
  `id` int(11) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kec`
--

INSERT INTO `kec` (`id`, `kec`, `created_at`, `updated_at`) VALUES
(1, 'Siak Kecil', '2024-06-08 02:49:20', '2024-06-08 02:49:20'),
(2, 'Bukit Batu', '2024-06-08 02:49:20', '2024-06-08 02:49:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kel`
--

CREATE TABLE `kel` (
  `id` int(11) NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kel` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kel`
--

INSERT INTO `kel` (`id`, `kec_id`, `kel`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lubuk Muda', '2024-06-08 02:49:45', '2024-06-08 02:49:45'),
(2, 1, 'Liang Banir', '2024-06-08 02:49:45', '2024-06-08 02:49:45'),
(3, 2, 'Sungai Pakning', '2024-06-08 02:50:07', '2024-06-08 02:50:18'),
(4, 2, 'Sejangat', '2024-06-08 02:50:07', '2024-06-08 02:50:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `judul_mobile` text NOT NULL,
  `short` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `footer` text NOT NULL,
  `versi` varchar(255) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masters`
--

INSERT INTO `masters` (`id`, `judul`, `judul_mobile`, `short`, `ket`, `logo`, `favicon`, `footer`, `versi`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi Pencarian Bengkel dan Pemesanan Service Sepeda Motor', 'BENGKEL APP', 'BENGKEL APP', 'Aplikasi Pencarian Bengkel <br> dan Pemesanan Service Sepeda Motor', 'logo.png', 'favicon.png', 'BENGKEL APP', '1.0.0', '1-800-123-4567', '2022-12-31 16:58:59', '2022-12-31 14:53:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `password` text NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kel_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `hp`, `password`, `kec_id`, `kel_id`, `alamat`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Badu aa', 'badu@gmail.com', '081234567891', '$2y$10$QW5Lablwi3qeD6zi8eqgjOWTBN3JnRM7j1Xye45CTMm15FMbPJLci', 1, 1, 'sdsdsd', '1718669008.png', 1, '2024-06-18 00:03:28', '2024-07-23 02:26:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `bengkel_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `balasan_komentar` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `bengkel_id`, `pengguna_id`, `rating`, `komentar`, `balasan_komentar`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4, 'Bagus dan cepat', 'zxzxzx sasas aaa', 1, '2024-07-22 13:58:55', '2024-07-23 01:46:55'),
(2, 3, 1, 3, 'Bagus dan cepat', NULL, 0, '2024-07-22 13:58:55', '2024-07-22 14:19:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `bengkel_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `ket` text NOT NULL,
  `balas` text DEFAULT NULL,
  `biaya` int(11) NOT NULL DEFAULT 0,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=baru, 1=proses, 2=selesai, 99=tolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `bengkel_id`, `pengguna_id`, `ket`, `balas`, `biaya`, `lat`, `lon`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'mmmm', NULL, 0, '0.4882432', '101.4202368', '1721313765.png', 2, '2024-07-18 14:42:46', '2024-07-22 15:07:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hak_akses_id` int(11) NOT NULL,
  `bengkel_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=Nonaktif, 1=Aktif',
  `player_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `hak_akses_id`, `bengkel_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `player_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Administrator', 'admin@mail.com', NULL, '$2y$10$M8fK0ijxHj6rj/lUyDwve..myGuroQWRAlEtOkUMgXM7h4bDcEnj6', NULL, 1, NULL, '2023-05-09 11:00:00', '2024-06-18 00:36:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bengkel`
--
ALTER TABLE `bengkel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kec`
--
ALTER TABLE `kec`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kel`
--
ALTER TABLE `kel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bengkel`
--
ALTER TABLE `bengkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kec`
--
ALTER TABLE `kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kel`
--
ALTER TABLE `kel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
