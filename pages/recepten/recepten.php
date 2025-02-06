<?php
// Haal recepten op uit de database
$sql = "SELECT recepten.*, users.username FROM recepten 
        JOIN users ON recepten.user_id = users.id";
$stmt = $pdo->query($sql);
$recepten = $stmt->fetchAll(PDO::FETCH_ASSOC);
include '../../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="nl">

<body>
    <div class="container">
        <h1>Recepten Pagina</h1>

        <h2>Voeg een nieuw recept toe</h2>
        <form action="includes/formhandler.inc.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
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


        <h2>Bestaande Recepten</h2>
        <ul>
            <?php foreach ($recepten as $recept): ?>
                <li>
                    <strong><?php echo htmlspecialchars($recept['naam']); ?></strong> -
                    <?php echo htmlspecialchars($recept['beschrijving']); ?>
                    (<?php echo $recept['bereidingstijd']; ?> min)
                    <br>
                    <small>Gemaakt door: <?php echo htmlspecialchars($recept['username']); ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html>