<h2>Add a new student</h2>

<p>Insert the new student's information: </p>
<form name="addStudent" action="./form_actions/addStudent.php" method="post">

	<div id="student_info_input">
		<label>First Name:</label><input type="text" name="name"  required><br>
		<label>Last Name:</label><input type="text" name="lastname"  required><br>
		<label>E-mail address:</label> <input type="email" name="email" required><br>
	</div>
	<label>The student is:</label>
		<select name="sex" required> 
			<option value="">Student's sex</option>
			<option value="M">Male</option>
			<option value="F">Female</option>
		</select><br>

	<label>SchoolYear:</label>
		<select name="schoolYear" required>
			<option value="">Year</option>
			<option value="1">1st</option>
			<option value="2">2nd</option>
			<option value="3">3rd</option>
			<option value="4">4th</option>
			<option value="5">5th</option>
			<option value="6">6th</option>
			<option value="7">7th</option>
		</select>	<br>

	<div id="date_div">
	<label>Birthday:</label>
		<select name="month" id="month" onchange="checkBirthday()" required>
			<?php
				$months = array("Month","January","February","March","April","May","June","July","August","September","November","December");
					for($i = 0; $i < 12; $i++){
						if($i == 0)
							echo "<option value=''>Month</option>";
						else
							echo "<option value='" . $i . "'>" . $months[$i] . "</option>";
					}
			?>
		</select>
		<select name="day" id="day" onchange="checkBirthday()" required>
			<?php 
				for($i=0; $i<=31; $i++){
					if($i == 0){
						echo "<option value=''>";
						echo "Day</option>";
					}
					else{
						echo "<option value='" . $i ."'>";
						echo $i . "</option>";
					}
				}
			?>
		</select> 
		<select name="year" id="year" onchange="checkBirthday()" required>
			<?php 
				$thisYear = date("Y");
				$finalYear = $thisYear - 60;
				for($i=$thisYear; $i > $finalYear; $i--) {
					if($i == $thisYear)
					echo "<option value=''>Year</option>";
				else
					echo "<option value='" . $i . "'>" . $i . "</option>";
				}
			?>
		</select>
	</div>
	<br>
	<input type="submit" name="submit" value="Add Student" class="submit_button" id="addStudent_submit">

</form>