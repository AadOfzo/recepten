<?php
session_start(); // Start de sessie

// Verwijder alle sessievariabelen
session_unset();

// Vernietig de sessie
session_destroy();

// Redirect de gebruiker naar de homepage of een andere pagina na uitloggen
header("Location: ../pages/home.php");
exit();
