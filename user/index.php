<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malang Spot</title>
    <link rel="stylesheet" href="css/style.css">

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
            <li><a href="#home">Home</a></li>
            <li><a href="/Project UKL/user/wisata/wisata.php">Wisata</a></li>
            <li><a href="kuliner/kuliner.php">Kuliner</a></li>
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </header>

    <section class="home" id="home">
        <div class="home-text">
            <h1>Malang <br> Spot</h1>
            <p>Rekomendasi Wisata dan Kuliner di Kota Malang. <br> Cocok untuk kamu yang suka Traveling!</p>
            <a href="https://youtu.be/cbev8LtjYO4?si=CD4QAoR1xrGmSNa1" class="home-btn">Kunjungi sekarang!</a>
        </div>
    </section>

    <section class="container">
        <div class="text">
            <h2>Mulai jelajahi Wisata <br> terbaik disini!</h2>
        </div>

        <div class="row-items">
            <div class="container-box">
                <div class="container-img">
                    <a href="wisata/wisata.php"><img src="image/wisata.png" alt="Wisata Image"></a>
                    <h4>Wisata</h4>
                </div>
            </div>
            <div class="container-box">
                <div class="container-img">
                    <a href="kuliner/kuliner.php"><img src="image/kuliner.png" alt="Kuliner Image"></a>
                    <h4>Kuliner</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="package" id="package">
        <div class="title">
            <h2>Wisata Terpopuler <br> Di Kota Malang!</h2>
        </div>

        <?php
    include '../koneksi.php';
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM wisata") or die(mysqli_error($mysqli));
    $limit = 3;  
    $count = 0;
?>

<div class="package-content">
    <?php
        while($data = mysqli_fetch_array($query_mysql)) { 
            if ($count >= $limit) break;  
            $IDwisata = $data['IDwisata'];
            $query_rating = mysqli_query($mysqli, "SELECT AVG(rating) as average_rating FROM rating_wisata WHERE IDtransaksi IN (SELECT IDtransaksi FROM transaksi WHERE IDwisata='$IDwisata')") or die(mysqli_error($mysqli));
            $rating_data = mysqli_fetch_array($query_rating);
            $average_rating = $rating_data['average_rating'];
            $count++;  
        ?>
        <div class="box">
            <div class="thum">
                <img src="../admin/wisata/gambar/<?php echo $data["image"]; ?>" width="200" title="<?php echo $data['image']; ?>">
                <h3>Rp. <?php echo $data['harga']; ?></h3>
            </div>

            <div class="dest-content">
                <div class="location">
                    <a href="<?php echo $data['website_wisata']; ?>"><h4><?php echo $data['nama_wisata']; ?></h4></a>
                    <p><?php echo $data['jadwal']; ?></p>
                    <div class="rating">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $average_rating ? '★' : '☆';
                        }
                        ?>
                        <span><?php echo number_format($average_rating,1); ?>/5</span>
                    </div>
                </div>
                <a href="wisata/halaman.php?id=<?php echo $data['IDwisata']; ?>"><button class="btn-pesan">Kunjungi</button></a>
                <a href="<?php echo $data['maps']; ?>"><button class="btn-map">Map</button></a>
            </div>
        </div>

    <?php } ?>
</div>

        </div>
    </section>

    <section class="destination" id="destination">
        <div class="title">
            <h2>Mulai jelajahi Kuliner <br> terbaik disini!</h2>
        </div>

        <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM kuliner") or die(mysqli_error($mysqli));
            $limit = 3;  
            $count = 0;
            ?>

        <div class="package-content">
        <?php
            while($data = mysqli_fetch_array($query_mysql)) { 
                if ($count >= $limit) break;  
                $IDkuliner = $data['IDkuliner'];
                $query_rating = mysqli_query($mysqli, "SELECT AVG(rating) as average_rating FROM rating_kuliner WHERE IDtransaksi_kuliner IN (SELECT IDtransaksi_kuliner FROM transaksi_kuliner WHERE IDkuliner='$IDkuliner')") or die(mysqli_error($mysqli));
                $rating_data = mysqli_fetch_array($query_rating);
                $average_rating = $rating_data['average_rating'];
                $count++;  
            ?>
            <div class="box">
                <div class="thum">
                    <img src="../admin/kuliner/gambar/<?php echo $data["image"]; ?>" width="200" title="<?php echo $data['image']; ?>">
                    <h3>Rp. <?php echo $data['harga']; ?></h3>
                </div>

                <div class="dest-content">
                    <div class="location">
                        <a href="<?php echo $data['website_kuliner']; ?>"><h4><?php echo $data['nama_kuliner']; ?></h4></a>
                        <p><?php echo $data['jadwal']; ?></p>
                        <div class="rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $average_rating ? '★' : '☆';
                            }
                            ?>
                            <span><?php echo number_format($average_rating,1); ?>/5</span>
                        </div>
                    </div>
                    <a href="kuliner/halaman.php?id=<?php echo $data['IDkuliner']; ?>"><button class="btn-pesan">Kunjungi</button></a>
                    <a href="<?php echo $data['maps']; ?>"><button class="btn-map">Map</button></a>
                </div>
            </div>

            <?php }?>
        </div>
    </section>

    <section class="newsletter">
        <div class="news-text">
            <h2></h2>
        </div>
    </section>
    <div class="footer">
    <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
   </div>
</body>
</html>
