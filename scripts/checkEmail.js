function encodeForAjax(data) {
  return Object.keys(data).map(function (k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}


function checkEmail(email,login) {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      if ((!response['exists'] && login) || (response['exists'] && !login)) {
        let k = (login) ? "does not" : "already";
        alert("An account with this email " + k +" exists");
      }
    }
  }

  xmlhttp.open("POST", "../database/checkEmail.php", true);
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("email="+ email);


}