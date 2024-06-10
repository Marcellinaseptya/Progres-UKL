<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $IDkuliner = $_POST['IDkuliner'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    $query = "INSERT INTO rating_kuliner (ID, IDkuliner, rating, feedback) VALUES ('$ID', '$IDkuliner', '$rating', '$feedback')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rating Kuliner</title>
    <link rel="stylesheet" href="../tabell.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Tambah Rating Kuliner</h1>
        <form action="tambah.php" method="post">
            <label>Nama User:</label>
            <select name="ID" required>
                <?php
                include '../../koneksi.php';
                $users = mysqli_query($mysqli, "SELECT ID, nama FROM user");
                while ($user = mysqli_fetch_array($users)) {
                    echo "<option value='".$user['ID']."'>".$user['nama']."</option>";
                }
                ?>
            </select><br>

            <label>Nama Kuliner:</label>
            <select name="IDkuliner" required>
                <?php
                $kuliners = mysqli_query($mysqli, "SELECT IDkuliner, nama_kuliner FROM kuliner");
                while ($kuliner = mysqli_fetch_array($kuliners)) {
                    echo "<option value='".$kuliner['IDkuliner']."'>".$kuliner['nama_kuliner']."</option>";
                }
                ?>
            </select><br>

            <label>Rating:</label>
            <input type="number" name="rating" min="1" max="5" required><br>

            <label>Ulasan:</label>
            <textarea name="feedback" required></textarea><br>

            <input type="submit" value="Tambah">
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
