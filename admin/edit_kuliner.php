<?php
include("../koneksi.php");

if( !isset($_GET['id'])){
    header('Location: index.php');
}
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM kuliner WHERE IDkuliner=$id");

while($data_kuliner = mysqli_fetch_array($result))
{
    $nama_kuliner = $data_kuliner['nama_kuliner'];
    $deskripsi_kuliner = $data_kuliner['deskripsi_kuliner'];
    $website_kuliner = $data_kuliner['website_kuliner'];
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
        <h3>Formulir Edit kuliner</h3>
    </header>
    <form method="POST" action="proses_edit_kuliner.php">
        <Table>
            <tr>
                <td>Nama kuliner</td>
                <td><input type="text" name="nama_kuliner" value="<?php echo $nama_kuliner;?>"></td>
            </tr>
            <tr>
                <td>Deskripsi kuliner</td>
                <td><input type="text" name="deskripsi_kuliner" value="<?php echo $deskripsi_kuliner ?>"></td>
            </tr>
            <tr>
                <td>Website kuliner</td>
                <td><input type="text" name="website_kuliner" value="<?php echo $website_kuliner ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </Table>
    </form>
</body>

</html>