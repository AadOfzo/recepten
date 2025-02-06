<?php
// Include de databaseverbinding
include 'includes/dbh.inc.php';

// Verkrijg de formuliergegevens
$id = $_POST['id'];
$naam = $_POST['naam'];
$eenheid = $_POST['eenheid'];
$categorie = $_POST['categorie'];

// SQL-query om het ingrediënt bij te werken in de database
$sql = "UPDATE ingredienten SET naam = :naam, eenheid = :eenheid, categorie = :categorie WHERE id = :id";
$stmt = $pdo->prepare($sql);

// Bind de waarden
$stmt->bindParam(':id', $id);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':eenheid', $eenheid);
$stmt->bindParam(':categorie', $categorie);

// Voer de query uit
if ($stmt->execute()) {
    echo "Ingrediënt succesvol bijgewerkt!";
} else {
    echo "Er is een fout opgetreden bij het bijwerken van het ingrediënt.";
}
