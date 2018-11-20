<?php

	require_once DIR_UTIL . "DB_Hogwarts_Functions.php";

	global $HogwartsDB;

	$username = $_SESSION['username'];
	$house = getHouse($username);

	echo "<h2>Your news</h2>";

	$query = "select Teacher, Info from NEWS where " . $house . "=true ORDER BY InputDate DESC";
	$result = $HogwartsDB->performQuery($query);
	$numRows = mysqli_num_rows($result);

	$HogwartsDB->closeConnection();
	
	if($numRows == 0)
		echo "<p>There are no news for you.</p>";
	else{				
		while($row = mysqli_fetch_row($result)){
			echo "<fieldset>";
			echo "<legend>";
			$teacher = getTeacherName($row[0]);
			echo $teacher[0]; echo " "; echo $teacher[1];
			echo "</legend>";
			echo "<p>"; echo $row[1]; echo "</p>";	
			echo "</fieldset><br>";					
		}						
	}

?>