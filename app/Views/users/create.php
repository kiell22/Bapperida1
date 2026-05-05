<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Tambah User</div>
    <div class="card-body">
        <form action="<?= base_url('/users/store'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="id_role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <?php foreach($roles as $role): ?>
                        <option value="<?= $role['id_role']; ?>"><?= esc($role['nama_role']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status Aktif</label>
                <select name="status_aktif" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('/users'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>