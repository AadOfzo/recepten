<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/dbh.inc.php');

if (!$pdo) {
    die("Databaseverbinding mislukt!");
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.styles.css">
    <link rel="stylesheet" href="./css/header.styles.css">
    <link rel="stylesheet" href="./css/recepten.styles.css">
    <title>Recepten Index</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <section>
        <div class="MainContent">
            <?php
            // Bepaal welke pagina we moeten weergeven
            $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default naar home
            $allowed_pages = [
                'signup',
                'login',
                'logout',
                'update_user',
                'delete_user',
                'search_user',
                'recepten',
                'ingredienten',
                'home',
                'search'
            ];

            if (in_array($page, $allowed_pages)) {
                // Pad naar de pagina
                $file = __DIR__ . "/pages/$page.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    echo "<p>Pagina niet gevonden.</p>";
                }
            } else {
                echo "<p>Pagina niet toegestaan.</p>";
            }
            ?>
        </div>
    </section>
</body>

</html>