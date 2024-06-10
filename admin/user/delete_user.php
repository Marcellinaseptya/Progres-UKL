<?php
include_once("../../koneksi.php");

if(!isset($_GET['id'])){
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$deleteTransaksi = mysqli_query($mysqli, "DELETE FROM transaksi WHERE ID=$id");

if($deleteTransaksi) {
    $result = mysqli_query($mysqli, "DELETE FROM user WHERE ID=$id");

    if($result) {
        header("Location: index.php");
    } else {
        echo "Terjadi kesalahan saat menghapus catatan pengguna.";
    }
} else {
    echo "Terjadi kesalahan saat menghapus catatan transaksi.";
}
?>