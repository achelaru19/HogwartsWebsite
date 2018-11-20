var maxHeight;
var maxLength;
var heightSnitch;
var lengthSnitch;
var x = 4; // next move x-axis
var y = 4; // next move y-axis
var levels = { 1:0, 2:200, 3:350}; // level => subtracted time (gets faster)
var level;
var inTheGame; // boolean value to determine if the client is playing or not
var score = 0;
var seconds = 0;

/* 
   I initialise the function this way since the function "begin(username)"
   initialises the profile picture 
*/

 function initialiseGame(){ 

	// Initialisation of the Snitch
	var snitch = document.getElementById("snitch");
	// Starting point of the Snitch
	snitch.style.left = '50px';
	snitch.style.top = '95px';
	heightSnitch = parseInt(snitch.style.height);
	lengthSnitch = parseInt(snitch.style.width);

	// Initialisation of the playground
	field = document.getElementById("field");
	maxLenght = parseInt(field.style.width);
	maxHeight = parseInt(field.style.height);

	level = 0;
	inTheGame = false;

	// The Snitch is moving when the game is off 
	slowly = setInterval(slowMoving, 20);
}


function start(){

	updateButton();
	clearInterval(slowly);

	level++; 

	gameBegun = setInterval(gameOn, (1000 - levels[level]));
	timeOfTheGame = setInterval(updateTime, 1000);
}

function updateButton(){
	var botton = document.getElementById("bottone");
	botton.disabled = !botton.disabled;
}

function updateTime(){
	seconds++;
}

function slowMoving(){

	var elem = document.getElementById("snitch");

	// Controls made to not go out of the game area
	if(((parseInt(elem.style.left) ) > (maxLenght - lengthSnitch)) || (parseInt(elem.style.left)  < 0)){
		x = -x ;
	}

	if(((parseInt(elem.style.top) ) > (maxHeight - heightSnitch)) || (parseInt(elem.style.top)  < 0)){
		y = -y;
	}

	// Slow movement of the Snitch
	elem.style.left = parseInt(elem.style.left) + x + 'px';
	elem.style.top = parseInt(elem.style.top) + y + 'px';
}

function gameOn(){

	var snitch = document.getElementById("snitch");

	var newX = Math.random() * (maxLenght - lengthSnitch);
	var newY = Math.random() * (maxHeight - heightSnitch);

	//New location of the Snitch
	snitch.style.left = newX + 'px';
	snitch.style.top = newY + 'px';

	inTheGame = true;

}

function gotIt(){
	// Control made to avoid advancing levels without being in the game
	if(inTheGame == true){
		
		//	We now set inTheGame = false so that the client cannot
		//	click more than once and advance more than one level before
		//	the snitch has moved. After its first move, inTheGame will
		//	be set true.
		
		inTheGame = false; 
		level++;
		if(level<=3)
			updateScore();
		nextLevel();
	}
}

function updateScore(){
	var scorePoints = document.getElementById("score");
	score++;
	scorePoints.value= score;
}


function nextLevel() {

	if(level == 4){
		clearInterval(timeOfTheGame);
		clearInterval(gameBegun);
		updateButton();
		slowly = setInterval(slowMoving, 20);
		level = 0;
		if(seconds < 10){
			// addQuidditchPoint is called through an AjaxRequest
			try { xmlHttp=new XMLHttpRequest(); }
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

			xmlHttp.open("POST","./form_actions/addQuidditchPoint.php",true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttp.send("check=1");
			winningAlert();
		}
		resetScore();
	}
	else {
		clearInterval(gameBegun);
		gameBegun = setInterval(gameOn, (1000 - levels[level]));
	}
}


function resetScore(){
	score = 0;
	seconds = 0;
	var scorePoints = document.getElementById("score");
	scorePoints.value = score;
}

function winningAlert(){
	alert("Contratulations! \nYou made your House gain a Quidditch Point!");
}