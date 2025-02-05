<?php
session_start();
include 'functions/user-functions.php';  // Zorg ervoor dat dit bestand correct is

// Functie om bestanden uit een map te halen
function getFilesFromFolder($folder)
{
    $files = array_diff(scandir($folder), array('..', '.'));  // Verwijdert . en .. uit de lijst
    return $files;
}

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
</head>

<body>
    <nav>
        <ul>
            <h3>Welkom, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h3>

            <!-- Voeg gebruikerspagina's toe -->
            <li><a href="?page=signup">Sign Up</a></li>
            <li><a href="?page=update">Update User</a></li>
            <li><a href="?page=delete">Delete User</a></li>
            <li><a href="?page=search">Search User</a></li>

            <!-- Voeg receptenpagina's toe -->
            <?php foreach ($receptenFiles as $file): ?>
                <li><a href="?page=<?php echo pathinfo($file, PATHINFO_FILENAME); ?>">
                        <?php echo pathinfo($file, PATHINFO_FILENAME); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</body>

</html>