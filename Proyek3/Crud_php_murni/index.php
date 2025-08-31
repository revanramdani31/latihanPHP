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
    <br><br>
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
            $sql = "SELECT id, nim, nama, umur FROM akademik_db ORDER BY id ASC";
            $result = $conn->query($sql);
            $i=1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";    
                    echo "<td>" .$i."</td>";
                    echo "<td>" . $row['nim'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['umur'] . "</td>";
                    echo '<td>
                            <a href="form_tambah.php?id=' .$row['id'].'">tambah</a>|
                            <a href="form_edit.php?id=' . $row['id'] . '">Edit</a> |
                            <a href="hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a>
                          </td>';
                    echo "</tr>";
                    $i=$i+1;
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>