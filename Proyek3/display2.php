<?php
// Cek apakah data dikirim via POST atau GET
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $method = "POST";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $method = "GET";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input</title>
</head>
<body>

    <?php if (isset($nama)): ?>
        <h2>Halo, <?= htmlspecialchars($nama) ?>! (dikirim via <?= $method ?>)</h2>
    <?php else: ?>
        <p>Tidak ada data yang dikirim.</p>
    <?php endif; ?>

</body>
</html>