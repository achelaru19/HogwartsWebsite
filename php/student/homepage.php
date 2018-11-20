<?php
	session_start();
	require_once __DIR__ . "/../config.php";
	include DIR_UTIL . "SessionUtil.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; //includes Database Class

    if (!isLogged()){
		    header("Location: ../loginPage.php");
    }	
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8"> 
    	<meta name = "author" content = "Angel Chelaru">
    	<meta name = "generator" content = "Sublime Text 2">
    	<meta name = "keywords" content = "Hogwarts, Homepage, Wizard, Student">
    	<link rel="shortcut icon" type="image/x-icon" href="../../img/Logo.png" />
    	<link rel="stylesheet" href="../../css/student.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/homepage.css" type="text/css" media="screen">
    	<script type="text/javascript" src="../../js/homepage.js"></script>
    	<script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
    	<script type="text/javascript" src="../../js/Chart.min.js"></script>
    	<script type="text/javascript" src="../../js/HousesChart.js"></script>
    	<title> <?php echo $_SESSION['name']; echo " "; echo $_SESSION['lastname']; ?></title>

	</head>

	<body onLoad="begin('<?php $username = $_SESSION["username"]; $house = $_SESSION['house']; 
						echo $username; echo "', '"; echo $house;  ?>'); chartFunction('Student');" >
		
	<div class="wrapper">
		<?php 
			include DIR_LAYOUT . "header.php";
		?>
		
		<div id="main_content">
			<?php 
				include DIR_STUDENT_LAYOUT . "sideLeftMenu.php";
			?>
			<div id="main_area">
				<div id="homepage_left"> 
					<h2>Homepage</h2>
					<?php 
						$name = $_SESSION['name'];
						echo "<p>Hello " . $name . ",<br> welcome to your homepage.<br>";
						echo "Here you can access all your school information.";
					?>
					
					<h2>Your school average</h2>
					<?php 

						require_once DIR_UTIL . "DB_Hogwarts_Functions.php";

						$result = number_format(getAverage(), 2);

						if($result == 0)
							echo "<p>You have not been graded yet.</p>";
						else {
							echo "<p>So far your average is: ";
							echo $result;
							echo ".</p>";
						}

					?>
					</div>

					<div id="canvas">
						<canvas id="myChart" width="50px" height="50px"></canvas>
					</div>


				<?php

					$year = getYear($_SESSION['username']);

					include DIR_STUDENT_LAYOUT . "/schedule/" . $year . "YearSchedule.php";
				?>
				<br><br>
				</div>

			</div>
				<?php 
					include DIR_LAYOUT . "footer.php";
				?>

		</div>
	</body>
</html>