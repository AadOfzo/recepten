<?php
include('includes/dbh.inc.php');
include 'header.php';

// Dummy session voor test
// $_SESSION["username"] = "nieuwe naam";
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.styles.css">

    <link rel="stylesheet" href="./css/recepten.styles.css">
    <title>Recepten Index</title>
</head>

<body>
    <section>
        <div class="MainContent">
            <?php
            // Bepaal welke pagina we moeten weergeven
            $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default naar home
            $allowed_pages = [
                'signup',
                'login',
                'logout',
                'updateuser',
                'deleteuser',
                'searchuser',
                'recepten',
                'home'
            ];

            // Controleer of de gevraagde pagina in de toegestane lijst staat
            if (in_array($page, $allowed_pages)) {
                // Pad naar de pagina
                $file = __DIR__ . "/pages/users/$page.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    // Probeer receptenpagina's
                    $file = __DIR__ . "/pages/recepten/$page.php";
                    if (file_exists($file)) {
                        include $file;
                    } else {
                        echo "<p>Pagina niet gevonden.</p>";
                    }
                }
            } else {
                echo "<p>Pagina niet toegestaan.</p>";
            }
            ?>
        </div>
    </section>
</body>

</html>