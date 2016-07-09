<?php
	require_once "config.php";
    header('Content-Type: ; ');//使用gb2312编码，使中文不会变成乱码      
    $openid = $_GET['trans_data'];    
    
	
   /* require_once "database.php";
	$database = new DATABASE();

	$connect_to_db = $database->connect_to_database();
	//执行sql语句
	$sql = "SELECT * FROM  user WHERE wx_id = " . json_encode($openid) ;
	//print_r($sql);

	$result = $database->execute_sql($sql);

	 while ($row = $result->fetch_row()) {
	 	print_r($row);
	 }*/
	
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
	$sql = "SELECT * FROM  user WHERE wx_id = " . json_encode($openid) ;

	$result = $db->query($sql);
	if (!$result) {
   		 echo 'Could not run query: ' . mysql_error();
   		 exit;
	}


	 while ($row = $result->fetch_row()) {
	 	//echo json_encode($row);
	 	//print_r($row);
	 	$name = $row[1];
	 	$level = $row[2];
	 	$sex = $row[3];
	 }
	


	$jarr=array(
		"name" => $name,
		"level" => $level,
		"sex" => $sex
		);
	echo json_encode($jarr);
	//尾巴已经被处理，在第三行的header('Content-Type: ;这里设置content type为空就可以了
	//新浪会在服务器返回的数据后面加上一个 该页面的提供者尚未完成','实名认证','您的访问可能存在风险 的尾巴，我们用注释的方法绕过去
	//echo "\r\n<!--";
	$result->free();
    $db->close();
?>