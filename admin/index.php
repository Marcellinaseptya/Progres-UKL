<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
<div class="navbar">
    <a href="tabelwisata.php">Wisata</a>
    <a href="tabelkuliner.php">Kuliner</a>
    <a href="tabel_transaksi.php">Transaksi</a>
    <a href="#settings">Menu kuliner</a>
    <a href="tabeltiket.php">Tiket wisata</a>
</div>
    <section class="user">
    <h1 class="heading">Data User</h1>
    <br>
        <a href="../register.php" class="btn">Tambah User</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama</th>
                <th>Username</th>
                <th>ID</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['ID']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['level']; ?></td>
                <td><a href="delete_user.php?id=<?php echo $data['ID']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_user.php?id=<?php echo $data['ID']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>