<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h3 class="mb-1">Selamat Datang, <?= session()->get('nama_lengkap'); ?></h3>
                    <p class="mb-0 text-muted">Dashboard Administrator Sistem Informasi Surat Masuk dan Keluar</p>
                </div>
                <div class="text-right mt-3 mt-md-0">
                    <h4 id="jam-sekarang" class="mb-1 text-primary"></h4>
                    <p id="tanggal-sekarang" class="mb-0 text-muted"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalRole; ?></h3>
                <p>Data Role</p>
            </div>
            <div class="icon"><i class="fas fa-user-tag"></i></div>
            <a href="<?= base_url('/roles'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalUser; ?></h3>
                <p>Data User</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="<?= base_url('/users'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $totalKategori; ?></h3>
                <p>Kategori Surat</p>
            </div>
            <div class="icon"><i class="fas fa-folder-open"></i></div>
            <a href="<?= base_url('/kategori-surat'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3><?= $totalStatus; ?></h3>
                <p>Status Surat</p>
            </div>
            <div class="icon"><i class="fas fa-info-circle"></i></div>
            <a href="<?= base_url('/status-surat'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totalSuratMasuk; ?></h3>
                <p>Surat Masuk</p>
            </div>
            <div class="icon"><i class="fas fa-envelope-open-text"></i></div>
            <a href="<?= base_url('/surat-masuk'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totalSuratKeluar; ?></h3>
                <p>Surat Keluar</p>
            </div>
            <div class="icon"><i class="fas fa-paper-plane"></i></div>
            <a href="<?= base_url('/surat-keluar'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3><?= $totalDisposisi; ?></h3>
                <p>Disposisi Surat</p>
            </div>
            <div class="icon"><i class="fas fa-share-square"></i></div>
            <a href="<?= base_url('/disposisi-surat'); ?>" class="small-box-footer">
                Buka <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-body text-center position-relative" style="min-height: 320px; overflow: hidden;">
        
        <img src="<?= base_url('assets/img/logo-bapperida.png'); ?>"
             alt="Logo Bapperida"
             style="
                max-width: 260px;
                opacity: 0.10;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
             ">

        <div class="position-relative" style="z-index: 2; padding-top: 70px;">
            <h2 class="font-weight-bold text-primary mb-2">Sistem Informasi Surat Masuk dan Keluar</h2>
            <h4 class="text-dark mb-2">Bapperida Provinsi Papua</h4>
            <p class="text-muted mb-0">
                Media pengelolaan, monitoring, dan pengarsipan surat masuk, surat keluar, serta disposisi surat secara terintegrasi.
            </p>
        </div>
    </div>
</div>

<script>
    function updateJamTanggal() {
        const now = new Date();

        const jam = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });

        const tanggal = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        document.getElementById('jam-sekarang').innerHTML = jam + ' WIT';
        document.getElementById('tanggal-sekarang').innerHTML = tanggal;
    }

    updateJamTanggal();
    setInterval(updateJamTanggal, 1000);
</script>

<?= $this->endSection(); ?>