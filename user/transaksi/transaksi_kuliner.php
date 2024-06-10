<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

include '../../koneksi.php';
$username = $_SESSION['username'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($mysqli));
}

$userData = mysqli_fetch_assoc($result);
$ID = $userData['ID'];

if (isset($_GET['id'])) {
    $IDkuliner = $_GET['id'];
    $query = "
        SELECT kuliner.IDkuliner, kuliner.nama_kuliner, kuliner.harga, kuliner.image 
        FROM kuliner 
        WHERE kuliner.IDkuliner = '$IDkuliner'
    ";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pesan</title>
<link rel="icon" type="image/png" href="../logotitle.png">
<link rel="stylesheet" href="transaksie.css">

<link rel="stylesheet" href="https://unpkg.com/boxicon@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <a href="#" class="logo">Malang Spot</a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../wisata/wisata.php">Wisata</a></li>
            <li><a href="../kuliner/kuliner.php">Kuliner</a></li>
            <li><a href="../riwayat.php">Riwayat</a></li>
            <li><a href="../profile.php">Profile</a></li>
    </ul>
</header>

<div class="product-details">
    <h2><?php echo $row['nama_kuliner']; ?></h2>
    <img src="../../admin/kuliner/gambar/<?php echo $row['image']; ?>" alt="<?php echo $row['nama_kuliner']; ?>" width="200">
    <p>Harga: Rp <?php echo $row['harga']; ?></p>
    <p>Nama: <?php echo $userData['username']; ?></p>

    <form action="proses_pesanan_kuliner.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <input type="hidden" name="IDkuliner" value="<?php echo $row['IDkuliner']; ?>">

        <label for="jumlah">Jumlah Pesanan:</label>
        <input type="number" id="jumlah" name="jumlah" value="1" min="1" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <input type="submit" value="Pesan" name="submit">
    </form>
</div>

<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>

</body>
</html>

<?php
    } else {
        echo "<p>kuliner tidak ditemukan.</p>";
    }
} else {
    echo "<p>ID kuliner tidak ditemukan.</p>";
}
?>
