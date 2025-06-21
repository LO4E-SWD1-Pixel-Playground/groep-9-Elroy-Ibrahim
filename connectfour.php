<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
    <meta name="description" content="">
    <title>connect 4</title>
    <meta name="Author" content="Elroy">
</head>

<body id="connectbody" onload="connectfour()">
    <header></header>
    <main id=connectmain>
        <section id="connectgame">
            <h1 id="texth1">vier op een rij</h1>

            <article class="game-board">
                <article class="cells row-top col-0"></article>
                <article class="cells row-top col-1"></article>
                <article class="cells row-top col-2"></article>
                <article class="cells row-top col-3"></article>
                <article class="cells row-top col-4"></article>
                <article class="cells row-top col-5"></article>
                <article class="cells row-top col-6"></article>
                <article class="cells row-0 col-0 left-border top-border"></article>
                <article class="cells row-0 col-1 top-border"></article>
                <article class="cells row-0 col-2 top-border"></article>
                <article class="cells row-0 col-3 top-border"></article>
                <article class="cells row-0 col-4 top-border"></article>
                <article class="cells row-0 col-5 top-border"></article>
                <article class="cells row-0 col-6 top-border right-border"></article>
                <article class="cells row-1 col-0 left-border"></article>
                <article class="cells row-1 col-1"></article>
                <article class="cells row-1 col-2"></article>
                <article class="cells row-1 col-3"></article>
                <article class="cells row-1 col-4"></article>
                <article class="cells row-1 col-5"></article>
                <article class="cells row-1 col-6 right-border"></article>
                <article class="cells row-2 col-0 left-border"></article>
                <article class="cells row-2 col-1"></article>
                <article class="cells row-2 col-2"></article>
                <article class="cells row-2 col-3"></article>
                <article class="cells row-2 col-4"></article>
                <article class="cells row-2 col-5"></article>
                <article class="cells row-2 col-6 right-border"></article>
                <article class="cells row-3 col-0 left-border"></article>
                <article class="cells row-3 col-1"></article>
                <article class="cells row-3 col-2"></article>
                <article class="cells row-3 col-3"></article>
                <article class="cells row-3 col-4"></article>
                <article class="cells row-3 col-5"></article>
                <article class="cells row-3 col-6 right-border"></article>
                <article class="cells row-4 col-0 left-border"></article>
                <article class="cells row-4 col-1"></article>
                <article class="cells row-4 col-2"></article>
                <article class="cells row-4 col-3"></article>
                <article class="cells row-4 col-4"></article>
                <article class="cells row-4 col-5"></article>
                <article class="cells row-4 col-6 right-border"></article>
                <article class="cells row-5 col-0 bottom-border left-border"></article>
                <article class="cells row-5 col-1 bottom-border"></article>
                <article class="cells row-5 col-2 bottom-border"></article>
                <article class="cells row-5 col-3 bottom-border"></article>
                <article class="cells row-5 col-4 bottom-border"></article>
                <article class="cells row-5 col-5 bottom-border"></article>
                <article class="cells row-5 col-6 bottom-border right-border"></article>
            </article>
            <article class="reset-en-status">
                <button onclick="reseting()" class="reset">reset</button>
                <span class="status"></span>
            </article>
        </section>
        <section id="players">
            <h2 class="score">score: </h2>
            <form id="playerinfo" action="">
                <select id="otherplayer">
                    <option value="Yellow"></option>
                    <?php
                    require('database.php');
                    $sql = "SELECT gebruikersnaam FROM gebruikers INNER JOIN vrienden ON vrienden.vriend_id = gebruikers.id";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['gebruikersnaam'] . '">' . $row['gebruikersnaam'] . '</option>';
                    }
                    $result->close(); ?>
                </select><?php

                $sql = "SELECT gebruikersnaam FROM gebruikers WHERE id = 1";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<input type="hidden" id="you" value="' . $row['gebruikersnaam'] . '">';
                }
                $result->close(); ?>

            </form>
        </section>
    </main>
    <footer>
    </footer>
</body>

</html>