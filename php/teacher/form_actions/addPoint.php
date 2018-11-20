<?php

	require_once __DIR__ . "/../../config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; //includes Database Class
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();

    if(isset($_POST['add']) || (isset($_POST['subtract']))){

    	$points = $_POST['points'];
    	$house = $_POST['house'];
    	$add_subtract = '-';

    	if(isset($_POST['add']))
    		$add_subtract = '+';

    	$check = addPoints($points, $house, $add_subtract);
    	if($check != 0)
    		echo "there has been an error";
    	
    }

?>