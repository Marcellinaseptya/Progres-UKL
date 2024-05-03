<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style1.css">

</head>
<body>
    <div class="container">
        <h1 class="title">Log-in</h1><br>
        <form class="form" action="login.php" method="post">
            <input type="text" name="Username" placeholder="username">
            <input type="password" name="Password" placeholder="password">
            <a href="login.php">
                <button class="button">Login</button>
            </a>
        </form>
        <div class="forgot">
            <a href="register.php">Register</a> <a href="#">Forgot Password</a>
        </div>
    </div>
</body>
</html>