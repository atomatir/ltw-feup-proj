window.onload = function () {
  // this.alert(userID);
  getPlaces();
}

function getPlaces() {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if(this.readyState == 4 && this.status == 200){
      places = JSON.parse(this.responseText);
      places.forEach(element => {
        insertPlace(element);
      });
      
    }
  }

  xmlhttp.open("POST", "../database/getPlaces.php", true);
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("userID=" + userID); 
}


function insertPlace(obj){
  let placesdiv = document.getElementById("places");
  
  let a = document.createElement("a");
  a.href = "#"; //fazer isto quando tiver um sistema de imagens
  a.id = "place_" + obj.placeID;
  
  let img = document.createElement("img");
  img.id = "placeimg_" + obj.placeID;
  img.src = "../images/room.png";
  img.alt = "Room image";

  let h4 = document.createElement("h4");
  h4.appendChild(document.createTextNode(obj.name));

  a.appendChild(img);
  a.appendChild(h4);

  placesdiv.appendChild(a);
}