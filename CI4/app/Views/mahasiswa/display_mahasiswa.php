<DOCTYPE html>
<html>
    <head>
        <title>Data Mahasiswa</title>
        <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; }
        .header { background:#007bff; color:#fff; padding:15px; text-align:center; }
        .menu {
            background: #f4f4f4;
            padding: 10px;
            display: flex;        
            justify-content: space-between; 
            align-items: center;
        }
        .menu a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        .menu .logout {
            margin-left: auto; 
            font-weight: bold;
            color: red;
        }
        .content { padding:20px; min-height:500px; }
        .footer {
             background:#333; color:#fff; text-align:center; padding:10px;
            position: relative;
            top:300px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <div class="header">
        <h2>Table Mahasiswa</h2>
    </div>
    
    <div class="menu">
        <a href="<?= base_url('home') ?>">Home</a>
        <a href="<?= base_url('berita') ?>">Berita</a>  
        <a class="logout" href="/auth/logout">Logout</a>
    </div>
    
    <div class="container mt-3 w-75 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="get" action="<?= base_url('/mahasiswa') ?>" class="d-flex gap-2">
                <input type="text" name="keyword" 
                    class="form-control" 
                    placeholder="Cari mahasiswa..." 
                    value="<?= esc($_GET['keyword'] ?? '') ?>" 
                    style="max-width: 250px;">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-danger">Reset</a>
            </form>

            <a href="<?= base_url('/mahasiswa/tambah') ?>" class="btn btn-success">
                Tambah Mahasiswa
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped w-75 mx-auto">
        <tr class="table-primary">
            <th>Nim</th>
            <th>Nama</th>
            <th>umur</th>
            <th>Aksi</th>
        </tr>
        <?php if(!empty($mahasiswa)): ?>
            <?php foreach($mahasiswa as $m): ?>
            <tr>
                <td><?= esc($m['nim']) ?></td>
                <td><?= esc($m['nama']) ?></td>
                <td><?= esc($m['umur']) ?></td>
                <td>
                    <a class="btn btn-info" href="<?=base_url('/mahasiswa/detail/'.$m['id'])?>">Detail</a>
                    <a class="btn btn-primary" href="<?=base_url('/mahasiswa/edit/'.$m['id'])?>">Edit</a>
                    <a class="btn btn-danger"  href="<?=base_url('/mahasiswa/delete/'.$m['id'])?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Belum ada data mahasiswa</td>
            </tr>
        <?php endif; ?>
    </table>
    <div class="footer">
        <p>&copy; <?= date('Y') ?> My Website</p>
    </div>
</body>
</html>