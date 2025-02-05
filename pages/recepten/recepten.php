<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten CMS</title>
</head>

<body>
    <?php

    $gerechten = [
        "fruit" => array("Mango", "Banaan", "Perzik"),
        "groente" => array("Aardappel", "Spinazie", "Boerenkool"),
        "vlees" => array("Kip", "Vis", "Koe"),
    ];

    echo $gerechten["vlees"][2];

    // $groentes = ["Aardappel", "Spinazie", "Boerenkool"];
    // $fruit = ["Mango", "Banaan", "Perzik"];

    // array_splice($groentes, 2, 0, $fruit);
    // print_r($groentes);

    ?>
</body>