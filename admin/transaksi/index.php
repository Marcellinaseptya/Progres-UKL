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
        <a href="/Project UKL/admin/transaksi_kuliner/index.php">Transaksi Kuliner</a>
        <a href="/Project UKL/admin/rating_wisata/index.php">Rating Wisata</a>
        <a href="/Project UKL/admin/rating_kuliner/index.php">Rating Kuliner</a>
    </ul>


</header>
    <section class="tabeltransaksi">
    <h1 class="heading">Data Transaksi wisata</h1>
    <br>
        <a href="tambah_transaksi.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama wisata</th>
                <th>Nama user</th>
                <th>Jumlah</th>
                <th>Total harga</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT transaksi.IDtransaksi, wisata.nama_wisata, transaksi.total, user.nama, transaksi.jumlah, transaksi.tanggal, transaksi.status FROM(( transaksi 
            JOIN wisata ON transaksi.IDwisata=wisata.IDwisata) 
            JOIN user ON transaksi.ID=user.ID);
            ") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_wisata']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><a href='delete_transaksi.php?id=<?php echo $data['IDtransaksi']; ?>' class="btn-delete">Hapus</a>
                <a href='edit_transaksi.php?id=<?php echo $data['IDtransaksi']; ?>' class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../../login.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>