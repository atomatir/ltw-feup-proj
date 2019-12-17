<?php

require_once("connection.php");
require_once("checkInput.php");

    $update = "UPDATE Place 
                SET name = :name, 
                    descrip = :descrip, 
                    number_bedrooms = :number_bedrooms,
                    number_bathrooms = :number_bathrooms,
                    max_guests = :max_guests,
                    price_by_night = :price_by_night
                WHERE placeID = :placeID";

    echo "cona";
    $args['name'] = checkInput($_POST['name']);
    $args['descrip'] = checkInput($_POST['descrip']);
    $args['number_bedrooms'] = checkInput($_POST['number_bedrooms']);
    $args['number_bathrooms'] = checkInput($_POST['number_bathrooms']);
    $args['price_by_night'] = checkInput($_POST['price_by_night']);
    $args['max_guests'] = checkInput($_POST['max_guests']);
    $args['placeID'] = checkInput($_POST['placeID']);

    echo "cona";

    global $db;
    $stmnt = $db->prepare($update);
    echo "cona";
    $stmnt->execute($args);
    echo "cona";

    header("Location: ../pages/place.php?placeID=" . $_POST['placeID']);
?>