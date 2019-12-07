<?php
require_once "./db_cities.php";


$region = $_GET['region'];

$countries = array();

try {
  $countries = getAllCountriesFromRegion($region);
} catch (\Throwable $th) {
  echo "Error";
}

echo json_encode($countries);
?>