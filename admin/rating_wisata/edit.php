<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating Wisata</title>
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
    <h1 class="heading">Edit Rating Wisata</h1>
    <br>
    <?php
    include '../../koneksi.php';
    $id = $_GET['id'];
    $query_mysql = mysqli_query($mysqli, "SELECT rating_wisata.idrating_wisata, user.nama, wisata.nama_wisata, rating_wisata.rating, rating_wisata.feedback 
    FROM rating_wisata 
    INNER JOIN user ON rating_wisata.ID=user.ID 
    INNER JOIN wisata ON rating_wisata.IDwisata=wisata.IDwisata 
    WHERE idrating_wisata='$id'") or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($query_mysql);
    ?>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['idrating_wisata']; ?>">
        <table>
            <tr>
                <td>Nama User</td>
                <td><input type="text" name="nama_user" value="<?php echo $data['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Wisata</td>
                <td><input type="text" name="nama_wisata" value="<?php echo $data['nama_wisata']; ?>" required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="number" name="rating" value="<?php echo $data['rating']; ?>" min="1" max="5" required></td>
            </tr>
            <tr>
                <td>feedback</td>
                <td><textarea name="feedback" required><?php echo $data['feedback']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" class="btn"></td>
            </tr>
        </table>
    </form>
</section>

<?php
include '../../koneksi.php';

$id = $_POST['id'];
$nama_user = $_POST['nama_user'];
$nama_wisata = $_POST['nama_wisata'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

$query_user = mysqli_query($mysqli, "SELECT ID FROM user WHERE nama='$nama_user'");
$user = mysqli_fetch_assoc($query_user);
$user_id = $user['ID'];

$query_wisata = mysqli_query($mysqli, "SELECT IDwisata FROM wisata WHERE nama_wisata='$nama_wisata'");
$wisata = mysqli_fetch_assoc($query_wisata);
$wisata_id = $wisata['IDwisata'];

mysqli_query($mysqli, "UPDATE rating_wisata SET ID='$user_id', IDwisata='$wisata_id', rating='$rating', feedback='$feedback' WHERE idrating_wisata='$id'");

header("location:index.php");
?>


</body>
</html>
