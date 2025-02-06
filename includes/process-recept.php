<?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $bereidingstijd = $_POST['bereidingstijd'];
    $ingredienten = $_POST['ingredienten'] ?? [];
    $hoeveelheden = $_POST['hoeveelheden'] ?? [];
    $keukengerei = $_POST['keukengerei'] ?? [];
    $stappen = $_POST['stappen'] ?? [];

    if ($id) {
        $query = "UPDATE recepten SET naam = ?, beschrijving = ?, bereidingstijd = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $naam, $beschrijving, $bereidingstijd, $id);
    } else {
        $query = "INSERT INTO recepten (naam, beschrijving, bereidingstijd) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $naam, $beschrijving, $bereidingstijd);
    }

    $stmt->execute();
    $recept_id = $id ? $id : $conn->insert_id;

    // Verwijder en voeg nieuwe ingrediënten toe
    $conn->query("DELETE FROM recept_ingredienten WHERE recept_id = $recept_id");
    foreach ($ingredienten as $index => $ing) {
        $hoeveelheid = $hoeveelheden[$index];
        $stmt = $conn->prepare("INSERT INTO recept_ingredienten (recept_id, ingredient_id, hoeveelheid) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $recept_id, $ing, $hoeveelheid);
        $stmt->execute();
    }

    // Verwijder en voeg nieuw keukengerei toe
    $conn->query("DELETE FROM recept_keukengerei WHERE recept_id = $recept_id");
    foreach ($keukengerei as $tool) {
        $stmt = $conn->prepare("INSERT INTO recept_keukengerei (recept_id, keukengerei_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $recept_id, $tool);
        $stmt->execute();
    }

    // Verwijder en voeg nieuwe stappen toe
    $conn->query("DELETE FROM stappen WHERE recept_id = $recept_id");
    foreach ($stappen as $volgorde => $beschrijving) {
        $stmt = $conn->prepare("INSERT INTO stappen (recept_id, volgorde, beschrijving) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $recept_id, $volgorde + 1, $beschrijving);
        $stmt->execute();
    }

    header("Location: ../pages/recepten/boerenkool.php?id=" . $recept_id);
    exit;
}
