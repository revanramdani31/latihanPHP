<?php
include 'koneksi.php';

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk keamanan
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Gagal menyiapkan statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $mahasiswa = $result->fetch_assoc();
    } else {
        // Jika tidak ada data, hentikan eksekusi dan tampilkan pesan
        die("Data mahasiswa tidak ditemukan.");
    }

    $stmt->close();
} else {
    // Jika tidak ada ID di URL, hentikan eksekusi
    die("Akses tidak sah. ID tidak ditemukan.");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
</head>
<body>

    <h2>Detail Mahasiswa</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NIM</th>
            <td><?php echo htmlspecialchars($mahasiswa['nim']); ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($mahasiswa['nama']); ?></td>
        </tr>
        <tr>
            <th>Usia</th>
            <td><?php echo htmlspecialchars($mahasiswa['umur']); ?> tahun</td>
        </tr>
    </table>
    
    <br>
    
    <a href="index.php">Kembali ke Daftar</a>

</body>
</html>