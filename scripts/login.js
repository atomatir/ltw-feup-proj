window.onload = function () {
  document.getElementById('login_button').addEventListener('onsubmit', login);
}

function login() {
  let form = document.forms['login-form'];
  let email = form['email'].value;
  let password = form['password'].value;

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      if (response['response']) {
        window.history.back();
      } else {
        alert("Wrong password");
      }
    }
  }

  xmlhttp.open("POST", "../database/action_login.php", true);
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("email=" + email + "&password=" + password);

  return false;
}