<?php
include 'includes/dbh.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Haal het ingrediënt op dat bewerkt moet worden
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Als ingrediënt niet bestaat
    if (!$user) {
        echo "Ingrediënt niet gevonden!";
        exit;
    }
} else {
    echo "Geen ingrediënt geselecteerd!";
    exit;
}
?>

<div>
    <h1>Bewerk Gebruiker</h1>

    <form action="includes/update_user.inc.php" method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam">
        <input type="password" name="pass" placeholder="Paswoord">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Bewerk</button>
    </form>
</div>