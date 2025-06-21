<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $name = validate($_POST['name']);

    if (empty($username)) {
        header("Location: register.php?error=Gebruikersnaam is verplicht");
        exit();
    } else if (empty($password)) {
        header("Location: register.php?error=Wachtwoord is verplicht");
        exit();
    } else if (empty($name)) {
        header("Location: register.php?error>Naam is verplicht");
        exit();
    }

    $stmt = $conn->prepare("SELECT user_name FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: register.php?error=Gebruikersnaam bestaat al");
        exit();
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $name);

        if ($stmt->execute()) {
            header("Location: index.php?success=Registratie gelukt, je kunt nu inloggen");
            exit();
        } else {
            header("Location: register.php?error=Er is iets misgegaan");
            exit();
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>