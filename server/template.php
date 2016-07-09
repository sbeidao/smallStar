<?php
	//require_once "database.php";
    header('Content-Type: ; charset=gb2312');//使用gb2312编码，使中文不会变成乱码    
    
    $code = $_GET['trans_data'];    
    //这里是使用微信测试号的id和security
    $appid = "wx2f03a3ab9436c521";
	$security = "08a52123e6fe59b1789a923366d06607";
	//通过微信的api来拿code换取用户的openid和token
    $get_user_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid.
            "&secret=".$security."&code=".$code."&grant_type=authorization_code";
    $get_userinfo_return = file_get_contents($get_user_url);
	$get_user_return = (array)json_decode($get_userinfo_return);
	$openid = $get_user_return['openid'];
	

	//配置数据库，数据库放在新浪云上，
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
	$sql = "SELECT * FROM  user WHERE wx_id = " . json_encode($openid) ;
	//print_r($sql);
	$result = $db->query($sql);
	if (!$result) {
   		 echo 'Could not run query: ' . mysql_error();
   		 exit;
	}
	
	//处理数据库得到的结果
	$first_access = 0;
	if(mysqli_num_rows($result) == 0)
	{
		$first_access = 1;
	} else {
		$first_access = 0;
	}

	//生成json并返回
	$jarr=array(
		"first_access" => $first_access,
		"openid" => $openid
		);
	echo json_encode($jarr);
	
	$result->free();
    $db->close();
?>