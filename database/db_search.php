<?php

require_once("connection.php");

//args -> region, countries, states, cityID, date-in, date-out, min-price, max-price, n-guests
function searchPlaces($args) {

    global $db;

    // default query with price
    $querySelectFrom = 'SELECT Place.name as name, Place.price_by_night as price, Place.placeID as id, Place.descrip as desc, Place.number_bedrooms as bed, Place.number_bathrooms as bath, Place.max_guests as guests, Place.price_by_night as price
                 FROM Place';
    $queryWhere = ' WHERE Place.price_by_night >= :min_price AND
              Place.price_by_night <= :max_price';

    $queryArgs = array('min_price' => $args['min-price'], 'max_price' => $args['max-price']);

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
    
    
    // city argument
    if (!empty($args['cityID']) && $args['cityID'] != 'None') {
        $queryWhere .= ' AND City.cityID = :city AND
                         City.cityID = Address.cityID AND 
                         Address.addressID = Place.addressID';
        $querySelectFrom .= ', City, Address';
        $queryArgs['city'] = $args['cityID']; 
    } 
    else if (!empty($args['states']) && $args['states'] != 'None') {
        $queryWhere .= ' AND State.stateID = :state AND
                         State.stateID = City.stateID AND
                         City.cityID = Address.cityID AND
                         Address.addressID = Place.addressID';
        $querySelectFrom .= ', State, City, Address';
        $queryArgs['state'] = $args['states'];
    } 
    else if (!empty($args['countries']) && $args['countries'] != 'None') {
        $queryWhere .= ' AND Country.countryID = :country AND
                         Country.countryID = State.countryID AND
                         State.stateID = City.stateID AND
                         City.cityID = Address.cityID AND
                         Address.addressID = Place.addressID';
        $querySelectFrom .= ', Country, State, City, Address';
        $queryArgs['country'] = $args['countries'];
    } 
    else if (!empty($args['region']) && $args['region'] != 'None') {
        $queryWhere .= ' AND Region.regionID = :region AND
                         Region.regionID = Country.regionID AND
                         Country.countryID = State.countryID AND
                         State.stateID = City.stateID AND
                         City.cityID = Address.cityID AND
                         Address.addressID = Place.addressID';
        $querySelectFrom .= ', Region, Country, State, City, Address';
        $queryArgs['region'] = $args['region'];
    }


    $queryWhere .= ';';

    $query = $querySelectFrom . $queryWhere;

    $stmnt = $db->prepare($query);
    $stmnt->execute($queryArgs);
    $result = $stmnt->fetchAll();

    return $result;
}

?>