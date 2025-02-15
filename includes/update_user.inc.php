<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    echo $username;
    echo $pass;
    echo $email;

    try {
        require_once "dbh.inc.php";
        // USER Handmatig Updaten met user_id!
        $query = "UPDATE users SET username = :username, pass = :pass, email = :email WHERE id = 6;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pass", $pass);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: /recepten/?page=home");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: /recepten/?page=home");
}
