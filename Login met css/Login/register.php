<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title>Registreren</title>
    <link rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<?php if (isset($_GET['error'])) { ?>
    <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
    <p style="color:green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
<?php } ?>


    <h2 class="login">REGISTER</h2>
    <form action="register_process.php" method="post">
    <div class="loginform">
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Naam:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Wachtwoord:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Registreer</button>
                <p>Terug...</p>
        <a href="login.php">Klik hier!</a>
    </div>
    </form>
</body>
</html>
