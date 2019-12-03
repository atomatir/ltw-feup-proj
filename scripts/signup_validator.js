function validateSignup() {
  let firstName = document.forms['login_form']['firstName'].value;
  let lastName = document.forms['login_form']['lastName'].value;
  let email = document.forms['login_form']['email'].value;
  let password = document.forms['login_form']['lastName'].value;
  let phonenumber = document.forms['login_form']['phonenumber'].value;

  const emailReg = /\S+@\S+\.\S+/;
  const nameReg = /^\w*$/;
  const phoneReg = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  const phoneReg2 = /^\d{9}$/;
  if (!email.match(emailReg)) {
    alert("Wrong email format");
  }
  if (!firstName.match(nameReg) || !lastName.match(nameReg)) {
    alert("Name must be one word and only have letters");
  }
  if (!phonenumber.match(phoneReg) && !phonenumber.match(phoneReg2)) {
    alert("Phone number in worng format");
  }
  return false;
}
