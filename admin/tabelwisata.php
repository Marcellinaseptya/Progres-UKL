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
                <th>IDwisata</th>
                <th>Website Wisata</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM wisata") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_wisata']; ?></td>
                <td><?php echo $data['deskripsi_wisata']; ?></td>
                <td><?php echo $data['IDwisata']; ?></td>
                <td><?php echo $data['website_wisata']; ?></td>
                <td><a href="delete_wisata.php?id=<?php echo $data['IDwisata']; ?>" class="btn-delete">Hapus</a>
                <a href="edit_wisata.php?id=<?php echo $data['IDwisata']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>