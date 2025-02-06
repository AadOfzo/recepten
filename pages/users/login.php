<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: recepten.php"); // Als je al ingelogd bent, doorverwijzen naar de receptenpagina
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>

<body>
    <h1>Inloggen</h1>
    <form action="includes/loginhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="pass" placeholder="Paswoord" required>
        <button>Inloggen</button>
    </form>
    <hr>
    <h2>Heb je geen account?</h2>
    <p>Als je nog geen account hebt, kun je <a href="signup.php">je nu aanmelden</a>.</p>
</body>

</html>