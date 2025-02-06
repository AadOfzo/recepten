<?php
include '../../functions/recept-functions.php';

$edit = false;
$recept = ['id' => '', 'naam' => '', 'beschrijving' => '', 'bereidingstijd' => ''];

// Controleer of we een bestaand recept bewerken
if (isset($_GET['id'])) {
    $edit = true;
    $recept = getReceptById($_GET['id']);
    $ingredienten = getReceptIngredienten($_GET['id']);
    $tools = getRecipeTools($_GET['id']);
    $steps = getRecipeSteps($_GET['id']);
} else {
    $ingredients = [];
    $tools = [];
    $steps = [];
}
?>


<div>
    <h1><?php echo $edit ? 'Bewerk' : 'Voeg Toe'; ?> Recept</h1>
    <form action="../../includes/process-recipe.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">

        <label>Naam:</label>
        <input type="text" name="naam" value="<?php echo htmlspecialchars($recipe['naam']); ?>" required>

        <label>Beschrijving:</label>
        <textarea name="beschrijving" required><?php echo htmlspecialchars($recipe['beschrijving']); ?></textarea>

        <label>Bereidingstijd (minuten):</label>
        <input type="number" name="bereidingstijd" value="<?php echo $recipe['bereidingstijd']; ?>" required>

        <h3>Ingrediënten</h3>
        <div id="ingredienten">
            <?php foreach ($ingredients as $i): ?>
                <input type="text" name="ingredienten[]" value="<?php echo htmlspecialchars($i['naam']); ?>" placeholder="Ingrediënt">
                <input type="text" name="hoeveelheden[]" value="<?php echo htmlspecialchars($i['hoeveelheid']); ?>" placeholder="Hoeveelheid">
                <br>
            <?php endforeach; ?>
            <button type="button" onclick="addIngredient()">+ Ingrediënt</button>
        </div>

        <h3>Keukengerei</h3>
        <div id="keukengerei">
            <?php foreach ($tools as $t): ?>
                <input type="text" name="keukengerei[]" value="<?php echo htmlspecialchars($t['naam']); ?>" placeholder="Keukengerei">
                <br>
            <?php endforeach; ?>
            <button type="button" onclick="addTool()">+ Keukengerei</button>
        </div>

        <h3>Bereidingsstappen</h3>
        <div id="stappen">
            <?php foreach ($steps as $s): ?>
                <textarea name="stappen[]"><?php echo htmlspecialchars($s['beschrijving']); ?></textarea>
                <br>
            <?php endforeach; ?>
            <button type="button" onclick="addStep()">+ Stap</button>
        </div>

        <button type="submit" name="submit"><?php echo $edit ? 'Update' : 'Toevoegen'; ?> Recept</button>
    </form>

    <script>
        function addIngredient() {
            let div = document.getElementById('ingredienten');
            div.innerHTML += '<input type="text" name="ingredienten[]" placeholder="Ingrediënt"> <input type="text" name="hoeveelheden[]" placeholder="Hoeveelheid"><br>';
        }

        function addTool() {
            let div = document.getElementById('keukengerei');
            div.innerHTML += '<input type="text" name="keukengerei[]" placeholder="Keukengerei"><br>';
        }

        function addStep() {
            let div = document.getElementById('stappen');
            div.innerHTML += '<textarea name="stappen[]" placeholder="Stap"></textarea><br>';
        }
    </script>
</div>