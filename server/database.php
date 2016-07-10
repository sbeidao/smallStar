<?php
class DATABASE {
 
  public $db;
  public function __construct( ) {
     $db = -1;
  }

 
  public function connect_to_database() {

   $SAE_MYSQL_USER = "1wk5ynnmyn";
   $SAE_MYSQL_PASS = "klm1wjm33303xxzy5123hym5hx2ly0hx0z3yjyzk";
   $SAE_MYSQL_HOST_M = "w.rdc.sae.sina.com.cn";
   $SAE_MYSQL_HOST_S = "r.rdc.sae.sina.com.cn";
   $SAE_MYSQL_PORT = "3307";
   $SAE_MYSQL_DB = "app_smallstar";
   
    $mysql = new mysqli($SAE_MYSQL_HOST_M, $SAE_MYSQL_USER, $SAE_MYSQL_PASS, $SAE_MYSQL_DB, $SAE_MYSQL_PORT);
    //print_r($db);
    if (!$mysql) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    } 

    $db = $mysql;
    return $mysql;
  }

  public function execute_sql($sql) {
     if($db != -1) {
        $result = $db->query($sql);
        if (!$result) {
             echo 'Could not run query: ' . mysql_error();
             exit;
        }
        return $result;
     }
     return null;
  }



 
}

