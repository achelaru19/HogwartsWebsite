<?php
	$username = $_SESSION['username'];
	$result = getCareer();
	$numRows = mysqli_num_rows($result);

	$currentYear = 1;

	while ($currentYear<= 7){

		if($currentYear > 1){
		/*
			This control is made since $row has already fetched a subject
			from the following year in the second while.
			Therefore, it has to be put as the first attribute of this new table.
		*/
			echo "<table class=\"subject\" id=\"table_$currentYear\"> <tr> <th>";

			if($currentYear == 2){
				echo $currentYear; echo "nd";
			}
			elseif($currentYear == 3){
				echo $currentYear; echo "rd";
			}
			else{
				echo $currentYear; echo "th";
			}

			echo " Year Subjects</th></tr>";
						
			echo "<tr><td>" ;
			echo $row[0];
			echo "</td></tr>";

		}

		if($currentYear == 1){
			echo "<table class=\"subject\" id=\"table_$currentYear\"> <tr> <th>";
			echo $currentYear; echo "st";
			echo " Year Subjects</th></tr>";
		}

		while(($row = mysqli_fetch_row($result)) && ($row[1] == $currentYear)){
			echo "<tr><td>" ;
			echo $row[0];
			echo "</td></tr>";
		}
			
		if($currentYear==1 || $currentYear==7)
			echo "</table>"; 

		$currentYear++;
	}
?>

<script type="text/javascript">
	
	var year = <?php echo getYear($_SESSION['username']); ?>;
	highlightYear(year);	

</script>