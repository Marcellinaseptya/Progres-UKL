

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <link rel="stylesheet" href="css/profile.css">

    
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
        <a href="index.php">Home</a>
        <a href="/Project UKL/user/wisata/wisata.php">Wisata</a>
        <a href="/Project UKL/user/kuliner/kuliner.php">Kuliner</a>
        <a href="riwayat.php">Riwayat</a>
        <a href="profile.php">Profile</a>
    </ul>
</header>
<section class="profil">
    <h1 class="heading">Profil User</h1>
    <br>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login.php");
        exit();
    }
    
    include '../koneksi.php';
    $username = $_SESSION['username'];
        $query_mysql = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$username'") or die(mysqli_error($mysqli));
        if ($data = mysqli_fetch_array($query_mysql)) {
    ?>
    <table border="1" class="table">
        <tr>
            <th>Nama</th>
            <td><?php echo $data['nama']; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo $data['username']; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $data['password']; ?></td>
        </tr>
    </table>
    <br>
    <a href="update.php?id=<?php echo $data['ID']; ?>" class="btn-edit">Edit Profil</a>
    <br>
    <?php }
    ?>
    <br>
    <a href="../login.php" class="btn">Log Out</a>
</section>

<div class="footer">
        <a href="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=celinecey9@gmail.com">Get in touch in celinecey9@gmail.com </a>
    </div>
</body>
</html>