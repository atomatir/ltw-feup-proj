<?php

    require_once "connection.php";

    global $db;

    $query = "SELECT max(price) as maxPrice FROM (
        SELECT price_by_night as price FROM Place)";

    $stmnt = $db->prepare($query);
    $stmnt->execute();
    echo json_encode($stmnt->fetch());

?>