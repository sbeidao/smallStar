<?php
require_once "../server/config.php";

?>

<!DOCTYPE html>
<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/public_func.js"></script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/footer.css">
    <title>分享</title>
    <style type="text/css">
        body {
            background-image: url(../images/share_wallpaper.png);
            background-repeat: no-repeat;
            background-size:cover;
            border: none;
        }
        .div_card{
            margin-top: 80px;
            width: 100%;
            text-align: center;
            background-color:#hhhhhh;
        }
        .card{
            width:60%;
        }
        .p1{
            margin-top:20px;
            margin-bottom:50px;
        }
        .QRcode{
            margin-top:100px;
            width:100px;
            height:100px;
        }
        .p2{
            margin-top:10px;
        }
    </style>
</head>
<body>
<div class="div_card">
    <img id="card" class="card" src="../images/puzzle_a_black.png">
    <p class="p1">已有<span id="lightCount">0</span>位好友为宝宝点亮！</p>
    <div id="QRcode" align="center"> </div>
    <!-- <img class="QRcode" id="QRcode" > -->
    <p class="p2">“扫我听录音”</p>
</div>
<div class="div_back">
    <img id="bn_lighten" class="back" src="../images/lighten_idle.png" onclick="func_lighten()">
</div>

<script type="text/javascript" src="../js/qrcode.min.js"></script>
<script src="../js/public_func.js"></script>

<script>

$.ready = function(){
    var wxSoundId = getUrlParam("wxSoundId");
    var server_url = '<?php echo $server_url;?>';
    var qr_url = server_url+"/html/share_record.php?wxSoundId="+wxSoundId;
    //hint http://ourjs.com/detail/55e412ebe3312b046d27f51c
    var qrcode = new QRCode(document.getElementById("QRcode"), {
        text: qr_url,
        width: 120,
        height: 120,
        colorDark : "#692362",
        colorLight : "#ffffff",
        /*colorDark : "#ffffff",
        colorLight : "#692362",*/
        correctLevel : QRCode.CorrectLevel.H
    });


    $.ajax({
        type: "POST",
        url: "../server/share_card_get.php",
        data:{trans_data:wxSoundId},
        dataType: "JSON",
        success: function(data){
            document.getElementById("lightCount").innerHTML = "" + data.praise;
        },
        error: function(){
            alert('fail');
        }
    });
};

var already_lighten = false;


//点亮
function func_lighten(){
    if(already_lighten){
        return ;
    }
    
    var wxSoundId = getUrlParam("wxSoundId");

    var data = {};
    data.wxSoundId = wxSoundId;

    $.ajax({
        type: "POST",
        url: "../server/share_card_post.php",
        data:{trans_data:data},
        dataType: "JSON",
        success: function(data){
            document.getElementById("lightCount").innerHTML = "" + data.praise;
        },
        error: function(){ 
            alert('fail');
        }
    });

    already_lighten = true;
    
}
</script>
</body>
</html>