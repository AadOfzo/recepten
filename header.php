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
    <link rel="stylesheet" href="./css/header.styles.css"> <!-- Verwijs naar header.styles.css -->
    <title>Recepten NAV</title>
</head>

<body>
    <nav>
        <!-- Welkomstbericht -->
        <?php if (isset($_SESSION["username"])): ?>
            <h3>Welkom, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h3>
        <?php else: ?>
            <h3>Welkom, gast!</h3>
        <?php endif; ?>

        <ul>
            <!-- Gebruikerspagina's -->
            <?php if (!isset($_SESSION["username"])): ?>
                <!-- conditioneel gerendered -->
                <li><a href="?page=signup">Sign Up</a></li>
                <li><a href="?page=login">Login</a></li>
            <?php else: ?>
                <!-- Niet conditioneel gerendered -->
                <li><a href="./pages/home.php">Home</a></li>
                <li><a href="?page=deleteuser">Delete User</a></li>
                <li><a href="?page=searchuser">Search User</a></li>
                <li><a href="./pages/users/logout.php">Logout</a></li>
            <?php endif; ?>

            <!-- Receptenpagina's -->
            <li><a href="?page=recepten">Recepten</a></li>
        </ul>
    </nav>
</body>

</html>