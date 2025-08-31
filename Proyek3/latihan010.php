<?php

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nim = $conn->real_escape_string($_POST['nim']);
$nama = $conn->real_escape_string($_POST['nama']);
$umur = (int)$_POST['umur'];

$sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES ('$nim', '$nama', '$umur')";

if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Data mahasiswa berhasil disimpan!</p>";
    echo "<a href='form_input_mahasiswa.html'>Input lagi</a>";
} else {
    echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    echo "<a href='form_input_mahasiswa.html'>Kembali</a>";
}

$conn->close();

?>