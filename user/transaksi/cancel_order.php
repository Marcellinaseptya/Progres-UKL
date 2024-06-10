<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $IDtransaksi = $_GET['id'];

    // Update transaction status to 'canceled'
    $updateQuery = "UPDATE transaksi SET status = 'canceled' WHERE IDtransaksi = '$IDtransaksi'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    if ($updateResult) {
        header("Location: riwayat.php?status=canceled");
    } else {
        echo "Failed to cancel order: " . mysqli_error($mysqli);
    }
} else {
    echo "Invalid request.";
}
?>
