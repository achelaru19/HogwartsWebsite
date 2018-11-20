<?php
	session_start();
	
	include_once __DIR__ . "./php/config.php";
    require_once  DIR_UTIL . "/sessionUtil.php";
    require_once DIR_UTIL . "/LoginHogwarts.php";

    if (isLogged()){
		    $type = $_SESSION['wizardType'];
		    if($type == 'Teacher')
		    	header('Location: ./php/teacher/homepage.php');
		    else
		    	header('Location: ./php/student/homepage.php');
    }	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "Angel Chelaru">
    	<meta name = "generator" content = "Sublime Text 2">
    	<meta name = "keywords" content = "Hogwarts, Homepage, Wizard">
    	<link rel="stylesheet" href="./css/login.css" type="text/css" media="screen">
    	<link rel="shortcut icon" type="image/x-icon" href="./img/Logo.png" />
    	<script type="text/javascript" src="./js/loginEffects.js"></script>

    	<title>Login Page Hogwarts</title>

	</head>

	<body onLoad="begin()">
		<div id="sign_in_page">
			<div id="sign_in_page_header">
				Hogwarts Login
			</div>
			<div id="login_form" class="form_text">
				<form name="login" action="./php/util/LoginHogwarts.php" method="post" id="login">
					<label>Username</label>
					<input type="text" class="from_text" placeholder="Username" name="username" onkeyup="searchHouse(this.value)" required autofocus>
					<label>Password</label>
					<input type="password" placeholder="Password" name="password" required>
					<br>
					<div id="typeWizard" >
						<label>Type Of Wizard</label><br>
						<div id="radio_input">
							<input type="radio" class="from_text" name="wizardType" value="Student" required>Student<br>
							<input type="radio" class="from_text" name="wizardType" value="Teacher" required>Teacher<br>
						</div>
					</div>
					<br>
					<input type="submit" name="submit" value="Enter" class="login_button">
				</form>
				<p class="faq">For more information <a href="./html/faq.html">click here</a></p>
			</div>
		</div>
	</body>

</html>