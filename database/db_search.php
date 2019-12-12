<?php

require_once("connection.php");

//args -> city, date_in, date_out, min_price, max_price, n_guests
function searchPlaces($args) {

    global $db;

    $query = 'SELECT Place.name as name, Place.price_by_night as price, Place.placeID as id
              FROM Place, HasAvailability, Availability, Reservation, Address, City
              WHERE Place.price_by_night >= :min_price AND
                    Place.price_by_night <= :max_price';

    // city argument
    if (!empty($args['city'])) {
        $query .= ' AND City.name = :city AND
                         City.cityID = Address.cityID AND 
                         Address.addressID = Place.addressID';
    }

    // date in argument
    if (!empty($args['date_in'])) {
        $query .= ' AND HasAvailability.placeID = Place.placeID  
                    AND HasAvailability.availabilityID = Availability.availabilityID 
                    AND Availability.date_begin <= :date_in 
                    AND Availability.date_end >= :date_in';
    }

    // date out argument
    if (!empty($args['date_out'])) {
        $query .= ' AND HasAvailability.placeID = Place.placeID 
                    AND HasAvailability.availabilityID = Availability.availabilityID 
                    AND Availability.date_begin <= :date_out
                    AND Availability.date_end >= :date_out';
    }

    // n_guests argument
    if (!empty($args['n_guests'])) {
        $query .= ' AND Place.max_guests >= :n_guests';
    }

    $query .= ';';

    echo "<br><br><br><br><h3>" . $query. "</h3>"; 

    $stmnt = $db->prepare($query);
    $stmnt->execute($args);
    $result = $stmnt->fetchAll();


    return $result;
}

?>