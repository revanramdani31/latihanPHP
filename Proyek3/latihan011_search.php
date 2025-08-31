<?php
// Konfigurasi koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademi_db";


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['search']) && !empty($_GET['search'])) {

    $keyword = $_GET['search'];
    $sql = "SELECT nim, nama, umur FROM akademik_db WHERE nama LIKE ? OR nim LIKE ? ORDER BY nim ASC";
    
    $stmt = $conn->prepare($sql);
    $search_keyword = "%" . $keyword . "%";
    $stmt->bind_param("ss", $search_keyword, $search_keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    
} else {
    $sql = "SELECT nim, nama, umur FROM akademik_db ORDER BY nim ASC";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    </head>
<body>

    <h2>Daftar Mahasiswa</h2>

    <div>
        <form action="" method="GET">
            <input type="text" placeholder="Cari berdasarkan Nama atau NIM..." name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit">Cari</button>
        </form>
    </div>
    <br>

    <table border="1" cellpadding="8" cellspacing="0" width="80%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Looping untuk menampilkan setiap baris data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['umur']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
<?php
// Menutup koneksi
$conn->close();
?>