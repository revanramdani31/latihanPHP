<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM mahasiswa WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Data mahasiswa dengan ID tersebut tidak ditemukan.");
    }
} else {
    die("Akses tidak sah. ID tidak diberikan.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Form Edit Mahasiswa</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
        NIM: <br>
        <input type="text" name="nim" value="<?= htmlspecialchars($row['nim']) ?>" required><br>
        Nama: <br>
        <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required><br>
        umur: <br>
        <input type="number" name="umur" value="<?= htmlspecialchars($row['umur']) ?>" required><br>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>