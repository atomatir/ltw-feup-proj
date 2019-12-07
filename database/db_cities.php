<?php
include_once('./connection.php');

function getAllCitiesFromCountry($country)
{
  global $db;

  $stmnt = $db->prepare("SELECT City.name as city FROM City,State,Country,Region WHERE City.stateID=State.stateID AND State.countryID=Country.countryID AND Country.regionID = Region.regionID AND Country.name = ? ORDER BY City.name;");
  $stmnt->execute(array($country));
  return $stmnt->fetchAll();
}

function getAllCitiesFromState($state)
{ 
  global $db;
  
  $stmnt = $db->prepare("SELECT City.name as city FROM City,State,Country,Region WHERE City.stateID=State.stateID AND State.countryID=Country.countryID AND Country.regionID = Region.regionID AND State.name = ? ORDER BY City.name;");
  $stmnt->execute(array($state));
  return $stmnt->fetchAll();
}

function getAllStatesFromCountry($country){
  global $db;

  $stmnt = $db->prepare("SELECT State.name as state FROM Country,State WHERE Country.countryID=State.countryID AND Country.name = ? ORDER BY State.name;");
  $stmnt->execute(array($country));
  return $stmnt->fetchAll();
}

function getAllCountries(){
  global $db;

  $stmnt = $db->prepare("SELECT Country.name AS country FROM Country;");
  $stmnt->execute();
  return $stmnt->fetchAll();
}

function getAllCountriesFromRegion($region)
{
  global $db;

  $stmnt = $db->prepare("SELECT Country.name as country FROM Country,Region WHERE Country.regionID = Region.regionID AND Region.name = ?;");
  $stmnt->execute(array($region));
  return $stmnt->fetchAll();
}

function getAllRegions(){
  global $db;

  $stmnt = $db->prepare("SELECT Region.name AS region FROM Region;");
  $stmnt->execute();
  return $stmnt->fetchAll();
}
