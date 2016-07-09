<?php
	require_once "config.php";
    header('Content-Type: ; ');//使用gb2312编码，使中文不会变成乱码      
    $openid = $_GET['trans_data'];    
    
	
 
	//connect to database
  
   //连接数据库
    $db = new mysqli($SAE_MYSQL_HOST_M, $SAE_MYSQL_USER, $SAE_MYSQL_PASS, $SAE_MYSQL_DB, $SAE_MYSQL_PORT);
    //print_r($db);
    if (!$db) {
   	 	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
	}	

	$sql1 = "SET NAMES 'UTF8'";
	$result = $db->query($sql1);
	if (!$result) {
   		 echo 'Could not run query: ' . mysql_error();
   		 exit;
	}

	//执行sql语句
	$sql = "SELECT * FROM  app_smallstar.show WHERE user_id = " . json_encode($openid) ;

	$result = $db->query($sql);
	if (!$result) {
   		 echo 'Could not run query: ' . mysql_error();
   		 exit;
	}
	//print_r($result);
	$count_arr = array();

	 while ($row = $result->fetch_row()) {
	 	//echo json_encode($row);
	 	//print_r($row);
	 	array_push($count_arr,$row[2]);
	 }
	$count_arr = array_flip(array_flip($count_arr)); 
	$dynamic_level = count($count_arr,0);
	if($dynamic_level >= 3){
		$dynamic_level = 3;
	}

	$jarr=array(
		"level" => $dynamic_level
		);
	echo json_encode($jarr);
	
	$result->free();
    $db->close();
?>