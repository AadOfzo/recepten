<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    header("Location: /recepten/?page=home"); // Redirect naar receptenpagina na inloggen
    exit();
}
?>

<div>
    <h1>Inloggen</h1>
    <form action="/recepten/includes/login_handler.inc.php" method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="pass" placeholder="Paswoord" required>
        <button>Inloggen</button>
    </form>

    <hr>
    <h2>Heb je geen account?</h2>
    <p>Als je nog geen account hebt, kun je <a href="signup.php">je nu aanmelden</a>.</p>
</div>