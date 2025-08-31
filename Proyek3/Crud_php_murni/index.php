<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <div>
        <form action="" method="GET">
            <input type="text" placeholder="Cari berdasarkan Nama atau NIM..." name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit">Cari</button>
        </form>
    </div>
    <br>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php'; 

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $keyword = $_GET['search'];
                $sql = "SELECT id, nim, nama, umur FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id ASC";
                
                $stmt = $conn->prepare($sql);
                $search_keyword = "%" . $keyword . "%";
                $stmt->bind_param("ss", $search_keyword, $search_keyword);
                $stmt->execute();
                $result = $stmt->get_result();

            } else {
                $sql = "SELECT id, nim, nama, umur FROM mahasiswa ORDER BY id ASC";
                $result = $conn->query($sql);
            }

            $i = 1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";    
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['umur']) . "</td>";
                    echo '<td>
                            <a href="form_tambah.php?id='.$row['id'].'">Tambah<a> |
                            <a href="form_edit.php?id=' . $row['id'] . '">Edit</a> |
                            <a href="hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a>
                          </td>';
                    echo "</tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>