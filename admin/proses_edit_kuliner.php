<?php

include("../koneksi.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama_kuliner = $_POST['nama_kuliner'];
    $deskripsi_kuliner = $_POST['deskripsi_kuliner'];
    $website_kuliner = $_POST['website_kuliner'];

    $result = mysqli_query($mysqli,"UPDATE kuliner SET nama_kuliner='$nama_kuliner',deskripsi_kuliner='$deskripsi_kuliner',website_kuliner='$website_kuliner' 
    WHERE IDkuliner=$id");
    header('Location: index.php');
} else {
    die("Akses dilarang...");
}
?>