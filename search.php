<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST["usersearch"]; // Correcte variabele naam
    echo "Zoeken naar: " . htmlspecialchars($userSearch) . "<br>";

    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT recepten.id, recepten.naam, recepten.datum_toegevoegd 
                  FROM recepten 
                  INNER JOIN users ON recepten.user_id = users.id 
                  WHERE users.username = :usersearch";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":usersearch", $userSearch);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($results);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
</head>

<body>
    <section>
        <h3>Zoek Resultaten "<?php echo htmlspecialchars($userSearch); ?>"</h3>

        <?php
        if (empty($results)) {
            echo "<div>";
            echo "<p>Geen resultaten gevonden.</p>";
            echo "</div>";
        } else {

            foreach ($results as $row) {
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["naam"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["datum_toegevoegd"]) . "</p>";
                echo "</div>";
            }
        }

        ?>
    </section>
</body>

</html>