getRegions();

function getRegions() {
  let xmlhttp = new XMLHttpRequest();
  let regions = [];
  let selectList = document.getElementById('place-region');

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      regions = JSON.parse(this.responseText);
      
      selectList = document.createElement("select");
      selectList.id="place-region";
      selectList.name = "region";

      document.getElementById('address-div').append(selectList);
      
      let option = document.createElement('option');
      option.text = "Select a Region";
      option.value = "None";
      selectList.appendChild(option);

      for (i in regions) {
        option = document.createElement('option');
        option.text = regions[i]['region'];
        option.value = regions[i]['region'];
        selectList.appendChild(option);
      }
      
      document.getElementById('place-region').addEventListener("change", getCountries);
    }

  };

  xmlhttp.open("GET", "../database/getRegions.php", true);
  xmlhttp.send(); 
}

function getCountries() {
  let xmlhttp = new XMLHttpRequest();
  let countries = [];
  let region = document.getElementById('place-region');
  region.firstChild.setAttribute("disabled", true);
  region = region.value;
  let selectList = document.getElementById('place-countries');
  

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      countries = JSON.parse(this.responseText);

      if (selectList != null) {
        while (selectList.firstChild) {
          selectList.removeChild(selectList.firstChild);
        }
        let countries = document.getElementById('place-countries');
        let states = document.getElementById('place-states');
        let cities = document.getElementById('place-cities');

        if (countries != null) countries.remove();
        if (states != null) states.remove();
        if (cities != null) cities.remove();

      }

      selectList = document.createElement("select");
      selectList.id = "place-countries";
      selectList.name = "countries";
      document.getElementById('address-div').append(selectList);

      let option = document.createElement('option');
      option.text = "Select a Country";
      option.value = "None";
      selectList.appendChild(option);
      

      for (i in countries) {
        option = document.createElement('option');
        option.text = countries[i]['country'];
        option.value = countries[i]['country'];
        selectList.appendChild(option);
      }

      document.getElementById('place-countries').addEventListener("change", getStates);
    }
  };

  xmlhttp.open("GET", "../database/getCountries.php?region=" + region, true);
  xmlhttp.send(); 
}

function getStates() {
  let xmlhttp = new XMLHttpRequest();
  let states = [];
  let country = document.getElementById('place-countries');
  country.firstChild.setAttribute("disabled", true);
  country = country.value;
  let selectList = document.getElementById('place-states');


  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      states = JSON.parse(this.responseText);
      
      if (selectList != null) {
        while (selectList.firstChild) {
          selectList.removeChild(selectList.firstChild);
        }
        let states = document.getElementById('place-states');
        let cities = document.getElementById('place-cities');
        if (states != null) states.remove();
        if (cities != null) cities.remove();

      }

      selectList = document.createElement("select");
      selectList.id = "place-states";
      selectList.name = "states";


      document.getElementById('address-div').append(selectList);
      let option = document.createElement('option');
      option.text = "Select a State";
      option.value = "None";
      selectList.appendChild(option);

      for (i in states) {
        let option = document.createElement('option');
        option.text = states[i]['state'];
        option.value = states[i]['state'];
        selectList.appendChild(option);
      }
      document.getElementById('place-states').addEventListener("change", getCities);
    }
  };

  xmlhttp.open("GET", "../database/getStates.php?country=" + country, true);
  xmlhttp.send(); 
}

function getCities() {
  let xmlhttp = new XMLHttpRequest();
  let cities = [];
  let state = document.getElementById('place-states');
  state.firstChild.setAttribute("disabled", true);
  state = state.value;
  let selectList = document.getElementById('place-cities');

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      cities = JSON.parse(this.responseText);

      if (selectList != null) {
        while (selectList.firstChild) {
          selectList.removeChild(selectList.firstChild);
        }
        let cities = document.getElementById('place-cities');
        if (cities != null) cities.remove();

      }

      selectList = document.createElement("select");
      selectList.id = "place-cities";
      selectList.name = "cities";

      document.getElementById('address-div').append(selectList);
      let option = document.createElement('option');
      option.disabled = true;
      option.text = "Select a City";
      option.value = "None";
      selectList.appendChild(option);

      for (i in cities) {
        let option = document.createElement('option');
        option.text = cities[i]['city'];
        option.value = cities[i]['city'];
        selectList.appendChild(option);
      }

      document.getElementById('place-states').addEventListener("change", function () {
        document.getElementById('place-states').firstChild.setAttribute("disabled", true);
      });
    }
  };

  xmlhttp.open("GET", "../database/getCities.php?state=" + state, true);
  xmlhttp.send();
}