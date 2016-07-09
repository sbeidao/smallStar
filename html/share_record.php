<?php
require_once "../server/jssdk.php";
require_once "../server/config.php";


$jssdk = new JSSDK($appid, $security);

$signPackage = $jssdk->GetSignPackage();
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
    <title>宝宝的朗诵录音</title>
    <style type="text/css">
        .div_record{
            position: absolute;
            top: 260px;
            width: 100%;
            height: 80px;
        }
        .div_audio_wave{
            position:relative;
            margin:20px auto 0px auto;
            text-align:center;
            width:300px;
        }
        .audio_bg{
            position:absolute;
            z-index:1;
            width:84%;
            left:24px;
        }
        .audio_wave{
            position:absolute;
            z-index:2;
            left:30px;
            top:2px;
            width:80%;
        }
        .play_pause{
            position:absolute;
            width:20px;
            left:140px;
            top:40px;
        }
        .div_back{
            position: absolute;
            height: 100px;
            bottom: 40px;
            width: 100%;
        }
        .back{
            position: absolute;
            width: 60px;
            height:81px;
            right: 50px;
            z-index: 2;
        }
    </style>
</head>
<body>
<div class="div_record">
    <div class="div_audio_wave">
        <img class="audio_bg" src="../images/record_blank.png">
        <img id="wave" class="audio_wave" src="../images/record_wave.png">
        <img id="bn_paly_pause" class="play_pause" src="../images/play_idle.png" onclick="func_play_pause()">
    </div>
</div>
<div class="div_back">
    <img id="bn_close" class="back" src="../images/close_idle.png" onclick="func_close()">
</div>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>

var server_sound_id = getUrlParam("wxSoundId");
var local_sound_id = "";


$.ready = function(){
    server_sound_id = getUrlParam("wxSoundId");
    
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
        'checkJsApi',
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
    
wx.downloadVoice({
        serverId: server_sound_id, // 需要下载的音频的服务器端ID，由uploadVoice接口获得
        isShowProgressTips: 1, // 默认为1，显示进度提示
        success: function (res) {
            local_sound_id = res.localId; // 返回音频的本地ID
            alert(local_sound_id);
        }
    });

});


wx.error(function (res) {
  alert(res.errMsg);
}); 



//播放暂停录音
function func_play_pause(){
    if(document.getElementById('bn_paly_pause').getAttribute("src") == "../images/play_idle.png"){
        document.getElementById('bn_paly_pause').setAttribute("src","../images/pause_idle.png");
        document.getElementById('wave').setAttribute("src","../gif/wave.gif");
        //播放录音
         wx.playVoice({
            localId: local_sound_id // 需要播放的音频的本地ID，由stopRecord接口获得
        });
        wx.onVoicePlayEnd({
            success: function (res) {
                document.getElementById('wave').setAttribute("src","../images/record_wave.png");
                document.getElementById('bn_paly_pause').setAttribute("src","../images/play_idle.png");
                //var localId = res.localId; // 返回音频的本地ID
            }
        });     
        //alert("播放录音");
    }else{
        if(document.getElementById('bn_paly_pause').getAttribute("src") == "../images/pause_idle.png"){
            document.getElementById('bn_paly_pause').setAttribute("src","../images/play_idle.png");
            document.getElementById('wave').setAttribute("src","../images/record_wave.png");
            //暂停录音
            wx.pauseVoice({
                localId: local_sound_id // 需要暂停的音频的本地ID，由stopRecord接口获得
            });
            //alert("暂停录音");
        }
    }
}

//关闭
function func_close(){
    document.getElementById('bn_close').setAttribute("src","../images/close_pressed.png");
    //alert("关闭");
    window.close();
    history.back(-1);
}
</script>
</body>
</html>