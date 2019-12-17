<?php

require_once "../database/db_user.php";
require_once "../database/session.php";

if(!isset($_SESSION['userID'])){
  header('Location: ../pages/login-page.php');
}




function makeReservCard($arr){

  $dateB = date($arr['dateBegin']);
  $dateE = date($arr['dateEnd']);
  $diff = floor(($dateE-$dateB)/3600/24);
  $diff = ($diff == 0) ? 1:$diff;
  $dateB = gmdate("d M Y",$dateB);
  $dateE = gmdate("d M Y",$dateE);
  $total = $arr['price']*$diff;

  echo '<div class="elem-property">' .  
       '<img class="elem-property-img" src="../images/room.png" alt="Reservation">' .
       '<div class="elem-property-text">' .
       '<h3  class="room-name">'. $arr['placeName'] .'</h3>' .
       '<div class="check-in"> <b>Check in: </b>' . $dateB .'</div>' .
       '<div class="check-out"><b>Check out: </b>'  . $dateE .'</div>' .
       '<div class="Total price">' . $total . '€</div>' .
       '<div class="city">' . $arr['city'] . ", " . $arr['country'] .'</div>' .
       '</div>' .
       '<button class="input delete_button" onclick="location.href=\'../database/action_delete-reservation.php?reservationID=' . $arr['reservationID'] . '\' " >Cancel</button>' .
       '</div>';
        
}


