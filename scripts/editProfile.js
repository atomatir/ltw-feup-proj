window.onload = function () {
  document.getElementById('editprof-form').onsubmit = EditProfile;
  document.getElementById('changepass-form').onsubmit = changePass;
  document.getElementById('profile-upload').addEventListener('change', showPic);
  document.getElementById('oldpassword').onchange = checkPassword;
}


function EditProfile(evt) {
  evt.preventDefault();
  let xmlhttp = new XMLHttpRequest();
  let form = new FormData(document.getElementById('editprof-form'));

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      
      setTimeout(function () {
        alert("sucess");
        location.reload();
      }, 1000);
    }
  }

  // return false;

  xmlhttp.open("POST", "../database/action_updateProfile.php", true);
  xmlhttp.send(form);
}

function changePass(evt) {
  evt.preventDefault();
  let form = new FormData(document.getElementById('changepass-form'));
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
    }
  }

  let newpass  = form.getAll('password')[0];
  let newpassc = form.getAll('confPassword')[0];

  if (newpass !== newpassc) {
    alert("New passwords are not equal");
    return;
  }

  xmlhttp.open("POST", "../database/updatePassword.php", true);
  xmlhttp.send(form);
}



function checkPassword() {
  let pass = document.getElementById('oldpassword').value;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      if (!response['Ispass']) {
        alert('Wrong password');
      }
    }
  }
  xmlhttp.open("POST", "../database/checkPassword.php", true);
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xmlhttp.send("pass="+pass);
}

function showPic(evt) {
  let div = document.getElementById('profile-div');
  let img = document.getElementById('profile_pic');
  let reader = new FileReader();
  reader.onload = function () {
    let file = evt.target.files[0];
    let mime_types = ['image/png'];

    if (mime_types.indexOf(file.type) == -1) {
      alert('Error : Incorrect file type');
      return;
    }

    img.src = reader.result;

  }
  reader.readAsDataURL(evt.target.files[0]);

}