<?php

include("../koneksi.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $result = mysqli_query($mysqli,"UPDATE user
    SET nama='$nama',username='$username',password='$password', level='$level'
    WHERE id=$id");
    header('Location: profile.php');
} else {
    die("Akses dilarang...");
}
?>