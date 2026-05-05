<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalSuratMasuk; ?></h3>
                <p>Monitoring Surat Masuk</p>
            </div>
            <div class="icon"><i class="fas fa-envelope-open-text"></i></div>
            <a href="<?= base_url('/surat-masuk'); ?>" class="small-box-footer">
                Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalSuratKeluar; ?></h3>
                <p>Monitoring Surat Keluar</p>
            </div>
            <div class="icon"><i class="fas fa-paper-plane"></i></div>
            <a href="<?= base_url('/surat-keluar'); ?>" class="small-box-footer">
                Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totalDisposisi; ?></h3>
                <p>Monitoring Disposisi</p>
            </div>
            <div class="icon"><i class="fas fa-share-square"></i></div>
            <a href="<?= base_url('/disposisi-surat'); ?>" class="small-box-footer">
                Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>