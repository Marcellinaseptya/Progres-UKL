<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wisata</title>
    <link rel="stylesheet" href="../tambah.css">
</head>
<body>

<div class="container">
    <h1 class="title">Edit Wisata</h1><br>

    <?php
    include '../../koneksi.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query_mysql = mysqli_query($mysqli, "SELECT * FROM wisata WHERE IDwisata='$id'") or die(mysqli_error($mysqli));
        $data = mysqli_fetch_array($query_mysql);
    }

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama_wisata = mysqli_real_escape_string($mysqli, $_POST['nama_wisata']);
        $deskripsi_wisata = mysqli_real_escape_string($mysqli, $_POST['deskripsi_wisata']);
        $website_wisata = mysqli_real_escape_string($mysqli, $_POST['website_wisata']);
        $maps = mysqli_real_escape_string($mysqli, $_POST['maps']);
        $jadwal = mysqli_real_escape_string($mysqli, $_POST['jadwal']);
        $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);

        // Handle file upload
        $update_image = false;
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "Invalid Image Extension";
                exit();
            } else if ($fileSize > 1000000) { 
                echo "Image Size Is Too Large";
                exit();
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                if (!is_dir('gambar/')) {
                    mkdir('gambar/', 0777, true);
                }

                $imageFolder = 'gambar//' . $newImageName;
                move_uploaded_file($tmpName, $imageFolder);

                $update_image = true;
            }
        }

        if ($update_image) {
            $result = mysqli_query($mysqli, "UPDATE wisata SET nama_wisata='$nama_wisata', deskripsi_wisata='$deskripsi_wisata', website_wisata='$website_wisata', image='$newImageName', maps='$maps', jadwal='$jadwal', harga='$harga' WHERE IDwisata='$id'");
        } else {
            $result = mysqli_query($mysqli, "UPDATE wisata SET nama_wisata='$nama_wisata', deskripsi_wisata='$deskripsi_wisata', website_wisata='$website_wisata', maps='$maps', jadwal='$jadwal', harga='$harga' WHERE IDwisata='$id'");
        }

        if ($result) {
            echo "<script>
                alert('Successfully Updated');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "Error: " . $mysqli->error;
        }
    }
    ?>

    <form class="form" action="edit_wisata.php?id=<?php echo $data['IDwisata']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['IDwisata']; ?>">
        <input type="text" name="nama_wisata" placeholder="nama" value="<?php echo $data['nama_wisata']; ?>" required>
        <input type="text" name="deskripsi_wisata" placeholder="deskripsi" value="<?php echo $data['deskripsi_wisata']; ?>" required>
        <input type="text" name="website_wisata" placeholder="website" value="<?php echo $data['website_wisata']; ?>" required>
        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
        <input type="text" name="maps" placeholder="maps" value="<?php echo $data['maps']; ?>" required>
        <input type="text" name="jadwal" placeholder="jadwal" value="<?php echo $data['jadwal']; ?>" required>
        <input type="text" name="harga" placeholder="harga" value="<?php echo $data['harga']; ?>" required>
        <button class="button" name="submit">Update</button>
    </form>
</div>

</body>
</html>
