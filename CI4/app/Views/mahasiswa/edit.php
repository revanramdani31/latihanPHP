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
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/mahasiswa/update/' . $m['id']) ?>">
                
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" 
                           value="<?= esc($m['nim']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" 
                           value="<?= esc($m['nama']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" 
                           value="<?= esc($m['umur']) ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                    <a href="<?= base_url('/mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>