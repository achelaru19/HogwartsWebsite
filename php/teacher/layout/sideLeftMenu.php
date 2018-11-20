<div id="menu">
	<a href="./homepage.php">
		<div id="teacher_picture">

		</div>
		<div id="teacher_name">
			<?php echo $_SESSION['name']; ?>
		</div>
	</a>

	<div class="teacher_profile" >
		<ul>
			<li>
				<a href="./homepage.php"> 
					<span>Home</span>
				</a>
			<li>
				<a href="./settings.php">
					<span>Settings</span>
				</a>	
		</ul>
	</div>
	<br>
	<div class="teacher_profile">
		<ul>
			<li>
				<a href="./sendNews.php">
					<span>Send News</span>
				</a>
			<li>	
				<a href="./addGrades.php">
					<span>Upload Grades</span>
				</a>
			<li>
				<a href="./addPoints.php">
					<span>Add Points</span>
				</a>
			<li>
				<a href="./addStudent.php">
					<span>Add Student</span>
				</a>
		</ul>	
	</div>
	<br>
	<div id="LogOut">
		<ul>
			<li class="house_colors_borders">
				<a href="../logout.php"> <?php // LOGOUT sarà dentro UTIL ?>
					<span>Logout</span>
				</a>
		</ul>
	</div>
</div>