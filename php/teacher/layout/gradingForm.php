<form name="gradeStudents" id ="gradeStudents" action="./form_actions/gradeStudents.php" method="post">
	<select id="selectionYear" onChange="ajaxGradeForm()">
		<option value="0">School Year </option>
		<?php

			$username = $_SESSION['username'];

			global $HogwartsDB;
			$query = "select DISTINCT(SchoolYear) 
					  from courses C natural join Student S
					  where C.Teacher='" . $username . "'";
			$result = $HogwartsDB->performQuery($query);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 1){
				echo "<p>There has been an error.</p>";
			}

			while($row = mysqli_fetch_row($result)){
				echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
			}

			$HogwartsDB->closeConnection();

		?>
	</select>
	<input type="submit" name="addGrades" value="Upload Grades" id="submit_grade" class="submit_button"><br><br>
</form>