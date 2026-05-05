-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2026 pada 17.47
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
-- Database: `bapperida`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `tujuan_disposisi` varchar(150) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat_disposisi` enum('biasa','penting','segera','rahasia') DEFAULT 'biasa',
  `status_disposisi` enum('belum ditindaklanjuti','diproses','selesai') DEFAULT 'belum ditindaklanjuti',
  `dibuat_oleh` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `disposisi_surat`
--

INSERT INTO `disposisi_surat` (`id_disposisi`, `id_surat_masuk`, `tanggal_disposisi`, `tujuan_disposisi`, `isi_disposisi`, `sifat_disposisi`, `status_disposisi`, `dibuat_oleh`, `created_at`) VALUES
(1, 1, '2026-03-11', 'Bidang Perencanaan', 'Mohon dipelajari dan siapkan data dukung yang dibutuhkan.', 'penting', 'diproses', 1, '2026-04-12 11:48:55'),
(2, 2, '2026-03-13', 'Sekretariat', 'Agar dijadwalkan untuk menghadiri rapat koordinasi.', 'biasa', 'selesai', 1, '2026-04-12 11:48:55'),
(3, 3, '2026-03-15', 'Bidang Anggaran', 'Segera lakukan koordinasi terkait sinkronisasi anggaran.', 'segera', 'diproses', 1, '2026-04-12 11:48:55'),
(4, 4, '2026-03-17', 'Bidang Data dan Evaluasi', 'Arsipkan dan distribusikan ke unit terkait.', 'biasa', 'selesai', 1, '2026-04-12 11:48:55'),
(5, 5, '2026-03-19', 'Kepala Bapperida', 'Dokumen bersifat terbatas, mohon ditindaklanjuti secara internal.', 'rahasia', 'belum ditindaklanjuti', 1, '2026-04-12 11:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_surat`
--

CREATE TABLE `kategori_surat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_surat`
--

INSERT INTO `kategori_surat` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'Undangan', 'Surat undangan rapat, forum, atau kegiatan resmi'),
(2, 'Permohonan', 'Surat permohonan data, bantuan, atau dukungan'),
(3, 'Laporan', 'Surat laporan kegiatan atau hasil pelaksanaan'),
(4, 'Pemberitahuan', 'Surat pemberitahuan resmi'),
(5, 'Instruksi', 'Surat berisi arahan atau instruksi pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `tabel_terkait` varchar(50) NOT NULL,
  `id_data` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `tabel_terkait`, `id_data`, `keterangan`, `waktu`) VALUES
(1, 1, 'Login', 'users', 1, 'Admin masuk ke sistem', '2026-04-12 11:48:55'),
(2, 1, 'Tambah Data', 'surat_masuk', 1, 'Menambahkan surat masuk SM-001', '2026-04-12 11:48:55'),
(3, 1, 'Tambah Data', 'surat_masuk', 2, 'Menambahkan surat masuk SM-002', '2026-04-12 11:48:55'),
(4, 1, 'Tambah Data', 'surat_keluar', 1, 'Menambahkan surat keluar SK-001', '2026-04-12 11:48:55'),
(5, 1, 'Tambah Data', 'surat_keluar', 2, 'Menambahkan surat keluar SK-002', '2026-04-12 11:48:55'),
(6, 1, 'Tambah Data', 'disposisi_surat', 1, 'Menambahkan disposisi surat masuk', '2026-04-12 11:48:55'),
(7, 2, 'Monitoring', 'surat_masuk', 1, 'Pegawai melihat data surat masuk', '2026-04-12 11:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_surat`
--

CREATE TABLE `status_surat` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_surat`
--

INSERT INTO `status_surat` (`id_status`, `nama_status`, `keterangan`) VALUES
(1, 'Masuk', 'Surat telah diterima dan dicatat'),
(2, 'Diproses', 'Surat sedang diproses'),
(3, 'Di disposisikan', 'Surat telah didisposisikan ke bagian terkait'),
(4, 'Selesai', 'Surat telah selesai ditindaklanjuti'),
(5, 'Keluar', 'Surat telah diterbitkan atau dikirim'),
(6, 'Dikirim', 'Surat keluar telah dikirim ke tujuan'),
(7, 'Diarsipkan', 'Surat telah diarsipkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `nomor_agenda` varchar(50) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_surat` varchar(150) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `sifat_surat` enum('biasa','penting','rahasia') DEFAULT 'biasa',
  `file_surat` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nomor_agenda`, `nomor_surat`, `tanggal_surat`, `tujuan_surat`, `perihal`, `id_kategori`, `id_status`, `sifat_surat`, `file_surat`, `keterangan`, `dibuat_oleh`, `created_at`) VALUES
(1, 'SK-001', '100/BAPPERIDA-PAPUA/III/2026', '2026-03-20', 'Bappeda Kabupaten Jayapura', 'Balasan Permohonan Data Perencanaan Daerah', 2, 6, 'penting', 'surat_keluar_001.pdf', 'Sudah dikirim via email dan fisik', 1, '2026-04-12 11:48:55'),
(2, 'SK-002', '101/BAPPERIDA-PAPUA/III/2026', '2026-03-21', 'DPR Papua', 'Konfirmasi Kehadiran Rapat Koordinasi', 1, 5, 'biasa', 'surat_keluar_002.pdf', 'Menunggu disposisi pimpinan', 1, '2026-04-12 11:48:55'),
(3, 'SK-003', '102/BAPPERIDA-PAPUA/III/2026', '2026-03-22', 'BPKAD Provinsi Papua', 'Penyampaian Data Sinkronisasi Anggaran', 2, 6, 'penting', 'surat_keluar_003.pdf', 'Sudah ditandatangani', 1, '2026-04-12 11:48:55'),
(4, 'SK-004', '103/BAPPERIDA-PAPUA/III/2026', '2026-03-23', 'BPS Provinsi Papua', 'Permintaan Data Tambahan Statistik', 4, 5, 'biasa', 'surat_keluar_004.pdf', 'Untuk kebutuhan laporan tahunan', 1, '2026-04-12 11:48:55'),
(5, 'SK-005', '104/BAPPERIDA-PAPUA/III/2026', '2026-03-24', 'Kementerian Dalam Negeri', 'Pengiriman Dokumen Evaluasi Perencanaan', 5, 7, 'rahasia', 'surat_keluar_005.pdf', 'Dikirim terbatas', 1, '2026-04-12 11:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `nomor_agenda` varchar(50) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `asal_surat` varchar(150) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `sifat_surat` enum('biasa','penting','rahasia') DEFAULT 'biasa',
  `file_surat` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nomor_agenda`, `nomor_surat`, `tanggal_surat`, `tanggal_diterima`, `asal_surat`, `perihal`, `id_kategori`, `id_status`, `sifat_surat`, `file_surat`, `keterangan`, `dibuat_oleh`, `created_at`) VALUES
(1, 'SM-001', '005/BAPPEDA-KAB/III/2026', '2026-03-10', '2026-03-11', 'Bappeda Kabupaten Jayapura', 'Permohonan Data Perencanaan Daerah', 2, 2, 'penting', 'surat_masuk_001.pdf', 'Segera ditindaklanjuti', 1, '2026-04-12 11:48:55'),
(2, 'SM-002', '010/DPRP/III/2026', '2026-03-12', '2026-03-13', 'DPR Papua', 'Undangan Rapat Koordinasi Pembangunan', 1, 3, 'biasa', 'surat_masuk_002.pdf', 'Jadwalkan ke pimpinan', 1, '2026-04-12 11:48:55'),
(3, 'SM-003', '020/BPKAD/III/2026', '2026-03-14', '2026-03-15', 'BPKAD Provinsi Papua', 'Permintaan Sinkronisasi Anggaran', 2, 2, 'penting', 'surat_masuk_003.pdf', 'Perlu koordinasi internal', 1, '2026-04-12 11:48:55'),
(4, 'SM-004', '031/BPS/III/2026', '2026-03-16', '2026-03-17', 'BPS Provinsi Papua', 'Penyampaian Data Statistik Papua', 4, 4, 'biasa', 'surat_masuk_004.pdf', 'Arsipkan dan distribusikan', 1, '2026-04-12 11:48:55'),
(5, 'SM-005', '045/KEMENDAGRI/III/2026', '2026-03-18', '2026-03-19', 'Kementerian Dalam Negeri', 'Evaluasi Dokumen Perencanaan Tahunan', 5, 3, 'biasa', 'surat_masuk_005.pdf', 'Khusus admin dan pimpinan', 1, '2026-04-12 11:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `status_aktif` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nip`, `nama_lengkap`, `username`, `password`, `email`, `jabatan`, `id_role`, `status_aktif`, `created_at`) VALUES
(1, '91010001', 'Administrator Bapperida', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@bapperida-papua.go.id', 'Admin Sistem', 1, 'aktif', '2026-04-12 11:48:55'),
(2, '91010002', 'Pegawai Monitoring', 'pegawai', 'b69706c80477d3d04ecc1d8f62cdb35a', 'pegawai@bapperida-papua.go.id', 'Staf Monitoring', 2, 'aktif', '2026-04-12 11:48:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `fk_disposisi_surat_masuk` (`id_surat_masuk`),
  ADD KEY `fk_disposisi_users` (`dibuat_oleh`);

--
-- Indeks untuk tabel `kategori_surat`
--
ALTER TABLE `kategori_surat`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_users` (`id_user`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `nama_role` (`nama_role`);

--
-- Indeks untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `nama_status` (`nama_status`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `fk_surat_keluar_kategori` (`id_kategori`),
  ADD KEY `fk_surat_keluar_status` (`id_status`),
  ADD KEY `fk_surat_keluar_users` (`dibuat_oleh`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `fk_surat_masuk_kategori` (`id_kategori`),
  ADD KEY `fk_surat_masuk_status` (`id_status`),
  ADD KEY `fk_surat_masuk_users` (`dibuat_oleh`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_users_roles` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_surat`
--
ALTER TABLE `kategori_surat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD CONSTRAINT `fk_disposisi_surat_masuk` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_disposisi_users` FOREIGN KEY (`dibuat_oleh`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_log_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `fk_surat_keluar_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_surat` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_keluar_status` FOREIGN KEY (`id_status`) REFERENCES `status_surat` (`id_status`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_keluar_users` FOREIGN KEY (`dibuat_oleh`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `fk_surat_masuk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_surat` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_masuk_status` FOREIGN KEY (`id_status`) REFERENCES `status_surat` (`id_status`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_masuk_users` FOREIGN KEY (`dibuat_oleh`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
