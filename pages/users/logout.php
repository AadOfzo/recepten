<?php
// Start de sessie alleen als deze nog niet gestart is
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verwijder alle sessievariabelen
session_unset();

// Vernietig de sessie
session_destroy();

// Redirect de gebruiker naar de homepage of een andere pagina na uitloggen
header("Location: ../pages/home.php");
exit();
