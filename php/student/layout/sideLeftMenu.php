<div id="menu" class="house_colors_background">
	<a href="./homepage.php">
		<div id="student_picture">

		</div>
		<div id="student_name" class="house_colors_borders">
			<?php echo $_SESSION['name']; ?>
		</div>
	</a>

	<div class="student_profile" >
		<ul>
			<li class="house_colors_borders">
				<a href="./homepage.php"> <?php // da cambiare con student_homepage ?>
					<span class="menu_span">Home</span>
				</a>
			<li class="house_colors_borders">
				<a href="./settings.php">
					<span class="menu_span">Settings</span>
				</a>	
			<li class="house_colors_borders">
				<a href="./news.php">
					<span class="menu_span">News</span>
				</a>
		</ul>
	</div>
	<br>
	<div class="student_profile">
		<ul>
			<li class="house_colors_borders">
				<a href="./subjects.php">
					<span class="menu_span">Courses</span>
				</a>
			<li class="house_colors_borders">	
				<a href="./grades.php">
					<span class="menu_span">Grades</span>
				</a>
			<li class="house_colors_borders">
				<a href="./house.php">
					<span class="menu_span">Your House</span>
				</a>
			<li class="house_colors_borders">
				<a href="./quidditch.php">
					<span class="menu_span">Quidditch</span>
				</a>
		</ul>	
	</div>
	<br>
	<div id="LogOut">
		<ul>
			<li class="house_colors_borders">
				<a href="../logout.php"> 
					<span class="menu_span">Logout</span>
				</a>
		</ul>
	</div>
</div>