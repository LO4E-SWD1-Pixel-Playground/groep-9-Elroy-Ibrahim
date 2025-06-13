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
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $checkwachtwoord = $row['wachtwoord'];
                $checkgebruikersnaam = $row['gebruikersnaam'];
            }
            if (isset($checkwachtwoord) && isset($checkgebruikersnaam)) {
                echo "<h2>Login</h2>";
                $account = "login";
            } else {
                echo "<h2>Create Account</h2>";
                $account = "create";
            }
        }
        $result->close();
        ?><br>
        <input type="text" id="jegebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam">
        <br><br>
        <input type="text" id="jewachtwoord" name="wachtwoord" placeholder="Wachtwoord">
        <br><br>
        <?php if ($account === "create") {
            echo '<input type="text" id="jewachtwoordconformatie" name="wachtwoordconformatie" placeholder="Wachtwoord conformatie"> <br><br>';
        } else {

        } ?>
        <input type="submit" value="<?php echo $account ?>" id="account" name="jeaccount"><br><br>

    </form>
    <?php
    if (isset($_POST["jeaccount"])) {
        $control = 0;
        $ingevoerdegebruikersnaam = htmlspecialchars($_POST["gebruikersnaam"]);
        $ingevoerdewachtwoord = htmlspecialchars($_POST["wachtwoord"]);

        if ($ingevoerdegebruikersnaam === "" || $ingevoerdewachtwoord === "") {
            echo "Je gebruikersnaam of wachtwoord is leeg";

        } else {
            if (strlen($ingevoerdegebruikersnaam) <= 5 || strlen($ingevoerdewachtwoord) <= 5) {
                echo "Je gebruikersnaam of wachtwoord is tekort";
            } else {
                if ($account === "create") {
                    $ingevoerdewachtwoordconformatie = htmlspecialchars($_POST["wachtwoordconformatie"]);
                    $sql = "SELECT gebruikersnaam FROM gebruikers";
                    try {
                        if ($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc())
                                if ($row["gebruikersnaam"] === $ingevoerdegebruikersnaam) {
                                    $control++;
                                    $degebruiker = $row["gebruikersnaam"];
                                }
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                    }


                    $result->close();
                    if ($control > 0) {
                        echo "de gebruikersnaam" . $degebruiker . "is al in gebruik.";
                    } else {
                        if ($ingevoerdewachtwoordconformatie !== $ingevoerdewachtwoord) {
                            echo '<h3>Je wachtwoord en wachtwoordconformatie zijn niet hetzelfde!</h3>';
                        } else {
                            $stmt = $conn->prepare("INSERT INTO gebruikers (id, gebruikersnaam, wachtwoord) VALUES (?, ?, ?)");
                            $stmt->bind_param("iss", $hetid, $degebruikersnaam, $hetwachtwoord);
                           
                            $hetid = 8;
                            $hetwachtwoord = $ingevoerdewachtwoord;
                            $degebruikersnaam = $ingevoerdegebruikersnaam;
                            $stmt->execute();
                            try {
                                if ($result = $conn->query($sql)) {
                                    $_SESSION['profiel'] = $ingevoerdegebruikersnaam;
                                    header('Location: index.php');
                                }
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }

                        }
                    }
                } elseif ($account === "login") {
                    $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruikers WHERE id = 8";
                    try {
                        if ($result = $conn->query($sql)) {

                            while ($row = $result->fetch_assoc()) {
                                $wachtwoord = $row['wachtwoord'];
                                $gebruikersnaam = $row['gebruikersnaam'];
                            }
                        }
                        if ($wachtwoord === $ingevoerdewachtwoord && $ingevoerdegebruikersnaam === $gebruikersnaam) {
                            $_SESSION['profiel'] = $gebruikersnaam;
                            header('Location: index.php');
                        } else {
                            echo "<h1>Je gebruikersnaam of wachtwoord is fout.</h1>";
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                    }
                    $result->close();
                } else {
                    echo '';
                }
            }
        }
    }
    ?>
</body>

</html>