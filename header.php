<?php
session_start();
include 'functions/user-functions.php';
include 'functions/file-functions.php';  // Zorg ervoor dat dit bestand correct is

// Mappen voor gebruikers en recepten
$usersFolder = 'pages/users/';
$receptenFolder = 'pages/recepten/';

// Verkrijg bestanden
$userFiles = getFilesFromFolder($usersFolder);
$receptenFiles = getFilesFromFolder($receptenFolder);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten NAV</title>
    <nav>
        <ul>
            <h3>Welkom, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h3>

            <!-- Gebruikerspagina's -->
            <li><a href="?page=signup">Sign Up</a></li>
            <li><a href="?page=updateuser">Update User</a></li>
            <li><a href="?page=deleteuser">Delete User</a></li>
            <li><a href="?page=searchuser">Search User</a></li>

            <!-- Receptenpagina's -->
            <?php foreach ($receptenFiles as $file): ?>
                <li><a href="?page=<?php echo pathinfo($file, PATHINFO_FILENAME); ?>">
                        <?php echo pathinfo($file, PATHINFO_FILENAME); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</head>