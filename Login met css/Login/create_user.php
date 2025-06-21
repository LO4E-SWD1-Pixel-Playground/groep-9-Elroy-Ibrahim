<?php
include "db_conn.php";

$username = "ibo";
$password = "123abc";
$name = "Ibrahim Mainich";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $hashed_password, $name);

if ($stmt->execute()) {
    echo "Gebruiker succesvol aangemaakt!";
} else {
    echo "Fout bij aanmaken gebruiker: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
