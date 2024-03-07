function myFunction() {
  var x = document.getElementById("new_password");
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
	
	var y = document.getElementById("confirm_password");
	  if (y.type == "password") {
		y.type = "text";
	  } else {
		y.type = "password";
	  }
}

function myFunction2() {
  var z = document.getElementById("edit_password");
  if (z.type == "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
}