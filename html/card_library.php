<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/title.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/public_func.js"></script>
    <title>我的卡片</title>
    <style>
        .div_card{
            margin-top: 60px;
            text-align: center;
        }
        .card{
            width: 75%;
        }
    </style>
</head>
<body>
<div class="div_title">
    <div class="div_title_left">
        <img id = "user_sex" src="../images/blank_boy.png" width="190px">
    </div>
    <div class="div_nickname">
        <p class="nickname"></p>
    </div>
</div>
<div class="div_card">
    <img class="card">
</div>
<div class="div_back">
    <img id="bn_back" class="back" src="../images/back_idle.png" onclick="func_back()">
</div>
</body>


<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>

<script type="text/javascript">
    

var openid = "";
var level = -1;
//初始化加载html后立刻执行这个函数
window.onload = function(){
    //通过这个函数可以从url中获取参数
    openid = getUrlParam("openid");

    //用jquery修改img所对应的文件
    
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
            //level = data.level;   
            
            id = data.id;  
        },
        error: function(){
            alert('fail');
        }
    });

    $.ajax({
        type: "GET",
        url: "../server/CountUserLevel.php",
        data:{trans_data:openid},
        dataType: "JSON",
        success: function(data){
            //alert(data);
            level = data.level; 
            var card_img_src = "../images/card_l_"+level+".png";
            $("img.card").attr("src",card_img_src);
        },
        error: function(data){
            alert('fail');
            //alert(data);
        }
    });


};


    
</script>

</html>