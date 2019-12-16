<?php
require_once "connection.php";

$query = 
"

SELECT placeID FROM Place EXCEPT SELECT placeID FROM Reservation WHERE  (date_begin >= :dbegin AND date_end <= :dend) OR
(date_begin <= :dbegin AND date_end >= :dbegin) OR
(date_begin <= :dend  AND date_end >= :dend)";




?>