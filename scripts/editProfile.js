window.onload = function () {
  document.getElementById('saveprof-button').addEventListener('onsubmit', EditProfile);
  document.getElementById('changepass-button').addEventListener('onsubmit', changePass);
  document.getElementById('profile-upload').addEventListener('change', showPic);
}


function EditProfile() {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      
    }
  }

  // xmlhttp.open("POST", "../database/action_login.php", true);
  // xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  // xmlhttp.send("email=" + email + "&password=" + password);
}

function changePass() {
  
}


function showPic(evt) {
  let div = document.getElementById('profile-div');
  let img = document.getElementById('profile_pic');
  let reader = new FileReader();
  reader.onload = function (evt) {
    img.src = reader.result;
  }
  reader.readAsDataURL(evt.target.files[0]);

}