<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Informasi</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>

    <div class="container">
    <h1 class="title">Informasi</h1><br>
        <form class="form" action="tambah_kuliner.php" method="post">
            <input type="text" name="nama_kuliner" placeholder="nama">
            <input type="text" name="deskripsi_kuliner" placeholder="deskripsi">
            <input type="text" name="website_kuliner" placeholder="website">
            <button class="button" name="submit">submit</button>

        <?php
        if(isset($_POST['submit'])){
            $nama_kuliner= $_POST['nama_kuliner'];
            $deskripsi_kuliner= $_POST['deskripsi_kuliner'];
            $website_kuliner= $_POST['website_kuliner'];

            include_once("../koneksi.php");

            $result = mysqli_query($mysqli,
            "INSERT INTO kuliner(nama_kuliner,deskripsi_kuliner,website_kuliner) VALUES ('$nama_kuliner','$deskripsi_kuliner','$website_kuliner')");

            header("location:index.php");
        }
        ?>
    </div>
</body>
</html>