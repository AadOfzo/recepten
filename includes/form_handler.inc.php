<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";

    try {
        // Gebruiker opslaan
        if (isset($_POST["username"]) && isset($_POST["pass"]) && isset($_POST["email"])) {
            $username = $_POST["username"];
            $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);  // Wachtwoord hashen
            $email = $_POST["email"];

            $query = "INSERT INTO users (username, pass, email) VALUES (:username, :pass, :email)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pass", $pass);
            $stmt->bindParam(":email", $email);

            $stmt->execute();

            // Sla de gebruiker in de sessie op
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $pdo->lastInsertId();

            // Redirect naar een andere pagina na succesvolle registratie
            header("Location: /recepten/?page=home");
            exit();
        }

        // Sluit de databaseverbinding
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: /recepten/?page=home");
}
