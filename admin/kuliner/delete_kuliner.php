<?php
include_once("../../koneksi.php");

if(!isset($_GET['ID'])){
    header('Location: index,php');
}

$id = $_GET ['id'];

$result = mysqli_query($mysqli, "DELETE FROM kuliner WHERE IDkuliner=$id");

header("location:index.php");
?>
