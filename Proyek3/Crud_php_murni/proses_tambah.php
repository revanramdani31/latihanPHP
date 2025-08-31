<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur']; 

    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error saat menyiapkan statement: " . $conn->error);
    }

    $stmt->bind_param("ssi", $nim, $nama, $umur);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Akses tidak sah.";
}

$conn->close();
?>
