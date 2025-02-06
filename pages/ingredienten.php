<?php
// Include de databaseverbinding
include 'includes/dbh.inc.php';

// Opties voor eenheden
$eenheden = ['kg', 'g', 'liter', 'ml', 'stuk', 'tros', 'el', 'tl'];

// SQL-query om de ingredienten op te halen
$sql = "SELECT * FROM ingredienten";
$stmt = $pdo->query($sql);

// Resultaten ophalen
$ingredienten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div>
    <h1>Ingrediënten Toevoegen</h1>

    <!-- Formulier om ingrediënt toe te voegen -->
    <form action="includes/ingredienten_handler.inc.php" method="POST">
        <label for="naam">Ingrediënt Naam:</label>
        <input type="text" id="naam" name="naam" required>

        <label for="eenheid">Eenheid:</label>
        <select id="eenheid" name="eenheid">
            <option value="kg">kg</option>
            <option value="g">g</option>
            <option value="liter">liter</option>
            <option value="ml">ml</option>
            <option value="stuk">stuk</option>
            <option value="tros">tros</option>
            <option value="el">el</option>
            <option value="tl">tl</option>
        </select>

        <label for="categorie">Categorie:</label>
        <select id="categorie" name="categorie">
            <option value="Groente">Groente</option>
            <option value="Fruit">Fruit</option>
            <option value="Vlees">Vlees</option>
            <option value="Overig">Overig</option>
        </select>

        <button type="submit">Voeg Ingrediënt toe</button>
    </form>

    <!-- Ingredienten uit database: -->
    <h1>Ingrediënten Lijst</h1>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Eenheid</th>
                <th>Categorie</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredienten as $ingredient) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($ingredient['naam']); ?></td>
                    <td><?php echo htmlspecialchars($ingredient['eenheid']); ?></td>
                    <td><?php echo htmlspecialchars($ingredient['categorie']); ?></td>
                    <td>
                        <a href="updateingredient.php?id=<?php echo $ingredient['id']; ?>">Bewerken</a> |
                        <a href="deleteingredient.php?id=<?php echo $ingredient['id']; ?>">Verwijderen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>