<?php
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['search']) && !empty($_GET['search'])) {

    $keyword = $_GET['search'];
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY nim ASC";
    
    $stmt = $conn->prepare($sql);
    $search_keyword = "%" . $keyword . "%";
    $stmt->bind_param("ss", $search_keyword, $search_keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    
} else {
    $sql = "SELECT nim, nama, umur FROM mahasiswa ORDER BY nim ASC";
    $result = $conn->query($sql);
}
?>