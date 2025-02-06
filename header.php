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
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=deleteuser">Gebruiker verwijderen</a></li>
            <li><a href="?page=searchuser">Gebruiker Zoeken</a></li>
        <?php endif; ?>

        <!-- Receptenpagina's -->
        <li><a href="?page=recepten">Recepten</a></li>
        <li><a href="?page=ingredienten">Ingredienten</a></li>
        <li><a href="?page=logout">Uitloggen</a></li>
    </ul>
</nav>