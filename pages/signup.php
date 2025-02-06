<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Controleer of de gebruiker al is ingelogd
if (isset($_SESSION['user_id'])) {
    header("/recepten/?page=home"); // Als je al ingelogd bent, doorverwijzen naar de receptenpagina
    exit();
}
?>

<div>
    <h1>Sign up</h1>
    <form action="includes/form_handler.inc.php" method="POST">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="pass" placeholder="Paswoord" required>
        <input type="text" name="email" placeholder="E-Mail" required>
        <button>SignUp</button>
    </form>

    <hr>

    <h2>Heb je al een account?</h2>
    <p>Als je al een account hebt, kun je <a href="?page=login">hier inloggen</a>.</p>
</div>