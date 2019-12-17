<?php

require_once "../database/db_reservations.php";
require_once "../database/session.php";
require_once "../templates/reservations.php";
require_once "../templates/header.php";

$arr = getReservationsUser($_SESSION['userID']);

echo '<div id="property-list-all">';

foreach($arr as $val){
  makeReservCard($val);
}
if (empty($arr)) {
  echo '<h1 style="text-align:center;margin-top: 10vh;">You have no reservations</h1>';
}
echo '</div><footer>';

include_once '../templates/footer.php';

?>
