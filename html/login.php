<?php
/*require_once "jssdk.php";

$appid = "wx2f03a3ab9436c521";
$security = "08a52123e6fe59b1789a923366d06607";

$jssdk = new JSSDK($appid, $security);

$signPackage = $jssdk->GetSignPackage();

require_once "database.php";
$database = new DATABASE();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bg.css">
    <title>设置宝宝信息</title>
    <style>
        .div_head_portrait{
            margin-top: 90px;
            width: 100%;
            text-align: center;
        }
        .img_icon{
            width: 80px;
            height: 108px;
            content: url("../images/user_head.png");
            background-size: 80px 108px;
        }
        .div_nickname{
            width: 100%;
            margin-top: 30px;
            text-align: center;
        }
        .nickname{
            text-align: center;
            color:#382A5D;
            width: 55%;
            margin-left:10px;
            font-size: 18px;
            background:url(../images/fill_in_blank.png) center left no-repeat;
            border: none;
        }
        .div_gender_icon{
            height: 50px;
            text-align: center;
            margin-top: 30px;
        }
        .div_gender_text{
            height: 20px;
            margin-top: 15px;
            text-align: center;
        }
        .div_submit{
            height: 120px;
            margin-top: 30px;
            text-align: center;
        }
        .submit{
            width: 130px;
        }
    </style>
</head>
<body>
<div class="div_head_portrait">
    <img class="img_icon">
</div>
<div class="div_nickname">
    <input id="nickname" type="text" class="nickname" value="填写宝宝昵称" onclick="func_enable_submit()">
</div>
<div class="div_gender_icon">
    <img id="boy" onclick="func_choose_boy()" src="../images/super_selected.png" style="margin-right: 30px">
    <img id="girl" onclick="func_choose_girl()" src="../images/princess_failed.png">
</div>
<div class="div_gender_text">
    <img id="gender_des" src="../images/chi_boy.png">
</div>
<div class="div_submit">
    <img id="bn_submit" class="submit" src="../images/submit_failed.png" onclick="func_submit()">
</div>

<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>
<script>
/** 
 * Created by penguin on 7/5/16.
 */

//选择男孩
function func_choose_boy(){
    document.getElementById('boy').setAttribute("src","../images/super_selected.png");
    document.getElementById('girl').setAttribute("src","../images/princess_failed.png");
    document.getElementById('gender_des').setAttribute("src","../images/chi_boy.png");
}

//选择女孩
function func_choose_girl(){
    document.getElementById('boy').setAttribute("src","../images/super_failed.png");
    document.getElementById('girl').setAttribute("src","../images/princess_selected.png");
    document.getElementById('gender_des').setAttribute("src","../images/chi_girl.png");
}

//提交按钮开启
function func_enable_submit(){
    document.getElementById('nickname').setAttribute("value","");
    document.getElementById('bn_submit').setAttribute("src","../gif/submit_pressed.gif");
}

//提交
function func_submit(){
    if(document.getElementById('bn_submit').getAttribute("src") == "../gif/submit_pressed.gif"){
        //nickname变量是昵称 gender变量是性别
        var nickname = document.getElementById('nickname').value;
        var gender;
        if(document.getElementById('boy').getAttribute("src") == "../images/super_failed.png"){
            gender = 0;
        }else{
            gender = 1;
        }

        var openid = getUrlParam("openid");

        var data = {};
        data.openid = openid;
        data.nickname = encodeURI(nickname);
        data.gender = gender;

        $.ajax({
            type: "POST",
            url: "../server/login_server.php",
            data:{trans_data:data},
            dataType: "JSON",
            success: function(){            
                location.href="choose_galaxy.php?openid="+openid; 
            },
            error: function(){
                alert('fail');
            }
        });
    }
}



</script>
</body>
</html>