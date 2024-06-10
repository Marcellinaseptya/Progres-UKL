<?php
include '../../koneksi.php';

$nama_user = $_POST['nama'];
$nama_wisata = $_POST['nama_wisata'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

$query_user = mysqli_query($mysqli, "SELECT ID FROM user WHERE nama='$nama_user'");
$user = mysqli_fetch_assoc($query_user);
$user_id = $user['ID'];

$query_wisata = mysqli_query($mysqli, "SELECT IDwisata FROM wisata WHERE nama_wisata='$nama_wisata'");
$wisata = mysqli_fetch_assoc($query_wisata);
$wisata_id = $wisata['IDwisata'];

mysqli_query($mysqli, "INSERT INTO rating_wisata (ID, IDwisata, rating, feedback) VALUES ('$user_id', '$wisata_id', '$rating', '$feedback')");

header("location:index.php");
?>