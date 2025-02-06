<?php
session_start();
include '../dbh.inc.php';

if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Haal gebruiker op uit de database
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleer of de gebruiker bestaat en het wachtwoord klopt
    if ($user && password_verify($pass, $user['pass'])) {
        // Sla de sessie-informatie op
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../recepten.php"); // Redirect naar receptenpagina na inloggen
        exit();
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
} else {
    echo "Alle velden moeten ingevuld worden.";
}
