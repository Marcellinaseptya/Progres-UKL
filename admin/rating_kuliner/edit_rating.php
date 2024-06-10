<?php
include '../../koneksi.php';

$id = $_POST['id'];
$ID = $_POST['ID'];
$IDkuliner = $_POST['IDkuliner'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

$query = "UPDATE rating_kuliner SET ID='$ID', IDkuliner='$IDkuliner', rating='$rating', feedback='$feedback' WHERE idrating_kuliner='$id'";
mysqli_query($mysqli, $query);

header("Location: index.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating Kuliner</title>
    <link rel="stylesheet" href="../edit.css">
</head>
<body>
    <?php
    include '../../koneksi.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM rating_kuliner WHERE idrating_kuliner='$id'";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_array($result);
    ?>
    <h1>Edit Rating Kuliner</h1>
    <form action="edit_rating.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['idrating_kuliner']; ?>">
        <label>Nama User:</label>
        <input type="text" name="ID" value="<?php echo $data['ID']; ?>" required><br>
        <label>Nama Kuliner:</label>
        <input type="text" name="IDkuliner" value="<?php echo $data['IDkuliner']; ?>" required><br>
        <label>Rating:</label>
        <input type="number" name="rating" value="<?php echo $data['rating']; ?>" min="1" max="5" required><br>
        <label>Ulasan:</label>
        <textarea name="feedback" required><?php echo $data['feedback']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
