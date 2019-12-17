<?php
    require_once "../database/session.php";
    require_once "../database/db_user.php";
    require_once "../database/db_address.php";

    function manageElem($id, $name, $rating, $specs, $bed, $bath, $guests, $price) {

        echo "<div class=\"elem-property\" onClick=\"location.href='../pages/manage-place.php?placeID=" . $id . "'\" >
                <img class='elem-property-pic' src='../images/background-house.jpg' alt='house picture'>
                <div class='elem-property-text'>
                    <div class='elem-property-title'>
                        <h2 class='elem-property-name'> " . $name . "</h2>
                        <div class='elem-property-rating' >
                            <img class='rating-house-pic' src='../images/FullHouse.png' alt=' >
                            <h4 class='elem-property-rating-no'>(" . $rating . ")</h4>
                        </div>
                    </div>
                    <div class='elem-property-info' >
                        <div class='elem-property-rooms elem-property-bed' >" . $bed . "</div>
                        <div class='elem-property-rooms elem-property-bath' >" . $bath . "</div>
                        <div class='elem-property-rooms elem-property-guests' >" . $guests . "</div>
                    </div>
                    <div class='elem-property-specs' >" . $specs . "</div>
                        <div class='elem-property-outside-price'>
                        <div class='elem-property-price' >" . $price . " € / night</div>
                    </div>
    
                </div>
             </div>";
    }


    $places = getOwnedPlaces($_SESSION['userID']);

    echo "<div id='property-list-all'><h1 style='text-align: center;'>Manage Places</h1> ";

    foreach($places as $place) {
        $placeDetails = getPlaceDetails($place['placeID']);
        manageElem($place['placeID'], $placeDetails['name'], 1, $placeDetails['descrip'], $placeDetails['number_bedrooms'], $placeDetails['number_bathrooms'], $placeDetails['max_guests'], $placeDetails['price_by_night']);
    }


    echo "</div><footer id='black-footer'>";
?>

