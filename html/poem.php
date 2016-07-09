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
    <title id="title1">长歌行</title>
</head>
<body>
<?php
    include("header.php");
?>
<div class="div_poem">
    <img class="poem" >
</div>
<?php
    include("footer.php");
?>
<script src="../js/jquery-3.0.0.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">
    
var name = "";
var sex =-1;
var openid = "";
var poetry = "";

window.onload = function(){
    openid = getUrlParam("openid");
    name = getUrlParam("name");
    sex = getUrlParam("sex");
    poetry = getUrlParam("poetry");
   
    $("p.nickname").text(decodeURI(name));   
    if(sex == 0){
        $("#user_sex").attr("src","../images/blank_girl.png");
    } 
    poem_img_src = "../images/"+poetry+"_content.png";
    //用jquery修改img所对应的文件
    $("img.poem").attr("src",poem_img_src);

    if(poetry == "cgx")
    {      
        $("#title1").text("长歌行");
    }
    if(poetry == "clg")
    {      
        $("#title1").text("敕勒歌");
    }
    if(poetry == "qbs")
    {      
        $("#title1").text("七步诗");
    }

};    
  
wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'checkJsApi',
        'startRecord',
        'stopRecord',
        'onVoiceRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'onVoicePlayEnd',
        'uploadVoice',
        'downloadVoice'
    ]
  });
wx.ready(function () {
  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
    wx.checkJsApi({
      jsApiList: [
        'getNetworkType',
        'startRecord',
        'stopRecord',
        'onVoiceRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'onVoicePlayEnd',
        'uploadVoice',
        'downloadVoice'
      ],
      success: function (res) {
        //alert(JSON.stringify(res));
      }
    });
    
});


wx.error(function (res) {
  alert(res.errMsg);
}); 
</script>



</body>
</html>