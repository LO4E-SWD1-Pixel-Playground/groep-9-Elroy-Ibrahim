<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>
