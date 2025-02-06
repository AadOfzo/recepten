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
        <li><a href="?page=home">Home</a></li>
        <!-- Gebruikerspagina's -->
        <?php if (!isset($_SESSION["username"])): ?>
            <!-- conditioneel gerendered -->
            <li><a href="?page=signup">Sign Up</a></li>
            <li><a href="?page=login">Login</a></li>
        <?php else: ?>
            <!-- Niet conditioneel gerendered -->
            <li><a href="?page=delete_user">Gebruiker verwijderen</a></li>
            <li><a href="?page=search_user">Gebruiker zoeken</a></li>

            <!-- Receptenpagina's -->
            <li><a href="?page=recepten">Recepten</a></li>
            <li><a href="?page=ingredienten">Ingredienten</a></li>
            <li><a href="?page=logout">Uitloggen</a></li>

        <?php endif; ?>
    </ul>
</nav>