<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata</title>
    <link rel="stylesheet" href="halaman.css">

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

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../../koneksi.php';
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM wisata WHERE IDwisata='$id'") or die(mysqli_error($mysqli));
    if ($data = mysqli_fetch_array($query_mysql)) {
        $query_rating = mysqli_query($mysqli, "SELECT AVG(rating) as average_rating FROM rating_wisata WHERE IDtransaksi IN (SELECT IDtransaksi FROM transaksi WHERE IDwisata='$id')") or die(mysqli_error($mysqli));
        $rating_data = mysqli_fetch_array($query_rating);
        $average_rating = $rating_data['average_rating'];
?>
<div class="container">
    <h1 class="title"><?php echo $data['nama_wisata']; ?></h1><br>
    <img src="../../admin/wisata/gambar/<?php echo $data['image']; ?>" alt="<?php echo $data['nama_wisata']; ?>" width="600"><br><br>
    <p><strong><?php echo $data['deskripsi_wisata']; ?></strong></p>
    <p><strong>Jadwal: <?php echo $data['jadwal']; ?></strong></p>
    <p><strong>Rating: <?php echo number_format($average_rating, 1); ?> / 5</strong></p>
    <a href="<?php echo $data['website_wisata']; ?>"><button class="btn-pesan">Website</button></a>
    <a href="<?php echo $data['maps']; ?>"><button class="btn-map">Map</button></a>
    <a href="../transaksi/transaksi.php?id=<?php echo $data['IDwisata']; ?>"><button class="btn-pesan">Pesan</button></a>
</div>
<?php
    } else {
        echo "<p>Wisata tidak ditemukan.</p>";
    }
} else {
    echo "<p>ID wisata tidak ditemukan.</p>";
}
?>

<div class="container-rating">
<div class="feedback-rating">
        <h2>Ulasan</h2>
        <?php
            // Query untuk mengambil feedback dan rating beserta nama pengguna
            $query_feedback = mysqli_query($mysqli, "SELECT rating_wisata.rating, rating_wisata.feedback, user.nama FROM rating_wisata INNER JOIN transaksi ON rating_wisata.IDtransaksi = transaksi.IDtransaksi INNER JOIN user ON transaksi.ID = user.ID WHERE transaksi.IDwisata='$id'") or die(mysqli_error($mysqli));
            if (mysqli_num_rows($query_feedback) > 0) {
                while ($feedback = mysqli_fetch_array($query_feedback)) {
                    echo "<div class='feedback-item'>";
                    echo "<p><strong>Nama Pengguna: </strong>" . $feedback['nama'] . "</p>";
                    echo "<p><strong>Rating: </strong>";
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $feedback['rating']) {
                            echo "★";
                        } else {
                            echo "☆";
                        }
                    }
                    echo "</p>";
                    echo "<p><strong>Feedback: </strong>" . $feedback['feedback'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Belum ada feedback dan rating untuk wisata ini.</p>";
            }
        ?>
    </div>
</div>

<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>

</body>
</html>
