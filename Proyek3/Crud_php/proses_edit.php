<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id   = $_POST['id'];
    $nama = $_POST['nama'];
    $nim  = $_POST['nim'];
    $umur = $_POST['umur']; 

    $sql = "UPDATE mahasiswa SET nama=?, nim=?, umur=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error saat menyiapkan statement: " . $conn->error);
    }

    $stmt->bind_param("ssii", $nama, $nim, $umur, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error saat mengupdate data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Akses tidak sah.";
}

$conn->close();
?>