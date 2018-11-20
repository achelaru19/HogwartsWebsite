<?php
	require_once __DIR__ . "./config.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; 

    if(isset($_POST['check'])){

    	global $HogwartsDB;
    	$query = "select Name, Points
				  from House";
        $result = $HogwartsDB->performQuery($query);
        $numRows = mysqli_num_rows($result);
        if($numRows == 0)
        	echo null;
        else{
            $arr = array();
        	while($row = mysqli_fetch_row($result)){
                $arr[$row[0]] = $row[1];
        	}
        	
        	echo json_encode($arr);
        }

        $HogwartsDB->closeConnection();
    }
	
?>