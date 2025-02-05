<?php

function getUserName()
{
    return isset($_SESSION["username"]) ? $_SESSION["username"] : "Gast";
}
