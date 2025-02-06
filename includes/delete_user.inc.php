<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    try {
        require_once "dbh.inc.php";

        // Haal de gebruiker op uit de database
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        // Haal de gebruiker op
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vergelijk het ingevoerde wachtwoord met het gehashte wachtwoord
            if (password_verify($pass, $user['pass'])) {
                // Wachtwoord klopt, gebruiker kan worden verwijderd
                $deleteQuery = "DELETE FROM users WHERE username = :username";
                $deleteStmt = $pdo->prepare($deleteQuery);
                $deleteStmt->bindParam(":username", $username);
                $deleteStmt->execute();

                // Redirect naar de indexpagina na het verwijderen met een bevestiging
                header("Location: /recepten/?page=delete_user&deleted=true");
                exit();
            } else {
                // Wachtwoord komt niet overeen
                echo "Het ingevoerde wachtwoord is onjuist.";
            }
        } else {
            // Gebruiker bestaat niet
            echo "Gebruiker niet gevonden.";
        }

        // Sluit de databaseverbinding
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
