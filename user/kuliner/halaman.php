<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kuliner</title>
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
            <a href="/Project UKL/user/kuliner/kuliner.php">Kuliner</a>
            <a href="../riwayat.php">Riwayat</a>
            <a href="../profile.php">Profile</a>
        </ul>
    </header>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../../koneksi.php';
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM kuliner WHERE IDkuliner='$id'") or die(mysqli_error($mysqli));
    if ($data = mysqli_fetch_array($query_mysql)) {
        $query_rating = mysqli_query($mysqli, "SELECT AVG(rating) as average_rating FROM rating_kuliner WHERE IDtransaksi_kuliner IN (SELECT IDtransaksi_kuliner FROM transaksi_kuliner WHERE IDkuliner='$id')") or die(mysqli_error($mysqli));
        $rating_data = mysqli_fetch_array($query_rating);
        $average_rating = $rating_data['average_rating'];
?>
<div class="container">
    <h1 class="title"><?php echo $data['nama_kuliner']; ?></h1><br>
    <img src="../../admin/kuliner/gambar/<?php echo $data['image']; ?>" alt="<?php echo $data['nama_kuliner']; ?>" width="600"><br><br>
    <p><strong><?php echo $data['deskripsi_kuliner']; ?></strong></p>
    <p><strong>Jadwal: <?php echo $data['jadwal']; ?></strong></p>
    <p><strong>Rating: <?php echo number_format($average_rating, 1); ?> / 5</strong></p>
    <a href="<?php echo $data['website_kuliner']; ?>"><button class="btn-pesan">Website</button></a>
    <a href="<?php echo $data['maps']; ?>"><button class="btn-map">Map</button></a>
    <a href="../transaksi/transaksi_kuliner.php?id=<?php echo $data['IDkuliner']; ?>"><button class="btn-pesan">Pesan</button></a>
</div>
<?php
    } else {
        echo "<p>kuliner tidak ditemukan.</p>";
    }
} else {
    echo "<p>ID kuliner tidak ditemukan.</p>";
}
?>

<div class="container-rating">
<div class="feedback-rating">
        <h2>Ulasan</h2>
        <?php
            $query_feedback = mysqli_query($mysqli, "SELECT rating_kuliner.rating, rating_kuliner.feedback, user.nama FROM rating_kuliner 
            INNER JOIN transaksi_kuliner ON rating_kuliner.IDtransaksi_kuliner = transaksi_kuliner.IDtransaksi_kuliner 
            INNER JOIN user ON transaksi_kuliner.ID = user.ID WHERE transaksi_kuliner.IDkuliner='$id'") or die(mysqli_error($mysqli));
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
                echo "<p>Belum ada feedback dan rating untuk kuliner ini.</p>";
            }
        ?>
    </div>
</div>
<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>

</body>
</html>
