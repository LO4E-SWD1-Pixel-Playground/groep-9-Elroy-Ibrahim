<!DOCTYPE html>
<html lang="en">

<head>
    <html lang="nl">
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
</head>

<body class="hangman">
    <header>
    
            <?php
            echo $_SESSION['profiel'];
            echo '<input type="hidden" id="you" value="' . $_SESSION['profiel'] . '">'?>
    </header>
    <main class="hangmanmain">
    <section class="containerhangman">
        <article id="options-container"></article>
        <article id="letter-container" class="letter-container hide"></article>
        <article id="user-input-section"></article>
        <canvas id="cans"></canvas>
        <article id="new-game-container" class="new-game-popup hide">
            <article id="result-text"></article>
            <button id="new-game-button">New game</button>
        </article>
    </section>
    </main>
</body>

</html>