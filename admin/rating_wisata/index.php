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
    <h1 class="heading">Data Rating Wisata</h1>
    <br>
        <a href="create.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama user</th>
                <th>Nama wisata</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT  user.nama, wisata.nama_wisata, rating_wisata.rating, rating_wisata.feedback 
            FROM(( rating_wisata 
            INNER JOIN user ON rating_wisata.ID=user.ID) 
            INNER JOIN wisata ON rating_wisata.IDwisata=wisata.IDwisata);
            ") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nama_wisata']; ?></td>
                <td><?php echo $data['rating']; ?></td>
                <td><?php echo $data['feedback']; ?></td>
                <td><a href='delete.php?id=<?php echo $data['idrating_wisata']; ?>' class="btn-delete">Hapus</a>
                <a href='edit.php?id=<?php echo $data['idrating_wisata']; ?>' class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../../login.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>