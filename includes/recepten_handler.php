<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";

    // Recept opslaan
        if (isset($_POST["recept"]) && isset($_POST["beschrijving"]) && isset($_POST["bereidingstijd"])) {
            $recept = $_POST["recept"];
            $beschrijving = $_POST["beschrijving"];
            $bereidingstijd = $_POST["bereidingstijd"];
            $user_id = $_POST["user_id"]; // Haal de user_id op

            $query = "INSERT INTO recepten (naam, beschrijving, bereidingstijd, user_id) VALUES (:naam, :beschrijving, :bereidingstijd, :user_id)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":naam", $recept);
            $stmt->bindParam(":beschrijving", $beschrijving);
            $stmt->bindParam(":bereidingstijd", $bereidingstijd);
            $stmt->bindParam(":user_id", $user_id); // Sla de gebruiker op
            $stmt->execute();

            // ID van het toegevoegde recept ophalen
            $receptID = $pdo->lastInsertId();

            // // Ingrediënten opslaan
            // if (isset($_POST["ingredienten"]) && isset($_POST["eenheid"])) {
            //     foreach ($_POST["ingredienten"] as $index => $ingredient) {
            //         $eenheid = $_POST["eenheid"][$index];

            //         $query = "INSERT INTO ingredienten (recept_id, naam, eenheid) VALUES (:recept_id, :naam, :eenheid)";
            //         $stmt = $pdo->prepare($query);
            //         $stmt->bindParam(":recept_id", $receptID);
            //         $stmt->bindParam(":naam", $ingredient);
            //         $stmt->bindParam(":eenheid", $eenheid);
            //         $stmt->execute();
            //     }
            // }

            // Keukengerei opslaan
            if (isset($_POST["keukengerei"])) {
                foreach ($_POST["keukengerei"] as $keukengerei) {
                    $query = "INSERT INTO keukengerei (recept_id, naam) VALUES (:recept_id, :naam)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(":recept_id", $receptID);
                    $stmt->bindParam(":naam", $keukengerei);
                    $stmt->execute();
                }
            }

            // Stappen opslaan
            if (isset($_POST["stappen"]) && isset($_POST["volgorde"])) {
                foreach ($_POST["stappen"] as $index => $stap) {
                    $volgorde = $_POST["volgorde"][$index];

                    $query = "INSERT INTO stappen (recept_id, volgorde, beschrijving) VALUES (:recept_id, :volgorde, :beschrijving)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(":recept_id", $receptID);
                    $stmt->bindParam(":volgorde", $volgorde);
                    $stmt->bindParam(":beschrijving", $stap);
                    $stmt->execute();
                }
            }
        }
        // Sluit de databaseverbinding
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
