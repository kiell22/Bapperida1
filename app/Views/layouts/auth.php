<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login'; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body.login-page {
            min-height: 100vh;
            background: #f4f6f9;
        }

        .login-box {
            width: 430px;
        }

        .login-logo {
            margin-bottom: 18px;
            text-align: center;
        }

        .login-logo img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .login-logo .judul-app {
            font-size: 28px;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 2px;
        }

        .login-logo .subjudul-app {
            font-size: 15px;
            color: #fff126;
        }

        .card {
            border: 0;
            border-radius: 14px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .login-card-body {
            border-radius: 14px;
            padding: 28px;
        }

        .login-box-msg {
            font-size: 15px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
        }

        .input-group-text {
            border-radius: 0 8px 8px 0;
            background: #f8f9fa;
        }

        .btn-login {
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
        }

        .footer-login {
            text-align: center;
            margin-top: 16px;
            color: #6c757d;
            font-size: 13px;
        }

        .alert {
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body class="hold-transition login-page">

    <?= $this->renderSection('content'); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>