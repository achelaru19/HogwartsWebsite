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
    	<meta name = "keywords" content = "Hogwarts, Homepage, Wizard, Quidditch">
    	<link rel="shortcut icon" type="image/x-icon" href="../../img/Logo.png" />
    	<link rel="stylesheet" href="../../css/student.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/homepage.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../../css/quidditchGame.css" type="text/css" media="screen">	
    	<script type="text/javascript" src="../../js/homepage.js"></script>
    	<script type="text/javascript" src="../../js/quidditchGame.js"> </script>
    	<title>Quidditch Game</title>

	</head>

	<body onLoad="begin('<?php echo $_SESSION["username"]; echo "','"; echo $_SESSION['house'];?>'); initialiseGame()">
	
		<div class="wrapper">
			<?php 
				include DIR_LAYOUT . "header.php";
			?>
			
			<div id="main_content">
			
				<?php 
					include DIR_STUDENT_LAYOUT . "sideLeftMenu.php";
					require_once DIR_UTIL . "DB_Hogwarts_Functions.php";
				?>
				<div id="main_area">
						<h2>Quidditch Game</h2>
							<h3>Rules</h3>
							<ul class="quidditchRules">
								<li class="quidditchRules">Press the Start button</li>
								<li class="quidditchRules">Catch the snitch three times</li>
								<li class="quidditchRules">If you finish in less than 10 seconds, you House will receive 1 Quidditch Point</li>
							</ul>
					<div id="buttons">
						<button id="bottone" onClick="start()">START</button><br>
						<input id="score" readonly value='0'>
					</div>
					<div id="side_right">
						<div id="field" style="width:650px; height:550px; margin:0px auto">
							
								<img id="snitch" src="../../img/snitch.png" alt="Snitch" onClick="gotIt()" style="width: 75px; height: 75px;">
						
						</div>
					</div>
				</div>
			</div>
			<?php 
				include DIR_LAYOUT . "footer.php";
			?>
		</div>	
	</body>
</html>
