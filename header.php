<?php
session_start();
include 'functions/user-functions.php';
include 'functions/file-functions.php';

// Mappen voor gebruikers en recepten
$usersFolder = 'pages/users/';
$receptenFolder = 'pages/recepten/';

$userFiles = getFilesFromFolder($usersFolder);
$receptenFiles = getFilesFromFolder($receptenFolder);


?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.styles.css"> <!-- Verwijs naar header.styles.css -->
    <title>Recepten NAV</title>
</head>

<body>
    <nav>
        <h3>Welkom, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h3>

        <ul>
            <!-- Gebruikerspagina's -->
            <li><a href="?page=signup">Sign Up</a></li>
            <li><a href="?page=updateuser">Update User</a></li>
            <li><a href="?page=deleteuser">Delete User</a></li>
            <li><a href="?page=searchuser">Search User</a></li>

            <!-- Receptenpagina's -->
            <li><a href="?page=recepten">Recepten</a></li>
        </ul>
    </nav>
</body>