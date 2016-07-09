<?php
	require_once "config.php";
    header('Content-Type: ; ');//使用gb2312编码，使中文不会变成乱码    

    $data = $_POST['trans_data'];

	//connect to database
    
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