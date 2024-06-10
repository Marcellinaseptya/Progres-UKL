<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $IDuser = mysqli_real_escape_string($mysqli, $_POST['ID']);
    $IDkuliner = mysqli_real_escape_string($mysqli, $_POST['IDkuliner']);
    $jumlah = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
    $tanggal = mysqli_real_escape_string($mysqli, $_POST['tanggal']);

    if (empty($IDuser) || empty($IDkuliner) || empty($jumlah) || empty($tanggal)) {
        echo "All fields are required.";
        exit();
    }

    if (!is_numeric($jumlah) || $jumlah <= 0) {
        echo "Invalid quantity.";
        exit();
    }

    $query = "SELECT harga FROM kuliner WHERE IDkuliner = '$IDkuliner'";
    $result = mysqli_query($mysqli, $query);
    
    if (mysqli_num_rows($result) == 0) {
        echo "Invalid kuliner ID.";
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    $harga = $row['harga'];
    
    $total_harga = $harga * $jumlah;

    $insertQuery = "INSERT INTO transaksi_kuliner (ID, IDkuliner, jumlah, total, tanggal, status) 
                    VALUES ('$IDuser', '$IDkuliner', '$jumlah', '$total_harga', '$tanggal', 'pending')";
    $insertResult = mysqli_query($mysqli, $insertQuery);

    if ($insertResult) {
        header("Location: ../riwayat.php");
        exit();
    } else {
        echo "Transaction failed: " . mysqli_error($mysqli);
    }
} else {
    echo "Invalid request.";
}
?>
