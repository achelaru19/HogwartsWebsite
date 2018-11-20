<?php

	require_once DIR_UTIL . "DB_Hogwarts_Functions.php";

	$username = $_SESSION['username'];

	$result = getGrades($username);

	echo "<h2>Your grades </h2><br>";

	if($result == null)
		echo "<p>You have not received a grade, yet.</p>";
	else{
		echo "<table id=\"grades\"> <tr> <th>Subject</th> <th>Grade</th> <th>Date</th></tr>";
		while( $row = mysqli_fetch_row($result)) {
			echo "<tr><td>" ;
			echo $row[0];
			echo "<td> ";
			echo $row[1];
			echo " <td> ";
			echo $row[2];
			echo " </tr>";
		}
		
	echo "</table>"; 

	}
?>