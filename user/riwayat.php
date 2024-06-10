<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';
$username = $_SESSION['username'];

// Start output buffering
ob_start();

$query = "SELECT ID FROM user WHERE username = '$username'";
$result = mysqli_query($mysqli, $query);
$userData = mysqli_fetch_assoc($result);
$IDuser = $userData['ID'];

$query_kuliner = "
    SELECT transaksi_kuliner.IDtransaksi_kuliner, kuliner.nama_kuliner, transaksi_kuliner.jumlah, transaksi_kuliner.total, transaksi_kuliner.tanggal, transaksi_kuliner.status
    FROM transaksi_kuliner 
    JOIN kuliner ON transaksi_kuliner.IDkuliner = kuliner.IDkuliner
    WHERE transaksi_kuliner.ID = '$IDuser'
    ORDER BY transaksi_kuliner.tanggal DESC
";

$query_wisata = "
    SELECT transaksi.IDtransaksi, wisata.nama_wisata, transaksi.jumlah, transaksi.total, transaksi.tanggal, transaksi.status
    FROM transaksi
    JOIN wisata ON transaksi.IDwisata = wisata.IDwisata
    WHERE transaksi.ID = '$IDuser'
    ORDER BY transaksi.tanggal DESC
";

$result_kuliner = mysqli_query($mysqli, $query_kuliner);
$result_wisata = mysqli_query($mysqli, $query_wisata);

if (isset($_POST['finish_kuliner'])) {
    $IDtransaksi = $_POST['IDtransaksi'];
    $updateQuery = "UPDATE transaksi_kuliner SET status = 'successful' WHERE IDtransaksi_kuliner = '$IDtransaksi' AND status = 'pending'";
    mysqli_query($mysqli, $updateQuery);
    
    header("Location: riwayat.php");
    exit();
}

if (isset($_POST['cancel_kuliner'])) {
    $IDtransaksi = $_POST['IDtransaksi'];
    $updateQuery = "UPDATE transaksi_kuliner SET status = 'canceled' WHERE IDtransaksi_kuliner = '$IDtransaksi' AND status = 'pending'";
    mysqli_query($mysqli, $updateQuery);
    
    header("Location: riwayat.php");
    exit();
}

if (isset($_POST['finish_wisata'])) {
    $IDtransaksi = $_POST['IDtransaksi'];
    $updateQuery = "UPDATE transaksi SET status = 'successful' WHERE IDtransaksi = '$IDtransaksi' AND status = 'pending'";
    mysqli_query($mysqli, $updateQuery);
    
    header("Location: riwayat.php");
    exit();
}

if (isset($_POST['cancel_wisata'])) {
    $IDtransaksi = $_POST['IDtransaksi'];
    $updateQuery = "UPDATE transaksi SET status = 'canceled' WHERE IDtransaksi = '$IDtransaksi' AND status = 'pending'";
    mysqli_query($mysqli, $updateQuery);
    
    header("Location: riwayat.php");
    exit();
}

// End output buffering and flush the buffer
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Pesanan</title>
<link rel="icon" type="image/png" href="../logotitle.png">
<link rel="stylesheet" href="css/history.css">

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
            <li><a href="index.php">Home</a></li>
            <li><a href="/Project UKL/user/wisata/wisata.php">Wisata</a></li>
            <li><a href="kuliner/kuliner.php">Kuliner</a></li>
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </header>

<div class="transaction-history">
    <h2>Riwayat Pesanan Kuliner</h2>
    <?php
    function displayKulinerTransactions($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='transaction'>
                    <h3>{$row['nama_kuliner']}</h3>
                    <p>Jumlah: <span>{$row['jumlah']}</span></p>
                    <p>Total Harga: <span>Rp {$row['total']}</span></p>
                    <p>Tanggal: <span>{$row['tanggal']}</span></p>
                    <p>Status: <span>{$row['status']}</span></p>";
                if ($row['status'] == 'pending') {
                    echo "<form method='POST' action=''>
                            <input type='hidden' name='IDtransaksi' value='{$row['IDtransaksi_kuliner']}'>
                            <input type='submit' name='finish_kuliner' value='Selesai'>
                            <input type='submit' name='cancel_kuliner' value='Batalkan'>
                          </form>";
                }
                if ($row['status'] == 'successful') {
                    echo "<a href='rating/rating_kuliner.php?IDtransaksi_kuliner={$row['IDtransaksi_kuliner']}'><button class='rating-btn'>Beri Rating</button></a>";
                }                
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada pesanan kuliner yang ditemukan.</p>";
        }
    }

    displayKulinerTransactions($result_kuliner);
    ?>
</div>

<div class="transaction-history">
    <h2>Riwayat Pesanan Wisata</h2>
    <?php
    function displayWisataTransactions($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='transaction'>
                    <h3>{$row['nama_wisata']}</h3>
                    <p>Jumlah: <span>{$row['jumlah']}</span></p>
                    <p>Total Harga: <span>Rp {$row['total']}</span></p>
                    <p>Tanggal: <span>{$row['tanggal']}</span></p>
                    <p>Status: <span>{$row['status']}</span></p>";
                if ($row['status'] == 'pending') {
                    echo "<form method='POST' action=''>
                            <input type='hidden' name='IDtransaksi' value='{$row['IDtransaksi']}'>
                            <input type='submit' name='finish_wisata' value='Selesai'>
                            <input type='submit' name='cancel_wisata' value='Batalkan'>
                          </form>";
                }
                if ($row['status'] == 'successful') {
                    echo "<a href='rating/rating_wisata.php?IDtransaksi={$row['IDtransaksi']}'><button class='rating-btn'>Beri Rating</button></a>";
                }                
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada pesanan wisata yang ditemukan.</p>";
        }
    }

    displayWisataTransactions($result_wisata);
    ?>
</div>

<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>

</body>
</html>
