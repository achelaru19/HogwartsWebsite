var GryffindorPoints = 1;
var HufflepuffPoints = 1;
var RavenclawPoints = 1;
var SlytherinPoints = 1;

function chartFunction(type){

	getPoints();

	if(type == "Student"){
		makeChart();
	}
	if(type == "Teacher"){	
		makeChartTeacher();
	}
}

function makeChart(){
	var houses_chart = document.getElementById("myChart").getContext("2d");
	var myChart = new Chart(houses_chart, {
		type: 'doughnut',
		data: {
			labels: ["Gryffindor", "Hufflepuff", "Ravenclaw", "Slytherin"],
			datasets: [{
				data: [GryffindorPoints, HufflepuffPoints, RavenclawPoints, SlytherinPoints],
				backgroundColor: [
					"rgba(92,1,32,0.8)",
					"rgba(204,156,0,0.8)",
					"rgba(0,48,72,0.8)",
					"rgba(25,65,38,0.8)"
				],
				borderColor: "rgba(245,245,245,0.8)",
				borderWidth: 1
			}]
		},
		options: {
			circumference: 1 * Math.PI,
			rotation: -1 * Math.PI,
			title: {
				display: true,
				text: 'House Cup Points'
			},
			legend: {
				position: 'bottom',
				boxWidth: 15,
				padding: 20
			},
			scales: {
				yAxes: [{
					display: false,
					gridLines: {
						display: false
					},
					ticks: {
						beginAtZero:true
					}
				}],
				xAxes: [{
					display: false,
					gridLines: {
						display: false
					}
				}]
			}
		}	
	});
}

function makeChartTeacher(){

	console.log(Chart.defaults.scale.ticks);
	Chart.defaults.scale.ticks.beginAtZero = true;

	var houses_chart = document.getElementById("teacher_chart").getContext("2d");
	var myChart = new Chart(houses_chart, {
		type: 'bar',
		data: {
			labels: ["Gryffindor", "Hufflepuff", "Ravenclaw", "Slytherin"],
			datasets: [{
				data: [GryffindorPoints, HufflepuffPoints, RavenclawPoints, SlytherinPoints],
				backgroundColor: [
					"rgba(92,1,32,0.8)",
					"rgba(204,156,0,0.8)",
					"rgba(0,48,72,0.8)",
					"rgba(25,65,38,0.8)"
				],
				borderColor: "rgba(245,245,245,0.8)",
				borderWidth: 1
			}]
		},
		options: {
			title: {
				display: true,
				text: 'House Cup Points'
			},
			legend: {
				display: false
			}
		}	
	});
}


function getPoints(){

	try { xmlHttp=new XMLHttpRequest(); }
				catch (e) {
					try { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } // For Internet Explorer (recent versions)
						catch (e) {
							try { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
							//Internet Explorer (older versions)
								catch (e) {
									window.alert("Your browser does not support AJAX!");
									return false;
								}
						}
				}

	xmlHttp.onreadystatechange = function(){
									if((xmlHttp.readyState == 4) && (xmlHttp.status == 200)){
										console.log(xmlHttp.responseText);
										var data = JSON.parse(xmlHttp.responseText);
										initialisePoints(data);
									}
							}

	xmlHttp.open("POST","../getHousePoints.php",false);
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send("check=1");

}

function initialisePoints(data){

	GryffindorPoints = data["Gryffindor"];
	HufflepuffPoints = data["Hufflepuff"];
	RavenclawPoints = data["Ravenclaw"];
	SlytherinPoints = data["Slytherin"];

}