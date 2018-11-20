<?php
	require_once __DIR__ . "/config.php";
	session_start();
	include_once DIR_UTIL . "/SessionUtil.php";

    if (!isLogged()){
		    header("Location: ../index.php");
    }	

    if(isset($_POST["submit"])){

    	$wizardType = $_SESSION['wizardType'];

    	$folder = 'students';
    	if($wizardType == "Teacher")
    		$folder = 'teachers';

		$upload_dir = "../img/" . $folder . "/";
		$file = $_FILES['newPicture']['name'];
		$username = $_SESSION['username'];

		// Control on the extension. Only jpg allowed.
		$infoFile = pathinfo($file, PATHINFO_EXTENSION);
		if($infoFile == "jpg") {

			$uploadedImageDir = $upload_dir . $username . ".jpg";

			if(file_exists($uploadedImageDir))
				unlink($uploadedImageDir);

			if(!move_uploaded_file($_FILES['newPicture']['tmp_name'], '../img/' . $folder .'/' . $username . "." . $infoFile)){
				echo "Unable to upload your";
			}
		}
		else {
			echo "File not supported";
		}

		header('location: ./' . $wizardType .'/homepage.php');
	}

?>