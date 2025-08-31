<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Form Tambah Mahasiswa</h2>
    <form action="proses_tambah.php" method="POST">
        NIM: <br>
        <input type="text" name="nim" required><br>
        Nama: <br>
        <input type="text" name="nama" required><br>
        Umur: <br>
        <input type="number" name="umur" required><br>
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
