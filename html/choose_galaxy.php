<?php
//require_once "jssdk.php";
//$jssdk = new JSSDK("wx828431a5f84ec792", "f78f4c0a77d414180e4ff7895512f8fd");
//$signPackage = $jssdk->GetSignPackage();
?>

<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/title.css">
    
    <title>选择遨游的星系</title>
    <style>
        .div_galaxy_card{
            margin-top: 60px;
            text-align: center;
        }
        .bn_galaxy_card{
            width: 75%;
        }    </style>
</head>
<body style="align-content: center">
<?php
    include("header.php");
?>
<div class="div_galaxy_card">
    <img id="bn_galaxy_card" class="bn_galaxy_card" src="../gif/galaxy_card.gif" onclick="func_select_galaxy()">
</div>


<script>

var name = "";
var sex =-1;
var openid = "";
window.onload = function(){
    openid = getUrlParam("openid");

    $.ajax({
        type: "GET",
        url: "../server/GetUserData.php",
        data:{trans_data:openid},
        dataType: "JSON",
        success: function(data){
            $("p.nickname").text(decodeURI(data.name));   
            if(data.sex == 0){
                $("#user_sex").attr("src","../images/blank_girl.png");
            } 
            name = data.name;   
            sex = data.sex;  
        },
        error: function(){
            alert('fail');
        }
    });
};    



//选择星系按钮
function func_select_galaxy(){
    document.getElementById('bn_galaxy_card').setAttribute("src","../images/galaxy_card_pressed.png");
    //alert("跳转至选择星球");
	location.href='choose_planet.php?name='+name+"&openid="+openid+"&sex="+sex;
}
</script>
</body>
</html>