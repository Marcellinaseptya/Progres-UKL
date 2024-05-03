<?php
include_once("../koneksi.php");

if(!isset($_GET['ID'])){
    header('Location: index,php');
}

$id = $_GET ['id'];

$result = mysqli_query($mysqli, "DELETE FROM wisata WHERE IDwisata=$id");

header("location:index.php");
?>
