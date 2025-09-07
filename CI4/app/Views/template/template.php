<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
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
            margin-left: auto; /* dorong ke kanan */
            font-weight: bold;
            color: red;
        }
        .content { padding:20px; min-height:500px; }
        .footer { background:#333; color:#fff; text-align:center; padding:10px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>My Website</h2>
    </div>

    <div class="menu">
        <a href="<?= base_url('home') ?>">Home</a>
        <a href="<?= base_url('berita') ?>">Berita</a>
        <a href="<?= base_url('mahasiswa') ?>">mahasiswa</a>
        <a class="logout" href="/auth/logout">Logout</a>
    </div>

    <div class="content">
        <?php if ($content) {
            echo view($content);
        }?>
    </div>

    <div class="footer">
        <p>&copy; <?= date('Y') ?> My Website</p>
    </div>
</body>
</html>