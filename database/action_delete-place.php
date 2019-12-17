<?php
require_once("session.php");
require_once("connection.php");
require_once("checkInput.php");

$placeID = checkInput($_POST['placeID']);

$delete = "DELETE FROM Place WHERE placeID = :placeID";

global $db;
$stmnt = $db->prepare($delete);
$stmnt->execute(array('placeID' => $placeID));

header("Location: ../profile-page.php?userID=" . $_SESSION['userID']);
?>