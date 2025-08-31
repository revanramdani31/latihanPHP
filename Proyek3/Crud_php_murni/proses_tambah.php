<?php
include 'koneksi.php';

// Memeriksa apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur']; // <- sudah konsisten huruf kecil

    // Query SQL untuk insert data
    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error saat menyiapkan statement: " . $conn->error);
    }

    // ssi = string, string, integer
    $stmt->bind_param("ssi", $nim, $nama, $umur);

    // Jalankan query
    if ($stmt->execute()) {
        header("Location: index.php");
        exit; // stop eksekusi setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Akses tidak sah.";
}

$conn->close();
?>
