<?php
/*require_once "jssdk.php";



$appid = "wx2f03a3ab9436c521";
$security = "08a52123e6fe59b1789a923366d06607";

$jssdk = new JSSDK($appid, $security);*/


/*$connect_to_db = $database->connect_to_database();
$signPackage = $jssdk->GetSignPackage();*/
//echo "<script type=text/javascript>document.write(data)</script>";  
?>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <title>首页</title>
    <style type="text/css">
        body {
            background-image: url(../images/wallpaper1.png);
            background-repeat: repeat;
            background-size:cover;
            border: none;
            background-color:#382A5D;

        }
        .div_bn_login{
            margin-top: 160px;
            width: 100%;
            text-align: center;
        }
        .bn_login{
            width: 96px;
            height: 91px;
        }
        .div_gif{
            margin-top: 2px;
            text-align: center;
        }
        .gif{
            margin-left:-1px;
            margin-top:45px;
            width:20px;
        }
        /*.bn_login:hover{*/
            /*content: url("../images/wechat_pressed.png");*/
        /*}*/
    </style>
</head>
<body>
<div class="div_bn_login">
    <img id="bn_login" src="../images/wechat_idle.png" class="bn_login" onclick="func_login()">
</div>
<div class = "div_gif">
    <img class="gif" src="../gif/arrow_up.gif">
</div>
</body>


<script type="text/javascript">
    
var FirstAccess = 1 ;
var openid = "";
window.onload = function(){
    var code = getUrlParam("code");

    $.ajax({
        type: "GET",
        url: "../server/FirstAccess.php",
        data:{trans_data:code},
        dataType: "JSON",
        success: function(data){
           // data = $.parseJSON(data);
            //alert(data);
            openid = data.openid ;
            if(data.first_access == 1) {
                FirstAccess = 1;
            } else {
                FirstAccess = 0;
            }
        },
        error: function(){
            alert('fail');
        }
    });


};    



function func_login(){

    document.getElementById('bn_login').setAttribute("src","../images/wechat_pressed.png");
    if(FirstAccess){
            window.location.href="login.php?openid="+openid;  
    } else {
            window.location.href="choose_galaxy.php?openid="+openid; 
    }

}
    
</script>
</html>