<?php
//require_once "jssdk.php";
//$jssdk = new JSSDK("wx828431a5f84ec792", "f78f4c0a77d414180e4ff7895512f8fd");
//$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/title.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>选择前往的星球</title>
    <style>
    .div_gif{
        margin-top: 40px;
        width: 100%;
    }
    .gif{
        width:20px;
        margin-left: 80px;
    }
    .div_planet{
        margin-top: 10px;
        text-align: center;
    }
    .bn_planet{
        width: 75%;
    }
    </style>
</head>
<body>
<?php
    include("header.php");
?>
<div class="div_gif">
    <img class="gif" src="../gif/arrow_down.gif">
</div>
<div class="div_planet">
    <img id="bn_choose_planet" class="bn_planet" src="../images/planet_idle.png" onclick="func_bn_choose_planet()">
</div>
<?php
    include("back.php");
?>
<script>

var name = "";
var sex =-1;
var openid = "";
window.onload = function(){
    openid = getUrlParam("openid");
    name = getUrlParam("name");
    sex = getUrlParam("sex");
    $("p.nickname").text(decodeURI(name));   
    if(sex == 0){
        $("#user_sex").attr("src","../images/blank_girl.png");
    } 
};    


//选择星球按钮事件
function func_bn_choose_planet() {
    document.getElementById('bn_choose_planet').setAttribute("src","../images/planet_pressed.png");
    //alert("选择星球");
    location.href='choose_poem.php?name='+name+"&openid="+openid+"&sex="+sex;
}
</script>
</body>
</html>