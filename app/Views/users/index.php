<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('/users/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($users as $user): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($user['nip']); ?></td>
                    <td><?= esc($user['nama_lengkap']); ?></td>
                    <td><?= esc($user['username']); ?></td>
                    <td><?= esc($user['email']); ?></td>
                    <td><?= esc($user['jabatan']); ?></td>
                    <td><?= esc($user['nama_role']); ?></td>
                    <td><?= esc($user['status_aktif']); ?></td>
                    <td>
                        <a href="<?= base_url('/users/edit/' . $user['id_user']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('/users/delete/' . $user['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
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