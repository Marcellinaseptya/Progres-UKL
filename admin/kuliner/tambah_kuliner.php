<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Informasi kuliner</title>
    <link rel="stylesheet" href="../tambah.css">
</head>
<body>

    <div class="container">
        <h1 class="title">kuliner</h1><br>
        <form class="form" action="tambah_kuliner.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nama_kuliner" placeholder="nama" required>
            <input type="text" name="deskripsi_kuliner" placeholder="deskripsi" required>
            <input type="text" name="website_kuliner" placeholder="website" required>
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>          
            <input type="text" name="maps" placeholder="maps" required>
            <input type="text" name="jadwal" placeholder="jadwal" required>
            <input type="numeric" name="harga" placeholder="harga" required>
            <button class="button" name="submit">submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            include ('../../koneksi.php'); 

            $nama_kuliner = mysqli_real_escape_string($mysqli, $_POST['nama_kuliner']);
            $deskripsi_kuliner = mysqli_real_escape_string($mysqli, $_POST['deskripsi_kuliner']);
            $website_kuliner = mysqli_real_escape_string($mysqli, $_POST['website_kuliner']);
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
                    "INSERT INTO kuliner (nama_kuliner, deskripsi_kuliner, website_kuliner, image, maps, jadwal, harga) 
                    VALUES ('$nama_kuliner', '$deskripsi_kuliner', '$website_kuliner', '$newImageName', '$maps', '$jadwal', '$harga')");

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
