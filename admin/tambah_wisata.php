<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Informasi</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

    <div class="container">
    <h1 class="title">Informasi</h1><br>
        <form class="form" action="tambah_wisata.php" method="post">
            <input type="text" name="nama_wisata" placeholder="nama">
            <input type="text" name="deskripsi_wisata" placeholder="deskripsi">
            <input type="text" name="website_wisata" placeholder="website">
            <button class="button" name="submit">submit</button>

        <?php
        if(isset($_POST['submit'])){
            $nama_wisata= $_POST['nama_wisata'];
            $deskripsi_wisata= $_POST['deskripsi_wisata'];
            $website_wisata= $_POST['website_wisata'];

            include_once("../koneksi.php");

            $result = mysqli_query($mysqli,
            "INSERT INTO wisata(nama_wisata,deskripsi_wisata,website_wisata) VALUES ('$nama_wisata','$deskripsi_wisata','$website_wisata')");

            header("location:index.php");
        }
        ?>
    </div>
</body>
</html>