<?php
include("../koneksi.php");

if( !isset($_GET['id'])){
    header('Location: index.php');
}
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM wisata WHERE IDwisata=$id");

while($data_wisata = mysqli_fetch_array($result))
{
    $nama_wisata = $data_wisata['nama_wisata'];
    $deskripsi_wisata = $data_wisata['deskripsi_wisata'];
    $website_wisata = $data_wisata['website_wisata'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Edit</title>
</head>
<body>
    <header>
        <h3>Formulir Edit Wisata</h3>
    </header>
    <form method="POST" action="proses_edit_wisata.php">
        <Table>
            <tr>
                <td>Nama wisata</td>
                <td><input type="text" name="nama_wisata" value="<?php echo $nama_wisata;?>"></td>
            </tr>
            <tr>
                <td>Deskripsi wisata</td>
                <td><input type="text" name="deskripsi_wisata" value="<?php echo $deskripsi_wisata ?>"></td>
            </tr>
            <tr>
                <td>Website wisata</td>
                <td><input type="text" name="website_wisata" value="<?php echo $website_wisata ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </Table>
    </form>
</body>

</html>