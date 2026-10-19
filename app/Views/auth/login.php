<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

<style>
    body.login-page {
        background: url('<?= base_url('assets/img/bg-bapperida.jpg'); ?>') no-repeat center center fixed !important;
        background-size: cover !important;
    }
    body.login-page::before {
        content: '';
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 0;
    }
    .login-box {
        position: relative;
        z-index: 1;
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url('assets/img/logo-bapperida.png'); ?>" alt="Logo Bapperida">
        <div class="judul-app">SIMDIS</div>
        <div class="subjudul-app">Dinas Pendidikan Provinsi Papua</div>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silakan login untuk masuk ke sistem</p>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form id="formLogin" action="<?= base_url('/login/process'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-login">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </button>
            </form>

            <div class="footer-login">
                Sistem Informasi Surat Masuk dan Keluar
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formLogin').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Konfirmasi Login',
            text: 'Apakah Anda yakin ingin masuk ke sistem?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Login',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>

<?= $this->endSection(); ?>