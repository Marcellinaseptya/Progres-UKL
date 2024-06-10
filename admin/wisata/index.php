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
    <h1 class="heading">Data wisata</h1>
    <br>
        <a href="tambah_wisata.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama Wisata</th>
                <th>Deskripsi Wisata</th>
                <th>Website Wisata</th>
                <th>Gambar</th>
                <th>Maps</th>
                <th>Jadwal</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM wisata") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_wisata']; ?></td>
                <td><?php echo $data['deskripsi_wisata']; ?></td>
                <td><?php echo $data['website_wisata']; ?></td>
                <td><img src="gambar/<?php echo $data["image"]; ?>" width="150" title="<?php echo $data['image']; ?>"></td>
                <td><?php echo $data['maps']; ?></td>
                <td><?php echo $data['jadwal']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><a href="delete_wisata.php?id=<?php echo $data['IDwisata']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_wisata.php?id=<?php echo $data['IDwisata']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../../login.php" class="btn">Log Out</a>
</body>
</html>
