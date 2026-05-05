<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('/kategori-surat/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($kategori as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($row['nama_kategori']); ?></td>
                    <td><?= esc($row['keterangan']); ?></td>
                    <td>
                        <a href="<?= base_url('/kategori-surat/edit/' . $row['id_kategori']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('/kategori-surat/delete/' . $row['id_kategori']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>