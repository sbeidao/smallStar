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
    <title>选择朗诵的古诗</title>
    <style>
        .div_planet{
            margin-top: 20px;
            text-align: center;
        }
        .bn_planet{
            width: 140px;
            height:140px;
        }
    </style>
</head>
<body>
<?php
    include("header.php");
?>
<div class="div_poem">
    <img id="bn_choose_cgx" class="poem" src="../images/cgx_button.png" onclick="func_bn_choose_cgx()">
    <img id="bn_choose_qbs" class="poem" src="../images/qbs_button.png" onclick="func_bn_choose_qbs()">
    <img id="bn_choose_clg" class="poem" src="../images/clg_button.png" onclick="func_bn_choose_clg()">
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

//选择诗
function func_bn_choose_cgx() {
    document.getElementById('bn_choose_cgx').setAttribute("src","../images/cgx_button_pressed.png");
    //alert("选择长歌行");
    //localStorage.poem="cgx";
    location.href='poem.php?poetry=cgx&name='+name+"&openid="+openid+"&sex="+sex;
}

//选择七步诗
function func_bn_choose_qbs() {
    document.getElementById('bn_choose_qbs').setAttribute("src","../images/qbs_button_pressed.png");
    //alert("选择七步诗");
    //localStorage.poem="qbs";
    location.href='poem.php?poetry=qbs&name='+name+"&openid="+openid+"&sex="+sex;
}

//选择敕勒歌
function func_bn_choose_clg() {
    document.getElementById('bn_choose_clg').setAttribute("src","../images/clg_button_pressed.png");
    //alert("选择敕勒歌");
    //localStorage.poem="clg";
    location.href='poem.php?poetry=clg&name='+name+"&openid="+openid+"&sex="+sex;
}
</script>
</body>
</html>