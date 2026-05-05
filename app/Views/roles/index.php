<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('/roles/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Role
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Role</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($roles as $role): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($role['nama_role']); ?></td>
                    <td>
                        <a href="<?= base_url('/roles/edit/' . $role['id_role']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('/roles/delete/' . $role['id_role']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
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