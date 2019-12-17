<?php
    require_once('session.php');
    require_once('connection.php');
    require_once('checkInput.php');

    $reservationID = checkInput($_GET['reservationID']);

    $delete = 'DELETE FROM Reservation WHERE reservationID = :reservationID';

    global $db;
    $stmnt = $db->prepare($delete);
    $stmnt->execute(array('reservationID' => $reservationID));

    header("Location: " . $_SERVER['HTTP_REFERER']);

?>