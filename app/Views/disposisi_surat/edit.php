<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit Disposisi Surat</div>
    <div class="card-body">
        <form action="<?= base_url('/disposisi-surat/update/' . $disposisi['id_disposisi']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>Surat Masuk</label>
                <select name="id_surat_masuk" class="form-control" required>
                    <option value="">-- Pilih Surat Masuk --</option>
                    <?php foreach($suratMasuk as $item): ?>
                        <option value="<?= $item['id_surat_masuk']; ?>" <?= $disposisi['id_surat_masuk'] == $item['id_surat_masuk'] ? 'selected' : ''; ?>>
                            <?= esc($item['nomor_surat']); ?> - <?= esc($item['asal_surat']); ?> - <?= esc($item['perihal']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Disposisi</label>
                <input type="date" name="tanggal_disposisi" value="<?= esc($disposisi['tanggal_disposisi']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tujuan Disposisi</label>
                <input type="text" name="tujuan_disposisi" value="<?= esc($disposisi['tujuan_disposisi']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Isi Disposisi</label>
                <textarea name="isi_disposisi" class="form-control" rows="4" required><?= esc($disposisi['isi_disposisi']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Sifat Disposisi</label>
                <select name="sifat_disposisi" class="form-control" required>
                    <option value="biasa" <?= $disposisi['sifat_disposisi'] == 'biasa' ? 'selected' : ''; ?>>Biasa</option>
                    <option value="penting" <?= $disposisi['sifat_disposisi'] == 'penting' ? 'selected' : ''; ?>>Penting</option>
                    <option value="segera" <?= $disposisi['sifat_disposisi'] == 'segera' ? 'selected' : ''; ?>>Segera</option>
                    <option value="rahasia" <?= $disposisi['sifat_disposisi'] == 'rahasia' ? 'selected' : ''; ?>>Rahasia</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status Disposisi</label>
                <select name="status_disposisi" class="form-control" required>
                    <option value="belum ditindaklanjuti" <?= $disposisi['status_disposisi'] == 'belum ditindaklanjuti' ? 'selected' : ''; ?>>Belum Ditindaklanjuti</option>
                    <option value="diproses" <?= $disposisi['status_disposisi'] == 'diproses' ? 'selected' : ''; ?>>Diproses</option>
                    <option value="selesai" <?= $disposisi['status_disposisi'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/disposisi-surat'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>