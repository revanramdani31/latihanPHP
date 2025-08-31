<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Nama</title>
</head>
<body>
    <h2>Masukan Nama Anda</h2>
    
    <form method="post">
        <label>Nama:</label>
        <input type="text"name="nama" required>

        <button type ="Submit" formaction="display2.php" formmethod="post">kirim</button>
        <button type = "Submit" formaction="display2.php" formmethod="get">kirim</button>
    </form>
</body>
</html>