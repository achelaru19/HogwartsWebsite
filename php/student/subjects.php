<?php
	require_once __DIR__ . "/../config.php";
	session_start();
	include_once DIR_UTIL . "SessionUtil.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; 

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
    	<meta name = "keywords" content = "Hogwarts, Homepage, Wizard">
    	<link rel="shortcut icon" type="image/x-icon" href="../../img/Logo.png" />
    	<link rel="stylesheet" href="../../css/student.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/homepage.css" type="text/css" media="screen">
    	<script type="text/javascript" src="../../js/homepage.js"></script>
    	<title>Your classes</title>

	</head>

	<body onLoad="begin('<?php $username = $_SESSION["username"]; $house = $_SESSION['house']; 
						echo $username; echo "', '"; echo $house;  ?>')">

	<div class="wrapper">
	<?php 

		include DIR_LAYOUT . "header.php";
		echo "<div id=\"main_content\">";
		include DIR_STUDENT_LAYOUT . "sideLeftMenu.php";
		require_once DIR_UTIL . "DB_Hogwarts_Functions.php";
	?>

			<div id="main_area">
				<h2>Your classes </h2><br>
				<div id="subject_tables">

				<?php
					include DIR_STUDENT_LAYOUT . "/subjectTables.php";
				?>
				<br><br>
				</div>
			</div>
		</div>
		<?php	
			include DIR_LAYOUT . "footer.php";
		?>
	</div>	
	</body>
</html>