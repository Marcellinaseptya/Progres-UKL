<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <section class="tabelkuliner">
    <h1 class="heading">Data kuliner</h1>
    <br>
        <a href="tambah_kuliner.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama Kuliner</th>
                <th>Deskripsi kuliner</th>
                <th>IDkuliner</th>
                <th>Website kuliner</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM kuliner") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_kuliner']; ?></td>
                <td><?php echo $data['deskripsi_kuliner']; ?></td>
                <td><?php echo $data['IDkuliner']; ?></td>
                <td><?php echo $data['website_kuliner']; ?></td>
                <td><a href="delete_kuliner.php?id=<?php echo $data['IDkuliner']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_kuliner.php?id=<?php echo $data['IDkuliner']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>