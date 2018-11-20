<?php

	require_once __DIR__ . "/../../config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; //includes Database Class
    require_once DIR_UTIL . "/SessionUtil.php";
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();


    if(isset($_POST['submit'])){

    	$message = $_POST['news'];
    	$teacher = $_SESSION['username'];
    	$time_period = $_POST['time_period'];

    	$gryffindor = isset($_POST['gryffindor']) ? 'true' : 'false';
    	$hufflepuff = isset($_POST['hufflepuff']) ? 'true' : 'false';
    	$ravenclaw = isset($_POST['ravenclaw']) ? 'true' : 'false';
    	$slytherin = isset($_POST['slytherin']) ? 'true' : 'false';

    	$check = sendNews($message, $teacher, $time_period, $gryffindor, $hufflepuff, $ravenclaw, $slytherin);
    	 if($check != 0)
    		echo "there have been some errors";
    }


?>