<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Surat Bapperida Papua'; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .main-sidebar {
            background: #ffffff !important;
            border-right: 1px solid #dee2e6;
        }

        .brand-link {
            background: #ffffff !important;
            border-bottom: 1px solid #dee2e6 !important;
            color: #343a40 !important;
        }

        .brand-link .brand-text {
            color: #343a40 !important;
            font-weight: 600;
        }

        .sidebar .user-panel {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .sidebar .user-panel .info a {
            color: #343a40 !important;
            font-weight: 500;
        }

        .nav-sidebar .nav-link {
            color: #343a40 !important;
            border-radius: 8px;
            margin: 4px 8px;
        }

        .nav-sidebar .nav-link .nav-icon {
            color: #6c757d !important;
        }

        .nav-sidebar .nav-link:hover {
            background-color: #e9ecef !important;
            color: #0d6efd !important;
        }

        .nav-sidebar .nav-link:hover .nav-icon {
            color: #0d6efd !important;
        }

        .nav-sidebar .nav-link.active {
            background-color: #0d6efd !important;
            color: #ffffff !important;
        }

        .nav-sidebar .nav-link.active .nav-icon {
            color: #ffffff !important;
        }

        .main-header.navbar {
            border-bottom: 1px solid #dee2e6;
        }

        .content-wrapper {
            background-color: #f4f6f9 !important;
            min-height: calc(100vh - 57px) !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link">
                    <?= session()->get('nama_lengkap'); ?> (<?= session()->get('nama_role'); ?>)
                </span>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/logout'); ?>" class="nav-link text-danger">Logout</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar elevation-2">
        <a href="<?= session()->get('nama_role') == 'admin' ? base_url('/dashboard/admin') : base_url('/dashboard/pegawai'); ?>"
           class="brand-link text-center d-flex flex-column align-items-center justify-content-center"
           style="height: 110px;">
            <img src="<?= base_url('assets/img/logo-bapperida.png'); ?>"
                 alt="Logo Bapperida"
                 style="width: 45px; height: 45px; object-fit: contain; margin-bottom: 8px;">
            <span class="brand-text font-weight-light">SIMDIS</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                <div class="info text-center">
                    <a href="#" class="d-block">
                        <?= session()->get('nama_lengkap'); ?>
                    </a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <?php if (session()->get('nama_role') == 'admin'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/dashboard/admin'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard Admin</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/roles'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>Data Role</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/users'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data User</p>
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a href="<?= base_url('/kategori-surat'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>Kategori Surat</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/status-surat'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>Status Surat</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/surat-masuk'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-envelope-open-text"></i>
                                <p>Surat Masuk</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/surat-keluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>Surat Keluar</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/disposisi-surat'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-share-square"></i>
                                <p>Disposisi Surat</p>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (session()->get('nama_role') == 'pegawai'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/dashboard/pegawai'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard Pegawai</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/surat-masuk'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-envelope-open-text"></i>
                                <p>Monitoring Surat Masuk</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/surat-keluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>Monitoring Surat Keluar</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/disposisi-surat'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-share-square"></i>
                                <p>Monitoring Disposisi</p>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a href="<?= base_url('/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1><?= $pageTitle ?? 'Halaman'; ?></h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content'); ?>
            </div>
        </section>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>