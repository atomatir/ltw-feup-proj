<?php

require_once("connection.php");

//args -> region, countries, states, cityID, date-in, date-out, min-price, max-price, n-guests
function searchPlaces($args) {

    if ( (isset($args['date-in']) && !isset($args['date-out'])) || (!isset($args['date-in']) && isset($args['date-out'])) ) {
        return array();
    }

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

    // dates argument
    if (!empty($args['date-in']) && !empty($args['date-out']) ) {
        $queryWhere .= ' ';
        $querySelectFrom .= ', ( SELECT placeID FROM Place EXCEPT SELECT placeID FROM Reservation 
                                                                    WHERE  (date_begin >= :dbegin AND date_end <= :dend) OR
                                                                            (date_begin <= :dbegin AND date_end >= :dbegin) OR
                                                                            (date_begin <= :dend  AND date_end >= :dend) ) as AvailPlace';
        $queryArgs['dbegin'] = $args['date-in'];
        $queryArgs['dend'] = $args['date-out'];
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