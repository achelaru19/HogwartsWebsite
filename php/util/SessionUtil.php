<?php
	
	function setSession($username, $wizardType, $name, $lastname, $house){
		$_SESSION['username'] = $username;
		$_SESSION['wizardType'] = $wizardType;
		$_SESSION['name'] = $name;
		$_SESSION['lastname'] = $lastname;
		if($house != '')
			$_SESSION['house'] = $house;
	}

	function isLogged(){		
		if(isset($_SESSION['username']))
			return $_SESSION['username'];
		else
			return 0;
	}

?>