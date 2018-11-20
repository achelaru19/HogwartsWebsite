<?php

// RICORDA: gli errori di errorMessage devono essere
// 0 => All is ok
// 1 => Invalid password
// 2 => Username not existing
// 3 => Nothing has been inserted

	require_once __DIR__ . "./../config.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; //includes Database Class
    require_once DIR_UTIL . "SessionUtil.php"; //includes session login
    require_once DIR_UTIL . "DB_Hogwarts_Functions.php";
 
	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$wizardType = $_POST['wizardType'];
		$house = '';
		if($wizardType == 'Student')
			$house = getHouse($username);	

		$errorMessage = login($username, $password, $wizardType, $house);

		if($errorMessage === 0){
			if($wizardType=='Student')
				header('location: ../student/homepage.php');
			else
				header('location: ../teacher/homepage.php');
		}
		else{
			header('location: ../../index.php');
		};
	 }


		function login($username, $password, $wizardType, $house){

			if($username!=NULL && $password!=NULL){
				$userInfo = authenticate($username, $password, $wizardType);

				if(is_numeric($userInfo)){
					return $userInfo;
				}
				else{
					session_start();
					$result = getName($username, $wizardType);
					$clientName = mysqli_fetch_row($result);
					$name = $clientName[0]; 
					$lastname = $clientName[1]; 
					setSession($userInfo, $wizardType, $name, $lastname, $house);
					return 0;
				}
			}
			else 
				return 3; // Check if nothing has been inserted (only for debugging purpose)
		}

		function authenticate($username, $password, $wizardType){

			global $HogwartsDB;
			$username = $HogwartsDB->sqlInjectionFilter($username);
			$password = $HogwartsDB->sqlInjectionFilter($password);

			$queryText = "select * from " . $wizardType . " where username='" . $username . "' AND password='" . $password . "'";

			$result = $HogwartsDB->performQuery($queryText);
			$numRow = mysqli_num_rows($result);
			if ($numRow != 1){
					$usernameQuery = "select * from " . $wizardType . " where Username ='$username'";
					$errorUsername = $HogwartsDB->performQuery($usernameQuery);
					$numRowError = mysqli_num_rows($errorUsername);
					if($numRowError == 1)
						return 1; // Username exists, but password incorrect
					else
						return 2; // Username does not exist
				}

				return $username;
			}


?>
