<?php

	require_once __DIR__ . "/../../config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; 
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();

    if(isset($_POST['submit'])){

    	$name = $_POST['name'];
    	$lastname = $_POST['lastname'];
    	$email = $_POST['email'];
    	$sex = $_POST['sex'];
    	$schoolYear = $_POST['schoolYear'];
    	$day = $_POST['day'];
    	$month = $_POST['month'];
    	$year  = $_POST['year'];

    	global $HogwartsDB;

    	$name = $HogwartsDB->sqlInjectionFilter($name);
    	$lastname = $HogwartsDB->sqlInjectionFilter($lastname);
    	$email = $HogwartsDB->sqlInjectionFilter($email);

    	$nickname = generateNickname($name, $lastname, $year);
    	$password = generatePassword();

    	$birthday = $year . "-" . $month . "-" . $day;
    	$houses = array("Gryffindor","Hufflepuff","Ravenclaw","Slytherin");
    	$index = rand(0,3);
    	$house = $houses[$index];

    	$query = "insert into student values ('" . $nickname . "','" . $name . "','" . $lastname . "','" . $sex . "','" . $birthday . "','" . $password . "','" . $email . "','" . $schoolYear . "','" . $house . "')";

    	$result = $HogwartsDB->performQuery($query);


    	// SEND EMAIL OF REGISTRATION TO HOGWARTS SCHOOL WITH THE STUDENT'S INFORMATION

    	$teacherName = $_SESSION['name'];
    	$teacherLastname = $_SESSION['lastname'];

    	$subject = "WELCOME TO HOGWARTS";

    	$message = "Dear " . $lastname . ",\n We are pleased to inform you that you have been accepted to \n Hogwarts School of Witchcraft and Wizardry.\n Your log-in information are: \n Username: " . $nickname . "\n Password: " . $password . "\nDuring your first access you will be able to change your password \ninto something easier to remember. \n Yours sincerely, \n" . $teacherName . " " . $teacherLastname;

    	$check = mail($email, $subject, $message);

    	if(!$check){
    		echo "There has been an error. Email not sent";
    	}
        else
            header("Location: ../AddStudent.php");

    }

    function generateNickname($name, $lastname, $year){
    	
    	// Lowercase the first character
    	$name = lcfirst($name);
    	$lastname = lcfirst($lastname);

    	$firstLetter = $name[0];
    	$firstNumber = $year[2];
    	$secondNumber = $year[3];

    	$nickname = $firstLetter . "." . $lastname . $firstNumber . $secondNumber;

    	global $HogwartsDB;
    	$row = 1;
    	$i = 1;
    	while($row != 0){
    		$query = "select * from student where username='" . $nickname . "'";
    		$result = $HogwartsDB->performQuery($query);
    		$row = mysqli_num_rows($result);
    		if($row != 0){
    			$nickname = $firstLetter . "." . $lastname . "0" . $i;
    			$i++;
    		}
   		}
   		echo $nickname;
   		echo "\n";
    	return $nickname;
    }

/*
	This function generates a password made of 5 characters and 2 final digits, chosen randomly.
*/
    function generatePassword(){

    	$letters = "abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$length = strlen($letters);
    	$numberOne = rand(0,9);
    	$numberTwo = rand(0,9);

    	$password = '';
    	for($i = 0; $i < 5; $i++){
    		$index = rand(0, $length - 1);
    		$password .= $letters[$index];
    	}

    	$password .= $numberOne;
    	$password .= $numberTwo;

    	return $password;
    }

?>