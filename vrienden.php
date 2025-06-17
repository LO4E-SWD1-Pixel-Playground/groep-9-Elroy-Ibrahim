<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
    <meta name="description" content="">
    <title>friends page</title>
    <meta name="Author" content="Elroy">
    <meta name="description" content="Dit is een vrienden pagina voor pixelplayground">
</head>

<body>
    <header></header>
    <main>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="verzoeknaam">
            <input type="submit" value="zoek naam" name="vriendenverzoek">
        </form>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            require('database.php');
            $gebruiker = 0;
            $verzoeknaam = '';
            if (isset($_POST["vriendenverzoek"])) {
                $verzoeknaam = $_POST["verzoeknaam"];

                if (isset($_POST["vriendenverzoek"])) {

                    if (preg_match_all(pattern: "/[0 1 2 3 4 5 6 7 8 9]/", subject: $verzoeknaam)) {
                        $verzoeknaam = '';
                    }
                    if (is_numeric($verzoeknaam)) {
                        $verzoeknaam = '';
                    }
                    if ($verzoeknaam === false || $verzoeknaam === '') {
                        $sql = "SELECT gebruikersnaam FROM gebruikers WHERE id = 0";
                    } else {
                        $sql = "SELECT gebruikersnaam FROM gebruikers LEFT JOIN vrienden ON gebruikers.id = vrienden.vriend_id WHERE vrienden.vriend_id IS NULL AND gebruikersnaam LIKE '%$verzoeknaam%'";
                    }
                    try {
                        if ($result = $conn->query($sql)) {
                            if ($verzoeknaam === false || $verzoeknaam === '' || empty($row = $result->fetch_assoc())) {
                                if ($verzoeknaam === false || $verzoeknaam === '') {
                                    echo '';
                                } else {
                                    echo "Geen resultaten voor:<br>" . $verzoeknaam;
                                }

                            } else {
                                while ($row = $result->fetch_assoc()) {
                                    $gebruiker++;
                                    echo "<br> <input type='checkbox' hidden onclick='vrienden()' class='gebruikersnaam gebruiker" . $gebruiker . "' id='" . $row['gebruikersnaam'] . "' value='" . $row['gebruikersnaam'] . "'>" . " <label for='" . $row['gebruikersnaam'] . "'>" . $row['gebruikersnaam'] . "</label> <br>";
                                }
                            }
                        }

                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                    }
                    $result->close();

                } else {
                    echo "";
                }
            }
            ?>
            <input type="text" hidden name="gebruikersnaam" id="denaam">
            <br><br>
            <input type="submit" hidden name="verstuurverzoek" value="verstuur verzoek" id="verstuurverzoek">
        </form>
        <?php

        if (isset($_POST["verstuurverzoek"])) {
            $gebruikersnaam = $_POST['gebruikersnaam'];
            if ($_POST['gebruikersnaam'] !== '') {
                $sql = "INSERT INTO vrienden (vriend_id)
         SELECT id FROM gebruikers LEFT JOIN vrienden ON gebruikers.id = vrienden.vriend_id WHERE vrienden.vriend_id IS NULL AND
gebruikersnaam='$gebruikersnaam'";
            }


            try {
                if ($result = $conn->query($sql)) {
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
        }
 ?>
        <section>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input name="wegvriend" type="hidden" id="vriendenverwijderen"><?php
                $vriendverwijderen = 1;
                try {
                    $conn = new mysqli("localhost", "root", "", "pixelplayground");
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                }
                $sql = "SELECT gebruikersnaam, id FROM gebruikers INNER JOIN vrienden ON gebruikers.id = vrienden.vriend_id";
                try {
                    if ($result = $conn->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<br><input type='checkbox' hidden onclick='vriendverwijderen()' id='" . $row['gebruikersnaam'] . $vriendverwijderen . "' class='verwijderen vriend" . $vriendverwijderen . "' value='" . $row['id'] . "' >" . "<label for='" . $row['gebruikersnaam'] . $vriendverwijderen . "'>"
                                . "<input type='hidden' value='" . $row['gebruikersnaam'] . "' id='vriendverwijderenh" . $vriendverwijderen . "'>"
                                . $row['gebruikersnaam'] . "</label><br>";
                            $vriendverwijderen++;
                        }
                    }

                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                }
                $result->close(); ?>
                <input hidden name="submitweg" type="submit" value="" id="autoclick">
            </form>
        </section>
        <?php
        if (isset($_POST["submitweg"])) {
            $wegvriend = $_POST['wegvriend'];
            if ($_POST['wegvriend'] !== '') {
                $sql = "DELETE FROM vrienden WHERE vriend_id = $wegvriend";
            }


            try {
                if ($result = $conn->query($sql)) {
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
        }

       ?>
    </main>
    <footer></footer>
</body>

</html>