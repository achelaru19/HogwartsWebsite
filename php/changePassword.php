<?php

// RICORDA: gli errori di errorMessage devono essere
// 0 => Problema nella query
// 1 => Password Vecchia Invalida

	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; //includes Database Class
    require_once DIR_UTIL . "/SessionUtil.php"; //includes session login
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();	


	if (!isLogged()){
		    header("Location: ../index.php");
    }


    if(isset($_POST['submit'])) {

		$NewPassword = $_POST['newPassword1'];
		$username = $_SESSION['username'];
		$wizardType = $_SESSION['wizardType'];
			
		changePassword($username, $OldPassword, $NewPassword, $wizardType);

		
		if($wizardType=='Student')
			header('location: ./student/homepage.php');
		else
			header('location: ./teacher/homepage.php');
		
	}
	 

	 function changePassword($username, $Old_Password, $New_Password, $wizardType){

	 	// UPDATE

	 	global $HogwartsDB;

	 	$NewPassword = $HogwartsDB->sqlInjectionFilter($New_Password);


	 	$updateQuery = "update " . $wizardType . " set Password='" . $NewPassword . "' where Username='" . $username . "'";
	 	$result = $HogwartsDB->performQuery($updateQuery);

	 	$HogwartsDB->closeConnection();
	 }

	 if(isset($_POST['control'])) {

		// check if password is correct

	 	$OldPassword = $_POST['control'];
		$username = $_SESSION['username'];
		$wizardType = $_SESSION['wizardType'];

	 	global $HogwartsDB;

	 	$OldPassword = $HogwartsDB->sqlInjectionFilter($OldPassword);

	 	$queryCheck = "select * from " . $wizardType . " where Username ='" . $username . "' and Password ='" . $OldPassword . "'";
	 	$resultCheck = $HogwartsDB->performQuery($queryCheck);
	 	$numRowsCheck = mysqli_num_rows($resultCheck);

	 	$HogwartsDB->closeConnection();

	 	if($numRowsCheck != 1)
	 		$jsonObj = array('error'=>'1');
	 	else
	 		$jsonObj = array('error'=>'0');

	 	echo json_encode($jsonObj);

	 }