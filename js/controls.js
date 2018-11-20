

/* ------- SETTINGS CONTROLS ------- */

function checkOldPassword(){

	var pass = document.getElementById("pass0_value").value;

	if(pass.length > 0){

		var xmlHttp;
		try { xmlHttp = new XMLHttpRequest(); }
					catch (e) {
						try { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } //IE (recent versions)
							catch (e) {
								try { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
								//IE (older versions)
									catch (e) {
										window.alert("Your browser does not support AJAX!");
										return false;
									}
							}
					}
		xmlHttp.onreadystatechange =function(){
											if((xmlHttp.readyState == 4) && (xmlHttp.status == 200)){
												console.log(xmlHttp.responseText);
												var data = JSON.parse(xmlHttp.responseText);
												controlCorrectness(data);
											}
									}

		xmlHttp.open("POST","../changePassword.php",false);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send("control="+pass);
	}
	else{
		var element = document.getElementById("alert1");
		if((element != null))
			element.parentNode.removeChild(element);
	}

}

function controlCorrectness(data, password){
	var element = document.getElementById("alert1");
	if((element != null))
		element.parentNode.removeChild(element);
	var button = document.getElementById("submit_pass");
	button.disabled = false;

	var error = data['error'];
	if(error != 0){
		button.disabled = true;
		mistypedPassword();
	}
}

function checkLength(){
	var element = document.getElementById("alert2");
	if(element != null)
		element.parentNode.removeChild(element);
	var pass1 = document.getElementById("pass1_value").value;

	var button = document.getElementById("submit_pass");
	if( (pass1.length < 4) && (pass1.length > 0) ){
		shortPassword();
		button.disabled = true;
	}
}

function checkMatchPasswords(){
		var element = document.getElementById("alert2");
		if(element != null)
			element.parentNode.removeChild(element);
		var pass1 = document.getElementById("pass1_value").value;
		var pass2 = document.getElementById("pass2_value").value;

		var button = document.getElementById("submit_pass");

		if((pass2!= null) && (pass1 != pass2)){
			unmatchedPassword();
			button.disabled = true;
		}
		else{	
			button.disabled = false;
		}
		if(element != null)
			element.parentNode.removeChild(element);
		
}

function checkFormatFile(){
	var element = document.getElementById("alert3");
	if(element != null)
		element.parentNode.removeChild(element);
	var file = document.getElementById("newPicture").value;
	var len = file.length;

	if(!(file[len-3]=='j' && file[len-2]=='p' && file[len-1]=='g')){
		formatNotSupported();
		var button = document.getElementById("submit_file");
		button.disabled = true;
	}
	else{	
		var button = document.getElementById("submit_file");
		button.disabled = false;
	}

}


function mistypedPassword(){
	var p = document.createElement("P");
	p.setAttribute("id", "alert1");
	p.setAttribute("class", "alert");
	var message = document.createTextNode("The password you have inserted is not correct.");
	p.appendChild(message);
	var old_pass = document.getElementById("old_pass");
	old_pass.appendChild(p);
}

function unmatchedPassword(){
	
	var p = document.createElement("P");
	p.setAttribute("id","alert2");
	p.setAttribute("class", "alert");
	var message = document.createTextNode("The two passwords do not match.");
	p.appendChild(message);
	var newPass = document.getElementById("new_pass");
	newPass.appendChild(p);
	
}

function shortPassword(){
	var p = document.createElement("P");
	p.setAttribute("id","alert2");
	p.setAttribute("class", "alert");
	var message = document.createTextNode("Your new password is too short.");
	p.appendChild(message);
	var newPass = document.getElementById("new_pass0");
	newPass.appendChild(p);
}


function formatNotSupported(){
	var para = document.createElement("P");
	para.setAttribute("id","alert3");
	para.setAttribute("class", "alert");
	var message = document.createTextNode("Format not supported");
	para.appendChild(message);
	var input_div = document.getElementById("input_div");
	input_div.parentNode.insertBefore(para, input_div.nextSibling);
}


/* -------- TEACHERS' CONTROLS --------------- */


// CHECK STUDENT BIRTHDAY WHEN IT IS BEING ADDED

function checkBirthday(){

	var day = document.getElementById("day").value;
	var month = document.getElementById("month").value;
	var year = document.getElementById("year").value;

	if(day && month && year){
		var error = checkDate(month,day,year);
		if(error != -1)
			manageDateError(error);
		else{
			var element = document.getElementById("date_alert");
			if(element != null)
				element.parentNode.removeChild(element);

			var submit_button = document.getElementById("addStudent_submit");
			submit_button.disabled = false;

		}
	}

}


function checkDate(month, day, year){

	var monthLength = Array(31,0,31,30,31,30,31,31,30,31,30,31); 

	// According to the Gregorian calendar

	// Common year
	if(year%4 != 0){ 
			monthLength[1]=28;
		}
	// Leap year
	else if(year%100){
		monthLength[1]=29;
	}
	// Common year
	else if(year%400){
		monthLength[1]=28;
	}
	// Leap year
	else{
		monthLength[1]=29;
	}

	if(day > monthLength[month - 1]){

		if(month == 2)
			if(monthLength[1] == 29)
				return 2;
			else
				return 1
		else 
			return 0;
	}

	return -1; // no problems

}

function manageDateError(error){

	var errorArray = Array("This month only has 30 days.", "This month only has 28 days.", "This month only has 29 days.");

	var element = document.getElementById("date_alert");
	if(element != null)
		element.parentNode.removeChild(element);

	var p = document.createElement("p");
	p.setAttribute("class","alert");
	p.setAttribute("id", "date_alert");
	var errorMessage = document.createTextNode(errorArray[error]);
	p.appendChild(errorMessage);
	
	var date_div = document.getElementById("date_div");
	date_div.appendChild(p);

	var submit_button = document.getElementById("addStudent_submit");
	submit_button.disabled = true;

}

