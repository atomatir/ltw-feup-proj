PRAGMA foreign_keys=ON;

.mode column
.headers on

DROP TABLE IF EXISTS User;
CREATE TABLE User
(
  userID INTEGER,
  addressID INTEGER,
  descrip TEXT,
  birthday DATE NOT NULL,
  password TEXT NOT NULL,
  salt TEXT NOT NULL,
  email TEXT NOT NULL,
  phone_number INTEGER NOT NULL,
  created_at DATETIME NOT NULL,
  last_login DATETIME NOT NULL,
  first_name TEXT NOT NULL,
  last_name TEXT  NOT NULL,
  CONSTRAINT pk_user PRIMARY KEY (userID),
  CONSTRAINT fk_user_address FOREIGN KEY (addressID) REFERENCES Address(addressID),
  CONSTRAINT n_phone_number CHECK (length(phone_number)>=9)
);

DROP TABLE IF EXISTS Address;
CREATE TABLE Address
(
  
  addressID INTEGER,
  cityID INTEGER,
  postal_code TEXT,
  street_number TEXT,
  address TEXT,
  CONSTRAINT pk_address PRIMARY KEY (addressID)
);

DROP TABLE IF EXISTS City;
CREATE TABLE City
(   
  cityID INTEGER,
  stateID INTEGER,
  name TEXT,
  CONSTRAINT pk_city PRIMARY KEY (cityID),
  CONSTRAINT fk_city_state FOREIGN KEY (stateID) REFERENCES State(stateID)
);

DROP TABLE IF EXISTS State;
CREATE TABLE State
(   
  stateID INTEGER,
  countryID INTEGER,
  name TEXT,
  CONSTRAINT pk_state PRIMARY KEY (stateID),
  CONSTRAINT fk_state_country FOREIGN KEY (countryID) REFERENCES Country(countryID)
);

DROP TABLE IF EXISTS Country;
CREATE TABLE Country
(   
  countryID INTEGER,
  regionID INTEGER,
  name TEXT,
  CONSTRAINT pk_country PRIMARY KEY (countryID),
  CONSTRAINT fk_country_region FOREIGN KEY (regionID) REFERENCES Region(regionID)
);

DROP TABLE IF EXISTS Region;
CREATE TABLE Region
(   
  regionID INTEGER,
  name TEXT,
  CONSTRAINT pk_region PRIMARY KEY (regionID)
);

DROP TABLE IF EXISTS Place;
CREATE TABLE Place
(
  placeID INTEGER,
  addressID INTEGER,
  userID INTEGER,
  created_at DATETIME,
  name TEXT,
  descrip TEXT,
  number_bathrooms INTEGER,
  number_bedrooms INTEGER,
  max_guests INTEGER,
  price_by_night FLOAT,
  CONSTRAINT pk_place PRIMARY KEY (placeID),
  CONSTRAINT fk_place_address FOREIGN KEY (addressID) REFERENCES Address(addressID),
  CONSTRAINT fk_place_user FOREIGN KEY (userID) REFERENCES User(userID)  
);

DROP TABLE IF EXISTS Likes;
CREATE TABLE Likes
(
  userID INTEGER,
  placeID INTEGER,
  CONSTRAINT pk_likes PRIMARY KEY (userID,placeID),
  CONSTRAINT fk_likes_user FOREIGN KEY (userID) REFERENCES User(userID),
  CONSTRAINT fk_likes_place FOREIGN KEY (placeID) REFERENCES Place(placeID)
);

DROP TABLE IF EXISTS Reservation;
CREATE TABLE Reservation
(
  userID INTEGER,
  placeID INTEGER,
  date_begin DATETIME NOT NULL,
  date_end DATETIME NOT NULL,
  CONSTRAINT pk_reservation PRIMARY KEY (userID,placeID),
  CONSTRAINT fk_reservation_user FOREIGN KEY (userID) REFERENCES User(userID),
  CONSTRAINT fk_reservation_place FOREIGN KEY (placeID) REFERENCES Place(placeID) 
);

DROP TABLE IF EXISTS Review;
CREATE TABLE Review
(
  reviewID INTEGER,
  reservationID INTEGER,
  comments TEXT,
  stars INTEGER,
  CONSTRAINT pk_review CHECK (reviewID),
  CONSTRAINT fk_review_reservation FOREIGN KEY (reservationID) REFERENCES Reservation(reservationID)
);

DROP TABLE IF EXISTS Availability;
CREATE TABLE Availability
(
  availabilityID INTEGER,
  date_begin DATETIME NOT NULL,
  date_end DATETIME NOT NULL,
  CONSTRAINT pk_availability PRIMARY KEY (availabilityID)
);

DROP TABLE IF EXISTS HasAvailability;
CREATE TABLE HasAvailability
(
  availabilityID INTEGER,
  placeID INTEGER,
  CONSTRAINT pk_hasAvailability PRIMARY KEY (availabilityID,placeID),
  CONSTRAINT fk_hasAvailability_availability FOREIGN KEY (availabilityID) REFERENCES Availability(availabilityID) 
  CONSTRAINT fk_hasAvailability_placeID FOREIGN KEY (placeID) REFERENCES Place(placeID) 
);

DROP TABLE IF EXISTS Restrictions;
CREATE TABLE Restrictions
(
  restrictionsID INTEGER,
  restriction TEXT,
  CONSTRAINT pk_restrictions PRIMARY KEY (restrictionsID)
);

DROP TABLE IF EXISTS HasRestrictions;
CREATE TABLE HasRestrictions
(
  restrictionsID INTEGER,
  placeID INTEGER,
  CONSTRAINT pk_hasRestrictions PRIMARY KEY (restrictionsID,placeID),
  CONSTRAINT fk_hasRestrictions_restrictions FOREIGN KEY (restrictionsID) REFERENCES Restrictions(restrictionsID) 
  CONSTRAINT fk_hasRestrictions_placeID FOREIGN KEY (placeID) REFERENCES Place(placeID) 
);