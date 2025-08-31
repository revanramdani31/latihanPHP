<?php
include 'koneksi.php';

// Memeriksa apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form, termasuk 'id' dari hidden input
    $id   = $_POST['id'];
    $nama = $_POST['nama'];
    $nim  = $_POST['nim'];
    $umur = $_POST['umur'];  // ← sekarang sama dengan form & DB

    // Query SQL yang benar (tanpa koma sebelum WHERE)
    $sql = "UPDATE akademik_db SET nama=?, nim=?, umur=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error saat menyiapkan statement: " . $conn->error);
    }

    // Bind parameter sesuai dengan query (string, string, integer, integer)
    $stmt->bind_param("ssii", $nama, $nim, $umur, $id);

    // Jalankan query
    if ($stmt->execute()) {
        // Redirect ke halaman utama jika berhasil
        header("Location: index.php");
    } else {
        echo "Error saat mengupdate data: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Jika halaman diakses tanpa metode POST
    echo "Akses tidak sah.";
}

$conn->close();
?>