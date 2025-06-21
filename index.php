<!DOCTYPE html>

<head>
    <html lang="nl">
    <?php
    session_start();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
    <meta name="description" content="">
    <title>Home page</title>
</head>


<body><header><?php 
if ($_SESSION['profiel'] === '' || $_SESSION['profiel'] === false || $_SESSION['profiel'] === 'anoniem' || empty($_SESSION['profiel'])) {
   $_SESSION['profiel'] = 'anoniem';
}
echo $_SESSION['profiel'];
?></header><main><a href="vrienden.php">go</a>
<a href="connectfour.php">connect 4</a>
<a href="hangman.php">hangman</a>
<a href="login.php">login</a>
    </main>
<footer></footer>
</body>
</html>