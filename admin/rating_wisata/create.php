<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rating Wisata</title>
    <link rel="stylesheet" href="tabel.css">
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
    <h1 class="heading">Tambah Rating Wisata</h1>
    <br>
    <form action="create_act.php" method="post">
        <table>
            <tr>
                <td>Nama User</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Nama Wisata</td>
                <td><input type="text" name="nama_wisata" required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="number" name="rating" min="1" max="5" required></td>
            </tr>
            <tr>
                <td>feedback</td>
                <td><textarea name="feedback" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" class="btn"></td>
            </tr>

        </table>
    </form>
</section>

</body>
</html>
