<?php
include '../../koneksi.php';

$id = $_GET['id'];

mysqli_query($mysqli, "DELETE FROM rating_wisata WHERE idrating_wisata='$id'");

header("location:index.php");
?>
