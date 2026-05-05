<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Edit Role</div>
    <div class="card-body">
        <form action="<?= base_url('/roles/update/' . $role['id_role']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>Nama Role</label>
                <input type="text" name="nama_role" value="<?= esc($role['nama_role']); ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('/roles'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>