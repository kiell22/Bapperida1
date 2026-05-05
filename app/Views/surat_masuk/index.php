<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <?php if(session()->get('nama_role') == 'admin'): ?>
            <a href="<?= base_url('/surat-masuk/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Surat Masuk
            </a>
        <?php else: ?>
            <strong>Monitoring Surat Masuk</strong>
        <?php endif; ?>
    </div>


    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Agenda</th>
                    <th>No Surat</th>
                    <th>Tgl Surat</th>
                    <th>Tgl Diterima</th>
                    <th>Asal Surat</th>
                    <th>Perihal</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Sifat</th>
                    <th>Dibuat Oleh</th>
                    <?php if(session()->get('nama_role') == 'admin'): ?>
                        <th width="180">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($suratMasuk as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($row['nomor_agenda']); ?></td>
                    <td><?= esc($row['nomor_surat']); ?></td>
                    <td><?= esc($row['tanggal_surat']); ?></td>
                    <td><?= esc($row['tanggal_diterima']); ?></td>
                    <td><?= esc($row['asal_surat']); ?></td>
                    <td><?= esc($row['perihal']); ?></td>
                    <td><?= esc($row['nama_kategori'] ?? '-'); ?></td>
                    <td><?= esc($row['nama_status'] ?? '-'); ?></td>
                    <td><?= esc($row['sifat_surat']); ?></td>
                    <td><?= esc($row['nama_lengkap']); ?></td>
                    <?php if(session()->get('nama_role') == 'admin'): ?>
                    <td>
                        <a href="<?= base_url('/surat-masuk/edit/' . $row['id_surat_masuk']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('/surat-masuk/delete/' . $row['id_surat_masuk']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>