<?php
require_once "../server/jssdk.php";
require_once "../server/config.php";


$jssdk = new JSSDK($appid, $security);

$signPackage = $jssdk->GetSignPackage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/title.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/jquery-3.0.0.js"></script>
    <script src="../js/public_func.js"></script>
    <title>分享</title>
    <style>
        .div_arrow{
            position: absolute;
            top: 10px;
            width: 100%;
        }
        .arrow{
            position: absolute;
            width: 20px;
            right: 25px;
        }
        .div_card{
            width:100%;
            text-align:center;
            margin-top:120px;
        }
        .card{
            width:130px;
            height:130px
        }
        .text{
            margin-top:40px;
            width:250px;
        }
        .div_share{
            position: relative;
            margin:30px auto 0px auto;
            text-align:center;
            width:300px;
            background-color:#00uu99;
        }
        .moment{
            position:absolute;
            left:40px;
        }
        .friend{
            position:absolute;
            right:40px;
        }
    </style>
</head>
<body>
<div class="div_arrow">
    <img class="arrow" src="../gif/arrow_up.gif">
</div>
<div class="div_card">
    <img class="card" src="../images/card_a.png">
    <img class="text" src="../images/share_word.png">
</div>
<!--
<div class="div_share">
    <img id="bn_moment" class="moment" src="../images/circle_idle.png" onclick="func_share_to_moment()">
    <img id="bn_friend" class="friend" src="../images/friend_idle.png" onclick="func_share_to_friend()">
</div>
-->
<div class="div_back">
    <img id="bn_back" class="back" src="../images/back_idle.png" onclick="func_back()">
</div>


<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>

var server_sound_id = "";
var server_url = '<?php echo $server_url;?>';
$(document).ready(function(){
    server_sound_id = getUrlParam("server_sound_id");
    server_url = '<?php echo $server_url;?>';
});

wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ]
  });
wx.ready(function () {
  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
    wx.checkJsApi({
      jsApiList: [
        'getNetworkType',
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
      ],
      success: function (res) {
        //alert(JSON.stringify(res));
      }
    });

wx.onMenuShareTimeline({
        title: '小小星球学古诗', // 分享标题
        link: server_url+'/html/share_card.php?wxSoundId='+server_sound_id, // 分享链接
        imgUrl: server_url+'/images/logo.jpg', // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
            //alert("分享至朋友圈");
            location.href="./share_card.php?wxSoundId="+server_sound_id;
            
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
        }
});

wx.onMenuShareAppMessage({
    title: '小小星球学古诗', // 分享标题
    desc: '为宝宝点亮', // 分享描述
    link: server_url+'/html/share_card.php?wxSoundId='+server_sound_id, // 分享链接
    imgUrl: server_url+'/images/logo.jpg', // 分享图标
    type: '', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        //alert("分享至朋友");
        location.href="./share_card.php?wxSoundId="+server_sound_id;
        
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});


    
});


wx.error(function (res) {
  alert(res.errMsg);
});

//分享至朋友圈
function func_share_to_moment(){
    document.getElementById('bn_moment').setAttribute("src","../images/circle_pressed.png");
    //alert("分享至朋友圈");
    
}

//分享至朋友
function func_share_to_friend(){
    document.getElementById('bn_friend').setAttribute("src","../images/friend_pressed.png");
    //alert("分享至朋友");
}





</script>
</body>
</html>