<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../tabell.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicon@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<header>

        <ul class="navbar">
            <a href="/Project UKL/admin/user/index.php">User</a>
            <a href="/Project UKL/admin/wisata/index.php">Wisata</a>
            <a href="/Project UKL/admin/kuliner/index.php">Kuliner</a>
            <a href="/Project UKL/admin/transaksi/index.php">Transaksi Wisata</a>
            <a href="/Project UKL/admin/transaksi/index.php">Transaksi Kuliner</a>
            <a href="/Project UKL/admin/transaksi/index.php">Rating Wisata</a>
            <a href="/Project UKL/admin/transaksi/index.php">Rating Kuliner</a>
        </ul>


</header>

    <section class="user">
    <h1 class="heading">Data User</h1>
    <br>
        <a href="../../register.php" class="btn">Tambah User</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['level']; ?></td>
                <td><a href="delete_user.php?id=<?php echo $data['ID']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_user.php?id=<?php echo $data['ID']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../../login.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>