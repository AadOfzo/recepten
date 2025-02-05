<?php
include('includes/dbh.inc.php');
include 'header.php';

// Dummy session voor test
$_SESSION["username"] = "nieuwe naam";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten CMS</title>
</head>

<body>
    <section>
        <div class="MainContent">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'signup'; // Default naar signup
            $allowed_pages = ['signup', 'updateuser', 'deleteuser', 'searchuser', 'recepten'];

            if (in_array($page, $allowed_pages)) {
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