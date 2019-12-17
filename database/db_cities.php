<?php
include_once('connection.php');

function getAllCitiesFromCountry($country)
{
  global $db;

  $stmnt = $db->prepare("SELECT City.name as city FROM City,State,Country,Region WHERE City.stateID=State.stateID AND State.countryID=Country.countryID AND Country.regionID = Region.regionID AND Country.name = ? ORDER BY City.name;");
  $stmnt->execute(array($country));
  return $stmnt->fetchAll();
}

function getCountryFromCity($cityID)
{
  global $db;

  $stmnt = $db->prepare("SELECT Country.name as country,City.name as city FROM City,State,Country WHERE City.stateID=State.stateID AND State.countryID=Country.countryID AND City.cityID = ? ");
  $stmnt->execute(array($cityID));
  return $stmnt->fetch();
}

function getAllCitiesFromState($stateID)
{ 
  global $db;
  
  $stmnt = $db->prepare("SELECT City.name as city, City.cityID as id FROM City WHERE City.stateID= ? ORDER BY City.name;");
  $stmnt->execute(array($stateID));
  return $stmnt->fetchAll();
}

function getAllStatesFromCountry($countryID){
  global $db;

  $stmnt = $db->prepare("SELECT State.name as state,State.stateID as id FROM State WHERE State.countryID = ? ORDER BY State.name;");
  $stmnt->execute(array($countryID));
  return $stmnt->fetchAll();
}

function getAllCountries(){
  global $db;

  $stmnt = $db->prepare("SELECT Country.name AS country FROM Country;");
  $stmnt->execute();
  return $stmnt->fetchAll();
}

function getAllCountriesFromRegion($regionID)
{
  global $db;

  $stmnt = $db->prepare("SELECT Country.name as country, Country.countryID as id FROM Country WHERE Country.regionID = ? ORDER BY Country.name;");
  $stmnt->execute(array($regionID));
  return $stmnt->fetchAll();
}

function getAllRegions(){
  global $db;

  $stmnt = $db->prepare("SELECT Region.name AS region, Region.regionID as id FROM Region;");
  $stmnt->execute();
  return $stmnt->fetchAll();
}

function getCity($cityID){
  global $db;

  $stmnt = $db->prepare("SELECT City.name AS city FROM City WHERE City.cityID = ? ;");
  $stmnt->execute(array($cityID));
  return $stmnt->fetch();
}
