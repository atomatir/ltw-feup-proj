<?php
require_once("session.php");
require_once("connection.php");

$delete = "DELETE FROM Place WHERE placeID = :placeID";

global $db;
$stmnt = $db->prepare($delete);
$stmnt->execute($_POST);

header("Location: ../profile-page/userID=" . $_SESSION['userID']);
?>