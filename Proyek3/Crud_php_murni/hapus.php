<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM akademik_db WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error saat menyiapkan statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Cek apakah ada baris yang benar-benar terhapus
        if ($stmt->affected_rows > 0) {
            // Berhasil, redirect ke halaman utama
            header("Location: index.php");
        } else {
            // Query berhasil, tapi tidak ada baris yang cocok dengan ID tersebut
            echo "Gagal menghapus: Tidak ada data dengan ID tersebut.";
            echo '<br><a href="index.php">Kembali</a>';
        }
    } else {
        echo "Error saat menjalankan penghapusan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Gagal: ID tidak ditemukan di URL.";
}

$conn->close();
?>