<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "DB_HogwartsManager.php";


	function getName($username, $wizardType){

		global $HogwartsDB;

		$query = "select Name, Lastname from " . $wizardType . " where Username ='" . $username . "'";

		$result = $HogwartsDB->performQuery($query);

		$numRows = mysqli_num_rows($result);

		$HogwartsDB->closeConnection();

		if($numRows > 0)
			return $result;

		return null;
	} 

	function getUsername($name, $lastname, $wizardType){

		global $HogwartsDB;

		$query = "select username from " . $wizardType . " where name='" . $name . "' and lastname='" . $lastname . "'";
		$result = $HogwartsDB->performQuery($query);

		$row = mysqli_fetch_row($result);

		$HogwartsDB->closeConnection();

		return $row[0];

	}


	function getGrades($username){
		global $HogwartsDB;
		$query = "select g.Subject, g.Mark, g.Date 
				  from Student S inner join Grades G 
				       on S.Username = G.Student
				       inner join Courses C 
				       on (C.SchoolYear = S.SchoolYear AND C.Subject = G.Subject)
				  where S.Username='" . $username . "' AND
                  S.SchoolYear=C.SchoolYear
				  order by G.Date DESC"; 

		$result = $HogwartsDB->performQuery($query);
		$numRows = mysqli_num_rows($result);

		$HogwartsDB->closeConnection();

		if($numRows > 0)
			return $result;
		

		return null;

	}

	function getAverage(){

		global $HogwartsDB;

		$username = $_SESSION['username'];

		$query =  "SELECT AVG(D.AverageMark) AS GeneralAverale
				   FROM (
					    SELECT AVG(G.Mark) AS AverageMark
					    FROM GRADES G natural join COURSES C
					    				   inner join STUDENT S
					    				   on (S.SchoolYear = C.SchoolYear
					                       and G.Student=S.Username)
					    WHERE S.Username='" . $username . "' 
					    GROUP BY C.Subject
					    ) AS D;";
    
		$result = $HogwartsDB->performQuery($query);

		$numRows = mysqli_num_rows($result);

		if($numRows == 1)
			return mysqli_fetch_row($result)[0];
		return 0;

		$HogwartsDB->closeConnection();

	}

	function getCareer(){
		global $HogwartsDB;
		$query = "select C.Subject, C.SchoolYear
				  from Courses C
				  order by C.SchoolYear";

		$result = $HogwartsDB->performQuery($query);

		$numRows = mysqli_num_rows($result);

		if($numRows > 0){
			$HogwartsDB->closeConnection();
			return $result;
		}
			
		return null;
	}

	function getYear($username){

		global $HogwartsDB;

		$query = "Select SchoolYear from student where Username='" . $username . "'";

		$result = $HogwartsDB->performQuery($query);
		if(mysqli_num_rows($result)){
			$row = mysqli_fetch_row($result);
			return $row[0];
		}

		return 0;

		$HogwartsDB->closeConnection();

	}


	function yourHouseInfo($username){
			global $HogwartsDB;

		$query = "select H.Name, H.Points, H.HeadOfTheHouse, H.QuidditchPoints
				  from House H inner join Student S
				  on H.Name = S.House
				  where S.Username ='" . $username . "'";

		$result = $HogwartsDB->performQuery($query);
		$numRows = mysqli_num_rows($result);

		$HogwartsDB->closeConnection();

		if($numRows == 0)
			return $result;

		return null;
	}

	function getHouse($username){

		global $HogwartsDB;
		$query = "select House from Student where username='" . $username . "'";

		$result = $HogwartsDB->performQuery($query);
		$numRows = mysqli_num_rows($result);

		if($numRows == 1){
			$house = mysqli_fetch_row($result);
			return $house[0];
		}

		$HogwartsDB->closeConnection();

	}

	function getTeacherName($username){
		global $HogwartsDB;
		$query = "select Name, Lastname from teacher where username='" . $username . "'";

		$result = $HogwartsDB->performQuery($query);
		$numRows = mysqli_num_rows($result);

		if($numRows == 1){
			$name = mysqli_fetch_row($result);
			return $name;
		}

		$HogwartsDB->closeConnection();

	}

	function getSubject($student, $teacher){

		global $HogwartsDB;

		$query = "select C.Subject
				  from courses C natural join student S
   				  inner join teacher T ON T.Username=C.Teacher
				  where S.Username='" . $student . "' and C.Teacher='" . $teacher . "'";
		$result = $HogwartsDB->performQuery($query);
		$row = mysqli_fetch_row($result);

		$HogwartsDB->closeConnection();

		return $row[0];
	}

	function addQuidditchPoint($house){

		global $HogwartsDB;

		$query = "update House set QuidditchPoints=QuidditchPoints+1 where Name='" . $house . "'";
		$result = $HogwartsDB->performQuery($query);

		$HogwartsDB->closeConnection();

	}

	function addPoints($points, $house, $add_subtract){

		header("location: ../AddPoints.php");

		global $HogwartsDB;

		$query = "update House set Points=Points" . $add_subtract . $points . " where Name='" . $house ."'";
		$result = $HogwartsDB->performQuery($query);
		if($result != true)
			return 1;
		return 0;

		$HogwartsDB->closeConnection();

	}

	function sendNews($message, $teacher, $time_period, $gryffindor, $hufflepuff, $ravenclaw, $slytherin){

		header("location: ../sendNews.php");

		global $HogwartsDB;

		$message = $HogwartsDB->sqlInjectionFilter($message);

		$query = "insert into news values (null,'" . $teacher . "', curdate(),'" . $message . "',"  . $gryffindor . "," . $hufflepuff . "," . $ravenclaw . "," . $slytherin . ",'" . $time_period . "')";
		$result = $HogwartsDB->performQuery($query);


		$HogwartsDB->closeConnection();


		if($result != true)
			return 1;
		return 0;
	}

	function gradeStudent($teacher, $name, $lastname, $grade){

		if($grade>0 && $grade<=100){
			global $HogwartsDB;
			$student = getUsername($name, $lastname, "Student");
			$subject = getSubject($student, $teacher);
			// subject student mark date
			$query = "insert into grades values ('" . $subject . "','" . $student . "','" . $grade . "',current_date())";
			$result = $HogwartsDB->performQuery($query);

			$HogwartsDB->closeConnection();
		}
	}

?>