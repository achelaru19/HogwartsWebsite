var NUM_HOUSES = 4;
var housesBackground = new Array("Gryffindor", "Hufflepuff", "Ravenclaw", "Slytherin");

	function begin(){
		
		// At first, a random house-backround is generated.
		// Then, with ajax it will adjust to the client's house
		var index = Math.floor(Math.random()*NUM_HOUSES); 
		document.body.style.backgroundImage = "url('./img/houses/" + housesBackground[index] + ".jpg')";

	}

	function searchHouse(pattern){

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
													foundBackground(data);
												}
										}

			xmlHttp.open("POST","./php/findHouse.php",true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttp.send("pattern="+pattern);
			
	}

	function foundBackground(data){

		if(data['house'] !== 'null') {
			var house = data['house'];
			fadeInBackground(house);
		}

	}


function fadeInBackground(house) {

  var background = document.body;
  background.style.backgroundImage = "url('./img/houses/" + house + ".jpg')"
  background.style.background.opacity = 0;

}

