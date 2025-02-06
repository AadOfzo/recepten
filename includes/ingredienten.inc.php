<?php
include 'dbh.inc.php';

function getIngredients($recept_id)
{
    global $conn;
    $query = "
        SELECT i.naam, ri.hoeveelheid, i.eenheid 
        FROM recept_ingredienten ri 
        JOIN ingredienten i ON ri.ingredient_id = i.id 
        WHERE ri.recept_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $recept_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}
