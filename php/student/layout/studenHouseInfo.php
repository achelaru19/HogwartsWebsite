<?php
	require_once DIR_UTIL . "DB_Hogwarts_Functions.php";
	$username = $_SESSION['username'];
	$house = getHouse($username);
			
	include DIR_STUDENT_LAYOUT . $house .".php"; // House Informations
			
	global $HogwartsDB;

	// House Table 
/*
0 => Name, 1 => Points, 2 => HeadOfTheHouse, 3 => QuidditchPoints, 4 => Founder,
5 => HouseColors, 6 => Animal, 7 => Element, 8 => Ghost, 9 => CommonRoom
*/
	$tab = array("Name of the House","Points","Head of the House", "Quidditch Points", "Founder", "House Colors", "Animal", "Element", "Ghost", "Common Room");
	$length = count($tab); // Array length
	$house = getHouse($username);
	$query = "select * from house where Name='" . $house . "'";

	$result = $HogwartsDB->performQuery($query);
	$numRows = mysqli_num_rows($result);

	if($numRows == 1){

		$row = mysqli_fetch_row($result);

		echo "<table id=\"HouseInfo\" >";
		echo "<tr class=\"house_colors_borders\"><td colspan=\"2\">";
		echo "<img id=\"HouseShield\" src=\"../../img/houses/" . $house . "_shield.png\" alt=\"$house shield\" ></td></tr>";
		for($i=0; $i < $length; $i++){
			if($i == 2){
				$name = getTeacherName($row[$i]);
				echo "<tr class=\"house_colors_borders\"><th>";
				echo $tab[$i];
				echo "</th><td>";
				echo $name[0];
				echo " ";
				echo $name[1];
				echo "</td></tr>";
			}
			else{
				echo "<tr class=\"house_colors_borders\"><th>";
				echo $tab[$i];
				echo "</th><td>";
				echo $row[$i];
				echo "</td></tr>";
			}
		}
		echo "</table>";
	}
	else {
		echo "There has been an error. Try later.";
	}

	$HogwartsDB->closeConnection();

?>