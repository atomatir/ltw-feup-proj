<?php
require_once "./db_cities.php";

$region = array();

try {
  $region = getAllRegions();
} catch (\Throwable $th) {
  echo "Error";
}

echo json_encode($region);
?>

