<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";

    try {
        // Check of alle velden zijn ingevuld
        if (isset($_POST["naam"]) && isset($_POST["eenheid"]) && isset($_POST["categorie"])) {
            $naam = $_POST["naam"];
            $eenheid = $_POST["eenheid"];
            $categorie = $_POST["categorie"];

            // SQL-query om het ingrediënt op te slaan
            $query = "INSERT INTO ingredienten (naam, eenheid, categorie) VALUES (:naam, :eenheid, :categorie)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":naam", $naam);
            $stmt->bindParam(":eenheid", $eenheid);
            $stmt->bindParam(":categorie", $categorie);

            $stmt->execute();

            // Redirect naar de ingrediëntenpagina na toevoegen
            header("Location: ../pages/recepten/ingredienten.php");
            exit();
        } else {
            echo "Alle velden moeten ingevuld worden.";
        }

        // Sluit de databaseverbinding
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect als het formulier niet via POST wordt ingediend
    header("Location: ingredienten.php");
}
