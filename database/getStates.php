<?php
require_once "./db_cities.php";


$country = $_GET['country'];

$countries = array();

try {
  $countries = getAllStatesFromCountry($country);
} catch (\Throwable $th) {
  echo "Error";
}

echo json_encode($countries);
?>