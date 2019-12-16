<?php

require_once("connection.php");

    $update = "UPDATE Place 
                SET name = :name, 
                    descrip = :descrip, 
                    number_bedrooms = :number_bedrooms,
                    number_bathrooms = :number_bathrooms,
                    max_guests = :max_guests,
                    price_by_night = :price_by_night
                WHERE placeID = :placeID";

    global $db;
    $stmnt = $db->prepare($update);
    $stmnt->execute($_POST);

    header("Location: ../pages/place.php?placeID=" . $_POST['placeID']);
?>