function validateForm() {
	var fname = documents.forms["user_details"]["first_name"].value;
	var lname = documents.forms["user_details"]["last_name"].value;
	var city  =documents.forms["user_details"]["city_name"].value;

	if (fname == null || lname== "" || city== ""){
		alert("all details are required were not supplied");
		return false;
	}
	return true;
}