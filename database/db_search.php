<?php

require_once("connection.php");

//args -> region, countries, states, cityID, date-in, date-out, min-price, max-price, n-guests
function searchPlaces($args) {

    global $db;

    $querySelectFrom = 'SELECT Place.name as name, Place.price_by_night as price, Place.placeID as id
                 FROM Place';
    $queryWhere = ' WHERE Place.price_by_night >= :min_price AND
              Place.price_by_night <= :max_price';

    $queryArgs = array('min_price' => $args['min-price'], 'max_price' => $args['max-price']);

    // city argument
    if (!empty($args['city'])) {
        $queryWhere .= ' AND City.name = :city AND
                         City.cityID = Address.cityID AND 
                         Address.addressID = Place.addressID';
        $querySelectFrom .= ', City, Address';
        $queryArgs['city'] = $args['city']; 
    }

    // n_guests argument
    if (!empty($args['n-guests'])) {
        $queryWhere .= ' AND Place.max_guests >= :n_guests';
        $queryArgs['n_guests'] = $args['n-guests'];
    }

    // date in argument
    if (!empty($args['date-in'])) {
        $queryWhere .= ' AND HasAvailability.placeID = Place.placeID  
                    AND HasAvailability.availabilityID = Availability.availabilityID 
                    AND Availability.date_begin <= :date_in 
                    AND Availability.date_end >= :date_in';
        $querySelectFrom .= ', HasAvailability, Availability';
        $queryArgs['date_in'] = $args['date-in'];
    }

    // date out argument
    if (!empty($args['date-out'])) {
        // if date in not defined, adds availability queries
        if(empty($args['date-in'])) {
            $queryWhere .= ' AND HasAvailability.placeID = Place.placeID 
                             AND HasAvailability.availabilityID = Availability.availabilityID';
            $querySelectFrom .= ', HasAvailability, Availability';
        }

        $queryWhere .= ' AND Availability.date_begin <= :date_out
                         AND Availability.date_end >= :date_out';
        $queryArgs['date_out'] = $args['date-out'];
    }

    $queryWhere .= ';';

    $query = $querySelectFrom . $queryWhere;

    echo "<br><br><br><br><br><br><br><h3>" . $query. "</h3>"; 

    $stmnt = $db->prepare($query);
    $stmnt->execute($queryArgs);
    $result = $stmnt->fetchAll();

    print_r($result);

    return $result;
}

?>