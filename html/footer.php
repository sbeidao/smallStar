<div class="div_record">
    <div class="div_audio_wave">
        <img class="audio_bg" src="../images/record_blank.png">
        <img id="wave" class="audio_wave" src="../gif/wave.gif">
        <img id="bn_paly_pause" class="play_pause" src="../images/play_idle.png" onclick="func_play_pause()">
        <img id="bn_delete" class="delete" src="../images/delete_idle.png" onclick="func_delete()">
    </div>
</div>
<div class="div_back">
    <img id="bn_record_stop" class="record_stop" src="../images/record_idle.png">
    <div class="div_share">
        <img id="bn_share" class="share" src="../images/share_failed.png" onclick="save_share()">
    </div>
    <img id="bn_back" class="back" src="../images/back_idle.png" onclick="func_back()">
</div>
<script type="text/javascript">

var local_sound_id = "";
var server_sound_id = "";
$(document).ready(function(){
    $("img.audio_bg").hide();
    $("#wave").hide();
    $("#bn_paly_pause").hide();
    $("#bn_delete").hide();
    $("#bn_record_stop").click(function(){
        if(document.getElementById('bn_record_stop').getAttribute("src") == "../images/record_idle.png"){
            document.getElementById('bn_record_stop').setAttribute("src","../images/end_idle.png");
            //开始录音
            wx.startRecord();
            wx.onVoiceRecordEnd({
                // 录音时间超过一分钟没有停止的时候会执行 complete 回调
                complete: function (res) {
                    local_sound_id = res.localId;
                    alert("抱歉由于微信限制，您的录音只能被截取前60s");
                }
            });
            $("img.audio_bg").show();
            $("#wave").show();
        }else{
                if(document.getElementById('bn_record_stop').getAttribute("src") == "../images/end_idle.png"){
                    document.getElementById('bn_record_stop').setAttribute("src","../images/record_idle.png");
                    document.getElementById('wave').setAttribute("src","../images/record_wave.png");
                    document.getElementById('bn_share').setAttribute("src","../gif/share.gif");
                    //停止录音
                    wx.stopRecord({
                        success: function (res) {
                            local_sound_id = res.localId;
                            //alert(local_sound_id);
                        }
                    });

                    $("#bn_paly_pause").show();
                    $("#bn_delete").show();
                }
        }
    });
});

//播放暂停
function func_play_pause(){
    $("#wave").show();
    if(document.getElementById('bn_paly_pause').getAttribute("src") == "../images/play_idle.png"){
        document.getElementById('bn_paly_pause').setAttribute("src","../images/pause_idle.png");
        document.getElementById('wave').setAttribute("src","../gif/wave.gif");
        //播放录音 local_sound_id
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

//删除
function func_delete(){
    document.getElementById('bn_share').setAttribute("src","../images/share_failed.png");
    $("#wave").hide();
    //alert("删除录音");
    local_sound_id = "";
    $("#bn_paly_pause").hide();
    $("#bn_delete").hide();
}

function save_share(){
    if(document.getElementById('bn_share').getAttribute("src") == "../gif/share.gif"){
        if(local_sound_id == ""){
            alert("对不起，您还没有上传录音，无法分享");
            return;
        }
        wx.uploadVoice({
                       localId: local_sound_id, // 需要上传的音频的本地ID，由stopRecord接口获得
                       isShowProgressTips: 1, // 默认为1，显示进度提示
                       success: function (res) {
                       server_sound_id = res.serverId; // 返回音频的服务器端ID
                       //alert("上传成功"+server_sound_id);
                       //上传录音
                       upload_server_id_to_db();
                       location.href="share.php?server_sound_id="+server_sound_id;
                       }
                       });
    }
}

function upload_server_id_to_db(){
        var data = {};
        data.openid = openid;
        data.server_sound_id = server_sound_id;
        data.poerty_id = poetry;
        //alert(data);
        $.ajax({
            type: "POST",
            url: "../server/poem_sound_put.php",
            data:{trans_data:data},
            dataType: "JSON",
            success: function(){  
                //alert(data);          
                //location.href="choose_galaxy.php?openid="+openid; 
            },
            error: function(){
                //alert('fail');
            }
        });
}

</script>