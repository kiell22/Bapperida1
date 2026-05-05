<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form action="<?= base_url('/users/update/' . $user['id_user']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" value="<?= esc($user['nip']); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= esc($user['nama_lengkap']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= esc($user['username']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= esc($user['email']); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="<?= esc($user['jabatan']); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="id_role" class="form-control" required>
                    <?php foreach($roles as $role): ?>
                        <option value="<?= $role['id_role']; ?>" <?= $user['id_role'] == $role['id_role'] ? 'selected' : ''; ?>>
                            <?= esc($role['nama_role']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status Aktif</label>
                <select name="status_aktif" class="form-control" required>
                    <option value="aktif" <?= $user['status_aktif'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="nonaktif" <?= $user['status_aktif'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/users'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>