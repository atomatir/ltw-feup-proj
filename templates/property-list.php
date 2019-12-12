<?php

function propertyElem($id, $name, $rating, $specs) {

    echo '<section class="property" onCLick="location.href=\'../pages/property.php?id=' . $id . '\'" >
        <img class="property-pic" src="../images/background-house.jpg" alt="house picture">
        <div class="property-text">
            <div class="property-info">
                <h2 class="property-typo">Private Room</h2>
                <img src="../images/Full House.png" alt="" >
                <h2 class="property-rating">(' . $rating . ')</h2>
            </div>
            <h1 class="property-name">' . $name . '</h1>
            <div class="property-specs">' . $specs . '</div>
        </div>
    </section>';
}

?>
