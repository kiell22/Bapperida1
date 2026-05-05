<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit Status Surat</div>
    <div class="card-body">
        <form action="<?= base_url('/status-surat/update/' . $status['id_status']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>Nama Status</label>
                <input type="text" name="nama_status" value="<?= esc($status['nama_status']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4"><?= esc($status['keterangan']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/status-surat'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>