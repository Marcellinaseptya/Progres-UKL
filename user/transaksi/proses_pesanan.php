<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $IDuser = mysqli_real_escape_string($mysqli, $_POST['ID']);
    $IDwisata = mysqli_real_escape_string($mysqli, $_POST['IDwisata']);
    $jumlah = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
    $tanggal = mysqli_real_escape_string($mysqli, $_POST['tanggal']);

    if (empty($IDuser) || empty($IDwisata) || empty($jumlah) || empty($tanggal)) {
        echo "All fields are required.";
        exit();
    }

    if (!is_numeric($jumlah) || $jumlah <= 0) {
        echo "Invalid quantity.";
        exit();
    }

    $query = "SELECT harga FROM wisata WHERE IDwisata = '$IDwisata'";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "Error in query: " . mysqli_error($mysqli);
        exit();
    }

    if (mysqli_num_rows($result) == 0) {
        echo "Invalid wisata ID.";
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    $harga = $row['harga'];

    $total_harga = $harga * $jumlah;

    $insertQuery = "INSERT INTO transaksi (ID, IDwisata, jumlah, total, tanggal, status) 
                    VALUES ('$IDuser', '$IDwisata', '$jumlah', '$total_harga', '$tanggal', 'pending')";
    $insertResult = mysqli_query($mysqli, $insertQuery);

    if ($insertResult) {
        header("Location: ../riwayat.php");
        exit();
    } else {
        echo "Transaction failed: " . mysqli_error($mysqli);
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
