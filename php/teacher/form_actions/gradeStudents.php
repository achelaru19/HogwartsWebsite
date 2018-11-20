<?php

	require_once __DIR__ . "/../../config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; 
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();

    if(isset($_POST['addGrades'])){

    	$teacher = $_SESSION['username'];
    	$length = $_POST["len"];
    	$gradedStudents = $_POST['grade'];
    	$studentNames = $_POST['firstname'];
    	$studentLastnames = $_POST['lastname'];
    	
    	for($i=0; $i<$length; $i++){
    		if($gradedStudents[$i]){
	    		gradeStudent($teacher, $studentNames[$i], $studentLastnames[$i], $gradedStudents[$i]);
    		}
    	}

        header("Location: ../AddGrades.php");

    }

?>