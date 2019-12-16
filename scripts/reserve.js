function findGetParameter(parameterName) {
  var result = null,
    tmp = [];
  location.search
    .substr(1)
    .split("&")
    .forEach(function (item) {
      tmp = item.split("=");
      if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    });
  return result;
}


window.onload = function () {
  LockDays();
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
          lock.push(parseInt(v.date_begin));
          continue;
        }
        lock.push([parseInt(v.date_begin),parseInt(v.date_end)]);

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

  startDate = Math.floor(startDate.getTime());
  endDate = Math.floor(endDate.getTime());

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      console.log(response);
    }
  }

  xmlhttp.open("POST", "../database/insertReservation.php");
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("placeID=" + placeID + '&' + 'startDate=' + startDate + '&' + "endDate=" + endDate);

}
