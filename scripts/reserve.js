window.onload = function () {
  LockDays();

  rangeDates['dateinpt'].setOptions({onSelect : getTotalPrice});
  this.document.getElementById('reserve-form').onsubmit = function (evt) {
    evt.preventDefault();
    InsertDate();
  };
};


function LockDays() {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    // if(this.readyState == 4) alert(this.status)
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      let lock = [];
      if (response['result'].size == 0) return;
      for (let v of response['result']) {
        console.log(v);
        if (parseInt(v.date_begin) == parseInt(v.date_end)) {
          lock.push(parseInt(v.date_begin) * 1000);
          continue;
        }
        lock.push([parseInt(v.date_begin) * 1000,parseInt(v.date_end) * 1000]);

      }
      console.log(lock);
      rangeDates['dateinpt'].setLockDays(lock);
      // rangeDates['dateinpt'].setLockDays();
    }
  }

  xmlhttp.open("POST", "../database/getReservations.php");
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("placeID=" + placeID);
}

function InsertDate() {
  let xmlhttp = new XMLHttpRequest();

  let dateinpt = rangeDates['dateinpt']; 
  let startDate = dateinpt.getStartDate();
  let endDate = dateinpt.getEndDate();

  startDate = Math.floor(startDate.getTime() / 1000);
  endDate = Math.floor(endDate.getTime() / 1000);
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      location.reload();
    }
  }

  xmlhttp.open("POST", "../database/insertReservation.php");
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("placeID=" + placeID + '&' + 'startDate=' + startDate + '&' + "endDate=" + endDate);

}


function getTotalPrice() {
  let elem = document.getElementById("total-price");
  let price = parseFloat(document.getElementById('property-price').innerHTML);
  
  let days = rangeDates['dateinpt'].getEndDate().getTime() - rangeDates['dateinpt'].getStartDate().getTime() ; 
  days = Math.ceil(days / (1000 * 60 * 60 * 24));
  
  days = (days == 0) ? 1 : days;


  
  elem.innerHTML = 'Total: ' + days * price + '€';
}