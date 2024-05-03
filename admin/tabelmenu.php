<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <section class="tabelmenu">
    <h1 class="heading">Data menu</h1>
    <br>
        <a href="tambah_menu.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama menu</th>
                <th>Deskripsi menu</th>
                <th>IDmenu</th>
                <th>Harga menu</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM menu_kuliner") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['IDmenu']; ?></td>
                <td><?php echo $data['nama_menu']; ?></td>
                <td><?php echo $data['deskripsi_menu']; ?></td>
                <td><?php echo $data['harga_menu']; ?></td>
                <td><a href="delete_menu.php?id=<?php echo $data['IDmenu']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_menu.php?id=<?php echo $data['IDmenu']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>