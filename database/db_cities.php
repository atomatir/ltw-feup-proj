<?php

$query = "SELECT City.name,State.name,Country.name,Region.name FROM City,State,Country,Region WHERE City.stateID=State.stateID AND State.countryID=Country.countryID AND Country.regionID = Region.regionID ORDER BY State.name;";