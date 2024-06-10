<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['IDtransaksi'])) {
    $IDtransaksi = $_GET['IDtransaksi'];
} else {
    header("Location: ../riwayat.php");
    exit();
}

include '../../koneksi.php';

// Periksa apakah pengguna sudah memberikan penilaian untuk transaksi ini
$query_ratings = mysqli_query($mysqli, "SELECT * FROM rating_wisata WHERE IDtransaksi='$IDtransaksi'") or die(mysqli_error($mysqli));
$rating_exists = mysqli_num_rows($query_ratings) > 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beri Rating Wisata</title>
<link rel="stylesheet" href="ratingg.css">

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
            <a href="../index.php">Home</a>
            <a href="/Project UKL/user/wisata/wisata.php">Wisata</a>
            <a href="../kuliner/kuliner.php">Kuliner</a>
            <a href="../riwayat.php">Riwayat</a>
            <a href="../profile.php">Profile</a>
        </ul>
    </header>

<div class="rating-form">
    <h2>Beri Rating Wisata</h2>
    <?php if ($rating_exists): ?>
        <p>Anda sudah memberikan rating untuk transaksi ini.</p>
    <?php else: ?>
        <form action="submit_rating_wisata.php" method="POST">
            <input type="hidden" name="IDtransaksi" value="<?php echo $IDtransaksi; ?>">
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="5 stars">☆</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">☆</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">☆</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">☆</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">☆</label>
            </div>
            <div>
                <label for="feedback">Ulasan:</label>
                <textarea id="feedback" name="feedback" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</div>

<div class="existing-ratings">
    <h2>Rating dan Ulasan Sebelumnya</h2>
    <?php
    if ($rating_exists) {
        while ($rating = mysqli_fetch_array($query_ratings)) {
            echo "<div class='rating'>
                <p>Rating: {$rating['rating']}</p>
                <p>Feedback: {$rating['feedback']}</p>
            </div>";
        }
    } else {
        echo "<p>Belum ada rating dan ulasan.</p>";
    }
    ?>
</div>

<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>

</body>
</html>
