<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LOGIN</title>
    <link rel="stylesheet" href="stylesheet.css" />
    <meta name="author" content="Ibrahim Mainich" />
    <meta name="keywords" content="login, website login, gaming website"/>
</head>
<body>
    <form action="login.php" method="post">
        <h2 class="login">LOGIN</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>
            
        <div class="loginform">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username here..." required><br> <br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password here..." required><br><br>
        <button type="submit" class="login_button">Login</button>
        <p>Geen Account?</p>
        <a href="register.php">Klik hier!</a>
        </div>

    </form>
</body>
</html>
