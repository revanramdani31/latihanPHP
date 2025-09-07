<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detail Mahasiswa</h4>
            </div>
            <div class="card-body">
                <p><strong>NIM:</strong> <?= esc($m['nim']) ?></p>
                <p><strong>Nama:</strong> <?= esc($m['nama']) ?></p>
                <p><strong>Umur:</strong> <?= esc($m['umur']) ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="<?= base_url('/mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</body>
</html>