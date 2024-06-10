<?php
include '../../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM rating_kuliner WHERE idrating_kuliner='$id'";
mysqli_query($mysqli, $query);

header("Location: index.php");
?>
