function check_empty() {
	var x = document.forms["loginForm"]["uid"].value;
	var y = document.forms["loginForm"]["pwd"].value;
	if(x == "" || y = ""){
		alert("Name or Passward is empty.");
		return false;
	}
}