<?php
// Include de databaseverbinding
include 'includes/dbh.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Haal het ingrediënt op dat bewerkt moet worden
    $sql = "SELECT * FROM ingredienten WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);

    // Als ingrediënt niet bestaat
    if (!$ingredient) {
        echo "Ingrediënt niet gevonden!";
        exit;
    }
} else {
    echo "Geen ingrediënt geselecteerd!";
    exit;
}
?>

<h1>Bewerk Ingrediënt</h1>
<form action="ingredienten_update_handler.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ingredient['id']; ?>">

    <label for="naam">Ingrediënt Naam:</label>
    <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($ingredient['naam']); ?>" required>

    <label for="eenheid">Eenheid:</label>
    <input type="text" id="eenheid" name="eenheid" value="<?php echo htmlspecialchars($ingredient['eenheid']); ?>" required>

    <label for="categorie">Categorie:</label>
    <select id="categorie" name="categorie" required>
        <option value="Groente" <?php echo ($ingredient['categorie'] == 'Groente') ? 'selected' : ''; ?>>Groente</option>
        <option value="Fruit" <?php echo ($ingredient['categorie'] == 'Fruit') ? 'selected' : ''; ?>>Fruit</option>
        <option value="Vlees" <?php echo ($ingredient['categorie'] == 'Vlees') ? 'selected' : ''; ?>>Vlees</option>
        <option value="Overig" <?php echo ($ingredient['categorie'] == 'Overig') ? 'selected' : ''; ?>>Overig</option>
    </select>

    <button type="submit">Bewerk Ingrediënt</button>
</form>