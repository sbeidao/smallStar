<?php
	//require_once "database.php";
    header('Content-Type: ; ');
    
    $data = $_POST['trans_data'];

	//connect to database
    $SAE_MYSQL_USER = "1wk5ynnmyn";
    $SAE_MYSQL_PASS = "klm1wjm33303xxzy5123hym5hx2ly0hx0z3yjyzk";
    $SAE_MYSQL_HOST_M = "w.rdc.sae.sina.com.cn";
    $SAE_MYSQL_HOST_S = "r.rdc.sae.sina.com.cn";
    $SAE_MYSQL_PORT = "3307";
    $SAE_MYSQL_DB = "app_smallstar";
   //连接数据库
    $db = new mysqli($SAE_MYSQL_HOST_M, $SAE_MYSQL_USER, $SAE_MYSQL_PASS, $SAE_MYSQL_DB, $SAE_MYSQL_PORT);
    //print_r($db);
    if (!$db) {
   	 	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
	}	

	//执行sql语句
	$openid = $data["openid"];
	$nickname = $data["nickname"];
	$gender = $data["gender"];
	$sql = "insert into user values('" . $openid . "','" . $nickname . "',0," . $gender . ")";
	//print_r($sql);

	$result = $db->query($sql);
	if (!$result) {
   		 echo 'Could not run query: ' . mysql_error();
   		 print_r($sql);
   		 //exit;
	}
	

	$jarr=array(
		"openid" => $openid
		);
	echo json_encode($jarr);
	
    $db->close();
?>