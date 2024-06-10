<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $IDtransaksi = $_GET['id'];
    $query = "SELECT * FROM transaksi WHERE IDtransaksi = '$IDtransaksi'";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Invalid request.";
    exit();
}

if (isset($_POST['update'])) {
    $IDwisata = $_POST['IDwisata'];
    $IDuser = $_POST['IDuser'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];

    $updateQuery = "UPDATE transaksi SET IDwisata = '$IDwisata', ID = '$IDuser', jumlah = '$jumlah', total = '$total' WHERE IDtransaksi = '$IDtransaksi'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    if ($updateResult) {
        echo "Transaction updated successfully!";
        header('Location: index.php');
    } else {
        echo "Update failed: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="edit.css">
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

    <section class="form-edit">
        <h1 class="heading">Edit Transaksi</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="IDwisata">Nama Wisata:</label>
                <select name="IDwisata" id="IDwisata" required>
                    <?php
                    $wisataQuery = "SELECT * FROM wisata";
                    $wisataResult = mysqli_query($mysqli, $wisataQuery);
                    while ($wisata = mysqli_fetch_assoc($wisataResult)) {
                        echo "<option value='{$wisata['IDwisata']}' " . ($wisata['IDwisata'] == $data['IDwisata'] ? 'selected' : '') . ">{$wisata['nama_wisata']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="IDuser">Nama User:</label>
                <select name="IDuser" id="IDuser" required>
                    <?php
                    $userQuery = "SELECT * FROM user";
                    $userResult = mysqli_query($mysqli, $userQuery);
                    while ($user = mysqli_fetch_assoc($userResult)) {
                        echo "<option value='{$user['ID']}' " . ($user['ID'] == $data['ID'] ? 'selected' : '') . ">{$user['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" value="<?php echo $data['jumlah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total">Total Harga Tiket:</label>
                <input type="number" name="total" id="total" value="<?php echo $data['total']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update" class="btn">
            </div>
        </form>
    </section>
</body>
</html>
