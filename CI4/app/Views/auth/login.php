<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        .header { background:#007bff; color:#fff; padding:15px; text-align:center; }
        .footer { background:#333; color:#fff; text-align:center; padding:10px; }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h2>Table Mahasiswa</h2>
    </div>
        <div class="bg-light d-flex align-items-center justify-content-center vh-100">

        <div class="card shadow-lg p-4" style="width: 350px;">
            <h3 class="text-center mb-4">Login Admin</h3>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="/auth/doLogin" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
    <div class="footer">
        <p>&copy; <?= date('Y') ?> My Website</p>
    </div>
</body>
</html>
