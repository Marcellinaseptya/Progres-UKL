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
                <th>IDtransaksi</th>
                <th>Nama wisata</th>
                <th>Total harga tiket</th>
                <th>Nama user</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT *, w.nama_wisata, tw.total_harga_tiket, u.nama FROM transaksi as t,wisata as w,tiket_wisata as tw,user as u 
            WHERE
            w.IDwisata=t.IDwisata
            tw.ID_tiket=t.ID_tiket
            u.ID=t.ID
             ") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['IDtransaksi']; ?></td>
                <td><?php echo $data['nama_wisata']; ?></td>
                <td><?php echo $data['total_harga_tiket']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><a href="delete_kuliner.php?id=<?php echo $data['IDtransaksi']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_kuliner.php?id=<?php echo $data['IDtransaksi']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>