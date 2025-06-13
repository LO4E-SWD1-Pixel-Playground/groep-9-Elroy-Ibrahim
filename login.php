<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
    <meta name="description" content="">
    <title>Login page</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
        require('database.php');
        $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruikers WHERE id = 8";
               if ( $result = $conn->query($sql)) {
            echo "<h2>Login</h2>";
            $account = "login";
        } else {
            echo "<h2>Create Account</h2>";
            $account = "create";
        }
        $result->close();
        ?><br>
        <input type="text" id="jegebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam">
        <br><br>
        <input type="text" id="jewachtwoord" name="wachtwoord" placeholder="Wachtwoord">
        <br><br>
        <input type="submit" value="<?php echo $account ?>" id="account" name="jeaccount"><br><br>

    </form>
    <?php
    if (isset($_POST["jeaccount"])) {
        $control = 0;
        $ingevoerdewachtwoord = $_POST["wachtwoord"];
        $ingevoerdegebruikersnaam = $_POST["gebruikersnaam"];
        if ($ingevoerdegebruikersnaam === "" || $ingevoerdewachtwoord === "") {
            echo "Je gebruikersnaam of wachtwoord is leeg";

        } else {
            if (strlen($ingevoerdegebruikersnaam) <= 5 || strlen($ingevoerdewachtwoord) <= 5) {
                echo "Je gebruikersnaam of wachtwoord is tekort";
            } else {
                if ($account === "create") {
                    $sql = "SELECT gebruikersnaam FROM gebruikers";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if ($row["gebruikersnaam"] === $ingevoerdegebruikersnaam) {
                            $control++;
                            $degebruiker = $row["gebruikersnaam"];
                        }
                    }
                    if ($control > 0) {
                        echo "de gebruikersnaam" . $degebruiker . "is al in gebruik.";
                    } else {
                        $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ($ingevoerdegebruikersnaam, $ingevoerdewachtwoord)";
                        echo "Je hebt een account gemaakt";
                        $result->close();
                    }

                } elseif ($account === "login") {
                    $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruikers WHERE id = 8";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $wachtwoord = $row['wachtwoord'];
                        $gebruikersnaam = $row['gebruikersnaam'];
                    }
                    if ($wachtwoord === $ingevoerdewachtwoord && $ingevoerdegebruikersnaam === $gebruikersnaam) {
                        echo "<h1>Welkom" . $gebruikersnaam . "</h1>";
                    } else {
                        echo "<h1>Je gebruikersnaam of wachtwoord is fout.</h1>";
                    }
                    $result->close();
                }
            }
        }
    }
    ?>
</body>

</html>