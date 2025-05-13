<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
    <title>friends page</title>
</head>

<body>
    <form method="post">
        <input type="submit" value="zoek naam" name="vriendenverzoek">
    </form>
    <?php 
    if (isset) {
       
    } try {
        $conn = new mysqli("localhost", "root", "", "pixelplayground");
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
    $sql = "INSERT INTO vrienden (vriend_id)
SELECT id
FROM gebruikers
WHERE gebruikersnaam LIKE '%$verzoek%'";
$sql = "SELECT gebruikersnaam
FROM gebruikers
INNER JOIN vrienden ON vrienden.vriend_id = gebruikers.id";
    try {
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
            echo $row["gebruikersnaam"];
            }
        }
        $result->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
    
    $conn->close(); ?>
</body>

</html>