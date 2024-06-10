<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi wisata</title>
    <link rel="stylesheet" href="create.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicon@latest/css/boxicons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>



<section class="form-section">
    <h1 class="heading">Tambah Transaksi wisata</h1>
    <form action="tambah_transaksi.php" method="post">
        <div class="form-group">
            <label for="IDwisata">Nama wisata:</label>
            <select name="IDwisata" id="IDwisata" required>
                <?php
                include '../../koneksi.php';
                $result = mysqli_query($mysqli, "SELECT * FROM wisata");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row['IDwisata']."'>".$row['nama_wisata']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ID">Nama User:</label>
            <select name="ID" id="ID" required>
                <?php
                $result = mysqli_query($mysqli, "SELECT * FROM user");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row['ID']."'>".$row['nama']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>
        </div>
        <div class="form-group">
            <label for="total">Total Harga:</label>
            <input type="number" name="total" id="total" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="Pending">Pending</option>
                <option value="Successful">Successful</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Tambah Transaksi</button>
        </div>
    </form>

    <?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDwisata = $_POST['IDwisata'];
    $ID = $_POST['ID'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = "INSERT INTO transaksi (IDwisata, ID, jumlah, total, tanggal, status) 
              VALUES ('$IDwisata', '$ID', '$jumlah', '$total', '$tanggal', '$status')";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Data transaksi berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data transaksi!'); window.location.href='tambah.php';</script>";
    }

}
?>


</section>

</body>
</html>
