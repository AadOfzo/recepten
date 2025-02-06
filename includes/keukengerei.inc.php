<?php
include 'dbh.inc.php';

function getTools($recept_id)
{
    global $conn;
    $query = "
        SELECT k.naam 
        FROM keukengerei k
        JOIN recept_keukengerei rk ON k.id = rk.keukengerei_id
        WHERE rk.recept_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $recept_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}
