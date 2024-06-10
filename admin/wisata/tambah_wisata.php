<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Informasi Wisata</title>
    <link rel="stylesheet" href="../tambah.css">
</head>
<body>

    <div class="container">
        <h1 class="title">Wisata</h1><br>
        <form class="form" action="tambah_wisata.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nama_wisata" placeholder="nama" required>
            <input type="text" name="deskripsi_wisata" placeholder="deskripsi" required>
            <input type="text" name="website_wisata" placeholder="website" required>
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>          
            <input type="text" name="maps" placeholder="maps" required>
            <input type="text" name="jadwal" placeholder="jadwal" required>
            <input type="numeric" name="harga" placeholder="harga" required>
            <button class="button" name="submit">submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            include ('../../koneksi.php'); 

            $nama_wisata = mysqli_real_escape_string($mysqli, $_POST['nama_wisata']);
            $deskripsi_wisata = mysqli_real_escape_string($mysqli, $_POST['deskripsi_wisata']);
            $website_wisata = mysqli_real_escape_string($mysqli, $_POST['website_wisata']);
            $maps = mysqli_real_escape_string($mysqli, $_POST['maps']);
            $jadwal = mysqli_real_escape_string($mysqli, $_POST['jadwal']);
            $jadwal = mysqli_real_escape_string($mysqli, $_POST['harga']);

            // Handle file upload
            if ($_FILES["image"]["error"] == 4) {
                echo "<script>alert('Image Does Not Exist');</script>";
            } else {
                $fileName = $_FILES["image"]["name"];
                $fileSize = $_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];

                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                
                if (!in_array($imageExtension, $validImageExtension)) {
                    echo "Invalid Image Extension";
                } else if ($fileSize > 1000000) { // 1MB
                    echo "Image Size Is Too Large";
                } else {
                    $newImageName = uniqid();
                    $newImageName .= '.' . $imageExtension;

                    if (!is_dir('gambar/')) {
                        mkdir('gambar/', 0777, true);
                    }

                    $imageFolder = 'gambar/' . $newImageName;
                    move_uploaded_file($tmpName, $imageFolder);

                    $result = mysqli_query($mysqli, 
                    "INSERT INTO wisata (nama_wisata, deskripsi_wisata, website_wisata, image, maps, jadwal, harga) 
                    VALUES ('$nama_wisata', '$deskripsi_wisata', '$website_wisata', '$newImageName', '$maps', '$jadwal', '$harga')");

                    if ($result) {
                        echo "<script>
                            alert('Successfully Added');
                            document.location.href = 'index.php';
                        </script>";
                    } else {
                        echo "Error: " . $mysqli->error;
                    }
                }
            }
        }
        ?>
    </div>
</body>
</html>
