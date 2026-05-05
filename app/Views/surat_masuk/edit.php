<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit Surat Masuk</div>
    <div class="card-body">
        <form action="<?= base_url('/surat-masuk/update/' . $surat['id_surat_masuk']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>Nomor Agenda</label>
                <input type="text" name="nomor_agenda" value="<?= esc($surat['nomor_agenda']); ?>" class="form-control" required>
            </div>

            
            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" name="nomor_surat" value="<?= esc($surat['nomor_surat']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggal_surat" value="<?= esc($surat['tanggal_surat']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Diterima</label>
                <input type="date" name="tanggal_diterima" value="<?= esc($surat['tanggal_diterima']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Asal Surat</label>
                <input type="text" name="asal_surat" value="<?= esc($surat['asal_surat']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Perihal</label>
                <input type="text" name="perihal" value="<?= esc($surat['perihal']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori Surat</label>
                <select name="id_kategori" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $item): ?>
                        <option value="<?= $item['id_kategori']; ?>" <?= $surat['id_kategori'] == $item['id_kategori'] ? 'selected' : ''; ?>>
                            <?= esc($item['nama_kategori']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status Surat</label>
                <select name="id_status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <?php foreach($status as $item): ?>
                        <option value="<?= $item['id_status']; ?>" <?= $surat['id_status'] == $item['id_status'] ? 'selected' : ''; ?>>
                            <?= esc($item['nama_status']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Sifat Surat</label>
                <select name="sifat_surat" class="form-control" required>
                    <option value="biasa" <?= $surat['sifat_surat'] == 'biasa' ? 'selected' : ''; ?>>Biasa</option>
                    <option value="penting" <?= $surat['sifat_surat'] == 'penting' ? 'selected' : ''; ?>>Penting</option>
                    <option value="rahasia" <?= $surat['sifat_surat'] == 'rahasia' ? 'selected' : ''; ?>>Rahasia</option>
                </select>
            </div>

            <div class="form-group">
                <label>File Surat</label>
                <input type="text" name="file_surat" value="<?= esc($surat['file_surat']); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4"><?= esc($surat['keterangan']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/surat-masuk'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>