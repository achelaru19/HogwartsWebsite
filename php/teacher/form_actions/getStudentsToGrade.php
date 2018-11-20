<?php
	require_once __DIR__ . "/../../config.php";
    require_once DIR_UTIL . "/DB_HogwartsManager.php"; 
    require_once DIR_UTIL . "/DB_Hogwarts_Functions.php";
    session_start();

    if(isset($_POST['schoolYear'])){

    	$year = $_POST['schoolYear'];
    	$username = $_SESSION['username'];

    	global $HogwartsDB;
    	$query = "select Name, Lastname
				  from student S natural join courses C
				  where S.SchoolYear=" . $year ." 
        		   and C.Teacher ='" . $username . "'";
        $result = $HogwartsDB->performQuery($query);
        $numRows = mysqli_num_rows($result);
        if($numRows == 0)
        	echo null;
        else{
            $arr = array();
            $i=0;

        	while($row = mysqli_fetch_row($result)){
                $arr[$i]["name"] = $row[0];
                $arr[$i]["lastname"] = $row[1];
                $i++;
        	}
        	
        	echo json_encode($arr);
        }
    }
	
?>