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
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Tambah Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="/mahasiswa/simpan" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="nim"
                            class="form-control <?= session('errors.nim') ? 'is-invalid' : '' ?>"
                            value="<?= old('nim') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nim') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>"
                            value="<?= old('nama') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nama') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" name="umur" id="umur"
                            class="form-control <?= session('errors.umur') ? 'is-invalid' : '' ?>"
                            value="<?= old('umur') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.umur') ?>
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
</body>

</html>