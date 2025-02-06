<?php
session_start();
include '../includes/dbh.inc.php';

if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Input validation
    if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
        $error = "Invalid username format.";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // echo "iets";
            if (password_verify($pass, $user['pass'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                session_regenerate_id(true);
                header("Location: /recepten/?page=home");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Username not found.";
        }
    }

    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
} else {
    $error = "All fields are required.";
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
}
