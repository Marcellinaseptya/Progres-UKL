<?php

include("../koneksi.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];
    $website_wisata = $_POST['website_wisata'];

    $result = mysqli_query($mysqli,"UPDATE wisata SET nama_wisata='$nama_wisata',deskripsi_wisata='$deskripsi_wisata',website_wisata='$website_wisata' 
    WHERE IDwisata=$id");
    header('Location: index.php');
} else {
    die("Akses dilarang...");
}
?>