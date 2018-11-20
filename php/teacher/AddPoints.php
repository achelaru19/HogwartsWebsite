<?php
	session_start();
	require_once __DIR__ . "/../config.php";
	include DIR_UTIL . "SessionUtil.php";

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
    	<meta name = "keywords" content = "Hogwarts, Teacher, Homepage, Wizard, Points, House">
    	<link rel="shortcut icon" type="image/x-icon" href="../../img/Logo.png" />
    	<link rel="stylesheet" href="../../css/homepage.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/teacher.css" type="text/css" media="screen">
    	<script type="text/javascript" src="../../js/homepage.js"></script>
    	<title>Points</title>

	</head>

	<body onLoad="beginTeacher('<?php echo $_SESSION['username']; ?>')">
		<div class="wrapper">
			<?php 
				include DIR_LAYOUT . "header.php";
			?>
			
			<div id="main_content">

				<?php 
					include DIR_TEACHER_LAYOUT . "sideLeftMenu.php";
				?>

				<div id="main_area">
				
				<?php
					include DIR_TEACHER_LAYOUT . "addPointsForm.php";
				?>
				
				</div>

			</div>

			<?php 
				include DIR_LAYOUT . "footer.php";
			?>
		</div>
	</body>
</html>