<div>
    <h1>Delete</h1>

    <?php
    // Controleer of de gebruiker succesvol is verwijderd
    if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
        echo "<p style='color: green;'>De gebruiker is succesvol verwijderd!</p>";
    }
    ?>

    <form action="includes/deleteuser.inc.php" method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="pass" placeholder="Paswoord" required>
        <button>Delete</button>
    </form>
</div>