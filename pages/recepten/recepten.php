<?php
include '../../includes/dbh.inc.php'; // Zorg dat je databaseverbinding werkt

// Haal bestaande recepten op
$sql = "SELECT * FROM recepten";
$stmt = $pdo->query($sql);
$recepten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten</title>
</head>

<body>
    <h1>Recepten Pagina</h1>

    <!-- Formulier om een nieuw recept toe te voegen -->
    <h2>Voeg een nieuw recept toe</h2>
    <form action="includes/add_recipe.inc.php" method="post">
        <input type="text" name="naam" placeholder="Receptnaam" required>
        <textarea name="beschrijving" placeholder="Beschrijving"></textarea>
        <input type="number" name="bereidingstijd" placeholder="Bereidingstijd (minuten)" required>

        <h3>Ingrediënten</h3>
        <textarea name="ingredienten" placeholder="Bijv: 200g Boerenkool, 2 Aardappelen"></textarea>

        <h3>Keukengerei</h3>
        <textarea name="keukengerei" placeholder="Bijv: Pan, Mes"></textarea>

        <h3>Stappen</h3>
        <textarea name="stappen" placeholder="Bijv: 1. Kook water, 2. Voeg aardappelen toe"></textarea>

        <button type="submit">Recept toevoegen</button>
    </form>

    <hr>

    <!-- Receptenlijst -->
    <h2>Bestaande Recepten</h2>
    <ul>
        <?php foreach ($recepten as $recept): ?>
            <li>
                <strong><?php echo htmlspecialchars($recept['naam']); ?></strong> -
                <?php echo htmlspecialchars($recept['beschrijving']); ?>
                (<?php echo $recept['bereidingstijd']; ?> min)
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>