<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit Kategori Surat</div>
    <div class="card-body">
        <form action="<?= base_url('/kategori-surat/update/' . $kategori['id_kategori']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?= esc($kategori['nama_kategori']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4"><?= esc($kategori['keterangan']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/kategori-surat'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>