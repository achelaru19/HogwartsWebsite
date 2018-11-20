function ajaxGradeForm(){

	 var table = document.getElementById("gradesTable")

	if(table){
		table.parentNode.removeChild(table);
	}

	var select = document.getElementById("selectionYear");
	var index = select.selectedIndex;
	var year = select.options[index].value;

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
											createOptions(data);
										}
								}

	xmlHttp.open("POST","./form_actions/getStudentsToGrade.php",true);
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send("schoolYear="+year);
	

}

	

function createOptions(data){

	var table = document.createElement('table');
	table.setAttribute("id","gradesTable");
	var tablearea = document.getElementById("gradeStudents");

	var len = Object.keys(data).length;

	/*
		For each student create table that has 4 columns
		 The first two columns are to show the name and lastname of a student
		 The third column is for the teacher to enter the grade
		 The last column is invisible and its only purpose is
		 to pass information to the server.
	*/

	if(len > 0){

		var tr = document.createElement("tr");
		var head_name = document.createElement("th");
		var head_lastname = document.createElement("th");
		var head_grade = document.createElement("th");

		head_grade.setAttribute("colspan", "2");

		var name_node = document.createTextNode("Firstname");
		var lastname_node = document.createTextNode("Lastname");
		var grade_node = document.createTextNode("Grade");

		head_name.appendChild(name_node);
		head_lastname.appendChild(lastname_node);
		head_grade.appendChild(grade_node);

		tr.appendChild(head_name);
		tr.appendChild(head_lastname);
		tr.appendChild(head_grade);

		table.appendChild(tr);
	}

	for (var i=0; i < len; i++){

		var tr = document.createElement("tr");

		var td_name = document.createElement("td");
		var td_lastname = document.createElement("td");
		var td_hiddenData = document.createElement("td");
		var td_inputGrade = document.createElement("td");


		var firstname = document.createTextNode(data[i].name);
		var lastname = document.createTextNode(data[i].lastname);
		var firstname_value = firstname.data;
		var lastname_value = lastname.data;

		var hidden_name = document.createElement("INPUT");
		var hidden_lastname = document.createElement("INPUT");
		var grade = document.createElement("INPUT");

		hidden_name.setAttribute("type", "hidden");
		hidden_name.setAttribute("name", 'firstname[' + i + ']');
		hidden_name.setAttribute("value", firstname_value);
		hidden_lastname.setAttribute("type", "hidden");
		hidden_lastname.setAttribute("name", 'lastname[' + i + ']');
		hidden_lastname.setAttribute("value", lastname_value);
		grade.setAttribute("type","text");
		grade.setAttribute("name", "grade[" + i + "]");
		grade.setAttribute("class", "grade_table_input");


		td_name.appendChild(firstname);
		td_lastname.appendChild(lastname);
		td_hiddenData.appendChild(hidden_name);
		td_hiddenData.appendChild(hidden_lastname);
		td_hiddenData.setAttribute("class", "invisible_input");
		td_inputGrade.appendChild(grade);


		tr.appendChild(td_name);
		tr.appendChild(td_lastname);
		tr.appendChild(td_hiddenData);
		tr.appendChild(td_inputGrade);

		table.appendChild(tr);

	}

	// Last hidden row to pass to the server
	// the number of students that are in that course
	var tr_hidden = document.createElement("tr");
	var td_hidden = document.createElement("td");
	td_hidden.setAttribute("colspan", 4);

	var hidden_len = document.createElement("INPUT");
	hidden_len.setAttribute("type", "hidden");
	hidden_len.setAttribute("name", "len");
	hidden_len.setAttribute("value", len);

	td_hidden.appendChild(hidden_len);
	td_hidden.setAttribute("class", "invisible_input");
	tr_hidden.appendChild(td_hidden);

	table.appendChild(tr_hidden);

	tablearea.appendChild(table);


}



