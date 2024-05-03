<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <section class="tabelwisata">
    <h1 class="heading">Data tiket</h1>
    <br>
        <a href="tambah_tiket.php" class="btn">Tambah Informasi</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>IDtiket</th>
                <th>ID</th>
                <th>Jumlah orang</th>
                <th>Harga tiket</th>
                <th>Total Harga tiket</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT tiket_wisata.ID,tiket_wisata.jumlah_orang,tiket_wisata.harga_tiket,tiket_wisata.total_harga_tiket, user.nama 
            FROM `tiket_wisata`,user 
            WHERE user.ID=tiket_wisata.ID;") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['ID_tiket']; ?></td>
                <td><?php echo $data['ID']; ?></td>
                <td><?php echo $data['jumlah_orang']; ?></td>
                <td><?php echo $data['harga_tiket']; ?></td>
                <td><?php echo $data['total_harga_tiket']; ?></td>
                <td><a href="delete_tiket.php?id=<?php echo $data['ID_tiket']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_tiket.php?id=<?php echo $data['ID_tiket']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>
//query sql setelah mysqli
SELECT tiket_wisata.ID,tiket_wisata.jumlah_orang,tiket_wisata.harga_tiket,tiket_wisata.total_harga_tiket, user.nama FROM `tiket_wisata`,user WHERE user.ID=tiket_wisata.ID;