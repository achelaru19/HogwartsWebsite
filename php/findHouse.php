<?php

	require_once __DIR__ . "./config.php";
    require_once DIR_UTIL . "DB_HogwartsManager.php"; //includes Database Class


if(isset($_POST['pattern'])){
	
	$pattern = $_POST['pattern'];

	global $HogwartsDB;

	$pattern = $HogwartsDB->sqlInjectionFilter($pattern);

	$query = "select H.Name
			  from house H inner join student S
    		  on H.Name = S.House
			  where S.Username LIKE '" . $pattern . "%'
			  limit 1";

	$result = $HogwartsDB->performQuery($query);

	if(mysqli_num_rows($result) != 0)
		$arr = array('house'=>mysqli_fetch_row($result)[0]);
	else
		$arr = array('house'=>'null');

	echo json_encode($arr);

}

?>