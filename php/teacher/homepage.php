<?php
	session_start();
	require_once __DIR__ . "/../config.php";
	include DIR_UTIL . "/SessionUtil.php";

    if (!isLogged()){
		    header("Location: loginPage.php");
    }	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "Angel Chelaru">
    	<meta name = "generator" content = "Sublime Text 2">
    	<meta name = "keywords" content = "Hogwarts, Teacher, Homepage, Wizard">
    	<link rel="shortcut icon" type="image/x-icon" href="../../img/Logo.png" />
    	<link rel="stylesheet" href="../../css/homepage.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/teacher.css" type="text/css" media="screen">
    	<script type="text/javascript" src="../../js/homepage.js"></script>
    	<script type="text/javascript" src="../../js/HousesChart.js"></script>
    	<script type="text/javascript" src="../../js/Chart.min.js"></script>
    	<script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
    	<title>Homepage</title>

	</head>

	<body onLoad="beginTeacher('<?php echo $_SESSION['username']; ?>'); chartFunction('Teacher');">

		<div class="wrapper">
			<?php 
				include DIR_LAYOUT . "header.php";
			?>
			
			<div id="main_content">

				<?php 
					include DIR_TEACHER_LAYOUT . "sideLeftMenu.php";

					$name = $_SESSION['name'];
					echo "<div id=\"main_area\">";
					echo "<div id='homepage_left_teacher'>";
					echo "<h2>Homepage</h2><p>";
					echo "Hello " . $name . ",<br> welcome to your homepage.<br>";
					echo "Here you can send news to all the students. You can add their grades. <br>";
					echo "You can add or take away points from a House. </p>";
					echo "</div>";
				?>

				<div id="canvas">
					<canvas id="teacher_chart"></canvas>
				</div>

				<?php
					$username = $_SESSION['username'];
					include DIR_TEACHER_LAYOUT . "/timetable/" . $username . ".php";
				?>
				</div>
			</div>

			<?php 
				include DIR_LAYOUT . "footer.php";
			?>
		</div>
	</body>
</html>