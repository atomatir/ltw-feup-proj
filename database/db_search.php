<?php

//args -> city, date_in, date_out, min_price, max_price, n_guests
function searchPlace($args) {

    global $db;
    
    $query =   'SELECT Place.name as name, Place.price_by_night as price
                FROM Place, HasAvailability, Availability, Reservation, Address, City
                WHERE   City.name = ' . $args['city'] . ' AND
                        City.cityID = Address.cityID AND 
                        Address.addressID = Place.addressID AND 
                        
                        HasAvailability.placeID = Place.placeID AND
                        HasAvailability.availabilityID = Availability.availabilityID AND
                        Availability.date_begin <= ' . $args['date_in'] . ' AND
                        Availability.date_begin <= ' . $args['date_out'] . ' AND
                        Availability.date_end >= ' . $args['date_in'] . ' AND
                        Availability.date_end >= ' . $args['date_out'] . ' AND

                        Place.price_by_night >= ' . $args['min_price'] . ' AND
                        Place.price_by_night <= ' . $args['max_price'] . ' AND

                        Place.max_guests >= ' . $args['n_guests'] . ';';

    return $query;
}

?>