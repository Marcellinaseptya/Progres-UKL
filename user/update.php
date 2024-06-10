<?php
include("../koneksi.php");

if( !isset($_GET['id'])){
    header('Location: profile.php');
}
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $username = $user_data['username'];
    $password = $user_data['password'];
    $level = $user_data['level'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <title>Data Edit</title>
</head>
<body>
    <div class="container">
    <h1 class="title">Formulir Edit User</h1>

    <form method="POST" action="proses_update.php">
        <Table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="teks" name="username" value="<?php echo $username ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password ?>"></td>
            </tr>
            <tr>
                <td>level</td>
                <td>
                    <select name="level" id="level" required>
                        <option disabled selected> <?php echo $level ?></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </Table>
    </form>
</div>
</body>

</html>