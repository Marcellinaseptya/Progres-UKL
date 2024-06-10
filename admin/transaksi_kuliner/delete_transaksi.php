<?php
include_once("../../koneksi.php");

if(!isset($_GET['id'])){
    header('Location: index,php');
}

$id = $_GET ['id'];

$result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE IDtransaksi=$id");

header("location:index.php");
?>
