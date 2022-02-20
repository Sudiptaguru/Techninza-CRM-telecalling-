$(document).ready( function() {
  setTimeout('$("#alert_msg").hide()',3000);
});

function validateForm() {

  let name = document.forms["myForm"]["name"].value;

  if (name == "") {

    alert("Name must be filled out");

    return false;

  }

  let email = document.forms["myForm"]["email"].value;

  if (email == "") {

    alert("Email must be filled out");

    return false;

  }

  let phone = document.forms["myForm"]["phone"].value;

  if (phone == "") {

    alert("Phone Number must be filled out");

    return false;

  }

}
