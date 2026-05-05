<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <?php if(session()->get('nama_role') == 'admin'): ?>
            <a href="<?= base_url('/disposisi-surat/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Disposisi
            </a>
        <?php else: ?>
            <strong>Monitoring Disposisi Surat</strong>
        <?php endif; ?>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Asal Surat</th>
                    <th>Perihal</th>
                    <th>Tanggal Disposisi</th>
                    <th>Tujuan Disposisi</th>
                    <th>Sifat</th>
                    <th>Status</th>
                    <th>Dibuat Oleh</th>
                    <?php if(session()->get('nama_role') == 'admin'): ?>
                        <th width="180">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($disposisi as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($row['nomor_surat']); ?></td>
                    <td><?= esc($row['asal_surat']); ?></td>
                    <td><?= esc($row['perihal']); ?></td>
                    <td><?= esc($row['tanggal_disposisi']); ?></td>
                    <td><?= esc($row['tujuan_disposisi']); ?></td>
                    <td><?= esc($row['sifat_disposisi']); ?></td>
                    <td><?= esc($row['status_disposisi']); ?></td>
                    <td><?= esc($row['nama_lengkap']); ?></td>
                    <?php if(session()->get('nama_role') == 'admin'): ?>
                    <td>
                        <a href="<?= base_url('/disposisi-surat/edit/' . $row['id_disposisi']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('/disposisi-surat/delete/' . $row['id_disposisi']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
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