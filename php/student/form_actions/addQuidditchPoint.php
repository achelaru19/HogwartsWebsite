<?php
	
    require_once __DIR__ . "/../../config.php";
	session_start();
	include_once DIR_UTIL . "SessionUtil.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; 
    require_once DIR_UTIL . "DB_Hogwarts_Functions.php";

    if (!isLogged()){
		    header("Location: ../loginPage.php");
    }	
    

	if(isset($_POST['check'])){
		$username = $_SESSION["username"];
		$house = getHouse($username);

		$addPoint = addQuidditchPoint($house);

		if($addPoint != 0)
			echo "There has been an error";
	}

?>