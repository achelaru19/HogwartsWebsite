
function begin(username, house){

	// Initialise profile picture
	var student = document.getElementById("student_picture");
	var photo = document.createElement("img");
	if(UrlExists("../../img/students/" + username + ".jpg")){
		photo.src = "../../img/students/" + username + ".jpg";
	}
	else{
		photo.src = "../../img/noprofilepicture.jpg";
	}
	photo.className = "profile_picture";
	photo.alt = username + " picture";
	student.appendChild(photo);

	//Initialise colors of student page
	setHouseColors(house);
}

function beginTeacher(username){

	// Initialise profile picture
	var teacher = document.getElementById("teacher_picture");
	var photo = document.createElement("img");
	if(UrlExists("../../img/teachers/" + username + ".jpg"))
		photo.src = "../../img/teachers/" + username + ".jpg";
	else
		photo.src = "../../img/noprofilepicture.jpg";	photo.alt = username + " picture";
	photo.className = "profile_picture";
	teacher.appendChild(photo);
}

function setHouseColors(house){

	var border_color;
	var background_color;


	if(house=="Gryffindor"){
		background_color = "#5c0120";
		border_color = "#D4AF37";
	}
	else if(house=="Hufflepuff"){
		background_color = "rgb(204, 156, 0)";
		border_color = 'rgb(34, 30, 17)';
		makeMenuTextBlack();
	}
	else if(house == "Ravenclaw"){
		background_color = "#003048";
		border_color = '#8c7853';
	}
	else{
		background_color = "#194126";
		border_color = "#c0c0c0";
	}

	var borders = document.getElementsByClassName('house_colors_borders');
	var house_background = document.getElementsByClassName("house_colors_background");


	picture = document.getElementsByClassName("profile_picture");
	picture[0].style.borderColor = border_color;

	for (i = 0, len = borders.length; i<len; i++){
		borders[i].style.borderColor = border_color; 
		borders[i].style.color = border_color;
	}

	for(j = 0, len = house_background.length; j < len; j++){
	house_background[j].style.backgroundColor = background_color; 
	}

}

/* Returns true if the object exists, false otherwise */
function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return (http.status != 404); // error for not found
}

/* Highlight table that shows your courses of your school-year */
function highlightYear(year){
	var table = document.getElementById('table_'+year);
	table.style.backgroundColor = '#F0E68C' ;

}

function makeMenuTextBlack(){

	var menu = document.getElementsByClassName("menu_span");

	var len = menu.length;

	for(var index = 0; index < len; ++index){
		menu[index].style.color='black';
	}

}